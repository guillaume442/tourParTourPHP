<?php

require_once 'Personnage.php';

class Pretre extends Personnage {
    
    public function __construct($nom, $pv) {
        parent::__construct($nom, $pv);
    }

    public function attack() {
        // Simule une attaque, peut-être moins puissante, retourne des dégâts simulés pour le Prêtre
        return rand(5, 10);
    }

    public function special() {
        // Action spéciale pouvant soigner ou faire un sort de soin
        // Pour l'exemple, cette méthode pourrait soit soigner, soit infliger des dégâts. À ajuster selon vos besoins.
        return rand(-20, 15); // Les valeurs négatives pourraient représenter un soin
    }
}

