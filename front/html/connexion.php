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

            $oneMembre = $monMembre->get_1MembreByEmail($_POST['eMailMemb']);

            if ($oneMembre != false) {

                $eMailMemb = $oneMembre['eMailMemb'];
                $passMemb = $oneMembre['passMemb'];

                if ($passMemb == $_POST['passMembTest']) {

                    // (password_verify($_POST['passMemb'], $passMemb) === true);
                    setcookie('eMailMemb', $eMailMemb, time() + 3600);
                    header("Location: ./accueil.php");
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

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
            font-family: 'Roboto', Arial;
            font-weight: 400;

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
            font-weight: normal;
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

    <p class="Pas_encore_inscrit">Pas encore inscrit ? <a href="/footer.php" class="Pas_encore_inscrit_lien"> Cliquez ici pour vous inscrire</a> </p>

    </div>
    </div>

    <?php require_once __DIR__ .  '/footer.php';
    ?>

</body>