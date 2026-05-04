<?php
namespace app\controllers;

require_once '../app/models/User.php';

use App\Models\User;

class AuthController
{
    public function prosesLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new User();
        $user = $userModel->login($email, $password);

        if ($user) {
        echo "<script>
                alert('Login berhasil!');
                window.location.href='/main';
              </script>";
        } else {
        echo "<script>
                alert('Email atau password salah!');
                window.location.href='/login';
              </script>";
        }
    }

    public function prosesRegister()
{
    $userModel = new User();

    $data = [
        'username' => $_POST['username'],
        'email'    => $_POST['email'],
        'password' => $_POST['password']
    ];

    // cek email
    if ($userModel->findByEmail($data['email'])) {
        echo "<script>
                alert('Email sudah digunakan!');
                window.location.href='/register';
              </script>";
        return;
    }

    $success = $userModel->insert($data);

    if ($success) {
        echo "<script>
                alert('Register berhasil!');
                window.location.href='/login';
              </script>";
    } else {
        echo "<script>
                alert('Register gagal!');
                window.location.href='/register';
              </script>";
    }
}
}
