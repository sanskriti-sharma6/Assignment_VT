-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 11:15 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `attendance_system`
-- Table structure for table `attendance_system`
CREATE TABLE `attendance_report` (
  `att_id` int(20) NOT NULL,
  `roll_no` int(20) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Dumping data for table `attendance`
INSERT INTO `attendance_report` (`att_id`, `roll_no`, `date`, `status`) VALUES
(1, 1, '2022-03-01', 1),
(2, 2, '2022-03-01', 1),
(3, 3, '2022-03-01', 1),
(4, 7, '2022-03-01', 0),
(5, 10, '2022-03-01', 0),
(6, 4, '2022-03-01', 0),
(7, 5, '2022-03-01', 0),
(8, 6, '2022-03-01', 1),
(9, 8, '2022-03-01', 1),
(10, 9, '2022-03-01', 1),
(11, 12, '2022-03-01', 1);
-- Table structure for table `faculty`
CREATE TABLE `faculty` (
  `faculty_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Dumping data for table `faculty`
INSERT INTO `faculty` (`faculty_id`, `name`, `email`, `password`) VALUES
(1, 'Sanskriti Sharma', 'sans@gmail.com', 'qwerty123');
-- Table structure for table `student`
CREATE TABLE `student` (
  `roll_no` int(20) NOT NULL,
  `full_name` text NOT NULL,
  `division` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Dumping data for table `student`
INSERT INTO `student` (`roll_no`, `full_name`, `division`) VALUES
(1, 'Sanskriti', 'A'),
(2, 'Rathin', 'A'),
(3, 'Nithya', 'A'),
(4, 'Rashi', 'B'),
(5, 'Mansi', 'B'),
(6, 'Aditi', 'B'),
(7, 'Akshita', 'A'),
(8, 'Madhura', 'B'),
(9, 'Priyansha', 'B'),
(10, 'Jigyasa', 'A'),
(12, 'Veena', 'B');
-- Indexes for dumped tables
-- Indexes for table `attendance_report`
ALTER TABLE `attendance_report`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `roll_no` (`roll_no`);
-- Indexes for table `faculty`
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);
-- Indexes for table `student`
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll_no`);
-- AUTO_INCREMENT for dumped tables
-- AUTO_INCREMENT for table `attendance_report`
ALTER TABLE `attendance_report`
  MODIFY `att_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
-- AUTO_INCREMENT for table `faculty`
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
-- AUTO_INCREMENT for table `student`
ALTER TABLE `student`
  MODIFY `roll_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
-- Constraints for dumped tables
-- Constraints for table `attendance_report`
ALTER TABLE `attendance_report`
  ADD CONSTRAINT `roll_no` FOREIGN KEY (`roll_no`) REFERENCES `student` (`roll_no`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
