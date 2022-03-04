<?php
////////////////////////////////////////////////////////////
//
//  CRUD angle (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : updateAngle.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Angle
require_once __DIR__ . '/../../class_crud/angle.class.php';

// Instanciation de la classe angle

$monAngle = new angle();

// Insertion classe Langue
require_once __DIR__ . '/../../class_crud/langue.class.php';

// Instanciation de la classe langue

$maLangue = new langue();


// Gestion  erreurs de saisie
$erreur = false;

// Gestion du $_SERVER["REQUEST_METHOD"] => En post
if ($_SERVER["REQUEST_METHOD"] === "post") {

    if (isset($_post['Submit'])) {
        $Submit = $_post['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_post["Submit"])) and ($Submit === "Initialiser")) {
        $sameId = $_post['id'];
        header("Location: ./updateAngle.php?id=" . $sameId);
    }

    if (((isset($_post['libAngl'])) and !empty($_post['libAngl']))
        and ((isset($_post['TypLang'])) and !empty($_post['TypLang']))
        and ($_post['TypLang'] != -1)
        and (!empty($_post['Submit']) and ($Submit === "Valider"))
    ) {

        $erreur = false;

        $libAngl = ctrlSaisies(($_post['libAngl']));
        $numLang = ctrlSaisies(($_post['TypLang']));

        $numAngl = ctrlSaisies(($_post['id']));

        $monAngle->update($numAngl, $libAngl, $numLang);

        header("Location: ./angle.php");
    } else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }
}
include __DIR__ . '/initAngle.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Angle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php 
    require_once __DIR__ . '/../cover.php';
    ?>
    <h1>BLOGART22 Admin - CRUD Angle</h1>
    <h2>Modification d'un angle</h2>
    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $oneAngle = $monAngle->get_1Angle($id);
        $numLang = $oneAngle['numLang'];
        $libAngl = $oneAngle['libAngl'];
    } else {
        echo "Revenez sur la page d'accueil et re-selectionnez un angle à modifier";
    }


    ?>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>

            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

            <div class="control-group">
                <label class="control-label" for="libAngl"><b>Libellé :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libAngl" id="libAngl" size="80" maxlength="80" value="<?= $libAngl; ?>" tabindex="10" autofocus="autofocus" />
            </div>
            <br>
            <!-- Listbox Langue -->
            <div class="control-group">
                <div class="controls">

                    <label for="LibTypLang" title="Sélectionnez la langue !">
                        <b>Quelle langue :&nbsp;&nbsp;&nbsp;</b>
                    </label>
                    <input type="hidden" id="idLang" name="idLang" value="<?= ''; ?>" />
                    <select size="1" name="TypLang" id="TypLang" class="form-control form-control-create" title="Sélectionnez la langue !">
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
                                    <option value="<?= $listNumLang; ?>" selected>
                                        <?= $listlib1lang; ?>
                                    </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?= $listNumLang; ?>">
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
            <!-- FIN Listbox Langue -->
            <div class="control-group">
                <div class="error">
                    <?php
                    if ($erreur) {
                        echo ($errSaisies);
                    } else {
                        $errSaisies = "";
                        echo ($errSaisies);
                
                    }
                    ?>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:black; border:Opx; border-radius:5px; color:white;" name="Submit" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:black; border:Opx; border-radius:5px; color:white;" name="Submit" />
                    <br>
                </div>
            </div>
        </fieldset>
    </form>
    <?php
    require_once __DIR__ . '/footerAngle.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>