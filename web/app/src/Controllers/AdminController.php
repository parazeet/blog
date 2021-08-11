<?php

namespace App\Controllers;

use App\ConnectDB;
use App\Helpers\Error;
use App\Model\Post;

class AdminController
{
    private $post;

    public function __construct()
    {
        $database = new ConnectDB();
        $this->post = new Post($database->getConnection());
    }

    public function index()
    {
        $userId = $_SESSION['id'];
        $posts = $this->post->getMyPosts($userId) ?? [];
        require_once __DIR__ . "/../Views/Admin/myPosts.php";
    }

    public function create()
    {
        require_once __DIR__ . "/../Views/Admin/createPost.php";
    }

    public function store()
    {
        if ($this->post->create(input()->all())) {
            return redirect(url('myPosts'));
        }

        return redirect(url('createPost'));
    }

    public function show($id): string
    {
        // The variable authenticated is set to true in the ApiVerification middleware class.
        /*return response()->json([
            'authenticated' => request()->authenticated
        ]);*/
    }

    public function edit($id)
    {
        if (!$post = $this->post->first($id)) {
            Error::show();
        }

        require_once __DIR__ . "/../Views/Admin/editPost.php";
    }

    public function update($id)
    {
        if (!$this->post->first($id)) {
            Error::show();
        }

        $this->post->update($id, input()->all());

        return redirect(url('myPosts'));
    }

    public function delete($id)
    {
        if (!$this->post->first($id)) {
            Error::show();
        }

        $this->post->delete($id);

        return redirect(url('myPosts'));
    }
}