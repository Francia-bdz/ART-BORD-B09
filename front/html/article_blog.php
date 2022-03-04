<?php

// Mise en forme date
require_once __DIR__ . '/../../util/dateChangeFormat.php';

// Insertion classe Article
require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';

// require_once __DIR__ .  '/../../back/article/ctrlerUploadImage.php';

// Instanciation de la classe ARTICLE
$monArticle = new ARTICLE();

// Insertion classe Comment
require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';

$monComment = new COMMENT();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="/front/sheets/touslesarticles.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        
        @font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url(/front/assets/typo/Bigilla.otf);
            font-weight: normal;
        }

        h2 {
            font-family: 'Roboto';
            font-size: 70px;
            font-style: normal;
        }

        h3 {
            font-family: 'Roboto';
            font-size: 55px;
            font-style: normal;
            margin-bottom: 2%;
            letter-spacing: 00.25em;
        }

        .color {
            color: white;
        }


        .enluminure {
            font-family: 'bigilla';
            font-size: 100px;
        }

        .enluminure_date {
            font-family: 'Bigilla';
            font-size: 200px;
            color: #FFA800;
            z-index: 1;
            margin-left: -15%;
            padding-bottom: 0%;
            margin-bottom: -3%;
        }

        .alignement {
            margin-left: 15%;
            margin-right: 15%;
            margin-bottom: 0%;
        }

        p {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 20px;
            text-align: left;
            padding: 0%;
        }

        .p {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 20px;
            text-align: left;
            padding: 0%;
            line-height: 150%;
        }

        .pblanc {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 20px;
            text-align: left;
            padding: 0%;
            color: white;
            line-height: 150%;
        }


        h4 {
            font-family: 'Roboto';
            font-style: normal;
            letter-spacing: 00.25em;
            transform: rotate(90deg);
            font-size: 55px;
            padding-left: 0%;
            margin: 0%;
            height: 55px;
            margin-bottom: 30%;
            margin-left: -15%;
        }




        /* - - - - DESIGN - - - -  */

        .recadrage {
            width: 918px;
            height: 651px;
            object-fit: cover;
            margin-top: 5%;
            margin-left: 15%;
        }

        .photo_date {
            display: flex;
            flex-direction: row;
            align-items: flex-end;
            margin-right: 0%;
        }


        .paragraphe_premier {
            display: flex;
            flex-direction: column;
            margin-left: 5%;
            padding-bottom: 0%;
        }

        .misenpage {
            margin: 10%;
            margin-left: 15%;
            border-width: 0px;
            border-left: 11px;
            border-color: #FFA800;
            border-style: double;
            padding-bottom: 0%;
        }


        .ligne_verticale {
            width: 307px;
            height: 11px;
            background-color: #FFA800;
            transform: rotate(90deg);
        }

        .misenpagedroite {
            margin: 10%;
            margin-left: 25%;
            margin-right: 10%;
            border-width: 0px;
            border-left: 11px;
            border-color: #000AFF;
            border-style: double;
            padding-bottom: 0%;
        }

        * {
            margin: 0%;
        }

        .fond_noir {
            background-color: black;
            padding-bottom: 5%;
            padding-top: 2%;
        }

        .barre_commentaire {
    border-color: #FFA800;
    border-radius: 20px;
    border-style: solid;
    width: 540px;
    height: 28px;
    margin-left: 8%;
    margin-bottom: 3%;
    margin-right: 2%;
    padding: 1%;
}

.style_pseudo {
    font-weight: bolder;
}


.mis_en_page_commentaire_plus {
    display: flex;
    flex-direction: row;
    margin-left: 15%;
    margin-right: 35%;
    align-items: center;
    margin-bottom: 5%;
}

.style_typo {
    color: #7798C9;
    font-weight: bolder;
    margin-left: 10%;
}

.recadrage_bouton_coeur {
    width: 25px;
    height: 25px;
    object-fit: cover;
}

a:hover {
    opacity: 0.5;
}

.espace {
    margin-left: 3%;
}

.mis_en_page_commentaire {
    display: flex;
    flex-direction: row;
    align-self: center;
    margin-top: 2%;
    margin-left: 5%;
}

.recadrage_bouton {
    width: 50px;
    height: 50px;
    object-fit: cover;
    align-items: center;
}

.h3_commentaire{
    margin-left: 8%;
}
    </style>

