<?php
// config/database.php

class Database
{
    private $host = "localhost";
    private $port = "5432";
    private $db_name = "postgres";
    private $username = "postgres";
    private $password = "root";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . "", $this->username, $this->password);

            // Erreurs affichées sous forme d'exceptions
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>