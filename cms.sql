-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 09:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` varchar(10) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `fee` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `eligibility` varchar(30) NOT NULL,
  `c_img_path` varchar(50) NOT NULL,
  `Remark` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `fee`, `duration`, `eligibility`, `c_img_path`, `Remark`) VALUES
('1', 'html', '42000', '15days', '2nd year students only', '', 'no remarks'),
('4', 'ht', '500', '15days', '2nd year students only', '', 'no ');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` varchar(10) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `location` varchar(30) NOT NULL,
  `hod` varchar(15) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `dept_img_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `location`, `hod`, `remark`, `dept_img_path`) VALUES
('1', 'cse', 'old campus', 'Jyoti', 'no', 'cse.png'),
('2', 'it', 'old campus', 'Jyoti', 'test records', 'it.png'),
('3', 'civil', 'old campu', 'Jyoti', 'no remarks', 'civil.png');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` varchar(10) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `degree` varchar(10) NOT NULL,
  `salary` varchar(15) NOT NULL,
  `post` varchar(50) NOT NULL,
  `room` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remarks` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_name`, `l_name`, `gender`, `dob`, `address`, `degree`, `salary`, `post`, `room`, `phone`, `email`, `remarks`) VALUES
('01', 'ram', 'kumawat', '1996/2/16', 'jaipur', 'jaipur', 'Bachelor', '45000/-', 'professor', 'nb', 'Male', 'ram@gmail.com', 'test records');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `query` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `mobile_no`, `query`) VALUES
(7, 'niten', 'nitenkumawat@gmail.com', 2147483647, 'nihiwkod'),
(8, 'niten', 'nitenkumawat@gmail.com', 2147483647, 'bhgjhfjfj'),
(9, 'suryansh', 'sbakliwal9@gmail.com', 2147483647, 'hjfgkjg'),
(10, 'Ashwini Sharma', 'ash@gmil.com', 2147483647, 'Just to check either it is working or not.'),
(11, 'niten', 'nitenkumawat@gmail.com', 2147483647, 'gtuuyu'),
(12, 'niten', 'nitenkumawat@gmail.com', 2147483647, 'gtuuyu');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(10) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `address` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `c_name` varchar(10) NOT NULL,
  `remark` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `f_name`, `l_name`, `gender`, `dob`, `address`, `phone`, `email`, `branch`, `sem`, `c_name`, `remark`) VALUES
('1644', 'uhuhe', 'jhud', 'Male', '2002/10/18', 'jaipur', 2147483647, 'ram@gmail.com', 'cse', '3rd', 'btech', 'no remarks'),
('21cs117d', 'NITEN', 'kumawat', 'Male', '1995/2/5', 'jaipur', 2147483647, 'nitenkumawat@gmail.com', 'cse', '3rd', 'btech', 'no '),
('87', 'ram', 'LAL', 'Male', '1986/2/1', 'cscc', 2147483647, 'akshay.thadani@gmail.com', 'cse', '3rd', 'btech', 'sscs');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'niten kumawat', 'nitenkumawat@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
