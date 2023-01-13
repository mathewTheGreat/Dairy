-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 02:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE `breed` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `milk_production` varchar(100) NOT NULL,
  `meat_production` varchar(100) NOT NULL,
  `adaptability` varchar(100) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breed`
--

INSERT INTO `breed` (`id`, `name`, `description`, `image`, `milk_production`, `meat_production`, `adaptability`, `comments`) VALUES
(1, 'Freshian', 'star cow', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cattle`
--

CREATE TABLE `cattle` (
  `id` int(50) NOT NULL,
  `breed` int(50) DEFAULT NULL,
  `Name` varchar(250) NOT NULL,
  `tag_no` varchar(250) NOT NULL,
  `gender` int(50) NOT NULL,
  `weight` int(50) NOT NULL,
  `birth_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `source` varchar(50) NOT NULL,
  `mother_tag_no` varchar(50) NOT NULL,
  `father_tag_no` varchar(50) NOT NULL,
  `notes` text DEFAULT NULL,
  `from_group` varchar(50) DEFAULT NULL,
  `source_method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cattle`
--

INSERT INTO `cattle` (`id`, `breed`, `Name`, `tag_no`, `gender`, `weight`, `birth_date`, `arrival_date`, `source`, `mother_tag_no`, `father_tag_no`, `notes`, `from_group`, `source_method`) VALUES
(1, 1, 'Lucy', '123', 1, 230, '2023-01-12', '2023-01-13', 'Mathew Farms', '12', '123', 'new cow', '4', '3'),
(2, 1, 'Bella', '123', 1, 230, '2023-01-12', '2023-01-13', 'Mathew Farms', '12', '123', 'new cow', '4', '3'),
(4, 1, 'Susan', '321', 1, 245, '2022-09-11', '2022-09-11', 'Mathew farms', '56', '32', 'this is a cow from postman', '4', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cattle_group`
--

CREATE TABLE `cattle_group` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `cattle_count` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL COMMENT 'The type of the group, like breeding group, milking group, dry group, etc.',
  `feeding_schedule` datetime DEFAULT NULL,
  `health_status` text DEFAULT NULL,
  `vaccination_dates` date DEFAULT NULL,
  `medication` text DEFAULT NULL,
  `milk_production` double DEFAULT NULL,
  `milk_quality` double DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `movement` int(11) DEFAULT NULL,
  `movement_location` varchar(100) DEFAULT NULL,
  `movement_date` date DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `farm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cattle_group`
--

INSERT INTO `cattle_group` (`id`, `name`, `description`, `cattle_count`, `type`, `feeding_schedule`, `health_status`, `vaccination_dates`, `medication`, `milk_production`, `milk_quality`, `comments`, `movement`, `movement_location`, `movement_date`, `employee_id`, `farm_id`) VALUES
(1, 'Lactating', 'cows that are feeding their calves', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `cattle_id` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_specification` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type_ID` int(11) NOT NULL,
  `expense_specification` varchar(255) NOT NULL,
  `value` float NOT NULL,
  `receipt_no` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `id` int(11) NOT NULL,
  `farm_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `size` float NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type_id` int(11) NOT NULL,
  `income_specification` varchar(255) DEFAULT NULL,
  `value` float NOT NULL,
  `receipt_no` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `income_types`
--

CREATE TABLE `income_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `milk_production`
--

CREATE TABLE `milk_production` (
  `id` int(11) NOT NULL,
  `cattle_ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `morning_quantity` float NOT NULL,
  `afternoon_quantity` float NOT NULL,
  `evening_quantity` float NOT NULL,
  `quality` varchar(255) DEFAULT NULL,
  `milk_consumed_by_calf` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cattle`
--
ALTER TABLE `cattle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cattle_group`
--
ALTER TABLE `cattle_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cattle_id` (`cattle_id`),
  ADD KEY `event_type` (`event_type`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_ID` (`type_ID`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `income_types`
--
ALTER TABLE `income_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milk_production`
--
ALTER TABLE `milk_production`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cattle_ID` (`cattle_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cattle`
--
ALTER TABLE `cattle`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cattle_group`
--
ALTER TABLE `cattle_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`cattle_id`) REFERENCES `cattle` (`id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`event_type`) REFERENCES `event_type` (`id`);

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`type_ID`) REFERENCES `income_types` (`id`);

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `income_types` (`id`);

--
-- Constraints for table `milk_production`
--
ALTER TABLE `milk_production`
  ADD CONSTRAINT `milk_production_ibfk_1` FOREIGN KEY (`cattle_ID`) REFERENCES `cattle` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
