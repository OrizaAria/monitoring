-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 12:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoringdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `proses` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `customer`, `brand`, `jumlah`, `proses`, `foto`, `created_at`, `updated_at`) VALUES
(4, 'quidem', 'Yoga Ardianto', 'Bara', 335, 'Full Proses', 'default.png', '2006-04-05', '2020-05-19'),
(31, 'eum', 'Suci Rahmawati', 'Baha', 683, 'Finishing', 'default.png', '1985-11-15', '1987-02-10'),
(32, 'corrupti', 'Jamil Jais Wahyudin S.Pt', 'Raya Setiabudhi', 614, 'Sewing', 'default.png', '2004-02-27', '1999-02-08'),
(33, 'itaque', 'Maria Pertiwi', 'Bambu', 411, 'Finishing', 'default.png', '2002-11-15', '1978-04-27'),
(34, 'deleniti', 'Malika Malika Kusmawati M.M.', 'Sukabumi', 967, 'Sewing', 'default.png', '2008-06-28', '1997-08-22'),
(35, 'voluptatem', 'Clara Samiah Utami S.Kom', 'HOS. Cjokroaminoto (Pasirkaliki)', 781, 'Cutting', 'default.png', '2021-03-30', '1974-05-21'),
(36, 'aperiam', 'Malika Prastuti', 'Kusmanto', 824, 'Finishing', 'default.png', '1985-05-09', '1998-07-14'),
(37, 'ut', 'Makuta Kurniawan', 'Baranangsiang', 889, 'Cutting', 'default.png', '1978-09-01', '2018-03-24'),
(38, 'aspernatur', 'Dewi Rahmawati', 'Sudirman', 750, 'Cutting', 'default.png', '2017-04-29', '1998-08-20'),
(39, 'ab', 'Indra Jailani', 'Cut Nyak Dien', 901, 'Finishing', 'default.png', '1990-03-14', '2000-02-17'),
(40, 'incidunt', 'Dacin Danuja Pangestu S.I.Kom', 'Tambak', 301, 'Sewing', 'default.png', '2014-11-11', '1981-01-08'),
(41, 'libero', 'Mursita Nashiruddin', 'Lembong', 70, 'Full Proses', 'default.png', '1984-06-01', '1988-04-16'),
(42, 'architecto', 'Purwa Jamil Wijaya S.IP', 'Tambak', 82, 'Full Proses', 'default.png', '1970-07-17', '2015-04-26'),
(43, 'est', 'Catur Ivan Marpaung S.Farm', 'Dipenogoro', 540, 'Cutting', 'default.png', '2020-11-25', '2023-01-28'),
(44, 'eum', 'Nabila Laksita', 'Pahlawan', 823, 'Finishing', 'default.png', '1983-02-26', '1992-09-03'),
(45, 'aspernatur', 'Eli Astuti', 'Yos', 537, 'Full Proses', 'default.png', '1998-02-11', '1996-06-14'),
(46, 'TS Raglan Forest', 'Yohanes Kurniawan', 'Osella', 383, 'Finishing', '1706829162_ef993d310c805e3b5276.jpg', '2024-01-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `hanca`
--

CREATE TABLE `hanca` (
  `id_hanca` bigint(20) UNSIGNED NOT NULL,
  `id_produksi` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(6, '2024-01-27-141600', 'App\\Database\\Migrations\\Barang', 'default', 'App', 1706794903, 1),
(7, '2024-01-28-110228', 'App\\Database\\Migrations\\Pegawai', 'default', 'App', 1706794903, 1),
(8, '2024-01-30-134102', 'App\\Database\\Migrations\\Produksi', 'default', 'App', 1706794904, 1),
(9, '2024-02-01-132209', 'App\\Database\\Migrations\\Hanca', 'default', 'App', 1706794905, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` bigint(20) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(60) NOT NULL,
  `email_pegawai` varchar(60) NOT NULL,
  `password_pegawai` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `email_pegawai`, `password_pegawai`, `alamat`, `bagian`, `telp`, `foto`) VALUES
(3, 'Karman Prabowo', 'umay.mandala@gmail.com', '5<[`/}W$', 'Jr. Peta No. 213, Tanjungbalai 96194, Kaltim', 'Finishing', '(+62) 414 3935 108', 'default.png'),
(12, 'Hasim Anggriawan', 'jane.iswahyudi@yahoo.com', 'gggdfresasas', 'Gg. Bhayangkara No. 543, Banjarbaru 47851, NTT', 'Sewing', '0677 4615 096', '1706830247_f8cd00bfa96d68fecd77.jpg'),
(13, 'Bagas Mahmud Dabukke', 'vanya20@kuswoyo.ac.id', '1tBA\'r0', 'Ki. Bagis Utama No. 27, Solok 37853, Jambi', 'Cutting', '(+62) 472 2847 488', 'default.png'),
(14, 'Maya Mutia Lestari', 'baktianto.permadi@yahoo.com', 'LhHdJ)', 'Ds. Batako No. 665, Palangka Raya 75431, Kaltim', 'Finishing', '(+62) 824 3096 636', 'default.png'),
(15, 'Jaeman Wijaya S.Psi', 'rahayu.irma@gmail.com', '\"33F\\/5E2jgVW', 'Psr. Pintu Besar Selatan No. 819, Parepare 23956, Kalteng', 'Cutting', '0973 9577 310', 'default.png'),
(16, 'Agus Sabar Wijaya', 'rahayu.eka@widiastuti.or.id', '{/1YVGt~JL,2', 'Ds. Abdul No. 886, Langsa 86769, Gorontalo', 'Cutting', '(+62) 529 4878 397', 'default.png'),
(17, 'Cornelia Wijayanti', 'rahmawati.janet@iswahyudi.info', '?-z9x)42OP!', 'Gg. Bakau Griya Utama No. 598, Lhokseumawe 16690, Kalsel', 'Cutting', '021 0915 857', 'default.png'),
(18, 'Ratna Dina Hasanah', 'ulva43@yahoo.com', '*,C5\"u$#H', 'Dk. Jakarta No. 86, Palu 90823, Kepri', 'Finishing', '(+62) 265 7289 398', 'default.png'),
(19, 'Viman Sihombing', 'cici.hutagalung@yahoo.co.id', ']).K\\ZviN>K|', 'Dk. Pintu Besar Selatan No. 71, Metro 94835, Pabar', 'Finishing', '0738 3424 0765', 'default.png'),
(20, 'Sabrina Halimah', 'aryani.paulin@pratiwi.name', 't$kJ5K', 'Ds. Bass No. 207, Metro 53977, Jambi', 'Sewing', '0831 1031 8444', 'default.png'),
(21, 'Jamal Adriansyah S.H.', 'pangestu05@adriansyah.co', '*cj:tPUA', 'Jr. Wahid Hasyim No. 86, Tarakan 66927, Gorontalo', 'Cutting', '0775 5461 8204', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` bigint(20) UNSIGNED NOT NULL,
  `tgl_kirim` date NOT NULL,
  `status_produksi` varchar(20) NOT NULL,
  `id_pegawai` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `Updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `tgl_kirim`, `status_produksi`, `id_pegawai`, `id_barang`, `created_at`, `Updated_at`) VALUES
(1, '1993-03-17', 'selesai', 3, 4, '1988-11-29 17:01:19', '1985-11-20 18:56:23'),
(2, '1993-12-05', 'selesai', 3, 4, '1977-10-04 17:42:12', '2017-09-07 14:06:27'),
(3, '1986-07-06', 'Produksi', 3, 4, '1992-09-01 06:19:42', '1978-03-28 15:21:58'),
(4, '1977-05-14', 'selesai', 3, 4, '1996-01-03 02:38:01', '1978-12-06 16:45:26'),
(5, '2014-09-14', 'Menunggu', 3, 4, '2012-02-16 18:07:39', '1988-07-11 10:57:53'),
(6, '1993-04-14', 'selesai', 3, 4, '2008-07-18 02:33:29', '2018-09-23 07:46:54'),
(7, '2015-04-04', 'selesai', 3, 4, '2010-04-10 01:30:36', '1983-02-13 20:56:52'),
(8, '1994-06-01', 'selesai', 3, 4, '2009-03-02 03:53:15', '2006-01-24 03:01:45'),
(9, '2003-08-02', 'selesai', 3, 4, '2015-08-13 16:55:35', '2015-11-07 08:06:25'),
(10, '1971-05-20', 'selesai', 3, 4, '1970-09-09 06:07:34', '2017-01-06 20:25:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `hanca`
--
ALTER TABLE `hanca`
  ADD PRIMARY KEY (`id_hanca`),
  ADD KEY `hanca_id_produksi_foreign` (`id_produksi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `produksi_id_barang_foreign` (`id_barang`),
  ADD KEY `produksi_id_pegawai_foreign` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `hanca`
--
ALTER TABLE `hanca`
  MODIFY `id_hanca` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hanca`
--
ALTER TABLE `hanca`
  ADD CONSTRAINT `hanca_id_produksi_foreign` FOREIGN KEY (`id_produksi`) REFERENCES `produksi` (`id_produksi`);

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `produksi_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
