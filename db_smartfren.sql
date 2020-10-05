-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 03:08 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smartfren`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `slug_barang` varchar(150) DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_barang` varchar(10) NOT NULL,
  `stok` varchar(10) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `status_barang` varchar(150) NOT NULL,
  `tgl_post` datetime NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_user`, `kode_barang`, `nama_barang`, `slug_barang`, `keyword`, `id_kategori`, `harga_beli`, `harga_jual`, `jumlah_barang`, `stok`, `keterangan`, `gambar`, `status_barang`, `tgl_post`, `tgl_update`) VALUES
(2, 10, '098898888', 'Smartfren 10gb Aktif', 'smartfren-10gb-aktif-098898888', 'kartu perdana 10gb', 46, 10000, 20000, '', '20', '', '27551374_B_V1.jpg', 'Publish', '2020-09-24 15:53:18', '2020-09-24 13:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `judul_gambar` varchar(129) DEFAULT NULL,
  `gambar` varchar(128) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_barang`, `judul_gambar`, `gambar`, `tgl_update`) VALUES
(9, 37, 'vektor', '4_1.jpg', '2020-05-17 16:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `tlp_pelanggan` varchar(150) NOT NULL,
  `alamat_pelanggan` varchar(225) NOT NULL,
  `kode_transaksi` varchar(150) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(25) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `tgl_post` datetime NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `slug_kategori` varchar(128) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`, `urutan`, `tgl_update`) VALUES
(46, 'Kartu Perdana', 'kartu-perdana', 1, '2020-09-22 17:12:46'),
(47, 'voucher', 'voucher', 2, '2020-09-24 12:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(128) NOT NULL,
  `tagline` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `website` varchar(128) DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `facebook` varchar(128) DEFAULT NULL,
  `instagram` varchar(128) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `rekening_pembayaran` varchar(128) DEFAULT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keyword`, `metatext`, `telephone`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tgl_update`) VALUES
(1, 'Galeri Online', 'Galeri Online Para pelaku Seniman', 'goindonesia@gmail.com', 'https://www.goindonesia.com/', '', '', '0813973331111', 'Jl. Grand Wisata Kec. Tambun Selatan - Bekasi 17510', 'https://www.facebook.com/', 'https://www.instagram.com/', '', 'GO_logo1.png', 'GO_logo.png', '', '2020-09-24 06:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `tlp_pelanggan` varchar(20) DEFAULT NULL,
  `alamat_pelanggan` varchar(225) DEFAULT NULL,
  `tgl_daftar` int(11) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(128) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(128) NOT NULL,
  `gambar` varchar(128) DEFAULT NULL,
  `tgl_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tgl_post`) VALUES
(1, 'Bank BCA Cabang Karawang', '998098789', 'Junarto', NULL, '2020-05-13 12:38:50'),
(3, 'Bank Mandiri Syariah', '9998998921', 'PT Lintang Jaya', NULL, '2020-09-22 16:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(11) NOT NULL,
  `nama_sales` varchar(25) NOT NULL,
  `alamat_sales` varchar(225) NOT NULL,
  `email_sales` varchar(150) NOT NULL,
  `tlp_sales` varchar(25) NOT NULL,
  `slug_sales` varchar(150) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_sales`, `nama_sales`, `alamat_sales`, `email_sales`, `tlp_sales`, `slug_sales`, `urutan`, `tgl_update`) VALUES
(2147483647, '1100980', 'Cibinong', 'purnomo@gmail.com', '08134456676', '1100980', 1, '2011-07-31 19:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(25) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `tlp_user` varchar(20) NOT NULL,
  `alamat_user` varchar(225) DEFAULT NULL,
  `level_akses` varchar(20) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `username`, `tlp_user`, `alamat_user`, `level_akses`, `tanggal_input`, `image`) VALUES
(1, 'fauzan fahmi', 'test@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'fahmi', '081283374529', NULL, 'admin', '2020-05-10 10:44:21', 'default.jpg'),
(10, 'Udin Sariffudin', 'smartfren@gmail.com', '74e59720dd08b1db45f7152d082c5051', 'smartfren2', '081283374521', 'Cikarang   ', 'admin', '2020-09-22 14:41:16', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
