-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2021 at 08:22 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f32ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `stalls`
--

CREATE TABLE IF NOT EXISTS `stalls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stall` text NOT NULL,
  `location` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `stalls`
--

INSERT INTO `stalls` (`id`, `stall`, `location`) VALUES
(1, 'Drinks (North Spine Food Court)', 'North Spine Food Court'),
(2, 'Mini Wok (North Spine Food Court)', 'North Spine Food Court'),
(3, 'Ban Mian (North Spine Food Court)', 'North Spine Food Court'),
(4, 'Chicken Rice (North Spine Food Court)', 'North Spine Food Court'),
(5, 'Western (North Spine Food Court)', 'North Spine Food Court'),
(6, 'Drinks (South Spine Food Court)', 'South Spine Food Court'),
(7, 'Pasta Express (South Spine Food Court)', 'South Spine Food Court'),
(8, 'Taiwan Fried Chicken (South Spine Food Court)', 'South Spine Food Court'),
(9, 'Duck Rice (South Spine Food Court)', 'South Spine Food Court'),
(10, 'Chinese Food (South Spine Food Court)', 'South Spine Food Court'),
(11, 'Drinks (Food Court 2)', 'Food Court 2'),
(12, 'Korean Food (Food Court 2)', 'Food Court 2'),
(13, 'Ayam Penyet (Food Court 2)', 'Food Court 2'),
(14, 'Chicken Rice (Food Court 2)', 'Food Court 2'),
(15, 'Western Food (Food Court 2)', 'Food Court 2'),
(16, 'Drinks (Nanyang Crescent Food Court)', 'Nanyang Crescent Food Court'),
(17, 'Thai Food (Nanyang Crescent Food Court)', 'Nanyang Crescent Food Court'),
(18, 'Korean Food (Nanyang Crescent Food Court)', 'Nanyang Crescent Food Court'),
(19, 'Ban Mian (Nanyang Crescent Food Court)', 'Nanyang Crescent Food Court'),
(20, 'Western Food (Nanyang Crescent Food Court)', 'Nanyang Crescent Food Court');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
