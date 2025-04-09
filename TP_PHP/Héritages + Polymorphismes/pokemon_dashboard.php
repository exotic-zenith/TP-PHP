<?php
require_once 'Pokemon.php';

// Create Pokémons
//$pokemon1 = new Pokemon("Dracaufeu Gigamax", "pokemon1.png", 200, new AttackPokemon(10, 100, 2, 20));
//$pokemon2 = new Pokemon("Dracaufeu Gigamax", "pokemon2.png", 200, new AttackPokemon(30, 80, 4, 20));

$pokemon1 = new Pokemon("Charizard", "Charizard.png", 200, new AttackPokemon(10, 100, 4, 20));
$pokemon2 = new Pokemon("Cubone", "Cubone.png", 200, new AttackPokemon(10, 100, 4, 20));

// Round tracker
$rounds = [];
$roundNumber = 1;

// Play all rounds first
$initialPokemon1HP = $pokemon1->hp;
$initialPokemon2HP = $pokemon2->hp;

// Store initial state
$rounds[] = [
    'round' => 0, // Pre-battle state
    'damage1' => 0,
    'damage2' => 0,
    'hp1' => $initialPokemon1HP,
    'hp2' => $initialPokemon2HP
];

while (!$pokemon1->isDead() && !$pokemon2->isDead()) {
    // Damage this round
    $damage1 = $pokemon1->attack($pokemon2);
    $damage2 = $pokemon2->attack($pokemon1);

    // Store round info
    $rounds[] = [
        'round' => $roundNumber++,
        'damage1' => $damage1,
        'damage2' => $damage2,
        'hp1' => $pokemon1->hp,
        'hp2' => $pokemon2->hp
    ];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Combat Pokémon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .light-blue-header {
            background-color: #7dd3f0;
            color: black;
            padding: 10px;
        }

        .round-header {
            background-color: #e74c4c;
            color: black;
            padding: 10px;
        }

        .round-points {
            background-color: rgb(180, 180, 180);
            color: black;
            padding: 10px;
        }

        .pokemon-card {
            border: 1px solid #dee2e6;
            padding: 0;
            margin-bottom: 20px;
        }

        .pokemon-header-image {
            padding: 10px 15px;
        }

        .pokemon-stat {
            padding: 8px 15px;
            border-bottom: 1px solid #dee2e6;
        }

        .pokemon-stat:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container my-4">
        <!-- Header -->
        <div class="light-blue-header mb-3">
            <h4>Les combattants</h4>
        </div>

        <!-- Initial state -->
        <div class="row mb-4">
            <!-- Pokemon 1 initial state -->
            <div class="col-12 col-sm-6 col-md-6">
                <div class="pokemon-card">
                    <div class="pokemon-header-image">
                        <?= $pokemon1->name ?>
                        <div class="text-center mt-2">
                            <img src="<?= $pokemon1->url ?>" width="100" alt="Pokemon 1">
                        </div>
                    </div>
                    <div class="pokemon-stat">
                        Points : <?= $initialPokemon1HP ?>
                    </div>
                    <div class="pokemon-stat">
                        Min Attack Points : <?= $pokemon1->attackPokemon->attackMinimal ?>
                    </div>
                    <div class="pokemon-stat">
                        Max Attack Points : <?= $pokemon1->attackPokemon->attackMaximal ?>
                    </div>
                    <div class="pokemon-stat">
                        Special Attack : <?= $pokemon1->attackPokemon->specialAttack ?>
                    </div>
                    <div class="pokemon-stat">
                        Probability Special Attack : <?= $pokemon1->attackPokemon->probabilitySpecialAttack ?>
                    </div>
                </div>
            </div>

            <!-- Pokemon 2 initial state -->
            <div class="col-12 col-sm-6 col-md-6">
                <div class="pokemon-card">
                    <div class="pokemon-header-image">
                        <?= $pokemon2->name ?>
                        <div class="text-center mt-2">
                            <img src="<?= $pokemon2->url ?>" width="100" alt="Pokemon 2">
                        </div>
                    </div>
                    <div class="pokemon-stat">
                        Points : <?= $initialPokemon2HP ?>
                    </div>
                    <div class="pokemon-stat">
                        Min Attack Points : <?= $pokemon2->attackPokemon->attackMinimal ?>
                    </div>
                    <div class="pokemon-stat">
                        Max Attack Points : <?= $pokemon2->attackPokemon->attackMaximal ?>
                    </div>
                    <div class="pokemon-stat">
                        Special Attack : <?= $pokemon2->attackPokemon->specialAttack ?>
                    </div>
                    <div class="pokemon-stat">
                        Probability Special Attack : <?= $pokemon2->attackPokemon->probabilitySpecialAttack ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Skip the first element (initial state)
        for ($i = 1; $i < count($rounds); $i++):
            $round = $rounds[$i];
            ?>
            <!-- Round header -->
            <div class="round-header mb-0">
                Round <?= $round['round'] ?>
            </div>

            <!-- Damage display -->
            <div class="round-points text-center mb-3">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
<?= $round['damage1'] ?></div>
                    <div class="col-12 col-sm-6 col-md-6">
<?= $round['damage2'] ?></div>
                </div>
            </div>

            <?php if ($i < count($rounds) - 1): ?>
                <!-- Pokemon status after round -->
                <div class="row mb-4">
                    <!-- Pokemon 1 state -->
                    <div class="col-12 col-sm-6 col-md-6">

                        <div class="pokemon-card">
                            <div class="pokemon-header-image">
                                <?= $pokemon1->name ?>
                                <div class="text-center mt-2">
                                    <img src="<?= $pokemon1->url ?>" width="100" alt="Pokemon 1">
                                </div>
                            </div>
                            <div class="pokemon-stat">
                                Points : <?= $round['hp1'] ?>
                            </div>
                            <div class="pokemon-stat">
                                Min Attack Points : <?= $pokemon1->attackPokemon->attackMinimal ?>
                            </div>
                            <div class="pokemon-stat">
                                Max Attack Points : <?= $pokemon1->attackPokemon->attackMaximal ?>
                            </div>
                            <div class="pokemon-stat">
                                Special Attack : <?= $pokemon1->attackPokemon->specialAttack ?>
                            </div>
                            <div class="pokemon-stat">
                                Probability Special Attack : <?= $pokemon1->attackPokemon->probabilitySpecialAttack ?>
                            </div>
                        </div>
                    </div>

                    <!-- Pokemon 2 state -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="pokemon-card">
                            <div class="pokemon-header-image">
                                <?= $pokemon2->name ?>
                                <div class="text-center mt-2">
                                    <img src="<?= $pokemon2->url ?>" width="100" alt="Pokemon 2">
                                </div>
                            </div>
                            <div class="pokemon-stat">
                                Points : <?= $round['hp2'] ?>
                            </div>
                            <div class="pokemon-stat">
                                Min Attack Points : <?= $pokemon2->attackPokemon->attackMinimal ?>
                            </div>
                            <div class="pokemon-stat">
                                Max Attack Points : <?= $pokemon2->attackPokemon->attackMaximal ?>
                            </div>
                            <div class="pokemon-stat">
                                Special Attack : <?= $pokemon2->attackPokemon->specialAttack ?>
                            </div>
                            <div class="pokemon-stat">
                                Probability Special Attack : <?= $pokemon2->attackPokemon->probabilitySpecialAttack ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endfor; ?>

        <!-- Winner section -->
        <div class="bg-success text-white text-center p-4 mt-4">
            <h4>Le vainqueur est :</h4>
            <img src="<?= $pokemon1->isDead() ? $pokemon2->url : $pokemon1->url ?>" width="120" alt="Winner"><br>
            <h5 class="mt-2"><?= $pokemon1->isDead() ? $pokemon2->name : $pokemon1->name ?></h5>
        </div>
    </div>
</body>

</html>