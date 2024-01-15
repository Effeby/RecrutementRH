<?php
// Vos informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recrutementbd";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Vérification du formulaire soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs du formulaire
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Requête SQL pour vérifier l'existence de l'utilisateur dans la table "user"
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Vérification du résultat de la requête
    if ($result->num_rows > 0) {
        // L'utilisateur est authentifié avec succès
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Authentification échouée
        echo "<p class='error'>Nom d'utilisateur ou mot de passe incorrect.</p>";
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Connexion</h2>

    <form method="post" action="admin.php">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Se connecter">
    </form>
    <a href="index.html" style="padding-left:40%; text-decoration : none;">ACCUEIL</a>
</div>

</body>
</html>
