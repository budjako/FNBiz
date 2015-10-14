-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2015 at 07:25 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`, `categorydesc`) VALUES
(1, 'Ulam', 'Any Ulam'),
(2, 'Others', 'Appetizers, Drinks, etc.'),
(3, 'Silog', NULL),
(4, 'Dessert', NULL),
(5, 'Afternoon Snacks', NULL),
(6, 'Soupas', ''),
(7, 'Soupas', 'May mga sabaw');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

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
(10, 'Petty Cash', 14, '2015-09-17 17:12:40'),
(11, 'Petty Cash', 1500, '2015-09-24 16:27:16'),
(12, 'Petty Cash', 500, '2015-09-25 19:09:26'),
(13, 'Petty Cash', 50, '2015-09-25 19:13:34'),
(14, 'PettyCash', 15, '2015-09-25 19:14:25'),
(15, 'Petty Cash', 10, '2015-09-25 19:14:58'),
(16, 'Petty Cash', 50, '2015-09-25 19:19:40'),
(17, 'Petty Cash', 15, '2015-09-25 19:20:26'),
(18, 'Petty Cash', 5, '2015-09-25 19:24:20'),
(19, 'Petty Cash', 13, '2015-09-25 19:25:17'),
(20, 'Resupply', 150, '2015-09-26 18:32:49'),
(21, 'Resupply', 500, '2015-09-26 18:33:53'),
(23, 'Petty Cash', 5000, '2015-10-02 13:35:05'),
(31, 'Supplies', 500, '2015-10-14 17:03:46'),
(32, 'Petty Cash', 50, '2015-10-14 17:03:56');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `itemname`, `itemcategory`, `itemprice`, `available`) VALUES
(1, 'Dinuguan', 1, 15, 1),
(2, 'Menudo', 1, 25.5, 1),
(3, 'Caldereta', 1, 50, 0),
(4, 'Afritada', 1, 25.5, 1),
(5, 'Rice', 2, 10, 1),
(6, 'Adobo', 1, 25.5, 1),
(7, 'Atchara', 2, 15, 1),
(8, 'Tapsilog', 3, 49, 0),
(9, 'Longsilog', 3, 49, 0),
(10, 'Hamsilog', 3, 49, 0),
(11, 'Hotsilog', 3, 49, 0),
(12, 'Nata de Coco', 2, 25, 1),
(13, 'Leche Flan', 4, 20, 0),
(14, 'Singang na Hipon', 1, 75, 0),
(15, 'Sinigang na Bangus', 1, 75, 0),
(16, 'Ginataang Tilapia', 1, 75, 0),
(17, 'Inihaw na Manok', 1, 99.5, 0),
(18, 'Inihaw na Bangus', 1, 99.5, 0),
(19, 'Ginataan', 5, 15, 0),
(20, 'Banana Queue', 5, 15, 0),
(21, 'Kamote Queue', 5, 15, 0),
(22, 'Lechon', 1, 100, 0),
(23, 'Natong', 1, 25, 0),
(24, 'Kare-Kare', 1, 50, 0),
(25, 'Curry', 1, 50, 0),
(26, 'Chopsuey', 1, 30, 0),
(27, 'Ginisang Ampalaya', 1, 25, 0),
(28, 'Ginisang Sardinas', 1, 25, 0),
(29, 'Sprouted', 1, 20, 0),
(30, 'Balaw', 2, 10, 1),
(31, 'Spaghetti', 1, 50.5, 1),
(32, 'Lechon', 1, 500.24, 1),
(33, 'Chicken Adobo', 1, 50, 1);

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
(26, 22, 1),
(27, 3, 1),
(27, 5, 4),
(27, 6, 1),
(28, 1, 1),
(28, 3, 1),
(29, 1, 1),
(29, 3, 1),
(38, 1, 1),
(38, 2, 1),
(38, 3, 1),
(38, 12, 1),
(39, 3, 1),
(39, 12, 1),
(40, 1, 1),
(40, 2, 1),
(40, 3, 2),
(40, 12, 1),
(41, 1, 1),
(41, 2, 1),
(41, 3, 2),
(41, 12, 1),
(42, 1, 1),
(42, 2, 1),
(42, 3, 2),
(42, 12, 1),
(43, 1, 1),
(43, 2, 1),
(43, 3, 1),
(43, 4, 1),
(43, 5, 1),
(43, 6, 1),
(43, 7, 1),
(43, 8, 1),
(43, 9, 1),
(43, 10, 1),
(43, 11, 1),
(43, 12, 1),
(43, 13, 1),
(43, 14, 1),
(43, 15, 1),
(43, 16, 1),
(43, 17, 1),
(43, 18, 1),
(43, 19, 1),
(43, 20, 1),
(43, 21, 1),
(43, 22, 1),
(43, 23, 1),
(43, 24, 1),
(43, 25, 1),
(43, 26, 1),
(43, 27, 1),
(43, 28, 1),
(43, 29, 1),
(43, 30, 1),
(44, 1, 1),
(44, 2, 1),
(44, 3, 1),
(44, 4, 1),
(44, 5, 1),
(44, 6, 1),
(44, 7, 1),
(44, 8, 1),
(44, 9, 1),
(44, 10, 1),
(44, 11, 1),
(44, 12, 1),
(44, 13, 1),
(44, 14, 1),
(44, 15, 1),
(44, 16, 1),
(44, 17, 1),
(44, 18, 1),
(44, 19, 1),
(44, 20, 1),
(44, 21, 1),
(44, 22, 1),
(44, 23, 1),
(44, 24, 1),
(44, 25, 1),
(44, 26, 1),
(44, 27, 1),
(44, 28, 1),
(44, 29, 1),
(44, 30, 1),
(45, 1, 1),
(45, 2, 1),
(45, 3, 1),
(45, 4, 1),
(45, 5, 1),
(45, 6, 1),
(45, 7, 1),
(45, 8, 1),
(45, 9, 1),
(45, 10, 1),
(45, 11, 1),
(45, 12, 1),
(45, 13, 1),
(45, 14, 1),
(45, 15, 1),
(45, 16, 1),
(45, 17, 1),
(45, 18, 1),
(45, 19, 1),
(45, 20, 1),
(45, 21, 1),
(45, 22, 1),
(45, 23, 1),
(45, 24, 1),
(45, 25, 1),
(45, 26, 1),
(45, 27, 1),
(45, 28, 1),
(45, 29, 1),
(45, 30, 1),
(46, 1, 1),
(46, 2, 1),
(46, 3, 1),
(46, 4, 1),
(46, 5, 1),
(46, 6, 1),
(46, 7, 1),
(46, 8, 1),
(46, 9, 1),
(46, 10, 1),
(46, 11, 1),
(46, 12, 1),
(46, 13, 1),
(46, 14, 1),
(46, 15, 1),
(46, 16, 1),
(46, 17, 1),
(46, 18, 1),
(46, 19, 1),
(46, 20, 1),
(46, 21, 1),
(46, 22, 1),
(46, 23, 1),
(46, 24, 1),
(46, 25, 1),
(46, 26, 1),
(46, 27, 1),
(46, 28, 1),
(46, 29, 1),
(46, 30, 1),
(47, 1, 1),
(47, 2, 1),
(47, 3, 1),
(47, 4, 1),
(47, 5, 1),
(47, 6, 1),
(47, 7, 1),
(47, 8, 1),
(47, 9, 1),
(47, 10, 1),
(47, 11, 1),
(47, 12, 1),
(47, 13, 1),
(47, 14, 1),
(47, 15, 1),
(47, 16, 1),
(47, 17, 1),
(47, 18, 1),
(47, 19, 1),
(47, 20, 1),
(47, 21, 1),
(47, 22, 1),
(47, 23, 1),
(47, 24, 1),
(47, 25, 1),
(47, 26, 1),
(47, 27, 1),
(47, 28, 1),
(47, 29, 1),
(47, 30, 1),
(48, 5, 1),
(49, 5, 1),
(49, 11, 1),
(50, 1, 1),
(51, 3, 1),
(52, 1, 1),
(52, 6, 15),
(57, 1, 1),
(57, 3, 1),
(58, 3, 1),
(58, 4, 1),
(58, 6, 1),
(59, 4, 1),
(59, 6, 1),
(60, 1, 1),
(60, 3, 1),
(60, 6, 1),
(61, 1, 1),
(61, 3, 1),
(61, 4, 1),
(61, 6, 1),
(61, 7, 1),
(62, 1, 1),
(62, 2, 1),
(62, 3, 1),
(62, 4, 1),
(62, 6, 1),
(62, 7, 1),
(62, 30, 1),
(63, 1, 1),
(63, 4, 1),
(63, 6, 1),
(63, 7, 1),
(64, 5, 2),
(64, 6, 1),
(64, 31, 2),
(65, 4, 1),
(65, 6, 1),
(66, 4, 1),
(66, 6, 1),
(67, 1, 1),
(67, 3, 1),
(67, 4, 1),
(67, 6, 1),
(67, 7, 1),
(67, 30, 1),
(68, 3, 1),
(68, 6, 1),
(68, 12, 1),
(69, 4, 1),
(69, 5, 14),
(69, 6, 1),
(69, 32, 1),
(70, 1, 1),
(70, 5, 7),
(70, 6, 4),
(70, 33, 2),
(71, 1, 1),
(71, 2, 1),
(71, 5, 5),
(71, 7, 1),
(71, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionid` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` float NOT NULL,
  PRIMARY KEY (`transactionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

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
(26, '2015-09-17 17:12:57', 190.5),
(27, '2015-09-19 16:52:53', 115.5),
(28, '2015-09-20 18:12:33', 65),
(29, '2015-09-20 18:15:52', 65),
(30, '2015-09-20 18:36:57', 0),
(31, '2015-09-20 18:38:38', 0),
(32, '2015-09-23 16:25:31', 0),
(33, '2015-09-23 16:25:48', 0),
(34, '2015-09-23 16:30:23', 0),
(35, '2015-09-24 15:28:09', 0),
(36, '2015-09-24 16:05:38', 0),
(37, '2015-09-24 16:11:51', 12),
(38, '2015-09-24 16:22:45', 115.5),
(39, '2015-09-24 16:24:22', 75),
(40, '2015-09-24 16:24:47', 165.5),
(41, '2015-09-24 16:25:48', 165.5),
(42, '2015-09-24 16:26:45', 165.5),
(43, '2015-09-24 16:28:05', 1211.5),
(44, '2015-09-24 16:30:35', 1211.5),
(45, '2015-09-24 16:32:25', 1211.5),
(46, '2015-09-24 16:39:36', 1211.5),
(47, '2015-09-24 16:40:04', 1211.5),
(48, '2015-09-24 17:28:08', 10),
(49, '2015-09-24 17:28:27', 59),
(50, '2015-09-24 18:20:33', 15),
(51, '2015-09-24 18:21:31', 50),
(52, '2015-09-24 18:29:26', 397.5),
(53, '2015-09-24 18:31:13', 0),
(54, '2015-09-24 18:32:28', 0),
(55, '2015-09-24 18:34:06', 0),
(56, '2015-09-24 18:34:44', 0),
(57, '2015-09-24 18:35:48', 65),
(58, '2015-09-25 19:11:14', 101),
(59, '2015-09-25 19:32:18', 51),
(60, '2015-09-26 13:15:06', 90.5),
(61, '2015-09-26 18:12:24', 131),
(62, '2015-09-27 14:54:11', 166.5),
(63, '2015-09-28 16:04:13', 81),
(64, '2015-09-30 17:42:55', 146.5),
(65, '2015-10-01 13:23:11', 51),
(66, '2015-10-03 17:30:43', 51),
(67, '2015-10-04 09:07:39', 141),
(68, '2015-10-04 12:21:06', 100.5),
(69, '2015-10-06 16:05:46', 691.24),
(70, '2015-10-14 17:01:58', 287),
(71, '2015-10-14 17:02:15', 605.74);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `archive` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `firstname`, `lastname`, `admin`, `archive`) VALUES
('budjako', '92429d82a41e930486c6de5ebda9602d55c39986', 'Dyanara', 'Dela Rosa', 1, 0),
('juandelacruz', '92429d82a41e930486c6de5ebda9602d55c39986', 'Juan', 'Dela Cruz', 0, 0),
('temporary', 'dcdc8b2d0a7955131b67e56602873f6384102669', 'temporary', 'temporary', 0, 0),
('tempuser', 'c3c1cfff4e610466c66cd080464929cc43e27064', 'Juana', 'Dela Cruz', 0, 0);

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
