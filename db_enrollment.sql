-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 12:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicationform`
--

CREATE TABLE `tbl_applicationform` (
  `application_id` int(255) NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `birthdate` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactnum` varchar(255) DEFAULT NULL,
  `faname` varchar(255) DEFAULT NULL,
  `faoccu` varchar(255) DEFAULT NULL,
  `maname` varchar(255) DEFAULT NULL,
  `maoccu` varchar(255) DEFAULT NULL,
  `spaname` varchar(255) DEFAULT NULL,
  `spaoccu` varchar(255) DEFAULT NULL,
  `tertiary` varchar(255) DEFAULT NULL,
  `tergraduate` varchar(255) DEFAULT NULL,
  `secondary` varchar(255) DEFAULT NULL,
  `secgraduate` varchar(255) DEFAULT NULL,
  `elementary` varchar(255) DEFAULT NULL,
  `elemgraduate` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `certification` varchar(255) DEFAULT NULL,
  `valid_id` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `birthcert` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `payment_image` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `date_enrolled` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `faculty_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactnum` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `first_name`, `last_name`, `email`, `contactnum`, `user_id`) VALUES
(2, 'Test', 'Test1', '09695191665', 'test@test.com', '7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `user_id` int(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`user_id`, `username`, `email`, `password`, `roles`, `status`) VALUES
(2, 'admin', 'admin@admin.com', 'adminadmin', 'admin', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applicationform`
--
ALTER TABLE `tbl_applicationform`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_applicationform`
--
ALTER TABLE `tbl_applicationform`
  MODIFY `application_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `faculty_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
