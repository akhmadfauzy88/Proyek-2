-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 08:51 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek2`
--

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `id` int(11) NOT NULL,
  `lab_name` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`id`, `lab_name`, `nama`, `lantai`) VALUES
(1, '-', '-', 0),
(2, 'A1', 'Class', 2),
(3, 'B1', 'Database', 2),
(4, 'LP1', 'Network', 4),
(11, 'D1', 'Software', 2),
(12, 'D2', 'Software', 2),
(13, 'B2', 'Database', 2),
(14, 'B3', 'Database', 2),
(19, 'D3', 'Programming', 2),
(20, 'D4', 'Programming', 2),
(23, 'D5', 'Programming', 2),
(24, 'B4', 'Database', 2),
(25, 'B5', 'Database', 2),
(26, 'A3', 'Sistem Operasi', 2),
(27, 'A4', 'Class', 2),
(28, 'A5', 'Class', 2),
(29, 'A7', 'Software', 2),
(30, 'A2', 'Class', 2),
(31, 'A6', 'Software', 2),
(32, 'C1', 'Class', 2),
(33, 'C2', 'Class', 2),
(34, 'C3', 'Cabling', 2),
(35, 'G2', 'Hardware', 1),
(36, 'G7', 'Class', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `subject`, `pesan`) VALUES
(1, 'Berliana', 'ber_putri@gmail.com', '-', 'Ngetest Pesan'),
(2, 'Berliana', 'ber_putri@gmail.com', '-', 'Test Flash Data'),
(3, 'Berliana', 'ber_putri@gmail.com', '-', 'Bux Fix Flash\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_kelas`
--

CREATE TABLE `transaksi_kelas` (
  `id` int(11) NOT NULL,
  `peminjam` int(11) NOT NULL,
  `ruang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk` time NOT NULL,
  `jumlah_jam` int(2) NOT NULL,
  `matakuliah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_dosen` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `kebutuhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_kelas`
--

INSERT INTO `transaksi_kelas` (`id`, `peminjam`, `ruang`, `jam_masuk`, `jumlah_jam`, `matakuliah`, `kode_dosen`, `tanggal`, `kebutuhan`, `status`) VALUES
(1, 1, 'A1', '08:00:00', 3, 'SQL', 'AKF', '2019-04-01', '-', 'approved'),
(2, 1, 'A6', '12:00:00', 2, 'SQLi', 'AKF', '2019-04-01', 'Komputer', 'pending'),
(3, 1, 'A1', '08:00:00', 2, 'SS', 'AKF', '2019-04-03', '-', 'canceled');

-- --------------------------------------------------------

--
-- Table structure for table `users_lak`
--

CREATE TABLE `users_lak` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `id_peg` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_lak`
--

INSERT INTO `users_lak` (`id`, `username`, `id_peg`, `password`, `nama_depan`, `nama_belakang`, `email`) VALUES
(1, 'lak_fit', '12345678', 'lak123456', 'LAK', 'FIT', 'lakfit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users_mhs`
--

CREATE TABLE `users_mhs` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_mhs`
--

INSERT INTO `users_mhs` (`id`, `username`, `nim`, `password`, `nama_depan`, `nama_belakang`, `email`) VALUES
(1, 'berlianaputri', '6701174026', 'cocok', 'Berliana', 'Putri Meliani', 'ber_putri@gmail.com'),
(2, 'fadhilahfz', '0001', 'Bandung123', 'Fadhilah', 'Fazrin', 'fadhilahfz@gmail.com'),
(3, 'hestistrsmi', '4046', 'Hesti123', 'Hesti', 'Sitaresmi', 'hesti99@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users_teacher`
--

CREATE TABLE `users_teacher` (
  `id` int(11) NOT NULL,
  `kode` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_teacher`
--

INSERT INTO `users_teacher` (`id`, `kode`, `username`, `nip`, `password`, `nama_depan`, `nama_belakang`, `email`, `lab_id`) VALUES
(1, 'AKF', 'akfzy', '4050', 'cocok', 'Akhmad', 'Fauzy', 'akfzy@gmail.com', 1),
(2, 'DWB', 'dadiwbw', '4156', '12345678', 'Dadi', 'Wibowo', 'dadiw@gmail.com', 3),
(3, 'MRJ', 'marjono', '3152', 'Mar31245', 'Marjono', 'Marjono', 'marjono@gmail.com', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lab_name` (`lab_name`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `transaksi_kelas`
--
ALTER TABLE `transaksi_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ruang` (`ruang`),
  ADD KEY `kode_dosen` (`kode_dosen`),
  ADD KEY `peminjam` (`peminjam`);

--
-- Indexes for table `users_lak`
--
ALTER TABLE `users_lak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id_peg` (`id_peg`);

--
-- Indexes for table `users_mhs`
--
ALTER TABLE `users_mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `users_teacher`
--
ALTER TABLE `users_teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `lab_id` (`lab_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_kelas`
--
ALTER TABLE `transaksi_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_lak`
--
ALTER TABLE `users_lak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_mhs`
--
ALTER TABLE `users_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_teacher`
--
ALTER TABLE `users_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `laboratory` (`lab_name`);

--
-- Constraints for table `transaksi_kelas`
--
ALTER TABLE `transaksi_kelas`
  ADD CONSTRAINT `transaksi_kelas_ibfk_1` FOREIGN KEY (`kode_dosen`) REFERENCES `users_teacher` (`kode`),
  ADD CONSTRAINT `transaksi_kelas_ibfk_2` FOREIGN KEY (`peminjam`) REFERENCES `users_mhs` (`id`),
  ADD CONSTRAINT `transaksi_kelas_ibfk_3` FOREIGN KEY (`ruang`) REFERENCES `laboratory` (`lab_name`);

--
-- Constraints for table `users_teacher`
--
ALTER TABLE `users_teacher`
  ADD CONSTRAINT `users_teacher_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `laboratory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
