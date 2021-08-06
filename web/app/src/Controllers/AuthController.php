<?php

namespace App\Controllers;

use App\ConnectDB;

class AuthController
{
    public function index()
    {

        $database = new ConnectDB();
        $db = $database->getConnection();

var_dump($db);



// создадим экземпляры классов Product и Category
        /*$product = new Product($db);
        $category = new Category($db);*/

        //require_once __DIR__ . "/../Views/Auth/login.php";
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

    public function logout()
    {
        var_dump($_POST);
        //require_once __DIR__ . "/../Views/index.php";
    }
}