<?php
session_start();
require_once 'Personnage.php';
require_once 'Archer.php';
require_once 'Guerrier.php';
require_once 'Pretre.php';
require_once 'Mage.php';

// Réinitialisez les objets joueur et stockez-les à nouveau dans la session à chaque chargement de la page
$_SESSION['joueur1'] = serialize(new Archer("Archer", 100));
$_SESSION['joueur2'] = serialize(new Guerrier("Guerrier", 100));

$joueur1 = unserialize($_SESSION['joueur1']);
$joueur2 = unserialize($_SESSION['joueur2']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour par tour</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<button id="btnMenuPermanent" onclick="window.location.reload()" 
style="position: fixed; top: 10px; right: 10px;">Choix des personnages</button>

<form id="choixClasse">
    <div>
        <label for="classeJoueur1">Joueur 1:</label>
        <select name="classeJoueur1" id="classeJoueur1">
            <option value="Archer">Archer</option>
            <option value="Guerrier">Guerrier</option>
            <option value="Pretre">Prêtre</option>
            <option value="Mage">Mage</option>
        </select>
    </div>
    <div>
        <label for="classeJoueur2">Joueur 2:</label>
        <select name="classeJoueur2" id="classeJoueur2">
            <option value="Archer">Archer</option>
            <option value="Guerrier">Guerrier</option>
            <option value="Pretre">Prêtre</option>
            <option value="Mage">Mage</option>
        </select>
    </div>
    <button type="button" onclick="initialiserJeu()">Commencer le Jeu</button>
</form>

<!-- Conteneur pour les options de jeu, caché initialement -->
<div id="jeu" style="display: none;">
    <div id="joueur1" class="joueur">
        <h2>Joueur 1: <span id="classeJoueur1Affiche">Archer</span></h2>
        <p>Points de vie: <span id="pvJoueur1">100</span></p>
        <button type="button" onclick="executerAction('joueur1', 'attack')">Attaquer</button>
        <button type="button" onclick="executerAction('joueur1', 'special')">Spécial</button>
    </div>

    <div id="joueur2" class="joueur">
        <h2>Joueur 2: <span id="classeJoueur2Affiche">Guerrier</span></h2>
        <p>Points de vie: <span id="pvJoueur2">100</span></p>
        <button type="button" onclick="executerAction('joueur2', 'attack')">Attaquer</button>
        <button type="button" onclick="executerAction('joueur2', 'special')">Spécial</button>
    </div>
</div>

<!-- <button id="btnMenu" style="display: none;" onclick="window.location.reload()">Menu</button> -->


<script src="script.js"></script>
</body>
</html>
