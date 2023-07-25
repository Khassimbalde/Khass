<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

// Vérifier si l'identifiant du patient à supprimer est passé en paramètre d'URL
if (isset($_GET["id"])) {
    $patient_id = $_GET["id"];

    // Préparer la requête SQL pour supprimer le patient de la base de données
    $sql = "DELETE FROM patients WHERE id=$patient_id";

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page d'accueil après la suppression du patient
        header("Location: index.php");
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Identifiant du patient manquant.";
}
?>