<?php
////////////////////////////////////////////////////////////
//
//  CRUD MEMBRE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : updateMembre.php  -  (ETUD)  BLOGART22
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

// Instanciation de la classe STATUT
$monMembre = new MEMBRE();

require_once __DIR__ . '/../../class_crud/statut.class.php';

// Instanciation de la classe STATUT
$monStatut = new STATUT();


// Gestion des erreurs de saisie
$erreur = false;

// Init msg


// Gestion du $_SERVER["REQUEST_METHOD"] => En POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if (isset($_POST['Submit'])) {
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_POST["Submit"])) and ($Submit === "Initialiser")) {
        $sameId = $_POST['id'];
        header("Location: ./updateMembre.php?id=" . $sameId);
    }


    if (((isset($_POST['prenomMemb'])) and !empty($_POST['prenomMemb']))
        and ((isset($_POST['nomMemb'])) and !empty($_POST['nomMemb']))
        and ((isset($_POST['pass1Memb'])) and !empty($_POST['pass1Memb']))
        and ((isset($_POST['pass2Memb'])) and !empty($_POST['pass2Memb']))
        and ((isset($_POST['eMail1Memb'])) and !empty($_POST['eMail1Memb']))
        and ((isset($_POST['eMail2Memb'])) and !empty($_POST['eMail2Memb']))
        and ((isset($_POST['TypStat'])) and !empty($_POST['TypStat']))
        and ($_POST['TypStat'] != -1)
        and (!empty($_POST['Submit']) and ($Submit === "Valider"))
    ) {

        $erreur = false;

        $numMemb = ctrlSaisies(($_POST['id']));
        $prenomMemb = ctrlSaisies(($_POST['prenomMemb']));
        $nomMemb = ctrlSaisies(($_POST['nomMemb']));
        $passMemb = ctrlSaisies(($_POST['pass2Memb']));
        $eMailMemb = ctrlSaisies(($_POST['eMail2Memb']));
        $idStat = ctrlSaisies(($_POST['TypStat']));

        if ($eMailMemb != $_POST['eMail1Memb']) {

            $erreur = true;
            $errSaisies =  "Les deux eMails ne correspondent pas !";
        } elseif ($passMemb != $_POST['pass1Memb']) {

            $erreur = true;
            $errSaisies =  "Les deux mots de passe ne correspondent pas !";
        } elseif (isPassWord($passMemb) != true) {

            $erreur = true;
            $errSaisies =  "Le mot de passe doit contenir au moins une majuscule, une minuscule et un caractère spécial !";
        } else {

            $erreur = false;

            $monMembre->update($numMemb, $prenomMemb, $nomMemb, $passMemb, $eMailMemb, $idStat);

            header("Location: ./membre.php");
        }
    } else {

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
    <h2>Modification d'un membre</h2>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $oneMembre = $monMembre->get_1Membre($id);
        $prenomMemb = $oneMembre['prenomMemb'];
        $nomMemb = $oneMembre['nomMemb'];
        $pseudoMemb = $oneMembre['pseudoMemb'];
        $pass1Memb = $oneMembre['passMemb'];
        $pass2Memb = $oneMembre['passMemb'];
        $eMail1Memb = $oneMembre['eMailMemb'];
        $eMail2Memb = $oneMembre['eMailMemb'];
        $dtCreaMemb = $oneMembre['dtCreaMemb'];
        $accordMemb = $oneMembre['accordMemb'];
    }


    ?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>
            <legend class="legend1">Formulaire Membre...</legend>

            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

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
                <label class="control-label" for="pseudoMemb"><b>Pseudonyme :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="pseudoMemb" id="pseudoMemb" size="80" maxlength="80" value="<?= $pseudoMemb; ?>" disabled />
            </div>

            <br>
            <div class="control-group">
                <label class="control-label" for="pass1Memb"><b>Mot passe<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="password" name="pass1Memb" id="myInput1" size="80" maxlength="80" value="<?= $pass1Memb; ?>" autocomplete="on" />
                <br>
                <input type="checkbox" onclick="myFunction('myInput1')">
                &nbsp;&nbsp;
                <label><i>Afficher mot de passe</i></label>
            </div>

            <br>
            <div class="control-group">
                <label class="control-label" for="pass2Memb"><b>Confirmez le mot passe<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="password" name="pass2Memb" id="myInput2" size="80" maxlength="80" value="<?= $pass2Memb; ?>" autocomplete="on" />
                <br>
                <input type="checkbox" onclick="myFunction('myInput2')">
                &nbsp;&nbsp;
                <label><i>Afficher mot de passe</i></label>
            </div>
            <small class="error">*Champ obligatoire si nouveau passe</small><br>
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
            <small class="error">*Champ obligatoire si nouveau eMail</small><br>

            <br>
            <div class="control-group">
                <label class="control-label" for="accordMemb"><b>J'ai accepté que mes données soient conservées :</b></label>
                <div class="controls">
                    <fieldset>
                        <input type="radio" name="accordMemb" value="on" disabled />
                        <? if ($accordMemb == 1) echo 'checked="checked"'; ?>
                        &nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="accordMemb" value="off" disabled />
                        <? if ($accordMemb == 0) echo 'checked="checked"'; ?>
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
            <br>

            <div class="control-group">
                <div class="controls">

                    <label for="LibTypPays" title="Sélectionnez votre statut !">
                        <b>Quel Statut :&nbsp;&nbsp;&nbsp;</b>
                    </label>
                    <input type="hidden" id="idStat" name="idStat" value="<?= ''; ?>" />
                    <select size="1" name="TypStat" id="TypStat" class="form-control form-control-create" title="Sélectionnez le statut !">
                        <option value="-1">- - - Choisissez un statut - - -</option>
                        <?php
                        $listidStat = "";
                        $listlibStat = "";

                        $result = $monStatut->get_AllStatuts();

                        if ($result) {
                            foreach ($result as $row) {
                                $listidStat = $row["idStat"];
                                $listlibStat = $row["libStat"];
                                if ($idStat == $row['idStat']) {
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
            <br>
            <div class="control-group">
                <label class="control-label" for="dtCreaMemb"><b>Date création :&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="dtCreaMemb" id="dtCreaMemb" value="<?= $dtCreaMemb; ?>" disabled />
            </div>
            <small>(Pour mémoire)</small><br>

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
    require_once __DIR__ . '/footerMembre.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>