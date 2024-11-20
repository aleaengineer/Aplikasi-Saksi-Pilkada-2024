-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2024 pada 12.10
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
-- Database: `db_saksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_saksi`
--

CREATE TABLE `data_saksi` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nomor_tps` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_saksi`
--

INSERT INTO `data_saksi` (`id`, `nama_lengkap`, `nik`, `nomor_tps`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `latitude`, `longitude`, `gambar`, `created_at`) VALUES
(3, 'Farhan Maulana Syidiq', '3207211212990002', 1, 'Dusun Ciheras RT.003 Rw.003', 'Sukaresik', 'Sidamulih', 'Pangandaran', '-7.6578816', '108.6062592', 'Foto Me.jpg', '2024-11-20 09:29:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_suara`
--

CREATE TABLE `hasil_suara` (
  `id` int(11) NOT NULL,
  `nomor_tps` int(11) NOT NULL,
  `nama_saksi` varchar(100) NOT NULL,
  `kandidat1` int(11) DEFAULT 0,
  `kandidat2` int(11) DEFAULT 0,
  `suara_tidak_sah` int(11) DEFAULT 0,
  `gambar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$z.R4wq90RUNaDSfP1exZAus5hN1MptQkKC.mnQF7DqfF5iz/.lATS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_saksi`
--
ALTER TABLE `data_saksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasil_suara`
--
ALTER TABLE `hasil_suara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_saksi`
--
ALTER TABLE `data_saksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hasil_suara`
--
ALTER TABLE `hasil_suara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
