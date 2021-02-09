-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 10, 2021 alle 00:19
-- Versione del server: 10.4.16-MariaDB
-- Versione PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salone_orientamento`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `attivita`
--

CREATE TABLE `attivita` (
  `id_attivita` int(11) NOT NULL,
  `titolo` text NOT NULL,
  `descrizione` text NOT NULL,
  `logo` text NOT NULL,
  `giorno` date NOT NULL,
  `ora` time NOT NULL,
  `occupato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `attivita`
--

INSERT INTO `attivita` (`id_attivita`, `titolo`, `descrizione`, `logo`, `giorno`, `ora`, `occupato`) VALUES
(1, 'empty', 'empty', 'empty', '2021-11-12', '09:30:00', 0),
(2, 'empty', 'empty', 'empty', '2021-11-12', '10:30:00', 0),
(3, 'empty', 'empty', 'empty', '2021-11-12', '11:30:00', 0),
(4, 'Orientiamo sti bambini', 'BAMBINI VIAAAAAAAA', '/opt/lampp/htdocs/WebSites/progetto_salomone/src/uploads/AAAA.jpeg', '2021-11-12', '12:30:00', 1),
(5, 'empty', 'empty', 'empty', '2021-11-12', '13:30:00', 0),
(6, 'empty', 'empty', 'empty', '2021-11-13', '09:30:00', 0),
(7, 'empty', 'empty', 'empty', '2021-11-13', '10:30:00', 0),
(8, 'Orientamento di Tiziano', 'SISIS', '/opt/lampp/htdocs/WebSites/progetto_salomone/src/uploads/ZZZZ.jpeg', '2021-11-13', '11:30:00', 1),
(9, 'empty', 'empty', 'empty', '2021-11-13', '12:30:00', 0),
(10, 'empty', 'empty', 'empty', '2021-11-13', '13:30:00', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `azienda`
--

CREATE TABLE `azienda` (
  `codice` varchar(10) NOT NULL,
  `fk_attivita` int(11) DEFAULT NULL,
  `nome` text NOT NULL,
  `password` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `azienda`
--

INSERT INTO `azienda` (`codice`, `fk_attivita`, `nome`, `password`, `logo`) VALUES
('ZZZZ', 8, 'Tiziano Inc.', '5678', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `iscrizione`
--

CREATE TABLE `iscrizione` (
  `fk_matricola` varchar(10) NOT NULL,
  `fk_attivita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `responsabile`
--

CREATE TABLE `responsabile` (
  `id_responsabile` int(11) NOT NULL,
  `fk_attivita` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL,
  `mail` text NOT NULL,
  `qualifica` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `scuola_primo_grado`
--

CREATE TABLE `scuola_primo_grado` (
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

CREATE TABLE `scuola_secondo_grado` (
  `codice` varchar(10) NOT NULL,
  `fk_attivita` int(11) DEFAULT NULL,
  `nome` text NOT NULL,
  `password` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `scuola_secondo_grado`
--

INSERT INTO `scuola_secondo_grado` (`codice`, `fk_attivita`, `nome`, `password`, `logo`) VALUES
('AAAA', 4, 'Scuola AAAA', '1234', ''),
('VBTF00701B', NULL, 'Lorenzo Cobianchi', '1234', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `studente`
--

CREATE TABLE `studente` (
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

CREATE TABLE `universita` (
  `codice` varchar(10) NOT NULL,
  `fk_attivita` int(11) DEFAULT NULL,
  `nome` text NOT NULL,
  `password` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `universita`
--

INSERT INTO `universita` (`codice`, `fk_attivita`, `nome`, `password`, `logo`) VALUES
('UUUU', NULL, 'Unito', '1234', '');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `attivita`
--
ALTER TABLE `attivita`
  ADD PRIMARY KEY (`id_attivita`);

--
-- Indici per le tabelle `azienda`
--
ALTER TABLE `azienda`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `fk_attivita_azienda` (`fk_attivita`);

--
-- Indici per le tabelle `iscrizione`
--
ALTER TABLE `iscrizione`
  ADD PRIMARY KEY (`fk_matricola`,`fk_attivita`),
  ADD KEY `fk_attivita_iscrizione` (`fk_attivita`);

--
-- Indici per le tabelle `responsabile`
--
ALTER TABLE `responsabile`
  ADD PRIMARY KEY (`id_responsabile`),
  ADD KEY `fk_attivita_responsabile` (`fk_attivita`);

--
-- Indici per le tabelle `scuola_primo_grado`
--
ALTER TABLE `scuola_primo_grado`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `scuola_secondo_grado`
--
ALTER TABLE `scuola_secondo_grado`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `fk_attivita_scuola_sec` (`fk_attivita`);

--
-- Indici per le tabelle `studente`
--
ALTER TABLE `studente`
  ADD PRIMARY KEY (`matricola`),
  ADD KEY `fk_scuola_sec` (`fk_scuola`);

--
-- Indici per le tabelle `universita`
--
ALTER TABLE `universita`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `fk_attivita_universita` (`fk_attivita`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `attivita`
--
ALTER TABLE `attivita`
  MODIFY `id_attivita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `responsabile`
--
ALTER TABLE `responsabile`
  MODIFY `id_responsabile` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `azienda`
--
ALTER TABLE `azienda`
  ADD CONSTRAINT `fk_attivita_azienda` FOREIGN KEY (`fk_attivita`) REFERENCES `attivita` (`id_attivita`);

--
-- Limiti per la tabella `iscrizione`
--
ALTER TABLE `iscrizione`
  ADD CONSTRAINT `fk_attivita_iscrizione` FOREIGN KEY (`fk_attivita`) REFERENCES `attivita` (`id_attivita`),
  ADD CONSTRAINT `fk_matricola_iscrizione` FOREIGN KEY (`fk_matricola`) REFERENCES `studente` (`matricola`);

--
-- Limiti per la tabella `responsabile`
--
ALTER TABLE `responsabile`
  ADD CONSTRAINT `fk_attivita_responsabile` FOREIGN KEY (`fk_attivita`) REFERENCES `attivita` (`id_attivita`);

--
-- Limiti per la tabella `scuola_secondo_grado`
--
ALTER TABLE `scuola_secondo_grado`
  ADD CONSTRAINT `fk_attivita_scuola_sec` FOREIGN KEY (`fk_attivita`) REFERENCES `attivita` (`id_attivita`);

--
-- Limiti per la tabella `studente`
--
ALTER TABLE `studente`
  ADD CONSTRAINT `fk_scuola_sec` FOREIGN KEY (`fk_scuola`) REFERENCES `scuola_secondo_grado` (`codice`);

--
-- Limiti per la tabella `universita`
--
ALTER TABLE `universita`
  ADD CONSTRAINT `fk_attivita_universita` FOREIGN KEY (`fk_attivita`) REFERENCES `attivita` (`id_attivita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
