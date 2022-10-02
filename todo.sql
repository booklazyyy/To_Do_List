-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 01:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo_list`
--

CREATE TABLE `todo_list` (
  `todo_id` int(11) NOT NULL,
  `todo_details` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `todo_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todo_list`
--

INSERT INTO `todo_list` (`todo_id`, `todo_details`, `user_id`, `todo_date`) VALUES
(158, 'Wake up', 42, '2022-10-03 06:13:24'),
(159, 'Have breakfast', 42, '2022-10-03 06:13:44'),
(160, 'Play football', 42, '2022-10-03 06:15:42'),
(161, 'Sleep', 42, '2022-10-03 06:21:31'),
(162, 'Watch movies', 42, '2022-10-03 06:21:51'),
(163, 'นอน', 42, '2022-10-03 06:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`) VALUES
(1, 'methapon.tia@rmutto.ac.th', '1234'),
(41, 'Tianmanee@gmail.com', '123456'),
(42, 'school@gmail.com', '012');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`todo_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
