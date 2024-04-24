-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 12:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batchcode` varchar(255) NOT NULL,
  `manufacturedDate` varchar(255) NOT NULL,
  `batchqty` int(11) NOT NULL,
  `batchremark` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `batchcode`, `manufacturedDate`, `batchqty`, `batchremark`, `uuid`, `created_at`, `updated_at`) VALUES
(1, 'B001', '2022', 0, 'best', '661364b49070b', '2024-04-07 20:59:56', '2024-04-07 20:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customertitle` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customertitle`, `firstname`, `lastname`, `dob`, `phone`, `email`, `password`, `uuid`, `created_at`, `updated_at`) VALUES
(1, '1', 'Maung', 'Win', '2024-04-01', '0987654321', 'mw@gmail.com', '$2y$10$RilVkkyXXvtP9SUNwp1lYe0QkwM6ofOlIRfu4wiJU.AbCdh.awjZ.', '660aa5530ea11', '2024-04-01 05:45:15', '2024-04-01 05:45:15'),
(2, '1', 'Kyaw', 'Kyaw', '2023-12-06', '0998765543333', 'kyaw@gmail.com', '$2y$10$oLP7sMdEjko4WXwcbfMWberd.sOrXASzsJrhPvrjAYNgIa1inaoU2', '6628e11187dfa', '2024-04-24 04:08:09', '2024-04-24 04:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer_titles`
--

CREATE TABLE `customer_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_titles`
--

INSERT INTO `customer_titles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Mr', '2024-04-01 05:28:43', '2024-04-01 05:28:43'),
(2, 'Mrs', '2024-04-01 05:28:51', '2024-04-01 05:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `custom_orders`
--

CREATE TABLE `custom_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_uuid` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `shoulder` varchar(255) NOT NULL,
  `bust` varchar(255) NOT NULL,
  `waist` varchar(255) NOT NULL,
  `hips` varchar(255) NOT NULL,
  `thigh` varchar(255) NOT NULL,
  `leg_opening` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_orders`
--

