// Vérifier si l'utilisateur est connecté (vous devez mettre en place la logique de connexion côté serveur)
const isLoggedIn = true; // Remplacez ceci par votre logique de connexion

// Récupérer le nom d'utilisateur s'il est connecté
const username = "JohnDoe"; // Remplacez ceci par le nom d'utilisateur récupéré depuis votre serveur

// Afficher le message de bienvenue
if (isLoggedIn && username) {
    document.getElementById("userWelcome").innerText = `Bienvenue, ${username} !`;
}
