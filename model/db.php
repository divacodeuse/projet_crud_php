<?php
$serveur = "localhost";
$user = "postgres";
$port = "5432";
$pwd = "php8";
$dbname = "gestion_produit_php";

$connexion = pg_connect("host=$serveur port=$port dbname=$dbname user=$user password=$pwd");

// if (!$connexion) {
//     echo "Erreur de connexion";
// } else {
//     echo "succes";
// }                             
?>