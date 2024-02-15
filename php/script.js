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





