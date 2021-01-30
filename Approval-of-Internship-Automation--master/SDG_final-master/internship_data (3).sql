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
-- Table structure for table `internship_data`
--

CREATE TABLE `internship_data` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `year_new` varchar(10) NOT NULL,
  `gpa` float NOT NULL,
  `starting_date` date NOT NULL,
  `end_date` date NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `approval_status` varchar(20) NOT NULL,
  `completion_status` varchar(20) NOT NULL,
  `certificate` varchar(50) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `duration` int(20) NOT NULL,
  `letter` varchar(100) NOT NULL,
  `myfile` varchar(300) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internship_data`
--

INSERT INTO `internship_data` (`id`, `roll_no`, `topic`, `year_new`, `gpa`, `starting_date`, `end_date`, `company_name`, `approval_status`, `completion_status`, `certificate`, `feedback`, `duration`, `letter`, `myfile`, `comment`) VALUES
(1, '17IT1064', 'Machine Learning', 'TE', 4, '2020-07-28', '2020-07-26', 'tcs', 'Rejected', 'Rejected', 'certificates/17IT1064/RAIT_17IT1064_0001.pdf', 'Done', 1, 'no', '', 'This is due to a person called Smital'),
(2, '17IT1064', 'Machine Learning', 'SE', 5, '2020-07-28', '2020-08-31', 'aa', 'Pending', 'None', 'Not Uploaded Yet', 'Give Feedback', 1, 'Generated', '', 'No comment'),
(3, '17IT1064', 'Artificial Intelligence', 'SE', 5, '2020-07-28', '2020-08-31', 'aa', 'Pending', 'None', 'Not Uploaded Yet', 'Give Feedback', 1, 'Generated', '.uploads/17IT1064/RAIT_17IT1064_0001.pdf.', 'No comment'),
(4, '17IT1064', 'Machine Learning', 'SE', 5, '2020-07-28', '2020-08-31', 'Ramrao Adik', 'Pending', 'None', 'Not Uploaded Yet', 'Give Feedback', 1, 'Generated', 'uploads/17IT1064/RAIT_17IT1064_0002.pdf', 'No comment'),
(5, '17IT1064', 'Machine Learning', 'FE', 6, '2020-07-28', '2020-07-28', 'aws', 'Approved', 'Completed', 'certificates/17IT1064/RAIT_17IT1064_0002.pdf', 'Done', 1, 'Generated', '', 'Internship Completed!'),
(6, '17IT1064', 'Artificial Intelligence', 'FE', 5, '2020-07-28', '2020-08-31', 'jnjnjknj', 'Pending', 'None', 'Not Uploaded Yet', 'Give Feedback', 1, 'Generated', '', 'No comment'),
(7, '17IT1064', 'Artificial Intelligence', 'FE', 7, '2020-07-28', '2020-08-31', 'jhbjhbnj', 'Rejected', 'Rejected', 'Not Uploaded Yet', 'Give Feedback', 1, 'Generated', '', 'Problem in time duration'),
(8, '17IT1064', 'Machine Learning', 'TE', 5, '2020-07-28', '2020-09-30', 'jbhchbdcj', 'Approved', 'In-progress', 'Not Uploaded Yet', 'Give Feedback', 2, 'yes', 'uploads/17IT1064/RAIT_17IT1064_0003.pdf', 'Applied Successfully'),
(9, '17IT1064', 'Covid', 'SE', 4, '2020-07-30', '2020-09-27', 'qwerty', 'Pending', 'None', 'Not Uploaded Yet', 'Give Feedback', 2, 'no', 'uploads/17IT1064/RAIT_17IT1064_0004.pdf', 'No comment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internship_data`
--
ALTER TABLE `internship_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internship_data`
--
ALTER TABLE `internship_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
