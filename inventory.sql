-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2013 at 06:08 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(15) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `Item_nm` varchar(50) NOT NULL COMMENT 'Name of the item',
  `Item_cd` varchar(15) NOT NULL COMMENT 'Item code for ease of access',
  `Item_desc` varchar(100) NOT NULL COMMENT 'description of the item',
  `inventory_units` int(20) NOT NULL COMMENT 'no of units available - no fractions allowed',
  `last_updated_tmsp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'time stamd of last updated',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Item_cd` (`Item_cd`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `Item_nm`, `Item_cd`, `Item_desc`, `inventory_units`, `last_updated_tmsp`) VALUES
(1, '22 LR', '22 LR', '22 lr', 39, '2013-02-08 05:30:03'),
(2, 'SW', 'SW', 'sw', 55, '0000-00-00 00:00:00'),
(3, '45ACP', '45ACP', '45ACP', 55, '0000-00-00 00:00:00'),
(4, '9MM', '9MM', '9MM', 60, '0000-00-00 00:00:00'),
(5, 'Small Target', 'Small', 'Small Target', 55, '0000-00-00 00:00:00'),
(6, 'Standard Target', 'Standard', 'Standard target', 52, '2013-02-08 05:30:03'),
(7, 'Premium Target', 'Premium', 'Premium Target', 60, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
