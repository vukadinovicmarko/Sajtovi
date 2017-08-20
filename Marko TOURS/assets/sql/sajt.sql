-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2016 at 06:10 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sajt`
--

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

CREATE TABLE IF NOT EXISTS `drzava` (
  `id_drzave` int(11) NOT NULL,
  `kod_drzave` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `naziv_drzave` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE IF NOT EXISTS `grad` (
  `id_grada` int(11) NOT NULL,
  `naziv_grada` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `korisnicko_ime`, `sifra_korisnika`, `mail_korisnika`, `id_uloge`) VALUES
(1, 'Marko', 'c28aa76990994587b0e907683792297c', 'marko@marko.com', 1),
(4, 'pera', 'd8795f0d07280328f80e59b1e8414c49', 'pera@pera.com', 2),
(5, 'ljuba', 'c69f80c12c0904311baed8a615868db1', 'ljuba@ljuba.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `linkovi`
--

CREATE TABLE IF NOT EXISTS `linkovi` (
  `id_link` int(11) NOT NULL,
  `naziv_link` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `pozicija` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linkovi`
--

INSERT INTO `linkovi` (`id_link`, `naziv_link`, `link`, `pozicija`) VALUES
(1, 'Leto 2016', 'promo/2016', 1),
(2, 'Grcka 2016', 'promo/grcka2016', 2);

-- --------------------------------------------------------

--
-- Table structure for table `linkovi_slobodni_smestaji`
--

