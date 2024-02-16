function executerAction(joueur, action) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "action.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (this.status === 200) {
            try {
                // Analyse la réponse JSON du serveur
                var reponse = JSON.parse(this.responseText);

                // Met à jour l'interface utilisateur avec les nouveaux points de vie
                document.getElementById('pvJoueur1').textContent = reponse.joueur1_pv;
                document.getElementById('pvJoueur2').textContent = reponse.joueur2_pv;
            } catch (e) {
                console.error("Erreur lors de l'analyse de la réponse JSON: ", e);
            }
        } else {
            console.log("Erreur dans la requête : ", this.statusText);
        }
    };

    var data = "joueur=" + encodeURIComponent(joueur) + "&action=" + encodeURIComponent(action);
    xhr.send(data);
}

function initialiserJeu() {
    var classeJoueur1 = document.getElementById('classeJoueur1').value;
    var classeJoueur2 = document.getElementById('classeJoueur2').value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "initialiserJeu.php", true); // Assurez-vous d'avoir ce fichier PHP prêt à gérer cette requête
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if (this.status === 200) {
            // Mettre à jour l'affichage avec les classes choisies
            document.getElementById('classeJoueur1Affiche').textContent = classeJoueur1;
            document.getElementById('classeJoueur2Affiche').textContent = classeJoueur2;
    
            // Afficher les options de jeu
            document.getElementById('jeu').style.display = 'block';
            // Masquer le formulaire de choix de classe
            document.getElementById('choixClasse').style.display = 'none';
        }
    };
    xhr.send("classeJoueur1=" + encodeURIComponent(classeJoueur1) + "&classeJoueur2=" + encodeURIComponent(classeJoueur2));
}