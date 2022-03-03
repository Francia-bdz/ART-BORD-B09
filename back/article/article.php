<?php
////////////////////////////////////////////////////////////
//
//  CRUD ARTICLE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : article.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Mise en forme date
require_once __DIR__ . '/../../util/dateChangeFormat.php';

// Insertion classe Article
require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';

// Instanciation de la classe ARTICLE
$monArticle = new ARTICLE ();

?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<title>Admin - CRUD Article</title>
	<meta charset="utf-8" />
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
	<h1>BLOGART22 Admin - CRUD Article</h1>

	<hr />
	<h2>Nouvel article :&nbsp;<a href="./createArticle.php"><i>Créer un article</i></a></h2>
    <hr />
	<h2>Tous les articles</h2>

	<table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;N°&nbsp;</th>
            <th>&nbsp;Date&nbsp;</th>
            <th>&nbsp;Titre&nbsp;</th>
            <th>&nbsp;Chapeau&nbsp;</th>
            <th>&nbsp;Accroche&nbsp;</th>
            <th>&nbsp;Angle&nbsp;</th>
            <th>&nbsp;Thématique&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php
    $from = 'Y-m-d H:i:s';
    $to = 'd/m/Y H:i:s';

    $allArticles = $monArticle->get_AllArticlesByNumAnglNumThem();

    foreach($allArticles as $row) {

        $dtCreArt = dateChangeFormat($row['dtCreArt'], $from, $to);
?>
        <tr>
		<td><h4>&nbsp; <?= $row["numArt"]; ?> &nbsp;</h4></td>

        <td>&nbsp; <?= $dtCreArt; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["libTitrArt"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["libChapoArt"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["libAccrochArt"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["libAngl"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["libThem"]; ?> &nbsp;</td>

		<td>&nbsp;&nbsp;<a href="./updateArticle.php?id=<?=$row["numArt"]; ?>"><i><img src="./../../img/valider-png.png" width="20" height="20" alt="Modifier article" title="Modifier article" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<br /></td>
		<td>&nbsp;&nbsp;<a href="./deleteArticle.php?id=<?=$row["numArt"]; ?>"><i><img src="./../../img/supprimer-png.png" width="20" height="20" alt="Supprimer article" title="Supprimer article" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<br /></td>
        </tr>
<?php
	 }	
?>
    </tbody>
    </table>
    <br/>
<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
