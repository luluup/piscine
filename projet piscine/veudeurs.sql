-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 03 mai 2019 à 17:06
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
-- Base de données :  `veudeurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `motdepasse` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`email`, `motdepasse`) VALUES
('adminsecret@gmail.com', 'adminsecret');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `email` text COLLATE utf8mb4_unicode_ci,
  `motdepasse` text COLLATE utf8mb4_unicode_ci,
  `nom` text COLLATE utf8mb4_unicode_ci,
  `prenom` text COLLATE utf8mb4_unicode_ci,
  `adressel1` text COLLATE utf8mb4_unicode_ci,
  `adressel2` text COLLATE utf8mb4_unicode_ci,
  `ville` int(11) DEFAULT NULL,
  `codepostal` double DEFAULT NULL,
  `pays` text COLLATE utf8mb4_unicode_ci,
  `numero` double DEFAULT NULL,
  `nomcarte` text COLLATE utf8mb4_unicode_ci,
  `type` int(11) DEFAULT NULL,
  `dateexpi` date DEFAULT NULL,
  `clesecu` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`email`, `motdepasse`, `nom`, `prenom`, `adressel1`, `adressel2`, `ville`, `codepostal`, `pays`, `numero`, `nomcarte`, `type`, `dateexpi`, `clesecu`) VALUES
('lulu@gmail.com', 'uiui', 'Lulu', 'Lucie', '12 Avenue', 'ss', 2, 92130, 'france', 2373636633, 'lulu', 2, '2019-05-03', 222);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `iditem` double DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo1` text COLLATE utf8mb4_unicode_ci,
  `photo2` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  `prix` double DEFAULT NULL,
  `categorie` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`iditem`, `nom`, `photo1`, `photo2`, `description`, `video`, `prix`, `categorie`, `quantite`) VALUES
(NULL, 'lululu', 'hoh', 'yes.jpg', 'hjhjh', 'vidguitare.jpg', 100, 'jh', NULL),
(NULL, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 'Guitare', 'guitare.jpg', 'yes.jpg', 'Guitare neuve', 'vidguitare.jpg', 100, 'Musique', NULL),
(NULL, 'Guitare', 'guitare.jpg', 'yes.jpg', 'Guitare neuve', 'vidguitare.jpg', 100, 'Musique', NULL),
(NULL, 'Guitare', 'guitare.jpg', 'yes.jpg', 'Guitare neuve', 'vidguitare.jpg', 100, 'Musique', NULL),
(NULL, 'lululu', 'hoh', 'yes.jpg', 'hjhjh', 'vidguitare.jpg', 100, 'jh', NULL),
(3, 'lululu', 'hoh', 'yes.jpg', 'hjhjh', 'vidguitare.jpg', 100, 'jh', NULL),
(777, 'Carte', 'carte.jpg', 'cartef.jpg', 'carte', 'dkjhdz', 1000, 'Musique', NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(777, 'Carte', 'carte.jpg', 'cartef.jpg', 'carte', 'dkjhdz', 1000, 'Musique', NULL),
(777, 'Carte', 'carte.jpg', 'cartef.jpg', 'carte', 'dkjhdz', 1000, 'Musique', 23),
(777, 'Carte', 'carte.jpg', 'cartef.jpg', 'carte', 'dkjhdz', 1000, 'Musique', 23),
(777, 'Carte', 'carte.jpg', 'cartef.jpg', 'carte', 'dkjhdz', 1000, 'Musique', 25);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `codevendeur` int(50) DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `image-fond` text COLLATE utf8mb4_unicode_ci,
  `id-item1` int(50) DEFAULT NULL,
  `id-item2` int(50) DEFAULT NULL,
  `id-item3` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`codevendeur`, `nom`, `pseudo`, `email`, `photo`, `image-fond`, `id-item1`, `id-item2`, `id-item3`) VALUES
(1, 'theo', 'toto', 'toto@gmail.com', '', '', 1, NULL, NULL),
(5, 'PAPOU', 'doudinou', 'doudou@gmail.com', NULL, NULL, NULL, NULL, NULL),
(15, 'popo', 'poop', 'popo@gmail.com', 'homme.jpg', 'chevre.mp4', NULL, NULL, NULL),
(134, 'camel', 'yes', 'ouou', NULL, NULL, NULL, NULL, NULL),
(5, 'Via', 'vivite', 'vivi@gmail.com', NULL, NULL, NULL, NULL, NULL),
(24, 'PAPOU', 'pas', 'doudou@gmail.com', NULL, NULL, NULL, NULL, NULL),
(12, 'lagertha', 'lala', 'lala@gmail.com', 'femme.jpg', 'homme.jpg', 21, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
