-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 10:33 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `emel_pentadbir` varchar(255) NOT NULL,
  `katalaluan_pentadbir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `emel_pentadbir`, `katalaluan_pentadbir`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblbuku`
--

CREATE TABLE `tblbuku` (
  `id` int(255) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `kod_buku` varchar(255) NOT NULL,
  `penerbit_buku` varchar(255) NOT NULL,
  `pengarang_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbuku`
--

INSERT INTO `tblbuku` (`id`, `nama_buku`, `kod_buku`, `penerbit_buku`, `pengarang_buku`) VALUES
(2, 'Sang Kancil Dan Buaya', 'DF00112', 'Dewan Bahasa Dan Pustaka', 'A. Samad Said');

-- --------------------------------------------------------

--
-- Table structure for table `tblpengguna`
--

CREATE TABLE `tblpengguna` (
  `id` int(255) NOT NULL,
  `emel_pengguna` varchar(255) NOT NULL,
  `katalaluan_pengguna` varchar(255) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `kelas_pengguna` varchar(255) NOT NULL,
  `jawatan_pengguna` varchar(255) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpengguna`
--

INSERT INTO `tblpengguna` (`id`, `emel_pengguna`, `katalaluan_pengguna`, `nama_pengguna`, `kelas_pengguna`, `jawatan_pengguna`, `Status`) VALUES
(1, 'alifjamain@gmail.com', 'alifjamain', 'AlifJamain', '6 Pelangi', 'Ketua Pengawas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpinjaman`
--

CREATE TABLE `tblpinjaman` (
  `id` int(255) NOT NULL,
  `nama_pelajar` varchar(255) NOT NULL,
  `kelas_pelajar` varchar(255) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `tarikh_pinjam` varchar(255) NOT NULL,
  `tarikh_pulang` varchar(255) NOT NULL,
  `empid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpinjaman`
--

INSERT INTO `tblpinjaman` (`id`, `nama_pelajar`, `kelas_pelajar`, `nama_buku`, `tarikh_pinjam`, `tarikh_pulang`, `empid`) VALUES
(1, 'Aiman Salim', '6 Pelangi', 'DF00112 | Sang Kancil Dan Buaya', '04-29-2019', '04-30-2019', 1),
(2, 'Aiman Salim', '6 Pelangi', 'DF00112 | Sang Kancil Dan Buaya', '04-29-2019', '05-10-2019', 1),
(3, 'Aiman Salim', '6 Pelangi', 'DF00112 | Sang Kancil Dan Buaya', '05-10-2019', '05-01-2019', 1),
(4, 'Aiman Salim', '6 Pelangi', 'DF00112 | Sang Kancil Dan Buaya', '04-30-2019', '05-03-2019', 1),
(5, 'Aiman Salim', '6 Pelangi', 'DF00112 | Sang Kancil Dan Buaya', '05-01-2019', '05-02-2019', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbuku`
--
ALTER TABLE `tblbuku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpengguna`
--
ALTER TABLE `tblpengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpinjaman`
--
ALTER TABLE `tblpinjaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbuku`
--
ALTER TABLE `tblbuku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpengguna`
--
ALTER TABLE `tblpengguna`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpinjaman`
--
ALTER TABLE `tblpinjaman`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
