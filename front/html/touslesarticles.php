<?php

// Mise en forme date
require_once __DIR__ . '/../../util/dateChangeFormat.php';

// Insertion classe Article
require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';

// Instanciation de la classe ARTICLE
$monArticle = new ARTICLE();

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
    <link href="/front/sheets/touslesarticles.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        * {
            margin: 0%;
            padding: 0%;
            font-family: 'Roboto', 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        @font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url(/front/assets/typo/Bigilla.otf);

        }

        h1 {
            font-size: 200px;
            font-family: "Bigilla";
            font-weight: normal;
            margin-bottom: 0%;
            margin-top: 10%;
        }

        .couleur_h1 {
            color: rgb(255, 255, 255);
        }

        .cover_articles {
            background-color: #BD00FF;
            height: 609px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .ligne_jaune {
            background-color: #FFF500;
            height: 19px;
            width: 900px;
            margin-right: 50%;
        }

        .p_intro {
            font-family: 'Roboto', 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 20px;
            text-align: left;
            margin: 5%;
        }

        .image_article {
            width: 500px;
            height: 384px;
            object-fit: cover;
        }

        .date_article {
            font-family: 'Bigilla';
            font-style: bold;
            font-size: 35px;
            margin-top: 5%;
        }

        .l_jaune {
            height: 14px;
            width: 377px;
            background-color: #FFF500;
        }

        .titre_article {
            font-family: 'Roboto', 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 45px;
            font-style: bold;
            line-height: 40px;
            margin-top: 10%;
            margin-bottom: 5%;
        }

        .articles_div {
            margin: 5% 5% 5%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .articles {
            max-width: 500px;
            display: flex;
            flex-direction: column;
            margin-bottom: 5%;
        }

        .articles_div {
            justify-content: space-between;

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

        .lire_plus {
            margin-top: 2%;
            font-weight: bold;
            font-size: larger;

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
    </style>

</head>

<body>
    <section class="cover_articles">
        <div class="header">
            <li class="li_header"><a href="#" class="a_header"> Accueil </a></li>
            <li class="li_header"><a href="#" class="a_header"> Articles </a></li>
            <input class="navbar" type="text" size="30" placeholder="Rechercher" />
        </div>
        <h1 class="couleur_h1"> ARTICLES </h1>
        <div class="ligne_jaune"></div>
    </section>

    <p class="p_intro">Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Totam esse dolorum iusto mollitia et blanditiis, culpa dicta
        fugiat tempore qui! Accusantium optio, dicta illo cumque numquam
        velit libero distinctio saepe.
        Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Totam esse dolorum iusto mollitia et blanditiis, culpa dicta
        fugiat tempore qui! Accusantium optio, dicta illo cumque numquam
        velit libero distinctio saepe.</p>


    <div class="articles_div">

        <?php
        $from = 'Y-m-d H:i:s';
        $to = 'd/m';

        $allArticles = $monArticle->get_AllArticlesByNumAnglNumThem();

        foreach ($allArticles as $row) {

            $dtCreArt = dateChangeFormat($row['dtCreArt'], $from, $to);
        ?>

            <div class="articles">
                <img class="image_article" src="<?= ROOTFRONT . '/uploads/' . htmlspecialchars($row['urlPhotArt']); ?>" alt="Photo de l'article">
                <p class="date_article"><?= $dtCreArt; ?></p>
                <div class="l_jaune"></div>
                <h3 class="titre_article"> <?= $row["libTitrArt"]; ?> </h3>
                <p class="p_article"><?= $row["libChapoArt"]; ?></p>
                <a href="./article_blog.php?id=<?= $row["numArt"]; ?>" class="lire_plus">Lire plus</a>
            </div>

        <?php
        }
        ?>

    </div>
</body>

<?php require_once __DIR__ .  '/footer.php';
?>