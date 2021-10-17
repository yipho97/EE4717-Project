-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2021 at 03:07 PM
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
-- Table structure for table `orders-log`
--

CREATE TABLE IF NOT EXISTS `orders-log` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stall` text NOT NULL,
  `product` text NOT NULL,
  `type` text NOT NULL,
  `addons` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `delivered` tinyint(1) NOT NULL,
  `name` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `zip` text NOT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `orders-log`
--

INSERT INTO `orders-log` (`order_id`, `datetime`, `stall`, `product`, `type`, `addons`, `total_price`, `delivered`, `name`, `contact`, `email`, `address`, `zip`) VALUES
(1, '2021-10-17 14:21:14', 'Mini Wok', 'Hor Fun', 'Hor Fun', 'Egg,0.50', 4.50, 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306'),
(2, '2021-10-17 14:23:55', 'Drinks', 'Teh', 'Teh - Cold', '', 1.20, 0, 'Seng Yip Ho', '+6596378252', 'sengyipho9735@gmail.com', 'Sengkang', '543306'),
(72, '2021-10-17 14:28:19', 'Chicken Rice', 'Steamed Chicken Rice', 'Steamed Chicken Rice', 'Egg,0.50|Chicken,1.00', 4.50, 0, 'æˆä¸šå’Œ', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306'),
(73, '2021-10-17 14:29:34', 'Mini Wok', 'Fried Rice', 'Salted Fish Fried Rice', 'Chilli,0.00', 4.50, 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306'),
(74, '2021-10-17 14:29:34', 'Western', 'Chicken Chop', 'Chicken Chop - Mushroom Sauce', 'Garlic Bread,1.50', 6.50, 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306'),
(75, '2021-10-17 15:02:33', 'Drinks', 'Teh O', 'Teh O - Hot', '', 0.60, 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306'),
(76, '2021-10-17 15:02:33', 'Mini Wok', 'Kung Pao Chicken Rice', 'Kung Pao Chicken Rice', 'Chilli,0.00|Egg,0.50', 5.50, 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306'),
(77, '2021-10-17 15:02:33', 'Drinks', 'Teh', 'Teh - Hot', '', 0.80, 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306'),
(78, '2021-10-17 15:02:33', 'Drinks', 'Kopi O', 'Kopi O - Hot', '', 0.60, 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306'),
(79, '2021-10-17 15:02:33', 'Chicken Rice', 'Chicken Porridge', 'Chicken Porridge', 'Porridge,0.50', 3.00, 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306'),
(80, '2021-10-17 15:02:33', 'Western', 'Burger Set', 'Beef Burger', 'Mushroom Soup,2.00', 7.00, 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
