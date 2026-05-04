<?php
namespace App\Models;
require_once '../app/core/Database.php';

use App\Core\Database;

class User extends Database
{
    protected $table = 'users';

    // Menampilkan daftar user
    public function getUsers()
    {
        $users = [];

        $query = "SELECT id, username, email FROM {$this->table}"; // password tidak ditampilkan
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();

        while ($user = $result->fetch_assoc()) {
            $users[] = $user;
        }
        return $users;
    }

    // Menampilkan detail user
    public function getUser(int $id)
    {
        $query = "SELECT id, username, email FROM {$this->table} WHERE id = ?";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        return $user;
    }

    // Menambahkan data user
    public function insert(array $data)
    {
        $username     = htmlspecialchars($data['username']);
        $email        = htmlspecialchars($data['email']);
        $password     = password_hash($data['password'], PASSWORD_BCRYPT); // hash password

        $query = "INSERT INTO {$this->table} (username, email, password) VALUES (?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('sss', $username, $email, $password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /users');
            exit();
        } else {
            echo 'Error to store user';
        }
    }

    // Mengupdate data user
    public function update(array $data, int $id)
    {
        $username = htmlspecialchars($data['username']);
        $email    = htmlspecialchars($data['email']);

        // Cek apakah password ikut diupdate
        if (!empty($data['password'])) {
            $password = password_hash($data['password'], PASSWORD_BCRYPT);
            $query = "UPDATE {$this->table} SET username = ?, email = ?, password = ? WHERE id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param('sssi', $username, $email, $password, $id);
        } else {
            $query = "UPDATE {$this->table} SET username = ?, email = ? WHERE id = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param('ssi', $username, $email, $id);
        }

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /users');
            exit();
        } else {
            echo 'Error to update user';
        }
    }

    // Menghapus data user
    public function delete(int $id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = ?";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /users');
            exit();
        } else {
            echo 'Error to delete user';
        }
    }
}
?>