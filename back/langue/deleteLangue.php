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
require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';

// Instanciation de la classe langue

$maLangue = new LANGUE();

$monPays = new PAYS();


// Ctrl CIR
// Insertion classe Angle
require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';

// Instanciation de la classe Angle

$monAngle = new ANGLE();

// Insertion classe Thematique
require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';

// Instanciation de la classe Thematique
$maThematique = new THEMATIQUE();


// Insertion classe Motcle
require_once __DIR__ . '/../../CLASS_CRUD/motcle.class.php';
// Instanciation de la classe Motcle
$monMotcle = new MOTCLE();


// Gestion des erreurs de saisie
$erreur = false;

// Gestion du $_SERVER["REQUEST_METHOD"] => En POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  
    $numLang = ctrlSaisies(($_POST['id']));

    if(isset($_POST['Submit'])){
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_POST["Submit"])) AND ($Submit === "Annuler")) {
        header("Location: ./langue.php");
    }  


    if ((!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
        // Saisies valides
        $erreur = false;

        $numLang = ctrlSaisies(($_POST['id']));

        $arrayTheme=$maThematique->get_NbAllThematiquesBynumLang($numLang);
        $arrayAngle=$monAngle->get_NbAllAnglesBynumLang($numLang);
        $arrayMotcle=$monMotcle->get_NbAllMotsclesBynumLang($numLang);

        $countTheme=$arrayTheme[0];
        $countAngle=$arrayAngle[0];
        $countMotcle=$arrayMotcle[0];

        if ($countTheme<1 AND $countAngle<1 AND $countMotcle<1){
        $erreur = false;

        $numLang = ctrlSaisies(($_POST['id']));

        $maLangue->delete($numLang);

        header("Location: ./langue.php");

        } else {
            $count=1;
            header("Location: ./langue.php?count=".$count);
        }
    }
        
    else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }  

   
}  

// End of if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
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


    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $oneLangue = $maLangue-> get_1Langue($id);
        $numLang = $oneLangue['numLang'];
        $lib1Lang= $oneLangue['lib1Lang'];
        $lib2Lang= $oneLangue['lib2Lang'];
        $frPays=$oneLangue['frPays'];
    }else{
        echo("Aucune langue n'a été choisis, retournez dans sur la page d'accueil ");
    }



?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

      <fieldset>
        <legend class="legend1">Formulaire Langue...</legend>

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
<!-- --------------------------------------------------------------- -->
    <!-- Listbox Pays -->
        <br>
        <div class="control-group">
            <div class="controls">
            <label class="control-label" for="LibTypPays">
                <b>Quel pays :&nbsp;&nbsp;&nbsp;</b>
            </label>


                <input type="text" name="frPays" id="frPays" size="10" maxlength="10" value="<?= $frPays ?>" disabled />

                <!-- Listbox langue disabled => 2ème temps -->

            </div>
        </div>
    <!-- FIN Listbox Pays -->
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
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
require_once __DIR__ . '/footerLangue.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
