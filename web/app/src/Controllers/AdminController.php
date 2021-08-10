<?php

namespace App\Controllers;

use App\ConnectDB;

class AdminController
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
        require_once __DIR__ . "/../Views/Admin/myPosts.php";
    }

    public function create()
    {
        require_once __DIR__ . "/../Views/Admin/createPost.php";
    }

    public function store(): ?string
    {
        return response()->json([
            'method' => 'store'
        ]);
    }

    public function show($id): string
    {
        // The variable authenticated is set to true in the ApiVerification middleware class.
        return response()->json([
            'authenticated' => request()->authenticated
        ]);
    }

    public function edit($id): ?string
    {
        return response()->json([
            'method' => sprintf('edit: %s', $id),
        ]);
    }

    public function update($id): ?string
    {
        return response()->json([
            'method' => sprintf('update: %s', $id),
        ]);
    }

    public function destroy($id): ?string
    {
        return response()->json([
            'method' => sprintf('destroy: %s', $id),
        ]);
    }
}