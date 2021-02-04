-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 04, 2021 alle 13:23
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
  `titolo` varchar(50) NOT NULL,
  `descrizione` varchar(256) NOT NULL,
  `logo` blob NOT NULL,
  `giorno` date NOT NULL,
  `ora` time NOT NULL,
  `occupato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `azienda`
--

CREATE TABLE `azienda` (
  `codice` varchar(10) NOT NULL,
  `fk_attivita` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `mail` text NOT NULL,
  `qualifica` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `scuola`
--

CREATE TABLE `scuola` (
  `codice` varchar(10) NOT NULL,
  `fk_attivita` int(11) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `scuola`
--

INSERT INTO `scuola` (`codice`, `fk_attivita`, `nome`, `password`, `tipo`) VALUES
('AAAA', NULL, 'Scuolaaaaaaaaaaaaa a aaaaaaaaaaaaaa aaaaaaaaaaa', '1234', 'Superiore');

-- --------------------------------------------------------

--
-- Struttura della tabella `studente`
--

CREATE TABLE `studente` (
  `matricola` varchar(10) NOT NULL,
  `fk_scuola` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sesso` varchar(1) NOT NULL,
  `mail` text NOT NULL,
  `classe` varchar(10) NOT NULL,
  `data_nascita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `studente`
--

INSERT INTO `studente` (`matricola`, `fk_scuola`, `nome`, `cognome`, `username`, `password`, `sesso`, `mail`, `classe`, `data_nascita`) VALUES
('ABC', 'AAAA', 'Nome', 'Cognome', 'nome.cognome', '5678', 'M', '', '5A', '2002-10-17');

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
-- Indici per le tabelle `scuola`
--
ALTER TABLE `scuola`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `fk_attivita_scuola` (`fk_attivita`) USING BTREE;

--
-- Indici per le tabelle `studente`
--
ALTER TABLE `studente`
  ADD PRIMARY KEY (`matricola`),
  ADD KEY `fk_scuola_studente` (`fk_scuola`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `attivita`
--
ALTER TABLE `attivita`
  MODIFY `id_attivita` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fk_matricola_studente` FOREIGN KEY (`fk_matricola`) REFERENCES `studente` (`matricola`);

--
-- Limiti per la tabella `responsabile`
--
ALTER TABLE `responsabile`
  ADD CONSTRAINT `fk_attivita_responsabile` FOREIGN KEY (`fk_attivita`) REFERENCES `attivita` (`id_attivita`);

--
-- Limiti per la tabella `scuola`
--
ALTER TABLE `scuola`
  ADD CONSTRAINT `fk_attivita_scuola` FOREIGN KEY (`fk_attivita`) REFERENCES `attivita` (`id_attivita`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Limiti per la tabella `studente`
--
ALTER TABLE `studente`
  ADD CONSTRAINT `fk_scuola_studente` FOREIGN KEY (`fk_scuola`) REFERENCES `scuola` (`codice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
