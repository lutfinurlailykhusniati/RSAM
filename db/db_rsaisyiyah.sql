# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.34-MariaDB)
# Database: db_rsaisyiyah
# Generation Time: 2018-12-15 13:10:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bookings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(10) unsigned NOT NULL,
  `id_harijadwal` int(11) NOT NULL,
  `id_pasien` int(10) unsigned NOT NULL,
  `tanggal_jadwal` date NOT NULL,
  `no_antrian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_done` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_id_pasien_foreign` (`id_pasien`),
  KEY `id_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;

INSERT INTO `bookings` (`id`, `id_jadwal`, `id_harijadwal`, `id_pasien`, `tanggal_jadwal`, `no_antrian`, `is_done`, `created_at`, `updated_at`)
VALUES
	(38,41,26,1,'2018-09-05','1',0,'2018-09-03 23:19:56','2018-09-03 23:19:56'),
	(39,41,26,1,'2018-09-12','2',0,'2018-09-04 23:25:21','2018-09-04 23:25:21'),
	(40,41,24,1,'2018-09-17','1',0,'2018-09-09 22:42:11','2018-09-09 22:42:11');

/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table daftars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `daftars`;

CREATE TABLE `daftars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pasien_id` int(10) unsigned NOT NULL,
  `jadwal_id` int(10) unsigned NOT NULL,
  `antrian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `daftars_pasien_id_foreign` (`pasien_id`),
  KEY `daftars_jadwal_id_foreign` (`jadwal_id`),
  CONSTRAINT `daftars_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `daftars_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table doctor_polis
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doctor_polis`;

CREATE TABLE `doctor_polis` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) DEFAULT NULL,
  `id_poli` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `doctor_polis` WRITE;
/*!40000 ALTER TABLE `doctor_polis` DISABLE KEYS */;

INSERT INTO `doctor_polis` (`id`, `id_doctor`, `id_poli`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,26,2),
	(4,27,2),
	(5,28,1),
	(6,28,2),
	(7,29,1),
	(8,29,2);

/*!40000 ALTER TABLE `doctor_polis` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table doctors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doctors`;

CREATE TABLE `doctors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `poliklinik_id` int(10) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctors_poliklinik_id_foreign` (`poliklinik_id`),
  CONSTRAINT `doctors_poliklinik_id_foreign` FOREIGN KEY (`poliklinik_id`) REFERENCES `polyclinics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;

INSERT INTO `doctors` (`id`, `poliklinik_id`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `remember_token`, `created_at`, `updated_at`, `status`)
VALUES
	(28,1,'dr. Anbiya Warnosaputro','Brebes','Magelang','1997-03-26',NULL,'2018-12-15 04:45:23','2018-12-15 05:58:42','Aktif'),
	(29,1,'dr. Jaelani, Sp.OG','Brebes','Majalengka','1997-03-26',NULL,'2018-12-15 05:58:05','2018-12-15 05:58:05','Aktif');

/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dokters
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dokters`;

CREATE TABLE `dokters` (
  `id` int(11) NOT NULL,
  `id_poliklinik` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `alamat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table hari_jadwals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hari_jadwals`;

CREATE TABLE `hari_jadwals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(10) unsigned NOT NULL,
  `id_hari` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  `kuota` int(11) NOT NULL,
  `sisa_kuota` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hari_jadwals_id_jadwal_foreign` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `hari_jadwals` WRITE;
/*!40000 ALTER TABLE `hari_jadwals` DISABLE KEYS */;

INSERT INTO `hari_jadwals` (`id`, `id_jadwal`, `id_hari`, `created_at`, `updated_at`, `jam_mulai`, `jam_berakhir`, `kuota`, `sisa_kuota`)
VALUES
	(22,40,1,'2018-09-03 00:22:48','2018-09-03 00:22:48','07:00:00','08:00:00',10,10),
	(23,40,2,'2018-09-03 00:22:48','2018-09-03 00:22:48','07:00:00','08:00:00',10,10),
	(24,41,1,'2018-09-03 20:29:28','2018-09-09 22:42:11','07:00:00','20:00:00',10,9),
	(25,41,2,'2018-09-03 20:29:28','2018-09-03 20:29:28','07:00:00','20:00:00',10,10),
	(26,41,3,'2018-09-03 20:29:28','2018-09-07 07:58:05','07:00:00','20:00:00',5,3),
	(27,41,4,'2018-09-03 20:29:28','2018-09-03 20:29:28','07:00:00','20:00:00',10,10),
	(28,41,6,'2018-09-03 20:29:28','2018-09-03 20:29:28','07:00:00','20:00:00',10,10),
	(29,42,1,'2018-09-03 20:30:30','2018-09-03 20:30:30','15:00:00','17:00:00',20,20),
	(30,42,3,'2018-09-03 20:30:30','2018-09-03 20:30:30','15:00:00','17:00:00',20,20),
	(31,42,4,'2018-09-03 20:30:30','2018-09-03 20:30:30','15:00:00','17:00:00',20,20),
	(32,43,1,'2018-12-15 06:09:03','2018-12-15 06:09:03','22:22:00','03:33:00',33,33),
	(33,43,3,'2018-12-15 06:09:03','2018-12-15 06:09:03','22:22:00','03:33:00',33,33);

