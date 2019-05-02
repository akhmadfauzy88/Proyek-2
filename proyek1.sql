-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 04:26 AM
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
-- Database: `proyek1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `dashboard` ()  begin
select * from penjadwalan
join laboratory on penjadwalan.ruang = laboratory.id
join kelas on penjadwalan.kelas = kelas.id
WHERE penjadwalan.status != 'canceled';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `history_kelas` (`id` INT)  begin
	select *, dosen.kode as kdosen
	from transaksi join dosen on transaksi.kode_dosen = dosen.id
  join laboratory on transaksi.ruangan = laboratory.id
	where (status = 'attended' OR status = 'canceled') AND keterangan = 'kelas' AND peminjam = id;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `history_praktikum` (IN `id` INT)  begin
  select *, dosen.kode as kdosen
  from transaksi join dosen on transaksi.kode_dosen = dosen.id
  join laboratory on transaksi.ruangan = laboratory.id
  where (status = 'canceled' OR status = 'attended') AND keterangan = 'praktikum' AND peminjam = id;
  end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_lab` ()  begin
    select * from laboratory;
  end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_transaksi` ()  NO SQL
begin
    select COUNT(*) as jml from transaksi;
  end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_transaksi_kelas` ()  NO SQL
begin
    select COUNT(*) as jml_kelas from transaksi
    where keterangan = 'kelas';
  end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `request_kelas` ()  begin
    select *, dosen.kode as kdosen, transaksi.id as idx
    from transaksi join dosen on transaksi.kode_dosen = dosen.id
    join laboratory on transaksi.ruangan = laboratory.id
    where status = 'pending' and keterangan = 'kelas';
  end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `request_prakt` ()  begin
    select *, dosen.kode as kdosen, transaksi.id as idx
    from transaksi join dosen on transaksi.kode_dosen = dosen.id
    join laboratory on transaksi.ruangan = laboratory.id
    where status = 'pending' and keterangan = 'praktikum';
  end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `statuspinjam_kelas` (IN `uname` VARCHAR(32))  begin
select *, transaksi.id as t_id, laboratory.kode as ruang, dosen.kode as kdosen
from transaksi
join laboratory on transaksi.ruangan = laboratory.id
join dosen on transaksi.kode_dosen = dosen.id
where (status = 'pending' OR status = 'approved') AND keterangan = 'kelas' AND peminjam = uname;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `statuspinjam_praktikum` (IN `uname` VARCHAR(32))  begin
  select *, transaksi.id as t_id, laboratory.kode as ruang, dosen.kode as kdosen
  from transaksi join dosen on transaksi.kode_dosen = dosen.id
  join laboratory on transaksi.ruangan = laboratory.id
  where (status = 'pending' OR status = 'approved') AND (keterangan = 'praktikum' AND peminjam = uname);
  end$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fpinjam` (`ket` VARCHAR(30)) RETURNS INT(3) begin
	declare total_peminjaman int;

	select count(id) into total_peminjaman
	from transaksi
	where keterangan = ket;

	return(total_peminjaman);

	end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `ftotpinjam` () RETURNS INT(3) begin
	declare total_peminjaman int;

	select count(id) into total_peminjaman
	from transaksi;

	return(total_peminjaman);

	end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `kode`, `username`, `password`, `nama_depan`, `nama_belakang`, `email`, `lab`) VALUES
(1, '4050', 'FZY', 'akfzy', 'cocok', 'Akhmad', 'Fauzy', 'ak@fauzy.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(12) NOT NULL,
  `dosen_wali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `dosen_wali`) VALUES
