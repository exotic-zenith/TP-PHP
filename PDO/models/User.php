<?php
// models/User.php

class User
{
    private ?int $id;
    private string $username;
    private string $email;
    private string $role;

    public function __construct(?int $id = null, string $username, string $email, string $role)
    {
        if (empty(trim($username))) {
            throw new InvalidArgumentException("Le username ne peut pas être vide");
        }
        if (empty(trim($email)) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (empty(trim($email))) {
                throw new InvalidArgumentException("L'email ne peut pas être vide");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException("L'email est invalide");
            }
        }
        if (empty(trim($role))) {
            throw new InvalidArgumentException("Le role ne peut pas être vide");
        }

        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }

    // Getters seulement (immutable)
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): User
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("L'email est invalide");
        }
        $this->email = $email;
        return $this;
    }
    public function getRole(): string
    {
        return $this->role;
    }
    public function setRole(string $role): User
    {
        $this->role = $role;
        return $this;
    }

    public function __toString(): string {
        return "User[{$this->id}] {$this->username} - {$this->email} ({$this->role})";
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'role' => $this->role,
        ];
    }

    public static function fromArray(array $data): User {
        return new User(
            $data['id'] ?? null,
            $data['username'],
            $data['email'],
            $data['role']
        );
    }
}