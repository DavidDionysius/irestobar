-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 mai 2025 à 15:01
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_irestobar_2.0`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_par_point_vente`
--

DROP TABLE IF EXISTS `admin_par_point_vente`;
CREATE TABLE IF NOT EXISTS `admin_par_point_vente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_point_de_vente` int NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `jour_naissance` int NOT NULL,
  `mois_naissance` varchar(20) NOT NULL,
  `annee_naissance` int NOT NULL,
  `nume_cin` varchar(20) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `nume_phone` varchar(50) NOT NULL,
  `mot_de_passe` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin_par_point_vente`
--

INSERT INTO `admin_par_point_vente` (`id`, `id_point_de_vente`, `prenom`, `nom`, `jour_naissance`, `mois_naissance`, `annee_naissance`, `nume_cin`, `adresse`, `nume_phone`, `mot_de_passe`) VALUES
(1, 4, 'Admin 1', '', 1, 'Janvier', 1989, '4015454545', 'Mangarano', '0326598744', '1234'),
(2, 4, 'Admin 2', 'Ratsiaraka', 6, 'Juillet', 2000, '2054844444', 'Fiofio', '0374455555', '1234'),
(3, 3, 'Admin 3', 'Inconnu', 8, 'Octobre', 1995, '4105656566', 'Ambohijafy', '0384556212', '1234'),
(4, 3, 'RAKOTO', 'ANDRY', 8, 'Mars', 1990, '1202154878', 'Mahajanga', '0384565478', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(200) NOT NULL,
  `id_categorie` int NOT NULL,
  `id_emballage` varchar(50) NOT NULL,
  `quantite_unites` varchar(250) NOT NULL COMMENT 'Nombres de l''unité dans l''emballage',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom_article`, `id_categorie`, `id_emballage`, `quantite_unites`) VALUES
(1, 'Cristalline', 1, '1,2', '1:10/7:6,/6:5/10:10'),
(2, 'Eau Vive', 1, '1', '/2:10/7:8'),
(3, 'Couches', 2, '3', '17:20/16:10'),
(4, 'Hina', 2, '3', '17:10/16:6');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categorie`) VALUES
(1, 'Boissons'),
(2, 'Produits généraux'),
(3, 'Quincaillerie');

-- --------------------------------------------------------

--
-- Structure de la table `emballage`
--

DROP TABLE IF EXISTS `emballage`;
CREATE TABLE IF NOT EXISTS `emballage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categorie` int NOT NULL,
  `nom_emballage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `emballage`
--

INSERT INTO `emballage` (`id`, `id_categorie`, `nom_emballage`) VALUES
(1, 1, 'Packe'),
(2, 1, 'Cageots'),
(3, 2, 'Packet'),
(5, 2, 'Bidon'),
(6, 3, 'Sac'),
(7, 3, 'Boîtes');

-- --------------------------------------------------------

--
-- Structure de la table `points_de_vente`
--

DROP TABLE IF EXISTS `points_de_vente`;
CREATE TABLE IF NOT EXISTS `points_de_vente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_point_de_vente` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `points_de_vente`
--

INSERT INTO `points_de_vente` (`id`, `nom_point_de_vente`) VALUES
(3, 'Fanjava'),
(4, 'Ambolomadinika'),
(12, 'Mahabibo'),
(9, 'Bord'),
(10, 'Teste'),
(11, 'Ambatolampy');

-- --------------------------------------------------------

--
-- Structure de la table `unite`
--

DROP TABLE IF EXISTS `unite`;
CREATE TABLE IF NOT EXISTS `unite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categorie` int NOT NULL,
  `id_emballage` int NOT NULL,
  `nom_unite` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `unite`
--

INSERT INTO `unite` (`id`, `id_categorie`, `id_emballage`, `nom_unite`) VALUES
(1, 1, 1, '1 litre'),
(2, 1, 1, '1.5 litre'),
(4, 1, 2, '2 l'),
(6, 1, 2, '2 littre'),
(7, 1, 1, '2 litre'),
(8, 1, 2, '3 l'),
(9, 1, 1, '10 l'),
(10, 1, 2, '400 cl'),
(17, 2, 3, 'pm'),
(16, 2, 3, 'gm'),
(13, 2, 4, '25 cl'),
(14, 2, 5, 'litre'),
(15, 2, 5, '3 litre');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
