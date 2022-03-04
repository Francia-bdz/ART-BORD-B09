<?php

// Insertion classe Article
require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';

// Instanciation de la classe article
$monArticle = new article();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles récents</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Liu+Jian+Mao+Cao&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="/front/sheets/articlesrecents.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        /* TYPO */


        @font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url(/front/assets/typo/Bigilla.otf);
            font-weight: normal;
        }


        h3 {
            font-family: 'Roboto';
            letter-spacing: 0.25em;
            font-size: 30px;
            margin-bottom: 3%;
        }

        .p_apropos {
            font-family: 'Roboto'Arial;
            font-size: 20px;
            text-align: left;
            line-height: 140%;
        }

        .margin_text_bienvenue {
            margin: 5%;
        }

        h2 {
            font-family: 'Roboto';
            font-size: 70px;
            font-weight: normal;
            margin-left: 5%;
            margin-bottom: 0%;

        }

        .aligner {
            text-align: center;
        }

        .titre {
            display: flex;
            flex-direction: column;
        }


        .color-title-home {
            color: #AD1305;
        }

        .enluminure {
            font-family: Bigilla;
            font-size: 100px;
            font-weight: normal;
            color: #AD1305;
        }



        /* DESIGN */


        .ligne-noir {
            background-color: black;
            height: 19px;
            width: 291px;
            margin-left: 22%;
        }

        .articles {
            display: flex;
            margin-top: 5%;
            margin-left: 14%;
            margin-right: 14%;
            flex-direction: row;
        }

        .texte_articles {
            display: flex;
            flex-direction: column;
        }

        .img-article {
            width: 400px;
            height: 400px;
            object-fit: cover;
            margin-right: 5%;
        }

        a:hover {
            opacity: 0.5;
        }


        /* BOUTON */


        .titre-bouton {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .bouton {
            width: 50px;
            height: 50px;

        }

        .color-button {
            margin-top: 20%;
            margin-right: 5%;
            color: #7798C9;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            align-items: center;
        }

        .art_recent {
            padding-bottom: 5%;
        }





        /* PLUS */


        @font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url(bigilla.otf);
            font-weight: normal;
        }
    </style>
</head>

<body>
    <div>
        <div>

            <h3 class="aligner"> Bienvenue </h3>
            <p class="margin_text_bienvenue">Bonjour, bienvenue sur Art’Bord,
                le blog destiné à vous faire découvrir Bordeaux à travers ses artistes.
                Par ce blog, nous rassemblons des personnes partageant nos hobbys et passions,
                à savoir, l’art dans son entièreté !
                Musique, cinéma, dessin, écriture, festivals et évènements,
                ici vous découvrirez des articles originaux et variés,
                qui pourraient parler aux artistes et aux passionnés.
                Amateur, ou véritable professionnel ?
                Peu importe car notre blog vise simplement à vous faire découvrir,
                vous faire voyager à travers Bordeaux et ses artistes.</p>

        </div>

        <div class="art_recent">
            <section class="titre">
                <h2><span class="enluminure">A</span>rticles phares</h2>
                <div class="ligne-noir"></div>
            </section>

            <?php $Article1 = $monArticle->get_1Article(30);

            $numArt1 = $Article1['numArt'];
            $libTitrArt1 = $Article1['libTitrArt'];
            $libChapoArt1 = $Article1['libChapoArt'];
            $urlPhotArt1 = $Article1['urlPhotArt'];

            ?>

            <section class="articles">
                <img class="img-article" src="<?= ROOTFRONT . '/uploads/' . htmlspecialchars($urlPhotArt1); ?>">
                <div class="text_article">
                    <div class="titre-bouton">
                        <h3 class="color-title-home"> <?= $libTitrArt1; ?> ok </h3><a href="<?= ROOTFRONT . '/front/html/' . 'article_blog.php?id=' . $numArt1 ?>"><img class="bouton" src="<?= ROOTFRONT . '/front/assets/images/' . 'Bouton.png' ?>"></a>
                    </div>
                    <p class="p_apropos"><?= $libChapoArt1 ?></p>
                </div>
            </section>

            <?php $Article2 = $monArticle->get_1Article(31);
            $numArt2 = $Article2['numArt'];
            $libTitrArt2 = $Article2['libTitrArt'];
            $libChapoArt2 = $Article2['libChapoArt'];
            $urlPhotArt2 = $Article2['urlPhotArt'];

            ?>

            <section class="articles">
                <img class="img-article" src="<?= ROOTFRONT . '/uploads/' . htmlspecialchars($urlPhotArt2); ?>">
                <div class="text_article">
                    <div class="titre-bouton">
                        <h3 class="color-title-home"> <?= $libTitrArt2; ?> ok </h3><a href="<?= ROOTFRONT . '/front/html/' . 'article_blog.php?id=' . $numArt2 ?>"><img class="bouton" src="<?= ROOTFRONT . '/front/assets/images/' . 'Bouton.png' ?>"></a>
                    </div>
                    <p class="p_apropos"><?= $libChapoArt2 ?></p>
                </div>
            </section>

            <div class="color-button">
                <p>Plus d'articles</p><a href="<?= ROOTFRONT . '/front/html/' . 'touslesarticles.php' ?>"><img class="bouton" src="<?= ROOTFRONT . '/front/assets/images/' . 'Bouton.png' ?>"></a>
            </div>
        </div>
</body>