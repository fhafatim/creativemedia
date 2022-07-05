-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2021 pada 05.59
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

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
-- Struktur dari tabel `tbl_detail_jadwal`
--

CREATE TABLE `tbl_detail_jadwal` (
  `id_detail_jadwal` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam_mulai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_detail_jadwal`
--

INSERT INTO `tbl_detail_jadwal` (`id_detail_jadwal`, `id_kelas`, `hari`, `jam_mulai`) VALUES
(7, 11, 'Senin', '14:04:00'),
(8, 12, 'Jum\'at', '14:34:00'),
(9, 13, 'Kamis', '15:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_detail_jadwal`
--
ALTER TABLE `tbl_detail_jadwal`
  ADD PRIMARY KEY (`id_detail_jadwal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_jadwal`
--
ALTER TABLE `tbl_detail_jadwal`
  MODIFY `id_detail_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
