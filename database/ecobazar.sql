-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2024 at 02:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecobazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT 'admin',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'SuperAdmin', 'admin@admin.com', '01926241906', NULL, '$2y$12$m9NkErvpPTwD51ePDWeuW.goKbvmgNVPTKSMC0tWVaeui7W4hnvpS', NULL, 1, 'w8wOIryEawFzE134Vgm95HcT1k1tnP0VY3a7ujmcNmCTm583lRuRBFho7Zga', '2024-06-23 12:20:31', '2024-08-19 09:51:12'),
(4, 'Sabbir hossain', 'h.sabbir36@yahoo.com', '01926241906', NULL, '$2y$12$TSnoI2rdRhzyUbvtTIjncOL.usSUodWKyXpL01vyhb9urCQeqCA0m', NULL, 1, '50za0lCA47imx3NWcFmOupd3ezBJr0c9qHrlkx4QpZbb2htevQZYTiL45UXO', '2024-06-28 12:13:29', '2024-07-03 11:36:22'),
(5, 'saif hossainnn', 'korbin95@gmail.com', NULL, NULL, '$2y$12$puIoaq.o0Z4NFFBwV.W2de4AAJXXD2I2jGBxzB9rLHCLgCGrkbjJ2', NULL, 1, NULL, '2024-06-28 12:21:08', '2024-07-03 11:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attribute_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Color', 1, NULL, NULL),
(2, 'Size', 1, NULL, NULL),
(3, 'Weight', 1, NULL, NULL),
(4, 'Tag', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attrvalues`
--

CREATE TABLE `attrvalues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(255) DEFAULT NULL,
  `value` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attrvalues`
--

INSERT INTO `attrvalues` (`id`, `attribute_id`, `attribute_name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Color', 'Red', 1, NULL, NULL),
(5, 1, 'Color', 'Sky Blue', 0, '2024-07-07 08:01:35', '2024-07-07 08:01:35'),
(6, 4, 'Tag', 'Vegetables', 1, '2024-07-07 11:43:43', '2024-07-07 11:43:43'),
(7, 4, 'Tag', 'Healthy', 1, '2024-07-07 11:43:57', '2024-07-07 11:43:57'),
(9, 1, 'Color', 'Purple', 1, '2024-07-09 00:02:29', '2024-07-09 00:02:29'),
(10, 1, 'Color', 'Lavender', 1, '2024-07-09 00:02:42', '2024-07-09 00:02:42'),
(11, 3, 'Weight', '1 KG', 1, '2024-07-12 05:24:39', '2024-07-12 05:24:39'),
(12, 3, 'Weight', '3 KG', 1, '2024-07-12 05:24:52', '2024-07-12 05:24:52'),
(13, 4, 'Tag', 'Nutritents', 1, '2024-07-19 03:04:29', '2024-07-19 03:04:29'),
(14, 2, 'Size', 'S', 1, '2024-07-27 08:51:19', '2024-07-27 08:51:19'),
(15, 2, 'Size', 'M', 1, '2024-07-27 08:51:28', '2024-07-27 08:51:28'),
(16, 2, 'Size', 'L', 1, '2024-07-27 08:51:39', '2024-07-27 08:51:39'),
(17, 2, 'Size', 'XL', 1, '2024-07-27 08:51:48', '2024-07-27 08:51:48'),
(18, 4, 'Tag', 'Sharee', 1, '2024-08-03 00:00:42', '2024-08-03 00:00:42'),
(19, 4, 'Tag', 'Dress', 1, '2024-08-03 00:00:52', '2024-08-03 00:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `banner_img` text DEFAULT NULL,
  `banner_link` text DEFAULT NULL,
  `banner_title_1` varchar(255) DEFAULT NULL,
  `banner_title_2` varchar(255) DEFAULT NULL,
  `banner_title_3` varchar(255) DEFAULT NULL,
  `banner_btn_name` varchar(255) DEFAULT NULL,
  `banner_btn_link` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `slug`, `banner_img`, `banner_link`, `banner_title_1`, `banner_title_2`, `banner_title_3`, `banner_btn_name`, `banner_btn_link`, `status`, `created_at`, `updated_at`) VALUES
(3, 'dummy', 'public/backend/assets/images/uploads/banners/1720634127.webp', 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 1, '2024-07-10 11:55:27', '2024-07-10 11:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `basic_infos`
--

CREATE TABLE `basic_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `black_logo` text NOT NULL,
  `light_logo` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_1` varchar(255) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `x_link` varchar(255) DEFAULT NULL,
  `p_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `insta_link` varchar(255) DEFAULT NULL,
  `inside_dhaka_charge` int(11) DEFAULT NULL,
  `outside_dhaka_charge` int(11) DEFAULT NULL,
  `store_location` text DEFAULT NULL,
  `short_desc` text NOT NULL,
  `fb_pixel` text DEFAULT NULL,
  `google_analytics` text DEFAULT NULL,
  `chatbox_script` text DEFAULT NULL,
  `marquee_text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_infos`
--

INSERT INTO `basic_infos` (`id`, `black_logo`, `light_logo`, `email`, `phone_1`, `fb_link`, `x_link`, `p_link`, `youtube_link`, `insta_link`, `inside_dhaka_charge`, `outside_dhaka_charge`, `store_location`, `short_desc`, `fb_pixel`, `google_analytics`, `chatbox_script`, `marquee_text`, `created_at`, `updated_at`) VALUES
(1, 'public/backend/images/logo/1722451112Screenshot_2024-07-31_235407-removebg-preview (1).png', 'public/backend/images/logo/1722452332Screenshot_2024-08-01_005602-removebg-preview (1).png', 'info@ecobazar.com', '(219) 555-0114', 'facebook.com/ecobazar', 'x.com/ecobazar', 'pinterest.com/ecobazar', 'youtube.com', 'insta.com', NULL, NULL, 'Lincoln- 344, Illinois, Chicago, USA', 'Morbi cursus porttitor enim lobortis molestie. Duis gravida turpis dui, eget bibendum magna congue nec', NULL, NULL, NULL, NULL, '2024-06-20 14:09:21', '2024-07-31 12:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_image` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `slug`, `brand_name`, `brand_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'samsung', 'Samsung', 'https://yt3.googleusercontent.com/TtoYXLkyKZu3EDOHAbLjhtpPKwW9eBa0vKacVOmFfq4qzG_Si5KHqzS_u86KO1VIoZJp11scbw=s900-c-k-c0x00ffffff-no-rj', 1, NULL, '2024-07-05 12:14:57'),
(3, 'lg', 'LG', 'public/backend/assets/images/uploads/brand/1720033545.png', 0, '2024-07-03 13:05:45', '2024-07-06 08:32:37'),
(6, 'panasonic', 'Panasonic', 'public/backend/assets/images/uploads/brand/1720503371.avif', 1, '2024-07-08 23:33:43', '2024-07-08 23:36:11'),
(7, 'ncb', 'NCB', 'public/backend/assets/images/uploads/brand/1722533818.jpeg', 1, '2024-08-01 11:36:58', '2024-08-01 11:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('user@gmail.com|::1', 'i:1;', 1725302147),
('user@gmail.com|::1:timer', 'i:1725302147;', 1725302147);

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_img` text DEFAULT NULL,
  `category_img_path` text DEFAULT NULL,
  `front_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active,0=inactive',
  `topCategory_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active,0=inactive',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `category_img`, `category_img_path`, `front_status`, `topCategory_status`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Women\'s & Girls\' Fashion', 'womens-girls-fashion', '75338720.jpg', 'public/backend/images/category/34199001.png', 1, 1, 1, '2024-08-01 10:29:54', '2024-08-04 09:08:03'),
(4, 'Health & Beauty', 'health-beauty', '2409603.jpeg', 'public/backend/images/category/2409603.jpeg', 1, 1, 1, '2024-08-01 10:30:59', '2024-08-01 10:30:59'),
(5, 'Watches, Bags, Jewellery', 'watches-bags-jewellery', '15934357.webp', 'public/backend/images/category/15934357.webp', 1, 1, 1, '2024-08-01 10:34:04', '2024-08-01 10:34:04'),
(6, 'Men\'s & Boys\' Fashion', 'mens-boys-fashion', '54306198.jpg', 'public/backend/images/category/7091697.avif', 1, 1, 1, '2024-08-01 10:43:25', '2024-08-04 09:08:25'),
(7, 'Mother & Baby', 'mother-baby', '45798660.jpeg', 'public/backend/images/category/43992213.jpeg', 1, 1, 1, '2024-08-01 10:45:06', '2024-08-01 10:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attrvalue_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_title` varchar(255) NOT NULL,
  `productRegularPrice` decimal(10,2) DEFAULT NULL,
  `productSalePrice` decimal(10,2) NOT NULL,
  `discount_percentage` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `attrvalue_id`, `product_id`, `color_title`, `productRegularPrice`, `productSalePrice`, `discount_percentage`, `created_at`, `updated_at`) VALUES
(11, 1, 32, 'Red', 5000.00, 4750.00, 5, '2024-08-01 11:45:05', '2024-08-08 16:08:09'),
(12, 9, 32, 'Purple', 5500.00, 5225.00, 5, '2024-08-01 11:45:05', '2024-08-08 16:08:09'),
(13, 10, 32, 'Lavender', 6000.00, 5400.00, 10, '2024-08-01 11:45:05', '2024-08-08 16:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expire_date` date NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `max_used` int(11) DEFAULT 1,
  `total_used` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `code`, `discount`, `amount`, `start_date`, `expire_date`, `quantity`, `max_used`, `total_used`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Eid Special 2024', 'EID2024', 2, NULL, '2024-01-15', '2025-06-05', 50, 4, 0, 1, '2024-09-02 12:21:58', '2024-09-02 13:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address_1` text NOT NULL,
  `address_2` text DEFAULT NULL,
  `state_district` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'Bangladesh',
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `company_name`, `address_1`, `address_2`, `state_district`, `zip`, `country`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Jennifer', 'Yolanda', 'Geoffrey', 'Joel', 'Moses', 'Dhaka', 'Iris', 'Bangladesh', 'Lester', 'Lucius', 1, '2024-08-16 15:20:58', '2024-08-16 15:20:58'),
(9, 'Jennifer', 'Yolanda', 'Geoffrey', 'Joel', 'Moses', 'Dhaka', 'Iris', 'Bangladesh', 'Lester', 'Lucius', 1, '2024-08-16 15:21:42', '2024-08-16 15:21:42'),
(10, 'Amela', 'Mallory', 'Mariko', 'Cedric', 'Remedios', 'Dhaka', 'Amelia', 'Bangladesh', '01318503492', 'Louis@gmail.com', 1, '2024-08-20 14:46:29', '2024-08-20 14:46:29'),
(11, 'Dexter', 'Colorado', 'Elton', 'Ira', 'Hall', 'Dhaka', 'Scott', 'Bangladesh', 'Hasad', 'August', 1, '2024-08-28 14:10:16', '2024-08-28 14:10:16'),
(12, 'Denise', 'Buffy', 'Joseph', 'Alea', 'Colton', 'Dhaka', 'Nell', 'Bangladesh', 'Adria', 'Christian', 1, '2024-08-28 14:11:19', '2024-08-28 14:11:19'),
(37, 'Sybill', 'Lunea', 'Mona', 'Vladimir', 'Paul', 'Dhaka', 'Ann', 'Bangladesh', 'Teegan', 'Thomas', 1, '2024-08-30 08:36:48', '2024-08-30 08:36:48'),
(39, 'Nero', 'Lynn', 'Fitzgerald', 'Ignatius', 'Emerald', 'Dhaka', 'Lucius', 'Bangladesh', 'Nicole', 'Madeline', 1, '2024-08-30 08:40:07', '2024-08-30 08:40:07'),
(42, 'Iris', 'Gail', 'Clio', 'Reese', 'Otto', 'Dhaka', 'Guinevere', 'Bangladesh', 'Magee', 'Quincy', 1, '2024-08-30 08:47:59', '2024-08-30 08:47:59'),
(43, 'Colt', 'Basia', 'Mari', 'Raja', 'Carl', 'Dhaka', 'Emma', 'Bangladesh', 'Baker', 'Ima', 1, '2024-08-30 08:48:45', '2024-08-30 08:48:45'),
(44, 'Callie', 'Kyra', 'Blair', 'Jaime', 'Illiana', 'Dhaka', 'Hermione', 'Bangladesh', 'Nicole', 'Farrah', 1, '2024-08-30 08:56:15', '2024-08-30 08:56:15'),
(45, 'Cora', 'Haviva', 'Blossom', 'Jena', 'Zoe', 'Dhaka', 'Jelani', 'Bangladesh', 'Mara', 'Orla', 1, '2024-08-30 09:11:34', '2024-08-30 09:11:34'),
(46, 'Joelle', 'Wendy', 'Theodore', 'Keane', 'Jael', 'Dhaka', 'Christine', 'Bangladesh', 'September', 'August', 1, '2024-08-30 09:15:47', '2024-08-30 09:15:47'),
(53, 'Price', 'Sharon', 'Axel', 'Eliana', 'Quinn', 'Dhaka', 'Raymond', 'Bangladesh', 'Shea', 'Phyllis', 1, '2024-08-30 14:52:01', '2024-08-30 14:52:01');

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
(10, '0001_01_01_000000_create_users_table', 1),
(11, '0001_01_01_000001_create_cache_table', 1),
(12, '0001_01_01_000002_create_jobs_table', 1),
(13, '2024_06_16_134501_create_admins_table', 1),
(14, '2024_06_17_194041_create_pages_table', 1),
(15, '2024_06_19_130434_create_basic_infos_table', 1),
(17, '2024_06_20_192342_create_subcategories_table', 1),
(18, '2024_06_20_192432_create_brands_table', 1),
(19, '2024_06_21_155212_create_sliders_table', 2),
(20, '2024_06_21_160221_create_banners_table', 3),
(21, '2024_06_21_163121_create_products_table', 4),
(22, '2024_06_21_163158_create_product_details_table', 4),
(23, '2024_06_21_173303_create_tags_table', 5),
(24, '2024_06_21_173846_create_product_tag_table', 5),
(26, '2024_06_21_193623_create_permission_tables', 7),
(27, '2024_07_05_181617_create_attributes_table', 8),
(28, '2024_07_05_181657_create_attrvalues_table', 8),
(29, '2024_06_20_191855_create_categories_table', 9),
(31, '2024_07_13_143822_create_coupons_table', 10),
(32, '2024_06_21_181703_create_reviews_table', 11),
(34, '2024_07_19_100337_create_weights_table', 12),
(35, '2024_07_19_100338_create_sizes_table', 12),
(36, '2024_07_19_100422_create_colors_table', 12),
(37, '2024_08_16_184705_create_customers_table', 13),
(38, '2024_08_16_184709_create_orders_table', 13),
(39, '2024_08_16_184728_create_order_products_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 2),
(8, 'App\\Models\\Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `invoiceID` varchar(255) NOT NULL,
  `tran_id` longtext DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_amount` int(11) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'BDT',
  `shipping_charge` int(11) NOT NULL,
  `tax` int(11) DEFAULT NULL,
  `order_note` text DEFAULT NULL,
  `subtotal` int(11) NOT NULL,
  `discount_amount` varchar(255) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `complete_date` date DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon_id`, `customer_id`, `invoiceID`, `tran_id`, `payment_method`, `payment_amount`, `payment_status`, `order_status`, `currency`, `shipping_charge`, `tax`, `order_note`, `subtotal`, `discount_amount`, `total`, `order_date`, `delivery_date`, `complete_date`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 3, 4, 8, 'BM630216', NULL, 'COD', NULL, 'Pending', 'Pending', 'BDT', 60, NULL, 'Magna ipsum eum elig', 37800, NULL, 370800, '2024-08-16', NULL, NULL, NULL, 'Pending', '2024-08-16 15:20:58', '2024-08-22 14:11:23'),
(8, 3, 4, 10, 'BM249326', NULL, 'COD', NULL, 'Pending', 'Processing', 'BDT', 120, NULL, 'Accusamus aliquid ev', 11050, NULL, 110050, '2024-08-20', NULL, NULL, NULL, 'Pending', '2024-08-20 14:46:29', '2024-08-21 22:43:11'),
(9, 3, 4, 11, 'BM471092', NULL, 'cod', NULL, 'Pending', 'Pending', 'BDT', 120, NULL, 'Quaerat illo officia', 5600, NULL, 50600, '2024-08-28', NULL, NULL, NULL, 'Pending', '2024-08-28 14:10:16', '2024-08-28 14:10:16'),
(10, NULL, NULL, 12, 'BM449527', NULL, 'sslcommerzz', NULL, 'Pending', 'Pending', 'BDT', 120, NULL, 'Beatae qui sequi qui', 5600, NULL, 50600, '2024-08-28', NULL, NULL, NULL, 'Pending', '2024-08-28 14:11:19', '2024-08-28 14:11:19'),
(35, NULL, NULL, 37, 'BM362611', NULL, 'cod', NULL, 'Pending', 'Pending', 'BDT', 60, NULL, 'Voluptate provident', 5600, NULL, 5600, '2024-08-30', NULL, NULL, NULL, 'Pending', '2024-08-30 08:36:48', '2024-08-30 08:36:48'),
(37, NULL, NULL, 39, 'BM610691', NULL, 'cod', NULL, 'Pending', 'Pending', 'BDT', 60, NULL, 'Fuga Dolorem volupt', 5600, NULL, 5600, '2024-08-30', NULL, NULL, NULL, 'Pending', '2024-08-30 08:40:07', '2024-08-30 08:40:07'),
(40, NULL, NULL, 42, 'BM594288', NULL, 'cod', NULL, 'Pending', 'Pending', 'BDT', 120, NULL, 'Officia quo dolore s', 5600, NULL, 5600, '2024-08-30', NULL, NULL, NULL, 'Pending', '2024-08-30 08:47:59', '2024-08-30 08:47:59'),
(41, NULL, NULL, 43, 'BM655011', NULL, 'sslcommerzz', NULL, 'Pending', 'Pending', 'BDT', 60, NULL, 'Fuga Reprehenderit', 5600, NULL, 5600, '2024-08-30', NULL, NULL, NULL, 'Pending', '2024-08-30 08:48:45', '2024-08-30 08:48:45'),
(42, NULL, NULL, 44, 'BM696044', '66d1dd8f5a707', 'sslcommerzz', NULL, 'Pending', 'Pending', 'BDT', 120, NULL, 'Consequuntur est mai', 5600, NULL, 5600, '2024-08-30', NULL, NULL, NULL, 'Pending', '2024-08-30 08:56:15', '2024-08-30 08:56:15'),
(43, NULL, NULL, 45, 'BM539543', '66d1e126ee96b', 'sslcommerzz', NULL, 'Pending', 'Pending', 'BDT', 120, NULL, 'Fugit inventore vol', 5600, NULL, 5600, '2024-08-30', NULL, NULL, NULL, 'Pending', '2024-08-30 09:11:34', '2024-08-30 09:11:34'),
(44, NULL, NULL, 46, 'BM146562', '66d1e2232b7ab', 'sslcommerzz', NULL, 'Paid', 'Processing', 'BDT', 120, NULL, 'Veniam tempora eum', 5600, NULL, 5600, '2024-08-30', NULL, NULL, NULL, 'Pending', '2024-08-30 09:15:47', '2024-08-30 09:34:03'),
(45, NULL, NULL, 53, 'BM952564', '66d230f1e455f', 'cod', NULL, 'Pending', 'Pending', 'BDT', 120, NULL, 'Voluptate aut deseru', 5600, NULL, 5720, '2024-08-30', NULL, NULL, NULL, 'Pending', '2024-08-30 14:52:01', '2024-08-30 14:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_SKU` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `product_discount` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `vendor_id`, `product_name`, `product_SKU`, `quantity`, `product_price`, `size`, `color`, `weight`, `length`, `product_discount`, `total`, `created_at`, `updated_at`) VALUES
(4, 6, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5400, 'M', NULL, NULL, NULL, NULL, 5400, '2024-08-16 15:20:58', '2024-08-16 15:20:58'),
(5, 6, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5400, 'M', 'Purple', NULL, NULL, NULL, 5400, '2024-08-16 15:20:58', '2024-08-16 15:20:58'),
(6, 6, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 5, 5400, 'M', 'Lavender', NULL, NULL, NULL, 27000, '2024-08-16 15:20:58', '2024-08-16 15:20:58'),
(7, 8, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5525, 'L', 'Purple', NULL, NULL, NULL, 5525, '2024-08-20 14:46:29', '2024-08-20 14:46:29'),
(8, 8, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5525, 'L', 'Red', NULL, NULL, NULL, 5525, '2024-08-20 14:46:29', '2024-08-20 14:46:29'),
(9, 9, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5600, 'XL', NULL, NULL, NULL, NULL, 5600, '2024-08-28 14:10:16', '2024-08-28 14:10:16'),
(10, 10, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5600, 'XL', NULL, NULL, NULL, NULL, 5600, '2024-08-28 14:11:19', '2024-08-28 14:11:19'),
(35, 35, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5600, 'XL', NULL, NULL, NULL, NULL, 5600, '2024-08-30 08:36:48', '2024-08-30 08:36:48'),
(37, 37, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5600, 'XL', NULL, NULL, NULL, NULL, 5600, '2024-08-30 08:40:07', '2024-08-30 08:40:07'),
(40, 40, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5600, 'XL', NULL, NULL, NULL, NULL, 5600, '2024-08-30 08:47:59', '2024-08-30 08:47:59'),
(41, 41, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5600, 'XL', NULL, NULL, NULL, NULL, 5600, '2024-08-30 08:48:46', '2024-08-30 08:48:46'),
(42, 42, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5600, 'XL', NULL, NULL, NULL, NULL, 5600, '2024-08-30 08:56:15', '2024-08-30 08:56:15'),
(43, 43, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5600, 'XL', NULL, NULL, NULL, NULL, 5600, '2024-08-30 09:11:34', '2024-08-30 09:11:34'),
(44, 44, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5600, 'XL', NULL, NULL, NULL, NULL, 5600, '2024-08-30 09:15:47', '2024-08-30 09:15:47'),
(45, 45, 32, NULL, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', NULL, 1, 5600, 'XL', NULL, NULL, NULL, NULL, 5600, '2024-08-30 14:52:01', '2024-08-30 14:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `url`, `desc`, `meta_title`, `meta_desc`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', NULL, NULL, 'More Content are coming Soon', NULL, NULL, NULL, 1, NULL, '2024-07-07 08:04:31'),
(2, 'Terms and Condition', NULL, NULL, 'More Content are coming Soon', NULL, NULL, NULL, 1, NULL, NULL),
(3, 'Contact Us', NULL, NULL, 'More Content are coming Soon', NULL, NULL, NULL, 1, NULL, NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(13, 'Create Admin', 'admin', '2024-06-28 11:49:44', '2024-06-28 11:49:44'),
(14, 'View Admin', 'admin', '2024-06-28 11:49:59', '2024-06-28 11:49:59'),
(15, 'Edit Admin', 'admin', '2024-06-28 11:50:08', '2024-06-28 11:50:08'),
(16, 'Delete Admin', 'admin', '2024-06-28 11:50:17', '2024-06-28 11:50:17'),
(17, 'Status Admin', 'admin', '2024-06-29 01:26:59', '2024-06-29 01:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `tag` text DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `isPopular` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active,0=inactive',
  `isHot` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active,0=inactive',
  `isFeatured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active,0=inactive',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `slug`, `color`, `size`, `weight`, `tag`, `short_desc`, `isPopular`, `isHot`, `isFeatured`, `status`, `created_at`, `updated_at`) VALUES
(32, 3, 5, 7, 'Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women', 'tangail-tat-multi-colour-trendy-moslin-jamdani-saree-for-women', NULL, NULL, NULL, '[\"Sharee\",\"Dress\"]', 'The Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women is a traditional Bangladeshi saree known for its intricate handwoven design and vibrant colors. Made from fine muslin fabric, it features elaborate Jamdani patterns that reflect skilled craftsmanship. This saree combines traditional aesthetics with contemporary style, making it suitable for festive occasions and cultural events. Its lightweight and airy texture ensure comfort, while the multi-color design adds a touch of elegance and sophistication.', 1, 1, 1, 1, '2024-08-01 11:45:05', '2024-08-03 00:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `SKU` varchar(255) DEFAULT NULL,
  `regular_price` decimal(8,2) DEFAULT NULL,
  `sale_price` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `long_desc` longtext DEFAULT NULL,
  `initial_stock` int(11) NOT NULL DEFAULT 0,
  `total_qty` int(11) DEFAULT 0,
  `available_qty` int(11) DEFAULT 0,
  `sold_qty` int(11) DEFAULT 0,
  `youtube_embed_link` text DEFAULT NULL,
  `productThumbnail_img` text NOT NULL,
  `product_img` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `SKU`, `regular_price`, `sale_price`, `discount`, `long_desc`, `initial_stock`, `total_qty`, `available_qty`, `sold_qty`, `youtube_embed_link`, `productThumbnail_img`, `product_img`, `meta_title`, `meta_key`, `meta_desc`, `created_at`, `updated_at`) VALUES
(20, 32, 'EB-76815581', NULL, NULL, NULL, '<h3>Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women 2</h3><p>&nbsp;</p><p><strong>Description:</strong></p><p>The Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women is a masterpiece of traditional Bangladeshi weaving. This exquisite saree is crafted from premium quality muslin, a lightweight and breathable fabric that offers unparalleled comfort and elegance. The intricate Jamdani patterns, painstakingly handwoven by skilled artisans, reflect a rich heritage of craftsmanship and artistry.</p><p><strong>Key Features:</strong></p><ul><li><strong>Material:</strong> High-quality muslin</li><li><strong>Design:</strong> Handwoven Jamdani patterns</li><li><strong>Color:</strong> Multi-color palette that adds vibrancy and charm</li><li><strong>Occasion:</strong> Perfect for festive occasions, cultural events, and special gatherings</li><li><strong>Length:</strong> Standard saree length of 5.5 meters</li><li><strong>Blouse Piece:</strong> Includes an unstitched blouse piece</li></ul><p><strong>Details:</strong></p><p><strong>Fabric Quality:</strong> The saree is made from the finest muslin fabric, known for its softness, lightness, and breathability. It drapes beautifully, offering a graceful silhouette.</p><p><strong>Handwoven Jamdani Patterns:</strong> The saree features traditional Jamdani motifs, which are meticulously handwoven by artisans. These intricate designs are a hallmark of Bangladeshi heritage and craftsmanship.</p><p><strong>Multi-Color Design:</strong> The saree showcases a vibrant mix of colors, creating a lively and eye-catching look. The combination of hues adds a modern touch to the traditional design.</p><p><strong>Comfort and Style:</strong> The lightweight muslin fabric ensures comfort, making it easy to wear for extended periods. The saree effortlessly combines traditional elegance with contemporary style.</p><p>&nbsp;</p><p><strong>Images:</strong></p><p><img src=\"http://localhost/Eco%20Bazar/public/backend/assets/images/uploads/products/ckeditor/d036fb6a614fb386469e062f7084fbc7.jpg_750x750.jpg__1722535820.webp\" width=\"750\" height=\"750\"></p><p>&nbsp;</p><p><strong>Care Instructions:</strong></p><p>To maintain the beauty and longevity of the saree, it is recommended to dry clean only. Avoid exposure to direct sunlight for extended periods to prevent color fading.</p><p><strong>Conclusion:</strong></p><p>The Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women is a timeless piece that brings together traditional craftsmanship and modern aesthetics. Its exquisite design, comfortable fabric, and vibrant colors make it a perfect choice for special occasions. Embrace the elegance and heritage of Bangladeshi weaving with this stunning saree.</p>', 20, 20, 20, 0, 'https://www.youtube.com/embed/OzIQ6GWI4NE?si=Xw3JRQ3yFbMHve3C', 'public/backend/assets/images/uploads/products/Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women1722534305.webp', '[\"66abc9a1cd445Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women-1722534305.webp\",\"66abc9a1dc9a7Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women-1722534305.webp\",\"66abc9a1f11eeTangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women-1722534305.webp\"]', NULL, NULL, NULL, '2024-08-01 11:45:05', '2024-08-03 14:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `reviewer_name` varchar(255) NOT NULL DEFAULT 'John Doe',
  `reviewer_img` text DEFAULT NULL,
  `review_text` longtext NOT NULL,
  `rating` varchar(255) NOT NULL,
  `review_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `reviewer_name`, `reviewer_img`, `review_text`, `rating`, `review_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 32, 'dummy', 'public/backend/assets/images/uploads/products/Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women1722534305.webp', 'good product', '4', '0000-00-00', 1, '2024-08-03 20:41:45', '2024-08-03 20:41:45'),
(3, 3, 32, 'sadas', 'public/backend/assets/images/uploads/products/Tangail Tat Multi Colour Trendy Moslin Jamdani Saree for Women1722534305.webp', 'bad', '3', '0000-00-00', 1, '2024-08-03 20:41:45', '2024-08-19 10:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', NULL, NULL),
(7, 'Admin', 'admin', '2024-06-28 11:54:57', '2024-06-28 11:54:57'),
(8, 'Stuff', 'admin', '2024-06-28 11:55:05', '2024-06-28 11:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(13, 1),
(13, 7),
(14, 1),
(14, 7),
(14, 8),
(15, 1),
(15, 7),
(16, 1),
(17, 1);

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
('Bxnsg07hAtRFjqYEfn063HBAZRFdikR58prYJbgi', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiM1BGWXZnUUJXMXkwNkgwaEhLeFpQYkNGUUJsbU01Uk5PUGZhWTFCdyI7czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjkwOiJodHRwOi8vbG9jYWxob3N0L0VjbyUyMEJhemFyL3B1YmxpYy9mcm9udGVuZC9saWIvYm9vdHN0cmFwLTUuMy4wL2Nzcy9ib290c3RyYXAubWluLmNzcy5tYXAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NDoiY2FydCI7YToxOntzOjc6ImRlZmF1bHQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6MzI6IjBjM2UxNDNiNDJlYzVlMDJiNjMxNTA1OTFkMDYwOGUxIjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6MTE6e3M6NToicm93SWQiO3M6MzI6IjBjM2UxNDNiNDJlYzVlMDJiNjMxNTA1OTFkMDYwOGUxIjtzOjI6ImlkIjtzOjI6IjMyIjtzOjM6InF0eSI7czoxOiIxIjtzOjQ6Im5hbWUiO3M6NjI6IlRhbmdhaWwgVGF0IE11bHRpIENvbG91ciBUcmVuZHkgTW9zbGluIEphbWRhbmkgU2FyZWUgZm9yIFdvbWVuIjtzOjU6InByaWNlIjtkOjQ3NTA7czo2OiJ3ZWlnaHQiO2Q6MDtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6Mjp7czo4OiIAKgBpdGVtcyI7YTo1OntzOjU6ImltYWdlIjtzOjE1MjoiaHR0cDovL2xvY2FsaG9zdC9FY28lMjBCYXphci9wdWJsaWMvYmFja2VuZC9hc3NldHMvaW1hZ2VzL3VwbG9hZHMvcHJvZHVjdHMvVGFuZ2FpbCBUYXQgTXVsdGkgQ29sb3VyIFRyZW5keSBNb3NsaW4gSmFtZGFuaSBTYXJlZSBmb3IgV29tZW4xNzIyNTM0MzA1LndlYnAiO3M6NToiY29sb3IiO3M6MzoiUmVkIjtzOjQ6InNpemUiO3M6MToiUyI7czo2OiJ3ZWlnaHQiO3M6NDoiMyBLRyI7czo1OiJzdG9jayI7czoyOiIyMCI7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9czo3OiJ0YXhSYXRlIjtpOjIxO3M6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO047czo0NjoiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGRpc2NvdW50UmF0ZSI7aTowO3M6ODoiaW5zdGFuY2UiO3M6NzoiZGVmYXVsdCI7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjY6ImNvdXBvbiI7YTo0OntzOjQ6ImNvZGUiO3M6NzoiRUlEMjAyNCI7czo4OiJkaXNjb3VudCI7aToyO3M6MTU6ImRpc2NvdW50X2Ftb3VudCI7ZDo5NTtzOjEyOiJ0b3RhbF9hbW91bnQiO2Q6NDY1NTt9fQ==', 1725389671),
('KDD9xyW3KBqf6r9kPKM39LtCOsX489eHWNaynSfm', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWGxueGNUUDhqamZXZjI1MlQ1dGJhdHA1Z0ZmWkNTR0JGVER3b1RUQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3QvRWNvJTIwQmF6YXIvY2hlY2tvdXRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjE6e3M6NzoiZGVmYXVsdCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MTp7czozMjoiNTc5ODY2YmVjMzU2NGQwNmY4ODA4YzM3MzEyZTkwYjMiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjoxMTp7czo1OiJyb3dJZCI7czozMjoiNTc5ODY2YmVjMzU2NGQwNmY4ODA4YzM3MzEyZTkwYjMiO3M6MjoiaWQiO3M6MjoiMzIiO3M6MzoicXR5IjtzOjE6IjEiO3M6NDoibmFtZSI7czo2MjoiVGFuZ2FpbCBUYXQgTXVsdGkgQ29sb3VyIFRyZW5keSBNb3NsaW4gSmFtZGFuaSBTYXJlZSBmb3IgV29tZW4iO3M6NToicHJpY2UiO2Q6NTUyNTtzOjY6IndlaWdodCI7ZDowO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoyOntzOjg6IgAqAGl0ZW1zIjthOjU6e3M6NToiaW1hZ2UiO3M6MTUyOiJodHRwOi8vbG9jYWxob3N0L0VjbyUyMEJhemFyL3B1YmxpYy9iYWNrZW5kL2Fzc2V0cy9pbWFnZXMvdXBsb2Fkcy9wcm9kdWN0cy9UYW5nYWlsIFRhdCBNdWx0aSBDb2xvdXIgVHJlbmR5IE1vc2xpbiBKYW1kYW5pIFNhcmVlIGZvciBXb21lbjE3MjI1MzQzMDUud2VicCI7czo1OiJjb2xvciI7TjtzOjQ6InNpemUiO3M6MToiTCI7czo2OiJ3ZWlnaHQiO047czo1OiJzdG9jayI7czoyOiIyMCI7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9czo3OiJ0YXhSYXRlIjtpOjIxO3M6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO047czo0NjoiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGRpc2NvdW50UmF0ZSI7aTowO3M6ODoiaW5zdGFuY2UiO3M6NzoiZGVmYXVsdCI7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NjoiY291cG9uIjthOjI6e3M6NDoiY29kZSI7czo3OiJFSUQyMDI0IjtzOjg6ImRpc2NvdW50IjtpOjI7fX0=', 1725392566),
('VnwAB40NUM9KsS9mPNaShZBpUuusq0cpxZ4IERHZ', 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidjhjRVZLMVFPYnZobGRhRjdDWU1OZTdKNGtaSGtOSDhqbDFSUVZ6biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTU6Imh0dHA6Ly9sb2NhbGhvc3QvRWNvJTIwQmF6YXIvcHVibGljL2Zyb250ZW5kL2xpYi9ib290c3RyYXAtNS4zLjAvanMvYm9vdHN0cmFwLmJ1bmRsZS5taW4uanMubWFwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjE6e3M6NzoiZGVmYXVsdCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MTp7czozMjoiZWYzZDhlZDBhM2FlZjAzNzI4MzY1ZDc2NzlmNGRmMmEiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjoxMTp7czo1OiJyb3dJZCI7czozMjoiZWYzZDhlZDBhM2FlZjAzNzI4MzY1ZDc2NzlmNGRmMmEiO3M6MjoiaWQiO3M6MjoiMzIiO3M6MzoicXR5IjtpOjI7czo0OiJuYW1lIjtzOjYyOiJUYW5nYWlsIFRhdCBNdWx0aSBDb2xvdXIgVHJlbmR5IE1vc2xpbiBKYW1kYW5pIFNhcmVlIGZvciBXb21lbiI7czo1OiJwcmljZSI7ZDo1NjAwO3M6Njoid2VpZ2h0IjtkOjA7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjI6e3M6ODoiACoAaXRlbXMiO2E6NTp7czo1OiJpbWFnZSI7czoxNTI6Imh0dHA6Ly9sb2NhbGhvc3QvRWNvJTIwQmF6YXIvcHVibGljL2JhY2tlbmQvYXNzZXRzL2ltYWdlcy91cGxvYWRzL3Byb2R1Y3RzL1RhbmdhaWwgVGF0IE11bHRpIENvbG91ciBUcmVuZHkgTW9zbGluIEphbWRhbmkgU2FyZWUgZm9yIFdvbWVuMTcyMjUzNDMwNS53ZWJwIjtzOjU6ImNvbG9yIjtOO3M6NDoic2l6ZSI7czoyOiJYTCI7czo2OiJ3ZWlnaHQiO047czo1OiJzdG9jayI7czoyOiIyMCI7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9czo3OiJ0YXhSYXRlIjtpOjIxO3M6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO047czo0NjoiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGRpc2NvdW50UmF0ZSI7aTowO3M6ODoiaW5zdGFuY2UiO3M6NzoiZGVmYXVsdCI7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NjoiY291cG9uIjthOjI6e3M6NDoiY29kZSI7czo3OiJFSUQyMDI0IjtzOjg6ImRpc2NvdW50IjtpOjI7fX0=', 1725391961);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attrvalue_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_title` varchar(255) NOT NULL,
  `productRegularPrice` decimal(10,2) DEFAULT NULL,
  `productSalePrice` decimal(10,2) NOT NULL,
  `discount_percentage` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `attrvalue_id`, `product_id`, `size_title`, `productRegularPrice`, `productSalePrice`, `discount_percentage`, `created_at`, `updated_at`) VALUES
(9, 14, 32, 'S', 5000.00, 4750.00, 5, '2024-08-08 16:05:35', '2024-08-08 16:08:09'),
(10, 15, 32, 'M', 6000.00, 5400.00, 10, '2024-08-08 16:05:35', '2024-08-08 16:08:09'),
(11, 16, 32, 'L', 6500.00, 5525.00, 15, '2024-08-08 16:05:35', '2024-08-08 16:08:09'),
(12, 17, 32, 'XL', 7000.00, 5600.00, 20, '2024-08-08 16:05:35', '2024-08-08 16:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `slider_img` text DEFAULT NULL,
  `slider_title_1` varchar(255) DEFAULT NULL,
  `slider_title_2` varchar(255) DEFAULT NULL,
  `slider_title_3` varchar(255) DEFAULT NULL,
  `slider_text` text DEFAULT NULL,
  `slider_btn_name` varchar(255) DEFAULT NULL,
  `slider_btn_link` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slug`, `slider_img`, `slider_title_1`, `slider_title_2`, `slider_title_3`, `slider_text`, `slider_btn_name`, `slider_btn_link`, `status`, `created_at`, `updated_at`) VALUES
(5, 'asd', 'public/backend/assets/images/uploads/sliders/1722781713.webp', 'Welcome to Uthao Bazar', 'Womens and Girls Fashion', 'Sale up to <span>30% OFF</span>', 'Free shipping on all your order. we deliver, you enjoy', 'Shop Now', '#', 1, '2024-07-10 10:00:23', '2024-08-04 08:28:33'),
(11, 'welcome-to-uthao-bazar', 'public/backend/assets/images/uploads/sliders/1722784582.webp', 'Welcome to Uthao Bazar', 'Mothers and Baby', 'Sale up to <span>20% OFF</span>', 'Free Shipping on all of Our Featured Product', 'Shop Now', '#', 1, '2024-08-04 09:14:23', '2024-08-04 09:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_img` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcategory_name`, `slug`, `category_id`, `subcategory_img`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Traditional Wear', 'traditional-wear', 3, 'public/backend/images/subCategory/84909767.webp', 1, '2024-08-01 11:29:50', '2024-08-01 11:29:50'),
(6, 'Muslim Wear', 'muslim-wear', 3, 'public/backend/images/subCategory/80039571.jpg', 1, '2024-08-01 11:34:17', '2024-08-01 11:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `tag_icon` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'User', 'user@gmail.com', NULL, NULL, '$2y$12$3OFmzntUctg3HSc429u0/ukNorVo9usNTTUo/IJAisvgpxN0L4/lq', 1, 'b7UH4WgNaCpF5TzIHmsZpLLSyyaK1ZOUnl25sfqcIhdtkJMWGwetku5iV2w1', '2024-08-04 05:25:39', '2024-08-04 05:25:39'),
(3, 'Sabbir hossain', 'h.sabbir36@yahoo.com', NULL, NULL, '$2y$12$RklASNe.0e663yT20VMhQ./Ow.JQk7NF1rPtfKa7MPk11beAJiY9.', 1, NULL, '2024-08-16 12:36:29', '2024-09-02 12:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attrvalue_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `weight_title` varchar(255) NOT NULL,
  `productRegularPrice` decimal(10,2) DEFAULT NULL,
  `productSalePrice` decimal(10,2) NOT NULL,
  `discount_percentage` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `attrvalue_id`, `product_id`, `weight_title`, `productRegularPrice`, `productSalePrice`, `discount_percentage`, `created_at`, `updated_at`) VALUES
(9, 11, 32, '1 KG', 6000.00, 5100.00, 15, '2024-08-08 16:08:09', '2024-08-08 16:08:09'),
(10, 12, 32, '3 KG', 6500.00, 5200.00, 20, '2024-08-08 16:08:09', '2024-08-08 16:08:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attrvalues`
--
ALTER TABLE `attrvalues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attrvalues_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`);

--
-- Indexes for table `basic_infos`
--
ALTER TABLE `basic_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colors_attrvalue_id_foreign` (`attrvalue_id`),
  ADD KEY `colors_product_id_foreign` (`product_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tag_product_id_foreign` (`product_id`),
  ADD KEY `product_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizes_attrvalue_id_foreign` (`attrvalue_id`),
  ADD KEY `sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_slug_unique` (`slug`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_slug_unique` (`slug`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weights_attrvalue_id_foreign` (`attrvalue_id`),
  ADD KEY `weights_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attrvalues`
--
ALTER TABLE `attrvalues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `basic_infos`
--
ALTER TABLE `basic_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_tag`
--
ALTER TABLE `product_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attrvalues`
--
ALTER TABLE `attrvalues`
  ADD CONSTRAINT `attrvalues_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_attrvalue_id_foreign` FOREIGN KEY (`attrvalue_id`) REFERENCES `attrvalues` (`id`),
  ADD CONSTRAINT `colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_attrvalue_id_foreign` FOREIGN KEY (`attrvalue_id`) REFERENCES `attrvalues` (`id`),
  ADD CONSTRAINT `sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `weights`
--
ALTER TABLE `weights`
  ADD CONSTRAINT `weights_attrvalue_id_foreign` FOREIGN KEY (`attrvalue_id`) REFERENCES `attrvalues` (`id`),
  ADD CONSTRAINT `weights_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
