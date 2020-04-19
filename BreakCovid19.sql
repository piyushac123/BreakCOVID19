-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2020 at 11:10 AM
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
-- Database: `BreakCovid19`
--
CREATE DATABASE IF NOT EXISTS `BreakCovid19` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `BreakCovid19`;

-- --------------------------------------------------------

--
-- Table structure for table `Hackathon`
--

DROP TABLE IF EXISTS `Hackathon`;
CREATE TABLE `Hackathon` (
  `group_id` int(10) NOT NULL,
  `registration_id` int(10) DEFAULT NULL,
  `Topic` varchar(40) DEFAULT NULL,
  `College` varchar(30) DEFAULT NULL,
  `Degree` varchar(30) DEFAULT NULL,
  `Branch` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Hackathon`
--

INSERT INTO `Hackathon` (`group_id`, `registration_id`, `Topic`, `College`, `Degree`, `Branch`) VALUES
(1, 8, 'Cleaning Mechanism', 'PICT', 'B.E.', 'CSE'),
(2, 10, 'Build Ventilator', 'PICT', 'B.E.', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `Registration`
--

DROP TABLE IF EXISTS `Registration`;
CREATE TABLE `Registration` (
  `registration_id` int(10) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Registration_date` date DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Flag` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Registration`
--

INSERT INTO `Registration` (`registration_id`, `Name`, `DOB`, `Registration_date`, `Phone`, `Email`, `Password`, `Flag`) VALUES
(1, 'piyush avinash chincholikar', '2020-04-06', '2020-04-13', '9404012207', 'piyush@gmail.com', 'piyush', 0),
(2, 'Piyush Avinash Chincholikar', '1998-10-05', '2020-04-13', '9404012207', 'piyush.chincholikar@gmail.com', 'piyush@123', 0),
(8, 'Parmita Avinash Chincholikar', '2003-09-16', '2020-04-14', '9421020877', 'p.a.chincholikar@gmail.com', 'parmita', 0),
(9, 'AVINASH TUKARAM CHINCHOLIKAR', '1965-02-20', '2020-04-17', '9371676572', 'avinashchincholikar@rediffmail', 'avi123', 0),
(10, 'Nirmala Avinash Chincholikar', '1970-07-30', '2020-04-18', '9421665566', 'nirmala.chincholikar@gmail.com', 'nirmala', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Volunteer`
--

DROP TABLE IF EXISTS `Volunteer`;
CREATE TABLE `Volunteer` (
  `volunteer_id` int(10) NOT NULL,
  `registration_id` int(10) DEFAULT NULL,
  `Service` varchar(20) DEFAULT NULL,
  `Organization` varchar(20) DEFAULT NULL,
  `Experience` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Volunteer`
--

INSERT INTO `Volunteer` (`volunteer_id`, `registration_id`, `Service`, `Organization`, `Experience`) VALUES
(5, 8, 'Cooking', 'ABCD', 2),
(7, 9, 'Money', '', 0),
(8, 2, 'Cooking', '', 0),
(9, 10, 'Cooking', 'Nirmala', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Hackathon`
--
ALTER TABLE `Hackathon`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `registered_user_2` (`registration_id`);

--
-- Indexes for table `Registration`
--
ALTER TABLE `Registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `Volunteer`
--
ALTER TABLE `Volunteer`
  ADD PRIMARY KEY (`volunteer_id`),
  ADD KEY `registered_user` (`registration_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Hackathon`
--
ALTER TABLE `Hackathon`
  MODIFY `group_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Registration`
--
ALTER TABLE `Registration`
  MODIFY `registration_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Volunteer`
--
ALTER TABLE `Volunteer`
  MODIFY `volunteer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Hackathon`
--
ALTER TABLE `Hackathon`
  ADD CONSTRAINT `registered_user_2` FOREIGN KEY (`registration_id`) REFERENCES `Registration` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Volunteer`
--
ALTER TABLE `Volunteer`
  ADD CONSTRAINT `registered_user` FOREIGN KEY (`registration_id`) REFERENCES `Registration` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
