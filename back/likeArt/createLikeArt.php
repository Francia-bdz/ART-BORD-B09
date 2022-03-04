<?php
////////////////////////////////////////////////////////////
//
//  CRUD likeart (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : createLikeArt.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';
// Del accents sur string
require_once __DIR__ . '/../../util/delAccents.php';

// Instanciation de la classe Likeart
require_once __DIR__ . '/../../class_crud/likeart.class.php';

// Insertion classe Likeart
$monLikeArt = new likeart();

// Insertion classe Membre
require_once __DIR__ . '/../../class_crud/membre.class.php';

// Instanciation de la classe Membre
$monMembre = new membre();

// Insertion classe Article

require_once __DIR__ . '/../../class_crud/article.class.php';

// Instanciation de la classe article
$monArticle = new article();

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
        header("Location: ./createLikeArt.php");
    }

    if (((isset($_post['TypMemb'])) and !empty($_post['TypMemb']))
        and ($_post['TypMemb'] != -1) and
        ((isset($_post['TypArt'])) and !empty($_post['TypArt']))
        and ($_post['TypArt'] != -1)
        and (!empty($_post['Submit']) and ($Submit === "Valider"))
    ) {

        $erreur = false;

        $numMemb = ctrlSaisies(($_post['TypMemb']));
        $numArt = ctrlSaisies(($_post['TypArt']));
        $likeA = 1;

        $monLikeArt->create($numMemb, $numArt, $likeA);

        header("Location: ./likeart.php");
    } else {
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }
} 

include __DIR__ . '/initLikeArt.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Like Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <h1>BLOGART22 Admin - CRUD Like Article</h1>
    <h2>Ajout d'un like sur Article</h2>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>

            <input type="hidden" id="id1" name="id1" value="<?= isset($_GET['id1']) ? $_GET['id1'] : '' ?>" />
            <input type="hidden" id="id2" name="id2" value="<?= isset($_GET['id2']) ? $_GET['id2'] : '' ?>" />

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
                    <input type="hidden" id="TypArt" name="TypArt" value="<?= ''; ?>" />
                    <select size="1" name="TypArt" id="TypArt" class="form-control form-control-create" title="Sélectionnez votre article !">
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
            <!-- FIN Listbox Article -->
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
    require_once __DIR__ . '/footerLikeArt.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>