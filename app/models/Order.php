<?php
namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class Order extends Database
{
    protected $table       = 'orders';
    protected $itemsTable  = 'order_items';

    /* READ */

    public function getAll(string $status = '', string $search = ''): array
    {
        $where  = [];
        $params = [];
        $types  = '';

        if ($status !== '') {
            $where[]  = "o.status = ?";
            $params[] = $status;
            $types   .= 's';
        }
        if ($search !== '') {
            $where[]  = "(o.order_no LIKE ? OR u.username LIKE ?)";
            $like     = "%{$search}%";
            $params[] = $like;
            $params[] = $like;
            $types   .= 'ss';
        }

        $sql = "SELECT o.*, u.username
                FROM   {$this->table} o
                JOIN   users u ON u.id = o.user_id"
             . ($where ? ' WHERE ' . implode(' AND ', $where) : '')
             . " ORDER BY o.created_at DESC";

        $stmt = $this->connection->prepare($sql);
        if ($params) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id): ?array
    {
        $sql  = "SELECT o.*, u.username, u.email
                 FROM   {$this->table} o
                 JOIN   users u ON u.id = o.user_id
                 WHERE  o.id = ? LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }

    public function getItems(int $orderId): array
    {
        $sql  = "SELECT oi.*, p.name, p.image
                 FROM   {$this->itemsTable} oi
                 JOIN   products p ON p.id = oi.product_id
                 WHERE  oi.order_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param('i', $orderId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function stats(): array
    {
        $row = $this->connection
            ->query("SELECT
                       COUNT(*)                                          AS total,
                       SUM(total_price)                                  AS revenue,
                       SUM(status = 'pending')                           AS pending,
                       SUM(status = 'processing')                        AS processing,
                       SUM(status = 'shipped')                           AS shipped,
                       SUM(status = 'completed')                         AS completed,
                       SUM(status = 'cancelled')                         AS cancelled
                     FROM {$this->table}")
            ->fetch_assoc();
        return $row;
    }

    /* WRITE */

    public function updateStatus(int $id, string $status): bool
    {
        $allowed = ['pending','processing','shipped','completed','cancelled'];
        if (!in_array($status, $allowed, true)) return false;

        $stmt = $this->connection->prepare(
            "UPDATE {$this->table} SET status = ? WHERE id = ?"
        );
        $stmt->bind_param('si', $status, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function delete(int $id): bool
    {
        $stmt = $this->connection->prepare(
            "DELETE FROM {$this->table} WHERE id = ?"
        );
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function create(int $userId, array $items): string|false
    {
        if (empty($items)) return false;

        // Hitung total
        $totalPrice = 0;
        foreach ($items as $item) {
            $totalPrice += $item['qty'] * $item['unit_price'];
        }

        // Generate order_no unik: ORD-YYYY + 4 digit random
        $orderNo = 'ORD-' . date('Y') . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

        // Pastikan order_no unik (jarang collision, tapi aman)
        $check = $this->connection->prepare("SELECT id FROM {$this->table} WHERE order_no = ? LIMIT 1");
        $check->bind_param('s', $orderNo);
        $check->execute();
        if ($check->get_result()->num_rows > 0) {
            $orderNo .= mt_rand(10, 99); // tambah suffix jika duplikat
        }

        $this->connection->begin_transaction();
        try {
            // Insert order
            $stmt = $this->connection->prepare(
                "INSERT INTO {$this->table} (order_no, user_id, total_price, status) VALUES (?, ?, ?, 'pending')"
            );
            $stmt->bind_param('sid', $orderNo, $userId, $totalPrice);
            $stmt->execute();
            $orderId = $this->connection->insert_id;

            // Insert order_items
            $stmtItem = $this->connection->prepare(
                "INSERT INTO {$this->itemsTable} (order_id, product_id, qty, unit_price) VALUES (?, ?, ?, ?)"
            );
            foreach ($items as $item) {
                $pid   = (int)$item['product_id'];
                $qty   = (int)$item['qty'];
                $price = (float)$item['unit_price'];
                $stmtItem->bind_param('iiid', $orderId, $pid, $qty, $price);
                $stmtItem->execute();
            }

            $this->connection->commit();
            return $orderNo;
        } catch (\Exception $e) {
            $this->connection->rollback();
            return false;
        }
    }
}