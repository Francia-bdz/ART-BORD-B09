<?php
////////////////////////////////////////////////////////////
//
//  Gestion des CRUD (PDO) - Modifié : 14 Juillet 2021
//
//  Script  : index1.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV

if(!empty($_POST['deconnexion']) and ($_POST['deconnexion'] === "Se deconnecter")){

	unset($_COOKIE['pseudoUser']);

	header("Location: ./index.php" );
}

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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style type="text/css">
		 * {
            font-family: 'Roboto', Arial, Helvetica, sans-serif;
			font-size: 20px;
			color: #333;
			text-decoration-color: transparent;
			margin: 0%;
        }
		a {
			transition: all 0.2s ease-in-out ;
		}

		a:hover {
			text-decoration-color: #333;

		}

		.span_crud{
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
			background-color: #333;	/* => grey */

		}

		@font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url(/front/assets/typo/Bigilla.otf);
            font-weight: normal;
        }

        h1 {
            font-size: 150px;
            font-family: 'Bigilla', Georgia, 'Times New Roman', Times, serif;
            margin-bottom: 0%;
            margin-top: 10%;
			background-color: #137E85;
        }

		h2 {
            font-size: 30px;
			color: #333;
			text-align: center;
			text-decoration: underline;
        }

		.crud{
			font-weight: 400;
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

		.deconnexion{
			color:#137E85;
			background-color: transparent;
			border: 0px;
			cursor:pointer;
			text-align: center;
			margin-left: 4%;
			transition: all 0.2s ease-in-out;
		}

		.deconnexion:hover{
			text-decoration: underline;
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

	<br> <?php if(isset($_COOKIE['pseudoUser'])){ 
		?>
		        <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

			
            <input type="submit" name="deconnexion" class="deconnexion" id="deconnexion" value="Se deconnecter">
			
				</form>
			<?php
		 } ?>
	<br /><br />
	<p>
		<!-- <h2>Connexion...</h2> -->
	</p>
	<!-- <hr class="hr1" /> -->
	<div class="span_crud">
	<span class="crud">CRUD :</span>
	<a href="./back/angle/angle.php"><span>Angle </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./back/article/article.php"><span>Article </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./back/comment/comment.php"><span>Commentaire </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./back/commentplus/commentplus.php">Réponse sur Commentaire</a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./back/langue/langue.php"><span>Langue </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./back/likeart/likeart.php"><span>Like Article </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./back/likecom/likecom.php"><span>Like Commentaire </span></a>
	<br /><br />
<!-- Membre  - reCaptcha à ajouter -->
	<span class="crud">CRUD :</span>
	<a href="./back/membre/membre.php"><span>Membre </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./back/motcle/motcle.php"><span>Mot-clé </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="#">Mot-clé Article => dans Article</a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./back/statut/statut.php"><span>Statut </span></a>
	<br /><br />
	<span class="crud">CRUD :</span>
	<a href="./back/thematique/thematique.php"><span>Thématique </span></a>
	<br /><br />
<!-- User  - reCaptcha à ajouter -->
	<span class="crud">CRUD :</span>
	<a href="./back/user/user.php"><span>User </span></a>
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
<?php require_once __DIR__ .  '/footerblog.php';
?> 

</body>
</html>
