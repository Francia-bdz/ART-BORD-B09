<?php
////////////////////////////////////////////////////////////
//
//  CRUD ANGLE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : angle.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Angle

require_once __DIR__ . '/../../class_crud/angle.class.php';

// Instanciation de la classe angle

$monAngle = new ANGLE();


// Ctrl CIR
$errCIR = 0;

$errDel = 0;


if (isset($_GET['count'])) {
    $errCIR = $_GET['count'];
}

?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <title>Admin - CRUD Angle</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Liu+Jian+Mao+Cao&family=Roboto:wght@200&display=swap" rel="stylesheet">
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
    <h1>BLOGART22 Admin - CRUD Angle</h1>

    <hr />
    <h2>Nouvel angle :&nbsp;<a href="./createangle.php"><i>Créer un angle</i></a></h2>
    <?php
    if ($errDel == 99) {
    ?>
        <br />
        <i>
            <div class="error"><br>=>&nbsp;Erreur delete ANGLE : la suppression s'est mal passée !</div>
        </i>
    <?php
    }   // End of if ($errDel == 99)
    ?>
    <hr />
    <h2>Tous les angles</h2>

    <table border="1"bgcolor="#FFFFFF">
        <thead>
            <tr>
                <th>&nbsp;Numéro&nbsp;</th>
                <th>&nbsp;Libellé&nbsp;</th>
                <th>&nbsp;Langue&nbsp;</th>
                <th colspan="2">&nbsp;Action&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Appel méthode : Get tous les angles en BDD
            $allAngles = $monAngle->get_AllAnglesByLang();
            // Boucle pour afficher
            foreach ($allAngles as $row) {

            ?>
                <tr>
                    <td>
                        <h4>&nbsp; <?= $row['numAngl']; ?> &nbsp;</h4>
                    </td>

                    <td>&nbsp; <?= $row['libAngl']; ?> &nbsp;</td>

                    <td>&nbsp; <?= $row['lib1Lang']; ?> &nbsp;</td>

                    <td>&nbsp;&nbsp;&nbsp;&nbsp<a href="./updateAngle.php?id=<?= $row['numAngl']; ?>"><i><img src="./../../img/valider-png.png" width="20" height="20" alt="Modifier angle" title="Modifier angle" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp
                        <br />
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp<a href="./deleteAngle.php?id=<?= $row['numAngl']; ?>"><i><img src="./../../img/supprimer-png.png" width="20" height="20" alt="Supprimer angle" title="Supprimer angle" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <br />
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    if ($errCIR == 1) {
    ?>
        <i>
            <div class="error"><br>=>&nbsp;Suppression impossible, existence d'article(s) associé(s) à cet angle. Vous devez d'abord supprimer le(s) angle(s) concerné(s).</div>
        </i>
    <?php
    }
    ?>
    <p>&nbsp;</p>
    <?php
    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>