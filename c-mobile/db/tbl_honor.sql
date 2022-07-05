-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 11:14 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infocrea_apps-backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_honor`
--

CREATE TABLE `tbl_honor` (
  `id_honor` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `no_pendaftaran` varchar(100) NOT NULL,
  `nama_tentor` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `bidang_studi` varchar(100) NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `tanggal_pembayaran` varchar(100) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `jumlah_pembayaran` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `nomor_rekening` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `kategori_pembayaran` varchar(100) NOT NULL,
  `tempat_pembayaran` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_honor`
--

INSERT INTO `tbl_honor` (`id_honor`, `id_kelas`, `no_pendaftaran`, `nama_tentor`, `nama_siswa`, `bidang_studi`, `tanggal_selesai`, `nominal`, `tanggal_pembayaran`, `jenis_pembayaran`, `jumlah_pembayaran`, `bank`, `nomor_rekening`, `atas_nama`, `kategori_pembayaran`, `tempat_pembayaran`, `created_date`, `updated_date`) VALUES
(4, 1, 'CM211', 'tentor1', 'nailul abrori', 'Pemrograman Web', '2021-09-30', '1000000', '2021-09-30', 'tunai', '1000000', '', '', '', 'semua', 'tubanan', '2021-09-23 16:06:07', '2021-09-23 16:06:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_honor`
--
ALTER TABLE `tbl_honor`
  ADD PRIMARY KEY (`id_honor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_honor`
--
ALTER TABLE `tbl_honor`
  MODIFY `id_honor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
