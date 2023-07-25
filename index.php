<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Patients</title>
</head>
<body>
    <h1>Liste des Patients</h1>
    <ul>
        <?php
        // Inclure le fichier de connexion à la base de données
        include 'connexion.php';

        // Fonction pour lister les patients
        function listerPatients($conn)
        {
            $sql = "SELECT * FROM patients";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["prenom"] . " " . $row["nom"] . " - Date de naissance : " . $row["date_naissance"] . " - Adresse : " . $row["adresse"] . " [<a href='modifier_patient.php?id=" . $row["id"] . "'>Modifier</a>] [<a href='supprimer_patient.php?id=" . $row["id"] . "'>Supprimer</a>]</li>";
                }
            } else {
                echo "<li>Aucun patient trouvé.</li>";
            }
        }

        // Appeler la fonction pour lister les patients
        listerPatients($conn);
        ?>
    </ul>

    <h2>Ajouter un nouveau patient</h2>
    <form action="ajouter_patient.php" method="post">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="date_naissance">Date de naissance :</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br>

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required><br>

        <input type="submit" value="Ajouter">
    </form>

    <h2>Enregistrement d'un Rendez-vous</h2>
    <form action="enregistrer_rendezvous.php" method="post">
        <!-- Ici, vous pouvez ajouter les champs nécessaires pour enregistrer un rendez-vous -->
        <!-- Par exemple : le choix du patient, la date et l'heure du rendez-vous, le motif, etc. -->
        <input type="submit" value="Enregistrer Rendez-vous">
    </form>

    <h2>Liste des Rendez-vous</h2>
    <ul>
        <?php
        // Fonction pour lister les rendez-vous
        function listerRendezVous($conn)
        {
            $sql = "SELECT rendez_vous.date_heure, patients.prenom, patients.nom, rendez_vous.motif FROM rendez_vous INNER JOIN patients ON rendez_vous.patient_id = patients.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<li>Date et heure : " . $row["date_heure"] . ", Patient : " . $row["prenom"] . " " . $row["nom"] . ", Motif : " . $row["motif"] . "</li>";
                }
            } else {
                echo "<li>Aucun rendez-vous trouvé.</li>";
            }
        }

        // Appeler la fonction pour lister les rendez-vous
        listerRendezVous($conn);
        ?>
    </ul>
</body>
</html>
