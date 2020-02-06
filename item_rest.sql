-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2020 at 03:21 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.5-1ubuntu7.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `item_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemId` int(10) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(50) NOT NULL,
  `itemCategoryId` int(10) NOT NULL,
  PRIMARY KEY (`itemId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `itemCategoryId`) VALUES
(1, 'Spring', 1),
(5, 'USB', 4),
(3, 'Laptop Bag', 8);

-- --------------------------------------------------------

--
-- Table structure for table `itemCategory`
--

CREATE TABLE IF NOT EXISTS `itemCategory` (
  `itemCategoryId` int(10) NOT NULL AUTO_INCREMENT,
  `itemCategoryName` varchar(50) NOT NULL,
  PRIMARY KEY (`itemCategoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `itemCategory`
--

INSERT INTO `itemCategory` (`itemCategoryId`, `itemCategoryName`) VALUES
(1, 'Toys'),
(2, 'Books'),
(4, 'Electronics'),
(6, 'Accesories'),
(8, 'Bags'),
(9, 'Drinks'),
(10, 'Food');
