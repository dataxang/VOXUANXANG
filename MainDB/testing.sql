-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2015 at 07:08 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `employeetype_id`, `username`, `password`, `lastname`, `firstname`, `isaccountant`, `updated_at`, `created_at`, `email`) VALUES
(1, 0, 'admin', 'd93a5def7511da3d0f2d171d9c344e91', '', '', 0, '2015-04-25', '2015-04-25', NULL),
(2, 0, 'test', 'd93a5def7511da3d0f2d171d9c344e91', '', '', 0, '2015-04-25', '2015-04-25', NULL),
(3, 0, 'xang', 'd93a5def7511da3d0f2d171d9c344e91', '', '', 0, '2015-04-25', '2015-04-25', NULL),
(4, 0, 'hieu', 'd93a5def7511da3d0f2d171d9c344e91', '', '', 0, '2015-04-25', '2015-04-25', 'hieu@gmail.com'),
(5, 0, 'long', 'd93a5def7511da3d0f2d171d9c344e91', '', '', 0, '2015-04-25', '2015-04-25', 'hieu@gmail.com'),
(6, 0, 'xangvo', 'd93a5def7511da3d0f2d171d9c344e91', '', '', 0, '2015-04-25', '2015-04-25', 'xangvo@gmail.com');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
