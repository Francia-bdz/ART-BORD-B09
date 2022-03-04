<?php
////////////////////////////////////////////////////////////
//
//  CRUD KANGUE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : deleteLangue.php  -  (ETUD)  BLOGART22
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

$monPays = new PAYS();


// Ctrl CIR
// Insertion classe Angle
require_once __DIR__ . '/../../class_crud/angle.class.php';

// Instanciation de la classe Angle

$monAngle = new angle();

// Insertion classe Thematique
require_once __DIR__ . '/../../class_crud/thematique.class.php';

// Instanciation de la classe Thematique
$maThematique = new THEMATIQUE();


// Insertion classe Motcle
require_once __DIR__ . '/../../class_crud/motcle.class.php';
// Instanciation de la classe Motcle
$monMotcle = new motcle();


// Gestion des erreurs de saisie
$erreur = false;

// Gestion du $_SERVER["REQUEST_METHOD"] => En post
if ($_SERVER["REQUEST_METHOD"] === "post") {


    $numLang = ctrlSaisies(($_post['id']));

    if (isset($_post['Submit'])) {
        $Submit = $_post['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_post["Submit"])) and ($Submit === "Annuler")) {
        header("Location: ./langue.php");
    }


    if ((!empty($_post['Submit']) and ($Submit === "Valider"))) {
        // Saisies valides
        $erreur = false;

        $numLang = ctrlSaisies(($_post['id']));

        $arrayTheme = $maThematique->get_NbAllThematiquesBynumLang($numLang);
        $arrayAngle = $monAngle->get_NbAllAnglesBynumLang($numLang);
        $arrayMotcle = $monMotcle->get_NbAllMotsclesBynumLang($numLang);

        $countTheme = $arrayTheme[0];
        $countAngle = $arrayAngle[0];
        $countMotcle = $arrayMotcle[0];

        if ($countTheme < 1 and $countAngle < 1 and $countMotcle < 1) {
            $erreur = false;

            $numLang = ctrlSaisies(($_post['id']));

            $maLangue->delete($numLang);

            header("Location: ./langue.php");
        } else {
            $count = 1;
            header("Location: ./langue.php?count=" . $count);
        }
    }
}

include __DIR__ . '/initLangue.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Langue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>
    <h1>BLOGART22 Admin - CRUD Langue</h1>
    <h2>Suppression d'une langue</h2>
    <?php


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $oneLangue = $maLangue->get_1Langue($id);
        $numLang = $oneLangue['numLang'];
        $lib1Lang = $oneLangue['lib1Lang'];
        $lib2Lang = $oneLangue['lib2Lang'];
        $numPays = $oneLangue['numPays'];
        $frPays = $oneLangue['frPays'];
    } else {
        echo ("Aucune langue n'a été choisis, retournez dans sur la page d'accueil ");
    }


    ?>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>

            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

            <div class="control-group">
                <label class="control-label" for="lib1Lang"><b>Libellé court :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="lib1Lang" id="lib1Lang" size="80" maxlength="80" value="<?= $lib1Lang; ?>" tabindex="10" disabled /><br>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="lib2Lang"><b>Libellé long :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="lib1Lang" id="lib2Lang" size="80" maxlength="80" value="<?= $lib2Lang; ?>" tabindex="20" disabled />
            </div>
            <br>
            <!-- --------------------------------------------------------------- -->
            <div class="control-group">
                <div class="controls">

                    <label for="LibTypPays" title="Sélectionnez le pays !">
                        <b>Pays :&nbsp;&nbsp;&nbsp;</b>
                    </label>
                    <input type="hidden" id="idPays" name="idPays" value="<?= $numPays; ?> " disabled />
                    <select size="1" name="TypPays" id="TypPays" class="form-control form-control-create" title="Sélectionnez le pays !" disabled>
                        <option value="-1">- - - Choisissez un pays - - -</option>
                        <?php
                        $listNumPays = "";
                        $listfrPays = "";

                        $result = $monPays->get_AllPays();

                        if ($result) {
                            foreach ($result as $row) {
                                $listNumPays = $row["numPays"];
                                $listfrPays = $row["frPays"];
                                if ($numPays == $row['numPays']) {
                        ?>
                                    <option value="<?= $listNumPays; ?>" selected disabled>
                                        <?= $listfrPays; ?>
                                    </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $listNumPays; ?>" disabled>
                                        <?= $listfrPays; ?>
                                    </option>
                        <?php
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- --------------------------------------------------------------- -->
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
    require_once __DIR__ . '/footerLangue.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>