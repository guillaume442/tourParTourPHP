<?php
session_start();

require_once 'Personnage.php';

class Pretre extends Personnage {
    // Propriétés spécifiques au Prêtre
    private $pouvoirDeGuérison;

    public function __construct($pointsDeVie, $pointsDAttaque, $pointsDeDefense, $pouvoirDeGuérison) {
        parent::__construct($pointsDeVie, $pointsDAttaque, $pointsDeDefense);
        $this->pouvoirDeGuérison = $pouvoirDeGuérison;
    }

    // Getters et Setters pour les propriétés spécifiques
    public function getPouvoirDeGuérison() {
        return $this->pouvoirDeGuérison;
    }

    public function setPouvoirDeGuérison($pouvoirDeGuérison) {
        $this->pouvoirDeGuérison = $pouvoirDeGuérison;
    }

    // Surcharge de la méthode capaciteSpeciale de la classe parente
    public function capaciteSpeciale() {
        // Logique de la capacité spéciale du prêtre
        // Par exemple, guérir un allié ou soi-même
    }

    // Autres méthodes spécifiques au prêtre si nécessaire
    // ...
}

// Vous pouvez créer une instance du prêtre ici ou le faire ailleurs dans votre application
// $pretre = new Pretre(100, 10, 5, 20);
