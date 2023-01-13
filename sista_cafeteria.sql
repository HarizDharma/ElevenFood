-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 02:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sista_cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `gambar`, `harga`, `stok`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Soto Ayam', 'soto.jpg', 12000, 1, 'Soto Ayam lengkap banyak toppingnya', '2022-12-06 01:02:05', '2022-12-14 00:24:34'),
(2, 'Bakso Aci', 'bakso_aci.jpeg', 7000, 1, 'Bakso Aci\r\nTopping :\r\n - Bakso yang lembut', '2022-12-06 01:02:05', '2022-12-06 01:02:05'),
(3, 'Dimsum', 'dimsum.jpeg', 5000, 1, 'Dimsum\r\nMacam-macam :\r\n- Siomay\r\n- Udang Rambutan\r\n- Udang Keju', '2022-12-06 01:02:05', '2022-12-06 01:02:05'),
(4, 'Es Campur', 'es_campur.jpeg', 8000, 1, 'Es Campur dengan banyak varian isi.', '2022-12-06 01:02:05', '2022-12-06 01:02:05'),
(5, 'Es Jeruk', 'es_jeruk.jpeg', 7500, 1, 'Es Jeruk dengan rasa yang unik : \r\n- Cocopanda\r\n- Nutri Jelly', '2022-12-06 01:02:05', '2022-12-06 01:02:05'),
(6, 'Es Teh', 'es_teh.jpeg', 5000, 1, 'Es teh dengan rasa yang khas melati', '2022-12-06 01:02:05', '2022-12-06 01:02:05'),
(7, 'Jeruk Hangat', 'jerukhangat.jpeg', 5000, 1, 'Es teh dengan kehangatan yang haqiqi', '2022-12-06 01:02:05', '2022-12-06 01:02:05'),
(8, 'Kerupuk Udang', 'kerupuk_udang.jpeg', 1000, 1, 'Kerupuk yang renyah dan sangat menggoda sekali', '2022-12-06 01:02:05', '2022-12-18 18:52:20'),
(9, 'Nasi Campur', 'nasi_campur.jpeg', 9000, 1, 'Nasinya biasa kalau dicampur luar biasa.', '2022-12-06 01:02:05', '2022-12-06 01:02:05'),
(10, 'Nasi Pecel', 'nasi_pecel.jpeg', 9000, 1, 'Nasi Pecel Bergairah', '2022-12-06 01:02:05', '2022-12-06 01:02:05'),
(11, 'Teh Hangat', 'teh_hangat.jpeg', 5000, 1, 'Teh dengan segala kelembutannya.', '2022-12-06 01:02:05', '2022-12-06 01:02:05'),
(13, 'Soto Maduraaaaaaaa', 'es_campur.jpeg', 12000, 0, 'Soto Madura Lengkap', '2022-12-13 11:11:01', '2022-12-14 00:51:25'),
(14, 'Ayam Koloke', 'Untitled.png', 10000, 1, 'Ayam yang menggemaskan', '2022-12-18 18:58:47', '2022-12-18 18:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2022_12_06_004337_create_barangs_table', 1),
(5, '2022_12_06_005256_create_pesanan_details_table', 1),
(7, '2022_12_06_005115_create_pesanans_table', 2),
(8, '2014_10_12_000000_create_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `konfirmasi_admin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `user_id`, `tanggal`, `status`, `bukti`, `kode`, `jumlah_harga`, `konfirmasi_admin`, `created_at`, `updated_at`) VALUES
(8, 2, '2022-12-09', '1', '00000.PNG', 238, 98000, '1', '2022-12-09 10:13:09', '2022-12-18 18:51:35'),
(9, 2, '2022-12-10', '1', '2.PNG', 447, 35000, '1', '2022-12-09 19:18:57', '2022-12-11 20:34:54'),
(13, 2, '2022-12-13', '1', '00.PNG', 957, 63000, '1', '2022-12-12 19:21:14', '2022-12-18 18:57:35'),
(14, 2, '2022-12-14', '1', 'tarik-dana-1.5.jpg', 710, 25000, '0', '2022-12-14 06:54:58', '2022-12-14 07:05:50'),
(15, 2, '2022-12-19', '1', 'tarik-dana-1.5.jpg', 167, 35000, '0', '2022-12-18 18:50:10', '2022-12-18 18:50:48'),
(16, 2, '2022-12-19', '1', 'tarik-dana-1.5.jpg', 851, 96000, '0', '2022-12-18 18:54:29', '2022-12-18 18:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_details`
--

INSERT INTO `pesanan_details` (`id`, `barang_id`, `pesanan_id`, `jumlah`, `jumlah_harga`, `created_at`, `updated_at`) VALUES
(16, 4, 6, 1, 7000, '2022-12-06 12:47:38', '2022-12-06 12:47:38'),
(17, 4, 7, 1, 7000, '2022-12-06 12:50:48', '2022-12-06 12:50:48'),
(18, 3, 7, 5, 25000, '2022-12-06 23:28:03', '2022-12-06 23:28:03'),
(19, 6, 8, 3, 15000, '2022-12-09 10:13:09', '2022-12-09 10:13:09'),
(20, 1, 8, 3, 27000, '2022-12-09 10:13:22', '2022-12-09 10:13:22'),
(21, 2, 9, 5, 35000, '2022-12-09 19:18:57', '2022-12-09 19:18:57'),
(22, 2, 8, 8, 56000, '2022-12-09 20:02:40', '2022-12-09 20:02:40'),
(23, 2, 10, 8, 56000, '2022-12-12 19:10:18', '2022-12-12 19:10:18'),
(24, 1, 11, 6, 54000, '2022-12-12 19:13:59', '2022-12-12 19:13:59'),
(25, 1, 12, 8, 72000, '2022-12-12 19:16:35', '2022-12-12 19:16:35'),
(26, 2, 13, 9, 63000, '2022-12-12 19:21:14', '2022-12-12 19:21:14'),
(27, 3, 14, 5, 25000, '2022-12-14 06:54:58', '2022-12-14 06:54:58'),
(28, 2, 15, 5, 35000, '2022-12-18 18:50:10', '2022-12-18 18:50:10'),
(29, 1, 16, 8, 96000, '2022-12-18 18:54:29', '2022-12-18 18:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `email_verified_at`, `password`, `alamat`, `nohp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kharisma Dharma Putra', 'kharisma@gmail.com', 1, NULL, '$2y$10$p.05ZOkSivxiwRFsVSlTz.HtrSM.zYaU3hIS2zdQTtQwUGhoI3QFO', 'JJln Raya Bokor Tumpang', '082335461297', NULL, '2022-12-08 15:56:30', '2022-12-08 19:23:26'),
(2, 'John Wick', 'john@gmail.com', 2, NULL, '$2y$10$WYOzIdLWqBgVqIapwRUTUu7E413uTOgLRyUkaeaj6Ccxqa.54PSoK', 'Jln Raya Bookong', '085334566578', NULL, '2022-12-09 10:12:48', '2022-12-09 10:13:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
