<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Jobs</title>
</head>
<body>
    <a href="admin_dashboard.php">Retour</a>
    <?php
    // Connexion à la base de données (assurez-vous de remplacer les valeurs par les vôtres)
    $conn = new mysqli("localhost", "root", "", "recrutementbd");

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Suppression d'un job si l'ID est passé en paramètre
    if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id'])) {
        $id_job = $_GET['id'];
        $sql_supprimer = "DELETE FROM jobs WHERE id_job = $id_job";
        $resultat_supprimer = $conn->query($sql_supprimer);

        if ($resultat_supprimer) {
            echo "emplois supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression du job : " . $conn->error;
        }
    }

    // Récupération des données de la table "jobs"
    $sql = "SELECT * FROM jobs";
    $resultat = $conn->query($sql);

    // Vérifier s'il y a des enregistrements
    if ($resultat->num_rows > 0) {
        // Afficher les données dans un tableau HTML avec des actions
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                    <th><a href='add-job.php'>Ajouter</a></th>
                </tr>";

        // Afficher les données de chaque enregistrement
        while ($row = $resultat->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id_job']}</td>
                    <td>{$row['titre']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['description']}</td>
                    <td>
                        <a href='?action=supprimer&id={$row['id_job']}'>Supprimer</a>
                        <a href='modif-job.php?id={$row['id_job']}'>Modifier</a>
                        


                    </td>
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
