-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 10:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repairing_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `pass`) VALUES
('yuktima@gmail.com', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `itemId` int(11) NOT NULL,
  `ono` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user`, `pid`, `quantity`, `itemId`, `ono`, `status`) VALUES
('yuktima05@gmail.com', 5, 1, 33, 19, 'true_19'),
('yuktima05@gmail.com', 7, 1, 32, 18, 'true_18');

-- --------------------------------------------------------

--
-- Table structure for table `newprob`
--

CREATE TABLE `newprob` (
  `pid` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ono` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `oDate` datetime DEFAULT NULL,
  `pDate` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ono`, `user`, `oDate`, `pDate`, `status`, `price`) VALUES
(18, 'yuktima05@gmail.com', '2020-06-14 09:57:00', NULL, 'Rejected', 820),
(19, 'yuktima05@gmail.com', '2020-06-14 10:14:43', '2020-06-25 00:00:00', 'paid', 1220);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `ono` int(11) DEFAULT NULL,
  `invoice` varchar(50) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `mode` varchar(50) DEFAULT NULL,
  `transactionID` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`ono`, `invoice`, `amount`, `mode`, `transactionID`, `date`) VALUES
(19, '#061419', 1240, 'UPI', 'sbi2376986', '2020-06-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `pid` int(11) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`pid`, `company`) VALUES
(1, 'Samsung'),
(1, 'Apple'),
(2, 'Apple'),
(5, 'Apple'),
(6, 'OnePlus'),
(7, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `problems_id` int(11) NOT NULL,
  `problem_name` text NOT NULL,
  `price` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`problems_id`, `problem_name`, `price`, `date`) VALUES
(1, 'Your mobile phone running slowly', 100, '2020-05-21 03:07:55'),
(2, 'Bad Battery Life', 300, '2020-05-21 03:08:08'),
(5, 'notification bar problem', 1200, '2020-05-23 15:20:02'),
(6, 'lagging while playing PUBG', 339, '2020-05-23 15:20:12'),
(7, 'Broken Screen', 800, '2020-06-14 04:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `pin` int(10) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `mail`, `password`, `pin`, `mobile`, `city`, `state`, `address`) VALUES
('Yuktima Chaurasiya', 'yuktima05@gmail.com', '123456', 211011, '7565942694', 'ALLAHABAD', 'UTTAR PRADESH', '697/1A Near Calcutta TentHouse, Rajrooppur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`itemId`),
  ADD UNIQUE KEY `user_2` (`user`,`pid`,`status`),
  ADD KEY `ono` (`ono`);

--
-- Indexes for table `newprob`
--
ALTER TABLE `newprob`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ono`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`invoice`),
  ADD KEY `ono` (`ono`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`problems_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `newprob`
--
ALTER TABLE `newprob`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `problems_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
