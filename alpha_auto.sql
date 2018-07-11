-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 08:18 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alpha_auto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(32) DEFAULT NULL,
  `admin_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `email`, `password`, `role`, `admin_photo`) VALUES
(1, 'testadmin', 'test@gmail.com', '$2y$10$O3QoHf73VaElz.rGQPwGf.sB4JGx6yRzApKFaODNsWGPOKD.JlbKO', NULL, NULL),
(2, 'superadmin', 'super@gmail.com', '$2y$10$42aSnuLtZzyuSqGFBA7nFeRsX2sibG.OwyLEAHms/6FYT1hsg3sUS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cars_stock`
--

CREATE TABLE `cars_stock` (
  `car_id` int(11) NOT NULL,
  `model` varchar(64) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock_number` varchar(32) NOT NULL,
  `manufacturer` varchar(64) NOT NULL,
  `chassis_code` varchar(128) NOT NULL,
  `manufacture_year` int(6) NOT NULL,
  `displacement` float NOT NULL,
  `transmission` varchar(32) NOT NULL,
  `fuel_type` varchar(64) NOT NULL,
  `exterior_color` varchar(16) NOT NULL,
  `interior_color` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars_stock`
--

INSERT INTO `cars_stock` (`car_id`, `model`, `image`, `stock_number`, `manufacturer`, `chassis_code`, `manufacture_year`, `displacement`, `transmission`, `fuel_type`, `exterior_color`, `interior_color`) VALUES
(1, 'Vitz 2016', '1531289598ferrari1.jpg', 'B1554S232', 'Toyota', 'DH45612f45', 2016, 1499, 'Auto', 'CNG', 'Red', 'Green');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `client_list` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_list`) VALUES
(1, 'test.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `car_id`, `name`, `image`) VALUES
(1, 1, 'vitzSix.jpg', '../uploads/car_images/vitzSix.jpg'),
(2, 1, 'vitzThree.jpg', '../uploads/car_images/vitzThree.jpg'),
(3, 1, 'vitzTwo.jpg', '../uploads/car_images/vitzTwo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Indexes for table `cars_stock`
--
ALTER TABLE `cars_stock`
  ADD PRIMARY KEY (`car_id`),
  ADD UNIQUE KEY `model` (`model`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars_stock`
--
ALTER TABLE `cars_stock`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
