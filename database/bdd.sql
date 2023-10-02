-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 26 sep. 2023 à 09:25
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lprs_mkn`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

DROP TABLE IF EXISTS `candidature`;
CREATE TABLE IF NOT EXISTS `candidature` (
  `ref_etudiant` int(11) NOT NULL,
  `ref_offre` int(11) NOT NULL,
  KEY `ref_etudiant` (`ref_etudiant`),
  KEY `ref_offre` (`ref_offre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `adresse` varchar(120) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `adresse`, `description`) VALUES
(1, 'Safran', 'rue du safran', 'Grosse entreprise avion');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine_etude` varchar(70) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `domaine_etude`) VALUES
(2, 'informatique');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `duree` int(11) NOT NULL,
  `ref_etudiant` int(11) NOT NULL,
  `ref_repentreprise` int(11) NOT NULL,
  `ref_salle` int(11) NOT NULL,
  `ref_admin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_admin` (`ref_admin`),
  KEY `ref_etudiant` (`ref_etudiant`),
  KEY `ref_repentreprise` (`ref_repentreprise`),
  KEY `ref_salle` (`ref_salle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `ref_etudiant` int(11) NOT NULL,
  `ref_evenement` int(11) NOT NULL,
  KEY `ref_etudiant` (`ref_etudiant`),
  KEY `ref_evenement` (`ref_evenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `ref_typeoffre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_typeoffre` (`ref_typeoffre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `ref_entreprise` int(11) NOT NULL,
  `ref_offre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_entreprise` (`ref_entreprise`),
  KEY `ref_offre` (`ref_offre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rep_entreprise`
--

DROP TABLE IF EXISTS `rep_entreprise`;
CREATE TABLE IF NOT EXISTS `rep_entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `ref_entreprise` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_entreprise` (`ref_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rep_entreprise`
--

INSERT INTO `rep_entreprise` (`id`, `role`, `ref_entreprise`) VALUES
(3, 'RH', 1);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `capacite` int(225) NOT NULL,
  `disponibilite` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_offre`
--

DROP TABLE IF EXISTS `type_offre`;
CREATE TABLE IF NOT EXISTS `type_offre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'a', 'a', 'a@a.a', 'a'),
(2, 'e', 'e', 'e@e.e', 'e'),
(3, 're', 're', 're@re.re', 're');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `candidature_ibfk_1` FOREIGN KEY (`ref_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `candidature_ibfk_2` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`ref_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `evenement_ibfk_2` FOREIGN KEY (`ref_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `evenement_ibfk_3` FOREIGN KEY (`ref_repentreprise`) REFERENCES `rep_entreprise` (`id`),
  ADD CONSTRAINT `evenement_ibfk_4` FOREIGN KEY (`ref_salle`) REFERENCES `salle` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`ref_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`ref_evenement`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`ref_typeoffre`) REFERENCES `type_offre` (`id`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`ref_entreprise`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `rdv_ibfk_2` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id`);

--
-- Contraintes pour la table `rep_entreprise`
--
ALTER TABLE `rep_entreprise`
  ADD CONSTRAINT `rep_entreprise_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `rep_entreprise_ibfk_2` FOREIGN KEY (`ref_entreprise`) REFERENCES `entreprise` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
