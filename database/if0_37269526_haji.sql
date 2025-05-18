-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql100.infinityfree.com
-- Waktu pembuatan: 31 Des 2024 pada 23.36
-- Versi server: 10.6.19-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37269526_haji`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_custom`
--

CREATE TABLE `file_custom` (
  `id_file` tinyint(11) NOT NULL,
  `id_materi` tinyint(11) NOT NULL,
  `judul_file` text NOT NULL,
  `nama_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `file_custom`
--

INSERT INTO `file_custom` (`id_file`, `id_materi`, `judul_file`, `nama_file`) VALUES
(40, 27, '1. Pengertian Haji', '6720ff84aa212.mp4'),
(41, 27, '1. Pengertian Haji', '6720ffc43a783.pdf'),
(42, 29, '2. Hukum dan Dalil Haji', '672163f4b5601.mp4'),
(43, 29, '2. Hukum dan Dalil Haji', '672164200d659.pdf'),
(44, 30, '3. Syarat Wajib Haji dan Umrah', '672164ad71543.mp4'),
(45, 30, '3. Syarat Wajib Haji dan Umrah', '672164d001e7b.pdf'),
(46, 31, '4. Rukun Haji', '672165341f0b3.mp4'),
(47, 31, '4. Rukun Haji', '672165543f68d.pdf'),
(48, 32, '5. Wajib Haji', '672165b654ea2.pdf'),
(49, 32, '5. Wajib Haji', '672165fcd7e27.mp4'),
(50, 33, '6. Sunnah Haji', '672166894f9b7.mp4'),
(51, 33, '6. Sunnah Haji', '672166afe77f0.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` tinyint(11) NOT NULL,
  `id_menu` tinyint(11) NOT NULL,
  `nama_materi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_menu`, `nama_materi`) VALUES
(27, 1, '01. Pengertian Haji'),
(29, 1, '02. Hukum & Dalil Haji'),
(30, 1, '03. Syarat Wajib & Syarat Sah Haji'),
(31, 1, '04. Rukun Haji'),
(32, 1, '05. Wajib Haji'),
(33, 1, '06. Sunnah Haji');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` tinyint(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `id_semester` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `id_semester`) VALUES
(1, 'Haji & Umrah', 4),
(11, 'Najis Dan Cara Mensucikannya', 1),
(12, 'Hadast Dan Cara Mensucikannya', 1),
(13, 'Shalat Lima Waktu', 1),
(14, 'Waktu-Waktu Shalat', 1),
(15, 'Bacaan Shalat', 1),
(16, 'Sujud Sahwi', 1),
(17, 'Adzan Dan Iqamah', 1),
(18, 'Shalat Berjamaah', 2),
(19, 'Dzikir Dan Berdoa', 2),
(20, 'Shalat Jumat', 2),
(21, 'Shalat Jenazah', 2),
(22, 'Shalat Jama\' Dan Qashar', 2),
(23, 'Shalat Dalam Keadaan Darurat', 2),
(24, 'Sujud Syukur Dan Sujud Tilawah', 3),
(25, 'Puasa', 3),
(26, 'Zakat', 3),
(27, 'Hibah,Hadiah Dan Sedekah', 4),
(28, 'Makanan Dan Minuman Halal Dan Haram', 4),
(29, 'Tata Cara Penyembelihan', 5),
(30, 'Aqiqah', 5),
(31, 'Qurban', 5),
(32, 'Jual Beli', 5),
(33, 'Riba', 5),
(34, 'Gadai Borog', 6),
(35, 'Upah', 6),
(36, 'Hutang Piutang', 6),
(37, 'Pinjam Meminjam', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_mahasiswa`
--

CREATE TABLE `tugas_mahasiswa` (
  `id_tugas_mahasiswa` int(11) NOT NULL,
  `id_tugas_dosen` int(11) NOT NULL,
  `judul_tugas` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_tabel`
--

CREATE TABLE `tugas_tabel` (
  `id_tugas` tinyint(11) NOT NULL,
  `type_table` varchar(20) NOT NULL,
  `judul_tugas` text NOT NULL,
  `nama_file` text NOT NULL,
  `id_pertemuan` tinyint(11) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) DEFAULT NULL,
  `created_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `created_date`, `kelas`) VALUES
(5, 'admin', '$2y$10$XFtVAjObKRNurftVkLCK/ebDsxd8NoZc.rP8vWmQZmXqEWwQbVP4W', 'admin', '2020-08-15 09:59:43.000000', ''),
(27, 'siswa', '$2y$10$EWCUVr1KFw2D63gbZ1Wn4.0AVjB/KJDwkO4RRnJZS6kbQhqqwRkNG', 'siswa', '2024-10-25 15:18:54.840809', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `file_custom`
--
ALTER TABLE `file_custom`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas_mahasiswa`
--
ALTER TABLE `tugas_mahasiswa`
  ADD PRIMARY KEY (`id_tugas_mahasiswa`);

--
-- Indeks untuk tabel `tugas_tabel`
--
ALTER TABLE `tugas_tabel`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `file_custom`
--
ALTER TABLE `file_custom`
  MODIFY `id_file` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tugas_mahasiswa`
--
ALTER TABLE `tugas_mahasiswa`
  MODIFY `id_tugas_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tugas_tabel`
--
ALTER TABLE `tugas_tabel`
  MODIFY `id_tugas` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
