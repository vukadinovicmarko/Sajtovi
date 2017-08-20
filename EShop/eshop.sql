
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2015 at 09:19 AM
-- Server version: 5.1.73
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u339317008_sajt`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE IF NOT EXISTS `anketa` (
  `id_glasanja` int(11) NOT NULL AUTO_INCREMENT,
  `ocena` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_glasanja`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_glasanja`, `ocena`) VALUES
(2, 'OdliÄan'),
(3, 'OdliÄan'),
(4, 'OdliÄan'),
(5, 'OdliÄan'),
(6, 'OdliÄan'),
(7, 'OdliÄan'),
(8, 'Odličan'),
(9, 'Odličan'),
(10, 'Odličan'),
(11, 'Odličan'),
(12, 'Vrlo dobar'),
(13, 'Odli'),
(14, 'undefined'),
(15, 'undefined'),
(16, 'Odličan'),
(17, 'Dobar'),
(18, 'Vrlo dobar'),
(19, 'Vrlo dobar'),
(20, 'Los'),
(21, 'Vrlo dobar'),
(22, 'Odličan'),
(23, 'Vrlo dobar'),
(24, 'Vrlo dobar'),
(25, 'Dobar');

-- --------------------------------------------------------

--
-- Table structure for table `desktop_racunari`
--

CREATE TABLE IF NOT EXISTS `desktop_racunari` (
  `id_racunara` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_racunara` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `graficka` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hard` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `memorija` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `procesor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slika1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slika2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cena` int(11) NOT NULL,
  `datum` text COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_racunara`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `desktop_racunari`
--

INSERT INTO `desktop_racunari` (`id_racunara`, `naziv_racunara`, `graficka`, `hard`, `memorija`, `procesor`, `slika1`, `slika2`, `slika3`, `cena`, `datum`, `opis`) VALUES
(1, 'Desk proba', 'ASD', 'A231', 'BLa', 'I5', 'slike/', 'slike/', 'slike/', 1231232, '1434236767', 'dasas adasas d asa sad ad agasfas asf asfas fs as asdasas '),
(7, 'Gladiator', 'Nvidia Geforce 9800gtx', 'WD Caviar Black 500GB', 'Kingston 4gb', 'intel 4990x', 'slike/', 'slike/', 'slike/', 900, '1434238386', 'Najbolji'),
(8, 'Gladiator', 'Nvidia Geforce GTX TITAN', 'WD Caviar Black 4TB', 'Kingston 64GB', 'Intel 4990x', 'slike/', 'slike/', 'slike/', 1250, '1434238712', 'Najbolji Racunar 2015'),
(19, 'TERMINATOR', 'Nvidia GeForce GTX 980', 'WD Caviar Black', 'Kingston Fury', 'Intel 4990X', 'slike/asddddd.PNG', 'slike/', 'slike/', 222, '1434464623', 'asff'),
(22, 'Laptop - Gamer', 'Nvidia GeForce 980M GTX', 'WD Caviar Black 500 GB', '8 GB', 'Intel 3990x', '/slike/laptop1.jpg', NULL, NULL, 900, '2222222', 'Prvi laptop'),
(23, 'Marko', 'Nvidia GeForce GTX 980', 'WD Caviar Black', 'Kingston Fury', 'Intel 4990X', 'slike/', 'slike/', 'slike/', 222, '1434465361', 'asfa');

-- --------------------------------------------------------

--
-- Table structure for table `glavni_meni`
--

