<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            font-size: 55px;
        }

        .p_apropos {
            font-family: 'Roboto'Arial;
            font-size: 20px;
            text-align: left;
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

        .art_recent{
            padding-bottom : 5%;
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
                <h2><span class="enluminure">A</span>rticles récents</h2>
                <div class="ligne-noir"></div>
            </section>
            <section class="articles">
                <img class="img-article" src="/front/assets/images/P1040500.JPG">
                <div class="text_article">
                    <div class="titre-bouton">
                        <h3 class="color-title-home">Nobu</h3><a><img class="bouton" src="/front/assets/images/Bouton-foncé.png"></a>
                    </div>
                    <p class="p_apropos">Lorem ipsum dolor sit amet, 
                        consectetur adipiscing elit. Metus, varius a morbi dapibus imperdiet aliquam. 
                        Vitae nam sit diam pellentesque sem massa mattis a. 
                        Habitant sed volutpat risus dictum vel tellus tincidunt. 
                        Tincidunt cursus habitant ipsum quis sollicitudin pharetra.</p>
                </div>
            </section>
            </section>
            <section class="articles">
                <img class="img-article" src="/front/assets/images/FIFIB2018-FCBK-EVENT-1920x1080.png">
                <div class="text_article">
                    <div class="titre-bouton">
                        <h3 class="color-title-home">Fifib</h3><a><img class="bouton" src="/front/assets/images/Bouton-foncé.png"></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, 
                        consectetur adipiscing elit. Metus, varius a morbi dapibus imperdiet aliquam. 
                        Vitae nam sit diam pellentesque sem massa mattis a. 
                        Habitant sed volutpat risus dictum vel tellus tincidunt. 
                        Tincidunt cursus habitant ipsum quis sollicitudin pharetra.</p>
                </div>
            </section>

            <div class="color-button">
                <p>Plus d'articles</p><a><img class="bouton" src="/front/assets/images/Bouton-foncé.png"></a>
            </div>
        </div>
</body>