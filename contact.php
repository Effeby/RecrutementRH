<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-admin</title>
</head>
<body>
    <a href="admin_dashboard.php">Retour</a>
    <br><br>
<?php
// Connexion à la base de données (assurez-vous de remplacer les valeurs par les vôtres)
$conn = new mysqli("localhost", "root", "", "recrutementbd");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données de la table "contact"
$sql = "SELECT * FROM contacts";
$resultat = $conn->query($sql);

// Vérifier s'il y a des enregistrements
if ($resultat->num_rows > 0) {
    // Afficher les données dans un tableau HTML
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nom et Prénom</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Description</th>
            </tr>";

    // Afficher les données de chaque enregistrement
    while ($row = $resultat->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_contacts']}</td>
                <td>{$row['nom_prenom']}</td>
                <td>{$row['contact']}</td>
                <td>{$row['email']}</td>
                <td>{$row['description']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Aucun enregistrement trouvé.";
}

// Fermer la connexion à la base de données
$conn->close();
?>

</body>
</html>