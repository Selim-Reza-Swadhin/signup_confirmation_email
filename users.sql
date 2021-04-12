-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 01:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signup_confirm`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `code`, `status`) VALUES
(1, 'SelimReza', 'Swadhin', 'selimrezaswadhin89@gmail.com', '$2y$10$jd6xR53vfMVL3MbuuN16Cu6SFBBJS/YOHJN3KzFcvmShLcMhuql86', 'male', '1342457242', 1),
(2, 'Selim Rena', 'Joy', 'selimrezaswadhin@gmail.com', '$2y$10$xswbDj5e/.m0MCStCx3TWu9AWEC6JjdrmLUoJxEZ.MwZKuR4OzhTC', 'female', '269276725', 1),
(3, 'Zannat Ara', 'bonna', 'selimrezaswadhim@gmail.com', '$2y$10$tBFHABydK8FRc/36AvFHDuCrS1gkAeLnFmhREpPaBJ.f5RHjFUjuO', 'female', '472432519', 1),
(4, 'sony', 'ase', 'selim.swadhin@gmail.com', '$2y$10$DgWIVnQEE.3EcPOiWoNBq.y0n7Y.oifIWMzSRbX6.Zguu19KgIzqa', 'female', '78731', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
