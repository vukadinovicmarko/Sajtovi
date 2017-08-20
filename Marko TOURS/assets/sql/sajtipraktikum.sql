-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2017 at 05:29 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sajtipraktikum`
--

-- --------------------------------------------------------

--
-- Table structure for table `ankete`
--

CREATE TABLE IF NOT EXISTS `ankete` (
  `id_ankete` int(11) NOT NULL,
  `naziv_ankete` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ankete`
--

INSERT INTO `ankete` (`id_ankete`, `naziv_ankete`) VALUES
(1, 'Vase misljenje o nasim ponudama');

-- --------------------------------------------------------

--
-- Table structure for table `ankete_iteracije`
--

CREATE TABLE IF NOT EXISTS `ankete_iteracije` (
  `id_iteracije` int(11) NOT NULL,
  `id_ankete` int(11) NOT NULL,
  `slika_iteracije` text COLLATE utf8_unicode_ci NOT NULL,
  `opis_iteracije` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ankete_iteracije`
--

INSERT INTO `ankete_iteracije` (`id_iteracije`, `id_ankete`, `slika_iteracije`, `opis_iteracije`) VALUES
(1, 1, 'assets/images/homePozadina/slika02.jpg', 'Grcka'),
(2, 1, 'assets/images/homePozadina/slika03.jpg', 'Turska');

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

CREATE TABLE IF NOT EXISTS `drzava` (
  `id_drzave` int(11) NOT NULL,
  `kod_drzave` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `naziv_drzave` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`id_drzave`, `kod_drzave`, `naziv_drzave`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People''s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People''s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'YU', 'Yugoslavia'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `drzava_grad`
--

CREATE TABLE IF NOT EXISTS `drzava_grad` (
  `id_drzave` int(11) NOT NULL,
  `id_grada` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE IF NOT EXISTS `galerija` (
  `id_galerija` int(11) NOT NULL,
  `naziv` text COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`id_galerija`, `naziv`, `datum_dodavanja`) VALUES
(1, 'Grcka', 1418348662),
(2, 'Turska', 1418348662);

-- --------------------------------------------------------

--
-- Table structure for table `galerija_slike`
--

CREATE TABLE IF NOT EXISTS `galerija_slike` (
  `id_slike` int(11) NOT NULL,
  `id_galerije` int(11) NOT NULL,
  `naziv_slike` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `putanja_slike` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis_slike` text COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galerija_slike`
--

INSERT INTO `galerija_slike` (`id_slike`, `id_galerije`, `naziv_slike`, `putanja_slike`, `opis_slike`, `datum_dodavanja`) VALUES
(1, 1, 'imeoveslike', 'slika1.jpg', 'opis ove slike', 1418348662),
(2, 1, 'slika ', 'slika2.jpg', 'opis ove slike', 1418348662),
(3, 1, 'Neko ime slike', 'slika3.jpg', 'opis ove slike', 1418348662),
(4, 1, 'ime', 'slika4.jpg', 'opis ove slike', 1418348662),
(5, 2, 'Opet neko ime', 'slika1.jpg', 'opis ove slike', 1418348662),
(6, 2, 'ime', 'slika6.jpg', 'opis ove slike', 1418348662),
(7, 2, 'ime slike', 'slika7.jpg', 'opis ove slike', 1418348662),
(8, 2, 'ime', 'slika8.jpg', 'opis ove slike', 1418348662),
(9, 2, 'ime slike 2', 'slika4.jpg', 'opis ove slike', 1418348662),
(10, 1, 'ime', 'slika1.jpg', 'opis ove slike', 1418348662);

-- --------------------------------------------------------

--
-- Table structure for table `galerija_slike_za_slider`
--

CREATE TABLE IF NOT EXISTS `galerija_slike_za_slider` (
  `id_galerija` int(11) NOT NULL,
  `id_slika` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE IF NOT EXISTS `grad` (
  `id_grada` int(11) NOT NULL,
  `naziv_grada` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id_korisnika` int(11) NOT NULL,
  `korisnicko_ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sifra_korisnika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail_korisnika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_uloge` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `korisnicko_ime`, `sifra_korisnika`, `mail_korisnika`, `id_uloge`) VALUES
