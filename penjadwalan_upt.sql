-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Apr 2017 pada 09.08
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjadwalan_upt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(55) NOT NULL,
  `nama_pengajar` varchar(55) NOT NULL,
  `nama_ruang` varchar(55) NOT NULL,
  `start` double NOT NULL,
  `end` double NOT NULL,
  `senin` int(11) NOT NULL,
  `selasa` int(11) NOT NULL,
  `rabu` int(11) NOT NULL,
  `kamis` int(11) NOT NULL,
  `jumat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama_kelas`, `nama_pengajar`, `nama_ruang`, `start`, `end`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`) VALUES
(1, 'BIPA A', 'lala', '102\r\n', 7, 10.5, 1, 0, 0, 0, 0),
(2, 'BIPA B', 'lala', '101\r\n', 10.5, 15, 1, 0, 0, 0, 0),
(3, 'BIPA C', 'po', '101\r\n', 7, 10.5, 0, 1, 0, 0, 0),
(4, 'BIPA D', 'po', '102\r\n', 10.5, 15, 0, 1, 0, 0, 0),
(5, 'AW', 'tinky', '101\r\n', 16.5, 18, 1, 0, 0, 0, 0),
(6, 'GE 1', 'tinky', '101\r\n', 18.5, 20, 1, 0, 0, 0, 0),
(7, 'GE 2 A', 'dipsy', '102\r\n', 16.5, 18, 1, 0, 0, 0, 0),
(8, 'GE 2 B', 'dipsy', '101\r\n', 18.5, 20, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `start` double NOT NULL,
  `end` double NOT NULL,
  `senin` int(11) NOT NULL,
  `selasa` int(11) NOT NULL,
  `rabu` int(11) NOT NULL,
  `kamis` int(11) NOT NULL,
  `jumat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `start`, `end`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`) VALUES
(1, 'BIPA A', 7, 10.5, 1, 0, 0, 0, 0),
(2, 'BIPA B', 10.5, 15, 1, 0, 0, 0, 0),
(3, 'BIPA C', 7, 10.5, 0, 1, 0, 0, 0),
(4, 'BIPA D', 10.5, 15, 0, 1, 0, 0, 0),
(5, 'AW', 16.5, 18, 1, 0, 0, 0, 0),
(6, 'GE 1', 18.5, 20, 1, 0, 0, 0, 0),
(7, 'GE 2 A', 16.5, 18, 1, 0, 0, 0, 0),
(8, 'GE 2 B', 18.5, 20, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `nama_kelas` varchar(55) NOT NULL,
  `start` double NOT NULL,
  `end` double NOT NULL,
  `senin` int(11) NOT NULL,
  `selasa` int(11) NOT NULL,
  `rabu` int(11) NOT NULL,
  `kamis` int(11) NOT NULL,
  `jumat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id`, `nama`, `nama_kelas`, `start`, `end`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`) VALUES
(1, 'lala', 'BIPA', 7, 10.5, 1, 0, 0, 0, 0),
(2, 'lala', 'BIPA', 10.5, 15, 1, 0, 0, 0, 0),
(3, 'po', 'BIPA', 7, 10.5, 0, 1, 0, 0, 0),
(4, 'po', 'BIPA', 10.5, 15, 0, 1, 0, 0, 0),
(5, 'tinky', 'AW', 16.5, 18, 1, 0, 0, 0, 0),
(6, 'tinky', 'GE 1', 18.5, 20, 1, 0, 0, 0, 0),
(7, 'dipsy', 'GE 2', 16.5, 18, 1, 0, 0, 0, 0),
(8, 'dipsy', 'GE 2', 18.5, 20, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id`, `nama`) VALUES
(1, '101\r\n'),
(2, '102\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
