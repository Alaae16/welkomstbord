-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 apr 2022 om 09:11
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `welkomstbord`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project`
--

CREATE TABLE `project` (
  `projectId` int(11) NOT NULL,
  `projectKleur` varchar(255) NOT NULL,
  `projectImage` varchar(255) NOT NULL,
  `projectAanhef` varchar(255) NOT NULL,
  `projectTekst` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `project`
--

INSERT INTO `project` (`projectId`, `projectKleur`, `projectImage`, `projectAanhef`, `projectTekst`) VALUES
(1, '#bbb', 'https://farout.be/wp-content/uploads/2017/05/Achtergrondfoto-bomen.jpeg', 'Hey Erwin,', 'De <i>koffie☕</i> en <i>thee🍵</i> worden bereid<br>\r\nLet\'s brainstorm over <i> HR Direct</i> 🕵🏼‍♂️');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectcategorie`
--

CREATE TABLE `projectcategorie` (
  `projectCategorieId` int(11) NOT NULL,
  `projectCategorieNaam` varchar(255) NOT NULL,
  `projectCategorieBeschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `projectcategorie`
--

INSERT INTO `projectcategorie` (`projectCategorieId`, `projectCategorieNaam`, `projectCategorieBeschrijving`) VALUES
(1, 'RenewMyID', 'Kwalitatieve hoogstandjes zijn het; de websites die we ontwerpen en ontwikkelen. Compleet nieuw, custom made op open source (Wordpress of Joomla) en uiteraard voorzien van een gelikt design. Door de jaren heen is gebleken dat we op een andere manier tegen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `welkomst`
--

CREATE TABLE `welkomst` (
  `welkomstId` int(11) NOT NULL,
  `welkomstTekst` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `welkomst`
--

INSERT INTO `welkomst` (`welkomstId`, `welkomstTekst`) VALUES
(1, 'Welke van de 9 soorten <i>koffie</i>☕<br>\ngaan jullie<i> bestellen</i>? Of toch liever thee? 🍵'),
(2, 'Let\'s <i>brainstorm</i>🧠! <br>\nJe <i>latte macchiato</i> wordt gemaakt ☕'),
(3, 'Let\'s <i>brainstorm</i>🧠! <br>\nJe <i>cappuccino </i>wordt gemaakt ☕'),
(4, 'Welke van de 9 soorten <i>koffie</i>☕<br>\nga jij<i> bestellen</i>? Of toch liever een kopje thee?🍵'),
(5, 'De <i>koffie☕</i> en <i>thee🍵</i> worden bereid<br>\nLet\'s brainstorm over <i> HR Direct</i> 🕵🏼‍♂️'),
(6, 'Klaar voor de <i>designpresentatie</i>? <br>\r\nJe <i>koffie </i>wordt al gemaakt! '),
(7, 'Gelukt met de <i>cursus</i>?<br>\nNu ben je <i>webmaster</i> van sumrin.nl'),
(8, 'Je <i>latte macchiato</i> is al in de maak...<br>\nWil je er een koekje bij?\n'),
(9, 'Gelukt met de <i>cursus</i>?<br>\nNu zijn jullie <i>webmaster</i> van vloerservicelimburg.nl');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectId`);

--
-- Indexen voor tabel `projectcategorie`
--
ALTER TABLE `projectcategorie`
  ADD PRIMARY KEY (`projectCategorieId`);

--
-- Indexen voor tabel `welkomst`
--
ALTER TABLE `welkomst`
  ADD PRIMARY KEY (`welkomstId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `project`
--
ALTER TABLE `project`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `projectcategorie`
--
ALTER TABLE `projectcategorie`
  MODIFY `projectCategorieId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `welkomst`
--
ALTER TABLE `welkomst`
  MODIFY `welkomstId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
