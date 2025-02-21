-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 11:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agroculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogdata`
--

CREATE TABLE `blogdata` (
  `blogId` int(10) NOT NULL,
  `blogUser` varchar(256) NOT NULL,
  `blogTitle` varchar(256) NOT NULL,
  `blogContent` longtext NOT NULL,
  `blogTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogdata`
--

INSERT INTO `blogdata` (`blogId`, `blogUser`, `blogTitle`, `blogContent`, `blogTime`, `likes`) VALUES
(20, 'Thejaswi', 'First Blog', '<p>Amazing Website</p>\r\n', '2025-02-21 16:53:15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `blogfeedback`
--

CREATE TABLE `blogfeedback` (
  `blogId` int(10) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `commentUser` varchar(256) NOT NULL,
  `commentPic` varchar(256) NOT NULL DEFAULT 'profile0.png',
  `commentTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogfeedback`
--

INSERT INTO `blogfeedback` (`blogId`, `comment`, `commentUser`, `commentPic`, `commentTime`) VALUES
(20, 'True', 'Geralt', 'profile0.png', '2025-02-21 20:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `bid` int(100) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `busername` varchar(100) NOT NULL,
  `bpassword` varchar(100) NOT NULL,
  `bhash` varchar(100) NOT NULL,
  `bemail` varchar(100) NOT NULL,
  `bmobile` varchar(100) NOT NULL,
  `baddress` text NOT NULL,
  `bactive` int(100) NOT NULL DEFAULT 0,
  `picExt` varchar(255) NOT NULL DEFAULT 'png',
  `picStatus` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bid`, `bname`, `busername`, `bpassword`, `bhash`, `bemail`, `bmobile`, `baddress`, `bactive`, `picExt`, `picStatus`) VALUES
(5, 'Test', 'Test', '$2y$10$8vnkAgW0bmNbNKZLebmIhO2XxXAovj2BzL1EfAVAxwxP3DtcDAXbK', '430c3626b879b4005d41b8a46172e0c0', 'notvoid83@gmail.com', '1234567890', '123', 1, 'png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `fid` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fusername` varchar(255) NOT NULL,
  `fpassword` varchar(255) NOT NULL,
  `fhash` varchar(255) NOT NULL,
  `femail` varchar(255) NOT NULL,
  `fmobile` varchar(255) NOT NULL,
  `faddress` text NOT NULL,
  `factive` int(255) NOT NULL DEFAULT 0,
  `picExt` varchar(255) NOT NULL DEFAULT 'png',
  `picStatus` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`fid`, `fname`, `fusername`, `fpassword`, `fhash`, `femail`, `fmobile`, `faddress`, `factive`, `picExt`, `picStatus`) VALUES
(1, 'Thejaswi', 'Thejaswi', '$2y$10$OOhW4EEy7TjtaonT.AzkreQMOzwER.lrcD.vrQhx2BqI0ctWFR/qu', '069d3bb002acd8d7dd095917f9efe4cb', 'thejaswi4uns@gmail.com', '9731859761', '111', 1, 'png', 0),
(5, 'void', 'void', '$2y$10$LsUKvuUhxDhbC2yudEcQ2uapCdTuS8mNO48TFXygg4YWObsEGfJN.', 'bc6dc48b743dc5d013b1abaebd2faed2', 'notvoid83@gmail.com', '1234567890', '123', 1, 'png', 0),
(6, 'Geralt', 'Geralt', '$2y$10$a/6as/osodojJfoQaHFy3OL03lzNXq4DBwhu1JLt4I3PEiCYCp.je', 'a1d0c6e83f027327d8461063f4ac58a6', 'testmail@gmail.com', '1234567890', '123', 1, 'png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fproduct`
--

CREATE TABLE `fproduct` (
  `fid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `pcat` varchar(255) NOT NULL,
  `pinfo` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `pimage` varchar(255) NOT NULL DEFAULT 'blank.png',
  `picStatus` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fproduct`
--

INSERT INTO `fproduct` (`fid`, `pid`, `product`, `pcat`, `pinfo`, `price`, `pimage`, `picStatus`) VALUES
(1, 31, 'Apple', 'Fruit', '<p>Fresh Apple</p>\r\n', 200, 'Apple.jpg', 1),
(1, 32, 'Banana', 'Fruit', '<p>Banana</p>\r\n', 50, 'Banana1.jpg', 1),
(1, 33, 'Okra', 'Vegetable', '<p>Fun Fact: In India is popular by the name &quot;Lady&#39;s Finger.&quot;</p>\r\n', 60, 'Okra1.jpg', 1),
(1, 35, 'Rice', 'Grains', '<p>Rice</p>\r\n', 60, 'Rice1.jpg', 1),
(6, 37, 'Mango', 'Fruit', '<p>Mango</p>\r\n', 60, 'Mango6.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `likedata`
--

CREATE TABLE `likedata` (
  `blogId` int(10) NOT NULL,
  `blogUserId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `likedata`
--

INSERT INTO `likedata` (`blogId`, `blogUserId`) VALUES
(20, 1),
(20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `bid` int(10) NOT NULL,
  `pid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`bid`, `pid`) VALUES
(5, 31),
(6, 31);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `pid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`pid`, `name`, `rating`, `comment`) VALUES
(31, 'void', 10, 'Good'),
(31, 'Test', 9, 'Good Product');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(10) NOT NULL,
  `bid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `bid`, `pid`, `name`, `city`, `mobile`, `email`, `pincode`, `addr`) VALUES
(2, 5, 31, 'void', 'Bangalore', '01234567890', 'notvoid83@gmail.com', '560061', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogdata`
--
ALTER TABLE `blogdata`
  ADD PRIMARY KEY (`blogId`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `bid` (`bid`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `fid` (`fid`);

--
-- Indexes for table `fproduct`
--
ALTER TABLE `fproduct`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `likedata`
--
ALTER TABLE `likedata`
  ADD KEY `blogId` (`blogId`),
  ADD KEY `blogUserId` (`blogUserId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogdata`
--
ALTER TABLE `blogdata`
  MODIFY `blogId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `fid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fproduct`
--
ALTER TABLE `fproduct`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likedata`
--
ALTER TABLE `likedata`
  ADD CONSTRAINT `likedata_ibfk_1` FOREIGN KEY (`blogId`) REFERENCES `blogdata` (`blogId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
