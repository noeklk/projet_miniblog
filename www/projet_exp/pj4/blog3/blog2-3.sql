-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 22 nov. 2018 à 01:01
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
-- Base de données :  `blog2-3`
--
CREATE DATABASE IF NOT EXISTS `blog2-3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `blog2-3`;

-- --------------------------------------------------------

--
-- Structure de la table `blog2`
--

DROP TABLE IF EXISTS `blog2`;
CREATE TABLE IF NOT EXISTS `blog2` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `blog2`
--

INSERT INTO `blog2` (`id`, `auteur`, `titre`, `texte`, `date`) VALUES
(100, '$AUT_ROW', '$TIT_ROW', '$TXT_ROW123', 'edit : 21-11-2018 '),
(101, 'vvqsdqsv', 'vqsfqsfqsfvqs', 'sqdfqsdvdsqfvqsdf', '20-11-2018'),
(102, 'fqdsfvqsdfvqsdf', 'qdsvfdsqfvqdsv', 'VVVVVVVVVVVVVVVVV123AA1232', 'edit : 21-11-2018 '),
(103, 'jhjh', 'hgh', 'tyt123', 'edit : 21-11-2018 '),
(104, '&Ã©\"', '&Ã©\"', '2312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123', '21-11-2018');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
