<?php

namespace App\Controllers;

class AdminController
{
    public function index()
    {
        require_once __DIR__ . "/../Views/Admin/indexAdmin.php";
        /*return response()->json([
            'method' => 'index'
        ]);*/
    }

    public function store(): ?string
    {
        return response()->json([
            'method' => 'store'
        ]);
    }

    public function create(): ?string
    {
        return response()->json([
            'method' => 'create'
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