-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 04 mai 2020 à 13:55
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lab_24_projet_pdcatracker_new`
--
CREATE DATABASE IF NOT EXISTS `lab_24_projet_pdcatracker_new` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lab_24_projet_pdcatracker_new`;

-- --------------------------------------------------------

--
-- Structure de la table `categories_production`
--

DROP TABLE IF EXISTS `categories_production`;
CREATE TABLE IF NOT EXISTS `categories_production` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date_ajout` datetime DEFAULT NULL,
  `id_pdca` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `commentaires_pdcas0_FK` (`id_pdca`),
  KEY `commentaires_users1_FK` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

DROP TABLE IF EXISTS `concerner`;
CREATE TABLE IF NOT EXISTS `concerner` (
  `id_unite` int(11) NOT NULL,
  `id_pdca` int(11) NOT NULL,
  PRIMARY KEY (`id_unite`,`id_pdca`),
  KEY `concerner_pdcas1_FK` (`id_pdca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `descriptions_pdcas`
--

DROP TABLE IF EXISTS `descriptions_pdcas`;
CREATE TABLE IF NOT EXISTS `descriptions_pdcas` (
  `id_description` int(11) NOT NULL AUTO_INCREMENT,
  `champ_qui` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_quoi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_quand` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_ou` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_pourquoi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_nb_defauts` int(11) DEFAULT NULL,
  `champ_protege` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `champ_cause` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `champ_reproductible` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_action_racine` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `champ_amelioration` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_date_redemarrage` datetime DEFAULT NULL,
  `champ_duree_arret` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_pilote` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_visa_superviseur` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_visa_resp_prod` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `champ_visa_directeur` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `id_pdca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_description`),
  UNIQUE KEY `descriptions_pdcas_pdcas0_AK` (`id_pdca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `description_8d`
--

DROP TABLE IF EXISTS `description_8d`;
CREATE TABLE IF NOT EXISTS `description_8d` (
  `id_description8d` int(11) NOT NULL AUTO_INCREMENT,
  `champ_datecreation` varchar(255) DEFAULT NULL,
  `champ_responsable` varchar(255) DEFAULT NULL,
  `champ_produit` varchar(255) DEFAULT NULL,
  `champ_refkoa` varchar(255) DEFAULT NULL,
  `champ_refclient` varchar(255) DEFAULT NULL,
  `champ_description` text,
  `champ_niv_incident` int(11) DEFAULT NULL,
  `champ_num_incident_koa` int(11) DEFAULT NULL,
  `champ_num_incident_client` int(11) DEFAULT NULL,
  `champ_site_client` varchar(255) DEFAULT NULL,
  `champ_quantite_nok` int(11) DEFAULT NULL,
  `champ_evenement` text,
  `champ_pourquoi` text,
  `champ_quand` text,
  `champ_qui` text,
  `champ_ou` text,
  `champ_comment` text,
  `champ_combien` text,
  `champ_difference` text,
  `champ_standard` text,
  `champ_quandproduite` text,
  `champ_quiproduite` text,
  `champ_autreprocess` text,
  `champ_arretdefaut` text,
  `champ_pbsimilaire` text,
  `champ_id_pdca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_description8d`),
  KEY `FK_description_8d_id_pdca` (`champ_id_pdca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `destiner`
--

DROP TABLE IF EXISTS `destiner`;
CREATE TABLE IF NOT EXISTS `destiner` (
  `id_pdca` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_pdca`,`id_user`),
  KEY `destiner_users1_FK` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `documents_8d`
--

DROP TABLE IF EXISTS `documents_8d`;
CREATE TABLE IF NOT EXISTS `documents_8d` (
  `id_document` int(11) NOT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `id_pdca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_document`),
  UNIQUE KEY `documents_8d_pdcas0_AK` (`id_pdca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fichiers`
--

DROP TABLE IF EXISTS `fichiers`;
CREATE TABLE IF NOT EXISTS `fichiers` (
  `id_fichier` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `id_pdca` int(11) DEFAULT NULL,
  `id_commentaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fichier`),
  KEY `fichiers_pdcas0_FK` (`id_pdca`),
  KEY `fichiers_commentaires1_FK` (`id_commentaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groupes_users`
--

DROP TABLE IF EXISTS `groupes_users`;
CREATE TABLE IF NOT EXISTS `groupes_users` (
  `id_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `autorisation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pdcas`
--

DROP TABLE IF EXISTS `pdcas`;
CREATE TABLE IF NOT EXISTS `pdcas` (
  `id_pdca` int(11) NOT NULL AUTO_INCREMENT,
  `date_envoi` datetime NOT NULL,
  `date_pdca` datetime DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `ref_produit` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL,
  `liste_unites` varchar(255) DEFAULT NULL,
  `liste_destinataires` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_description` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `id_document` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pdca`),
  UNIQUE KEY `pdcas_descriptions_pdcas0_AK` (`id_description`),
  KEY `pdcas_users0_FK` (`id_user`),
  KEY `pdcas_produits2_FK` (`id_produit`),
  KEY `id_document` (`id_document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `autorisation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `unites_production`
--

DROP TABLE IF EXISTS `unites_production`;
CREATE TABLE IF NOT EXISTS `unites_production` (
  `id_unite` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `etat` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_unite`),
  KEY `unites_production_categories_production0_FK` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `id_groupe` int(11) DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `users_groupes_users0_FK` (`id_groupe`),
  KEY `users_services1_FK` (`id_service`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_pdcas0_FK` FOREIGN KEY (`id_pdca`) REFERENCES `pdcas` (`id_pdca`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentaires_users1_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `concerner_pdcas1_FK` FOREIGN KEY (`id_pdca`) REFERENCES `pdcas` (`id_pdca`) ON DELETE CASCADE,
  ADD CONSTRAINT `concerner_unites_production0_FK` FOREIGN KEY (`id_unite`) REFERENCES `unites_production` (`id_unite`) ON DELETE CASCADE;

--
-- Contraintes pour la table `descriptions_pdcas`
--
ALTER TABLE `descriptions_pdcas`
  ADD CONSTRAINT `descriptions_pdcas_pdcas0_FK` FOREIGN KEY (`id_pdca`) REFERENCES `pdcas` (`id_pdca`) ON DELETE CASCADE;

--
-- Contraintes pour la table `description_8d`
--
ALTER TABLE `description_8d`
  ADD CONSTRAINT `description_8d_ibfk_1` FOREIGN KEY (`champ_id_pdca`) REFERENCES `pdcas` (`id_pdca`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `destiner`
--
ALTER TABLE `destiner`
  ADD CONSTRAINT `destiner_pdcas0_FK` FOREIGN KEY (`id_pdca`) REFERENCES `pdcas` (`id_pdca`) ON DELETE CASCADE,
  ADD CONSTRAINT `destiner_users1_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `documents_8d`
--
ALTER TABLE `documents_8d`
  ADD CONSTRAINT `documents_8d_pdcas0_FK` FOREIGN KEY (`id_pdca`) REFERENCES `pdcas` (`id_pdca`) ON DELETE CASCADE;

--
-- Contraintes pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD CONSTRAINT `fichiers_commentaires1_FK` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaires` (`id_commentaire`) ON DELETE CASCADE,
  ADD CONSTRAINT `fichiers_pdcas0_FK` FOREIGN KEY (`id_pdca`) REFERENCES `pdcas` (`id_pdca`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pdcas`
--
ALTER TABLE `pdcas`
  ADD CONSTRAINT `pdcas_descriptions_pdcas1_FK` FOREIGN KEY (`id_description`) REFERENCES `descriptions_pdcas` (`id_description`) ON DELETE SET NULL,
  ADD CONSTRAINT `pdcas_ibfk_1` FOREIGN KEY (`id_document`) REFERENCES `documents_8d` (`id_document`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pdcas_produits2_FK` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE SET NULL,
  ADD CONSTRAINT `pdcas_users0_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL;

--
-- Contraintes pour la table `unites_production`
--
ALTER TABLE `unites_production`
  ADD CONSTRAINT `unites_production_categories_production0_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categories_production` (`id_categorie`) ON DELETE SET NULL;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_groupes_users0_FK` FOREIGN KEY (`id_groupe`) REFERENCES `groupes_users` (`id_groupe`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_services1_FK` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
