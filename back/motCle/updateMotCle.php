<?php
////////////////////////////////////////////////////////////
//
//  CRUD MOTCLE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : updateMotCle.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe MotCle

require_once __DIR__ . '/../../class_crud/motcle.class.php';

// Instanciation de la classe motcle
$monMotcle = new MOTCLE();

// Insertion classe Langue
require_once __DIR__ . '/../../class_crud/langue.class.php';
// Instanciation de la classe Langue
$maLangue = new LANGUE();


// Gestion des erreurs de saisie
$erreur = false;

// Gestion du $_SERVER["REQUEST_METHOD"] => En POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if (isset($_POST['Submit'])) {
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_POST["Submit"])) and ($Submit === "Initialiser")) {
        $sameId = $_POST['id'];
        header("Location: ./updateMotCle.php?id=" . $sameId);
    }

    if (((isset($_POST['libMotCle'])) and !empty($_POST['libMotCle']))
        and ((isset($_POST['TypLang'])) and !empty($_POST['TypLang']))
        and ($_POST['TypLang'] != -1)
        and (!empty($_POST['Submit']) and ($Submit === "Valider"))
    ) {

        $erreur = false;

        $libMotCle = ctrlSaisies(($_POST['libMotCle']));
        $numLang = ctrlSaisies(($_POST['TypLang']));

        $numMotCle = ctrlSaisies(($_POST['id']));

        $monMotcle->update($numMotCle, $libMotCle, $numLang);

        header("Location: ./motCle.php");
    } else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }
}
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
</head>

<body>
    <h1>BLOGART22 Admin - CRUD Mot Clé</h1>
    <h2>Modification d'un Mot Clé</h2>
    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $oneMotCle = $monMotcle->get_1MotCle($id);
        $numLang = $oneMotCle['numLang'];
        $libMotCle = $oneMotCle['libMotCle'];
        $lib1Lang = $oneMotCle['lib1Lang'];
    }
    ?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>

            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />
            <div class="control-group">
                <label class="control-label" for="libMotCle"><b>Libellé :&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libMotCle" id="libMotCle" size="80" maxlength="100" value="<?= $libMotCle; ?>" placeholder="Décrivez le mot Clé" autocomplete="on" autofocus="autofocus" />
            </div>
            <br>
            <!-- --------------------------------------------------------------- -->
            <!-- --------------------------------------------------------------- -->
            <!-- FK : Langue -->
            <!-- --------------------------------------------------------------- -->
            <!-- Listbox langue -->
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
            <!-- FIN Listbox langue -->
            <!-- --------------------------------------------------------------- -->
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
                    <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
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