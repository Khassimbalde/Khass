<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

// Vérifier si l'identifiant du patient à modifier est passé en paramètre d'URL
if (isset($_GET["id"])) {
    $patient_id = $_GET["id"];

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Récupérer les données du formulaire
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $date_naissance = $_POST["date_naissance"];
        $adresse = $_POST["adresse"];

        // Préparer la requête SQL pour mettre à jour les informations du patient
        $sql = "UPDATE patients SET nom='$nom', prenom='$prenom', date_naissance='$date_naissance', adresse='$adresse' WHERE id=$patient_id";

        if ($conn->query($sql) === TRUE) {
            // Rediriger vers la page d'accueil après la mise à jour du patient
            header("Location: index.php");
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }

    // Récupérer les informations du patient à partir de la base de données
    $sql = "SELECT * FROM patients WHERE id=$patient_id";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $prenom = $row["prenom"];
        $nom = $row["nom"];
        $date_naissance = $row["date_naissance"];
        $adresse = $row["adresse"];
    } else {
        echo "Aucun patient trouvé.";
    }
} else {
    echo "Identifiant du patient manquant.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier le Patient</title>
</head>
<body>
    <h1>Modifier le Patient</h1>
    <form action="" method="post">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" required><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required><br>

        <label for="date_naissance">Date de naissance :</label>
        <input type="date" id="date_naissance" name="date_naissance" value="<?php echo $date_naissance; ?>" required><br>

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo $adresse; ?>" required><br>

        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>