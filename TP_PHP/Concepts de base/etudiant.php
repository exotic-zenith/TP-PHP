<?php
class Etudiant {
    private $nom;
    private $notes;

    public function __construct($nom, $notes) {
        $this->nom = $nom;
        $this->notes = $notes;
    }

    public function afficherNotes() {
        echo "<h3>Notes de $this->nom :</h3>";
        echo "<ul>";
        foreach ($this->notes as $note) {
            $couleur = '';
            if ($note < 10) {
                $couleur = 'red';
            } elseif ($note > 10) {
                $couleur = 'green';
            } else {
                $couleur = 'orange';
            }
            echo "<li style='background-color: $couleur; padding: 5px; margin: 2px;'>$note</li>";
        }
        echo "</ul>";
    }
    public function calculerMoyenne() {
        if (empty($this->notes)) {
            return 0;
        }
        $somme = array_sum($this->notes);
        $nombreNotes = count($this->notes);
        return $somme / $nombreNotes;
    }

    public function estAdmis() {
        $moyenne = $this->calculerMoyenne();
        return $moyenne >= 10 ? "admis" : "non admis";
    }

    public function getNom() {
        return $this->nom;
    }

    public function getNotes() {
        return $this->notes;
    }
}
?>