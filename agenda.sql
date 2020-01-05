-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 13 déc. 2019 à 12:41
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agenda`
--

-- --------------------------------------------------------

--
-- Structure de la table `actionafaire`
--

DROP TABLE IF EXISTS `actionafaire`;
CREATE TABLE IF NOT EXISTS `actionafaire` (
  `IDACTION` bigint(4) NOT NULL,
  `IDCOMPTE` char(32) NOT NULL,
  `IDCOMPTE_CONCERNE` char(32) NOT NULL,
  `LIBELLE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDACTION`),
  KEY `I_FK_ACTION_COMPTE` (`IDCOMPTE`),
  KEY `I_FK_ACTION_COMPTE_2` (`IDCOMPTE_CONCERNE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `actionafaire`
--

INSERT INTO `actionafaire` (`IDACTION`, `IDCOMPTE`, `IDCOMPTE_CONCERNE`, `LIBELLE`) VALUES
(1, '2', '3', 'Peinture'),
(2, '2', '3', 'Plomberie');

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

DROP TABLE IF EXISTS `annee`;
CREATE TABLE IF NOT EXISTS `annee` (
  `IDANNEE` int(2) NOT NULL,
  PRIMARY KEY (`IDANNEE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annee`
--

INSERT INTO `annee` (`IDANNEE`) VALUES
(2019),
(2020);

-- --------------------------------------------------------

--
-- Structure de la table `caroussel`
--

DROP TABLE IF EXISTS `caroussel`;
CREATE TABLE IF NOT EXISTS `caroussel` (
  `ID` int(2) NOT NULL,
  `IMG` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `caroussel`
--

INSERT INTO `caroussel` (`ID`, `IMG`) VALUES
(1, 'caroussel1'),
(2, 'caroussel2'),
(3, 'caroussel3');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `IDCOMPTE` char(32) NOT NULL,
  `IDENTREPRISE` bigint(4) NOT NULL,
  `NOM` varchar(255) DEFAULT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `PSEUDO` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `MDP` char(255) DEFAULT NULL,
  `FONCTION` varchar(255) DEFAULT NULL,
  `ADMINISTRATEUR` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDCOMPTE`),
  KEY `I_FK_COMPTE_ENTREPRISE` (`IDENTREPRISE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`IDCOMPTE`, `IDENTREPRISE`, `NOM`, `PRENOM`, `PSEUDO`, `EMAIL`, `MDP`, `FONCTION`, `ADMINISTRATEUR`) VALUES
('2', 1, 'THALAMAS', 'YVAN', 'Worgueno', 'yvan0329@orange.fr', 'f71dbe52628a3f83a77ab494817525c6', 'Gerant', 0),
('3', 1, 'BIELAWA--RIGAUD', 'DYLAN', 'dylanbr43', 'dydy43@gmail.com', 'f71dbe52628a3f83a77ab494817525c6', 'Salarie', 0),
('1', 0, 'ADMIN', 'ADMIN', 'ADMIN', 'admin@admin.fr', 'f71dbe52628a3f83a77ab494817525c6', 'Administrateur', 1),
('4', 1, 'BLANCHEFORT', 'GUILLAUME', 'Guilenon', 'guigui43@gmail.fr', '49d02d55ad10973b7b9d0dc9eba7fdf0', 'Salarie', 0),
('5', 2, 'MAGNERE', 'GAEL', 'Asgurde', 'gael@magnere.fr', 'f71dbe52628a3f83a77ab494817525c6', 'Gerant', 0),
('6', 2, 'RUZZA', 'VALENTIN', 'Valou', 'valou@aurec.fr', '8dbc0a3d3150af94a0ecd0a61d26db79', 'Salarie', 0),
('7', 2, 'LEBRE', 'Armant', 'Arno', 'arno@jacky.fr', 'f71dbe52628a3f83a77ab494817525c6', 'Salarie', 0);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `IDENTREPRISE` bigint(4) NOT NULL,
  `NOME` char(32) DEFAULT NULL,
  `ADRESSE` char(32) DEFAULT NULL,
  `CP` bigint(4) DEFAULT NULL,
  `VILLE` char(32) DEFAULT NULL,
  `PAYS` char(32) DEFAULT NULL,
  PRIMARY KEY (`IDENTREPRISE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`IDENTREPRISE`, `NOME`, `ADRESSE`, `CP`, `VILLE`, `PAYS`) VALUES
(1, 'BROC', '3 rue du pont de la chartreuse', 43700, 'BRIVES-CHARENSAC', 'FRANCE'),
(2, 'Agenda', '43 rue des fleurs', 43800, 'Brioude', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `heure`
--

DROP TABLE IF EXISTS `heure`;
CREATE TABLE IF NOT EXISTS `heure` (
  `IDHEURE` int(2) NOT NULL,
  PRIMARY KEY (`IDHEURE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `heure`
--

INSERT INTO `heure` (`IDHEURE`) VALUES
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18);

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

DROP TABLE IF EXISTS `jour`;
CREATE TABLE IF NOT EXISTS `jour` (
  `IDSEMAINE` int(2) NOT NULL,
  `IDJOURSEMAINE` int(2) NOT NULL,
  `IDANNEE` int(2) NOT NULL,
  `DATEEXACT` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDSEMAINE`,`IDJOURSEMAINE`,`IDANNEE`),
  KEY `I_FK_JOUR_ANNEE` (`IDANNEE`),
  KEY `I_FK_JOUR_JOURSEMAINE` (`IDJOURSEMAINE`),
  KEY `I_FK_JOUR_SEMAINE` (`IDSEMAINE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jour`
--

INSERT INTO `jour` (`IDSEMAINE`, `IDJOURSEMAINE`, `IDANNEE`, `DATEEXACT`) VALUES
(47, 4, 2019, '2019-11-21');

-- --------------------------------------------------------

--
-- Structure de la table `joursemaine`
--

DROP TABLE IF EXISTS `joursemaine`;
CREATE TABLE IF NOT EXISTS `joursemaine` (
  `IDJOURSEMAINE` int(2) NOT NULL,
  PRIMARY KEY (`IDJOURSEMAINE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joursemaine`
--

INSERT INTO `joursemaine` (`IDJOURSEMAINE`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Structure de la table `jtableau`
--

DROP TABLE IF EXISTS `jtableau`;
CREATE TABLE IF NOT EXISTS `jtableau` (
  `ID` int(11) NOT NULL,
  `JTABLEAU` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jtableau`
--

INSERT INTO `jtableau` (`ID`, `JTABLEAU`) VALUES
(1, 'Lundi'),
(2, 'Mardi'),
(3, 'Mercredi'),
(4, 'Jeudi'),
(5, 'Vendredi'),
(6, 'Samedi'),
(7, 'Dimanche');

-- --------------------------------------------------------

--
-- Structure de la table `ligneagenda`
--

DROP TABLE IF EXISTS `ligneagenda`;
CREATE TABLE IF NOT EXISTS `ligneagenda` (
  `IDSEMAINE` int(2) NOT NULL,
  `IDJOURSEMAINE` int(2) NOT NULL,
  `IDANNEE` int(2) NOT NULL,
  `IDHEURE` int(2) NOT NULL,
  `IDACTION` bigint(4) DEFAULT NULL,
  PRIMARY KEY (`IDSEMAINE`,`IDJOURSEMAINE`,`IDANNEE`,`IDHEURE`),
  KEY `I_FK_LIGNEAGENDA_HEURE` (`IDHEURE`),
  KEY `I_FK_LIGNEAGENDA_JOUR` (`IDSEMAINE`,`IDJOURSEMAINE`,`IDANNEE`),
  KEY `I_FK_LIGNEAGENDA_ACTION` (`IDACTION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligneagenda`
--

INSERT INTO `ligneagenda` (`IDSEMAINE`, `IDJOURSEMAINE`, `IDANNEE`, `IDHEURE`, `IDACTION`) VALUES
(50, 5, 2019, 9, 1),
(50, 7, 2019, 18, 1),
(50, 1, 2019, 8, 2),
(52, 1, 2019, 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `semaine`
--

DROP TABLE IF EXISTS `semaine`;
CREATE TABLE IF NOT EXISTS `semaine` (
  `IDSEMAINE` int(2) NOT NULL,
  PRIMARY KEY (`IDSEMAINE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `semaine`
--

INSERT INTO `semaine` (`IDSEMAINE`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
