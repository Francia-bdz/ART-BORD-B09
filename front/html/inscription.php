<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Membre

require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';

// Instanciation de la classe Membre

$monMembre = new MEMBRE();


$prenomMemb = "";
$nomMemb = "";
$pseudoMemb = "";
$pass1Memb = "";
$pass2Memb = "";
$eMail1Memb = "";
$eMail2Memb = "";
$dtCreaMemb = "";
$accordMemb = "";
$idMemb = "";
$numMemb = "";
$idStat = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['Submit'])) {
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }

    if (((isset($_POST['prenomMemb'])) AND !empty($_POST['prenomMemb']))
        AND ((isset($_POST['nomMemb'])) AND !empty($_POST['nomMemb']))
        AND ((isset($_POST['pseudoMemb'])) AND !empty($_POST['pseudoMemb']))
        AND ((isset($_POST['pass1Memb'])) AND !empty($_POST['pass1Memb']))
        AND ((isset($_POST['pass2Memb'])) AND !empty($_POST['pass2Memb']))
        AND((isset($_POST['eMail1Memb'])) AND !empty($_POST['eMail1Memb']))
        AND((isset($_POST['eMail2Memb'])) AND !empty($_POST['eMail2Memb']))
        AND((isset($_POST['accordMemb'])) AND !empty($_POST['accordMemb']))
        AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
     
            
            if (($_POST['accordMemb'])== "off"){
                $accordMemb = 0;
            } elseif (($_POST['accordMemb']) == "on"){
                $accordMemb = 1;
            }
            
            $prenomMemb = ctrlSaisies(($_POST['prenomMemb']));
            $nomMemb = ctrlSaisies(($_POST['nomMemb']));
            $pseudoMemb = ctrlSaisies(($_POST['pseudoMemb']));
            $passMemb = ctrlSaisies(($_POST['pass2Memb']));
            $eMailMemb = ctrlSaisies(($_POST['eMail2Memb']));
            $dtCreaMemb = date('Y-m-d H:i:s');
            $idStat = 3;

            
            if (strlen($pseudoMemb)<6 || strlen($pseudoMemb)>70){
                $erreur = true;
                $errSaisies =  "Erreur, le nombre de caractère pour le pseudo doit être compris entre 6 et 70 !";
            } 
            elseif (($monMembre->get_ExistPseudo($pseudoMemb))>1){
                
                $erreur = true;
                $errSaisies =  "Le pseudo existe déja!";

            }elseif ($eMailMemb != $_POST['eMail1Memb']){
                
                $erreur = true;
                $errSaisies =  "Les deux eMails ne correspondent pas !";

            }elseif (isEmail($eMailMemb)!= true ){
                
                $erreur = true;
                $errSaisies =  "L'email n'est pas dans le bon format !";

            }
            elseif ($passMemb != $_POST['pass1Memb']){
                
                $erreur = true;
                $errSaisies =  "Les deux mots de passe ne correspondent pas !";

            } elseif (isPassWord($passMemb)!= true){
                
                $erreur = true;
                $errSaisies =  "Le mot de passe doit contenir au moins une majuscule, une minuscule et un caractère spécial !";

            } else {
                
                $erreur = false;
                
                // $passMemb = password_hash($passMemb, PASSWORD_DEFAULT);

                $monMembre->create($prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $accordMemb, $idStat);
        
                header("Location: ./accueil.php");
            }
    }   
    else {
        
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }  
}



?>





