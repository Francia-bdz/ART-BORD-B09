-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 04 mars 2022 à 17:15
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BLOGART22`
--

-- --------------------------------------------------------

--
-- Structure de la table `ANGLE`
--

CREATE TABLE `ANGLE` (
  `numAngl` varchar(8) NOT NULL,
  `libAngl` varchar(60) NOT NULL,
  `numLang` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ANGLE`
--

INSERT INTO `ANGLE` (`numAngl`, `libAngl`, `numLang`) VALUES
('ANGL0101', 'Handicap', 'FRAN01'),
('ANGL0102', 'Grandes figures littéraires', 'FRAN01'),
('ANGL0103', 'Happy hours', 'FRAN01'),
('ANGL0104', 'Histoire médiévale', 'FRAN01'),
('ANGL0105', 'Intelligence collective', 'FRAN01'),
('ANGL0106', 'Expérience 3.0', 'FRAN01'),
('ANGL0107', 'Chatbot et IA', 'FRAN01'),
('ANGL0108', 'Stories', 'FRAN01'),
('ANGL0109', 'Secret', 'FRAN01'),
('ANGL0110', 'We heart it', 'FRAN01'),
('ANGL0111', 'Yik Yak', 'FRAN01'),
('ANGL0112', 'Shots', 'FRAN01'),
('ANGL0113', 'Tik Tok', 'FRAN01'),
('ANGL0114', 'Recherche vocale', 'FRAN01'),
('ANGL0115', 'Cin&eacute;ma', 'FRAN01'),
('ANGL0116', 'Artiste', 'FRAN01'),
('ANGL0201', 'Handicap', 'ANGL01'),
('ANGL0202', 'Great literary figures', 'ANGL01'),
('ANGL0203', 'Happy hours', 'ANGL01'),
('ANGL0204', 'Medieval History', 'ANGL01'),
('ANGL0205', 'Collective Intelligence', 'ANGL01'),
('ANGL0206', 'Experience 3.0', 'ANGL01'),
('ANGL0207', 'Chatbot and IA', 'ANGL01'),
('ANGL0208', 'Stories', 'ANGL01'),
('ANGL0209', 'Secret', 'ANGL01'),
('ANGL0210', 'We heart it', 'ANGL01'),
('ANGL0211', 'Yik Yak', 'ANGL01'),
('ANGL0212', 'Shots', 'ANGL01'),
('ANGL0213', 'Tik Tok', 'ANGL01'),
('ANGL0214', 'Voice search', 'ANGL01'),
('ANGL0301', 'Handikap', 'ALLE01'),
('ANGL0302', 'Große literarische Persönlichkeiten', 'ALLE01'),
('ANGL0303', 'Happy hours', 'ALLE01'),
('ANGL0304', 'Mittelalterliche Geschichte', 'ALLE01'),
('ANGL0305', 'Gemeinsame Intelligenz', 'ALLE01'),
('ANGL0306', 'Erfahrung 3.0', 'ALLE01'),
('ANGL0307', 'Chatbot und KI', 'ALLE01'),
('ANGL0308', 'Geschichten', 'ALLE01'),
('ANGL0309', 'Geheimnis', 'ALLE01'),
('ANGL0310', 'Wir lieben es', 'ALLE01'),
('ANGL0311', 'Yik Yak', 'ALLE01'),
('ANGL0312', 'Aufnahmen', 'ALLE01'),
('ANGL0313', 'Tik Tok', 'ALLE01'),
('ANGL0314', 'Sprachsuche', 'ALLE01');

-- --------------------------------------------------------

--
-- Structure de la table `ARTICLE`
--

