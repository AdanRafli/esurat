-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 10:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `jenjang` enum('XII','XI','X') NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jmlh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `jenjang`, `jurusan`, `jmlh`) VALUES
(3, 'XII', 'RPL', 28),
(5, 'XII', 'MM', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` decimal(10,0) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `id_kelas`) VALUES
(1, '1233', 'Adan', 'Laki-laki', 'Bekasi', '2003-08-20', 'Jl.tenggiri 14, no 241.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_cetak`
--

CREATE TABLE `tbl_surat_cetak` (
  `IdCetak` int(11) NOT NULL,
  `nomor` varchar(80) NOT NULL,
  `lampiran` varchar(10) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tgl_surat` varchar(30) NOT NULL,
  `perusahaan` varchar(200) NOT NULL,
  `almt_perusahaan` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat_cetak`
--

INSERT INTO `tbl_surat_cetak` (`IdCetak`, `nomor`, `lampiran`, `perihal`, `tgl_surat`, `perusahaan`, `almt_perusahaan`, `id_user`) VALUES
(11, '111', 'aaa', 'aa', '02-20-2021', 'aa', 'aa', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_cetakdetail`
--

CREATE TABLE `tbl_surat_cetakdetail` (
  `id` int(11) NOT NULL,
  `idCetak` int(11) NOT NULL,
  `id_Siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `akses` enum('admin','user','khusus') NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `akses`, `email`) VALUES
(3, 'user', '$2y$10$pGe6FIEZ1xvYp8Mn4Q7mtecjzO7/1Ta.J6MKyCuiFw9F1MAYWPWO.', 'user', 'user', 'user'),
(4, 'admin', '$2y$10$J7tLsTAR8MWrGstTRBjew.H.UqtDPthXPjJcLqOZGbxCSkp9VsNtm', 'admin', 'admin', 'admin'),
(6, 'adan', '$2y$10$FHdiG/5EJEv6ZmSfGgNgZ.LY7vZqPKLqFezB0z5T9lthVsgrQiQN6', 'adan', 'khusus', 'adan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_surat_cetak`
--
ALTER TABLE `tbl_surat_cetak`
  ADD PRIMARY KEY (`IdCetak`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_surat_cetakdetail`
--
ALTER TABLE `tbl_surat_cetakdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCetak` (`idCetak`),
  ADD KEY `id_Siswa` (`id_Siswa`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_surat_cetak`
--
ALTER TABLE `tbl_surat_cetak`
  MODIFY `IdCetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_surat_cetakdetail`
--
ALTER TABLE `tbl_surat_cetakdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`);

--
-- Constraints for table `tbl_surat_cetak`
--
ALTER TABLE `tbl_surat_cetak`
  ADD CONSTRAINT `tbl_surat_cetak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_surat_cetakdetail`
--
ALTER TABLE `tbl_surat_cetakdetail`
  ADD CONSTRAINT `tbl_surat_cetakdetail_ibfk_1` FOREIGN KEY (`idCetak`) REFERENCES `tbl_surat_cetak` (`IdCetak`),
  ADD CONSTRAINT `tbl_surat_cetakdetail_ibfk_2` FOREIGN KEY (`id_Siswa`) REFERENCES `tbl_siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
