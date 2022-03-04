<?php
////////////////////////////////////////////////////////////
//
//  CRUD MEMBRE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : deleteMembre.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';
// Mise en forme date
require_once __DIR__ . '/../../util/dateChangeFormat.php';

// Insertion classe Membre

require_once __DIR__ . '/../../class_crud/membre.class.php';

// Instanciation de la classe Membre
$monMembre = new MEMBRE();

// Insertion classe Statut
require_once __DIR__ . '/../../class_crud/statut.class.php';

// Instanciation de la classe Statut
$monStatut = new STATUT();

// Insertion classe Comment
require_once __DIR__ . '/../../class_crud/comment.class.php';

// Instanciation de la classe Comment

$monComment = new COMMENT();

// Instanciation de la classe Likeart
require_once __DIR__ . '/../../class_crud/likeArt.class.php';

// Insertion classe Likeart
$monLikeArt = new LIKEART();

// Insertion classe Likecom

require_once __DIR__ . '/../../class_crud/likeCom.class.php';

// Insertion classe Likecom
$monLikeCom = new LIKECOM();


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if(isset($_POST['Submit'])){
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_POST["Submit"])) AND ($Submit === "Annuler")) {
        header("Location: ./membre.php");
    }  

    if ((!empty($_POST['Submit']) AND ($Submit === "Valider"))) {

        $erreur = false;

        $numMemb = ctrlSaisies(($_POST['id']));

        $arrayComment=$monComment->get_NbAllCommentsBynumMemb($numMemb);

        $countComment=$arrayComment[0];

        $arrayLikeArt=$monLikeArt->get_nbLikesArtByMembre($numMemb);

        $countLikeArt=$arrayLikeArt[0];

        if ($countComment<1 AND $countLikeArt<1){
        $erreur = false;

        $monMembre->delete($numMemb);

        header("Location: ./membre.php");

        } else {
            $count=1;
            header("Location: ./membre.php?count=".$count);
        }
    }



}   // Fin if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
include __DIR__ . '/initMembre.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Membre</title>
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
    <h1>BLOGART22 Admin - CRUD Membre</h1>
    <h2>Suppression d'un membre</h2>
<?php

   if (isset($_GET['id'])){
    $id = $_GET['id'];
    $oneMembre = $monMembre-> get_1Membre($id);
    $prenomMemb = $oneMembre['prenomMemb'];
    $nomMemb = $oneMembre['nomMemb'];
    $pseudoMemb = $oneMembre['pseudoMemb'];
    $pass1Memb = $oneMembre['passMemb'];
    $pass2Memb = $oneMembre['passMemb'];
    $eMail1Memb = $oneMembre['eMailMemb'];
    $eMail2Memb = $oneMembre['eMailMemb'];
    $dtCreaMemb = $oneMembre['dtCreaMemb'];
    $accordMemb = $oneMembre['accordMemb'];
    $libStat = $oneMembre['libStat'];
   }


?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

      <fieldset>

        <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />
        <div class="control-group">
            <label class="control-label" for="prenomMemb"><b>Prénom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="prenomMemb" id="prenomMemb" size="80" maxlength="80" value="<?= $prenomMemb; ?>" disabled />
        </div>
        <br>
        <div class="control-group">
            <label class="control-label" for="nomMemb"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="nomMemb" id="nomMemb" size="80" maxlength="80" value="<?= $nomMemb; ?>" disabled />
        </div>
        <br>
        <div class="control-group">
            <label class="control-label" for="pseudoMemb"><b>Pseudonyme :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="pseudoMemb" id="pseudoMemb" size="80" maxlength="80" value="<?= $pseudoMemb; ?>" disabled />
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="eMail1Memb"><b>eMail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="email" name="eMail1Memb" id="eMail1Memb" size="80" maxlength="80" value="<?= $eMail1Memb; ?>" disabled />
        </div>
        <br>
        <div class="control-group">
            <label class="control-label" for="accordMemb"><b>J'ai accepté que mes données soient conservées :</b></label>
            <div class="controls">
               <fieldset>
                  <input type="radio" name="accordMemb" value="on" disabled />
                  <? if($accordMemb == 1) echo 'checked="checked"'; ?>
                  &nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="accordMemb" value="off" disabled />
                  <? if($accordMemb == 0) echo 'checked="checked"'; ?>
                  &nbsp;&nbsp;Non
               </fieldset>
            </div>
        </div>
        <br><br>

<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- FK : Statut -->
<!-- --------------------------------------------------------------- -->
    <!-- Listbox statut -->
    <div class="control-group">
        <div class="controls">      

            <label for="LibTypPays" title="Sélectionnez votre statut !">
        <b>Quel Statut :&nbsp;&nbsp;&nbsp;</b>
    </label>
    <input type="hidden" id="idStat" name="idStat" value="<?= ''; ?>" />
        <select size="1" name="TypStat" id="TypStat"  class="form-control form-control-create" title="Sélectionnez le statut !" disabled >
            <option value="-1">- - - Choisissez un statut - - -</option>
<?php
            $listidStat= "";
            $listlibStat = "";

            $result=$monStatut->get_AllStatuts();

            if($result){
                foreach($result as $row) {
                    $listidStat = $row["idStat"];
                    $listlibStat = $row["libStat"];
                    if ($idStat == $row['idStat']){
?>
                    <option value="<?= $listidStat; ?>" selected>
                        <?= $listlibStat; ?>
                </option>
<?php
                } else {
                ?>
                 <option value="<?= $listidStat; ?>" selected>
                        <?= $listlibStat; ?>
                </option>

    <?php
                     }   
                } 
            }   
?>
        </select>
        </div>
    </div>

    <!-- FIN Listbox statut -->
<!-- --------------------------------------------------------------- -->
    <!-- FK : Statut -->
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
        <br>
        <br>
        <div class="control-group">
            <label class="control-label" for="dtCreaMemb"><b>Date création :&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="dtCreaMemb" id="dtCreaMemb" value="<?= $dtCreaMemb; ?>" disabled />
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
    <i><div class="error"><br>=>&nbsp;Attention, une suppression doit respecter les CIR !</div></i>
<?php
require_once __DIR__ . '/footerMembre.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
