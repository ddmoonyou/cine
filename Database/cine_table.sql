-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 10:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cine`
--

-- --------------------------------------------------------

--
-- Table structure for table `branchinfo`
--

CREATE TABLE `branchinfo` (
  `branch_id` int(11) NOT NULL,
  `branch_address` text NOT NULL,
  `branch_telephone` text NOT NULL,
  `branch_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foodinfo`
--

CREATE TABLE `foodinfo` (
  `food_type` char(100) NOT NULL,
  `category` text NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foodsize`
--

CREATE TABLE `foodsize` (
  `food_id` int(10) NOT NULL,
  `food_type` char(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layouttype`
--

CREATE TABLE `layouttype` (
  `layout_type` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movieinfo`
--

CREATE TABLE `movieinfo` (
  `movie_id` bigint(20) NOT NULL,
  `movie_name` text NOT NULL,
  `movie_description` text DEFAULT NULL,
  `movie_trailer` text DEFAULT NULL,
  `director_info` text DEFAULT NULL,
  `movie_poster` text DEFAULT NULL,
  `movie_length` int(10) UNSIGNED DEFAULT 0,
  `releaseDate` date DEFAULT NULL,
  `promote` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_code` varchar(15) NOT NULL,
  `discount_percent` float NOT NULL,
  `_start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `seat_type` char(50) DEFAULT NULL,
  `system_type` char(50) DEFAULT NULL,
  `_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservefood`
--

CREATE TABLE `reservefood` (
  `reserve_id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserveinfo`
--

CREATE TABLE `reserveinfo` (
  `reserve_id` int(10) NOT NULL,
  `showing_id` int(10) NOT NULL,
  `promotion_code` varchar(15) DEFAULT NULL,
  `payment_method` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserveseats`
--

CREATE TABLE `reserveseats` (
  `reserve_id` int(10) NOT NULL,
  `seat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seatlayout`
--

CREATE TABLE `seatlayout` (
  `seat_id` int(10) NOT NULL,
  `seat_type` char(50) NOT NULL,
  `layout_type` char(2) NOT NULL,
  `seat_row` char(1) NOT NULL,
  `seat_column` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seatprice`
--

CREATE TABLE `seatprice` (
  `seat_type` char(50) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `showings`
--

CREATE TABLE `showings` (
  `showing_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `theater_no` int(10) NOT NULL,
  `movie_id` bigint(20) NOT NULL,
  `date_time` datetime NOT NULL,
  `language_dub` text NOT NULL,
  `language_sub` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffinfo`
--

CREATE TABLE `staffinfo` (
  `staff_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `staff_role` text NOT NULL,
  `staff_first_name` text NOT NULL,
  `staff_last_name` text NOT NULL,
  `staff_tel` text NOT NULL,
  `password` varchar(30) NOT NULL,
  `SESSION` datetime DEFAULT NULL,
  `loginstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `systemtype`
--

CREATE TABLE `systemtype` (
  `system_type` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theaterinfo`
--

CREATE TABLE `theaterinfo` (
  `branch_id` int(10) NOT NULL,
  `theater_no` int(10) NOT NULL,
  `layout_type` char(2) DEFAULT NULL,
  `system_type` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branchinfo`
--
ALTER TABLE `branchinfo`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `foodinfo`
--
ALTER TABLE `foodinfo`
  ADD PRIMARY KEY (`food_type`);

--
-- Indexes for table `foodsize`
--
ALTER TABLE `foodsize`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `food_type` (`food_type`);

--
-- Indexes for table `layouttype`
--
ALTER TABLE `layouttype`
  ADD PRIMARY KEY (`layout_type`);

--
-- Indexes for table `movieinfo`
--
ALTER TABLE `movieinfo`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_code`),
  ADD UNIQUE KEY `seat_type` (`seat_type`),
  ADD UNIQUE KEY `system_type` (`system_type`) USING BTREE;

--
-- Indexes for table `reservefood`
--
ALTER TABLE `reservefood`
  ADD PRIMARY KEY (`food_id`,`reserve_id`);

--
-- Indexes for table `reserveinfo`
--
ALTER TABLE `reserveinfo`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `showing_id` (`showing_id`),
  ADD KEY `promotion_code` (`promotion_code`);

--
-- Indexes for table `reserveseats`
--
ALTER TABLE `reserveseats`
  ADD PRIMARY KEY (`reserve_id`,`seat_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indexes for table `seatlayout`
--
ALTER TABLE `seatlayout`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `seat_type` (`seat_type`),
  ADD KEY `layout_type` (`layout_type`);

--
-- Indexes for table `seatprice`
--
ALTER TABLE `seatprice`
  ADD PRIMARY KEY (`seat_type`);

--
-- Indexes for table `showings`
--
ALTER TABLE `showings`
  ADD PRIMARY KEY (`showing_id`),
  ADD KEY `branch_id` (`branch_id`,`theater_no`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `staffinfo`
--
ALTER TABLE `staffinfo`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `systemtype`
--
ALTER TABLE `systemtype`
  ADD PRIMARY KEY (`system_type`);

--
-- Indexes for table `theaterinfo`
--
ALTER TABLE `theaterinfo`
  ADD PRIMARY KEY (`branch_id`,`theater_no`),
  ADD KEY `layout_type` (`layout_type`),
  ADD KEY `system_type` (`system_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branchinfo`
--
ALTER TABLE `branchinfo`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foodsize`
--
ALTER TABLE `foodsize`
  MODIFY `food_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movieinfo`
--
ALTER TABLE `movieinfo`
  MODIFY `movie_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserveinfo`
--
ALTER TABLE `reserveinfo`
  MODIFY `reserve_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserveseats`
--
ALTER TABLE `reserveseats`
  MODIFY `reserve_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seatlayout`
--
ALTER TABLE `seatlayout`
  MODIFY `seat_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `showings`
--
ALTER TABLE `showings`
  MODIFY `showing_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffinfo`
--
ALTER TABLE `staffinfo`
  MODIFY `staff_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodsize`
--
ALTER TABLE `foodsize`
  ADD CONSTRAINT `foodsize_ibfk_1` FOREIGN KEY (`food_type`) REFERENCES `foodinfo` (`food_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`seat_type`) REFERENCES `seatprice` (`seat_type`),
  ADD CONSTRAINT `promotion_ibfk_2` FOREIGN KEY (`system_type`) REFERENCES `systemtype` (`system_type`);

--
-- Constraints for table `reserveinfo`
--
ALTER TABLE `reserveinfo`
  ADD CONSTRAINT `reserveinfo_ibfk_1` FOREIGN KEY (`showing_id`) REFERENCES `showings` (`showing_id`),
  ADD CONSTRAINT `reserveinfo_ibfk_2` FOREIGN KEY (`promotion_code`) REFERENCES `promotion` (`promotion_code`);

--
-- Constraints for table `reserveseats`
--
ALTER TABLE `reserveseats`
  ADD CONSTRAINT `reserveseats_ibfk_1` FOREIGN KEY (`reserve_id`) REFERENCES `reserveinfo` (`reserve_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserveseats_ibfk_2` FOREIGN KEY (`seat_id`) REFERENCES `seatlayout` (`seat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seatlayout`
--
ALTER TABLE `seatlayout`
  ADD CONSTRAINT `seatlayout_ibfk_1` FOREIGN KEY (`seat_type`) REFERENCES `seatprice` (`seat_type`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seatlayout_ibfk_2` FOREIGN KEY (`layout_type`) REFERENCES `layouttype` (`layout_type`) ON UPDATE CASCADE;

--
-- Constraints for table `showings`
--
ALTER TABLE `showings`
  ADD CONSTRAINT `showings_ibfk_1` FOREIGN KEY (`branch_id`,`theater_no`) REFERENCES `theaterinfo` (`branch_id`, `theater_no`),
  ADD CONSTRAINT `showings_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movieinfo` (`movie_id`) ON UPDATE CASCADE;

--
-- Constraints for table `theaterinfo`
--
ALTER TABLE `theaterinfo`
  ADD CONSTRAINT `theaterinfo_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchinfo` (`branch_id`),
  ADD CONSTRAINT `theaterinfo_ibfk_2` FOREIGN KEY (`layout_type`) REFERENCES `layouttype` (`layout_type`),
  ADD CONSTRAINT `theaterinfo_ibfk_3` FOREIGN KEY (`system_type`) REFERENCES `systemtype` (`system_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
