-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Des 2015 pada 09.17
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_erasoft`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `actions_maintenance`
--

CREATE TABLE IF NOT EXISTS `actions_maintenance` (
  `id_actions` int(11) NOT NULL,
  `nama_action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bugs`
--

CREATE TABLE IF NOT EXISTS `bugs` (
  `id_bugs` int(11) NOT NULL,
  `nama_bugs` varchar(100) NOT NULL,
  `penyelesaian` text NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL,
  `nama_pt` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `client_support`
--

CREATE TABLE IF NOT EXISTS `client_support` (
  `id_cs` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_support` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rencana_kunjungan`
--

CREATE TABLE IF NOT EXISTS `rencana_kunjungan` (
  `id_rk` int(11) NOT NULL,
  `tgl_kunjungan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_client` int(11) NOT NULL,
  `id_support` int(11) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `aktifitas` text NOT NULL,
  `tipe` enum('kunjungan','remote') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rk_detail`
--

CREATE TABLE IF NOT EXISTS `rk_detail` (
  `id_rk_detail` int(11) NOT NULL,
  `id_bugs` int(11) NOT NULL,
  `id_rk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `server_maintenance`
--

CREATE TABLE IF NOT EXISTS `server_maintenance` (
  `id_sm` int(11) NOT NULL,
  `periode` varchar(15) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_support` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sm_detail`
--

CREATE TABLE IF NOT EXISTS `sm_detail` (
  `id_sm_detail` int(11) NOT NULL,
  `id_sm` int(11) NOT NULL,
  `id_action` int(11) NOT NULL,
  `checked` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `software`
--

CREATE TABLE IF NOT EXISTS `software` (
  `id_software` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `versi` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `software`
--

INSERT INTO `software` (`id_software`, `nama`, `versi`) VALUES
(1, 'Aplikasi Hendors', '1.0'),
(2, 'Aplikasi Web 3', '2.0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `software_detail`
--

CREATE TABLE IF NOT EXISTS `software_detail` (
  `id_detail` int(11) NOT NULL,
  `id_software` int(11) NOT NULL,
  `nama_modul` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `software_detail`
--

INSERT INTO `software_detail` (`id_detail`, `id_software`, `nama_modul`) VALUES
(1, 1, 'accounting'),
(2, 1, 'hrd'),
(3, 2, 'accounting'),
(4, 2, 'finance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` int(11) NOT NULL,
  `nomor_tiket` varchar(10) NOT NULL,
  `id_client` int(11) NOT NULL,
  `masalah` text NOT NULL,
  `status` enum('open','process','finish','cancelled') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('administrator','client','pm','support') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Project Manager', 'pm@kompas.com', '$2y$10$eWv0KaGtaKZkSfniIURMhuB4FnjyBCX4XotMisKx/kNVSMjy4UnxO', 'pm', 'active', '', '2015-10-19 02:54:11', '0000-00-00 00:00:00'),
(7, 'Tech Support', 'support@kompas.com', '$2y$10$gyGVrqvFhQTbDtey2dFz4.xwO7oCnRMBneJ/lYZZYlW32MOLeBjpq', 'support', 'active', 'J6T3pRuZE51c19rdobpBJBHqmZ2ORrK4qn0hfkhHKicxiMeYQQfWGpXhwniD', '2015-11-22 16:17:52', '2015-11-22 09:17:52'),
(9, 'Client', 'client@kompas.com', '$2y$10$xZIe3QXrPFHocOuqwKxRju4Q56qVVitekNzL6zrG7ui44k38dW40G', 'client', 'active', '', '2015-10-20 07:44:18', '0000-00-00 00:00:00'),
(10, 'Admin', 'admin@kompas.com', '$2y$10$0nU7h6Seey9PUq5A98qUPu3o1cWQeAx7YOIFYuWuEsJ7t7SqtoPNS', 'administrator', 'active', 'CXJtvzI1Zt1fnOvDqKodRG3xt47wGbxxNVY88deWav17lkFwmIvHBYWK2y9d', '2015-11-27 12:17:48', '2015-11-27 05:17:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions_maintenance`
--
ALTER TABLE `actions_maintenance`
  ADD PRIMARY KEY (`id_actions`);

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`id_bugs`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `client_support`
--
ALTER TABLE `client_support`
  ADD PRIMARY KEY (`id_cs`);

--
-- Indexes for table `rencana_kunjungan`
--
ALTER TABLE `rencana_kunjungan`
  ADD PRIMARY KEY (`id_rk`);

--
-- Indexes for table `rk_detail`
--
ALTER TABLE `rk_detail`
  ADD PRIMARY KEY (`id_rk_detail`);

--
-- Indexes for table `server_maintenance`
--
ALTER TABLE `server_maintenance`
  ADD PRIMARY KEY (`id_sm`);

--
-- Indexes for table `sm_detail`
--
ALTER TABLE `sm_detail`
  ADD PRIMARY KEY (`id_sm_detail`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id_software`);

--
-- Indexes for table `software_detail`
--
ALTER TABLE `software_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions_maintenance`
--
ALTER TABLE `actions_maintenance`
  MODIFY `id_actions` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `id_bugs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client_support`
--
ALTER TABLE `client_support`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rencana_kunjungan`
--
ALTER TABLE `rencana_kunjungan`
  MODIFY `id_rk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rk_detail`
--
ALTER TABLE `rk_detail`
  MODIFY `id_rk_detail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `server_maintenance`
--
ALTER TABLE `server_maintenance`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sm_detail`
--
ALTER TABLE `sm_detail`
  MODIFY `id_sm_detail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `software_detail`
--
ALTER TABLE `software_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
