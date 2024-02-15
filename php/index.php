<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour par tour</title>
</head>
<body>

<div id="joueur1" class="joueur">
    <h2>Joueur 1: Archer</h2>
    <p>Points de vie: <span id="pvJoueur1">100</span></p>
    <button type="button" onclick="executerAction('joueur1', 'attack')">Attaquer</button>
    <button type="button" onclick="executerAction('joueur1', 'special')">Spécial</button>
</div>

<div id="joueur2" class="joueur">
    <h2>Joueur 2: Guerrier</h2>
    <p>Points de vie: <span id="pvJoueur2">100</span></p>
    <button type="button" onclick="executerAction('joueur2', 'attack')">Attaquer</button>
    <button type="button" onclick="executerAction('joueur2', 'special')">Spécial</button>
</div>

<script src="script.js"></script>
</body>
</html>
