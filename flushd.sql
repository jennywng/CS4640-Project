-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 10:34 PM
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
  `bTitle` varchar(100) NOT NULL,
  `bDesc` varchar(300) NOT NULL,
  `bLoc` varchar(200) NOT NULL,
  `AvgRating` float DEFAULT '0',
  `GenderNeutral` tinyint(1) NOT NULL DEFAULT '0',
  `FemProducts` tinyint(1) NOT NULL DEFAULT '0',
  `PaperTowel` tinyint(1) NOT NULL DEFAULT '0',
  `AirDryer` tinyint(1) NOT NULL DEFAULT '0',
  `BreastFeed` tinyint(1) NOT NULL DEFAULT '0',
  `Diaper` tinyint(1) NOT NULL DEFAULT '0',
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bathrooms`
--

INSERT INTO `bathrooms` (`ID`, `bTitle`, `bDesc`, `bLoc`, `AvgRating`, `GenderNeutral`, `FemProducts`, `PaperTowel`, `AirDryer`, `BreastFeed`, `Diaper`, `img`) VALUES
(0, 'Olsson 1st Floor', 'wide spacious gender neutral bathroom but only one stall', '151 Engineer\'s Way, Charlottesville, VA 22903', 4, 0, 0, 1, 0, 0, 0, NULL),
(1, 'Physics Building 3rd Floor', 'Old, small and cramped stalls', '382 McCormick Rd, Charlottesville, VA 22904', 2.625, 0, 0, 1, 0, 0, 0, NULL),
(2, 'Rice Hall 1st Floor', 'Clean, fairly open space bathroom with 4 stalls.', '85 Engineer\'s Way, Charlottesville, VA 22903', 3, 0, 0, 1, 0, 0, 0, NULL),
(3, 'Newcomb Dining', 'Only accessible after swiping in, clean and new restroom stalls', '180 McCormick Rd, Charlottesville, VA 22903', 4, 0, 0, 1, 1, 0, 0, NULL),
(4, 'Clark 1st Floor', 'Nice bathroom but very busy when classes end.', '291 McCormick Rd, Charlottesville, VA 22903', 3, 0, 1, 0, 1, 0, 0, NULL),
(5, 'New Cabell 4th Floor', 'nice and clean bathroom with multiple stalls', '1605 Jefferson Park Ave, Charlottesville, VA 22903', 4, 0, 0, 0, 0, 0, 0, NULL),
(6, 'Bryant Hall 4th floor', 'Elegant and comfortable space, accessible in student lounge when you have interviews', '1815 Stadium Rd, Charlottesville, VA 22903', 0, 0, 0, 0, 0, 0, 0, NULL),
(7, 'Monroe Hall entrance', 'old and cramped stall, can\'t even turn around in the stall', 'Monroe Hall Charlottesville, VA 22903', 1, 0, 0, 1, 1, 0, 0, NULL),
(8, 'Clemons Library 2nd Floor', 'new, clean and very modern look with provided tampons/pads in girl\'s bathroom!', 'Newcomb Rd N, Charlottesville, VA 22904', 5, 0, 0, 0, 0, 0, 0, NULL),
(9, 'Argo Tea ', 'Nice and clean bathroom, the automatic hand wash sucks at sensing though.', '395 McCormick Rd, Charlottesville, VA 22904', 4, 0, 0, 1, 0, 0, 0, NULL),
(10, 'Chemsitry Building 1st Floor', 'Single person restrooms', '409 McCormick Rd, Charlottesville, VA 22904', 5, 1, 0, 1, 0, 0, 0, NULL);

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
  `rating` int(2) NOT NULL,
  `imgURL` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `uID`, `bID`, `title`, `rDesc`, `rating`, `imgURL`) VALUES
(1, 2, 1, 'Blegh', 'Very small and old. Decently clean. Also if you are on the upper floors, you must go downstairs to use this bathroom as its the only woman\'s bathroom in the building', 2, NULL),
(2, 2, 1, 'Inconvenient', 'Hate how its the only one in the whole building. Also old and yucky', 2, NULL),
(3, 1, 1, 'Ew', 'Hate it', 1, NULL),
(4, 2, 9, 'Great', 'Nice and clean, although the AC is on very strong and it can be cold. One of the automatic sinks is broken, it stays on for a long time even when you move your hands away.', 4, NULL),
(5, 2, 8, 'Great Bathroom', 'Recently renovated, its very clean and nice looking, if a bit dim lighting wise. Lots of stalls, there\'s never a line. ', 5, NULL),
(7, 5, 4, 'Gross and disgusting', 'I hate this bathroom', 2, NULL),
(8, 5, 0, 'Nice bathroom', 'Clean and a good size, has lots of stalls. Well-lit', 4, NULL),
(9, 5, 7, 'Cramped', 'I hate it', 1, NULL),
(10, 5, 2, 'Decent', 'Okay bathroom with good number of stalls, large space. But it has dim lighting, and can get dirty during the day.', 3, NULL),
(11, 2, 1, 'kgvkgv', 'kgvkugv', 3, NULL),
(12, 2, 10, 'Great', 'There are 2 of those single person bathrooms on the first floor of the new chemistry building (in the hallway going toward PLSB). They are very clean, and well lit.', 5, NULL),
(13, 2, 5, 't', 't', 4, 'uploads/2rsz_1rsz_peach.jpg'),
(14, 2, 0, 't', 'test', 4, 'uploads/2lance-asper-346206-unsplash-small.jpg'),
(15, 2, 4, 'test', 'test', 4, 'uploads/2nathan-anderson-109933-unsplash-small.jpg'),
(16, 2, 1, 'tet', 'teaaerh', 4, 'uploads/2lance-asper-346206-unsplash-small.jpg'),
(17, 2, 1, 'yest', 'testjartjsrtj', 4, 'uploads/2willian-justen-de-vasconcellos-685765-unsplash-small.jpg'),
(18, 2, 1, 'yest', 'testjartjsrtj', 4, 'uploads/2willian-justen-de-vasconcellos-685765-unsplash-small.jpg'),
(19, 2, 1, 'test', 'test', 1, 'uploads/2nathan-anderson-109933-unsplash-small.jpg');

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
  `profilepic` varchar(100) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `email`, `pwd`, `reg_date`, `profilepic`, `admin`) VALUES
(1, 'Amber', 'Liu', '', 'reamber.liu@gmail.com', '$2y$10$5DZmztcMUK8viAxtnHamauVfR6IDXMuKXThj5nVtPX2vMj2UW/eGa', '2019-04-03 22:49:13', 'uploads/1amber_profile.jpg', 0),
(2, 'Jenny', 'Wang', '', 'jenny.wang9812@gmail.com', '$2y$10$x.QQtK6w.LiU4DCVKdW7huPsdQkCcz4aedpnrwAhcufZuXw5ubWvW', '2019-04-04 20:10:31', 'uploads/2rsz_1rsz_peach.jpg', 0),
(3, 'wuxin', 'zeng', '', 'wz4up@virgnia.edu', '$2y$10$E3OLkB6TXMdl.KDeEMAR0eqZfRMPy.qoABqd5fh/enUwfG2S0X9VO', '2019-04-04 22:02:07', NULL, 0),
(4, 'wuxin', 'zeng', '', 'angelinezeng1997@gmail.com', '$2y$10$EoG7rzFFvd3I9G.H8tMvP.ribpMEdjZlfdayGwdhl77v2gdDu3ymC', '2019-04-04 22:03:10', NULL, 0),
(5, 'Vivien', 'Chen', '', 'vc2cw@virginia.edu', '$2y$10$0RD19DK1jPq0umpOdgeRCurlsSTC/qC2bdQyTorSK0MEsR52A/ry6', '2019-04-06 21:30:49', 'uploads/5caesar2.jpg', 0);

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
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