CREATE TABLE IF NOT EXISTS `glavni_meni` (
  `id_linka` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_linka` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `poz_linka` int(11) NOT NULL,
  `putanja_linka` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  PRIMARY KEY (`id_linka`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `glavni_meni`
--

INSERT INTO `glavni_meni` (`id_linka`, `naziv_linka`, `poz_linka`, `putanja_linka`) VALUES
(1, 'e-Shop', 1, 'index.php'),
(2, 'Računarske Komponente', 2, '#'),
(3, 'Računari', 3, 'racunari.php');

-- --------------------------------------------------------

--
-- Table structure for table `gl_meni_podmeni`
--

CREATE TABLE IF NOT EXISTS `gl_meni_podmeni` (
  `id_gl_linka` int(11) NOT NULL,
  `id_pod_linka` int(11) NOT NULL,
  PRIMARY KEY (`id_pod_linka`),
  KEY `id_pod_linka` (`id_pod_linka`),
  KEY `id_gl_linka` (`id_gl_linka`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gl_meni_podmeni`
--

INSERT INTO `gl_meni_podmeni` (`id_gl_linka`, `id_pod_linka`) VALUES
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `graficke`
--

CREATE TABLE IF NOT EXISTS `graficke` (
  `id_graficke` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_graficke` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `memorija` int(11) NOT NULL,
  `slika1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slika2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika3` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opis` text COLLATE utf8_unicode_ci,
  `cena` int(11) NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`id_graficke`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `graficke`
--

INSERT INTO `graficke` (`id_graficke`, `naziv_graficke`, `memorija`, `slika1`, `slika2`, `slika3`, `opis`, `cena`, `datum`) VALUES
(1, 'Nvidia GeForce GTX 980', 12, 'slike/nvidia_logo.png', 'slike/', 'slike/', '', 400, '0000-00-00'),
(2, 'Nvidia GeForce GTX 990', 13, 'slike/nvidia_logo.png', 'slike/', 'slike/', '', 500, '0000-00-00'),
(3, 'Nvidia GeForce GTX 680', 1024, 'slike/nvidia_logo.png', 'slike/', 'slike/', '', 150, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `hard_diskovi`
--

CREATE TABLE IF NOT EXISTS `hard_diskovi` (
  `id_hard_diska` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_hard_diska` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kolicina_memorije` int(11) NOT NULL,
  `slika1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slika2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika3` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opis` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cena` int(11) NOT NULL,
  `datum` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_hard_diska`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hard_diskovi`
--

INSERT INTO `hard_diskovi` (`id_hard_diska`, `naziv_hard_diska`, `kolicina_memorije`, `slika1`, `slika2`, `slika3`, `opis`, `cena`, `datum`) VALUES
(1, 'WD Caviar Black', 500, 'slike/Computer_icon.png', 'slike/', 'slike/', '', 100, '1434459378'),
(2, 'WD Caviar Green Edition', 4000, 'slike/tip.PNG', 'slike/', 'slike/', '', 150, '1434459461');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
  `id_kategorije` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_kategorije` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `naziv_tabele` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kategorije`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `klijenti`
--

CREATE TABLE IF NOT EXISTS `klijenti` (
  `id_klijenta` int(11) NOT NULL AUTO_INCREMENT,
  `kor_ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`id_klijenta`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `klijenti`
--

INSERT INTO `klijenti` (`id_klijenta`, `kor_ime`, `lozinka`, `mail`, `datum`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '2015-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `komponente`
--

CREATE TABLE IF NOT EXISTS `komponente` (
  `id_komponente` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_komponente` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_komponente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `komponente`
--

INSERT INTO `komponente` (`id_komponente`, `naziv_komponente`) VALUES
(1, 'Procesor'),
(2, 'Graficka Kartica'),
(3, 'Memorija'),
(4, 'Hard Disk');

-- --------------------------------------------------------

--
-- Table structure for table `memorije`
--

CREATE TABLE IF NOT EXISTS `memorije` (
  `id_memorije` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_memorije` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kolicina` int(11) NOT NULL,
  `slika1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slika2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opis` text COLLATE utf8_unicode_ci,
  `cena` int(11) NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`id_memorije`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `memorije`
--

INSERT INTO `memorije` (`id_memorije`, `naziv_memorije`, `kolicina`, `slika1`, `slika2`, `slika3`, `opis`, `cena`, `datum`) VALUES
(1, 'Kingston Fury', 16, 'slike/memorija1.jpg', NULL, NULL, 'ovo je memorija', 450, '2015-06-15'),
(2, 'Kingston HyperX', 32, 'slike/metal1.png', 'slike/', 'slike/', '', 300, '0000-00-00'),
(3, 'Kingston Value Edition', 64, 'slike/case3.PNG', 'slike/sese.PNG', 'slike/metal1.png', '', 500, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `notebook_racunari`
--

CREATE TABLE IF NOT EXISTS `notebook_racunari` (
  `id_racunara` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_racunara` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `graficka` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `hard` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `memorija` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `procesor` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slika1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slika2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika3` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cena` int(11) NOT NULL,
  `datum` text COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_racunara`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `notebook_racunari`
--

INSERT INTO `notebook_racunari` (`id_racunara`, `naziv_racunara`, `graficka`, `hard`, `memorija`, `procesor`, `slika1`, `slika2`, `slika3`, `cena`, `datum`, `opis`) VALUES
(1, 'Laptop - Gamer', 'Nvidia GeForce 980M GTX', 'WD Caviar Black 500 GB', '8 GB', 'Intel 3990x', '/slike/laptop1.jpg', NULL, NULL, 900, '2222222', 'Prvi laptop'),
(2, 'Marko', 'Nvidia GeForce GTX 980', 'WD Caviar Black', 'Kingston Fury', 'Intel 4990X', 'slike/', 'slike/', 'slike/', 222, '1434465361', 'asfa'),
(5, 'Laptop - Gamer', 'Nvidia GeForce 980M GTX', 'WD Caviar Black 500 GB', '8 GB', 'Intel 3990x', '/slike/laptop1.jpg', NULL, NULL, 900, '2222222', 'Prvi laptop'),
(6, 'Marko', 'Nvidia GeForce GTX 980', 'WD Caviar Black', 'Kingston Fury', 'Intel 4990X', 'slike/', 'slike/', 'slike/', 222, '1434465361', 'asfa');

-- --------------------------------------------------------

--
-- Table structure for table `podmeni`
--

CREATE TABLE IF NOT EXISTS `podmeni` (
  `id_linka` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_linka` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `poz_linka` int(11) NOT NULL,
  `putanja_linka` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  PRIMARY KEY (`id_linka`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `podmeni`
--

INSERT INTO `podmeni` (`id_linka`, `naziv_linka`, `slika`, `poz_linka`, `putanja_linka`) VALUES
(1, 'Procesori', 'slike/cpu2.png', 1, 'komponente.php?id=1'),
(3, 'Memorija', 'slike/memoria-ram.png', 3, 'komponente.php?id=3'),
(4, 'Grafičke kartice', 'slike/Titan_3.png', 2, 'komponente.php?id=2'),
(6, 'O autoru', 'slike/', 5, 'index.php?id=2'),
(7, 'Kontakt', 'slike/', 6, 'index.php?id=3'),
(8, 'Sitemap', 'slike/', 7, 'index.php?id=4'),
(9, 'Dokumentacija', 'slike/', 8, 'Dokumentacija.pdf'),
(10, 'Hard Diskovi', 'slike/Hard_Disk1.png', 9, 'komponente.php?id=4');

-- --------------------------------------------------------

--
-- Table structure for table `procesori`
--

CREATE TABLE IF NOT EXISTS `procesori` (
  `id_procesora` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_procesora` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frekvencija` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `broj_procesora` int(11) NOT NULL,
  `slika1` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika3` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opis` text COLLATE utf8_unicode_ci,
  `cena` int(11) NOT NULL,
  `datum` date NOT NULL,
  PRIMARY KEY (`id_procesora`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `procesori`
--

INSERT INTO `procesori` (`id_procesora`, `naziv_procesora`, `frekvencija`, `broj_procesora`, `slika1`, `slika2`, `slika3`, `opis`, `cena`, `datum`) VALUES
(1, 'Intel Core i7-4960X Extreme Edition', '3999MHz', 8, 'slike/i7-extreme1.png', 'slike/', 'slike/', '', 1000, '0000-00-00'),
(3, 'Intel Core™ i7-5960X Processor Extreme Edition ', '4999MHz', 16, 'slike/i7-extreme1.png', 'slike/', 'slike/', '', 800, '0000-00-00'),
(4, 'Intel 6990x', '4999MHz', 32, 'slike/Intel_i7_logo1.png', 'slike/', 'slike/', '', 900, '0000-00-00'),
(5, 'AMD Athlon 5350', '2.05GHz', 2, 'slike/amd_logo.png', 'slike/', 'slike/', 'Amd Procesor', 50, '0000-00-00'),
(6, ' Intel Pentium Dual-Core G2030', '3.0GHz', 1, 'slike/intel-inside1.png', 'slike/', 'slike/', '', 60, '0000-00-00'),
(7, 'AMD A10-7850K', '3.7GHz', 4, 'slike/amd_logo.png', 'slike/', 'slike/', 'AMD Procesor', 200, '0000-00-00'),
(8, 'Intel Core i7-5500U', '2.4 GHz', 4, 'slike/Intel_i7_logo1.png', 'slike/', 'slike/', '', 400, '0000-00-00'),
(9, 'Intel Core i7-5600U', '3.2 GHz', 4, 'slike/Intel_i7_logo1.png', 'slike/', 'slike/', '', 500, '0000-00-00'),
(10, 'Intel Core i5-5250U', '2.7 GHz', 4, 'slike/Intel_i5_logo1.png', 'slike/', 'slike/', '', 398, '0000-00-00'),
(11, 'Intel Core i5-5257U', '3.1 GHz', 4, 'slike/Intel_i5_logo1.png', 'slike/', 'slike/', '', 260, '0000-00-00'),
(12, 'Intel Core i3-5015U', '2.1 GHz', 4, 'slike/Intel_i3_Logo1.png', 'slike/', 'slike/', '', 190, '0000-00-00'),
(13, 'Intel Core i3-5157U', '2.5 GHz', 4, 'slike/Intel_i3_Logo1.png', 'slike/', 'slike/', '', 180, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `racunari_tip_racunara`
--

CREATE TABLE IF NOT EXISTS `racunari_tip_racunara` (
  `id_racunara` int(11) NOT NULL,
  `id_tipa` int(11) NOT NULL,
  PRIMARY KEY (`id_racunara`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `racunari_tip_racunara`
--

INSERT INTO `racunari_tip_racunara` (`id_racunara`, `id_tipa`) VALUES
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(22, 2),
(23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tip_racunara`
--

CREATE TABLE IF NOT EXISTS `tip_racunara` (
  `id_tipa` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_tipa` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tipa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tip_racunara`
--

INSERT INTO `tip_racunara` (`id_tipa`, `naziv_tipa`) VALUES
(1, 'Desktop Racunari'),
(2, 'Notebook Racunari');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE IF NOT EXISTS `uloge` (
  `id_uloge` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_uloge` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_uloge`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uloge_klijenti`
--

CREATE TABLE IF NOT EXISTS `uloge_klijenti` (
  `id_klijenta` int(11) NOT NULL,
  `id_uloge` int(11) NOT NULL,
  PRIMARY KEY (`id_klijenta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
