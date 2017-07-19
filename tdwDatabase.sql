-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Creato il: Lug 19, 2017 alle 15:54
-- Versione del server: 5.5.42-log
-- Versione PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdwDatabase`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `anchor_point`
--

CREATE TABLE `anchor_point` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `anchor_point`
--

INSERT INTO `anchor_point` (`id`, `name`) VALUES
(1, 'slider1Text'),
(2, 'slider2Text'),
(3, 'camera1Description'),
(4, 'camera2Description');

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `id` int(4) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `prezzo` varchar(40) NOT NULL,
  `quantita` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`id`, `nome`, `prezzo`, `quantita`) VALUES
(1, 'papaya', '12', '12'),
(2, 'banana', '1', '34'),
(3, 'mela', '12', '34'),
(4, 'arancia', '12', '34'),
(5, 'gggg', '12', '34'),
(6, 'ggggggrtfe', '12', '34'),
(7, 'boh', '12', '34');

-- --------------------------------------------------------

--
-- Struttura della tabella `attributi_camere`
--

CREATE TABLE `attributi_camere` (
  `id` int(11) unsigned NOT NULL,
  `descrizione` text,
  `descrizione_home` varchar(400) DEFAULT NULL,
  `img_home` varchar(355) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `attributi_camere`
--

INSERT INTO `attributi_camere` (`id`, `descrizione`, `descrizione_home`, `img_home`) VALUES
(1, 'Lunga descrizione per camere di tipo Deluxe Lunga descrizione per camere di tipo Deluxe Lunga descrizione per camere di tipo Deluxe Lunga descrizione per camere di tipo Deluxe Lunga descrizione per camere di tipo Deluxe Lunga descrizione per camere di tipo Deluxe', 'Breve descrizione ', 'uploads/pic (1).jpg'),
(2, 'Lunga descrizione per camere di tipo Luxury', 'Breve descrizione per camere di tipo Luxury', 'uploads/pic (2).jpg'),
(3, 'Lunga descrizione per camere di tipo Premier', 'Breve descrizione per camere di tipo Premier', 'uploads/pic (3).jpg'),
(4, 'Lunga descrizione per camere di tipo Deluxe Suite', 'Breve descrizione per camere di tipo Deluxe Suite', 'uploads/pic (5).jpg'),
(5, 'Lunga descrizione per camere di tipo Luxury Suite ', 'Breve descrizione per camere di tipo Luxury Suite ', 'uploads/pic (6).jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `camere`
--

CREATE TABLE `camere` (
  `numero` smallint(5) unsigned NOT NULL,
  `piano` tinyint(3) unsigned NOT NULL,
  `id_tipologia` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `camere`
--

INSERT INTO `camere` (`numero`, `piano`, `id_tipologia`) VALUES
(101, 1, 19),
(102, 1, 20),
(103, 1, 21),
(104, 1, 22),
(201, 2, 23),
(202, 2, 24),
(203, 2, 25),
(204, 2, 26),
(301, 3, 27),
(302, 3, 28),
(303, 3, 29),
(304, 3, 30),
(404, 4, 31),
(405, 4, 31),
(406, 4, 32),
(407, 4, 32),
(408, 4, 32),
(409, 4, 32);

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `id` mediumint(8) unsigned NOT NULL,
  `nominativo` varchar(100) NOT NULL,
  `indirizzo` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`id`, `nominativo`, `indirizzo`, `telefono`) VALUES
(1, 'Luca Del Gallo', 'Corso italia 40', '0854460916');

-- --------------------------------------------------------

--
-- Struttura della tabella `posts`
--

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `sottotitolo` varchar(255) NOT NULL,
  `contenuto` text NOT NULL,
  `anchor_point` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `posts`
--

INSERT INTO `posts` (`id`, `titolo`, `sottotitolo`, `contenuto`, `anchor_point`) VALUES
(8, 'Slider1Title', 'Mangnifico sottotitolo from BO', '<p>Lorem mammt ispum sit dolores quando siento maria dolores fozza inda testo casuale inserito da backoffice tramite motore di template 120 Cv 4 cilindri turbo benzina&nbsp;Lorem mammt ispum sit dolores quando siento maria dolores fozza inda testo casuale inserito da backoffice tramite motore di template 120 Cv 4 cilindri turbo benzina</p>', 1),
(9, 'Fozza Inda', 'Stay With Us ', '<p>Ciao Francesco , potrai modificare questo testo dal backoffice, andando nella sezione che ora si chiama Posts Management ma successivamente si chiamer&agrave; in modo diverso (idee?!). La funzione di questa sezione &egrave; quella di permettere la modifica dei testi presenti nel sito attraverso una form nel backoffice (senza toccare dunque l''HTML). Bisogner&agrave; selezionare l''anchor Point (che sarebbe il placeholder che si trova nell''HTML) e poi inserire il contenuto.</p>', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `id` mediumint(8) unsigned NOT NULL,
  `periodoDal` date NOT NULL,
  `periodoAl` date NOT NULL,
  `camera` smallint(5) unsigned NOT NULL,
  `idCliente` mediumint(8) unsigned NOT NULL,
  `prezzoTotale` decimal(7,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`id`, `periodoDal`, `periodoAl`, `camera`, `idCliente`, `prezzoTotale`) VALUES
(1, '2017-07-20', '2017-07-27', 101, 1, '0.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `prezzi`
--

CREATE TABLE `prezzi` (
  `periodoDal` date NOT NULL,
  `periodoAl` date NOT NULL,
  `tipoCamera` enum('singola','doppia','matrimoniale','tripla') NOT NULL,
  `prezzo` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prezzi`
