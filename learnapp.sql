-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 03:51 PM
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
-- Database: `learnapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kursus`
--

CREATE TABLE `jenis_kursus` (
  `id_jenis` int(11) NOT NULL,
  `jenis_kursus` varchar(20) NOT NULL,
  `jumlah_kursus` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_kursus`
--

INSERT INTO `jenis_kursus` (`id_jenis`, `jenis_kursus`, `jumlah_kursus`, `warna`, `icon`) VALUES
(17, 'REACTJS', 1, '4b86fb', 'ri-reactjs-line'),
(18, 'CHATGPT ', 3, '454545', 'ri-openai-line');

-- --------------------------------------------------------

--
-- Table structure for table `materi_complete`
--

CREATE TABLE `materi_complete` (
  `id_complit` int(11) NOT NULL,
  `id_userCom` int(11) NOT NULL,
  `id_materiCom` int(11) NOT NULL,
  `status_com` enum('sudah','belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi_complete`
--

INSERT INTO `materi_complete` (`id_complit`, `id_userCom`, `id_materiCom`, `status_com`) VALUES
(63, 1, 26, 'sudah'),
(64, 8, 26, 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kursus`
--

CREATE TABLE `tb_kursus` (
  `id_kursus` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_kursus` varchar(100) NOT NULL,
  `level_kursus` enum('Beginer','Expert') NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kursus`
--

INSERT INTO `tb_kursus` (`id_kursus`, `id_user`, `id_jenis`, `nama_kursus`, `level_kursus`, `keterangan`, `jumlah_peserta`) VALUES
(124, 2, 17, 'ReactJs Dasar', 'Beginer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna nec tincidunt praesent semper feugiat nibh. Morbi tristique senectus et netus et malesuada fames ac. At lectus urna duis convallis convallis tellus id interdum. Id donec ultrices tincidunt arcu. Suspendisse sed nisi lacus sed viverra tellus in hac habitasse. Dui id ornare arcu odio ut sem nulla pharetra diam. Nulla facilisi etiam dignissim diam quis enim lobortis. Et netus et malesuada fames. Condimentum lacinia quis vel eros.', 2),
(127, 8, 18, 'Chat Bot', 'Expert', 'sdasasasas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_materi` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `modul` varchar(100) NOT NULL,
  `materi_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `id_kursus`, `id_user`, `nama_materi`, `nama_file`, `modul`, `materi_keterangan`) VALUES
(26, 124, 2, 'Instalasi ReactJs', '1720373549_a1eb9b873148a8bcb04b.mp4', '1720373549_6c6a655e6cf240bfd9f4.pdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna nec tincidunt praesent semper feugiat nibh. Morbi tristique senectus et netus et malesuada fames ac. At lectus urna duis convallis convallis tellus id interdum. Id donec ultrices tincidunt arcu.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mykursus`
--

CREATE TABLE `tb_mykursus` (
  `id_mykursus` int(11) NOT NULL,
  `id_userMy` int(11) NOT NULL,
  `id_kursusMy` int(11) NOT NULL,
  `status` enum('progres','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mykursus`
--

INSERT INTO `tb_mykursus` (`id_mykursus`, `id_userMy`, `id_kursusMy`, `status`) VALUES
(72, 1, 124, 'progres'),
(73, 8, 124, 'progres');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelajaran`
--

CREATE TABLE `tb_pembelajaran` (
  `id_pembelajaran` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `nama_pembelajaran` varchar(100) NOT NULL,
  `modul_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembelajaran`
--

INSERT INTO `tb_pembelajaran` (`id_pembelajaran`, `id_kursus`, `nama_pembelajaran`, `modul_keterangan`) VALUES
(11, 124, 'Instalasi ReactJs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Urna nec tincidunt praesent semper feugiat nibh. Morbi tristique senectus et netus et malesuada fames ac. At lectus urna duis convallis convallis tellus id interdum. Id donec ultrices tincidunt arcu.'),
(15, 124, 'Modul Dua', 'Reactjs awalnya dibuat oleh Jordan Walke yang merupakan karyawan Facebook. Ia merilis prototipe pertama Reactjs dengan nama “FaxJS” yang terinspirasi dari XHP. 1\r\n\r\nFacebook menyadari, aplikasi (web) mereka semakin kompleks. Bayangkan saja, ada banyak bagian yang harus terus di-update seperti news feed, chat list, chat box, dll. secara realtime.\r\n\r\nJika menggunakan cara tradisional seperti JQuery, ini akan memakan banyak biaya.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `kontak` varchar(12) NOT NULL,
  `image` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `level` enum('creator','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `username`, `password`, `kontak`, `image`, `about`, `level`) VALUES
(1, 'Arul', 'tes@gmail.com', 'agus', '123', '', '', '', 'user'),
(2, 'ADIT', 'te2s@gmail.com', 'agus', '123', '', '', '', 'creator'),
(3, 'tulus', 'sayaTulus@21.com', 'Tulus', 'tulus', '', '', '', 'creator'),
(8, 'Aldi Tulus', 'aldtls223@gmail.com', 'Aldi Tulus', 'alditulu', '082351084886', '', 'Perkenalkan Nama Saya Aldi Tulus.\r\n\r\nIni Github Saya : Github.com', 'creator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kursus`
--
ALTER TABLE `jenis_kursus`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `materi_complete`
--
ALTER TABLE `materi_complete`
  ADD PRIMARY KEY (`id_complit`),
  ADD KEY `id_materi` (`id_materiCom`),
  ADD KEY `id_userCom` (`id_userCom`);

--
-- Indexes for table `tb_kursus`
--
ALTER TABLE `tb_kursus`
  ADD PRIMARY KEY (`id_kursus`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_kursus` (`id_kursus`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_mykursus`
--
ALTER TABLE `tb_mykursus`
  ADD PRIMARY KEY (`id_mykursus`),
  ADD KEY `id_kursus` (`id_kursusMy`),
  ADD KEY `id_user` (`id_userMy`),
  ADD KEY `id_userMy` (`id_userMy`);

--
-- Indexes for table `tb_pembelajaran`
--
ALTER TABLE `tb_pembelajaran`
  ADD PRIMARY KEY (`id_pembelajaran`),
  ADD KEY `id_kursus` (`id_kursus`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kursus`
--
ALTER TABLE `jenis_kursus`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `materi_complete`
--
ALTER TABLE `materi_complete`
  MODIFY `id_complit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tb_kursus`
--
ALTER TABLE `tb_kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_mykursus`
--
ALTER TABLE `tb_mykursus`
  MODIFY `id_mykursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tb_pembelajaran`
--
ALTER TABLE `tb_pembelajaran`
  MODIFY `id_pembelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materi_complete`
--
ALTER TABLE `materi_complete`
  ADD CONSTRAINT `materi_complete_ibfk_1` FOREIGN KEY (`id_userCom`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materi_complete_ibfk_2` FOREIGN KEY (`id_materiCom`) REFERENCES `tb_materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kursus`
--
ALTER TABLE `tb_kursus`
  ADD CONSTRAINT `tb_kursus_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kursus_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_kursus` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `tb_kursus` (`id_kursus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_materi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mykursus`
--
ALTER TABLE `tb_mykursus`
  ADD CONSTRAINT `tb_mykursus_ibfk_1` FOREIGN KEY (`id_userMy`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_mykursus_ibfk_2` FOREIGN KEY (`id_kursusMy`) REFERENCES `tb_kursus` (`id_kursus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembelajaran`
--
ALTER TABLE `tb_pembelajaran`
  ADD CONSTRAINT `tb_pembelajaran_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `tb_kursus` (`id_kursus`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
