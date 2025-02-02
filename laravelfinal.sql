-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 07:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_room_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` enum('present','absent','late') NOT NULL DEFAULT 'absent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `class_room_id`, `student_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-01-23', 'absent', '2025-01-23 01:18:48', '2025-01-23 01:29:29'),
(2, 1, 1, '2025-01-24', 'absent', '2025-01-24 01:33:14', '2025-01-24 01:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_rooms`
--

INSERT INTO `class_rooms` (`id`, `name`, `code`, `capacity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'WebDev', 'ITE 108', 20, 'active', '2025-01-23 01:18:38', '2025-01-23 01:18:38'),
(2, 'Living in the IT Era', 'ITE 117', 1, 'active', '2025-01-23 01:28:45', '2025-01-23 01:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `class_room_student`
--

CREATE TABLE `class_room_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_room_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_room_student`
--

INSERT INTO `class_room_student` (`id`, `class_room_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE `class_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_19_140328_create_students_table', 1),
(5, '2025_01_19_140348_create_classes_table', 1),
(6, '2025_01_19_140406_create_class_student_table', 1),
(7, '2025_01_19_215211_create_class_rooms_table', 1),
(8, '2025_01_20_000933_create_attendances_table', 1),
(9, '2025_01_23_045043_add_two_factor_columns_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Asp1nhzIHIuoY92xZe3w6Z6JF3fJ7rVHWRFpClHY', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', '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', 1738477423);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `attendance_date` date DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `is_present` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `student_id`, `attendance_date`, `status`, `is_present`, `created_at`, `updated_at`) VALUES
(1, 'Catherine Dalafu', 'kxtdlf@gmail.com', '2022010046', NULL, 'active', 0, '2025-01-23 01:18:05', '2025-01-23 01:18:05'),
(2, 'Manuel Dizon', 'manuel@gmail.com', '2022010278', NULL, 'active', 0, '2025-01-23 01:27:58', '2025-01-23 01:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Catherine Dalafu', 'kxtdlf@gmail.com', NULL, '$2y$12$pRSDHvMLmRLFrdk3vXhiZOxvE5vaGza.GoPWm/DBRKFhrRefaWXWS', NULL, NULL, NULL, NULL, '2025-01-23 01:17:22', '2025-01-23 01:17:22'),
(2, 'arkin dayle', 'arkin@gmail.com', NULL, '$2y$12$PEN0xdTTtxIjz2wMUzUY3eR2GshdWE0vAV/PALDv3FaLuBgtQYbeG', NULL, NULL, NULL, NULL, '2025-01-23 01:23:58', '2025-01-23 01:23:58'),
(3, 'Jhon Danver C. Abogado', 'jaydee.abogado.99@gmail.com', NULL, '$2y$12$13BFxE2Lk9t2AV0KsUBtDuCIil83kViuJZZ4He0tW7NhTwUWB2lVi', NULL, NULL, NULL, NULL, '2025-02-01 22:23:12', '2025-02-01 22:23:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_class_room_id_foreign` (`class_room_id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_code_unique` (`code`);

--
-- Indexes for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_rooms_code_unique` (`code`);

--
-- Indexes for table `class_room_student`
--
ALTER TABLE `class_room_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_room_student_class_room_id_foreign` (`class_room_id`),
  ADD KEY `class_room_student_student_id_foreign` (`student_id`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_student_class_id_foreign` (`class_id`),
  ADD KEY `class_student_student_id_foreign` (`student_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_room_student`
--
ALTER TABLE `class_room_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_student`
--
ALTER TABLE `class_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_class_room_id_foreign` FOREIGN KEY (`class_room_id`) REFERENCES `class_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_room_student`
--
ALTER TABLE `class_room_student`
  ADD CONSTRAINT `class_room_student_class_room_id_foreign` FOREIGN KEY (`class_room_id`) REFERENCES `class_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_room_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_student`
--
ALTER TABLE `class_student`
  ADD CONSTRAINT `class_student_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
