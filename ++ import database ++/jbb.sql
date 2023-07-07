-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 04:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bisnis`
--

CREATE TABLE `bisnis` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(20) NOT NULL,
  `bentuk` varchar(15) NOT NULL,
  `pendapatan` varchar(20) NOT NULL,
  `didirikan` year(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `fitur` text DEFAULT NULL,
  `benda` text DEFAULT NULL,
  `mapLat` float(10,6) DEFAULT NULL,
  `mapLng` float(10,6) DEFAULT NULL,
  `kota` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `rataPerB` varchar(20) NOT NULL,
  `rataPerT` varchar(20) NOT NULL,
  `namaPemilik` varchar(60) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `idPengusaha` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bisnis`
--

INSERT INTO `bisnis` (`id`, `nama`, `deskripsi`, `harga`, `bentuk`, `pendapatan`, `didirikan`, `status`, `jenis`, `fitur`, `benda`, `mapLat`, `mapLng`, `kota`, `alamat`, `rataPerB`, `rataPerT`, `namaPemilik`, `notelp`, `idPengusaha`) VALUES
(1, 'Toko Permen', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ab repudiandae, explicabo voluptate ethic cum ratione a. Officia delectus illum perferendis maiores', '25.000.000', 'Toko', '5.200.000', 2005, 'Aktif', 'Pemilik', 'Wifi Area, Screen Order', 'Pegawai, Kasir', -7.767706, 110.378532, 'Yogyakarta', 'Universitas Gadjah Mada, university, Catur Tunggal, Indonesia', '6.000.000', '72.000.000', 'Pengusaha1', '088855556467', 17),
(2, 'Rumah Makan Itali', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ab repudiandae, explicabo voluptate ethic cum ratione a. Officia delectus illum perferendis maiores', '50.000.000', 'Restoran', '10.000.000', 2002, 'Aktif', 'Pemilik', 'Wifi Area, Luxury Service, VIP Area', 'Pegawai, Kasir, Pelayan', 38.673702, 15.887084, 'Vibo Valentia', '89861 Provinsi Vibo Valentia', '9.800.000', '117.600.000', 'Pengusaha1', '088855556467', 17),
(3, 'Bisnis Printing', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ab repudiandae, explicabo voluptate ethic cum ratione a. Officia delectus illum perferendis maiores', '10.000.000', 'Ruko', '2.500.000', 2006, 'Aktif', 'Sewa', 'Waiting Area, Wifi', 'Printer', NULL, NULL, 'Yogyakarta', '6C9G+R3R, Jl. Onggomertan, Nayan, Maguwoharjo, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '3.000.000', '36.000.000', 'Pengusaha1', '088855556467', 17),
(4, 'Rotio Factorio', 'Bisnis ini telah berdiri sejak tahun 1945, bisnis ini memiliki sejarah panjang sehingga dianggap unik.', '27.000.000.000', 'Pabrik', '2.900.000.000', 1945, 'Aktif', 'Pemilik', 'Free Wifi', 'Karyawan, Tempat Duduk, Kantin, Karyawan, Oven', 41.894066, 12.502791, 'Aincard', 'Via Michelangelo Buonarroti, 42, 00185 Roma RM, Italia', '3.000.000.000', '36.000.000.000', 'pengusaha1', '081215444777', 17),
(5, 'jastip', 'Menerima jastip makanan', '300.000', 'Toko', '100.000', 2021, 'Aktif', 'Pemilik', 'jastip makanan impor dengan mudah', 'Makanan', 0.000000, 0.000000, 'Ngawi', 'Ngawi, jalan rudi No.113', '50.000', '100.000', 'Rian', '0888111222333', 0),
(6, 'Rumah Makan Pak Datuk', 'Rumah makan serba ada', '5.000.000', 'Restoran', '5.500.000', 1990, 'Aktif', 'Pemilik', 'Murah', 'Rumah makan', 0.000000, 0.000000, 'Yogyakarta', 'Jalan Kaliurang km 14,5', '50.000', '600.000', 'Rian', '081325235816', 19);

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keungan` int(11) NOT NULL,
  `income` int(100) NOT NULL,
  `expense` int(100) NOT NULL,
  `month` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keungan`, `income`, `expense`, `month`, `id`) VALUES
(1, 1000000, 500000, '2023-07', 19),
(2, 50000, 0, '2023-07', 19),
(3, 70000, 0, '2023-07', 19),
(9, 50000, 0, '2023-08', 19),
(10, 0, 50000, '2023-08', 19),
(835, 1000000, 0, '2023-07', 19),
(836, 0, 500000, '2023-08', 19),
(837, 500000, 0, '2023-08', 19),
(838, 0, 500000, '2023-08', 19),
(839, 900000, 0, '2023-09', 19),
(840, 0, 50000, '2023-09', 19),
(841, 0, 500000, '2023-09', 19),
(842, 0, 500000, '2023-09', 0),
(843, 1000000, 0, '2023-07', 0),
(844, 0, 500000, '2023-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `harga` varchar(20) CHARACTER SET utf8 NOT NULL,
  `stok` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `stok`, `id`) VALUES
(1, 'Nasi Goreng', '25000', 20, 19),
(2, 'Mie Ayam', '20000', 15, 19),
(3, 'Bakso', '15000', 15, 19),
(4, 'Ayam Bakar', '30000', 10, 19),
(5, 'Sop Iga', '35000', 10, 20),
(6, 'Ayam Goreng', '17000', 10, 19);

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id` int(11) NOT NULL,
  `id_bisnis` int(255) NOT NULL,
  `id_penawar` int(255) NOT NULL,
  `namaBisnis` varchar(20) NOT NULL,
  `namaPenawar` varchar(60) NOT NULL,
  `hargaAsli` varchar(20) NOT NULL,
  `hargaTawar` varchar(20) NOT NULL,
  `notelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `id_bisnis`, `id_penawar`, `namaBisnis`, `namaPenawar`, `hargaAsli`, `hargaTawar`, `notelp`) VALUES
