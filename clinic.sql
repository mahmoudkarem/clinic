-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 05:42 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 6, '2023-02-03', '2023-02-02 22:56:09', '2023-02-02 22:56:09'),
(2, 6, '2023-02-05', '2023-02-05 12:48:40', '2023-02-05 12:48:40'),
(3, 6, '2023-02-06', '2023-02-05 12:48:53', '2023-02-05 12:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `doctor_id`, `time`, `status`, `created_at`, `updated_at`, `date`) VALUES
(1, 5, 6, '6am', 1, '2023-02-02 18:28:01', '2023-02-03 14:10:10', '2023-02-03'),
(2, 7, 6, '6.20am', 0, '2023-02-03 07:50:48', '2023-02-03 14:10:14', '2023-02-03'),
(3, 8, 6, '6.20am', 1, '2023-02-05 07:50:29', '2023-02-05 12:51:21', '2023-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `created_at`, `updated_at`) VALUES
(1, 'Dental', '2023-02-02 22:54:04', '2023-02-02 22:54:04');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_31_164556_create_roles_table', 1),
(6, '2022_05_31_164858_add_gender_to_users_table', 1),
(7, '2022_06_01_040310_create_appointments_table', 1),
(8, '2022_06_01_052147_create_times_table', 1),
(9, '2022_06_02_025444_create_bookings_table', 1),
(10, '2022_06_02_030627_add_date_to_bookings_table', 1),
(11, '2022_06_03_190545_create_prescriptions_table', 1),
(12, '2022_06_04_191132_create_departments_table', 1),
(13, '2023_02_03_173309_create_gallery_table', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `disease` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedure` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `doctor_id`, `patient_id`, `disease`, `symptoms`, `date`, `medicine`, `procedure`, `feedback`, `signature`, `created_at`, `updated_at`) VALUES
(1, 6, 5, 'مرض قلب', 'كحة', '2023-02-03', 'كيتوفان', 'مرة يوميا', 'لا يوجد', 'احمد كارم', '2023-02-03 14:15:09', '2023-02-03 14:15:09'),
(2, 6, 8, '‏Viral disease', 'cough', '2023-02-05', 'oplex', 'Twice a day after eating', 'Nothing', 'Eslam Ibrahim', '2023-02-05 12:55:21', '2023-02-05 12:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Doctor', '2023-02-02 20:59:30', '2023-02-02 20:59:30'),
(2, 'Admin', '2023-02-02 20:59:30', '2023-02-02 20:59:30'),
(3, 'Patient', '2023-02-02 20:59:30', '2023-02-02 20:59:30'),
(4, 'Doctor', '2023-02-02 21:35:19', '2023-02-02 21:35:19'),
(5, 'Admin', '2023-02-02 21:35:19', '2023-02-02 21:35:19'),
(6, 'Patient', '2023-02-02 21:35:19', '2023-02-02 21:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `appointment_id`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '6am', 1, '2023-02-02 22:56:09', '2023-02-02 18:28:11'),
(2, 1, '6.20am', 1, '2023-02-02 22:56:09', '2023-02-03 07:50:51'),
(3, 1, '6.40am', 0, '2023-02-02 22:56:09', '2023-02-02 22:56:09'),
(4, 1, '7am', 0, '2023-02-02 22:56:09', '2023-02-02 22:56:09'),
(5, 2, '6am', 0, '2023-02-05 12:48:40', '2023-02-05 12:48:40'),
(6, 2, '6.20am', 1, '2023-02-05 12:48:40', '2023-02-05 07:50:32'),
(7, 2, '6.40am', 0, '2023-02-05 12:48:40', '2023-02-05 12:48:40'),
(8, 2, '7am', 0, '2023-02-05 12:48:40', '2023-02-05 12:48:40'),
(9, 3, '8.20am', 0, '2023-02-05 12:48:53', '2023-02-05 12:48:53'),
(10, 3, '9am', 0, '2023-02-05 12:48:53', '2023-02-05 12:48:53'),
(11, 3, '10.40am', 0, '2023-02-05 12:48:53', '2023-02-05 12:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `address`, `phone_number`, `department`, `image`, `education`, `description`, `remember_token`, `created_at`, `updated_at`, `gender`) VALUES
(1, 'Minh', 'admin@gmail.com', NULL, '$2y$10$Slhlx8d1UDaluY.7cUQHeuS7diw.5I6c.9/xC.TLPEVMCo5A0W4PG', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 20:59:30', '2023-02-02 20:59:30', 'male'),
(2, 'manar', 'karem@admin.com', NULL, '$2y$10$tcPyZ37nQSM3VWKqDgeemOJwuMYf17ukS0TtxVLBBiNhXcS5F0QVu', 2, 'giza', '020920930923', NULL, NULL, NULL, NULL, NULL, '2023-02-02 21:35:19', '2023-02-02 22:13:46', 'male'),
(3, 'karem', 'karem@hamada.com', NULL, '$2y$10$Y3mCYLAEXRYwazd2ulFkj.lmsbT1uamXdqaAsf39Z0xB5RRUlcFbC', 2, 'egypt tanta', '01151112800', NULL, NULL, NULL, NULL, NULL, '2023-02-02 21:58:57', '2023-02-02 22:13:23', 'male'),
(5, 'ali', 'ali@gmail.com', NULL, '$2y$10$wzhUWrGms.a4kYuspL8B7.9h4bsWfcdQyrA1VkYQ0sKsEJL.toDB2', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-02 22:48:37', '2023-02-02 22:48:37', 'male'),
(6, 'Eslam Ibrahim', 'eslam@doctor.com', NULL, '$2y$10$EIL5lKAsvGS49wEs4k6dhuulNXXNC784EUBWdTfjnubUmi6Ni/Sfe', 1, '27 ahmed shaheen st', '01124145507', 'Dental', 'Gpk4oSYnzrCahY5bu3ODooxgAVZGich891aADIIb.jpg', 'medicine', 'nothing', NULL, '2023-02-02 22:55:23', '2023-02-05 12:47:01', 'male'),
(7, 'krima', 'krimar@gmail.com', NULL, '$2y$10$JCkolWJYSAzoDmpN9Z.By.nESeBmx16T6SKIXf.0hjKNqg3MEUihi', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-03 12:49:36', '2023-02-03 12:49:36', 'male'),
(8, 'omnia', 'omnia@patient.com', NULL, '$2y$10$jM2zUD84lHPrLtF1f/acqenH1Sn2K4rsANqXE6UwdPaTHPlpq7TM6', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-05 12:50:11', '2023-02-05 12:50:11', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
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
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
