-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2025 at 08:10 AM
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
-- Database: `universitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto_profile` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('aktif','tidak aktif') DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `prodi`, `semester`, `tanggal_lahir`, `email`, `foto_profile`, `created_at`, `status`) VALUES
(1, '240030019', 'Muhammad Raihan', 'SI', 3, '2005-12-09', 'Raihannuis169@mail.com', '', '2025-11-23 08:34:58', 'aktif'),
(2, '250030020', 'Citra Naya Lestari', 'BD', 1, NULL, 'nayaa213@gmail.com', '', '2025-11-29 09:01:01', 'aktif'),
(3, '240030017', 'Putu Willy Nugraha', 'SI', 3, '2006-11-16', NULL, '', '2025-11-29 09:15:11', 'aktif'),
(4, '240030018', 'Riris Leonhart', 'BD', 3, '2008-09-28', '', '', '2025-11-29 09:18:19', 'tidak aktif'),
(5, '240030001', 'Nuis Leonhart', 'SI', 3, '2005-11-23', 'Nuiss2115@gmail.com', '', '2025-11-29 12:33:35', 'aktif'),
(6, '240030021', 'Annie Leonhart', 'SI', 3, '2006-11-03', 'Anniee77@gmail.com', '1764484680_8567.jpeg', '2025-11-29 12:36:39', 'aktif'),
(7, '240030055', 'Eren Yeager', 'TI', 3, '0000-00-00', NULL, '', '2025-11-29 12:40:41', 'aktif'),
(8, '230030002', 'Ymir', 'MI', 5, '0000-00-00', 'Ymir113@gmail.com', '', '2025-11-29 16:13:13', 'aktif'),
(9, '220030001', 'Erwin Smith', 'TI', 7, '0000-00-00', 'Erwinsmth01@gmail.com', '', '2025-11-30 00:25:10', 'aktif'),
(11, '240030011', 'Mikasa Ackerman', 'TI', 3, '2005-07-25', 'Ackerman331@gmail.com', '', '2025-11-30 01:37:49', 'aktif'),
(14, '210003007', 'Armin Arlert', 'TI', 7, '2001-05-09', 'arminert05@gmail.com', '1764483998_2776.jpeg', '2025-11-30 03:33:40', 'aktif'),
(15, '220030021', 'Kaedehara Kazuha', 'MI', 7, '2003-09-09', 'Kaedeharaa55@gmail.com', '1764474015_8061.jpeg', '2025-11-30 03:40:15', 'aktif'),
(16, '240003002', 'Aqilatun Nuha', 'SI', 8, '2005-12-05', 'aqila.nuha05@gmail.com', '1764474669_7447.jpeg', '2025-11-30 03:51:09', 'aktif'),
(19, '210030078', 'Elly Monalysa', 'MI', 5, '2020-11-05', 'mona123@gmail.com', '', '2025-11-30 04:05:38', 'aktif'),
(24, '230030011', 'Crista Lenz', 'BD', 5, '2003-01-07', 'crissta77@gmail.com', '', '2025-11-30 06:36:09', 'aktif'),
(26, '220030070', 'Hange Zoe', 'MI', 7, '2002-09-03', 'Hangee12@gmail.com', '1764485136_9936.jpg', '2025-11-30 06:45:36', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
