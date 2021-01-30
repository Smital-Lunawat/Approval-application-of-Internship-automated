-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2020 at 08:26 PM
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
-- Table structure for table `stu_record`
--

CREATE TABLE `stu_record` (
  `id` int(11) NOT NULL,
  `Roll_no` varchar(12) NOT NULL,
  `Serial_no` int(11) NOT NULL,
  `Last_name` varchar(12) DEFAULT NULL,
  `First_name` varchar(25) DEFAULT NULL,
  `Middle_name` varchar(25) DEFAULT NULL,
  `Year` varchar(5) DEFAULT NULL,
  `Division` varchar(5) DEFAULT NULL,
  `Batch` varchar(5) DEFAULT NULL,
  `Password` int(11) NOT NULL DEFAULT 12345,
  `Phone_no` bigint(12) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `OTP` varchar(20) NOT NULL,
  `EL_1` varchar(20) NOT NULL,
  `EL_2` varchar(15) NOT NULL,
  `sem` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_record`
--

INSERT INTO `stu_record` (`id`, `Roll_no`, `Serial_no`, `Last_name`, `First_name`, `Middle_name`, `Year`, `Division`, `Batch`, `Password`, `Phone_no`, `emailid`, `OTP`, `EL_1`, `EL_2`, `sem`) VALUES
(1, '17IT1064', 8, 'Lamba', 'Muskan', '', '4', 'A4', 'A', 123, 123, 'muskaan2lamba@gmail.com', '', '', '', 7),
(2, '18IT2022', 8, 'Poddar', 'Avhi', '', '3', 'A4', 'A', 123, 123, 'jndxdn ', '', '', '', 5),
(3, '19CE1066', 1, 'Kale', 'Purvaja', '', '2', 'A4', 'A', 123, 123, 'ssxs', '', '', '', 3),
(5, '17IT1234', 8, 'Lamba', 'Muskan', '', '4', 'A4', 'A', 123, 123, 'muskaan2lamba@gmail.com', '', '', '', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stu_record`
--
ALTER TABLE `stu_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stu_record`
--
ALTER TABLE `stu_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