--

INSERT INTO `prezzi` (`periodoDal`, `periodoAl`, `tipoCamera`, `prezzo`) VALUES
('2017-05-01', '2017-05-31', 'singola', '50.00'),
('2017-05-01', '2017-05-31', 'doppia', '90.00'),
('2017-05-01', '2017-05-31', 'matrimoniale', '90.00'),
('2017-05-01', '2017-05-31', 'tripla', '130.00'),
('2017-06-01', '2017-06-30', 'singola', '55.00'),
('2017-06-01', '2017-06-30', 'doppia', '95.00'),
('2017-06-01', '2017-06-30', 'matrimoniale', '95.00'),
('2017-06-01', '2017-06-30', 'tripla', '140.00'),
('2017-07-01', '2017-07-31', 'singola', '65.00'),
('2017-07-01', '2017-07-31', 'doppia', '120.00'),
('2017-07-01', '2017-07-31', 'matrimoniale', '120.00'),
('2017-07-01', '2017-07-31', 'tripla', '160.00'),
('2017-08-01', '2017-08-31', 'singola', '80.00'),
('2017-08-01', '2017-08-31', 'doppia', '150.00'),
('2017-08-01', '2017-08-31', 'matrimoniale', '150.00'),
('2017-08-01', '2017-08-31', 'tripla', '200.00'),
('2017-09-01', '2017-09-30', 'singola', '50.00'),
('2017-09-01', '2017-09-30', 'doppia', '90.00'),
('2017-09-01', '2017-09-30', 'matrimoniale', '90.00'),
('2017-09-01', '2017-09-30', 'tripla', '130.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `supplementi`
--

CREATE TABLE `supplementi` (
  `codice` tinyint(3) unsigned NOT NULL,
  `voce` char(20) NOT NULL,
  `prezzo` decimal(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `supplementi`
--

INSERT INTO `supplementi` (`codice`, `voce`, `prezzo`) VALUES
(1, 'culla', '8.00'),
(2, 'letto aggiuntivo', '30.00'),
(3, 'uso singola', '-15.00'),
(4, 'bed&breakfast', '-10.00'),
(5, 'pensione completa', '5.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `supplementi_prenotati`
--

CREATE TABLE `supplementi_prenotati` (
  `idPrenotazione` mediumint(8) unsigned NOT NULL,
  `codiceSupplemento` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_camera`
--

CREATE TABLE `tipo_camera` (
  `id` int(11) unsigned NOT NULL,
  `nome_camera` varchar(255) DEFAULT 'Deluxe',
  `tipo_camera` enum('singola','doppia','matrimoniale','tripla') DEFAULT NULL,
  `id_attributi` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tipo_camera`
--

INSERT INTO `tipo_camera` (`id`, `nome_camera`, `tipo_camera`, `id_attributi`) VALUES
(19, 'Deluxe', 'singola', 1),
(20, 'Deluxe', 'doppia', 1),
(21, 'Deluxe', 'matrimoniale', 1),
(22, 'Deluxe', 'tripla', 1),
(23, 'Luxury', 'singola', 2),
(24, 'Luxury', 'doppia', 2),
(25, 'Luxury', 'matrimoniale', 2),
(26, 'Luxury', 'tripla', 2),
(27, 'Premier', 'singola', 3),
(28, 'Premier', 'doppia', 3),
(29, 'Premier', 'matrimoniale', 3),
(30, 'Premier', 'tripla', 3),
(31, 'Deluxe Suite', 'matrimoniale', 4),
(32, 'Luxury Suite', 'matrimoniale', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) unsigned NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tipologia` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `nome`, `cognome`, `email`, `tipologia`, `password`) VALUES
(2, 'Luca ', 'Del gallo', 'email@email.com', 1, 'b7f3c5f3f72db1c9030ad8963b987a706cf980aa32f33574d92ee0da2f615415242b90bfb7756c8205baec2f5940dbf194a33c77082b077f663b55e66def3a2f'),
(3, 'Mario', 'Rossi', 'email@ejhehe.it', 1, 'bussola'),
(4, 'mark', 'jacobs', 'email', 1, 'bussola'),
(10, NULL, NULL, NULL, NULL, NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `anchor_point`
--
ALTER TABLE `anchor_point`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `attributi_camere`
--
ALTER TABLE `attributi_camere`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `camere`
--
ALTER TABLE `camere`
  ADD PRIMARY KEY (`numero`);

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test` (`anchor_point`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `camera` (`camera`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indici per le tabelle `supplementi`
--
ALTER TABLE `supplementi`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `tipo_camera`
--
ALTER TABLE `tipo_camera`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `anchor_point`
--
ALTER TABLE `anchor_point`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `articoli`
--
ALTER TABLE `articoli`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT per la tabella `attributi_camere`
--
ALTER TABLE `attributi_camere`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `clienti`
--
ALTER TABLE `clienti`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `supplementi`
--
ALTER TABLE `supplementi`
  MODIFY `codice` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `tipo_camera`
--
ALTER TABLE `tipo_camera`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `anchor` FOREIGN KEY (`anchor_point`) REFERENCES `anchor_point` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
