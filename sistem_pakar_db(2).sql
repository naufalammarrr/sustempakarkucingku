-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 03:59 PM
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
-- Database: `sistem_pakar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `belief` float NOT NULL CHECK (`belief` >= 0 and `belief` <= 1),
  `plausibility` float NOT NULL CHECK (`plausibility` >= 0 and `plausibility` <= 1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `id_penyakit`, `id_gejala`, `belief`, `plausibility`) VALUES
(1, 1, 1, 0.8, 0.2),
(2, 1, 2, 0.6, 0.4),
(3, 1, 3, 0.5, 0.5),
(4, 2, 2, 0.6, 0.4),
(5, 2, 6, 0.8, 0.2),
(6, 3, 4, 0.6, 0.4),
(7, 3, 7, 0.8, 0.2),
(8, 4, 4, 0.6, 0.4),
(9, 4, 9, 0.8, 0.2),
(10, 5, 10, 0.9, 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `hasil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `tanggal`, `hasil`) VALUES
(1, '2024-12-10 22:46:55', '{\"Flu kucing\":0.7058823529411765,\"Asma\":\"0.6\"}'),
(2, '2024-12-10 22:47:04', '{\"Asma\":\"0.6\",\"Flu kucing\":0.5454545454545455}'),
(3, '2024-12-10 22:47:19', '{\"Cacingan\":\"0.6\",\"Infeksi saluran kemih\":0.5454545454545454}'),
(4, '2024-12-10 23:22:11', '{\"Rabies\":\"0.9\",\"Infeksi saluran kemih\":\"0.8\"}'),
(5, '2024-12-10 23:27:51', '{\"Flu kucing\":\"0.8\"}'),
(6, '2024-12-10 23:32:20', '{\"Flu kucing\":\"0.8\"}'),
(7, '2024-12-10 23:32:29', '{\"Flu kucing\":\"0.8\"}'),
(8, '2024-12-10 23:34:52', '{\"Flu kucing\":0.7058823529411765,\"Asma\":\"0.6\"}'),
(9, '2024-12-10 23:35:02', '[]'),
(10, '2024-12-10 23:35:08', '{\"Cacingan\":\"0.8\"}'),
(11, '2024-12-10 23:40:16', '{\"Cacingan\":\"0.8\"}'),
(12, '2024-12-13 22:30:56', '{\"Flu kucing\":\"0.8\"}'),
(13, '2024-12-13 22:31:11', '{\"Flu kucing\":0.7058823529411765,\"Asma\":\"0.6\",\"Cacingan\":\"0.6\",\"Infeksi saluran kemih\":\"0.6\"}'),
(14, '2024-12-13 22:31:19', '{\"Flu kucing\":0.7058823529411765,\"Asma\":\"0.6\",\"Cacingan\":\"0.6\",\"Infeksi saluran kemih\":\"0.6\"}'),
(15, '2024-12-16 22:31:32', '{\"Flu kucing\":0.7058823529411765,\"Asma\":\"0.6\"}'),
(16, '2024-12-16 22:40:06', '{\"Flu kucing\":\"0.5\"}'),
(17, '2024-12-16 22:40:11', '{\"Asma\":\"0.6\",\"Flu kucing\":0.4285714285714286}'),
(18, '2024-12-16 22:40:21', '{\"Infeksi saluran kemih\":\"0.6\",\"Cacingan\":0.5454545454545454}'),
(19, '2024-12-16 22:40:29', '{\"Flu kucing\":\"0.8\"}'),
(20, '2024-12-16 22:40:33', '{\"Flu kucing\":0.7058823529411765,\"Asma\":\"0.6\"}'),
(21, '2024-12-16 22:40:54', '{\"Rabies\":\"0.9\"}'),
(22, '2024-12-16 22:41:12', '{\"Infeksi saluran kemih\":\"0.8\"}'),
(23, '2024-12-16 22:56:12', '{\"Infeksi saluran kemih\":\"0.8\"}'),
(24, '2024-12-16 23:11:23', '{\"Flu kucing\":0.7058823529411765,\"Asma\":\"0.6\"}'),
(25, '2024-12-16 23:11:28', '[]'),
(26, '2024-12-16 23:12:14', '{\"Flu kucing\":\"0.6\",\"Asma\":\"0.6\"}'),
(27, '2024-12-16 23:12:54', '{\"Asma\":\"0.6\",\"Flu kucing\":\"0.3\"}'),
(28, '2024-12-16 23:13:29', '{\"Asma\":\"0.6\",\"Flu kucing\":0.5454545454545454}'),
(29, '2024-12-16 23:13:37', '{\"Flu kucing\":\"0.8\"}'),
(30, '2024-12-16 23:13:43', '{\"Asma\":\"0.6\",\"Flu kucing\":0.5454545454545454}'),
(31, '2024-12-16 23:13:57', '{\"Flu kucing\":0.6666666666666667}'),
(32, '2024-12-16 23:14:25', '{\"Flu kucing\":\"0.8\"}'),
(33, '2024-12-18 21:34:55', '{\"Asma\":\"0.6\",\"Flu kucing\":0.5454545454545455}'),
(34, '2024-12-22 17:20:50', '[]'),
(35, '2024-12-22 17:20:56', '{\"Asma\":\"0.8\"}'),
(36, '2024-12-22 17:50:13', '{\"Flu kucing\":\"0.8\"}'),
(37, '2024-12-22 17:50:36', '[]'),
(38, '2024-12-22 17:50:39', '{\"Flu kucing\":\"0.6\",\"Asma\":\"0.6\"}');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`) VALUES
(1, 'Bersin - bersin'),
(2, 'Batuk - batuk'),
(3, 'Muntah'),
(4, 'Diare'),
(5, 'Nafsu makan menurun'),
(6, 'Sesak nafas'),
(7, 'Cacing dalam kotoran'),
(8, 'Cacing di muntahan'),
(9, 'Sulit buang air kecil'),
(10, 'Gigit - gigit tidak biasa');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`) VALUES
(1, 'Flu kucing'),
(2, 'Asma'),
(3, 'Cacingan'),
(4, 'Infeksi saluran kemih'),
(5, 'Rabies');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `solusi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `id_penyakit`, `solusi`, `created_at`) VALUES
(1, 1, 'Pisahkan kucing yang sakit dari kucing lain untuk mencegah penyebaran.\r\nBerikan lingkungan yang hangat dan bebas stres.\r\nPastikan area tempat tinggalnya bersih dan bebas debu.', '2024-12-16 15:50:02'),
(2, 2, 'Hindari asap rokok atau polusi udara lainnya di sekitar kucing.\r\nMinimalkan debu:\r\n\r\n    Gunakan pasir kucing bebas debu (dust-free cat litter).\r\n    Bersihkan rumah secara teratur menggunakan vacuum cleaner dengan filter HEPA.', '2024-12-16 15:50:02'),
(3, 3, 'Bersihkan tempat tidur dan kandang kucing secara rutin menggunakan air panas untuk membunuh telur atau larva cacing.\r\nPastikan kotak pasir selalu bersih. Buang kotoran kucing setiap hari.\r\nHindari akses kucing ke tanah atau tempat yang terkontaminasi oleh feses hewan lain.', '2024-12-16 15:52:30'),
(4, 4, 'Memberikan antibiotik jika infeksi bakteri terdeteksi. Memberikan makanan basah (wet food).\r\nMenyediakan air segar setiap saat.\r\nGunakan air mancur kucing (cat fountain) untuk menarik minat kucing minum lebih banyak.', '2024-12-16 15:52:30'),
(5, 5, 'Segera hubungi dokter hewan terdekat!', '2024-12-16 15:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `nama_kucing` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nama_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE,
  ADD CONSTRAINT `aturan_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE;

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
