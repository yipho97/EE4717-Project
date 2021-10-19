-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2021 at 07:14 AM
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
-- Table structure for table `orders-detail`
--

CREATE TABLE IF NOT EXISTS `orders-detail` (
  `order_id` int(11) NOT NULL,
  `stall` text NOT NULL,
  `product` text NOT NULL,
  `type` text NOT NULL,
  `addons` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders-detail`
--

INSERT INTO `orders-detail` (`order_id`, `stall`, `product`, `type`, `addons`, `total_price`) VALUES
(80, 'Drinks', 'Teh O', 'Teh O - Hot', '', 0.60),
(80, 'Drinks', 'Teh', 'Teh - Hot', '', 0.80),
(100, 'Drinks', 'Teh O', 'Teh O - Hot', '', 0.60),
(100, 'Drinks', 'Teh', 'Teh - Hot', '', 0.80),
(101, 'Ban Mian', 'Ban Mian', 'Dry Ban Mian', 'Noodle,0.50|Fish,1.00|Dumpling (8pcs),3.00', 8.50),
(101, 'Western', 'Chicken Chop', 'Chicken Chop - Black Pepper Sauce', 'Garlic Bread,1.50', 6.50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
