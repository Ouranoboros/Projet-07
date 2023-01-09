-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 08 jan. 2023 à 20:10
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
-- Base de données : `php_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'PHP'),
(2, 'Python'),
(3, 'CSS'),
(4, 'Autres'),
(5, 'MySql');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `subject`, `email`, `message`, `status`, `date`) VALUES
(9, 'Fournier Ludovic', 'Envoie de pièces Fournier Ludovic', 'fournierl.pro@gmail.com', 'azerty', 0, '2023-01-07 23:21:43');

-- --------------------------------------------------------

--
-- Structure de la table `footer`
--

DROP TABLE IF EXISTS `footer`;
CREATE TABLE IF NOT EXISTS `footer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `copyright` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `footer`
--

INSERT INTO `footer` (`id`, `copyright`) VALUES
(1, 'Fournier Ludovic @ Tous droits réservés');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `category_id`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(23, 2, 'Python', 'Python est un langage de programmation interprété, de haut niveau et à usage général. Créé par Guido van Rossum et publié pour la première fois en 1991, la philosophie de conception de Python met l\'accent sur la lisibilité du code grâce à son utilisation notable d\'espaces blancs significatifs.Python est un langage de programmation interprété, de haut niveau et à usage général. Créé par Guido van Rossum et publié pour la première fois en 1991, la philosophie de conception de Python met l\'accent sur la lisibilité du code grâce à son utilisation notable d\'espaces blancs significatifs.Python est un langage de programmation interprété, de haut niveau et à usage général. Créé par Guido van Rossum et publié pour la première fois en 1991, la philosophie de conception de Python met l\'accent sur la lisibilité du code grâce à son utilisation notable d\'espaces blancs significatifs.Python est un langage de programmation interprété, de haut niveau et à usage général. Créé par Guido van Rossum et publié pour la première fois en 1991, la philosophie de conception de Python met l\'accent sur la lisibilité du code grâce à son utilisation notable d\'espaces blancs significatifs.Python est un langage de programmation interprété, de haut niveau et à usage général. Créé par Guido van Rossum et publié pour la première fois en 1991, la philosophie de conception de Python met l\'accent sur la lisibilité du code grâce à son utilisation notable d\'espaces blancs significatifs.Python est un langage de programmation interprété, de haut niveau et à usage général. Créée par Guido van Rossum et publiée pour la première fois en 1991, la philosophie de conception de Python met l\'accent sur la lisibilité du code avec son utilisation notable d\'espaces blancs significatifs.', 'uploads/865b5d1a3f.jpg', 'Fournier Ludovic', 'Python', '2023-01-07 22:56:58');

-- --------------------------------------------------------

--
-- Structure de la table `social`
--

DROP TABLE IF EXISTS `social`;
CREATE TABLE IF NOT EXISTS `social` (
  `id` int NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `social`
--

INSERT INTO `social` (`id`, `facebook`, `github`, `skype`, `linkedin`, `google`) VALUES
(1, 'https://www.facebook.com/', 'https://github.com', 'https://www.skype.com/', 'https://www.linkedin.com', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Structure de la table `title`
--

DROP TABLE IF EXISTS `title`;
CREATE TABLE IF NOT EXISTS `title` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `title`
--

INSERT INTO `title` (`id`, `title`, `logo`) VALUES
(1, 'Site Blog', 'uploads/logo.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
