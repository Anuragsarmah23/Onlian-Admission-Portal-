-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2019 at 11:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oap`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `id` tinyint(4) NOT NULL,
  `stdID` varchar(50) NOT NULL,
  `hslcB` varchar(50) NOT NULL,
  `hslcI` varchar(100) NOT NULL,
  `hslcY` varchar(5) NOT NULL,
  `hslcP` decimal(5,2) NOT NULL,
  `fileHslcM` varchar(100) NOT NULL,
  `hsS` varchar(20) NOT NULL,
  `hsB` varchar(50) NOT NULL,
  `hsI` varchar(100) NOT NULL,
  `hsY` varchar(5) NOT NULL,
  `hsP` decimal(5,2) NOT NULL,
  `fileHsM` varchar(100) NOT NULL,
  `gD` varchar(191) DEFAULT NULL,
  `gM` varchar(100) DEFAULT NULL,
  `gU` varchar(100) DEFAULT NULL,
  `gI` varchar(100) DEFAULT NULL,
  `gY` varchar(5) DEFAULT NULL,
  `gP` decimal(5,2) DEFAULT NULL,
  `fileGM` varchar(100) DEFAULT NULL,
  `filePic` varchar(100) NOT NULL,
  `fileSign` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `stdID`, `hslcB`, `hslcI`, `hslcY`, `hslcP`, `fileHslcM`, `hsS`, `hsB`, `hsI`, `hsY`, `hsP`, `fileHsM`, `gD`, `gM`, `gU`, `gI`, `gY`, `gP`, `fileGM`, `filePic`, `fileSign`) VALUES
(5, 'SauravChoudhury1389', 'seba', 'ywca', '2012', '80.00', 'uploads/SauravChoudhury1389hslcMark.jpg', 'science', 'ahsec', 'arya', '2014', '74.00', 'uploads/SauravChoudhury1389hsMark.jpg', '', '', '', '', '', '0.00', '', 'uploads/SauravChoudhury1389pic.jpg', 'uploads/SauravChoudhury1389sign.jpg'),
(7, 'ankit4077', 'cbse', 'mvm', '2011', '70.00', 'uploads/ankit4077hslcMark.pdf', 'science', 'cbse', 'mvm', '2013', '72.00', 'uploads/ankit4077hsMark.doc', 'bsc', 'csit', 'cotton', 'cotton', '2017', '70.00', 'uploads/ankit4077gMark.jpeg', 'uploads/ankit4077pic.jpg', 'uploads/ankit4077sign.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `major` varchar(20) DEFAULT NULL,
  `stdID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `major`, `stdID`) VALUES
(4, 'bca', '', 'SauravChoudhury1389'),
(6, 'mca', '', 'ankit4077');

-- --------------------------------------------------------

--
-- Table structure for table `meritlist`
--

CREATE TABLE `meritlist` (
  `id` smallint(6) NOT NULL,
  `course` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `stdID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meritlist`
--

INSERT INTO `meritlist` (`id`, `course`, `major`, `stdID`) VALUES
(4, 'bca', '', 'SauravChoudhury1389'),
(6, 'mca', '', 'ankit4077');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `contact`, `address`, `dob`, `password`) VALUES
('ankit4077', 'ankit', 8921231091, 'hathigaon', '2000-04-01', 'ankit123'),
('SauravChoudhury1389', 'Saurav Choudhury', 9085324601, 'Paltan Bazar', '2000-04-01', 'saurav123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stdID` (`stdID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stdID` (`stdID`);

--
-- Indexes for table `meritlist`
--
ALTER TABLE `meritlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stdID` (`stdID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meritlist`
--
ALTER TABLE `meritlist`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic`
--
ALTER TABLE `academic`
  ADD CONSTRAINT `academic_ibfk_1` FOREIGN KEY (`stdID`) REFERENCES `student` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`stdID`) REFERENCES `student` (`id`);

--
-- Constraints for table `meritlist`
--
ALTER TABLE `meritlist`
  ADD CONSTRAINT `meritlist_ibfk_1` FOREIGN KEY (`stdID`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
