<?php

class Archer {
    public $nom;
    public $pv;

    public function __construct($nom, $pv) {
        $this->nom = $nom;
        $this->pv = $pv;
    }

    public function getPv() {
        return $this->pv;
    }

    public function attack() {
        // Simule une attaque basique, retourne des dégâts simulés
        return rand(5, 15);
    }

    public function special() {
        // Action spéciale pouvant faire plus de dégâts
        return rand(10, 25);
    }

    public function recevoirDegats($degats) {
        $this->pv -= $degats;
        if ($this->pv < 0) {
            $this->pv = 0;
        }
    }
}

