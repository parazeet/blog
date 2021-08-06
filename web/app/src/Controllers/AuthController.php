<?php

namespace App\Controllers;

class AuthController
{
    public function index()
    {

        require_once __DIR__ . "/../Views/Auth/login.php";
    }

    public function enter()
    {
        var_dump($_POST);

        //require_once __DIR__ . "/../Views/read.php";
    }

    public function register()
    {

        require_once __DIR__ . "/../Views/Auth/register.php";
    }

    public function registerStore()
    {
        var_dump($_POST);
        //require_once __DIR__ . "/../Views/read.php";
    }
}