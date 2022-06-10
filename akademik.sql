-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 02:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` char(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `kelas` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `kelas`) VALUES
(1, 'Fitri', '1905112007', 'fitriyantii1701@gmail.com', 'Teknik Komputer', '4'),
(2, 'Elsa', '1905112069', 'elsa@gmail.com', 'Akutansi', '0'),
(3, 'Anna', '1905112069', 'anna@gmail.com', 'dokter', '0'),
(4, 'andi', '1905112069', 'andi@gmail.com', 'Akutansi', '0'),
(5, 'bunga', '1905112069', 'bunga@gmail.com', 'dokter', ''),
(6, 'mawar', '1905112069', 'mawar@gmail.com', 'Akutansi', ''),
(7, 'melati', '1905112069', 'melati@gmail.com', 'Akutansi', ''),
(8, 'Nana', '1905112069', 'nana@gmail.com', 'Teknik Komputer', '3'),
(12, 'nada', '1905112069', 'nada@gmail.com', 'Kimia', '6'),
(13, 'Elsa', '1905112069', 'fitriyantii1701@gmail.com', 'dokter', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'ana', '$2y$10$TY0u0YxwlMzy7gwPXp6xFuOSUul5IWcURFcXFAOj8td9uK7TlCo.W'),
(3, 'fitri', '$2y$10$7OazC.BLINg7bFgUPkox8eOi.lQwH52fObPSLqGrTNL8cKrDSc0Xu'),
(4, 'admin', '$2y$10$MOV7vU4EdmV6qWPjrACFfeIpKJSfmq4gdg1lJZDtvBqFL.cfXPwGq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
