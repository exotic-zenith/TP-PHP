<?php
require_once 'AttackPokemon.php';

class Pokemon {
    public $name;
    public $url;
    public $hp;
    public $attackPokemon;

    public function __construct($name, $url, $hp, AttackPokemon $attackPokemon) {
        $this->name = $name;
        $this->url = $url;
        $this->hp = $hp;
        $this->attackPokemon = $attackPokemon;
    }

    public function isDead() {
        return $this->hp <= 0;
    }

    public function attack(Pokemon $opponent) {
        $damage = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);

        // Check for special attack
        if (rand(1, 100) <= $this->attackPokemon->probabilitySpecialAttack) {
            $damage *= $this->attackPokemon->specialAttack;
        }

        $opponent->hp -= $damage;
        if ($opponent->hp < 0) $opponent->hp = 0;

        return $damage;
    }

    public function whoAmI() {
        return [
            "name" => $this->name,
            "url" => $this->url,
            "hp" => $this->hp,
            "min" => $this->attackPokemon->attackMinimal,
            "max" => $this->attackPokemon->attackMaximal,
            "special" => $this->attackPokemon->specialAttack,
            "prob" => $this->attackPokemon->probabilitySpecialAttack,
        ];
    }

    public function getType() {
        return 'normal';
    }
    
}
?>
