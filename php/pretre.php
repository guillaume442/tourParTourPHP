<?php

require_once 'Personnage.php';

class Pretre extends Personnage {
    
    public function __construct($nom, $pv) {
        parent::__construct($nom, $pv);
    }

    public function attack() {
        return rand(5, 10);
    }

    public function special() {
        return rand(-20, 15);
    }
}

