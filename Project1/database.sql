-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2016 at 07:39 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `IDEmployee` int(15) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Position` varchar(15) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `Education` varchar(15) NOT NULL,
  `Birthdate` date NOT NULL,
  `Passport` varchar(15) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Access` varchar(15) NOT NULL,
  `Blood` varchar(15) NOT NULL,
  `Email` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`IDEmployee`, `Name`, `LastName`, `Position`, `Address`, `Telephone`, `Education`, `Birthdate`, `Passport`, `Gender`, `Status`, `Access`, `Blood`, `Email`) VALUES
(12, 'Mr.Nantipat Tul', 'qweqwe', 'Vice', 'à¸à¸£à¸°à¸šà¸µà¹ˆ\r\n81146', '0935804863', 'Master degree', '1955-03-03', '568546', ' Female', ' Single', 'User', 'AB', 'keymasterviriya');

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `IDCountry` int(5) NOT NULL,
  `CountryCode` varchar(4) NOT NULL,
  `Money` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`IDCountry`, `CountryCode`, `Money`) VALUES
(3, 'EUR', '40.000'),
(4, 'AUD', '10.000'),
(5, 'CHF', '15.000'),
(6, 'CAD', '20.000'),
(7, 'SEK', '25.000'),
(8, 'JPY', '30.000'),
(9, 'KRW', '35.000'),
(10, 'HKD', '40.000'),
(11, 'USD', '45.000'),
(12, 'GDP', '50.000'),
(13, 'HKD', '55.000'),
(14, 'TWD', '60.000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`IDEmployee`),
  ADD UNIQUE KEY `IDEmployee_2` (`IDEmployee`),
  ADD KEY `IDEmployee` (`IDEmployee`);

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`IDCountry`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `IDEmployee` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `IDCountry` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
