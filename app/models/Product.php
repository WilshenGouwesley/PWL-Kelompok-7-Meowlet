<?php

namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class Product extends Database
{
    protected $table = 'products';

    public function getProduct($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = ?";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param('i', $id);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
}