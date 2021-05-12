-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table salary.bank_info
CREATE TABLE IF NOT EXISTS `bank_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_balance` double NOT NULL,
  `account_type` tinyint(4) NOT NULL COMMENT '0 = savings,1=current',
  `user_type` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table salary.bank_info: ~9 rows (approximately)
/*!40000 ALTER TABLE `bank_info` DISABLE KEYS */;
INSERT INTO `bank_info` (`id`, `bank_name`, `branch_name`, `account_name`, `account_number`, `current_balance`, `account_type`, `user_type`, `created_at`, `updated_at`) VALUES
	(1, 'sonali', 'motijheel', 'salary', '753159456', 1000, 0, 0, '2021-05-12 12:32:55', '2021-05-12 12:32:55'),
	(2, 'sonali bank', 'motijheel', 'salary', '569748152', 1000, 0, 0, '2021-05-12 12:35:16', '2021-05-12 12:35:16'),
	(3, 'sonali', 'motijheel', 'salary', '949561648', 1000, 0, 0, '2021-05-12 12:36:17', '2021-05-12 12:36:17'),
	(4, 'sonali', 'motijheel', 'Salary', '631651619', 1000, 0, 0, '2021-05-12 12:36:50', '2021-05-12 12:36:50'),
	(5, 'rupali', 'khilgao', 'salary', '651651561', 1200, 0, 0, '2021-05-12 12:37:37', '2021-05-12 12:37:37'),
	(6, 'janata', 'mughdha', 'Salary', '676878681', 1200, 0, 0, '2021-05-12 12:38:10', '2021-05-12 12:38:10'),
	(7, 'Rupali', 'Mohakhali', 'Salary', '798769481', 1200, 0, 0, '2021-05-12 12:38:51', '2021-05-12 12:38:51'),
	(8, 'Sonali', 'Mirpu', 'Salary', '654857258', 800, 0, 0, '2021-05-12 12:39:42', '2021-05-12 12:39:42'),
	(9, 'BDBL', 'Banani', 'Salary', '968165460', 1300, 0, 0, '2021-05-12 12:40:43', '2021-05-12 12:40:43'),
	(10, 'Krishi', 'Dhanmondi', 'Salary', '132987980', 1450, 0, 0, '2021-05-12 12:41:23', '2021-05-12 12:41:23'),
	(11, 'Eastern Bank', 'Mirpur', 'Main', '789178699', 120000, 0, 1, '2021-05-12 19:20:06', '2021-05-12 19:20:06');
/*!40000 ALTER TABLE `bank_info` ENABLE KEYS */;

-- Dumping structure for table salary.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_info_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table salary.employees: ~10 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `name`, `grade`, `address`, `mobile`, `bank_info_id`, `created_at`, `updated_at`, `employee_id`) VALUES
	(1, 'Rabbi Islam', 1, 'Motijheel', '01597846452', 1, '2021-05-12 12:42:29', '2021-05-12 12:42:29', 5332),
	(2, 'Rozim Islam', 3, 'motijheel', '0146947898', 3, '2021-05-12 17:39:06', '2021-05-12 17:39:48', 1815),
	(3, 'Hasan Mahamud', 2, 'Motijheel', '0146578997', 2, '2021-05-12 17:41:16', '2021-05-12 17:41:16', 6731),
	(4, 'Saiful Islam', 3, 'Motijheel', '01678945975', 4, '2021-05-12 17:42:03', '2021-05-12 17:42:03', 4476),
	(5, 'Hanif Mahamud', 4, 'khilgao', '0156487984', 5, '2021-05-12 17:45:11', '2021-05-12 17:45:11', 7222),
	(6, 'Arif', 4, 'khilgao', '01645789541', 7, '2021-05-12 17:45:56', '2021-05-12 17:45:56', 6465),
	(7, 'titu', 5, 'mirpur', '0189896514', 6, '2021-05-12 17:46:45', '2021-05-12 17:46:45', 7562),
	(8, 'alim', 5, 'mirpur', '0194564115', 8, '2021-05-12 17:47:37', '2021-05-12 17:47:37', 7227),
	(9, 'Masud', 6, 'mohakhali', '01687985431', 9, '2021-05-12 17:48:12', '2021-05-12 17:48:12', 2434),
	(10, 'saiful', 6, 'mughda', '01365498441', 10, '2021-05-12 17:48:38', '2021-05-12 17:48:38', 5246);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table salary.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table salary.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table salary.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table salary.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_05_09_184947_create_employees_table', 1),
	(5, '2021_05_09_185808_create_bank_info_table', 1),
	(6, '2021_05_12_063242_salary', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table salary.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table salary.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table salary.salary
CREATE TABLE IF NOT EXISTS `salary` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) NOT NULL,
  `company_account` int(11) NOT NULL,
  `salary` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table salary.salary: ~0 rows (approximately)
