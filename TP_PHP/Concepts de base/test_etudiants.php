<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des Étudiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .student-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .student-table th, .student-table td {
            border: 1px solid #e0e0e0;
            padding: 12px;
            text-align: center;
            width: 50%;
        }
        .student-table th {
            background-color:rgb(225, 221, 221); /* Bleu clair pour les noms */
            color: #000000; /* Noir pour le texte des noms */
        }
        .note-red {
            background-color: #ffcdd2; /* Rouge pastel */
            color: #000000; /* Noir pour les nombres */
        }
        .note-orange {
            background-color: #ffe0b2; /* Orange pastel */
            color: #000000; /* Noir pour les nombres */
        }
        .note-green {
            background-color: #c8e6c9; /* Vert pastel */
            color: #000000; /* Noir pour les nombres */
        }
        .average-row td {
            background-color:rgb(197, 231, 255); /* Même bleu que les noms */
            color: #000000; /* Noir pour les moyennes */
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #e3f2fd;
            padding-bottom: 10px;
        }
        h2 {
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Concepts de base</h1>
    <h2>Exercice</h2>

    <?php
    class Etudiant {
        private $nom;
        private $notes;

        public function __construct($nom, $notes) {
            $this->nom = $nom;
            $this->notes = $notes;
        }

        public function getNom() {
            return $this->nom;
        }

        public function getNotes() {
            return $this->notes;
        }

        public function calculerMoyenne() {
            if (empty($this->notes)) return 0;
            return array_sum($this->notes) / count($this->notes);
        }
    }

    // Création des étudiants
    $aymen = new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]);
    $skander = new Etudiant("Skander", [15, 9, 8, 16]);

    // Affichage du tableau
    echo '<table class="student-table">';
    echo '<tr><th>'.$aymen->getNom().'</th><th>'.$skander->getNom().'</th></tr>';
    
    $max_rows = max(count($aymen->getNotes()), count($skander->getNotes()));
    
    for ($i = 0; $i < $max_rows; $i++) {
        echo '<tr>';
        
        // Cellule Aymen
        if ($i < count($aymen->getNotes())) {
            $note = $aymen->getNotes()[$i];
            $class = $note < 10 ? 'note-red' : ($note > 10 ? 'note-green' : 'note-orange');
            echo '<td class="'.$class.'">'.$note.'</td>';
        } else {
            echo '<td></td>';
        }
        
        // Cellule Skander
        if ($i < count($skander->getNotes())) {
            $note = $skander->getNotes()[$i];
            $class = $note < 10 ? 'note-red' : ($note > 10 ? 'note-green' : 'note-orange');
            echo '<td class="'.$class.'">'.$note.'</td>';
        } else {
            echo '<td></td>';
        }
        
        echo '</tr>';
    }
    
    // Ligne des moyennes
    echo '<tr class="average-row">';
    echo '<td>Votre moyenne est '.$aymen->calculerMoyenne().'</td>';
    echo '<td>Votre moyenne est '.round($skander->calculerMoyenne(), 1).'</td>';
    echo '</tr>';
    
    echo '</table>';
    ?>
</body>
</html>