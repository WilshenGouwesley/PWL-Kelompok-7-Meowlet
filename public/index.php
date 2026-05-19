<?php
require_once '../app/core/Router.php';
use App\Core\Router;

$router = new Router();

// Register Routes
$router->add('GET', '/main', 'viewsController', 'main');
$router->add('GET', '/main/cart', 'viewsController', 'cart');
$router->add('GET', '/main/products', 'viewsController', 'products');
$router->add('GET', '/main/detail/{id}', 'viewsController', 'detail');
$router->add('GET', '/register', 'viewsController', 'register');
$router->add('GET', '/login', 'viewsController', 'login');
$router->add('GET', '/profile', 'viewsController', 'profile');
$router->add('GET', '/main/aboutus', 'viewsController', 'aboutus');
$router->add('GET',  '/main/editprofile',   'viewsController', 'editprofile');
$router->add('POST', '/profile/update',     'viewsController', 'updateprofile');


$router->add('POST', '/login', 'authController', 'prosesLogin');
$router->add('POST', '/register', 'authController', 'prosesRegister');

// ── Admin ────────────────────────────────────────────
$router->add('GET',  '/admin',                        'AdminController', 'dashboard');
$router->add('POST', '/admin/products/store',          'AdminController', 'storeProduct');
$router->add('POST', '/admin/products/{id}/update',    'AdminController', 'updateProduct');
$router->add('POST', '/admin/products/{id}/delete',    'AdminController', 'deleteProduct');
$router->add('POST', '/admin/orders/{id}/status',      'AdminController', 'updateOrderStatus');
$router->add('POST', '/admin/orders/{id}/delete',      'AdminController', 'deleteOrder');
$router->add('GET',  '/admin/order-items/{id}',        'AdminController', 'orderItemsJson');

$router->run();

?>