/*!40000 ALTER TABLE `salary` DISABLE KEYS */;
INSERT INTO `salary` (`id`, `employee_id`, `company_account`, `salary`, `created_at`, `updated_at`) VALUES
	(1, 1, 11, 31750, '2021-05-12 20:18:11', '2021-05-12 20:18:11'),
	(2, 2, 11, 21750, '2021-05-12 20:18:11', '2021-05-12 20:18:11'),
	(3, 3, 11, 26750, '2021-05-12 20:18:11', '2021-05-12 20:18:11'),
	(4, 4, 11, 21750, '2021-05-12 20:18:15', '2021-05-12 20:18:15'),
	(5, 5, 11, 16750, '2021-05-12 20:18:15', '2021-05-12 20:18:15'),
	(6, 6, 11, 16750, '2021-05-12 20:18:15', '2021-05-12 20:18:15'),
	(7, 7, 11, 11750, '2021-05-12 20:18:15', '2021-05-12 20:18:15'),
	(8, 8, 11, 11750, '2021-05-12 20:18:15', '2021-05-12 20:18:15'),
	(9, 9, 11, 6750, '2021-05-12 20:18:15', '2021-05-12 20:18:15'),
	(10, 10, 11, 6750, '2021-05-12 20:18:15', '2021-05-12 20:18:15');
/*!40000 ALTER TABLE `salary` ENABLE KEYS */;

-- Dumping structure for table salary.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table salary.users: ~10 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Celine Windler', 'spinka.sophie@example.net', '2021-05-10 05:03:36', '$2y$10$Llf0MqnAXqmpgtpVxhiKSuZSrjQvAINgsTM72mUe/LKo3X7riODhu', 'oIDgTHcvCv', '2021-05-10 05:03:37', '2021-05-10 05:03:37'),
	(2, 'Eino Harvey DVM', 'xauer@example.org', '2021-05-10 05:03:36', '$2y$10$1n60xd29QBIleXTpJ/vD7.VUC3BBQs0WutPWpNPSWDuUOleRNRHWO', '5w7yUOlK3y', '2021-05-10 05:03:37', '2021-05-10 05:03:37'),
	(3, 'Clara Heathcote', 'gayle65@example.net', '2021-05-10 05:03:36', '$2y$10$jfZA6tllVzhJv0Q6yx8lmemK5TdM/5wsQSzsPrPTp6aVpCIGfCj3e', '1D2HMYmlB5', '2021-05-10 05:03:37', '2021-05-10 05:03:37'),
	(4, 'Larissa Flatley', 'sonia79@example.org', '2021-05-10 05:03:36', '$2y$10$6uT4aN/L/9zzETTU4COV/.BteqtYAPezSUYYyUEOdzmyKQ9ktr8Ja', 'ZqNwbshuuZ', '2021-05-10 05:03:37', '2021-05-10 05:03:37'),
	(5, 'Isidro Bauch', 'chet87@example.org', '2021-05-10 05:03:36', '$2y$10$GETu8gzVipbvQsR7jPadDerdxvaxuxBIvWYFegyU37EVUgOBlO.o2', '0d65DUWKXF', '2021-05-10 05:03:37', '2021-05-10 05:03:37'),
	(6, 'Austin Shanahan', 'krajcik.noelia@example.com', '2021-05-10 05:03:36', '$2y$10$kPjCWSt4LN/tqiOg19ppN.Vi/I2B0M5EdUUH61mwiHGqH7RPlD8Z6', 'UBzxpBli5H', '2021-05-10 05:03:37', '2021-05-10 05:03:37'),
	(7, 'Ettie Green', 'ymarks@example.net', '2021-05-10 05:03:36', '$2y$10$MbKZmnwkH.E23uCIVHOJgu7z0ajjLPr4JzWFtVnUxFUhXpxBibUay', 'yP0MY8pEsx', '2021-05-10 05:03:37', '2021-05-10 05:03:37'),
	(8, 'Violette Waelchi', 'anita.conroy@example.com', '2021-05-10 05:03:36', '$2y$10$bpti1O2vmvDcAzCyMH80GejdedahAAn9NzsI0oZCqDcj9tGgvIe3q', 'oaK4VBfLci', '2021-05-10 05:03:37', '2021-05-10 05:03:37'),
	(9, 'Robb Nitzsche', 'eschroeder@example.org', '2021-05-10 05:03:37', '$2y$10$iAJjPEqTy/oG0F1YRhuX0uU38rS3.JDngtjEqvrHaq2/EtrhQ6OXq', '35uB22F9uE', '2021-05-10 05:03:37', '2021-05-10 05:03:37'),
	(10, 'Lucy Mann', 'prohaska.amanda@example.org', '2021-05-10 05:03:37', '$2y$10$jFsYTYVLOzcqNAqVCqytDekaFvrJYvQMduV96LSHvmRzVaDWGz4Dy', 'fkKtksd2Xb', '2021-05-10 05:03:37', '2021-05-10 05:03:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
