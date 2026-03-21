<?php
require_once '../app/core/Router.php';
use App\Core\Router;

$router = new Router();

// Register Routes
$router->add('GET', '/main', 'viewsController', 'main');
$router->add('GET', '/cart', 'viewsController', 'cart');
$router->add('GET', '/products', 'viewsController', 'products');
$router->add('GET', '/detail', 'viewsController', 'detail');

$router->run();

?>