<?php
////////////////////////////////////////////////////////////
//
//  CRUD ARTICLE (PDO) - Modifié : 10 Juillet 2021
//
//  Script  : updateArticle.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// => del + insert dans TJ motclearticle
// => upload image & update path si modif
//
// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

require_once __DIR__ . '/../../util/preparerTags.php';

// Init constantes
include __DIR__ . '/initConst.php';
// Init variables
include __DIR__ . '/initVar.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';
// Mise en forme date
require_once __DIR__ . '/../../util/dateChangeFormat.php';

require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
// Insertion classe Article

$monArticle = new ARTICLE();

// Insertion classe Langue
require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';

// Instanciation de la classe Langue
$maLangue = new LANGUE();

// Insertion classe Angle
require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';

// Instanciation de la classe Angle
$monAngle = new ANGLE();

// Insertion classe Thematique
require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';

// Instanciation de la classe Angle
$maThematique = new THEMATIQUE();


// Insertion classe MotCleArticle

// Instanciation de la classe MotCleArticle


// Insertion classe MotCle

// Instanciation de la classe MotCle



// Gestion des erreurs de saisie
$erreur = false;
// dossier images
$targetDir = TARGET;

// init mots cles

// Gestion du $_SERVER["REQUEST_METHOD"] => En POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if(isset($_POST['Submit'])){
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }

    if ((isset($_POST["Submit"])) AND ($Submit === "Initialiser")) {
        $sameId= $_POST['id'];
        header("Location: ./updateArticle.php?id=".$sameId);
    }  


    if (((isset($_POST['libTitrArt'])) AND !empty($_POST['libTitrArt']))
    AND ((isset($_POST['libChapoArt'])) AND !empty($_POST['libChapoArt']))
    AND ((isset($_POST['libAccrochArt'])) AND !empty($_POST['libAccrochArt']))
    AND ((isset($_POST['parag1Art'])) AND !empty($_POST['parag1Art']))
    AND((isset($_POST['libSsTitr1Art'])) AND !empty($_POST['libSsTitr1Art']))
    AND((isset($_POST['parag2Art'])) AND !empty($_POST['parag2Art']))
    AND((isset($_POST['libSsTitr2Art'])) AND !empty($_POST['libSsTitr2Art']))
    AND((isset($_POST['parag3Art'])) AND !empty($_POST['parag3Art']))
    AND((isset($_POST['libConclArt'])) AND !empty($_POST['libConclArt']))
    AND ((isset($_POST['TypAngl'])) AND !empty($_POST['TypAngl']))
    AND ($_POST['TypAngl']!=-1)
    AND ((isset($_POST['TypThem'])) AND !empty($_POST['TypThem']))
    AND ($_POST['TypThem']!=-1)
    AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
     
        $erreur = false;

        $libTitrArt = ctrlSaisies(($_POST['libTitrArt']));
        $libChapoArt = ctrlSaisies(($_POST['libChapoArt']));
        $libAccrochArt = ctrlSaisies(($_POST['libAccrochArt']));
        $parag1Art = ctrlSaisies(($_POST['parag1Art']));
        $libSsTitr1Art = ctrlSaisies(($_POST['libSsTitr1Art']));
        $parag2Art = ctrlSaisies(($_POST['parag2Art']));
        $libSsTitr2Art = ctrlSaisies(($_POST['libSsTitr2Art']));
        $parag3Art = ctrlSaisies(($_POST['parag3Art']));
        $libConclArt = ctrlSaisies(($_POST['libConclArt']));
        // $urlPhotArt = ctrlSaisies(($_POST['urlPhotArt']));
        $numAngl = ctrlSaisies(($_POST['TypAngl']));
        $numThem = ctrlSaisies(($_POST['TypThem']));

        $urlPhotArt ='null';

        $numArt = ctrlSaisies(($_POST['id']));

        $monArticle->update($numArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem);

        header("Location: ./article.php");
    }   
    else {
        // Saisies invalides
        $erreur = true;
         $errSaisies =  "Erreur, la saisie est obligatoire !";
    
    }   

    // Traitnemnt : upload image => Chnager image
    // Nom image à la volée

}   // Fin if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
include __DIR__ . '/initArticle.php';
// En dur
$urlPhotArt = "../uploads/imgArt2dd0b196b8b4e0afb45a748c3eba54ea.png";
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
<!--     <script src="./script_global.js"></script> -->
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
    <h1>BLOGART22 Admin - CRUD Article</h1>
    <h2>Modification d'un article</h2>
