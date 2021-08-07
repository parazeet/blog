<?php

namespace App\Controllers;

use App\Helpers\Error;
use App\Model\Post;
use App\ConnectDB;

class HomeController
{
    private $db;

    public function __construct()
    {
        $database = new ConnectDB();
        $this->db = $database->getConnection();
    }

    public function index()
    {
        $post = new Post($this->db);
        $posts = $post->getAll();

        require_once __DIR__ . "/../Views/index.php";
    }

    public function show($id = null)
    {
        $post = new Post($this->db);
        $post = $post->first($id);

        if (!$post) {
            Error::show();
        }

        require_once __DIR__ . "/../Views/show.php";
    }
}