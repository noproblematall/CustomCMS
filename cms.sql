-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.26 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5339
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table cms1.edit_events
CREATE TABLE IF NOT EXISTS `edit_events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms1.edit_events: 4 rows
DELETE FROM `edit_events`;
/*!40000 ALTER TABLE `edit_events` DISABLE KEYS */;
INSERT INTO `edit_events` (`id`, `event_name`, `event_type`, `created_at`, `updated_at`) VALUES
	(1, '"uuu" changed password of "sss".', 'Password Changed', '2019-06-14 13:24:25', '2019-06-14 13:24:25'),
	(2, '"uuu" created a "ttt" table.', 'Table Create', '2019-06-14 13:24:25', '2019-06-14 13:24:25'),
	(3, '"uuu" edited a "ccc" field of "ttt" table.', 'Table Edit', '2019-06-14 13:24:25', '2019-06-14 13:24:25'),
	(4, '"uuu" erased a "ccc" field of "ttt" table.', 'Table Erase', '2019-06-14 13:24:25', '2019-06-14 13:24:25');
/*!40000 ALTER TABLE `edit_events` ENABLE KEYS */;

-- Dumping structure for table cms1.event_histories
CREATE TABLE IF NOT EXISTS `event_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `history_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms1.event_histories: 0 rows
DELETE FROM `event_histories`;
/*!40000 ALTER TABLE `event_histories` DISABLE KEYS */;
INSERT INTO `event_histories` (`id`, `user_id`, `history_name`, `history_type`, `created_at`, `updated_at`) VALUES
	(1, 1, '"admin" changed password of "admin".', 'Password Changed', '2019-06-16 23:54:53', '2019-06-16 23:54:53'),
	(2, 1, '"admin" changed password of "jojy_user".', 'Password Changed', '2019-06-16 23:55:10', '2019-06-16 23:55:10');
/*!40000 ALTER TABLE `event_histories` ENABLE KEYS */;

-- Dumping structure for table cms1.mengisi_profils
CREATE TABLE IF NOT EXISTS `mengisi_profils` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `field1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field4` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms1.mengisi_profils: 12 rows
DELETE FROM `mengisi_profils`;
/*!40000 ALTER TABLE `mengisi_profils` DISABLE KEYS */;
INSERT INTO `mengisi_profils` (`id`, `user_id`, `field1`, `field2`, `field3`, `field4`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 543, '2019-06-09 13:54:16', '2019-06-14 14:05:37'),
	(2, 2, NULL, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet', 41, '2019-06-10 13:54:16', '2019-06-15 17:38:17'),
	(3, 3, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 77, '2019-06-11 13:54:16', '2019-06-11 13:54:16'),
	(4, 4, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 25, '2019-06-11 13:54:16', '2019-06-11 13:54:16'),
	(5, 5, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 527, '2019-06-11 13:54:16', '2019-06-11 13:54:16'),
	(6, 6, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 75, '2019-06-12 13:54:16', '2019-06-12 13:54:16'),
	(7, 7, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 52, '2019-06-13 13:54:16', '2019-06-13 13:54:16'),
	(8, 8, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 52, '2019-06-13 13:54:16', '2019-06-13 13:54:16'),
	(9, 9, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 77, '2019-06-14 13:54:16', '2019-06-14 13:54:16'),
	(10, 10, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 22, '2019-06-14 13:54:16', '2019-06-14 13:54:16'),
	(11, 13, 'ytrew', 'data of koko', 'hgtrew', 654, '2019-06-15 20:04:37', '2019-06-15 20:04:37'),
	(12, 14, 'qwer', 'qwer', 'qwer', NULL, NULL, NULL);
/*!40000 ALTER TABLE `mengisi_profils` ENABLE KEYS */;

-- Dumping structure for table cms1.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms1.migrations: 8 rows
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_06_09_095128_create_roles_table', 1),
	(4, '2019_06_10_212714_create_table_isians_table', 1),
	(5, '2019_06_10_212848_create_mengisi_profils_table', 1),
	(6, '2019_06_10_212941_create_pakan_ternaks_table', 1),
	(7, '2019_06_11_010334_create_edit_events_table', 1),
	(8, '2019_06_11_010420_create_event_histories_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table cms1.pakan_ternaks
CREATE TABLE IF NOT EXISTS `pakan_ternaks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `luas_tanaman_pakan_ternak_rumput_gajah_dll` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produksi_hijauan_makanan_ternak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipasok_dari_luar_kelurahan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disubsidi_dinas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms1.pakan_ternaks: 12 rows
DELETE FROM `pakan_ternaks`;
/*!40000 ALTER TABLE `pakan_ternaks` DISABLE KEYS */;
INSERT INTO `pakan_ternaks` (`id`, `user_id`, `luas_tanaman_pakan_ternak_rumput_gajah_dll`, `produksi_hijauan_makanan_ternak`, `dipasok_dari_luar_kelurahan`, `disubsidi_dinas`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 536, '2019-06-09 13:54:16', '2019-06-14 14:05:40'),
	(2, 2, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet', 11, '2019-06-10 13:54:16', '2019-06-15 17:38:17'),
	(3, 3, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 444, '2019-06-11 13:54:16', '2019-06-11 13:54:16'),
	(4, 4, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 111, '2019-06-10 13:54:16', '2019-06-10 13:54:16'),
	(5, 5, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 25, '2019-06-12 13:54:16', '2019-06-12 13:54:16'),
	(6, 6, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 75, '2019-06-12 13:54:16', '2019-06-12 13:54:16'),
	(7, 7, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 52, '2019-06-13 13:54:16', '2019-06-13 13:54:16'),
	(8, 8, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 257, '2019-06-10 13:54:16', '2019-06-10 13:54:16'),
	(9, 9, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 55, '2019-06-14 13:54:16', '2019-06-14 13:54:16'),
	(10, 10, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 27, '2019-06-14 13:54:16', '2019-06-14 13:54:16'),
	(11, 13, 'ytre', 'data of koko', 'hgfre', NULL, '2019-06-15 20:04:37', '2019-06-15 20:04:37'),
	(12, 14, 'qwer', 'wer', 'wer', 23423, NULL, NULL);
/*!40000 ALTER TABLE `pakan_ternaks` ENABLE KEYS */;

-- Dumping structure for table cms1.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms1.password_resets: 0 rows
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table cms1.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms1.roles: 3 rows
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', '2019-06-14 13:24:25', '2019-06-14 13:24:25'),
	(2, 'Admin', '2019-06-14 13:24:25', '2019-06-14 13:24:25'),
	(3, 'User', '2019-06-14 13:24:25', '2019-06-14 13:24:25');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table cms1.table_isians
CREATE TABLE IF NOT EXISTS `table_isians` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kelurahan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten_kota` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pengisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms1.table_isians: 12 rows
DELETE FROM `table_isians`;
/*!40000 ALTER TABLE `table_isians` DISABLE KEYS */;
INSERT INTO `table_isians` (`id`, `user_id`, `kelurahan`, `kecamatan`, `kabupaten_kota`, `provinsi`, `bulan`, `tahun`, `nama_pengisi`, `pekerjaan`, `jabatan`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL, 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet co', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 1234, '2019-06-09 13:54:16', '2019-06-14 14:05:42'),
	(12, 14, 'keki datauyt', 'jhg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 2, 'dfghj', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit ame', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet', 'Lorem ipsum, dolor sit amet conse', 77, '2019-06-10 13:54:16', '2019-06-15 17:38:17'),
	(3, 3, 'data of admin', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 888, '2019-06-11 13:54:16', '2019-06-11 13:54:16'),
	(4, 4, 'data of admin', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 250, '2019-06-10 13:54:16', '2019-06-14 15:34:02'),
	(5, 5, 'data of admin', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 777, '2019-06-11 13:54:16', '2019-06-11 13:54:16'),
	(6, 6, 'data of admin', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 88, '2019-06-12 13:54:16', '2019-06-12 13:54:16'),
	(7, 7, 'data of admin', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 63, '2019-06-13 13:54:16', '2019-06-13 13:54:16'),
	(8, 8, 'data of admin', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 87, '2019-06-10 13:54:16', '2019-06-10 13:54:16'),
	(9, 9, 'data of admin', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 45, '2019-06-14 13:54:16', '2019-06-14 13:54:16'),
	(10, 10, 'data of admin', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 'Lorem ipsum, dolor sit amet conse', 524, '2019-06-14 13:54:16', '2019-06-14 13:54:16'),
	(11, 13, NULL, NULL, NULL, 'hg', NULL, 'dfgsdf', 'sadfsd', 'fasdfas', 1231, '2019-06-15 20:04:37', '2019-06-15 20:04:37');
/*!40000 ALTER TABLE `table_isians` ENABLE KEYS */;

-- Dumping structure for table cms1.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms1.users: 14 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role_id`, `parent_id`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Admin', 'admin@example.com', NULL, '$2y$10$W2ND.mpH8Pw1qFtljctkTuw9rd4Qe89lK59jcGXC3E991.VLjW5T2', 1, NULL, 'images/avatars/1.png', NULL, '2019-06-14 13:24:25', '2019-06-14 13:24:25'),
	(2, 'luis', 'luis', 'luis@gmail.com', NULL, '$2y$10$mPmFiqIek3s2EBpq.1iiy.vYZBp7QbtITs7HkQR.KVTywviZ5ZwDK', 2, NULL, 'images/avatars/1.png', NULL, '2019-06-10 13:46:26', '2019-06-10 13:46:26'),
	(3, 'david', 'david', 'david1213117@gmail.com', NULL, '$2y$10$qh0PuMW4K189cxGFI3xP5.XITSjTNMq8CLxi88gfxrDJNPG/z3hxq', 2, NULL, 'images/avatars/1.png', NULL, '2019-06-10 13:46:38', '2019-06-10 13:46:38'),
	(4, 'tony', 'tony', 'tony@creativenetfx.com', NULL, '$2y$10$C0c/7b.K1UsY91SUgZHDyumhLFGGDfRFLwbOYH.Z5wC05nR8siTYm', 2, NULL, 'images/avatars/1.png', NULL, '2019-06-11 13:46:54', '2019-06-11 13:46:54'),
	(5, 'wang', 'wang', 'welcome.here.you@gmail.com', NULL, '$2y$10$s6NH6Erza1My8Jnj1pW7U.GdbDPnxfOhQEDFPdcxVEsXw31g4nZDm', 2, NULL, 'images/avatars/1.png', NULL, '2019-06-12 13:47:16', '2019-06-12 13:47:16'),
	(6, 'jojy', 'jojy', 'jojy@gmail.com', NULL, '$2y$10$aVO97n2M42llCggFPdEK8OEU/L/qQrqX2yx8JgouD1eH2UaMGhmKy', 2, NULL, 'images/avatars/1.png', NULL, '2019-06-12 13:47:40', '2019-06-12 13:47:40'),
	(7, 'luis_user', 'lili', 'lili@gmail.com', NULL, '$2y$10$vc5df9mKU/b7NLw5UxOlMeMELuVHzjnbye/00MHnM7xOXRA/P8yMe', 3, 2, 'images/avatars/1.png', NULL, '2019-06-13 13:48:15', '2019-06-13 13:48:15'),
	(8, 'david_user', 'didi', 'didi@gmail.com', NULL, '$2y$10$R9ssk2RTIdy1pqIyvGF.pu57jc05fPl8HGn/nIFz0p36rlsTpMTxS', 3, 3, 'images/avatars/1.png', NULL, '2019-06-12 13:48:39', '2019-06-12 13:48:39'),
	(9, 'tony_user', 'titi', 'titi@gmail.com', NULL, '$2y$10$/zuRZc6dYJ.K/KbHhjYqMe7CMT.YvkIeNOdDoge.P.ZRk9Ivmc0sa', 3, 4, 'images/avatars/1.png', NULL, '2019-06-09 13:49:01', '2019-06-09 13:49:01'),
	(10, 'wang_user', 'wiwi', 'wiwi@gmail.com', NULL, '$2y$10$z21ueJiecjyu29ozec6CiO5uhOggKUBNfeskbhr/5p58zOFI9ElUq', 3, 5, 'images/avatars/1.png', NULL, '2019-06-14 13:49:23', '2019-06-14 13:49:23'),
	(11, 'jojy_user', 'jiji', 'jiji@gmail.com', NULL, '$2y$10$uE9Oh2kosnAZaqhfliR6Bekx4.SwznHlwsh0YXhNQWFR8gd9siAxa', 3, 6, 'images/avatars/1.png', NULL, '2019-06-14 13:49:49', '2019-06-14 13:49:49'),
	(12, 'keke', 'keke', 'keke@gmail.com', NULL, '$2y$10$OULEb7iEd1vaPnA.fyzqsOWV/PLEDcloPWgtHQktV0SypgUeIJRwG', 2, NULL, 'images/avatars/1.png', NULL, '2019-06-15 08:23:32', '2019-06-15 08:23:32'),
	(13, 'koko', 'koko', 'koko@gmail.com', NULL, '$2y$10$OkPEWx1dLboL0g0dtCjGz.CEQbCYII6u/O.NTQAvRiQTRHrQWBsJu', 2, NULL, 'images/avatars/1.png', NULL, '2019-06-15 20:01:17', '2019-06-15 20:01:17'),
	(14, 'keki', 'keke', 'keke@gmail.com', NULL, '$2y$10$9OwVDahn8XOb6MV7TOgNsOw5uPFMSRYGZvUgIm6j/zFK0ztAL3WEC', 2, NULL, 'images/avatars/1.png', NULL, '2019-06-16 23:05:11', '2019-06-16 23:05:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
