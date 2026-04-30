<?php
require_once '../app/core/Router.php';
use App\Core\Router;

$router = new Router();

// Register Routes
$router->add('GET', '/main', 'viewsController', 'main');
$router->add('GET', '/main/cart', 'viewsController', 'cart');
$router->add('GET', '/main/products', 'viewsController', 'products');
$router->add('GET', '/main/detail/{id}', 'viewsController', 'detail');

$router->run();

?>