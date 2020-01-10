-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 07:36 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autodromo`
--
CREATE DATABASE Autodromo;
USE Autodromo;

-- --------------------------------------------------------

--
-- Table structure for table `eventi`
--

CREATE TABLE `eventi` (
  `IdEvento` varchar(20) NOT NULL,
  `DataI` datetime NOT NULL,
  `DataO` datetime NOT NULL,
  `Titolo` varchar(20) NOT NULL,
  `CodTipoE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventi`
--

INSERT INTO `eventi` (`IdEvento`, `DataI`, `DataO`, `Titolo`, `CodTipoE`) VALUES
('ev01', '2018-12-21 00:00:00', '2018-12-31 00:00:00', 'pista ghiaccaiata', 'Tev01'),
('ev02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'open cars', 'Tev01');

-- --------------------------------------------------------

--
-- Table structure for table `mezzi`
--

CREATE TABLE `mezzi` (
  `IdM` varchar(16) NOT NULL,
  `AnnoImmatricolazione` year(4) NOT NULL COMMENT 'Anno di immatricolazione',
  `Modello` varchar(16) NOT NULL,
  `Marca` varchar(15) NOT NULL,
  `Tipo` varchar(16) NOT NULL COMMENT 'da strada/da corsa/ecc'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mezzi`
--

INSERT INTO `mezzi` (`IdM`, `AnnoImmatricolazione`, `Modello`, `Marca`, `Tipo`) VALUES
('', 2000, 'cabrio 1600d', 'Fiat', 'strada'),
('auto01', 1999, 'Punto 1600d', 'Fiat', 'strada');

-- --------------------------------------------------------

--
-- Table structure for table `partecipanti`
--

