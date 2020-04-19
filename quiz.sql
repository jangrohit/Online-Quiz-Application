-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 11:05 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiztest`
--

CREATE TABLE IF NOT EXISTS `quiztest` (
  `QID` int(10) NOT NULL,
  `Question` varchar(200) NOT NULL,
  `Option1` varchar(200) NOT NULL,
  `Option2` varchar(200) NOT NULL,
  `Option3` varchar(200) NOT NULL,
  `Option4` varchar(200) NOT NULL,
  `Ans` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiztest`
--

INSERT INTO `quiztest` (`QID`, `Question`, `Option1`, `Option2`, `Option3`, `Option4`, `Ans`) VALUES
(1, 'What is the capital of india ?', 'Jaipur', 'Delhi', 'UP', 'ND', 'Delhi'),
(2, 'What is NAOH?', 'Basic', 'Acidic', 'Neutral', 'ND', 'Basic'),
(3, 'What is st of ch4?', 'Hexa', 'Tetra', 'Trig', 'ND', 'Tetra'),
(4, 'a==b', '1==2', '1==1', '1==3', 'ND', '1==1'),
(5, 'ACM', 'Ass for X', 'Assc for o', 'Ass for comp mach', 'ND', 'Ass for comp mach');

-- --------------------------------------------------------

--
-- Table structure for table `sign1`
--

CREATE TABLE IF NOT EXISTS `sign1` (
  `id` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign1`
--

INSERT INTO `sign1` (`id`, `user_name`, `password`) VALUES
(1, '205117031', 'abc@123'),
(2, '205117030', 'qwerty'),
(3, '205117018', 'poi'),
(4, '205117019', 'ABC@123'),
(5, '205117020', 'abc@123');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(10) NOT NULL,
  `rollno1` varchar(30) NOT NULL,
  `rollno2` varchar(30) NOT NULL,
  `score` int(20) NOT NULL DEFAULT '0',
  `count_last_ques` int(20) NOT NULL,
  `qualify` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `rollno1`, `rollno2`, `score`, `count_last_ques`, `qualify`) VALUES
(7, '205117031', '205117030', 15, 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiztest`
--
ALTER TABLE `quiztest`
  ADD UNIQUE KEY `QID` (`QID`);

--
-- Indexes for table `sign1`
--
ALTER TABLE `sign1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rollno1` (`rollno1`),
  ADD UNIQUE KEY `rollno2` (`rollno2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sign1`
--
ALTER TABLE `sign1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
