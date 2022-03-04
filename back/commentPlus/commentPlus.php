<?php
////////////////////////////////////////////////////////////
//
//  CRUD COMMENTPLUS (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : commentPlus.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';
// Mise en forme date
require_once __DIR__ . '/../../util/dateChangeFormat.php';

// Insertion classe Comment

require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';

// Instanciation de la classe Comment

$monComment = new COMMENT ();

// Insertion classe CommentPlus

require_once __DIR__ . '/../../CLASS_CRUD/commentplus.class.php';

// Instanciation de la classe CommentPlus
$monCommentPlus= new COMMENTPLUS ();


// Insertion classe Article

require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';

// Instanciation de la classe ARTICLE
$monArticle = new ARTICLE ();



?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <title>Gestion des Commentaires & Réponses</title>
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
  <h1>BLOGART22 Admin - Gestion du CRUD Commentaires & Réponses</h1>

  <hr /><br />
  <h2>Nouveau commentaire sur un commentaire :&nbsp;<a href="#"><i>Créer une réponse à commentaire</i></a></h2>
  <br />
    <hr />
  <h2>Toutes les commentaires & commentaires</h2>

  <table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;Numéro <br>Article&nbsp;</th>
            <th>&nbsp;Date <br>Article&nbsp;</th>
            <th>&nbsp;Numéro <br>Comment&nbsp;</th>
            <th>&nbsp;Commentaire&nbsp;</th>
            <th>&nbsp;Date <br>Comment&nbsp;</th>

            <th>&nbsp;Pseudo&nbsp;</th>
            <th>&nbsp;Visa modération&nbsp;</th>
            <th>&nbsp;Visible après modération&nbsp;</th>
            <th>&nbsp;Commentaire <br>si non visible&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php
    // Format date en FR
    $from = 'Y-m-d H:i:s';
    $to = 'd/m/Y H:i:s';

    // Appel méthode : Get tous les articles en BDD

    $allCommentsPlus= $monCommentPlus->get_AllCommentPlus();

    
    // Boucle pour afficher
    foreach ($allCommentsPlus as $row) {

        $dtCreArt = dateChangeFormat($row['dtCreArt'], $from, $to);

?>
        <tr>
        <td><h4>&nbsp; <?= $row["numArt"]; ?> &nbsp;</h4></td>

        <td><h4>&nbsp; <?= $dtCreArt; ?> &nbsp;</h4></td>

        <td>&nbsp; <?= $row["numSeqComR"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["libCom"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["dtCreCom"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["pseudoMemb"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["attModOK"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["notifComKOAff"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["delLogiq"]; ?> &nbsp;</td>
<!-- F1 aff Comments (Modérateur / Admin / Super-admin) -->
        <td>&nbsp;<a href="#"><i>Modifier</i></a>&nbsp;
        <br /></td>
<!-- Del logique (Modérateur / Admin / Super-admin) -->
        <td>&nbsp;<a href="#" title="Suppression logique..."><i>Supprimer</i></a><br>&nbsp;&nbsp;<span class="error">(Logique)</span>&nbsp;
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
