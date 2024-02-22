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
    

                document.querySelectorAll('button').forEach(function(btn) {
                    if (btn.id !== 'btnMenuPermanent') {
                        btn.disabled = true;
                    }
                });
    

                var boutonsAdversaire = joueur === 'joueur1' ? 'joueur2' : 'joueur1';
                document.querySelectorAll('#' + boutonsAdversaire + ' button').forEach(function(btn) {
                    if (btn.id !== 'btnMenuPermanent') {
                        btn.disabled = false;
                    }
                });
    

                if (reponse.winner) {
                    alert(reponse.winner);

                    document.querySelectorAll('button').forEach(function(btn) {
                        if (btn.id !== 'btnMenuPermanent') {
                            btn.disabled = true;
                        }
                    });

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






