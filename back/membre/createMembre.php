<?php
////////////////////////////////////////////////////////////
//
//  CRUD membre (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : createMembre.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';
// Del accents sur string
require_once __DIR__ . '/../../util/delAccents.php';

require_once __DIR__ . '/../../util/regex.php';

// Insertion classe Membre
require_once __DIR__ . '/../../class_crud/membre.class.php';

// Instanciation de la classe Membre
$monMembre = new membre();

// Insertion classe Statut
require_once __DIR__ . '/../../class_crud/statut.class.php';

// Instanciation de la classe Statut
$monStatut = new statut();

// Constantes reCaptcha


// Gestion des erreurs de saisie
$erreur = false;
// init msg erreur


// Gestion du $_SERVER["REQUEST_METHOD"] => En post
if ($_SERVER["REQUEST_METHOD"] === "post") {

    if(isset($_post['Submit'])){
        $Submit = $_post['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_post["Submit"])) AND ($Submit === "Initialiser")) {
        header("Location: ./createMembre.php");
    }  

    if (((isset($_post['prenomMemb'])) AND !empty($_post['prenomMemb']))
        AND ((isset($_post['nomMemb'])) AND !empty($_post['nomMemb']))
        AND ((isset($_post['pseudoMemb'])) AND !empty($_post['pseudoMemb']))
        AND ((isset($_post['pass1Memb'])) AND !empty($_post['pass1Memb']))
        AND ((isset($_post['pass2Memb'])) AND !empty($_post['pass2Memb']))
        AND((isset($_post['eMail1Memb'])) AND !empty($_post['eMail1Memb']))
        AND((isset($_post['eMail2Memb'])) AND !empty($_post['eMail2Memb']))
        AND((isset($_post['accordMemb'])) AND !empty($_post['accordMemb']))
        AND ((isset($_post['TypStat'])) AND !empty($_post['TypStat']))
        AND ($_post['TypStat']!=-1)
        AND (!empty($_post['Submit']) AND ($Submit === "Valider"))) {
     
            
            if (($_post['accordMemb'])== "off"){
                $accordMemb = 0;
            } elseif (($_post['accordMemb']) == "on"){
                $accordMemb = 1;
            }
            
            $prenomMemb = ctrlSaisies(($_post['prenomMemb']));
            $nomMemb = ctrlSaisies(($_post['nomMemb']));
            $pseudoMemb = ctrlSaisies(($_post['pseudoMemb']));
            $passMemb = ctrlSaisies(($_post['pass2Memb']));
            $eMailMemb = ctrlSaisies(($_post['eMail2Memb']));
            $dtCreaMemb = date('Y-m-d H:i:s');
            $idStat = ctrlSaisies(($_post['TypStat']));

            
            if (strlen($pseudoMemb)<6 || strlen($pseudoMemb)>70){
                $erreur = true;
                $errSaisies =  "Erreur, le nombre de caractère pour le pseudo doit être compris entre 6 et 70 !";
            } 
            elseif (($monMembre->get_ExistPseudo($pseudoMemb))>1){
                
                $erreur = true;
                $errSaisies =  "Le pseudo existe déja!";

            }elseif ($eMailMemb != $_post['eMail1Memb']){
                
                $erreur = true;
                $errSaisies =  "Les deux eMails ne correspondent pas !";

            }elseif (isEmail($eMailMemb)!= true ){
                
                $erreur = true;
                $errSaisies =  "L'email n'est pas dans le bon format !";

            }
            elseif ($passMemb != $_post['pass1Memb']){
                
                $erreur = true;
                $errSaisies =  "Les deux mots de passe ne correspondent pas !";

            } elseif (isPassWord($passMemb)!= true){
                
                $erreur = true;
                $errSaisies =  "Le mot de passe doit contenir au moins une majuscule, une minuscule et un caractère spécial !";

            } else {
                
                $erreur = false;
                
                // $passMemb = password_hash($passMemb, PASSWORD_DEFAULT);

                $monMembre->create($prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $accordMemb, $idStat);
        
                header("Location: ./membre.php");
            }
    }   
    else {
        
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }  

}   
include __DIR__ . '/initMembre.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Membre</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8;" />
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!--  Le script reCaptcha : api.js  -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
    <script>
        // Affichage pass
        function myFunction(myInputPass) {
            var x = document.getElementById(myInputPass);
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
        }
    </script>
</head>
<body>
    <h1>BLOGART22 Admin - CRUD Membre</h1>
    <h2>Ajout d'un membre : Inscription</h2>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

      <fieldset>
        <legend class="legend1">Formulaire Membre...</legend>

        <input type="hidden" id="id" name="id" value="<?= isset($_post['id']) ? $_post['id'] : '' ?>" />

        <div class="control-group">
            <label class="control-label" for="prenomMemb"><b>Prénom<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="prenomMemb" id="prenomMemb" size="80" maxlength="80" value="<?= $prenomMemb; ?>" autocomplete="on" autofocus="autofocus" />
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="nomMemb"><b>Nom<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="nomMemb" id="nomMemb" size="80" maxlength="80" value="<?= $nomMemb; ?>" autocomplete="on" />
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="pseudoMemb"><b>Pseudonyme<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="pseudoMemb" id="pseudoMemb" size="80" maxlength="80" value="<?= $pseudoMemb; ?>" placeholder="6 car. minimum" autocomplete="on" />
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="pass1Memb"><b>Mot passe<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="pass1Memb" id="myInput1" size="80" maxlength="80" value="<?= $pass1Memb; ?>" autocomplete="on" />
            <br>
            <input type="checkbox" onclick="myFunction('myInput1')">
            &nbsp;&nbsp;
            <label><i>Afficher Mot de passe</i></label>
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="pass2Memb"><b>Confirmez la Mot passe<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="pass2Memb" id="myInput2" size="80" maxlength="80" value="<?= $pass2Memb; ?>" autocomplete="on" />
            <br>
            <input type="checkbox" onclick="myFunction('myInput2')">
            &nbsp;&nbsp;
            <label><i>Afficher Mot de passe</i></label>
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="eMail1Memb"><b>eMail<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="email" name="eMail1Memb" id="eMail1Memb" size="80" maxlength="80" value="<?= $eMail1Memb; ?>" autocomplete="on" />
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="eMail2Memb"><b>Confirmez l'eMail<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="email" name="eMail2Memb" id="eMail2Memb" size="80" maxlength="80" value="<?= $eMail2Memb; ?>" autocomplete="on" />
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="accordMemb"><b>J'accepte que mes données soient conservées :</b></label>
            <div class="controls">
               <fieldset>
                  <input type="radio" name="accordMemb"
                  <?= ($accordMemb == "on") ? 'checked="checked"' : ''
                  ?> value="on" />&nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="accordMemb"
                  <?= ($accordMemb == "off") ? 'checked="checked"' : ''
                  ?> value="off" checked="checked" />&nbsp;&nbsp;Non
               </fieldset>
            </div>
        </div>
        <i><div class="error"><br>*&nbsp;Champs obligatoires</div></i>

<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- FK : Statut -->
<!-- --------------------------------------------------------------- -->
    <!-- Listbox statut -->
    <br>

    <div class="control-group">
            <div class="controls">      

                <label for="LibTypPays" title="Sélectionnez votre statut !">
            <b>Quel Statut :&nbsp;&nbsp;&nbsp;</b>
        </label>
        <input type="hidden" id="idStat" name="idStat" value="<?= ''; ?>" />
            <select size="1" name="TypStat" id="TypStat"  class="form-control form-control-create" title="Sélectionnez le pays !" >
                <option value="-1">- - - Choisissez un statut - - -</option>
<?php
                $listidStat= "";
                $listlibStat = "";

                $result=$monStatut->get_AllStatuts();

                if($result){
                    foreach($result as $row) {
                        $listidStat = $row["idStat"];
                        $listlibStat = $row["libStat"];
?>
                        <option value="<?= $listidStat; ?>">
                            <?= $listlibStat; ?>
                    </option>
<?php
                    } // End of foreach
                }   // if ($result)
?>
            </select>
            </div>
        </div>
    <!-- FIN Listbox statut -->
<!-- --------------------------------------------------------------- -->

<!-- -->
        <!--    Captcha Blogart22    -->
        <!-- Type de reCaptcha V2 Case à cocher : OK -->

<!-- -->
        <div class="control-group">
            <div class="error">
<?php
            if ($erreur) {
                echo ($errSaisies);
            }
            else {
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
require_once __DIR__ . '/footerMembre.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
