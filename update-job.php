<?php
// Connexion à la base de données (assurez-vous de remplacer les valeurs par les vôtres)
$conn = new mysqli("localhost", "root", "", "recrutementbd");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification si les données du formulaire sont soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_job = $_POST['id_job'];
    $titre = $_POST['titre'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Mise à jour des données dans la table "jobs"
    $sql_update_job = "UPDATE jobs SET titre='$titre', date='$date', description='$description' WHERE id_job=$id_job";
    $resultat_update_job = $conn->query($sql_update_job);

    if ($resultat_update_job) {
        echo "Les modifications ont été enregistrées avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du job : " . $conn->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
