<?php
namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class Order extends Database
{
    protected $table       = 'orders';
    protected $itemsTable  = 'order_items';

    /* ─── READ ──────────────────────────────────────────────── */

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

    /* ─── WRITE ─────────────────────────────────────────────── */

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
}