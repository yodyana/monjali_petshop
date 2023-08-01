-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 05:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monjali`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodatakucing`
--

CREATE TABLE `biodatakucing` (
  `id_kucing` int(11) NOT NULL,
  `no_sertifikat` varchar(20) NOT NULL,
  `nama_kucing` varchar(50) NOT NULL,
  `jenis_kucing` varchar(25) NOT NULL,
  `umur_kucing` varchar(8) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodatakucing`
--

INSERT INTO `biodatakucing` (`id_kucing`, `no_sertifikat`, `nama_kucing`, `jenis_kucing`, `umur_kucing`, `id_pelanggan`) VALUES
(1, 'IDN-ICA-LO-200410136', 'Ashland', 'Persia', '4 Bulan', 1),
(2, 'IDN-ICA-LO-202110137', 'Michi ku', 'Anggora', '7 bulan', 1),
(3, 'IDN-ICA-LO-200410101', 'Michan', 'Mixdome', '8 bulan', 3),
(11, 'IDN-ICA-LO-200410102', 'Meli', 'Anggora', '10 bulan', 2),
(19, 'IDN-ICA-LO-200410106', 'Molay', 'Mixdome', '8 bulan', 1),
(21, 'IDN-ICA-LO-20041008', 'Mili ku', 'Mixdome', '10 bulan', 10),
(22, 'IDN-ICA-LO-200410109', 'Michan', 'Mixdome', '10 bulan', 11),
(23, 'IDN-ICA-LO-200410198', 'kui', 'Anggora', '7 bulan', 12),
(28, 'IDN-ICA-LO-200410115', 'Ashland', 'Persia', '5 bulan', 18);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `kd_detail` int(11) NOT NULL,
  `kd_transaksi` int(11) DEFAULT NULL,
  `id_jenis` int(11) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`kd_detail`, `kd_transaksi`, `id_jenis`, `qty`) VALUES
(1, 2, 2, 1),
(2, 2, 4, 1),
(3, 3, 2, 1),
(4, 4, 2, 1),
(5, 5, 2, 1),
(6, 6, 2, 1),
(7, 6, 3, 1),
(8, 7, 2, 1),
(9, 7, 3, 1),
(10, 8, 2, 1),
(11, 8, 3, 1),
(12, 9, 2, 1),
(13, 9, 1, 1),
(14, 10, 2, 1),
(15, 10, 1, 1),
(16, 11, 2, 1),
(17, 11, 1, 1),
(18, 12, 2, 1),
(19, 12, 1, 1),
(20, 13, 2, 1),
(21, 13, 4, 1),
(22, 14, 1, 1),
(23, 14, 2, 1),
(24, 14, 3, 1),
(25, 14, 4, 1),
(26, 15, 2, 1),
(27, 15, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `kode_kategori`, `nama`, `harga`, `keterangan`) VALUES
(1, 1, 'Vakin F3', 175000, ''),
(2, 1, 'Vaksin F4', 20000, ''),
(3, 2, 'Grooming Sehat', 35000, ''),
(4, 2, 'Grooming Kutu Dan Jamur', 40000, ''),
(5, 2, 'Grooming Lengkap', 45000, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Vaksin'),
(2, 'Grooming');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `alamat`, `no_hp`) VALUES
(2, 'Tes Pertama', 'tes1@gmail.com', 'fa3fb6e0dccc657b57251c97db271b05', 'Tegalrejo, Yogyakarta', '082170507752'),
(3, 'Tes Kedua', 'tes2@gmail.com', '7a8a80e50f6ff558f552079cefe2715d', 'Bantul, Yogyakarta', '089506371018'),
(9, 'Tes Ketiga', 'tes3@gmail.com', '37a98352f0e0d2f4d64e96fe334871ed', 'Godean, Sleman', '089506371022'),
(10, 'Tes Keempat', 'tes4@gmail.com', '27069e6baf4eba0ad33686287d582c97', 'Bantul, Yogyakarta', '082170507752'),
(11, 'Tes Kelima', 'tes5@gmail.com', '305506069f2dda79d68e638186b83a5e', 'Blunyahrejo, Yogyakarta', '082170507752'),
(18, 'Yodyana Vhelia ', 'vyodyana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Karangwaru, Yogyakarta', '082170507752');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(1, 'vhe', 4, 'bagus', 1638826197),
(3, 'tes', 5, 'bagus', 1638826218),
(5, 'tes', 3, 'bagus', 1638875507),
(6, 'tes', 3, 'bagus', 1638875507);

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id`, `isi`) VALUES
(1, 'PELAYANAN TERBAIK, HARGA TERBAIK merupakan slogan dari Monjali Petshop yang berlokasi di Jalan Monjali No.46 Gemangan, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta ini. Usaha petshop ini di jalankan atas dasar kecintaan owner dengan hewan, sehingga mampu meberikan pelayanan yang terbaik untuk kebutuhan hewan peliharaan anda.\r\nMonjali Petshop buka senin sampai sabtu mulai pukul 08.30 – 22.30 WIB. Melayani berbagai keperluan hewan kesayangan anda, mulai dari Pet Food, Asesoris, Perlengkapan hewan, Obat-obatan, Jasa Penitipan, Grooming, Pemacakan (jasa kawin kucing), Rekber serta pelayanan cuma-cuma berupa konsultasi tentang kebutuhan hewan pet lovers.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `timeslot` varchar(250) NOT NULL,
  `total` double NOT NULL,
  `bayar` enum('sudah','belum') NOT NULL,
  `status` enum('online','offline') NOT NULL,
  `no_pembayaran` varchar(15) DEFAULT NULL,
  `pdf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kd_transaksi`, `id_pelanggan`, `tanggal`, `timeslot`, `total`, `bayar`, `status`, `no_pembayaran`, `pdf`) VALUES
(1, 2, '2021-11-26', '09:30AM - 10:30AM', 20000, 'sudah', 'online', '2036946113', ''),
(2, 3, '2021-11-26', '12:30PM - 13:30PM', 60000, 'sudah', 'online', '1449607689', ''),
(4, 2, '2021-12-01', '10:30AM - 11:30AM', 20000, 'sudah', 'online', '977731003', ''),
(5, 13, '2021-12-01', '09:30AM - 10:30AM', 20000, 'sudah', 'online', '868213111', ''),
(6, 13, '2021-12-02', '09:30AM - 10:30AM', 55000, 'sudah', 'online', '47280629', ''),
(7, 13, '2021-12-10', '12:30PM - 13:30PM', 55000, 'sudah', 'online', '8230667', ''),
(8, 13, '2021-12-30', '09:30AM - 10:30AM', 55000, 'sudah', 'online', '1126505321', ''),
(13, 2, '2021-12-06', '09:30AM - 10:30AM', 60000, 'sudah', 'online', '1526720768', ''),
(14, 2, '2021-12-09', '08:30AM - 09:30AM', 270000, 'sudah', 'online', '132260427', ''),
(15, 18, '2021-12-07', '11:30AM - 12:30PM', 195000, 'sudah', 'online', '1251752998', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `jabatan` enum('Karyawan','Owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `email`, `password`, `no_hp`, `jabatan`) VALUES
(1, 'vhelia', 'Vhelia Yodyana', 'vyodyana@gmail.com', 'a231bded6be0ae76f589af46519f5420', '082170507752', 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodatakucing`
--
ALTER TABLE `biodatakucing`
  ADD PRIMARY KEY (`id_kucing`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`kd_detail`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodatakucing`
--
ALTER TABLE `biodatakucing`
  MODIFY `id_kucing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `kd_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
