-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 20 déc. 2018 à 03:36
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `auteur`, `titre`, `texte`, `date`) VALUES
(100, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123A', 'edit : 21-11-2018 '),
(156, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123B', 'edit : 21-11-2018 '),
(163, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123C', 'edit : 21-11-2018 '),
(164, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123D', 'edit : 21-11-2018 '),
(165, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123FDDD', 'Ã©ditÃ© le : 20-12-2018'),
(166, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123G123QSDSQD\"Ã©eeÃ©\",,', 'Ã©ditÃ© le : 20-12-2018'),
(177, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123A', 'edit : 21-11-2018 '),
(178, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123B', 'edit : 21-11-2018 '),
(179, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123C', 'edit : 21-11-2018 '),
(180, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123D', 'edit : 21-11-2018 '),
(181, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123FDDD', 'Ã©ditÃ© le : 20-12-2018'),
(182, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123G123QSDSQD\"Ã©eeÃ©\",,', 'Ã©ditÃ© le : 20-12-2018'),
(183, 'qd', 'qdqcdq', 'qsdcqs', '20-12-2018'),
(184, 'sqfb', 'qsbdfqsbfqs', 'qsbfqb', '20-12-2018'),
(185, 'qsdf', 'qsdfqfq', 'fsfq', '20-12-2018'),
(186, 'QSBDF', 'QBS', 'QBSDB', '20-12-2018'),
(187, 'qsvd', 'qvdsqvds', 'qsvdv', '20-12-2018'),
(188, 'sqfb', 'qsdbfqb', 'qsbd', '20-12-2018'),
(189, 'qsb', 'qsbdqbs', 'qbsqsb', '20-12-2018'),
(190, 'QBS', 'QBSF', 'QSBQB', '20-12-2018'),
(191, 'sqbf', 'sbqfs', 'dbqb', '20-12-2018'),
(192, 'qsf', 'qsdf', 'qsfq', '20-12-2018'),
(193, 'qdfs', 'qsfdf', 'ff', '20-12-2018'),
(194, 'qdgsf', 'gqs', 'gqsdgs', '20-12-2018'),
(195, 'qsdf', 'fqs', 'fqfqsd', '20-12-2018'),
(196, 'qg', 'gdg', 'gdf', '20-12-2018'),
(197, 'qsdf', 'qsfdqfs', 'f', '20-12-2018'),
(198, 'qsfbd', 'sqbf', 'qsdfbqb', '20-12-2018'),
(199, 'qsf', 'qsb', 'qbsd', '20-12-2018'),
(200, 'fqb', 'qs', 'qsb', '20-12-2018'),
(201, 'qsfb', 'qsdf', 'qsb', '20-12-2018'),
(202, 'qsdb', 'fqsfbqsb', 'qb', '20-12-2018'),
(203, 'qdsf', 'qsdfb', 'qbsd', '20-12-2018'),
(204, 'qsdfb', 'qsdb', 'qsb', '20-12-2018'),
(205, 'HELLO ', 'HELLO', '123123', '20-12-2018'),
(206, 'qfds', 'qsbdf', 'qdsbf12333', 'Ã©ditÃ© le : 20-12-2018'),
(207, 'vqv', 'dqsd', 'dv', '20-12-2018');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` mediumtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_article` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `pseudo`, `email`, `texte`, `date`, `id_article`) VALUES
(112, 'testnom', 'testemail@gmail.com', 'Le commentaire prÃ©sent est un test', '22-11-2018', 0),
(111, 'oui', 'darkarrow@gmail.com', 'Le texte est bien lÃ  !', '22-11-2018', 0),
(113, 'azeze', 'test@gmail.com', 'test12322', '29-11-2018', 0),
(114, 'azeze', 'test@gmail.com', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '29-11-2018', 0),
(116, 'AAAA', 'lol@gmail.com', '1233', '04-12-2018', NULL),
(117, '12333', 'XDDD@GMAIL.OCM', 'TEST123', '04-12-2018', NULL),
(118, '123', 'oe@gmail.com', 'AZEAZE', '04-12-2018', NULL),
(119, '&Ã©\"', 'test@gmail.com', '123123', '05-12-2018', NULL),
(120, '123', 'test@gmail.com', 'loool', '05-12-2018', 113),
(121, 'DarkArrow', 'lol@gmail.com', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '05-12-2018', 113),
(122, 'TESTCOMM', 'roger@gmail.com', 'XDDDD', '05-12-2018', 112),
(131, 'wow salut', 'lol@gmail.com', 'commm', '06-12-2018', 116),
(130, 'Djdj Alpho', 'jdfj@x.fr', 'Kddkdj', '05-12-2018', 119),
(129, 'test123', 'oeo@gmail.com', 'areazeraz', '05-12-2018', 113),
(128, 'test', 'vericase@gmail.com', '12', '05-12-2018', 113),
(132, 'test', 'lol@gmail.com', 'oo', '06-12-2018', 116),
(133, 'a', 'aa@gmail.com', 'test', '14-12-2018', 100),
(134, '123', 'test2@gmail.com', 'aAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAAaAaaAAA', '14-12-2018', 100),
(135, 'DQ', 'test@gmail.com', '123123333333333333333', '14-12-2018', 132),
(136, 'ECECAZC', 'LOL@gmail.com', 'AZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZEAZE', '14-12-2018', 132),
(137, 'cqc', 'TEST@gmail.com', '123', '14-12-2018', 132),
(138, 'TEST1234', 'LOL@gmail.com', 'OK\'\',\'\',\';;\';\'\'', '14-12-2018', 133),
(139, 'frabrice', 'henrylacroute@gmail.com', 'SALUT:))', '18-12-2018', 133),
(140, 'VQSV', 'lol@test', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '18-12-2018', 136),
(141, 'ALLO', 'TEST@GMAIL.COM', '123123123213123211231231232131232112312312321312321123123123213123211231231232131232112312312321312321123123123213123211231231232131232112312312321312321123123123213123211231231232131232112312312321312321123123123213123211231231232131232112312312321312321123123123213123211231231232131232112312312321312321123123123213123211231231232131232112312312321312321123123123213123211231231232131232112312312321312321', '20-12-2018', 185),
(142, 'TEST123', 'LOL@GMAIL.COM', '1123123123123123333333333333333', '20-12-2018', 165);

-- --------------------------------------------------------

--
-- Structure de la table `identifiants`
--

DROP TABLE IF EXISTS `identifiants`;
CREATE TABLE IF NOT EXISTS `identifiants` (
  `login` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autorisation` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `identifiants`
--

INSERT INTO `identifiants` (`login`, `mdp`, `autorisation`) VALUES
('root', 'root', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
