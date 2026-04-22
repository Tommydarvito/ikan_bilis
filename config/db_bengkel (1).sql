-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2026 at 10:52 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id_booking` int NOT NULL,
  `id_user` int NOT NULL,
  `id_motor` int NOT NULL,
  `service` int NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('pending','in progress','completed','failed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id_motor` int NOT NULL,
  `id_user` int NOT NULL,
  `merk` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `police_number` int NOT NULL,
  `year` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spareparts`
--

CREATE TABLE `spareparts` (
  `id_sparepart` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spareparts`
--

INSERT INTO `spareparts` (`id_sparepart`, `name`, `stock`, `price`) VALUES
(2, 'roller', 50, '20000'),
(3, 'vanbelt', 70, '60000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int NOT NULL,
  `role` enum('Admin','Mekanik','Pelanggan','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `full_name`, `email`, `password`, `phone_number`, `role`) VALUES
(1, 'amba', 'amba@gmail.com', '$2y$10$lDX4nfa7.he0Z3ijNf7fbO8nQVPm4bGTgMsjYFFAz8ZYFbiEeJLEa', 290894, 'Pelanggan'),
(3, 'admin', 'admin@gmail.com', '$2y$10$xaPEow.nh3eAWVkVNme88.xPiH8D2SjlfeQLuqb5J.MjqYvgPpj0.', 328978, 'Admin'),
(4, 'ikan', 'ikan@gmail.com', '$2y$10$laMG7bKLRABqNa6xCNEi9eIrDLpbJYaeJl9BCKmEh0tjktNXwehUK', 432893, 'Pelanggan'),
(5, 'ayam', 'ayam@gmail.com', '$2y$10$YtXRtX6yu9UaeC.aH6Phme63KUS2jY1ai7ZG1fKFDRxP.uaiBPdjS', 14172, 'Pelanggan'),
(6, 'Agus', 'agus@gmail.com', '555', 89986, 'Mekanik'),
(7, 'ucup', 'ucup@gmail.com', '$2y$10$MmPnSC.H5Ox8/cMLV4Wy0u2KR53IK5ffEpoBlJWiaHclWU1KNW8Ny', 32235, 'Mekanik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id_motor`);

--
-- Indexes for table `spareparts`
--
ALTER TABLE `spareparts`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id_booking` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id_motor` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spareparts`
--
ALTER TABLE `spareparts`
  MODIFY `id_sparepart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