CREATE TABLE `ARTICLE` (
  `numArt` int(8) NOT NULL,
  `dtCreArt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `libTitrArt` varchar(100) DEFAULT NULL,
  `libChapoArt` text,
  `libAccrochArt` varchar(100) DEFAULT NULL,
  `parag1Art` text,
  `libSsTitr1Art` varchar(100) DEFAULT NULL,
  `parag2Art` text,
  `libSsTitr2Art` varchar(100) DEFAULT NULL,
  `parag3Art` text,
  `libConclArt` text,
  `urlPhotArt` varchar(70) DEFAULT NULL,
  `numAngl` varchar(8) NOT NULL,
  `numThem` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ARTICLE`
--

INSERT INTO `ARTICLE` (`numArt`, `dtCreArt`, `libTitrArt`, `libChapoArt`, `libAccrochArt`, `parag1Art`, `libSsTitr1Art`, `parag2Art`, `libSsTitr2Art`, `parag3Art`, `libConclArt`, `urlPhotArt`, `numAngl`, `numThem`) VALUES
(1, '2022-03-04 12:05:52', 'La surprenante reconversion de la base sous-marine', 'Un b&acirc;timent unique charg&eacute; d\'histoire qui a surv&eacute;cu &agrave; l\'emprise des Allemands en 1943, et qui est aujourd\'hui l\'un des symboles d\'art de notre ville bordelaise.', 'La grande immerg&eacute;e du port de la Lune.', 'Oui, notre base sous-marine est notre h&eacute;ritage nazi. En 1943, le bloc de b&eacute;ton, que nous connaissons tous, voit le jour apr&egrave;s 22 mois de travaux forc&eacute;s par des prisonniers.', 'Quel avenir pour cet amas de b&eacute;ton ?', 'Apr&egrave;s la destruction et le sabotage du mat&eacute;riel nazis par les Alli&eacute;s en ao&ucirc;t 1944. Il a fallu se demander que deviendrait ce b&acirc;timent.', 'Peau neuve, color&eacute;e et num&eacute;rique pour la base bordelaise.', 'Aujourd\'hui la base sous marine occupe une place incontournable dans le paysage culturel bordelais.', 'Pour le mot de la fin : Bruno Monnier, pr&eacute;sident de Culturespace, affirme que ses &eacute;quipes et lui ont travaill&eacute; d&rsquo;arrache pied pour imaginer et concevoir la nouvelle base sous marine.', 'imgArt7c19e08967815213f1f275ff8e9c0349.jpeg', 'ANGL0101', 'THEM0101'),
(2, '2022-03-04 12:05:05', 'Le CHU de bordeaux se met-il au bleu ?', 'Le bleu, une couleur si commune, qui provoque tranquillit&eacute;, s&eacute;curit&eacute; et confiance.', 'Le CHU de Bordeaux, est un lieu au service de tous.', 'Tout d&rsquo;abord, un logo, que vous avez vu et revu, mais auquel vous n\'avez jamais, vraiment pr&ecirc;t&eacute; attention.', 'Savez-vous pourquoi les blouses des chirurgiens sont-elles bleues ?', 'Voici une question que vous ne vous &ecirc;tes peut-&ecirc;tre jamais pos&eacute;e. Pourquoi les diff&eacute;rents h&ocirc;pitaux, ont-ils choisi, pour leurs op&eacute;rations la couleur bleue, ou m&ecirc;me vert clair ?', 'Connaissez vous les f&eacute;es du CHU de Bordeaux ?', 'Les F&eacute;es Bleues sont une association cr&eacute;&eacute;e par le personnel soignant du CHU, qui a pour but d&rsquo;apporter de la couleur et du confort, dans le monde aseptis&eacute; du soin des pr&eacute;matur&eacute;s ou bien pour les enfants en r&eacute;animation.', 'Et voil&agrave; vous savez maintenant tout sur le CHU de Bordeaux ! Quoi que &hellip; Savez-vous qu&rsquo;il participe &agrave; l\'op&eacute;ration de sensibilisation Mars Bleu ?', 'imgArt4ecedaf5c94a5a27fb65e4a44b45b6fe.jpeg', 'ANGL0105', 'THEM0101'),
(3, '2022-03-04 12:07:48', 'Le Lion bleu de Bordeaux, star des r&eacute;seaux sociaux', 'Surplombant la place Stalingrad, anciennement place du Pont, et faisant fi&egrave;rement face au pont de Pierre, le Lion bleu de Xavier Veilhan fait depuis 2005 l&rsquo;objet de toutes les convoitises.', 'En France, depuis 1951 et l&rsquo;arr&ecirc;t&eacute; des', 'En construisant les lignes de tramway, la ville de Bordeaux et sa m&eacute;tropole ont donc mis en place le programme &amp;quot;L\'art dans la ville&amp;quot;.', 'Un symbole de la rive droite', 'On n\'imagine pas la place Stalingrad sans cet imposant f&eacute;lin color&eacute;. Ce lion bleu est devenu l\'embl&egrave;me de cette place et, pour les habitants de la rive gauche, c\'est le symbole de &amp;quot;l\'autre rive&amp;quot;, c\'est la premi&egrave;re chose que l\'on voit en traversant la Garonne depuis le quartier de Saint-Michel.', 'Un tremplin pour Xavier Veilhan', 'L\'artiste plasticien &agrave; l\'origine du Lion bleu, dipl&ocirc;m&eacute; de l\'EnsAD-Paris (&Eacute;cole Nationale Sup&eacute;rieure des Arts D&eacute;coratifs) et officier de l\'Ordre des Arts et des Lettres, n\'a pas choisi une figure animali&egrave;re pour rien. La place Stalingrad est un hommage &agrave; la victoire de l\'arm&eacute;e sovi&eacute;tique durant la Seconde Guerre Mondiale.', 'Esp&eacute;rons que cet &eacute;lan de cr&eacute;ativit&eacute; se poursuive et que, par la suite, Xavier Veilhan r&eacute;utilise cette couleur qui nous est si ch&egrave;re, le bleu.', 'imgArt2806d66af96aa1c616b28e1adcfe8379.jpeg', 'ANGL0106', 'THEM0101'),
(4, '2022-03-04 12:08:48', 'The surprising reconversion of the submarine base', 'A unique building steeped in history that survived the Germans\' hold in 1943, and which today is one of the symbols of art in our Bordeaux city.', 'The large submerged harbour of the Moon, illuminated by its immense blue neon light', 'Yes, our submarine base is our Nazi heritage. In 1943, the concrete block, which we all know, was built after 22 months of forced labour by prisoners.', 'What does the future hold for this pile of concrete?', 'After the destruction and sabotage of Nazi equipment by the Allies in August 1944, one had to wonder what would become of this building.', 'New, coloured and digital skin for the Bordeaux base.', 'Today the submarine base occupies an essential place in the cultural landscape of Bordeaux.', 'For the last word : Bruno Monnier, President of Culturespace, says he and his teams have worked hard to imagine and design the new submarine base.', 'imgArt8d0e1853e063521f9238721773422cba.jpeg', 'ANGL0102', 'THEM0102'),
(5, '2022-03-04 12:10:02', 'The Blue Lion of Bordeaux, star of social networks', 'Overlooking Stalingrad Square, formerly Place du Pont, and proudly facing the Stone Bridge, Xavier Veilhan\'s Blue Lion has been the object of much covetousness since 2005.', 'In France, since 1951 and the', 'With the construction of the tramway lines, the city of Bordeaux and its metropolis have therefore set up the &amp;quot;Art in the City&amp;quot; programme.', 'A symbol of the right bank', 'One cannot imagine Stalingrad Square without this imposing colourful feline. This blue lion has become the emblem of this square and, for the inhabitants of the left bank, it is the symbol of &amp;quot;the other bank&amp;quot;, it is the first thing you see when crossing the Garonne from the Saint-Michel district.', 'A springboard for Xavier Veilhan', 'The visual artist behind the Blue Lion, a graduate of EnsAD-Paris (&Eacute;cole Nationale Sup&eacute;rieure des Arts D&eacute;coratifs) and an officer of the Ordre des Arts et des Lettres, did not choose an animal figure for nothing. Stalingrad square is a tribute to the victory of the Soviet army during the Second World War.', 'Let\'s hope that this surge of creativity will continue and that Xavier Veilhan will later reuse this colour that is so dear to us, blue.', 'imgArt672423ef04dad02cfcada16a36819e41.jpeg', 'ANGL0202', 'THEM0201'),
(30, '2022-03-04 17:11:24', 'Le Fifib, une autre mani&egrave;re de voir le cin&eacute;ma', 'Bordeaux, Place Camille Jullian, tous avancent dans la m&ecirc;me direction. La projection de James Gray s&rsquo;appr&ecirc;te &agrave; commencer. Le monde se pr&eacute;cipite dans la petite salle de l&rsquo;Utopia. Les meilleures places sont d&eacute;j&agrave; occup&eacute;es par les plus ponctuels. Attention, le public, doucement se tait, alors que les lumi&egrave;res se font discr&egrave;tes. Bienvenue au Festival du Film Ind&eacute;pendant de Bordeaux, dit Fifib.', 'Que faire de vos soir&eacute;es d&rsquo;automne, quand la brume dissimule m&ecirc;me la Garonne.', 'Le r&eacute;alisateur fait son entr&eacute;e. Par sa seule pr&eacute;sence, il soul&egrave;ve un sentiment d&rsquo;admiration dans la foule. Naturellement, tel un vieil ami lan&ccedil;ant une invitation &agrave; la vol&eacute;e, avec un accent prononc&eacute;, il annonce la projection de son film, sans plus de d&eacute;tails. Apr&egrave;s tout, insiste-t-il, une masterclass suit cette projection dans un autre cin&eacute;ma. Il aurait peu d&rsquo;int&eacute;r&ecirc;t &agrave; d&eacute;blat&eacute;rer, et ennuyer un public qui n&rsquo;a encore rien vu. Le rendez-vous est donc donn&eacute;. Sur cette remarque qui fait mouche dans l&rsquo;assembl&eacute;e, il dispara&icirc;t dans la promesse de revenir plus tard. C&rsquo;est &ccedil;a le Fifib. Un festival de cin&eacute;ma ouvert &agrave; tous. Des projections uniques d&rsquo;invit&eacute;s ou de films en comp&eacute;tition. C&rsquo;est la rencontre entre public et artistes, passionn&eacute;s et comp&eacute;titeurs. C&rsquo;est les artistes, les cin&eacute;astes, les jeunes r&ecirc;veurs, &agrave; travers Bordeaux. Ce, depuis 2011, entre l&rsquo;Utopia cin&eacute;ma atypique de bordeaux, et bien d&rsquo;autres cin&eacute;mas et lieux embl&eacute;matiques de la ville. Soir&eacute;es d&rsquo;ouvertures, Masterclass, bien plus, c&rsquo;est l&rsquo;occasion pour les artistes de s&rsquo;exprimer. C&rsquo;est un rayonnement &agrave; l&rsquo;international, des artistes du monde entier, et des participants qui habitent juste &agrave; c&ocirc;t&eacute;. Pr&ecirc;ts &agrave; en prendre plein les yeux ?', 'Le Fifib vous raconte son histoire', 'Le Fifib pr&eacute;serve le cin&eacute;ma et son histoire. &Agrave; travers vos productions, d&eacute;fendez vos causes, et r&eacute;v&eacute;lez-nous vos id&eacute;es, histoires, et bien d&rsquo;autres choses ! L&rsquo;id&eacute;e du Fifib est arriv&eacute;e comme une cerise sur le g&acirc;teau. C&rsquo;est l&rsquo;histoire de deux copines, Johanna et Pauline, qui adorent aller au cin&eacute;ma, &agrave; tel point qu&rsquo;elles cr&eacute;ent des &eacute;v&eacute;nements, en petit comit&eacute;. De fil en aiguille, l&rsquo;id&eacute;e de cr&eacute;er un r&eacute;el &eacute;v&egrave;nement sur Bordeaux, leur ville natale, voit le jour dans l&rsquo;esprit des deux copines. Par la suite les rencontres ne cessent de fuser entre professionnels. Ainsi, ce petit &eacute;v&eacute;nement qui &agrave; l&rsquo;origine n&rsquo;&eacute;tait qu&rsquo;un r&ecirc;ve, devient r&eacute;alit&eacute; et se voit prendre une ampleur inattendue. Aujourd&rsquo;hui, le Fifib f&ecirc;te ses 10 ans et de plus en plus de monde vient s&rsquo;amuser et concourir. Ne jamais laisser personne sur le pas de la porte, telle est la devise du festival, ainsi petits ou grands, amateurs ou professionnels  viennent participer. Parce que oui le Fifib est un festival de longs m&eacute;trages, accompagn&eacute;s de jolies t&ecirc;tes d&rsquo;affiches. En guise de jury ? La c&eacute;l&egrave;bre Charlotte Gainsbourg, ou encore l&rsquo;incroyable Jacques Audiard. Gr&acirc;ce au Fifib, propulsez votre carri&egrave;re dans le monde cin&eacute;matographique !', 'Mais pourquoi vanter le Fifib ?', 'Nous sommes passionn&eacute;s. Bordeaux est une grande ville. Des Chartrons &agrave; Belcier, elle regorge de particularit&eacute;s qui nous sont famili&egrave;res. Et je crois que le Fifib sublime Bordeaux. Pour quelque temps certes, il n&rsquo;est l&agrave; que 4 jours d&rsquo;octobre. Mais croyez-moi, il vous donnera le frisson, vous fera passer du rire aux larmes. C&rsquo;est une aventure humaine, non de simples prestations. Je suis convaincue qu&rsquo;il existe des p&eacute;pites parmi nous bordelais, de v&eacute;ritables perles attendant une chance de se d&eacute;voiler. Cette chance, elle est l&agrave;. Le Fifib est une occasion d&rsquo;en prendre plein les yeux. Mais c&rsquo;est aussi l&rsquo;occasion de d&eacute;voiler son talent, de donner le frisson. Et &ccedil;a se passe ici, &agrave; Bordeaux. Il est primordial d&rsquo;avoir des r&ecirc;ves n&rsquo;est-ce pas ? Porteurs d&rsquo;espoir et d&rsquo;ambition, peu importe quel que soient vos r&ecirc;ves, essayez de les r&eacute;aliser. Au-del&agrave; de vous vendre du r&ecirc;ve, j&rsquo;ai &agrave; c&oelig;ur de vous partager des choses concr&egrave;tes. C&rsquo;est le moment id&eacute;al. Pourquoi ? Car nous sommes en f&eacute;vrier et jusqu&rsquo;au 28 mars, le Fifib recherche des talents, les auditions sont lanc&eacute;es. Ainsi, vous, artistes remplis de cr&eacute;ativit&eacute; et de talent en tout genre, faites rayonner Bordeaux, &eacute;crivez l&rsquo;histoire de votre passion !', 'Oui, toi, bordelais qui lis cet article, nous savons d&eacute;j&agrave; que tu poss&egrave;des un talent en toi, un talent inou&iuml;e qui n&rsquo;attend que d&rsquo;&ecirc;tre r&eacute;v&eacute;l&eacute; au grand public. Le Fifib ne vous met-il pas en confiance ? Laissez-vous emporter par vos r&ecirc;ves, guidez-nous dans votre esprit cr&eacute;atif, osez poser votre pierre &agrave; l\'&eacute;difice du Fifib. L&rsquo;art se voit s\'agrandir et proposer toutes sortes de belles choses. Le collectif, la solidarit&eacute;, la d&eacute;termination, la libert&eacute; de cr&eacute;ation, voil&agrave; ce que le Fifib met en lumi&egrave;re ! Ne vous butez pas simplement &agrave; ce concours, l&rsquo;art a besoin de vous, artistes en devenir. Afin de le faire vivre et d&eacute;couvrir aux futures g&eacute;n&eacute;rations. Faites le perdurer dans le temps et apportez lui de nouvelles dimensions ! Bordeaux doit rayonner par son art, comme elle le fait d&eacute;j&agrave; si bien !', 'imgArtda35920d9869f53d132fe2c0b94f6a29.png', 'ANGL0115', 'THEM0102'),
(31, '2022-03-04 17:12:11', 'Je d&eacute;teste associer mon visage, ma personne &agrave; mon art : Pierre Pouys&eacute;gur', '&ldquo;Une rencontre avec une &oelig;uvre bouleversante peut provoquer des choses tr&egrave;s b&eacute;n&eacute;fiques.&rdquo; C&rsquo;est ce que Pierre nous a partag&eacute; dans cette bo&icirc;te &agrave; question. N&eacute; d&rsquo;un r&ecirc;ve d&rsquo;enfant qui &eacute;tait de cr&eacute;er et dessiner, Pierre se lance dans le grand bain pour enfin devenir ce qu&rsquo;il a toujours souhait&eacute; &ecirc;tre. D&eacute;couvrez les convictions, ambitions et talents d&rsquo;un artiste. Entre rap et coups de crayon, on vous r&eacute;v&egrave;le l&rsquo;identit&eacute; de Pierre, un jeune artiste bordelais rempli de r&ecirc;ves et de projets.', '&ldquo;J&rsquo;ai eu un parcours chaotique qui m&rsquo;a amen&eacute; &agrave; des remises&rdquo;', 'Pierre Pouys&eacute;gur est un jeune artiste de 22 ans n&eacute; &agrave; Bruges, il nous raconte son parcours des plus perplexes. En effet, c&rsquo;est gr&acirc;ce &agrave; ses ann&eacute;es de lyc&eacute;e en art appliqu&eacute; &agrave; Magendie que Pierre y d&eacute;veloppe une sensibilit&eacute; particuli&egrave;re pour l&rsquo;art. Dipl&ocirc;m&eacute; du Baccalaur&eacute;at, Pierre doute de ses choix d&rsquo;orientation, entre musique et cin&eacute;ma son choix s&rsquo;est finalement port&eacute; sur son amour pour la narration et le r&eacute;cit. Ainsi, il obtient sa licence de cin&eacute;ma qui n&rsquo;est malheureusement pas stimulante. Trouver la bonne voie n&rsquo;est pas facile lorsque l&rsquo;on est jeune, c\'est pour cela que Pierre prend une pause d&rsquo; un an &agrave; Paris afin d\'y d&eacute;velopper des projets personnels et de se trouver. Ce qui l&rsquo;am&egrave;ne aujourd&rsquo;hui &agrave; un DUT en m&eacute;tiers du livre et de l&rsquo;&eacute;dition du livre &agrave; Bordeaux. Entre examens, soir&eacute;es et amphith&eacute;&acirc;tres, Pierre a tout de m&ecirc;me gard&eacute; sa passion pour le rap. Est n&eacute; Nobu, un rappeur qui a sorti 4 mixtapes et 1 EP en 5 ans. De plus, son amour pour la bande dessin&eacute;e le pousse &agrave; faire un stage &agrave; Corn&eacute;lius &agrave; la fabrique POLA de Bordeaux. C&rsquo;est ce que cet artiste nous partage. Pour  Pierre, ce sont les moments les plus absurdes du quotidien et les relations humaines qui stimulent l&rsquo;inspiration.', 'Inspire-toi de ta ville', 'Pierre se confie sur son rapport avec l&rsquo;art. Pour cet artiste, l\'art permet de s\'affirmer en tant qu\'individu. Gr&acirc;ce &agrave; l&rsquo;art, on ressent une sensation d\'invincibilit&eacute; face &agrave; l&rsquo;obstacle. Par exemple, Pierre a fait face &agrave; une p&eacute;riode difficile dans sa vie et c&rsquo;est gr&acirc;ce &agrave; la d&eacute;couverte de Jean-Pierre Bacri qu&rsquo;il a pu avancer. Bordeaux, &eacute;galement, l&rsquo;inspire de plus belle &ldquo;Bordeaux m&rsquo;inspire depuis toujours, c&rsquo;est chez moi !&rdquo;. En effet, la personnalit&eacute; de la ville nous dit-il &ldquo;d&eacute;teint sur lui&rdquo;. C&rsquo;est principalement la place Pey-Berland qui vient stimuler son inspiration lorsqu\'il &ldquo;attend ses potes&rdquo;. Ainsi, plusieurs fois, ses &eacute;crits partaient de cette place ! Bordeaux &agrave; bien plus qu&rsquo;inspir&eacute; Pierre mais aussi marqu&eacute; sa vie. C&rsquo;est dans son lyc&eacute;e bordelais qu&rsquo;il s&rsquo;est senti lui-m&ecirc;me pour la premi&egrave;re fois. Par ailleurs, c&rsquo;est ici qu&rsquo;est n&eacute;e sa passion pour le rap . Ainsi, il souhaite dans un avenir proche, cr&eacute;er une maison d&rsquo;&eacute;dition de Bande Dessin&eacute;e &agrave; Bordeaux en raccord avec notre &eacute;poque. Celle-ci fera na&icirc;tre de nouveaux auteurs encore inconnus. Mais encore, Pierre nous confie qu&rsquo;un projet est en vue, encore top secret&hellip;', 'Un chemin sem&eacute; d&rsquo;emb&ucirc;ches', 'D&rsquo;apr&egrave;s Pierre, il est difficile pour un artiste de se faire remarquer par son art. C&rsquo;est pour cela qu&rsquo;il nous donne des petits tips, il est essentiel de fouiller sur les r&eacute;seaux sociaux afin de trouver des perles. Madame Art&rsquo;Bord : &ldquo;Y a-t-il eu un moment de vide pendant les &eacute;crits ? Ce fameux syndrome de la page blanche ? \r\nPierre : Bien s&ucirc;r, obligatoirement. Et &ccedil;a peut durer une heure comme un an !&rdquo; \r\nPierre nous fait part que lors du confinement, il &eacute;tait en incapacit&eacute; de produire quoi que ce soit. Puisque son inspiration se trouve dans les rues de Bordeaux et dans les relations humaines. Pour survivre &agrave; cela, chers artistes, Pierre vous conseille de rester tout d&rsquo;abord serein et de vous lancer dans de nouvelles aventures, de nouvelles rencontres. Pour d&eacute;buter, faites comme lui, testez les open-mic dans des bars &agrave; Bordeaux comme le Sherlock Holmes ou bien au Vivres de l\'art. Pour lui, participer &agrave; d&eacute;velopper l&rsquo;offre culturelle de Bordeaux est &agrave; port&eacute;e de main donc lancez vous. N&rsquo;oubliez pas de vous rem&eacute;morer vos d&eacute;buts dans l&rsquo;art afin de retracer vos d&eacute;buts et parcours. Madame Art&rsquo;Bord : &ldquo;Qu&rsquo;est-ce que tu dirais &agrave; Pierre qui venait de d&eacute;buter dans ce milieu ?\r\nP : Je suis toi dans 8 ans, truc de fou ! [rires] C&rsquo;est tr&egrave;s nul mais continue&amp;quot;.', 'Pour vous, artistes en devenir voici quelques petits conseils primordiaux d&rsquo;un v&eacute;ritable artiste pour se lancer dans l&rsquo;art. Tout d&rsquo;abord osez, n&rsquo;ayez pas peur de l&rsquo;&eacute;chec puisqu&rsquo;il est irr&eacute;futable. Ne pas y arriver, c&rsquo;est essayer et encore essayer, ainsi soyez d&eacute;termin&eacute;s. Cependant, pr&eacute;parez-vous &agrave; endurer les critiques. Ce sont celles-ci qui nous &eacute;l&egrave;vent et nous forgent. Pierre, au sein de cette interview, nous a partag&eacute; toute sa sensibilit&eacute; &agrave; l&rsquo;art. C&rsquo;est ce qui lui a permis d&rsquo;avoir une nouvelle vision du monde. Et cette vision qui l&rsquo;aide &agrave; pr&eacute;sent &agrave; appr&eacute;hender le monde diff&eacute;remment. Pour finir cette interview, on vous laisse avec cette phrase philosophique de Pierre &ldquo;La lumi&egrave;re au bout du tunnel n&rsquo;est pas n&eacute;e d\'un talent, mais de l&rsquo;amour d&rsquo;une discipline.&rdquo;', 'imgArt3442cde00cb42df27c97ecfd404e1a36.JPG', 'ANGL0116', 'THEM0101');

-- --------------------------------------------------------

--
-- Structure de la table `COMMENT`
--

CREATE TABLE `COMMENT` (
  `numSeqCom` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `dtCreCom` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `libCom` text NOT NULL,
  `attModOK` tinyint(1) DEFAULT '0',
  `dtModCom` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `notifComKOAff` text,
  `delLogiq` tinyint(1) DEFAULT '0',
  `numMemb` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `COMMENT`
--

INSERT INTO `COMMENT` (`numSeqCom`, `numArt`, `dtCreCom`, `libCom`, `attModOK`, `dtModCom`, `notifComKOAff`, `delLogiq`, `numMemb`) VALUES
(1, 1, '2020-11-09 09:13:43', 'Trop cool comme article', 1, '2020-11-09 16:49:29', NULL, 0, 1),
(1, 2, '2020-11-09 17:24:21', 'Trop cool comme article', 1, '2020-11-10 07:10:00', NULL, 0, 3),
(1, 3, '2020-11-09 14:31:17', 'Trop cool comme article', 1, '2020-11-10 08:28:02', NULL, 0, 3),
(1, 30, '2022-03-04 11:33:21', 'Bonne d&eacute;couverte !', 0, '0000-00-00 00:00:00', NULL, 0, 32),
(2, 1, '2020-11-02 12:18:42', 'Trop cool comme article', 1, '2020-11-03 07:23:19', NULL, 0, 2),
(2, 2, '2020-11-02 15:29:16', 'Trop cool comme article', 1, '2020-11-03 18:43:12', NULL, 0, 3),
(2, 3, '2020-12-15 07:31:23', 'Trop cool comme article', 1, '2020-12-16 09:11:44', NULL, 0, 2),
(3, 1, '2020-11-04 15:21:12', 'Trop cool comme article', 1, '2020-11-05 09:42:42', NULL, 0, 3),
(3, 2, '2020-11-04 07:16:44', 'Trop cool comme article', 1, '2020-11-04 14:41:23', NULL, 0, 2),
(3, 3, '2020-12-19 05:28:00', 'Trop cool comme article', 1, '2020-12-19 12:08:40', NULL, 0, 5),
(4, 1, '2020-11-05 02:15:38', 'Trop cool comme article', 1, '2020-11-05 22:50:13', NULL, 0, 1),
(4, 2, '2020-11-05 13:27:39', 'Trop cool comme article', 1, '2020-11-05 18:19:29', NULL, 0, 3),
(4, 3, '2020-12-28 06:30:21', 'Trop cool comme article', 1, '2020-12-28 10:45:27', NULL, 0, 3),
(5, 1, '2020-11-06 20:16:36', 'Trop cool comme article', 1, '2020-11-10 10:39:03', NULL, 0, 4),
(5, 2, '2020-11-06 05:31:42', 'Trop cool comme article', 1, '2020-11-06 10:25:22', NULL, 0, 1),
(5, 3, '2020-12-29 16:31:38', 'Trop cool comme article', 1, '2020-12-29 20:33:48', NULL, 0, 1),
(6, 1, '2020-11-06 10:20:31', 'Trop cool comme article', 1, '2020-11-06 17:41:54', NULL, 0, 5),
(6, 2, '2020-11-06 22:50:27', 'Trop cool comme article', 1, '2020-11-07 08:21:24', NULL, 0, 5),
(6, 3, '2020-12-29 08:31:27', 'Pourri trop, trop comme article', 0, '2020-12-29 13:15:57', 'Trop insultant', 0, 4),
(7, 1, '2020-11-08 07:41:12', 'Trop cool comme article', 1, '2020-11-10 19:53:32', NULL, 0, 5),
(7, 2, '2020-11-08 09:37:23', 'Trop pourri comme article', 0, '2020-11-09 12:43:32', 'Manque de bienveillance', 0, 2),
(7, 3, '2020-12-02 15:33:41', 'Trop cool comme article', 1, '2020-12-04 09:24:34', NULL, 0, 3),
(8, 1, '2020-11-18 07:41:12', 'De la daube cet article', 0, '2020-11-19 13:51:26', 'Trop insultant', 0, 1),
(8, 3, '2020-12-03 11:41:47', 'De la daube cet article', 0, '2020-12-03 15:39:23', 'Trop insultant', 0, 2),
(9, 2, '2022-03-03 07:48:44', 'tzsretdgfh', 0, '0000-00-00 00:00:00', NULL, 0, 1),
(9, 3, '2020-12-04 09:33:42', 'Trop cool comme article', 1, '2020-12-05 09:33:42', NULL, 0, 5),
(10, 1, '2022-02-28 19:38:51', 'TBNTY', 0, '0000-00-00 00:00:00', NULL, 0, 1),
(10, 3, '2022-02-28 19:35:05', 'RETE', 0, '0000-00-00 00:00:00', NULL, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `COMMENTPLUS`
--

CREATE TABLE `COMMENTPLUS` (
  `numSeqCom` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `numSeqComR` int(10) NOT NULL,
  `numArtR` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `COMMENTPLUS`
--

INSERT INTO `COMMENTPLUS` (`numSeqCom`, `numArt`, `numSeqComR`, `numArtR`) VALUES
(1, 2, 2, 2),
(1, 3, 2, 3),
(1, 1, 3, 1),
(1, 3, 3, 3),
(1, 1, 4, 1),
(3, 2, 4, 2),
(1, 3, 4, 3),
(3, 2, 5, 2),
(1, 1, 6, 1),
(5, 2, 6, 2),
(2, 3, 6, 3),
(1, 1, 7, 1),
(6, 2, 7, 2),
(2, 3, 7, 3),
(1, 1, 8, 1),
(4, 3, 8, 3),
(4, 3, 9, 3);

-- --------------------------------------------------------

--
-- Structure de la table `LANGUE`
--

CREATE TABLE `LANGUE` (
  `numLang` varchar(8) NOT NULL,
  `lib1Lang` varchar(30) DEFAULT NULL,
  `lib2Lang` varchar(60) DEFAULT NULL,
  `numPays` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `LANGUE`
--

INSERT INTO `LANGUE` (`numLang`, `lib1Lang`, `lib2Lang`, `numPays`) VALUES
('ALLE01', 'Allemand(e)', 'Langue allemande', 'ALLE'),
('ANGL01', 'Anglais(e)', 'Langue anglaise', 'ANGL'),
('BULG01', 'Bulgare', 'Langue bulgare', 'BULG'),
('ESPA01', 'Espagnol(e)', 'Langue espagnole', 'ESPA'),
('FRAN01', 'Français(e)', 'Langue française', 'FRAN'),
('ITAL01', 'Italien(ne)', 'Langue italienne', 'ITAL'),
('RUSS01', 'Russe', 'Langue russe', 'RUSS'),
('UKRA01', 'Ukrainien(ne)', 'Langue ukrainienne', 'ANGL');

-- --------------------------------------------------------

--
-- Structure de la table `LIKEART`
--

CREATE TABLE `LIKEART` (
  `numMemb` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `likeA` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `LIKEART`
--

INSERT INTO `LIKEART` (`numMemb`, `numArt`, `likeA`) VALUES
(1, 1, 1),
(1, 2, 1),
(2, 1, 0),
(2, 3, 1),
(3, 1, 1),
(3, 2, 1),
(3, 3, 1),
(4, 1, 0),
(4, 2, 1),
(4, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `LIKECOM`
--

CREATE TABLE `LIKECOM` (
  `numMemb` int(10) NOT NULL,
  `numSeqCom` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `likeC` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `LIKECOM`
--

INSERT INTO `LIKECOM` (`numMemb`, `numSeqCom`, `numArt`, `likeC`) VALUES
(1, 1, 1, 1),
(2, 4, 2, 1),
(3, 3, 3, 1),
(3, 4, 2, 1),
(4, 6, 3, 1),
(4, 7, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `MEMBRE`
--

CREATE TABLE `MEMBRE` (
  `numMemb` int(10) NOT NULL,
  `prenomMemb` varchar(70) NOT NULL,
  `nomMemb` varchar(70) NOT NULL,
  `pseudoMemb` varchar(70) NOT NULL,
  `passMemb` varchar(70) NOT NULL,
  `eMailMemb` varchar(100) NOT NULL,
  `dtCreaMemb` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `accordMemb` tinyint(1) DEFAULT '1',
  `confirmation_token` varchar(70) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(70) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remember_token` varchar(250) DEFAULT NULL,
  `idStat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `MEMBRE`
--

INSERT INTO `MEMBRE` (`numMemb`, `prenomMemb`, `nomMemb`, `pseudoMemb`, `passMemb`, `eMailMemb`, `dtCreaMemb`, `accordMemb`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `remember_token`, `idStat`) VALUES
(1, 'Jean', 'Dupont', 'Phil09', 'Ut!D5?h0', 'Phil09@me.com', '2020-01-09 09:13:43', 1, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Julie', 'La Rousse', 'juju1989', 'G54;Q22mi5', 'julie@gmail.com', '2020-03-15 13:33:23', 1, NULL, NULL, NULL, NULL, NULL, 3),
(3, 'David', 'Bowie', 'dav33B', 'kp09,1K4!', 'david.bowie@gmail.com', '2020-07-19 11:13:13', 1, NULL, NULL, NULL, NULL, NULL, 4),
(4, 'Phil', 'Collins', 'cols2P', 'mq3j4;6GH', 'phil.collins@me.com', '2020-11-04 16:39:09', 1, NULL, NULL, NULL, NULL, NULL, 2),
(5, 'Prince', 'Rogers Nelson dit PRINCE', 'Rogers222', 'frI3!Px;21', 'prince@gmail.com', '2020-12-14 12:24:23', 1, NULL, NULL, NULL, NULL, NULL, 5),
(32, 'Perrine', 'joly', 'PerrineJoly', 'PerrineJoly33@yahoo.fr', 'PerrineJoly33@yahoo.fr', '2022-03-04 10:30:39', 1, NULL, NULL, NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `MOTCLE`
--

CREATE TABLE `MOTCLE` (
  `numMotCle` int(8) NOT NULL,
  `libMotCle` varchar(60) NOT NULL,
  `numLang` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `MOTCLE`
--

INSERT INTO `MOTCLE` (`numMotCle`, `libMotCle`, `numLang`) VALUES
(1, 'Bordeaux', 'FRAN01'),
(2, 'CHU', 'FRAN01'),
(3, 'chirurgiens', 'FRAN01'),
(4, 'Hôpital', 'FRAN01'),
(5, 'soignants', 'FRAN01'),
(6, 'bleu', 'FRAN01'),
(7, 'Mars Bleu', 'FRAN01'),
(8, 'Base', 'FRAN01'),
(9, 'sous-marine', 'FRAN01'),
(10, 'Base sous-marine', 'FRAN01'),
(11, 'port de la Lune', 'FRAN01'),
(12, 'histoire', 'FRAN01'),
(13, 'Art', 'FRAN01'),
(14, 'Stalingrad', 'FRAN01'),
(15, 'Pont', 'FRAN01'),
(16, 'Pont de Pierre', 'FRAN01'),
(17, 'Lion bleu', 'FRAN01'),
(18, 'sculpture', 'FRAN01'),
(19, 'Veilhan', 'FRAN01'),
(20, 'blue', 'ANGL01'),
(21, 'Bordeaux', 'ANGL01'),
(22, 'base', 'ANGL01'),
(23, 'submarine', 'ANGL01'),
(24, 'submarine base', 'ANGL01'),
(25, 'Port of the Moon', 'ANGL01'),
(26, 'history', 'ANGL01'),
(27, 'Art', 'ANGL01'),
(28, 'Stalingrad', 'ANGL01'),
(29, 'bridge', 'ANGL01'),
(30, 'stone bridge', 'ANGL01'),
(31, 'Blue Lion', 'ANGL01'),
(32, 'sculpture', 'ANGL01'),
(33, 'Veilhan', 'ANGL01'),
(34, 'blau', 'ALLE01'),
(35, 'bordeaux', 'ALLE01'),
(36, 'kinder', 'ALLE01'),
(37, 'zuhause', 'ALLE01'),
(38, 'menschen', 'ALLE01'),
(39, 'süße', 'ALLE01'),
(40, 'freund', 'ALLE01'),
(41, 'wagen', 'ALLE01'),
(42, 'hafen', 'ALLE01'),
(43, 'brücke', 'ALLE01'),
(44, 'stein', 'ALLE01'),
(45, 'Löwe', 'ALLE01'),
(46, 'sprungbrett', 'ALLE01');

-- --------------------------------------------------------

--
-- Structure de la table `MOTCLEARTICLE`
--

CREATE TABLE `MOTCLEARTICLE` (
  `numArt` int(8) NOT NULL,
  `numMotCle` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `MOTCLEARTICLE`
--

INSERT INTO `MOTCLEARTICLE` (`numArt`, `numMotCle`) VALUES
(1, 1),
(1, 6),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 1),
(3, 6),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(4, 11),
(4, 20),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(5, 20),
(5, 21),
(5, 28),
(5, 29),
(5, 30),
(5, 31),
(5, 32),
(5, 33);

-- --------------------------------------------------------

--
-- Structure de la table `PAYS`
--

CREATE TABLE `PAYS` (
  `numPays` char(4) NOT NULL,
  `cdPays` char(2) NOT NULL,
  `frPays` varchar(255) NOT NULL,
  `enPays` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `PAYS`
--

INSERT INTO `PAYS` (`numPays`, `cdPays`, `frPays`, `enPays`) VALUES
('AFGH', 'AF', 'Afghanistan', 'Afghanistan'),
('AFRI', 'ZA', 'Afrique du Sud', 'South Africa'),
('ALBA', 'AL', 'Albanie', 'Albania'),
('ALGE', 'DZ', 'Algérie', 'Algeria'),
('ALLE', 'DE', 'Allemagne', 'Germany'),
('ANDO', 'AD', 'Andorre', 'Andorra'),
('ANGL', 'GB', 'Royaume-Uni', 'United Kingdom'),
('ANGO', 'AO', 'Angola', 'Angola'),
('ANGU', 'AI', 'Anguilla', 'Anguilla'),
('ANTG', 'AG', 'Antigua-et-Barbuda', 'Antigua & Barbuda'),
('ANTI', 'AN', 'Antilles néerlandaises', 'Netherlands Antilles'),
('ARAB', 'SA', 'Arabie saoudite', 'Saudi Arabia'),
('ARGE', 'AR', 'Argentine', 'Argentina'),
('ARME', 'AM', 'Arménie', 'Armenia'),
('ARTA', 'AQ', 'Antarctique', 'Antarctica'),
('ARUB', 'AW', 'Aruba', 'Aruba'),
('AUST', 'AU', 'Australie', 'Australia'),
('AUTR', 'AT', 'Autriche', 'Austria'),
('AZER', 'AZ', 'Azerbaïdjan', 'Azerbaijan'),
('BAHA', 'BS', 'Bahamas', 'Bahamas, The'),
('BAHR', 'BH', 'Bahreïn', 'Bahrain'),
('BANG', 'BD', 'Bangladesh', 'Bangladesh'),
('BARB', 'BB', 'Barbade', 'Barbados'),
('BELA', 'PW', 'Belau', 'Palau'),
('BELG', 'BE', 'Belgique', 'Belgium'),
('BELI', 'BZ', 'Belize', 'Belize'),
('BENI', 'BJ', 'Bénin', 'Benin'),
('BERM', 'BM', 'Bermudes', 'Bermuda'),
('BHOU', 'BT', 'Bhoutan', 'Bhutan'),
('BIEL', 'BY', 'Biélorussie', 'Belarus'),
('BIRM', 'MM', 'Birmanie', 'Myanmar (ex-Burma)'),
('BOIN', 'IO', 'Territoire britannique de l Océan Indien', 'British Indian Ocean Territory'),
('BOLV', 'BO', 'Bolivie', 'Bolivia'),
('BOSN', 'BA', 'Bosnie-Herzégovine', 'Bosnia and Herzegovina'),
('BOTS', 'BW', 'Botswana', 'Botswana'),
('BOUV', 'BV', 'Ile Bouvet', 'Bouvet Island'),
('BRES', 'BR', 'Brésil', 'Brazil'),
('BRUN', 'BN', 'Brunei', 'Brunei Darussalam'),
('BULG', 'BG', 'Bulgarie', 'Bulgaria'),
('BURK', 'BF', 'Burkina Faso', 'Burkina Faso'),
('BURU', 'BI', 'Burundi', 'Burundi'),
('CAFR', 'CF', 'République centrafricaine', 'Central African Republic'),
('CAMB', 'KH', 'Cambodge', 'Cambodia'),
('CAME', 'CM', 'Cameroun', 'Cameroon'),
('CANA', 'CA', 'Canada', 'Canada'),
('CAYM', 'KY', 'Iles Cayman', 'Cayman Islands'),
('CHIL', 'CL', 'Chili', 'Chile'),
('CHIN', 'CN', 'Chine', 'China'),
('CHRI', 'CX', 'Ile Christmas', 'Christmas Island'),
('CHYP', 'CY', 'Chypre', 'Cyprus'),
('CNOR', 'KP', 'Corée du Nord', 'Korea, Demo. People s Rep. of'),
('COCO', 'CC', 'Iles des Cocos (Keeling)', 'Cocos (Keeling) Islands'),
('COLO', 'CO', 'Colombie', 'Colombia'),
('COMO', 'KM', 'Comores', 'Comoros'),
('CON1', 'CD', 'République démocratique du Congo', 'Congo, Democratic Rep. of the'),
('CON2', 'CG', 'Congo', 'Congo'),
('COOK', 'CK', 'Iles Cook', 'Cook Islands'),
('CROA', 'HR', 'Croatie', 'Croatia'),
('CSUD', 'KR', 'Corée du Sud', 'Korea, (South) Republic of'),
('CUBA', 'CU', 'Cuba', 'Cuba'),
('CVER', 'CV', 'Cap-Vert', 'Cape Verde'),
('DANE', 'DK', 'Danemark', 'Denmark'),
('DJIB', 'DJ', 'Djibouti', 'Djibouti'),
('DOM1', 'DM', 'Dominique', 'Dominica'),
('DOM2', 'DO', 'République dominicaine', 'Dominican Republic'),
('EGYP', 'EG', 'Égypte', 'Egypt'),
('EMIR', 'AE', 'Émirats arabes unis', 'United Arab Emirates'),
('EQUA', 'EC', 'Équateur', 'Ecuador'),
('ERYT', 'ER', 'Érythrée', 'Eritrea'),
('ESPA', 'ES', 'Espagne', 'Spain'),
('ESTO', 'EE', 'Estonie', 'Estonia'),
('ETHO', 'ET', 'Éthiopie', 'Ethiopia'),
('FALK', 'FK', 'Iles Falkland', 'Falkland Islands (Malvinas)'),
('FERO', 'FO', 'Iles Féroé', 'Faroe Islands'),
('FIDJ', 'FJ', 'Iles Fidji', 'Fiji'),
('FINL', 'FI', 'Finlande', 'Finland'),
('FRAN', 'FR', 'France', 'France'),
('GABO', 'GA', 'Gabon', 'Gabon'),
('GAMB', 'GM', 'Gambie', 'Gambia, the'),
('GANA', 'GH', 'Ghana', 'Ghana'),
('GEO1', 'GE', 'Géorgie', 'Georgia'),
('GEO2', 'GS', 'Iles Géorgie du Sud et Sandwich du Sud', 'S. Georgia and S. Sandwich Is.'),
('GIBR', 'GI', 'Gibraltar', 'Gibraltar'),
('GREC', 'GR', 'Grèce', 'Greece'),
('GREN', 'GD', 'Grenade', 'Grenada'),
('GROE', 'GL', 'Groenland', 'Greenland'),
('GUAD', 'GP', 'Guadeloupe', 'Guinea, Equatorial'),
('GUAM', 'GU', 'Guam', 'Guam'),
('GUAT', 'GT', 'Guatemala', 'Guatemala'),
('GUIB', 'GW', 'Guinée-Bissao', 'Guinea-Bissau'),
('GUIE', 'GQ', 'Guinée équatoriale', 'Equatorial Guinea'),
('GUIN', 'GN', 'Guinée', 'Guinea'),
('GUYA', 'GY', 'Guyana', 'Guyana'),
('GUYF', 'GF', 'Guyane française', 'Guiana, French'),
('HAIT', 'HT', 'Haïti', 'Haiti'),
('HEAR', 'HM', 'Iles Heard et McDonald', 'Heard and McDonald Islands'),
('HOND', 'HN', 'Honduras', 'Honduras'),
('HONG', 'HU', 'Hongrie', 'Hungary'),
('INDE', 'IN', 'Inde', 'India'),
('INDO', 'ID', 'Indonésie', 'Indonesia'),
('IRAN', 'IR', 'Iran', 'Iran, Islamic Republic of'),
('IRAQ', 'IQ', 'Iraq', 'Iraq'),
('IRLA', 'IE', 'Irlande', 'Ireland'),
('ISLA', 'IS', 'Islande', 'Iceland'),
('ISRA', 'IL', 'Israël', 'Israel'),
('ITAL', 'IT', 'Italie', 'Italy'),
('IVOI', 'CI', 'Côte d\'Ivoire', 'Ivory Coast (see Cote d\'Ivoire)'),
('JAMA', 'JM', 'Jamaïque', 'Jamaica'),
('JAPO', 'JP', 'Japon', 'Japan'),
('JORD', 'JO', 'Jordanie', 'Jordan'),
('KAZA', 'KZ', 'Kazakhstan', 'Kazakhstan'),
('KIRG', 'KG', 'Kirghizistan', 'Kyrgyzstan'),
('KIRI', 'KI', 'Kiribati', 'Kiribati'),
('KNYA', 'KE', 'Kenya', 'Kenya'),
('KONG', 'HK', 'Hong Kong', 'Hong Kong, (China)'),
('KWEI', 'KW', 'Koweït', 'Kuwait'),
('LAOS', 'LA', 'Laos', 'Lao People s Democratic Republic'),
('LEON', 'SL', 'Sierra Leone', 'Sierra Leone'),
('LESO', 'LS', 'Lesotho', 'Lesotho'),
('LETT', 'LV', 'Lettonie', 'Latvia'),
('LIBA', 'LB', 'Liban', 'Lebanon'),
('LIBE', 'LR', 'Liberia', 'Liberia'),
('LIBY', 'LY', 'Libye', 'Libyan Arab Jamahiriya'),
('LIEC', 'LI', 'Liechtenstein', 'Liechtenstein'),
('LITU', 'LT', 'Lituanie', 'Lithuania'),
('LUXE', 'LU', 'Luxembourg', 'Luxembourg'),
('MACA', 'MO', 'Macao', 'Macao, (China)'),
('MACE', 'MK', 'ex-République yougoslave de Macédoine', 'Macedonia, TFYR'),
('MADA', 'MG', 'Madagascar', 'Madagascar'),
('MALA', 'MY', 'Malaisie', 'Malaysia'),
('MALD', 'MV', 'Maldives', 'Maldives'),
('MALI', 'ML', 'Mali', 'Mali'),
('MALT', 'MT', 'Malte', 'Malta'),
('MALW', 'MW', 'Malawi', 'Malawi'),
('MARI', 'MP', 'Mariannes du Nord', 'Northern Mariana Islands'),
('MARO', 'MA', 'Maroc', 'Morocco'),
('MARS', 'MH', 'Iles Marshall', 'Marshall Islands'),
('MART', 'MQ', 'Martinique', 'Martinique'),
('MAUC', 'MU', 'Maurice', 'Mauritius'),
('MAUR', 'MR', 'Mauritanie', 'Mauritania'),
('MAYO', 'YT', 'Mayotte', 'Mayotte'),
('MEXI', 'MX', 'Mexique', 'Mexico'),
('MICR', 'FM', 'Micronésie', 'Micronesia, Federated States of'),
('MINE', 'UM', 'Iles mineures éloignées des États-Unis', 'US Minor Outlying Islands'),
('MOLD', 'MD', 'Moldavie', 'Moldova, Republic of'),
('MONA', 'MC', 'Monaco', 'Monaco'),
('MONG', 'MN', 'Mongolie', 'Mongolia'),
('MONS', 'MS', 'Montserrat', 'Montserrat'),
('MOZA', 'MZ', 'Mozambique', 'Mozambique'),
('NAMI', 'NA', 'Namibie', 'Namibia'),
('NAUR', 'NR', 'Nauru', 'Nauru'),
('NEPA', 'NP', 'Népal', 'Nepal'),
('NICA', 'NI', 'Nicaragua', 'Nicaragua'),
('NIEV', 'KN', 'Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis'),
('NIGA', 'NG', 'Nigeria', 'Nigeria'),
('NIGE', 'NE', 'Niger', 'Niger'),
('NIOU', 'NU', 'Nioué', 'Niue'),
('NORF', 'NF', 'Ile Norfolk', 'Norfolk Island'),
('NORV', 'NO', 'Norvège', 'Norway'),
('NOUC', 'NC', 'Nouvelle-Calédonie', 'New Caledonia'),
('NOUZ', 'NZ', 'Nouvelle-Zélande', 'New Zealand'),
('OMAN', 'OM', 'Oman', 'Oman'),
('OUGA', 'UG', 'Ouganda', 'Uganda'),
('OUZE', 'UZ', 'Ouzbékistan', 'Uzbekistan'),
('PAKI', 'PK', 'Pakistan', 'Pakistan'),
('PANA', 'PA', 'Panama', 'Panama'),
('PAPU', 'PG', 'Papouasie-Nouvelle-Guinée', 'Papua New Guinea'),
('PARA', 'PY', 'Paraguay', 'Paraguay'),
('PBAS', 'NL', 'pays-Bas', 'Netherlands'),
('PERO', 'PE', 'Pérou', 'Peru'),
('PHIL', 'PH', 'Philippines', 'Philippines'),
('PITC', 'PN', 'Iles Pitcairn', 'Pitcairn Island'),
('POLO', 'PL', 'Pologne', 'Poland'),
('POLY', 'PF', 'Polynésie française', 'French Polynesia'),
('PORT', 'PT', 'Portugal', 'Portugal'),
('QATA', 'QA', 'Qatar', 'Qatar'),
('REUN', 'RE', 'Réunion', 'Reunion'),
('RICA', 'CR', 'Costa Rica', 'Costa Rica'),
('RICO', 'PR', 'Porto Rico', 'Puerto Rico'),
('ROUM', 'RO', 'Roumanie', 'Romania'),
('RUSS', 'RU', 'Russie', 'Russia (Russian Federation)'),
('RWAN', 'RW', 'Rwanda', 'Rwanda'),
('SAHA', 'EH', 'Sahara occidental', 'Western Sahara'),
('SALO', 'SB', 'Iles Salomon', 'Solomon Islands'),
('SALV', 'SV', 'Salvador', 'El Salvador'),
('SAMA', 'AS', 'Samoa américaines', 'American Samoa'),
('SAMO', 'WS', 'Samoa', 'Samoa'),
('SENE', 'SN', 'Sénégal', 'Senegal'),
('SEYC', 'SC', 'Seychelles', 'Seychelles'),
('SING', 'SG', 'Singapour', 'Singapore'),
('SLN_', 'SH', 'Sainte-Hélène', 'Saint Helena'),
('SLOQ', 'SK', 'Slovaquie', 'Slovakia'),
('SLOV', 'SI', 'Slovénie', 'Slovenia'),
('SLUC', 'LC', 'Sainte-Lucie', 'Saint Lucia'),
('SMAR', 'SM', 'Saint-Marin', 'San Marino'),
('SOMA', 'SO', 'Somalie', 'Somalia'),
('SOUD', 'SD', 'Soudan', 'Sudan'),
('SPIE', 'PM', 'Saint-Pierre-et-Miquelon', 'Saint Pierre and Miquelon'),
('SRIL', 'LK', 'Sri Lanka', 'Sri Lanka (ex-Ceilan)'),
('SSIE', 'VA', 'Saint-Siège ', 'Vatican City State (Holy See)'),
('SUED', 'SE', 'Suède', 'Sweden'),
('SUIS', 'CH', 'Suisse', 'Switzerland'),
('SURI', 'SR', 'Suriname', 'Suriname'),
('SVAL', 'SJ', 'Iles Svalbard et Jan Mayen', 'Svalbard and Jan Mayen Islands'),
('SVIN', 'VC', 'Saint-Vincent-et-les-Grenadines', 'Saint Vincent and the Grenadines'),
('SWAZ', 'SZ', 'Swaziland', 'Swaziland'),
('SYRY', 'SY', 'Syrie', 'Syrian Arab Republic'),
('TADJ', 'TJ', 'Tadjikistan', 'Tajikistan'),
('TAIW', 'TW', 'Taïwan', 'Taiwan'),
('TANZ', 'TZ', 'Tanzanie', 'Tanzania, United Republic of'),
('TCHA', 'TD', 'Tchad', 'Chad'),
('TCHE', 'CZ', 'République tchèque', 'Czech Republic'),
('TERR', 'TF', 'Terres australes françaises', 'French Southern Territories - TF'),
('THAI', 'TH', 'Thaïlande', 'Thailand'),
('TIMO', 'TL', 'Timor Oriental', 'Timor-Leste (East Timor)'),
('TOBA', 'TT', 'Trinité-et-Tobago', 'Trinidad & Tobago'),
('TOGO', 'TG', 'Togo', 'Togo'),
('TOKE', 'TK', 'Tokélaou', 'Tokelau'),
('TOME', 'ST', 'Sao Tomé-et-Principe', 'Sao Tome and Principe'),
('TONG', 'TO', 'Tonga', 'Tonga'),
('TUNI', 'TN', 'Tunisie', 'Tunisia'),
('TUR1', 'TC', 'Iles Turks-et-Caicos', 'Turks and Caicos Islands'),
('TUR2', 'TM', 'Turkménistan', 'Turkmenistan'),
('TURQ', 'TR', 'Turquie', 'Turkey'),
('TUVA', 'TV', 'Tuvalu', 'Tuvalu'),
('UKRA', 'UA', 'Ukraine', 'Ukraine'),
('URUG', 'UY', 'Uruguay', 'Uruguay'),
('USA_', 'US', 'États-Unis', 'United States'),
('VANU', 'VU', 'Vanuatu', 'Vanuatu'),
('VENE', 'VE', 'Venezuela', 'Venezuela'),
('VIEA', 'VI', 'Iles Vierges américaines', 'Virgin Islands, U.S.'),
('VIEB', 'VG', 'Iles Vierges britanniques', 'Virgin Islands, British'),
('VIET', 'VN', 'Viêt Nam', 'Viet Nam'),
('WALI', 'WF', 'Wallis-et-Futuna', 'Wallis and Futuna'),
('YEME', 'YE', 'Yémen', 'Yemen'),
('YOUG', 'YU', 'Yougoslavie', 'Saint Pierre and Miquelon'),
('ZAMB', 'ZM', 'Zambie', 'Zambia'),
('ZIMB', 'ZW', 'Zimbabwe', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Structure de la table `STATUT`
--

CREATE TABLE `STATUT` (
  `idStat` int(5) NOT NULL,
  `libStat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `STATUT`
--

INSERT INTO `STATUT` (`idStat`, `libStat`) VALUES
(1, 'Super Administrateur'),
(2, 'Administrateur'),
(3, 'Membre niveau 1'),
(4, 'Membre niveau 2'),
(5, 'Modérateur niveau 1'),
(6, 'Modérateur niveau 2'),
(7, 'Superviseur niveau 1'),
(8, 'Superviseur niveau 2');

-- --------------------------------------------------------

--
-- Structure de la table `THEMATIQUE`
--

CREATE TABLE `THEMATIQUE` (
  `numThem` varchar(8) NOT NULL,
  `libThem` varchar(60) NOT NULL,
  `numLang` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `THEMATIQUE`
--

INSERT INTO `THEMATIQUE` (`numThem`, `libThem`, `numLang`) VALUES
('THEM0101', 'L\'événement', 'FRAN01'),
('THEM0102', 'L\'acteur-clé', 'FRAN01'),
('THEM0103', 'Le mouvement émergeant', 'FRAN01'),
('THEM0104', 'L\'insolite / le clin d\'oeil', 'FRAN01'),
('THEM0201', 'The event', 'ANGL01'),
('THEM0202', 'The key player', 'ANGL01'),
('THEM0203', 'The emerging movement', 'ANGL01'),
('THEM0204', 'The unusual / the wink', 'ANGL01'),
('THEM0302', 'Der Schlüsselakteur', 'ALLE01'),
('THEM0303', 'Die entstehende Bewegung', 'ALLE01'),
('THEM0304', 'Das Ungewöhnliche / das Augenzwinkern', 'ALLE01');

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE `USER` (
  `pseudoUser` varchar(60) NOT NULL,
  `passUser` varchar(60) NOT NULL,
  `nomUser` varchar(60) DEFAULT NULL,
  `prenomUser` varchar(60) DEFAULT NULL,
  `eMailUser` varchar(70) NOT NULL,
  `confirmation_token` varchar(70) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(70) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remember_token` varchar(250) DEFAULT NULL,
  `idStat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `USER`
--

INSERT INTO `USER` (`pseudoUser`, `passUser`, `nomUser`, `prenomUser`, `eMailUser`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `remember_token`, `idStat`) VALUES
('admin', 'admin', 'Star', 'Joe', 'JoeStar@free.fr', NULL, NULL, NULL, NULL, NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ANGLE`
--
ALTER TABLE `ANGLE`
  ADD PRIMARY KEY (`numAngl`),
  ADD KEY `ANGLE_FK` (`numAngl`),
  ADD KEY `FK_ASSOCIATION_3` (`numLang`);

--
-- Index pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD PRIMARY KEY (`numArt`),
  ADD KEY `ARTICLE_FK` (`numArt`),
  ADD KEY `FK_ASSOCIATION_1` (`numAngl`),
  ADD KEY `FK_ASSOCIATION_2` (`numThem`);

--
-- Index pour la table `COMMENT`
--
ALTER TABLE `COMMENT`
  ADD PRIMARY KEY (`numSeqCom`,`numArt`),
  ADD KEY `COMMENT_FK` (`numSeqCom`,`numArt`),
  ADD KEY `FK_ASSOCIATION_8` (`numArt`),
  ADD KEY `FK_ASSOCIATION_9` (`numMemb`);

--
-- Index pour la table `COMMENTPLUS`
--
ALTER TABLE `COMMENTPLUS`
  ADD PRIMARY KEY (`numSeqCom`,`numArt`,`numSeqComR`,`numArtR`),
  ADD KEY `COMMENTPLUS_FK` (`numSeqCom`,`numArt`,`numSeqComR`,`numArtR`),
  ADD KEY `FK_COMMENTPLUS` (`numSeqComR`,`numArtR`);

--
-- Index pour la table `LANGUE`
--
ALTER TABLE `LANGUE`
  ADD PRIMARY KEY (`numLang`),
  ADD KEY `LANGUE_FK` (`numLang`),
  ADD KEY `FK_ASSOCIATION_7` (`numPays`);

--
-- Index pour la table `LIKEART`
--
ALTER TABLE `LIKEART`
  ADD PRIMARY KEY (`numMemb`,`numArt`),
  ADD KEY `LIKEART_FK` (`numMemb`,`numArt`),
  ADD KEY `FK_LIKEART` (`numArt`);

--
-- Index pour la table `LIKECOM`
--
ALTER TABLE `LIKECOM`
  ADD PRIMARY KEY (`numMemb`,`numSeqCom`,`numArt`),
  ADD KEY `LIKECOM_FK` (`numMemb`,`numSeqCom`,`numArt`),
  ADD KEY `FK_LIKECOM` (`numSeqCom`,`numArt`);

--
-- Index pour la table `MEMBRE`
--
ALTER TABLE `MEMBRE`
  ADD PRIMARY KEY (`numMemb`),
  ADD KEY `MEMBRE_FK` (`numMemb`),
  ADD KEY `FK_ASSOCIATION_10` (`idStat`);

--
-- Index pour la table `MOTCLE`
--
ALTER TABLE `MOTCLE`
  ADD PRIMARY KEY (`numMotCle`),
  ADD KEY `MOTCLE_FK` (`numMotCle`),
  ADD KEY `FK_ASSOCIATION_5` (`numLang`);

--
-- Index pour la table `MOTCLEARTICLE`
--
ALTER TABLE `MOTCLEARTICLE`
  ADD PRIMARY KEY (`numArt`,`numMotCle`),
  ADD KEY `MOTCLEARTICLE_FK` (`numArt`),
  ADD KEY `MOTCLEARTICLE2_FK` (`numMotCle`);

--
-- Index pour la table `PAYS`
--
ALTER TABLE `PAYS`
  ADD PRIMARY KEY (`numPays`),
  ADD KEY `PAYS_FK` (`numPays`);

--
-- Index pour la table `STATUT`
--
ALTER TABLE `STATUT`
  ADD PRIMARY KEY (`idStat`),
  ADD KEY `STATUT_FK` (`idStat`);

--
-- Index pour la table `THEMATIQUE`
--
ALTER TABLE `THEMATIQUE`
  ADD PRIMARY KEY (`numThem`),
  ADD KEY `THEMATIQUE_FK` (`numThem`),
  ADD KEY `FK_ASSOCIATION_4` (`numLang`);

--
-- Index pour la table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`pseudoUser`,`passUser`),
  ADD KEY `USER_FK` (`pseudoUser`,`passUser`),
  ADD KEY `FK_ASSOCIATION_6` (`idStat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  MODIFY `numArt` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `MEMBRE`
--
ALTER TABLE `MEMBRE`
  MODIFY `numMemb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `MOTCLE`
--
ALTER TABLE `MOTCLE`
  MODIFY `numMotCle` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `STATUT`
--
ALTER TABLE `STATUT`
  MODIFY `idStat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ANGLE`
--
ALTER TABLE `ANGLE`
  ADD CONSTRAINT `FK_ASSOCIATION_3` FOREIGN KEY (`numLang`) REFERENCES `LANGUE` (`numLang`);

--
-- Contraintes pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`numAngl`) REFERENCES `ANGLE` (`numAngl`),
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`numThem`) REFERENCES `THEMATIQUE` (`numThem`);

--
-- Contraintes pour la table `COMMENT`
--
ALTER TABLE `COMMENT`
  ADD CONSTRAINT `FK_ASSOCIATION_8` FOREIGN KEY (`numArt`) REFERENCES `ARTICLE` (`numArt`),
  ADD CONSTRAINT `FK_ASSOCIATION_9` FOREIGN KEY (`numMemb`) REFERENCES `MEMBRE` (`numMemb`);

--
-- Contraintes pour la table `COMMENTPLUS`
--
ALTER TABLE `COMMENTPLUS`
  ADD CONSTRAINT `FK_COMMENTPLUS` FOREIGN KEY (`numSeqComR`,`numArtR`) REFERENCES `COMMENT` (`numSeqCom`, `numArt`),
  ADD CONSTRAINT `FK_COMMENTPLUS2` FOREIGN KEY (`numSeqCom`,`numArt`) REFERENCES `COMMENT` (`numSeqCom`, `numArt`);

--
-- Contraintes pour la table `LANGUE`
--
ALTER TABLE `LANGUE`
  ADD CONSTRAINT `FK_ASSOCIATION_7` FOREIGN KEY (`numPays`) REFERENCES `PAYS` (`numPays`);

--
-- Contraintes pour la table `LIKEART`
--
ALTER TABLE `LIKEART`
  ADD CONSTRAINT `FK_LIKEART` FOREIGN KEY (`numArt`) REFERENCES `ARTICLE` (`numArt`),
  ADD CONSTRAINT `FK_LIKEART2` FOREIGN KEY (`numMemb`) REFERENCES `MEMBRE` (`numMemb`);

--
-- Contraintes pour la table `LIKECOM`
--
ALTER TABLE `LIKECOM`
  ADD CONSTRAINT `FK_LIKECOM` FOREIGN KEY (`numSeqCom`,`numArt`) REFERENCES `COMMENT` (`numSeqCom`, `numArt`),
  ADD CONSTRAINT `FK_LIKECOM2` FOREIGN KEY (`numMemb`) REFERENCES `MEMBRE` (`numMemb`);

--
-- Contraintes pour la table `MEMBRE`
--
ALTER TABLE `MEMBRE`
  ADD CONSTRAINT `FK_ASSOCIATION_10` FOREIGN KEY (`idStat`) REFERENCES `STATUT` (`idStat`);

--
-- Contraintes pour la table `MOTCLE`
--
ALTER TABLE `MOTCLE`
  ADD CONSTRAINT `FK_ASSOCIATION_5` FOREIGN KEY (`numLang`) REFERENCES `LANGUE` (`numLang`);

--
-- Contraintes pour la table `MOTCLEARTICLE`
--
ALTER TABLE `MOTCLEARTICLE`
  ADD CONSTRAINT `FK_MotCleArt1` FOREIGN KEY (`numMotCle`) REFERENCES `MOTCLE` (`numMotCle`),
  ADD CONSTRAINT `FK_MotCleArt2` FOREIGN KEY (`numArt`) REFERENCES `ARTICLE` (`numArt`);

--
-- Contraintes pour la table `THEMATIQUE`
--
ALTER TABLE `THEMATIQUE`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`numLang`) REFERENCES `LANGUE` (`numLang`);

--
-- Contraintes pour la table `USER`
--
ALTER TABLE `USER`
  ADD CONSTRAINT `FK_ASSOCIATION_6` FOREIGN KEY (`idStat`) REFERENCES `STATUT` (`idStat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
