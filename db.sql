-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 03:07 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan_magang`
--

CREATE TABLE `tbl_kegiatan_magang` (
  `id_kegiatan` int(11) NOT NULL,
  `id_magang` int(11) NOT NULL,
  `nama_kegiatan` varchar(20) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `alat` varchar(30) NOT NULL,
  `bahan` varchar(30) NOT NULL,
  `verif` varchar(1) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_magang`
--

CREATE TABLE `tbl_magang` (
  `id_magang` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `kode_pegawai` varchar(10) NOT NULL,
  `n_kedis` varchar(3) DEFAULT NULL,
  `n_keakt` varchar(3) DEFAULT NULL,
  `n_motiv` varchar(3) DEFAULT NULL,
  `n_kemam` varchar(3) DEFAULT NULL,
  `n_kerja` varchar(3) DEFAULT NULL,
  `n_kehad` varchar(3) DEFAULT NULL,
  `n_kesop` varchar(2) DEFAULT NULL,
  `n_kerap` varchar(3) DEFAULT NULL,
  `status_magang` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs_magang`
--

CREATE TABLE `tbl_mhs_magang` (
  `id_mhs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(1) NOT NULL,
  `asal_ptn` varchar(50) DEFAULT NULL,
  `npm` varchar(8) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `surat_tugas` varchar(90) DEFAULT NULL,
  `status` enum('t','f','p') NOT NULL DEFAULT 'p',
  `foto` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `kode_pegawai` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pegawai` varchar(25) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(1) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(1) NOT NULL,
  `aktif` varchar(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `email`, `password`, `role`, `aktif`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'alaenalena00@gmail.com', '$2y$10$YfVpCa411kDdsgORTLSghe.XIKRVkoxlIZbwI/W86knaTlhgfqjyK', '1', 't', '2020-08-13 20:05:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_kegiatan_magang`
--
ALTER TABLE `tbl_kegiatan_magang`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `kegiatan_magang` (`id_magang`);

--
-- Indexes for table `tbl_magang`
--
ALTER TABLE `tbl_magang`
  ADD PRIMARY KEY (`id_magang`),
  ADD KEY `magang_mhs` (`id_mhs`),
  ADD KEY `magang_pegawai` (`kode_pegawai`),
  ADD KEY `magang_bagian` (`id_bagian`);

--
-- Indexes for table `tbl_mhs_magang`
--
ALTER TABLE `tbl_mhs_magang`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `mhs_user` (`id_user`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`kode_pegawai`),
  ADD KEY `pegawai_jabatan` (`id_jabatan`),
  ADD KEY `pegawai_user` (`id_user`),
  ADD KEY `pegawai_bagian` (`id_bagian`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kegiatan_magang`
--
ALTER TABLE `tbl_kegiatan_magang`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_magang`
--
ALTER TABLE `tbl_magang`
  MODIFY `id_magang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mhs_magang`
--
ALTER TABLE `tbl_mhs_magang`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kegiatan_magang`
--
ALTER TABLE `tbl_kegiatan_magang`
  ADD CONSTRAINT `kegiatan_magang` FOREIGN KEY (`id_magang`) REFERENCES `tbl_magang` (`id_magang`);

--
-- Constraints for table `tbl_magang`
--
ALTER TABLE `tbl_magang`
  ADD CONSTRAINT `magang_bagian` FOREIGN KEY (`id_bagian`) REFERENCES `tbl_bagian` (`id_bagian`),
  ADD CONSTRAINT `magang_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tbl_mhs_magang` (`id_mhs`),
  ADD CONSTRAINT `magang_pegawai` FOREIGN KEY (`kode_pegawai`) REFERENCES `tbl_pegawai` (`kode_pegawai`);

--
-- Constraints for table `tbl_mhs_magang`
--
ALTER TABLE `tbl_mhs_magang`
  ADD CONSTRAINT `mhs_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `pegawai_bagian` FOREIGN KEY (`id_bagian`) REFERENCES `tbl_bagian` (`id_bagian`),
  ADD CONSTRAINT `pegawai_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `tbl_jabatan` (`id_jabatan`),
  ADD CONSTRAINT `pegawai_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
