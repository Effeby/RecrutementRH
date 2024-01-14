<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <!-- Ajoutez ici vos liens vers les fichiers CSS, etc. -->
</head>
<body>

    <h2>Bienvenue, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Ceci est votre tableau de bord.</p>
    
    <!-- Ajoutez ici le contenu de votre tableau de bord -->

    <a href="logout.php">Déconnexion</a>

</body>
</html>
