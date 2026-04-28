<?php
namespace app\controllers;
class viewsController
{
    public function main()
    {
        require_once '../app/views/meowlet/main.php';
    }

    public function cart()
    {
        require_once '../app/views/meowlet/cart.php';
    }

    public function products()
    {
        require_once '../app/views/meowlet/products.php';
    }

    public function detail()
    {
        require_once '../app/views/meowlet/detail.php';
    }
}