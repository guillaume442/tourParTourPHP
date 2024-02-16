<?php

class Personnage {
    protected $nom;
    protected $pv;

    public function __construct($nom, $pv) {
        $this->nom = $nom;
        $this->pv = $pv;
    }

    public function getPv() {
        return $this->pv;
    }

    public function recevoirDegats($degats) {
        $this->pv -= $degats;
        if ($this->pv < 0) {
            $this->pv = 0;
        }
    }

    // Ces méthodes pourraient être abstraites si chaque classe enfant doit les implémenter différemment
    public function attack() {
        // Implémentation par défaut ou méthode abstraite
    }

    public function special() {
        // Implémentation par défaut ou méthode abstraite
    }
}
