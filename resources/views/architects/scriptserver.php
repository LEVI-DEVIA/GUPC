<?php
// Vérifiez si la requête est une requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $formData = $_POST;

    // Ajout de la connexion à votre base de données (à adapter selon votre configuration)
    $servername = "127.0.0.1";
    $username = "root";
    $password = "root";
    $dbname = "GUPCBD";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion à la base de données
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupération de l'ID de l'utilisateur (à adapter selon votre authentification)
    // Supposons qu'il soit stocké dans une variable de session appelée "user_id"
    $user_id = $_SESSION["user_id"]; // Assurez-vous d'avoir démarré la session

    // Préparation de la requête SQL
    $sql = "INSERT INTO demandes_permis (user_id, nature_projet, visa, est_operation_immobiliere, classe_projet, ...autres_champs...) 
            VALUES ('$user_id', '$formData[nature_projet]', '$formData[visa]', '$formData[est_operation_immobiliere]', '$formData[classe_projet]', ...autres_valeurs...)";
    
    // Exécution de la requête
    if ($conn->query($sql) === TRUE) {
        echo "Formulaire soumis avec succès !";
    } else {
        echo "Erreur lors de l'insertion dans la base de données : " . $conn->error;
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
} else {
    // Gérer d'autres types de requêtes si nécessaire
    http_response_code(400); // Requête incorrecte
    echo "Requête invalide !";
}
?>
