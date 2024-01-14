<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recrutementbd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Using prepared statements to prevent SQL injection
    $nom_prenom = $_POST["nom_prenom"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $description = $_POST["description"];

    // Prepare and bind the SQL statement
    $sql = $conn->prepare("INSERT INTO contacts (nom_prenom, contact, email, description) VALUES (?, ?, ?, ?)");

    // Bind parameters
    $sql->bind_param("ssss", $nom_prenom, $contact, $email, $description);

    // Execute the prepared statement
    if ($sql->execute()) {
        header("Location: succes_contact.html");
        exit();
    } else {
        echo "Error: " . $sql->error;
    }

    // Close the prepared statement
    $sql->close();
}

// Close the database connection
$conn->close();
?>
