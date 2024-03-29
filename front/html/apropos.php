<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Liu+Jian+Mao+Cao&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="/front/sheets/apropos.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        /* TYPO */

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

        .enluminure {
            font-family: 'Bigilla';
            font-size: 200px;
            color: #AD1305;
        }

        .color_text_propos {
            color: white;
            text-align: right;
            margin-right: 10%;
            padding-top: 10%;
        }

        p {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 20px;
            text-align: left;
        }

        .color_credit {
            color: white;
            margin-left: 18%;
        }




        /* DESIGN */


        .fond_noir {
            background-color: black;
            height: 1385px;
        }

        .peinture_text {
            display: flex;
            flex-direction: row;
            margin-top: 5%;
            margin: auto;
            justify-content: center;
        }

        * {
            margin: 0%;
        }

        .rectangle_blanc {
            background-color: white;
            width: 487px;
            height: 667px;
        }

        img {
            width: 500px;
            height: 500px;
        }

        .fit-picture {
            width: 487px;
            height: 667px;
            object-fit: cover;

        }

        .marge {
            margin: 5%;
            line-height: 170%;
        }
    </style>
</head>

<body>
    <div class="fond_noir">
        <h2 class="color_text_propos"><span class="enluminure">À</span> propos</h2>
        <div class="peinture_text"><img class="fit-picture" src="<?= ROOTFRONT . '/front/assets/images/' . '524239-main-5dc400e55b982.jpg'?>">
            <section class="rectangle_blanc">
                <p class="marge">Anaïs, Cléo, Francia, Louna, Perrine, nous sommes cinq copines résidant à Bordeaux pour nos études ! Certaines sont nées ici, d’autres ont voyagé pour arriver jusqu’à cette ville magnifique. Notre point commun ? Nous sommes tombées amoureuse de Bordeaux. Son dynamisme, ses rues magnifiques, mais surtout sa capacité à nous faire voyager. En effet, selon nous, Bordeaux a cette capacité à rendre l’art accessible et captivant. Passionnées d’écriture, de design et désireuses d’exploiter notre créativité, nous avons eu l’idée de créer un blog réunissant nos centres d’intérêts : écrire des articles sur Bordeaux et ses artistes et ainsi, vous faire voyager avec nous. Alors, installez vous confortablement avec nous et préparez vous à en prendre plein les yeux !</p>
            </section>
        </div>
        <p class="color_credit">Maurice Larue,
            <i>1861</i>,
            <u>Bordeaux</u>
        </p>
    </div>
</body>