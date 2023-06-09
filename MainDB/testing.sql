-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.5.42 - Distributed by The IUS Community Project
-- Server OS:                    Linux
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for testing
CREATE DATABASE IF NOT EXISTS `testing` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `testing`;


-- Dumping structure for table testing.tbl_employeetype
CREATE TABLE IF NOT EXISTS `tbl_employeetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table testing.tbl_employeetype: ~3 rows (approximately)
DELETE FROM `tbl_employeetype`;
/*!40000 ALTER TABLE `tbl_employeetype` DISABLE KEYS */;
INSERT INTO `tbl_employeetype` (`id`, `name`) VALUES
	(1, 'Normal Employee'),
	(2, 'Hourly Employee'),
	(3, 'Sale Employee');
/*!40000 ALTER TABLE `tbl_employeetype` ENABLE KEYS */;


-- Dumping structure for table testing.tbl_user
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table testing.tbl_user: ~4 rows (approximately)
DELETE FROM `tbl_user`;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id`, `employeetype_id`, `username`, `password`, `lastname`, `firstname`, `isaccountant`, `updated_at`, `created_at`, `email`) VALUES
	(4, 1, 'hieu', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Hieu', 'Nguyen', 1, '2015-04-25', '2015-04-25', 'hieu@gmail.com'),
	(5, 1, 'long', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Long', 'Tran', 0, '2015-04-25', '2015-04-25', 'long@gmail.com'),
	(7, 2, 'hung', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Hung', 'Nguyen', 0, '2015-04-25', '2015-04-25', 'hung@gmail.com'),
	(8, 3, 'lan', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Lan', 'Pham', 0, '2015-04-25', '2015-04-25', 'lan@gmail.com');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;


-- Dumping structure for table testing.tbl_weeklysalary
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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- Dumping data for table testing.tbl_weeklysalary: ~63 rows (approximately)
DELETE FROM `tbl_weeklysalary`;
/*!40000 ALTER TABLE `tbl_weeklysalary` DISABLE KEYS */;
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
	(23, 8, 1000, NULL, 10000, 0.05, 0, 1350, '0000-00-00 00:00:00', '1000 10.000 0.05'),
	(24, 1, 2232, NULL, NULL, NULL, 2232, 1983, '2015-04-27 00:00:00', '2232'),
	(25, 1, 5000, NULL, NULL, NULL, 5000, 4441, '2015-04-28 00:00:00', '5000 n '),
	(26, 1, 5000, NULL, NULL, NULL, 5000, 4441, '2015-04-30 00:00:00', '5000 n'),
	(27, 1, 5000, NULL, NULL, NULL, 5000, 4441, '2015-04-30 00:00:00', '5000 n '),
	(28, 8, 0, NULL, 100000, 0.05, 5000, 4441, '2015-05-02 00:00:00', 'eeeee'),
	(29, 4, 650, NULL, NULL, NULL, 650, 587, '2015-05-02 00:00:00', '650 n'),
	(30, 7, 100, 45, NULL, NULL, 5250, 4663, '2015-05-02 00:00:00', '45h 100'),
	(31, 8, 400, NULL, 2222, 0.05, 511, 461, '2015-05-03 00:00:00', 'Sale Employee'),
	(32, 5, 500, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', 's'),
	(33, 5, 500, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', 'w'),
	(34, 4, 1100, NULL, NULL, NULL, 1100, 993, '2015-05-03 00:00:00', 'w'),
	(35, 4, 500, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', 's'),
	(36, 4, 500, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', 'g'),
	(37, 5, 500, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', 'd'),
	(38, 5, 500, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', 'd'),
	(39, 4, 666, NULL, NULL, NULL, 666, 601, '2015-05-03 00:00:00', 's'),
	(40, 4, 1100, NULL, NULL, NULL, 1100, 993, '2015-05-03 00:00:00', 'e'),
	(41, 4, 0, NULL, NULL, NULL, 5001, 4442, '2015-05-03 00:00:00', 's'),
	(42, 7, 0, NULL, NULL, NULL, 6500, 5411, '2015-05-03 00:00:00', '50h 100$'),
	(43, 4, 0, NULL, NULL, NULL, 1111, 1003, '2015-05-03 00:00:00', 'n1111'),
	(44, 4, 0, NULL, NULL, NULL, 600, 542, '2015-05-03 00:00:00', '600 n'),
	(45, 4, 0, NULL, NULL, NULL, 601, 542, '2015-05-03 00:00:00', '601n'),
	(46, 4, 0, NULL, NULL, NULL, 555, 501, '2015-05-03 00:00:00', '555 n'),
	(47, 5, 0, NULL, NULL, NULL, 700, 632, '2015-05-03 00:00:00', '700 n'),
	(48, 4, 0, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', 'e'),
	(49, 4, 0, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', 'sdf'),
	(50, 4, 0, NULL, NULL, NULL, 356, 321, '2015-05-03 00:00:00', 'sdf'),
	(51, 4, 0, NULL, NULL, NULL, 123, 111, '2015-05-03 00:00:00', '123 n'),
	(52, 8, 0, NULL, NULL, NULL, 250, 226, '2015-05-03 00:00:00', '200 1000 0.05 sale'),
	(53, 4, 0, NULL, NULL, NULL, 1122, 1013, '2015-05-03 00:00:00', '1122'),
	(54, 4, 0, NULL, NULL, NULL, 2322, 2063, '2015-05-03 00:00:00', 's'),
	(55, 4, 0, NULL, NULL, NULL, 321, 290, '2015-05-03 00:00:00', 'ss'),
	(56, 4, 0, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', '500$'),
	(57, 4, 0, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', '500$'),
	(58, 4, 0, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', '500$'),
	(59, 4, 0, NULL, NULL, NULL, 222, 200, '2015-05-03 00:00:00', '22'),
	(60, 4, 0, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', '500$'),
	(61, 4, 0, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', '500$'),
	(62, 4, 0, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', '500$'),
	(63, 4, 0, NULL, NULL, NULL, 500, 451, '2015-05-03 00:00:00', '500$');
/*!40000 ALTER TABLE `tbl_weeklysalary` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
