-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 05:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `profile_image`, `phone`, `dob`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Ghanshyam Mishra', 'admin@gmail.com', 'ghanshyam', 'images/admin/1720586787_jpg', '9521422441', '1991-02-02', '$2y$10$v78Jb9cDznviA9SoHDj9Oe7gBy4fkuiq3tL8ZgWV02vshIJ5ydq7K', '2024-07-02 19:35:08', '2024-07-09 23:16:28');

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
-- Table structure for table `jewelleries`
--

CREATE TABLE `jewelleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jewelleries`
--

INSERT INTO `jewelleries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Chain', '2024-07-13 05:28:38', '2024-07-13 06:41:18'),
(5, 'Earings', '2024-07-13 05:28:47', '2024-07-13 05:28:47'),
(6, 'Indian Mangsutar', '2024-07-13 05:28:55', '2024-07-13 05:28:55'),
(7, 'Nose Pin', '2024-07-13 05:29:17', '2024-07-13 05:29:17'),
(8, 'Watchs', '2024-07-13 05:29:26', '2024-07-13 05:29:26');

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
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2024_07_03_005147_create_admins_table', 1),
(19, '2024_07_03_005251_create_sellers_table', 1),
(21, '2024_07_08_083137_create_products_table', 2),
(25, '2014_10_12_000000_create_users_table', 3),
(26, '2024_07_13_040132_create_user_address_table', 4),
(29, '2024_07_13_081307_create_rings_table', 5),
(31, '2024_07_13_100056_create_jewelleries_table', 6);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shape` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metal_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_style` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `band_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stoneType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stone_shape_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_carat` decimal(8,2) DEFAULT NULL,
  `stone_price` decimal(8,2) DEFAULT NULL,
  `stone_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_cut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_clarity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_depth` decimal(8,2) DEFAULT NULL,
  `stone_table` decimal(8,2) DEFAULT NULL,
  `stone_ratio` decimal(8,2) DEFAULT NULL,
  `stone_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `shape`, `metal_type`, `setting_style`, `band_type`, `setting_profile`, `setting_image`, `setting_description`, `stoneType`, `stone_shape_type`, `stone_carat`, `stone_price`, `stone_color`, `stone_cut`, `stone_clarity`, `stone_depth`, `stone_table`, `stone_ratio`, `stone_image`, `created_at`, `updated_at`) VALUES
(11, 'Carlos Prince2', 'Oval', '18k Yellow Gold', 'Halo', 'Pave', 'Low set', 'images/product/setting_image_1720586964.png', 'testing', 'lab-grown-diamond', 'Round', 12.00, 1500.00, 'J', 'Excellent', 'I1', 10.00, 10.00, 10.00, 'images/product/stone_image_1720586964.PNG', '2024-07-09 23:19:24', '2024-07-09 23:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `rings`
--

CREATE TABLE `rings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shape` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metal_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `band_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_user_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_wholesaler_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stoneType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_shape_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_carat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_cut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_clarity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_depth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_table` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_ratio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_user_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone_wholesaler_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rings`
--

INSERT INTO `rings` (`id`, `name`, `shape`, `metal_type`, `setting_style`, `band_type`, `setting_profile`, `setting_image`, `setting_description`, `setting_user_price`, `setting_wholesaler_price`, `stoneType`, `stone_shape_type`, `stone_carat`, `stone_price`, `stone_color`, `stone_cut`, `stone_clarity`, `stone_depth`, `stone_table`, `stone_ratio`, `stone_image`, `stone_user_price`, `stone_wholesaler_price`, `created_at`, `updated_at`) VALUES
(2, 'test', 'Round', 'Platinum', 'Trilogy', 'Plain', 'High Set', 'images/ring/setting_image_1723091573.PNG', 'test', '1222', '111', 'sapphire', 'Round', NULL, NULL, 'Colourless', NULL, NULL, NULL, NULL, NULL, 'images/ring/stone_image_1723091573.PNG', '1222', '12212', '2024-08-07 23:02:54', '2024-08-07 23:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: Inactive, 1: Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: Inactive, 1: Active',
  `userType` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1: Regular, 2: Wholesaler',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `avatar`, `document`, `phone`, `dob`, `password`, `status`, `userType`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'haxi', 'junu@mailinator.com', 'saler', 'images/saler/1720778785.jpg', 'document/user/1720778163.pdf', '9854755778', '2024-07-12', '$2y$10$XKJnqpVIkHQ3KKEwNI6tFOxPAcUI2OyKLP7xt6jysiPBgjuTyb3q.', '1', '2', NULL, '2024-07-10 06:17:01', '2024-08-07 22:59:58'),
(18, 'Sydney Mcdaniel', 'qibivobiw@mailinator.com', 'Sydney', NULL, NULL, NULL, NULL, '$2y$10$yVQ.ifuex1W3L.egRRLmSu7VU4yR.jZjUyfqnrA5Vztb5XBli0TW2', '0', '2', NULL, '2024-07-13 02:15:02', '2024-07-13 02:15:02'),
(19, 'Risa Leon', 'qyrodohi@mailinator.com', 'Risa', 'images/wholesaler/1720857045.jfif', 'images/wholesaler/document/1720856781.pdf', NULL, NULL, '$2y$10$I1PwqJOZ38OjTikiNYyY2.qVlq5ggf9voTkFqso.j.15lDOSS4VTK', '1', '1', NULL, '2024-07-13 02:16:21', '2024-07-13 02:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_shipping` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0: No, 1: Yes',
  `ship_street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jewelleries`
--
ALTER TABLE `jewelleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jewelleries_name_unique` (`name`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rings`
--
ALTER TABLE `rings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`),
  ADD UNIQUE KEY `sellers_username_unique` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_address_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jewelleries`
--
ALTER TABLE `jewelleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rings`
--
ALTER TABLE `rings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
