-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2015 at 10:02 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testing`
--
CREATE DATABASE IF NOT EXISTS `testing` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `testing`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employeetype`
--

CREATE TABLE IF NOT EXISTS `tbl_employeetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_employeetype`
--

INSERT INTO `tbl_employeetype` (`id`, `name`) VALUES
(1, 'Normal Employee'),
(2, 'Hourly Employee'),
(3, 'Sale Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employeetype_id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `isaccountant` tinyint(1) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `employeetype_id`, `username`, `password`, `lastname`, `firstname`, `isaccountant`, `updated_at`, `created_at`, `email`) VALUES
(1, 1, 'admin', 'd93a5def7511da3d0f2d171d9c344e91', 'Admin', 'Pike', 0, '2015-04-25', '2015-04-25', 'admin@gmail.com'),
(4, 1, 'hieu', 'd93a5def7511da3d0f2d171d9c344e91', 'Hieu', 'Nguyen', 1, '2015-04-25', '2015-04-25', 'hieu@gmail.com'),
(5, 1, 'long', 'd93a5def7511da3d0f2d171d9c344e91', 'Long', 'Tran', 0, '2015-04-25', '2015-04-25', 'long@gmail.com'),
(7, 2, 'hung', 'd93a5def7511da3d0f2d171d9c344e91', 'Hung', 'Nguyen', 0, '2015-04-25', '2015-04-25', 'hung@gmail.com'),
(8, 3, 'lan', 'd93a5def7511da3d0f2d171d9c344e91', 'Lan', 'Pham', 0, '2015-04-25', '2015-04-25', 'lan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weeklysalary`
--

CREATE TABLE IF NOT EXISTS `tbl_weeklysalary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `worked_hour` int(11) DEFAULT NULL,
  `gross_sale` int(11) DEFAULT NULL,
  `commission_rate` float DEFAULT NULL,
  `gross_salary` int(11) NOT NULL,
  `net_salary` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `comment` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_weeklysalary`
--

INSERT INTO `tbl_weeklysalary` (`id`, `user_id`, `basic_salary`, `worked_hour`, `gross_sale`, `commission_rate`, `gross_salary`, `net_salary`, `created_date`, `comment`) VALUES
(1, 0, 500, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', 'xxx'),
(2, 1, 5000, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', 'xxxxee'),
(3, 4, 1100, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', '1100'),
(4, 5, 500, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', '500'),
(5, 1, 1, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', '1'),
(6, 1, 1100, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', '1100'),
(7, 1, 500, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', '2222222'),
(8, 1, 500, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', 'eee'),
(9, 1, 500, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', 'sfdf'),
(10, 1, 500, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', 'www'),
(11, 1, 500, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', 'wweww'),
(12, 1, 1100, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', '1234221234'),
(13, 1, 500, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', 'xx555'),
(14, 7, 30, 1, NULL, NULL, 0, 0, '0000-00-00 00:00:00', 'Hourly Employee'),
(15, 7, 30, 2, NULL, NULL, 0, 0, '0000-00-00 00:00:00', 'Hourly Employee'),
(16, 8, 400, NULL, 20, 15, 0, 0, '0000-00-00 00:00:00', 'Sale Employee'),
(17, 1, 1000, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', '1000'),
(18, 5, 1000, NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00', 'Normal Employee'),
(19, 1, 1000, NULL, NULL, NULL, 0, 900, '0000-00-00 00:00:00', '1000 n'),
(20, 4, 3000, NULL, NULL, NULL, 0, 2655, '0000-00-00 00:00:00', '3000 n'),
(21, 7, 100, 40, NULL, NULL, 0, 3540, '0000-00-00 00:00:00', '40 100 hourly'),
(22, 7, 100, 40, NULL, NULL, 0, 3540, '0000-00-00 00:00:00', '40 100 hourly'),
(23, 8, 1000, NULL, 10000, 0.05, 0, 1350, '0000-00-00 00:00:00', '1000 10.000 0.05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
