-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2025 at 05:04 AM
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
-- Database: `storeapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `guitar_store`
--

CREATE TABLE `guitar_store` (
  `productID` int(30) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `pickup` varchar(10) NOT NULL,
  `string` int(20) NOT NULL,
  `frets` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guitar_store`
--

INSERT INTO `guitar_store` (`productID`, `brand`, `type`, `color`, `pickup`, `string`, `frets`) VALUES
(1, 'fender', 'stratocaster', 'sun brust', 'SSH', 6, 21),
(2, 'fender', 'telecaster', 'black', 'SS', 6, 21),
(3, 'fender', 'mustang', 'white', 'SS', 6, 21),
(4, 'fender', 'jazz master', 'white', 'P90', 6, 22),
(5, 'fender', 'jaguar', 'red', 'SS', 6, 22),
(6, 'saito', 'stratocaster', 'blue', 'SSS', 6, 22),
(7, 'gibson', 'lespual', 'sun burst', 'HH', 6, 24),
(8, 'gibson', 'thunderbird', 'red', 'HH', 6, 22),
(9, 'scheter', 'telecaster', 'white', 'SH', 6, 24),
(10, 'ibanze', 'modern stratocaster', 'black', 'HH', 7, 24),
(11, 'strandberg', 'headless', 'wood tone', 'HH', 8, 24),
(12, 'prs', 'prs', 'blue', 'HH', 6, 24),
(13, 'enya', 'lespual', 'white', 'HH', 6, 22),
(14, 'ibanez', 'headless', 'white', 'HH', 6, 24),
(15, 'gusta', 'lespual', 'green', 'HH', 6, 22),
(16, 'gusta', 'telecaster', 'black', 'SS', 6, 22),
(17, 'photogenic', 'lespual', 'black', 'HH', 6, 22),
(18, 'photogenic', 'stratocaster', 'blue', 'SSS', 6, 22),
(19, 'james tyler', 'stratocaster', 'white marble pattern', 'SSH', 6, 22),
(20, 'saito', 'telecaster', 'white', 'SS', 6, 24),
(21, 'yamaha', 'lespual', 'black', 'HH', 6, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guitar_store`
--
ALTER TABLE `guitar_store`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guitar_store`
--
ALTER TABLE `guitar_store`
  MODIFY `productID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
