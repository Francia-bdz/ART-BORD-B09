<?php
require_once __DIR__ . '/../../connect/config.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/front/sheets/mention.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style type="text/css">
        .cover {
            background-color: #C94F08;
            height: 620px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        @font-face {
            font-family: "Bigilla";
            src: local("Bigilla"),
                url(/front/assets/typo/Bigilla.otf);
            font-weight: normal;
        }

        h1 {
            font-size: 200px;
            font-family: Bigilla;
            margin-bottom: 0%;
            margin-top: 5%;
            display: flex;
            text-align: center;

        }

        .couleur {
            color: white;
        }

        * {
            margin: 0%;
        }

        p {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 20px;
            text-align: left;
        }

        .misenpagemention {
            margin: 10%;
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
    </style>


</head>

<body>


    <section class="cover">
        <div class="header">
        <li class="li_header"><a href="<?= ROOTFRONT . '/index.php' ?>" class="a_header"> Accueil </a></li>
        <li class="li_header"><a href="<?= ROOTFRONT . '/front/html/' . 'touslesarticles.php' ?>" class="a_header"> Articles </a></li>
        <input class="navbar" type="text" size="30" placeholder="Rechercher" />
        </div>
        <h1 class="couleur">
            MENTIONS LÉGALES
        </h1>
    </section>

    <p class="misenpagemention">
        Ces mentions, spécifiées par la Loi pour la confiance dans l’économie numérique (LCEN) de 2004, doivent apparaître sur tout site internet. Les mentions légales permettent de protéger les internautes et de fournir un moyen de contacter les éditeurs du site.
        <br>
        <br>
        <b>Mentions obligatoires :</b>
        <br>
        <br>
        Identité d’un représentant légale :
        <br>
        <br>
        Nom(s) et prénom(s) : Marlène Dulaurans
        <br>
        Adresse du domicile : 1 rue Jean Jacques Ellul, Bordeaux, 33800
        <br>
        Adresse mail : marlene.dulaurans@mmibordeaux.com
        <br>
        Numéro de téléphone : +33 x xx xx xx xx
        <br>
        Nom de l’éditeur du blog : Marlène Dulaurans
        <br>
        <br>
        Hébergement :
        <br>
        <br>
        Nom de l’hébergeur :
        <br>
        Adresse du domicile : 1 Rue Jacques Ellul, 33800 Bordeaux
        <br>
        Adresse mail : iut-bordeaux-montaigne@xxxxx.fr
        <br>
        Numéro de téléphone : +33 x xx xx xx xx
        <br>

        Politique de confidentialité :
        <br>
        Le RGPD est axé sur trois piliers : la responsabilité, la transparence et la confiance. Il permet d’encadrer le traitement des données personnelles 1 sur le territoire de l’Union européenne. Conformément au RGPD (Règlement Général sur la Protection des Données), Art’Blog s’engage à respecter toutes les obligations légales liées aux données personnelles* et au RGPD.
        Obligation de transparence définie aux articles 12, 13 et 14 du RGPD. Toutes les informations transmises doivent être concises, transparentes, compréhensibles et aisément accessibles à propos de l’usage des données collectées.
        Cette obligation permet donc aux personnes concernées de :
        connaître la raison de la collecte des différentes données les concernant,
        comprendre le traitement qui sera fait de leur données,
        assurer la maîtrise de leurs données.<br>
        Cela permet également d’instaurer une relation de confiance avec le responsable des traitements de données ou l’administrateur.
        <br>
        <br>
        Collecte de données à caractère personnel : Les informations recueillies sur ce formulaire sont enregistrées dans un fichier informatisé par Marlène Dulaurans pour la création d’un compte membre du blog. La base légale du traitement est un blog à but non lucratif. Les données collectées seront communiquées au(x) seul(s) destinataire(s) suivant(s) : Marlène Dulaurans. Les données sont conservées pendant 36 mois soit 3 ans maximum.
        <br>
        <br>
        Droit à la portabilité : Vous pouvez accéder aux données vous concernant, les rectifier, demander leur effacement ou exercer votre droit à la limitation du traitement de vos données en contactant le responsable des données à caractère personnel.
        <br>
        <br>
        Un régime spécial s'applique aux mineurs de moins de 16 ans à propos du consentement. Il faut que toutes les informations soient claires afin que le mineur soit en capacité de comprendre. Le consentement doit être recueilli auprès de l’autorité parentale, ou du responsable légal. Cependant les parents ou les tuteurs légaux du mineur seront solidairement responsables des dommages et intérêts causés par leur(s) enfant(s).
        (1)Une « donnée personnelle » est « toute information se rapportant à une personne physique identifiée ou identifiable ».
        <br>
        <br>

        Le droit applicable lors d’un litige :
        <br>
        <br>
        En cas de litige ou de non-respect des obligations et des CGU (Conditions Générales d’Utilisation) d’une des deux parties (l’éditeur du blog et l’internaute), la justice applique le droit en se référant à plusieurs textes dont le RGPD, la loi du 29 juillet 1881 sur la liberté de la presse par exemple. Si les deux parties trouvent un accord à l’amiable ou arrangement à l'amiable, cela permet d’éviter de saisir la justice.
        <br>
        <br>
        Une clause d’exclusion de la responsabilité :
        <br>
        <br>
        La directrice de la publication : Marlène Dulaurans est tenue responsable des commentaires de ses lecteurs, elle est tenue de retirer “promptement” tout contenu illicite en ligne, sinon sa responsabilité pénale est engagée.
        <br>
        <br>




        <b> CGU :</b>
        <br>
        <br>
        Ce site web (art-Bord.xxx) est un blog sur le thème : Bordeaux à travers ses artistes. Art’Bord a été développé par l’agence Restart avec différents langages de programmation (HTML, CSS, SCSS, PHP, JavaScript, etc…). Il vous propose plusieurs articles sur des artistes bordelais ainsi que des évènements artistiques et culturels locaux. Nous vous mettons à disposition un système de connexion à un compte membre/utilisateur. Il faudra s’inscrire pour interagir avec notre équipe et l’ensemble de notre communauté. Vous pouvez ensuite aimer un de nos articles ainsi que les commenter et répondre à un autre internaute.
        <br>
        <br>
        Toutes les informations que nous collectons, reste confidentielles, elles ne seront ni transmises, ni divulguées dans un but lucratif ou non lucratif.
        Il est strictement interdit de laisser des commentaires haineux, diffamatoires, d’injures publiques, etc… . Le directeur de la publication et de l’édition est responsable des contenus sur le blog. Il est également responsable de ses internautes puisqu’il est administrateur du blog.
        <br>
        <br>
        <strong>I - Propriété intellectuelle </strong>
        <br>
        <br>
        Marlène Dulaurans, propriétaire des droits de propriété intellectuelle2 et détentrice des droits d’usage sur tout le contenu proposé notamment sur les textes et les images (sauf les commentaires venant des internautes et sur des mentions contraires). Sauf en cas d’autorisation préalable par la propriétaire de tous les droits du site Art’Bord, toute contrefaçon sur les droits d’auteur, les droits d’image, les droits voisins, … liant la propriété intellectuelle, est interdite, quels que soient les moyens utilisés et leur destination. Toute utilisation non acceptée du blog : Art’Bord, sera considérée comme une contrefaçon, engageant donc de potentielles poursuites judiciaires pour non-respect des droits intellectuels du blog : Art’Bord, conformément à l’article L. 335-2 s du Code de la propriété intellectuelle (CPI).
        <br>
        <br>
        “La violation des droits d'auteurs est constitutive du délit de contrefaçon puni d'une peine de 300 000 euros d'amende et de 3 ans d'emprisonnement (CPI, art. L. 335-2 s.). ... Le code de la propriété intellectuelle entend par contrefaçon tous les actes d'utilisation non autorisée de l'œuvre.” <a href="https://www.culture.gouv.fr/">www.culture.gouv.fr</a>
        <br>
        <br>

        (2) La propriété intellectuelle regroupe la propriété industrielle et la propriété littéraire et artistique. La propriété industrielle a plus spécifiquement pour objet la protection et la valorisation des inventions, des innovations et des créations.
        <br>
        <br>
        <strong>II - Prévention des cookies : </strong>
        <br>
        <br>
        En venant sur notre blog, un formulaire de consentement des cookies (cookies de session, cookies de mesure) et des CGU, vous est affiché, il se doit d’être clair et concis. En les acceptant, l’internaute autorise que les cookies : cookies de session3 et cookies de mesure4, viennent s'installer sur votre navigateur pour une durée de 13 mois maximum. Vous acceptez également les conditions générales d’utilisation (CGU). Si vous souhaitez supprimer ces cookies, il faut les effacer du navigateur.
        (3)Cookies de session, évitent de renseigner plusieurs fois les mêmes informations telles que les identifiants de connexion ;
        (4)Cookies de mesure d’audience, s’apparentent plus à des traceurs et permettent de savoir où vont les utilisateurs sur les pages web, ce qu’ils ont fait pour ainsi proposer de la publicité ciblée type Adwords ou Retargeting.
        <br>
        <br>
        <strong>III - Réglementation sur les commentaires des internautes : </strong>
        <br>
        <br>
        Nous avons mis une zone commentaires afin d’instaurer un lieu d’échange entre les différents internautes et l’équipe du blog Art’Bord, à partir d’articles publiés sur art’bord.xxx. Cependant, la zone de commentaires n’est ni un forum, ni un réseau social. L’équipe de Art’Bord participe activement sur ce lieux d’échange en répondant à des commentaires et en faisant le modérateur.
        <br>
        <br>
        Conditions :
        <br>
        <br>
        Seuls les membres inscrits sur Art’Bord peuvent écrire dans la zone de commentaires. De plus, les commentaires effectués sont sous la responsabilité de leur auteur.. Les mineurs peuvent également écrire des commentaires seulement s’ils sont sous la surveillance de leur responsable légal. De même, l’internaute peut inscrire ses coordonnées dans un commentaire, cependant il n’est pas préférable. Ainsi, le blog Art’Bord ne sera pas tenu responsable de la mise en ligne de ses données personnelles. Enfin, aucun commentaire ne doit faire l’objet de propos illicites (voir les règles de bonnes conduites).
        <br>
        <br>
        Règles de bonnes conduites :
        <br>
        <br>
        Art’Bord est un blog ouvert au grand public où l’on peut échanger, débattre et apporter de l’information, etc … à partir des articles publiés.
        Toutefois, les internautes se doivent de respecter la parole des autres internautes et leur personne. Le savoir-vivre et la politesse sont des valeurs indispensables dans la zone de commentaires. Le contenu des commentaires doit respecter la législation, il est donc strictement interdit de tenir des propos illicites, c'est-à-dire que les propos ne doivent pas être injurieux, diffamatoires, racistes, discriminants, etc, … Il est également interdit de promouvoir des propos contraires à l’ordre public, et de porter atteinte aux internautes qui dévoilent leurs coordonnées. Les internautes peuvent mettre des liens vers des sites personnels, cependant il doit soumettre sa demande au propriétaire du site (Art’Bord). De plus, la date du commentaire doit figurer dans la zone de commentaires, ainsi que la date de modification. En cas de commentaire non acceptable ou frauduleux, le responsable de l’édition peut le supprimer en donnant la raison de ce rejet.
        <br>
        <br>
        <strong>IV - Respect de la loi : </strong>
        <br>
        <br>
        Au vu de la législation, ce site (Art’Bord) se doit de la respecter notamment celle de la loi informatique et libertés nᵒ 78-17 du 6 janvier 1978. Le blog doit également :
        Structurer les outils selon la loi Informatique et Libertés
        Rester objectif, jamais excessif ou insultant
        <br>
        <br>
        <u>Ainsi il est interdit de :</u>
        <br>
        <br>
        Vendre de la contrefaçon ou des substances illicites,
        Provoquer des mineurs,
        Inciter à la haine,
        Menacer l’ordre public,
        Tenir des propos injurieux, diffamatoires,
        Ne pas respecter le droit à l’image
        Ne pas respecter le droit d’auteur et la propriété intellectuelle.
        Ne pas mentionner des données sensibles (5)
        Les données sensibles (5) forment une catégorie particulière des données personnelles. Ce sont des informations qui révèlent la prétendue origine raciale ou ethnique, les opinions politiques, les convictions religieuses ou philosophiques ou l'appartenance syndicale, ainsi que le traitement des données génétiques, des données biométriques aux fins d'identifier une personne physique de manière unique, des données concernant la santé ou des données concernant la vie sexuelle ou l'orientation sexuelle d'une personne physique.

    </p>
</body>

</html>

<?php
require_once __DIR__ .  '/footer.php';
?>