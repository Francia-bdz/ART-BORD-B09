<?php
// $hostBD = "plateforme-mmi.iut.u-bordeaux-montaigne.fr";
// $hostBD = 'localhost';

// $nomBD = "db_mmi_09";

// $serverBD = "mysql:dbname=$nomBD;host=$hostBD;charset=utf8";


// $userBD = 'etummiuser_db_09';        
// $passBD = 'mmi-etu';        


// define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/etu-mmi-09');

// define('ROOTFRONT', "http://" . $_SERVER['SERVER_NAME'] . '/etu-mmi-09'); 

//host : plateforme-mmi.iut.u-bordeaux-montaigne.fr
//user : etummiuser_db_XX
//pwd : mmi-etu


// nom de votre serveur (ou 127.0.0.1)
$hostBD = "localhost";
// nom BD
$nomBD = "BLOGART22";
// Serveur
// Avec encodage UTF8
$serverBD = "mysql:dbname=$nomBD;host=$hostBD;charset=utf8";

// nom utilisateur de connexion à la BDD
$userBD = 'root';         // Votre login
// mot de passe de connexion à la BDD
$passBD = 'root';         // Votre Pass

 define('ROOT', $_SERVER['DOCUMENT_ROOT'] . "/ARTBORD/BLOGART22");

define('ROOTFRONT', "http://" . $_SERVER['SERVER_NAME'] . "/ARTBORD/BLOGART22"); 