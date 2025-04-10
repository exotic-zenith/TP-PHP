<?php
// models/User.php

require_once 'Repository.php';

class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("user");
    }

    public function authenticate($username, $password): bool
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username and password = :password");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return true;
            }
            // if ($user && password_verify($password, $user['password'])) {
            //     return true;
            // }
        } catch (PDOException $e) {
            throw new Exception('Error while autheticating' . $e->getMessage());
        }

        return false;
    }

    public function registerUser($username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 

        try {
            $stmt = $this->conn->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $hashedPassword);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('Error while registering user' . $e->getMessage());
        }
    }
}
