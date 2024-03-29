<?php
////////////////////////////////////////////////////////////
//
//  CRUD COMMENT (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : comment.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// CRUD NON FINI PAR LE GROUPE

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Mise en forme date
require_once __DIR__ . '/../../util/dateChangeFormat.php';

// Insertion classe Comment

require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';

// Instanciation de la classe COMMENT
$monComment = new COMMENT();


?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <title>Admin - CRUD Commentaire</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <style type="text/css">
        * {
            margin: 0%;
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
  <h1>BLOGART22 Admin - CRUD Commentaire</h1>

  <hr />
  <h2>Nouveau commentaire :&nbsp;<a href="./createComment.php"><i>Créer un commentaire</i></a></h2>
  <hr />
  <h2>Tous les commentaires</h2>

  <table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;Numéro&nbsp;<br>&nbsp;Article&nbsp;</th>
            <th>&nbsp;Numéro&nbsp;<br>&nbsp;Comment.&nbsp;</th>
            <th>&nbsp;Pseudo&nbsp;</th>
            <th>&nbsp;Date création&nbsp;<br>&nbsp;Commentaire&nbsp;</th>
            <th>&nbsp;Commentaire&nbsp;</th>
            <th>&nbsp;Date modération&nbsp;</th>
            <th>&nbsp;Commentaire&nbsp;<br>&nbsp;visible&nbsp;</th>
            <th>&nbsp;Justification&nbsp;modération&nbsp;<br>&nbsp;si non visible&nbsp;</th>
            <th>&nbsp;Delete&nbsp;<br>&nbsp;logique&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php
    // Format date en FR
    $from = 'Y-m-d H:i:s';
    $to = 'd/m/Y H:i:s';

    // Appel méthode : Get tous les comments en BDD
    $allComments= $monComment->get_AllCommentsByArticleByMemb();
    // Boucle pour afficher
    foreach ($allComments as $row) {

    // Boucle pour afficher
    //foreach($all as $row) {

        // date dtCreCom => FR
        $dtCreCom = dateChangeFormat($row['dtCreCom'], $from, $to);

        // date dtModCom => FR
         $dtModCom = dateChangeFormat($row['dtModCom'], $from, $to);
?>
        <tr>
        <td><h4>&nbsp; <?= $row["numArt"]; ?> &nbsp;</h4></td>

        <td><h4>&nbsp; <?= $row["numSeqCom"]; ?> &nbsp;</h4></td>

        <td>&nbsp; <?= $row["pseudoMemb"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $dtCreCom; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["libCom"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $dtModCom; ?> &nbsp;</td>


        <td>&nbsp;<span class="OK">&nbsp; <?= $row["attModOK"]; ?> &nbsp;</span></td>


        <td>&nbsp; <?= $row["notifComKOAff"]; ?> &nbsp;</td>


        <td>&nbsp;<span class="OK">&nbsp; <?= $row["delLogiq"]; ?> &nbsp;</span></td>


<!-- F1 aff Comments (Modérateur / Admin / Super-admin) -->
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./updateComment.php?id1=<?=$row["numSeqCom"]; ?>"><i><img src="./../../img/valider-png.png" width="20" height="20" alt="Modifier commentaire" title="Modifier commentaire" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <br /></td>

<!-- Del logique (Modérateur / Admin / Super-admin) -->
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./deleteComment.php?id1=<?=$row["numSeqCom"]; ?>"><i><img src="./../../img/supprimer-png.png" width="20" height="20" alt="Supprimer commentaire" title="Supprimer/rétablir commentaire" /></i></a><br>&nbsp;&nbsp;<span class="error">(Logique)</span>&nbsp;&nbsp;
        <br /></td>
        </tr>
<?php
     } // End of foreach
?>
    </tbody>
    </table>
    <p>&nbsp;</p>
<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
