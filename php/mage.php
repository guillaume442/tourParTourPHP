<?php

require_once 'Personnage.php';

class Mage extends Personnage {
    
    public function __construct($nom, $pv) {
        parent::__construct($nom, $pv);
    }

    public function attack() {
        return rand(8, 18);
    }

    public function special() {
        return rand(20, 35);
    }
}

