-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Machine: localhost:3306
-- Genereertijd: 15 sep 2016 om 11:29
-- Serverversie: 10.1.17-MariaDB
-- PHP-versie: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `kb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `naam` varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'gebruiker naam',
  `wachtwoord` tinytext COLLATE utf8_bin NOT NULL COMMENT 'hash',
  `rechten` varchar(1) COLLATE utf8_bin NOT NULL COMMENT 'Rechten',
  `groep` varchar(3) COLLATE utf8_bin NOT NULL COMMENT 'Groep',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`naam`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='gebruikers Tabel' AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `naam`, `wachtwoord`, `rechten`) VALUES
(1, 'admin', 'sha1:64000:18:oL3WvUkwNucezB2W+i8aCtmm9FeYI9bK:b6ttPoBf48gGCMci/SW2mZT7', '3');

-- --------------------------------------------------------
--
-- Tabelstructuur voor tabel `groep`
-- 
CREATE TABLE IF NOT EXISTS `groep` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user` text COLLATE utf8_bin NOT NULL COMMENT 'user id',
  `naam` tinytext COLLATE utf8_bin NOT NULL COMMENT 'groepnaam',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Groep Tabel' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- /* CopyRight PowerChaos 2016 */
--