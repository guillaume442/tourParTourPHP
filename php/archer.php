<?php

require_once 'Personnage.php';

class Archer extends Personnage {
    
    public function __construct($nom, $pv) {
        parent::__construct($nom, $pv);
    }

    public function attack() {

        return rand(5, 15);
    }

    public function special() {

        return rand(10, 20);
    }

}


