<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $date_naissance = $_POST["date_naissance"];
    $adresse = $_POST["adresse"];

    // Préparer la requête SQL pour insérer le nouveau patient dans la base de données
    $sql = "INSERT INTO patients (nom, prenom, date_naissance, adresse) VALUES ('$nom', '$prenom', '$date_naissance', '$adresse')";

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page d'accueil après l'ajout du patient
        header("Location: index.php");
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}
?>