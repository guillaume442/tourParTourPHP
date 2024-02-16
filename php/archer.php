<?php

require_once 'Personnage.php';

class Archer extends Personnage {
    
    public function __construct($nom, $pv) {
        parent::__construct($nom, $pv); // Appel au constructeur parent
    }

    public function attack() {
        // Simule une attaque basique, retourne des dégâts simulés
        return rand(5, 15);
    }

    public function special() {
        // Action spéciale pouvant faire plus de dégâts
        return rand(10, 20);
    }

    // Pas besoin de redéfinir recevoirDegats si c'est la même logique que dans Personnage
}


