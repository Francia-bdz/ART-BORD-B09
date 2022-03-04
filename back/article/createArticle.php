<?php
////////////////////////////////////////////////////////////
//
//  CRUD article (PDO) - Modifié : 10 Juillet 2021
//
//  Script  : createArticle.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// insert dans TJ motclearticle
// upload image & insert path
//
// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// Init constantes
include __DIR__ . '/initConst.php';
// Init variables
include __DIR__ . '/initVar.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Article

require_once __DIR__ . '/../../class_crud/article.class.php';

// Instanciation de la classe article
$monArticle = new article();

// Insertion classe Langue
require_once __DIR__ . '/../../class_crud/langue.class.php';

// Instanciation de la classe Langue
$maLangue = new langue();

// Insertion classe Angle
require_once __DIR__ . '/../../class_crud/angle.class.php';

// Instanciation de la classe Angle
$monAngle = new angle();

// Insertion classe Thematique
require_once __DIR__ . '/../../class_crud/thematique.class.php';

// Instanciation de la classe Angle
$maThematique = new THEMATIQUE();

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
        header("Location: ./createArticle.php");
    }

    if (((isset($_post['libTitrArt'])) and !empty($_post['libTitrArt']))
        and ((isset($_post['libChapoArt'])) and !empty($_post['libChapoArt']))
        and ((isset($_post['libAccrochArt'])) and !empty($_post['libAccrochArt']))
        and ((isset($_post['parag1Art'])) and !empty($_post['parag1Art']))
        and ((isset($_post['libSsTitr1Art'])) and !empty($_post['libSsTitr1Art']))
        and ((isset($_post['parag2Art'])) and !empty($_post['parag2Art']))
        and ((isset($_post['libSsTitr2Art'])) and !empty($_post['libSsTitr2Art']))
        and ((isset($_post['parag3Art'])) and !empty($_post['parag3Art']))
        and ((isset($_post['libConclArt'])) and !empty($_post['libConclArt']))
        and isset($_FILES['monfichier']['tmp_name']) and !empty($_FILES['monfichier']['tmp_name'])
        and ((isset($_post['angle'])) and !empty($_post['angle']))
        and ($_post['angle'] != -1)
        and ((isset($_post['thematique'])) and !empty($_post['thematique']))
        and ($_post['thematique'] != -1)
        and (!empty($_post['Submit']) and ($Submit === "Valider"))
    ) {

        $erreur = false;

        $dtCreArt = ctrlSaisies(($_post['dtCreArt']));
        $libTitrArt = ctrlSaisies(($_post['libTitrArt']));
        $libChapoArt = ctrlSaisies(($_post['libChapoArt']));
        $libAccrochArt = ctrlSaisies(($_post['libAccrochArt']));
        $parag1Art = ctrlSaisies(($_post['parag1Art']));
        $libSsTitr1Art = ctrlSaisies(($_post['libSsTitr1Art']));
        $parag2Art = ctrlSaisies(($_post['parag2Art']));
        $libSsTitr2Art = ctrlSaisies(($_post['libSsTitr2Art']));
        $parag3Art = ctrlSaisies(($_post['parag3Art']));
        $libConclArt = ctrlSaisies(($_post['libConclArt']));
        $numAngl = ctrlSaisies(($_post['angle']));
        $numThem = ctrlSaisies(($_post['thematique']));

        require_once __DIR__ . '/ctrlerUploadImage.php';

        $urlPhotArt = $nomImage;

        $monArticle->create($dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem);

        header("Location: ./article.php");
    } elseif (
        empty($_FILES['monfichier'])
        and ((isset($_post['libTitrArt'])) and !empty($_post['libTitrArt']))
        and ((isset($_post['libChapoArt'])) and !empty($_post['libChapoArt']))
        and ((isset($_post['libAccrochArt'])) and !empty($_post['libAccrochArt']))
        and ((isset($_post['parag1Art'])) and !empty($_post['parag1Art']))
        and ((isset($_post['libSsTitr1Art'])) and !empty($_post['libSsTitr1Art']))
        and ((isset($_post['parag2Art'])) and !empty($_post['parag2Art']))
        and ((isset($_post['libSsTitr2Art'])) and !empty($_post['libSsTitr2Art']))
        and ((isset($_post['parag3Art'])) and !empty($_post['parag3Art']))
        and ((isset($_post['libConclArt'])) and !empty($_post['libConclArt']))
        and ((isset($_post['angle'])) and !empty($_post['angle']))
        and ($_post['anglr'] != -1)
        and ((isset($_post['thematique'])) and !empty($_post['thematique']))
        and ($_post['thematique'] != -1)
        and (!empty($_post['Submit']) and ($Submit === "Valider"))
    ) {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "L'image n'a pas été uploadé";
    } else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }
}



