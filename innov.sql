-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 16 oct. 2021 à 16:36
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `linkpme`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `ad_id` int(11) NOT NULL,
  `ad_nom` varchar(30) NOT NULL,
  `ad_mail` varchar(60) NOT NULL,
  `ad_mdp` varchar(100) NOT NULL,
  `ad_co` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Connecté ou pas ?',
  `ad_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`ad_id`, `ad_nom`, `ad_mail`, `ad_mdp`, `ad_co`, `ad_date`) VALUES
(4, 'test', 'test@test.com', '$2y$10$agV5eYG6aAVk14Z/Pz.rAOGCe3TxDXFu7dpCAidDWLNZhgSNx/daG', 0, '2021-05-07'),
(5, 'ABOUA Aka Vincent Raoul', 'vincentaboua@gmail.com', '$2y$10$qQwETGTfFchFfjk.Pnwv6.gEW2fG92t/1S3ar8tj/mVNdHc85Z8fq', 0, '2021-07-02'),
(6, 'Aissaoui Zineb ', 'z.aissaouipro@gmail.com', '$2y$10$Q74KjrbF.1C92gKwZ8.amutjja6pM33tibUTmhSQdGXgSi7i1OnWy', 0, '2021-07-02'),
(7, 'Ait laziz Yasser', 'yasser.aitlaziz@gmail.com', '$2y$10$fZ/7KbY35MnsDBfYAxlbCOkrmIGaChUrXGLwPSebrf.TNyd3Y2qGW', 1, '2021-10-16');

-- --------------------------------------------------------

--
-- Structure de la table `tab_formulaire`
--

CREATE TABLE `tab_formulaire` (
  `id_voie` varchar(10) CHARACTER SET swe7 NOT NULL,
  `etat_voie` varchar(30) CHARACTER SET swe7 NOT NULL,
  `type_protection` varchar(30) CHARACTER SET swe7 NOT NULL,
  `type_courant` varchar(30) CHARACTER SET swe7 NOT NULL,
  `coactivite_possible` varchar(30) CHARACTER SET swe7 NOT NULL,
  `operation` text CHARACTER SET swe7 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ad_id`);

--
-- Index pour la table `tab_formulaire`
--
ALTER TABLE `tab_formulaire`
  ADD PRIMARY KEY (`id_voie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
