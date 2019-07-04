-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 05 juil. 2019 à 00:53
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `inventaire_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `MATERIEL_REFERENCE` int(11) NOT NULL,
  `UTILISATEUR_FINAL` char(32) DEFAULT NULL,
  `ADRESSE_IP` char(32) DEFAULT NULL,
  `COMMENTAIRE` char(32) DEFAULT NULL,
  `REFORME` tinyint(1) DEFAULT NULL,
  `SURVEILLANCE` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`MATERIEL_REFERENCE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`MATERIEL_REFERENCE`, `UTILISATEUR_FINAL`, `ADRESSE_IP`, `COMMENTAIRE`, `REFORME`, `SURVEILLANCE`) VALUES
(1, 'David', '192.168.1.12', 'Très bien', 0, 1),
(2, 'Jean', '192.168.1.150', NULL, 0, 1),
(3, 'Marie', '192.168.1.20', NULL, 1, 1),
(4, 'Pascal', '127.0.0.1', NULL, 0, 1),
(5, 'Sebastien', '8.8.8.8', NULL, 0, 1),
(6, 'Dupont', '8.8.2.2', 'Avec un T', 0, 1),
(7, 'Dupond', '8.8.4.4', 'Avec un D', 0, 1),
(8, 'Allan', '95.123.52.20', NULL, 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
