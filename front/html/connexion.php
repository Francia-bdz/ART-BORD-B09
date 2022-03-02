<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Membre

require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';

// Instanciation de la classe Membre

$monMembre = new MEMBRE();

$eMailMemb = "";
$passMembTest = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['Submit'])) {
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }

    if ((!empty($_POST['Submit']) and ($Submit === "Valider"))) {

        if (((isset($_POST['eMailMemb'])) and !empty($_POST['eMailMemb']))
            and ((isset($_POST['passMembTest'])) and !empty($_POST['passMembTest']))
        ) {

            $oneMembre=$monMembre->get_1MembreByEmail($_POST['eMailMemb']);

            if ($oneMembre != false) {

                $eMailMemb = $oneMembre['eMailMemb'];
                $passMemb = $oneMembre['passMemb'];

                if ($passMemb == $_POST['passMembTest']) {

                    // (password_verify($_POST['passMemb'], $passMemb) === true);
                    setcookie('eMailMemb', $eMailMemb, time() + 3600);
                    header("Location: ./cover.php");
                } else {
                    echo "Mauvais Mot de passe";
                }
            } else {
                echo "Adresse Mail Non-Reconnue";
            }
        } else {
            echo "Erreur, la saisie est obligatoire !";
        }
    }
}



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Liu+Jian+Mao+Cao&family=Roboto:wght@100&display=swap" rel="stylesheet">

    <style type="text/css">
        @font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url('Bigilla.otf');
            font-weight: normal;
        }

        * {
            margin: 0%;
            padding: 0%;
            font-family: 'Roboto';

        }

        .title_and_rectangle_connexion {
            margin-top: 2%;
        }


        .Partie_Texte {
            margin-left: 3%;
        }

        h1 {
            font-family: "Bigilla", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 200px;
            text-align: center;
        }

        h2 {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin-top: 3%;
            font-weight: lighter;
            font-size: 75px;
        }

        .rectangle_rouge {
            height: 10px;
            width: 650px;
            background-color: #AD1305;
            margin: 0 auto;
        }

        input {
            border-radius: 4px;
            background-color: #C4C4C4;
            padding: 10px 20px;
            border: 0px;
            font-size: 16px;
        }

        b {
            font-size: 20px;
            margin-right: 1%;
        }

        .bouton_affichage_mdp {
            margin-top: 1%;
        }

        .connexion_control {
            margin-top: 2%;
        }

        .enluminure {
            font-family: "Bigilla";
            font-size: 100px;
            color: #AD1305;
        }

        input[type=submit] {
            margin-top: 2%;
            transition: all 0.2s ease-in-out;
        }

        input[type=submit]:hover {
            -webkit-filter: brightness(70%);
            filter: brightness(70%);
        }

        .Pas_encore_inscrit {
            margin-top: 2%;
            font-weight: bolder;
        }

        .Pas_encore_inscrit_lien {
            text-decoration: none;
            color: #AD1305;
            transition: all 0.2s ease-in-out;
        }

        .Pas_encore_inscrit_lien:hover {
            color: #7798C9;
        }

        
        /* Footer */

        footer {
            margin-top: 4%;
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
            font-weight: bold;
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
            font-size: 16px;
        }

        li {
            list-style: none;
        }

        .Plan_du_site {
            display: flex;
            font-family: 'Roboto', Arial, Helvetica, sans-serif;
            font-weight: bold;
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

    <link href="/front/sheets/connexion.css" rel="stylesheet" type="text/css" />

    <script>
        // Affichage pass
        function myFunction(myInputPass) {
            var x = document.getElementById(myInputPass);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</head>

<body>

<form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">


<input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />


    <div class="title_and_rectangle_connexion">
        <h1> BIENVENUE</h1>
        <div class="rectangle_rouge"></div>
    </div>
    <div class="Partie_Texte">
        <div class="Partie_connexion">
            <h2><span class="enluminure">C</span>onnexion</h2>

            <div class="Pseudo_control connexion_control">
                <label class="control-label" for="eMailMemb"><b>Adresse Mail:</b></label>
                <input type="text" name="eMailMemb" id="eMailMemb" size="50" placeholder="Entrez votre adresse mail" value="<?= $eMailMemb ?>" autofocus />
            </div>

            <div class="Mdp_control connexion_control">

                <label class="control-label" for="passMembTest"><b>Mot de passe:</b></label>
                <input type="password" name="passMembTest" id="passMembTest" size="43" placeholder="Entrez votre mot de passe" value="<?= $passMembTest ?>" autofocus />
                <br>
                <div class="bouton_affichage_mdp">
                    <input type="checkbox" onclick="myFunction('passMembTest')">
                    &nbsp;&nbsp;
                    <label><i>Afficher Mot de passe</i></label>
                </div>
            </div>
            <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border-radius:5px;" name="Submit" />
            
        </form>

            <p class="Pas_encore_inscrit">Pas encore inscrit ? <a href="#" class="Pas_encore_inscrit_lien"> Cliquez ici pour vous inscrire</a> </p>

        </div>
    </div>

    <footer>
        <div class="title_and_rectangle">
            <p class="title_footer">ART'BORD</p>
            <div class="rectangle_noir_footer"></div>
        </div>
        <div class="Plan_du_site">
            <div class="Plan_du_site_1"></div>
            <ul>
                <li class="li_Plan_du_site"><a href="#" class="a_Plan_du_site"> Accueil </a></li>
                <li class="li_Plan_du_site"><a href="#" class="a_Plan_du_site"> Articles </a></li>
                <li class="li_Plan_du_site"><a href="#" class="a_Plan_du_site"> À propos</a></li>
            </ul>
            <div class="Plan_du_site_2"></div>
            <ul>
                <li class="li_Plan_du_site"><a href="#" class="a_Plan_du_site"> Se connecter </a></li>
                <li class="li_Plan_du_site"><a href="#" class="a_Plan_du_site"> S'inscrire</a></li>
                <li class="li_Plan_du_site"><a href="./../../index1.php" class="a_Plan_du_site"> Partie Admin</a></li>
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

</body>