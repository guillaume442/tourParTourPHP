<?php
session_start();
// Supposons que vous avez des instances de personnages créées quelque part dans votre projet
// $joueur1, $joueur2, etc.

require_once 'Personnage.php';
require_once 'Guerrier.php';
require_once 'Mage.php';
require_once 'Pretre.php';
require_once 'Archer.php';

session_start();

// Ici, vous devez initialiser vos personnages ou les récupérer de la session
// Pour cet exemple, disons que nous avons deux joueurs en session.
$joueur1 = $_SESSION['joueur1'];
$joueur2 = $_SESSION['joueur2'];

// Supposons que les données POST contiennent l'action et la cible
$action = $_POST['action']; // 'attaquer', 'defendre', 'capaciteSpeciale', etc.
$cible = $_POST['cible']; // 'joueur1', 'joueur2', etc.

switch ($action) {
    case 'attaquer':
        $joueur1->attaquer($joueur2);
        break;
    case 'capaciteSpeciale':
        $joueur1->capaciteSpeciale();
        break;
    // Ajoutez d'autres cas au besoin
}

// Après l'action, enregistrez l'état des joueurs
$_SESSION['joueur1'] = $joueur1;
$_SESSION['joueur2'] = $joueur2;

// Envoyez les données au client pour mise à jour de l'interface utilisateur
echo json_encode([
    'joueur1' => [
        'pointsDeVie' => $joueur1->getPointsDeVie(),
        // autres propriétés...
    ],
    'joueur2' => [
        'pointsDeVie' => $joueur2->getPointsDeVie(),
        // autres propriétés...
    ]
]);
