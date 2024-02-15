function executerAction(joueur, action) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "action.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (this.status === 200) {
            console.log("Réponse du serveur:", this.responseText); // Affiche la réponse du serveur dans la console
        }
    };

    var data = "joueur=" + encodeURIComponent(joueur) + "&action=" + encodeURIComponent(action);
    xhr.send(data);
}


