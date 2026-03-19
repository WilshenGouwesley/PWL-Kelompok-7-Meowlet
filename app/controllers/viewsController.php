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
        require_once '../app/views/product/cart.php';
    }
}