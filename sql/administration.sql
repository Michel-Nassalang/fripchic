-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 mai 2021 à 22:30
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site-e-commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `profil` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`id`, `nom`, `pseudo`, `email`, `pass`, `age`, `genre`, `date`, `profil`) VALUES
(1, 'michel-nassalang', 'Mikimike', 'nassalang.michel@ugb.edu.sn', '$2y$10$1d./svw.kaRS6oYtWG5lP.3l3s/tPZlYe.QhzS2Z.4DLGFEIzJ2pq', 22, 'Homme', '2021-04-11', ''),
(2, 'Anastasie Tatiana Nassalang', 'Anastasie', 'nassalang.michel@gmail.com', '$2y$10$2K5/P9FNlrzGcmQfZiQ6ReAOfpxIQxvHeLDlfjvxjV6RUozfpUaZm', 25, 'Femme', '2021-04-16', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
