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

// Traitement des fichiers
$lettre_motivation = file_get_contents(isset($_FILES['lettre_motivation']['tmp_name']) ? $_FILES['lettre_motivation']['tmp_name'] : '');
$cv = file_get_contents(isset($_FILES['cv']['tmp_name']) ? $_FILES['cv']['tmp_name'] : '');

// Préparation de la requête SQL
$sql = "INSERT INTO candidature (nom_poste, nom_prenom, contact, email, message, lettre_motivation, cv) VALUES (?, ?, ?, ?, ?, ?, ?)";

// Utilisation d'une requête préparée pour des raisons de sécurité
$stmt = $conn->prepare($sql);

// Vérification de la préparation de la requête
if ($stmt) {
    // 'b' dans bind_param est utilisé pour le type de données BLOB
    $stmt->bind_param("sssssss", $nom_poste, $nom_prenom, $contact, $email, $message, $lettre_motivation, $cv);

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

// Fermeture de la connexion
$conn->close();
?>
