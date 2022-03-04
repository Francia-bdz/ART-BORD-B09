

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Liu+Jian+Mao+Cao&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="/front/sheets/footer.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php

require_once __DIR__ . '/cover.php';
require_once __DIR__ . '/articlesrecents.php';
require_once __DIR__ . '/apropos.php';
// require_once __DIR__ . '/footer.php';
// require_once __DIR__ . '/popup.php';

?>

<footer>
        <div class="title_and_rectangle">
            <p class="title_footer">ART'BORD</p>
            <div class="rectangle_noir_footer"></div>
        </div>
        <div class="Plan_du_site">
            <div class="Plan_du_site_1">
                <ul>
                    <li class="li_Plan_du_site"><a href="http://localhost/ARTBORD/BLOGART22/front/html/accueil.php" class="a_Plan_du_site"> Accueil </a></li>
                    <li class="li_Plan_du_site"><a href="http://localhost/ARTBORD/BLOGART22/front/html/touslesarticles.php" class="a_Plan_du_site"> Articles </a></li>
                </ul>
            </div>
            <div class="Plan_du_site_2"></div>
            <ul>
                <li class="li_Plan_du_site"><a href="http://localhost/ARTBORD/BLOGART22/front/html/connexion.php" class="a_Plan_du_site"> Se connecter </a></li>
                <li class="li_Plan_du_site"><a href="http://localhost/ARTBORD/BLOGART22/front/html/inscription.php" class="a_Plan_du_site"> S'inscrire</a></li>
            </ul>
        </div>
        <div class="Partie_Droit_Background">
            <div class="Partie_Droit">

                <li><a href="#"> Mentions légales |</a></li>
                <li><a href="#"> Conditions générales d'utilisation |</a></li>
                <li><a href="#"> Cookies |</a></li>
                <li><a href="#"> Protection des données |</a></li>

            </div>
        </div>

    </footer>

    <style type="text/css">
        @font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url(/front/assets/typo/Bigilla.otf);
            font-weight: normal;
        }

        * {
            margin: 0%;
            padding: 0%;

        }

        footer {
            background-color: #E1E1E1;
        
        }

        .title_and_rectangle {
            display: flex;
            justify-content: space-between;
            margin-left: 5%;
        }

        .title_footer {
            font-family: 'Bigilla';
            font-size: 80px;
            font-weight: normal;
            margin-top: 2%;
        }

        .rectangle_noir_footer {
            align-self: center;
            background-color: black;
            width: 500px;
            height: 10px;
        }

        a {
            text-decoration: none;
            color: black;

        }

        li {
            list-style: none;
        }

        .Plan_du_site {
            display: flex;
            font-family: 'Roboto', Arial, Helvetica, sans-serif;
            font-weight: 400;

        }

        .li_Plan_du_site {
            margin-bottom: 20%;
            margin-top: 20%;
        }

        .Plan_du_site_1 {
            margin-left: 5%;
        }

        .Plan_du_site_2 {
            margin-left: 20%;
        }


        .Partie_Droit_Background {
            margin-top: 2%;
            background-color: #D2D2D2;
        }

        .Partie_Droit {
            display: flex;
            height: 50px;

            font-family: 'Roboto', Arial, Helvetica, sans-serif;
            font-weight: bold;

            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin-left: 5%;
            margin-right: 10%;
        }

        a {
            transition: color 0.3 ease-in-out;
        }

        a:hover {
            color: #7798C9;
        }
    </style>
    
</body>

