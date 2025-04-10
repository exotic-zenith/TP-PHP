<?php
// models/Section.php

class Section {
    private ?int $id;
    private string $name;

    public function __construct(string $name, ?int $id = null) {
        if (empty(trim($name))) {
            throw new InvalidArgumentException("Le nom ne peut pas être vide");
        }
        
        $this->id = $id;
        $this->name = trim($name);
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }
}