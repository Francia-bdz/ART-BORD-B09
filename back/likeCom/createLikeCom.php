<?php
////////////////////////////////////////////////////////////
//
//  CRUD LIKECOM (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : createLikeCom.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Likecom

require_once __DIR__ . '/../../CLASS_CRUD/likeCom.class.php';

// Insertion classe Likecom
$monLikeCom = new LIKECOM();

// Insertion classe Membre
require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';

// Instanciation de la classe Membre
$monMembre = new MEMBRE();

// Insertion classe Article

require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';

// Instanciation de la classe ARTICLE
$monArticle = new ARTICLE();




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
        header("Location: ./createLikeCom.php");
    }

    if (((isset($_POST['TypMemb'])) and !empty($_POST['TypMemb']))
        and ($_POST['TypMemb'] != -1) and
        ((isset($_POST['TypArt'])) and !empty($_POST['TypArt']))
        and ($_POST['TypArt'] != -1)
        and (!empty($_POST['Submit']) and ($Submit === "Valider"))
    ) {

        $erreur = false;

        $numMemb = ctrlSaisies(($_POST['TypMemb']));
        $numArt = ctrlSaisies(($_POST['TypArt']));
        $likeC = 1;

        $monLikeCom->create($numMemb, $numSeqCom, $numArt, $likeC);

        header("Location: ./likeCom.php");
        
    } else {
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }

}   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")
// Init variables form
include __DIR__ . '/initLikeCom.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Like Commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <h1>BLOGART22 Admin - CRUD Like Commentaire</h1>
    <h2>Ajout d'un like sur un Commentaire d'un Article</h2>

    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>

            <input type="hidden" id="id1" name="id1" value="<?= isset($_GET['id1']) ? $_GET['id1'] : '' ?>" />
            <input type="hidden" id="id2" name="id2" value="<?= isset($_GET['id2']) ? $_GET['id2'] : '' ?>" />
            <input type="hidden" id="id3" name="id3" value="<?= isset($_GET['id3']) ? $_GET['id3'] : '' ?>" />
            <br>

            <!-- --------------------------------------------------------------- -->
            <!-- --------------------------------------------------------------- -->
            <!-- Listbox Membre -->
            <br>

            <div class="control-group">
                <div class="controls">

                    <label for="LibTypMemb" title="Sélectionnez votre membre !">
                        <b>Quel Membre :&nbsp;&nbsp;&nbsp;</b>
                    </label>
                    <input type="hidden" id="TypMemb" name="TypMemb" value="<?= ''; ?>" />
                    <select size="1" name="TypMemb" id="TypMemb" class="form-control form-control-create" title="Sélectionnez le membre !">
                        <option value="-1">- - - Choisissez le membre - - -</option>
                        <?php
                        $listNumMemb = "";
                        $listPseudoMemb = "";

                        $result = $monMembre->get_AllMembersByStat();

                        if ($result) {
                            foreach ($result as $row) {
                                $listNumMemb = $row["numMemb"];
                                $listPseudoMemb = $row["pseudoMemb"];
                        ?>
                                <option value="<?= $listNumMemb; ?>">
                                    <?= $listPseudoMemb; ?>
                                </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- FIN Listbox Membre -->
            <!-- --------------------------------------------------------------- -->
            <!-- --------------------------------------------------------------- -->

            <!-- --------------------------------------------------------------- -->
            <!-- --------------------------------------------------------------- -->
            <!-- Listbox Article -->
            <br>

            <div class="control-group">
                <div class="controls">

                    <label for="LibTypArticle" title="Sélectionnez votre article !">
                        <b>Quel Article :&nbsp;&nbsp;&nbsp;</b>
                    </label>
                    <input type="hidden" id="article" name="article" value="<?= ''; ?>" />
                    <select size="1" name="article" id="article" class="form-control form-control-create" title="Sélectionnez votre article !" onchange='change()'>
                        <option value="-1">- - - Choisissez l'article - - -</option>
                        <?php
                        $listNumArt = "";
                        $listLibTitrArt = "";

                        $result = $monArticle->get_AllArticles();

                        if ($result) {
                            foreach ($result as $row) {
                                $listNumArt = $row["numArt"];
                                $listLibTitrArt = $row["libTitrArt"];
                        ?>
                                <option value="<?= $listNumArt; ?>">
                                    <?= $listLibTitrArt; ?>
                                </option>
                        <?php
                            } // End of foreach
                        }   // if ($result)
                        ?>
                    </select>
                </div>
            </div>
            <!-- FIN Listbox Commentaire / Article -->
            <br /><br />
            <label><b>&nbsp;&nbsp;&nbsp;Quel Commentaire :&nbsp;&nbsp;</b></label>
            <div id='commentaire' style='display:inline'>
                <select size="1" name="commentaire" title="Sélectionnez le commentaire !" style="padding:2px; ">
                    <option value='-1'>- - - Aucun - - -</option>
                </select>
            </div>
            <br /><br />
            <!-- FIN Listbox Angle -->

            <!-- JAVA AJAX -->
            <script type='text/javascript'>
                function getXhr() {

                    var xhr = null;
                    if (window.XMLHttpRequest) { // Firefox & autres
                        xhr = new XMLHttpRequest();
                    } else
                    if (window.ActiveXObject) { // IE / Edge
                        try {
                            xhr = new ActiveXObject("Msxml2.XMLHTTP");
                        } catch (e) {
                            xhr = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                    } else {
                        alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
                        xhr = false;
                    }
                    return xhr;
                } // End of function

                /**
                 * Méthode appelée sur le click du bouton/listbox
                 */
                function change() {
                    var xhr = getXhr();

                    // On définit quoi faire quand réponse reçue
                    xhr.onreadystatechange = function() {

                        // test si tout est reçu et si serveur est ok
                        if (xhr.readyState == 4 && xhr.status == 200) {

                            di = document.getElementById('commentaire');
                            di.innerHTML = xhr.responseText;

                        }
                    }

                    // Traitement en POST
                    xhr.open("POST", "./ajaxcommentaire.php", true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    numArt = document.getElementById('article').options[document.getElementById('article').selectedIndex].value;
                    xhr.send("numArt=" + numArt);

                } 
            </script>
            <!-- --------------------------------------------------------------- -->
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
                    <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:black; border:Opx; border-radius:5px; color:white;" name="Submit" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:black; border:Opx; border-radius:5px; color:white;" name="Submit" />
                    <br>
                </div>
            </div>
        </fieldset>
    </form>
    <?php
    require_once __DIR__ . '/footerLikeCom.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>