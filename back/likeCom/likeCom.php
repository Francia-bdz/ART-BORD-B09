<?php
////////////////////////////////////////////////////////////
//
//  CRUD LIKEART (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : likeCom.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// CRUD NON FINI PAR LE GROUPE

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Likecom

require_once __DIR__ . '/../../class_crud/likecom.class.php';

// Instanciation de la classe Likeart

$monLikeCom= new LIKECOM();



?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Like sur Commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <style type="text/css">
        * {
            font-family: 'Roboto';
        }
        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
            border-radius: 5px;
        }
        .OK {
            padding: 2px;
            border: solid 0px black;
            color: deeppink;
            font-style: italic;
            border-radius: 5px;
        }
        .KO {
            padding: 2px;
            border: solid 0px black;
            color: darkgoldenrod;
            font-style: italic;
            border-radius: 5px;
        }
        h2{
            text-align: center;
        }

        i{
            color: #137E85;
        }

        a{
            text-decoration: transparent;
            transition: all 0.1s ease-in-out;
        }

        a:hover{
            text-decoration: underline;
            text-decoration-color: #137E85;
        }
        table{
            border-collapse: collapse;
            margin: auto;
            background-color: white;
            border: 2px;
        }
    </style>
</head>
<body>
<?php 
    require_once __DIR__ . '/../cover.php';
    ?>
    <h1>BLOGART22 Admin - CRUD Like sur Commentaire</h1>

    <hr />
    <h2>Nouveau like sur Commentaire :&nbsp;<a href="./createLikeCom.php"><i>Créer un like</i></a></h2>
    <hr />
    <h2>Tous les likes par membre, par commentaire et par article</h2>

    <table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;Membre&nbsp;</th>
            <th>&nbsp;Article&nbsp;</th>
            <th>&nbsp;Commentaire&nbsp;</th>
            <th>&nbsp;Statut&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php
    // Appel méthode : Get tous les users en BDD

    $allLikesCom = $monLikeCom->get_AllLikesCom();
    // Boucle pour afficher
    foreach ($allLikesCom as $row) {


?>
        <tr>
        <td><h4>&nbsp; <?= $row["pseudoMemb"]; ?> &nbsp;</h4></td>

        <td>&nbsp; <?= $row["libTitrArt"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["libCom"]; ?> &nbsp;</td>

        <td>&nbsp;<span class="OK">&nbsp; <?= $row["likeC"]; ?> &nbsp;</span></td>

        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./updateLikeCom.php"><i><img src="./../../img/valider-png.png" width="20" height="20" alt="Modifier like commentaire" title="Modifier like commentaire" /></i></a><br>&nbsp;&nbsp;<span class="error">(Un)like</span>&nbsp;
        <br /></td>

        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./deleteLikeCom.php"><i><img src="./../../img/supprimer-png.png" width="20" height="20" alt="Supprimer like commentaire" title="Supprimer like commentaire" /></i></a><br>&nbsp;&nbsp;<span class="error">(S/Admin)</span>&nbsp;
        <br /></td>
        </tr>
<?php
    }   // End of foreach
?>
    </tbody>
    </table>

    <p>&nbsp;</p>
<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
