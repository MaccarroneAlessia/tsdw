-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mar 17, 2023 alle 09:25
-- Versione del server: 8.0.31-1+b1
-- Versione PHP: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `isbn` varchar(15) NOT NULL,
  `author` varchar(64) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `publisher` varchar(64) DEFAULT NULL,
  `ranking` int DEFAULT NULL,
  `year` int DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `books`
--

INSERT INTO `books` (`id`, `isbn`, `author`, `title`, `publisher`, `ranking`, `year`, `price`) VALUES
(1, 'abcd1', 'Verga', 'I malavoglia', 'p1', 5, 2000, 9.99),
(2, 'abcd2', 'Aligheri', 'La divina commedia', 'p2', 5, 1200, 10.99),
(3, 'abcd3', 'Pirandello', 'Uno, nessuno, centomila', 'p3', 6, 2001, 19.99),
(4, 'abcd4', 'Wilde', 'Dorian Gray', 'p4', 7, 2002, 11.99),
(5, 'abcd5', 'Orwell', '1984', 'p5', 8, 2003, 12.99),
(6, 'abcd6', 'Fitzgerald', 'The great gatzby', 'p6', 9, 2004, 9.1399);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