<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>INSCRIPTION</title>


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

    <style type="text/css">
        * {
            margin: 0%;
            padding: 0%;
            font-family: 'Roboto';
        }

        .misenpageinscri {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            margin-right: 10%;
            margin-bottom: 10%;
        }

        /* - - - TYPO - - - */



        @font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url('Bigilla.otf');
        }

        .title_and_rectangle_connexion {
            margin-top: 2%;
        }

        .barre_d_entree {
            height: 36px;
            width: 392px;
            background-color: grey;
            border-radius: 5px;
        }

        .Partie_Texte {
            margin-left: 3%;
            margin-top: 5%;
        }

        h1 {
            font-family: "Bigilla", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 200px;
            text-align: center;
            font-weight: normal;
        }

        h2 {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin-top: 3%;
            font-weight: lighter;
            font-size: 70px;
        }

        .rectangle_rouge {
            height: 10px;
            width: 945px;
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
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 20px;
            margin-right: 1%;
            font-weight: 300;
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

        fieldset {
            border: 0px;
        }

        input::placeholder {
            font-size: 14px;
        }

        .valider {
            margin-top: 5%;
        }

        .control_donnes {
            margin-top: 2%;
            margin-bottom: 3%;
        }
    </style>

</head>

<body>

    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

    <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

        <div class="title_and_rectangle_connexion">
            <h1> INSCRIPTION</h1>
            <div class="rectangle_rouge"></div>
        </div>
        <div class="Partie_Texte">
            <div class="Partie_connexion">
                <h2><span class="enluminure">C</span>réer un compte</h2>

                <div class="misenpageinscri">
                    <section>
                        <div class="Pseudo_control connexion_control">
                            <label class="control-label" for="prenomMemb"><b>Prénom :</b></label>
                            <br>
                            <input type="text" name="prenomMemb" id="prenomMemb" size="50" value="<?= $prenomMemb; ?>" placeholder="Entrez votre prénom" autofocus />
                        </div>

                        <div class="Pseudo_control connexion_control">
                            <label class="control-label" for="nomMemb"><b>Nom :</b></label>
                            <br>
                            <input type="text" name="nomMemb" id="nomMemb" size="50" placeholder="Entrez votre nom" value="<?= $nomMemb; ?>" autofocus />
                        </div>

                        <div class="Pseudo_control connexion_control">
                            <label class="control-label" for="pseudoMemb"><b>Pseudonyme :</b></label>
                            <br>
                            <input type="text" name="pseudoMemb" id="pseudoMemb" size="50" placeholder="6 caractères minimum" value="<?= $pseudoMemb; ?>" autofocus />
                        </div>
                    </section>
                    <section>
                        <div class="Pseudo_control connexion_control">
                            <label class="control-label" for="pass1Memb"><b>Mot de passe :</b></label>
                            <br>
                            <input type="password" name="pass1Memb" id="myInput1" size="50" placeholder="Contient 1 majuscule, 1 miniscule, 1 chiffre et 1 caractère sp." value="<?= $pass1Memb; ?>" autofocus />
                        </div>
                        <div class="bouton_affichage_mdp">
                            <input type="checkbox" onclick="myFunction('myInput1')">
                            &nbsp;&nbsp;
                            <label><i>Afficher Mot de passe</i></label>
                        </div>

                        <div class="Pseudo_control connexion_control">
                            <label class="control-label" for="pass2Memb"><b>Confirmez le mot de passe :</b></label>
                            <br>
                            <input type="password" name="pass2Memb" id="myInput2" size="50" placeholder="" value="<?= $pass2Memb; ?>" autofocus />
                        </div>
                        <div class="bouton_affichage_mdp">
                            <input type="checkbox" onclick="myFunction('myInput2')">
                            &nbsp;&nbsp;
                            <label><i>Afficher Mot de passe</i></label>
                        </div>

                        <div class="Pseudo_control connexion_control">
                            <label class="control-label" for="eMail1Memb"><b>Email:</b></label>
                            <br>
                            <input type="email" name="eMail1Memb" id="eMail1Memb" size="50" placeholder="Entrez votre Email" value="<?= $eMail1Memb; ?>" autofocus />
                        </div>


                        <div class="Pseudo_control connexion_control">
                            <label class="control-label" for="eMail2Memb"><b>Confirmez l'Email :</b></label>
                            <br>
                            <input type="email" name="eMail2Memb" id="eMail2Memb" size="50" placeholder="" value="<?= $eMail1Memb; ?>" autofocus />
                        </div>

                        <div class="Pseudo_control connexion_control">
                            <label class="control control_donnes"> <b class="control control_donnes"> J'accepte que mes données soient conservées : </b></label>
                            <div class="controls">
                                <fieldset>
                                    <input type="radio" name="accordMemb" <?= ($accordMemb == "on") ? 'checked="checked"' : ''
                                                                            ?> value="on" /> &nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="accordMemb" <?= ($accordMemb == "off") ? 'checked="checked"' : ''
                                                                            ?> value="off" checked="checked" /> &nbsp;&nbsp;Non
                                </fieldset>
                            </div>
                            <input class="valider" type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border-radius:5px;" name="Submit" />
                        </div>


                </div>
                </section>
            </div>



            <!-- <div class="Mdp_control connexion_control">

            </div> -->

    </form>

    <p class="deja_inscrit">Déja inscrit ? <a href="/connexion.php" class="deja_inscrit_lien"> Cliquez ici pour vous connecter</a> </p>

    </div>
    </div>

</body>

</html>