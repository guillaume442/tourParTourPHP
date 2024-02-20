<?php

require_once 'Personnage.php';
require_once 'Archer.php';
require_once 'Guerrier.php';
require_once 'Pretre.php';
require_once 'Mage.php';

session_start();

if (!isset($_SESSION['tour'])) {
    $_SESSION['tour'] = 'joueur1';
}

// Vérifier si les objets joueur ont déjà été instanciés et stockés en session
if (!isset($_SESSION['joueur1'])) {
    $joueur1 = new Archer("Archer", 100);
    $_SESSION['joueur1'] = serialize($joueur1);
} else {
    $joueur1 = unserialize($_SESSION['joueur1']);
}

if (!isset($_SESSION['joueur2'])) {
    $joueur2 = new Guerrier("Guerrier", 100);
    $_SESSION['joueur2'] = serialize($joueur2);
} else {
    $joueur2 = unserialize($_SESSION['joueur2']);
}

// Traitement de la requête POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $joueurCible = $_POST['joueur']; // 'joueur1' ou 'joueur2'
    $action = $_POST['action']; // 'attack' ou 'special'
    $degats = 0;

    if ($_SESSION['tour'] !== $joueurCible) {
        echo json_encode(['erreur' => 'Ce n\'est pas votre tour']);
        exit;
    }

    if ($action == 'attack') {
        $degats = rand(5, 15);
    } elseif ($action == 'special') {
        $degats = rand(10, 25);
    }

    if ($joueurCible == 'joueur1') {
        $joueur2->recevoirDegats($degats);
    } else {
        $joueur1->recevoirDegats($degats);
    }

    $_SESSION['joueur1'] = serialize($joueur1);
    $_SESSION['joueur2'] = serialize($joueur2);

    // Détermination du vainqueur
    $winner = null;
    if ($joueur1->getPv() <= 0) {
        $winner = 'Joueur 2 est vainqueur!';
    } elseif ($joueur2->getPv() <= 0) {
        $winner = 'Joueur 1 est vainqueur!';
    }

    $response = [
        'joueur1_pv' => $joueur1->getPv(),
        'joueur2_pv' => $joueur2->getPv(),
        'winner' => $winner
    ];

    $_SESSION['tour'] = $_SESSION['tour'] === 'joueur1' ? 'joueur2' : 'joueur1';

    echo json_encode($response);
}