INSERT INTO `custom_orders` (`id`, `customer_uuid`, `height`, `weight`, `shoulder`, `bust`, `waist`, `hips`, `thigh`, `leg_opening`, `phone`, `description`, `status`, `uuid`, `created_at`, `updated_at`) VALUES
(1, '660aa5530ea11', '5.4', '125', '34', '33', '34', '25', '28', '20', '0978654321', '<p>Color : <strong>Yellow</strong></p>', 'Approved', '6623ff31e884e', '2024-04-20 11:15:21', '2024-04-23 07:15:02'),
(2, '660aa5530ea11', '12', '12', '12', '12', '12', '21', '21', '21', '091636363900', '<p>jndjsdnsd cjdsvnsdj</p>', 'Approved', '6627341e0abef', '2024-04-22 21:37:58', '2024-04-23 07:15:07'),
(3, '660aa5530ea11', '14', '12', '34', '34', '21', '56', '36', '32', '0973728324', '<p>mdsknsdjnsd</p>', 'Cancel', '6627be41acd52', '2024-04-23 07:27:21', '2024-04-23 07:31:45');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_12_041058_create_roles_table', 1),
(8, '2024_03_28_153858_create_customers_table', 2),
(9, '2024_03_28_154717_create_customer_titles_table', 2),
(13, '2024_03_30_061026_create_batches_table', 3),
(14, '2024_03_30_094505_create_products_table', 3),
(15, '2024_04_04_163705_add_column_to_products', 3),
(16, '2024_04_11_050937_create_orders_table', 4),
(17, '2024_04_11_052117_create_order_details_table', 4),
(20, '2024_04_20_114923_create_custom_orders_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_uuid` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_uuid`, `total_price`, `order_address`, `payment_type`, `uuid`, `created_at`, `updated_at`) VALUES
(1, '660aa5530ea11', 132000, 'Yangon', 'cod', '661c9e2987bd3', '2024-04-14 20:55:29', '2024-04-14 20:55:29'),
(2, '660aa5530ea11', 67000, 'Yangon', 'cod', '661ca0d7a0122', '2024-04-14 21:06:55', '2024-04-14 21:06:55'),
(3, '660aa5530ea11', 104000, 'Yangon', 'cod', '661ca4399e121', '2024-04-14 21:21:21', '2024-04-14 21:21:21'),
(4, '660aa5530ea11', 41000, 'Mandalay', 'cod', '66212c4eee431', '2024-04-18 07:51:02', '2024-04-18 07:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_uuid`, `product_uuid`, `order_qty`, `price`, `uuid`, `created_at`, `updated_at`) VALUES
(1, '661c9e2987bd3', '6613695c1196d', 3, 105000, '661c9e298aab6', '2024-04-14 20:55:29', '2024-04-14 20:55:29'),
(2, '661ca0d7a0122', '661364f469a51', 2, 40000, '661ca0d7a3d22', '2024-04-14 21:06:55', '2024-04-14 21:06:55'),
(3, '661ca4399e121', '66136a54a52ba', 1, 34000, '661ca4399ed1d', '2024-04-14 21:21:21', '2024-04-14 21:21:21'),
(4, '661ca4399e121', '6613695c1196d', 2, 70000, '661ca439a0321', '2024-04-14 21:21:21', '2024-04-14 21:21:21'),
(5, '66212c4eee431', '6620aaf6b8b4d', 1, 23000, '66212c4ef0fad', '2024-04-18 07:51:02', '2024-04-18 07:51:02'),
(6, '66212c4eee431', '6621138c2889f', 1, 18000, '66212c4ef26e9', '2024-04-18 07:51:02', '2024-04-18 07:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `item_code` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `item_price` int(11) NOT NULL,
  `batchcode` varchar(255) NOT NULL,
  `batchuuid` varchar(255) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_code`, `item_name`, `description`, `item_price`, `batchcode`, `batchuuid`, `item_qty`, `item_image`, `uuid`, `created_at`, `updated_at`) VALUES
(1, 'P0001', 'Shirt', '<p>Color : <strong>Blue</strong>,</p>\r\n<p>Size : <strong>XL</strong></p>', 20000, 'B001', '661364b49070b', 18, '1713414884.webp', '661364f469a51', '2024-04-07 21:01:00', '2024-04-17 22:04:44'),
(2, 'P0002', 'Red Hoddie', '<p>Color : <strong>Red</strong>,</p>\r\n<p>Size : <strong>XL</strong></p>', 35000, 'B001', '661364b49070b', 10, '1712548187.webp', '6613695c1196d', '2024-04-07 21:19:48', '2024-04-14 21:21:21'),
(3, 'P0003', 'Blue Shirt', '<p>Color : <strong>Blue</strong>,</p>\r\n<p>Size : <strong>X</strong></p>', 27000, 'B001', '661364b49070b', 9, '1713418140.webp', '66136986d71e4', '2024-04-07 21:20:30', '2024-04-17 22:59:00'),
(4, 'P0004', 'Brown Pant', '<p>Color : <strong>Brown</strong>,</p>\r\n<p>Size : <strong>36</strong></p>', 34000, 'B001', '661364b49070b', 9, '1713418740.webp', '66136a54a52ba', '2024-04-07 21:23:56', '2024-04-17 23:09:00'),
(5, 'P0005', 'Hoddie', '<p>Color : <strong>GREY,</strong></p>\r\n<p>Size : <strong>Free</strong><br></p>', 23000, 'B001', '661364b49070b', 1, '1713416950.webp', '6620aaf6b8b4d', '2024-04-17 22:39:10', '2024-04-18 07:51:02'),
(6, 'P0006', 'Green Pant', '<p>Color : <strong>Green,</strong></p>\r\n<p>Size <strong>: 33</strong></p>', 18000, 'B001', '661364b49070b', 1, '1713443724.webp', '6621138c2889f', '2024-04-18 06:05:24', '2024-04-18 07:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rolename`, `uuid`, `created_at`, `updated_at`) VALUES
(1, 'Administration', '6601862f72377', '2024-03-25 07:41:59', '2024-03-25 07:41:59');

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
  `role_uuid` varchar(255) DEFAULT NULL,
  `rolename` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_uuid`, `rolename`, `uuid`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2024-03-25 07:42:35', '$2y$10$4wQgJG5492NgMH6P3bBBoOV9CJK1QwvC./0la0Z0w53yLrZgpuESu', '6601862f72377', 'Administration', '6601865359361', 'ZRkGP81ayei3KC6IkEI0YUiHOH6YdtxabuMykxMNFbI4JsLlphLhGJIdK9yd', '2024-03-25 07:42:35', '2024-03-25 07:42:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `batches_batchcode_unique` (`batchcode`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_titles`
--
ALTER TABLE `customer_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_orders`
--
ALTER TABLE `custom_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_titles`
--
ALTER TABLE `customer_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_orders`
--
ALTER TABLE `custom_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
