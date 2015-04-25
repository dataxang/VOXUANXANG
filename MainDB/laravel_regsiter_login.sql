-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2015 at 04:52 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel_regsiter_login`
--
CREATE DATABASE IF NOT EXISTS `laravel_regsiter_login` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `laravel_regsiter_login`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_03_23_060708_create_users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'd93a5def7511da3d0f2d171d9c344e91', 'test1@gmail.com', '2015-03-23 02:09:17', '2015-03-23 02:09:17'),
(2, 'test2', 'd93a5def7511da3d0f2d171d9c344e91', 'test2@gmail.com', '2015-03-23 02:12:44', '2015-03-23 02:12:44'),
(3, 'test3', 'd93a5def7511da3d0f2d171d9c344e91', 'test3@gmail.com', '2015-03-23 02:32:23', '2015-03-23 02:32:23'),
(4, 'test1', 'd93a5def7511da3d0f2d171d9c344e91', 'test1@gmail.com', '2015-03-23 02:39:49', '2015-03-23 02:39:49'),
(5, 'test1', 'd93a5def7511da3d0f2d171d9c344e91', 'test1@gmail.com', '2015-03-23 02:41:24', '2015-03-23 02:41:24'),
(6, 'test1', 'd93a5def7511da3d0f2d171d9c344e91', 'test1@gmail.com', '2015-03-23 02:45:34', '2015-03-23 02:45:34'),
(7, 'test1', 'd93a5def7511da3d0f2d171d9c344e91', 'test1@gmail.com', '2015-03-23 02:46:29', '2015-03-23 02:46:29'),
(8, 'test1', 'd93a5def7511da3d0f2d171d9c344e91', 'test1@gmail.com', '2015-03-23 02:46:57', '2015-03-23 02:46:57'),
(9, 'test1', 'd93a5def7511da3d0f2d171d9c344e91', 'test1@gmail.com', '2015-03-23 02:49:26', '2015-03-23 02:49:26'),
(10, 'test1', 'd93a5def7511da3d0f2d171d9c344e91', 'test1@gmail.com', '2015-03-23 02:50:57', '2015-03-23 02:50:57'),
(11, 'test4', 'd93a5def7511da3d0f2d171d9c344e91', 'test4@gmail.com', '2015-03-23 03:20:02', '2015-03-23 03:20:02'),
(12, 'test5', 'd93a5def7511da3d0f2d171d9c344e91', 'test5@gmail.com', '2015-03-23 04:23:56', '2015-03-23 04:23:56'),
(13, 'admin', 'd93a5def7511da3d0f2d171d9c344e91', 'admin@gmail.com', '2015-03-23 04:51:18', '2015-03-23 04:51:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
