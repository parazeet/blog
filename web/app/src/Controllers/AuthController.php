<?php

namespace App\Controllers;

use App\ConnectDB;
use App\Model\User;

class AuthController
{
    private $db;

    public function __construct()
    {
        session_start();
        $database = new ConnectDB();
        $this->db = $database->getConnection();
    }

    public function index()
    {
        $this->checkAuth();

        require_once __DIR__ . "/../Views/Auth/login.php";
    }

    public function loginPost()
    {
        $user = new User($this->db);
        $user = $user->find(input('email'));

        if (!$user and !password_verify(input('password'), $user['password'])) {
            return response()->redirect(url('login'));
        }

        $_SESSION["id"] = $user['id'];
        $_SESSION["user_name"] = $user['name'];
        $_SESSION['time'] = time();

        return response()->redirect(url('home'));
    }

    public function register()
    {
        $this->checkAuth();

        require_once __DIR__ . "/../Views/Auth/register.php";
    }

    public function registerStore()
    {
        $user = new User($this->db);

        if (input('password') !== input('password_conf')) {
            return response()->redirect(url('register'));
        }

        if ($user->find(input('email'))) {
            return response()->redirect(url('register'));
        }

        if ($user->create(input()->all())) {
            $auth = $user->find(input('email'));

            $_SESSION["id"] = $auth['id'];
            $_SESSION["user_name"] = $auth['name'];
            $_SESSION['time'] = time();
        }

        return response()->redirect(url('home'));
    }

    public function logout()
    {
        session_destroy();

        return response()->redirect(url('home'));
    }

    public function checkAuth()
    {
        if($_SESSION["user_name"]) {
            return response()->redirect(url('home'));
        }
    }
}