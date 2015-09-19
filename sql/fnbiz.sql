-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2015 at 09:36 AM
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(50) NOT NULL,
  `categorydesc` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`, `categorydesc`) VALUES
(1, 'Ulam', 'asdfasdf'),
(2, 'Others', NULL),
(3, 'Silog', NULL),
(4, 'Dessert', NULL),
(5, 'Afternoon Snacks', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `expenseid` int(11) NOT NULL AUTO_INCREMENT,
  `expensename` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `datets` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`expenseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expenseid`, `expensename`, `amount`, `datets`) VALUES
(1, 'Petty Cash', 100.25, '2015-09-12 02:48:22'),
(2, 'Resupply', 200.5, '2015-09-12 02:56:10'),
(3, 'Petty Cash', 500, '2015-09-17 15:32:59'),
(4, 'Supply', 500, '2015-09-17 15:33:31'),
(5, 'Petty Cash', 1, '2015-09-17 16:26:56'),
(7, 'PettyCash', 12, '2015-09-17 17:09:16'),
(8, 'PettyCash', 14, '2015-09-17 17:10:48'),
(9, 'Petty Cash', 14, '2015-09-17 17:11:43'),
(10, 'Petty Cash', 14, '2015-09-17 17:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(50) NOT NULL,
  `itemcategory` int(11) NOT NULL,
  `itemprice` float NOT NULL,
  `available` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `itemname`, `itemcategory`, `itemprice`, `available`) VALUES
(1, 'Dinuguan', 1, 15, 0),
(2, 'Menudo', 1, 25.5, 1),
(3, 'Caldereta', 1, 50, 1),
(4, 'Afritada', 1, 25.5, 1),
(5, 'Rice', 2, 10, 1),
(6, 'Adobo', 1, 25.5, 1),
(7, 'Atchara', 2, 15, 1),
(8, 'Tapsilog', 3, 49, 1),
(9, 'Longsilog', 3, 49, 1),
(10, 'Hamsilog', 3, 49, 1),
(11, 'Hotsilog', 3, 49, 1),
(12, 'Nata de Coco', 2, 25, 1),
(13, 'Leche Flan', 4, 20, 1),
(14, 'Singang na Hipon', 1, 75, 1),
(15, 'Sinigang na Bangus', 1, 75, 1),
(16, 'Ginataang Tilapia', 1, 75, 1),
(17, 'Inihaw na Manok', 1, 99.5, 1),
(18, 'Inihaw na Bangus', 1, 99.5, 1),
(19, 'Ginataan', 5, 15, 1),
(20, 'Banana Queue', 5, 15, 1),
(21, 'Kamote Queue', 5, 15, 1),
(22, 'Lechon', 1, 100, 1),
(23, 'Natong', 1, 25, 1),
(24, 'Kare-Kare', 1, 50, 1),
(25, 'Curry', 1, 50, 1),
(26, 'Chopsuey', 1, 30, 1),
(27, 'Ginisang Ampalaya', 1, 25, 1),
(28, 'Ginisang Sardinas', 1, 25, 1),
(29, 'Sprouted', 1, 20, 1),
(30, 'Balaw', 2, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemlist`
--

CREATE TABLE IF NOT EXISTS `itemlist` (
  `transaction_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`,`item_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemlist`
--

INSERT INTO `itemlist` (`transaction_id`, `item_id`, `count`) VALUES
(1, 3, 1),
(1, 5, 1),
(2, 1, 1),
(2, 5, 1),
(3, 5, 1),
(3, 6, 1),
(3, 13, 1),
(19, 6, 1),
(20, 5, 3),
(20, 6, 1),
(20, 22, 1),
(20, 25, 1),
(21, 5, 3),
(21, 10, 1),
(21, 11, 1),
(21, 24, 1),
(22, 4, 1),
(22, 5, 3),
(22, 6, 1),
(23, 5, 1),
(23, 20, 1),
(23, 28, 1),
(24, 4, 1),
(24, 5, 4),
(24, 6, 1),
(24, 15, 1),
(24, 23, 1),
(25, 5, 2),
(25, 13, 1),
(25, 18, 1),
(25, 30, 1),
(26, 5, 5),
(26, 6, 1),
(26, 20, 1),
(26, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionid` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` float NOT NULL,
  PRIMARY KEY (`transactionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionid`, `time`, `total`) VALUES
(1, '2015-08-03 16:22:40', 60),
(2, '2015-08-03 16:24:59', 25),
(3, '2015-08-03 16:26:06', 55.5),
(4, '2015-09-10 14:27:11', 0),
(5, '2015-09-10 14:27:52', 0),
(6, '2015-09-10 14:29:48', 0),
(7, '2015-09-10 14:30:24', 0),
(8, '2015-09-10 14:34:58', 0),
(9, '2015-09-10 14:35:19', 0),
(10, '2015-09-10 14:37:00', 0),
(11, '2015-09-10 15:32:20', 25.5),
(12, '2015-09-10 15:33:05', 25.5),
(13, '2015-09-10 15:33:46', 25.5),
(14, '2015-09-10 15:34:57', 25.5),
(15, '2015-09-10 15:35:35', 25.5),
(16, '2015-09-10 15:36:33', 25.5),
(17, '2015-09-10 15:37:32', 25.5),
(18, '2015-09-10 15:37:55', 25.5),
(19, '2015-09-10 15:39:10', 25.5),
(20, '2015-09-10 15:39:40', 205.5),
(21, '2015-09-10 16:55:51', 178),
(22, '2015-09-17 15:14:11', 81),
(23, '2015-09-17 15:33:15', 50),
(24, '2015-09-17 16:12:41', 191),
(25, '2015-09-17 16:27:13', 149.5),
(26, '2015-09-17 17:12:57', 190.5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `firstname`, `lastname`, `admin`) VALUES
('budjako', 'b3c6ed418c791bfed2fb1fb055a3a2ee12bdb65a', 'Dyanara', 'Delarosa', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `itemlist`
--
ALTER TABLE `itemlist`
  ADD CONSTRAINT `itemlist_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transactionid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itemlist_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
