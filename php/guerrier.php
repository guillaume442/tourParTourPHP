<?php

require_once 'Personnage.php';

class Guerrier extends Personnage {
    
    public function __construct($nom, $pv) {
        parent::__construct($nom, $pv);
    }

    public function attack() {

        return rand(10, 20);
    }

    public function special() {

        return rand(15, 30);
    }
}