(1, 'Marko', 'c28aa76990994587b0e907683792297c', 'marko@marko.com', 1),
(4, 'pera1', 'd8795f0d07280328f80e59b1e8414c49', 'pera@pera.com', 2),
(5, 'ljuba', 'c69f80c12c0904311baed8a615868db1', 'ljuba@ljuba.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `linkovi`
--

CREATE TABLE IF NOT EXISTS `linkovi` (
  `id_link` int(11) NOT NULL,
  `naziv_link` text COLLATE utf8_unicode_ci NOT NULL,
  `pozicija` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linkovi`
--

INSERT INTO `linkovi` (`id_link`, `naziv_link`, `pozicija`) VALUES
(1, 'Grcka', 1),
(2, 'Turska', 2);

-- --------------------------------------------------------

--
-- Table structure for table `linkovi_slobodni_smestaji`
--

CREATE TABLE IF NOT EXISTS `linkovi_slobodni_smestaji` (
  `id_link` int(11) NOT NULL,
  `id_slobodni_smestaji` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linkovi_slobodni_smestaji`
--

INSERT INTO `linkovi_slobodni_smestaji` (`id_link`, `id_slobodni_smestaji`) VALUES
(1, 1),
(1, 3),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(2, 2),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `list_cities`
--

CREATE TABLE IF NOT EXISTS `list_cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `city_name_short` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `list_cities`
--

INSERT INTO `list_cities` (`city_id`, `city_name`, `city_name_short`) VALUES
(1, 'Beograd', 'BG'),
(2, 'Timișoara', 'Timiș'),
(3, 'Pallanza', 'Palla');

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE IF NOT EXISTS `meni` (
  `id_meni` int(11) NOT NULL,
  `naziv_menija` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id_meni`, `naziv_menija`, `datum_dodavanja`) VALUES
(1, 'Leto 2016', 123123);

-- --------------------------------------------------------

--
-- Table structure for table `meni_linkovi`
--

CREATE TABLE IF NOT EXISTS `meni_linkovi` (
  `id_meni` int(11) NOT NULL,
  `id_link` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni_linkovi`
--

INSERT INTO `meni_linkovi` (`id_meni`, `id_link`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ocena_iteracije`
--

CREATE TABLE IF NOT EXISTS `ocena_iteracije` (
  `id_ocene` int(11) NOT NULL,
  `ocena` int(11) NOT NULL,
  `id_iteracije` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ocena_iteracije`
--

INSERT INTO `ocena_iteracije` (`id_ocene`, `ocena`, `id_iteracije`) VALUES
(1, 0, 1),
(2, 5, 2),
(3, 5, 1),
(4, 4, 1),
(5, 3, 1),
(6, 5, 1),
(7, 5, 1),
(8, 4, 2),
(9, 1, 1),
(10, 2, 1),
(11, 3, 1),
(12, 4, 2),
(13, 5, 1),
(14, 5, 1),
(15, 2, 1),
(16, 1, 1),
(17, 3, 1),
(18, 4, 1),
(19, 3, 1),
(20, 3, 1),
(21, 2, 1),
(22, 4, 2),
(23, 3, 1),
(24, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` text COLLATE utf8_unicode_ci NOT NULL,
  `long` text COLLATE utf8_unicode_ci NOT NULL,
  `formatted_address` text COLLATE utf8_unicode_ci,
  `type` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'coffee',
  `contact` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `place` text COLLATE utf8_unicode_ci NOT NULL,
  `facebookUsername` text COLLATE utf8_unicode_ci,
  `facebook` text COLLATE utf8_unicode_ci,
  `fromDb` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `image_url`, `lat`, `long`, `formatted_address`, `type`, `contact`, `place`, `facebookUsername`, `facebook`, `fromDb`) VALUES
(1, 'Proba2', '/assets/images/uploads/13625272_1353354938011168_370792937_n.png', '44.791364252582056', '20.497738122503506', 'Vojislava Ilića 73, Beograd, Serbia', 'restaurant', 'asd', 'Beograd', NULL, NULL, 1),
(60, 'Proba1', '/assets/images/uploads/Windows Server 2012-2015-12-13-22-04-56.png', '45.94064366765333', '8.567005991062615', 'Corso Benedetto Cairoli, 29, 28921 Pallanza VB, Italy', 'food', '011929299', 'Pallanza', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prevoz`
--

CREATE TABLE IF NOT EXISTS `prevoz` (
  `id_prevoza` int(11) NOT NULL,
  `naziv_prevoza` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slika_prevoza` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `id_promo` int(11) NOT NULL,
  `id_slobodni_smestaji` int(11) NOT NULL,
  `naziv_promo` text COLLATE utf8_unicode_ci NOT NULL,
  `pozicija` int(11) NOT NULL,
  `datum_dodavanja` int(11) NOT NULL,
  `datum_isteka` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `id_slobodni_smestaji`, `naziv_promo`, `pozicija`, `datum_dodavanja`, `datum_isteka`) VALUES
(1, 1, 'Grcka 2016', 1, 1458002967, 1958992077),
(2, 2, 'Kushadasi', 2, 1458092077, 1958992077),
(3, 3, 'Grcka 2016', 1, 1458002967, 1958992077),
(4, 4, 'Grcka 2016', 1, 1458002967, 1958992077),
(5, 15, 'Grcka 2016', 1, 1458002967, 1958992077),
(6, 14, 'Grcka 2016', 1, 1458002967, 1958992077),
(7, 13, 'Grcka 2016', 1, 1458002967, 1958992077),
(8, 16, 'Grcka 2016', 1, 1458002967, 1958992077),
(9, 17, 'Grcka 2016', 1, 1458002967, 1958992077),
(10, 18, 'Grcka 2016', 1, 1458002967, 1958992077),
(11, 19, 'Grcka 2016', 1, 1458002967, 1958992077),
(12, 20, 'Grcka 2016', 1, 1458002967, 1958992077),
(13, 9, 'Kushadasi', 2, 1458092077, 1958992077),
(14, 8, 'Kushadasi', 2, 1458092077, 1958992077),
(15, 7, 'Kushadasi', 2, 1458092077, 1958992077),
(16, 6, 'Kushadasi', 2, 1458092077, 1958992077),
(17, 5, 'Kushadasi', 2, 1458092077, 1958992077),
(18, 10, 'Kushadasi', 2, 1458002967, 1958992077),
(19, 11, 'Kushadasi', 2, 1458002967, 1958992077),
(20, 12, 'Kushadasi', 2, 1458002967, 1958992077);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija_kontakt_podaci`
--

CREATE TABLE IF NOT EXISTS `rezervacija_kontakt_podaci` (
  `id_kontakt_podataka` int(11) NOT NULL,
  `id_rezervacije` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `datum_rezervacije` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezervisani_smestaji`
--

CREATE TABLE IF NOT EXISTS `rezervisani_smestaji` (
  `id_rezervacije` int(11) NOT NULL,
  `id_smestaja` int(11) NOT NULL,
  `datum_pocetka` int(11) NOT NULL,
  `datum_kraja` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL,
  `naziv` text COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `naziv`, `datum_dodavanja`) VALUES
(1, 'Slider 1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider_slike_za_slider`
--

CREATE TABLE IF NOT EXISTS `slider_slike_za_slider` (
  `id_slider` int(11) NOT NULL,
  `id_slike` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider_slike_za_slider`
--

INSERT INTO `slider_slike_za_slider` (`id_slider`, `id_slike`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `slike_za_slider`
--

CREATE TABLE IF NOT EXISTS `slike_za_slider` (
  `id_slike` int(11) NOT NULL,
  `naslov` text COLLATE utf8_unicode_ci NOT NULL,
  `podnaslov` text COLLATE utf8_unicode_ci,
  `slika` text COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slike_za_slider`
--

INSERT INTO `slike_za_slider` (`id_slike`, `naslov`, `podnaslov`, `slika`, `datum_dodavanja`) VALUES
(1, 'Slika 1', 'Opis 1', 'assets/images/homePozadina/slika04.jpg', 0),
(2, 'Slika 2', 'Opis 2', 'assets/images/homePozadina/slika06.jpg', 0),
(3, 'Slika 3', 'Neki opis', 'assets/images/homePozadina/slika07.jpg', 0),
(4, 'slika08', 'slika 8', 'assets/images/homePozadina/slika08.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slobodni_smestaji`
--

CREATE TABLE IF NOT EXISTS `slobodni_smestaji` (
  `id_slobodni_smestaji` int(11) NOT NULL,
  `id_smestaja` int(11) NOT NULL,
  `id_tip_sezone` int(11) NOT NULL,
  `max_broj_ljudi_po_sobi` int(11) NOT NULL,
  `pocetak_sezone` int(11) NOT NULL,
  `kraj_sezone` int(11) NOT NULL,
  `dani` int(11) NOT NULL,
  `slike` text COLLATE utf8_unicode_ci NOT NULL,
  `gl_slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena_po_sobi` int(11) NOT NULL,
  `popust` int(11) DEFAULT NULL,
  `moguci_prevoz` text COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slobodni_smestaji`
--

INSERT INTO `slobodni_smestaji` (`id_slobodni_smestaji`, `id_smestaja`, `id_tip_sezone`, `max_broj_ljudi_po_sobi`, `pocetak_sezone`, `kraj_sezone`, `dani`, `slike`, `gl_slika`, `cena_po_sobi`, `popust`, `moguci_prevoz`, `datum_dodavanja`) VALUES
(1, 1, 1, 4, 1451606400, 1457996311, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika1.jpg', 150, NULL, '{1,2,3}', 1457996311),
(2, 2, 1, 4, 1451606400, 1457996311, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika2.jpg', 150, NULL, '{1,2,3}', 1457996311),
(3, 3, 1, 4, 1451606400, 1457996311, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika3.jpg', 150, NULL, '{1,2,3}', 1457996311),
(4, 4, 2, 4, 1458100797, 1458134997, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika04.jpg', 210, NULL, '', 1458134797),
(5, 5, 1, 4, 1450130797, 1459130797, 7, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika06.jpg', 640, NULL, '', 1458110797),
(6, 6, 1, 3, 1438130797, 1458139797, 7, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika07.jpg', 300, NULL, '', 1458030797),
(7, 7, 1, 10, 1408130797, 1498130797, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika08.jpg', 695, NULL, '', 1408130797),
(8, 8, 1, 4, 1451130797, 1459130797, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika1.jpg', 540, NULL, '', 1498130797),
(9, 9, 1, 4, 1458030797, 1458930797, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika02.jpg', 800, NULL, '', 1458030797),
(10, 10, 2, 4, 1458030797, 1458930797, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika03.jpg', 260, NULL, '', 1458030797),
(11, 11, 1, 3, 1460419200, 1469419200, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika04.jpg', 210, NULL, '', 1460419200),
(12, 12, 1, 3, 1460419200, 1469419200, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika06.jpg', 225, NULL, '', 1460419200),
(13, 13, 1, 3, 1460419200, 1469419200, 7, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika07.jpg', 240, NULL, '', 1460419200),
(14, 14, 1, 3, 1460419200, 1469419200, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika08.jpg', 180, NULL, '', 1460419200),
(15, 15, 1, 2, 1460419200, 1469419200, 7, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika1.jpg', 170, NULL, '', 1460419200),
(16, 16, 1, 2, 1460419200, 1469419200, 7, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika2.jpg', 215, NULL, '', 1460419200),
(17, 18, 1, 3, 1460419200, 1469419200, 7, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika3.jpg', 220, NULL, '', 1460419200),
(18, 19, 1, 2, 1460419200, 1469419200, 7, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika04.jpg', 220, NULL, '', 1460419200),
(19, 17, 1, 3, 1460419200, 1469419200, 7, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika06.jpg', 200, NULL, '', 1460419200),
(20, 20, 1, 4, 1460419200, 1469419200, 10, '["slika1.jpg","slika2.jpg","slika3.jpg"]', 'slika07.jpg', 150, NULL, '', 1460419200);

-- --------------------------------------------------------

--
-- Table structure for table `smestaj`
--

CREATE TABLE IF NOT EXISTS `smestaj` (
  `id_smestaja` int(11) NOT NULL,
  `id_tip` int(11) NOT NULL,
  `naziv` text COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `broj_soba` int(11) NOT NULL,
  `id_drzave` int(11) NOT NULL,
  `id_grada` int(11) NOT NULL,
  `datum_dodavanja` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `smestaj`
--

INSERT INTO `smestaj` (`id_smestaja`, `id_tip`, `naziv`, `opis`, `broj_soba`, `id_drzave`, `id_grada`, `datum_dodavanja`) VALUES
(1, 1, 'Kuca na moru', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit a nisl eu auctor. Nullam molestie volutpat rhoncus. Duis a purus accumsan, facilisis lectus et, pretium felis. Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum volutpat vulputate leo, sed ullamcorper diam lobortis eget. Morbi leo diam, vulputate et turpis ac, condimentum consectetur nunc. Maecenas commodo elit at mi commodo tempor.\r\n\r\nSed nec accumsan sapien. Vivamus felis arcu, venenatis eu neque at, dapibus luctus dolor. Mauris velit eros, mattis ut dignissim non, dignissim sit amet nunc. Nam sollicitudin consectetur molestie. Cras elit orci, accumsan ut placerat in, iaculis eget sapien. Aliquam ut urna pellentesque, imperdiet elit a, rhoncus ex. Duis molestie erat arcu, congue feugiat urna eleifend vitae. Proin et placerat turpis, vitae pretium lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel hendrerit risus. Aliquam at commodo massa. Nunc pretium sit amet risus sit amet vehicula. Aliquam non ultricies ligula. Nullam posuere nunc eu sapien ultricies, vel egestas sapien aliquam. Mauris dignissim libero mollis, congue est a, porttitor mauris.\r\n\r\nIn maximus odio sed odio mollis dignissim. Fusce egestas eros sed turpis pretium, et pharetra libero accumsan. Praesent maximus nisi erat, porttitor porttitor est molestie at. Etiam at tellus nulla. Nam vitae elementum diam. Duis justo enim, ullamcorper ac vulputate at, tincidunt ut odio. Pellentesque eget pellentesque diam. Integer maximus tellus a sollicitudin tempor.', 20, 84, 2, 1458110797),
(2, 1, 'Kuca sa pogledom na plazu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit a nisl eu auctor. Nullam molestie volutpat rhoncus. Duis a purus accumsan, facilisis lectus et, pretium felis. Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum volutpat vulputate leo, sed ullamcorper diam lobortis eget. Morbi leo diam, vulputate et turpis ac, condimentum consectetur nunc. Maecenas commodo elit at mi commodo tempor.\r\n\r\nSed nec accumsan sapien. Vivamus felis arcu, venenatis eu neque at, dapibus luctus dolor. Mauris velit eros, mattis ut dignissim non, dignissim sit amet nunc. Nam sollicitudin consectetur molestie. Cras elit orci, accumsan ut placerat in, iaculis eget sapien. Aliquam ut urna pellentesque, imperdiet elit a, rhoncus ex. Duis molestie erat arcu, congue feugiat urna eleifend vitae. Proin et placerat turpis, vitae pretium lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel hendrerit risus. Aliquam at commodo massa. Nunc pretium sit amet risus sit amet vehicula. Aliquam non ultricies ligula. Nullam posuere nunc eu sapien ultricies, vel egestas sapien aliquam. Mauris dignissim libero mollis, congue est a, porttitor mauris.\r\n\r\nIn maximus odio sed odio mollis dignissim. Fusce egestas eros sed turpis pretium, et pharetra libero accumsan. Praesent maximus nisi erat, porttitor porttitor est molestie at. Etiam at tellus nulla. Nam vitae elementum diam. Duis justo enim, ullamcorper ac vulputate at, tincidunt ut odio. Pellentesque eget pellentesque diam. Integer maximus tellus a sollicitudin tempor.', 20, 222, 2, 1458110797),
(3, 2, 'Hotel sa 3 zvezdice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit a nisl eu auctor. Nullam molestie volutpat rhoncus. Duis a purus accumsan, facilisis lectus et, pretium felis. Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum volutpat vulputate leo, sed ullamcorper diam lobortis eget. Morbi leo diam, vulputate et turpis ac, condimentum consectetur nunc. Maecenas commodo elit at mi commodo tempor.\r\n\r\nSed nec accumsan sapien. Vivamus felis arcu, venenatis eu neque at, dapibus luctus dolor. Mauris velit eros, mattis ut dignissim non, dignissim sit amet nunc. Nam sollicitudin consectetur molestie. Cras elit orci, accumsan ut placerat in, iaculis eget sapien. Aliquam ut urna pellentesque, imperdiet elit a, rhoncus ex. Duis molestie erat arcu, congue feugiat urna eleifend vitae. Proin et placerat turpis, vitae pretium lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel hendrerit risus. Aliquam at commodo massa. Nunc pretium sit amet risus sit amet vehicula. Aliquam non ultricies ligula. Nullam posuere nunc eu sapien ultricies, vel egestas sapien aliquam. Mauris dignissim libero mollis, congue est a, porttitor mauris.\r\n\r\nIn maximus odio sed odio mollis dignissim. Fusce egestas eros sed turpis pretium, et pharetra libero accumsan. Praesent maximus nisi erat, porttitor porttitor est molestie at. Etiam at tellus nulla. Nam vitae elementum diam. Duis justo enim, ullamcorper ac vulputate at, tincidunt ut odio. Pellentesque eget pellentesque diam. Integer maximus tellus a sollicitudin tempor.', 20, 84, 2, 1458110797),
(4, 4, 'Hotel Marko', 'Hotel sa 4 zvezdice, sa pogledom na more', 40, 222, 1, 1458134797),
(5, 1, 'Hotel Grand blue sky', 'Hotel sa 4 zvezdice', 40, 222, 2, 1458130797),
(6, 2, 'MARBEL Hotel', 'Hotel sa 4 zvezdice', 80, 222, 4, 1458130797),
(7, 2, 'PALM Hotel', 'Hotel sa 4 zvezdice', 60, 222, 1, 1453130797),
(8, 2, 'OMER Holiday Resort', 'Hotel sa 4 zvezdice', 60, 222, 4, 1458030797),
(9, 1, 'Dabaklar Hotel', 'Hotel sa 4 zvezdice', 40, 222, 5, 1408130797),
(10, 1, 'Batihan Beach Resort', 'Hotel sa 4 zvezdice', 30, 222, 2, 1458030797),
(11, 1, 'Happy Apartmani', 'Apartman', 5, 222, 2, 1458110797),
(12, 1, 'Tuntas Family', 'Apartman', 5, 222, 2, 1458110797),
(13, 2, 'Vila Gogo', 'Apartman', 5, 84, 1, 1458110797),
(14, 1, 'Vila Despina', 'Apartman', 5, 84, 6, 1458110797),
(15, 1, 'Vila Eleni', 'Apartman', 8, 84, 6, 1458110797),
(16, 2, 'Vila Apostolis', 'Apartman', 8, 84, 5, 1458110797),
(17, 1, 'Vila Nikas', 'Apartmani', 8, 84, 8, 1458110797),
(18, 1, 'Vila Rina', 'Apartman', 8, 84, 9, 1458110797),
(19, 1, 'Vila Zepos', 'Apartman', 8, 84, 2, 1458110797),
(20, 1, 'Vila Panorama', '', 3, 84, 8, 1458110797);

-- --------------------------------------------------------

--
-- Table structure for table `tip_sezone`
--

CREATE TABLE IF NOT EXISTS `tip_sezone` (
  `id_tip_sezone` int(11) NOT NULL,
  `naziv_sezone` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tip_smestaja`
--

CREATE TABLE IF NOT EXISTS `tip_smestaja` (
  `id_tip_smestaja` int(11) NOT NULL,
  `naziv_smestaja` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE IF NOT EXISTS `uloge` (
  `id_uloge` int(11) NOT NULL,
  `naziv_uloge` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id_uloge`, `naziv_uloge`) VALUES
(1, 'administrator'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ankete`
--
ALTER TABLE `ankete`
  ADD PRIMARY KEY (`id_ankete`);

--
-- Indexes for table `ankete_iteracije`
--
ALTER TABLE `ankete_iteracije`
  ADD PRIMARY KEY (`id_iteracije`);

--
-- Indexes for table `drzava`
--
ALTER TABLE `drzava`
  ADD PRIMARY KEY (`id_drzave`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`id_galerija`);

--
-- Indexes for table `galerija_slike`
--
ALTER TABLE `galerija_slike`
  ADD PRIMARY KEY (`id_slike`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id_grada`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnika`);

--
-- Indexes for table `linkovi`
--
ALTER TABLE `linkovi`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `list_cities`
--
ALTER TABLE `list_cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id_meni`);

--
-- Indexes for table `ocena_iteracije`
--
ALTER TABLE `ocena_iteracije`
  ADD PRIMARY KEY (`id_ocene`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prevoz`
--
ALTER TABLE `prevoz`
  ADD PRIMARY KEY (`id_prevoza`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `rezervacija_kontakt_podaci`
--
ALTER TABLE `rezervacija_kontakt_podaci`
  ADD PRIMARY KEY (`id_kontakt_podataka`);

--
-- Indexes for table `rezervisani_smestaji`
--
ALTER TABLE `rezervisani_smestaji`
  ADD PRIMARY KEY (`id_rezervacije`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `slike_za_slider`
--
ALTER TABLE `slike_za_slider`
  ADD PRIMARY KEY (`id_slike`);

--
-- Indexes for table `slobodni_smestaji`
--
ALTER TABLE `slobodni_smestaji`
  ADD PRIMARY KEY (`id_slobodni_smestaji`);

--
-- Indexes for table `smestaj`
--
ALTER TABLE `smestaj`
  ADD PRIMARY KEY (`id_smestaja`);

--
-- Indexes for table `tip_sezone`
--
ALTER TABLE `tip_sezone`
  ADD PRIMARY KEY (`id_tip_sezone`);

--
-- Indexes for table `tip_smestaja`
--
ALTER TABLE `tip_smestaja`
  ADD PRIMARY KEY (`id_tip_smestaja`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`id_uloge`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ankete`
--
ALTER TABLE `ankete`
  MODIFY `id_ankete` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ankete_iteracije`
--
ALTER TABLE `ankete_iteracije`
  MODIFY `id_iteracije` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `drzava`
--
ALTER TABLE `drzava`
  MODIFY `id_drzave` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `id_galerija` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `galerija_slike`
--
ALTER TABLE `galerija_slike`
  MODIFY `id_slike` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id_grada` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnika` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `linkovi`
--
ALTER TABLE `linkovi`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `list_cities`
--
ALTER TABLE `list_cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id_meni` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ocena_iteracije`
--
ALTER TABLE `ocena_iteracije`
  MODIFY `id_ocene` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `prevoz`
--
ALTER TABLE `prevoz`
  MODIFY `id_prevoza` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `rezervacija_kontakt_podaci`
--
ALTER TABLE `rezervacija_kontakt_podaci`
  MODIFY `id_kontakt_podataka` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rezervisani_smestaji`
--
ALTER TABLE `rezervisani_smestaji`
  MODIFY `id_rezervacije` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slike_za_slider`
--
ALTER TABLE `slike_za_slider`
  MODIFY `id_slike` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slobodni_smestaji`
--
ALTER TABLE `slobodni_smestaji`
  MODIFY `id_slobodni_smestaji` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `smestaj`
--
ALTER TABLE `smestaj`
  MODIFY `id_smestaja` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tip_sezone`
--
ALTER TABLE `tip_sezone`
  MODIFY `id_tip_sezone` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tip_smestaja`
--
ALTER TABLE `tip_smestaja`
  MODIFY `id_tip_smestaja` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `id_uloge` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
