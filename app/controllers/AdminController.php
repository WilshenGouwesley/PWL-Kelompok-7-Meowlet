<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/Product.php';
require_once '../app/models/Order.php';

use App\Core\Controller;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    /* ── Guard: only admin (id === 1 for demo, adjust as needed) ── */
    private function guard(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['user'])) {
            header('Location: /login'); exit;
        }
        // Optionally restrict to a specific user id or role:
        // if ($_SESSION['user']['id'] !== 1) { http_response_code(403); exit; }
    }

    /* ══════════════════ DASHBOARD ══════════════════ */

    public function dashboard(): void
    {
        $this->guard();
        $orderModel   = new Order();
        $productModel = new Product();

        $stats    = $orderModel->stats();
        $orders   = $orderModel->getAll();
        $products = $productModel->getAllProducts();   // we'll add this below

        $this->plainView('meowlet.admin.dashboard', [
            'stats'    => $stats,
            'orders'   => $orders,
            'products' => $products,
        ]);
    }

    /* ══════════════════ PRODUCTS – CRUD ══════════════════ */

    public function storeProduct(): void
    {
        $this->guard();
        $productModel = new Product();

        $data = [
            'name'              => $_POST['name'],
            'short_description' => $_POST['short_description'],
            'description'       => $_POST['description'],
            'price'             => $_POST['price'],
            'seller'            => $_POST['seller'],
            'categories'        => $_POST['categories'],
            'image'             => $_POST['image'] ?? '',
            'smallimg1'         => $_POST['smallimg1'] ?? '',
            'smallimg2'         => $_POST['smallimg2'] ?? '',
        ];

        $productModel->insert($data);
        header('Location: /admin'); exit;
    }

    public function updateProduct(int $id): void
    {
        $this->guard();
        $productModel = new Product();

        $data = [
            'name'              => $_POST['name'],
            'short_description' => $_POST['short_description'],
            'description'       => $_POST['description'],
            'price'             => $_POST['price'],
            'seller'            => $_POST['seller'],
            'categories'        => $_POST['categories'],
            'image'             => $_POST['image'] ?? '',
            'smallimg1'         => $_POST['smallimg1'] ?? '',
            'smallimg2'         => $_POST['smallimg2'] ?? '',
        ];

        $productModel->update($data, $id);
        header('Location: /admin'); exit;
    }

    public function deleteProduct(int $id): void
    {
        $this->guard();
        (new Product())->delete($id);
        header('Location: /admin'); exit;
    }

    /* ══════════════════ ORDERS ══════════════════ */

    public function updateOrderStatus(int $id): void
    {
        $this->guard();
        $status = $_POST['status'] ?? '';
        (new Order())->updateStatus($id, $status);
        header('Location: /admin'); exit;
    }

    public function deleteOrder(int $id): void
    {
        $this->guard();
        (new Order())->delete($id);
        header('Location: /admin'); exit;
    }
}