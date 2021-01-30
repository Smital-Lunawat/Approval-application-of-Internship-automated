-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2020 at 08:25 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `Industrial Supervisor` varchar(20) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Supervisor Email` varchar(320) NOT NULL,
  `Type` varchar(6) NOT NULL,
  `Organization Name` varchar(30) NOT NULL,
  `Organization Address` varchar(30) NOT NULL,
  `Faculty Coordinator` varchar(20) NOT NULL,
  `Department` varchar(10) NOT NULL,
  `Start date` date NOT NULL,
  `End date` date NOT NULL,
  `Experience related to your major area of study` varchar(50) NOT NULL,
  `Q_no_1` varchar(20) NOT NULL,
  `Q_no_2` varchar(20) NOT NULL,
  `Q_no_3` varchar(20) NOT NULL,
  `Q_no_4` varchar(20) NOT NULL,
  `Q_no_5` varchar(20) NOT NULL,
  `Q_no_6` varchar(20) NOT NULL,
  `Q_no_7` varchar(20) NOT NULL,
  `Q_no_8` varchar(20) NOT NULL,
  `Q_no_9` varchar(20) NOT NULL,
  `Q_no_10` varchar(20) NOT NULL,
  `Q_no_11` varchar(20) NOT NULL,
  `Q_no_12` varchar(20) NOT NULL,
  `Q_no_13` varchar(20) NOT NULL,
  `Q_no_14` varchar(20) NOT NULL,
  `Q_no_15` varchar(20) NOT NULL,
  `Considering your overall experience, how would you rate this int` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Industrial Supervisor`, `Title`, `Supervisor Email`, `Type`, `Organization Name`, `Organization Address`, `Faculty Coordinator`, `Department`, `Start date`, `End date`, `Experience related to your major area of study`, `Q_no_1`, `Q_no_2`, `Q_no_3`, `Q_no_4`, `Q_no_5`, `Q_no_6`, `Q_no_7`, `Q_no_8`, `Q_no_9`, `Q_no_10`, `Q_no_11`, `Q_no_12`, `Q_no_13`, `Q_no_14`, `Q_no_15`, `Considering your overall experience, how would you rate this int`) VALUES
(1, 'Muskan', 'Machine Learning', 'muskaan2lamba@gmail.com', 'Paid', 'tcs', '179  Wildrose Lane', 'hello', 'IT', '2020-07-28', '2020-07-26', 'Yes, to a large degree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Satisfactory'),
(5, 'muskan', 'Machine Learning', 'muskaan2lamba@gmail.com', 'Paid', 'aws', '179  Wildrose Lane', 'asas', 'IT', '2020-07-28', '2020-07-28', 'Yes, to a large degree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Strongly Agree', 'Satisfactory');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
