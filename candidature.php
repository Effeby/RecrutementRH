<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Candidature</title>
</head>
<body>
<a href="admin_dashboard.php">Retour</a>
<br><br>
<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "recrutementbd";

// Vérifier la connexion
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérer les données de la table candidature
$sql = "SELECT * FROM candidature";
$resultat = $connexion->query($sql);

// Vérifier s'il y a des enregistrements
if ($resultat->num_rows > 0) {
    // Créer un tableau HTML pour afficher les données
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nom du Poste</th>
                <th>Nom et Prénom</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Message</th>
                <th>CV</th>
                <th>Actions</th>
            </tr>";

    // Afficher les données de chaque enregistrement
    while ($row = $resultat->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_candidature']}</td>
                <td>{$row['nom_poste']}</td>
                <td>{$row['nom_prenom']}</td>
                <td>{$row['contact']}</td>
                <td>{$row['email']}</td>
                <td>{$row['message']}</td>
                <td>" . basename($row['cv']) . "</td>
                <td>
                    <a href='?action=supprimer&id={$row['id_candidature']}'>Supprimer</a>
                    <a href='?action=telecharger&id={$row['id_candidature']}'>Télécharger CV</a>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Aucun enregistrement trouvé.";
}

// Code pour supprimer une candidature
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id'])) {
    $id_candidature = $_GET['id'];
    $sql_supprimer = "DELETE FROM candidature WHERE id_candidature = ?";
    $stmt_supprimer = $connexion->prepare($sql_supprimer);
    $stmt_supprimer->bind_param('i', $id_candidature);

    if ($stmt_supprimer->execute()) {
        echo "Candidature supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression de la candidature : " . $connexion->error;
    }

    $stmt_supprimer->close();
}

// Code pour télécharger le CV
if (isset($_GET['action']) && $_GET['action'] == 'telecharger' && isset($_GET['id'])) {
    $id_candidature = $_GET['id'];
    $sql_telecharger = "SELECT cv FROM candidature WHERE id_candidature = ?";
    $stmt_telecharger = $connexion->prepare($sql_telecharger);
    $stmt_telecharger->bind_param('i', $id_candidature);
    $stmt_telecharger->execute();
    $stmt_telecharger->store_result();

    if ($stmt_telecharger->num_rows > 0) {
        $stmt_telecharger->bind_result($chemin_cv);
        $stmt_telecharger->fetch();

        // Télécharger le CV
        if (file_exists($chemin_cv)) {
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($chemin_cv) . '"');
            readfile($chemin_cv);
        } else {
            echo "Fichier CV non trouvé.";
        }
    } else {
        echo "CV non trouvé.";
    }

    $stmt_telecharger->close();
}

// Fermer la connexion à la base de données
$connexion->close();
?>


</body>
</html>
