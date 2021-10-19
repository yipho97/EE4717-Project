-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2021 at 07:06 AM
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
  `delivered` tinyint(1) NOT NULL,
  `name` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `zip` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `orders-log`
--

INSERT INTO `orders-log` (`order_id`, `datetime`, `delivered`, `name`, `contact`, `email`, `address`, `zip`) VALUES
(1, '2021-10-17 14:21:14', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306'),
(2, '2021-10-17 14:23:55', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho9735@gmail.com', 'Sengkang', '543306'),
(72, '2021-10-17 14:28:19', 0, 'æˆä¸šå’Œ', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306'),
(73, '2021-10-17 14:29:34', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306'),
(74, '2021-10-17 14:29:34', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306'),
(75, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306'),
(76, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306'),
(77, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306'),
(78, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306'),
(79, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306'),
(80, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306'),
(100, '2021-10-18 03:50:51', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306'),
(101, '2021-10-18 04:04:06', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
