-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 24, 2018 at 08:09 AM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wom`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbupdate_history`
--

DROP TABLE IF EXISTS `dbupdate_history`;
CREATE TABLE IF NOT EXISTS `dbupdate_history` (
  `id` int(11) NOT NULL,
  `query` text COLLATE utf8_slovenian_ci,
  `datum_izmene` datetime DEFAULT NULL,
  `opis` text COLLATE utf8_slovenian_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `dbupdate_history`
--

INSERT INTO `dbupdate_history` (`id`, `query`, `datum_izmene`, `opis`) VALUES
(1, '\r\ncreate table if not exists operativni_sistem (\r\n    `id` int(11) NOT NULL AUTO_INCREMENT,\r\n    `naziv` varchar(50) NOT NULL,\r\n    PRIMARY KEY (`id`)\r\n    )\r\n    ENGINE=InnoDB\r\n    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;', '2018-07-20 10:17:54', 'Kreiranje tabele sa operativnim sistemima'),
(2, '\r\ncreate table if not exists maticna_ploca (\r\n    `id` int(11) NOT NULL AUTO_INCREMENT,\r\n    `naziv` varchar(50) NOT NULL,\r\n    PRIMARY KEY (`id`)\r\n    )\r\n    ENGINE=InnoDB\r\n    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;', '2018-07-20 10:17:54', 'Kreiranje tabele sa maticnim plocama'),
(3, '\r\ncreate table if not exists procesor (\r\n    `id` int(11) NOT NULL AUTO_INCREMENT,\r\n    `naziv` varchar(50) NOT NULL,\r\n    PRIMARY KEY (`id`)\r\n    )\r\n    ENGINE=InnoDB\r\n    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;', '2018-07-20 10:17:54', 'Kreiranje tabele sa procesorima'),
(4, '\r\ncreate table if not exists tip_racunara (\r\n    `id` int(11) NOT NULL AUTO_INCREMENT,\r\n    `naziv` varchar(50) NOT NULL,\r\n    PRIMARY KEY (`id`)\r\n    )\r\n    ENGINE=InnoDB\r\n    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;', '2018-07-20 10:17:55', 'Kreiranje tabele sa tipovima racunara (desktop/laptop)'),
(5, '\r\ncreate table if not exists korisnik (\r\n    `id` int(11) NOT NULL AUTO_INCREMENT,\r\n    `ime` varchar(60) NOT NULL,\r\n    `prezime` varchar(60) NOT NULL,\r\n    `email` varchar(60) NOT NULL,\r\n    `tel` varchar(50) NOT NULL,\r\n    PRIMARY KEY (`id`)\r\n    )\r\n    ENGINE=InnoDB\r\n    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;', '2018-07-20 10:17:55', 'Kreiranje tabele sa korisnicima'),
(6, '\r\ncreate table if not exists rola (\r\n    `id` int(11) NOT NULL AUTO_INCREMENT,\r\n    `rola` varchar(50) NOT NULL,\r\n    `opis_role` varchar(50) NOT NULL,\r\n    PRIMARY KEY (`id`)\r\n    )\r\n    ENGINE=InnoDB\r\n    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;', '2018-07-20 10:17:55', 'Kreiranje tabele sa rolama'),
(7, '\r\ncreate table if not exists korisnicka_podrska (\r\n    `id` int(11) NOT NULL AUTO_INCREMENT,\r\n    `username` varchar(60) NOT NULL,\r\n    `password` varchar(100) NOT NULL,\r\n    `ime` varchar(60) NOT NULL,\r\n    `prezime` varchar(60) NOT NULL,    \r\n    `email` varchar(60) NOT NULL,\r\n    `tel` varchar(50) NOT NULL,\r\n    `id_rola` int(11) NOT NULL,\r\n    PRIMARY KEY (`id`),\r\n    FOREIGN KEY (`id_rola`) REFERENCES rola (`id`) ON DELETE NO ACTION ON UPDATE CASCADE\r\n    )\r\n    ENGINE=InnoDB\r\n    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;', '2018-07-20 10:17:55', 'Kreiranje tabele sa korisnicima'),
(8, '\r\ncreate table if not exists kvar (\r\n    `id` int(11) NOT NULL AUTO_INCREMENT,\r\n    `kvar` varchar(50) NOT NULL,\r\n    PRIMARY KEY (`id`)\r\n    )\r\n    ENGINE=InnoDB\r\n    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;', '2018-07-20 10:17:55', 'Kreiranje tabele sa tipovima kvara'),
(9, '\r\ncreate table if not exists racunar (\r\n    `id` int(11) NOT NULL AUTO_INCREMENT,\r\n    `naziv` varchar(50) NOT NULL,\r\n    `id_tip` int(11) NOT NULL,\r\n    `id_os` int(11) NOT NULL,\r\n    `id_mb` int(11) NOT NULL,\r\n    `id_cpu` int(11) NOT NULL,\r\n    `id_korisnik` int(11),\r\n    PRIMARY KEY (`id`),\r\n    FOREIGN KEY (`id_tip`) REFERENCES tip_racunara (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,\r\n    FOREIGN KEY (`id_os`) REFERENCES operativni_sistem (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,\r\n    FOREIGN KEY (`id_mb`) REFERENCES maticna_ploca (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,\r\n    FOREIGN KEY (`id_cpu`) REFERENCES procesor (`id`) ON DELETE NO ACTION ON UPDATE CASCADE\r\n    )\r\n    ENGINE=InnoDB\r\n    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;', '2018-07-20 10:17:56', 'Kreiranje tabele sa racunarima'),
(10, '\r\ncreate table if not exists status (\r\n    `id` int(11) NOT NULL AUTO_INCREMENT,\r\n    `status` varchar(50) NOT NULL,\r\n     PRIMARY KEY (`id`)\r\n    )\r\n    ENGINE=InnoDB\r\n    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;', '2018-07-20 10:17:56', 'Kreiranje tabele sa statusima'),
(11, '\r\ncreate table if not exists radni_nalog (\r\n    `id` int(11) NOT NULL AUTO_INCREMENT,\r\n    `id_korisnicka` int(11) NOT NULL,\r\n    `id_racunar` int(11) NOT NULL,\r\n    `id_kvar` int(11) NOT NULL,\r\n    `vreme_kreiranja` DATETIME NOT NULL,\r\n    `id_status` int(11) NOT NULL,\r\n    `opis_kvara` text NOT NULL,\r\n    `opis_resenja` text,\r\n    `vreme_zavrsetka` DATETIME,\r\n    PRIMARY KEY (`id`),\r\n    FOREIGN KEY (`id_korisnicka`) REFERENCES korisnicka_podrska (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,\r\n    FOREIGN KEY (`id_racunar`) REFERENCES racunar (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,\r\n    FOREIGN KEY (`id_kvar`) REFERENCES kvar (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,\r\n    FOREIGN KEY (`id_status`) REFERENCES status (`id`) ON DELETE NO ACTION ON UPDATE CASCADE\r\n    )\r\n    ENGINE=InnoDB\r\n    DEFAULT CHARACTER SET=utf8 COLLATE=utf8_slovenian_ci;', '2018-07-20 10:17:56', 'Kreiranje tabele sa radnim nalozima'),
(12, 'INSERT INTO rola (id,rola,opis_role) VALUES (1,\'gost\',\'Gost\');', '2018-07-20 10:17:56', 'Unos role gost'),
(13, 'INSERT INTO rola (id,rola,opis_role) VALUES (2,\'korisnik\',\'Korisnik\');', '2018-07-20 10:17:56', 'Unos role korisnik'),
(14, 'INSERT INTO rola (id,rola,opis_role) VALUES (4,\'supervizor\',\'Supervizor\');', '2018-07-20 10:17:56', 'Unos role supervizor'),
(15, 'INSERT INTO rola (id,rola,opis_role) VALUES (8,\'administrator\',\'Administrator\');', '2018-07-20 10:17:56', 'Unos role administrator'),
(16, 'INSERT INTO status (id,status) VALUES (1,\'ÄŒeka\');', '2018-07-22 10:58:37', 'Unos statusa ÄŒeka'),
(17, 'INSERT INTO status (id,status) VALUES (2,\'U radu\');', '2018-07-22 10:58:37', 'Unos statusa U radu'),
(18, 'INSERT INTO status (id,status) VALUES (3,\'ZavrÅ¡en\');', '2018-07-22 10:58:37', 'Unos statusa ZavrÅ¡en'),
(19, 'INSERT INTO status (id,status) VALUES (4,\'OdbaÄen\');', '2018-07-22 10:58:37', 'Unos statusa OdbaÄen'),
(20, 'ALTER TABLE korisnicka_podrska ADD random_string VARCHAR(100) DEFAULT \'\';', '2018-07-22 12:57:16', 'Kada korisnik zaboravi password potrebno mu je poslati link koji sadrzi neku random vrednost');

-- --------------------------------------------------------

--
-- Table structure for table `korisnicka_podrska`
--

DROP TABLE IF EXISTS `korisnicka_podrska`;
CREATE TABLE IF NOT EXISTS `korisnicka_podrska` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(60) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(60) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_slovenian_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `id_rola` int(11) NOT NULL,
  `random_string` varchar(100) COLLATE utf8_slovenian_ci DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `id_rola` (`id_rola`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnicka_podrska`
--

INSERT INTO `korisnicka_podrska` (`id`, `username`, `password`, `ime`, `prezime`, `email`, `tel`, `id_rola`, `random_string`) VALUES
(1, 'admin', '999bd20cca0b4fe517949baa1eff6a4c9a11fa42486d076bfe72dc7b88a11d59', 'admin', 'admin', '123@gmail.com', '', 8, ''),
(2, 'korisnik', 'korisnik', 'korisnik123', 'korisnik', '1234@gmail.com', 'yrtsfrs', 2, ''),
(3, 'supervizor', 'supervizor', 'supervizor', 'supervizor', '12345@gmail.com', '', 4, ''),
(7, 'test', 'test', 'test', 'test', 'test', 'test', 4, ''),
(23, 'rola4', 'd67caa260ad0bc9c9345211f346db3d51def9d7ad41a0c944c80db234f8fc29b', 'rola4', 'rola4', 'rola4', 'rola4', 4, ''),
(24, 'rola2', '3aae672a356b02c4c1ac89bd3b7e5af24cc33392732a020f93c6c13d50510ff4', 'rola2', 'rola2', 'rola2@gmail.com', '123', 2, ''),
(25, '23133', '0f454660c278c622dbe755aa3547d46552b78023237807c3a8d3b2cd67d8fe55', '123', '123', '123', '123', 2, ''),
(26, '123213', 'e4080b6eff7989c15b1af22bfa598726b11da8e524bdfdb11607560f7ef07f19', '123123123213123', '1231231', '3123123', '12312321', 2, ''),
(29, 'asd', '014b3a9f10974d62afcec072ea7fe54cf7dac6d2a739f7bb4fdaf61990c8f587', 'asd', 'asd', 'asd@mailinator.com', '123', 2, ''),
(30, 'qq', 'cfb0ecdb771e5c8222efe92c4999fca729aade3013fd47199fff3c379f37c21a', 'qq', 'qq', 'qq', '123', 2, ''),
(31, 'yy', 'cde507bb825059b1715046f6877fe8847fe5861111e55d8fea21dc09957ee87c', 'yy', 'yy', 'yy', '123', 2, ''),
(32, 'wsd', '7a1ec43e39834bbdae954e205a648cff0435004d06e9fdcdc47a5aa6d60567d8', 'wqd', 'wqd', 'wdq', 'wdq', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(60) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(60) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_slovenian_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `email`, `tel`) VALUES
(1, 'spale', 'haker', 'spale', '123'),
(2, 'pera', 'haker', 'sad@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `kvar`
--

DROP TABLE IF EXISTS `kvar`;
CREATE TABLE IF NOT EXISTS `kvar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kvar` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `kvar`
--

INSERT INTO `kvar` (`id`, `kvar`) VALUES
(1, 'ko te pita'),
(2, 'nece da radi ovo'),
(3, 'ne radi ni kad pretisnem F5'),
(4, 'nesto mi izlazi'),
(5, 'nista ne valja');

-- --------------------------------------------------------

--
-- Table structure for table `maticna_ploca`
--

DROP TABLE IF EXISTS `maticna_ploca`;
CREATE TABLE IF NOT EXISTS `maticna_ploca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `maticna_ploca`
--

INSERT INTO `maticna_ploca` (`id`, `naziv`) VALUES
(1, 'matican ploca 3'),
(3, '132');

-- --------------------------------------------------------

--
-- Table structure for table `operativni_sistem`
--

DROP TABLE IF EXISTS `operativni_sistem`;
CREATE TABLE IF NOT EXISTS `operativni_sistem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `operativni_sistem`
--

INSERT INTO `operativni_sistem` (`id`, `naziv`) VALUES
(1, 'test te'),
(2, 'win10');

-- --------------------------------------------------------

--
-- Table structure for table `procesor`
--

DROP TABLE IF EXISTS `procesor`;
CREATE TABLE IF NOT EXISTS `procesor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `procesor`
--

INSERT INTO `procesor` (`id`, `naziv`) VALUES
(1, 'cpu1'),
(2, 'sada'),
(4, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `racunar`
--

DROP TABLE IF EXISTS `racunar`;
CREATE TABLE IF NOT EXISTS `racunar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `id_tip` int(11) NOT NULL,
  `id_os` int(11) NOT NULL,
  `id_mb` int(11) NOT NULL,
  `id_cpu` int(11) NOT NULL,
  `id_korisnik` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tip` (`id_tip`),
  KEY `id_os` (`id_os`),
  KEY `id_mb` (`id_mb`),
  KEY `id_cpu` (`id_cpu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `racunar`
--

INSERT INTO `racunar` (`id`, `naziv`, `id_tip`, `id_os`, `id_mb`, `id_cpu`, `id_korisnik`) VALUES
(1, 'spaletova masina', 3, 2, 1, 1, 1),
(2, 'wadsfs', 1, 1, 1, 1, 1),
(3, 'fdghfghfg', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `radni_nalog`
--

DROP TABLE IF EXISTS `radni_nalog`;
CREATE TABLE IF NOT EXISTS `radni_nalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnicka` int(11) NOT NULL,
  `id_racunar` int(11) NOT NULL,
  `id_kvar` int(11) NOT NULL,
  `vreme_kreiranja` datetime NOT NULL,
  `id_status` int(11) NOT NULL,
  `opis_kvara` text COLLATE utf8_slovenian_ci NOT NULL,
  `opis_resenja` text COLLATE utf8_slovenian_ci,
  `vreme_zavrsetka` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_korisnicka` (`id_korisnicka`),
  KEY `id_racunar` (`id_racunar`),
  KEY `id_kvar` (`id_kvar`),
  KEY `id_status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `radni_nalog`
--

INSERT INTO `radni_nalog` (`id`, `id_korisnicka`, `id_racunar`, `id_kvar`, `vreme_kreiranja`, `id_status`, `opis_kvara`, `opis_resenja`, `vreme_zavrsetka`) VALUES
(1, 2, 1, 1, '2018-07-23 00:00:00', 3, '123asd', NULL, '2018-09-09 00:00:00'),
(2, 2, 1, 1, '2018-09-01 00:00:00', 4, '4234234234', NULL, '2018-09-09 00:00:00'),
(3, 3, 1, 3, '2018-09-01 00:00:00', 3, 'sadsa', NULL, '2018-09-09 00:00:00'),
(4, 7, 1, 5, '2018-01-09 00:00:00', 1, '123321', NULL, NULL),
(5, 2, 1, 3, '2018-02-09 00:00:00', 1, 'sd', NULL, NULL),
(6, 2, 1, 4, '2018-02-09 00:00:00', 1, '32131231', NULL, NULL),
(7, 24, 1, 3, '2018-04-09 00:00:00', 1, 'test', NULL, NULL),
(8, 2, 1, 1, '2018-09-09 00:00:00', 2, '15165165gygy', NULL, NULL),
(9, 2, 1, 1, '2018-09-09 00:00:00', 3, 'asdijasjdioasjdoijasiodjaiosjodjasoidjoiasjd', NULL, '2018-09-24 00:00:00'),
(10, 24, 1, 1, '2018-09-09 00:00:00', 3, '123', NULL, '2018-09-24 00:00:00'),
(11, 24, 1, 1, '2018-09-09 00:00:00', 1, '12334', NULL, NULL),
(12, 2, 1, 1, '2018-09-09 00:00:00', 1, '1234', NULL, NULL),
(13, 24, 1, 1, '2018-09-24 00:00:00', 1, '555555555555555555555555', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rola`
--

DROP TABLE IF EXISTS `rola`;
CREATE TABLE IF NOT EXISTS `rola` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rola` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `opis_role` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `rola`
--

INSERT INTO `rola` (`id`, `rola`, `opis_role`) VALUES
(1, 'gost', 'Gost'),
(2, 'korisnik', 'Korisnik'),
(4, 'supervizor', 'Supervizor'),
(8, 'administrator', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Ceka'),
(2, 'U radu'),
(3, 'Zavrsen'),
(4, 'Odbacen');

-- --------------------------------------------------------

--
-- Table structure for table `tip_racunara`
--

DROP TABLE IF EXISTS `tip_racunara`;
CREATE TABLE IF NOT EXISTS `tip_racunara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `tip_racunara`
--

INSERT INTO `tip_racunara` (`id`, `naziv`) VALUES
(1, 'pc1'),
(2, 'pc2'),
(3, 'pc3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnicka_podrska`
--
ALTER TABLE `korisnicka_podrska`
  ADD CONSTRAINT `korisnicka_podrska_ibfk_1` FOREIGN KEY (`id_rola`) REFERENCES `rola` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `racunar`
--
ALTER TABLE `racunar`
  ADD CONSTRAINT `racunar_ibfk_1` FOREIGN KEY (`id_tip`) REFERENCES `tip_racunara` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `racunar_ibfk_2` FOREIGN KEY (`id_os`) REFERENCES `operativni_sistem` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `racunar_ibfk_3` FOREIGN KEY (`id_mb`) REFERENCES `maticna_ploca` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `racunar_ibfk_4` FOREIGN KEY (`id_cpu`) REFERENCES `procesor` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `radni_nalog`
--
ALTER TABLE `radni_nalog`
  ADD CONSTRAINT `radni_nalog_ibfk_1` FOREIGN KEY (`id_korisnicka`) REFERENCES `korisnicka_podrska` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `radni_nalog_ibfk_2` FOREIGN KEY (`id_racunar`) REFERENCES `racunar` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `radni_nalog_ibfk_3` FOREIGN KEY (`id_kvar`) REFERENCES `kvar` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `radni_nalog_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
