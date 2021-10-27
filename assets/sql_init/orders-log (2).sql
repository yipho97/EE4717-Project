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
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `orders-log`
--

INSERT INTO `orders-log` (`order_id`, `datetime`, `delivered`, `name`, `contact`, `email`, `address`, `zip`, `total`) VALUES
(1, '2021-10-17 14:21:14', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 0.00),
(2, '2021-10-17 14:23:55', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho9735@gmail.com', 'Sengkang', '543306', 0.00),
(72, '2021-10-17 14:28:19', 0, 'æˆä¸šå’Œ', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 0.00),
(73, '2021-10-17 14:29:34', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 0.00),
(74, '2021-10-17 14:29:34', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 0.00),
(75, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306', 0.00),
(76, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306', 0.00),
(77, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306', 0.00),
(78, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306', 0.00),
(79, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306', 0.00),
(80, '2021-10-17 15:02:33', 0, 'Seng Yip Ho', '+6596378252', 'dwadawd', 'wdadad', '543306', 0.00),
(100, '2021-10-18 03:50:51', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 0.00),
(101, '2021-10-18 04:04:06', 0, 'Seng Yip Ho', '+6596378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 0.00),
(102, '2021-10-27 09:38:34', 0, 'Seng Yip Ho', '96378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 0.00),
(103, '2021-10-27 09:40:33', 0, 'Seng Yip Ho', '96378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 0.00),
(104, '2021-10-27 12:23:12', 0, 'Seng Yip Ho', '96378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 0.00),
(105, '2021-10-27 12:32:49', 0, 'Seng Yip Ho', '96378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 7.60),
(106, '2021-10-27 12:35:17', 0, 'Seng Yip Ho', '96378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 21.00),
(107, '2021-10-27 13:57:38', 0, 'Seng Yip Ho', '96378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 10.00),
(108, '2021-10-27 14:01:13', 0, 'Seng Yip Ho', '96378252', 'sengyipho9735@gmail.com', 'Sengkang, #09-91', '543306', 7.60),
(109, '2021-10-27 14:01:59', 0, 'Seng Yip Ho', '96378252', 'sengyipho9735@gmail.com', 'Sengkang, #09-91', '543306', 7.60),
(110, '2021-10-27 14:03:04', 0, 'Seng Yip Ho', '96378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 5.10),
(111, '2021-10-27 14:04:47', 0, 'Seng Yip Ho', '96378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 5.10),
(112, '2021-10-27 14:06:40', 0, 'Seng Yip Ho', '96378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 6.10),
(113, '2021-10-27 14:08:36', 0, 'Seng Yip Ho', '96378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 6.10),
(114, '2021-10-27 14:12:26', 0, 'Seng Yip Ho', '96378252', 'sengyipho9735@gmail.com', 'Sengkang, #09-91', '543306', 7.60),
(115, '2021-10-27 15:38:33', 0, 'Seng Yip Ho', '96378252', 'sengyipho_97@hotmail.com', 'Block 306C Anchorvale Link #09-91', '543306', 9.30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
