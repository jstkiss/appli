<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Bienvenue sur votre tableau de bord</h1>
    <?php
    session_start(); // Démarrer la session pour récupérer les informations de l'utilisateur connecté

    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['user_id'])) {
        echo "<p>Bienvenue, " . $_SESSION['username'] . "!</p>";
        echo "<p>Votre rôle : " . $_SESSION['role'] . "</p>";

        // Afficher différentes fonctionnalités en fonction du rôle de l'utilisateur
        if ($_SESSION['role'] == 'Admin') {
            // Afficher des fonctionnalités spécifiques pour l'administrateur
            echo "<p>Vous avez accès à toutes les fonctionnalités en tant qu'administrateur.</p>";
        } elseif ($_SESSION['role'] == 'Membre') {
            // Afficher des fonctionnalités spécifiques pour les membres
            echo "<p>Vous avez accès à certaines fonctionnalités en tant que membre.</p>";
        } else {
            // Par défaut, afficher un message pour les autres rôles (par exemple, Anonymous)
            echo "<p>Votre rôle ne permet pas d'accéder à des fonctionnalités spécifiques.</p>";
        }

        // Bouton de déconnexion
        echo "<a href='logout.php'>Se déconnecter</a>";
    } else {
        // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
        header("Location: login.php");
    }
    ?>
</body>
</html>
