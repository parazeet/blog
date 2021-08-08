<?php

namespace App\Model;

class Post
{
    private $conn;
    private $table_name = "posts";

    public $id;
    public $user_id;
    public $title;
    public $body;
    public $img;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
        $this->created_at = $this->updated_at = date('Y-m-d H:i:s');
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

    public function create(array $data): bool
    {
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    title=:title, body=:body, img=:img, created_at=:created_at";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $data['title']);
        $stmt->bindParam(":body", $data['body']);
        $stmt->bindParam(":img", $data['img']);
        $stmt->bindParam(":created_at", $this->created_at);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function update()
    {
        $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                body = :price,
                img = :img,
                updated_at  = :updated_at
            WHERE
                id = :id";

        $stmt = $this->conn->prepare($query);
// править
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':img', $this->img);
        $stmt->bindParam(':updated_at', $this->updated_at);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

}