CREATE TABLE `partecipanti` (
  `CF` varchar(16) NOT NULL DEFAULT '"xxx"',
  `Cognome` varchar(30) DEFAULT NULL,
  `Nome` varchar(30) NOT NULL,
  `Via` varchar(50) DEFAULT NULL,
  `Citta` varchar(20) DEFAULT NULL,
  `DataNascita` date NOT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PatenteLicenza` enum('patente','licenza') DEFAULT NULL,
  `DocumentoRiconoscimento` varchar(20) NOT NULL COMMENT 'Patente / C.I',
  `Password` varchar(32) NOT NULL,
  `Autorizzazione` enum('Amministratore','Visitatore') NOT NULL DEFAULT 'Visitatore',
  `DomandaSegreta` varchar(100) DEFAULT NULL,
  `RispostaSegreta` varchar(100) DEFAULT NULL,
  `Privacy` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partecipanti`
--

INSERT INTO `partecipanti` (`CF`, `Cognome`, `Nome`, `Via`, `Citta`, `DataNascita`, `Telefono`, `Email`, `PatenteLicenza`, `DocumentoRiconoscimento`, `Password`, `Autorizzazione`, `DomandaSegreta`, `RispostaSegreta`, `Privacy`) VALUES
('\"pippo\"', 'aaaa', '', NULL, NULL, '0000-00-00', NULL, NULL, 'patente', 'aaaaaaaxxxx556', 'pippo', 'Visitatore', NULL, NULL, 0),
('1234567890123456', 'ferri', 'nadia', 'garibaldi 100', 'FORNOVO DI TARO', '1969-10-12', '3397754177', 'nferri@gmail.com', 'patente', 'az222222', 'pippo', 'Visitatore', 'nome gatto', 'artù', 0),
('abcdfg99l12f222k', 'tommi', 'tommaso', 'roma 12', 'collecchio', '1999-12-12', '339776666', 'ttommi@gmail.com', 'patente', 'az222222', 'pippo', 'Visitatore', 'nome gatto', 'artù', 1),
('abcdfg99l12f443z', 'rossi', 'christian', 'R.Guttuso 10', 'Parma', '0000-00-00', '3296262977', 'crossi@virgilio.it', 'licenza', 'az22222255555', 'pippo', 'Visitatore', 'nome gatto', 'artù', 1),
('abclgzn62l23g211', 'Berti', 'Michele', 'Nazionale 99', 'Borgo val di Taro', '1998-12-25', '3457890001', 'aberti@virgilio.it', 'licenza', 'CI111113456789z', 'admin', 'Visitatore', NULL, NULL, 0),
('mnlgzn62l23g337k', 'Berti', 'Andrea', 'Nazionale 100', 'Borgo Val di Taro', '2000-12-25', '3337745109', 'admin@admin.com', 'patente', 'Paxz123456789z', 'admin', 'Visitatore', 'admin', 'admin', 0),
('zzzxxxx05l21g337', 'Picchio', 'Roberto', 'roma 1', 'Fornovo Taro', '2005-11-01', '3478900001', 'lopilatoraimondo@gmail.com', 'licenza', 'CI12345678', 'pippo', 'Visitatore', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `partecipantimezzi`
--

CREATE TABLE `partecipantimezzi` (
  `IdPM` varchar(16) NOT NULL,
  `DataUtilizzo` datetime NOT NULL,
  `IdP` varchar(16) NOT NULL,
  `IdM` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patriapodesta`
--

CREATE TABLE `patriapodesta` (
  `CFGenitore` varchar(16) NOT NULL,
  `tipologia` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patriapodesta`
--

INSERT INTO `patriapodesta` (`CFGenitore`, `tipologia`) VALUES
('abcmnl69l44x337k', 'padre');

-- --------------------------------------------------------

--
-- Table structure for table `scarichi`
--

CREATE TABLE `scarichi` (
  `idScarico` varchar(16) NOT NULL,
  `codGen` varchar(16) NOT NULL,
  `DataScarico` date NOT NULL,
  `codPar` varchar(16) NOT NULL,
  `codEv` varchar(20) NOT NULL,
  `DataPartecipazione` date NOT NULL,
  `oraIN` time DEFAULT NULL COMMENT 'ingresso pista',
  `oraOUT` time DEFAULT NULL COMMENT 'uscita pista',
  `trasponder` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scarichi`
--

INSERT INTO `scarichi` (`idScarico`, `codGen`, `DataScarico`, `codPar`, `codEv`, `DataPartecipazione`, `oraIN`, `oraOUT`, `trasponder`) VALUES
('sc01', 'abcmnl69l44x337k', '2018-12-14', 'mnlgzn62l23g337k', 'ev01', '2018-12-31', '16:00:00', '19:00:00', '0001');

-- --------------------------------------------------------

--
-- Table structure for table `tipieventi`
--

CREATE TABLE `tipieventi` (
  `IdTipoE` varchar(10) NOT NULL,
  `Descrizione` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipieventi`
--

INSERT INTO `tipieventi` (`IdTipoE`, `Descrizione`) VALUES
('Tev01', 'rally'),
('Tev02', 'camion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventi`
--
ALTER TABLE `eventi`
  ADD PRIMARY KEY (`IdEvento`),
  ADD KEY `CodTipoE` (`CodTipoE`);

--
-- Indexes for table `mezzi`
--
ALTER TABLE `mezzi`
  ADD PRIMARY KEY (`IdM`);

--
-- Indexes for table `partecipanti`
--
ALTER TABLE `partecipanti`
  ADD PRIMARY KEY (`CF`);

--
-- Indexes for table `partecipantimezzi`
--
ALTER TABLE `partecipantimezzi`
  ADD PRIMARY KEY (`IdPM`),
  ADD KEY `IdP` (`IdP`),
  ADD KEY `IdM` (`IdM`);

--
-- Indexes for table `patriapodesta`
--
ALTER TABLE `patriapodesta`
  ADD PRIMARY KEY (`CFGenitore`);

--
-- Indexes for table `scarichi`
--
ALTER TABLE `scarichi`
  ADD PRIMARY KEY (`idScarico`),
  ADD KEY `codGen` (`codGen`),
  ADD KEY `codPar` (`codPar`),
  ADD KEY `scarichi_ibfk_3` (`codEv`);

--
-- Indexes for table `tipieventi`
--
ALTER TABLE `tipieventi`
  ADD PRIMARY KEY (`IdTipoE`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventi`
--
ALTER TABLE `eventi`
  ADD CONSTRAINT `eventi_ibfk_1` FOREIGN KEY (`CodTipoE`) REFERENCES `tipieventi` (`IdTipoE`);

--
-- Constraints for table `partecipantimezzi`
--
ALTER TABLE `partecipantimezzi`
  ADD CONSTRAINT `partecipantimezzi_ibfk_1` FOREIGN KEY (`IdP`) REFERENCES `partecipanti` (`CF`),
  ADD CONSTRAINT `partecipantimezzi_ibfk_2` FOREIGN KEY (`IdM`) REFERENCES `mezzi` (`IdM`);

--
-- Constraints for table `scarichi`
--
ALTER TABLE `scarichi`
  ADD CONSTRAINT `scarichi_ibfk_1` FOREIGN KEY (`codGen`) REFERENCES `patriapodesta` (`CFGenitore`),
  ADD CONSTRAINT `scarichi_ibfk_2` FOREIGN KEY (`codPar`) REFERENCES `partecipanti` (`CF`),
  ADD CONSTRAINT `scarichi_ibfk_3` FOREIGN KEY (`codEv`) REFERENCES `eventi` (`IdEvento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
