-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2024 at 11:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil_rikzafauzannf`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil_rikza`
--

CREATE TABLE `tbl_mobil_rikza` (
  `no_plat_rikza` varchar(10) NOT NULL,
  `nama_mobil_rikza` varchar(25) NOT NULL,
  `brand_mobil_rikza` varchar(25) NOT NULL,
  `tipe_transmisi_rikza` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mobil_rikza`
--

INSERT INTO `tbl_mobil_rikza` (`no_plat_rikza`, `nama_mobil_rikza`, `brand_mobil_rikza`, `tipe_transmisi_rikza`) VALUES
('Z 2276 IB', 'GR Yaris', 'Toyota', 'Manual');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan_rikza`
--

CREATE TABLE `tbl_pelanggan_rikza` (
  `nik_ktp_rikza` varchar(16) NOT NULL,
  `nama_rikza` varchar(35) NOT NULL,
  `no_hp_rikza` varchar(15) NOT NULL,
  `alamat_rikza` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pelanggan_rikza`
--

INSERT INTO `tbl_pelanggan_rikza` (`nik_ktp_rikza`, `nama_rikza`, `no_hp_rikza`, `alamat_rikza`) VALUES
('079889897', 'testing', '089603711237', 'testing\r\n'),
('121212', 'rikza testing', '089603711237', 'Testing'),
('12121212', 'ASW', '213213421', 'rerererer'),
('32131242134', 'test', '9024234234', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental_rikza`
--

CREATE TABLE `tbl_rental_rikza` (
  `no_trx_rikza` varchar(50) NOT NULL,
  `nik_ktp_rikza` varchar(20) NOT NULL,
  `no_plat_rikza` varchar(15) NOT NULL,
  `tgl_rental_rikza` date NOT NULL,
  `jam_rental_rikza` varchar(10) NOT NULL,
  `harga_rikza` int(11) NOT NULL,
  `lama_rikza` int(11) NOT NULL,
  `total_bayar_rikza` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rental_rikza`
--

INSERT INTO `tbl_rental_rikza` (`no_trx_rikza`, `nik_ktp_rikza`, `no_plat_rikza`, `tgl_rental_rikza`, `jam_rental_rikza`, `harga_rikza`, `lama_rikza`, `total_bayar_rikza`) VALUES
('RKZ-Z2276IB', '079889897', 'Z 2276 IB', '2024-01-10', '18:00', 2000000, 2, 'Rp 4.000.000,00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_rikza`
--

CREATE TABLE `tbl_user_rikza` (
  `id_user_rikza` int(11) NOT NULL,
  `username_rikza` varchar(35) NOT NULL,
  `password_rikza` text NOT NULL,
  `nama_lengkap_rikza` varchar(35) NOT NULL,
  `level_rikza` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_rikza`
--

INSERT INTO `tbl_user_rikza` (`id_user_rikza`, `username_rikza`, `password_rikza`, `nama_lengkap_rikza`, `level_rikza`) VALUES
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
(6, 'Rikza', '202cb962ac59075b964b07152d234b70', 'Rikza Fauzan Nurfadilah', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mobil_rikza`
--
ALTER TABLE `tbl_mobil_rikza`
  ADD PRIMARY KEY (`no_plat_rikza`);

--
-- Indexes for table `tbl_pelanggan_rikza`
--
ALTER TABLE `tbl_pelanggan_rikza`
  ADD PRIMARY KEY (`nik_ktp_rikza`);

--
-- Indexes for table `tbl_rental_rikza`
--
ALTER TABLE `tbl_rental_rikza`
  ADD PRIMARY KEY (`no_trx_rikza`);

--
-- Indexes for table `tbl_user_rikza`
--
ALTER TABLE `tbl_user_rikza`
  ADD PRIMARY KEY (`id_user_rikza`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user_rikza`
--
ALTER TABLE `tbl_user_rikza`
  MODIFY `id_user_rikza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
