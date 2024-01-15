<?php
// Connexion à la base de données (assurez-vous de remplacer les valeurs par les vôtres)
$conn = new mysqli("localhost", "root", "", "recrutementbd");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Préparation de la requête SQL d'insertion
    $sql_insert = "INSERT INTO jobs (titre, date, description) VALUES (?, ?, ?)";

    // Utilisation d'une requête préparée pour des raisons de sécurité
    $stmt = $conn->prepare($sql_insert);

    // Vérification de la préparation de la requête
    if ($stmt) {
        // 'sss' dans bind_param est utilisé pour les types de données string
        $stmt->bind_param("sss", $titre, $date, $description);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "L'emplois ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout du job : " . $stmt->error;
        }

        // Fermeture de la requête préparée
        $stmt->close();
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
}

// Fermer la connexion à la base de donnée
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Formulaire d'Emploi</title>
    <style>
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }
    </style>
</head>
<body>

<a href="job.php">Retour</a>
<br><br>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form class="konnect-form" id="jobForm" action="add-job.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="titre" class="form-label">Titre de l'emploi</label>
                                <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrer le titre" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Date de l'emploi</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="Entrer la date" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description de l'emploi</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description de l'emploi" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Soumettre</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
