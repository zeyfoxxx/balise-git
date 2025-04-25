-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Hôte : db5017496193.hosting-data.io
-- Généré le : ven. 25 avr. 2025 à 12:23
-- Version du serveur : 10.11.7-MariaDB-log
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs14030897`
--

-- --------------------------------------------------------

--
-- Structure de la table `batterie`
--

CREATE TABLE `batterie` (
  `id` int(10) NOT NULL,
  `tension` int(3) NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `batterie`
--

INSERT INTO `batterie` (`id`, `tension`, `heure`) VALUES
(79, 4, '09:06:12'),
(80, 3, '09:09:12'),
(81, 5, '09:12:12'),
(82, 1, '09:15:12'),
(83, 4, '09:18:12'),
(84, 3, '09:21:12'),
(85, 2, '09:24:12'),
(86, 2, '09:27:12'),
(87, 5, '09:30:12'),
(88, 2, '09:33:12'),
(89, 2, '09:36:12'),
(90, 4, '09:39:12'),
(91, 1, '09:42:12'),
(92, 4, '09:45:12');

-- --------------------------------------------------------

--
-- Structure de la table `humiditer`
--

CREATE TABLE `humiditer` (
  `id` int(11) NOT NULL,
  `temps` time DEFAULT NULL,
  `humidite` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `humiditer`
--

INSERT INTO `humiditer` (`id`, `temps`, `humidite`) VALUES
(71, '09:06:12', 19),
(72, '09:09:12', 20),
(73, '09:12:12', 20),
(74, '09:15:12', 20),
(75, '09:18:12', 20),
(76, '09:21:12', 19),
(77, '09:24:12', 19),
(78, '09:27:12', 19),
(79, '09:30:12', 19),
(80, '09:33:12', 19),
(81, '09:36:12', 20),
(82, '09:39:12', 20),
(83, '09:42:12', 20),
(84, '09:45:12', 20);

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

CREATE TABLE `mesures` (
  `id_mes` int(11) NOT NULL,
  `temperature` int(3) DEFAULT NULL,
  `humidite` int(3) DEFAULT NULL,
  `nomCapteur` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `temperature`
--

CREATE TABLE `temperature` (
  `temperature` int(50) DEFAULT NULL,
  `temps` time DEFAULT NULL,
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `temperature`
--

INSERT INTO `temperature` (`temperature`, `temps`, `id`) VALUES
(21, '09:06:12', 126),
(20, '09:09:12', 127),
(20, '09:12:12', 128),
(20, '09:15:12', 129),
(20, '09:18:12', 130),
(21, '09:21:12', 131),
(21, '09:24:12', 132),
(21, '09:27:12', 133),
(21, '09:30:12', 134),
(21, '09:33:12', 135),
(20, '09:36:12', 136),
(20, '09:39:12', 137),
(20, '09:42:12', 138),
(20, '09:45:12', 139);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `batterie`
--
ALTER TABLE `batterie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `humiditer`
--
ALTER TABLE `humiditer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD PRIMARY KEY (`id_mes`);

--
-- Index pour la table `temperature`
--
ALTER TABLE `temperature`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `batterie`
--
ALTER TABLE `batterie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pour la table `humiditer`
--
ALTER TABLE `humiditer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `mesures`
--
ALTER TABLE `mesures`
  MODIFY `id_mes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `temperature`
--
ALTER TABLE `temperature`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
