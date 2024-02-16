<?php
session_start();

require_once 'Personnage.php';
require_once 'Archer.php';
require_once 'Guerrier.php';
require_once 'Pretre.php';
require_once 'Mage.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $classeJoueur1 = $_POST['classeJoueur1'];
    $classeJoueur2 = $_POST['classeJoueur2'];

    // Initialiser les objets des joueurs en fonction des classes choisies
    $_SESSION['joueur1'] = serialize(new $classeJoueur1($classeJoueur1, 100));
    $_SESSION['joueur2'] = serialize(new $classeJoueur2($classeJoueur2, 100));

    echo 'Initialisation réussie';
}