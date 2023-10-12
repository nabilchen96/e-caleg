-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 03:35 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `scan_masuk` time DEFAULT NULL,
  `scan_pulang` time DEFAULT NULL,
  `terlambat` time DEFAULT NULL,
  `pulang_cepat` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id`, `id_pegawai`, `tanggal`, `scan_masuk`, `scan_pulang`, `terlambat`, `pulang_cepat`, `created_at`, `updated_at`) VALUES
(21, '4', '2023-10-11', '08:01:00', '16:01:00', '00:01:00', '00:00:00', NULL, NULL),
(22, '5', '2023-10-11', NULL, '11:59:13', NULL, '04:00:47', NULL, NULL),
(24, '6', '2023-10-11', '08:00:00', NULL, '00:00:00', NULL, NULL, NULL),
(26, '7', '2023-10-11', NULL, '15:42:40', NULL, '00:17:20', NULL, NULL),
(27, '8', '2023-10-11', '15:46:53', NULL, '00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_awal_shift` date NOT NULL,
  `tanggal_akhir_shift` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `id_pegawai`, `id_shift`, `tanggal_awal_shift`, `tanggal_akhir_shift`, `created_at`, `updated_at`) VALUES
(2, '4', '2', '2023-10-11', '2023-12-31', '2023-10-10 23:00:21', '2023-10-11 01:38:09'),
(3, '5', '2', '2023-10-11', '2023-10-31', '2023-10-11 04:56:22', '2023-10-11 04:56:22'),
(4, '6', '2', '2023-10-11', '2023-10-31', '2023-10-11 05:56:19', '2023-10-11 05:56:19'),
(5, '7', '2', '2023-10-11', '2023-10-31', '2023-10-11 06:55:40', '2023-10-11 06:55:40'),
(6, '8', '3', '2023-10-11', '2023-10-31', '2023-10-11 08:46:17', '2023-10-11 08:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `jaringans`
--

CREATE TABLE `jaringans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jaringan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jaringans`
--

INSERT INTO `jaringans` (`id`, `jaringan`, `ip`, `created_at`, `updated_at`) VALUES
(2, 'INDIHOME', '180.249.247.56', '2023-10-10 13:21:45', '2023-10-10 13:21:45'),
(4, 'KANTOR POLTEKBANG', '202.122.15.38', '2023-10-11 08:42:14', '2023-10-11 08:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_10_200757_create_jaringans_table', 2),
(6, '2023_10_10_202305_create_shifts_table', 3),
(9, '2023_10_10_205421_create_jadwals_table', 4),
(11, '2023_10_11_060338_create_absensis_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal_masuk` time NOT NULL,
  `terlambat_masuk` time NOT NULL,
  `batas_masuk` time NOT NULL,
  `awal_pulang` time NOT NULL,
  `batas_pulang` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `nama_shift`, `awal_masuk`, `terlambat_masuk`, `batas_masuk`, `awal_pulang`, `batas_pulang`, `created_at`, `updated_at`) VALUES
(2, 'Shift Pagi', '06:00:00', '08:00:00', '11:00:00', '16:00:00', '18:00:00', '2023-10-10 22:58:53', '2023-10-11 04:25:03'),
(3, 'Shift Sore', '15:00:00', '16:01:00', '19:00:00', '22:00:00', '23:00:00', '2023-10-11 08:45:59', '2023-10-11 08:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nip`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '12345678910', 'admin@gmail.com', NULL, '$2y$10$SM1B5E4BiOZhbrDvcDESOegD6y9vLW7xLLsloeHu.Hndo6nF5L7Ze', 'Admin', NULL, NULL, NULL),
(4, 'Wilma Stokes', '12345678910', 'jykydev@mailinator.com', NULL, '$2y$10$kM0ThzVGDYEsI6poyKAdwOk.SJjT9zpJM.nxKm0eu03wIM19qRKC.', 'Pegawai', NULL, '2023-10-10 13:02:32', '2023-10-10 23:58:37'),
(5, 'Lucian Dale', '12345678910', 'hyjuqudoh@mailinator.com', NULL, '$2y$10$26VqSD94PQmzPN84MhgrqeEYrQqJ8vMEZ5LgXBwE6MFD478yK3iLm', 'Pegawai', NULL, '2023-10-11 04:56:01', '2023-10-11 04:56:01'),
(6, 'Jerry Banks', '12345678910', 'nijokozeha@mailinator.com', NULL, '$2y$10$/dApqK6mZunHnlzK0xPU3.itbRkQ83llCgTiicF8z6BOY29X6NRGu', 'Pegawai', NULL, '2023-10-11 05:55:27', '2023-10-11 05:55:27'),
(7, 'Tate Bright', '12345678910', 'nypijedyke@mailinator.com', NULL, '$2y$10$SwjdLDxaltaCQqCw9KNzfemii87EAZrAP1tdWcgzuu5nDBlgRfN3G', 'Pegawai', NULL, '2023-10-11 06:55:00', '2023-10-11 06:55:00'),
(8, 'Allegra Lyons', '12345678910', 'zosajuciwi@mailinator.com', NULL, '$2y$10$kS3SF5qdHDM3N75zVxRvSOHCgwBwoNI/iNixaxsHcTx4JbBnauBfq', 'Pegawai', NULL, '2023-10-11 08:44:54', '2023-10-11 08:44:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jaringans`
--
ALTER TABLE `jaringans`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
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
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jaringans`
--
ALTER TABLE `jaringans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
