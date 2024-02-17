<?php
session_start(); // Démarrer la session pour gérer l'authentification

include_once "connect_db.php"; // Inclure le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête pour vérifier les informations de connexion
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Utilisateur authentifié avec succès, enregistrer les détails dans la session
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Rediriger l'utilisateur vers la page de tableau de bord
        header("Location: dashboard.php");
    } else {
        // Informer l'utilisateur que les informations de connexion sont incorrectes
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il tente d'accéder à ce script sans soumettre le formulaire
    header("Location: login.php");
}
?>
