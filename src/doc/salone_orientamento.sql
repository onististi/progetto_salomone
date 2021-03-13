-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 13, 2021 alle 10:09
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 7.3.27

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
-- Struttura della tabella `amministratore`
--

CREATE TABLE `amministratore` (
  `id_amministratore` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `amministratore`
--

INSERT INTO `amministratore` (`id_amministratore`, `username`, `password`) VALUES
(1, 'amministratore', '$2y$10$QfsYyLlOy3tbWwqzzraK/.04jMCTYdCiRMkO75yq6utjciB5g40zK');

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
  `ora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `azienda` (
  `codice` varchar(10) NOT NULL,
  `nome` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `azienda`
--

INSERT INTO `azienda` (`codice`, `nome`, `password`) VALUES
('ZZZZ', 'Tiziano Inc.', '$2y$10$rrMeia/ifB1skTVv/AZ3deyGIfzXoINofkfBZewCe13Fkp889t9Vm');

-- --------------------------------------------------------

--
-- Struttura della tabella `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fk_attivita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `iscrizione`
--

CREATE TABLE `iscrizione` (
  `fk_matricola` varchar(10) NOT NULL,
  `fk_attivita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `iscrizione`
--

INSERT INTO `iscrizione` (`fk_matricola`, `fk_attivita`) VALUES
('2035772', 5),
('2035773', 5),
('2035773', 14);

-- --------------------------------------------------------

--
-- Struttura della tabella `registra_attivita`
--

CREATE TABLE `registra_attivita` (
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
('PPPP', 'Scuola Media di Cannobio', '$2y$10$QfsYyLlOy3tbWwqzzraK/.04jMCTYdCiRMkO75yq6utjciB5g40zK');

-- --------------------------------------------------------

--
-- Struttura della tabella `scuola_secondo_grado`
--

CREATE TABLE `scuola_secondo_grado` (
  `codice` varchar(10) NOT NULL,
  `nome` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `scuola_secondo_grado`
--

INSERT INTO `scuola_secondo_grado` (`codice`, `nome`, `password`) VALUES
('AAAA', 'Scuola JACOP', '$2y$10$QfsYyLlOy3tbWwqzzraK/.04jMCTYdCiRMkO75yq6utjciB5g40zK'),
('VBTF00701B', 'Lorenzo Cobianchi', '$2y$10$QfsYyLlOy3tbWwqzzraK/.04jMCTYdCiRMkO75yq6utjciB5g40zK');

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
('2035771', 'AAAA', 'jacopo.guzzo', '$2y$10$A9iuBsBTDHOWwPX1vTl7mOioOmVbiAuEZZRugF209IEmXQfxc1sFq', 'Jacopo', 'Guzzo', 'M', 'jacopo.guzzo@edu.cobianchi.it', '5AITI', '2002-09-05'),
('2035772', 'AAAA', 'tiziano_yahtahey.tedeschi', '$2y$10$MVK/CtgNTf7INYst0HS0kOp6FXUyOMgvVRjLv6FrQSNZ28ptcs.WG', 'Tiziano Yahtahey', 'Tedeschi', 'M', 'tiziano.tedeschi@edu.cobianchi.it', '5AITI', '2002-10-17'),
('2035773', 'AAAA', 'aronne.onisti', '$2y$10$lRSRqIjyWAX4S4NbdVsS8eEVF7W6jiQJyIBoiXoQmsLzwOWFdAkFq', 'Aronne', 'Onisti', 'M', 'aronne.onisti@edu.cobianchi.it', '5AITI', '2002-11-22'),
('2035774', 'AAAA', 'marco.fallara', '$2y$10$Xg99qzt6I0Bw9r2NnwWn/.ua7ty7Gja5hzjmInt8tfDGg1Fehg80K\r\n', 'Marco', 'Fallara', 'M', 'marco.fallara@edu.cobianchi.it', '5AITI', '2002-08-07');

-- --------------------------------------------------------

--
-- Struttura della tabella `universita`
--

CREATE TABLE `universita` (
  `codice` varchar(10) NOT NULL,
  `nome` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `universita`
--

INSERT INTO `universita` (`codice`, `nome`, `password`) VALUES
('UUUU', 'Unito', '$2y$10$QfsYyLlOy3tbWwqzzraK/.04jMCTYdCiRMkO75yq6utjciB5g40zK');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `amministratore`
--
ALTER TABLE `amministratore`
  ADD PRIMARY KEY (`id_amministratore`);

--
-- Indici per le tabelle `attivita`
--
ALTER TABLE `attivita`
  ADD PRIMARY KEY (`id_attivita`);

--
-- Indici per le tabelle `azienda`
--
ALTER TABLE `azienda`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_attivita` (`fk_attivita`);

--
-- Indici per le tabelle `iscrizione`
--
ALTER TABLE `iscrizione`
  ADD PRIMARY KEY (`fk_matricola`,`fk_attivita`),
  ADD KEY `fk_attivita_iscrizione` (`fk_attivita`);

--
-- Indici per le tabelle `registra_attivita`
--
ALTER TABLE `registra_attivita`
  ADD KEY `attivita_azienda` (`id_azienda`),
  ADD KEY `attivita_scuola` (`id_scuola_secondo_grado`),
  ADD KEY `attivita_universita` (`id_universita`);

--
-- Indici per le tabelle `scuola_primo_grado`
--
ALTER TABLE `scuola_primo_grado`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `nome` (`nome`(768)),
  ADD KEY `nome_2` (`nome`(768));

--
-- Indici per le tabelle `scuola_secondo_grado`
--
ALTER TABLE `scuola_secondo_grado`
  ADD PRIMARY KEY (`codice`);

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
  ADD PRIMARY KEY (`codice`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `amministratore`
--
ALTER TABLE `amministratore`
  MODIFY `id_amministratore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `attivita`
--
ALTER TABLE `attivita`
  MODIFY `id_attivita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_attivita` FOREIGN KEY (`fk_attivita`) REFERENCES `attivita` (`id_attivita`) ON UPDATE CASCADE;

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
-- Limiti per la tabella `studente`
--
ALTER TABLE `studente`
  ADD CONSTRAINT `fk_scuola_sec` FOREIGN KEY (`fk_scuola`) REFERENCES `scuola_secondo_grado` (`codice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
