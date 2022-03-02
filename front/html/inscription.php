


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<div class="title_and_rectangle_connexion">
        <h1> INSCRIPTION</h1>
        <div class="rectangle_rouge"></div>
    </div>
    <div class="Partie_Texte">
        <div class="Partie_connexion">
            <h2><span class="enluminure">C</span>réer un compte</h2>

            <div class="Pseudo_control connexion_control">
                <label class="control-label" for="eMailMemb"><b>Prénom :</b></label>
                <input type="text" name="eMailMemb" id="eMailMemb" size="50" placeholder="Entrez votre prénom" autofocus />
            </div>

            <div class="Pseudo_control connexion_control">
                <label class="control-label" for="eMailMemb"><b>Nom :</b></label>
                <input type="text" name="eMailMemb" id="eMailMemb" size="50" placeholder="Entrez votre nom" autofocus />
            </div>

            <div class="Pseudo_control connexion_control">
                <label class="control-label" for="eMailMemb"><b>Pseudonyme :</b></label>
                <input type="text" name="eMailMemb" id="eMailMemb" size="50" placeholder="6 caractères minimum" autofocus />
            </div>

            <div class="Pseudo_control connexion_control">
                <label class="control-label" for="eMailMemb"><b>Mot de passe :</b></label>
                <input type="text" name="eMailMemb" id="eMailMemb" size="50" placeholder="Entrez votre mot de passe" autofocus />
            </div>
            <div class="bouton_affichage_mdp">
                    <input type="checkbox" onclick="myFunction('passMembTest')">
                    &nbsp;&nbsp;
                    <label><i>Afficher Mot de passe</i></label>
                </div>

            <div class="Pseudo_control connexion_control">
                <label class="control-label" for="eMailMemb"><b>Confirmez le mot de passe :</b></label>
                <input type="text" name="eMailMemb" id="eMailMemb" size="50" placeholder="" autofocus />
            </div>
            <div class="bouton_affichage_mdp">
                    <input type="checkbox" onclick="myFunction('passMembTest')">
                    &nbsp;&nbsp;
                    <label><i>Afficher Mot de passe</i></label>
                </div>

            <div class="Pseudo_control connexion_control">
                <label class="control-label" for="eMailMemb"><b>Confirmez l'Email :</b></label>
                <input type="text" name="eMailMemb" id="eMailMemb" size="50" placeholder="Entrez votre Email" autofocus />
            </div>
            

            <div class="Pseudo_control connexion_control">
                <label class="control-label" for="eMailMemb"><b>Email :</b></label>
                <input type="text" name="eMailMemb" id="eMailMemb" size="50" placeholder="" autofocus />
            </div>

            
            
            <!-- <div class="Mdp_control connexion_control">

            </div> -->
            
        </form>

            <p class="Pas_encore_inscrit">Pas encore inscrit ? <a href="#" class="Pas_encore_inscrit_lien"> Cliquez ici pour vous inscrire</a> </p>

        </div>
    </div>

</html>


<!------ C S S ------>

<style type="text/css">

* {
            margin: 0%;
            padding: 0%;
            font-family: 'Roboto';
        }



        /* - - - TYPO - - - */


@font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url('Bigilla.otf');
            font-weight: normal;
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
            font-weight: lighter;
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






