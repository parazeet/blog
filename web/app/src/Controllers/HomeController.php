<?php

namespace App\Controllers;

use App\Model\Post;
use App\ConnectDB;

class HomeController
{
    private $post;

    public function __construct()
    {
        $database = new ConnectDB();
        $this->post = new Post($database->getConnection());
    }

    public function index()
    {
        $posts = $this->post->getAll();

        require_once __DIR__ . "/../Views/index.php";
    }

    public function show($id = null)
    {
        $post = $this->post->first($id);

        if (!$post) {
            ErrorController::show();
        }

        require_once __DIR__ . "/../Views/show.php";
    }

    public function postsList()
    {
        $posts = $this->post->getAll();

        require_once __DIR__ . "/../Views/list.php";
    }

    public function search()
    {
        $posts = $this->post->search(input('search'));

        require_once __DIR__ . "/../Views/index.php";
    }
}