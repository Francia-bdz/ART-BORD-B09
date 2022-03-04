<?php
////////////////////////////////////////////////////////////
//
//  CRUD langue (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : langue.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Langue
require_once __DIR__ . '/../../class_crud/langue.class.php';

// Instanciation de la classe langue

$maLangue = new langue();


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
    <title>Admin - CRUD Langue</title>
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
    <h1>BLOGART22 Admin - CRUD Langue</h1>

    <hr />
    <h2>Nouvelle langue :&nbsp;<a href="./createLangue.php"><i>Créer une langue</i></a></h2>
    <?php
    if ($errDel == 99) {
    ?>
        <br />
        <i>
            <div class="error"><br>=>&nbsp;Erreur delete langue : la suppression s'est mal passée !</div>
        </i>
    <?php
    }   // End of if ($errDel == 99)
    ?>
    <hr />
    <h2>Toutes les langues</h2>

    <table border="3" bgcolor="aliceblue">
        <thead>
            <tr>
                <th>&nbsp;Numéro&nbsp;</th>
                <th>&nbsp;Nom court&nbsp;</th>
                <th>&nbsp;Nom long&nbsp;</th>
                <th>&nbsp;Pays&nbsp;</th>
                <th colspan="2">&nbsp;Action&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $allLangues = $maLangue->get_AllLangues();

            foreach ($allLangues as $row) {
            ?>
                <tr>
                    <td>
                        <h4>&nbsp; <?= $row['numLang']; ?> &nbsp;</h4>
                    </td>

                    <td>&nbsp; <?= $row['lib1Lang']; ?> &nbsp;</td>

                    <td>&nbsp; <?= $row['lib2Lang']; ?> &nbsp;</td>

                    <td>&nbsp; <?= $row['frPays']; ?> &nbsp;</td>

                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="./updateLangue.php?id=<?= $row['numLang']; ?>"><i><img src="./../../img/valider-png.png" width="20" height="20" alt="Modifier langue" title="Modifier langue" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="./deleteLangue.php?id=<?= $row['numLang']; ?>"><i><img src="./../../img/supprimer-png.png" width="20" height="20" alt="Supprimer langue" title="Supprimer langue" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <br />
                    </td>
                </tr>
            <?php
            }    // End of foreach
            ?>
        </tbody>
    </table>
    <?php
    if ($errCIR == 1) {
    ?>
        <i>
            <div class="error"><br>=>&nbsp;Suppression impossible, existence de thématique(s), angle(s) et/ou mot(s) clé(s) associé(s) à cette langue. Vous devez d'abord supprimer le(s) thématique(s), le(s) angle(s) ou le(s) mots clés concerné(s).</div>
        </i>
    <?php
    }   // End of if ($errCIR == 1)
    ?>
    <p>&nbsp;</p>
    <?php
    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>