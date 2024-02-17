<?php
include_once "connect_db.php"; // Inclure le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête pour insérer les nouvelles informations utilisateur dans la base de données
    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', 'membre')";

    if (mysqli_query($conn, $sql)) {
        // Informer l'utilisateur que l'inscription a réussi
        echo "Inscription réussie.";
    } else {
        // Informer l'utilisateur s'il y a une erreur lors de l'inscription
        echo "Erreur d'inscription: " . mysqli_error($conn);
    }
} else {
    // Rediriger l'utilisateur vers la page d'inscription s'il tente d'accéder à ce script sans soumettre le formulaire
    header("Location: register.php");
}
?>
