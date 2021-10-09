-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 09:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
  `subjectname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjectpage`
--

INSERT INTO `subjectpage` (`id`, `sid`, `filename`, `subjectname`) VALUES
(1, 1, 'Seema Barhate posted a new material: fourier series', 'maths'),
(2, 1, 'File name which you are uploading', 'maths'),
(3, 2, 'File name which you are uploading', 'science');

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
(4, 'English', 'English is a West Germanic language of the Indo-European language family, originally spoken by the inhabitants of early medieval England.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'reddy.har2002@gmail.com', '123456789');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
