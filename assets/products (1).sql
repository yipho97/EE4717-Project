-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2021 at 08:57 AM
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
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `stall_id` int(11) NOT NULL COMMENT 'References stalls.id',
  `product` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type` text NOT NULL,
  `type_price` text NOT NULL,
  `addons` text NOT NULL,
  `addons_price` text NOT NULL,
  `image` text NOT NULL,
  KEY `index_name` (`stall_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `stall_id`, `product`, `price`, `type`, `type_price`, `addons`, `addons_price`, `image`) VALUES
(1, 1, 'Teh O', 0.60, 'Teh O - Hot,Teh O - Cold', '0.60,1.00', '', '', 'assets/teho.png'),
(2, 1, 'Teh', 0.80, 'Teh - Hot,Teh - Cold', '0.80,1.20', '', '', 'assets/teh.png'),
(3, 1, 'Kopi O', 0.60, 'Kopi O - Hot,Kopi O - Cold', '0.60,1.00', '', '', 'assets/kopio.png'),
(4, 1, 'Kopi', 0.80, 'Kopi - Hot,Kopi -Cold', '0.80,1.20', '', '', 'assets/kopi.png'),
(5, 2, 'Kung Pao Chicken Rice', 5.00, 'Kung Pao Chicken Rice', '5.00', 'Chilli,Egg', '0.00,0.50', 'assets/kungpaochickenrice.png'),
(6, 2, 'Fried Rice', 4.00, 'Fried Rice,Salted Fish Fried Rice,Yang Zhou Fried Rice', '4.00,4.50,4.50', 'Chilli,Egg', '0.00,0.50', 'assets/friedrice.png'),
(7, 2, 'Hor Fun', 4.00, 'Hor Fun,San Lao Hor Fun', '4.00,4.00', 'Egg,Fish', '0.50,1.00', 'assets/horfun.png'),
(8, 2, 'Salted Egg Chicken Rice', 4.00, 'Salted Egg Chicken Rice, Salted Egg Sotong Rice', '4.00,5.00', 'Chill,Egg', '0.00,0.50', 'assets/saltedeggchickenrice.png'),
(9, 3, 'Ban Mian', 4.00, 'Dry Ban Mian,Soup Ban Mian,Dumpling Noodle', '4.00,4.00,4.00', 'Noodle,Fish,Dumpling (8pcs)', '0.50,1.00,3.00', 'assets/banmian.png'),
(10, 3, 'Tom Yum Ban Mian', 4.00, 'Tom Yum Ban Mian, Tom Yum You Mian', '4.00,4.00', 'Noodle,Fish,Dumplings (8pcs)', '0.50,1.00,3.00', 'assets/tomyumbanmian.png'),
(11, 3, 'Mee Hoon Kuey', 4.00, 'Mee Hoon Kuey,Tom Yum Mee Hoon Kuey', '4.00,4.00', 'Noodle,Fish,Dumplings (8pcs)', '0.50,1.00,3.00', 'assets/meehoonkuey.png'),
(12, 3, 'Yee Mian', 4.00, 'Yee Mian,Tom Yum Yee Mian', '4.00,4.00', 'Noodles,Fish,Dumplings (8pcs)', '0.50,1.00,3.00', 'assets/yeemian.png'),
(13, 4, 'Steamed Chicken Rice', 3.00, 'Steamed Chicken Rice', '3.00', 'Egg,Chicken', '0.50,1.00', 'assets/steamedchickenrice.png'),
(14, 4, 'Roasted Chicken Rice', 3.00, 'Roasted Chicken Rice', '3.00', 'Egg,Chicken', '0.50,1.00', 'assets/roastedchickenrice.png'),
(15, 4, 'Chicken Porridge', 2.50, 'Chicken Porridge', '2.50', 'Porridge,Egg', '0.50,0.50', 'assets/chickenporridge.png'),
(16, 4, 'Soy Sauce Chicken Noodle', 4.50, 'Soy Sauce Chicken Noodle,Soy Sauce Chicken Kuey Teow', '4.50,4.50', 'Noodle,Egg', '0.50,0.50', 'assets/soysaucechickennoodle.png'),
(17, 5, 'Chicken Chop', 5.00, 'Chicken Chop - Black Pepper Sauce,Chicken Chop - Mushroom Sauce,Chicken Chop - No Sauce', '5.00,5.00,5.00', 'Garlic Bread,Mushroom Soup', '1.50,2.00', 'assets/chickenchop.png'),
(18, 5, 'Chicken Chop Pasta', 5.00, 'Mushroom Sauce,Black Pepper Sauce,No sauce', '5.00,5.00,5.00', 'Noodle,Mushroom Soup', '0.50,2.00', 'assets/chickenchoppasta.png'),
(19, 5, 'Burger Set', 4.00, 'Beef Burger,Chicken Burger', '5.00,4.00', 'Mushroom Soup', '2.00', 'assets/burgerset.png'),
(20, 5, 'Lamb Chop', 6.00, 'Lamb Chop - Mushroom Sauce,Lamb Chop - Black Pepper Sauce,Lamb Chop - No sauce', '6.00,6.00,6.00', 'Mushroom Soup', '2.00', 'assets/lambchop.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
