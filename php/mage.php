<?php
require_once 'Personnage.php';

class Mage extends Personnage {
    public function __construct($nom) {
        parent::__construct($nom);
        // Initialisation spécifique pour le mage
    }

    public function capaciteSpeciale(Personnage $cible) {
        // Implémentation spécifique pour le mage
    }
}
