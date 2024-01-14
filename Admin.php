<?php
// Connexion à la base de données
$servername = "localhost"; // Remplacez cela par l'adresse de votre serveur de base de données
$username = "root"; // Remplacez cela par votre nom d'utilisateur de base de données
$password = ""; // Remplacez cela par votre mot de passe de base de données
$dbname = "recrutementbd"; // Remplacez cela par le nom de votre base de données

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion a échoué : " . $e->getMessage());
}

// Vérifie si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        // Requête SQL préparée pour vérifier les informations d'identification
        $stmt = $conn->prepare("SELECT * FROM user WHERE username=:username AND password=:password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Vérifie s'il y a une correspondance
        if ($stmt->rowCount() > 0) {
            echo "Connexion réussie !"; // Vous pouvez rediriger l'utilisateur vers une autre page ici
        } else {
            echo "Identifiants incorrects.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Ferme la connexion à la base de données
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
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

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Se connecter">
    </form>

    <?php
    // Affiche les erreurs ici, si nécessaire
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($e)) {
        echo '<div class="error">Erreur : ' . $e->getMessage() . '</div>';
    }
    ?>

</div>

</body>
</html>
