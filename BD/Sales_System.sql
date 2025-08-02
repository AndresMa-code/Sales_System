-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sales_system
CREATE DATABASE IF NOT EXISTS `sales_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sales_system`;

-- Volcando estructura para tabla sales_system.advance_salaries
CREATE TABLE IF NOT EXISTS `advance_salaries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `date` date NOT NULL,
  `advance_salary` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.advance_salaries: ~15 rows (aproximadamente)
INSERT INTO `advance_salaries` (`id`, `employee_id`, `date`, `advance_salary`, `created_at`, `updated_at`) VALUES
	(1, 2, '2025-02-23', 2000000, '2025-02-23 22:19:15', '2025-02-23 22:19:15'),
	(2, 3, '2025-02-23', 2000000, '2025-02-23 22:19:25', '2025-02-23 22:19:25'),
	(3, 10, '2025-02-23', 2500000, '2025-02-23 22:19:42', '2025-02-23 22:19:42'),
	(4, 11, '2025-02-17', 2300000, '2025-02-23 22:20:00', '2025-02-23 22:20:00'),
	(5, 1, '2025-02-23', 2000000, '2025-02-23 22:20:30', '2025-02-23 22:20:30'),
	(6, 12, '2025-02-23', 2000000, '2025-02-23 22:20:37', '2025-02-23 22:20:37'),
	(7, 6, '2025-02-23', 2000000, '2025-02-23 22:20:45', '2025-02-23 22:20:45'),
	(8, 8, '2025-02-24', 2000000, '2025-02-23 22:20:52', '2025-02-23 22:20:52'),
	(9, 4, '2025-02-24', 2000000, '2025-02-23 22:20:59', '2025-02-23 22:20:59'),
	(10, 7, '2025-02-25', 2000000, '2025-02-23 22:21:06', '2025-02-23 22:21:06'),
	(11, 9, '2025-02-23', 2000000, '2025-02-23 22:21:13', '2025-02-23 22:21:13'),
	(12, 2, '2025-05-02', 1100000, '2025-05-02 07:35:14', '2025-05-02 07:48:57'),
	(13, 3, '2025-05-03', 600000, '2025-05-02 07:36:19', '2025-05-02 07:50:06'),
	(14, 9, '2025-05-04', 210000, '2025-05-02 07:50:47', '2025-05-02 07:59:41'),
	(15, 6, '2025-05-07', 1350000, '2025-05-02 08:02:06', '2025-05-02 08:02:06');

-- Volcando estructura para tabla sales_system.attendences
CREATE TABLE IF NOT EXISTS `attendences` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.attendences: ~48 rows (aproximadamente)
INSERT INTO `attendences` (`id`, `employee_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
	(13, 2, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(14, 3, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(15, 10, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(16, 11, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(17, 1, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(18, 12, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(19, 6, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(20, 8, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(21, 4, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(22, 7, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(23, 5, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(24, 9, '2025-05-01', 'present', '2025-05-02 10:15:05', '2025-05-02 10:15:05'),
	(25, 2, '2025-05-02', 'present', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(26, 3, '2025-05-02', 'leave', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(27, 10, '2025-05-02', 'leave', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(28, 11, '2025-05-02', 'absent', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(29, 1, '2025-05-02', 'present', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(30, 12, '2025-05-02', 'present', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(31, 6, '2025-05-02', 'present', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(32, 8, '2025-05-02', 'present', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(33, 4, '2025-05-02', 'leave', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(34, 7, '2025-05-02', 'present', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(35, 5, '2025-05-02', 'present', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(36, 9, '2025-05-02', 'present', '2025-05-02 10:16:13', '2025-05-02 10:16:13'),
	(37, 2, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(38, 3, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(39, 10, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(40, 11, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(41, 1, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(42, 12, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(43, 6, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(44, 8, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(45, 4, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(46, 7, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(47, 5, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(48, 9, '2025-02-24', 'present', '2025-05-02 10:22:03', '2025-05-02 10:22:03'),
	(49, 2, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13'),
	(50, 3, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13'),
	(51, 10, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13'),
	(52, 11, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13'),
	(53, 1, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13'),
	(54, 12, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13'),
	(55, 6, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13'),
	(56, 8, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13'),
	(57, 4, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13'),
	(58, 7, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13'),
	(59, 5, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13'),
	(60, 9, '2025-05-03', 'present', '2025-05-02 10:23:13', '2025-05-02 10:23:13');

-- Volcando estructura para tabla sales_system.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.categories: ~9 rows (aproximadamente)
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Operating system software', 'operating-system-software', '2025-02-23 20:00:16', '2025-02-23 20:55:34'),
	(2, 'Multi-function printers', 'multi-function-printers', '2025-02-23 20:00:16', '2025-02-23 20:55:47'),
	(3, 'Office software', 'office-software', '2025-02-23 20:00:16', '2025-02-23 20:56:01'),
	(4, 'Accessories', 'accessories', '2025-02-23 20:00:16', '2025-02-23 20:56:47'),
	(5, 'Security programs', 'security-programs', '2025-02-23 20:00:16', '2025-02-23 20:57:00'),
	(6, 'Design programs', 'design-programs', '2025-02-23 20:57:19', '2025-02-23 20:57:19'),
	(7, 'Physical Servers', 'physical-servers', '2025-02-23 20:57:32', '2025-02-23 20:57:32'),
	(8, 'Desktop computer', 'desktop-computer', '2025-02-23 21:06:53', '2025-02-23 21:06:53'),
	(9, 'Laptop', 'laptop', '2025-02-23 21:07:03', '2025-02-23 21:07:03');

-- Volcando estructura para tabla sales_system.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shopname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`),
  UNIQUE KEY `customers_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.customers: ~26 rows (aproximadamente)
INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `shopname`, `photo`, `account_holder`, `account_number`, `bank_name`, `bank_branch`, `city`, `created_at`, `updated_at`) VALUES
	(1, 'Giovanni Walter', 'elvera89@example.net', '+1.309.577.6797', '74032 Kovacek Mission Apt. 155\r\nNew Laurineview, NY 56465', 'Haag, Kuhn and Fay', '1744826802_04.jpg', 'Miss Cara Kuphal Jr.', '72608895', 'BCA', 'West Rosaliafort', 'Lake Bradlyton', '2025-02-23 20:00:14', '2025-04-16 23:06:42'),
	(2, 'Mr. Hailey Douglas I', 'gustave28@example.com', '3048544554', '838 Kuvalis Lodge\r\nTylerland, CO 92115-9510', 'Donnelly-Ritchie', '1744826960_07.jpg', 'Prof. Eladio Cassin IV', '90721013', NULL, 'Andyport', 'Nickolasmouth', '2025-02-23 20:00:14', '2025-04-16 23:09:20'),
	(3, 'Evan Kohler', 'hhill@example.org', '+17316000006', '8690 Elyssa Estates Apt. 704\r\nNorth Matilde, NJ 00125', 'Cartwright, Blick and Terry', '1744827007_10.jpg', 'Conor Jacobi', '12614103', 'BSI', 'Romabury', 'Lake Carissafort', '2025-02-23 20:00:14', '2025-04-16 23:10:07'),
	(4, 'Christa Ernser', 'umarvin@example.org', '1-714-263-7140', '33137 Estel Ramp Apt. 751\nBonitabury, NY 15951', 'Hyatt Inc', NULL, 'Nils Abernathy', '17059629', 'MANDIRI', 'Vanessaburgh', 'New Patrick', '2025-02-23 20:00:14', '2025-02-23 20:00:14'),
	(5, 'Elta Abshire', 'bryon.treutel@example.org', '531-293-2766', '126 Blick Park Suite 283\nMiguelmouth, AZ 30077-5695', 'Connelly-Hudson', NULL, 'Prof. Casimir Deckow', '82400253', 'BJB', 'Millsbury', 'Abbottview', '2025-02-23 20:00:14', '2025-02-23 20:00:14'),
	(6, 'Louisa Gleichner', 'tkoss@example.net', '551.868.3116', '7230 Gerhold Plains\nWest Nannieburgh, OR 26125', 'Mosciski, Gutmann and Lindgren', NULL, 'Ms. Sasha Lesch DVM', '82602446', 'BSI', 'East Donniemouth', 'Zakaryville', '2025-02-23 20:00:14', '2025-02-23 20:00:14'),
	(7, 'Theresia Bradtke', 'moises.reilly@example.com', '+1.951.617.0778', '26417 Eudora Lake\nNorth Kaiaberg, KS 82002', 'Blanda, Wiza and Pagac', NULL, 'Ms. Aurore Keeling DDS', '48571595', 'BJB', 'Port Grace', 'West Adelbert', '2025-02-23 20:00:14', '2025-02-23 20:00:14'),
	(8, 'Nicolas Waters', 'domenico11@example.org', '(831) 672-1910', '184 Elmo Ridges Suite 397\nLake Rhiannamouth, KS 85947-1951', 'Jast, Marquardt and Kris', NULL, 'Hester Langworth', '53089745', 'BSI', 'Nicolasmouth', 'North Sonny', '2025-02-23 20:00:14', '2025-02-23 20:00:14'),
	(9, 'Polly Schoen', 'kaylah.feeney@example.net', '1-985-266-5359', '301 Jed Cove\nLarkinstad, SD 78062', 'Schuster Inc', NULL, 'Geovanny Spencer III', '42410368', 'BNI', 'Lake Theoside', 'Lemkeburgh', '2025-02-23 20:00:14', '2025-02-23 20:00:14'),
	(10, 'Dr. Alek Langworth II', 'kstiedemann@example.org', '951.619.7657', '97741 Britney Drive\nAngusfort, AZ 03906', 'Strosin, O\'Hara and Block', NULL, 'Cletus Lemke', '88884967', 'BRI', 'East Earline', 'West Gaetano', '2025-02-23 20:00:14', '2025-02-23 20:00:14'),
	(11, 'Javier Bahringer', 'kulas.bryce@example.org', '+1-614-719-5451', '30419 Eichmann Lane\nHaneborough, FL 78467', 'Barrows-Luettgen', NULL, 'Brent Mayert', '12489409', 'BSI', 'Christophechester', 'Port Alberta', '2025-02-23 20:00:14', '2025-02-23 20:00:14'),
	(12, 'Liana Runolfsdottir', 'steuber.marge@example.org', '+1-630-954-7508', '66230 Lubowitz Creek\nLake Daltonside, NH 83243-9937', 'O\'Reilly, Spencer and Sawayn', NULL, 'Dr. Zoie Jacobi', '77015248', 'BSI', 'Lake Milliebury', 'Bochester', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(13, 'Prof. Chelsie Baumbach', 'zsawayn@example.net', '812.758.0925', '3399 Jaime Tunnel\nNew Hershel, NJ 33110-1515', 'Hammes-Feeney', NULL, 'Cindy Hoeger', '14912059', 'BSI', 'New Henri', 'Raynorborough', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(14, 'Prof. Gene Mayert III', 'isabella.schuppe@example.net', '629.504.9183', '5816 Garret Well\nLake Cletuschester, RI 35546', 'Hand LLC', NULL, 'Elmo O\'Kon IV', '33183660', 'BRI', 'East Wilson', 'West Wilmer', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(15, 'Mr. Elwyn Gutkowski', 'ufunk@example.org', '404.292.2665', '2255 Aliya Stravenue Suite 611\nLake Tamia, NJ 80619', 'Johns Inc', NULL, 'Mrs. Alene Bashirian', '46913852', 'MANDIRI', 'East Katherynmouth', 'Hyattmouth', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(16, 'Chester Williamson', 'barrows.laila@example.net', '+1-628-889-5782', '8329 Hartmann Street\nEffertzbury, ID 03581', 'Durgan-Durgan', NULL, 'Esmeralda Trantow', '52787226', 'BCA', 'West Alishamouth', 'South Abbey', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(17, 'Russel Hahn', 'randall00@example.org', '747.353.3434', '62429 Hilpert Mills\nRennerfort, ID 25779-1211', 'Brakus LLC', NULL, 'Tatum Heaney', '71028433', 'BJB', 'Charlenebury', 'South Lucas', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(18, 'Prof. Raul Schultz', 'keeley09@example.org', '+1.228.236.0671', '30763 Fae Neck Apt. 351\nDoriantown, CA 31121', 'Deckow PLC', NULL, 'Ressie Jenkins DDS', '97200190', 'BJB', 'Tatyanaton', 'Brakusview', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(19, 'Arlene Kessler', 'lynch.linda@example.net', '+1-804-451-7875', '41135 Durgan Spur\nBoganbury, WA 10027', 'Morar, Yost and Gleichner', NULL, 'Angela Purdy', '12355901', 'BRI', 'Alanafort', 'Hudsonton', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(20, 'Prof. Marlee West', 'abshire.justen@example.org', '(731) 395-9475', '775 Ahmed Causeway\nGradyville, MD 98522-0798', 'O\'Keefe Group', NULL, 'Ms. Karli Berge II', '26902262', 'BCA', 'Vonshire', 'North Fanny', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(21, 'Prof. Timmy Grant', 'nyah14@example.org', '341-457-2565', '42237 Gorczany Ridges Suite 498\nSouth Ova, LA 05280', 'Shanahan-Cassin', NULL, 'Tyrell Rutherford', '52700166', 'MANDIRI', 'Zeldaton', 'Garrisonfort', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(22, 'Prof. Nona Strosin', 'veda.ryan@example.net', '564.494.6808', '944 Lloyd Crossroad Suite 307\nLake Alexiemouth, PA 22095', 'Gleason-Steuber', NULL, 'Ezequiel Sanford DDS', '89114143', 'BRI', 'Bashirianview', 'Meghanborough', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(23, 'Mr. Alan D\'Amore II', 'vrempel@example.net', '+1-346-750-3575', '598 Vinnie Summit Suite 787\nHellerport, NY 51122-3418', 'O\'Hara-Price', NULL, 'Prof. Modesto Waters I', '55049800', 'BRI', 'Predovicborough', 'Drewmouth', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(24, 'Amie Pacocha', 'fritchie@example.org', '909.809.6576', '864 Jolie Coves\nSouth Evie, CO 95865', 'Osinski, Nienow and McDermott', NULL, 'Prof. Kip Treutel I', '16794721', 'BNI', 'West Garnetburgh', 'South Antonetteville', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(25, 'Cleo Corkery', 'lonnie.parker@example.com', '341-720-2389', '2596 Ole Prairie\nNew Estellafurt, NM 28500', 'Schuppe-Koss', NULL, 'Mr. Luigi Johnston', '55928491', 'MANDIRI', 'Hoegerside', 'Alannaton', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(26, 'pepito', 'pepito@mail.com', '30255254', 'Calle 2', 'Brond', NULL, 'Miss Cara Kuphal Jr.', '45552255', 'Bancolombia', 'Unicentro', 'Bogota', '2025-05-05 04:33:12', '2025-05-05 04:33:12');

-- Volcando estructura para tabla sales_system.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `vacation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`),
  UNIQUE KEY `employees_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.employees: ~12 rows (aproximadamente)
INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `experience`, `photo`, `salary`, `vacation`, `city`, `created_at`, `updated_at`) VALUES
	(1, 'Juan', 'juan@email.com', '605-5454', 'Calle 100 # 11B-27', '2 Year', '1744825778_07.jpg', 2000000, NULL, 'Bogota', '2025-02-23 20:00:14', '2025-04-16 22:49:38'),
	(2, 'Ana', 'ana@email.com', '6876000', 'Av. 6 A Norte N° 35 - 00 Santa Monica', '4 Year', '1744826021_1.jpg', 2500000, NULL, 'Cali', '2025-02-23 20:00:14', '2025-04-16 22:53:41'),
	(3, 'Carla', 'carla@email.com', '(601) 4072070', 'Cra. 18, # 7A-17, Bogotá, Bogotá, CO', NULL, '1744826548_02.jpg', 1800000, NULL, 'Bogota', '2025-02-23 20:00:14', '2025-04-16 23:02:28'),
	(4, 'Mario', 'mario@email.com', '6044444144', 'Carrera 79 N° 41 sur – 36. Comuna: Corregimiento San Antonio de Prado', '1 Year', NULL, 200000, NULL, 'Medellin', '2025-02-23 20:00:14', '2025-02-23 21:44:58'),
	(5, 'Roberto', 'roberto@email.com', '311720 1717', 'Avenida 2 Norte #10 - 70. Santiago de Cali - Valle del Cauca - Colombia', '1 Year', NULL, 1800000, NULL, 'Cali', '2025-02-23 20:00:14', '2025-02-23 21:46:48'),
	(6, 'Lucia', 'lucia@email.com', '998877665', 'Calle 11 No. 8-17 - Piso 2. Bogotá', '2 Year', NULL, 2000000, NULL, 'Bogota', '2025-02-23 22:04:38', '2025-02-23 22:04:38'),
	(7, 'Pedro', 'pedro@email.com', '3187201717', 'Dirección: Carrera 9 # 2 – 91 · Comuna 3', '2 Year', NULL, 2300000, NULL, 'Cali', '2025-02-23 22:08:14', '2025-02-23 22:08:14'),
	(8, 'Maria', 'maria@email.com', '667788990', 'Barrio belen - Cra. 73, 31a-83, Medellín, Antioquia, CO', '2 Year', NULL, 2600000, NULL, 'Medellin', '2025-02-23 22:09:24', '2025-02-23 22:09:24'),
	(9, 'Sonia', 'sonia@email.com', '4322760', 'Edificio Bicentenario Calle 11 No. 8-17 - Piso 2. Bogotá,', NULL, NULL, 30000000, NULL, 'Bogota', '2025-02-23 22:10:57', '2025-02-23 22:10:57'),
	(10, 'Carlos', 'carlos@mail.com', '3147894568', 'Bogotá, Nivel Central, carrera 8 Nº 6C - 38 Edificio San Agustín', '1 Year', NULL, 1600000, NULL, 'Bogota', '2025-02-23 22:11:52', '2025-02-23 22:11:52'),
	(11, 'Estafania', 'estefania@mail.com', '3177894561', 'Centro de Atención LocaI Integrado C.A.L.I # 3 · Barrio: San Antonio', '2 Year', NULL, 25000000, NULL, 'Cali', '2025-02-23 22:12:55', '2025-02-23 22:12:55'),
	(12, 'Julian', 'julian@mail.com', '3147894561', 'Dirección: Calle 44 # 52 - 165, Centro Administrativo La Alpujarra, Medellín', '1 Year', NULL, 1600000, NULL, 'Medellin', '2025-02-23 22:18:12', '2025-02-23 22:18:12');

-- Volcando estructura para tabla sales_system.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sales_system.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.migrations: ~16 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_03_15_044621_add_username_and_photo_to_users', 1),
	(6, '2023_03_24_080143_create_employees_table', 1),
	(7, '2023_03_29_025458_create_customers_table', 1),
	(8, '2023_03_30_020042_create_suppliers_table', 1),
	(9, '2023_03_30_083652_create_advance_salaries_table', 1),
	(10, '2023_04_01_142106_create_pay_salaries_table', 1),
	(11, '2023_04_02_141037_create_attendences_table', 1),
	(12, '2023_04_04_041700_create_categories_table', 1),
	(13, '2023_04_04_052256_create_products_table', 1),
	(14, '2023_04_10_043156_create_orders_table', 1),
	(15, '2023_04_10_044212_create_order_details_table', 1),
	(16, '2023_04_13_222344_create_permission_tables', 1);

-- Volcando estructura para tabla sales_system.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sales_system.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.model_has_roles: ~4 rows (aproximadamente)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(3, 'App\\Models\\User', 2),
	(6, 'App\\Models\\User', 4),
	(3, 'App\\Models\\User', 5);

-- Volcando estructura para tabla sales_system.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_products` int NOT NULL,
  `sub_total` int DEFAULT NULL,
  `vat` int DEFAULT NULL,
  `invoice_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay` int DEFAULT NULL,
  `due` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.orders: ~8 rows (aproximadamente)
INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `order_status`, `total_products`, `sub_total`, `vat`, `invoice_no`, `total`, `payment_status`, `pay`, `due`, `created_at`, `updated_at`) VALUES
	(1, '24', '2025-02-23', 'complete', 1, 300000, 15000, 'INV-000001', 315000, 'HandCash', 315000, 0, '2025-02-24 00:08:59', '2025-02-24 00:10:28'),
	(2, '19', '2025-02-23', 'pending', 1, 750000, 37500, 'INV-000002', 787500, 'Cheque', 70000, 717500, '2025-02-24 00:10:01', NULL),
	(3, '16', '2025-02-23', 'pending', 1, 862900, 43145, 'INV-000003', 906045, 'Due', 70000, 836045, '2025-02-24 00:16:23', NULL),
	(4, '1', '2025-04-16', 'pending', 1, 750000, 37500, 'INV-000004', 787500, 'HandCash', 787500, 0, '2025-04-17 01:24:02', NULL),
	(5, '23', '2025-05-04', 'complete', 2, 1162900, 58145, 'INV-000005', 1221045, 'Cheque', 1221045, 0, '2025-05-04 21:42:10', '2025-05-04 21:43:03'),
	(6, '12', '2025-05-04', 'complete', 1, 57900, 2895, 'INV-000006', 60795, 'Due', 60795, 0, '2025-05-04 21:42:47', '2025-05-04 21:43:22'),
	(7, '11', '2025-05-04', 'pending', 1, 75900, 3795, 'INV-000007', 79695, 'HandCash', 70695, 9000, '2025-05-04 22:27:24', NULL),
	(8, '5', '2025-05-04', 'complete', 1, 400000, 20000, 'INV-000008', 420000, 'Due', 420000, 0, '2025-05-04 22:41:12', '2025-05-04 22:42:14');

-- Volcando estructura para tabla sales_system.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `unitcost` int DEFAULT NULL,
  `total` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.order_details: ~9 rows (aproximadamente)
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `unitcost`, `total`, `created_at`, `updated_at`) VALUES
	(1, '1', '1', 1, 300000, 315000, '2025-02-24 00:08:59', NULL),
	(2, '2', '2', 1, 750000, 787500, '2025-02-24 00:10:01', NULL),
	(3, '3', '3', 1, 862900, 906045, '2025-02-24 00:16:23', NULL),
	(4, '4', '2', 1, 750000, 787500, '2025-04-17 01:24:02', '2025-04-17 01:24:02'),
	(5, '5', '1', 1, 300000, 315000, '2025-05-04 21:42:10', '2025-05-04 21:42:10'),
	(6, '5', '3', 1, 862900, 906045, '2025-05-04 21:42:10', '2025-05-04 21:42:10'),
	(7, '6', '6', 1, 57900, 60795, '2025-05-04 21:42:47', '2025-05-04 21:42:47'),
	(8, '7', '7', 1, 75900, 79695, '2025-05-04 22:27:24', '2025-05-04 22:27:24'),
	(9, '8', '10', 1, 400000, 420000, '2025-05-04 22:41:12', '2025-05-04 22:41:12');

-- Volcando estructura para tabla sales_system.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sales_system.pay_salaries
CREATE TABLE IF NOT EXISTS `pay_salaries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `date` date DEFAULT NULL,
  `paid_amount` int NOT NULL,
  `advance_salary` int DEFAULT NULL,
  `due_salary` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.pay_salaries: ~0 rows (aproximadamente)
INSERT INTO `pay_salaries` (`id`, `employee_id`, `date`, `paid_amount`, `advance_salary`, `due_salary`, `created_at`, `updated_at`) VALUES
	(1, 6, '2025-05-01', 2000000, 1350000, 650000, '2025-05-02 08:49:25', '2025-05-02 08:49:25');

-- Volcando estructura para tabla sales_system.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.permissions: ~15 rows (aproximadamente)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
	(1, 'pos.menu', 'web', 'pos', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(2, 'employee.menu', 'web', 'employee', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(3, 'customer.menu', 'web', 'customer', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(4, 'supplier.menu', 'web', 'supplier', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(5, 'salary.menu', 'web', 'salary', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(6, 'attendence.menu', 'web', 'attendence', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(7, 'category.menu', 'web', 'category', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(8, 'product.menu', 'web', 'product', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(9, 'orders.menu', 'web', 'orders', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(10, 'stock.menu', 'web', 'stock', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(11, 'roles.menu', 'web', 'roles', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(12, 'user.menu', 'web', 'user', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(13, 'database.menu', 'web', 'database', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(14, 'Prueba', 'web', 'pos', '2025-05-04 05:08:27', '2025-05-04 05:08:27'),
	(15, 'Prueba2', 'web', 'user', '2025-05-04 05:26:18', '2025-05-04 05:26:18');

-- Volcando estructura para tabla sales_system.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sales_system.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_garage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_store` int DEFAULT NULL,
  `buying_date` date DEFAULT NULL,
  `expire_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_price` int DEFAULT NULL,
  `selling_price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.products: ~28 rows (aproximadamente)
INSERT INTO `products` (`id`, `product_name`, `category_id`, `supplier_id`, `product_code`, `product_garage`, `product_image`, `product_store`, `buying_date`, `expire_date`, `buying_price`, `selling_price`, `created_at`, `updated_at`) VALUES
	(1, 'Microsoft Office 2021', 3, 9, 'PC01', 'A', '1829584724310692.png', 534, '2025-02-23', '2027-02-23', 250000, 300000, '2025-02-23 20:00:15', '2025-05-04 21:43:03'),
	(2, 'Microsoft Windows 11 Pro', 1, 6, 'PC02', 'D', '1829584903980663.jpeg', 378, '2025-02-23', '2027-02-23', 650000, 750000, '2025-02-23 20:00:15', '2025-04-16 23:28:52'),
	(3, 'HP LaserJet M141w Multifunction Printer', 2, 4, 'PC03', 'B', NULL, 672, '2025-02-23', '2027-02-23', 15, 862900, '2025-02-23 20:00:15', '2025-05-04 21:43:03'),
	(4, 'Laptop Dell Inspiron 15', 9, 1, 'PC04', 'A', NULL, 650, '2025-02-23', '2027-02-23', 2000000, 2200000, '2025-02-23 20:00:15', '2025-02-23 21:08:04'),
	(5, 'HP. All in one HP AIO cb1013la 23.8', 8, 8, 'PC05', 'D', NULL, 541, '2025-02-23', '2027-02-24', 189000, 1929000, '2025-02-23 20:00:15', '2025-02-23 21:08:48'),
	(6, 'Keyboard Genius Kb-7100x Black', 4, 8, 'PC06', 'A', NULL, 78, '2025-02-23', '2027-02-24', 40000, 57900, '2025-02-23 20:00:15', '2025-05-04 21:43:22'),
	(7, 'Genius Ergo 8300s Wireless Vertical Mouse 7 Buttons, Grey', 4, 8, 'PC07', 'C', NULL, 818, '2025-02-23', '2027-02-23', 70900, 75900, '2025-02-23 20:00:15', '2025-02-23 21:11:53'),
	(8, 'Kaspersky Total Security 2025', 5, 8, 'PC08', 'D', NULL, 482, '2025-02-23', '2027-02-24', 350000, 400000, '2025-02-23 20:00:15', '2025-02-23 21:12:32'),
	(9, 'AVG Internet Security', 5, 4, 'PC09', 'D', NULL, 233, '2025-02-23', '2027-02-24', 320000, 350000, '2025-02-23 20:00:15', '2025-02-23 21:13:19'),
	(10, 'Norton 360 Deluxe', 5, 1, 'PC10', 'D', NULL, 68, '2025-02-23', '2027-02-24', 380000, 400000, '2025-02-23 20:00:15', '2025-05-04 22:42:14'),
	(11, 'Adobe Photoshop CC 2024', 6, 9, 'PC11', NULL, NULL, NULL, NULL, '2027-08-24', 620000, 700000, '2025-02-23 21:15:36', '2025-02-23 21:15:36'),
	(12, 'Autodesk AutoCAD 2024', 6, 7, 'PC12', NULL, NULL, NULL, NULL, '2027-02-24', 1100000, 1200000, '2025-02-23 21:17:56', '2025-02-23 21:17:56'),
	(13, 'CorelDRAW Graphics Suite 2024', 6, 6, 'PC13', NULL, NULL, NULL, NULL, '2027-05-25', 550000, 600000, '2025-02-23 21:19:12', '2025-02-23 21:19:12'),
	(14, 'Trend Micro Maximum Security', 5, 7, 'PC14', NULL, NULL, NULL, NULL, '2027-03-23', 430000, 450000, '2025-02-23 21:20:29', '2025-02-23 21:20:29'),
	(15, 'Microsoft Office 365', 3, 10, 'PC15', NULL, NULL, NULL, NULL, '2027-05-26', 480000, 500000, '2025-02-23 21:21:22', '2025-02-23 21:21:22'),
	(16, 'HP LaserJet Pro MFP M428fdw Printer', 2, 1, 'PC16', NULL, NULL, NULL, NULL, '2027-03-25', 1100000, 1200000, '2025-02-23 21:22:17', '2025-02-23 21:22:17'),
	(17, 'Laptop HP Pavilion x360 14', 9, 6, 'PC17', NULL, NULL, NULL, NULL, '2027-04-14', 2400000, 2500000, '2025-02-23 21:23:14', '2025-02-23 21:23:14'),
	(18, 'HP EliteDesk 800 G5 Desktop PC', 8, 3, 'PC18', NULL, NULL, NULL, NULL, '2027-06-10', 2100000, 2200000, '2025-02-23 21:24:11', '2025-02-23 21:24:11'),
	(19, 'Dell UltraSharp U2720Q 27" Monitor', 4, 10, 'PC19', NULL, NULL, NULL, NULL, NULL, 1900000, 2000000, '2025-02-23 21:25:04', '2025-02-23 21:25:04'),
	(20, 'Canon PIXMA TS8340 Printer', 2, 1, 'PC20', NULL, NULL, NULL, NULL, '2027-02-17', 580000, 600000, '2025-02-23 21:25:56', '2025-02-23 21:25:56'),
	(21, 'Laptop Lenovo ThinkPad X1 Carbon 14', 9, 6, 'PC21', NULL, NULL, NULL, NULL, '2027-03-23', 3400000, 3500000, '2025-02-23 21:28:45', '2025-02-23 21:28:45'),
	(22, 'Dell Optiplex 3080 Desktop PC', 8, 1, 'PC22', NULL, NULL, NULL, NULL, NULL, 1700000, 1800000, '2025-02-23 21:29:19', '2025-02-23 21:29:19'),
	(23, 'Epson EcoTank L3150 Printer', 2, 2, 'PC23', NULL, NULL, NULL, NULL, '2027-02-25', 680000, 700000, '2025-02-23 21:30:10', '2025-02-23 21:30:10'),
	(24, 'Laptop Acer Swift 3 14', 9, 7, 'PC24', NULL, NULL, NULL, NULL, '2027-01-27', 1900000, 2000000, '2025-02-23 21:31:06', '2025-02-23 21:31:06'),
	(25, 'Acer Aspire TC-1660 Desktop Computer', 9, 5, 'PC25', NULL, NULL, NULL, NULL, '2025-03-27', 1400000, 1500000, '2025-02-23 21:32:53', '2025-02-23 21:32:53'),
	(26, 'HP ProLiant DL380 Gen10 Server', 7, 6, 'PC26', NULL, NULL, NULL, NULL, '2025-02-23', 10000000, 11000000, '2025-02-23 21:34:27', '2025-02-23 21:34:27'),
	(27, 'Dell PowerEdge R740 Server', 7, 7, 'PC27', NULL, NULL, NULL, NULL, '2025-02-24', 11000000, 12000000, '2025-02-23 21:35:19', '2025-02-23 21:35:19'),
	(28, 'Lenovo ThinkSystem SR650 Server', 7, 6, 'PC28', NULL, NULL, NULL, NULL, '2025-02-23', 1100000, 11800000, '2025-02-23 21:36:09', '2025-02-23 21:36:09');

-- Volcando estructura para tabla sales_system.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.roles: ~7 rows (aproximadamente)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'SuperAdmin', 'web', '2025-02-23 20:00:16', '2025-02-23 20:00:16'),
	(2, 'Admin', 'web', '2025-02-23 20:00:17', '2025-02-23 20:00:17'),
	(3, 'Account', 'web', '2025-02-23 20:00:17', '2025-02-23 20:00:17'),
	(4, 'Manager', 'web', '2025-02-23 20:00:17', '2025-02-23 20:00:17'),
	(6, 'Customer', 'web', '2025-02-23 23:08:33', '2025-02-23 23:29:37'),
	(8, 'Cajero', 'web', '2025-05-04 05:09:20', '2025-05-04 05:09:20'),
	(9, 'Cajero2', 'web', '2025-05-04 05:26:29', '2025-05-04 05:26:29');

-- Volcando estructura para tabla sales_system.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.role_has_permissions: ~29 rows (aproximadamente)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(3, 2),
	(4, 2),
	(12, 2),
	(3, 3),
	(4, 3),
	(12, 3),
	(2, 4),
	(5, 4),
	(8, 4),
	(9, 4),
	(10, 4),
	(1, 6),
	(1, 8),
	(8, 8),
	(14, 8),
	(14, 9);

-- Volcando estructura para tabla sales_system.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shopname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `suppliers_email_unique` (`email`),
  UNIQUE KEY `suppliers_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.suppliers: ~10 rows (aproximadamente)
INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `shopname`, `photo`, `type`, `account_holder`, `account_number`, `bank_name`, `bank_branch`, `city`, `created_at`, `updated_at`) VALUES
	(1, 'Hollie Gulgowski', 'langworth.dedric@example.com', '+1-774-423-0293', '3827 Mitchell Bypass Apt. 346\r\nWest Winifred, NV 53685', 'Durgan-Schultz', '1744827386_01.jpg', 'Whole Seller', 'Dewayne Labadie', '25110916', NULL, 'Fatimamouth', 'Colemouth', '2025-02-23 20:00:15', '2025-04-16 23:16:26'),
	(2, 'Miss Antonietta Schneider IV', 'jupton@example.com', '443.960.4949', '5094 Margaretta Village Apt. 433\r\nNyaton, OK 45450-6702', 'Swaniawski, Jones and Brown', '1744827444_03.jpg', 'Whole Seller', 'Elody Eichmann', '24338077', 'BSI', 'Merlintown', 'Dietrichburgh', '2025-02-23 20:00:15', '2025-04-16 23:17:24'),
	(3, 'Josefa Donnelly', 'cyrus15@example.com', '(515) 446-2072', '5625 Rudolph Island Suite 301\nSouth Manuelaville, MD 79070-8336', 'Shanahan-Cremin', NULL, 'Distributor', 'Rebeka Wintheiser', '33766396', 'MANDIRI', 'Port Wiltonmouth', 'Destineeshire', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(4, 'Katelyn Metz', 'ehaag@example.com', '+15417186179', '5140 Collier Radial Suite 352\nPort Domingoside, GA 00230', 'Jenkins, Larkin and Considine', NULL, 'Whole Seller', 'Helena Larkin', '30063286', 'MANDIRI', 'Omariport', 'South Antwonland', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(5, 'Prof. Sarai Hilpert', 'adan.monahan@example.org', '480.988.0883', '76789 Conrad Skyway Suite 602\nNorth Dwightfurt, NJ 50378-8704', 'Langworth Inc', NULL, 'Whole Seller', 'Miss Corene Johnson', '18140792', 'MANDIRI', 'Luciennetown', 'South Nya', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(6, 'Rolando Keeling III', 'aiyana.kiehn@example.com', '+16265996543', '620 Ruthe Corners Apt. 715\nPort Kalebton, CO 09680', 'Bernier, Kozey and Denesik', NULL, 'Distributor', 'Mr. Jaiden McCullough DVM', '24710231', 'BJB', 'Wolfshire', 'South Mittiefort', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(7, 'Enola Tremblay', 'maximus50@example.net', '+1-502-712-8383', '374 Ernser Passage\nSouth Archibaldport, DC 05253', 'Kulas, Wiegand and Sanford', NULL, 'Whole Seller', 'Enrico Jacobi V', '28079827', 'BRI', 'Lake Talonshire', 'Gusikowskiport', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(8, 'Tyler Rodriguez II', 'lowe.alex@example.com', '269.626.9897', '33014 Block Grove\nEast Vladimirburgh, MS 40171', 'Leuschke-Cartwright', NULL, 'Distributor', 'Mekhi Ferry', '79194080', 'MANDIRI', 'Manleyshire', 'East Joelle', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(9, 'Ms. Makenzie Bogan', 'estanton@example.net', '1-380-245-2570', '319 Broderick Crescent\nKaelynhaven, ND 94314', 'Nicolas, White and Stark', NULL, 'Whole Seller', 'Prof. Roscoe Wisoky III', '47172960', 'MANDIRI', 'Marianhaven', 'West Haskell', '2025-02-23 20:00:15', '2025-02-23 20:00:15'),
	(10, 'Jennifer Kub', 'wiegand.lea@example.net', '+1.267.309.6853', '21340 Larue Glen Suite 137\nClarabelletown, NH 71133-8410', 'Rohan-Romaguera', NULL, 'Whole Seller', 'Brannon Stark', '61542543', 'BJB', 'Boehmtown', 'Port Adolfo', '2025-02-23 20:00:15', '2025-02-23 20:00:15');

-- Volcando estructura para tabla sales_system.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sales_system.users: ~5 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `photo`) VALUES
	(1, 'Admin', 'admin@gmail.com', '2025-02-23 20:00:13', '$2y$10$0GcHUt5zvR4XPa6bSxgrQuzfXydbig.TYINpwK1i0qFHu/fL/73tu', 'tnXqjYYQHxgAg3QtCyhhvMTJCmLnQKabFiXgdsXZTT4ZSO31YYzDqr5fjgVP', '2025-02-23 20:00:13', '2025-04-16 06:41:01', 'admin', '1829521495389722.jpg'),
	(2, 'User', 'user@gmail.com', '2025-02-23 20:00:13', '$2y$10$ybQkzOG3T4iXtdBpj8.hJONpKx01NbiE0i3zvqxCeaATIRHmsOSe6', 'tXH4CXnLPh1XqeZHhD2ZP5BY6hdAOW0u1HmXOfVbTqn45bFcsPsdFHAbLrXG', '2025-02-23 20:00:13', '2025-02-23 20:37:34', 'user', NULL),
	(3, 'mauricio', 'mauricio@gmail.com', NULL, '$2y$10$ceEHrtD.hob/ZhEAdO9uD.sJkktstg4Qtc8Pv2.Uof5ICW5UVyRKG', NULL, '2025-02-23 20:40:52', '2025-02-23 20:40:52', 'mauricio', NULL),
	(4, 'Carlos', 'carlos@mail.com', NULL, '$2y$10$WbScFaC60qh0lypikXme1.rVv.2Xbni/VrRjM/Wkj4IZWsuy0SYsy', NULL, '2025-02-24 00:13:56', '2025-02-24 00:13:56', 'carlos', NULL),
	(5, 'user8', 'user8@mail.com', NULL, '$2y$10$BzsKNCAHvfQQaEUOcomVx.T6gkF2UD9.wEqI3c.hwysP5qpouUuYu', NULL, '2025-05-02 05:06:13', '2025-05-02 05:19:33', 'user2', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
