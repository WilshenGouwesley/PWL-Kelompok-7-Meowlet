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
    private function guard(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['user'])) {
            header('Location: /login'); exit;
        }
    }

    /* ══ DASHBOARD ══════════════════════════════════════════════ */

    public function dashboard(): void
    {
        $this->guard();
        $orderModel   = new Order();
        $productModel = new Product();

        $stats    = $orderModel->stats();
        $orders   = $orderModel->getAll();
        $products = $productModel->getAllProducts();

        $this->plainView('meowlet.admin.dashboard', [
            'stats'    => $stats,
            'orders'   => $orders,
            'products' => $products,
        ]);
    }

    /* ══ PRODUCTS – CRUD ════════════════════════════════════════ */

    public function storeProduct(): void
    {
        $this->guard();
        $data = [
            'name'              => $_POST['name']              ?? '',
            'short_description' => $_POST['short_description'] ?? '',
            'description'       => $_POST['description']       ?? '',
            'price'             => $_POST['price']             ?? 0,
            'seller'            => $_POST['seller']            ?? '',
            'categories'        => $_POST['categories']        ?? '',
            'image'             => $_POST['image']             ?? '',
            'smallimg1'         => $_POST['smallimg1']         ?? '',
            'smallimg2'         => $_POST['smallimg2']         ?? '',
        ];

        (new Product())->insert($data);
        header('Location: /admin'); exit;
    }

    public function updateProduct(int $id): void
    {
        $this->guard();
        $data = [
            'name'              => $_POST['name']              ?? '',
            'short_description' => $_POST['short_description'] ?? '',
            'description'       => $_POST['description']       ?? '',
            'price'             => $_POST['price']             ?? 0,
            'seller'            => $_POST['seller']            ?? '',
            'categories'        => $_POST['categories']        ?? '',
            'image'             => $_POST['image']             ?? '',
            'smallimg1'         => $_POST['smallimg1']         ?? '',
            'smallimg2'         => $_POST['smallimg2']         ?? '',
        ];

        (new Product())->update($data, $id);
        header('Location: /admin'); exit;
    }

    public function deleteProduct(int $id): void
    {
        $this->guard();
        $ok = (new Product())->delete($id);

        // Kalau request dari fetch (AJAX), return JSON
        header('Content-Type: application/json');
        echo json_encode(['success' => $ok]);
        exit;
    }

    /* ══ ORDERS ═════════════════════════════════════════════════ */

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
        $ok = (new Order())->delete($id);

        header('Content-Type: application/json');
        echo json_encode(['success' => $ok]);
        exit;
    }

    public function orderItemsJson(int $id): void
    {
        $this->guard();
        header('Content-Type: application/json');
        echo json_encode((new Order())->getItems($id));
        exit;
    }
}