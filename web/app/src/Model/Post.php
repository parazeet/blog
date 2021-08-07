<?php

namespace App\Model;

class Post
{
    private $conn;
    private $table_name = "posts";

    // свойства объекта
    public $id;
    public $user_id;
    public $title;
    public $body;
    public $img;
    public $timestamp;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name /*. " WHERE user_id = :user_id"*/);
        $stmt->execute(/*['user_id' => $userId]*/);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function first($id) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}