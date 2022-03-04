<?php
////////////////////////////////////////////////////////////
//
//  CRUD THEMATIQUE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : deleteThematique.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Thematique
require_once __DIR__ . '/../../class_crud/thematique.class.php';

// Instanciation de la classe Thematique
$maThematique = new THEMATIQUE();

// Insertion classe Langue
require_once __DIR__ . '/../../class_crud/langue.class.php';

// Instanciation de la classe Langue
$maLangue = new LANGUE();

// Ctrl CIR
// Insertion classe Article
require_once __DIR__ . '/../../class_crud/article.class.php';

// Instanciation de la classe ARTICLE
$monArticle = new ARTICLE();

// BBCode


// Gestion du $_SERVER["REQUEST_METHOD"] => En POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['Submit'])) {
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_POST["Submit"])) and ($Submit === "Annuler")) {
        header("Location: ./thematique.php");
    }

    if ((!empty($_POST['Submit']) and ($Submit === "Valider"))) {
        // Saisies valides
        $erreur = false;

        $numThem = ctrlSaisies(($_POST['id']));

        $arrayArticle = $monArticle->get_NbAllArticlesByNumThem($numThem);

        $countArticle = $arrayArticle[0];

        if ($countArticle < 1) {
            $erreur = false;

            $numThem = ctrlSaisies(($_POST['id']));

            $maThematique->delete($numThem);

            header("Location: ./thematique.php");
        } else {
            $count = 1;
            header("Location: ./thematique.php?count=" . $count);
        }
    } else {

        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }
}
include __DIR__ . '/initThematique.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Thematique</title>
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
    </style>
</head>

<body>
    <h1>BLOGART22 Admin - CRUD Thematique</h1>
    <h2>Suppression d'une Thematique</h2>
    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $oneThematique = $maThematique->get_1Thematique($id);
        $numLang = $oneThematique['numLang'];
        $libThem = $oneThematique['libThem'];
        $lib1Lang = $oneThematique['lib1Lang'];
    }

    ?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>

            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

            <div class="control-group">
                <label class="control-label" for="libThem"><b>Libellé :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libThem" id="libThem" size="80" maxlength="80" value="<?= $libThem; ?>" disabled="disabled" />
            </div>

            <br>
            <!-- --------------------------------------------------------------- -->
            <!-- FK : Langue -->
            <!-- --------------------------------------------------------------- -->
            <!-- Listbox langue -->
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
                            } // End of foreach
                        }   // if ($result)
                        ?>
                    </select>
                </div>
            </div>
            <!-- FIN Listbox langue -->
            <!-- --------------------------------------------------------------- -->
            <!-- FK : Langue -->
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
    <?php
    require_once __DIR__ . '/footerThematique.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>