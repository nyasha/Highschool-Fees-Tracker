-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2019 at 10:25 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `choras`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_payments_tbl`
--

CREATE TABLE `all_payments_tbl` (
  `ID` int(11) NOT NULL,
  `STUDENT` int(11) NOT NULL,
  `AMOUNT_PAID` int(11) NOT NULL,
  `EXPIRE_DATE` date NOT NULL,
  `ALERT` tinyint(1) NOT NULL,
  `SESSION` varchar(100) NOT NULL,
  `CLASS` int(11) NOT NULL,
  `TERM` int(11) NOT NULL,
  `CREATION_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('rjruju6u442jmkl96jm5bo6c0kg4cqe6', '::1', 1567585446, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373538353434363b6c6f67696e5f69647c733a313a2233223b6c6f67696e5f656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b6c6f67696e5f6e616d657c733a393a224d722e2041646d696e223b6c6f67696e5f707269767c733a353a2261646d696e223b6c6f67696e5f636865636b7c733a363a22676f40796573223b636f6d706c657465647c733a32393a22416374696f6e20436f6d706c65746564205375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a393a22636f6d706c65746564223b733a333a226f6c64223b7d),
('kso0vjqmpn3skphg22h4kblhu8gl0uqa', '::1', 1567585446, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373538353434363b6c6f67696e5f69647c733a313a2233223b6c6f67696e5f656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b6c6f67696e5f6e616d657c733a393a224d722e2041646d696e223b6c6f67696e5f707269767c733a353a2261646d696e223b6c6f67696e5f636865636b7c733a363a22676f40796573223b);

-- --------------------------------------------------------

--
-- Table structure for table `class_tbl`
--

CREATE TABLE `class_tbl` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `FEES` int(11) NOT NULL,
  `SESSION` varchar(100) NOT NULL,
  `CREATION_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent_tbl`
--

CREATE TABLE `parent_tbl` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `PHONE` varchar(100) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `PASSWORD` varchar(150) NOT NULL,
  `CREATION_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `ID` int(11) NOT NULL,
  `STUDENT` int(11) NOT NULL,
  `TOTAL_AMOUNT` int(11) NOT NULL,
  `AMOUNT_PAID` int(11) NOT NULL,
  `AMOUNT_PENDING` int(11) NOT NULL,
  `SESSION` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings_tbl`
--

CREATE TABLE `settings_tbl` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `PHONE` varchar(100) NOT NULL,
  `SESSION` varchar(100) NOT NULL,
  `BANK` varchar(200) NOT NULL,
  `ACC_NAME` varchar(150) NOT NULL,
  `ACC_NUMBER` varchar(100) NOT NULL,
  `CREATION_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings_tbl`
--

INSERT INTO `settings_tbl` (`ID`, `NAME`, `ADDRESS`, `PHONE`, `SESSION`, `BANK`, `ACC_NAME`, `ACC_NUMBER`, `CREATION_DATE`) VALUES
(1, 'Choras Int. Schools', 'School Road', '08093883943', '2019-2020', 'GT BANK', 'Choras Int.', '009844384', '2019-08-25 17:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `PARENT` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `CLASS` int(11) NOT NULL,
  `SESSION` varchar(100) NOT NULL,
  `CREATION_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `term_tbl`
--

CREATE TABLE `term_tbl` (
  `ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `FEES` int(11) NOT NULL,
  `SESSION` varchar(100) NOT NULL,
  `CREATION_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `PRIV` varchar(100) NOT NULL,
  `CREATION_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`ID`, `NAME`, `EMAIL`, `PASSWORD`, `PRIV`, `CREATION_DATE`) VALUES
(3, 'Mr. Admin', 'admin@admin.com', '236b214a419b4f44502c8c94f9675c4040906a52', 'admin', '2019-09-02 13:36:20'),
(4, 'Mr. Standard', 'standard@admin.com', 'f525724c4aaaa913cca4c04833d3de48bfc73cb3', 'standard', '2019-09-02 13:36:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_payments_tbl`
--
ALTER TABLE `all_payments_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `class_tbl`
--
ALTER TABLE `class_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `parent_tbl`
--
ALTER TABLE `parent_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `settings_tbl`
--
ALTER TABLE `settings_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `term_tbl`
--
ALTER TABLE `term_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_payments_tbl`
--
ALTER TABLE `all_payments_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_tbl`
--
ALTER TABLE `class_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_tbl`
--
ALTER TABLE `parent_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings_tbl`
--
ALTER TABLE `settings_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term_tbl`
--
ALTER TABLE `term_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
