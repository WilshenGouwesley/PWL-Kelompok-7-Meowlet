<?php
namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class Product extends Database
{
    protected $table = 'products';

    /* ─── READ ──────────────────────────────────────────────── */

    public function getProduct(int $id): ?array
    {
        $stmt = $this->connection->prepare(
            "SELECT * FROM {$this->table} WHERE id = ? LIMIT 1"
        );
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }

    public function getAllProducts(): array
    {
        $result = $this->connection->query(
            "SELECT * FROM {$this->table} ORDER BY id DESC"
        );
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /* ─── WRITE ─────────────────────────────────────────────── */

    public function insert(array $d): bool
    {
        $stmt = $this->connection->prepare(
            "INSERT INTO {$this->table}
             (name, short_description, description, price, image, smallimg1, smallimg2, seller, categories)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            'sssdsssss',
            $d['name'], $d['short_description'], $d['description'],
            $d['price'], $d['image'], $d['smallimg1'], $d['smallimg2'],
            $d['seller'], $d['categories']
        );
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function update(array $d, int $id): bool
    {
        $stmt = $this->connection->prepare(
            "UPDATE {$this->table}
             SET name=?, short_description=?, description=?, price=?,
                 image=?, smallimg1=?, smallimg2=?, seller=?, categories=?
             WHERE id=?"
        );
        $stmt->bind_param(
            'sssdsssssi',
            $d['name'], $d['short_description'], $d['description'],
            $d['price'], $d['image'], $d['smallimg1'], $d['smallimg2'],
            $d['seller'], $d['categories'], $id
        );
        $stmt->execute();
        return $stmt->affected_rows >= 0;
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