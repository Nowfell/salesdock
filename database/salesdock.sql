-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 05:47 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salesdock`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `upload_speed` int(11) NOT NULL,
  `download_speed` int(11) NOT NULL,
  `technology` enum('fiber','dialup') NOT NULL,
  `static_ip` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `upload_speed`, `download_speed`, `technology`, `static_ip`) VALUES
(1, 'Product 1', 10, 20, 'dialup', 'yes'),
(2, 'Product 2', 50, 100, 'fiber', 'no'),
(3, 'Product 3', 40, 120, 'fiber', 'no'),
(4, 'Product 4', 30, 50, 'dialup', 'no'),
(5, 'Product 5', 80, 150, 'fiber', 'yes'),
(6, 'Product 6', 20, 50, 'dialup', 'yes'),
(7, 'Product 7', 100, 250, 'fiber', 'yes'),
(8, 'Product 8', 15, 70, 'dialup', 'no'),
(9, 'Product 9', 20, 30, 'dialup', 'yes'),
(10, 'Product 10', 200, 500, 'fiber', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
