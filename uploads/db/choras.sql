-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 11:19 AM
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
('n545a9803bsk726p1jbvahi62rajquiv', '::1', 1567066026, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373036363032363b),
('sgkh7uqbs0d4ldrd51ksni0noc7litap', '::1', 1567067361, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373036373336313b),
('04u8vdkqh14tv7llogn9gtg41n3k7dde', '::1', 1567067677, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373036373637373b),
('bkts5ilejah0op3m1d3l6t7cs024j66t', '::1', 1567068080, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373036383038303b),
('jpocdstqd5guca3l252a2baj15bqunn1', '::1', 1567068402, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373036383430323b),
('al7aastbg15dm4r886uqa65sq28nhbi4', '::1', 1567069018, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373036393031383b),
('mvb35gdvefhh4posm5dijh1s716slvq8', '::1', 1567069352, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373036393335323b),
('fpr6sij8gfq3caa5se3ss1ijhkndtjg7', '::1', 1567069903, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373036393930333b),
('6v64afg329plv32u6d4vbbi04b3f85oh', '::1', 1567070126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536373036393930333b);

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

--
-- Dumping data for table `class_tbl`
--

INSERT INTO `class_tbl` (`ID`, `NAME`, `FEES`, `SESSION`, `CREATION_DATE`) VALUES
(1, 'JSS 1', 70000, '2019-2020', '2019-08-29 08:37:12'),
(2, 'JSS 2', 75000, '2019-2020', '2019-08-29 08:37:33');

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

--
-- Dumping data for table `parent_tbl`
--

INSERT INTO `parent_tbl` (`ID`, `NAME`, `PHONE`, `ADDRESS`, `EMAIL`, `PASSWORD`, `CREATION_DATE`) VALUES
(1, 'Denis John', '08161535219', 'F.H.E', 'denis@email.com', '6cee6ee2a6375d9eff5cf60659918ba2d986212a', '2019-08-27 21:29:02');

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
  `ACC_NAME` varchar(150) NOT NULL,
  `ACC_NUMBER` varchar(100) NOT NULL,
  `CREATION_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings_tbl`
--

INSERT INTO `settings_tbl` (`ID`, `NAME`, `ADDRESS`, `PHONE`, `SESSION`, `ACC_NAME`, `ACC_NUMBER`, `CREATION_DATE`) VALUES
(1, 'Choras Int. Schools', 'School Road', '08093883943', '2019-2020', 'Choras Int.', '009844384', '2019-08-25 17:04:27');

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

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `PARENT`, `NAME`, `CLASS`, `SESSION`, `CREATION_DATE`) VALUES
(1, 1, 'Valentine Paul', 1, '2019-2020', '2019-08-28 13:51:20');

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

--
-- Dumping data for table `term_tbl`
--

INSERT INTO `term_tbl` (`ID`, `CLASS_ID`, `NAME`, `FEES`, `SESSION`, `CREATION_DATE`) VALUES
(1, 1, 'First Term', 20000, '2019-2020', '2019-08-29 08:45:25'),
(2, 2, 'First Term', 25000, '2019-2020', '2019-08-29 08:45:38');

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
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `class_tbl`
--
ALTER TABLE `class_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parent_tbl`
--
ALTER TABLE `parent_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings_tbl`
--
ALTER TABLE `settings_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `term_tbl`
--
ALTER TABLE `term_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
