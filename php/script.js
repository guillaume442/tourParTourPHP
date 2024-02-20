function executerAction(joueur, action) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "action.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (this.status === 200) {
            try {
                var reponse = JSON.parse(this.responseText);
    
                document.getElementById('pvJoueur1').textContent = reponse.joueur1_pv;
                document.getElementById('pvJoueur2').textContent = reponse.joueur2_pv;
    
                // Désactivez tous les boutons après une action, sauf le bouton "Menu"
                document.querySelectorAll('button').forEach(function(btn) {
                    if (btn.id !== 'btnMenuPermanent') { // Excluez le bouton "Menu" en vérifiant son ID
                        btn.disabled = true;
                    }
                });
    
                // Réactivez les boutons pour l'autre joueur, sauf le bouton "Menu"
                var boutonsAdversaire = joueur === 'joueur1' ? 'joueur2' : 'joueur1';
                document.querySelectorAll('#' + boutonsAdversaire + ' button').forEach(function(btn) {
                    if (btn.id !== 'btnMenuPermanent') { // Excluez le bouton "Menu" en vérifiant son ID
                        btn.disabled = false;
                    }
                });
    
                // Vérifier si un vainqueur est déterminé et afficher un message
                if (reponse.winner) {
                    alert(reponse.winner);
                    // Désactivez tous les boutons pour empêcher d'autres actions, sauf le bouton "Menu"
                    document.querySelectorAll('button').forEach(function(btn) {
                        if (btn.id !== 'btnMenuPermanent') { // Excluez le bouton "Menu" en vérifiant son ID
                            btn.disabled = true;
                        }
                    });
                    // Assurez-vous que le bouton "Menu" reste activé
                    document.getElementById('btnMenuPermanent').disabled = false;
                }
    
            } catch (e) {
                console.error("Erreur lors de l'analyse de la réponse JSON: ", e);
            }
        } else {
            console.error("Erreur dans la requête : ", this.statusText);
        }
    };
    
    var data = "joueur=" + encodeURIComponent(joueur) + "&action=" + encodeURIComponent(action);
    xhr.send(data);
    
}

// La fonction initialiserJeu reste inchangée
function initialiserJeu() {
    var classeJoueur1 = document.getElementById('classeJoueur1').value;
    var classeJoueur2 = document.getElementById('classeJoueur2').value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "initialiserJeu.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if (this.status === 200) {
            document.getElementById('classeJoueur1Affiche').textContent = classeJoueur1;
            document.getElementById('classeJoueur2Affiche').textContent = classeJoueur2;
    
            document.getElementById('jeu').style.display = 'block';
            document.getElementById('choixClasse').style.display = 'none';
        }
    };
    xhr.send("classeJoueur1=" + encodeURIComponent(classeJoueur1) + "&classeJoueur2=" + encodeURIComponent(classeJoueur2));
}






