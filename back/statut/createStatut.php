<?php
////////////////////////////////////////////////////////////
//
//  CRUD statut (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : createStatut.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Statut
require_once __DIR__ . '/../../class_crud/statut.class.php';

// Instanciation de la classe Statut
$monStatut = new statut();


// Gestion des erreurs de saisie
$erreur = false;

// Gestion du $_SERVER["REQUEST_METHOD"] => En post

if ($_SERVER["REQUEST_METHOD"] === "post") {

    if (isset($_post['Submit'])) {
        $Submit = $_post['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_post["Submit"])) and ($Submit === "Initialiser")) {

        header("Location: ./createStatut.php");
    }


    if (((isset($_post['libStat'])) and !empty($_post['libStat']))
        and (!empty($_post['Submit']) and ($Submit === "Valider"))
    ) {
        // Saisies valides
        $erreur = false;

        $libStat = ctrlSaisies(($_post['libStat']));

        $monStatut->create($libStat);

        header("Location: ./statut.php");
    }   // Fin if ((isset($_post['libStat'])) ...
    else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }   // End of else erreur saisies



}   // Fin if ($_SERVER["REQUEST_METHOD"] == "post")
// Init variables form
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
</head>

<body>
    <h1>BLOGART22 Admin - CRUD Statut</h1>
    <h2>Ajout d'un statut</h2>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>

            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

            <div class="control-group">
                <label class="control-label" for="libStat"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>" autofocus="autofocus" />
            </div>

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
    require_once __DIR__ . '/footerStatut.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>