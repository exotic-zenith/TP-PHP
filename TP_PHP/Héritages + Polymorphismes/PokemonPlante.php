<?php
require_once 'Pokemon.php';

class PokemonPlante extends Pokemon {
    public function getType() {
        return 'plante';
    }

    public function attack(Pokemon $opponent) {
        $damage = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);
        if (rand(1, 100) <= $this->attackPokemon->probabilitySpecialAttack) {
            $damage *= $this->attackPokemon->specialAttack;
        }

        $opponentType = $opponent->getType();
        if ($opponentType === 'eau') {
            $damage *= 2;
        } elseif ($opponentType === 'feu' || $opponentType === 'plante') {
            $damage *= 0.5;
        }

        $opponent->hp -= $damage;
        if ($opponent->hp < 0) $opponent->hp = 0;

        return $damage;
    }
}
?>
