-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 jan 2021 om 12:29
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snellejelle`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fiets`
--

CREATE TABLE `fiets` (
  `id` int(11) NOT NULL,
  `merk` varchar(256) NOT NULL,
  `model` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `kleur` varchar(256) NOT NULL,
  `soortrem` varchar(256) NOT NULL,
  `gebruiker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerkers`
--

CREATE TABLE `medewerkers` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(256) NOT NULL,
  `achternaam` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `telefoonnummer` int(11) NOT NULL,
  `wachtwoord` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medewerkers`
--

INSERT INTO `medewerkers` (`id`, `voornaam`, `achternaam`, `email`, `telefoonnummer`, `wachtwoord`) VALUES
(1, 'karma', 'king', 'karma@karma.nl', 641651484, 'karma');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reparatie`
--

CREATE TABLE `reparatie` (
  `id` int(11) NOT NULL,
  `titel` varchar(256) NOT NULL,
  `datum` date NOT NULL,
  `tijdstip` time NOT NULL,
  `opmerking` varchar(256) NOT NULL,
  `kosten` int(11) NOT NULL,
  `fiets_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(256) NOT NULL,
  `achternaam` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `wachtwoord` varchar(256) NOT NULL,
  `telefoonnummer` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`, `telefoonnummer`) VALUES
(1, 'shin', 'king', 'user@email.nl', 'user', '04958490');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `fiets`
--
ALTER TABLE `fiets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gebruiker_id` (`gebruiker_id`);

--
-- Indexen voor tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reparatie`
--
ALTER TABLE `reparatie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fiets_id` (`fiets_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `fiets`
--
ALTER TABLE `fiets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `reparatie`
--
ALTER TABLE `reparatie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `fiets`
--
ALTER TABLE `fiets`
  ADD CONSTRAINT `fiets_ibfk_1` FOREIGN KEY (`gebruiker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `reparatie`
--
ALTER TABLE `reparatie`
  ADD CONSTRAINT `reparatie_ibfk_1` FOREIGN KEY (`fiets_id`) REFERENCES `fiets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