include __DIR__ . '/initArticle.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />

	<script src="ckeditor/ckeditor.js"></script>

    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body>
    <h1>BLOGART22 Admin - CRUD Article</h1>
    <h2>Ajout d'un article</h2>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8" id="chgLang">

        <fieldset>

            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

            <div class="control-group">
                <label class="control-label" for="libTitrArt"><b>Titre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <div class="controls">
                    <input type="text" name="libTitrArt" id="libTitrArt" size="100" maxlength="100" value="<?= $libTitrArt; ?>" tabindex="10" placeholder="Sur 100 car." autofocus="autofocus" />
                </div>
            </div>
            <br>
            <div class="control-group">
                <div class="controls">
                    <label class="control-label" for="DtCreA"><b>Date de création :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                    <input type="datetime-local" name="dtCreArt" id="dtCreArt" value="<?= $dtCreArt; ?>" tabindex="20" placeholder="" />
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="libChapoArt"><b>Chapeau :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <div class="controls">
                    <textarea name="libChapoArt" id="libChapoArt" rows="10" cols="100" value="<?= $libChapoArt; ?>" tabindex="30" placeholder="Décrivez le chapeau. Sur 500 car."></textarea>
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="libAccrochArt"><b>Accroche paragraphe 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <div class="controls">
                    <input type="text" name="libAccrochArt" id="libAccrochArt" size="100" maxlength="100" value="<?= $libAccrochArt ?>" tabindex="40" placeholder="Sur 100 car." />
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="parag1Art"><b>Paragraphe 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <div class="controls">
                    <textarea name="parag1Art" id="parag1Art" rows="10" cols="100" value="<?= $parag1Art; ?>" tabindex="50" placeholder="Décrivez le premier paragraphe. Sur 1200 car."></textarea>
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="libSsTitr1Art"><b>Sous-titre 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <div class="controls">
                    <input type="text" name="libSsTitr1Art" id="libSsTitr1Art" size="100" maxlength="100" value="<?= $libSsTitr1Art; ?>" tabindex="60" placeholder="Sur 100 car." />
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="parag2Art"><b>Paragraphe 2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <div class="controls">
                    <textarea name="parag2Art" id="parag2Art" rows="10" cols="100" value="<?= $parag2Art; ?>" tabindex="70" placeholder="Décrivez le deuxième paragraphe. Sur 1200 car."></textarea>
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="libSsTitr2Art"><b>Sous-titre 2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <div class="controls">
                    <input type="text" name="libSsTitr2Art" id="libSsTitr2Art" size="100" maxlength="100" value="<?= $libSsTitr2Art; ?>" tabindex="80" placeholder="Sur 100 car." />
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="parag3Art"><b>Paragraphe 3 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <div class="controls">
                    <textarea name="parag3Art" id="parag3Art" rows="10" cols="100" value="<?= $parag3Art; ?>" tabindex="90" placeholder="Décrivez le troisième paragraphe. Sur 1200 car."></textarea>
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="libConclArt"><b>Conclusion :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <div class="controls">
                    <textarea name="libConclArt" id="libConclArt" rows="10" cols="100" value="<?= $libConclArt; ?>" tabindex="100" placeholder="Décrivez la conclusion. Sur 800 car."></textarea>
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label" for="urlPhotArt"><b>Importez l'illustration :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <div class="controls">
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?= MAX_SIZE; ?>" />
                    <input type="file" name="monfichier" id="monfichier" accept=".jpg,.gif,.png,.jpeg" size="70" maxlength="70" value="<?= 'monfichier' ?>" tabindex="110" placeholder="Sur 70 car." title="Recherchez l'image à uploader !" />
                    <p>
                        <?php
                        $msgImagesOK = "&nbsp;&nbsp;>> Extension des images acceptées : .jpg, .gif, .png, .jpeg" . "<br>" .
                            "(lageur, hauteur, taille max : 80000px, 80000px, 200 000 Go)";
                        echo "<i>" . $msgImagesOK . "</i>";
                        ?>
                    </p>
                </div>
            </div>

            <!-- --------------------------------------------------------------- -->
            <!-- --------------------------------------------------------------- -->
            <!-- Listbox Langue -->
            <div class="control-group">
                <div class="controls">

                    <label for="LibTypLang" title="Sélectionnez la langue !">
                        <b>Quelle langue :&nbsp;&nbsp;&nbsp;</b>
                    </label>
                    <input type="hidden" id="idLang" name="idLang" value="<?= ''; ?>" />
                    <select size="1" name="TypLang" id="langue" class="form-control form-control-create" title="Sélectionnez la langue !" onchange='change()'>
                        <option value="-1">- - - Choisissez une langue - - -</option>
                        <?php
                        $listNumLang = "";
                        $listlib1lang = "";

                        $result = $maLangue->get_AllLangues();

                        if ($result) {
                            foreach ($result as $row) {
                                $listNumLang = $row["numLang"];
                                $listlib1lang = $row["lib1Lang"];

                        ?>

                                <option value="<?= $listNumLang; ?>">
                                    <?= $listlib1lang; ?>
                                </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- FIN Listbox Langue -->
            <!-- --------------------------------------------------------------- -->
            <!-- Listbox Angle live share -->
            <br /><br />
            <label><b>&nbsp;&nbsp;&nbsp;Quel Angle :&nbsp;&nbsp;</b></label>
            <div id='angle' style='display:inline'>
                <select size="1" name="angle" title="Sélectionnez l'angle !" style="padding:2px; ">
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

                            di = document.getElementById('angle');
                            di.innerHTML = xhr.responseText;

                        }
                    }

                    // Traitement en post
                    xhr.open("post", "./ajaxAngle.php", true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    numLang = document.getElementById('langue').options[document.getElementById('langue').selectedIndex].value;
                    xhr.send("numLang=" + numLang);

                } 
            </script>

            <!-- --------------------------------------------------------------- -->
            <!-- --------------------------------------------------------------- -->
            <!-- Listbox Thématique -->
            <br />
            <label><b>&nbsp;&nbsp;&nbsp;Quelle thématique :&nbsp;&nbsp;</b></label>
            <div id='thematique' style='display:inline'>
                <select size="1" name="thematique" title="Sélectionnez la thématique !" style="padding:2px; ">
                    <option value='-1'>- - - Aucun - - -</option>
                </select>
            </div>
            <br />

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
                function change2() {
                    var xhr = getXhr();

                    // On définit quoi faire quand réponse reçue
                    xhr.onreadystatechange = function() {

                        // test si tout est reçu et si serveur est ok
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            di = document.getElementById('thematique');
                            di.innerHTML = xhr.responseText;

                        }
                    }

                    // Traitement en post
                    xhr.open("post", "./ajaxThematique.php", true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    numLang = document.getElementById('langue').options[document.getElementById('langue').selectedIndex].value;
                    xhr.send("numLang=" + numLang);

                } 
            </script> 

            <!-- --------------------------------------------------------------- -->
            <!-- Drag and drop sur Mots clés -->
            <!-- --------------------------------------------------------------- -->
            <br><br>
            <div class="controls">
                <label class="control-label" for="LibTypMotsCles1">
                    <b>Choisissez les mots clés liés à l'article :&nbsp;&nbsp;&nbsp;</b>
                </label>
            </div>
            <!-- A faire dans un 2/3ème temps  -->

            <!-- --------------------------------------------------------------- -->
            <!-- End of Drag and drop sur Mots clés -->
            <!-- --------------------------------------------------------------- -->

            <!-- --------------------------------------------------------------- -->
            <!-- --------------------------------------------------------------- -->
            <!-- Fin FK : Angle, Thématique + TJ Mots Clés -->
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



    <!-- --------------------------------------------------------------- -->
    <!-- Début Ajax : Langue => Angle, Thématique + TJ Mots Clés -->
    <!-- --------------------------------------------------------------- -->

    <!-- A faire dans un 3ème temps  -->

    <!-- --------------------------------------------------------------- -->
    <!-- Fin Ajax : Langue => Angle, Thématique + TJ Mots Clés -->
    <!-- --------------------------------------------------------------- -->

    <?php
    require_once __DIR__ . '/footerArticle.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>