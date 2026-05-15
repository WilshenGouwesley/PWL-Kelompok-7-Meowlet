<?php
namespace app\controllers;
require_once '../app/core/Controller.php';
require_once '../app/models/User.php';
require_once '../app/models/Product.php';

use App\Core\Controller;
use App\Models\User;
use App\Models\Product;

class viewsController extends Controller
{
    public function register()
    {
        $this->plainView('meowlet.register');
    }

     public function login()
    {
        $this->plainView('meowlet.login');
    }

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

    public function detail($id)
{
    $productModel = new Product();

    $product = $productModel->getProduct($id);

    $this->view('meowlet.detail', [
        'product' => $product
    ]);
}

    public function profile()
    {
        $this->view('meowlet.profile');
    }
    
    public function aboutus()
    {
        $this->view('meowlet.aboutus');
    }
}