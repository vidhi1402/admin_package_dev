-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2017 at 05:43 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aii_common_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `aii_contact_us_master`
--

CREATE TABLE IF NOT EXISTS `aii_contact_us_master` (
  `id_contact` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_gallery_assign_categories`
--

CREATE TABLE IF NOT EXISTS `aii_gallery_assign_categories` (
  `id_gallery_assign_category` int(10) unsigned NOT NULL,
  `fk_id_gallery` int(10) unsigned NOT NULL,
  `fk_id_gallery_category` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_gallery_categories`
--

CREATE TABLE IF NOT EXISTS `aii_gallery_categories` (
  `id_gallery_category` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aii_gallery_categories`
--

INSERT INTO `aii_gallery_categories` (`id_gallery_category`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cate1', 'Cat 1', 1, '2017-02-03 07:57:16', '2017-02-03 07:57:16'),
(2, 'Cat 2', 'Cat 2', 0, '2017-02-03 07:57:25', '2017-02-03 07:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `aii_gallery_imgs`
--

CREATE TABLE IF NOT EXISTS `aii_gallery_imgs` (
  `id_gallery_image` int(10) unsigned NOT NULL,
  `fk_id_gallery` int(10) unsigned NOT NULL,
  `gallery_slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_gallery_masters`
--

CREATE TABLE IF NOT EXISTS `aii_gallery_masters` (
  `id_gallery` int(10) unsigned NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `download_link` text COLLATE utf8_unicode_ci NOT NULL,
  `brochure_link` text COLLATE utf8_unicode_ci NOT NULL,
  `sort_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brief_description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_gallery_sub_categories`
--

CREATE TABLE IF NOT EXISTS `aii_gallery_sub_categories` (
  `id_gallery_sub_category` int(10) unsigned NOT NULL,
  `fk_id_gallery_category` int(10) unsigned NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_product_assign_category`
--

CREATE TABLE IF NOT EXISTS `aii_product_assign_category` (
  `id_product_assign_category` int(10) unsigned NOT NULL,
  `fk_id_product` int(10) unsigned NOT NULL,
  `fk_id_product_category` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_product_assign_sub_category`
--

CREATE TABLE IF NOT EXISTS `aii_product_assign_sub_category` (
  `id_product_assign_sub_category` int(10) unsigned NOT NULL,
  `fk_id_product` int(10) unsigned NOT NULL,
  `fk_id_product_category` int(10) unsigned NOT NULL,
  `fk_id_sub_category` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_product_category_master`
--

CREATE TABLE IF NOT EXISTS `aii_product_category_master` (
  `id_product_category` int(10) unsigned NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_product_image`
--

CREATE TABLE IF NOT EXISTS `aii_product_image` (
  `id_product_image` int(10) unsigned NOT NULL,
  `fk_id_product` int(10) unsigned NOT NULL,
  `product_slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_product_master`
--

CREATE TABLE IF NOT EXISTS `aii_product_master` (
  `id_product` int(10) unsigned NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sort_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brief_description` text COLLATE utf8_unicode_ci NOT NULL,
  `download_link` text COLLATE utf8_unicode_ci NOT NULL,
  `brochure_link` text COLLATE utf8_unicode_ci NOT NULL,
  `product_desc_url` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_product_sub_category`
--

CREATE TABLE IF NOT EXISTS `aii_product_sub_category` (
  `id_product_sub_category` int(10) unsigned NOT NULL,
  `fk_id_product_category` int(10) unsigned NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_service_assign_category`
--

CREATE TABLE IF NOT EXISTS `aii_service_assign_category` (
  `id_service_assign_category` int(10) unsigned NOT NULL,
  `fk_id_service` int(10) unsigned NOT NULL,
  `fk_id_service_category` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_service_assign_sub_category`
--

CREATE TABLE IF NOT EXISTS `aii_service_assign_sub_category` (
  `id_service_assign_sub_category` int(10) unsigned NOT NULL,
  `fk_id_service` int(10) unsigned NOT NULL,
  `fk_id_service_category` int(10) unsigned NOT NULL,
  `fk_id_sub_category` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_service_category_master`
--

CREATE TABLE IF NOT EXISTS `aii_service_category_master` (
  `id_service_category` int(10) unsigned NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_service_image`
--

CREATE TABLE IF NOT EXISTS `aii_service_image` (
  `id_service_image` int(10) unsigned NOT NULL,
  `fk_id_service` int(10) unsigned NOT NULL,
  `service_slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_service_master`
--

CREATE TABLE IF NOT EXISTS `aii_service_master` (
  `id_service` int(10) unsigned NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sort_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brief_description` text COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_service_sub_category`
--

CREATE TABLE IF NOT EXISTS `aii_service_sub_category` (
  `id_service_sub_category` int(10) unsigned NOT NULL,
  `fk_id_service_category` int(10) unsigned NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_team_member_master`
--

CREATE TABLE IF NOT EXISTS `aii_team_member_master` (
  `id_member` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_url` text COLLATE utf8_unicode_ci NOT NULL,
  `twitter_url` text COLLATE utf8_unicode_ci NOT NULL,
  `google_plus_url` text COLLATE utf8_unicode_ci NOT NULL,
  `linked_in_url` text COLLATE utf8_unicode_ci NOT NULL,
  `website` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL,
  `display_index` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aii_testimonial_master`
--

CREATE TABLE IF NOT EXISTS `aii_testimonial_master` (
  `id_testimonial` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL,
  `display_index` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_assign_sub_categories`
--

CREATE TABLE IF NOT EXISTS `gallery_assign_sub_categories` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_12_26_121727_create_table_aii_service_master', 1),
(4, '2016_12_26_121835_create_table_aii_service_category_master', 1),
(5, '2016_12_26_122000_create_table_aii_product_master', 1),
(6, '2016_12_26_122001_create_table_aii_product_category_master', 1),
(7, '2016_12_26_122310_create_table_aii_contact_us_master', 1),
(8, '2016_12_26_124508_create_table_aii_product_image', 1),
(9, '2016_12_26_124531_create_table_aii_service_image', 1),
(10, '2016_12_27_063020_create_table_aii_service_sub_category', 1),
(11, '2016_12_27_063041_create_table_aii_product_sub_category', 1),
(12, '2016_12_27_063556_create_table_aii_service_assign_category', 1),
(13, '2016_12_27_063637_create_table_aii_service_assign_sub_category', 1),
(14, '2016_12_27_063706_create_table_aii_product_assign_category', 1),
(15, '2016_12_27_063731_create_table_aii_product_assign_sub_category', 1),
(16, '2017_01_17_123323_cerate_table_aii_team_member_master', 1),
(17, '2017_01_17_123624_cerate_table_aii_testimonial_master', 1),
(18, '2017_02_03_062158_create_gallery_categories_table', 1),
(19, '2017_02_03_070911_create_gallery_sub_categories_table', 2),
(20, '2017_02_03_094321_create_gallery_masters_table', 2),
(21, '2017_02_03_094322_create_gallery_assign_categories_table', 2),
(22, '2017_02_03_095831_create_gallery_assign_sub_categories_table', 2),
(23, '2017_02_03_100426_create_gallery_imgs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aii_contact_us_master`
--
ALTER TABLE `aii_contact_us_master`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `aii_gallery_assign_categories`
--
ALTER TABLE `aii_gallery_assign_categories`
  ADD PRIMARY KEY (`id_gallery_assign_category`), ADD KEY `aii_gallery_assign_categories_fk_id_gallery_foreign` (`fk_id_gallery`), ADD KEY `aii_gallery_assign_categories_fk_id_gallery_category_foreign` (`fk_id_gallery_category`);

--
-- Indexes for table `aii_gallery_categories`
--
ALTER TABLE `aii_gallery_categories`
  ADD PRIMARY KEY (`id_gallery_category`);

--
-- Indexes for table `aii_gallery_imgs`
--
ALTER TABLE `aii_gallery_imgs`
  ADD PRIMARY KEY (`id_gallery_image`), ADD KEY `aii_gallery_imgs_fk_id_gallery_foreign` (`fk_id_gallery`);

--
-- Indexes for table `aii_gallery_masters`
--
ALTER TABLE `aii_gallery_masters`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `aii_gallery_sub_categories`
--
ALTER TABLE `aii_gallery_sub_categories`
  ADD PRIMARY KEY (`id_gallery_sub_category`);

--
-- Indexes for table `aii_product_assign_category`
--
ALTER TABLE `aii_product_assign_category`
  ADD PRIMARY KEY (`id_product_assign_category`), ADD KEY `aii_product_assign_category_fk_id_product_foreign` (`fk_id_product`), ADD KEY `aii_product_assign_category_fk_id_product_category_foreign` (`fk_id_product_category`);

--
-- Indexes for table `aii_product_assign_sub_category`
--
ALTER TABLE `aii_product_assign_sub_category`
  ADD PRIMARY KEY (`id_product_assign_sub_category`), ADD KEY `aii_product_assign_sub_category_fk_id_product_foreign` (`fk_id_product`), ADD KEY `aii_product_assign_sub_category_fk_id_product_category_foreign` (`fk_id_product_category`), ADD KEY `aii_product_assign_sub_category_fk_id_sub_category_foreign` (`fk_id_sub_category`);

--
-- Indexes for table `aii_product_category_master`
--
ALTER TABLE `aii_product_category_master`
  ADD PRIMARY KEY (`id_product_category`);

--
-- Indexes for table `aii_product_image`
--
ALTER TABLE `aii_product_image`
  ADD PRIMARY KEY (`id_product_image`), ADD KEY `aii_product_image_fk_id_product_foreign` (`fk_id_product`);

--
-- Indexes for table `aii_product_master`
--
ALTER TABLE `aii_product_master`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `aii_product_sub_category`
--
ALTER TABLE `aii_product_sub_category`
  ADD PRIMARY KEY (`id_product_sub_category`), ADD KEY `aii_product_sub_category_fk_id_product_category_foreign` (`fk_id_product_category`);

--
-- Indexes for table `aii_service_assign_category`
--
ALTER TABLE `aii_service_assign_category`
  ADD PRIMARY KEY (`id_service_assign_category`), ADD KEY `aii_service_assign_category_fk_id_service_foreign` (`fk_id_service`), ADD KEY `aii_service_assign_category_fk_id_service_category_foreign` (`fk_id_service_category`);

--
-- Indexes for table `aii_service_assign_sub_category`
--
ALTER TABLE `aii_service_assign_sub_category`
  ADD PRIMARY KEY (`id_service_assign_sub_category`), ADD KEY `aii_service_assign_sub_category_fk_id_service_foreign` (`fk_id_service`), ADD KEY `aii_service_assign_sub_category_fk_id_service_category_foreign` (`fk_id_service_category`), ADD KEY `aii_service_assign_sub_category_fk_id_sub_category_foreign` (`fk_id_sub_category`);

--
-- Indexes for table `aii_service_category_master`
--
ALTER TABLE `aii_service_category_master`
  ADD PRIMARY KEY (`id_service_category`);

--
-- Indexes for table `aii_service_image`
--
ALTER TABLE `aii_service_image`
  ADD PRIMARY KEY (`id_service_image`), ADD KEY `aii_service_image_fk_id_service_foreign` (`fk_id_service`);

--
-- Indexes for table `aii_service_master`
--
ALTER TABLE `aii_service_master`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `aii_service_sub_category`
--
ALTER TABLE `aii_service_sub_category`
  ADD PRIMARY KEY (`id_service_sub_category`), ADD KEY `aii_service_sub_category_fk_id_service_category_foreign` (`fk_id_service_category`);

--
-- Indexes for table `aii_team_member_master`
--
ALTER TABLE `aii_team_member_master`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `aii_testimonial_master`
--
ALTER TABLE `aii_testimonial_master`
  ADD PRIMARY KEY (`id_testimonial`);

--
-- Indexes for table `gallery_assign_sub_categories`
--
ALTER TABLE `gallery_assign_sub_categories`
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
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aii_contact_us_master`
--
ALTER TABLE `aii_contact_us_master`
  MODIFY `id_contact` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_gallery_assign_categories`
--
ALTER TABLE `aii_gallery_assign_categories`
  MODIFY `id_gallery_assign_category` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_gallery_categories`
--
ALTER TABLE `aii_gallery_categories`
  MODIFY `id_gallery_category` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `aii_gallery_imgs`
--
ALTER TABLE `aii_gallery_imgs`
  MODIFY `id_gallery_image` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_gallery_masters`
--
ALTER TABLE `aii_gallery_masters`
  MODIFY `id_gallery` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_gallery_sub_categories`
--
ALTER TABLE `aii_gallery_sub_categories`
  MODIFY `id_gallery_sub_category` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_product_assign_category`
--
ALTER TABLE `aii_product_assign_category`
  MODIFY `id_product_assign_category` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_product_assign_sub_category`
--
ALTER TABLE `aii_product_assign_sub_category`
  MODIFY `id_product_assign_sub_category` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_product_category_master`
--
ALTER TABLE `aii_product_category_master`
  MODIFY `id_product_category` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_product_image`
--
ALTER TABLE `aii_product_image`
  MODIFY `id_product_image` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_product_master`
--
ALTER TABLE `aii_product_master`
  MODIFY `id_product` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_product_sub_category`
--
ALTER TABLE `aii_product_sub_category`
  MODIFY `id_product_sub_category` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_service_assign_category`
--
ALTER TABLE `aii_service_assign_category`
  MODIFY `id_service_assign_category` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_service_assign_sub_category`
--
ALTER TABLE `aii_service_assign_sub_category`
  MODIFY `id_service_assign_sub_category` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_service_category_master`
--
ALTER TABLE `aii_service_category_master`
  MODIFY `id_service_category` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_service_image`
--
ALTER TABLE `aii_service_image`
  MODIFY `id_service_image` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_service_master`
--
ALTER TABLE `aii_service_master`
  MODIFY `id_service` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_service_sub_category`
--
ALTER TABLE `aii_service_sub_category`
  MODIFY `id_service_sub_category` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_team_member_master`
--
ALTER TABLE `aii_team_member_master`
  MODIFY `id_member` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aii_testimonial_master`
--
ALTER TABLE `aii_testimonial_master`
  MODIFY `id_testimonial` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery_assign_sub_categories`
--
ALTER TABLE `gallery_assign_sub_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aii_gallery_assign_categories`
--
ALTER TABLE `aii_gallery_assign_categories`
ADD CONSTRAINT `aii_gallery_assign_categories_fk_id_gallery_category_foreign` FOREIGN KEY (`fk_id_gallery_category`) REFERENCES `aii_gallery_categories` (`id_gallery_category`) ON DELETE CASCADE,
ADD CONSTRAINT `aii_gallery_assign_categories_fk_id_gallery_foreign` FOREIGN KEY (`fk_id_gallery`) REFERENCES `aii_gallery_masters` (`id_gallery`) ON DELETE CASCADE;

--
-- Constraints for table `aii_gallery_imgs`
--
ALTER TABLE `aii_gallery_imgs`
ADD CONSTRAINT `aii_gallery_imgs_fk_id_gallery_foreign` FOREIGN KEY (`fk_id_gallery`) REFERENCES `aii_gallery_masters` (`id_gallery`) ON DELETE CASCADE;

--
-- Constraints for table `aii_product_assign_category`
--
ALTER TABLE `aii_product_assign_category`
ADD CONSTRAINT `aii_product_assign_category_fk_id_product_category_foreign` FOREIGN KEY (`fk_id_product_category`) REFERENCES `aii_product_category_master` (`id_product_category`) ON DELETE CASCADE,
ADD CONSTRAINT `aii_product_assign_category_fk_id_product_foreign` FOREIGN KEY (`fk_id_product`) REFERENCES `aii_product_master` (`id_product`) ON DELETE CASCADE;

--
-- Constraints for table `aii_product_assign_sub_category`
--
ALTER TABLE `aii_product_assign_sub_category`
ADD CONSTRAINT `aii_product_assign_sub_category_fk_id_product_category_foreign` FOREIGN KEY (`fk_id_product_category`) REFERENCES `aii_product_category_master` (`id_product_category`) ON DELETE CASCADE,
ADD CONSTRAINT `aii_product_assign_sub_category_fk_id_product_foreign` FOREIGN KEY (`fk_id_product`) REFERENCES `aii_product_master` (`id_product`) ON DELETE CASCADE,
ADD CONSTRAINT `aii_product_assign_sub_category_fk_id_sub_category_foreign` FOREIGN KEY (`fk_id_sub_category`) REFERENCES `aii_product_sub_category` (`id_product_sub_category`) ON DELETE CASCADE;

--
-- Constraints for table `aii_product_image`
--
ALTER TABLE `aii_product_image`
ADD CONSTRAINT `aii_product_image_fk_id_product_foreign` FOREIGN KEY (`fk_id_product`) REFERENCES `aii_product_master` (`id_product`) ON DELETE CASCADE;

--
-- Constraints for table `aii_product_sub_category`
--
ALTER TABLE `aii_product_sub_category`
ADD CONSTRAINT `aii_product_sub_category_fk_id_product_category_foreign` FOREIGN KEY (`fk_id_product_category`) REFERENCES `aii_product_category_master` (`id_product_category`) ON DELETE CASCADE;

--
-- Constraints for table `aii_service_assign_category`
--
ALTER TABLE `aii_service_assign_category`
ADD CONSTRAINT `aii_service_assign_category_fk_id_service_category_foreign` FOREIGN KEY (`fk_id_service_category`) REFERENCES `aii_service_category_master` (`id_service_category`) ON DELETE CASCADE,
ADD CONSTRAINT `aii_service_assign_category_fk_id_service_foreign` FOREIGN KEY (`fk_id_service`) REFERENCES `aii_service_master` (`id_service`) ON DELETE CASCADE;

--
-- Constraints for table `aii_service_assign_sub_category`
--
ALTER TABLE `aii_service_assign_sub_category`
ADD CONSTRAINT `aii_service_assign_sub_category_fk_id_service_category_foreign` FOREIGN KEY (`fk_id_service_category`) REFERENCES `aii_service_category_master` (`id_service_category`) ON DELETE CASCADE,
ADD CONSTRAINT `aii_service_assign_sub_category_fk_id_service_foreign` FOREIGN KEY (`fk_id_service`) REFERENCES `aii_service_master` (`id_service`) ON DELETE CASCADE,
ADD CONSTRAINT `aii_service_assign_sub_category_fk_id_sub_category_foreign` FOREIGN KEY (`fk_id_sub_category`) REFERENCES `aii_service_sub_category` (`id_service_sub_category`) ON DELETE CASCADE;

--
-- Constraints for table `aii_service_image`
--
ALTER TABLE `aii_service_image`
ADD CONSTRAINT `aii_service_image_fk_id_service_foreign` FOREIGN KEY (`fk_id_service`) REFERENCES `aii_service_master` (`id_service`) ON DELETE CASCADE;

--
-- Constraints for table `aii_service_sub_category`
--
ALTER TABLE `aii_service_sub_category`
ADD CONSTRAINT `aii_service_sub_category_fk_id_service_category_foreign` FOREIGN KEY (`fk_id_service_category`) REFERENCES `aii_service_category_master` (`id_service_category`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
