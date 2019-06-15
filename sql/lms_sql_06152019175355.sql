-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 11:52 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_sql`
--
CREATE DATABASE IF NOT EXISTS `lms_sql` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lms_sql`;

-- --------------------------------------------------------

--
-- Table structure for table `authorbooktbl`
--

DROP TABLE IF EXISTS `authorbooktbl`;
CREATE TABLE IF NOT EXISTS `authorbooktbl` (
  `authorbook_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`authorbook_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `authorbooktbl`
--

TRUNCATE TABLE `authorbooktbl`;
--
-- Dumping data for table `authorbooktbl`
--

INSERT INTO `authorbooktbl` (`authorbook_id`, `author_id`, `book_id`, `status`) VALUES
(1, 56, 1, 1),
(2, 3, 1, 1),
(3, 58, 2, 1),
(4, 30, 2, 1),
(5, 31, 3, 1),
(6, 83, 3, 1),
(7, 1, 4, 1),
(8, 27, 4, 1),
(9, 45, 5, 1),
(10, 32, 5, 1),
(11, 96, 6, 1),
(12, 53, 6, 1),
(13, 22, 7, 1),
(14, 33, 7, 1),
(15, 5, 8, 1),
(16, 97, 8, 1),
(17, 34, 9, 1),
(18, 82, 9, 1),
(19, 81, 10, 1),
(20, 100, 10, 1),
(21, 39, 11, 1),
(22, 78, 11, 1),
(23, 2, 12, 1),
(24, 33, 12, 1),
(25, 40, 13, 1),
(26, 46, 13, 1),
(27, 64, 14, 1),
(28, 82, 14, 1),
(29, 79, 15, 1),
(30, 93, 15, 1),
(31, 23, 16, 1),
(32, 74, 16, 1),
(33, 16, 17, 1),
(34, 1, 17, 1),
(35, 94, 18, 1),
(36, 32, 18, 1),
(37, 4, 19, 1),
(38, 10, 19, 1),
(39, 33, 20, 1),
(40, 78, 20, 1),
(41, 6, 21, 1),
(42, 82, 21, 1),
(43, 17, 22, 1),
(44, 95, 22, 1),
(45, 26, 23, 1),
(46, 8, 23, 1),
(47, 28, 24, 1),
(48, 64, 24, 1),
(49, 8, 25, 1),
(50, 74, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `authortbl`
--

DROP TABLE IF EXISTS `authortbl`;
CREATE TABLE IF NOT EXISTS `authortbl` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_fname` varchar(255) NOT NULL,
  `author_lname` varchar(255) NOT NULL,
  `author_sname` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `authortbl`
--

TRUNCATE TABLE `authortbl`;
--
-- Dumping data for table `authortbl`
--

INSERT INTO `authortbl` (`author_id`, `author_fname`, `author_lname`, `author_sname`, `author_name`) VALUES
(1, 'Author 1', 'Dela Cruz', 'A. Dela Cruz', 'Author 1 Dela Cruz'),
(2, 'Author 2', 'Dela Cruz', 'A. Dela Cruz', 'Author 2 Dela Cruz'),
(3, 'Author 3', 'Dela Cruz', 'A. Dela Cruz', 'Author 3 Dela Cruz'),
(4, 'Author 4', 'Dela Cruz', 'A. Dela Cruz', 'Author 4 Dela Cruz'),
(5, 'Author 5', 'Dela Cruz', 'A. Dela Cruz', 'Author 5 Dela Cruz'),
(6, 'Author 6', 'Dela Cruz', 'A. Dela Cruz', 'Author 6 Dela Cruz'),
(7, 'Author 7', 'Dela Cruz', 'A. Dela Cruz', 'Author 7 Dela Cruz'),
(8, 'Author 8', 'Dela Cruz', 'A. Dela Cruz', 'Author 8 Dela Cruz'),
(9, 'Author 9', 'Dela Cruz', 'A. Dela Cruz', 'Author 9 Dela Cruz'),
(10, 'Author 10', 'Dela Cruz', 'A. Dela Cruz', 'Author 10 Dela Cruz'),
(11, 'Author 11', 'Dela Cruz', 'A. Dela Cruz', 'Author 11 Dela Cruz'),
(12, 'Author 12', 'Dela Cruz', 'A. Dela Cruz', 'Author 12 Dela Cruz'),
(13, 'Author 13', 'Dela Cruz', 'A. Dela Cruz', 'Author 13 Dela Cruz'),
(14, 'Author 14', 'Dela Cruz', 'A. Dela Cruz', 'Author 14 Dela Cruz'),
(15, 'Author 15', 'Dela Cruz', 'A. Dela Cruz', 'Author 15 Dela Cruz'),
(16, 'Author 16', 'Dela Cruz', 'A. Dela Cruz', 'Author 16 Dela Cruz'),
(17, 'Author 17', 'Dela Cruz', 'A. Dela Cruz', 'Author 17 Dela Cruz'),
(18, 'Author 18', 'Dela Cruz', 'A. Dela Cruz', 'Author 18 Dela Cruz'),
(19, 'Author 19', 'Dela Cruz', 'A. Dela Cruz', 'Author 19 Dela Cruz'),
(20, 'Author 20', 'Dela Cruz', 'A. Dela Cruz', 'Author 20 Dela Cruz'),
(21, 'Author 21', 'Dela Cruz', 'A. Dela Cruz', 'Author 21 Dela Cruz'),
(22, 'Author 22', 'Dela Cruz', 'A. Dela Cruz', 'Author 22 Dela Cruz'),
(23, 'Author 23', 'Dela Cruz', 'A. Dela Cruz', 'Author 23 Dela Cruz'),
(24, 'Author 24', 'Dela Cruz', 'A. Dela Cruz', 'Author 24 Dela Cruz'),
(25, 'Author 25', 'Dela Cruz', 'A. Dela Cruz', 'Author 25 Dela Cruz'),
(26, 'Author 26', 'Dela Cruz', 'A. Dela Cruz', 'Author 26 Dela Cruz'),
(27, 'Author 27', 'Dela Cruz', 'A. Dela Cruz', 'Author 27 Dela Cruz'),
(28, 'Author 28', 'Dela Cruz', 'A. Dela Cruz', 'Author 28 Dela Cruz'),
(29, 'Author 29', 'Dela Cruz', 'A. Dela Cruz', 'Author 29 Dela Cruz'),
(30, 'Author 30', 'Dela Cruz', 'A. Dela Cruz', 'Author 30 Dela Cruz'),
(31, 'Author 31', 'Dela Cruz', 'A. Dela Cruz', 'Author 31 Dela Cruz'),
(32, 'Author 32', 'Dela Cruz', 'A. Dela Cruz', 'Author 32 Dela Cruz'),
(33, 'Author 33', 'Dela Cruz', 'A. Dela Cruz', 'Author 33 Dela Cruz'),
(34, 'Author 34', 'Dela Cruz', 'A. Dela Cruz', 'Author 34 Dela Cruz'),
(35, 'Author 35', 'Dela Cruz', 'A. Dela Cruz', 'Author 35 Dela Cruz'),
(36, 'Author 36', 'Dela Cruz', 'A. Dela Cruz', 'Author 36 Dela Cruz'),
(37, 'Author 37', 'Dela Cruz', 'A. Dela Cruz', 'Author 37 Dela Cruz'),
(38, 'Author 38', 'Dela Cruz', 'A. Dela Cruz', 'Author 38 Dela Cruz'),
(39, 'Author 39', 'Dela Cruz', 'A. Dela Cruz', 'Author 39 Dela Cruz'),
(40, 'Author 40', 'Dela Cruz', 'A. Dela Cruz', 'Author 40 Dela Cruz'),
(41, 'Author 41', 'Dela Cruz', 'A. Dela Cruz', 'Author 41 Dela Cruz'),
(42, 'Author 42', 'Dela Cruz', 'A. Dela Cruz', 'Author 42 Dela Cruz'),
(43, 'Author 43', 'Dela Cruz', 'A. Dela Cruz', 'Author 43 Dela Cruz'),
(44, 'Author 44', 'Dela Cruz', 'A. Dela Cruz', 'Author 44 Dela Cruz'),
(45, 'Author 45', 'Dela Cruz', 'A. Dela Cruz', 'Author 45 Dela Cruz'),
(46, 'Author 46', 'Dela Cruz', 'A. Dela Cruz', 'Author 46 Dela Cruz'),
(47, 'Author 47', 'Dela Cruz', 'A. Dela Cruz', 'Author 47 Dela Cruz'),
(48, 'Author 48', 'Dela Cruz', 'A. Dela Cruz', 'Author 48 Dela Cruz'),
(49, 'Author 49', 'Dela Cruz', 'A. Dela Cruz', 'Author 49 Dela Cruz'),
(50, 'Author 50', 'Dela Cruz', 'A. Dela Cruz', 'Author 50 Dela Cruz'),
(51, 'Author 52', 'Dela Cruz', 'A. Dela Cruz', 'Author 52 Dela Cruz'),
(52, 'Author 53', 'Dela Cruz', 'A. Dela Cruz', 'Author 53 Dela Cruz'),
(53, 'Author 54', 'Dela Cruz', 'A. Dela Cruz', 'Author 54 Dela Cruz'),
(54, 'Author 55', 'Dela Cruz', 'A. Dela Cruz', 'Author 55 Dela Cruz'),
(55, 'Author 56', 'Dela Cruz', 'A. Dela Cruz', 'Author 56 Dela Cruz'),
(56, 'Author 57', 'Dela Cruz', 'A. Dela Cruz', 'Author 57 Dela Cruz'),
(57, 'Author 58', 'Dela Cruz', 'A. Dela Cruz', 'Author 58 Dela Cruz'),
(58, 'Author 59', 'Dela Cruz', 'A. Dela Cruz', 'Author 59 Dela Cruz'),
(59, 'Author 60', 'Dela Cruz', 'A. Dela Cruz', 'Author 60 Dela Cruz'),
(60, 'Author 61', 'Dela Cruz', 'A. Dela Cruz', 'Author 61 Dela Cruz'),
(61, 'Author 62', 'Dela Cruz', 'A. Dela Cruz', 'Author 62 Dela Cruz'),
(62, 'Author 63', 'Dela Cruz', 'A. Dela Cruz', 'Author 63 Dela Cruz'),
(63, 'Author 64', 'Dela Cruz', 'A. Dela Cruz', 'Author 64 Dela Cruz'),
(64, 'Author 65', 'Dela Cruz', 'A. Dela Cruz', 'Author 65 Dela Cruz'),
(65, 'Author 66', 'Dela Cruz', 'A. Dela Cruz', 'Author 66 Dela Cruz'),
(66, 'Author 67', 'Dela Cruz', 'A. Dela Cruz', 'Author 67 Dela Cruz'),
(67, 'Author 68', 'Dela Cruz', 'A. Dela Cruz', 'Author 68 Dela Cruz'),
(68, 'Author 69', 'Dela Cruz', 'A. Dela Cruz', 'Author 69 Dela Cruz'),
(69, 'Author 70', 'Dela Cruz', 'A. Dela Cruz', 'Author 70 Dela Cruz'),
(70, 'Author 71', 'Dela Cruz', 'A. Dela Cruz', 'Author 71 Dela Cruz'),
(71, 'Author 72', 'Dela Cruz', 'A. Dela Cruz', 'Author 72 Dela Cruz'),
(72, 'Author 73', 'Dela Cruz', 'A. Dela Cruz', 'Author 73 Dela Cruz'),
(73, 'Author 74', 'Dela Cruz', 'A. Dela Cruz', 'Author 74 Dela Cruz'),
(74, 'Author 75', 'Dela Cruz', 'A. Dela Cruz', 'Author 75 Dela Cruz'),
(75, 'Author 76', 'Dela Cruz', 'A. Dela Cruz', 'Author 76 Dela Cruz'),
(76, 'Author 77', 'Dela Cruz', 'A. Dela Cruz', 'Author 77 Dela Cruz'),
(77, 'Author 78', 'Dela Cruz', 'A. Dela Cruz', 'Author 78 Dela Cruz'),
(78, 'Author 79', 'Dela Cruz', 'A. Dela Cruz', 'Author 79 Dela Cruz'),
(79, 'Author 80', 'Dela Cruz', 'A. Dela Cruz', 'Author 80 Dela Cruz'),
(80, 'Author 81', 'Dela Cruz', 'A. Dela Cruz', 'Author 81 Dela Cruz'),
(81, 'Author 82', 'Dela Cruz', 'A. Dela Cruz', 'Author 82 Dela Cruz'),
(82, 'Author 83', 'Dela Cruz', 'A. Dela Cruz', 'Author 83 Dela Cruz'),
(83, 'Author 84', 'Dela Cruz', 'A. Dela Cruz', 'Author 84 Dela Cruz'),
(84, 'Author 85', 'Dela Cruz', 'A. Dela Cruz', 'Author 85 Dela Cruz'),
(85, 'Author 86', 'Dela Cruz', 'A. Dela Cruz', 'Author 86 Dela Cruz'),
(86, 'Author 87', 'Dela Cruz', 'A. Dela Cruz', 'Author 87 Dela Cruz'),
(87, 'Author 88', 'Dela Cruz', 'A. Dela Cruz', 'Author 88 Dela Cruz'),
(88, 'Author 89', 'Dela Cruz', 'A. Dela Cruz', 'Author 89 Dela Cruz'),
(89, 'Author 90', 'Dela Cruz', 'A. Dela Cruz', 'Author 90 Dela Cruz'),
(90, 'Author 91', 'Dela Cruz', 'A. Dela Cruz', 'Author 91 Dela Cruz'),
(91, 'Author 92', 'Dela Cruz', 'A. Dela Cruz', 'Author 92 Dela Cruz'),
(92, 'Author 93', 'Dela Cruz', 'A. Dela Cruz', 'Author 93 Dela Cruz'),
(93, 'Author 94', 'Dela Cruz', 'A. Dela Cruz', 'Author 94 Dela Cruz'),
(94, 'Author 95', 'Dela Cruz', 'A. Dela Cruz', 'Author 95 Dela Cruz'),
(95, 'Author 96', 'Dela Cruz', 'A. Dela Cruz', 'Author 96 Dela Cruz'),
(96, 'Author 97', 'Dela Cruz', 'A. Dela Cruz', 'Author 97 Dela Cruz'),
(97, 'Author 98', 'Dela Cruz', 'A. Dela Cruz', 'Author 98 Dela Cruz'),
(98, 'Author 99', 'Dela Cruz', 'A. Dela Cruz', 'Author 99 Dela Cruz'),
(99, 'Author 100', 'Dela Cruz', 'A. Dela Cruz', 'Author 100 Dela Cruz');

-- --------------------------------------------------------

--
-- Table structure for table `booktbl`
--

DROP TABLE IF EXISTS `booktbl`;
CREATE TABLE IF NOT EXISTS `booktbl` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL,
  `book_image` varchar(50) NOT NULL,
  `publish_date` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `booktbl`
--

TRUNCATE TABLE `booktbl`;
--
-- Dumping data for table `booktbl`
--

INSERT INTO `booktbl` (`book_id`, `book_name`, `book_image`, `publish_date`, `section_id`) VALUES
(1, 'Book 1', '', 1557996931, 1),
(2, 'Book 2', '', 1557996933, 1),
(3, 'Book 3', '', 1557996934, 1),
(4, 'Book 4', '', 1557996935, 1),
(5, 'Book 5', '', 1557996936, 1),
(6, 'Book 6', '', 1557996937, 1),
(7, 'Book 7', '', 1557996937, 1),
(8, 'Book 8', '', 1557996938, 1),
(9, 'Book 9', '', 1557996939, 1),
(10, 'Book 10', '', 1557996940, 1),
(11, 'Book 11', '', 1557996941, 1),
(12, 'Book 12', '', 1557996942, 1),
(13, 'Book 13', '', 1557996942, 1),
(14, 'Book 14', '', 1557996944, 1),
(15, 'Book 15', '', 1557996944, 1),
(16, 'Book 16', '', 1557996945, 1),
(17, 'Book 17', '', 1557996945, 1),
(18, 'Book 18', '', 1557996946, 1),
(19, 'Book 19', '', 1557996947, 1),
(20, 'Book 20', '', 1557996948, 1),
(21, 'Book 21', '', 1557996949, 1),
(22, 'Book 22', '', 1557996950, 1),
(23, 'Book 23', '', 1557996951, 1),
(24, 'Book 24', '', 1557996952, 1),
(25, 'Book 25', '', 1557996953, 1);

-- --------------------------------------------------------

--
-- Table structure for table `itembooktbl`
--

DROP TABLE IF EXISTS `itembooktbl`;
CREATE TABLE IF NOT EXISTS `itembooktbl` (
  `itembook_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `book_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`itembook_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `itembooktbl`
--

TRUNCATE TABLE `itembooktbl`;
--
-- Dumping data for table `itembooktbl`
--

INSERT INTO `itembooktbl` (`itembook_id`, `book_id`, `book_code`, `status`, `created_at`) VALUES
(1, 1, '260', 1, 1560588931),
(2, 1, '261', 1, 1560588931),
(3, 1, '262', 1, 1560588931),
(4, 1, '263', 1, 1560588931),
(5, 2, '264', 1, 1560588933),
(6, 2, '265', 1, 1560588933),
(7, 2, '266', 1, 1560588933),
(8, 2, '267', 1, 1560588933),
(9, 3, '268', 1, 1560588934),
(10, 3, '269', 1, 1560588934),
(11, 3, '270', 1, 1560588934),
(12, 3, '271', 1, 1560588934),
(13, 4, '272', 1, 1560588935),
(14, 4, '273', 1, 1560588935),
(15, 4, '274', 1, 1560588935),
(16, 4, '275', 1, 1560588935),
(17, 5, '276', 1, 1560588936),
(18, 5, '277', 1, 1560588936),
(19, 5, '278', 1, 1560588936),
(20, 5, '279', 1, 1560588936),
(21, 6, '280', 1, 1560588937),
(22, 6, '281', 1, 1560588937),
(23, 6, '282', 1, 1560588937),
(24, 6, '283', 1, 1560588937),
(25, 7, '284', 1, 1560588938),
(26, 7, '285', 1, 1560588938),
(27, 7, '286', 1, 1560588938),
(28, 7, '287', 1, 1560588938),
(29, 8, '288', 1, 1560588938),
(30, 8, '289', 1, 1560588938),
(31, 8, '290', 1, 1560588938),
(32, 8, '291', 1, 1560588938),
(33, 9, '292', 1, 1560588939),
(34, 9, '293', 1, 1560588939),
(35, 9, '294', 1, 1560588939),
(36, 9, '295', 1, 1560588939),
(37, 10, '296', 1, 1560588940),
(38, 10, '297', 1, 1560588940),
(39, 10, '298', 1, 1560588940),
(40, 10, '299', 1, 1560588940),
(41, 11, '300', 1, 1560588941),
(42, 11, '301', 1, 1560588941),
(43, 11, '302', 1, 1560588941),
(44, 11, '303', 1, 1560588941),
(45, 12, '304', 1, 1560588942),
(46, 12, '305', 1, 1560588942),
(47, 12, '306', 1, 1560588942),
(48, 12, '307', 1, 1560588942),
(49, 13, '308', 1, 1560588942),
(50, 13, '309', 1, 1560588942),
(51, 13, '310', 1, 1560588942),
(52, 13, '311', 1, 1560588942),
(53, 14, '312', 1, 1560588944),
(54, 14, '313', 1, 1560588944),
(55, 14, '314', 1, 1560588944),
(56, 14, '315', 1, 1560588944),
(57, 15, '316', 1, 1560588944),
(58, 15, '317', 1, 1560588944),
(59, 15, '318', 1, 1560588944),
(60, 15, '319', 1, 1560588944),
(61, 16, '320', 1, 1560588945),
(62, 16, '321', 1, 1560588945),
(63, 16, '322', 1, 1560588945),
(64, 16, '323', 1, 1560588945),
(65, 17, '324', 1, 1560588945),
(66, 17, '325', 1, 1560588945),
(67, 17, '326', 1, 1560588945),
(68, 17, '327', 1, 1560588945),
(69, 18, '328', 1, 1560588946),
(70, 18, '329', 1, 1560588946),
(71, 18, '330', 1, 1560588946),
(72, 18, '331', 1, 1560588946),
(73, 19, '332', 1, 1560588947),
(74, 19, '333', 1, 1560588947),
(75, 19, '334', 1, 1560588947),
(76, 19, '335', 1, 1560588947),
(77, 20, '336', 1, 1560588948),
(78, 20, '337', 1, 1560588948),
(79, 20, '338', 1, 1560588948),
(80, 20, '339', 1, 1560588948),
(81, 21, '340', 1, 1560588949),
(82, 21, '341', 1, 1560588949),
(83, 21, '342', 1, 1560588949),
(84, 21, '343', 1, 1560588949),
(85, 22, '344', 1, 1560588950),
(86, 22, '345', 1, 1560588950),
(87, 22, '346', 1, 1560588950),
(88, 22, '347', 1, 1560588950),
(89, 23, '348', 1, 1560588951),
(90, 23, '349', 1, 1560588951),
(91, 23, '350', 1, 1560588951),
(92, 23, '351', 1, 1560588951),
(93, 24, '352', 1, 1560588952),
(94, 24, '353', 1, 1560588952),
(95, 24, '354', 1, 1560588952),
(96, 24, '355', 1, 1560588952),
(97, 25, '356', 1, 1560588953),
(98, 25, '357', 1, 1560588953),
(99, 25, '358', 1, 1560588953),
(100, 25, '359', 1, 1560588953);

-- --------------------------------------------------------

--
-- Table structure for table `penaltytbl`
--

DROP TABLE IF EXISTS `penaltytbl`;
CREATE TABLE IF NOT EXISTS `penaltytbl` (
  `penalty_id` int(11) NOT NULL AUTO_INCREMENT,
  `penalty_date` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL,
  `penalty_day` int(11) NOT NULL,
  PRIMARY KEY (`penalty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `penaltytbl`
--

TRUNCATE TABLE `penaltytbl`;
--
-- Dumping data for table `penaltytbl`
--

INSERT INTO `penaltytbl` (`penalty_id`, `penalty_date`, `penalty_amount`, `penalty_day`) VALUES
(1, 0, 20, 3),
(2, 1557649191, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sectiontbl`
--

DROP TABLE IF EXISTS `sectiontbl`;
CREATE TABLE IF NOT EXISTS `sectiontbl` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) NOT NULL,
  `section_code` varchar(255) NOT NULL,
  `section_code_number` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `sectiontbl`
--

TRUNCATE TABLE `sectiontbl`;
--
-- Dumping data for table `sectiontbl`
--

INSERT INTO `sectiontbl` (`section_id`, `section_name`, `section_code`, `section_code_number`, `status`, `created_at`) VALUES
(1, 'None', 'NON', 360, 1, 1556900274),
(2, 'Science', 'SCI', 1, 1, 1556901623),
(3, 'Fiction', 'FIC', 1, 0, 1556901623),
(4, 'Non-Fiction', 'NFC', 1, 0, 1556901623),
(5, 'Business', 'BUS', 1, 0, 1556901623),
(6, 'Economics', 'ECO', 1, 0, 1556901623),
(7, 'Information Technology', 'IT', 1, 0, 156901623),
(8, 'Engineering', 'ENG', 1, 0, 1556901623),
(9, 'Literature', 'LIT', 1, 0, 1556901623),
(10, 'Arts', 'ART', 1, 0, 1556901623),
(11, 'Comedy', 'COM', 1, 0, 1556901623),
(12, 'Romantic', 'ROM', 1, 0, 1556901623),
(13, 'Sample 1', 'ABC', 1, 0, 1556901623),
(14, 'Sample 2', 'DEF', 1, 0, 1556901623),
(15, 'Sample 3', 'GHI', 1, 0, 1556901623),
(16, 'Sample 4', 'JKL', 1, 0, 1556901623),
(17, 'Sample 5', 'MNO', 1, 0, 1556901623),
(18, 'Sample 6', 'PQR', 1, 0, 1556901623),
(19, 'Sample 7', 'STU', 1, 0, 1556901623),
(20, 'Sample 8', 'VWX', 1, 0, 1556901623),
(21, 'Sample 9', 'YZA', 1, 0, 1556901623),
(22, 'Sample 10', 'BCD', 1, 0, 1556901623),
(23, 'Sample 11', 'EFG', 1, 0, 1556901623),
(24, 'Sample 12', 'HIJ', 1, 0, 1556901623),
(25, 'Sample 13', 'KLM', 1, 0, 1556901623),
(26, 'Sample 14', 'OPQ', 1, 0, 1556901623),
(27, 'Sample 15', 'RST', 1, 0, 1556901623),
(28, 'Sample 16', 'UVW', 1, 0, 1556901623),
(29, 'Sample 17', 'XYZ', 1, 0, 1556901623),
(30, 'Sample 18', 'KJC', 1, 0, 1556901623),
(31, 'Section Lelele Mo Mabahao', 'SLM', 0, 0, 1560592285);

-- --------------------------------------------------------

--
-- Table structure for table `transactiontbl`
--

DROP TABLE IF EXISTS `transactiontbl`;
CREATE TABLE IF NOT EXISTS `transactiontbl` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` int(11) NOT NULL,
  `return_date` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `itembook_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `transactiontbl`
--

TRUNCATE TABLE `transactiontbl`;
--
-- Dumping data for table `transactiontbl`
--

INSERT INTO `transactiontbl` (`transaction_id`, `transaction_date`, `return_date`, `amount_paid`, `status`, `itembook_id`, `user_id`) VALUES
(1, 1560589015, 0, 0, 2, 20, 22),
(2, 1560589015, 1560589015, 0, 3, 20, 22),
(3, 1560589015, 0, 0, 2, 97, 54),
(4, 1560589015, 1560589015, 0, 3, 97, 54),
(5, 1560589015, 0, 0, 2, 26, 2),
(6, 1560589015, 1560589015, 0, 3, 26, 2),
(7, 1560589015, 0, 0, 2, 57, 2),
(8, 1560589015, 1560589016, 0, 3, 57, 2),
(9, 1560589015, 0, 0, 2, 18, 63),
(10, 1560589015, 1560589016, 0, 3, 18, 63),
(11, 1560589044, 0, 0, 2, 88, 43),
(12, 1560589044, 1560589044, 0, 3, 88, 43),
(13, 1560589044, 0, 0, 2, 94, 6),
(14, 1560589044, 1560589044, 0, 3, 94, 6),
(15, 1560589044, 0, 0, 2, 52, 59),
(16, 1560589044, 1560589045, 0, 3, 52, 59),
(17, 1560589044, 0, 0, 2, 80, 53),
(18, 1560589044, 1560589045, 0, 3, 80, 53),
(19, 1560589044, 0, 0, 2, 56, 100),
(20, 1560589044, 1560589045, 0, 3, 56, 100),
(21, 1560589044, 0, 0, 2, 74, 96),
(22, 1560589044, 1560589045, 0, 3, 74, 96),
(23, 1560589044, 0, 0, 2, 52, 38),
(24, 1560589044, 1560589046, 0, 3, 52, 38),
(25, 1560589044, 0, 0, 2, 6, 72),
(26, 1560589044, 1560589046, 0, 3, 6, 72),
(27, 1560589044, 0, 0, 2, 1, 93),
(28, 1560589044, 1560589046, 0, 3, 1, 93),
(29, 1560589044, 0, 0, 2, 76, 96),
(30, 1560589044, 1560589047, 0, 3, 76, 96),
(31, 1560589044, 0, 0, 2, 70, 52),
(32, 1560589044, 1560589047, 0, 3, 70, 52),
(33, 1560589044, 0, 0, 2, 46, 85),
(34, 1560589044, 1560589047, 0, 3, 46, 85),
(35, 1560589044, 0, 0, 2, 43, 55),
(36, 1560589044, 1560589048, 0, 3, 43, 55),
(37, 1560589044, 0, 0, 2, 86, 16),
(38, 1560589044, 1560589048, 0, 3, 86, 16),
(39, 1560589044, 0, 0, 2, 43, 58),
(40, 1560589044, 1560589048, 0, 3, 43, 58),
(41, 1560589044, 0, 0, 2, 28, 42),
(42, 1560589044, 1560589049, 0, 3, 28, 42),
(43, 1560589044, 0, 0, 2, 60, 29),
(44, 1560589044, 1560589049, 0, 3, 60, 29),
(45, 1560589044, 0, 0, 2, 48, 71),
(46, 1560589044, 1560589049, 0, 3, 48, 71),
(47, 1560589044, 0, 0, 2, 47, 92),
(48, 1560589044, 1560589050, 0, 3, 47, 92),
(49, 1560589044, 0, 0, 2, 49, 7),
(50, 1560589044, 1560589050, 0, 3, 49, 7),
(51, 1560589044, 0, 0, 2, 92, 77),
(52, 1560589044, 1560589051, 0, 3, 92, 77),
(53, 1560589044, 0, 0, 2, 86, 4),
(54, 1560589044, 1560589051, 0, 3, 86, 4),
(55, 1560589044, 0, 0, 2, 70, 64),
(56, 1560589044, 1560589051, 0, 3, 70, 64),
(57, 1560589044, 0, 0, 2, 26, 69),
(58, 1560589044, 1560589052, 0, 3, 26, 69),
(59, 1560589044, 0, 0, 2, 60, 53),
(60, 1560589044, 1560589053, 0, 3, 60, 53),
(61, 1560589044, 0, 0, 2, 84, 9),
(62, 1560589044, 1560589054, 0, 3, 84, 9),
(63, 1560589044, 0, 0, 2, 65, 84),
(64, 1560589044, 1560589055, 0, 3, 65, 84),
(65, 1560589044, 0, 0, 2, 29, 81),
(66, 1560589044, 1560589055, 0, 3, 29, 81),
(67, 1560589044, 0, 0, 2, 92, 42),
(68, 1560589044, 1560589056, 0, 3, 92, 42),
(69, 1560589044, 0, 0, 2, 3, 81),
(70, 1560589044, 1560589056, 0, 3, 3, 81),
(71, 1560589044, 0, 0, 2, 64, 87),
(72, 1560589044, 1560589056, 0, 3, 64, 87),
(73, 1560589044, 0, 0, 2, 59, 57),
(74, 1560589044, 1560589056, 0, 3, 59, 57),
(75, 1560589044, 0, 0, 2, 1, 69),
(76, 1560589044, 1560589056, 0, 3, 1, 69),
(77, 1560589044, 0, 0, 2, 48, 19),
(78, 1560589044, 1560589057, 0, 3, 48, 19),
(79, 1560589044, 0, 0, 2, 39, 86),
(80, 1560589044, 1560589057, 0, 3, 39, 86),
(81, 1560589044, 0, 0, 2, 93, 45),
(82, 1560589044, 1560589057, 0, 3, 93, 45),
(83, 1560589044, 0, 0, 2, 72, 56),
(84, 1560589044, 1560589058, 0, 3, 72, 56),
(85, 1560589044, 0, 0, 2, 70, 50),
(86, 1560589044, 1560589058, 0, 3, 70, 50),
(87, 1560589044, 0, 0, 2, 51, 13),
(88, 1560589044, 1560589058, 0, 3, 51, 13),
(89, 1560589044, 0, 0, 2, 61, 5),
(90, 1560589044, 1560589058, 0, 3, 61, 5),
(91, 1560589044, 0, 0, 2, 41, 83),
(92, 1560589044, 1560589059, 0, 3, 41, 83),
(93, 1560589044, 0, 0, 2, 27, 31),
(94, 1560589044, 1560589059, 0, 3, 27, 31),
(95, 1560589044, 0, 0, 2, 89, 79),
(96, 1560589044, 1560589059, 0, 3, 89, 79),
(97, 1560589044, 0, 0, 2, 84, 22),
(98, 1560589044, 1560589060, 0, 3, 84, 22),
(99, 1560589044, 0, 0, 2, 2, 27),
(100, 1560589044, 1560589060, 0, 3, 2, 27);

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

DROP TABLE IF EXISTS `usertbl`;
CREATE TABLE IF NOT EXISTS `usertbl` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `password_code` varchar(6) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `usertbl`
--

TRUNCATE TABLE `usertbl`;
--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`user_id`, `username`, `email`, `password`, `user_type`, `status`, `password_code`, `created_at`) VALUES
(1, 'admin', 'lms.email.manager@gmail.com', '55285e5a32519431b408de651aa7a47c41369b15', 1, 1, '', 1556697008),
(2, 'user1', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(3, 'user2', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(4, 'user3', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(5, 'user4', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(6, 'user5', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(7, 'user6', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(8, 'user7', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(9, 'user8', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(10, 'user9', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(11, 'user10', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(12, 'user11', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(13, 'user12', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(14, 'user13', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(15, 'user14', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(16, 'user15', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(17, 'user16', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(18, 'user17', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(19, 'user18', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(20, 'user19', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(21, 'user20', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(22, 'user21', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(23, 'user22', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(24, 'user23', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(25, 'user24', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(26, 'user25', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(27, 'user26', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(28, 'user27', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(29, 'user28', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(30, 'user29', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(31, 'user30', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(32, 'user31', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(33, 'user32', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(34, 'user33', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(35, 'user34', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(36, 'user35', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(37, 'user36', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(38, 'user37', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(39, 'user38', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(40, 'user39', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(41, 'user40', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(42, 'user41', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(43, 'user42', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(44, 'user43', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(45, 'user44', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(46, 'user45', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(47, 'user46', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(48, 'user47', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(49, 'user48', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(50, 'user49', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(51, 'user50', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '', 1560587133),
(52, 'admin1', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(53, 'admin2', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(54, 'admin3', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(55, 'admin4', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(56, 'admin5', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(57, 'admin6', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(58, 'admin7', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(59, 'admin8', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(60, 'admin9', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(61, 'admin10', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(62, 'admin11', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(63, 'admin12', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(64, 'admin13', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(65, 'admin14', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(66, 'admin15', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(67, 'admin16', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(68, 'admin17', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(69, 'admin18', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(70, 'admin19', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(71, 'admin20', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(72, 'admin21', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(73, 'admin22', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(74, 'admin23', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(75, 'admin24', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(76, 'admin25', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(77, 'admin26', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(78, 'admin27', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(79, 'admin28', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(80, 'admin29', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(81, 'admin30', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(82, 'admin31', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(83, 'admin32', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(84, 'admin33', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(85, 'admin34', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(86, 'admin35', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(87, 'admin36', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(88, 'admin37', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(89, 'admin38', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(90, 'admin39', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(91, 'admin40', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(92, 'admin41', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(93, 'admin42', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(94, 'admin43', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(95, 'admin44', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(96, 'admin45', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(97, 'admin46', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(98, 'admin47', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(99, 'admin48', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(100, 'admin49', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133),
(101, 'admin50', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '', 1560587133);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
