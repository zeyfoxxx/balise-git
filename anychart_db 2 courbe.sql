-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 14 mars 2025 à 14:34
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `anychart_db`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `init` ()   BEGIN
    DECLARE user_exist, data_present INT;
    SET user_exist = (SELECT EXISTS (SELECT DISTINCT user FROM mysql.user WHERE user = "anychart_user"));
    IF user_exist = 0 THEN
      CREATE USER 'anychart_user'@'localhost' IDENTIFIED BY 'anychart_pass';
      GRANT ALL PRIVILEGES ON anychart_db.* TO 'anychart_user'@'localhost';
      FLUSH PRIVILEGES;
    END IF;
    CREATE TABLE IF NOT EXISTS fruits (
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(64),
      value INT
    );
    SET data_present = (SELECT COUNT(*) FROM fruits);
    IF data_present = 0 THEN
      INSERT INTO fruits (name, value) VALUES
        ('apples', 10),
        ('oranges', 20),
        ('bananas', 15),
        ('lemons', 5),
        ('pears', 3),
        ('apricots', 7),
        ('kiwis', 9),
        ('mangos', 12),
        ('figs', 4),
        ('limes', 8);
    END IF;
  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `courbe2`
--

CREATE TABLE `courbe2` (
  `temperature` int(50) DEFAULT NULL,
  `temps` int(50) DEFAULT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `courbe2`
--

INSERT INTO `courbe2` (`temperature`, `temps`, `id`) VALUES
(19, 27, 1),
(40, 2, 2),
(25, 15, 3),
(30, 60, 4),
(150, 40, 5);

-- --------------------------------------------------------

--
-- Structure de la table `fruits`
--

CREATE TABLE `fruits` (
  `id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fruits`
--

INSERT INTO `fruits` (`id`, `name`, `value`) VALUES
(1, 'apples', 10),
(2, 'oranges', 20),
(3, 'bananas', 15),
(4, 'lemons', 5),
(5, 'pears', 3),
(6, 'apricots', 7),
(7, 'kiwis', 9),
(8, 'mangos', 12),
(9, 'figs', 4),
(10, 'limes', 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
