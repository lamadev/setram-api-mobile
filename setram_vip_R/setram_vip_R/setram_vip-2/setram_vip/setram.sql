-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 30 Janvier 2018 à 14:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `setram`
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
  `IdProv` int(15) NOT NULL,
  PRIMARY KEY (`IdAdresse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `affecter`
--

INSERT INTO `affecter` (`IdAffecter`, `IdAgence`, `IdAgent`, `DateHeur_Save`, `EtatAffecter`) VALUES
(1, 1, 1, '2017-12-30 09:20:47', 1),
(2, 2, 2, '2017-12-30 09:21:25', 1),
(3, 1, 3, '2018-01-05 23:02:05', 1),
(4, 2, 4, '2018-01-05 23:06:37', 1),
(5, 2, 5, '2018-01-05 23:07:08', 1),
(6, 2, 6, '2018-01-05 23:09:03', 1),
(7, 2, 7, '2018-01-05 23:13:14', 1),
(8, 3, 8, '2018-01-05 23:14:55', 1),
(9, 1, 9, '2018-01-05 23:19:10', 1),
(10, 1, 10, '2018-01-06 16:08:32', 1),
(11, 1, 11, '2018-01-06 16:12:48', 1);

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
  PRIMARY KEY (`IdAgence`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `agence`
--

INSERT INTO `agence` (`IdAgence`, `NomAgence`, `AdresseAgence`, `PhoneAgence`, `EtatAgence`) VALUES
(1, 'KINSHASA MASINA', 'UUUUUUUUUU', '888888888888', 1),
(2, 'GOMBE', 'xxxxxxxxxxx', '99999999999', 1),
(3, 'KIMBANSEKE', 'xxxxxxxxxxx', '99999999999', 1),
(4, 'KINSHASA-ZANDO', 'QQQQQQQQQQQQQQQ', '', 1),
(8, 'KINSHASA-GOMBE', 'tttttttttttttttttttttt', '0851509369', 1),
(9, 'direction', 'xxxxxxxxxxxx', 'xxxxxxxxx', 1),
(10, 'Ngaba', '1260, Av. Laîc, Q/ Ngaba, C/Ngaba', '0851509369', 1);

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
  PRIMARY KEY (`IdAgent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`IdAgent`, `NomAg`, `PostnomAg`, `PrenomAg`, `SexeAg`, `PhoneAg`, `Login`, `Mdp`, `CodeTypeAgent`, `EtatAg`) VALUES
(1, 'NGOY', 'REMY', 'Remy', 'M', '77777777777', 'RNgoy', '1111', '1', 1),
(2, 'MPELA', 'BELENGE', 'Stela', 'F', '999999999999', 'Mstela', '1111', '2', 1),
(3, 'NGOY', 'REMY', 'Remy', 'M', '0851509369', 'deo193', 'deo', 'User', 1),
(4, 'Mpela', 'Bolenge', 'stela', 'F', '789654123', 'Smpela', '1111', 'User', 1),
(5, 'Mpela', 'Bolenge', 'stela', 'F', '789654123', 'Smpela', '1111', 'User', 1),
(6, 'Mpela', 'Bolenge', 'stela', 'F', '789654123', 'Smpela', '1111', 'User', 1),
(7, 'Mpela', 'Bolenge', 'stela', 'F', '789654123', 'Smpela', '1111', 'User', 1),
(8, 'Bola', 'LOKOLI', 'Patrick', 'M', '789654123', 'Pbola', '1111', '1', 1),
(9, 'MASINI', 'JOHN', 'John', 'M', '0851509369', 'john', '$1$At4.Ju2.$0SwEvtU2xjZ3emVHfF2461', '2', 1),
(10, 'Bola', 'LOKOLI', 'Patrick', 'M', '789654123', 'bola', '$1$Bn4.0a5.$8ZLS6E37gKTU.4EgN6JQn.', '1', 1),
(11, 'Ekole', 'disashi', 'isaac', 'M', '0851509369', 'ekole', '$1$P/1.s1..$Y4gGC3WJXMB3hszntbpXg/', '3', 1);

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
  `DateNaiss` varchar(15) NOT NULL,
  `Phone` varchar(14) NOT NULL,
  `IdPiece` int(15) NOT NULL,
  PRIMARY KEY (`IdClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IdClient`, `Nom`, `Postnom`, `Prenom`, `Sexe`, `DateNaiss`, `Phone`, `IdPiece`) VALUES
