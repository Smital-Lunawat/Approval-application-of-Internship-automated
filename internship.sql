-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2020 at 04:38 PM
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


-- --------------------------------------------------------

--
-- Table structure for table `internship_data`
--

CREATE TABLE `internship_data` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `year_new` int(10) NOT NULL,
  `starting_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `approval_status` varchar(20) NOT NULL,
  `completion_status` varchar(20) NOT NULL,
  `certificate` varchar(50) NOT NULL,
  `duration` int(20) NOT NULL,
  `myfile` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internship_data`
--

INSERT INTO `internship_data` (`id`, `roll_no`, `topic`, `year_new`, `starting_date`, `end_date`, `approval_status`, `completion_status`, `certificate`, `duration`, `myfile`, `comment`) VALUES
(1, '17IT1064', 'AI', 2018, '2019-02-13', '2019-04-13', 'Approved', 'Completed', 'Not Uploaded Yet', 3, 'Technical Apttiude Test (2).pdf', ''),
(2, '17IT1064', 'CS', 2017, '2017-02-13', '2017-04-13', 'Approved', 'in-progress', 'Not Uploaded Yet', 1, 'Technical Aptitude Test (1).pdf', ''),
(4, '17IT1064', 'ML', 2019, '2019-02-13', '2019-04-13', 'Approved', 'in-progress', 'Not Uploaded Yet', 2, 'Technical Aptitude Test (1).pdf', 'Applied Successfully'),
(5, '17IT1064', 'hindi', 2019, '2019-02-13', '2019-04-13', 'Rejected', 'in-progress', 'Not Uploaded Yet', 2, '', 'Bad internship'),
(6, '17IT1064', 'Covid', 2020, '2020-02-13', '2020-04-13', 'Rejected', 'in-progress', 'Not Uploaded Yet', 5, '', 'Problem in time duration'),
(8, '17IT1234', 'ML', 2020, '2020-02-13', '2020-04-13', 'Approved', 'in-progress', 'Not Uploaded Yet', 2, '', 'Applied Successfully'),
(9, '17IT1234', 'AI', 2020, '2020-02-13', '2020-04-13', 'Rejected', 'in-progress', 'Not Uploaded Yet', 2, '', 'Problem in time duration'),
(10, '16IT1064', 'ML', 2020, '2020-02-13', '2020-04-13', 'Approved', 'in-progress', 'Not Uploaded Yet', 2, '', 'Applied Successfully');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `roll_no` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`roll_no`, `username`, `pass`, `contact_no`) VALUES
('16IT1064', 'muskan', '123', 123),
('17IT1064', 'muskan', '123', 9131),
('17IT1070', 'Lamba', '235', 876),
('17IT1232', 'muskan', '123', 212656),
('17IT1234', 'muskan', '123', 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internship_data`
--
ALTER TABLE `internship_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`roll_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internship_data`
--
ALTER TABLE `internship_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
