<?php
////////////////////////////////////////////////////////////
//
//  CRUD MOTCLE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : motCle.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe MotCle

require_once __DIR__ . '/../../class_crud/motcle.class.php';

// Instanciation de la classe Thematique
$monMotcle = new MOTCLE();


?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <title>Admin - CRUD Mot Clé</title>
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
    <h1>BLOGART22 Admin - CRUD Mot Clé</h1>

    <hr />
    <h2>Nouveau Mot Clé :&nbsp;<a href="./createMotCle.php"><i>Créer un Mot Clé</i></a></h2>
    <hr />
    <h2>Tous les Mots Clés</h2>

    <table border="3" bgcolor="aliceblue">
        <thead>
            <tr>
                <th>&nbsp;Numéro&nbsp;</th>
                <th>&nbsp;Nom Mot Clé&nbsp;</th>
                <th>&nbsp;Langue&nbsp;</th>
                <th colspan="2">&nbsp;Action&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $allMotscles = $monMotcle->get_AllMotCles();

            // Boucle pour afficher
            foreach ($allMotscles as $row) {
            ?>
                <tr>

                    <td>
                        <h4>&nbsp; <?= $row['numMotCle']; ?> &nbsp;</h4>
                    </td>

                    <td>&nbsp; <?= $row['libMotCle']; ?> &nbsp;</td>

                    <td>&nbsp; <?= $row['lib1Lang']; ?> &nbsp;</td>

                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="./updateMotCle.php?id=<?= $row['numMotCle']; ?>"><i><img src="./../../img/valider-png.png" width="20" height="20" alt="Modifier mot clé" title="Modifier mot clé" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="./deleteMotCle.php?id=<?= $row['numMotCle']; ?>"><i><img src="./../../img/supprimer-png.png" width="20" height="20" alt="Supprimer mot clé" title="Supprimer mot clé" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <br />
                    </td>

                </tr>
            <?php
            }    // End of foreach
            ?>
        </tbody>
    </table>
    <br /><br />
    <?php
    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>