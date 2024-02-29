-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 08:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `jumlah`, `harga`, `created_at`, `created_by`) VALUES
(11, 'LR162', 'Laptop ROG', '10', '29000000', '2024-02-01 07:50:17', 9),
(12, 'I1497', 'Iphone 15', '3', '21000000', '2024-02-01 10:57:07', 9),
(13, 'LMG356', 'Laptop MSI GF63', '8', '13000000', '2024-02-01 12:11:56', 9),
(15, 'I1PM239', 'Iphone 13 Pro Max', '8', '12000000', '2024-02-01 12:22:50', 9),
(22, 'MAMP413', 'Macbook Air M1 Pro', '36', '15000000', '2024-02-01 12:55:22', 9),
(24, 'KR675', 'KEYBOARD RGB', '5', '200000', '2024-02-29 06:42:55', 9);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang_barang` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `uang` varchar(133) NOT NULL,
  `kembalian` varchar(255) NOT NULL,
  `harga_total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_barang_barang`, `nama_customer`, `stock`, `uang`, `kembalian`, `harga_total`) VALUES
(12, 11, 'Steve', 1, '30000000', '1000000', '29000000'),
(13, 13, 'Yanda', 2, '30000000', '4000000', '26000000'),
(14, 22, 'Norman', 1, '16000000', '1000000', '15000000'),
(15, 11, 'Darrell', 1, '140000000', '111000000', '29000000'),
(16, 11, 'tere', 5, '200000000', '55000000', '145000000');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `tr_barang_keluar_after_delete` AFTER DELETE ON `barang_keluar` FOR EACH ROW BEGIN
    UPDATE barang
    SET jumlah = jumlah + OLD.stock
    WHERE id_barang = OLD.id_barang_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_barang_keluar_after_insert` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
    UPDATE barang
    SET jumlah = jumlah - NEW.stock
    WHERE id_barang = NEW.id_barang_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(10) NOT NULL,
  `id_barang_barang` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_barang_barang`, `stock`, `supplier`) VALUES
(4, 11, 4, 'Darrell'),
(5, 0, 0, 'a'),
(6, 15, 3, 'rere'),
(7, 11, 3, 'rere');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `HPUS_BM` AFTER DELETE ON `barang_masuk` FOR EACH ROW update barang set jumlah = jumlah-old.stock WHERE id_barang = old.id_barang_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TBMH_BM` AFTER INSERT ON `barang_masuk` FOR EACH ROW update barang SET jumlah = jumlah + new.stock WHERE id_barang = new.id_barang_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `id_detail` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `jumlahproduct` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(10) NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `created_at`) VALUES
(1, 'Admin', '2024-01-30 08:02:56'),
(2, 'Kasir', '2024-01-31 12:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_p` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_p`, `alamat`, `no_tlp`) VALUES
(1, 'BUDI', 'batam', '022154848'),
(2, 'jeje', 'mars', '5484888'),
(4, 'harry', 'USA', '545454'),
(9, 'richard', 'jepang', '78787'),
(10, 'jawhead', 'moba', '888888888888888');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` int(10) NOT NULL,
  `user_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `level`, `user_created_at`) VALUES
(9, 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', 1, '2024-02-01 06:28:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
