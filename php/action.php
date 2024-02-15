<?php

session_start();

require_once 'Archer.php';
require_once 'Guerrier.php';

// Vérifier si les objets joueur ont déjà été instanciés et stockés en session
if (!isset($_SESSION['joueur1'])) {
    $_SESSION['joueur1'] = serialize(new Archer("Archer", 100));
}
if (!isset($_SESSION['joueur2'])) {
    $_SESSION['joueur2'] = serialize(new Guerrier("Guerrier", 100));
}

$joueur1 = unserialize($_SESSION['joueur1']);
$joueur2 = unserialize($_SESSION['joueur2']);

// Traitement de la requête
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $joueurCible = $_POST['joueur']; // 'joueur1' ou 'joueur2'
    $action = $_POST['action']; // 'attack' ou 'special'

    // Initialisation des dégâts à 0
    $degats = 0;

    // Appliquer l'action et ajuster les points de vie
    if ($action == 'attack') {
        $degats = rand(5, 15); // Simuler l'attaque avec des dégâts aléatoires
    } else if ($action == 'special') {
        $degats = rand(10, 25); // Simuler une action spéciale avec plus de dégâts
    }

    // Appliquer les dégâts à l'adversaire
    if ($joueurCible == 'joueur1') {
        $joueur1->recevoirDegats($degats);
    } else {
        $joueur2->recevoirDegats($degats);
    }

    // Sauvegarde de l'état mis à jour dans la session
    $_SESSION['joueur1'] = serialize($joueur1);
    $_SESSION['joueur2'] = serialize($joueur2);

    // Préparation de la réponse avec l'état mis à jour des joueurs
    $response = [
        'joueur1_pv' => $joueur1->getPv(),
        'joueur2_pv' => $joueur2->getPv(),
    ];

    // Envoi de la réponse en JSON
    echo json_encode($response);
}

