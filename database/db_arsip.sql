-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 12:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_arsip_keluar`
--

CREATE TABLE `tb_arsip_keluar` (
  `id_arsip` int(11) NOT NULL,
  `no_arsip` varchar(255) NOT NULL DEFAULT '',
  `id_keterangan` int(11) NOT NULL DEFAULT 0,
  `id_unit` int(11) NOT NULL DEFAULT 0,
  `id_kode` int(11) NOT NULL DEFAULT 0,
  `perihal` text NOT NULL DEFAULT '',
  `id_lokasi` int(11) NOT NULL DEFAULT 0,
  `id_jenis` int(11) NOT NULL DEFAULT 0,
  `keterangan` int(11) NOT NULL DEFAULT 0,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `no_laci` int(11) NOT NULL DEFAULT 0,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `tanggal_keterangan` date NOT NULL DEFAULT '1900-01-01',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `deleted_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `deleted_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_arsip_keluar`
--

INSERT INTO `tb_arsip_keluar` (`id_arsip`, `no_arsip`, `id_keterangan`, `id_unit`, `id_kode`, `perihal`, `id_lokasi`, `id_jenis`, `keterangan`, `jumlah`, `no_laci`, `isDeleted`, `tanggal_keterangan`, `created_date`, `created_by`, `updated_date`, `updated_by`, `deleted_date`, `deleted_by`) VALUES
(1, '12321312', 3, 2, 2, 'test test', 1, 1, 1, 45, 3463456, 0, '2020-11-21', '2020-11-21 16:37:49', 1, '2020-11-21 10:39:19', 1, '1900-01-01 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_arsip_masuk`
--

CREATE TABLE `tb_arsip_masuk` (
  `id_arsip` int(11) NOT NULL,
  `no_arsip` varchar(255) NOT NULL DEFAULT '',
  `id_keterangan` int(11) NOT NULL DEFAULT 0,
  `id_unit` int(11) NOT NULL DEFAULT 0,
  `id_kode` int(11) NOT NULL DEFAULT 0,
  `perihal` text NOT NULL DEFAULT '',
  `id_lokasi` int(11) NOT NULL DEFAULT 0,
  `id_jenis` int(11) NOT NULL DEFAULT 0,
  `keterangan` int(11) NOT NULL DEFAULT 0,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `no_laci` int(11) NOT NULL DEFAULT 0,
  `file` varchar(255) NOT NULL DEFAULT '',
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `tanggal_keterangan` date NOT NULL DEFAULT '1900-01-01',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `deleted_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `deleted_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_arsip_masuk`
--

INSERT INTO `tb_arsip_masuk` (`id_arsip`, `no_arsip`, `id_keterangan`, `id_unit`, `id_kode`, `perihal`, `id_lokasi`, `id_jenis`, `keterangan`, `jumlah`, `no_laci`, `file`, `isDeleted`, `tanggal_keterangan`, `created_date`, `created_by`, `updated_date`, `updated_by`, `deleted_date`, `deleted_by`) VALUES
(1, '1243124124', 3, 2, 2, 'yet', 1, 1, 1, 5, 234234, 'Tahlilan 2.doc', 0, '2020-12-17', '2020-11-21 15:25:00', 1, '2020-11-21 10:06:08', 1, '2020-11-21 10:34:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_media`
--

CREATE TABLE `tb_jenis_media` (
  `id_jenis` int(11) NOT NULL,
  `jenis_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_media`
--

INSERT INTO `tb_jenis_media` (`id_jenis`, `jenis_name`) VALUES
(1, 'test media');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kode`
--

CREATE TABLE `tb_kode` (
  `id_kode` int(11) NOT NULL,
  `kode_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kode`
--

INSERT INTO `tb_kode` (`id_kode`, `kode_name`) VALUES
(2, 'test kode');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `lokasi_name`) VALUES
(1, 'test lokasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keterangan`
--

CREATE TABLE `tb_keterangan` (
  `id_keterangan` int(11) NOT NULL,
  `keterangan_name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keterangan`
--

INSERT INTO `tb_keterangan` (`id_keterangan`, `keterangan_name`) VALUES
(3, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit_pengolah`
--

CREATE TABLE `tb_unit_pengolah` (
  `id_unit` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_unit_pengolah`
--

INSERT INTO `tb_unit_pengolah` (`id_unit`, `unit_name`) VALUES
(2, 'test unit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `image`, `email`, `username`, `password`, `role`) VALUES
(1, 'Administrator', '', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Danny Zulfikar', '', 'mcheal@gmail.com', 'fanniple', 'cc03e747a6afbbcbf8be7668acfebee5', 1),
(3, 'Micheal Dede', '', 'mcheal@gmail.com', 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', 2),
(4, 'Meisya Paramita', '', 'meisya@gmail.com', 'dragonulo10', '482c811da5d5b4bc6d497ffa98491e38', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_arsip_keluar`
--
ALTER TABLE `tb_arsip_keluar`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `tb_arsip_masuk`
--
ALTER TABLE `tb_arsip_masuk`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `tb_jenis_media`
--
ALTER TABLE `tb_jenis_media`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_kode`
--
ALTER TABLE `tb_kode`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_unit_pengolah`
--
ALTER TABLE `tb_unit_pengolah`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_arsip_keluar`
--
ALTER TABLE `tb_arsip_keluar`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_arsip_masuk`
--
ALTER TABLE `tb_arsip_masuk`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jenis_media`
--
ALTER TABLE `tb_jenis_media`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kode`
--
ALTER TABLE `tb_kode`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_unit_pengolah`
--
ALTER TABLE `tb_unit_pengolah`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
