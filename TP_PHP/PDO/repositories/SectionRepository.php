<?php
// models/SectionRepository.php

require_once 'Repository.php';

class SectionRepository extends Repository {
    public function __construct() {
        parent::__construct("section");
    }

    public function findById(int $id) {
        $stmt = $this->conn->prepare("SELECT * FROM section WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tu peux ajouter ici des méthodes personnalisées si besoin
}
