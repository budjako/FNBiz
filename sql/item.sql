-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2015 at 05:24 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fnbiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(50) NOT NULL,
  `itemcategory` int(11) NOT NULL,
  `itemprice` float NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `itemname`, `itemcategory`, `itemprice`) VALUES
(1, 'Dinuguan', 1, 15),
(2, 'Menudo', 1, 25.5),
(3, 'Caldereta', 1, 50),
(4, 'Afritada', 1, 25.50),
(5, 'Rice', 2, 10),
(6, 'Adobo', 1, 25.50),
(7, 'Atchara', 2, 15),
(8, 'Tapsilog', 3, 49),
(9, 'Longsilog', 3, 49),
(10, 'Hamsilog', 3, 49),
(11, 'Hotsilog', 3, 49),
(12, 'Nata de Coco', 2, 25),
(13, 'Leche Flan', 4, 20),
(14, 'Singang na Hipon', 1, 75),
(15, 'Sinigang na Banugs', 1, 75),
(16, 'Ginataang Tilapia', 1, 75),
(17, 'Inihaw na Manok', 1, 99.5),
(18, 'Inihaw na Bangus', 1, 99.5),
(19, 'Ginataan', 5, 15),
(20, 'Banana Queue', 5, 15),
(21, 'Kamote Queue', 5, 15),
(22, 'Lechon', 1, 100),
(23, 'Natong', 1, 25),
(24, 'Kare-Kare', 1, 50),
(25, 'Curry', 1, 50),
(26, 'Chopsuey', 1, 30),
(27, 'Ginisang Ampalaya', 1, 25),
(28, 'Ginisang Sardinas', 1, 25),
(29, 'Sprouted', 1, 20),
(30, 'Balaw', 2, 10);
-- (31, '', ,),



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
