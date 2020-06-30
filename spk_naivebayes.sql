-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 03:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_naivebayes`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_sample`
--

CREATE TABLE `data_sample` (
  `id` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `absensi` int(11) NOT NULL,
  `naq` int(11) NOT NULL,
  `nba` int(11) NOT NULL,
  `nbi` int(11) NOT NULL,
  `nbin` int(11) NOT NULL,
  `nbs` int(11) NOT NULL,
  `nbtq` int(11) NOT NULL,
  `nfiqih` int(11) NOT NULL,
  `nipa` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nips` int(11) NOT NULL,
  `nmtk` int(11) NOT NULL,
  `npjok` int(11) NOT NULL,
  `npkn` int(11) NOT NULL,
  `nprakarya` int(11) NOT NULL,
  `nqudis` int(11) NOT NULL,
  `nsb` int(11) NOT NULL,
  `nilaipraktek` int(11) NOT NULL,
  `ranking` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_sample`
--

INSERT INTO `data_sample` (`id`, `nisn`, `nama`, `absensi`, `naq`, `nba`, `nbi`, `nbin`, `nbs`, `nbtq`, `nfiqih`, `nipa`, `nip`, `nips`, `nmtk`, `npjok`, `npkn`, `nprakarya`, `nqudis`, `nsb`, `nilaipraktek`, `ranking`) VALUES
(1, '66', 'JONO', 3, 3, 3, 3, 4, 3, 4, 4, 0, 0, 3, 0, 4, 3, 1, 3, 4, 4, 'Rank'),
(2, '77', 'MUHAMMAD KARIM', 4, 4, 4, 4, 4, 4, 4, 4, 0, 0, 3, 0, 4, 4, 4, 4, 4, 4, 'Rank'),
(3, '77', 'JUNAEDI', 4, 4, 4, 4, 4, 4, 4, 4, 0, 0, 3, 0, 4, 4, 4, 4, 4, 4, 'Rank');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `absensi` int(11) NOT NULL,
  `naq` int(11) NOT NULL,
  `nba` int(11) NOT NULL,
  `nbi` int(11) NOT NULL,
  `nbin` int(11) NOT NULL,
  `nbs` int(11) NOT NULL,
  `nbtq` int(11) NOT NULL,
  `nfiqih` int(11) NOT NULL,
  `nipa` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nips` int(11) NOT NULL,
  `nmtk` int(11) NOT NULL,
  `npjok` int(11) NOT NULL,
  `npkn` int(11) NOT NULL,
  `nprakarya` int(11) NOT NULL,
  `nqudis` int(11) NOT NULL,
  `nsb` int(11) NOT NULL,
  `nilaipraktek` int(11) NOT NULL,
  `ranking` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nisn`, `nama`, `absensi`, `naq`, `nba`, `nbi`, `nbin`, `nbs`, `nbtq`, `nfiqih`, `nipa`, `nip`, `nips`, `nmtk`, `npjok`, `npkn`, `nprakarya`, `nqudis`, `nsb`, `nilaipraktek`, `ranking`) VALUES
(1, '66', 'JONO', 3, 3, 3, 3, 4, 3, 4, 4, 0, 0, 3, 0, 4, 3, 1, 3, 4, 4, ''),
(2, '77', 'MUHAMMAD KARIM', 4, 4, 4, 4, 4, 4, 4, 4, 0, 0, 3, 0, 4, 4, 4, 4, 4, 4, ''),
(3, '77', 'JUNAEDI', 4, 4, 4, 4, 4, 4, 4, 4, 0, 0, 3, 0, 4, 4, 4, 4, 4, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama_website`, `logo`, `alamat`, `deskripsi`, `theme`) VALUES
(0, 'SPK NAIVEBAYES', 'tv-2223047_960_720.png', 'Jl Raya Ciboalang No 21', '@2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `akses_level` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama_user`, `jenis_kelamin`, `telp`, `email`, `username`, `password`, `foto`, `akses_level`, `alamat`) VALUES
(1, '123456', 'Admin', 'L', '085217965569', 'admin@admin.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '3aldl50wcj0gccgkk8.jpg', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_sample`
--
ALTER TABLE `data_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_sample`
--
ALTER TABLE `data_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
