-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 13 nov. 2022 à 17:42
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `maboutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(3, 'Cuisine'),
(2, 'Loisir'),
(4, 'Mobilier'),
(1, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `quantite`, `prix`, `categorie`) VALUES
(3, 'fourchette', 'fourchette en inox', 3, 5, 3),
(4, 'Couteau', 'couteau en inox', 30, 8, 3),
(5, 'Cuillere', 'cuillere en inox', 31, 3, 3),
(6, 'Table', 'Table en bois', 5, 250, 4),
(7, 'CanapÃ©', 'CanapÃ© large', 10, 1000, 4),
(8, 'Raquette Ping-pong', 'Raquette', 25, 15, 1),
(9, 'Battons de marche', 'Batton de marche en alluminium', 20, 35, 1),
(10, 'Console PS5', 'Console new gen PS5', 1, 800, 2),
(11, 'jeux de carte', 'Jeux de 52 cartes classique', 14, 10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `mail`, `mdp`, `statut`) VALUES
(2, 'admin', 'admin@admin.fr', '$2y$10$lhPdg5Tz5/.Alhj00yJ.EOsScJaU1fXplwMWD/VN2ZgQ1EVBPFZeG', 1),
(3, 'david', 'david.c@ecole.com', '$2y$10$Ixdwhra97LQLqln9uRRsaunSlfYtNHPVXGnaAhnNAfztENGqXou0O', 1),
(7, 'jinx', 'jinx@lol.fr', '$2y$10$tI3u7.Wo68GJy9OvaEpORuOFoNM1rioM.uKejhsE1c2cb.bG8xBCi', 0),
(5, 'Jax', 'Jax.jaximus@lol.fr', '$2y$10$Fn2XIXXK/M312ZGpCIbpe.Ckgt.u0cSAxttY0XPJueW57priFZOSm', 0),
(6, 'teemo', 'teemo.ahah@lol.fr', '$2y$10$urXrHKHREaPoQBqelPH8Uuqx36LgFroZxgfvAB7YSSBDL/Vi9cA06', 0),
(9, 'moi', 'moi.moi@free.fr', '$2y$10$lhPdg5Tz5/.Alhj00yJ.EOsScJaU1fXplwMWD/VN2ZgQ1EVBPFZeG', 0),
(10, 'Test final', 'test@test.fr', '$2y$10$Qd1lwpBLgAbjOOlenAFvn.Xhw4ZoU8F60zLcjePTjqsWRsoxFXLyS', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