(1, 'D3SI-41-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`id`, `kode`, `nama`) VALUES
(2, 'A1', 'Kelas A1'),
(3, 'A2', 'Kelas A2'),
(4, 'B1', 'Database'),
(5, 'B2', 'Data Mining'),
(6, 'D3', 'Programming'),
(7, 'G2', 'Hardware'),
(8, 'E4', 'Elektronika'),
(9, 'A7', 'Multimedia'),
(10, 'D2', 'Software'),
(11, 'D5', 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `lak`
--

CREATE TABLE `lak` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lak`
--

INSERT INTO `lak` (`id`, `username`, `password`, `nama_depan`, `nama_belakang`, `email`) VALUES
(1, 'lak', 'lak', 'lak', 'lak', 'lak@lak.telkomuniversity.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `kelas` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nim`, `username`, `password`, `nama_depan`, `nama_belakang`, `kelas`, `email`) VALUES
(1, '6701174026', 'berlianaputri', 'cocok', 'Berliana', 'Putri', 1, 'ber@ptr.com');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `ruang` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`id`, `tanggal`, `jam`, `ruang`, `kelas`, `status`) VALUES
(12, '2019-05-01', '08:00:00', 3, 1, 'canceled'),
(13, '2019-05-01', '09:00:00', 3, 1, 'canceled'),
(14, '2019-05-01', '10:00:00', 3, 1, 'canceled'),
(15, '2019-05-01', '08:00:00', 3, 1, 'canceled'),
(16, '2019-05-01', '09:00:00', 3, 1, 'canceled'),
(17, '2019-05-01', '10:00:00', 3, 1, 'canceled'),
(18, '2019-05-01', '08:00:00', 2, 1, 'canceled'),
(19, '2019-05-01', '09:00:00', 2, 1, 'canceled'),
(20, '2019-05-01', '10:00:00', 2, 1, 'canceled'),
(21, '2019-05-02', '08:00:00', 2, 1, 'approved'),
(22, '2019-05-02', '09:00:00', 2, 1, 'approved'),
(23, '2019-05-02', '08:00:00', 3, 1, 'approved'),
(24, '2019-05-02', '09:00:00', 3, 1, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `user`, `subject`, `pesan`) VALUES
(1, 1, 2, 'asgsdgsdg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `peminjam` int(11) NOT NULL,
  `ruangan` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jumlah_jam` int(11) NOT NULL,
  `matakuliah` varchar(30) NOT NULL,
  `kode_dosen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kebutuhan` text,
  `bukti` varchar(255) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `peminjam`, `ruangan`, `jam_masuk`, `jumlah_jam`, `matakuliah`, `kode_dosen`, `tanggal`, `kebutuhan`, `bukti`, `status`, `keterangan`) VALUES
(6, 1, 3, '08:00:00', 3, 'Sql', 1, '2019-05-01', 'fghrg', '1.1.jpeg', 'canceled', 'praktikum'),
(7, 1, 3, '08:00:00', 3, 'SS', 1, '2019-05-01', NULL, NULL, 'canceled', 'kelas'),
(8, 1, 2, '08:00:00', 3, 'Sql', 1, '2019-05-01', NULL, NULL, 'canceled', 'kelas'),
(9, 1, 2, '08:00:00', 2, 'Sql', 1, '2019-05-02', NULL, NULL, 'approved', 'kelas'),
(10, 1, 3, '08:00:00', 2, 'DBMS', 1, '2019-05-02', 'pc', 'Admin.JPG', 'approved', 'praktikum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`,`username`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `lab` (`lab`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_wali` (`dosen_wali`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lak`
--
ALTER TABLE `lak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ruang` (`ruang`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjam` (`peminjam`),
  ADD KEY `ruangan` (`ruangan`),
  ADD KEY `kode_dosen` (`kode_dosen`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lak`
--
ALTER TABLE `lak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`lab`) REFERENCES `laboratory` (`id`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`dosen_wali`) REFERENCES `dosen` (`id`);

--
-- Constraints for table `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `mhs_ibfk_2` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id`);

--
-- Constraints for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `penjadwalan_ibfk_2` FOREIGN KEY (`ruang`) REFERENCES `laboratory` (`id`),
  ADD CONSTRAINT `penjadwalan_ibfk_3` FOREIGN KEY (`status`) REFERENCES `transaksi` (`status`) ON UPDATE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `laboratory` (`id`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`user`) REFERENCES `mhs` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`peminjam`) REFERENCES `mhs` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ruangan`) REFERENCES `laboratory` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kode_dosen`) REFERENCES `dosen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
