<?php
////////////////////////////////////////////////////////////
//
//  CRUD motcle (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : deleteMotCle.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

require_once __DIR__ . '/../../class_crud/motcle.class.php';

// Instanciation de la classe motcle
$monMotcle = new motcle();

// Insertion classe Langue
require_once __DIR__ . '/../../class_crud/langue.class.php';
// Instanciation de la classe Langue
$maLangue = new langue();

// Gestion du $_SERVER["REQUEST_METHOD"] => En post
if ($_SERVER["REQUEST_METHOD"] === "post") {

    $numMotCle = ctrlSaisies(($_post['id']));

    if (isset($_post['Submit'])) {
        $Submit = $_post['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_post["Submit"])) and ($Submit === "Annuler")) {
        header("Location: ./motCle.php");
    }

    if ((!empty($_post['Submit']) and ($Submit === "Valider"))) {
        // Saisies valides

        $numMotCle = ctrlSaisies(($_post['id']));

        $monMotcle->delete($numMotCle);

        header("Location: ./motCle.php");
    } else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }
}   // Fin if ($_SERVER["REQUEST_METHOD"] === "post")
// Init variables form
include __DIR__ . '/initMotCle.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Mot Clé</title>
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
            /* Coins arrondis et couleur cadre */
            border: 2px solid grey;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <h1>BLOGART22 Admin - CRUD Mot Clé</h1>
    <h2>Suppression d'un Mot Clé</h2>
    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $oneMotCle = $monMotcle->get_1MotCle($id);
        $numLang = $oneMotCle['numLang'];
        $lib1Lang = $oneMotCle['lib1Lang'];
        $libMotCle = $oneMotCle['libMotCle'];
    }


    ?>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>

            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

            <div class="control-group">
                <label class="control-label" for="libMotCle"><b>Libellé :&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libMotCle" id="libMotCle" size="80" maxlength="100" value="<?= $libMotCle; ?>" disabled />
            </div>
            <br>
            <div class="control-group">

                <div class="controls">

                    <label for="LibTypLang" title="Sélectionnez la langue !">
                        <b>Langue :&nbsp;&nbsp;&nbsp;</b>
                    </label>
                    <input type="hidden" id="idLang" name="idLang" value="<?= ''; ?>" />
                    <select size="1" name="TypLang" id="TypLang" class="form-control form-control-create" title="Sélectionnez la langue !" disabled>
                        <option value="-1">- - - Choisissez une langue - - -</option>
                        <?php
                        $listNumLang = "";
                        $listlib1lang = "";

                        $result = $maLangue->get_AllLangues();

                        if ($result) {
                            foreach ($result as $row) {
                                $listNumLang = $row["numLang"];
                                $listlib1lang = $row["lib1Lang"];
                                if ($numLang == $row['numLang']) {
                        ?>
                                    <option value="<?= $listNumLang; ?>" selected disabled>
                                        <?= $listlib1lang; ?>
                                    </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $listNumLang; ?>" disabled>
                                        <?= $listlib1lang; ?>

                                    </option>
                        <?php

                                }
                            } 
                        }  
                        ?>
                    </select>
                </div>
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
    <?php
    require_once __DIR__ . '/footerMotCle.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>