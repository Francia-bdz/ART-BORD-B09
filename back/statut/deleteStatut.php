<?php
////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : deleteStatut.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';
// Del accents sur string
require_once __DIR__ . '/../../util/delAccents.php';

// Insertion classe Statut
require_once __DIR__ . '/../../class_crud/statut.class.php';

// Instanciation de la classe Statut
$monStatut = new STATUT();

// Ctrl CIR
// Insertion classe User
require_once __DIR__ . '/../../class_crud/user.class.php';

// // Instanciation de la classe User
$monUser = new USER();

// // Insertion classe Membre
require_once __DIR__ . '/../../class_crud/membre.class.php';

// Instanciation de la classe Membre
$monMembre = new MEMBRE();

// Gestion des erreurs de saisie
$erreur = false;

// Gestion du $_SERVER["REQUEST_METHOD"] => En POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if (isset($_POST['Submit'])) {
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_POST["Submit"])) and ($Submit === "Annuler")) {
        header("Location: ./statut.php");
    }

    if ((!empty($_POST['Submit']) and ($Submit === "Valider"))) {


        $idStat = ctrlSaisies(($_POST['id']));

        $arrayUser = $monUser->get_NbAllUsersByidStat($idStat);
        $arrayMembre = $monMembre->get_NbAllMembersByidStat($idStat);

        $countUser = $arrayUser[0];
        $countMembre = $arrayMembre[0];

        if ($countMembre < 1 and $countUser < 1) {

            $erreur = false;
            $monStatut->delete($idStat);
            header("Location: ./statut.php");
        } else {
            $count = 1;
            header("Location: ./statut.php?count=" . $count);
        }
    } else {

        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }
}

include __DIR__ . '/initStatut.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Statut</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        #p1 {
            max-width: 600px;
            width: 600px;
            max-height: 200px;
            height: 200px;
            border: 1px solid #000000;
            background-color: whitesmoke;
            /* Coins arrondis et couleur du cadre */
            border: 2px solid grey;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
        }

        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>BLOGART22 Admin - CRUD Statut</h1>
    <h2>Suppression d'un statut</h2>
    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $oneStatut = $monStatut->get_1Statut($id);
        $idStat = $oneStatut['idStat'];
        $libStat = $oneStatut['libStat'];
    }


    ?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>

            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

            <div class="control-group">
                <label class="control-label" for="libStat"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>" disabled="disabled" />
            </div>

            <div class="control-group">
                <div class="controls">
                    <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Annuler" style="cursor:pointer; padding:5px 20px; background-color:black; border:Opx; border-radius:5px; color:white;" name="Submit" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:black; border:Opx; border-radius:5px; color:white;" name="Submit" />
                    <br>
                </div>
            </div>
        </fieldset>
    </form>
    <br>
    <i>
        <div class="error"><br>=>&nbsp;Attention, une suppression doit respecter les CIR !</div>
    </i>
    <?php
    require_once __DIR__ . '/footerStatut.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>