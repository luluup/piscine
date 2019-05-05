-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mai 2019 à 09:45
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `motdepasse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `email`, `motdepasse`) VALUES
(1, 'adminsecret@gmail.com', 'adminsecret');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8mb4_unicode_ci,
  `motdepasse` text COLLATE utf8mb4_unicode_ci,
  `nom` text COLLATE utf8mb4_unicode_ci,
  `prenom` text COLLATE utf8mb4_unicode_ci,
  `adressel1` text COLLATE utf8mb4_unicode_ci,
  `adressel2` text COLLATE utf8mb4_unicode_ci,
  `ville` text COLLATE utf8mb4_unicode_ci,
  `codepostal` double DEFAULT NULL,
  `pays` text COLLATE utf8mb4_unicode_ci,
  `numero` double DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `numcarte` double DEFAULT NULL,
  `nomcarte` text COLLATE utf8mb4_unicode_ci,
  `dateexpi` date DEFAULT NULL,
  `clesecu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `email`, `motdepasse`, `nom`, `prenom`, `adressel1`, `adressel2`, `ville`, `codepostal`, `pays`, `numero`, `type`, `numcarte`, `nomcarte`, `dateexpi`, `clesecu`) VALUES
(1, 'lulu@gmail.com', 'uiui', 'Lulu', 'Lucie', '12 Avenue', 'ss', '2', 92130, 'france', 2373636633, 2, NULL, NULL, '2019-05-03', 222),
(2, 'yuyu@gmail.com', 'yuyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'jeje@gmail.com', 'ad930d57ccd78b88bf3d2ef72d416fc146e98154', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'rara@gmail.com', '3334c9c5f5f1bca4e8c9115b17d14ec47f3c0ccf', 'lululu', NULL, NULL, 'ZZZZZZ', 'jj', NULL, 'FRANCE', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'lolo@gmail.com', '8aa40001b9b39cb257fe646a561a80840c806c55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'pipi@gmail.com', '7afeeac0445ee96ea7b04c5365228ffe9aaa6683', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'paul@gmail.com', 'a027184a55211cd23e3f3094f1fdc728df5e0500', 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'hu@gmail.com', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'fr@gmail.com', 'b858a87c07b04c4568f51b0dce655f78d73c02b3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'rt@gmail.com', '52c05351c1e024f822a0ec03b4a6cce073666ac8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'udhde@gmail.com', 'a06da92061caee5123836326175c65269b472cb2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'ree@gmail.com', '4e4f1e9d96e8a9bb08bcb07736e6e6d9c16c92ef', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'ty@gmail.com', '32ad247f77b8a066ef05467ce49a5a63e193c3a3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'rat@gmail.com', '359ce0caae50b7d35ab21e93589a87e806b536b9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'tz@gmail.com', '1412349a82c226a911210073a6d89e7328a5d261', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo1` text COLLATE utf8mb4_unicode_ci,
  `photo2` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  `prix` double DEFAULT NULL,
  `categorie` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`iditem`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`iditem`, `nom`, `photo1`, `photo2`, `description`, `video`, `prix`, `categorie`, `quantite`) VALUES
(1, 'lululu', 'hoh', 'yes.jpg', 'hjhjh', 'vidguitare.jpg', 100, 'jh', NULL),
(2, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'lululu', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Guitare', 'guitare.jpg', 'yes.jpg', 'Guitare neuve', 'vidguitare.jpg', 100, 'Musique', NULL),
(14, 'Guitare', 'guitare.jpg', 'yes.jpg', 'Guitare neuve', 'vidguitare.jpg', 100, 'Musique', NULL),
(15, 'Guitare', 'guitare.jpg', 'yes.jpg', 'Guitare neuve', 'vidguitare.jpg', 100, 'Musique', NULL),
(16, 'lululu', 'hoh', 'yes.jpg', 'hjhjh', 'vidguitare.jpg', 100, 'jh', NULL),
(17, 'lululu', 'hoh', 'yes.jpg', 'hjhjh', 'vidguitare.jpg', 100, 'jh', NULL),
(18, 'Carte', 'carte.jpg', 'cartef.jpg', 'carte', 'dkjhdz', 1000, 'Musique', NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Carte', 'carte.jpg', 'cartef.jpg', 'carte', 'dkjhdz', 1000, 'Musique', NULL),
(21, 'Carte', 'carte.jpg', 'cartef.jpg', 'carte', 'dkjhdz', 1000, 'Musique', 23),
(22, 'Carte', 'carte.jpg', 'cartef.jpg', 'carte', 'dkjhdz', 1000, 'Musique', 23),
(23, 'Carte', 'carte.jpg', 'cartef.jpg', 'carte', 'dkjhdz', 1000, 'Musique', 25);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `image-fond` text COLLATE utf8mb4_unicode_ci,
  `id-item1` int(50) DEFAULT NULL,
  `id-item2` int(50) DEFAULT NULL,
  `id-item3` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id`, `nom`, `pseudo`, `email`, `photo`, `image-fond`, `id-item1`, `id-item2`, `id-item3`) VALUES
(1, 'theo', 'toto', 'toto@gmail.com', '', '', 1, NULL, NULL),
(2, 'PAPOU', 'doudinou', 'doudou@gmail.com', NULL, NULL, NULL, NULL, NULL),
(3, 'popo', 'poop', 'popo@gmail.com', 'homme.jpg', 'chevre.mp4', NULL, NULL, NULL),
(7, 'lagertha', 'lala', 'lala@gmail.com', 'femme.jpg', 'homme.jpg', 21, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
