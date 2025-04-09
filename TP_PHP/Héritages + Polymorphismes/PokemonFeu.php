<?php
require_once 'Pokemon.php';

class PokemonFeu extends Pokemon {
    public function getType() {
        return 'feu';
    }

    public function attack(Pokemon $opponent) {
        $damage = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);
        if (rand(1, 100) <= $this->attackPokemon->probabilitySpecialAttack) {
            $damage *= $this->attackPokemon->specialAttack;
        }

        // Type effectiveness
        $opponentType = $opponent->getType();
        if ($opponentType === 'plante') {
            $damage *= 2;
        } elseif ($opponentType === 'eau' || $opponentType === 'feu') {
            $damage *= 0.5;
        }

        $opponent->hp -= $damage;
        if ($opponent->hp < 0) $opponent->hp = 0;

        return $damage;
    }
}
?>
