-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 06:27 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
CREATE TABLE `authorbooktbl` (
  `authorbook_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `authorbooktbl`
--

TRUNCATE TABLE `authorbooktbl`;
--
-- Dumping data for table `authorbooktbl`
--

INSERT INTO `authorbooktbl` (`authorbook_id`, `author_id`, `book_id`, `status`) VALUES
(1, 2, 1, 0),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 2, 4, 1),
(5, 1, 4, 1),
(6, 1, 5, 1),
(7, 2, 1, 0),
(8, 2, 1, 0),
(9, 2, 1, 0),
(10, 2, 1, 0),
(11, 2, 1, 0),
(12, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `authortbl`
--

DROP TABLE IF EXISTS `authortbl`;
CREATE TABLE `authortbl` (
  `author_id` int(11) NOT NULL,
  `author_fname` varchar(255) NOT NULL,
  `author_lname` varchar(255) NOT NULL,
  `author_sname` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `authortbl`
--

TRUNCATE TABLE `authortbl`;
--
-- Dumping data for table `authortbl`
--

INSERT INTO `authortbl` (`author_id`, `author_fname`, `author_lname`, `author_sname`, `author_name`) VALUES
(1, 'Kendrick', 'Cosca', 'K. Cosca', 'Kendrick Cosca'),
(2, 'Dahyun', 'Kim', 'K. Dahyun', 'Dahyun Kim');

-- --------------------------------------------------------

--
-- Table structure for table `booktbl`
--

DROP TABLE IF EXISTS `booktbl`;
CREATE TABLE `booktbl` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_image` varchar(50) NOT NULL,
  `publish_date` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `booktbl`
--

TRUNCATE TABLE `booktbl`;
--
-- Dumping data for table `booktbl`
--

INSERT INTO `booktbl` (`book_id`, `book_name`, `book_image`, `publish_date`, `section_id`) VALUES
(1, 'Book 1', '1560439590.png', 1560268800, 2),
(2, 'Book 2', '', 1560268800, 2),
(3, 'Book 3', '', 1560268800, 1),
(4, 'Book 4', '', 1560268800, 1),
(5, 'Book 5', '', 1560268800, 2);

-- --------------------------------------------------------

--
-- Table structure for table `itembooktbl`
--

DROP TABLE IF EXISTS `itembooktbl`;
CREATE TABLE `itembooktbl` (
  `itembook_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `itembooktbl`
--

TRUNCATE TABLE `itembooktbl`;
--
-- Dumping data for table `itembooktbl`
--

INSERT INTO `itembooktbl` (`itembook_id`, `book_id`, `book_code`, `status`, `created_at`) VALUES
(1, 1, '001', 1, 1560244772),
(2, 1, '002', 1, 1560244772),
(3, 1, '003', 1, 1560244772),
(4, 1, '004', 1, 1560244772),
(5, 2, '005', 1, 1560246097),
(6, 2, '006', 1, 1560246097),
(7, 2, '007', 1, 1560246097),
(8, 2, '008', 1, 1560246097),
(9, 3, '001', 1, 1560246129),
(10, 3, '002', 1, 1560246129),
(11, 4, '003', 1, 1560246162),
(12, 4, '004', 1, 1560246162),
(13, 4, '005', 1, 1560246162),
(14, 4, '006', 1, 1560246162),
(15, 5, '009', 1, 1560246296),
(16, 1, '010', 1, 1560438232),
(17, 1, '011', 1, 1560439615);

-- --------------------------------------------------------

--
-- Table structure for table `penaltytbl`
--

DROP TABLE IF EXISTS `penaltytbl`;
CREATE TABLE `penaltytbl` (
  `penalty_id` int(11) NOT NULL,
  `penalty_date` int(11) NOT NULL,
  `penalty_amount` int(11) NOT NULL,
  `penalty_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
CREATE TABLE `sectiontbl` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_code` varchar(255) NOT NULL,
  `section_code_number` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `sectiontbl`
--

TRUNCATE TABLE `sectiontbl`;
--
-- Dumping data for table `sectiontbl`
--

INSERT INTO `sectiontbl` (`section_id`, `section_name`, `section_code`, `section_code_number`, `status`, `created_at`) VALUES
(1, 'None', 'NON', 7, 1, 1556900274),
(2, 'Science', 'SCI', 12, 1, 1556901623),
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
(30, 'Sample 18', 'KJC', 1, 0, 1556901623);

-- --------------------------------------------------------

--
-- Table structure for table `transactiontbl`
--

DROP TABLE IF EXISTS `transactiontbl`;
CREATE TABLE `transactiontbl` (
  `transaction_id` int(11) NOT NULL,
  `transaction_date` int(11) NOT NULL,
  `return_date` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `itembook_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `transactiontbl`
--

TRUNCATE TABLE `transactiontbl`;
-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

DROP TABLE IF EXISTS `usertbl`;
CREATE TABLE `usertbl` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `password_code` varchar(6) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `usertbl`
--

TRUNCATE TABLE `usertbl`;
--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`user_id`, `username`, `email`, `password`, `user_type`, `status`, `password_code`, `created_at`) VALUES
(1, 'admin', '', '55285e5a32519431b408de651aa7a47c41369b15', 1, 1, '', 1556697008),
(2, 'ken', '', '470bc578162732ac7f9d387d34c4af4ca6e1b6f7', 0, 1, '', 1556697008),
(3, 'trix', '', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', 0, 1, '', 1556697015),
(4, 'km', '', '7c688a7db4e8803973eddc22a33832015ff5c1e4', 0, 1, '', 1556697020),
(5, 'yuji', '', 'd9b713482988e8821ac416d1bb119b9123d945a0', 0, 1, '', 1556697023),
(6, 'admin2', '', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', 1, 1, '', 1556701548),
(7, 'admin3', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, '', 1556701658),
(8, 'admin4', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, '', 1556701789),
(9, 'admin5', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, '', 1556701892),
(10, 'admin6', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 1, '', 1556877050),
(12, 'bryan', 'bryanbernardo9828@gmail.com', 'fc6002e909d0dbf1c50f5db0e28af6470aceb2ca', 0, 1, 'Kg5QjJ', 1558143500),
(14, 'kendrick', 'kendric@a.c', '2eaab2fbb032b258b58fdaed26b83ca391ddcd0a', 0, 1, '', 1558169180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorbooktbl`
--
ALTER TABLE `authorbooktbl`
  ADD PRIMARY KEY (`authorbook_id`);

--
-- Indexes for table `authortbl`
--
ALTER TABLE `authortbl`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `booktbl`
--
ALTER TABLE `booktbl`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `itembooktbl`
--
ALTER TABLE `itembooktbl`
  ADD PRIMARY KEY (`itembook_id`);

--
-- Indexes for table `penaltytbl`
--
ALTER TABLE `penaltytbl`
  ADD PRIMARY KEY (`penalty_id`);

--
-- Indexes for table `sectiontbl`
--
ALTER TABLE `sectiontbl`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `transactiontbl`
--
ALTER TABLE `transactiontbl`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorbooktbl`
--
ALTER TABLE `authorbooktbl`
  MODIFY `authorbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `authortbl`
--
ALTER TABLE `authortbl`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booktbl`
--
ALTER TABLE `booktbl`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `itembooktbl`
--
ALTER TABLE `itembooktbl`
  MODIFY `itembook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penaltytbl`
--
ALTER TABLE `penaltytbl`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sectiontbl`
--
ALTER TABLE `sectiontbl`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transactiontbl`
--
ALTER TABLE `transactiontbl`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
