<?php
////////////////////////////////////////////////////////////
//
//  Gestion des CRUD (PDO) - Modifié : 14 Juillet 2021
//
//  Script  : index1.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/util/utilErrOn.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <title>Gestion des CRUD</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Liu+Jian+Mao+Cao&family=Roboto:wght@200&display=swap" rel="stylesheet">

    <style type="text/css">
		 * {
            font-family: 'Roboto';
			font-size: 20px;
			color: #333;
			text-decoration-color: transparent;
			background-color: #CCCCCC;
			margin: 0%;
        }
		a {
			transition: all 0.2s ease-in-out ;
		}

		a:hover {
			text-decoration-color: #333;

		}
		div {
			padding-top: 60px;
			padding-bottom: 40px;
			margin-bottom: 0px;
			margin-left: 60px;
		}
        /* span {
            background-color: yellow;
        } */
		hr {
			border: none;
			height: 3px;
			/* Set the hr color */
			color: #333; /* old IE */
			background-color: #333; /* Modern Browsers */
		}
		.hr1 {
			width: 60%;
			background-color: #CCCCCC;	/* => grey */

		}

		@font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url(/front/assets/typo/Bigilla.otf);
            font-weight: normal;
        }

        h1 {
            font-size: 150px;
            font-family: 'Bigilla';
            margin-bottom: 0%;
            margin-top: 10%;
			background-color: #137E85;
        }

		h2 {
            font-size: 30px;
			color: white;
			text-align: center;
			text-decoration: underline;
        }

		.crud{
			font-weight: bolder;
		}
        .couleur {
            color: rgb(255, 255, 255);
        }

        .cover {
            background-color: #137E85;
            height: 520px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }


        .ligne-blanche {
            background-color: white;
            height: 20px;
            width: 900px;
            margin-right: 50%;
			padding-top: 0px;
			padding-bottom: 0px;
        }

    </style>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"></script>
</head>
<body>

<section class="cover">
        <h1 class="couleur">
            GESTION DES CRUD
        </h1>
        <div class="ligne-blanche"></div>
</section>
	<br />
	<h2>Panneau d'Admin : CRUD - BLOGART22 (ETUD)</h2>
	<br /><br />
	<p>
		<!-- <h2>Connexion...</h2> -->
	</p>
	<!-- <hr class="hr1" /> -->
	<div>
	<span class="crud">CRUD :</span>
	<a href="./BACK/angle/angle.php"><span>Angle </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./BACK/article/article.php"><span>Article </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./BACK/comment/comment.php"><span>Commentaire </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./BACK/commentplus/commentplus.php">Réponse sur Commentaire</a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./BACK/langue/langue.php"><span>Langue </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./BACK/likeart/likeart.php"><span>Like Article </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./BACK/likecom/likecom.php"><span>Like Commentaire </span></a>
	<br /><br />
<!-- Membre  - reCaptcha à ajouter -->
	<span class="crud">CRUD :</span>
	<a href="./BACK/membre/membre.php"><span>Membre </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./BACK/motcle/motcle.php"><span>Mot-clé </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="#">Mot-clé Article => dans Article</a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./BACK/statut/statut.php"><span>Statut </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./BACK/thematique/thematique.php"><span>Thématique </span></a>
	<br /><br />
<!-- User  - reCaptcha à ajouter -->
	<span class="crud">CRUD :</span>
	<a href="./BACK/user/user.php"><span>User </span></a>
	<br /><br /><hr class="hr1" /><br />
	<span class="crud">Barre de recherche :</span>
	<a href="./SearchBar/barreF2.php"><span>CONCAT : Un SEUL Mot clé dans articles </span></a>
	<br>(F1 en GET)
	<br /><br />
	<span class="crud">Barre de recherche :</span>
	<a href="./SearchBar/barreCONCAT.php"><span>CONCAT : Mots clés dans articles & thématiques </span></a>
	<br /><br />
	<span class="crud">Barre de recherche :</span>
	<a href="./SearchBar/barreJOIN.php"><span>JOIN : Liste des Mots clés par article </span></a>
	<br /><br />
	<span class="crud">Barre de recherche :</span>
	<a href="./SearchBar/barreLes2.php"><span>Les 2 (CONCAT, JOIN) : Mots clés dans articles, thématiques & liste des Mots clés par article </span></a>
	<br /><br />
	</div>
<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
