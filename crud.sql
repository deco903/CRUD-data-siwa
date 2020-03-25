-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.24 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk crud
CREATE DATABASE IF NOT EXISTS `crud` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `crud`;

-- membuang struktur untuk table crud.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel crud.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table crud.mapel
CREATE TABLE IF NOT EXISTS `mapel` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel crud.mapel: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `mapel` DISABLE KEYS */;
INSERT INTO `mapel` (`id`, `kode`, `nama`, `smester`, `created_at`, `updated_at`) VALUES
	(1, 'm-001', 'matematika', 'ganjil', NULL, NULL),
	(2, 'b-001', 'bahasa indonesia', 'ganjil', NULL, NULL),
	(4, 'm-003', 'agama', 'ganjil', NULL, NULL);
/*!40000 ALTER TABLE `mapel` ENABLE KEYS */;

-- membuang struktur untuk table crud.mapel_siswa
CREATE TABLE IF NOT EXISTS `mapel_siswa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel crud.mapel_siswa: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `mapel_siswa` DISABLE KEYS */;
INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `nilai`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 70, NULL, NULL),
	(2, 1, 2, 60, NULL, NULL),
	(3, 4, 1, 75, NULL, NULL),
	(4, 2, 1, 70, '2020-02-28 11:05:50', '2020-02-28 11:05:50'),
	(5, 2, 2, 50, '2020-02-28 11:05:58', '2020-02-28 11:05:58'),
	(6, 7, 1, 77, '2020-02-28 11:13:36', '2020-02-28 11:13:36'),
	(7, 7, 2, 88, '2020-02-28 11:14:14', '2020-02-28 11:14:14'),
	(12, 1, 4, 60, NULL, NULL),
	(18, 10, 4, 77, '2020-02-29 06:51:07', '2020-02-29 06:51:07');
/*!40000 ALTER TABLE `mapel_siswa` ENABLE KEYS */;

-- membuang struktur untuk table crud.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel crud.migrations: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_02_25_074201_create_siswa_table', 2),
	(5, '2020_02_27_044546_create_mapel_siswa_table', 3),
	(6, '2020_02_27_045423_create_mapel_table', 4),
	(7, '2020_02_27_071622_create_mapel_siswa_table', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table crud.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel crud.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table crud.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel crud.siswa: ~11 rows (lebih kurang)
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`id`, `user_id`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `created_at`, `updated_at`) VALUES
	(1, 0, 'deny', 'rahman', 'L', 'hindu', 'malang', 'pavel6.jpg', NULL, '2020-03-11 09:21:37'),
	(2, 0, 'ratih', 'prameswati', 'P', 'islam', 'jogjakarta', '', NULL, '2020-02-25 09:35:45'),
	(4, 0, 'roman', 'riquelme', 'L', 'katolik', 'semarang', '', '2020-02-25 09:02:50', '2020-02-27 03:37:54'),
	(5, 0, 'anggita', 'panjaitan', 'L', 'kristen', 'jambi', '', '2020-02-25 09:03:22', '2020-02-26 07:39:07'),
	(6, 0, 'emil', 'salim', 'L', 'islam', 'palembang', '', '2020-02-25 09:10:56', '2020-02-27 03:38:03'),
	(7, 0, 'joko', 'driono', 'L', 'islam', 'bali', '', '2020-02-25 09:11:41', '2020-02-27 03:38:11'),
	(8, 0, 'zulfania', 'rahmita', 'P', 'islam', 'jakarta', '', '2020-02-25 09:46:36', '2020-02-25 09:47:15'),
	(9, 0, 'ari', 'topan', 'l', 'hindu', 'bali', '', '2020-02-27 03:08:05', '2020-02-27 03:08:05'),
	(10, 2, 'karim', 'benzema', 'L', 'budha', 'jogjakarta', '', '2020-02-27 03:36:49', '2020-02-27 03:36:56'),
	(11, 3, 'mohamed', 'salah', 'l', 'islam', 'depok', '', '2020-02-27 03:42:51', '2020-02-27 03:42:51'),
	(12, 4, 'sarah', 'bachelor', 'P', 'khatolik', 'bandung', '', '2020-02-27 03:44:21', '2020-02-27 03:44:21'),
	(13, 5, 'riezka', 'kusumatiningrum', 'P', 'islam', 'semarang', '', '2020-02-28 07:07:15', '2020-02-28 07:07:15'),
	(14, 6, 'ririen', 'trichwati', 'P', 'islam', 'padang', '17662928_309475766138028_1614603907374252032_n.jpg', '2020-02-28 07:32:31', '2020-02-28 07:32:32');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- membuang struktur untuk table crud.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel crud.users: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'basrul', 'rolling@gmail.com', NULL, '$2y$10$JpqcE9hFFC/jGBI3s5.CyOiQxKKa1yfg1ieFnYe/J4zftf.wL.xyC', 'oV6V7crGpsF4YmAayDlHBLQEMdfls7ZD833iMjwnOTiM7J7vcCQloVLIzsw7', '2020-02-26 06:38:22', '2020-02-26 06:38:22'),
	(2, 'siswa', 'karim', 'karim12@yahoo.com', NULL, '$2y$10$rCKVw4TNV7Gp0zEpOa5cJe0oaqJidfobbQybGt0BRrxuHYv.QALJ6', 'J6ec34AjFlRifeqmmUp6gtrk4r0T6YXhUVPlwU7o', '2020-02-27 03:36:49', '2020-02-27 03:36:49'),
	(3, 'siswa', 'mohamed', 'salah77@gmail.com', NULL, '$2y$10$lN0Dif58aS65I3wXqG56mOqMQPrcw6Ql.FRN0GH3Zd2t33ml3B32e', '3fWTOmASfIgbfbHA0mfIp3hIg27Cg8acn8ILNgDT', '2020-02-27 03:42:50', '2020-02-27 03:42:50'),
	(4, 'siswa', 'sarah', 'sr23@gmail.com', NULL, '$2y$10$fZImS3Heel6a29RMlBp5deYJOrL9jp9bJ/Ew7h07VN2Ia/WUoJr8m', 'HxUmXooYMjuTaExESaTSBzboIGOlCCNcDhxr47scyeZvXY0B4bCZxrueH45E', '2020-02-27 03:44:20', '2020-02-27 03:44:20'),
	(5, 'siswa', 'riezka', 'ri3zk422@yahoo.com', NULL, '$2y$10$TpCA7XCtaqjuGbCsBuE16uTfgyIkdu7eh5RmwnaOxfg.yO3YB2QOG', 'MJzPYTuwgkWpdEAbKrcMu1ELa2M0wL7TT6o1R2D8', '2020-02-28 07:07:15', '2020-02-28 07:07:15'),
	(6, 'siswa', 'ririen', 'ririn34@gmail.com', NULL, '$2y$10$Hekz1//Ox/O6.ef59VxUmO.NVJLwT38bpTxo19OSMkOAARWBY.1qa', 'w8zkW4M7BZuOv61xYTufwqXGhBJbqqLNmDYppj1a', '2020-02-28 07:32:31', '2020-02-28 07:32:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
