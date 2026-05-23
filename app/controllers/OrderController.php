<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/Order.php';
require_once '../app/models/Product.php';

use App\Core\Controller;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    private function guard(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['user'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Login dulu ya!']);
            exit;
        }
    }

    public function place(): void
    {
        header('Content-Type: application/json');
        $this->guard();

        $body  = json_decode(file_get_contents('php://input'), true);
        $items = $body['items'] ?? [];

        if (empty($items)) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Cart kosong!']);
            exit;
        }

        // Validasi & ambil harga dari DB
        $productModel = new Product();
        $validated    = [];

        foreach ($items as $item) {
            $pid = (int)($item['product_id'] ?? 0);
            $qty = (int)($item['qty']        ?? 1);

            if ($pid <= 0 || $qty <= 0) continue;

            $product = $productModel->getProduct($pid);
            if (!$product) continue;

            $validated[] = [
                'product_id' => $pid,
                'qty'        => $qty,
                'unit_price' => (float)$product['price'],
            ];
        }

        if (empty($validated)) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Produk tidak valid.']);
            exit;
        }

        $userId  = (int)$_SESSION['user']['id'];
        $orderNo = (new Order())->create($userId, $validated);

        if ($orderNo) {
            echo json_encode(['success' => true, 'order_no' => $orderNo]);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Gagal membuat order, coba lagi.']);
        }
        exit;
    }
}