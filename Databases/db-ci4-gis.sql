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
(2, 'Sekolah Dasar Muhammadiyah 1 Kisaran', 'Jl. KH. Ahmad Dahlan No.1, Kisaran Kota', '2.981534089270768', '99.62885946035387', '1713530496_8c7a2e4a9c41d661c805.jpg'),
(4, 'SD Negeri 010243', 'JL. Protokol, Binjai Serbangan', '2.9960907262656815', '99.70151245594026', '1713531385_e0649ef774f3974f1d93.jpg'),
(5, 'Sekolah Dasar NEGERI 017107', 'Jln. Prof M. Yamin SH No.52, Kisaran Naga', '2.9668272572780747', '99.63116482024294', '1713529220_d6edb4959317390e93e3.jpg'),
(6, 'SD Swasta Sei Banitan', 'Dusun VI Desa Air Joman Baru, Air Joman Baru', '2.9744545842109855', '99.75764170289041', '1713531579_31e699063ce009fcf7c1.jpg'),
(7, 'SD ISLAM TERPADU QURAN', 'Jl. Jahe, Sentang', '2.9561100709163894', '99.65736597776414', '1713531658_9de781c543b08b9695f4.jpg'),
(8, 'TK Negeri Pembina Kisaran', 'JL. Jend.A.Yani, No. 1, Sendang Sari, Kisaran', '2.962313783537017', '99.6310655772686', '1713531823_55264ec954e783b4837b.jpg'),
(9, 'Paud Tunas Bangsa Air Joman', 'Jalan Protokol Lk. VII, Binjai Serbangan', '2.995690284056952', '99.70212131738664', '1713532109_4775f27c33214b387db5.jpg'),
(10, 'TK DARUSSALAM ASAHAN MERANTI', 'Jl. Perintis Kemerdekaan GANG MANGGIS, Serdang', '3.080244594690379', '99.63671967387202', '1713532200_7518439f579fd8f0a840.jpg'),
(11, 'TK Panti Budaya Kisaran', 'JL. HAMKA NO.42, Kisaran Baru', '2.983986324918625', '99.62503060698512', '1713532450_417acea392a187b2e240.jpg'),
(12, 'TK KEMALA BHAYANGKARI 08', 'JL.PERINTIS KEMERDEKAAN, Kisaran Kota	', '2.985555967147837', '99.62926715612413', '1713532512_4ec177aef0570621bf3a.jpg'),
(13, 'SMP Negeri 1 Sei Dadap', 'Jl. Besar Desa Sei Alim Hasak', '2.905561652084854', '99.64049622416496', '1713533184_c5b183f42b05ec63f8e2.jpg'),
(14, 'SMP Negeri 1 Rawang Panca Arga', ' Jl. Besar Rawang Lama, Rawang Lama', '3.0650971696775056,99', '99.65281426906587', '1713533383_47b9d15112d3afcd73f0.jpg'),
(15, 'UPTD SMP Negeri 6 Kisaran', 'Jl. Lat Sitarda Nusantara, Kisaran Naga', '2.968978182199574', '99.62299615144731', '1713533499_73f3a5e9f81f50620bbb.jpg'),
(16, 'UPTD SMP Negeri 1 Air Joman', 'Jl. Syech Silau, Punggulan', '3.016937625233303', '99.69789683818819', '1713533610_5e11c68fb1963d5b238f.jpg'),
(17, 'SMP NEGERI 1 MERANTI', 'Jl. Karya No.95, Selat Lancang, Datuk Bandar Tim.', '3.061952756422067', '99.62279096245767', '1713533656_c6b9bf2ea280538b4f65.jpg'),
(18, 'SMA NEGERI 1 MERANTI', 'JL. LINTAS SUMATERA KM. 155, Perkebunan Sei Balai', '3.061490735808783', '99.60433065891267', '1713533833_0267e4261c9828091c1d.jpg'),
(19, 'SMA Daar Al-uluum Kisaran', 'Jln. Mahoni (Sibogat) Kisaran, Mekar Baru', '2.9885519418655333', '99.62010875344278', '1713533985_4ddea7a69469b48efce8.jpg'),
(20, 'SMA NEGERI 4 KISARAN', 'Jl. Pondok Indah No. 11 Kisaran, Sei Renggas', '2.9791528306356945', '99.60513263940813', '1713534080_32081cf07ef046229177.jpg'),
(21, 'SMA N 1 Kisaran', 'SMA N 1, Jl. Madong Lubis No.5, Kisaran Kota', '2.980158638482988', '99.63852748274803', '1713534136_15ebaed5d4c42de66793.jpg'),
(22, 'SMA Negeri 2 Kisaran', 'JL. SITARDA NUSANTARA VIII KISARAN, Kisaran Naga', '2.969690691897867', '99.62711602449419', '1713534291_766dcdd6d22755d4ec2b.jpg');

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
