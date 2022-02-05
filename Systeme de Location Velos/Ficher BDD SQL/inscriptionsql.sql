-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 27 avr. 2020 à 16:42
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `haidara`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscriptionsql`
--

CREATE TABLE `inscriptionsql` (
  `id` int(11) NOT NULL,
  `Username` varchar(55) NOT NULL,
  `Password` varchar(55) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(45) NOT NULL,
  `IP` varchar(41) NOT NULL,
  `Code` text NOT NULL,
  `abd` text NOT NULL,
  `prix` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MdpProvisoire` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `inscriptionsql`
--
ALTER TABLE `inscriptionsql`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inscriptionsql`
--
ALTER TABLE `inscriptionsql`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
