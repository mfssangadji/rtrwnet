-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 03:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_best_net`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `packet_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `packet_id`, `name`, `address`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(14, 2, 'Ari', 'Kel. Bastiong', '-', 0, '2020-10-06 07:40:53', '2020-10-06 07:40:53'),
(15, 3, 'Ibu Nona', 'Kel. Takoma', '-', 0, '2020-10-06 07:41:20', '2020-10-06 07:41:20'),
(16, 3, 'Ibu Agus', 'Kel. Kalapa Pende', '-', 0, '2020-10-06 07:41:46', '2020-10-06 07:41:46'),
(17, 3, 'Pak Ali', 'Kel. Tabahawa', '-', 0, '2020-10-06 07:42:18', '2020-10-06 07:42:18'),
(18, 3, 'Ibu Nana', 'Kel. Tanah Tinggi', '-', 0, '2020-10-06 07:42:39', '2020-10-06 07:42:39'),
(19, 3, 'Ibu Ama', 'Kel. Tongole', '-', 0, '2020-10-06 07:43:07', '2020-10-06 07:43:07'),
(20, 3, 'Ibu Fit', 'Kel. Toboko', '-', 0, '2020-10-06 07:43:25', '2020-10-06 07:43:25'),
(21, 3, 'Bulu Kuning', 'Kel. Jati', '-', 0, '2020-10-06 07:44:02', '2020-10-06 07:44:02'),
(22, 3, 'Asmiyati', 'Kel. Jerbus', '-', 0, '2020-10-06 07:44:22', '2020-10-06 07:44:22'),
(23, 3, 'Pak Dida', 'Kel. Jan', '-', 0, '2020-10-06 07:44:44', '2020-10-06 07:44:44'),
(24, 3, 'Nanda', 'Kel. Mangga Dua', '-', 0, '2020-10-06 07:45:08', '2020-10-06 07:45:08'),
(25, 3, 'Ibu Tita Warkop', 'Kel. Kalapa Pende', '-', 0, '2020-10-06 07:45:28', '2020-10-06 07:45:28'),
(26, 2, 'Bapak Pardi', 'Kel. Kota Baru', '-', 0, '2020-10-06 07:46:10', '2020-10-06 07:46:10'),
(27, 2, 'Ibu Marni', 'Kel. Takoma', '-', 0, '2020-10-06 07:46:39', '2020-10-06 07:46:39'),
(28, 2, 'Surbana', 'Kel. Mangga Dua', '-', 0, '2020-10-06 07:47:09', '2020-10-06 07:47:09'),
(29, 2, 'Pak Alwi', 'Kel. Maliaro', '-', 0, '2020-10-06 07:47:27', '2020-10-06 07:47:27'),
(30, 2, 'Jirdun', 'Kel. Maliaro', '-', 0, '2020-10-06 07:47:44', '2020-10-06 07:47:44'),
(31, 2, 'Udin', 'Kel. BTN', '-', 0, '2020-10-06 07:48:00', '2020-10-06 07:48:00'),
(32, 2, 'Fardan', 'Kel. BTN', '-', 0, '2020-10-06 07:48:18', '2020-10-06 07:48:18'),
(33, 2, 'Idrus', 'Kel. BTN', '-', 0, '2020-10-06 07:48:33', '2020-10-06 07:48:33');

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
-- Table structure for table `hotspot`
--

CREATE TABLE `hotspot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotspot`
--

