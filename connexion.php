<?php
// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "votre_nom_d_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "gestion_patients";

// Établir une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
?>