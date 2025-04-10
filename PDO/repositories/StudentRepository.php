<?php
// models/StudentRepository.php

require_once 'Repository.php';

class StudentRepository extends Repository {
    public function __construct() {
        parent::__construct("student");
    }

    public function findAllWithSection(): array {
        try {
            $sql = "SELECT student.*, section.name AS section_name 
                    FROM student
                    INNER JOIN section ON student.section_id = section.id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results ?: [];
            
        } catch (PDOException $e) {
            throw new RuntimeException("Erreur lors de la récupération des étudiants: " . $e->getMessage());
        }
    }

    public function update(int $id, array $data): bool {
        // Validation des données requises
        $requiredKeys = ['name', 'birthday', 'section_id'];
        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $data)) {
                throw new InvalidArgumentException("La clé '$key' est manquante");
            }
        }

        try {
            // Nettoyage des données
            $name = htmlspecialchars(trim($data['name']), ENT_QUOTES, 'UTF-8');
            $birthday = $data['birthday'];
            $sectionId = (int)$data['section_id'];

            // Vérification date valide
            if (!DateTime::createFromFormat('Y-m-d', $birthday)) {
                throw new InvalidArgumentException("Format de date invalide (Y-m-d attendu)");
            }

            $stmt = $this->conn->prepare("
                UPDATE student 
                SET name = :name, 
                    birthday = :birthday, 
                    section_id = :section_id 
                WHERE id = :id
            ");

            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":birthday", $birthday, PDO::PARAM_STR);
            $stmt->bindParam(":section_id", $sectionId, PDO::PARAM_INT);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();
            
            return $stmt->rowCount() > 0;
            
        } catch (PDOException $e) {
            throw new RuntimeException("Erreur lors de la mise à jour: " . $e->getMessage());
        }
    }
}