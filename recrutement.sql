-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 17 jan. 2025 à 16:10
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recrutement`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidatures`
--

DROP TABLE IF EXISTS `candidatures`;
CREATE TABLE IF NOT EXISTS `candidatures` (
  `ID_CANDIDATURE` int NOT NULL AUTO_INCREMENT,
  `ID_OFFRE` int NOT NULL,
  `ID_CV` int NOT NULL,
  `ID_LETTRE` int NOT NULL,
  `ID_USER` int NOT NULL,
  `DATE_POSTULATION` datetime NOT NULL,
  PRIMARY KEY (`ID_CANDIDATURE`),
  KEY `FK_PASSER` (`ID_USER`),
  KEY `FK_POUR1` (`ID_CV`),
  KEY `FK_POUR2` (`ID_LETTRE`),
  KEY `FK_RECOIT` (`ID_OFFRE`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `candidatures`
--

INSERT INTO `candidatures` (`ID_CANDIDATURE`, `ID_OFFRE`, `ID_CV`, `ID_LETTRE`, `ID_USER`, `DATE_POSTULATION`) VALUES
(14, 1, 15, 14, 29, '2025-01-17 14:23:52');

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `ID_CV` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int NOT NULL,
  `TITRE_CV` varchar(56) NOT NULL,
  `FICHIER` text NOT NULL,
  PRIMARY KEY (`ID_CV`),
  KEY `FK_POSSEDE1` (`ID_USER`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cv`
--

INSERT INTO `cv` (`ID_CV`, `ID_USER`, `TITRE_CV`, `FICHIER`) VALUES
(15, 29, 'Postulation dev web junior pour CGI', 'cvs/1-29.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `lettres`
--

DROP TABLE IF EXISTS `lettres`;
CREATE TABLE IF NOT EXISTS `lettres` (
  `ID_LETTRE` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int NOT NULL,
  `TITRE_LETTRE` varchar(56) NOT NULL,
  `CONTENU` text NOT NULL,
  PRIMARY KEY (`ID_LETTRE`),
  KEY `FK_POSSEDE2` (`ID_USER`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `lettres`
--

INSERT INTO `lettres` (`ID_LETTRE`, `ID_USER`, `TITRE_LETTRE`, `CONTENU`) VALUES
(14, 29, 'lm : postulation dev web junior cgi', 'aaaaaaabbbbbbbbbbbbcccccccccccddddddd zed');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

DROP TABLE IF EXISTS `offres`;
CREATE TABLE IF NOT EXISTS `offres` (
  `ID_OFFRE` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int NOT NULL,
  `TITRE_OFFRE` varchar(56) NOT NULL,
  `ENTREPRISE` varchar(56) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `LIEU` varchar(56) NOT NULL,
  `DATE_PUB` datetime NOT NULL,
  PRIMARY KEY (`ID_OFFRE`),
  KEY `FK_CREER` (`ID_USER`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`ID_OFFRE`, `ID_USER`, `TITRE_OFFRE`, `ENTREPRISE`, `DESCRIPTION`, `LIEU`, `DATE_PUB`) VALUES
(1, 27, 'Developpeur Web Junior', 'CGI', 'MODIFICATION\r\nDescription de poste:\r\n\r\nEn qualité d’Expert(e) Technique, vous réalisez en autonomie, la résolution des sujets techniques sur votre périmètre, sous la responsabilité du pilote de projet.\r\n\r\nCe rôle exige une communication et une interaction avec les multiples clients internes et externes pour veiller à ce que chaque module interagisse adéquatement avec les autres. Le développeur doit également résoudre les problèmes et élaborer de nouvelles améliorations pour atteindre les résultats ciblés.\r\n\r\nL’intervention de l’Experte technique consiste aussi à prendre en charge les demandes d’assistance (techniques et/ou fonctionnelles), de la maintenance corrective ou évolutive du périmètre et d’effectuer les tâches opérationnelles tout en respectant les différentes contraintes attenantes au projet en termes de plan de charge, de qualité et de délais.\r\n\r\n\r\n\r\nFonctions et responsabilités\r\n\r\nL’Expert(e) Technique est amené à effectuer les missions suivantes :\r\n\r\n\r\n\r\nRéalisation des demandes d’assistance, de correction et d’évolution\r\n\r\nRédaction des spécifications techniques\r\n\r\nProduction des chiffrages des petites et grandes évolutions\r\n\r\nRéalisation des tests unitaires et d’intégration\r\n\r\nAnticipation des défaillances ou dégradations du système dans le cadre de la maintenance préventive\r\n\r\nMise à jour documentaire\r\n\r\nSupervision de l’application\r\n\r\nFiabilisation de la plateforme\r\n\r\n\r\n\r\nQualités requises pour réussir dans ce rôle\r\n\r\nAfin d’être autonome en tant qu\'Expert Technique, on attendra :\r\n\r\n\r\n\r\n- Une bonne capacité d’expression et de synthétisation\r\n\r\n- Une capacité à résoudre des problèmes techniques en autonomie, en s’appuyant sur de la documentation et de la recherche\r\n\r\n- Une connaissance des bases des méthodes agiles\r\n\r\n- Une bonne maitrise de Scripting : Perl, Shell\r\n\r\n- Bonne maitrise de Java/J2EE (JDBC, JSP, Servlet)\r\n\r\n- Bonne maitrise des outils de développement : GIT, un IDE, commandes système linux\r\n\r\n- Bonne maitrise du langage SQL et VB\r\n\r\n- Maitrise de Tomcat, web Service Soap et REST\r\n\r\n- Avoir des connaissances du Cloud (de préférence Azure & AWS)\r\n\r\n- Connaissance en outillage DevOps : Git, GitHub, CI/CD Pipelines (Azure DevOps Pipeline, GitHub Actions, Jenkins Pipeline)\r\n\r\n\r\n\r\nCGI est un employeur inclusif et attentif aux candidatures des personnes en situation de handicap et à l’évolution de carrières des hommes et des femmes.\r\n\r\n\r\n\r\nAllier savoir et faire\r\n\r\nAlors que la technologie s’inscrit au cœur de la transformation numérique de nos clients, nous savons que les individus sont au cœur du succès en affaires.\r\n\r\nLorsque vous rejoignez CGI, vous devenez un conseiller de confiance, collaborant avec vos collègues et clients pour proposer des idées exploitables qui produisent des résultats concrets et durables. Nous appelons nos employés \"membres\" parce qu’ils sont actionnaires et propriétaires de CGI. Ils ont du plaisir à travailler et à grandir ensemble pour bâtir une entreprise dont nous sommes fiers. C’est notre rêve depuis 1976. Il nous a menés là où nous sommes aujourd’hui – l’une des plus importantes entreprises indépendantes de conseil en technologie de l’information (TI) et en management au monde.\r\n\r\nChez CGI, nous reconnaissons la richesse que la diversité nous apporte. Nous aspirons à créer une culture à laquelle nous appartenons tous et collaborons avec nos clients pour créer des communautés plus inclusives. En tant qu’employeur qui prône l’égalité des chances pour tous, nous voulons donner à tous nos membres les moyens de réussir et de s’épanouir. Si vous avez besoin d’un accompagnement spécifique durant le processus de recrutement et d’intégration, veuillez nous en informer. Nous serons heureux de vous aider.\r\n\r\nPrêt à faire partie d’une entreprise qui est gage d’excellence? Rejoignez CGI – où vos idées et vos actions changent la donne.', 'Rabat-Sale', '2025-01-01 09:00:00'),
(2, 2, 'Technicien Support IT', 'CAPGEMENI', 'Poste a pourvoir dans une entreprise basee a Rabat', 'Rabat-Sale', '2025-01-02 10:00:00'),
(4, 2, 'Developpeur php', 'TGCC', 'developpeur php', 'Rabat-Sale', '2025-01-04 14:25:26'),
(6, 2, 'Developpeur .NET', 'TGCC', 'developpeur php', 'Rabat-Sale', '2025-01-04 14:25:26');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID_USER` int NOT NULL AUTO_INCREMENT,
  `NOM` varchar(30) NOT NULL,
  `PRENOM` varchar(30) NOT NULL,
  `EMAIL` varchar(56) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TYPE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_USER`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_USER`, `NOM`, `PRENOM`, `EMAIL`, `password`, `TYPE`) VALUES
(29, 'Lamkhalkhal', 'Hicham', 'hicham@gmail.com', '$2y$12$HgJc5cqV.LEw21nn8OeOy.ippkoobTxWXG.xnREhKzhkoDzD9k4wq', 'candidat'),
(2, 'AZZIOUI', 'Zakaria', 'zakaria@gmail.com', '123', 'recruteur'),
(27, 'Azzioui', 'Zakaria', 'azz@gmail.com', '$2y$12$xOrz26wte8sFJ4NxzG5gG.P.z9aFgQGsLkCR/Fx2cBdsIfVs.sVU2', 'recruteur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
