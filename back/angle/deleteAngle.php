<?php
////////////////////////////////////////////////////////////
//
//  CRUD ANGLE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : deleteAngle.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Angle
require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';

// Instanciation de la classe angle

$monAngle = new ANGLE();

// Insertion classe Langue
require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';

$maLangue = new LANGUE();

// Instanciation de la classe langue

// Ctrl CIR
// Insertion classe Article
require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';

// Instanciation de la classe ARTICLE
$monArticle = new ARTICLE ();


// Gestion des erreurs de saisie
$erreur = false;

// Gestion du $_SERVER["REQUEST_METHOD"] => En POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if(isset($_POST['Submit'])){
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_POST["Submit"])) AND ($Submit === "Annuler")) {
        header("Location: ./thematique.php");
    }  

    if ((!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
        // Saisies valides
        $erreur = false;

        $numAngl = ctrlSaisies(($_POST['id']));

        $arrayArticle=$monArticle->get_NbAllArticlesByNumAngl($numAngl);

        $countArticle=$arrayArticle[0];

        if ($countArticle<1){
        $erreur = false;

        $numAngl = ctrlSaisies(($_POST['id']));

        $monAngle->delete($numAngl);

        header("Location: ./angle.php");

        } else {
            $count=1;
            header("Location: ./angle.php?count=".$count);
        }
    }
        
    else {
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
    <style type="text/css">
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
    <h1>BLOGART22 Admin - CRUD Angle</h1>
    <h2>Suppression d'un angle</h2>
<?php

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $oneAngle= $monAngle->get_1Angle($id);
    $numLang = $oneAngle['numLang'];
    $libAngl= $oneAngle['libAngl'];
    $lib1Lang= $oneAngle['lib1Lang'];
}
?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

      <fieldset>
        <legend class="legend1">Formulaire Angle...</legend>

        <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

        <div class="control-group">
            <label class="control-label" for="libAngl"><b>Libellé :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libAngl" id="libAngl" size="80" maxlength="80" value="<?= $libAngl; ?>" tabindex="10" disabled />
        </div>
        <br>
<!-- ---------------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------------- -->
    <!-- Listbox  -->
    <div class="control-group">
            <div class="controls">      

                <label for="LibTypLang" title="Sélectionnez la langue !">
            <b>Langue :&nbsp;&nbsp;&nbsp;</b>
        </label>
        <input type="hidden" id="idLang" name="idLang" value="<?= ''; ?>" />
            <select size="1" name="TypLang" id="TypLang"  class="form-control form-control-create" title="Sélectionnez la langue !" disabled>
                <option value="-1">- - - Choisissez une langue - - -</option>
<?php
                $listNumLang= "";
                $listlib1lang = "";

                $result=$maLangue->get_AllLangues();

                if($result){
                    foreach($result as $row) {
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
    <!-- FIN Listbox Angle -->
<!-- ---------------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------------- -->
        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Annuler" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                <br>
            </div>
        </div>
      </fieldset>
    </form>
    <br>
    <i><div class="error"><br>=>&nbsp;Attention, une suppression doit respecter les CIR !</div></i>
<?php
require_once __DIR__ . '/footerAngle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
