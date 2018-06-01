-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 22 Février 2018 à 07:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `setramvip`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `IdAdresse` int(15) NOT NULL AUTO_INCREMENT,
  `Avenu` text NOT NULL,
  `NumParc` varchar(15) NOT NULL,
  `Commune` varchar(100) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `Ville` varchar(100) NOT NULL,
  `IdProvince` int(11) NOT NULL,
  PRIMARY KEY (`IdAdresse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`IdAdresse`, `Avenu`, `NumParc`, `Commune`, `IdClient`, `Ville`, `IdProvince`) VALUES
(1, 'Maolo', '12', 'Benga', 1, '', 0),
(2, 'Opala', '40', 'Zonto', 14, 'Bolwa', 0),
(3, 'Opala', '40', 'Zonto', 15, 'Bolwa', 1),
(4, 'blomo', '12', 'Rolafa', 16, 'osa', 0),
(5, 'blomo', '12', 'Rolafa', 17, 'osa', 0),
(6, 'blomo', '12', 'Rolafa', 18, 'osa', 0),
(7, 'blomo', '12', 'Rolafa', 19, 'osa', 0),
(8, 'blomo', '12', 'Rolafa', 20, 'osa', 0);

-- --------------------------------------------------------

--
-- Structure de la table `affecter`
--

CREATE TABLE IF NOT EXISTS `affecter` (
  `IdAffecter` int(15) NOT NULL AUTO_INCREMENT,
  `IdAgence` int(15) NOT NULL,
  `IdAgent` int(15) NOT NULL,
  `DateHeur_Save` timestamp NOT NULL,
  `EtatAffecter` int(1) NOT NULL,
  PRIMARY KEY (`IdAffecter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `affecter`
--

INSERT INTO `affecter` (`IdAffecter`, `IdAgence`, `IdAgent`, `DateHeur_Save`, `EtatAffecter`) VALUES
(1, 1, 1, '2018-01-01 08:07:00', 1),
(2, 1, 2, '2018-02-08 19:53:08', 1),
(3, 1, 3, '2018-02-08 19:58:18', 1),
(4, 1, 4, '2018-02-08 20:01:12', 1),
(5, 1, 5, '2018-02-08 20:03:21', 1),
(6, 1, 6, '2018-02-08 20:05:30', 1),
(7, 1, 7, '2018-02-08 20:13:09', 1),
(8, 1, 8, '2018-02-08 20:16:51', 1);

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE IF NOT EXISTS `agence` (
  `IdAgence` int(15) NOT NULL AUTO_INCREMENT,
  `NomAgence` varchar(25) NOT NULL,
  `AdresseAgence` text NOT NULL,
  `PhoneAgence` varchar(14) NOT NULL,
  `EtatAgence` int(1) NOT NULL,
  `IdPays` int(11) NOT NULL,
  PRIMARY KEY (`IdAgence`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `agence`
--

INSERT INTO `agence` (`IdAgence`, `NomAgence`, `AdresseAgence`, `PhoneAgence`, `EtatAgence`, `IdPays`) VALUES
(1, 'Poma', 'Opala 40', '0816836869', 1, 0),
(2, 'KINSHASA-MASINA', 'XXXXXXXXXXXXXXX', '0826443753', 1, 0),
(3, 'Gambela', 'gambela', '0851509369', 1, 0),
(4, 'Kinkole', 'mpasa', '0851509369', 1, 0),
(5, 'Lemba', 'XXXXXXXXXXXXXXX', '0826443753', 1, 0),
(6, 'Ndjili', 'XXXXXXXXXXXXXXX', 'SSSSS', 1, 0),
(7, 'Ndjili', 'XXXXXXXXXXXXXXX', 'SSSSS', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `IdAgent` int(15) NOT NULL AUTO_INCREMENT,
  `NomAg` varchar(25) NOT NULL,
  `PostnomAg` varchar(25) NOT NULL,
  `PrenomAg` varchar(25) NOT NULL,
  `SexeAg` varchar(1) NOT NULL,
  `PhoneAg` varchar(14) NOT NULL,
  `Login` varchar(25) NOT NULL,
  `Mdp` text NOT NULL,
  `CodeTypeAgent` varchar(15) NOT NULL,
  `EtatAg` int(1) NOT NULL,
  `Niveau` varchar(10) NOT NULL,
  PRIMARY KEY (`IdAgent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`IdAgent`, `NomAg`, `PostnomAg`, `PrenomAg`, `SexeAg`, `PhoneAg`, `Login`, `Mdp`, `CodeTypeAgent`, `EtatAg`, `Niveau`) VALUES
(1, 'Masto', 'Masto', 'Masto', 'M', '0816836869', 'Master', '$1$Ej5.7T2.$msw.Qf0wJuWEelRAJdW5C0', 'Admin', 1, 'user'),
(8, 'NGOY', 'Remy', 'Remy', 'M', '0826443753', 'deo', '$1$C6..jE3.$3jUlQ9v8yqQ/L5ybKAcCH/', 'Operateur', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `IdClient` int(15) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  `Postnom` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `Sexe` varchar(1) NOT NULL,
  `DateNaiss` date NOT NULL,
  `Phone` varchar(14) NOT NULL,
  `IdPiece` int(15) NOT NULL,
  PRIMARY KEY (`IdClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IdClient`, `Nom`, `Postnom`, `Prenom`, `Sexe`, `DateNaiss`, `Phone`, `IdPiece`) VALUES
(1, 'Mea', 'bola', 'Vola', 'M', '0000-00-00', '06545454', 1),
(2, 'Mvama', 'Mvama', 'Deza', 'F', '0000-00-00', '354645645', 1),
(3, 'Mvama', 'Mvama', 'Deza', 'F', '1970-01-01', '354645645', 1),
(4, 'Mvama', 'Mvama', 'Deza', 'F', '0000-00-00', '354645645', 1),
(5, 'Mvama', 'Mvama', 'Deza', 'F', '0000-00-00', '354645645', 1),
(6, 'Mvama', 'Mvama', 'Deza', 'F', '0000-00-00', '354645645', 1),
(7, 'Mvama', 'Mvama', 'Deza', 'F', '0000-00-00', '354645645', 1),
(8, 'Mvama', 'Mvama', 'Deza', 'F', '0000-00-00', '354645645', 1),
(9, 'Mvama', 'Mvama', 'Deza', 'F', '0000-00-00', '354645645', 1),
(10, 'Molopa', 'Frola', 'Dorotj', 'M', '1995-02-01', '0898952', 2),
(11, 'Molopa', 'Frola', 'Dorotj', 'M', '1995-02-01', '0898952', 2),
(12, 'Molopa', 'Frola', 'Dorotj', 'M', '1995-02-01', '0898952', 2),
(13, 'Molopa', 'Frola', 'Dorotj', 'M', '1995-02-01', '0898952', 2),
(14, 'Molopa', 'Frola', 'Dorotj', 'M', '1995-02-01', '0898952', 2),
(15, 'Molopa', 'Frola', 'Dorotj', 'M', '1995-02-01', '0898952', 2),
(16, 'Monpla', 'Voto', 'Frera', 'F', '1933-04-13', '097989887', 1),
(17, 'Monpla', 'Voto', 'Frera', 'F', '1933-04-13', '097989887', 1),
(18, 'Monpla', 'Voto', 'Frera', 'F', '1933-04-13', '097989887', 1),
(19, 'Monpla', 'Voto', 'Frera', 'F', '1933-04-13', '097989887', 1),
(20, 'Monpla', 'Voto', 'Frera', 'F', '1933-04-13', '097989887', 1);

-- --------------------------------------------------------

--
-- Structure de la table `compteb`
--

CREATE TABLE IF NOT EXISTS `compteb` (
  `IdCompte` int(15) NOT NULL AUTO_INCREMENT,
  `NumCompte` text NOT NULL,
  `Solde` double NOT NULL,
  `CodeMonnaie` varchar(15) NOT NULL,
  `CodeTypeCompte` varchar(15) NOT NULL,
  `IdClient` int(15) NOT NULL,
  `IdAgence` int(15) NOT NULL,
  `DateHeurCree` timestamp NOT NULL,
  `EtatCompteB` int(1) NOT NULL,
  PRIMARY KEY (`IdCompte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `compteb`
--

INSERT INTO `compteb` (`IdCompte`, `NumCompte`, `Solde`, `CodeMonnaie`, `CodeTypeCompte`, `IdClient`, `IdAgence`, `DateHeurCree`, `EtatCompteB`) VALUES
(1, '', 2490, 'USD', 'Ordinare', 1, 1, '2018-01-16 05:49:32', 1),
(2, '', 46, 'USD', 'Setram', 9, 1, '2018-01-16 05:50:59', 1),
(6, '180117', 0, 'USD', 'Agent', 1, 0, '2018-01-28 00:01:10', 1),
(7, '180118', 0, 'USD', 'Agent', 1, 0, '2018-01-28 00:03:06', 1),
(8, '1180119', 135, 'USD', 'Agent', 1, 1, '2018-01-28 00:04:44', 1),
(9, '11180120', 2225, 'USD', 'Agent', 1, 1, '2018-01-28 00:05:16', 1);

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

CREATE TABLE IF NOT EXISTS `concerner` (
  `IdConcerner` int(15) NOT NULL AUTO_INCREMENT,
  `IdTransact` int(15) NOT NULL,
  `IdTransactS` int(11) NOT NULL,
  `IdTransactE` int(11) NOT NULL,
  `IdFrais` int(15) NOT NULL,
  `Montant` double NOT NULL,
  `CodeMonnaie` varchar(15) NOT NULL,
  PRIMARY KEY (`IdConcerner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `concerner`
--

INSERT INTO `concerner` (`IdConcerner`, `IdTransact`, `IdTransactS`, `IdTransactE`, `IdFrais`, `Montant`, `CodeMonnaie`) VALUES
(4, 1, 3, 4, 1, 2, 'USD'),
(5, 1, 5, 6, 2, 25.6, 'USD'),
(6, 19, 21, 22, 1, 2, 'USD'),
(7, 19, 23, 24, 2, 1, 'USD'),
(8, 25, 27, 28, 1, 2, 'USD'),
(9, 25, 29, 30, 2, 1, 'USD'),
(10, 32, 34, 35, 1, 2, 'USD'),
(11, 32, 36, 37, 2, 8, 'USD'),
(12, 38, 40, 41, 1, 2, 'USD'),
(13, 38, 42, 43, 2, 8, 'USD'),
(14, 44, 46, 47, 1, 2, 'USD'),
(15, 44, 48, 49, 2, 8, 'USD'),
(16, 50, 52, 53, 1, 2, 'USD'),
(17, 50, 54, 55, 2, 8, 'USD'),
(18, 56, 58, 59, 1, 2, 'USD'),
(19, 56, 60, 61, 2, 8, 'USD'),
(20, 72, 74, 75, 1, 2, 'USD'),
(21, 72, 76, 77, 2, 8, 'USD'),
(22, 80, 82, 83, 1, 2, 'USD'),
(23, 80, 84, 85, 2, 8, 'USD'),
(24, 86, 88, 89, 1, 2, 'USD'),
(25, 86, 90, 91, 2, 8, 'USD'),
(26, 92, 94, 95, 1, 2, 'USD'),
(27, 92, 96, 97, 2, 8, 'USD'),
(28, 98, 100, 101, 1, 2, 'USD'),
(29, 98, 102, 103, 2, 8, 'USD'),
(30, 107, 109, 110, 1, 2, 'USD'),
(31, 107, 111, 112, 2, 8, 'USD');

-- --------------------------------------------------------

--
-- Structure de la table `concerner_change`
--

CREATE TABLE IF NOT EXISTS `concerner_change` (
  `idconcerne` int(15) NOT NULL AUTO_INCREMENT,
  `idmouv` int(15) NOT NULL,
  `idconversion` int(15) NOT NULL,
  `TauxChange` double NOT NULL,
  PRIMARY KEY (`idconcerne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `concerner_change`
--

INSERT INTO `concerner_change` (`idconcerne`, `idmouv`, `idconversion`, `TauxChange`) VALUES
(1, 21, 14, 10),
(2, 22, 14, 10),
(3, 23, 15, 10),
(4, 24, 15, 10),
(5, 25, 16, 10),
(6, 26, 16, 10),
(7, 27, 17, 1600),
(8, 28, 17, 1600),
(9, 29, 18, 10),
(10, 30, 18, 10),
(11, 31, 19, 10),
(12, 32, 19, 10);

-- --------------------------------------------------------

--
-- Structure de la table `conversion`
--

CREATE TABLE IF NOT EXISTS `conversion` (
  `idconversion` int(11) NOT NULL AUTO_INCREMENT,
  `sensconv` varchar(7) NOT NULL,
  `EtatConv` tinyint(1) NOT NULL,
  PRIMARY KEY (`idconversion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `conversion`
--

INSERT INTO `conversion` (`idconversion`, `sensconv`, `EtatConv`) VALUES
(14, 'USD-CDF', 1),
(15, 'USD-CDF', 1),
(16, 'USD-CDF', 1),
(17, 'CDF-USD', 1),
(18, 'USD-CDF', 1),
(19, 'USD-CDF', 1);

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE IF NOT EXISTS `depense` (
  `IdDepense` int(15) NOT NULL AUTO_INCREMENT,
  `Motif` text NOT NULL,
  `IdMouv` int(15) NOT NULL,
  `Etatdep` int(1) NOT NULL,
  PRIMARY KEY (`IdDepense`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `depense`
--

INSERT INTO `depense` (`IdDepense`, `Motif`, `IdMouv`, `Etatdep`) VALUES
(4, 'Transport agents', 20, 1),
(5, 'Achat carburant', 33, 1),
(6, 'transport Ir.', 34, 1);

-- --------------------------------------------------------

--
-- Structure de la table `effectuer`
--

CREATE TABLE IF NOT EXISTS `effectuer` (
  `IdEffect` int(15) NOT NULL AUTO_INCREMENT,
  `IdAgent` int(15) NOT NULL,
  `IdTransact` int(15) NOT NULL,
  `IdAgence` int(15) NOT NULL,
  PRIMARY KEY (`IdEffect`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Contenu de la table `effectuer`
--

INSERT INTO `effectuer` (`IdEffect`, `IdAgent`, `IdTransact`, `IdAgence`) VALUES
(1, 8, 7, 1),
(2, 8, 8, 1),
(3, 8, 9, 1),
(4, 8, 10, 1),
(5, 8, 11, 1),
(6, 8, 12, 1),
(7, 8, 13, 1),
(8, 8, 14, 1),
(9, 8, 15, 1),
(10, 8, 16, 1),
(11, 8, 17, 1),
(12, 8, 18, 1),
(13, 8, 19, 1),
(14, 8, 25, 1),
(15, 8, 31, 1),
(16, 8, 32, 1),
(17, 8, 38, 1),
(18, 8, 44, 1),
(19, 8, 50, 1),
(20, 8, 56, 1),
(21, 8, 62, 1),
(22, 8, 63, 1),
(23, 8, 64, 1),
(24, 8, 65, 1),
(25, 8, 66, 1),
(26, 8, 67, 1),
(27, 8, 68, 1),
(28, 8, 69, 1),
(29, 8, 70, 1),
(30, 8, 71, 1),
(31, 8, 72, 1),
(32, 8, 78, 1),
(33, 8, 79, 1),
(34, 8, 1, 1),
(35, 8, 80, 1),
(36, 8, 86, 1),
(37, 8, 92, 1),
(38, 8, 98, 1),
(39, 8, 104, 1),
(40, 8, 105, 1),
(41, 8, 106, 1),
(42, 8, 107, 1),
(43, 8, 113, 1);

-- --------------------------------------------------------

--
-- Structure de la table `financement`
--

CREATE TABLE IF NOT EXISTS `financement` (
  `IdFinancement` int(15) NOT NULL AUTO_INCREMENT,
  `Motif` text NOT NULL,
  `IdMouv` int(15) NOT NULL,
  `DateHeure` timestamp NOT NULL,
  `IdAgence` int(15) NOT NULL,
  `EtatFinancement` varchar(1) NOT NULL,
  PRIMARY KEY (`IdFinancement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `financement`
--

INSERT INTO `financement` (`IdFinancement`, `Motif`, `IdMouv`, `DateHeure`, `IdAgence`, `EtatFinancement`) VALUES
(19, 'ravitaillement', 11, '2018-01-16 16:49:18', 1, '1'),
(20, 'Financement agence', 13, '2018-01-16 16:50:26', 1, '1'),
(21, 'finance', 35, '2018-02-18 13:51:41', 1, '1');

-- --------------------------------------------------------

--
-- Structure de la table `frais`
--

CREATE TABLE IF NOT EXISTS `frais` (
  `IdFrais` int(15) NOT NULL AUTO_INCREMENT,
  `Montant` double NOT NULL,
  `CodeMonnaie` varchar(15) NOT NULL,
  `Description` varchar(25) NOT NULL,
  `EtatFrais` int(1) NOT NULL,
  `Destination` varchar(25) NOT NULL,
  `CodeTypeTransact` varchar(50) NOT NULL,
  `TypeFrais` char(1) NOT NULL,
  PRIMARY KEY (`IdFrais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `frais`
--

INSERT INTO `frais` (`IdFrais`, `Montant`, `CodeMonnaie`, `Description`, `EtatFrais`, `Destination`, `CodeTypeTransact`, `TypeFrais`) VALUES
(1, 2, 'USD', 'SMS', 1, 'Direction', 'Transfert', 'F'),
(2, 1, 'USD', 'Transfert', 1, 'Agence', 'Transfert', 'P');

-- --------------------------------------------------------

--
-- Structure de la table `monnaie`
--

CREATE TABLE IF NOT EXISTS `monnaie` (
  `CodeMonnaie` varchar(15) NOT NULL,
  `Libmonnaie` varchar(20) NOT NULL,
  `EtatMonnaie` int(1) NOT NULL,
  `Minim` double NOT NULL,
  PRIMARY KEY (`CodeMonnaie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `monnaie`
--

INSERT INTO `monnaie` (`CodeMonnaie`, `Libmonnaie`, `EtatMonnaie`, `Minim`) VALUES
('CDF', 'Franc Congolais', 1, 0),
('USD', 'Dollar Américain', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mouvement`
--

CREATE TABLE IF NOT EXISTS `mouvement` (
  `IdMouv` int(15) NOT NULL AUTO_INCREMENT,
  `Montant` double NOT NULL,
  `CodeMonnaie` varchar(15) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `Sens` varchar(15) NOT NULL,
  `IdAgence` int(15) NOT NULL,
  `IdAgent` int(15) NOT NULL,
  `DateMouv` timestamp NOT NULL,
  `EtatMouv` int(1) NOT NULL,
  PRIMARY KEY (`IdMouv`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `mouvement`
--

INSERT INTO `mouvement` (`IdMouv`, `Montant`, `CodeMonnaie`, `Type`, `Sens`, `IdAgence`, `IdAgent`, `DateMouv`, `EtatMouv`) VALUES
(11, 50, 'USD', 'Financement', 'E', 2, 1, '2018-01-16 16:49:18', 1),
(12, 50, 'USD', 'Virement', 'S', 1, 10, '2018-01-16 16:49:18', 1),
(13, 10, 'USD', 'Financement', 'E', 3, 1, '2018-01-16 16:50:26', 1),
(14, 10, 'USD', 'Virement', 'S', 1, 10, '2018-01-16 16:50:26', 1),
(20, 50, 'USD', 'Depense', 'S', 1, 1, '2018-01-16 17:11:06', 1),
(21, 10, 'USD', 'conversion', 'E', 1, 8, '2018-02-12 11:14:05', 1),
(22, 100, 'CDF', 'conversion', 'S', 1, 8, '2018-02-12 11:14:05', 1),
(23, 15, 'USD', 'conversion', 'E', 1, 8, '2018-02-13 20:42:35', 1),
(24, 150, 'CDF', 'conversion', 'S', 1, 8, '2018-02-13 20:42:35', 1),
(25, 20, 'USD', 'conversion', 'E', 1, 8, '2018-02-13 20:42:47', 1),
(26, 200, 'CDF', 'conversion', 'S', 1, 8, '2018-02-13 20:42:47', 1),
(27, 1.03125, 'USD', 'conversion', 'S', 1, 8, '2018-02-13 20:43:23', 1),
(28, 1650, 'CDF', 'conversion', 'E', 1, 8, '2018-02-13 20:43:23', 1),
(29, 14, 'USD', 'conversion', 'E', 1, 8, '2018-02-14 09:52:27', 1),
(30, 140, 'CDF', 'conversion', 'S', 1, 8, '2018-02-14 09:52:28', 1),
(31, 100, 'USD', 'conversion', 'E', 1, 8, '2018-02-15 18:10:54', 1),
(32, 1000, 'CDF', 'conversion', 'S', 1, 8, '2018-02-15 18:10:54', 1),
(33, 100, 'USD', 'Depense', 'S', 1, 8, '2018-02-18 13:02:30', 1),
(34, 50, 'USD', 'Depense', 'S', 1, 8, '2018-02-18 13:04:31', 1),
(35, 100, 'CDF', 'Financement', 'E', 4, 8, '2018-02-18 13:51:41', 1),
(36, 100, 'CDF', 'Virement', 'S', 1, 8, '2018-02-18 13:51:41', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `IdPays` int(15) NOT NULL AUTO_INCREMENT,
  `NomFrancais` varchar(100) NOT NULL,
  `NomAnglais` varchar(100) NOT NULL,
  `CodePays` varchar(15) NOT NULL,
  PRIMARY KEY (`IdPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=225 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`IdPays`, `NomFrancais`, `NomAnglais`, `CodePays`) VALUES
(1, 'Cambodge', 'Cambodia', '855'),
(2, 'Diego Garcia', 'Diego Garcia', '246'),
(3, 'Guyana', 'Guyana', '592'),
(4, 'Lituanie', 'Lithuania', '370'),
(5, 'A&ccedil;ores', 'Azores', '351'),
(6, 'Afghanistan', 'Afghanistan', '90'),
(7, 'Afrique du Sud', 'South Africa', '27'),
(8, 'Albanie', 'Albania', '355'),
(9, 'Alg&eacute;rie', 'Algeria', '213'),
(10, 'Allemagne', 'Germany', '49'),
(11, 'Andorre', 'Andorra', '376'),
(12, 'Angola', 'Angola', '244'),
(13, 'Anguilla', 'Anguilla', '1264'),
(14, 'Antigua et Barbuda', 'Antigua and Barbuda', '1268'),
(15, 'Antilles N&eacute;erlandaises', 'Netherlands Antilles', '599'),
(16, 'Arabie Saoudite', 'Saudi Arabia', '966'),
(17, 'Argentine', 'Argentina', '54'),
(18, 'Arm&eacute;nie', 'Armenia', '374'),
(19, 'Aruba', 'Aruba', '97'),
(20, 'Ascension', 'Ascension', '247'),
(21, 'Australie', 'Australia', '61'),
(22, 'Autriche', 'Austria', '43'),
(23, 'Azerba&iuml;djan', 'Azerbaijan', '994'),
(24, 'Bahamas', 'Bahamas', '1242'),
(25, 'Bahre&iuml;n', 'Bahrain', '973'),
(26, 'Bangladesh', 'Bangladesh', '880'),
(27, 'Barbade', 'Barbados', '1246'),
(28, 'Belarus', 'Belarus', '375'),
(29, 'Belgique', 'Belgium', '32'),
(30, 'Belize', 'Belize', '501'),
(31, 'B&eacute;nin', 'Benin', '229'),
(32, 'Bermudes', 'Bermuda', '1441'),
(33, 'Bhoutan', 'Bhutan', '975'),
(34, 'Bolivie', 'Bolivia', '591'),
(35, 'Bosnie-Herz&eacute;govine', 'Bosnia and Herzegovina', '387'),
(36, 'Botswana', 'Botswana', '267'),
(37, 'Br&eacute;sil', 'Brazil', '55'),
(38, 'Brunei', 'Brunei', '673'),
(39, 'Bulgarie', 'Bulgaria', '359'),
(40, 'Burkina Faso', 'Burkina Faso', '226'),
(41, 'Burundi', 'Burundi', '257'),
(42, 'Cambodge', 'Cambodia', '855'),
(43, 'Cameroun', 'Cameroon', '237'),
(44, 'Canada', 'Canada', '1'),
(45, 'Cap-Vert', 'Cape Verde', '238'),
(46, 'Cayman (Iles)', 'Cayman (Islands)', '1345'),
(47, 'Centrafricaine (Rep.)', 'Central African Republic', '236'),
(48, 'Chili', 'Chile', '56'),
(49, 'Chine', 'China', '86'),
(50, 'Chypre', 'Cyprus', '357'),
(51, 'Colombie', 'Colombia', '57'),
(52, 'Comores', 'Comoros', '269'),
(53, 'Congo', 'Congo', '242'),
(54, 'Congo (Rep. Dem.)', 'Congo Zaire', '243'),
(55, 'Cook (Iles)', '&nbsp;Cook Islands', '682'),
(56, 'Cor&eacute;e (Rep. de)', 'Korea (Republic of)', '82'),
(57, 'Costa Rica', 'Costa Rica', '506'),
(58, 'C&ocirc;te d''Ivoire', 'Ivory Coast', '225'),
(59, 'Croatie', 'Croatia', '385'),
(60, 'Cuba', 'Cuba', '53'),
(61, 'Danemark', 'Denmark', '45'),
(62, 'Diego Garcia', 'Diego Garcia', '246'),
(63, 'Djibouti', 'Djibouti', '253'),
(64, 'Dominicaine (Rep.)', 'Dominican (Republic)', '1809'),
(65, 'Dominique', 'Dominica', '1767'),
(66, 'Egypte', 'Egypt', '20'),
(67, 'El Salvador', 'El Salvador', '503'),
(68, 'Emirats Arabes Unis', 'United Arab Emirates', '971'),
(69, 'Equateur', 'Ecuador', '593'),
(70, 'Erythr&eacute;e', 'Erytrea', '291'),
(71, 'Espagne', 'Spain', '349'),
(72, 'Estonie', 'Estonia', '372'),
(73, 'Etats-Unis', 'United States', '1'),
(74, 'Ethiopie', 'Ethiopia', '251'),
(75, 'Falkland (Iles)', 'Faeroe Islands', '500'),
(76, 'Fidji', 'Fiji', '679'),
(77, 'Finlande', 'Finland', '358'),
(78, 'France', 'France', '33'),
(79, 'Gabon', 'Gabon', '241'),
(80, 'Gambie', 'Gambia', '220'),
(81, 'G&eacute;orgie', 'Georgia', '995'),
(82, 'Ghana', 'Ghana', '233'),
(83, 'Gibraltar', 'Gibraltar', '350'),
(84, 'Gr&egrave;ce', 'Greece', '30'),
(85, 'Grenade', 'Grenada', '1473'),
(86, 'Groenland', 'Greenland', '299'),
(87, 'Guam', 'Guam', '671'),
(88, 'Guatemala', 'Guatemala', '502'),
(89, 'Guin&eacute;e', 'Guinea', '224'),
(90, 'Guin&eacute;e Equatoriale', 'Equatorial Guinea', '240'),
(91, 'Guin&eacute;e-Bissau', 'Guinea-Bissau', '245'),
(92, 'Guyana', 'Guyana', '592'),
(93, 'Ha&iuml;ti', 'Haiti', '509'),
(94, 'Hawa&iuml;', 'Hawaii', '1808'),
(95, 'Honduras', 'Honduras', '504'),
(96, 'Hongkong', 'Hongkong', '852'),
(97, 'Hongrie', 'Hungary', '36'),
(98, 'Inde', 'India', '91'),
(99, 'Indon&eacute;sie', 'Indonesia', '62'),
(100, 'Iran (Rep. Isl.)', 'Iran (Islamic Rep. of)', '98'),
(101, 'Irak', 'Iraq', '964'),
(102, 'Irlande', 'Ireland', '353'),
(103, 'Islande', 'Iceland', '354'),
(104, 'Isra&euml;l', 'Israel', '972'),
(105, 'Italie', 'Italy', '390'),
(106, 'Jama&iuml;que', 'Jamaica', '1876'),
(107, 'Japon', 'Japan', '81'),
(108, 'Jordanie', 'Jordan', '962'),
(109, 'Kazakhstan', 'Kazakhstan', '7'),
(110, 'Kenya', 'Kenya', '254'),
(111, 'Kirghizistan', 'Kyrgystan', '996'),
(112, 'Kiribati', 'Kiribati', '686'),
(113, 'Kowe&iuml;t', 'Kuwait', '965'),
(114, 'Laos (Rep. Dem. Pop. du)', 'Laos', '856'),
(115, 'Lesotho', 'Lesotho', '266'),
(116, 'Lettonie', 'Latvia', '371'),
(117, 'Liban', 'Lebanon', '961'),
(118, 'Liberia', 'Liberia', '231'),
(119, 'Libye', 'Libya', '218'),
(120, 'Liechtenstein', 'Liechstenstein', '423'),
(121, 'Lituanie', 'Lithuania', '370'),
(122, 'Luxembourg', 'Luxembourg', '352'),
(123, 'Macao', 'Macao', '853'),
(124, 'Mac&eacute;doine', 'Macedonia (F.Y.R.O.M.)', '389'),
(125, 'Madagascar', 'Madagascar', '261'),
(126, 'Mad&egrave;re', 'Madeira', '351'),
(127, 'Malaisie', 'Malaysia', '60'),
(128, 'Malawi', 'Malawi', '265'),
(129, 'Maldives', 'Maldives', '960'),
(130, 'Mali', 'Mali', '223'),
(131, 'Malte', 'Malta', '356'),
(132, 'Mariannes (Iles', 'Saipan', '670'),
(133, 'Maroc', 'Morocco', '212'),
(134, 'Marshall (Iles)', 'Marshall Islands', '692'),
(135, 'Maurice', 'Mauritius', '230'),
(136, 'Mauritanie', 'Mauritania', '222'),
(137, 'Mexique', 'Mexico', '52'),
(138, 'Micron&eacute;sie', 'Micronesia', '691'),
(139, 'Moldova', 'Moldova', '373'),
(140, 'Monaco', 'Monaco', '377'),
(141, 'Mongolie', 'Mongolia', '976'),
(142, 'Montserrat', 'Montserrat', '1664'),
(143, 'Mozambique', 'Mozambique', '258'),
(144, 'Myanmar', 'Myanmar', '95'),
(145, 'Namibie', 'Namibia', '264'),
(146, 'Nauru', 'Nauru', '674'),
(147, 'N&eacute;pal', 'Nepal', '977'),
(148, 'Nicaragua', 'Nicaragua', '505'),
(149, 'Niger', 'Niger', '227'),
(150, 'Nigeria', 'Nigeria', '234'),
(151, 'Niue', 'Niue', '683'),
(152, 'Norfolk (Ile)', 'Norfolk Island', '6723'),
(153, 'Norv&egrave;ge', 'Norway', '47'),
(154, 'Nouvelle-Z&eacute;lande', 'New Zealand', '64'),
(155, 'Oman', 'Oman', '968'),
(156, 'Ouganda', 'Uganda', '256'),
(157, 'Ouzb&eacute;kistan', 'Uzbekistan', '7'),
(158, 'Pakistan', 'Pakistan', '92'),
(159, 'Palau', 'Palau', '680'),
(160, 'Palestine', 'Palestine', '970'),
(161, 'Panama', 'Panama', '507'),
(162, 'Papouasie-Nouvelle-Guin&eacute;e', 'Papua New Guinea', '675'),
(163, 'Paraguay', 'Paraguay', '595'),
(164, 'Pays-Bas', 'Netherlands', '31'),
(165, 'P&eacute;rou', 'Peru', '51'),
(166, 'Philippines', 'Philippines', '63'),
(167, 'Pologne', 'Poland', '48'),
(168, 'Portugal', 'Portugal', '351'),
(169, 'Porto Rico', 'Porto Rico', '1787'),
(170, 'Qatar', 'Qatar', '974'),
(171, 'Roumanie', 'Romania', '40'),
(172, 'Royaume-Uni', 'United Kingdom', '44'),
(173, 'Russie', 'Russia', '7'),
(174, 'Rwanda', 'Rwanda', '250'),
(175, 'Sainte-H&eacute;l&egrave;ne', 'Saint Helena', '290'),
(176, 'Sainte-Lucie', 'Saint Lucia', '1758'),
(177, 'Saint-Kitts-et-Nevis', 'Saint Kitts and Nevis', '1869'),
(178, 'Saint-Marin', 'San Marino', '378'),
(179, 'Saint-Vincent-et-Grenadines', 'St Vincent &amp; Grenadines', '1784'),
(180, 'Salomon', 'Salomon', '677'),
(181, 'Samoa Am&eacute;ricaines', 'American Samoa', '684'),
(182, 'Samoa Occidental', 'Western Samoa', '685'),
(183, 'Sao Tome-et-Principe', 'Sao Tome and Principe', '239'),
(184, 'S&eacute;n&eacute;gal', 'Senegal', '221'),
(185, 'Seychelles', 'Seychelles', '248'),
(186, 'Sierra Leone', 'Sierra Leone', '232'),
(187, 'Singapour', 'Singapore', '65'),
(188, 'Slovaque (Rep.)', 'Slovak (Republic)', '421'),
(189, 'Slov&eacute;nie', 'Slovenia', '386'),
(190, 'Somalie', 'Somalia', '252'),
(191, 'Soudan', 'Sudan', '249'),
(192, 'Sri Lanka', 'Sri Lanka', '94'),
(193, 'Su&egrave;de', 'Sweden', '46'),
(194, 'Suisse', 'Switzerland', '41'),
(195, 'Surinam', 'Surinam', '597'),
(196, 'Swaziland', 'Swaziland', '268'),
(197, 'Syrie', 'Syria', '963'),
(198, 'Tadjikistan (Rep. du)', 'Tajikistan (Republic of)', '992'),
(199, 'Taiwan', 'Taiwan', '886'),
(200, 'Tanzanie', 'Tanzania', '255'),
(201, 'Tchad', 'Chad', '235'),
(202, 'Tch&egrave;que (Rep.)', ' Czech (Rep.)', '420'),
(203, 'Tha&iuml;lande', 'Thailand', '66'),
(204, 'Timor Oriental', 'East Timor', '670'),
(205, 'Togo', 'Togo', '228'),
(206, 'Tokelau', 'Tokelau', '690'),
(207, 'Tonga', 'Tonga', '676'),
(208, 'Trinit&eacute;-et-Tobago', 'Trinidad and Tobago', '1868'),
(209, 'Tunisie', 'Tunisia', '216'),
(210, 'Turkm&eacute;nistan', 'Turkmenistan', '993'),
(211, 'Turks et Ca&iuml;cos (Iles)', 'Turks and Caicos Islands', '1649'),
(212, 'Turquie', 'Turkey', '90'),
(213, 'Tuvalu', 'Tuvalu', '688'),
(214, 'Ukraine', 'Ukraine', '380'),
(215, 'Uruguay', 'Uruguay', '598'),
(216, 'Vanuatu', 'Vanuatu', '678'),
(217, 'Venezuela', 'Venezuela', '58'),
(218, 'Vierges Am&eacute;ricaines (Iles)', 'United States Virgin Islands', '1340'),
(219, 'Vierges Britanniques (Iles)', 'British Virgin Islands (Tortola)', '1284'),
(220, 'Vietnam', 'Vietnam', '84'),
(221, 'Y&eacute;men (Rep.)', 'Yemen (Rep. of)', '967'),
(222, 'Yougoslavie (Rep. Fed. de)', 'Yugoslavia', '381'),
(223, 'Zambie', 'Zambia', '260'),
(224, 'Zimbabwe', 'Zimbabwe', '263');

-- --------------------------------------------------------

--
-- Structure de la table `pieceid`
--

CREATE TABLE IF NOT EXISTS `pieceid` (
  `IdPiece` int(15) NOT NULL AUTO_INCREMENT,
  `NumPiece` int(25) NOT NULL,
  `CapturePiece` text NOT NULL,
  `DatExpir` date NOT NULL,
  `idTypePiece` int(11) NOT NULL,
  PRIMARY KEY (`IdPiece`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `plage`
--

CREATE TABLE IF NOT EXISTS `plage` (
  `IdPlage` int(15) NOT NULL AUTO_INCREMENT,
  `BorneInf` double NOT NULL,
  `BornSuper` double NOT NULL,
  `TypePlage` varchar(25) NOT NULL,
  `MontantPlage` double NOT NULL,
  `CodeMonnaie` varchar(15) NOT NULL,
  `EtatPlage` int(11) NOT NULL,
  PRIMARY KEY (`IdPlage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `plage`
--

INSERT INTO `plage` (`IdPlage`, `BorneInf`, `BornSuper`, `TypePlage`, `MontantPlage`, `CodeMonnaie`, `EtatPlage`) VALUES
(1, 1, 100, 'F', 8, 'USD', 1),
(2, 101, 1000, 'P', 4, 'USD', 1);

-- --------------------------------------------------------

--
-- Structure de la table `poche`
--

CREATE TABLE IF NOT EXISTS `poche` (
  `IdPoche` int(15) NOT NULL AUTO_INCREMENT,
  `Montant` double NOT NULL,
  `CodeMonnaie` varchar(15) NOT NULL,
  `IdCompte` int(15) NOT NULL,
  PRIMARY KEY (`IdPoche`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `IdProvince` int(15) NOT NULL AUTO_INCREMENT,
  `NomPronv` text NOT NULL,
  `IdPays` int(11) NOT NULL,
  PRIMARY KEY (`IdProvince`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `province`
--

INSERT INTO `province` (`IdProvince`, `NomPronv`, `IdPays`) VALUES
(1, 'Mota', 1),
(2, 'Lopa', 0),
(3, 'Lopa', 0),
(4, 'Lopa', 0),
(5, 'Lopa', 0),
(6, 'Lopa', 0);

-- --------------------------------------------------------

--
-- Structure de la table `securite`
--

CREATE TABLE IF NOT EXISTS `securite` (
  `IdSecurite` int(15) NOT NULL AUTO_INCREMENT,
  `Signature` text NOT NULL,
  `Photo` text NOT NULL,
  `Empreinte` blob NOT NULL,
  `PIN` varchar(15) NOT NULL,
  `IdCompte` int(15) NOT NULL,
  PRIMARY KEY (`IdSecurite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sms_send`
--

CREATE TABLE IF NOT EXISTS `sms_send` (
  `IdSms__Send` int(15) NOT NULL AUTO_INCREMENT,
  `IdStock` int(15) NOT NULL,
  `IdTransact` int(15) NOT NULL,
  `Num_Tel` varchar(14) NOT NULL,
  PRIMARY KEY (`IdSms__Send`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stock_sms`
--

CREATE TABLE IF NOT EXISTS `stock_sms` (
  `IdStock` int(15) NOT NULL AUTO_INCREMENT,
  `Nombre` int(25) NOT NULL,
  `Reste` int(25) NOT NULL,
  `DateHeur_Save` timestamp NOT NULL,
  `EtatStock_Sms` int(1) NOT NULL,
  PRIMARY KEY (`IdStock`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `taux`
--

CREATE TABLE IF NOT EXISTS `taux` (
  `IdTaux` int(15) NOT NULL AUTO_INCREMENT,
  `Taux` double NOT NULL,
  `CodeMonnaie` varchar(15) NOT NULL,
  `IdAgence` int(15) NOT NULL,
  PRIMARY KEY (`IdTaux`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `taux`
--

INSERT INTO `taux` (`IdTaux`, `Taux`, `CodeMonnaie`, `IdAgence`) VALUES
(1, 10, 'USD', 7),
(2, 1600, 'CDF', 7),
(3, 15, 'Kz', 7),
(4, 10, 'USD', 1),
(5, 15, 'Kz', 1),
(6, 1600, 'CDF', 1);

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `IdTransact` int(15) NOT NULL AUTO_INCREMENT,
  `MontantTransact` double NOT NULL,
  `CodeMonnaie` varchar(15) NOT NULL,
  `Sens` varchar(1) NOT NULL,
  `MoyenTransact` varchar(15) NOT NULL,
  `CodeTypeTransact` varchar(15) NOT NULL,
  `IdCompte` int(15) NOT NULL,
  `DateTransact` timestamp NOT NULL,
  `EtatTransact` int(1) NOT NULL,
  PRIMARY KEY (`IdTransact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Contenu de la table `transaction`
--

INSERT INTO `transaction` (`IdTransact`, `MontantTransact`, `CodeMonnaie`, `Sens`, `MoyenTransact`, `CodeTypeTransact`, `IdCompte`, `DateTransact`, `EtatTransact`) VALUES
(1, 640, 'USD', 'S', 'bureau', 'Transfert', 9, '2018-02-04 03:01:44', 1),
(2, 640, 'USD', 'E', 'bureau', 'Transfert', 1, '2018-02-04 03:01:44', 1),
(3, 2, 'USD', 'S', 'bureau', 'Transfert', 9, '2018-02-04 03:01:44', 1),
(4, 2, 'USD', 'E', 'bureau', 'Transfert', 2, '2018-02-04 03:01:44', 1),
(5, 25.6, 'USD', 'S', 'bureau', 'Transfert', 9, '2018-02-04 03:01:44', 1),
(6, 25.6, 'USD', 'E', 'bureau', 'Transfert', 1, '2018-02-04 03:01:44', 1),
(7, 10, 'CDF', 'E', 'web', 'Depot', 9, '2018-02-09 10:00:14', 1),
(8, 10, 'CDF', 'E', 'web', 'Depot', 9, '2018-02-09 10:00:51', 1),
(9, 10, 'CDF', 'E', 'web', 'Depot', 9, '2018-02-09 10:01:24', 1),
(10, 10, 'CDF', 'E', 'web', 'Depot', 9, '2018-02-09 10:02:28', 1),
(11, 10, 'CDF', 'E', 'web', 'Depot', 9, '2018-02-09 10:02:54', 1),
(12, 10, 'USD', 'E', 'web', 'Depot', 9, '2018-02-09 10:50:22', 1),
(13, 10, 'USD', 'E', 'web', 'Depot', 9, '2018-02-09 12:11:57', 1),
(14, 10, 'USD', 'E', 'web', 'Depot', 9, '2018-02-09 12:15:50', 1),
(15, 10, 'USD', 'E', 'web', 'Depot', 9, '2018-02-09 12:16:05', 1),
(16, 10, 'USD', 'E', 'web', 'Depot', 9, '2018-02-10 12:27:12', 1),
(17, 10, 'USD', 'E', 'web', 'Depot', 9, '2018-02-10 12:29:22', 1),
(18, 10, 'USD', 'E', 'web', 'Depot', 9, '2018-02-10 12:30:21', 1),
(19, 0, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 12:34:36', 1),
(20, 0, 'USD', 'E', 'web', 'Transfert', 0, '2018-02-10 12:34:36', 1),
(21, 2, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 12:34:36', 1),
(22, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-10 12:34:36', 1),
(23, 1, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 12:34:36', 1),
(24, 1, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-10 12:34:36', 1),
(25, 0, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 12:34:43', 1),
(26, 0, 'USD', 'E', 'web', 'Transfert', 0, '2018-02-10 12:34:43', 1),
(27, 2, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 12:34:43', 1),
(28, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-10 12:34:43', 1),
(29, 1, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 12:34:44', 1),
(30, 1, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-10 12:34:44', 1),
(31, 15, 'USD', 'E', 'web', 'Depot', 9, '2018-02-10 12:38:16', 1),
(32, 100, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:12:37', 1),
(33, 100, 'USD', 'E', 'web', 'Transfert', 0, '2018-02-10 22:12:37', 1),
(34, 2, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:12:37', 1),
(35, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-10 22:12:37', 1),
(36, 8, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:12:37', 1),
(37, 8, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-10 22:12:37', 1),
(38, 100, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:44:54', 1),
(39, 100, 'USD', 'E', 'web', 'Transfert', 8, '2018-02-10 22:44:54', 1),
(40, 2, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:44:55', 1),
(41, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-10 22:44:55', 1),
(42, 8, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:44:55', 1),
(43, 8, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-10 22:44:55', 1),
(44, 100, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:45:31', 1),
(45, 100, 'USD', 'E', 'web', 'Transfert', 8, '2018-02-10 22:45:31', 1),
(46, 2, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:45:31', 1),
(47, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-10 22:45:31', 1),
(48, 8, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:45:31', 1),
(49, 8, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-10 22:45:31', 1),
(50, 100, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:48:49', 1),
(51, 100, 'USD', 'E', 'web', 'Transfert', 8, '2018-02-10 22:48:49', 1),
(52, 2, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:48:49', 1),
(53, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-10 22:48:49', 1),
(54, 8, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:48:49', 1),
(55, 8, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-10 22:48:49', 1),
(56, 100, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:51:41', 1),
(57, 100, 'USD', 'E', 'web', 'Transfert', 8, '2018-02-10 22:51:41', 1),
(58, 2, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:51:41', 1),
(59, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-10 22:51:41', 1),
(60, 8, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 22:51:41', 1),
(61, 8, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-10 22:51:41', 1),
(62, 100, 'USD', 'E', 'web', 'Depot', 8, '2018-02-10 22:52:29', 1),
(63, 10, 'USD', 'S', 'web', 'Retrait', 8, '2018-02-10 22:52:47', 1),
(64, 10, 'USD', 'E', 'web', 'Depot', 9, '2018-02-10 22:54:57', 1),
(65, 10, 'USD', 'S', 'web', 'Retrait', 9, '2018-02-10 22:55:30', 1),
(66, 10, 'USD', 'S', 'web', 'Retrait', 9, '2018-02-10 22:56:42', 1),
(67, 10, 'USD', 'S', 'web', 'Retrait', 9, '2018-02-10 22:57:36', 1),
(68, 10, 'USD', 'S', 'web', 'Retrait', 9, '2018-02-10 23:00:13', 1),
(69, 10, 'USD', 'S', 'web', 'Retrait', 9, '2018-02-10 23:02:02', 1),
(70, 10, 'USD', 'S', 'web', 'Retrait', 9, '2018-02-10 23:03:13', 1),
(71, 15, 'USD', 'S', 'web', 'Retrait', 9, '2018-02-10 23:04:15', 1),
(72, 20, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 23:05:59', 1),
(73, 20, 'USD', 'E', 'web', 'Transfert', 8, '2018-02-10 23:05:59', 1),
(74, 2, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 23:06:00', 1),
(75, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-10 23:06:00', 1),
(76, 8, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-10 23:06:00', 1),
(77, 8, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-10 23:06:00', 1),
(78, 30, 'USD', 'E', 'web', 'Depot', 9, '2018-02-10 23:09:05', 1),
(79, 30, 'USD', 'E', 'web', 'Depot', 9, '2018-02-10 23:10:37', 1),
(80, 100, 'USD', 'S', 'web', 'Transfert', 8, '2018-02-19 15:02:48', 1),
(81, 100, 'USD', 'E', 'web', 'Transfert', 9, '2018-02-19 15:02:48', 1),
(82, 2, 'USD', 'S', 'web', 'Transfert', 8, '2018-02-19 15:02:49', 1),
(83, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-19 15:02:49', 1),
(84, 8, 'USD', 'S', 'web', 'Transfert', 8, '2018-02-19 15:02:49', 1),
(85, 8, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-19 15:02:49', 1),
(86, 200, 'USD', 'S', 'web', 'Transfert', 8, '2018-02-19 15:04:12', 1),
(87, 200, 'USD', 'E', 'web', 'Transfert', 9, '2018-02-19 15:04:12', 1),
(88, 2, 'USD', 'S', 'web', 'Transfert', 8, '2018-02-19 15:04:13', 1),
(89, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-19 15:04:13', 1),
(90, 8, 'USD', 'S', 'web', 'Transfert', 8, '2018-02-19 15:04:13', 1),
(91, 8, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-19 15:04:13', 1),
(92, 50, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-20 10:15:28', 1),
(93, 50, 'USD', 'E', 'web', 'Transfert', 8, '2018-02-20 10:15:28', 1),
(94, 2, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-20 10:15:28', 1),
(95, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-20 10:15:28', 1),
(96, 8, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-20 10:15:28', 1),
(97, 8, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-20 10:15:28', 1),
(98, 20, 'USD', 'S', 'web', 'Transfert', 8, '2018-02-20 12:34:05', 1),
(99, 20, 'USD', 'E', 'web', 'Transfert', 9, '2018-02-20 12:34:05', 1),
(100, 2, 'USD', 'S', 'web', 'Transfert', 8, '2018-02-20 12:34:05', 1),
(101, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-20 12:34:05', 1),
(102, 8, 'USD', 'S', 'web', 'Transfert', 8, '2018-02-20 12:34:05', 1),
(103, 8, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-20 12:34:05', 1),
(104, 100, 'USD', 'E', 'web', 'Depot', 9, '2018-02-20 21:15:28', 1),
(105, 500, 'USD', 'E', 'web', 'Depot', 9, '2018-02-20 21:15:52', 0),
(106, 150, 'USD', 'S', 'web', 'Retrait', 9, '2018-02-20 21:41:51', 1),
(107, 15, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-21 07:32:20', 1),
(108, 15, 'USD', 'E', 'web', 'Transfert', 8, '2018-02-21 07:32:20', 1),
(109, 2, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-21 07:32:20', 1),
(110, 2, 'USD', 'E', 'web', 'Transfert', 2, '2018-02-21 07:32:20', 1),
(111, 8, 'USD', 'S', 'web', 'Transfert', 9, '2018-02-21 07:32:20', 1),
(112, 8, 'USD', 'E', 'web', 'Transfert', 1, '2018-02-21 07:32:20', 1),
(113, 10, 'USD', 'E', 'web', 'Depot', 9, '2018-02-21 12:36:53', 1);

-- --------------------------------------------------------

--
-- Structure de la table `transfert`
--

CREATE TABLE IF NOT EXISTS `transfert` (
  `Idtransfert` int(15) NOT NULL AUTO_INCREMENT,
  `IdTransact_E` int(15) NOT NULL,
  `IdTransact_B` int(15) NOT NULL,
  `IdPlage` int(15) NOT NULL,
  `EtatTransfert` int(11) NOT NULL,
  PRIMARY KEY (`Idtransfert`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `transfert`
--

INSERT INTO `transfert` (`Idtransfert`, `IdTransact_E`, `IdTransact_B`, `IdPlage`, `EtatTransfert`) VALUES
(1, 1, 2, 2, 1),
(2, 19, 20, 0, 1),
(3, 25, 26, 0, 1),
(4, 32, 33, 1, 1),
(5, 38, 39, 1, 1),
(6, 44, 45, 1, 1),
(7, 50, 51, 1, 1),
(8, 56, 57, 1, 1),
(9, 72, 73, 1, 1),
(10, 80, 81, 1, 1),
(11, 86, 87, 2, 1),
(12, 92, 93, 1, 1),
(13, 98, 99, 1, 1),
(14, 107, 108, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `typeagent`
--

CREATE TABLE IF NOT EXISTS `typeagent` (
  `CodetypeAgent` varchar(15) NOT NULL,
  `LibTypeAgent` varchar(25) NOT NULL,
  PRIMARY KEY (`CodetypeAgent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typeagent`
--

INSERT INTO `typeagent` (`CodetypeAgent`, `LibTypeAgent`) VALUES
('Admin', 'Admin'),
('Gerant', 'Gerant'),
('Operateur', 'Operateur'),
('Superviseur', 'Superviseur');

-- --------------------------------------------------------

--
-- Structure de la table `typecompte`
--

CREATE TABLE IF NOT EXISTS `typecompte` (
  `CodeTypeCompte` varchar(15) NOT NULL,
  `LibTypeCompte` varchar(25) NOT NULL,
  `EtatTypeCompte` int(11) NOT NULL,
  PRIMARY KEY (`CodeTypeCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typecompte`
--

INSERT INTO `typecompte` (`CodeTypeCompte`, `LibTypeCompte`, `EtatTypeCompte`) VALUES
('Agence', 'Agence', 1),
('Agent', 'Agent', 1),
('Standard', 'Standard', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typepieceid`
--

CREATE TABLE IF NOT EXISTS `typepieceid` (
  `idTypePiece` int(11) NOT NULL AUTO_INCREMENT,
  `LibTypePiece` varchar(50) NOT NULL,
  `EtatTypePiece` int(11) NOT NULL,
  PRIMARY KEY (`idTypePiece`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typepieceid`
--

INSERT INTO `typepieceid` (`idTypePiece`, `LibTypePiece`, `EtatTypePiece`) VALUES
(1, 'Electeur', 1),
(2, 'Passeport', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typetransaction`
--

CREATE TABLE IF NOT EXISTS `typetransaction` (
  `CodeTypetransact` varchar(15) NOT NULL,
  `LibTypeTransact` varchar(25) NOT NULL,
  `Configuration` int(1) NOT NULL,
  PRIMARY KEY (`CodeTypetransact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typetransaction`
--

INSERT INTO `typetransaction` (`CodeTypetransact`, `LibTypeTransact`, `Configuration`) VALUES
('Depot', 'Depot', 1),
('Retrait', 'Retrait', 1),
('Transfert', 'Transfert', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `IdVille` int(15) NOT NULL AUTO_INCREMENT,
  `NomVille` text NOT NULL,
  `IdProvince` int(11) NOT NULL,
  PRIMARY KEY (`IdVille`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`IdVille`, `NomVille`, `IdProvince`) VALUES
(1, 'Poolo', 1);

-- --------------------------------------------------------

--
-- Structure de la table `virement`
--

CREATE TABLE IF NOT EXISTS `virement` (
  `IdVirement` int(15) NOT NULL AUTO_INCREMENT,
  `IdMouv` int(15) NOT NULL,
  `IdFinancement` int(15) NOT NULL,
  `EtatVirement` varchar(1) NOT NULL,
  PRIMARY KEY (`IdVirement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `virement`
--

INSERT INTO `virement` (`IdVirement`, `IdMouv`, `IdFinancement`, `EtatVirement`) VALUES
(15, 12, 19, '1'),
(16, 14, 20, '1'),
(17, 36, 21, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
