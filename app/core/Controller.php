<?php
namespace App\Core;

class Controller
{
    public function plainView(string $view, array $data = [])
    {
        // ubah dot notation ke path file
        $viewPath = __DIR__ . '/../views/' . str_replace('.', '/', $view) . '.php';
        if (!empty($data)) {
            extract($data);
        }
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            // sederhana: tampilkan error jika file view tidak ditemukan
            http_response_code(500);
            echo "View not found: " . htmlspecialchars($viewPath);
            exit;
        }
    }
    public function view(string $view, array $data = [])
    {
        extract($data);

        $view = str_replace('.', '/', $view);
        $content = '../app/views/' . $view . '.php';

        require_once '../app/views/layouts/app.php';
    }
}


?>