</head>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $oneArticle = $monArticle->get_1ArticleAnd3FK($id);
    $dtCreArt = $oneArticle['dtCreArt'];
    $libTitrArt = $oneArticle['libTitrArt'];
    $libChapoArt = $oneArticle['libChapoArt'];
    $libAccrochArt = $oneArticle['libAccrochArt'];
    $parag1Art = $oneArticle['parag1Art'];
    $libSsTitr1Art = $oneArticle['libSsTitr1Art'];
    $parag2Art = $oneArticle['parag2Art'];
    $libSsTitr2Art = $oneArticle['libSsTitr2Art'];
    $parag3Art = $oneArticle['parag3Art'];
    $libConclArt = $oneArticle['libConclArt'];
    $urlPhotArt = $oneArticle['urlPhotArt'];
}

?>

<body>

    <?php

    require_once __DIR__ . '/cover_article.php';

    $from = 'Y-m-d H:i:s';
    $to = 'd/m';

    $oneArticle = $monArticle->get_1ArticleAnd3FK($id);

    $dtCreArt = dateChangeFormat($oneArticle['dtCreArt'], $from, $to);

    ?>

    <!-- <h2 class="alignement"><span class="enluminure">T</span>itre</h2> -->
    <h2 class="alignement"><?= $oneArticle['libTitrArt']; ?></h2>

    <p class="alignement"><?= $oneArticle['libChapoArt']; ?></p>
    <div class="photo_date"><img class="recadrage" src="<?= ROOTFRONT . '/uploads/' . htmlspecialchars($urlPhotArt); ?>" alt="image de l'artiste">
        <section class="enluminure_date"><?= $dtCreArt; ?></section>
        <h4> Date </h4>
    </div>

    <!-- <div class="pitieligne"> -->
    <div class="misenpage">

        <!-- <div class="ligne_verticale"></div> -->

        <div class="paragraphe_premier">
            <h3><?= $oneArticle['libAccrochArt']; ?></h3>
            <span class="p">
                <?= $oneArticle['parag1Art']; ?>
            </span>
        </div>
    </div>

    <div class="misenpagedroite">

        <!-- <div class="ligne_verticale"></div> -->

        <div class="paragraphe_premier">
            <h3><?= $oneArticle['libSsTitr1Art']; ?></h3>
            <span class="p">
                <?= $oneArticle['parag2Art']; ?>
            </span>
        </div>
    </div>

    <!--  SUITE ARTICLE  -->

    <div class="fond_noir">

        <div class="misenpage">

            <!-- <div class="ligne_verticale"></div> -->

            <div class="paragraphe_premier">
                <h3 class="color"><?= $oneArticle['libSsTitr2Art']; ?></h3>
                <span class="pblanc"><?= $oneArticle['parag3Art']; ?></span>
            </div>
        </div>


        <div class="misenpagedroite">

            <!-- <div class="ligne_verticale"></div> -->

            <div class="paragraphe_premier">
                <span class="pblanc"><?= $oneArticle['libConclArt']; ?></span>
            </div>
        </div>

    </div>

    
    <div class="mis_en_page_commentaire">
        <h3 class="h3_commentaire">Commentaires</h3>
    </div>

    <div class="mis_en_page_commentaire">
    <!-- <div class="barre_commentaire espace "></div> -->
    <input class ="barre_commentaire" type="text" name="libCom" id="libCom" size="540" placeholder="Entrez votre commentaire" autofocus />
    <a type="submit"><img class="recadrage_bouton espace" src="<?= ROOTFRONT . '/front/assets/images/' . 'ajouter commentaire.png'?>" alt="bouton + pour ajouter un commentaire une fois qu'il est écrit"></a>
    <a type="submit"><p class="espace style_typo"> Ajouter un <br> commentaire</p></a>
    </div>

    <?php

    $allComments=$monComment->get_AllCommentsByArticle($id);

    foreach($allComments as $row) {

    ?>
    <div class="mis_en_page_commentaire_plus">
        <p class="style_pseudo"><?= $row["pseudoMemb"]; ?> </p>
    <p class="espace"><?= $row["libCom"]; ?></p>
        <img  class="recadrage_bouton_coeur espace" src="<?= ROOTFRONT . '/front/assets/images/' . 'coeur gris.png' ?>">
    </div>


    <?php
    }
    ?>

    <?php

    require_once __DIR__ . '/footer.php';

    ?>
</body>