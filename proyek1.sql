-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 01:13 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `cek_pesan` ()  NO SQL
SELECT pesan.id, pesan.pesan, mhs.email, laboratory.kode FROM pesan
JOIN mhs ON pesan.user = mhs.id
JOIN laboratory ON pesan.subject = laboratory.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dashboard` ()  begin
select * from penjadwalan
join laboratory on penjadwalan.ruang = laboratory.id
join kelas on penjadwalan.kelas = kelas.id
WHERE penjadwalan.status != 'canceled';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `history_kelas` (IN `id` INT)  begin
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
(24, '2019-05-02', '09:00:00', 3, 1, 'approved'),
(25, '2019-05-08', '08:00:00', 2, 1, 'canceled'),
(26, '2019-05-08', '09:00:00', 2, 1, 'canceled'),
(27, '2019-05-02', '08:00:00', 4, 1, 'canceled'),
(28, '2019-05-02', '09:00:00', 4, 1, 'canceled'),
(29, '2019-05-02', '10:00:00', 4, 1, 'canceled'),
(30, '2019-05-03', '09:00:00', 4, 1, 'canceled'),
(31, '2019-05-03', '10:00:00', 4, 1, 'canceled'),
(32, '2019-05-04', '10:00:00', 4, 1, 'canceled'),
(33, '2019-05-04', '11:00:00', 4, 1, 'canceled'),
(34, '2019-05-06', '08:00:00', 2, 1, 'approved'),
(35, '2019-05-06', '09:00:00', 2, 1, 'approved'),
(36, '2019-05-05', '15:00:00', 2, 1, 'declined'),
(37, '2019-05-05', '16:00:00', 2, 1, 'declined'),
(38, '2019-05-05', '17:00:00', 2, 1, 'declined'),
(39, '2019-05-06', '08:00:00', 5, 1, 'declined'),
(40, '2019-05-06', '09:00:00', 5, 1, 'declined'),
(41, '2019-05-03', '10:00:00', 5, 1, 'declined'),
(42, '2019-05-03', '11:00:00', 5, 1, 'declined'),
(43, '2019-05-04', '11:00:00', 5, 1, 'approved'),
(44, '2019-05-04', '12:00:00', 5, 1, 'approved'),
(45, '2019-05-04', '13:00:00', 5, 1, 'approved'),
(46, '2019-05-06', '08:00:00', 3, 1, 'pending'),
(47, '2019-05-06', '09:00:00', 3, 1, 'pending'),
(48, '2019-05-06', '10:00:00', 3, 1, 'pending'),
(49, '2019-05-06', '10:00:00', 2, 1, 'pending'),
(50, '2019-05-06', '15:00:00', 2, 1, 'pending'),
(51, '2019-05-06', '13:00:00', 3, 1, 'pending'),
(52, '2019-05-06', '08:00:00', 10, 1, 'pending'),
(53, '2019-05-06', '09:00:00', 10, 1, 'pending');

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
(10, 1, 3, '08:00:00', 2, 'DBMS', 1, '2019-05-02', 'pc', 'Admin.JPG', 'approved', 'praktikum'),
(12, 1, 2, '08:00:00', 2, 'Jarkom', 1, '2019-05-08', NULL, NULL, 'canceled', 'kelas'),
(14, 1, 4, '08:00:00', 3, 'Perilaku Organisasi', 1, '2019-05-02', NULL, NULL, 'canceled', 'kelas'),
(15, 1, 4, '09:00:00', 2, 'PBD', 1, '2019-05-03', 'PC', 'readme.rst', 'approved', 'praktikum'),
(16, 1, 4, '10:00:00', 2, 'PWL', 1, '2019-05-04', NULL, NULL, 'declined', 'kelas'),
(19, 1, 2, '08:00:00', 2, 'PBD', 1, '2019-05-06', 'jkhk', 'readme.rst', 'pending', 'praktikum'),
(20, 1, 2, '15:00:00', 3, 'PBD', 1, '2019-05-05', 'pc', 'ERD.graphml', 'pending', 'praktikum'),
(21, 1, 5, '08:00:00', 2, 'PWL', 1, '2019-05-06', NULL, NULL, 'approved', 'kelas'),
(22, 1, 5, '10:00:00', 2, 'PBD', 1, '2019-05-03', NULL, NULL, 'pending', 'kelas'),
(23, 1, 5, '11:00:00', 3, 'Jarkom', 1, '2019-05-04', NULL, NULL, 'pending', 'kelas'),
(24, 1, 3, '08:00:00', 2, 'SS', 1, '2019-05-06', 'p', NULL, 'pending', 'praktikum'),
(25, 1, 3, '10:00:00', 1, 'SS', 1, '2019-05-06', 'j', NULL, 'pending', 'praktikum'),
(26, 1, 2, '10:00:00', 1, 'SS', 1, '2019-05-06', 'lkj', NULL, 'pending', 'praktikum'),
(27, 1, 2, '15:00:00', 1, 'SS', 1, '2019-05-06', 'jkk', NULL, 'pending', 'praktikum'),
(28, 1, 3, '13:00:00', 1, 'SS', 1, '2019-05-06', 'asv', NULL, 'pending', 'praktikum'),
(29, 1, 10, '08:00:00', 1, 'SS', 1, '2019-05-06', 'bhjbh', 'Blok Diagram.png', 'pending', 'praktikum'),
(30, 1, 10, '09:00:00', 1, 'SS', 1, '2019-05-06', 'vz', 'Blok Diagram.png', 'pending', 'praktikum');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `afterinsert_trans` AFTER INSERT ON `transaksi` FOR EACH ROW begin
 insert into transaksi_pinjam
 set
 id = NEW.id,
 tgl_trans = now(),
 tgl_pinjam = NEW.tanggal,
 mata_kuliah = NEW.matakuliah,
 keterangan = NEW.keterangan,
 aksi = 'INSERT';
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pinjam`
--

CREATE TABLE `transaksi_pinjam` (
  `id` int(50) DEFAULT NULL,
  `tgl_trans` date DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `mata_kuliah` varchar(30) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `aksi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pinjam`
--

INSERT INTO `transaksi_pinjam` (`id`, `tgl_trans`, `tgl_pinjam`, `mata_kuliah`, `keterangan`, `aksi`) VALUES
(19, '2019-05-02', '2019-05-06', 'PBD', 'praktikum', 'INSERT'),
(20, '2019-05-02', '2019-05-05', 'PBD', 'praktikum', 'INSERT'),
(21, '2019-05-02', '2019-05-06', 'PWL', 'kelas', 'INSERT'),
(22, '2019-05-02', '2019-05-03', 'PBD', 'kelas', 'INSERT'),
(23, '2019-05-04', '2019-05-04', 'Jarkom', 'kelas', 'INSERT'),
(24, '2019-05-06', '2019-05-06', 'SS', 'praktikum', 'INSERT'),
(25, '2019-05-06', '2019-05-06', 'SS', 'praktikum', 'INSERT'),
(26, '2019-05-06', '2019-05-06', 'SS', 'praktikum', 'INSERT'),
(27, '2019-05-06', '2019-05-06', 'SS', 'praktikum', 'INSERT'),
(28, '2019-05-06', '2019-05-06', 'SS', 'praktikum', 'INSERT'),
(29, '2019-05-06', '2019-05-06', 'SS', 'praktikum', 'INSERT'),
(30, '2019-05-06', '2019-05-06', 'SS', 'praktikum', 'INSERT');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
