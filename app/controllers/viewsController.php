<?php
namespace app\controllers;
require_once '../app/core/Controller.php';
require_once '../app/models/User.php';

use App\Core\Controller;
use App\Models\User;

class viewsController extends Controller
{
    public function register()
    {
        $this->plainView('meowlet.register');
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

    public function detail()
    {
        $this->view('meowlet.detail');
    }
}