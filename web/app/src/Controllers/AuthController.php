<?php

namespace App\Controllers;

use App\ConnectDB;
use App\Model\User;

class AuthController
{
    private $db;

    public function __construct()
    {
        $database = new ConnectDB();
        $this->db = $database->getConnection();
    }

    public function index()
    {
        require_once __DIR__ . "/../Views/Auth/login.php";
    }

    public function enter()
    {
        $user = new User($this->db);
        $user = $user->find(input('email'));

        if (!password_verify(input('password'), $user['password'])) {
            return response()->redirect(url('login'));
        }

        //go auth

        return response()->redirect(url('home'));
    }

    public function register()
    {
        require_once __DIR__ . "/../Views/Auth/register.php";
    }

    public function registerStore()
    {
        $user = new User($this->db);

        if (input('password') !== input('password_conf')) {
            return response()->redirect(url('register'));
        }

        if (! $user->create(input()->all())) {
            return response()->redirect(url('register'));
        }

        //go auth

        return response()->redirect(url('home'));
    }

    public function logout()
    {
        var_dump($_POST);
        //return response()->redirect(url('home'));
    }
}