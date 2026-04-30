<?php
namespace app\controllers;
require_once '../app/core/Controller.php';

use App\Core\Controller;

class viewsController extends Controller
{
    public function main()
    {
        $this->view('meowlet.main');
    }

    public function cart()
    {
        $this->view('meowlet.cart');
    }

    public function products()
    {
        $this->view('meowlet.products');
    }

    public function detail()
    {
        $this->view('meowlet.detail');
    }
}