-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 mei 2019 om 23:14
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gangs_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(99) NOT NULL,
  `cash` int(11) NOT NULL DEFAULT '25',
  `bank` int(11) NOT NULL DEFAULT '75000',
  `power` int(11) NOT NULL,
  `bullets` int(11) NOT NULL,
  `hoes` int(11) NOT NULL,
  `credits` int(11) NOT NULL DEFAULT '100',
  `homies` int(11) NOT NULL,
  `country` varchar(25) NOT NULL DEFAULT 'USA',
  `health` int(11) NOT NULL DEFAULT '100',
  `rank` varchar(25) NOT NULL DEFAULT 'Hood rat',
  `rankprogress` int(11) NOT NULL,
  `murderexpierence` int(11) NOT NULL,
  `ip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `cash`, `bank`, `power`, `bullets`, `hoes`, `credits`, `homies`, `country`, `health`, `rank`, `rankprogress`, `murderexpierence`, `ip`) VALUES
(9, 'test', '$2y$10$xPuPtywceMnTpflyZoAubuSeKG3XWlEMJQLk8G/CuJFY3ARBqJU6K', 0, 0, 0, 0, 0, 100, 0, 'USA', 100, 'Hood rat', 0, 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
