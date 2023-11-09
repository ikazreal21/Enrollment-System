-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 06:45 PM
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
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_applicationform`
--

INSERT INTO `tbl_applicationform` (`application_id`, `fullname`, `username`, `user_id`, `age`, `birthdate`, `occupation`, `email`, `contactnum`, `faname`, `faoccu`, `maname`, `maoccu`, `spaname`, `spaoccu`, `tertiary`, `tergraduate`, `secondary`, `secgraduate`, `elementary`, `elemgraduate`, `level`, `certification`, `valid_id`, `picture`, `birthcert`, `status`, `comments`) VALUES
(3, 'Joaquin Zaki Soriano', 'zaki', '1', 22, '2023-11-08', 'Programmer', 'joaquinzaki21@gmail.com', '09695191665', 'Zaki1', 'Programmer2', 'Zaki2', 'Programmer3', 'Zaki3', 'Programmer4', 'School1', '2001', 'School2', '2002', 'School3', '2003', 'N4', '../upload/certification/4weNyaUE/400008709_2676119205876294_740727664581397235_n.jpg', '../upload/valid_id/P4vTXGjT/400008709_2676119205876294_740727664581397235_n.jpg', '../upload/picture/2orNTOVO/wp8377232-pointing-wallpapers.jpg', '../upload/birthcert/1KiEP8rv/400008709_2676119205876294_740727664581397235_n.jpg', 'approve', '');

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
(1, 'zaki', 'zakisoriano21@gmail.com', '2001210809', 'student', 'active'),
(2, 'admin', 'admin@admin.com', 'adminadmin', 'admin', 'active'),
(3, 'joaquin', 'joaquinzaki21@gmail.com', '2001210809', 'student', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applicationform`
--
ALTER TABLE `tbl_applicationform`
  ADD PRIMARY KEY (`application_id`);

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
  MODIFY `application_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
