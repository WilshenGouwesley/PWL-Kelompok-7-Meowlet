<?php
namespace app\controllers;
class viewsController
{
    public function main()
    {
        require_once '../app/views/main/main.php';
    }

    public function cart()
    {
        require_once '../app/views/cart/cart.php';
    }

    public function products()
    {
        require_once '../app/views/products/products.php';
    }
}