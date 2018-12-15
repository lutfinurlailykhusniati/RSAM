-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 08:56 AM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `id_harijadwal` int(11) NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `tanggal_jadwal` date NOT NULL,
  `no_antrian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_done` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `id_jadwal`, `id_harijadwal`, `id_pasien`, `tanggal_jadwal`, `no_antrian`, `is_done`, `created_at`, `updated_at`) VALUES
(38, 41, 26, 1, '2018-09-05', '1', 0, '2018-09-03 23:19:56', '2018-09-03 23:19:56'),
(39, 41, 26, 1, '2018-09-12', '2', 0, '2018-09-04 23:25:21', '2018-09-04 23:25:21'),
(40, 41, 24, 1, '2018-09-17', '1', 0, '2018-09-09 22:42:11', '2018-09-09 22:42:11');

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
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `poliklinik_id`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dr. Dwi Ambarwati', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Cuti', NULL, '2018-08-08 05:24:08', '2018-09-06 20:37:06'),
(2, 11, 'Dr. Tri Riyanto, Sp. THT', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-08 05:24:31', '2018-09-03 09:51:21'),
(3, 11, 'Dr. Siamsasi Rohani, Sp. THT.,KL.', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-08 05:24:51', '2018-09-03 09:51:28'),
(4, 3, 'Dr. Hari Sasongko, Sp.OG', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-10-13', 'Aktif', NULL, '2018-08-29 07:55:33', '2018-09-03 09:51:35'),
(5, 3, 'Dr. Purwohartono, Sp.OG', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 07:57:03', '2018-09-03 20:47:32'),
(6, 3, 'Dr. Yunita, Sp.OG', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Cuti', NULL, '2018-08-29 07:57:55', '2018-09-03 20:30:51'),
(7, 4, 'Dr. R.Saliki, Sp.A', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 07:59:05', '2018-09-03 20:47:41'),
(8, 4, 'Dr. Indardi Haryono, Sp. A', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:01:04', '2018-09-03 20:47:49'),
(9, 4, 'Dr. Woro Triaksiwi', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:02:01', '2018-09-03 20:47:56'),
(10, 5, 'Dr. Rochmad Nursetyo, Sp.PD', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:05:30', '2018-09-03 20:48:04'),
(11, 5, 'Dr. Feri Kurniasih, Sp.PD', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:07:57', '2018-09-03 20:48:16'),
(12, 7, 'Dr. Moh Was\'an, Sp.S,(K) QIA', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:09:52', '2018-09-03 20:48:29'),
(13, 7, 'Drg. Yessi Idha Martha', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1995-11-13', 'Aktif', NULL, '2018-08-29 08:10:33', '2018-09-03 20:48:40'),
(14, 1, 'Dr. Wiwik Widowati, Sp.M', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:11:27', '2018-09-03 20:48:52'),
(15, 1, 'Dr. Arief Setya Budi, Sp.M', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:12:20', '2018-09-03 20:49:00'),
(16, 9, 'Dr. Wahyu Setyawan, Sp. Ot', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:13:25', '2018-09-03 20:49:09'),
(17, 8, 'Dr. wawan Suci Nurasti, Sp. B', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:15:27', '2018-09-03 20:49:17'),
(18, 8, 'Dr. Welman Pramudyananta, Sp. B', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:16:48', '2018-09-03 20:49:25'),
(19, 8, 'Dr. Sutikno, Sp. B', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:17:28', '2018-09-03 20:49:33'),
(20, 8, 'Dr. Riza Pahlevi, Sp. B', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:18:07', '2018-09-03 20:49:43'),
(21, 13, 'Dr. Elypta Hapsari, Sp. PD', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:29:10', '2018-09-03 20:49:51'),
(22, 12, 'Nurjanah, Amd.Keb', 'Panjangan Bawah, RT 01 RW 11, Ambartawang, Mungkid, Magelang.', 'Magelang', '1975-11-13', 'Aktif', NULL, '2018-08-29 08:30:10', '2018-09-03 20:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` int(11) NOT NULL,
  `id_poliklinik` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `alamat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `haris`
--

CREATE TABLE `haris` (
  `id` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `haris`
--

INSERT INTO `haris` (`id`, `hari`, `alias`) VALUES
(1, 'Senin', 'monday'),
(2, 'Selasa', 'tuesday'),
(3, 'Rabu', 'wednesday'),
(4, 'Kamis', 'thursday'),
(5, 'Jumat', 'friday'),
(6, 'Sabtu', 'saturday');

-- --------------------------------------------------------

--
-- Table structure for table `hari_jadwals`
--

CREATE TABLE `hari_jadwals` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `id_hari` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  `kuota` int(11) NOT NULL,
  `sisa_kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hari_jadwals`
--

INSERT INTO `hari_jadwals` (`id`, `id_jadwal`, `id_hari`, `created_at`, `updated_at`, `jam_mulai`, `jam_berakhir`, `kuota`, `sisa_kuota`) VALUES
(22, 40, 1, '2018-09-03 00:22:48', '2018-09-03 00:22:48', '07:00:00', '08:00:00', 10, 10),
(23, 40, 2, '2018-09-03 00:22:48', '2018-09-03 00:22:48', '07:00:00', '08:00:00', 10, 10),
(24, 41, 1, '2018-09-03 20:29:28', '2018-09-09 22:42:11', '07:00:00', '20:00:00', 10, 9),
(25, 41, 2, '2018-09-03 20:29:28', '2018-09-03 20:29:28', '07:00:00', '20:00:00', 10, 10),
(26, 41, 3, '2018-09-03 20:29:28', '2018-09-07 07:58:05', '07:00:00', '20:00:00', 5, 3),
(27, 41, 4, '2018-09-03 20:29:28', '2018-09-03 20:29:28', '07:00:00', '20:00:00', 10, 10),
(28, 41, 6, '2018-09-03 20:29:28', '2018-09-03 20:29:28', '07:00:00', '20:00:00', 10, 10),
(29, 42, 1, '2018-09-03 20:30:30', '2018-09-03 20:30:30', '15:00:00', '17:00:00', 20, 20),
(30, 42, 3, '2018-09-03 20:30:30', '2018-09-03 20:30:30', '15:00:00', '17:00:00', 20, 20),
(31, 42, 4, '2018-09-03 20:30:30', '2018-09-03 20:30:30', '15:00:00', '17:00:00', 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` int(10) UNSIGNED NOT NULL,
  `dokter_id` int(10) UNSIGNED NOT NULL,
  `tanggal_jadwal` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `dokter_id`, `tanggal_jadwal`, `remember_token`, `created_at`, `updated_at`) VALUES
(40, 1, NULL, NULL, '2018-09-03 00:22:48', '2018-09-03 00:22:48'),
(41, 4, NULL, NULL, '2018-09-03 20:29:28', '2018-09-03 20:29:28'),
(42, 6, NULL, NULL, '2018-09-03 20:30:30', '2018-09-03 20:30:30');

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
(83, '2018_08_08_121255_create_daftars_table', 7),
(84, '2018_09_01_064735_create_bookings_table', 8),
(85, '2018_09_01_065325_create_bookings_table', 9),
(86, '2018_09_01_115829_create_hari_jadwals_table', 10);

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

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `name`, `dusun`, `rt`, `rw`, `no_rumah`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `tempat_lahir`, `tanggal_lahir`, `goldar`, `no_tlp`, `no_ktp`, `no_kk`, `status_pernikahan`, `agama`, `pekerjaan`, `pendidikan`, `bahasa`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nopa N', 'Ceperan', '14', '7', '111', 'Sambirejo', 'Plupuh', 'Gemolong', 'Jawa Tengah', 'Sragen', '2018-08-09', 'A', '085257558998', '123', '123', 'BelumMenikah', 'Islam', 'aaa', 'SMA/SMK/Sederajat', 'Jawa', NULL, '2018-08-08 19:24:58', '2018-08-20 02:22:38'),
(2, 'Abi Anbiya', 'a', '1', '1', '1', '1', '1', '1', '1', '1', '2018-08-09', 'A', '1', '123456789001111', '1', 'BelumMenikah', 'Islam', '1', 'TIdakSekolah', 'Jawa', NULL, '2018-08-09 03:09:29', '2018-08-20 02:14:14'),
(8847, 'Ghoniatul Muniroh', 'Tamanagung', '2', '2', '-', 'Tamanagung', 'Muntilan', 'Magelang', 'Jawa Tengah', 'Magelang', '1977-03-02', 'A', '085257558998', '3308095311950000', '3308092502072860', 'Menikah', 'Islam', 'Ibu Rumah Tangga', 'SMA/SMK/Sederajat', 'Jawa', NULL, NULL, NULL),
(16372, 'Latifah Anis Baroroh', 'Borobudur', '3', '7', '-', 'Borobudur', 'Borobudur', 'Magelang', 'Jawa Tengah', 'Magelang', '1992-05-07', 'AB', '085257558998', '3308095311950000', '3308092502072860', 'Belum Menikah', 'Islam', 'Admin', 'D3', 'Jawa', NULL, NULL, NULL),
(43205, 'Akhyat Imam Prayudi', 'Druju Kidul', '9', '3', '-', 'Plosogede', 'Muntilan', 'Magelang', 'Jawa Tengah', 'Magelang', '1973-10-23', 'O', '85257558998', '3308095311950000', '3308092502072860', 'Menikah', 'Islam', 'Petani', 'SMA/SMK/Sederajat', 'Jawa', NULL, NULL, NULL),
(46042, 'Fitria Pusparani', 'Dentan', '4', '8', '-', 'Caturtunggal', 'Ngaglik', 'Sleman', 'Yogyakarta', 'Magelang', '1991-04-18', 'B', '85257558998', '3308095311950000', '3308092502072860', 'Menikah', 'Islam', 'Admin', 'D3', 'Jawa', NULL, NULL, NULL),
(47591, 'Jamil Rifanto', 'Sleman', '12', '5', '-', 'Sleman', 'Sleman', 'Sleman', 'Yogyakarta', 'Jerman', '1989-06-27', 'A', '85257558998', '3308095311950000', '3308092502072860', 'Menikah', 'Islam', 'PNS', 'S1', 'Indonesia', NULL, NULL, NULL),
(49515, 'Muawanah', 'Tegalsari', '1', '11', '-', 'Bojong', 'Mungkid', 'Magelang', 'Jawa Tengah', 'Magelang', '1971-04-12', 'AB', '85257558998', '3308095311950000', '3308092502072860', 'Menikah', 'Islam', 'Buruh', 'SMA/SMK/Sederajat', 'Jawa', NULL, NULL, NULL),
(51818, 'Muhammad Zusnaeni', 'Gamol', '1', '1', '-', 'Paremono', 'Mungkid', 'Magelang', 'Jawa Tengah', 'Magelang', '1994-07-12', 'AB', '85257558998', '3308095311950000', '3308092502072860', 'Belum Menikah', 'Islam', 'Teknisi', 'SMA/SMK/Sederajat', 'Jawa', NULL, NULL, NULL),
(63558, 'Hasanudin', 'Potrobangsan', '4', '9', '-', 'Potrobangsan', 'Magelang', 'Magelang', 'Jawa Tengah', 'Magelang', '1976-10-19', 'B', '85257558998', '3308095311950000', '3308092502072860', 'Menikah', 'Islam', 'Wiraswasta', 'SMA/SMK/Sederajat', 'Jawa', NULL, NULL, NULL),
(66202, 'Suyoto', 'Mbumen', '2', '6', '-', 'Mbumen', 'Borobudur', 'Magelang', 'Jawa Tengah', 'Magelang', '1984-10-17', 'A', '85257558998', '3308095311950000', '3308092502072860', 'Menikah', 'Islam', 'PNS', 'S1', 'Jawa', NULL, NULL, NULL),
(96372, 'Rofiatun Khasanah', 'Ponngol', '5', '3', '-', 'Ponggol', 'Muntilan', 'Magelang', 'Jawa Tengah', 'Magelang', '1998-12-02', 'B', '85257558998', '3308095311950000', '3308092502072860', 'Belum Menikah', 'Islam', 'Mahasiswa', 'SMA/SMK/Sederajat', 'Jawa', NULL, NULL, NULL),
(96373, 'Aji', 'Sekaran', '01', '03', '32', 'Sekaran', 'Gunungpati', 'Semarang', 'Jawa Tengah', 'Grobogan', '2018-09-01', 'A', '085257558998', '2', '2', 'Menikah', 'Islam', 'Dosen', 'S2', 'Indonesia', NULL, '2018-09-06 20:36:10', '2018-09-06 20:36:10');

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
(2, 'Umum', NULL, '2018-08-08 05:23:46', '2018-08-08 05:23:46'),
(3, 'Kandungan', NULL, '2018-08-28 21:22:51', '2018-08-28 21:22:51'),
(4, 'Anak', NULL, '2018-08-28 21:23:13', '2018-08-28 21:23:13'),
(5, 'Penyakit Dalam', NULL, '2018-08-28 21:23:34', '2018-08-28 21:23:34'),
(6, 'Penyakit Saraf', NULL, '2018-08-28 21:24:02', '2018-08-28 21:24:02'),
(7, 'Gigi', NULL, '2018-08-28 21:24:15', '2018-08-28 21:24:15'),
(8, 'Bedah', NULL, '2018-08-28 21:24:33', '2018-08-28 21:24:33'),
(9, 'Ortopedi', NULL, '2018-08-28 21:25:20', '2018-08-28 21:25:20'),
(11, 'THT', NULL, '2018-08-28 21:25:38', '2018-08-28 21:25:38'),
(12, 'KIA/KB', NULL, '2018-08-28 21:26:10', '2018-08-28 21:26:10'),
(13, 'Hemodialisa', NULL, '2018-08-28 21:27:52', '2018-08-28 21:27:52');

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
(1, 'admin', 'admin@gmail.com', '$2y$10$0QGWSLP1kNEjRvlfzehYW.qwy0hX1DwxS3k7PGnv9RO5WRAspa5v.', 'admin', 'iU8lrRQqjMrpRFKGCIG8upcOLpcs5KKHHB0Ut40FePu4eodyaxIFfwKS0Z8D', '2018-08-08 05:23:00', '2018-08-08 05:23:00'),
(2, 'petugas', 'petugas@gmail.com', '$2y$10$LNGmMKCcwJHyaLHgvh/VXO0kWMKoZQFrwpONRb/S1Feo.1GpPaXNC', 'petugas', 'MN34CeC0ombZI7jimWbogT9jzaY71d72XFTlJhnCvHFJdrqX4S5j3lyaOwdV', '2018-08-08 05:38:10', '2018-08-08 05:38:10'),
(3, 'Lutfi Nurlaily', 'lutfilaily@gmail.com', '$2y$10$B7kgNzYlLNoiw8s2fqxWI.sy/2fLYQbzO5Mht0fhsy.bS5w0S1OWe', 'petugas', NULL, '2018-09-02 21:23:35', '2018-09-02 21:23:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_id_pasien_foreign` (`id_pasien`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_poliklinik_id_foreign` (`poliklinik_id`);

--
-- Indexes for table `haris`
--
ALTER TABLE `haris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hari_jadwals`
--
ALTER TABLE `hari_jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hari_jadwals_id_jadwal_foreign` (`id_jadwal`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `haris`
--
ALTER TABLE `haris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hari_jadwals`
--
ALTER TABLE `hari_jadwals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96374;

--
-- AUTO_INCREMENT for table `polyclinics`
--
ALTER TABLE `polyclinics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_poliklinik_id_foreign` FOREIGN KEY (`poliklinik_id`) REFERENCES `polyclinics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hari_jadwals`
--
ALTER TABLE `hari_jadwals`
  ADD CONSTRAINT `hari_jadwals_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