CREATE TABLE IF NOT EXISTS `linkovi_slobodni_smestaji` (
  `id_link` int(11) NOT NULL,
  `id_slobodni_smestaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linkovi_slobodni_smestaji`
--

INSERT INTO `linkovi_slobodni_smestaji` (`id_link`, `id_slobodni_smestaji`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE IF NOT EXISTS `meni` (
  `id_meni` int(11) NOT NULL,
  `naziv_menija` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id_meni`, `naziv_menija`, `datum_dodavanja`) VALUES
(1, 'glavni_meni', 123123);

-- --------------------------------------------------------

--
-- Table structure for table `meni_linkovi`
--

CREATE TABLE IF NOT EXISTS `meni_linkovi` (
  `id_meni` int(11) NOT NULL,
  `id_link` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni_linkovi`
--

INSERT INTO `meni_linkovi` (`id_meni`, `id_link`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prevoz`
--

CREATE TABLE IF NOT EXISTS `prevoz` (
  `id_prevoza` int(11) NOT NULL,
  `naziv_prevoza` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slika_prevoza` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `id_slobodni_smestaji`, `naziv_promo`, `pozicija`, `datum_dodavanja`, `datum_isteka`) VALUES
(1, 1, 'Promocija1', 1, 1458002967, 1458052967);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija_kontakt_podaci`
--

CREATE TABLE IF NOT EXISTS `rezervacija_kontakt_podaci` (
  `id_kontakt_podataka` int(11) NOT NULL,
  `id_rezervacije` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `datum_rezervacije` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezervisani_smestaji`
--

CREATE TABLE IF NOT EXISTS `rezervisani_smestaji` (
  `id_rezervacije` int(11) NOT NULL,
  `id_smestaja` int(11) NOT NULL,
  `datum_pocetka` int(11) NOT NULL,
  `datum_kraja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL,
  `naziv` text COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider_slike_za_slider`
--

CREATE TABLE IF NOT EXISTS `slider_slike_za_slider` (
  `id_slider` int(11) NOT NULL,
  `id_slike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slike_za_slider`
--

CREATE TABLE IF NOT EXISTS `slike_za_slider` (
  `id_slike` int(11) NOT NULL,
  `naslov` text COLLATE utf8_unicode_ci NOT NULL,
  `podnaslov` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `slika` text COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `cena_po_sobi` int(11) NOT NULL,
  `popust` int(11) DEFAULT NULL,
  `moguci_prevoz` text COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slobodni_smestaji`
--

INSERT INTO `slobodni_smestaji` (`id_slobodni_smestaji`, `id_smestaja`, `id_tip_sezone`, `max_broj_ljudi_po_sobi`, `pocetak_sezone`, `kraj_sezone`, `dani`, `slike`, `cena_po_sobi`, `popust`, `moguci_prevoz`, `datum_dodavanja`) VALUES
(1, 1, 1, 4, 1451606400, 1457996311, 10, '{''slika1'',''slika2'',''slika3''}', 150, NULL, '{1,2,3}', 1457996311);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `smestaj`
--

INSERT INTO `smestaj` (`id_smestaja`, `id_tip`, `naziv`, `opis`, `broj_soba`, `id_drzave`, `id_grada`, `datum_dodavanja`) VALUES
(1, 1, 'Kuca na moru', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit a nisl eu auctor. Nullam molestie volutpat rhoncus. Duis a purus accumsan, facilisis lectus et, pretium felis. Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum volutpat vulputate leo, sed ullamcorper diam lobortis eget. Morbi leo diam, vulputate et turpis ac, condimentum consectetur nunc. Maecenas commodo elit at mi commodo tempor.\r\n\r\nSed nec accumsan sapien. Vivamus felis arcu, venenatis eu neque at, dapibus luctus dolor. Mauris velit eros, mattis ut dignissim non, dignissim sit amet nunc. Nam sollicitudin consectetur molestie. Cras elit orci, accumsan ut placerat in, iaculis eget sapien. Aliquam ut urna pellentesque, imperdiet elit a, rhoncus ex. Duis molestie erat arcu, congue feugiat urna eleifend vitae. Proin et placerat turpis, vitae pretium lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel hendrerit risus. Aliquam at commodo massa. Nunc pretium sit amet risus sit amet vehicula. Aliquam non ultricies ligula. Nullam posuere nunc eu sapien ultricies, vel egestas sapien aliquam. Mauris dignissim libero mollis, congue est a, porttitor mauris.\r\n\r\nIn maximus odio sed odio mollis dignissim. Fusce egestas eros sed turpis pretium, et pharetra libero accumsan. Praesent maximus nisi erat, porttitor porttitor est molestie at. Etiam at tellus nulla. Nam vitae elementum diam. Duis justo enim, ullamcorper ac vulputate at, tincidunt ut odio. Pellentesque eget pellentesque diam. Integer maximus tellus a sollicitudin tempor.', 20, 1, 2, 12312312);

-- --------------------------------------------------------

--
-- Table structure for table `tip_sezone`
--

CREATE TABLE IF NOT EXISTS `tip_sezone` (
  `id_tip_sezone` int(11) NOT NULL,
  `naziv_sezone` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tip_smestaja`
--

CREATE TABLE IF NOT EXISTS `tip_smestaja` (
  `id_tip_smestaja` int(11) NOT NULL,
  `naziv_smestaja` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE IF NOT EXISTS `uloge` (
  `id_uloge` int(11) NOT NULL,
  `naziv_uloge` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `drzava`
--
ALTER TABLE `drzava`
  ADD PRIMARY KEY (`id_drzave`);

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
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id_meni`);

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
-- AUTO_INCREMENT for table `drzava`
--
ALTER TABLE `drzava`
  MODIFY `id_drzave` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id_grada` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnika` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `linkovi`
--
ALTER TABLE `linkovi`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id_meni` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prevoz`
--
ALTER TABLE `prevoz`
  MODIFY `id_prevoza` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slike_za_slider`
--
ALTER TABLE `slike_za_slider`
  MODIFY `id_slike` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slobodni_smestaji`
--
ALTER TABLE `slobodni_smestaji`
  MODIFY `id_slobodni_smestaji` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `smestaj`
--
ALTER TABLE `smestaj`
  MODIFY `id_smestaja` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
