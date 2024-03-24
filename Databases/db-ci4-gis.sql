-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2024 pada 13.35
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-ci4-gis`
--
CREATE DATABASE IF NOT EXISTS `db-ci4-gis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db-ci4-gis`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi`
--

DROP TABLE IF EXISTS `tbl_lokasi`;
CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(255) DEFAULT NULL,
  `alamat_lokasi` text DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `foto_lokasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `nama_lokasi`, `alamat_lokasi`, `latitude`, `longitude`, `foto_lokasi`) VALUES
(2, 'Lokasi B', 'Jl. Lokasi B', '2.998327307145038', '99.60998372758314', '1711270643_dc100f1b9bbc69b27b89.jpg'),
(3, 'Lokasi C', 'Jl. Lokasi C', '2.9915559440659636', '99.60282018038293', '1711270811_883a1dd8eed22d700d12.jpg'),
(4, 'Cokroaminoto', 'Jl H.OS Cokroaminoto', '2.9849988247702672', '99.62915801260391', '1711271066_5163ebfcea626c761127.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
