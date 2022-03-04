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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <style type="text/css">
        * {
            margin: 0%;
        }

        @font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url(/front/assets/typo/Bigilla.otf);
        }


        h1 {
            font-size: 200px;
            font-family: 'Bigilla';
            font-weight: normal;
            margin-bottom: 0%;
            margin-top: 10%;
        }


        .couleur {
            color: rgb(255, 255, 255);
        }


        .cover {
            background-color: #151CC0;
            height: 620px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 3%;
        }


        .ligne-orange {
            background-color: #FFA800;
            height: 19px;
            width: 900px;
            margin-right: 50%;
        }

        
        .header{
            margin-top: 2%;
            align-self: flex-end;
            font-family: "Roboto";
            font-weight: bold;
            font-size : 25px;
            display : flex;
            flex-direction: row;
            justify-content :flex-end;   
        }

        .li_header{
            list-style: none;
            margin-right: 15%;
            
        }

        .a_header{
            text-decoration: none;
            color: white;
            transition: all 0.2 ease-in-out;
        }

        .a_header:hover{
            color: #7798C9;
        }

        .navbar{
            margin-right: 2%;
            border-radius: 20px;
            padding-left: 2%;
            border: 0px;
            background-color: rgba(255, 255, 255, 0.65);
            font-family: "Roboto";
            font-size : 25px;
            color: white;
            font-style: italic;
        }

        ::placeholder { 
            color: white;
            opacity: 0.5; 
  }
    </style>
</head>
<section class="cover">
    <div class="header">
        <li class="li_header"><a href="<?= ROOTFRONT . '/front/html/' . 'accueil.php' ?>" class="a_header"> Accueil </a></li>
        <li class="li_header"><a href="<?= ROOTFRONT . '/front/html/' . 'touslesarticles.php' ?>" class="a_header"> Articles </a></li>
        <input class="navbar" type="text" size="30" placeholder="Rechercher" />
    </div>
    <h1 class="couleur">
        ART'BORD
    </h1>
    <div class="ligne-orange"></div>
</section>

</html>