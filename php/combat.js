document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('combat-form');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const formData = new FormData(form);

        fetch('combat.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Mettre à jour l'interface avec le résultat du combat
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

        // Le code JavaScript pour gérer les actions du jeu
        document.querySelectorAll('.action').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const action = this.dataset.action;
                const cible = this.dataset.cible;
                
                // Ici, vous feriez une requête AJAX à combat.php avec l'action et la cible
                // Puis mettez à jour l'interface utilisateur avec la réponse du serveur
            });
        });