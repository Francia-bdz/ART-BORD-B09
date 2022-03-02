<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/front/sheets/base.css" rel="stylesheet" type="text/css" />
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
            font-weight:normal;
            margin-bottom: 0%;
            margin-top: 10%;
        }

        .couleur {
            color: rgb(255, 255, 255);
        }

        .cover {
            background-color: #AD1305;
            height: 620px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }


        .ligne-blanche {
            background-color: white;
            height: 19px;
            width: 900px;
            margin-right: 50%;
        }
    
    </style>
</head>
<section class="cover">
    <h1 class="couleur">
        ART'BORD
    </h1>
    <div class="ligne-blanche"></div>
</section>

</html>