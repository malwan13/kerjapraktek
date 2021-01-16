-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2021 pada 11.35
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembayaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Irfan', 'irfansholeh2001@gmail.com', 'd12f14157c21b39cc8cc257dc5662f34217524f9'),
(2, 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_pembayaran`
--

CREATE TABLE `bukti_pembayaran` (
  `id_bukti_pembayaran` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `bukti_bayar` varchar(200) NOT NULL,
  `total_bayar` varchar(35) NOT NULL,
  `sisa_bayar` varchar(35) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `payment_ids` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bukti_pembayaran`
--

INSERT INTO `bukti_pembayaran` (`id_bukti_pembayaran`, `user_id`, `semester`, `bukti_bayar`, `total_bayar`, `sisa_bayar`, `tanggal`, `keterangan`, `payment_ids`) VALUES
(3, 1901117, 1, 'bukti_bayar/qm-featured.jpg', '8000000', '1000000', '2021-01-16', '', '5,7'),
(5, 1901117, 2, 'bukti_bayar/qm-featured.jpg', '4000000', '0', '2021-01-16', '', '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_pembayaran_tunggak`
--

CREATE TABLE `bukti_pembayaran_tunggak` (
  `id_bukti_pembayaran` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `bukti_bayar` varchar(200) NOT NULL,
  `total_bayar` varchar(35) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bukti_pembayaran_tunggak`
--

INSERT INTO `bukti_pembayaran_tunggak` (`id_bukti_pembayaran`, `user_id`, `semester`, `bukti_bayar`, `total_bayar`, `tanggal`, `keterangan`) VALUES
(1, 1901117, 1, 'bukti_bayar/WhatsApp Image 2021-01-06 at 14.17.53.jpeg', '1000000', '2021-01-18', 'Tunggkannya sorry');

-- --------------------------------------------------------

--
-- Struktur dari tabel `generation`
--

CREATE TABLE `generation` (
  `generation_id` int(11) NOT NULL,
  `generation` varchar(10) NOT NULL,
  `status` enum('active','draft') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `generation`
--

INSERT INTO `generation` (`generation_id`, `generation`, `status`) VALUES
(2, '2020', 'active'),
(3, '2017', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `payment_id` int(11) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `generation_id` varchar(25) NOT NULL,
  `status` enum('draft','published') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`payment_id`, `payment`, `nominal`, `generation_id`, `status`) VALUES
(4, 'SPP', '10000000', '1', 'published'),
(5, 'SPP', '4000000', '2', 'published'),
(6, 'Wisuda', '1000000', '2', 'published'),
(7, 'Sidang', '4000000', '2', 'published');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_semester`
--

CREATE TABLE `pembayaran_semester` (
  `pembayaran_semester_id` int(35) NOT NULL,
  `payment_id` int(35) NOT NULL,
  `semester` int(35) NOT NULL,
  `generation_id` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran_semester`
--

INSERT INTO `pembayaran_semester` (`pembayaran_semester_id`, `payment_id`, `semester`, `generation_id`) VALUES
(9, 5, 1, 2),
(10, 6, 1, 2),
(11, 7, 1, 2),
(12, 7, 2, 2),
(13, 7, 3, 2),
(14, 7, 4, 2),
(15, 7, 5, 2),
(16, 7, 6, 2),
(17, 7, 7, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nim` varchar(15) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `program` varchar(25) NOT NULL,
  `generation` varchar(5) NOT NULL,
  `address` varchar(150) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nim`, `name`, `email`, `program`, `generation`, `address`, `no_handphone`, `password`) VALUES
('1700067', 'Malwan Fauzan', 'malwan0013@gmail.com', 'Teknik Informatika', '3', 'Bandung', '085864644449', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD PRIMARY KEY (`id_bukti_pembayaran`);

--
-- Indeks untuk tabel `bukti_pembayaran_tunggak`
--
ALTER TABLE `bukti_pembayaran_tunggak`
  ADD PRIMARY KEY (`id_bukti_pembayaran`);

--
-- Indeks untuk tabel `generation`
--
ALTER TABLE `generation`
  ADD PRIMARY KEY (`generation_id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeks untuk tabel `pembayaran_semester`
--
ALTER TABLE `pembayaran_semester`
  ADD PRIMARY KEY (`pembayaran_semester_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  MODIFY `id_bukti_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bukti_pembayaran_tunggak`
--
ALTER TABLE `bukti_pembayaran_tunggak`
  MODIFY `id_bukti_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `generation`
--
ALTER TABLE `generation`
  MODIFY `generation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_semester`
--
ALTER TABLE `pembayaran_semester`
  MODIFY `pembayaran_semester_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
