<?php

require_once 'Personnage.php';

class Guerrier extends Personnage {
    
    public function __construct($nom, $pv) {
        parent::__construct($nom, $pv);
    }

    public function attack() {
        // Simule une attaque basique, retourne des dégâts simulés pour le Guerrier
        return rand(10, 20);
    }

    public function special() {
        // Action spéciale pouvant infliger plus de dégâts pour le Guerrier
        return rand(15, 30);
    }
}


