<?php
// models/Student.php

class Student {
    private ?int $id;
    private string $name;
    private DateTime $birthday;
    private int $section_id;

    public function __construct(string $name, string $birthday, int $section_id, ?int $id = null) {
        if (empty(trim($name))) {
            throw new InvalidArgumentException("Le nom ne peut pas être vide");
        }

        try {
            $this->birthday = new DateTime($birthday);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Format de date invalide");
        }

        $this->id = $id;
        $this->name = htmlspecialchars(trim($name), ENT_QUOTES, 'UTF-8');
        $this->section_id = $section_id;
    }

    // Getters seulement (immutable)
    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getBirthday(): DateTime { return $this->birthday; }
    public function getSectionId(): int { return $this->section_id; }
}