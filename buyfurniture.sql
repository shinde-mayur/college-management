-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2018 at 02:21 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buyfurniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `furniture_data`
--

CREATE TABLE `furniture_data` (
  `item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `item_price` text NOT NULL,
  `item_rent` text NOT NULL,
  `item_desc` text NOT NULL,
  `item_manu` text NOT NULL,
  `item_warr` text NOT NULL,
  `item_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture_data`
--

INSERT INTO `furniture_data` (`item_id`, `item_name`, `item_price`, `item_rent`, `item_desc`, `item_manu`, `item_warr`, `item_image`) VALUES
(3, 'Luxury bed', '30000', '3000', 'Luxurious item', 'Sleepwell', '1', 'DEMO.png'),
(5, 'sofa', '20000', '13', 'jbk', 'jb', '2', 'diyaLogo.jpg'),
(6, 'bed', '68', '1', 'jbk', 'jbk', '1', '13709940_1102521566480786_1740076233176749091_n.jpg'),
(7, 'TV', '390000', '5000', 'A luxurious TV for your needs', 'Hitach', '3', 'tv.jpg'),
(8, 'Bench', '15000', '1400', 'Comfortable bench for two.', 'OP', '1', 'Latt_Bench_2_LP.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `addr` text NOT NULL,
  `pass` text NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `email`, `addr`, `pass`, `userid`) VALUES
('Super', 'Admin', 'admin@project', 'xyz', '!@#$%^&*()', 1),
('mayur', 'shinde', 'a@a', 'abc', '!@#$%^&*()', 2),
('new', 'user', 'user@new', 'Thane', ')(*&^%$#@!', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_actions`
--

CREATE TABLE `user_actions` (
  `action_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `action_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action_type` text NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `amount_spend` text NOT NULL,
  `del_addr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_actions`
--

INSERT INTO `user_actions` (`action_id`, `user_name`, `user_email`, `action_time`, `action_type`, `item_id`, `item_name`, `amount_spend`, `del_addr`) VALUES
(2, 'mayur', 'a@a', '2018-09-15 12:10:44', 'BUY', 3, 'Luxury bed', 'Rs. 30000', 'abc'),
(3, 'mayur', 'a@a', '2018-09-15 12:17:48', 'RENT', 3, 'Luxury bed', 'Rs. 3000 per month', 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `furniture_data`
--
ALTER TABLE `furniture_data`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_actions`
--
ALTER TABLE `user_actions`
  ADD PRIMARY KEY (`action_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `furniture_data`
--
ALTER TABLE `furniture_data`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_actions`
--
ALTER TABLE `user_actions`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