(1, 2, 16, 'Rumah Makan Itali', 'investor1', '50000000', '45000000', '08886699888'),
(2, 2, 16, 'Rumah Makan Itali', 'investor1', '50000000', '48.000.000', '08886699888'),
(3, 1, 16, 'Toko Permen', 'investor1', '25000000', '32.000.000', '08886699888'),
(4, 1, 16, 'Toko Permen', 'investor1', '25000000', '35.000.000', '08886699888'),
(5, 3, 16, 'Bisnis Printing', 'investor1', '10.000.000', '12.000.000', '08886699888'),
(6, 1, 18, 'Toko Permen', 'Investor 2', '25.000.000', '30.000.000', '08886699444'),
(0, 0, 0, 'jastip', 'Rian', '300.000', '100.000', '8888'),
(0, 6, 20, 'Rumah Makan Pak Datu', 'Rian', '5.000.000', '5.000.000', '08888888');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `domisili` varchar(28) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `id_jenis`, `jenis`, `nama`, `email`, `password`, `notelp`, `tglLahir`, `domisili`) VALUES
(1, 3, 'Pengusaha', 'Abhirama Aji Mahardhika', 'tester@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL),
(2, 1, 'Admin', 'AdminTester', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL),
(4, 2, 'Investor', 'rianngab', 'ngabrian@gmail.com', 'b240c635eb91cd7d0968a14c75493bb5', NULL, NULL, NULL),
(5, 3, 'Pengusaha', 'Dummy', 'dummy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL),
(6, 2, 'Investor', 'Mohammed Qosha Ahwas', 'mqosha21@gmail.com', 'f4135aec2f0e418d4a95c7a14c33b6d4', NULL, NULL, NULL),
(8, 3, 'Pengusaha', 'TesterBro', 'test@bro.com', 'b4813ec2c2b95865c2a8958421f3c9cc', NULL, NULL, NULL),
(9, 2, 'Investor', 'testerBarudak', 'barudak@gmail.com', '6f9ca3fa07bfd755493438b536bdd358', NULL, NULL, NULL),
(15, 3, 'Pengusaha', 'ambatukam', 'ambatukam@gmail.com', '5a2bba1135a64621baf024530ee3186a', NULL, NULL, NULL),
(17, 3, 'Pengusaha', 'Pengusaha 1', 'pengusaha@gmail.com', '457202d6b46efbd7da18c78a064e601f', '2003-03-16', '2003-03-16', 'Italy'),
(19, 3, 'Pengusaha', 'Rian', 'rian@g.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(20, 2, 'Investor', 'Rian', '123@g.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(21, 2, 'Investor', 'aldi', '12@g.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(22, 4, 'Pembeli', 'aldisri', 'a@g.om', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(23, 4, 'Pembeli', 'Rian jombang', 'ngawi1@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', NULL, NULL, NULL),
(24, 4, 'Pembeli', 'ian', 'ian@g.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(25, 4, 'Pembeli', 'Reyhandri', 'Rey@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(26, 4, 'Pembeli', 'pembeli1', 'p1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL),
(27, 4, 'Pembeli', 'pembeli2', 'pem2@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(28, 4, 'Pembeli', 'testerPembeli', 'tp@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(29, 4, 'Pembeli', 'testerP2', 'tp2@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL),
(30, 4, 'Pembeli', 'testerP3', 'tp3@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bisnis`
--
ALTER TABLE `bisnis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keungan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bisnis`
--
ALTER TABLE `bisnis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=845;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu` FOREIGN KEY (`id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