<?php
  
  if (isset($_GET['id'])){
    $id = $_GET['id'];
    $oneArticle = $monArticle-> get_1Article($id);
    $dtCreArt = $oneArticle['dtCreArt'];
    $libTitrArt = $oneArticle['libTitrArt'];
    $libChapoArt = $oneArticle['libChapoArt'];
    $libAccrochArt = $oneArticle['libAccrochArt'];
    $parag1Art = $oneArticle['parag1Art'];
    $parag2Art = $oneArticle['parag2Art'];
    $libSsTitr2Art = $oneArticle['libSsTitr2Art'];
    $parag3Art = $oneArticle['parag3Art'];
    $libConclArt = $oneArticle['libConclArt'];
    $urlPhotArt = $oneArticle['urlPhotArt'];
    $numAngl = $oneArticle['numAngl'];
    $numThem = $oneArticle['numThem'];
}

?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8" id="chgLang">

      <fieldset>
        <legend class="legend1">Formulaire Article...</legend>

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
            <input type="text" name="dtCreArt" id="dtCreArt" value="<?= $dtCreArt; ?>" tabindex="20" placeholder="" disabled />
            </div>
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="libChapoArt"><b>Chapeau :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <div class="controls">
                <textarea name="libChapoArt" id="libChapoArt" rows="10" cols="100" tabindex="30" placeholder="Décrivez le chapeau. Sur 500 car." ><?= $libChapoArt; ?></textarea>
            </div>
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="libAccrochArt"><b>Accroche paragraphe 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <div class="controls">
                <input type="text" name="libAccrochArt" id="libAccrochArt" size="100" maxlength="100" value="<?= $libAccrochArt; ?>" tabindex="40" placeholder="Sur 100 car." />
            </div>
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="parag1Art"><b>Paragraphe 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <div class="controls">
                <textarea name="parag1Art" id="parag1Art" rows="10" cols="100" tabindex="50" placeholder="Décrivez le premier paragraphe. Sur 1200 car." ><?= $parag1Art; ?></textarea>
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
                <textarea name="parag2Art" id="parag2Art" rows="10" cols="100" tabindex="70" placeholder="Décrivez le deuxième paragraphe. Sur 1200 car." ><?= $parag2Art; ?></textarea>
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
                <textarea name="parag3Art" id="parag3Art" rows="10" cols="100" tabindex="90" placeholder="Décrivez le troisième paragraphe. Sur 1200 car." ><?= $parag3Art; ?></textarea>
            </div>
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="libConclArt"><b>Conclusion :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <div class="controls">
                <textarea name="libConclArt" id="libConclArt" rows="10" cols="100" tabindex="100" placeholder="Décrivez la conclusion. Sur 800 car." ><?= $libConclArt; ?></textarea>
            </div>
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="urlPhotArt"><b>Importez l'illustration :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <div class="controls">
                <input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="<?= MAX_SIZE; ?>" />
                <input type="file" name="monfichier" id="monfichier" required="required" accept=".jpg,.gif,.png,.jpeg" size="70" maxlength="70" value="<?= "$urlPhotArt"; ?>" tabindex="110" placeholder="Sur 70 car." title="Recherchez l'image à uploader !" />
                <p>
<?php              // Gestion extension images acceptées
                  $msgImagesOK = "&nbsp;&nbsp;>> Extension des images acceptées : .jpg, .gif, .png, .jpeg" . "<br>" .
                    "(lageur, hauteur, taille max : 80000px, 80000px, 200 000 Go)";
                  echo "<i>" . $msgImagesOK . "</i>";
