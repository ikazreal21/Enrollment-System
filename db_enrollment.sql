-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 02:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_applicationform`
--

INSERT INTO `tbl_applicationform` (`application_id`, `student_id`, `fullname`, `username`, `user_id`, `age`, `birthdate`, `occupation`, `email`, `contactnum`, `faname`, `faoccu`, `maname`, `maoccu`, `spaname`, `spaoccu`, `tertiary`, `tergraduate`, `secondary`, `secgraduate`, `elementary`, `elemgraduate`, `level`, `certification`, `valid_id`, `picture`, `birthcert`, `status`, `comments`, `payment_image`, `payment`, `schedule`, `date_enrolled`) VALUES
(7, 'IVQE2CV7', 'Joaquin Zaki Soriano', 'zaki', '8', 21, '2024-04-23', 'Developer', 'joaquinzaki21@gmail.com', '09695191665', 'Developer', 'Developer', 'Developer', 'Developer', 'Developer', 'Developer', 'Developer', '2001', 'Developer', '2002', 'Developer', '2003', 'N4', 'https://res.cloudinary.com/dmagk9gck/image/upload/v1713803582/uploads/enrollment/phpF23C_fqvmty.jpg', 'https://res.cloudinary.com/dmagk9gck/image/upload/v1713803585/uploads/enrollment/phpF24C_yjc0ox.jpg', 'https://res.cloudinary.com/dmagk9gck/image/upload/v1713803588/uploads/enrollment/phpF24E_p80iq9.jpg', 'https://res.cloudinary.com/dmagk9gck/image/upload/v1713803592/uploads/enrollment/phpF24D_nrbma9.jpg', 'approve', '', 'https://res.cloudinary.com/dmagk9gck/image/upload/v1713804100/uploads/enrollment/phpDB55_etrytv.jpg', 'paid', 'AM', '2024-04-22'),
(8, 'Z7V7XJTA', 'Joaquin Zaki B. Soriano', 'zaki21', '10', 21, '2024-04-23', 'Developer', 'joaquinzaki21@gmail.com', '09695191665', 'Developer', 'Developer', 'Developer', 'Developer', 'Developer', 'Developer', 'Developer', '2001', 'Developer', '2003', 'Developer', '2002', 'N4', 'https://res.cloudinary.com/dmagk9gck/image/upload/v1713808132/uploads/enrollment/php6099_sp8z00.jpg', 'https://res.cloudinary.com/dmagk9gck/image/upload/v1713808135/uploads/enrollment/php609A_qok3xr.jpg', 'https://res.cloudinary.com/dmagk9gck/image/upload/v1713808138/uploads/enrollment/php60AB_fwxa6s.jpg', 'https://res.cloudinary.com/dmagk9gck/image/upload/v1713808141/uploads/enrollment/php609B_l4zlxz.jpg', 'approve', '', 'https://res.cloudinary.com/dmagk9gck/image/upload/v1713828161/uploads/enrollment/phpFAAF_d4enhb.jpg', 'paid', 'AM', '2024-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approvedstudent`
--

CREATE TABLE `tbl_approvedstudent` (
  `id` int(255) NOT NULL,
  `studentID` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `application_id` varchar(255) NOT NULL,
  `competency` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_approvedstudent`
--

INSERT INTO `tbl_approvedstudent` (`id`, `studentID`, `user_id`, `status`, `application_id`, `competency`) VALUES
(1, 'IVQE2CV7', '8', 'approve\r\n', '7', 'true'),
(7, 'X8I7IHYG', '10', 'approve', '8', 'true');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `first_name`, `last_name`, `email`, `contactnum`, `user_id`) VALUES
(2, 'Test', 'Test1', '09695191665', 'test@test.com', '7'),
(3, 'Joaquin Zaki', 'Soriano', 'joaquinzaki21@gmail.com', '09695191665', '9');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`user_id`, `username`, `email`, `password`, `roles`, `status`) VALUES
(2, 'admin', 'admin@admin.com', 'adminadmin', 'admin', 'active'),
(8, 'zaki', 'joaquinzaki21@gmail.com', '2001210809', 'student', 'active'),
(9, 'admin2', 'joaquinzaki21@gmail.com', 'adminadmin', 'teacher', 'active'),
(10, 'zaki21', 'joaquinzaki21@gmail.com', '2001210809', 'student', 'active'),
(11, 'admin3', 'zaki@gmail.com', 'adminadmin', 'student', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applicationform`
--
ALTER TABLE `tbl_applicationform`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `tbl_approvedstudent`
--
ALTER TABLE `tbl_approvedstudent`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `application_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_approvedstudent`
--
ALTER TABLE `tbl_approvedstudent`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `faculty_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
