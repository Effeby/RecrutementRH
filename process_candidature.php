<?php
// Connexion à la base de données (assurez-vous de remplacer les valeurs par les vôtres)
$conn = new mysqli("localhost", "root", "", "recrutementBD");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom_poste = isset($_POST['nom_poste']) ? $_POST['nom_poste'] : '';
$nom_prenom = isset($_POST['nom_prenom']) ? $_POST['nom_prenom'] : '';
$contact = isset($_POST['contact']) ? $_POST['contact'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Répertoire de stockage des fichiers
$uploadDir = 'uploads/';

// Traitement des fichiers
$cv_tmp = isset($_FILES['cv']['tmp_name']) ? $_FILES['cv']['tmp_name'] : '';

$cv_nom = $uploadDir . basename($_FILES['cv']['name']);

// Vérification de la taille des fichiers
$maxFileSize = 5 * 1024 * 1024; // 5 Mo

if ($_FILES['cv']['size'] > $maxFileSize) {
    die("La taille des fichiers dépasse la limite autorisée.");
}

// Déplacer les fichiers téléchargés vers le répertoire d'upload
if (move_uploaded_file($cv_tmp, $cv_nom)) {
    // Préparation de la requête SQL
    $sql = "INSERT INTO candidature (nom_poste, nom_prenom, contact, email, message, cv) VALUES (?, ?, ?, ?, ?, ?)";

    // Utilisation d'une requête préparée pour des raisons de sécurité
    $stmt = $conn->prepare($sql);

    // Vérification de la préparation de la requête
    if ($stmt) {
        // 'b' dans bind_param est utilisé pour le type de données BLOB
        $stmt->bind_param("ssssss", $nom_poste, $nom_prenom, $contact, $email, $message, $cv_nom);

        // Exécution de la requête
        if ($stmt->execute()) {
            header("Location: succes.html"); // Rediriger vers la page de succès
            exit();
        } else {
            echo "Erreur lors de l'enregistrement de la candidature: " . $stmt->error;
        }

        // Fermeture de la connexion
        $stmt->close();
    } else {
        echo "Erreur lors de la préparation de la requête: " . $conn->error;
    }
} else {
    echo "Erreur lors du téléchargement des fichiers.";
}

// Fermeture de la connexion
$conn->close();
?>
