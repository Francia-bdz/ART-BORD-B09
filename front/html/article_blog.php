<?php

// Mise en forme date
require_once __DIR__ . '/../../util/dateChangeFormat.php';

// Insertion classe Article
require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';

// require_once __DIR__ .  '/../../back/article/ctrlerUploadImage.php';

// Instanciation de la classe ARTICLE
$monArticle = new ARTICLE ();

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
        </style>

</head>

<?php

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $oneArticle = $monArticle-> get_1ArticleAnd3FK($id);
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

  $from = 'Y-m-d H:i:s';
  $to = 'd/m';

  $oneArticle = $monArticle-> get_1ArticleAnd3FK($id);

      $dtCreArt = dateChangeFormat($oneArticle['dtCreArt'], $from, $to);

?>

    <!-- <h2 class="alignement"><span class="enluminure">T</span>itre</h2> -->
    <h2 class="alignement"><?= $oneArticle['libTitrArt']; ?></h2>

    <p class="alignement"><?= $oneArticle['libChapoArt']; ?></p>
        <div class="photo_date"><img class = "recadrage" src="/front/assets/images/P1040500.JPG" alt="image de l'artiste">
        <section class="enluminure_date"><?=$dtCreArt;?></section>
        <h4> Date </h4>
    </div>

    <!-- <div class="pitieligne"> -->
    <div class="misenpage">

        <!-- <div class="ligne_verticale"></div> -->

        <div class="paragraphe_premier"><h3><?= $oneArticle['libAccrochArt']; ?></h3>
        <span class="p">
        <?= $oneArticle['parag1Art']; ?>
        </span></div>
    </div>

    <div class="misenpagedroite">

        <!-- <div class="ligne_verticale"></div> -->

        <div class="paragraphe_premier"><h3><?= $oneArticle['libSsTitr1Art']; ?></h3>
        <span class="p">
            <?= $oneArticle['parag2Art']; ?>
        </span></div>
    </div>

    <!--  SUITE ARTICLE  -->

    <div class="fond_noir">

        <div class="misenpage">

            <!-- <div class="ligne_verticale"></div> -->
    
            <div class="paragraphe_premier"><h3 class="color"><?= $oneArticle['libSsTitr2Art']; ?></h3>
            <span class="pblanc"><?= $oneArticle['parag3Art']; ?></span></div>
        </div>

    </div>

    <?php
  
  ?>
</body>
