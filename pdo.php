<?php
//recupération des données grâce à la méthode POST
$nom=$_POST['nom'];
$prenoms=$_POST['prenoms'];
$email=$_POST['email'];
$password=$_POST['password'];

//Connexion à la base de données
$host='localhost';
$dbname='utilisateurs';
$username='root';
$password_db='franklin00@@'

try {
    $pdo= new PDO("mysql:host=$host;dbname=$dbname",$username, $password_db);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //requete d'insertion
    $sql= "INSERT INTO utilisateurs (nom, prenoms, email, mot_de_passe) VALUES (:nom, :prenoms, :email, :password)";
    

    //executer les requetes pour eviter les attaques d'injection sql
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenoms', $prenoms);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    

    echo "Les données ont été enregistrées avec succès";
} catch (PDOException $e) {
    // Gestion d'erreur
    echo "Erreur de connexion : " . $e->getMessage();
}
?>