<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Modifier un Job</title>
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

<a href="job.php">Retour à la liste des jobs</a>
<br><br>

<?php
// Connexion à la base de données (assurez-vous de remplacer les valeurs par les vôtres)
$conn = new mysqli("localhost", "root", "", "recrutementbd");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification si l'ID du job à modifier est passé en paramètre
if (isset($_GET['id'])) {
    $id_job = $_GET['id'];

    // Récupération des données du job à modifier
    $sql_select_job = "SELECT * FROM jobs WHERE id_job = $id_job";
    $resultat_select_job = $conn->query($sql_select_job);

    if ($resultat_select_job->num_rows > 0) {
        $row = $resultat_select_job->fetch_assoc();
        ?>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form class="konnect-form" id="jobForm" action="update-job.php" method="post">
                                <input type="hidden" name="id_job" value="<?php echo $row['id_job']; ?>">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="titre" class="form-label">Titre de l'emploi</label>
                                        <input type="text" class="form-control" id="titre" name="titre" value="<?php echo $row['titre']; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="date" class="form-label">Date de l'emploi</label>
                                        <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['date']; ?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Description de l'emploi</label>
                                        <textarea class="form-control" id="description" name="description" required><?php echo $row['description']; ?></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    } else {
        echo "Aucun enregistrement trouvé pour l'ID spécifié.";
    }
} else {
    echo "ID du job non spécifié.";
}

// Fermer la connexion à la base de données
$conn->close();
?>

</body>
</html>
