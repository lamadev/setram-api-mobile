-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 03 Janvier 2018 à 12:14
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
  `Commune` text NOT NULL,
  `IdClient` int(11) NOT NULL,
  `IdVille` int(15) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `affecter`
--

INSERT INTO `affecter` (`IdAffecter`, `IdAgence`, `IdAgent`, `DateHeur_Save`, `EtatAffecter`) VALUES
(1, 1, 1, '2017-12-30 09:20:47', 1),
(2, 2, 2, '2017-12-30 09:21:25', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `agence`
--

INSERT INTO `agence` (`IdAgence`, `NomAgence`, `AdresseAgence`, `PhoneAgence`, `EtatAgence`) VALUES
(1, 'KINSHASA MASINA', 'UUUUUUUUUU', '888888888888', 1),
(2, 'GOMBE', 'xxxxxxxxxxx', '99999999999', 1),
(3, 'KIMBANSEKE', 'xxxxxxxxxxx', '99999999999', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`IdAgent`, `NomAg`, `PostnomAg`, `PrenomAg`, `SexeAg`, `PhoneAg`, `Login`, `Mdp`, `CodeTypeAgent`, `EtatAg`) VALUES
(1, 'NGOY', 'REMY', 'Remy', 'M', '77777777777', 'RNgoy', '1111', '1', 1),
(2, 'MPELA', 'BELENGE', 'Stela', 'F', '999999999999', 'Mstela', '1111', '2', 1);

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
  `Adresse` text NOT NULL,
  `IdTypePiece` int(15) NOT NULL,
  PRIMARY KEY (`IdClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`IdClient`, `Nom`, `Postnom`, `Prenom`, `Sexe`, `DateNaiss`, `Phone`, `Adresse`, `IdTypePiece`) VALUES
(1, 'Nsawula', 'Auguy', 'Auguy', 'M', '25-10-1995', '8888888', 'rrrrrrrrrrr', 1),
(2, 'KOKO', 'LOWERSS', 'TELECOM', 'M', '25-10-1988', '854744444', 'JJJJJJJJJJ', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `compteb`
--

INSERT INTO `compteb` (`IdCompte`, `NumCompte`, `Solde`, `CodeMonnaie`, `CodeTypeCompte`, `IdClient`, `IdAgence`, `DateHeurCree`, `EtatCompteB`) VALUES
(3, '4589632', 500, '1', '1', 1, 1, '2017-12-30 11:03:51', 1),
(4, '4589630', 500, '1', '1', 2, 1, '2017-12-30 11:04:22', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `concerner`
--

INSERT INTO `concerner` (`IdConcerner`, `IdTransact`, `IdFrais`, `Montant`, `CodeMonnaie`) VALUES
(1, 1, 2, 50, '1'),
(2, 2, 2, 20, '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `effectuer`
--

INSERT INTO `effectuer` (`IdEffect`, `IdAgent`, `IdTransact`, `IdAgence`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `frais`
--

INSERT INTO `frais` (`IdFrais`, `Montant`, `CodeMonnaie`, `Description`, `EtatFrais`, `Destination`) VALUES
(2, 35, '1', 'Tenu de compte', 1, 'xxxxxxxxxxx'),
(3, 20, '1', 'Frais Transfert', 1, 'bbbbbbbbbbbbbb');

-- --------------------------------------------------------

--
-- Structure de la table `monnaie`
--

CREATE TABLE IF NOT EXISTS `monnaie` (
  `CodeMonnaie` varchar(15) NOT NULL,
  `Libmonnaie` varchar(15) NOT NULL,
  `EtatMonnaie` int(1) NOT NULL,
  PRIMARY KEY (`CodeMonnaie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `monnaie`
--

INSERT INTO `monnaie` (`CodeMonnaie`, `Libmonnaie`, `EtatMonnaie`) VALUES
('1', 'usd', 1),
('2', 'cdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `IdPays` int(15) NOT NULL AUTO_INCREMENT,
  `NomPays` text NOT NULL,
  `CodePays` varchar(15) NOT NULL,
  PRIMARY KEY (`IdPays`)
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
  PRIMARY KEY (`IdPlage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `plage`
--

INSERT INTO `plage` (`IdPlage`, `BorneInf`, `BornSuper`, `TypePlage`, `MonntantPlage`, `CodeMonnaie`, `EtatPlage`) VALUES
(1, 5, 100, 'Pourcentage', 10, '1', 1),
(2, 100, 1000, 'Pourcentage', 20, '1', 1);

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
  `DateHeurEdit` timestamp NOT NULL,
  `EtatTransact` int(1) NOT NULL,
  PRIMARY KEY (`IdTransact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `transaction`
--

INSERT INTO `transaction` (`IdTransact`, `MontantTransact`, `CodeMonnaie`, `Sens`, `MoyenTransact`, `CodeTypeTransact`, `IdCompte`, `DateHeurEdit`, `EtatTransact`) VALUES
(1, 500, '1', 'E', 'SMS', '1', 3, '2017-12-30 12:04:44', 1),
(2, 30, '2', 'S', 'SMS', '1', 3, '2017-12-30 13:56:00', 1),
(3, 10, '1', 'E', 'M', '-', 4, '2017-12-30 14:10:26', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `transfert`
--

INSERT INTO `transfert` (`Idtransfert`, `IdTransact_E`, `IdTransact_B`, `IdPlage`, `EtatTransfert`) VALUES
(1, 1, 2, 300, 1);

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
('1', 'opérateur'),
('2', 'superviseur');

-- --------------------------------------------------------

--
-- Structure de la table `typecompte`
--

CREATE TABLE IF NOT EXISTS `typecompte` (
  `CodeTypeCompte` varchar(15) NOT NULL,
  `LibTypeCompte` varchar(25) NOT NULL,
  PRIMARY KEY (`CodeTypeCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typecompte`
--

INSERT INTO `typecompte` (`CodeTypeCompte`, `LibTypeCompte`) VALUES
('1', 'Epargne');

-- --------------------------------------------------------

--
-- Structure de la table `typepiece`
--

CREATE TABLE IF NOT EXISTS `typepiece` (
  `IdTypePiece` int(15) NOT NULL AUTO_INCREMENT,
  `LibTypePiece` varchar(50) NOT NULL,
  `NumPiece` int(25) NOT NULL,
  `CapturePiece` text NOT NULL,
  `DatExpir` date NOT NULL,
  PRIMARY KEY (`IdTypePiece`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `typepiece`
--

INSERT INTO `typepiece` (`IdTypePiece`, `LibTypePiece`, `NumPiece`, `CapturePiece`, `DatExpir`) VALUES
(1, 'Electeur', 569874, 'gheyruiopghr', '0000-00-00');

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
('1', 'Depot', 1),
('2', 'Retrait', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `IdVille` int(15) NOT NULL AUTO_INCREMENT,
  `NomVille` text NOT NULL,
  `IdProvince` int(11) NOT NULL,
  PRIMARY KEY (`IdVille`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
