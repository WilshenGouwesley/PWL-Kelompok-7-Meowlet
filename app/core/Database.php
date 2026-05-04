<?php
namespace App\Core;

require_once '../app/config/app.php';

class Database
{
    protected $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect(
            DB_HOST,
            DB_USER,
            DB_PASSWORD,
            DB_NAME
        );

        if (!$this->connection) {
            die("Error to connect Database: " . mysqli_connect_error());
        }

        // Set charset ke UTF-8 agar karakter special tidak bermasalah
        mysqli_set_charset($this->connection, 'utf8mb4');
    }

    // Tutup koneksi ketika object dihancurkan
    public function __destruct()
    {
        if ($this->connection) {
            mysqli_close($this->connection);
        }
    }
}