/*!40000 ALTER TABLE `hari_jadwals` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table haris
# ------------------------------------------------------------

DROP TABLE IF EXISTS `haris`;

CREATE TABLE `haris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hari` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `haris` WRITE;
/*!40000 ALTER TABLE `haris` DISABLE KEYS */;

INSERT INTO `haris` (`id`, `hari`, `alias`)
VALUES
	(1,'Senin','monday'),
	(2,'Selasa','tuesday'),
	(3,'Rabu','wednesday'),
	(4,'Kamis','thursday'),
	(5,'Jumat','friday'),
	(6,'Sabtu','saturday');

/*!40000 ALTER TABLE `haris` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jadwals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jadwals`;

CREATE TABLE `jadwals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dokter_id` int(10) unsigned NOT NULL,
  `poli_id` int(11) DEFAULT NULL,
  `tanggal_jadwal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_berakhir` time DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwals_dokter_id_foreign` (`dokter_id`),
  CONSTRAINT `jadwals_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `jadwals` WRITE;
/*!40000 ALTER TABLE `jadwals` DISABLE KEYS */;

INSERT INTO `jadwals` (`id`, `dokter_id`, `poli_id`, `tanggal_jadwal`, `jam_mulai`, `jam_berakhir`, `kuota`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(43,28,1,NULL,NULL,NULL,NULL,NULL,'2018-12-15 06:09:03','2018-12-15 06:09:03');

/*!40000 ALTER TABLE `jadwals` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(3,'2018_07_09_171953_create_pasiens_table',1),
	(12,'2018_07_14_083508_create_doctors_table',2),
	(15,'2018_07_24_131104_create_jadwal_table',4),
	(74,'2018_08_08_114857_create_pendaftarans_table',5),
	(75,'2018_08_08_121012_create_pendaftarans_table',6),
	(77,'2014_10_12_000000_create_users_table',7),
	(78,'2014_10_12_100000_create_password_resets_table',7),
	(79,'2018_07_11_123912_create_polyclinics_table',7),
	(80,'2018_07_18_074734_create_pasiens_table',7),
	(81,'2018_07_21_060621_create_doctors_table',7),
	(82,'2018_07_24_132735_create_jadwals_table',7),
	(83,'2018_08_08_121255_create_daftars_table',7);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pasiens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pasiens`;

CREATE TABLE `pasiens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `pasiens` WRITE;
/*!40000 ALTER TABLE `pasiens` DISABLE KEYS */;

INSERT INTO `pasiens` (`id`, `name`, `dusun`, `rt`, `rw`, `no_rumah`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `tempat_lahir`, `tanggal_lahir`, `goldar`, `no_tlp`, `no_ktp`, `no_kk`, `status_pernikahan`, `agama`, `pekerjaan`, `pendidikan`, `bahasa`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Nopa N','Ceperan','14','7','111','Sambirejo','Plupuh','Gemolong','Jawa Tengah','Sragen','2018-08-09','A','085257558998','123','123','BelumMenikah','Islam','aaa','SMA/SMK/Sederajat','Jawa',NULL,'2018-08-08 19:24:58','2018-08-20 02:22:38'),
	(2,'Abi Anbiya','a','1','1','1','1','1','1','1','1','2018-08-09','A','1','123456789001111','1','BelumMenikah','Islam','1','TIdakSekolah','Jawa',NULL,'2018-08-09 03:09:29','2018-08-20 02:14:14'),
	(8847,'Ghoniatul Muniroh','Tamanagung','2','2','-','Tamanagung','Muntilan','Magelang','Jawa Tengah','Magelang','1977-03-02','A','085257558998','3308095311950000','3308092502072860','Menikah','Islam','Ibu Rumah Tangga','SMA/SMK/Sederajat','Jawa',NULL,NULL,NULL),
	(16372,'Latifah Anis Baroroh','Borobudur','3','7','-','Borobudur','Borobudur','Magelang','Jawa Tengah','Magelang','1992-05-07','AB','085257558998','3308095311950000','3308092502072860','Belum Menikah','Islam','Admin','D3','Jawa',NULL,NULL,NULL),
	(43205,'Akhyat Imam Prayudi','Druju Kidul','9','3','-','Plosogede','Muntilan','Magelang','Jawa Tengah','Magelang','1973-10-23','O','85257558998','3308095311950000','3308092502072860','Menikah','Islam','Petani','SMA/SMK/Sederajat','Jawa',NULL,NULL,NULL),
	(46042,'Fitria Pusparani','Dentan','4','8','-','Caturtunggal','Ngaglik','Sleman','Yogyakarta','Magelang','1991-04-18','B','85257558998','3308095311950000','3308092502072860','Menikah','Islam','Admin','D3','Jawa',NULL,NULL,NULL),
	(47591,'Jamil Rifanto','Sleman','12','5','-','Sleman','Sleman','Sleman','Yogyakarta','Jerman','1989-06-27','A','85257558998','3308095311950000','3308092502072860','Menikah','Islam','PNS','S1','Indonesia',NULL,NULL,NULL),
	(49515,'Muawanah','Tegalsari','1','11','-','Bojong','Mungkid','Magelang','Jawa Tengah','Magelang','1971-04-12','AB','85257558998','3308095311950000','3308092502072860','Menikah','Islam','Buruh','SMA/SMK/Sederajat','Jawa',NULL,NULL,NULL),
	(51818,'Muhammad Zusnaeni','Gamol','1','1','-','Paremono','Mungkid','Magelang','Jawa Tengah','Magelang','1994-07-12','AB','85257558998','3308095311950000','3308092502072860','Belum Menikah','Islam','Teknisi','SMA/SMK/Sederajat','Jawa',NULL,NULL,NULL),
	(63558,'Hasanudin','Potrobangsan','4','9','-','Potrobangsan','Magelang','Magelang','Jawa Tengah','Magelang','1976-10-19','B','85257558998','3308095311950000','3308092502072860','Menikah','Islam','Wiraswasta','SMA/SMK/Sederajat','Jawa',NULL,NULL,NULL),
	(66202,'Suyoto','Mbumen','2','6','-','Mbumen','Borobudur','Magelang','Jawa Tengah','Magelang','1984-10-17','A','85257558998','3308095311950000','3308092502072860','Menikah','Islam','PNS','S1','Jawa',NULL,NULL,NULL),
	(96372,'Rofiatun Khasanah','Ponngol','5','3','-','Ponggol','Muntilan','Magelang','Jawa Tengah','Magelang','1998-12-02','B','85257558998','3308095311950000','3308092502072860','Belum Menikah','Islam','Mahasiswa','SMA/SMK/Sederajat','Jawa',NULL,NULL,NULL),
	(96373,'Aji','Sekaran','01','03','32','Sekaran','Gunungpati','Semarang','Jawa Tengah','Grobogan','2018-09-01','A','085257558998','2','2','Menikah','Islam','Dosen','S2','Indonesia',NULL,'2018-09-06 20:36:10','2018-09-06 20:36:10');

/*!40000 ALTER TABLE `pasiens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table polyclinics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `polyclinics`;

CREATE TABLE `polyclinics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_poliklinik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `polyclinics` WRITE;
/*!40000 ALTER TABLE `polyclinics` DISABLE KEYS */;

INSERT INTO `polyclinics` (`id`, `nama_poliklinik`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Mata',NULL,'2018-08-08 05:23:38','2018-08-08 05:23:38'),
	(2,'Umum',NULL,'2018-08-08 05:23:46','2018-08-08 05:23:46');

/*!40000 ALTER TABLE `polyclinics` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'petugas',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin','admin@gmail.com','$2y$10$0QGWSLP1kNEjRvlfzehYW.qwy0hX1DwxS3k7PGnv9RO5WRAspa5v.','admin',NULL,'2018-08-08 05:23:00','2018-08-08 05:23:00');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
