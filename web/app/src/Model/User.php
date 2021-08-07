<?php

namespace App\Model;

class User
{
    private $conn;
    private $table_name = "users";

    // свойства объекта
    public $id;
    public $name;
    public $email;
    public $password;
    public $timestamp;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function auth() {

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

    /*public function create($arr) {
        $allowed = array("name","surname","email"); // allowed fields
        $sql = "INSERT INTO users SET ".$this->pdoSet($allowed,$values);
        $stm = $dbh->prepare($sql);
        $stm->execute($values);
    }

    function pdoSet($allowed, &$values, $source = array()) {
        $set = '';
        $values = array();
        if (!$source) $source = &$_POST;
        foreach ($allowed as $field) {
            if (isset($source[$field])) {
                $set.="`".str_replace("`","``",$field)."`". "=:$field, ";
                $values[$field] = $source[$field];
            }
        }
        return substr($set, 0, -2);
    }*/
}