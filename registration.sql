-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2024 at 07:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminarr`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `institusi` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `email`, `nama`, `institusi`, `country`, `address`, `is_deleted`) VALUES
(9, 'ikaaaa@gmail.com', 'ika', 'Universitas AhmadDahlan', 'Indonesia', 'kost lily putri muslim semoyan', 0),
(14, 'firmanh@gmail.com', 'Firman Utina', 'Universitas Ahmad Dahlan', 'Indonesia', 'Karangturi', 0),
(15, '2200018000@webmail.uad.ac.id', 'Budi', 'Universitas Ahmad Dahlan', 'Indonesia', 'Kotabaru', 0),
(16, 'kiranae@gmail.com', 'Kirana Lestari', 'Universitas Ahmad Dahlan', 'Indonesia', 'Jombangan', 0),
(17, 'farmi@gmail.com', 'Fahmi Hamzah', 'Universitas Ahmad Dahlan', 'Indonesia', 'Banten', 0),
(19, 'Suyanti@gmail.com', 'Suyantina', 'Universitas Ahmad Dahlan', 'Indonesia', 'Jagalan', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
