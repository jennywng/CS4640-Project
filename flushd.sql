-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2019 at 12:50 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flushd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bathrooms`
--

CREATE TABLE `bathrooms` (
  `ID` int(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bathrooms`
--

INSERT INTO `bathrooms` (`ID`, `title`, `description`, `location`) VALUES
(0, 'Olsson 1st Floor', 'wide spacious gender neutral bathroom but only one stall', '151 Engineer\'s Way, Charlottesville, VA 22903'),
(1, 'Physics Building 3rd Floor', 'Old, small and cramped stalls', '382 McCormick Rd, Charlottesville, VA 22904'),
(2, 'Rice Hall 1st Floor', 'Clean, fairly open space bathroom with 4 stalls.', '85 Engineer\'s Way, Charlottesville, VA 22903'),
(3, 'Newcomb Dining', 'Only accessible after swiping in, clean and new restroom stalls', '180 McCormick Rd, Charlottesville, VA 22903'),
(4, 'Clark 1st Floor', 'Nice bathroom but very busy when classes end.', '291 McCormick Rd, Charlottesville, VA 22903'),
(5, 'New Cabell 4th Floor', 'nice and clean bathroom with multiple stalls', '1605 Jefferson Park Ave, Charlottesville, VA 22903'),
(6, 'Bryant Hall 4th floor', 'Elegant and comfortable space, accessible in student lounge when you have interviews', '1815 Stadium Rd, Charlottesville, VA 22903'),
(7, 'Monroe Hall entrance', 'old and cramped stall, can\'t even turn around in the stall', 'Monroe Hall Charlottesville, VA 22903'),
(8, 'Clemons Library 2nd Floor', 'new, clean and very modern look with provided tampons/pads in girl\'s bathroom!', 'Newcomb Rd N, Charlottesville, VA 22904'),
(9, 'Argo Tea ', 'Nice and clean bathroom, the automatic hand wash sucks at sensing though.', '395 McCormick Rd, Charlottesville, VA 22904');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(6) NOT NULL,
  `uID` int(6) NOT NULL,
  `bID` int(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `rDesc` varchar(300) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(6) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date the user registered',
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `email`, `pwd`, `reg_date`, `admin`) VALUES
(1, 'Amber', 'Liu', '', 'reamber.liu@gmail.com', '$2y$10$5DZmztcMUK8viAxtnHamauVfR6IDXMuKXThj5nVtPX2vMj2UW/eGa', '2019-04-03 22:49:13', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bathrooms`
--
ALTER TABLE `bathrooms`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
