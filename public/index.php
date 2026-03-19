<?php
require_once '../app/core/Router.php';
use App\Core\Router;

$router = new Router();

// Register Routes
$router->add('GET', '/main', 'viewsController', 'main');
$router->add('GET', '/views', 'viewsController', 'cart');

$router->run();

?>