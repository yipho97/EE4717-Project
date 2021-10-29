-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2021 at 08:21 AM
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
(5, 2, 'Kung Pao Chicken Rice', 5.00, 'Kung Pao Chicken Rice', '5', 'Chilli,Egg', '0.00,0.50', 'assets/kungpaochickenrice.png'),
(6, 2, 'Fried Rice', 4.00, 'Fried Rice,Salted Fish Fried Rice,Yang Zhou Fried Rice', '4.00,4.50,4.50', 'Chilli,Egg', '0.00,0.50', 'assets/friedrice.png'),
(7, 2, 'Hor Fun', 4.00, 'Hor Fun,San Lao Hor Fun', '4.00,4.00', 'Egg,Fish', '0.50,1.00', 'assets/horfun.png'),
(8, 2, 'Salted Egg Chicken Rice', 4.00, 'Salted Egg Chicken Rice, Salted Egg Sotong Rice', '4.00,5.00', 'Chill,Egg', '0.00,0.50', 'assets/saltedeggchickenrice.png'),
(9, 3, 'Ban Mian', 4.00, 'Dry Ban Mian,Soup Ban Mian,Dumpling Noodle', '4.00,4.00,4.00', 'Noodle,Fish,Dumpling (8pcs)', '0.50,1.00,3.00', 'assets/banmian.png'),
(10, 3, 'Tom Yum Ban Mian', 4.00, 'Tom Yum Ban Mian, Tom Yum You Mian', '4.00,4.00', 'Noodle,Fish,Dumplings (8pcs)', '0.50,1.00,3.00', 'assets/tomyumbanmian.png'),
(11, 3, 'Mee Hoon Kuey', 4.00, 'Mee Hoon Kuey,Tom Yum Mee Hoon Kuey', '4.00,4.00', 'Noodle,Fish,Dumplings (8pcs)', '0.50,1.00,3.00', 'assets/meehoonkuey.png'),
(12, 3, 'Yee Mian', 4.00, 'Yee Mian,Tom Yum Yee Mian', '4.00,4.00', 'Noodles,Fish,Dumplings (8pcs)', '0.50,1.00,3.00', 'assets/yeemian.png'),
(13, 4, 'Steamed Chicken Rice', 3.00, 'Steamed Chicken Rice', '3', 'Egg,Chicken', '0.50,1.00', 'assets/steamedchickenrice.png'),
(14, 4, 'Roasted Chicken Rice', 3.00, 'Roasted Chicken Rice', '3', 'Egg,Chicken', '0.50,1.00', 'assets/roastedchickenrice.png'),
(15, 4, 'Chicken Porridge', 2.50, 'Chicken Porridge', '2.5', 'Porridge,Egg', '0.50,0.50', 'assets/chickenporridge.png'),
(16, 4, 'Chicken Noodle', 4.50, 'Soy Sauce Chicken Noodle,Soy Sauce Chicken Kuey Teow', '4.50,4.50', 'Noodle,Egg', '0.50,0.50', 'assets/chickennoodle.png'),
(17, 5, 'Chicken Chop', 5.00, 'Chicken Chop - Black Pepper Sauce,Chicken Chop - Mushroom Sauce,Chicken Chop - No Sauce', '5.00,5.00,5.00', 'Garlic Bread,Mushroom Soup', '1.50,2.00', 'assets/chickenchop.png'),
(18, 5, 'Chicken Chop Pasta', 5.00, 'Mushroom Sauce,Black Pepper Sauce,No sauce', '5.00,5.00,5.00', 'Noodle,Mushroom Soup', '0.50,2.00', 'assets/chickenchoppasta.png'),
(19, 5, 'Burger Set', 4.00, 'Beef Burger,Chicken Burger', '5.00,4.00', 'Mushroom Soup', '2', 'assets/burgerset.png'),
(20, 5, 'Lamb Chop', 6.00, 'Lamb Chop - Mushroom Sauce,Lamb Chop - Black Pepper Sauce,Lamb Chop - No sauce', '6.00,6.00,6.00', 'Mushroom Soup', '2', 'assets/lambchop.png'),
(21, 6, 'Teh O', 0.60, 'Teh O - Hot,Teh O - Cold', '0.60,1.00', '', '', 'assets/teho.png'),
(22, 6, 'Teh', 0.80, 'Teh - Hot,Teh - Cold', '0.80,1.20', '', '', 'assets/teh.png'),
(23, 6, 'Kopi O', 0.60, 'Kopi O - Hot,Kopi O - Cold', '0.60,1.00', '', '', 'assets/kopio.png'),
(24, 6, 'Kopi', 0.80, 'Kopi - Hot,Kopi -Cold', '0.80,1.20', '', '', 'assets/kopi.png'),
(25, 7, 'Chicken Pasta', 4.00, 'Creamy Tomato Chicken Pasta,Aglio Olio Chicken Pasta,Creamy Cheese Chicken Pasta', '4.00,4.00,5.00', 'Upsize,Corn,Egg', '2.00,0.50,0.50', 'assets/chickenpasta.png'),
(26, 7, 'Duck Pasta', 5.00, 'Creamy Tomato Duck Pasta,Aglio Olio Duck Pasta,Creamy Cheese Duck Pasta', '5.00,5.00,6.00', 'Upsize,Corn,Egg', '2.00,0.50,0.50', 'assets/duckpasta.png'),
(27, 7, 'Fish Pasta', 5.00, 'Creamy Tomato Fish Pasta,Aglio Olio Fish Pasta,Creamy Cheese Fish Pasta', '5.00,5.00,6.00', 'Upsize,Corn,Egg', '2.00,0.50,0.50', 'assets/fishpasta.png'),
(28, 7, 'Seafood Pasta', 6.00, 'Creamy Tomato Seafood Pasta,Aglio Olio Seafood Pasta,Creamy Cheese Seafood Pasta', '6.00,6.00,7.00', 'Upsize,Corn,Egg', '2.00,0.50,0.50', 'assets/seafoodpasta.png'),
(29, 8, 'XXL Fried Chicken', 5.00, 'Original XXL Fried Chicken, Spicy XXL Fried Chicken, Mala XXL Fried Chicken', '5.00,5.00,6.00', 'Upsize,Tempura,Sweet Potato', '2.00,1.00,0.50', 'assets/xxlfriedchicken.png'),
(30, 8, 'Seafood Tempura', 4.00, 'Original Seafood Tempura, Spicy Seafood Tempura, Mala Seafood Tempura', '4.00,4.00,5.00', 'Upsize,Chicken,Sweet Potato', '1.00,2.00,0.50', 'assets/seafoodtempura.png'),
(31, 8, 'Popcorn Chicken', 4.00, 'Original Popcorn Chicken, Spicy Popcorn Chicken, Mala Popcorn Chicken', '4.00,4.00,5.00', 'Upsize,Tempura,Sweet Potato', '2.00,1.00,0.50', 'assets/popcornchicken.png'),
(32, 8, 'Fried Sweet Potato', 3.00, 'Original Fried Sweet Potato, Spicy Fried Sweet Potato, Mala Fried Sweet Potato', '3.00,3.00,4.00', 'Upsize,Chicken,Tempura', '0.50,2.00,1.00', 'assets/friedsweetpotato.png'),
(33, 9, 'Braised Duck Rice', 3.00, 'Braised Duck Rice', '3', 'Roasted Duck,Braised Duck,Egg', '2.00,1.00,0.50', 'assets/braisedduckrice.png'),
(34, 9, 'Roasted Duck Rice', 3.50, 'Roasted Duck Rice', '3.5', 'Roasted Duck,Braised Duck,Egg', '2.00,1.00,0.50', 'assets/roastedduckrice.png'),
(35, 9, 'Braised Duck Porridge', 2.50, 'Braised Duck Porridge', '2.5', 'Roasted Duck,Braised Duck,Egg', '2.00,1.00,0.50', 'assets/braisedduckporridge.png'),
(36, 9, 'Duck Noodle', 4.00, 'Braised Duck Noodle,Roasted Duck Noodle', '4.00,4.50', 'Roasted Duck,Braised Duck,Egg', '2.00,1.00,0.50', 'assets/ducknoodle.png'),
(37, 10, 'Beef Noodle', 5.00, 'Dry Beef Noodle,Soup Beef Noodle', '4.00,5.00', 'Double Meat', '2', 'assets/beefnoodle.png'),
(38, 10, 'Pork Chop Rice', 6.50, 'Pork Chop Rice', '6.5', 'Double Meat', '2', 'assets/porkchoprice.png'),
(39, 10, 'Dumplings', 3.50, 'Steamed Dumplings,Deep Fried Dumplings', '3.50,4.50', '', '', 'assets/dumplings.png'),
(40, 10, 'Xiao Long Bao', 4.50, 'Xiao Long Bao', '4.5', '5 per Basket,8 per Basket', '4.50,7.00', 'assets/xiaolongbao.png'),
(41, 11, 'Teh O', 0.60, 'Teh O - Hot,Teh O - Cold', '0.60,1.00', '', '', 'assets/teho.png'),
(42, 11, 'Teh', 0.80, 'Teh - Hot,Teh - Cold', '0.80,1.20', '', '', 'assets/teh.png'),
(43, 11, 'Kopi O', 0.60, 'Kopi O - Hot,Kopi O - Cold', '0.60,1.00', '', '', 'assets/kopio.png'),
(44, 11, 'Kopi', 0.80, 'Kopi - Hot,Kopi -Cold', '0.80,1.20', '', '', 'assets/kopi.png'),
(45, 12, 'Ramyeon', 3.00, 'Original Ramyeon,Chicken Ramyeon,Beef Ramyeon', '3.00,4.00,5.00', 'Egg,Cheese,Double Meat', '0.50,1.00,1.50', 'assets/ramyeon.png'),
(46, 12, 'Bulgogi', 4.00, 'Chicken Bulgogi,Beef Bulgogi', '4.00,5.00', 'Egg,Cheese,Double Meat', '0.50,1.00,1.50', 'assets/bulgogi.png'),
(47, 12, 'Gimbap', 2.00, 'Vegetable Gimbap,Chicken Gimbap,Beef Gimbap', '2.00,3.00,4.00', 'Double Meat', '1', 'assets/gimbap.png'),
(48, 12, 'Sundubu Jjigae', 3.00, 'Sundubu Jjigae', '3', 'Chicken,Beef', '1.00,2.00', 'assets/sundubujjigae.png'),
(49, 13, 'Ayam Penyet', 7.00, 'Smashed Fried Chicken + Rice', '7', 'Fried Enoki Mushroom, Fried Chicken Skin', '4.50,4.50', 'assets/ayampenyet.png'),
(50, 13, 'Ayam Bakar', 8.00, 'Grilled Chicken + Rice', '8', 'Fried Enoki Mushroom, Fried Chicken Skin', '4.50,4.50', 'assets/ayambakar.png'),
(51, 13, 'Soto Ayam', 7.00, 'Chicken Soto Soup', '7', 'Fried Enoki Mushroom, Fried Chicken Skin', '4.50,4.50', 'assets/sotoayam.png'),
(52, 13, 'Sop Buntut', 7.00, 'Original Sop Buntut, Fried Sop Buntut', '7.00,8.00', 'Fried Enoki Mushroom, Fried Chicken Skin', '4.50,4.50', 'assets/sopbuntut.png'),
(53, 14, 'Steamed Chicken Rice', 3.00, 'Steamed Chicken Rice', '3', 'Egg,Chicken', '0.50,1.00', 'assets/steamedchickenrice.png'),
(54, 14, 'Roasted Chicken Rice', 3.00, 'Roasted Chicken Rice', '3', 'Egg,Chicken', '0.50,1.00', 'assets/roastedchickenrice.png'),
(55, 14, 'Chicken Porridge', 2.50, 'Chicken Porridge', '2.5', 'Porridge,Egg', '0.50,0.50', 'assets/chickenporridge.png'),
(56, 14, 'Chicken Noodle', 4.50, 'Soy Sauce Chicken Noodle,Soy Sauce Chicken Kuey Teow', '4.50,4.50', 'Noodle,Egg', '0.50,0.50', 'assets/chickennoodle.png'),
(57, 15, 'Chicken Chop', 5.00, 'Chicken Chop - Black Pepper Sauce,Chicken Chop - Mushroom Sauce,Chicken Chop - No Sauce', '5.00,5.00,5.00', 'Garlic Bread,Mushroom Soup', '1.50,2.00', 'assets/chickenchop.png'),
(58, 15, 'Chicken Chop Pasta', 5.00, 'Mushroom Sauce,Black Pepper Sauce,No sauce', '5.00,5.00,5.00', 'Noodle,Mushroom Soup', '0.50,2.00', 'assets/chickenchoppasta.png'),
(59, 15, 'Burger Set', 4.00, 'Beef Burger,Chicken Burger', '5.00,4.00', 'Mushroom Soup', '2', 'assets/burgerset.png'),
(60, 15, 'Lamb Chop', 6.00, 'Lamb Chop - Mushroom Sauce,Lamb Chop - Black Pepper Sauce,Lamb Chop - No sauce', '6.00,6.00,6.00', 'Mushroom Soup', '2', 'assets/lambchop.png'),
(61, 16, 'Teh O', 0.60, 'Teh O - Hot,Teh O - Cold', '0.60,1.00', '', '', 'assets/teho.png'),
(62, 16, 'Teh', 0.80, 'Teh - Hot,Teh - Cold', '0.80,1.20', '', '', 'assets/teh.png'),
(63, 16, 'Kopi O', 0.60, 'Kopi O - Hot,Kopi O - Cold', '0.60,1.00', '', '', 'assets/kopio.png'),
(64, 16, 'Kopi', 0.80, 'Kopi - Hot,Kopi -Cold', '0.80,1.20', '', '', 'assets/kopi.png'),
(65, 17, 'Tom Yam Talay', 5.00, 'Tom Yum Clear Soup', '5', 'Chicken,Beef,Mushroom', '2.00,3.00,1.00', 'assets/tomyamtalay.png'),
(66, 17, 'Pineapple Fried Rice', 4.00, 'Pineapple Fried Rice', '4', 'Chicken,Beef', '2.00,3.00', 'assets/pineapplefriedrice.png'),
(67, 17, 'Curry with Rice', 4.00, 'Green Curry with Rice,Red Curry with Rice', '4.00,4.00', 'Chicken,Beef', '2.00,3.00', 'assets/currywithrice.png'),
(68, 17, 'Pad Thai', 4.00, 'Pad Thai', '4', 'Chicken,Beef,Egg', '2.00,3.00,0.50', 'assets/padthai.png'),
(69, 18, 'Ramyeon', 3.00, 'Original Ramyeon,Chicken Ramyeon,Beef Ramyeon', '3.00,4.00,5.00', 'Egg,Cheese,Double Meat', '0.50,1.00,1.50', 'assets/ramyeon.png'),
(70, 18, 'Bulgogi', 4.00, 'Chicken Bulgogi,Beef Bulgogi', '4.00,5.00', 'Egg,Cheese,Double Meat', '0.50,1.00,1.50', 'assets/bulgogi.png'),
(71, 18, 'Gimbap', 2.00, 'Vegetable Gimbap,Chicken Gimbap,Beef Gimbap', '2.00,3.00,4.00', 'Double Meat', '1', 'assets/gimbap.png'),
(72, 18, 'Sundubu Jjigae', 3.00, 'Sundubu Jjigae', '3', 'Chicken,Beef', '1.00,2.00', 'assets/sundubujjigae.png'),
(73, 19, 'Ban Mian', 4.00, 'Dry Ban Mian,Soup Ban Mian,Dumpling Noodle', '4.00,4.00,4.00', 'Noodle,Fish,Dumpling (8pcs)', '0.50,1.00,3.00', 'assets/banmian.png'),
(74, 19, 'Tom Yum Ban Mian', 4.00, 'Tom Yum Ban Mian, Tom Yum You Mian', '4.00,4.00', 'Noodle,Fish,Dumplings (8pcs)', '0.50,1.00,3.00', 'assets/tomyumbanmian.png'),
(75, 19, 'Mee Hoon Kuey', 4.00, 'Mee Hoon Kuey,Tom Yum Mee Hoon Kuey', '4.00,4.00', 'Noodle,Fish,Dumplings (8pcs)', '0.50,1.00,3.00', 'assets/meehoonkuey.png'),
(76, 19, 'Yee Mian', 4.00, 'Yee Mian,Tom Yum Yee Mian', '4.00,4.00', 'Noodles,Fish,Dumplings (8pcs)', '0.50,1.00,3.00', 'assets/yeemian.png'),
(77, 20, 'Chicken Chop', 5.00, 'Chicken Chop - Black Pepper Sauce,Chicken Chop - Mushroom Sauce,Chicken Chop - No Sauce', '5.00,5.00,5.00', 'Garlic Bread,Mushroom Soup', '1.50,2.00', 'assets/chickenchop.png'),
(78, 20, 'Chicken Chop Pasta', 5.00, 'Mushroom Sauce,Black Pepper Sauce,No sauce', '5.00,5.00,5.00', 'Noodle,Mushroom Soup', '0.50,2.00', 'assets/chickenchoppasta.png'),
(79, 20, 'Burger Set', 4.00, 'Beef Burger,Chicken Burger', '5.00,4.00', 'Mushroom Soup', '2', 'assets/burgerset.png'),
(80, 20, 'Lamb Chop', 6.00, 'Lamb Chop - Mushroom Sauce,Lamb Chop - Black Pepper Sauce,Lamb Chop - No sauce', '6.00,6.00,6.00', 'Mushroom Soup', '2', 'assets/lambchop.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
