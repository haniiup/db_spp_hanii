-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2026 at 07:35 AM
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
-- Database: `db_spp_hanii`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(5) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
('1', 'XII RPL 2', 'Rekayasa Perangkat Lunak'),
('3', 'XII ULW', 'Usaha Layanan Wisata');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `no_bayar` varchar(11) DEFAULT NULL,
  `id_petugas` varchar(5) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `bulan_tagihan` varchar(12) DEFAULT NULL,
  `tahun_tagihan` int(4) DEFAULT NULL,
  `id_spp` varchar(5) DEFAULT NULL,
  `keterangan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `no_bayar`, `id_petugas`, `nisn`, `tgl_pembayaran`, `bulan_tagihan`, `tahun_tagihan`, `id_spp`, `keterangan`) VALUES
(1, '2609050001', 'A01', '1234', '2026-09-05', 'Juli', 2026, '2', 'LUNAS'),
(2, '2609050002', 'A01', '1234', '2026-09-05', 'Agustus', 2026, '2', 'LUNAS'),
(3, NULL, NULL, '1234', NULL, 'September', 2026, '2', NULL),
(4, NULL, NULL, '1234', NULL, 'Oktober', 2026, '2', NULL),
(5, NULL, NULL, '1234', NULL, 'November', 2026, '2', NULL),
(6, NULL, NULL, '1234', NULL, 'Desember', 2026, '2', NULL),
(7, NULL, NULL, '1234', NULL, 'Januari', 2027, '2', NULL),
(8, NULL, NULL, '1234', NULL, 'Februari', 2027, '2', NULL),
(9, NULL, NULL, '1234', NULL, 'Maret', 2027, '2', NULL),
(10, NULL, NULL, '1234', NULL, 'April', 2027, '2', NULL),
(11, NULL, NULL, '1234', NULL, 'Mei', 2027, '2', NULL),
(12, NULL, NULL, '1234', NULL, 'Juni', 2027, '2', NULL),
(13, NULL, NULL, '2222', NULL, 'Juli', 2026, '4', NULL),
(14, NULL, NULL, '2222', NULL, 'Agustus', 2026, '4', NULL),
(15, NULL, NULL, '2222', NULL, 'September', 2026, '4', NULL),
(16, NULL, NULL, '2222', NULL, 'Oktober', 2026, '4', NULL),
(17, NULL, NULL, '2222', NULL, 'November', 2026, '4', NULL),
(18, NULL, NULL, '2222', NULL, 'Desember', 2026, '4', NULL),
(19, NULL, NULL, '2222', NULL, 'Januari', 2027, '4', NULL),
(20, NULL, NULL, '2222', NULL, 'Februari', 2027, '4', NULL),
(21, NULL, NULL, '2222', NULL, 'Maret', 2027, '4', NULL),
(22, NULL, NULL, '2222', NULL, 'April', 2027, '4', NULL),
(23, NULL, NULL, '2222', NULL, 'Mei', 2027, '4', NULL),
(24, NULL, NULL, '2222', NULL, 'Juni', 2027, '4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
('A01', 'admin', 'a36b0dcd1e6384abc0e1867860ad3ee3', 'Kade', 'admin'),
('A02', 'petugas', 'f1981e4bd8a0d6d8462016d2fc6276b3', 'hani', 'petugas'),
('A04', 'admin', 'a9b7ba70783b617e9998dc4dd82eb3c5', 'Sunghoon', 'admin'),
('A05', 'admin', '2009', 'Rora', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_spp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('1234', '123456', 'Nur Haniifah', '1', 'Banjarbaru', '089898989989', '2'),
('2222', '23245687', 'Sunghoon', '3', 'Trikora', '1456777890', '4');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` varchar(5) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
('2', 2026, 170000),
('4', 2026, 200000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_bfk_1` (`id_petugas`),
  ADD KEY `pembayaran_bfk_2` (`nisn`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_bfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_bfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