?>
                </p>
                <p><b><i>Image actuelle :&nbsp;&nbsp;<img src="<?= $targetDir . htmlspecialchars($urlPhotArt); ?>" height="183" width="275" /></i></b></p>

            </div>
        </div>
        <br>
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- Listbox Langue -->
    <div class="control-group">
            <div class="controls">      

                <label for="LibTypLang" title="Sélectionnez la langue !">
            <b>Quelle langue :&nbsp;&nbsp;&nbsp;</b>
        </label>
        <input type="hidden" id="idLang" name="idLang" value="<?= ''; ?>" />
            <select size="1" name="TypLang" id="TypLang"  class="form-control form-control-create" title="Sélectionnez la langue !" >
                <option value="-1">- - - Choisissez une langue - - -</option>
<?php
                $listNumLang= "";
                $listlib1lang = "";

                $result=$maLangue->get_AllLangues();

                if($result){
                    foreach($result as $row) {
                        $listNumLang = $row["numLang"];
                        $listlib1lang = $row["lib1Lang"];
?>
                        <option value="<?= $listNumLang; ?>">
                            <?= $listlib1lang; ?>
                    </option>
<?php
                    } // End of foreach
                }   // if ($result)
?>
            </select>
            </div>
        </div>
    <!-- FIN Listbox Langue -->
<!-- --------------------------------------------------------------- -->

<!-- --------------------------------------------------------------- -->
    <!-- FK : Angle, Thématique + TJ Mots Clés -->
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- Listbox Angle live share -->
    <div class="control-group">
            <div class="controls">      

                <label for="LibTypLang" title="Sélectionnez l'angle !">
            <b>Quelle angle :&nbsp;&nbsp;&nbsp;</b>
        </label>
        <input type="hidden" id="idAngl" name="idAngl" value="<?= ''; ?>" />
            <select size="1" name="TypAngl" id="TypAngl"  class="form-control form-control-create" title="Sélectionnez la langue !" >
                <option value="-1">- - - Choisissez un angle - - -</option>
<?php
                $listNumAngl= "";
                $listLibAngl = "";

                $result=$monAngle->get_AllAngles();

                if($result){
                    foreach($result as $row) {
                        $listNumAngl = $row["numAngl"];
                        $listLibAngl = $row["libAngl"];
?>
                        <option value="<?= $listNumAngl; ?>">
                            <?= $listLibAngl; ?>
                    </option>
<?php
                    } 
                }  
?>
            </select>
            </div>
        </div>
        <br>
    <!-- FIN Listbox Angle -->
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- Listbox Thématique -->
        <br>
        <div class="control-group">
            <div class="controls">      

                <label for="LibTypLang" title="Sélectionnez l'angle !">
            <b>Quelle thématique :&nbsp;&nbsp;&nbsp;</b>
        </label>
        <input type="hidden" id="idThem" name="idThem" value="<?= ''; ?>" />
            <select size="1" name="TypThem" id="TypThem"  class="form-control form-control-create" title="Sélectionnez la langue !" >
                <option value="-1">- - - Choisissez une thématique - - -</option>
<?php
                $listNumThem= "";
                $listLibThem = "";

                $result=$maThematique->get_AllThematiques();

                if($result){
                    foreach($result as $row) {
                        $listNumThem = $row["numThem"];
                        $listLibThem = $row["libThem"];
?>
                        <option value="<?= $listNumThem; ?>">
                            <?= $listLibThem; ?>
                    </option>
<?php
                    } 
                }  
?>
            </select>
            </div>
        </div>
    <!-- FIN Listbox Thématique -->
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- Drag and drop Mot Clé -->
<!-- --------------------------------------------------------------- -->

    <br><br>

    <div class="controls">
        <label class="control-label" for="LibTypMotsCles1">
            <b>Choisissez les mots clés liés à l'article :&nbsp;&nbsp;&nbsp;</b>
        </label>
    </div>
    <!-- A faire dans un 2/3ème temps  -->

<!-- --------------------------------------------------------------- -->
    <!-- FIN Drag and drop Mot Clé -->
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
                <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
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
