<?php
// nom de votre serveur (ou 127.0.0.1)
$hostBD = "plateforme-mmi.iut.u-bordeaux-montaigne.fr";
$hostBD = 'localhost';
// nom BD
$nomBD = "db_mmi_09";
// Serveur
// Avec encodage UTF8
$serverBD = "mysql:dbname=$nomBD;host=$hostBD;charset=utf8";

// nom utilisateur de connexion à la BDD
$userBD = 'etummiuser_db_09';         // Votre login
// mot de passe de connexion à la BDD
$passBD = 'mmi-etu';         // Votre Pass

// nom utilisateur de connexion à la BDD
$userBD = 'etummiuser_db_09';         // Votre login
// mot de passe de connexion à la BDD
$passBD = 'mmi-etu';



define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/etu-mmi-09');

define('ROOTFRONT', "http://" . $_SERVER['SERVER_NAME'] . '/etu-mmi-09'); 

//host : plateforme-mmi.iut.u-bordeaux-montaigne.fr
//user : etummiuser_db_XX
//pwd : mmi-etu