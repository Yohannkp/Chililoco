-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 03 mai 2022 à 17:01
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chililoco`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions_infos`
--

CREATE TABLE `actions_infos` (
  `id` int(11) NOT NULL,
  `creer_par` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creer_le` date NOT NULL,
  `modifier_par` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modifier_le` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable` tinyint(1) NOT NULL,
  `dtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `actions_infos`
--

INSERT INTO `actions_infos` (`id`, `creer_par`, `creer_le`, `modifier_par`, `modifier_le`, `enable`, `dtype`) VALUES
(1, 'YohanMajoie', '2022-05-03', NULL, NULL, 1, 'admin'),
(2, 'YohanMajoie', '2022-05-03', NULL, NULL, 1, 'responsable'),
(3, 'majoie', '2022-05-03', NULL, NULL, 1, 'categorie'),
(4, 'majoie', '2022-05-03', NULL, NULL, 1, 'categorie'),
(5, 'majoie', '2022-05-03', NULL, NULL, 1, 'categorie'),
(6, 'majoie', '2022-05-03', NULL, NULL, 1, 'categorie'),
(7, 'majoie', '2022-05-03', NULL, NULL, 1, 'plat'),
(8, 'majoie', '2022-05-03', NULL, NULL, 1, 'plat'),
(9, 'majoie', '2022-05-03', NULL, NULL, 1, 'categorie'),
(10, 'majoie', '2022-05-03', NULL, NULL, 1, 'plat');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(3, 'Burger'),
(4, 'Pizza'),
(5, 'Pasta'),
(6, 'Fries'),
(9, 'burger');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220502225946', '2022-05-03 00:59:51', 1692);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `email`, `telephone`, `mot_de_passe`, `roles`, `username`, `image`) VALUES
(1, 'FAYA', 'lidao', 'majoiefaya@gmail.com', 96329943, '$2y$13$XClUWdbl91nCdYGvRr727uxaofbrCJ14nsFfGZ.t9s1Pk0AEXFF9u', '[\"ROLE_ADMIN\"]', 'majoie', 'istockphoto-881484526-1024x1024.jpg'),
(2, 'LANGUIE', 'Mansama', 'Mansama@gmail.com', 90126888, '$2y$13$wCEMM1gG30RMsgC.cQ7EYun0f93MNaJe7Ec8l/2hGtIlsqg6v5DGu', '[\"ROLE_RESPONSABLE\"]', 'LANGJO', 'DEVELOPPEMENT WEB.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `personne_id` int(11) DEFAULT NULL,
  `categorie_plat_id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `personne_id`, `categorie_plat_id`, `libelle`, `image`, `prix`, `description`, `categorie`, `statut`) VALUES
(7, NULL, 4, 'Burger', 'sliced-fruits-on-tray-1132047.jpg', 15000, 'cc', '3', 1),
(8, NULL, 3, 'Burger', 'i26162-salade-de-fruits-d-ete-facile.jpg', 15000, 'sdfghjkl', '3', 1),
(10, NULL, 9, 'nouriture', 'i127250-salade-de-fruits-des-iles-au-rhum.jpeg', 15000, 'dfghjk', '9', 1);

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `id` int(11) NOT NULL,
  `fonction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`id`, `fonction`) VALUES
(2, 'RESPONSABLE');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actions_infos`
--
ALTER TABLE `actions_infos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2038A207A21BD112` (`personne_id`),
  ADD KEY `IDX_2038A20788BE1BC2` (`categorie_plat_id`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actions_infos`
--
ALTER TABLE `actions_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_880E0D76BF396750` FOREIGN KEY (`id`) REFERENCES `actions_infos` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `FK_497DD634BF396750` FOREIGN KEY (`id`) REFERENCES `actions_infos` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `FK_FCEC9EFBF396750` FOREIGN KEY (`id`) REFERENCES `actions_infos` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `FK_2038A20788BE1BC2` FOREIGN KEY (`categorie_plat_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `FK_2038A207A21BD112` FOREIGN KEY (`personne_id`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `FK_2038A207BF396750` FOREIGN KEY (`id`) REFERENCES `actions_infos` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `FK_52520D07BF396750` FOREIGN KEY (`id`) REFERENCES `actions_infos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
