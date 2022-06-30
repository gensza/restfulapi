-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 09:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing_nibras`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '1', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_ukuran`
--

CREATE TABLE `mst_ukuran` (
  `id_mst_ukuran` int(11) NOT NULL,
  `kode_ukuran` varchar(50) NOT NULL,
  `ukuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mst_warna`
--

CREATE TABLE `mst_warna` (
  `id_mst_warna` int(11) NOT NULL,
  `kode_warna` varchar(50) NOT NULL,
  `nama_warna` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_ukuran` varchar(50) NOT NULL,
  `kode_warna` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `harga_dasar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_barang`, `nama_barang`, `kode_ukuran`, `kode_warna`, `harga`, `harga_dasar`) VALUES
(6, '', 'new', '', '', 0, 0),
(7, '0002', 'gege', '1', 'rere', 3400, 1220),
(8, 'asas', 'asa', 'asas', 'asa', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_ukuran`
--
ALTER TABLE `mst_ukuran`
  ADD PRIMARY KEY (`id_mst_ukuran`),
  ADD UNIQUE KEY `kode_ukuran` (`kode_ukuran`);

--
-- Indexes for table `mst_warna`
--
ALTER TABLE `mst_warna`
  ADD PRIMARY KEY (`id_mst_warna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_ukuran`
--
ALTER TABLE `mst_ukuran`
  MODIFY `id_mst_ukuran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_warna`
--
ALTER TABLE `mst_warna`
  MODIFY `id_mst_warna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
