<?php

require_once 'Personnage.php';

class Mage extends Personnage {
    
    public function __construct($nom, $pv) {
        parent::__construct($nom, $pv);
    }

    public function attack() {
        // Simule une attaque magique, retourne des dégâts simulés pour le Mage
        return rand(8, 18);
    }

    public function special() {
        // Action spéciale pouvant faire un sort puissant
        return rand(20, 35);
    }
}

