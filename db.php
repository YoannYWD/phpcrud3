<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dsn = "mysql:host=localhost;dbname=cinema";
$username = "root";
$password = "Arinfo/2021";
$options = [];
$connection = new PDO($dsn, $username, $password, $options); // connection en instance de PDO
try { // fonction d'exception
    print "Connexion réussie 😎";
} catch(PDOException $e) { //fonction qui permet d'afficher le message d'erreur si try ne fonctionne pas
    print "error : " . $e->getMessage();
    die();
}



?>