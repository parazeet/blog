<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {

        $var = 288888;

        require_once __DIR__ . "/../Views/index.php";
    }

    public function read($id = null)
    {

        require_once __DIR__ . "/../Views/read.php";
    }
}