(1, 'Nsawula', 'Auguy', 'Auguy', 'M', '25-10-1995', '8888888', 1),
(2, 'KOKO', 'LOWERSS', 'TELECOM', 'M', '25-10-1988', '854744444', 1),
(3, 'KINSHASA-MASINA', '-', '-', '-', '-', '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `compteb`
--

INSERT INTO `compteb` (`IdCompte`, `NumCompte`, `Solde`, `CodeMonnaie`, `CodeTypeCompte`, `IdClient`, `IdAgence`, `DateHeurCree`, `EtatCompteB`) VALUES
(3, '4589632', 89.55, '1', '1', 1, 1, '2017-12-30 11:03:51', 1),
(4, '4589630', 524.7, '1', '1', 2, 1, '2017-12-30 11:04:22', 1),
(5, '235698', 12.25, '1', '2', 3, 1, '2018-01-20 22:36:50', 1),
(6, '9638756', 0, '2', '2', 3, 1, '2018-01-20 22:36:50', 1),
(7, '8585769', 80, '1', '3', 4, 1, '2018-01-20 22:38:41', 1);

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

CREATE TABLE IF NOT EXISTS `concerner` (
  `IdConcerner` int(15) NOT NULL AUTO_INCREMENT,
  `IdTransact` int(15) NOT NULL,
  `IdFrais` int(15) NOT NULL,
  `Montant` double NOT NULL,
  `CodeMonnaie` varchar(15) NOT NULL,
  PRIMARY KEY (`IdConcerner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Contenu de la table `concerner`
--

INSERT INTO `concerner` (`IdConcerner`, `IdTransact`, `IdFrais`, `Montant`, `CodeMonnaie`) VALUES
(66, 110, 3, 0, '1'),
(67, 111, 4, 5, '1'),
(68, 112, 3, 0, '1'),
(69, 113, 4, 5, '1'),
(70, 114, 3, 0, '1'),
(71, 115, 4, 5, '1'),
(72, 116, 3, 0, '1'),
(73, 117, 4, 5, '1'),
(74, 118, 3, 0, '1'),
(75, 119, 4, 5, '1'),
(76, 120, 3, 5, '1'),
(77, 121, 4, 5, '1'),
(78, 122, 3, 0.3, '1'),
(79, 123, 4, 5, '1'),
(80, 155, 3, 0.3, '1'),
(81, 156, 4, 5, '1'),
(82, 161, 3, 0.45, '1'),
(83, 162, 4, 5, '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `depense`
--

INSERT INTO `depense` (`IdDepense`, `Motif`, `IdMouv`, `Etatdep`) VALUES
(4, 'Transport agents', 20, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Contenu de la table `effectuer`
--

INSERT INTO `effectuer` (`IdEffect`, `IdAgent`, `IdTransact`, `IdAgence`) VALUES
(64, 10, 110, 1),
(65, 10, 112, 1),
(66, 10, 114, 1),
(67, 10, 116, 1),
(68, 10, 118, 1),
(69, 10, 120, 1),
(70, 10, 122, 1),
(71, 10, 124, 1),
(72, 10, 125, 1),
(73, 10, 126, 1),
(74, 10, 127, 1),
(75, 10, 128, 1),
(76, 10, 129, 1),
(77, 10, 130, 1),
(78, 10, 131, 1),
(79, 10, 132, 1),
(80, 10, 133, 1),
(81, 10, 134, 1),
(82, 10, 135, 1),
(83, 10, 136, 1),
(84, 10, 137, 1),
(85, 10, 138, 1),
(86, 10, 139, 1),
(87, 10, 140, 1),
(88, 10, 141, 1),
(89, 10, 142, 1),
(90, 10, 143, 1),
(91, 10, 144, 1),
(92, 10, 145, 1),
(93, 10, 146, 1),
(94, 10, 147, 1),
(95, 10, 148, 1),
(96, 10, 149, 1),
(97, 10, 150, 1),
(98, 10, 151, 1),
(99, 10, 152, 1),
(100, 10, 153, 1),
(101, 10, 154, 1),
(102, 10, 155, 1),
(103, 10, 157, 1),
(104, 10, 158, 1),
(105, 10, 159, 1),
(106, 10, 160, 1),
(107, 10, 161, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `financement`
--

INSERT INTO `financement` (`IdFinancement`, `Motif`, `IdMouv`, `DateHeure`, `IdAgence`, `EtatFinancement`) VALUES
(19, 'ravitaillement', 11, '2018-01-16 16:49:18', 1, '1'),
(20, 'Financement agence', 13, '2018-01-16 16:50:26', 1, '1');

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
  PRIMARY KEY (`IdFrais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `frais`
--

INSERT INTO `frais` (`IdFrais`, `Montant`, `CodeMonnaie`, `Description`, `EtatFrais`, `Destination`) VALUES
(2, 35, '1', 'Tenu de compte', 1, 'direction'),
(3, 20, '1', 'transfert', 1, 'agence'),
(4, 5, '1', 'sms', 1, 'direction'),
(5, 56000, '2', 'sms', 1, 'agence');

-- --------------------------------------------------------

--
-- Structure de la table `monnaie`
--

CREATE TABLE IF NOT EXISTS `monnaie` (
  `CodeMonnaie` varchar(15) NOT NULL,
  `Libmonnaie` varchar(15) NOT NULL,
  `Minim` double NOT NULL,
  `EtatMonnaie` int(1) NOT NULL,
  PRIMARY KEY (`CodeMonnaie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `monnaie`
--

INSERT INTO `monnaie` (`CodeMonnaie`, `Libmonnaie`, `Minim`, `EtatMonnaie`) VALUES
('1', 'USD', 35, 1),
('2', 'CDF', 56000, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `mouvement`
--

INSERT INTO `mouvement` (`IdMouv`, `Montant`, `CodeMonnaie`, `Type`, `Sens`, `IdAgence`, `IdAgent`, `DateMouv`, `EtatMouv`) VALUES
(11, 50, '1', 'Financement', 'E', 2, 10, '2018-01-16 16:49:18', 1),
(12, 50, '1', 'Virement', 'S', 1, 10, '2018-01-16 16:49:18', 1),
(13, 10, '1', 'Financement', 'E', 3, 10, '2018-01-16 16:50:26', 1),
(14, 10, '1', 'Virement', 'S', 1, 10, '2018-01-16 16:50:26', 1),
(20, 50, '1', 'Depense', 'S', 1, 10, '2018-01-16 17:11:06', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `IdPays` int(15) NOT NULL AUTO_INCREMENT,
  `NomFrancais` text NOT NULL,
  `CodePays` varchar(15) NOT NULL,
  PRIMARY KEY (`IdPays`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pieceid`
--

CREATE TABLE IF NOT EXISTS `pieceid` (
  `IdPiece` int(15) NOT NULL AUTO_INCREMENT,
  `NumPiece` int(25) NOT NULL,
  `CapturePiece` text NOT NULL,
  `DatExpir` date NOT NULL,
  `IdTypePiece` int(15) NOT NULL,
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
  `MonntantPlage` double NOT NULL,
  `CodeMonnaie` varchar(15) NOT NULL,
  `EtatPlage` int(1) NOT NULL,
  `IdFrais` int(15) NOT NULL,
  PRIMARY KEY (`IdPlage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `plage`
--

INSERT INTO `plage` (`IdPlage`, `BorneInf`, `BornSuper`, `TypePlage`, `MonntantPlage`, `CodeMonnaie`, `EtatPlage`, `IdFrais`) VALUES
(1, 5, 99, 'P', 3, '1', 1, 3),
(2, 100, 1000, 'F', 5, '1', 1, 3);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `securite`
--

CREATE TABLE IF NOT EXISTS `securite` (
  `IdSecurite` int(15) NOT NULL AUTO_INCREMENT,
  `Signature` text NOT NULL,
  `Photo` text NOT NULL,
  `Empreinte` text NOT NULL,
  `PIN` varchar(15) NOT NULL,
  `IdCompte` int(15) NOT NULL,
  PRIMARY KEY (`IdSecurite`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `securite`
--

INSERT INTO `securite` (`IdSecurite`, `Signature`, `Photo`, `Empreinte`, `PIN`, `IdCompte`) VALUES
(2, 'ghdtxcdds', 'hyuueuueueueue', 'lopmmgghshsh', '1111', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Contenu de la table `transaction`
--

INSERT INTO `transaction` (`IdTransact`, `MontantTransact`, `CodeMonnaie`, `Sens`, `MoyenTransact`, `CodeTypeTransact`, `IdCompte`, `DateTransact`, `EtatTransact`) VALUES
(110, 100, '1', 'S', 'web', 'Transfert', 3, '2018-01-23 12:05:07', 1),
(111, 100, '1', 'E', 'web', 'Transfert', 4, '2018-01-23 12:05:07', 1),
(112, 100, '1', 'S', 'web', 'Transfert', 3, '2018-01-23 12:12:12', 1),
(113, 100, '1', 'E', 'web', 'Transfert', 4, '2018-01-23 12:12:12', 1),
(114, 100, '1', 'S', 'web', '3', 3, '2018-01-23 12:13:27', 1),
(115, 100, '1', 'E', 'web', '3', 4, '2018-01-23 12:13:27', 1),
(116, 100, '1', 'S', 'web', '3', 3, '2018-01-23 14:30:40', 1),
(117, 100, '1', 'E', 'web', '3', 4, '2018-01-23 14:30:40', 1),
(118, 100, '1', 'S', 'web', '3', 3, '2018-01-23 14:38:45', 1),
(119, 100, '1', 'E', 'web', '3', 4, '2018-01-23 14:38:45', 1),
(120, 100, '1', 'S', 'web', '3', 3, '2018-01-23 14:51:40', 1),
(121, 100, '1', 'E', 'web', '3', 4, '2018-01-23 14:51:41', 1),
(122, 10, '1', 'S', 'web', '3', 3, '2018-01-23 14:59:20', 1),
(123, 10, '1', 'E', 'web', '3', 4, '2018-01-23 14:59:20', 1),
(124, 150, '1', 'E', 'web', 'Depot', 3, '2018-01-24 07:25:13', 1),
(125, 20, '1', 'E', 'web', 'Depot', 3, '2018-01-24 07:33:59', 1),
(126, 35, '1', 'S', 'web', 'Retrait', 3, '2018-01-24 07:40:17', 1),
(127, 20, '1', 'S', 'web', 'Retrait', 3, '2018-01-24 07:40:35', 1),
(128, 0, '1', 'S', 'web', '2', 3, '2018-01-27 11:29:09', 1),
(129, 0, '1', 'S', 'web', '2', 3, '2018-01-27 11:30:27', 1),
(130, 0, '1', 'S', 'web', '2', 3, '2018-01-27 11:31:23', 1),
(131, 0, '1', 'S', 'web', '2', 3, '2018-01-27 11:31:46', 1),
(132, 0, '1', 'S', 'web', '2', 3, '2018-01-27 11:32:27', 1),
(133, 10, '1', 'S', 'web', '2', 3, '2018-01-27 11:32:59', 1),
(134, 0, '1', 'S', 'web', '2', 3, '2018-01-27 11:34:15', 1),
(135, 0, '1', 'S', 'web', '2', 3, '2018-01-27 11:35:22', 1),
(136, 0, '1', 'S', 'web', '2', 3, '2018-01-27 11:35:37', 1),
(137, 0, '1', 'S', 'web', '2', 4, '2018-01-27 11:39:07', 1),
(138, 0, '1', 'S', 'web', '2', 4, '2018-01-27 11:39:34', 1),
(139, 0, '1', 'S', 'web', '2', 4, '2018-01-27 11:39:44', 1),
(140, 10, '1', 'S', 'web', '2', 3, '2018-01-27 11:42:22', 1),
(141, 50, '1', 'S', 'web', '2', 4, '2018-01-27 11:44:06', 1),
(142, 50, '1', 'S', 'web', '2', 4, '2018-01-27 11:49:32', 1),
(143, 20, '1', 'E', 'web', '1', 4, '2018-01-27 11:53:19', 1),
(144, 0, '1', 'S', 'web', '2', 4, '2018-01-27 11:53:46', 1),
(145, 0, '1', 'S', 'web', '2', 4, '2018-01-27 11:54:27', 1),
(146, 0, '1', 'S', 'web', '2', 4, '2018-01-27 12:02:29', 1),
(147, 0, '1', 'S', 'web', '2', 4, '2018-01-27 12:02:35', 1),
(148, 0, '1', 'S', 'web', '2', 3, '2018-01-27 12:03:32', 1),
(149, 100, '1', 'S', 'web', '2', 3, '2018-01-27 12:33:01', 1),
(150, 15, '1', 'S', 'web', '2', 3, '2018-01-27 12:44:08', 1),
(151, 17, '1', 'S', 'web', '2', 3, '2018-01-27 12:48:30', 1),
(152, 5, '1', 'S', 'web', '2', 3, '2018-01-27 12:51:52', 1),
(153, 12, '1', 'E', 'web', '1', 3, '2018-01-27 12:58:48', 1),
(154, 10, '1', 'E', 'web', '1', 4, '2018-01-27 13:00:22', 1),
(155, 10, '1', 'S', 'web', '3', 4, '2018-01-30 08:34:48', 1),
(156, 10, '1', 'E', 'web', '3', 0, '2018-01-30 08:34:48', 1),
(157, 10, '1', 'E', 'web', '1', 4, '2018-01-30 10:50:03', 1),
(158, 20, '1', 'E', 'web', '1', 3, '2018-01-30 11:03:49', 1),
(159, 10, '1', 'E', 'web', 'Depot', 3, '2018-01-30 13:01:04', 1),
(160, 5, '1', 'S', 'web', 'Retrait', 3, '2018-01-30 13:01:38', 1),
(161, 15, '1', 'S', 'web', 'Transfert', 3, '2018-01-30 13:02:42', 1),
(162, 15, '1', 'E', 'web', 'Transfert', 4, '2018-01-30 13:02:42', 1);

-- --------------------------------------------------------

--
-- Structure de la table `transfert`
--

CREATE TABLE IF NOT EXISTS `transfert` (
  `Idtransfert` int(15) NOT NULL AUTO_INCREMENT,
  `IdTransact_E` int(15) NOT NULL,
  `IdTransact_B` int(15) NOT NULL,
  `IdPlage` int(15) NOT NULL,
  `EtatTransfert` int(1) NOT NULL,
  PRIMARY KEY (`Idtransfert`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `transfert`
--

INSERT INTO `transfert` (`Idtransfert`, `IdTransact_E`, `IdTransact_B`, `IdPlage`, `EtatTransfert`) VALUES
(22, 94, 95, 1, 1),
(23, 96, 97, 1, 1),
(24, 98, 99, 1, 1),
(26, 102, 103, 2, 1),
(27, 104, 105, 2, 1),
(28, 106, 107, 2, 1),
(29, 108, 109, 2, 1),
(30, 110, 111, 2, 1),
(31, 112, 113, 2, 1),
(32, 114, 115, 2, 1),
(33, 116, 117, 2, 1),
(34, 118, 119, 2, 1),
(35, 120, 121, 2, 1),
(36, 122, 123, 1, 1),
(37, 155, 156, 1, 1),
(38, 161, 162, 1, 1);

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
('1', 'Operateur'),
('2', 'Gerant'),
('3', 'Admin'),
('4', 'Superviseur');

-- --------------------------------------------------------

--
-- Structure de la table `typecompte`
--

CREATE TABLE IF NOT EXISTS `typecompte` (
  `CodeTypeCompte` varchar(15) NOT NULL,
  `LibTypeCompte` varchar(25) NOT NULL,
  `EtatTypeCompte` int(1) NOT NULL,
  PRIMARY KEY (`CodeTypeCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typecompte`
--

INSERT INTO `typecompte` (`CodeTypeCompte`, `LibTypeCompte`, `EtatTypeCompte`) VALUES
('1', 'Epargne', 1),
('2', 'agence', 1),
('3', 'direction', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typepiece`
--

CREATE TABLE IF NOT EXISTS `typepiece` (
  `IdTypePiece` int(15) NOT NULL AUTO_INCREMENT,
  `LibTypePiece` varchar(50) NOT NULL,
  PRIMARY KEY (`IdTypePiece`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `typepiece`
--

INSERT INTO `typepiece` (`IdTypePiece`, `LibTypePiece`) VALUES
(1, 'Electeur');

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
('Depot', 'Depot', 0),
('Retrait', 'Retrait', 0),
('Transfert', 'Transfert', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `virement`
--

INSERT INTO `virement` (`IdVirement`, `IdMouv`, `IdFinancement`, `EtatVirement`) VALUES
(15, 12, 19, '1'),
(16, 14, 20, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