INSERT INTO `hotspot` (`id`, `name`, `agent_point`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'Ibu Cumi', 'Halbar Tauro', '-', '2020-10-06 11:08:24', '2020-10-06 11:15:03'),
(3, 'Pak Raden', 'Tidore Mafututu', '-', '2020-10-06 11:13:45', '2020-10-06 11:14:51'),
(4, 'Abang Igo', 'Sofifi Somadoe', '-', '2020-10-06 11:14:02', '2020-10-06 11:14:43'),
(5, 'Ci Ona', 'Maitara Induk', '-', '2020-10-06 11:14:16', '2020-10-06 11:14:34'),
(6, 'Ibu Rani', 'Tidore Cobo', '-', '2020-10-06 11:15:16', '2020-10-06 11:15:16'),
(7, 'Om Kader', 'Sidangoli', '-', '2020-10-06 11:15:31', '2020-10-06 11:15:31'),
(8, 'Abang Cecep', 'Maitara Selatan', '-', '2020-10-06 11:15:47', '2020-10-06 11:15:47'),
(9, 'Ci Mirna', 'Sofifi Kayasa', '-', '2020-10-06 11:16:13', '2020-10-06 11:16:13'),
(10, 'Om Agus', 'Kusu', '-', '2020-10-06 11:16:27', '2020-10-06 11:16:27'),
(11, 'Akak Fui', 'Peot', '-', '2020-10-06 11:16:37', '2020-10-06 11:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `customer_id`, `invoice_number`, `status`, `created_at`, `updated_at`) VALUES
(22, 14, '#7404409', 1, '2020-10-06 07:40:54', '2020-10-06 07:49:42'),
(23, 15, '#2432342', 1, '2020-10-06 07:41:20', '2020-10-06 07:50:21'),
(24, 16, '#9757511', 0, '2020-10-06 07:41:46', '2020-10-06 07:41:46'),
(25, 17, '#7113961', 1, '2020-10-06 07:42:18', '2020-10-06 07:56:16'),
(26, 18, '#4755788', 1, '2020-10-06 07:42:40', '2020-10-06 07:56:04'),
(27, 19, '#2021169', 0, '2020-10-06 07:43:07', '2020-10-06 07:43:07'),
(28, 20, '#4269500', 1, '2020-10-06 07:43:25', '2020-10-06 07:55:49'),
(29, 21, '#1148214', 0, '2020-10-06 07:44:02', '2020-10-06 07:44:02'),
(30, 22, '#1659172', 0, '2020-10-06 07:44:23', '2020-10-06 07:44:23'),
(31, 23, '#5611569', 1, '2020-10-06 07:44:45', '2020-10-06 07:55:35'),
(32, 24, '#2242069', 0, '2020-10-06 07:45:08', '2020-10-06 07:45:08'),
(33, 25, '#5545710', 1, '2020-10-06 07:45:28', '2020-10-06 07:53:43'),
(34, 26, '#7970467', 0, '2020-10-06 07:46:10', '2020-10-06 07:46:10'),
(35, 27, '#5151041', 0, '2020-10-06 07:46:39', '2020-10-06 07:46:39'),
(36, 28, '#6082696', 1, '2020-10-06 07:47:09', '2020-10-06 07:53:18'),
(37, 29, '#1876158', 0, '2020-10-06 07:47:27', '2020-10-06 07:47:27'),
(38, 30, '#8637915', 1, '2020-10-06 07:47:44', '2020-10-06 07:54:15'),
(39, 31, '#6939171', 0, '2020-10-06 07:48:00', '2020-10-06 07:48:00'),
(40, 32, '#4215603', 1, '2020-10-06 07:48:18', '2020-10-06 07:51:50'),
(41, 33, '#6942398', 1, '2020-10-06 07:48:33', '2020-10-06 07:50:56');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_10_04_191131_create_packet_table', 1),
(10, '2020_10_04_191157_create_customers_table', 1),
(11, '2020_10_05_020415_create_invoice_table', 2),
(12, '2020_10_05_020425_create_payment_table', 2),
(13, '2020_10_05_021920_create_payment_table', 3),
(14, '2020_10_05_195720_create_payment_table', 4),
(15, '2020_10_06_145843_create_hotspot_table', 5),
(16, '2020_10_06_182942_create_stock_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `packet`
--

CREATE TABLE `packet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `packet_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packet`
--

INSERT INTO `packet` (`id`, `packet_name`, `price`, `created_at`, `updated_at`) VALUES
(1, '4 Mbps', 185000, '2020-10-04 19:27:10', '2020-10-04 19:27:10'),
(2, '5 Mbps', 200000, '2020-10-04 19:27:21', '2020-10-04 19:27:21'),
(3, '6 Mbps', 250000, '2020-10-04 19:27:31', '2020-10-04 19:27:31'),
(4, '7 Mbps', 350000, '2020-10-04 19:27:40', '2020-10-04 19:27:40'),
(5, '9 Mbps', 400000, '2020-10-04 19:27:49', '2020-10-04 19:27:49'),
(6, '12 Mbps', 500000, '2020-10-04 19:27:58', '2020-10-04 19:27:58'),
(7, '18 Mbps', 750000, '2020-10-04 19:28:07', '2020-10-04 19:28:07');

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `bill_cost` double UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer_id`, `invoice_id`, `bill_cost`, `created_at`, `updated_at`) VALUES
(24, 14, 22, 200000, '2020-10-06 07:49:41', '2020-10-06 07:49:41'),
(25, 15, 23, 250000, '2020-10-06 07:50:21', '2020-10-06 07:50:21'),
(26, 33, 41, 200000, '2020-10-06 07:50:55', '2020-10-06 07:50:55'),
(27, 32, 40, 200000, '2020-10-06 07:51:49', '2020-10-06 07:51:49'),
(28, 28, 36, 200000, '2020-10-06 07:53:18', '2020-10-06 07:53:18'),
(29, 25, 33, 250000, '2020-10-06 07:53:43', '2020-10-06 07:53:43'),
(30, 30, 38, 200000, '2020-10-06 07:54:15', '2020-10-06 07:54:15'),
(31, 23, 31, 250000, '2020-10-06 07:55:35', '2020-10-06 07:55:35'),
(32, 20, 28, 250000, '2020-10-06 07:55:49', '2020-10-06 07:55:49'),
(33, 18, 26, 250000, '2020-10-06 07:56:04', '2020-10-06 07:56:04'),
(34, 17, 25, 250000, '2020-10-06 07:56:16', '2020-10-06 07:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotspot_id` bigint(20) UNSIGNED NOT NULL,
  `qty` bigint(20) NOT NULL,
  `cost` double NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `hotspot_id`, `qty`, `cost`, `description`, `created_at`, `updated_at`) VALUES
(1, 11, 23, 20000, '-', '2020-10-06 11:36:09', '2020-10-06 11:36:09');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@localhost', NULL, '$2y$10$qkQ/3gmHUz90YjU9YKCEXOwPA4.AmRp7MnLsGWSfAJqOOLK5B4D3i', NULL, '2020-10-05 17:13:23', '2020-10-05 17:13:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_packet_id_foreign` (`packet_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotspot`
--
ALTER TABLE `hotspot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packet`
--
ALTER TABLE `packet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_customer_id_foreign` (`customer_id`),
  ADD KEY `payment_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_hotspot_id_foreign` (`hotspot_id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotspot`
--
ALTER TABLE `hotspot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `packet`
--
ALTER TABLE `packet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_packet_id_foreign` FOREIGN KEY (`packet_id`) REFERENCES `packet` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_hotspot_id_foreign` FOREIGN KEY (`hotspot_id`) REFERENCES `hotspot` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
