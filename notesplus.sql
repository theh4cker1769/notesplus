-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 10:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notesplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `subjectpage`
--

CREATE TABLE `subjectpage` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `filename` text NOT NULL,
  `filedetails` text NOT NULL,
  `subjectname` text NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjectpage`
--

INSERT INTO `subjectpage` (`id`, `sid`, `filename`, `filedetails`, `subjectname`, `uploaded_on`) VALUES
(4, 1, '21_AIDS_Exp-No-1_DLCAL.pdf', 'Test', '', '2021-11-22 20:57:12'),
(5, 1, 'DSGT assignment 1.pdf', 'DSGT', '', '2021-11-22 20:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(110) NOT NULL,
  `description` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `description`) VALUES
(1, 'Maths', 'It is often shortened to maths or, in North America, math. Definitions of mathematics. Leonardo Fibonacci, the Italian mathematician who introduced the Hindu.'),
(2, 'Science', 'Science (from Latin scientia \'knowledge\') is a systematic enterprise that builds and organizes knowledge in the form of testable explanations'),
(3, 'Social Studies', 'In the United States education system, social studies is the integrated study of multiple fields of social science and the humanities, including history, geography, and political science'),
(5, 'English', 'Test Test Test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(2, 'Test 123', 'test123@gmail.com', '$2y$10$Sg0LPaMDPViU9NzOQQIo7OHRL2cVtg1mMjD2ZUAbp0LaO8CyKT98C', 'student'),
(3, 'Tony Stark', 'admin@gmail.com', '$2y$10$aS9NPvBK5jVt30jY45nlbOIK1fWDywYQC8D7OquTSNoUFDsYGnYvu', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subjectpage`
--
ALTER TABLE `subjectpage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjectpage`
--
ALTER TABLE `subjectpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subjectpage`
--
ALTER TABLE `subjectpage`
  ADD CONSTRAINT `subjectpage_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
