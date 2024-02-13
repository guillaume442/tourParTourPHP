<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour par tour</title>
</head>
<body>

    <div id="game">
        <div id="joueur1" class="joueur">
            <h2>Joueur 1</h2>
            <p>Points de vie : <span class="pv">100</span></p>
            <p>Points d'attaque : <span class="pa">10</span></p>
            <!-- Ajouter d'autres stats si nécessaire -->
            <button class="action" data-action="attaquer" data-cible="joueur2">Attaquer</button>
            <button class="action" data-action="capaciteSpeciale" data-cible="joueur2">Capacité Spéciale</button>
            <!-- Ajouter d'autres boutons pour les actions si nécessaire -->
        </div>
        
        <div id="joueur2" class="joueur">
            <h2>Joueur 2</h2>
            <p>Points de vie : <span class="pv">100</span></p>
            <p>Points d'attaque : <span class="pa">15</span></p>
            <!-- Ajouter d'autres stats si nécessaire -->
            <button class="action" data-action="attaquer" data-cible="joueur1">Attaquer</button>
            <button class="action" data-action="capaciteSpeciale" data-cible="joueur1">Capacité Spéciale</button>
            <!-- Ajouter d'autres boutons pour les actions si nécessaire -->
        </div>
    </div>

<!-- ------------------------------------------------------------------------------------------------------- -->

<?php
$host = "mysql"; // Remplacez par l'hôte de votre base de données
$port = "3306";
$dbname = "afci"; // Remplacez par le nom de votre base de données
$user = "admin"; // Remplacez par votre nom d'utilisateur
$pass = "admin"; // Remplacez par votre mot de passe

    // Création d'une nouvelle instance de la classe PDO
    $bdd = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);

    // Configuration des options PDO
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

//-----------------------------------------------PHP------------------------------------------------------------


class Personnage {
    protected $pointsDeVie;
    protected $pointsDAttaque;
    protected $pointsDeDefense;
    protected $nom;

    public function __construct($nom, $pointsDeVie, $pointsDAttaque, $pointsDeDefense) {
        $this->nom = $nom;
        $this->pointsDeVie = $pointsDeVie;
        $this->pointsDAttaque = $pointsDAttaque;
        $this->pointsDeDefense = $pointsDeDefense;
    }

    public function attaquer(Personnage $cible) {
        // Déterminer les points d'attaque de l'attaquant
        $pointsAttaque = $this->pointsAttaque;
    
        // Calculer les dégâts infligés en soustrayant la défense de la cible
        // On peut ajouter ici une logique pour des attaques critiques ou des échecs
        $degats = max(0, $pointsAttaque - $cible->getDefense());
    
        // Soustraire les dégâts des points de vie de la cible
        $cible->soustraireVie($degats);
    
        // Afficher un message résumant l'action
        echo $this->nom . " attaque " . $cible->getNom() . " et lui inflige " . $degats . " points de dégâts.";
    
        // Vérifier si la cible est vaincue
        if (!$cible->estVivant()) {
            echo $cible->getNom() . " a été vaincu!";
        }
    }
    

    public function subirDegats($degats) {
        // Soustraction des dégâts reçus des points de vie du personnage
        $this->pointsVie -= $degats;
    
        // Affichage d'un message indiquant les dégâts reçus
        echo $this->nom . " subit " . $degats . " points de dégâts.";
    
        // Vérification si les points de vie tombent à zéro ou en dessous
        if ($this->pointsVie <= 0) {
            $this->vivant = false; // Le personnage n'est plus considéré comme vivant
            echo $this->nom . " est vaincu.";
        }
    }
    

    public function capaciteSpeciale() {
        echo $this->nom . " utilise sa capacité spéciale.";
    }
}


?>

<script src="combat.js"></script>
</body>
</html>
