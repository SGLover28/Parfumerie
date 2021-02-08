-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 08 fév. 2021 à 23:45
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parfumerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `cadeau`
--

CREATE TABLE `cadeau` (
  `NumCadeau` int(10) NOT NULL,
  `Designation` text,
  `StockCadeau` int(10) NOT NULL,
  `nbPointCadeau` int(10) NOT NULL,
  `StatusCadeau` varchar(20) NOT NULL,
  `ImageCadeau` text NOT NULL,
  `NomCadeau` varchar(255) NOT NULL,
  `TypeCadeau` varchar(255) DEFAULT NULL,
  `VolumeCadeau` double DEFAULT NULL,
  `CategorieCadeau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cadeau`
--

INSERT INTO `cadeau` (`NumCadeau`, `Designation`, `StockCadeau`, `nbPointCadeau`, `StatusCadeau`, `ImageCadeau`, `NomCadeau`, `TypeCadeau`, `VolumeCadeau`, `CategorieCadeau`) VALUES
(1, 'BOUCHERON est une eau de parfum pour femme de la famille Florale Orientale, de la Maison de Haute Joaillerie portant son nom. Ce parfum symbolise l’excellence, la luminosité, la sophistication et le luxe propres à la firme, qu’elle exprime aussi bien dans ses joyaux que dans ses parfums. D’authentiques œuvres d’art, s’adressant à un public de connaisseurs.\r\nCe parfum fut créé en 2012, reformulant la version classique datant de 1988. Un parfum ostentatoire et voluptueux, décrivant une femme triomphante et extrêmement élégante, au style classique et absolument raffinée. Une femme soignant les moindres détails, ambitieuse et indépendante.', 9, 322, 'en stock', 'https://i1.perfumesclub.com/grande/38656.jpg', 'Boucheron', 'Eau de Parfum vaporisateur pour femme', 100, 'Parfum'),
(9, 'Avec ce correcteur fluide qui combine le traitement, vous pourrez couvrir et corriger instantanément les imperfections, les taches, les petites rides et les cernes! Grâce à sa nouvelle formulation alliant anticernes pigmentés et traitement anti-âge vous obtiendrez des résultats parfaits en un geste simple.\r\n\r\nSon application est simple grâce à son applicateur à éponge douce breveté qui parvient à déposer la bonne quantité de produit sans marquer les rides ni les pores.', 44, 43, '', '\r\nhttps://i1.perfumesclub.com/grande/61897.jpg', 'Maybelline New York', 'Correcteur de maquillage', 6.8, 'Maquillage'),
(11, '\r\nAROMATICS ELIXIR de Clinique est une eau de parfum à la grande luminosité florale, qui procure des sensations de pureté et d’équilibre, grâce à ses propriétés tonifiantes et apaisantes stimulant les sens.\r\n\r\nSes notes de tête se composent de bergamote, verveine citronnée et sauge sclarée, des plantes aromatiques très utilisées pour la fabrication d’huiles essentielles qui stimulent l’esprit et les sens.', 12, 300, 'en stock', 'https://i1.perfumesclub.com/grande/16316.jpg', 'Clinique', 'Eau de Parfum vaporisateur pour femme', 100, 'Parfum'),
(13, 'SUMPTUOUS EXTREME Mascara d’Estée Lauder. Un mascara qui donne du volume aux cils et prévient leur chute, grâce à sa formule légère qui les maintient à l’abri du poids à tout moment.\r\n\r\nCe mascara a deux nouveautés et propriétés qui en font un produit unique et incomparable:\r\n\r\n- Sa texture en mousse. Une nouvelle formule qui mélange une combinaison de gels, de cires, de polymères et de pigments de couleur ultra-légers, qui fournissent un volume intense aux cils sans les alourdir.\r\n\r\n- La brosse exclusive Extreme BrushComber . Ce mascara a une brosse qui fournit une grande augmentation de volume tout en les définissant et en les revitalisant. Cet applicateur retient également plus de produit, donc un passage sera suffisant pour couvrir entièrement tous les cils.', 0, 24, 'Ã©puisÃ©', 'https://i1.perfumesclub.com/grande/34752.jpg', 'Estée Lauder', 'Mascara', 8, 'Maquillage'),
(14, 'ETERNITY est une eau de parfum aux lumineuses notes hespéridées et au cœur floral. Ce parfum de Calvin Klein s’adresse aux femmes romantiques, aux valeurs intemporelles et éternelles; l´amour, la fidélité et l\'amitié, en accord avec leur temps.\r\n\r\nSon signe particulier résulte notamment d’un accord aromatique de notes de tête de mandarine et de notes vertes. Passés les premiers instants, elle ouvre le pas à son cœur irrésistiblement floral avec des délicieuses notes de lys, œillet, violette, jasmin, muguet, rose et narcisse, avec des touches délicates de calendula.', 32, 500, 'en stock', 'https://i1.perfumesclub.com/grande/3978.jpg', 'Calvin Klein\r\n', 'Eau de parfum vaporisateur pour femme', 213, 'Parfum'),
(15, 'DIOR ADDICT Lip Maximizer de Dior. Un gloss effet volume instantané qui apporte brillance et jutosité aux lèvres.\r\n\r\nNous sommes devant le premier gloss avec effet volume de la marque Dior. Ce rouge à lèvres repulpe les lèvres en leur donnant une sensation visuelle de plus grande épaisseur et une finition attrayante glossy. Cette action est possible grâce à sa formule enrichie en collagène, qui lisse et réaffirme instantanément la peau des lèvres.', 10, 24, 'en stock', 'https://i1.perfumesclub.com/grande/109023.jpg', 'DIOR ', 'ADDICT lip maximizer Gloss', 6.8, 'Maquillage'),
(16, 'NATURAL BRONZER de Rimmel London. Une poudre bronzante longue tenue et un facteur de protection SPF15 adapté à tous les types de peau.\r\n\r\nMontrer un visage bronzé toute l\'année est le rêve de chaque utilisatrice, non? Vous avez de la chance! Car avec ces poudres bronzantes, votre teint sera bronzé et illuminé avec un fini ultra naturel et sans besoin de vous exposer au soleil.\r\n\r\nSa texture agréable crée un effet velouté sur la peau et la teinte avec une couche de couleur, comme si elle était fraîchement baignée par les rayons du soleil.\r\n\r\nDe plus, sa formule est «résistante à l\'eau» et garantit une durée jusqu\'à 10h.\r\n\r\nProfitez d\'un bronzage intemporel avec NATURAL BRONZER!', 0, 43, 'Ã©puisÃ©', 'https://i1.perfumesclub.com/grande/99133.jpg', 'Rimmel London\r\n', 'Poudres bronzantes', 14, 'Maquillage'),
(17, 'SUPER GEL nail polish by Kate Moss de Rimmel London, un système d\'émaillage avec fini gel.\r\n\r\nCes vernis à ongles vous permettent d\'obtenir des résultats dignes d\'un salon de manucure en deux étapes seulement. La première étape est le vernis en couleur, avec une formule qui dure jusqu\'à 14 jours sans perdre un iota de couleur ou de brillance.\r\n\r\nSon fini est de style gel, brillant et résistant, mais ne nécessite pas de lampe UV, son pinceau est large et facile à appliquer et vous n’avez besoin que d’une couche de Top Coat pour obtenir une brillance incroyable et une durée digne d\'un salon de beauté.\r\n\r\nSes couleurs inspirent des moments et sont le complément idéal pour celles qui veulent ajouter une touche de glamour à leurs mains, ils ont également été créés par la top model Kate Moss.', 10, 24, 'en stock', 'https://i1.perfumesclub.com/grande/99215.jpg', 'Rimmel London', 'Vernis à ongles', 12, 'Maquillage'),
(18, 'Il sent bon', 30, 15000, 'en stock', 'img/nouveaute5.jpg', 'Parfum2', 'Parfum', 5, 'Parfum ');

-- --------------------------------------------------------

--
-- Structure de la table `cadeaucommande`
--

CREATE TABLE `cadeaucommande` (
  `NumCommande` int(10) NOT NULL,
  `NumCadeau` int(10) NOT NULL,
  `QuantiteCommandee` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cadeaucommande`
--

INSERT INTO `cadeaucommande` (`NumCommande`, `NumCadeau`, `QuantiteCommandee`) VALUES
(2, 13, 1),
(3, 13, 2),
(4, 9, 1),
(5, 16, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cadeaulivraison`
--

CREATE TABLE `cadeaulivraison` (
  `NumLivraison` int(10) NOT NULL,
  `NumCadeau` int(10) NOT NULL,
  `QuantiteLivree` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cartefidelite`
--

CREATE TABLE `cartefidelite` (
  `NumCarteFidelite` int(10) NOT NULL,
  `CodeClient` int(11) NOT NULL,
  `NbPoints` int(10) DEFAULT '0',
  `DateCreation` date DEFAULT NULL,
  `DateExpirationPoints` date DEFAULT NULL,
  `membership` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cartefidelite`
--

INSERT INTO `cartefidelite` (`NumCarteFidelite`, `CodeClient`, `NbPoints`, `DateCreation`, `DateExpirationPoints`, `membership`) VALUES
(2, 6, 686, '2021-01-13', '2021-01-29', ''),
(9, 5, 71, '2021-02-02', NULL, 'Silver'),
(13, 10, 301, '2021-02-08', NULL, 'Ultimate'),
(14, 11, 2000000000, '2021-02-08', '2021-02-11', 'Ultimate');

-- --------------------------------------------------------

--
-- Structure de la table `cartefidelitemembership`
--

CREATE TABLE `cartefidelitemembership` (
  `NomMembership` varchar(20) NOT NULL,
  `NbPointsNiveauMin` int(10) DEFAULT NULL,
  `NbPointsNiveauMax` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `cartefidelitemembership`
--

INSERT INTO `cartefidelitemembership` (`NomMembership`, `NbPointsNiveauMin`, `NbPointsNiveauMax`) VALUES
('Gold', 101, 200),
('Platinium', 201, 300),
('Silver', 0, 100),
('Ultimate', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `CodeClient` int(10) NOT NULL,
  `NomClient` varchar(254) NOT NULL,
  `PrenomClient` varchar(254) NOT NULL,
  `AdressePostal` varchar(254) DEFAULT NULL,
  `Facebook` varchar(254) DEFAULT NULL,
  `Instagram` varchar(254) DEFAULT NULL,
  `Email` varchar(254) NOT NULL,
  `NumTel` varchar(10) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `MotDePasse` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`CodeClient`, `NomClient`, `PrenomClient`, `AdressePostal`, `Facebook`, `Instagram`, `Email`, `NumTel`, `isAdmin`, `MotDePasse`) VALUES
(2, 'mouna', 'moun', '73000', 'martinfacebook.com', 'martininstagram.com', 'martin@bdd.com', '1234567890', 1, 'admin'),
(5, 'mouna', 'moun', '16 Boulevard Charles Nicolle', 'ff', 'ff', 'mounaammar02@gmail.com', '111111', 0, 'mdp'),
(6, 'mouna', 'moun', 'dd', 'dd', '', 'smee5587@gmail.com', 'dd', 0, 'mdp'),
(10, 'TESTÃ©', 'hhhh', '', '', '', 'mmm@hhh.fr', '', 0, 'ahziiz'),
(11, 'Hennechart', 'Lilian', '47 Avenue Louis Cordelet', 'Lilian', 'Hennechart', 'lilian.hennechart@gmail.com', '0900000102', 1, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `NumCommande` int(10) NOT NULL,
  `CodeClient` int(10) NOT NULL,
  `DateCommande` date NOT NULL,
  `MontantTotalCommande` float NOT NULL,
  `Observation` text CHARACTER SET latin1,
  `FraisLivraison` float DEFAULT NULL,
  `FraisService` float DEFAULT NULL,
  `Promotion` float DEFAULT NULL,
  `nbPointsGagnes` int(10) NOT NULL,
  `pointsTotals` int(10) NOT NULL,
  `StatutCommande` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`NumCommande`, `CodeClient`, `DateCommande`, `MontantTotalCommande`, `Observation`, `FraisLivraison`, `FraisService`, `Promotion`, `nbPointsGagnes`, `pointsTotals`, `StatutCommande`) VALUES
(2, 5, '2021-02-07', 24, NULL, NULL, NULL, NULL, 24, 80, 'passÃ©e'),
(3, 5, '2021-02-08', 48, NULL, NULL, NULL, NULL, 48, 32, 'passÃ©e'),
(4, 5, '2021-02-08', 43, NULL, NULL, NULL, NULL, 43, 57, 'passÃ©e'),
(5, 5, '2021-02-08', 129, NULL, NULL, NULL, NULL, 86, -43, 'passÃ©e');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `NumFacture` int(10) NOT NULL,
  `NumCommande` int(10) NOT NULL,
  `DateFacture` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`NumFacture`, `NumCommande`, `DateFacture`) VALUES
(4, 2, '2021-02-07'),
(5, 3, '2021-02-08'),
(9, 4, '2021-02-08'),
(10, 5, '2021-02-08'),
(14, 5, '2021-02-08'),
(15, 5, '2021-02-08'),
(16, 5, '2021-02-08'),
(17, 5, '2021-02-08'),
(18, 5, '2021-02-08'),
(19, 5, '2021-02-08'),
(20, 5, '2021-02-08'),
(21, 5, '2021-02-08'),
(22, 5, '2021-02-08'),
(23, 5, '2021-02-08'),
(24, 5, '2021-02-08'),
(25, 5, '2021-02-08'),
(26, 5, '2021-02-08'),
(27, 5, '2021-02-08'),
(28, 5, '2021-02-08'),
(29, 5, '2021-02-08'),
(30, 5, '2021-02-08');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `NumLivraison` int(10) NOT NULL,
  `NumCommande` int(10) NOT NULL,
  `DateEnvoi` date NOT NULL,
  `DateArrivee` date NOT NULL,
  `LieuLivraison` varchar(255) NOT NULL,
  `NumColis` varchar(255) NOT NULL,
  `Note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `NumProduit` int(10) NOT NULL,
  `Designation` text,
  `StockProduit` int(10) NOT NULL,
  `PrixAchat` float NOT NULL,
  `Status` varchar(20) NOT NULL,
  `ImageProduit` text NOT NULL,
  `CategorieProduit` varchar(255) NOT NULL,
  `NomProduit` varchar(255) NOT NULL,
  `TypeProduit` varchar(255) NOT NULL,
  `VolumeProduit` double DEFAULT NULL,
  `selection` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`NumProduit`, `Designation`, `StockProduit`, `PrixAchat`, `Status`, `ImageProduit`, `CategorieProduit`, `NomProduit`, `TypeProduit`, `VolumeProduit`, `selection`) VALUES
(2, 'QUATRE FEMME, est un parfum floral fruité pour femme qui a été lancé en 2015. Le flacon est en verre transparent et possède un anneau sur le dessus du bouchon. Les parfumeurs sont Nathalie Gracia-Cetto, Nadège Legarlantezec et Antoine Maisondieu. Au sommet de la pyramide, on trouve le pamplemousse, le citron, l\'orange et l\'orange mandarine; En notes de coeur, il a la pomme, le jasmin, la pêche, la rose et la fraise et le caramel, le cachemire, la vanille, le musc blanc et le cèdre restent à la base. C\'est une eau de parfum.', 12, 300, 'en stock', 'img/nouveaute5.JPG', 'Parfum', 'Boucheron', 'Eau de Parfum vaporisateur pour femme', 100, 0),
(3, 'NÉROLI AMARA de Van Cleef & Arpels est une Eau de Parfum unisexe qui fait partie de la famille Florale des Agrumes. Ce parfum appartient à la collection \'COLLECTION EXTRAORDINAIRE\' caractérisée par la création d\'essences luxueuses, exclusives et hautement sophistiquées, de portée limitée et d\'une qualité exquise.\r\n\r\nCette fragrance, lancée en 2018 par le parfumeur Quentin Bisch, s’inspire de la princesse de Nerola, Anne Marie Orsini, qui adorait l’arôme de la fleur d’oranger et l’utilisait donc régulièrement dans ses rituels de beauté et même elle a imprégné ses gants et ses vêtements. Une histoire du XVIIe siècle reflétée dans un arôme raffiné, frais et très polyvalent.', 10, 123, 'en stock', 'img/nouveaute4.JPG', 'Parfum', 'Van Cleef', 'Eau de Parfum vaporisateur pour femme', 50, 0),
(4, 'Dior SAUVAGE est une eau de parfum ou une eau de parfum oriental. Un parfum masculin qui respire de nouvelles facettes sensuelles et mystérieuses, a été lancé en 2018 par le parfumeur François Demachy qui s\'est inspiré du coucher de soleil du désert. Sa note de tête est bergaota, en son cœur il a de la lavande, du poivre du Sichuan, de l\'anis étoilé et de la muscade et en bas reste ambroxan et vanille.', 2, 221, 'en stock', 'img/nouveaute5.png', 'Parfum', 'DIOR\r\n', 'Eau de Parfum vaporisateur pour homme', 90, 0),
(5, 'Découvrez la sensualité exotique, votre prochain péché mignon. L’eau de parfum unisexe Boucheron La Collection Patchouli d’Angkor dévoilera devant vous la force mystique des temples cambodgiens à travers ses tons contrastés qui unissent la lumière et l’ombre. \r\n\r\nparfum fleuri chypré\r\nfait partie de la gamme La Collection inspirée des chercheurs de pierres précieuses\r\nparfum unisex – pour les femmes et les hommes', 30, 176, 'en stock', 'img/nouveaute3.JPG', 'Parfum', 'Boucheron ', 'Eau de Parfum mixte', 125, 0),
(6, 'BOUCHERON est une eau de parfum pour femme de la famille Florale Orientale, de la Maison de Haute Joaillerie portant son nom. Ce parfum symbolise l’excellence, la luminosité, la sophistication et le luxe propres à la firme, qu’elle exprime aussi bien dans ses joyaux que dans ses parfums. D’authentiques œuvres d’art, s’adressant à un public de connaisseurs.\r\nCe parfum fut créé en 2012, reformulant la version classique datant de 1988. Un parfum ostentatoire et voluptueux, décrivant une femme triomphante et extrêmement élégante, au style classique et absolument raffinée. Une femme soignant les moindres détails, ambitieuse et indépendante.', 9, 322, 'en stock', 'https://i1.perfumesclub.com/grande/38656.jpg', 'Parfum', 'Boucheron', 'Eau de Parfum vaporisateur pour femme', 100, 0),
(7, 'Avec ce correcteur fluide qui combine le traitement, vous pourrez couvrir et corriger instantanément les imperfections, les taches, les petites rides et les cernes! Grâce à sa nouvelle formulation alliant anticernes pigmentés et traitement anti-âge vous obtiendrez des résultats parfaits en un geste simple.\r\n\r\nSon application est simple grâce à son applicateur à éponge douce breveté qui parvient à déposer la bonne quantité de produit sans marquer les rides ni les pores.', 0, 43, 'Ã©puisÃ©', '\r\n\r\nhttps://i1.perfumesclub.com/grande/61897.jpg', 'Maquillage ', 'Maybelline New York', 'Correcteur de maquillage', 6.8, 1),
(8, 'Base de maquillage longue tenue au format stick. Sa texture crémeuse permet une application facile pour obtenir une couvrance souple, résistante à la chaleur et aux zones humides. Il est capable de camoufler les imperfections, de matifier et d\'unifier la peau, de masquer les ridules d\'expression et autres imperfections telles que les pores.\r\n\r\nIl peut être utilisé comme base de maquillage et appliqué sur tout le visage ou comme cache-cernes pour les imperfections et / ou pour réaliser la technique du comptage. Sculptez votre visage de manière simple en appliquant un ton plus foncé et un ton plus clair pour améliorer vos traits.', 32, 54, 'en stock', 'https://i1.perfumesclub.com/grande/119880.jpg', 'Maquillage', 'L\'Oréal París', 'Fondation de maquillage\r\n', 9, 1),
(9, '\r\nAROMATICS ELIXIR de Clinique est une eau de parfum à la grande luminosité florale, qui procure des sensations de pureté et d’équilibre, grâce à ses propriétés tonifiantes et apaisantes stimulant les sens.\r\n\r\nSes notes de tête se composent de bergamote, verveine citronnée et sauge sclarée, des plantes aromatiques très utilisées pour la fabrication d’huiles essentielles qui stimulent l’esprit et les sens.', 12, 300, 'en stock', 'https://i1.perfumesclub.com/grande/16316.jpg', 'Parfum', 'Clinique', 'Eau de Parfum vaporisateur pour femme', 100, 1),
(10, 'MEGA VOLUME COLLAGENE Mascara de L’Oréal. Un mascara de cils à longue durée qui offre une augmentation de volume considérable et un fini noir intense.\r\n\r\nL\'Oréal présente son premier mascara de cils d\'une durée de 24 heures, qui garde les yeux embellis, agrandis et sans retouches tout au long de la journée.\r\nIl a une brosse maxi qui double la taille des brosses habituelles et imprègne en un seul passage chacun des cils de la racine aux pointes, évitant ainsi la formation de grumeaux et de possibles agglomérations.', 10, 123, 'en stock', 'https://i1.perfumesclub.com/grande/53207.jpg', 'Maquillage', 'L\'Oréal París', 'Mascara', 8.5, 1),
(11, 'SUMPTUOUS EXTREME Mascara d’Estée Lauder. Un mascara qui donne du volume aux cils et prévient leur chute, grâce à sa formule légère qui les maintient à l’abri du poids à tout moment.\r\n\r\nCe mascara a deux nouveautés et propriétés qui en font un produit unique et incomparable:\r\n\r\n- Sa texture en mousse. Une nouvelle formule qui mélange une combinaison de gels, de cires, de polymères et de pigments de couleur ultra-légers, qui fournissent un volume intense aux cils sans les alourdir.\r\n\r\n- La brosse exclusive Extreme BrushComber . Ce mascara a une brosse qui fournit une grande augmentation de volume tout en les définissant et en les revitalisant. Cet applicateur retient également plus de produit, donc un passage sera suffisant pour couvrir entièrement tous les cils.', 2, 24, 'en stock', 'https://i1.perfumesclub.com/grande/34752.jpg', 'Maquillage', 'Estée Lauder', 'Mascara', 8, 1),
(13, 'DIOR ADDICT Lip Maximizer de Dior. Un gloss effet volume instantané qui apporte brillance et jutosité aux lèvres.\r\n\r\nNous sommes devant le premier gloss avec effet volume de la marque Dior. Ce rouge à lèvres repulpe les lèvres en leur donnant une sensation visuelle de plus grande épaisseur et une finition attrayante glossy. Cette action est possible grâce à sa formule enrichie en collagène, qui lisse et réaffirme instantanément la peau des lèvres.', 10, 24, 'en stock', 'https://i1.perfumesclub.com/grande/109023.jpg', 'Maquillage', 'DIOR ', 'ADDICT lip maximizer Gloss', 6.8, 1),
(14, 'La palette de fards à paupières Le Smoky de Bourjois , est une palette de fards à paupières, contenant 8 nuances différentes à l\'intérieur, à combiner les unes avec les autres, et à créer un look parfait avec un effet `` yeux fumés \'\'.\r\n\r\nIls ont une texture poudre-crème douce et légère, enrichie de pigments à haute coloration, ce qui leur donne une plus grande couverture et une forte intensité, avec juste un coup de pinceau, permettant ainsi une création simple de différentes nuances.', 12, 123, 'en stock', 'https://i1.perfumesclub.com/grande/91638.jpg', 'Maquillage', 'Bourjois ', 'Ombre à paupières', 5, 1),
(15, 'MATTE Lipstick de MAC. Le rouge à lèvres emblématique de la marque se réinvente en se présentant avec une finition ultra mate, crémeuse et juteuse.\r\n\r\nDes lèvres parfaitement hydratées avec un fini mat n\'ont jamais été aussi faciles. MAC, nous offre ce rouge à lèvres à la texture crémeuse, des couleurs vibrantes et ultra pigmentées, et une finition complètement mate, pour montrer un sourire maquillé durable.\r\n\r\nSa texture agréable ne sèche pas la lèvre et empêche la création de rayures sur elle tout en maintenant une couleur inaltérable et une peau élastique pendant toute sa durée.', 0, 34, 'Ã©puisÃ©', 'https://i1.perfumesclub.com/grande/119169.jpg', 'Maquillage', 'MAC', 'Rouges à lèvres MATTE \r\n', 3, 0),
(16, 'DIORSHOW Mascara de Dior. Un mascara à usage professionnel et avec une finition professionnelle qui donne aux cils un volume envoûtant.\r\n\r\nDior nous présente le mascara qui donne vie aux regards de ses modèles lors des défilés de mode de la marque. Celui-ci, enrichi en microfibres, crée un effet optique sur les cils similaire à celui créé par les faux cils ou certains «extensions de cils».\r\n\r\nIl dispose d’une brosse exclusive et brevetée par la marque Air-Lock ™, qui évite que sa formule ne se dessèche au contact de l’air, favorisant ainsi son application et son glissement sur les cils, permettant une définition et une séparation correctes pour éviter l’apparition de grumeaux.', 10, 24, 'en stock', 'https://i1.perfumesclub.com/grande/71725.jpg', 'Maquillage', 'DIOR\r\n', 'DIORSHOW Mascara', 10, 0),
(17, 'NATURAL BRONZER de Rimmel London. Une poudre bronzante longue tenue et un facteur de protection SPF15 adapté à tous les types de peau.\r\n\r\nMontrer un visage bronzé toute l\'année est le rêve de chaque utilisatrice, non? Vous avez de la chance! Car avec ces poudres bronzantes, votre teint sera bronzé et illuminé avec un fini ultra naturel et sans besoin de vous exposer au soleil.\r\n\r\nSa texture agréable crée un effet velouté sur la peau et la teinte avec une couche de couleur, comme si elle était fraîchement baignée par les rayons du soleil.\r\n\r\nDe plus, sa formule est «résistante à l\'eau» et garantit une durée jusqu\'à 10h.\r\n\r\nProfitez d\'un bronzage intemporel avec NATURAL BRONZER!', 12, 29, 'en stock', 'https://i1.perfumesclub.com/grande/99133.jpg', 'Maquillage', 'Rimmel London', 'Poudres bronzantes', 14, 0),
(18, 'SUPER GEL nail polish by Kate Moss de Rimmel London, un système d\'émaillage avec fini gel.\r\n\r\nCes vernis à ongles vous permettent d\'obtenir des résultats dignes d\'un salon de manucure en deux étapes seulement. La première étape est le vernis en couleur, avec une formule qui dure jusqu\'à 14 jours sans perdre un iota de couleur ou de brillance.\r\n\r\nSon fini est de style gel, brillant et résistant, mais ne nécessite pas de lampe UV, son pinceau est large et facile à appliquer et vous n’avez besoin que d’une couche de Top Coat pour obtenir une brillance incroyable et une durée digne d\'un salon de beauté.\r\n\r\nSes couleurs inspirent des moments et sont le complément idéal pour celles qui veulent ajouter une touche de glamour à leurs mains, ils ont également été créés par la top model Kate Moss.', 23, 10, 'en stock', 'https://i1.perfumesclub.com/grande/99215.jpg', 'Maquillage', 'Rimmel London', 'Vernis à ongles', 12, 1),
(21, 'Jeune, frais et intemporel, CK ONE est une fragrance Unisex imaginée pour tous les jours. Un délicieux équilibre entre fraîcheur, dynamisme et personnalité, idéal pour toutes les saisons de l’année.\r\n\r\nC’est un parfum jeune et dynamique, qui apporte une touche de fraîcheur subtilement désinvolte en accord avec votre style de vie. Un arôme frais, enveloppant et subtil, idéal pour le jour … et la nuit!\r\n\r\nTout une icône de mode dans l’univers de la parfumerie, créée par les célèbres nez espagnol Alberto Morillas et français Harry Frémont, qui demeure leader des ventes mondiales plus de 20 ans après sa création.', 10, 322, 'en stock', 'https://c.perfumesclub.com/nw/ckone/300a-1.jpg', 'Parfum', 'Calvin Klein', 'Eau de Toilette vaporisateur unisexe', 300, 0),
(22, 'AMOR AMOR de Cacharel est un coup de foudre pour les sens. Une fragrance terriblement attirante. Avec son hypnotique flacon rouge, orné d’une rose à la longue tige, elle symbolise le romantisme et l’amour.\r\n\r\nSa fragrance ne vous laissera pas indifférent(e). Cette composition magistrale demeure un best seller mondial et l’un des cadeaux favoris pour la Saint Valentin et les dates anniversaires des amoureux.\r\n\r\nLe secret de son succès réside dans un tandem aromatique de notes de tête fruitées avec la pétillante groseille et de notes hespéridées de mandarine, pamplemousse et orange. Comme s’il s’agissait de votre premier rendez-vous, une première explosion de sensation fraîches et nouvelles réveillent vos sens.\r\n\r\nPassées les premières minutes, cette fragrance offre un cœur floral délicat de roses, jasmin, muguet, fleur de mélati; une balade olfactive très romantique qui invite au rêve.', 21, 210, 'en stock', 'https://i1.perfumesclub.com/grande/108233.jpg', 'Parfum', 'Cacharel', 'Eau de Toilette vaporisateur unisexe', 150, 0),
(23, 'HYPNÔSE Mascara de Lancôme. Un mascara qui exalte le volume des cils et prévient leur agglutination.\r\n\r\nCe mascara augmente le volume de nos cils jusqu’à six fois, et nous permet de créer une finition personnalisée, capable de contrôler l’effet désiré à tout moment.\r\n\r\nIl a une brosse PowerFull qui facilite son application et améliore le glissement sur les cils. En même temps, elle les conditionne et les sépare pour éviter l’accumulation de produit et par conséquent, la formation de grumeaux.\r\n\r\nAprès utilisation, nos yeux ont une beauté unique, car il adoucit et donne de la souplesse aux cils, leur donne une définition, et surtout, leur donne un volume étonnant adapté aux besoins de chaque utilisatrice.\r\n\r\nObtenez des cils hypnotisants avec Hypnôse!', 0, 24, 'Ã©puisÃ©', 'https://i1.perfumesclub.com/grande/101751.jpg', 'Maquillage', 'Lancôme', 'Mascara', 6.2, 0),
(24, 'Mascara Waterproof IMPACT OPTIMAL de Clinique. Un mascara cils résistant à l’eau qui définit notre regard grâce à sa contribution de volume et de longueur.\r\n\r\nCe mascara résistant à l’eau possède des pigments intenses de couleur qui apportent luminosité et intensité au regard, tandis que sa brosse enveloppe les cils les recouvrant uniformément et sans grumeaux avec sa formule, pour nous offrir épaisseur et longueur maximale.\r\n\r\nAprès son application, notre regard acquiert un attrait intense, et les cils nous montrent sa facette la plus sexy et la plus séduisante.\r\n\r\nIl a une grande durée, grâce à sa formule waterproof, qui se montre intacte pendant 24 heures et son démaquillage doux et léger. En outre, il est ultra-respectueux avec les yeux les plus sensibles et convient aux porteurs de lentilles de contact.', 22, 18, 'en stock', 'https://i1.perfumesclub.com/grande/55582.jpg', 'Maquillage', 'Clinique', 'Mascara', 7.2, 0),
(25, 'Il sent bon', 30, 50, 'en stock', 'img/nouveaute5.jpg', 'Parfum ', 'Parfum', 'Parfum', 5, 0),
(26, 'Il sent bon', 30, 150, 'en stock', 'img/nouveaute5.jpg', 'Parfum ', 'Parfum2', 'Parfum', 5, 0),
(27, 'Il sent bon', 30, 150, 'en stock', 'img/nouveaute5.jpg', 'Parfum ', 'Parfum2', 'Parfum', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produitcommande`
--

CREATE TABLE `produitcommande` (
  `NumCommande` int(10) NOT NULL,
  `NumProduit` int(10) NOT NULL,
  `QuantiteCommandee` int(10) NOT NULL,
  `PrixUnitaire` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produitlivraison`
--

CREATE TABLE `produitlivraison` (
  `NumLivraison` int(10) NOT NULL,
  `NumProduit` int(10) NOT NULL,
  `QuantiteLivree` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reglement`
--

CREATE TABLE `reglement` (
  `IdReglement` int(10) NOT NULL,
  `NumCommande` int(10) NOT NULL,
  `ModePaiement` varchar(20) NOT NULL,
  `Montant` float NOT NULL,
  `DatePaiement` date NOT NULL,
  `Observation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reglement`
--

INSERT INTO `reglement` (`IdReglement`, `NumCommande`, `ModePaiement`, `Montant`, `DatePaiement`, `Observation`) VALUES
(4, 2, 'pointsCadeaux', 24, '2021-02-07', ''),
(5, 3, 'pointsCadeaux', 48, '2021-02-08', ''),
(9, 4, 'pointsCadeaux', 43, '2021-02-08', ''),
(10, 5, 'pointsCadeaux', 129, '2021-02-08', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cadeau`
--
ALTER TABLE `cadeau`
  ADD PRIMARY KEY (`NumCadeau`);

--
-- Index pour la table `cadeaucommande`
--
ALTER TABLE `cadeaucommande`
  ADD PRIMARY KEY (`NumCommande`,`NumCadeau`) USING BTREE,
  ADD KEY `NumCommande` (`NumCommande`),
  ADD KEY `NumCadeau` (`NumCadeau`);

--
-- Index pour la table `cadeaulivraison`
--
ALTER TABLE `cadeaulivraison`
  ADD PRIMARY KEY (`NumCadeau`,`NumLivraison`) USING BTREE,
  ADD KEY `NumLivraison` (`NumLivraison`),
  ADD KEY `NumCadeau` (`NumCadeau`);

--
-- Index pour la table `cartefidelite`
--
ALTER TABLE `cartefidelite`
  ADD PRIMARY KEY (`NumCarteFidelite`),
  ADD KEY `CodeClient` (`CodeClient`);

--
-- Index pour la table `cartefidelitemembership`
--
ALTER TABLE `cartefidelitemembership`
  ADD PRIMARY KEY (`NomMembership`) USING BTREE,
  ADD KEY `NomMembership` (`NomMembership`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`CodeClient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`NumCommande`),
  ADD KEY `CodeClient` (`CodeClient`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`NumFacture`),
  ADD KEY `NumCommande` (`NumCommande`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`NumLivraison`),
  ADD KEY `NumCommande` (`NumCommande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`NumProduit`);

--
-- Index pour la table `produitcommande`
--
ALTER TABLE `produitcommande`
  ADD PRIMARY KEY (`NumCommande`,`NumProduit`),
  ADD KEY `NumCommande` (`NumCommande`),
  ADD KEY `NumProduit` (`NumProduit`);

--
-- Index pour la table `produitlivraison`
--
ALTER TABLE `produitlivraison`
  ADD PRIMARY KEY (`NumLivraison`,`NumProduit`),
  ADD KEY `NumLivraison` (`NumLivraison`),
  ADD KEY `NumProduit` (`NumProduit`);

--
-- Index pour la table `reglement`
--
ALTER TABLE `reglement`
  ADD PRIMARY KEY (`IdReglement`),
  ADD KEY `NumCommande` (`NumCommande`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cadeau`
--
ALTER TABLE `cadeau`
  MODIFY `NumCadeau` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `cartefidelite`
--
ALTER TABLE `cartefidelite`
  MODIFY `NumCarteFidelite` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `CodeClient` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `NumCommande` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `NumFacture` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `NumLivraison` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `NumProduit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `reglement`
--
ALTER TABLE `reglement`
  MODIFY `IdReglement` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cadeaucommande`
--
ALTER TABLE `cadeaucommande`
  ADD CONSTRAINT `cadeaucommande_ibfk_1` FOREIGN KEY (`NumCommande`) REFERENCES `commande` (`NumCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cadeaucommande_ibfk_2` FOREIGN KEY (`NumCadeau`) REFERENCES `cadeau` (`NumCadeau`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cadeaulivraison`
--
ALTER TABLE `cadeaulivraison`
  ADD CONSTRAINT `cadeaulivraison_ibfk_1` FOREIGN KEY (`NumCadeau`) REFERENCES `cadeau` (`NumCadeau`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cadeaulivraison_ibfk_2` FOREIGN KEY (`NumLivraison`) REFERENCES `livraison` (`NumLivraison`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cartefidelite`
--
ALTER TABLE `cartefidelite`
  ADD CONSTRAINT `cartefidelite_ibfk_1` FOREIGN KEY (`CodeClient`) REFERENCES `client` (`CodeClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`CodeClient`) REFERENCES `client` (`CodeClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`NumCommande`) REFERENCES `commande` (`NumCommande`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`NumCommande`) REFERENCES `commande` (`NumCommande`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produitcommande`
--
ALTER TABLE `produitcommande`
  ADD CONSTRAINT `produitcommande_ibfk_1` FOREIGN KEY (`NumCommande`) REFERENCES `commande` (`NumCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produitcommande_ibfk_2` FOREIGN KEY (`NumProduit`) REFERENCES `produit` (`NumProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produitlivraison`
--
ALTER TABLE `produitlivraison`
  ADD CONSTRAINT `produitlivraison_ibfk_1` FOREIGN KEY (`NumLivraison`) REFERENCES `livraison` (`NumLivraison`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produitlivraison_ibfk_2` FOREIGN KEY (`NumProduit`) REFERENCES `produit` (`NumProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reglement`
--
ALTER TABLE `reglement`
  ADD CONSTRAINT `reglement_ibfk_2` FOREIGN KEY (`NumCommande`) REFERENCES `commande` (`NumCommande`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
