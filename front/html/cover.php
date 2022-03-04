<?php

// Insertion classe Membre

require_once __DIR__ . '/../../class_crud/membre.class.php';

// Instanciation de la classe Membre

$monMembre = new membre();


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
            background-color: #AD1305;
            height: 620px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 3%;
        }


        .ligne-blanche {
            background-color: white;
            height: 19px;
            width: 900px;
            margin-right: 50%;
        }

        .header {
            margin-top: 2%;
            align-self: flex-end;
            font-family: "Roboto";
            font-weight: bold;
            font-size: 25px;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }

        .li_header {
            list-style: none;
            margin-right: 15%;

        }

        .a_header {
            text-decoration: none;
            color: white;
            transition: all 0.2 ease-in-out;
        }

        .a_header:hover {
            color: #7798C9;
        }

        .navbar {
            margin-right: 2%;
            border-radius: 20px;
            padding-left: 2%;
            border: 0px;
            background-color: rgba(255, 255, 255, 0.65);
            font-family: "Roboto";
            font-size: 25px;
            color: white;
            font-style: italic;
        }

        ::placeholder {
            color: white;
            opacity: 0.5;
        }

        .p_header{
            align-self: flex-start;
            margin-right: 45%; 
            white-space: nowrap;
            color: white;

        }

        .deconnexion{
       background-color: transparent;
       text-decoration: none;
       border: none;
       color: white;
       cursor:pointer;
       transition: all 0.2 ease-in;
        }

        .deconnexion:hover{
        text-decoration: underline;
        }
    </style>
</head>

<body>
    <section class="cover">
        <div class="header">

        <?php
        
if(isset($_COOKIE['eMailMemb'])){

    $oneMembre=$monMembre->get_1MembreByEmail($_COOKIE['eMailMemb']);

    $pseudoMemb=$oneMembre['pseudoMemb'];
  
    if ($_SERVER["REQUEST_METHOD"] === "post"){

    if(!empty($_post['deconnexion']) and ($_post['deconnexion'] === "Se deconnecter")){

    setcookie('eMailMemb');
}
}
        ?>
        <form class="p_header" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

            <p class="p_header"> Bonjour, <?=$pseudoMemb; ?>
            <br>
            <input type="submit" name="deconnexion"class="deconnexion" id="deconnexion" value="Se deconnecter">
        </form>
            <?php
}
            ?>
            <li class="li_header"><a href="http://localhost/ARTBORD/BLOGART22/front/html/accueil.php" class="a_header"> Accueil </a></li>
            <li class="li_header"><a href="http://localhost/ARTBORD/BLOGART22/front/html/touslesarticles.php" class="a_header"> Articles </a></li>
            <input class="navbar" type="text" size="30" placeholder="Rechercher" />
        </div>
        <h1 class="couleur">
            ART'BORD
        </h1>
        <div class="ligne-blanche"></div>
    </section>
</body>

</html>