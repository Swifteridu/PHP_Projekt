-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Sep 2024 um 11:48
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `rechnungen_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechnungen`
--

CREATE TABLE `rechnungen` (
  `id` int(11) NOT NULL,
  `betrag` decimal(10,2) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `kunde` varchar(255) DEFAULT NULL,
  `beschreibung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `rechnungen`
--

INSERT INTO `rechnungen` (`id`, `betrag`, `datum`, `kunde`, `beschreibung`) VALUES
(1, 200.50, '2024-09-01', 'Max Mustermann', 'Dienstleistung A'),
(2, 150.75, '2024-09-15', 'Anna Müller', 'Produkt B'),
(3, 350.00, '2024-09-20', 'John Doe', 'Beratung C');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rechnungen`
--
ALTER TABLE `rechnungen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rechnungen`
--
ALTER TABLE `rechnungen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
