-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2021 at 05:55 PM
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
  `total_price` decimal(10,2) NOT NULL,
  `type_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders-detail`
--

INSERT INTO `orders-detail` (`order_id`, `stall`, `product`, `type`, `addons`, `total_price`, `type_price`) VALUES
(80, 'Drinks', 'Teh O', 'Teh O - Hot', '', 0.60, 0.00),
(80, 'Drinks', 'Teh', 'Teh - Hot', '', 0.80, 0.00),
(100, 'Drinks', 'Teh O', 'Teh O - Hot', '', 0.60, 0.00),
(100, 'Drinks', 'Teh', 'Teh - Hot', '', 0.80, 0.00),
(101, 'Ban Mian', 'Ban Mian', 'Dry Ban Mian', 'Noodle,0.50|Fish,1.00|Dumpling (8pcs),3.00', 8.50, 0.00),
(101, 'Western', 'Chicken Chop', 'Chicken Chop - Black Pepper Sauce', 'Garlic Bread,1.50', 6.50, 0.00),
(103, 'Drinks', 'Kopi', 'Kopi - Hot', '', 0.80, 0.80),
(103, 'Mini Wok', 'Fried Rice', 'Fried Rice', 'Chilli,0.00|Egg,0.50', 4.50, 4.00),
(103, 'Ban Mian', 'Ban Mian', 'Dry Ban Mian', 'Noodle,0.50|Fish,1.00', 5.50, 4.00),
(103, 'Chicken Rice', 'Chicken Noodle', 'Soy Sauce Chicken Noodle', 'Noodle,0.50|Egg,0.50', 5.50, 4.50),
(104, 'Ban Mian', 'Tom Yum Ban Mian', 'Tom Yum Ban Mian', 'Noodle,0.50|Fish,1.00|Dumplings (8pcs),3.00', 8.50, 4.00),
(104, 'Mini Wok', 'Fried Rice', 'Fried Rice', 'Chilli,0.00|Egg,0.50', 4.50, 4.00),
(104, 'Drinks', 'Teh O', 'Teh O - Cold', '', 1.00, 1.00),
(104, 'Drinks', 'Kopi', 'Kopi -Cold', '', 1.20, 1.20),
(105, 'Drinks', 'Teh O', 'Teh O - Hot', '', 0.60, 0.60),
(105, 'Ban Mian', 'Tom Yum Ban Mian', 'Tom Yum Ban Mian', 'Dumplings (8pcs),3.00', 7.00, 4.00),
(106, 'Ban Mian', 'Ban Mian', 'Dry Ban Mian', 'Dumpling (8pcs),3.00', 7.00, 4.00),
(106, 'Mini Wok', 'Hor Fun', 'Hor Fun', 'Egg,0.50|Fish,1.00', 5.50, 4.00),
(106, 'Ban Mian', 'Mee Hoon Kuey', 'Mee Hoon Kuey', 'Noodle,0.50|Fish,1.00|Dumplings (8pcs),3.00', 8.50, 4.00),
(107, 'Mini Wok SS', 'Kung Pao Chicken Rice', 'Kung Pao Chicken Rice', 'Chilli,0.00', 5.00, 5.00),
(107, 'Ban Mian', 'Ban Mian', 'Dry Ban Mian', 'Fish,1.00', 5.00, 4.00),
(108, 'Drinks  NC', 'Teh O', 'Teh O - Hot', '', 0.60, 0.60),
(108, 'Ban Mian', 'Tom Yum Ban Mian', 'Tom Yum Ban Mian', 'Dumplings (8pcs),3.00', 7.00, 4.00),
(109, 'Drinks', 'Teh O', 'Teh O - Hot', '', 0.60, 0.60),
(109, 'Ban Mian', 'Tom Yum Ban Mian', 'Tom Yum Ban Mian', 'Dumplings (8pcs),3.00', 7.00, 4.00),
(110, 'Drinks', 'Teh O', 'Teh O - Hot', '', 0.60, 0.60),
(110, 'Mini Wok', 'Salted Egg Chicken Rice', 'Salted Egg Chicken Rice', 'Egg,0.50', 4.50, 4.00),
(111, 'Drinks SS', 'Teh O', 'Teh O - Hot', '', 0.60, 0.60),
(111, 'Mini Wok', 'Fried Rice', 'Fried Rice', 'Egg,0.50', 4.50, 4.00),
(112, 'Drinks', 'Teh O', 'Teh O - Hot', '', 0.60, 0.60),
(112, 'Mini Wok', 'Kung Pao Chicken Rice', 'Kung Pao Chicken Rice', 'Egg,0.50', 5.50, 5.00),
(113, 'Drinks', 'Teh O', 'Teh O - Hot', '', 0.60, 0.60),
(113, 'Mini Wok', 'Kung Pao Chicken Rice', 'Kung Pao Chicken Rice', 'Chilli,0.00|Egg,0.50', 5.50, 5.00),
(113, 'Drinks', 'Teh O', 'Teh O - Hot', '', 0.60, 0.60),
(114, 'Drinks  NC', 'Teh O', 'Teh O - Hot', '', 0.60, 0.60),
(114, 'Western', 'Chicken Chop', 'Chicken Chop - Black Pepper Sauce', 'Mushroom Soup,2.00', 7.00, 5.00),
(115, 'Drinks  NC', 'Kopi', 'Kopi - Hot', '', 0.80, 0.80),
(115, 'Duck Rice (South Spine Food Court)', 'Roasted Duck Rice', 'Roasted Duck Rice', 'Braised Duck,1.00|Egg,0.50', 5.00, 3.50),
(115, 'Taiwan Fried Chicken (South Spine Food Court)', 'Fried Sweet Potato', ' Spicy', 'Upsize,0.50', 3.50, 3.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
