-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 08:54 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swu-air`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_login_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `admin_login_count`) VALUES
('admin', '123', 13);

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `stn_code` varchar(6) NOT NULL,
  `airport_name` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`stn_code`, `airport_name`, `city`) VALUES
('BKK', 'Suvarnabhumi Airport', 'Bangkok '),
('CEI', 'Mae Fah Luang Chiang Rai International Airport', 'Chiang Rai'),
('CNX', 'Chiang Mai International Airport', 'Chiang Mai'),
('DMK', 'Don Mueang International Airport', 'Bangkok'),
('HDY', 'Hat Yai International Airport', 'Songkhla'),
('HKT', 'Phuket International Airport', 'Phuket');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `booking_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(100) NOT NULL,
  `booking_name` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `type_of_identification` varchar(50) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `class` varchar(50) NOT NULL,
  `source` varchar(6) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `halt_station` varchar(20) DEFAULT NULL,
  `plane_id1` varchar(20) NOT NULL,
  `plane_id2` varchar(20) DEFAULT NULL,
  `total_fare` int(100) NOT NULL,
  `anum` int(11) NOT NULL,
  `cnum` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dtd1` datetime NOT NULL,
  `dta1` datetime NOT NULL,
  `dtd2` datetime DEFAULT NULL,
  `dta2` datetime DEFAULT NULL,
  `flight_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `stops` int(20) NOT NULL DEFAULT 0,
  `halt_station` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_id`, `source`, `destination`, `stops`, `halt_station`) VALUES
(137, 'DMK', 'CNX', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `from_to_intermediate`
--

CREATE TABLE `from_to_intermediate` (
  `flight_id` int(11) NOT NULL,
  `stn_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `has_booked_seats_in_plane`
--

CREATE TABLE `has_booked_seats_in_plane` (
  `flight_id` int(11) NOT NULL,
  `plane_id` varchar(50) NOT NULL,
  `booked_economy_seats` int(11) DEFAULT 0,
  `booked_business_seats` int(11) NOT NULL DEFAULT 0,
  `booked_first_seats` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `has_booked_seats_in_plane`
--

INSERT INTO `has_booked_seats_in_plane` (`flight_id`, `plane_id`, `booked_economy_seats`, `booked_business_seats`, `booked_first_seats`) VALUES
(137, 'SWU_1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE `planes` (
  `plane_id` varchar(50) NOT NULL,
  `airlines` varchar(50) NOT NULL,
  `total_economy_seats` int(11) NOT NULL,
  `total_business_seats` int(11) NOT NULL,
  `total_first_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`plane_id`, `airlines`, `total_economy_seats`, `total_business_seats`, `total_first_seats`) VALUES
('SWU_1', 'SWU_Air', 50, 40, 10),
('SWU_2', 'SWU_Air', 40, 30, 10);

-- --------------------------------------------------------

--
-- Table structure for table `taken_by_plane`
--

CREATE TABLE `taken_by_plane` (
  `flight_id` int(11) NOT NULL,
  `plane_id` varchar(50) NOT NULL,
  `path` int(10) NOT NULL,
  `path_desc` varchar(100) NOT NULL,
  `date_of_depart` date NOT NULL,
  `time_of_depart` time NOT NULL,
  `date_of_arrival` date NOT NULL,
  `time_of_arrival` time NOT NULL,
  `economy_fare` int(11) NOT NULL,
  `business_fare` int(11) NOT NULL,
  `first_fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taken_by_plane`
--

INSERT INTO `taken_by_plane` (`flight_id`, `plane_id`, `path`, `path_desc`, `date_of_depart`, `time_of_depart`, `date_of_arrival`, `time_of_arrival`, `economy_fare`, `business_fare`, `first_fare`) VALUES
(137, 'SWU_1', 0, 'Direct', '2021-04-30', '00:00:00', '2021-04-30', '13:00:00', 20, 45, 70);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `login_count` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `login_count`) VALUES
('manapon', 'manapon@gmail.com', '202cb962ac59075b964b07152d234b70', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `admin_login_count` (`admin_login_count`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`stn_code`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`booking_id`,`email`),
  ADD KEY `plane_id1` (`plane_id1`),
  ADD KEY `source` (`source`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `from_to_intermediate`
--
ALTER TABLE `from_to_intermediate`
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `stn_code` (`stn_code`);

--
-- Indexes for table `has_booked_seats_in_plane`
--
ALTER TABLE `has_booked_seats_in_plane`
  ADD KEY `plane_id` (`plane_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`plane_id`);

--
-- Indexes for table `taken_by_plane`
--
ALTER TABLE `taken_by_plane`
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `plane_id` (`plane_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_login_count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `booking_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`plane_id1`) REFERENCES `planes` (`plane_id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`source`) REFERENCES `airports` (`stn_code`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`);

--
-- Constraints for table `from_to_intermediate`
--
ALTER TABLE `from_to_intermediate`
  ADD CONSTRAINT `from_to_intermediate_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`),
  ADD CONSTRAINT `from_to_intermediate_ibfk_2` FOREIGN KEY (`stn_code`) REFERENCES `airports` (`stn_code`);

--
-- Constraints for table `has_booked_seats_in_plane`
--
ALTER TABLE `has_booked_seats_in_plane`
  ADD CONSTRAINT `has_booked_seats_in_plane_ibfk_1` FOREIGN KEY (`plane_id`) REFERENCES `planes` (`plane_id`),
  ADD CONSTRAINT `has_booked_seats_in_plane_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`);

--
-- Constraints for table `taken_by_plane`
--
ALTER TABLE `taken_by_plane`
  ADD CONSTRAINT `taken_by_plane_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`),
  ADD CONSTRAINT `taken_by_plane_ibfk_2` FOREIGN KEY (`plane_id`) REFERENCES `planes` (`plane_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
