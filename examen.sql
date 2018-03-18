-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 mrt 2018 om 20:41
-- Serverversie: 10.1.28-MariaDB
-- PHP-versie: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examen`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fabriek`
--

CREATE TABLE `fabriek` (
  `fabriek_id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `fabriek`
--

INSERT INTO `fabriek` (`fabriek_id`, `naam`) VALUES
(3, 'Bosch'),
(4, 'Friztz'),
(5, 'Pinda'),
(6, 'ViezeHond');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opslag`
--

CREATE TABLE `opslag` (
  `opslag_id` int(11) UNSIGNED NOT NULL,
  `locatie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `opslag`
--

INSERT INTO `opslag` (`opslag_id`, `locatie`) VALUES
(1, 'Franscity'),
(2, 'Flikkertown'),
(3, 'Maarssen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opslag_product`
--

CREATE TABLE `opslag_product` (
  `opslag_product_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `opslag_id` int(11) UNSIGNED NOT NULL,
  `voorraad` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `opslag_product`
--

INSERT INTO `opslag_product` (`opslag_product_id`, `product_id`, `opslag_id`, `voorraad`) VALUES
(1, 1, 1, 5),
(2, 1, 2, 32),
(3, 1, 3, 55),
(4, 5, 2, 12),
(5, 3, 1, 7),
(6, 4, 3, 5),
(7, 3, 3, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) UNSIGNED NOT NULL,
  `fabriek_id` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `prijs` float(11,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`product_id`, `fabriek_id`, `product`, `prijs`) VALUES
(1, 3, 'Chocolade', 21.00),
(2, 4, 'Dikke Kaas', 12.00),
(3, 3, 'Frikandel', 1221.00),
(4, 4, 'Gerookte Hond', 9999.99),
(5, 6, 'Flikkertaart', 1.00),
(6, 5, 'Frans Bauer', 12.03),
(11, 4, 'ww', 12.02),
(12, 6, 'Geitenkaas', 323.00),
(13, 4, 'Youssef', 1221.99);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `fabriek`
--
ALTER TABLE `fabriek`
  ADD PRIMARY KEY (`fabriek_id`);

--
-- Indexen voor tabel `opslag`
--
ALTER TABLE `opslag`
  ADD PRIMARY KEY (`opslag_id`);

--
-- Indexen voor tabel `opslag_product`
--
ALTER TABLE `opslag_product`
  ADD PRIMARY KEY (`opslag_product_id`),
  ADD KEY `opslag_product` (`opslag_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fabriekproduct` (`fabriek_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `fabriek`
--
ALTER TABLE `fabriek`
  MODIFY `fabriek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `opslag`
--
ALTER TABLE `opslag`
  MODIFY `opslag_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `opslag_product`
--
ALTER TABLE `opslag_product`
  MODIFY `opslag_product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `opslag_product`
--
ALTER TABLE `opslag_product`
  ADD CONSTRAINT `opslag_product` FOREIGN KEY (`opslag_id`) REFERENCES `opslag` (`opslag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opslag_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fabriekproduct` FOREIGN KEY (`fabriek_id`) REFERENCES `fabriek` (`fabriek_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
