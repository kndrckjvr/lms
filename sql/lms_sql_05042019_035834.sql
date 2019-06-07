-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 09:58 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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

CREATE TABLE `booktbl` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booktbl`
--

INSERT INTO `booktbl` (`book_id`, `book_name`, `book_author`, `section_id`) VALUES
(1, 'Book 1', 'Author 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `itembooktbl`
--

CREATE TABLE `itembooktbl` (
  `itembook_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itembooktbl`
--

INSERT INTO `itembooktbl` (`itembook_id`, `book_id`, `book_code`, `status`, `created_at`) VALUES
(1, 1, '001', 1, 1556902221),
(2, 1, '002', 2, 1556902319),
(3, 1, '003', 3, 1556903885),
(4, 1, '004', 4, 1556910463);

-- --------------------------------------------------------

--
-- Table structure for table `sectiontbl`
--

CREATE TABLE `sectiontbl` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectiontbl`
--

INSERT INTO `sectiontbl` (`section_id`, `section_name`, `section_code`, `status`, `created_at`) VALUES
(1, 'None', 'NON', 1, 1556900274),
(2, 'Science', 'SCI', 1, 1556901623);

-- --------------------------------------------------------

--
-- Table structure for table `transactiontbl`
--

CREATE TABLE `transactiontbl` (
  `transaction_id` int(11) NOT NULL,
  `transaction_date` int(11) NOT NULL,
  `return_date` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `paid_status` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`user_id`, `username`, `password`, `user_type`, `created_at`) VALUES
(1, 'admin', '55285e5a32519431b408de651aa7a47c41369b15', 1, 1556697008),
(2, 'ken', '470bc578162732ac7f9d387d34c4af4ca6e1b6f7', 0, 1556697008),
(3, 'trix', 'f21330a0d18cf65f6431d83c783aa0081fa8c339', 0, 1556697015),
(4, 'km', '7c688a7db4e8803973eddc22a33832015ff5c1e4', 0, 1556697020),
(5, 'yuji', 'd9b713482988e8821ac416d1bb119b9123d945a0', 0, 1556697023),
(6, 'admin2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1556701548),
(7, 'admin3', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1556701658),
(8, 'admin4', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1556701789),
(9, 'admin5', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1556701892),
(10, 'admin6', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 1556877050);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itembooktbl`
--
ALTER TABLE `itembooktbl`
  MODIFY `itembook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sectiontbl`
--
ALTER TABLE `sectiontbl`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactiontbl`
--
ALTER TABLE `transactiontbl`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
