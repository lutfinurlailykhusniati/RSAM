-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 02:29 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rsaisyiyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftars`
--

CREATE TABLE `daftars` (
  `id` int(10) UNSIGNED NOT NULL,
  `pasien_id` int(10) UNSIGNED NOT NULL,
  `jadwal_id` int(10) UNSIGNED NOT NULL,
  `antrian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `poliklinik_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `poliklinik_id`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lutfi', 'ambartwang', 'Magelang', '2018-08-01', NULL, '2018-08-08 05:24:08', '2018-08-08 05:24:08'),
(2, 2, 'Nurlaily', 'Semarang', 'Semarang', '2018-08-02', NULL, '2018-08-08 05:24:31', '2018-08-08 05:24:31'),
(3, 1, 'Khusniati', 'Jogja', 'Jogja', '2018-08-04', NULL, '2018-08-08 05:24:51', '2018-08-08 05:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` int(10) UNSIGNED NOT NULL,
  `dokter_id` int(10) UNSIGNED NOT NULL,
  `tanggal_jadwal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  `kuota` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `dokter_id`, `tanggal_jadwal`, `jam_mulai`, `jam_berakhir`, `kuota`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-08-15', '07:00:00', '08:00:00', 15, NULL, '2018-08-08 05:25:25', '2018-08-08 05:25:25'),
(2, 1, '2018-08-15', '11:00:00', '00:00:00', 15, NULL, '2018-08-08 05:25:49', '2018-08-08 05:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2018_07_09_171953_create_pasiens_table', 1),
(12, '2018_07_14_083508_create_doctors_table', 2),
(15, '2018_07_24_131104_create_jadwal_table', 4),
(74, '2018_08_08_114857_create_pendaftarans_table', 5),
(75, '2018_08_08_121012_create_pendaftarans_table', 6),
(77, '2014_10_12_000000_create_users_table', 7),
(78, '2014_10_12_100000_create_password_resets_table', 7),
(79, '2018_07_11_123912_create_polyclinics_table', 7),
(80, '2018_07_18_074734_create_pasiens_table', 7),
(81, '2018_07_21_060621_create_doctors_table', 7),
(82, '2018_07_24_132735_create_jadwals_table', 7),
(83, '2018_08_08_121255_create_daftars_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dusun` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_rumah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `goldar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_ktp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_kk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_pernikahan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bahasa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polyclinics`
--

CREATE TABLE `polyclinics` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_poliklinik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `polyclinics`
--

INSERT INTO `polyclinics` (`id`, `nama_poliklinik`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mata', NULL, '2018-08-08 05:23:38', '2018-08-08 05:23:38'),
(2, 'Umum', NULL, '2018-08-08 05:23:46', '2018-08-08 05:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'petugas',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$0QGWSLP1kNEjRvlfzehYW.qwy0hX1DwxS3k7PGnv9RO5WRAspa5v.', 'admin', NULL, '2018-08-08 05:23:00', '2018-08-08 05:23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftars`
--
ALTER TABLE `daftars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftars_pasien_id_foreign` (`pasien_id`),
  ADD KEY `daftars_jadwal_id_foreign` (`jadwal_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_poliklinik_id_foreign` (`poliklinik_id`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_dokter_id_foreign` (`dokter_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `polyclinics`
--
ALTER TABLE `polyclinics`
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
-- AUTO_INCREMENT for table `daftars`
--
ALTER TABLE `daftars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polyclinics`
--
ALTER TABLE `polyclinics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftars`
--
ALTER TABLE `daftars`
  ADD CONSTRAINT `daftars_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daftars_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_poliklinik_id_foreign` FOREIGN KEY (`poliklinik_id`) REFERENCES `polyclinics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
