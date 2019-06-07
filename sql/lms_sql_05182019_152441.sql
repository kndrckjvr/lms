-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2019 at 09:24 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

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
-- Table structure for table `booktbl`
--

DROP TABLE IF EXISTS `booktbl`;
CREATE TABLE `booktbl` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `booktbl`
--

TRUNCATE TABLE `booktbl`;
--
-- Dumping data for table `booktbl`
--

INSERT INTO `booktbl` (`book_id`, `book_name`, `book_author`, `section_id`) VALUES
(1, 'Book 1', 'Author 1', 2),
(2, 'Book 2', 'Author 1', 2),
(3, 'Book 3', 'Author 1', 1);

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
(1, 1, '001', 1, 1556902221),
(2, 1, '002', 1, 1556902319),
(3, 1, '003', 1, 1556903885),
(4, 1, '004', 1, 1556910463),
(5, 2, '005', 1, 1558130091),
(6, 3, '001', 1, 1558130099);

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
(1, 'None', 'NON', 1, 1, 1556900274),
(2, 'Science', 'SCI', 5, 1, 1556901623);

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
--
-- Dumping data for table `transactiontbl`
--

INSERT INTO `transactiontbl` (`transaction_id`, `transaction_date`, `return_date`, `amount_paid`, `status`, `itembook_id`, `user_id`) VALUES
(1, 1557059780, 0, 0, 1, 2, 2),
(2, 1557475991, 0, 0, 2, 3, 3),
(3, 1557477811, 0, 0, 6, 4, 1),
(4, 1558076122, 0, 0, 6, 4, 1),
(5, 1558076128, 1558076128, 80, 3, 3, 3),
(6, 1558076133, 0, 0, 6, 2, 1),
(7, 1558109684, 0, 0, 1, 1, 1),
(8, 1558110180, 0, 0, 2, 1, 1),
(9, 1558110516, 1558110516, 0, 3, 1, 1),
(10, 1558110565, 0, 0, 1, 1, 3),
(11, 1558110572, 0, 0, 6, 1, 1);

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
(12, 'bryan', 'bryanbernardo9828@gmail.com', 'fc6002e909d0dbf1c50f5db0e28af6470aceb2ca', 0, 1, 'Kg5QjJ', 1558143500);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `booktbl`
--
ALTER TABLE `booktbl`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `itembooktbl`
--
ALTER TABLE `itembooktbl`
  MODIFY `itembook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sectiontbl`
--
ALTER TABLE `sectiontbl`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactiontbl`
--
ALTER TABLE `transactiontbl`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
