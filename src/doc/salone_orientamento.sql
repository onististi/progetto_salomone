-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 alle 10:10
-- Versione del server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `salone_orientamento`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `attivita`
--

CREATE TABLE IF NOT EXISTS `attivita` (
`id_attivita` int(11) NOT NULL,
  `titolo` text NOT NULL,
  `descrizione` text NOT NULL,
  `logo` text NOT NULL,
  `giorno` date NOT NULL,
  `ora` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=16 ;

--
-- Dump dei dati per la tabella `attivita`
--

INSERT INTO `attivita` (`id_attivita`, `titolo`, `descrizione`, `logo`, `giorno`, `ora`) VALUES
(5, 'AAAAafsdfsdfsdfsdf', 'edeqweqweqwe', '../uploads/AAAA.jpeg', '2021-11-12', '11:30:00'),
(12, 'RwondoBislungo', 'BISLUNGO', '../uploads/AAAA.jpeg', '2021-11-12', '10:30:00'),
(14, 'CIAOOO', 'il mio stand Ã¨ bello!', '../uploads/ZZZZ.jpeg', '2021-11-13', '09:30:00'),
(15, 'MARCO', 'sono bello!', '../uploads/ZZZZ.jpeg', '2021-11-13', '11:30:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `azienda`
--

CREATE TABLE IF NOT EXISTS `azienda` (
  `codice` varchar(10) NOT NULL,
  `nome` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `azienda`
--

INSERT INTO `azienda` (`codice`, `nome`, `password`) VALUES
('ZZZZ', 'Tiziano Inc.', '5678');

-- --------------------------------------------------------

--
-- Struttura della tabella `iscrizione`
--

CREATE TABLE IF NOT EXISTS `iscrizione` (
  `fk_matricola` varchar(10) NOT NULL,
  `fk_attivita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `iscrizione`
--

INSERT INTO `iscrizione` (`fk_matricola`, `fk_attivita`) VALUES
('2035772', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `registra_attivita`
--

CREATE TABLE IF NOT EXISTS `registra_attivita` (
  `id_azienda` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_scuola_secondo_grado` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_universita` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_attivita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=sjis COLLATE=sjis_bin;

--
-- Dump dei dati per la tabella `registra_attivita`
--

INSERT INTO `registra_attivita` (`id_azienda`, `id_scuola_secondo_grado`, `id_universita`, `id_attivita`) VALUES
(NULL, 'AAAA', NULL, 5),
(NULL, 'AAAA', NULL, 12),
('ZZZZ', NULL, NULL, 14),
('ZZZZ', NULL, NULL, 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `responsabile`
--

CREATE TABLE IF NOT EXISTS `responsabile` (
`id_responsabile` int(11) NOT NULL,
  `fk_attivita` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL,
  `mail` text NOT NULL,
  `qualifica` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `scuola_primo_grado`
--

CREATE TABLE IF NOT EXISTS `scuola_primo_grado` (
  `codice` varchar(10) NOT NULL,
  `nome` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `scuola_primo_grado`
--

INSERT INTO `scuola_primo_grado` (`codice`, `nome`, `password`) VALUES
('PPPP', 'Scuola Media di Cannobio', '1234');

-- --------------------------------------------------------

--
-- Struttura della tabella `scuola_secondo_grado`
--

CREATE TABLE IF NOT EXISTS `scuola_secondo_grado` (
  `codice` varchar(10) NOT NULL,
  `nome` text NOT NULL,
  `password` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `scuola_secondo_grado`
--

INSERT INTO `scuola_secondo_grado` (`codice`, `nome`, `password`, `logo`) VALUES
('AAAA', 'Scuola JACOP', '1234', ''),
('VBTF00701B', 'Lorenzo Cobianchi', '1234', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `studente`
--

CREATE TABLE IF NOT EXISTS `studente` (
  `matricola` varchar(10) NOT NULL,
  `fk_scuola` varchar(10) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL,
  `sesso` varchar(1) NOT NULL,
  `mail` text NOT NULL,
  `classe` text NOT NULL,
  `data_nascita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `studente`
--

INSERT INTO `studente` (`matricola`, `fk_scuola`, `username`, `password`, `nome`, `cognome`, `sesso`, `mail`, `classe`, `data_nascita`) VALUES
('2035771', 'AAAA', 'jacopo.guzzo', '$5$idkanysus$xsWHKXTUD/JRnAp6BvWyKbKzXl7/JqGg6MDnIQjHOW6', 'Jacopo', 'Guzzo', 'M', 'jacopo.guzzo@edu.cobianchi.it', '5AITI', '2002-09-05'),
('2035772', 'AAAA', 'tiziano_yahtahey.tedeschi', '$5$idkanysus$M6KDTpY/GEpkF4TFs8N/DnZPYnVdHRsenZXi7IFwOI7', 'Tiziano Yahtahey', 'Tedeschi', 'M', 'tiziano.tedeschi@edu.cobianchi.it', '5AITI', '2002-10-17'),
('2035773', 'AAAA', 'aronne.onisti', '$5$idkanysus$eSv2NX9Zqv6ZL/qRTjq6zGg1f03p7Morjce6Y45BVw8', 'Aronne', 'Onisti', 'M', 'aronne.onisti@edu.cobianchi.it', '5AITI', '2002-11-22'),
('2035774', 'AAAA', 'marco.fallara', '$5$idkanysus$Cr2ZMkDTLs68h4/uoJnTNbP5C9OWS6rTVyV4X16Qs0D', 'Marco', 'Fallara', 'M', 'marco.fallara@edu.cobianchi.it', '5AITI', '2002-08-07');

-- --------------------------------------------------------

--
-- Struttura della tabella `universita`
--

CREATE TABLE IF NOT EXISTS `universita` (
  `codice` varchar(10) NOT NULL,
  `nome` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `universita`
--

INSERT INTO `universita` (`codice`, `nome`, `password`) VALUES
('UUUU', 'Unito', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attivita`
--
ALTER TABLE `attivita`
 ADD PRIMARY KEY (`id_attivita`);

--
-- Indexes for table `azienda`
--
ALTER TABLE `azienda`
 ADD PRIMARY KEY (`codice`);

--
-- Indexes for table `iscrizione`
--
ALTER TABLE `iscrizione`
 ADD PRIMARY KEY (`fk_matricola`,`fk_attivita`), ADD KEY `fk_attivita_iscrizione` (`fk_attivita`);

--
-- Indexes for table `registra_attivita`
--
ALTER TABLE `registra_attivita`
 ADD KEY `attivita_azienda` (`id_azienda`), ADD KEY `attivita_scuola` (`id_scuola_secondo_grado`), ADD KEY `attivita_universita` (`id_universita`);

--
-- Indexes for table `responsabile`
--
ALTER TABLE `responsabile`
 ADD PRIMARY KEY (`id_responsabile`), ADD KEY `fk_attivita_responsabile` (`fk_attivita`);

--
-- Indexes for table `scuola_primo_grado`
--
ALTER TABLE `scuola_primo_grado`
 ADD PRIMARY KEY (`codice`);

--
-- Indexes for table `scuola_secondo_grado`
--
ALTER TABLE `scuola_secondo_grado`
 ADD PRIMARY KEY (`codice`);

--
-- Indexes for table `studente`
--
ALTER TABLE `studente`
 ADD PRIMARY KEY (`matricola`), ADD KEY `fk_scuola_sec` (`fk_scuola`);

--
-- Indexes for table `universita`
--
ALTER TABLE `universita`
 ADD PRIMARY KEY (`codice`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attivita`
--
ALTER TABLE `attivita`
MODIFY `id_attivita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `responsabile`
--
ALTER TABLE `responsabile`
MODIFY `id_responsabile` int(11) NOT NULL AUTO_INCREMENT;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `iscrizione`
--
ALTER TABLE `iscrizione`
ADD CONSTRAINT `fk_attivita_iscrizione` FOREIGN KEY (`fk_attivita`) REFERENCES `attivita` (`id_attivita`),
ADD CONSTRAINT `fk_matricola_iscrizione` FOREIGN KEY (`fk_matricola`) REFERENCES `studente` (`matricola`);

--
-- Limiti per la tabella `registra_attivita`
--
ALTER TABLE `registra_attivita`
ADD CONSTRAINT `attivita_azienda` FOREIGN KEY (`id_azienda`) REFERENCES `azienda` (`codice`),
ADD CONSTRAINT `attivita_scuola` FOREIGN KEY (`id_scuola_secondo_grado`) REFERENCES `scuola_secondo_grado` (`codice`),
ADD CONSTRAINT `attivita_universita` FOREIGN KEY (`id_universita`) REFERENCES `universita` (`codice`);

--
-- Limiti per la tabella `responsabile`
--
ALTER TABLE `responsabile`
ADD CONSTRAINT `fk_attivita_responsabile` FOREIGN KEY (`fk_attivita`) REFERENCES `attivita` (`id_attivita`);

--
-- Limiti per la tabella `studente`
--
ALTER TABLE `studente`
ADD CONSTRAINT `fk_scuola_sec` FOREIGN KEY (`fk_scuola`) REFERENCES `scuola_secondo_grado` (`codice`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
