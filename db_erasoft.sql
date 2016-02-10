-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2016 at 06:40 AM
-- Server version: 5.5.46-MariaDB-1ubuntu0.14.04.2
-- PHP Version: 5.6.17-3+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_erasoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions_maintenance`
--

CREATE TABLE IF NOT EXISTS `actions_maintenance` (
  `id_actions` int(11) NOT NULL AUTO_INCREMENT,
  `nama_action` varchar(20) NOT NULL,
  PRIMARY KEY (`id_actions`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE IF NOT EXISTS `bugs` (
  `id_bugs` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bugs` varchar(100) NOT NULL,
  `penyelesaian` text NOT NULL,
  `id_software` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  PRIMARY KEY (`id_bugs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id_bugs`, `nama_bugs`, `penyelesaian`, `id_software`, `id_modul`) VALUES
(1, 'test', 'test estest se', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pt` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nama_pt`, `pic`, `alamat`, `no_telepon`, `id_user`, `lat`, `lon`, `created_at`, `updated_at`) VALUES
(2, 'PT Singoedan', 'Ilma', 'Rawabuntu', '08421231', 12, 0, 0, '2016-01-24 00:49:49', '2016-01-24 00:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `client_support`
--

CREATE TABLE IF NOT EXISTS `client_support` (
  `id_cs` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_support` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_cs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `client_support`
--

INSERT INTO `client_support` (`id_cs`, `id_client`, `id_support`, `created_at`, `updated_at`) VALUES
(1, 2, 7, '2016-01-24 00:49:49', '2016-01-24 00:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `rencana_kunjungan`
--

CREATE TABLE IF NOT EXISTS `rencana_kunjungan` (
  `id_rk` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_kunjungan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_client` int(11) NOT NULL,
  `id_support` int(11) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `aktifitas` text NOT NULL,
  `tipe` enum('kunjungan','remote') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_rk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rk_detail`
--

CREATE TABLE IF NOT EXISTS `rk_detail` (
  `id_rk_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_bugs` int(11) NOT NULL,
  `id_rk` int(11) NOT NULL,
  PRIMARY KEY (`id_rk_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `server_maintenance`
--

CREATE TABLE IF NOT EXISTS `server_maintenance` (
  `id_sm` int(11) NOT NULL AUTO_INCREMENT,
  `periode` varchar(15) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_support` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_sm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sm_detail`
--

CREATE TABLE IF NOT EXISTS `sm_detail` (
  `id_sm_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_sm` int(11) NOT NULL,
  `id_action` int(11) NOT NULL,
  `checked` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_sm_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE IF NOT EXISTS `software` (
  `id_software` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `versi` varchar(10) NOT NULL,
  PRIMARY KEY (`id_software`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`id_software`, `nama`, `versi`) VALUES
(1, 'Aplikasi Hendors', '1.0'),
(2, 'Aplikasi Web 3', '2.0');

-- --------------------------------------------------------

--
-- Table structure for table `software_detail`
--

CREATE TABLE IF NOT EXISTS `software_detail` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_software` int(11) NOT NULL,
  `nama_modul` varchar(30) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `software_detail`
--

INSERT INTO `software_detail` (`id_detail`, `id_software`, `nama_modul`) VALUES
(3, 2, 'accounting'),
(4, 2, 'finance'),
(10, 1, 'hrd'),
(11, 1, 'crm');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `masalah` text NOT NULL,
  `id_support` int(11) NOT NULL,
  `status` enum('open','process','finish','cancelled') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_tiket`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_client`, `masalah`, `id_support`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Tidak bisa tambah jurnal', 0, 'open', '2016-01-24 01:34:53', '2016-01-24 01:34:53'),
(2, 2, 'Kurang TIdur', 0, 'open', '2016-01-24 01:50:44', '2016-01-24 01:50:44'),
(3, 2, 'begadang', 0, 'open', '2016-01-24 09:24:21', '2016-01-24 09:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('administrator','client','pm','support') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Project Manager', 'pm@kompas.com', '$2y$10$eWv0KaGtaKZkSfniIURMhuB4FnjyBCX4XotMisKx/kNVSMjy4UnxO', 'pm', 'active', 'TMWf4ALEJuCcSnxkm3afgCwbzvus1Eg10u56BExHOAawVskBR3erxPDk37gd', '2016-01-24 16:38:41', '2016-01-24 16:38:41'),
(7, 'Tech Support', 'support@kompas.com', '$2y$10$gyGVrqvFhQTbDtey2dFz4.xwO7oCnRMBneJ/lYZZYlW32MOLeBjpq', 'support', 'active', 'Ue5Z7CwJsZoChwnzeO91V4pbeVdaVnplDXdAgOOwpE6ID787GbEqx0eTUUIt', '2016-01-24 09:04:50', '2016-01-24 02:04:50'),
(9, 'Client', 'client@kompas.com', '$2y$10$xZIe3QXrPFHocOuqwKxRju4Q56qVVitekNzL6zrG7ui44k38dW40G', 'client', 'active', 'BKglRbqjBN3pQAOnwHcKMKLCgs6GjEEgPcwrOHcKNT1dBMHwaHEVJyJ0Ce5D', '2016-01-24 07:48:01', '2016-01-24 00:48:01'),
(10, 'Admin', 'admin@kompas.com', '$2y$10$0nU7h6Seey9PUq5A98qUPu3o1cWQeAx7YOIFYuWuEsJ7t7SqtoPNS', 'administrator', 'active', 'yBz0Hb2lnrOMYJUpypvFlvZFMnjDlU4MpqzL4LUDLYl8uMsPwcWXE2UJ7aDm', '2016-01-24 06:54:59', '2016-01-23 23:54:59'),
(12, 'PT Singoedan', 'ilma@gmail.com', '$2y$10$EFsRUUTC8IZZeq8Z986az.4mJaKCC9C1/ONUuej4CCSZoSG0eIwOG', 'client', 'active', 'wkW1ZD0Tu0hcTgYxAN2iEox8VMLDBD4WPfh3o3POwQBtSSwsoz7MCk3PE8L2', '2016-01-24 09:12:01', '2016-01-24 02:12:01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
