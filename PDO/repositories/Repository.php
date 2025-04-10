<?php
// models/Repository.php

require_once __DIR__ . '/../config/database.php';

class Repository
{
    protected $table;
    protected $conn;

    public function __construct($table)
    {
        $this->table = $table;

        $database = new Database();
        $this->conn = $database->getConnection();

        if (!$this->conn) {
            die("Database connection failed.");
        }
    }

    public function findAll()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error while autheticating' . $e->getMessage());
        }
    }

    public function findById(int $id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Error while autheticating' . $e->getMessage());
        }
    }

    public function create($data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));

            $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
            $stmt = $this->conn->prepare($sql);

            foreach ($data as $key => $val) {
                $stmt->bindValue(":$key", $val);
            }

            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('Error while autheticating' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('Error while autheticating' . $e->getMessage());
        }
    }
}
?>