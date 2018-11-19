-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2018 at 03:15 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_storepos`
--

-- --------------------------------------------------------

--
-- Table structure for table `spos_brands`
--

CREATE TABLE `spos_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `branch_id` int(20) NOT NULL,
  `store_id` int(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spos_brands`
--

INSERT INTO `spos_brands` (`id`, `name`, `is_active`, `branch_id`, `store_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Samsung', 2, 0, 555000, 6, 0, '2018-08-20 14:48:26', '2018-08-20 14:48:26', '0000-00-00 00:00:00'),
(2, 'Apple', 0, 0, 555000, 6, 0, '2018-08-20 20:56:28', '2018-08-20 14:56:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `spos_brand_models`
--

CREATE TABLE `spos_brand_models` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `branch_id` int(20) NOT NULL,
  `store_id` int(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spos_brand_models`
--

INSERT INTO `spos_brand_models` (`id`, `brand_id`, `brand_name`, `name`, `is_active`, `branch_id`, `store_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Samsung', 'J7', 1, 0, 555000, 6, 0, '2018-08-20 21:11:56', '2018-08-20 15:11:56', '0000-00-00 00:00:00'),
(2, 2, 'Apple', 'Iphone 4s', 2, 0, 555000, 6, 0, '2018-08-20 15:12:09', '2018-08-20 15:12:09', '0000-00-00 00:00:00'),
(3, 1, 'Samsung', 'S4', 2, 0, 555000, 6, 0, '2018-08-29 14:16:00', '2018-08-29 14:16:00', '0000-00-00 00:00:00'),
(4, 2, 'Apple', 'Ipad', 2, 0, 555000, 6, 0, '2018-08-29 14:16:12', '2018-08-29 14:16:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `spos_company_infos`
--

CREATE TABLE `spos_company_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(20) DEFAULT '0',
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_reg_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_company_infos`
--

INSERT INTO `spos_company_infos` (`id`, `store_id`, `company_name`, `logo`, `address`, `email`, `phone_no`, `vat_no`, `company_reg_no`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 555000, 'Skeletonit', '1534453380.png', 'sd', 'fakhrulislamtalukder@gmail.com', '01977136045', '123', '42000', 0, 0, '2018-08-16 14:31:14', '2018-08-16 15:03:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_customers`
--

CREATE TABLE `spos_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_customers`
--

INSERT INTO `spos_customers` (`id`, `name`, `phone`, `address`, `email`, `branch_id`, `store_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fakhrul Islam Talukder', '01977136045', 'asd', 'fakhrulislamtalukder@gmail.com', 0, 555000, 6, 0, '2018-08-19 13:43:53', '2018-08-19 14:20:43', NULL),
(2, 'Fahad', '+88-02-55086145', 'null', 'f.bhuyian@gmail.com', 0, 555000, 6, 0, '2018-08-19 14:21:09', '2018-08-19 14:21:09', NULL),
(3, 'Rakib', '01977136045', 'sa', 'panel.softaid@gmail.com', 0, 555000, 6, 0, '2018-08-19 14:21:27', '2018-08-19 14:21:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_discounts`
--

CREATE TABLE `spos_discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `discount_type_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `is_active` tinyint(2) DEFAULT '1',
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_discounts`
--

INSERT INTO `spos_discounts` (`id`, `discount_type_id`, `name`, `price`, `is_active`, `store_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Discount', 5.00, 1, 555000, 0, 6, 0, '2018-08-17 15:09:32', '2018-08-17 15:09:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_discount_types`
--

CREATE TABLE `spos_discount_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_discount_types`
--

INSERT INTO `spos_discount_types` (`id`, `name`, `store_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Card Payment', 555000, 0, 6, 0, '2018-08-17 14:50:49', '2018-08-17 14:50:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_gift_vouchers`
--

CREATE TABLE `spos_gift_vouchers` (
  `id` int(10) UNSIGNED NOT NULL,
  `gift_voucher_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gift_voucher_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_gift_vouchers`
--

INSERT INTO `spos_gift_vouchers` (`id`, `gift_voucher_name`, `gift_voucher_code`, `amount`, `store_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'hahhahahha', 'hihihihihi', '2700', 555000, 0, 6, 0, '2018-08-19 13:03:32', '2018-08-19 13:03:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_gift_voucher_receives`
--

CREATE TABLE `spos_gift_voucher_receives` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_shop_id` int(11) NOT NULL,
  `to_shop_id` int(11) NOT NULL,
  `gift_voucher_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_gift_voucher_transfers`
--

CREATE TABLE `spos_gift_voucher_transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_shop_id` int(11) NOT NULL,
  `to_shop_id` int(11) NOT NULL,
  `gift_voucher_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_invoices`
--

CREATE TABLE `spos_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tender_id` int(11) NOT NULL,
  `tender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` int(2) NOT NULL DEFAULT '0',
  `discount_rate` float(10,2) NOT NULL,
  `discount_amount` float(10,2) NOT NULL,
  `gift_voucher_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gift_voucher_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gift_voucher_amount` double(8,2) NOT NULL,
  `tax_rate` double(8,2) NOT NULL,
  `total_tax` double(8,2) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `total_cost` double(8,2) NOT NULL,
  `total_profit` double(8,2) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_invoice_settings`
--

CREATE TABLE `spos_invoice_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_title` text COLLATE utf8mb4_unicode_ci,
  `terms_text` text COLLATE utf8mb4_unicode_ci,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_login_activities`
--

CREATE TABLE `spos_login_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_login_activities`
--

INSERT INTO `spos_login_activities` (`id`, `activity`, `activity_type`, `ip_address`, `user_agent`, `branch_id`, `store_id`, `user_id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Company Info Updated Successfully.', 'Company Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 15:36:54', '2018-08-16 15:36:54', NULL),
(2, 'Logout Successfully.', 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 15:45:47', '2018-08-16 15:45:47', NULL),
(3, 'Logout Successfully.', 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 15:46:00', '2018-08-16 15:46:00', NULL),
(4, 'Logout Successfully.', 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 15:46:39', '2018-08-16 15:46:39', NULL),
(5, 'Shop Info Added Successfully.', 'Shop Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 16:17:53', '2018-08-16 16:17:53', NULL),
(6, 'Shop Info Added Successfully.', 'Shop Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 16:20:29', '2018-08-16 16:20:29', NULL),
(7, 'Shop Info Added Successfully.', 'Shop Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 16:21:41', '2018-08-16 16:21:41', NULL),
(8, 'Shop Info Added Successfully.', 'Shop Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 16:29:13', '2018-08-16 16:29:13', NULL),
(9, 'Shop Info Updated Successfully.', 'Shop Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 16:40:43', '2018-08-16 16:40:43', NULL),
(10, 'Shop Info Updated Successfully.', 'Shop Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 16:41:04', '2018-08-16 16:41:04', NULL),
(11, 'Shop Info Updated Successfully.', 'Shop Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 16:41:36', '2018-08-16 16:41:36', NULL),
(12, 'Shop Info Updated Successfully.', 'Shop Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 16:41:47', '2018-08-16 16:41:47', NULL),
(13, 'Shop Info Added Successfully.', 'Shop Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-16 16:42:10', '2018-08-16 16:42:10', NULL),
(14, 'Logout Successfully.', 'Logout', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-17 03:10:12', '2018-08-17 03:10:12', NULL),
(15, 'Logout Successfully.', 'Logout', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-17 03:33:49', '2018-08-17 03:33:49', NULL),
(16, 'User Added Successfully.', 'User Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-17 03:39:28', '2018-08-17 03:39:28', NULL),
(17, 'User Updated Successfully.', 'User Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-17 04:18:59', '2018-08-17 04:18:59', NULL),
(18, 'User Updated Successfully.', 'User Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fahad Bhuyian', 0, 0, '2018-08-17 04:20:29', '2018-08-17 04:20:29', NULL),
(19, 'Product Info Added Successfully.', 'Product Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 13:07:56', '2018-08-17 13:07:56', NULL),
(20, 'Product Info Added Successfully.', 'Product Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 13:21:54', '2018-08-17 13:21:54', NULL),
(21, 'Discount Type Info Added Successfully.', 'Discount Type Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 14:33:01', '2018-08-17 14:33:01', NULL),
(22, 'Discount Type Info Updated Successfully.', 'Discount Type Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 14:50:00', '2018-08-17 14:50:00', NULL),
(23, 'Discount Type Info Updated Successfully.', 'Discount Type Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 14:50:07', '2018-08-17 14:50:07', NULL),
(24, 'Discount Type Info Added Successfully.', 'Discount Type Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 14:50:49', '2018-08-17 14:50:49', NULL),
(25, 'Discount Info Added Successfully.', 'Discount Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 15:09:32', '2018-08-17 15:09:32', NULL),
(26, 'Discount Info Added Successfully.', 'Discount Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 15:09:58', '2018-08-17 15:09:58', NULL),
(27, 'Retailer Info Added Successfully.', 'Retailer Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 16:18:56', '2018-08-17 16:18:56', NULL),
(28, 'Retailer Info Updated Successfully.', 'Retailer Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 16:31:14', '2018-08-17 16:31:14', NULL),
(29, 'Vendor Info Added Successfully.', 'Vendor Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 17:03:36', '2018-08-17 17:03:36', NULL),
(30, 'Vendor Info Updated Successfully.', 'Vendor Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-17 17:06:03', '2018-08-17 17:06:03', NULL),
(31, 'Shop Receiving Info Added Successfully.', 'Shop Receiving Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-18 14:03:21', '2018-08-18 14:03:21', NULL),
(32, 'Shop Receiving Info Updated Successfully.', 'Shop Receiving Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-18 14:17:48', '2018-08-18 14:17:48', NULL),
(33, 'Stock Return To CS Info Added Successfully.', 'Stock Return To CS Info', '192.168.0.2', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-18 15:00:08', '2018-08-18 15:00:08', NULL),
(34, 'Stock Return To CS Info Added Successfully.', 'Stock Return To CS Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 00:48:40', '2018-08-19 00:48:40', NULL),
(35, 'Shop To Shop Delivery Info Added Successfully.', 'Shop To Shop Delivery Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 00:52:51', '2018-08-19 00:52:51', NULL),
(36, 'Shop To Shop Delivery Info Added Successfully.', 'Shop To Shop Delivery Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 01:03:28', '2018-08-19 01:03:28', NULL),
(37, 'Shop To Shop Receive Info Added Successfully.', 'Shop To Shop Receive Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 12:50:09', '2018-08-19 12:50:09', NULL),
(38, 'Gift Voucher Info Added Successfully.', 'Gift Voucher Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 13:01:14', '2018-08-19 13:01:14', NULL),
(39, 'Gift Voucher Info Updated Successfully.', 'Gift Voucher Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 13:03:22', '2018-08-19 13:03:22', NULL),
(40, 'Gift Voucher Info Added Successfully.', 'Gift Voucher Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 13:03:32', '2018-08-19 13:03:32', NULL),
(41, 'Stock In Info Added Successfully.', 'Stock In Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 13:11:57', '2018-08-19 13:11:57', NULL),
(42, 'Stock In Info Updated Successfully.', 'Stock In Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 13:12:26', '2018-08-19 13:12:26', NULL),
(43, 'Customer Info Added Successfully.', 'Customer Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 13:43:54', '2018-08-19 13:43:54', NULL),
(44, 'Customer Info Updated Successfully.', 'Customer Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 13:45:48', '2018-08-19 13:45:48', NULL),
(45, 'Stock Out Info Added Successfully.', 'Stock Out Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 14:18:39', '2018-08-19 14:18:39', NULL),
(46, 'Stock Out Info Updated Successfully.', 'Stock Out Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 14:19:54', '2018-08-19 14:19:54', NULL),
(47, 'Customer Info Updated Successfully.', 'Customer Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 14:20:43', '2018-08-19 14:20:43', NULL),
(48, 'Customer Info Added Successfully.', 'Customer Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 14:21:09', '2018-08-19 14:21:09', NULL),
(49, 'Customer Info Added Successfully.', 'Customer Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 14:21:27', '2018-08-19 14:21:27', NULL),
(50, 'Tender Info Added Successfully.', 'Tender Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 14:31:21', '2018-08-19 14:31:21', NULL),
(51, 'Tender Info Updated Successfully.', 'Tender Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-19 14:31:28', '2018-08-19 14:31:28', NULL),
(52, 'User Updated Successfully.', 'User Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 01:08:12', '2018-08-20 01:08:12', NULL),
(53, 'User Updated Successfully.', 'User Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 01:08:31', '2018-08-20 01:08:31', NULL),
(54, 'User Updated Successfully.', 'User Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 01:08:47', '2018-08-20 01:08:47', NULL),
(55, 'User Updated Successfully.', 'User Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 01:42:30', '2018-08-20 01:42:30', NULL),
(56, 'User Updated Successfully.', 'User Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 01:43:28', '2018-08-20 01:43:28', NULL),
(57, 'Shop To Shop User Transfer Info Added Successfully.', 'Shop To Shop User Transfer Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 07:04:44', '2018-08-20 07:04:44', NULL),
(58, 'User Updated Successfully.', 'User Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 08:06:59', '2018-08-20 08:06:59', NULL),
(59, 'Shop To Shop User Transfer Info Added Successfully.', 'Shop To Shop User Transfer Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 08:09:07', '2018-08-20 08:09:07', NULL),
(60, 'Shop To Shop User Transfer Info Updated Successfully.', 'Shop To Shop User Transfer Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 08:10:01', '2018-08-20 08:10:01', NULL),
(61, 'Shop To Shop User Transfer Info Updated Successfully.', 'Shop To Shop User Transfer Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 08:10:12', '2018-08-20 08:10:12', NULL),
(62, 'Shop To Shop User Transfer Info Updated Successfully.', 'Shop To Shop User Transfer Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 08:11:10', '2018-08-20 08:11:10', NULL),
(63, 'Shop To Shop User Transfer Info Updated Successfully.', 'Shop To Shop User Transfer Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 08:11:19', '2018-08-20 08:11:19', NULL),
(64, 'Brand Info Added Successfully.', 'Brand Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 14:48:26', '2018-08-20 14:48:26', NULL),
(65, 'Brand Info Added Successfully.', 'Brand Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 14:49:11', '2018-08-20 14:49:11', NULL),
(66, 'Brand Info Updated Successfully.', 'Brand Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 14:55:11', '2018-08-20 14:55:11', NULL),
(67, 'Brand Info Updated Successfully.', 'Brand Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 14:55:48', '2018-08-20 14:55:48', NULL),
(68, 'Brand Info Updated Successfully.', 'Brand Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 14:56:29', '2018-08-20 14:56:29', NULL),
(69, 'Model Info Added Successfully.', 'Model Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 15:08:35', '2018-08-20 15:08:35', NULL),
(70, 'Model Info Updated Successfully.', 'Model Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 15:11:56', '2018-08-20 15:11:56', NULL),
(71, 'Model Info Added Successfully.', 'Model Info', '192.168.0.6', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-20 15:12:09', '2018-08-20 15:12:09', NULL),
(72, 'Product Info Added Successfully.', 'Product Info', '192.168.0.5', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-29 14:02:07', '2018-08-29 14:02:07', NULL),
(73, 'Model Info Added Successfully.', 'Model Info', '192.168.0.5', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-29 14:16:00', '2018-08-29 14:16:00', NULL),
(74, 'Model Info Added Successfully.', 'Model Info', '192.168.0.5', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-08-29 14:16:12', '2018-08-29 14:16:12', NULL),
(75, 'Product Info Updated Successfully.', 'Product Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fakhrul Islam', 0, 0, '2018-08-30 00:14:33', '2018-08-30 00:14:33', NULL),
(76, 'Product Info Updated Successfully.', 'Product Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 1, 'Fakhrul Islam', 0, 0, '2018-08-30 00:14:55', '2018-08-30 00:14:55', NULL),
(77, 'Product Info Added Successfully.', 'Product Info', '192.168.0.4', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-09-11 13:14:48', '2018-09-11 13:14:48', NULL),
(78, 'Product Info Added Successfully.', 'Product Info', '192.168.0.4', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 0, 555000, 6, 'Fakhrul Islam', 0, 0, '2018-09-11 13:15:09', '2018-09-11 13:15:09', NULL),
(79, 'Product Info Added Successfully.', 'Product Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 0, 555000, 1, 'Fakhrul Islam', 0, 0, '2018-09-30 13:37:08', '2018-09-30 13:37:08', NULL),
(80, 'Tender Info Updated Successfully.', 'Tender Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 0, 555000, 1, 'Fakhrul Islam', 0, 0, '2018-10-09 12:44:00', '2018-10-09 12:44:00', NULL),
(81, 'Tender Info Updated Successfully.', 'Tender Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 0, 555000, 1, 'Fakhrul Islam', 0, 0, '2018-10-09 12:44:08', '2018-10-09 12:44:08', NULL),
(82, 'Tax Management Updated Successfully.', 'tax Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 0, 555000, 1, 'Fakhrul Islam', 0, 0, '2018-10-09 12:44:59', '2018-10-09 12:44:59', NULL),
(83, 'Tax Management Updated Successfully.', 'tax Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 0, 555000, 1, 'Fakhrul Islam', 0, 0, '2018-10-09 12:45:06', '2018-10-09 12:45:06', NULL),
(84, 'Tax Management Updated Successfully.', 'tax Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 0, 555000, 1, 'Fakhrul Islam', 0, 0, '2018-10-09 12:45:50', '2018-10-09 12:45:50', NULL),
(85, 'Tax Management Updated Successfully.', 'tax Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 0, 555000, 1, 'Fakhrul Islam', 0, 0, '2018-10-09 12:47:13', '2018-10-09 12:47:13', NULL),
(86, 'Tax Management Updated Successfully.', 'tax Info', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 0, 555000, 1, 'Fakhrul Islam', 0, 0, '2018-10-09 12:47:15', '2018-10-09 12:47:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_menus`
--

CREATE TABLE `spos_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_migrations`
--

CREATE TABLE `spos_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_migrations`
--

INSERT INTO `spos_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_10_204821_create_company_infos_table', 1),
(4, '2018_08_10_204837_create_shop_infos_table', 1),
(5, '2018_08_10_204942_create_user_menu_permissions_table', 1),
(6, '2018_08_10_205023_create_shop_to_shop_user_transfers_table', 1),
(7, '2018_08_10_205046_create_system_settings_table', 1),
(8, '2018_08_10_205145_create_shop_receivings_table', 1),
(9, '2018_08_10_205237_create_stock_return_to_c_s_table', 1),
(10, '2018_08_10_205309_create_shop_to_shop_deliveries_table', 1),
(11, '2018_08_10_205330_create_shop_to_shop_recevings_table', 1),
(12, '2018_08_10_205357_create_gift_vouchers_table', 1),
(13, '2018_08_10_205429_create_sales_table', 1),
(14, '2018_08_10_205510_create_sales_voids_table', 1),
(15, '2018_08_10_210133_create_invoices_table', 1),
(16, '2018_08_14_204744_create_products_table', 1),
(17, '2018_08_15_062523_create_tenders_table', 1),
(18, '2018_08_15_070629_create_gift_voucher_receives_table', 1),
(19, '2018_08_15_070649_create_gift_voucher_transfers_table', 1),
(20, '2018_08_15_071449_create_stock_ins_table', 1),
(21, '2018_08_15_071504_create_stock_outs_table', 1),
(22, '2018_08_15_071914_create_vendors_table', 1),
(23, '2018_08_15_072727_create_menus_table', 1),
(24, '2018_08_15_074934_create_site_settings_table', 1),
(25, '2018_08_15_075711_create_invoice_settings_table', 1),
(26, '2018_08_15_080353_create_login_activities_table', 1),
(27, '2018_08_15_081227_create_customers_table', 1),
(28, '2018_08_15_081355_create_store_users_table', 1),
(29, '2018_08_15_083139_create_stock_out_for_retail_sales_table', 1),
(30, '2018_08_15_083220_create_stock_in_from_retail_sales_table', 1),
(31, '2018_08_15_083500_create_retailers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spos_password_resets`
--

CREATE TABLE `spos_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_products`
--

CREATE TABLE `spos_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `cost` double(8,2) NOT NULL,
  `imei` int(255) NOT NULL,
  `sold_times` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_products`
--

INSERT INTO `spos_products` (`id`, `brand_id`, `model_id`, `barcode`, `name`, `quantity`, `price`, `cost`, `imei`, `sold_times`, `branch_id`, `store_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, '123', 'Angel Group', 11, 1111.00, 111.00, 2147483647, 0, 0, 555000, 1, 0, '2018-08-17 13:07:56', '2018-08-30 00:14:55', NULL),
(2, 1, 1, '12323', 'Fakhrul Islam', 12313, 12312.00, 13123.00, 235252352, 0, 0, 555000, 1, 0, '2018-08-17 13:21:54', '2018-08-30 00:14:33', NULL),
(3, 1, 2, '1234', 'Sustainability', 12, 1212.00, 1211.00, 2147483647, 0, 0, 555000, 6, 0, '2018-08-29 14:02:07', '2018-08-29 14:02:07', NULL),
(4, 1, 3, '1122', 'Sustainability', 12, 1212.00, 1211.00, 2147483647, 0, 0, 555000, 6, 0, '2018-09-11 13:14:48', '2018-09-11 13:14:48', NULL),
(5, 2, 2, '1233', 'জীবনযাত্রা', 12, 1212.00, 1111.00, 2147483647, 0, 0, 555000, 6, 0, '2018-09-11 13:15:09', '2018-09-11 13:15:09', NULL),
(6, 2, 2, '12300', 'Test Product', 12, 10.00, 8.00, 12345, 0, 0, 555000, 1, 0, '2018-09-30 13:37:08', '2018-09-30 13:37:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_retailers`
--

CREATE TABLE `spos_retailers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retailer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id_no` int(11) NOT NULL,
  `passport_id_no` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_retailers`
--

INSERT INTO `spos_retailers` (`id`, `name`, `retailer_id`, `phone`, `email`, `present_address`, `permanent_address`, `national_id_no`, `passport_id_no`, `branch_id`, `store_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fakhrul Islam', '1534544324', 1977136045, 'fakhrulislamtalukder@gmail.com', 'asda', 'dasdasd', 2147483647, 4124124, 0, 555000, 6, 0, '2018-08-17 16:18:56', '2018-08-17 16:31:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_sales`
--

CREATE TABLE `spos_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `cost` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `total_cost` double(8,2) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_sales_voids`
--

CREATE TABLE `spos_sales_voids` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(20) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_shop_infos`
--

CREATE TABLE `spos_shop_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_shop_infos`
--

INSERT INTO `spos_shop_infos` (`id`, `branch_name`, `address`, `phone_no`, `email`, `branch_id`, `store_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dhaka', 'sdas', '01977136045', 'fakhrulislamtalukder@gmail.com', 0, 555000, 1, 0, '2018-08-16 16:21:41', '2018-08-16 16:21:41', NULL),
(2, 'Cumilla', 'sadadsdasdasd', '01977136045', 'f.fahad.server@gmail.com', 0, 555000, 1, 0, '2018-08-16 16:29:13', '2018-08-16 16:29:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_shop_receivings`
--

CREATE TABLE `spos_shop_receivings` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_shop_receivings`
--

INSERT INTO `spos_shop_receivings` (`id`, `vendor_id`, `barcode`, `product_id`, `product_name`, `quantity`, `store_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 12323, 2, '', 122, 555000, 0, 6, 0, '2018-08-18 14:03:21', '2018-08-18 14:17:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_shop_to_shop_deliveries`
--

CREATE TABLE `spos_shop_to_shop_deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_shop_id` int(11) NOT NULL,
  `from_shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_shop_id` int(11) NOT NULL,
  `to_shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_shop_to_shop_deliveries`
--

INSERT INTO `spos_shop_to_shop_deliveries` (`id`, `from_shop_id`, `from_shop_name`, `to_shop_id`, `to_shop_name`, `barcode`, `product_id`, `product_name`, `quantity`, `store_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Dhaka', 2, 'Cumilla', 322321, 2, 'Fakhrul Islam', 13, 555000, 0, 6, 0, '2018-08-19 00:52:51', '2018-08-19 00:52:51', NULL),
(2, 2, 'Cumilla', 1, 'Dhaka', 2147483647, 1, 'Angel Group', 2, 555000, 0, 6, 0, '2018-08-19 01:03:28', '2018-08-19 01:03:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_shop_to_shop_recevings`
--

CREATE TABLE `spos_shop_to_shop_recevings` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_shop_id` int(11) NOT NULL,
  `from_shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_shop_id` int(11) NOT NULL,
  `to_shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_shop_to_shop_recevings`
--

INSERT INTO `spos_shop_to_shop_recevings` (`id`, `from_shop_id`, `from_shop_name`, `to_shop_id`, `to_shop_name`, `barcode`, `product_id`, `product_name`, `quantity`, `store_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Dhaka', 2, 'Cumilla', 12323, 1, 'Angel Group', 12, 555000, 0, 6, 0, '2018-08-19 12:50:09', '2018-08-19 12:50:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_shop_to_shop_user_transfers`
--

CREATE TABLE `spos_shop_to_shop_user_transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_shop_id` int(11) NOT NULL,
  `old_shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_shop_id` int(11) NOT NULL,
  `new_shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_shop_to_shop_user_transfers`
--

INSERT INTO `spos_shop_to_shop_user_transfers` (`id`, `user_id`, `user_name`, `old_shop_id`, `old_shop_name`, `new_shop_id`, `new_shop_name`, `branch_id`, `store_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Fakhrul Islam Talukder', 1, 'Dhaka', 2, 'Cumilla', 0, 555000, 6, 0, '2018-08-20 07:04:44', '2018-08-20 08:11:10', NULL),
(2, '7', 'Fakhrul Islam', 2, 'Cumilla', 1, 'Dhaka', 0, 555000, 6, 0, '2018-08-20 08:09:07', '2018-08-20 08:11:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_site_settings`
--

CREATE TABLE `spos_site_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_head_bg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `software_dashboard_logo_cashier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `software_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_stock_ins`
--

CREATE TABLE `spos_stock_ins` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_stock_ins`
--

INSERT INTO `spos_stock_ins` (`id`, `vendor_id`, `vendor_name`, `barcode`, `product_id`, `product_name`, `quantity`, `store_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '', 12323, 1, '', 122, 555000, 0, 6, 0, '2018-08-19 13:11:57', '2018-08-19 13:12:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_stock_in_from_retail_sales`
--

CREATE TABLE `spos_stock_in_from_retail_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `retailer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lot_no` int(11) NOT NULL,
  `product_stockout` int(11) NOT NULL,
  `product_stockin` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_stock_outs`
--

CREATE TABLE `spos_stock_outs` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_stock_outs`
--

INSERT INTO `spos_stock_outs` (`id`, `customer_id`, `customer_name`, `barcode`, `product_id`, `product_name`, `quantity`, `store_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Fakhrul Islam Talukder', 12323, 1, 'Angel Group', 122, 555000, 0, 6, 0, '2018-08-19 14:18:39', '2018-08-19 14:19:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_stock_out_for_retail_sales`
--

CREATE TABLE `spos_stock_out_for_retail_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `retailer_id` int(11) NOT NULL,
  `retailer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lot_no` int(11) NOT NULL,
  `product_stockout` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_stock_return_to_c_s`
--

CREATE TABLE `spos_stock_return_to_c_s` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_shop_id` int(11) NOT NULL,
  `to_shop_id` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_stock_return_to_c_s`
--

INSERT INTO `spos_stock_return_to_c_s` (`id`, `from_shop_id`, `to_shop_id`, `barcode`, `product_id`, `product_name`, `quantity`, `store_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 12323, 2, 'Fakhrul Islam', 12, 555000, 0, 6, 0, '2018-08-18 15:00:08', '2018-08-18 15:00:08', NULL),
(2, 1, 2, 53445344, 2, 'Fakhrul Islam', 1321, 555000, 0, 6, 0, '2018-08-19 00:48:40', '2018-08-19 00:48:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_store_users`
--

CREATE TABLE `spos_store_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` enum('Cashier','Branch Admin','Shop Admin','Super Admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_lock` int(11) NOT NULL DEFAULT '0',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_store_users`
--

INSERT INTO `spos_store_users` (`id`, `name`, `email`, `password`, `phone`, `address`, `photo`, `user_type`, `is_lock`, `is_active`, `branch_id`, `store_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fakhrul Islam Talukder', 'fakhrul606399@gmail.com', '$2y$10$Vpfp3cXlAHbQP/0rGApeeesW0Ns9g2sm7e6IYYM5uHv.wo1/oE042', '01977136045', 'azsd', '1534497045.jpg', 'Cashier', 1, 1, 0, 555000, 6, 0, '2018-08-17 03:10:45', '2018-08-20 08:06:59', NULL),
(7, 'Fakhrul Islam', 'fakhrul@gmail.com', '$2y$10$FuSfKchOFQ7qPCuNhVvOtuGOmKkDCCsKpBmdP6mveVNmE1Drji/ti', '01977136045', 'sa', '1534498768.jpg', 'Shop Admin', 1, 1, 0, 555000, 6, 0, '2018-08-17 03:39:28', '2018-08-20 01:43:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_system_settings`
--

CREATE TABLE `spos_system_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_tenders`
--

CREATE TABLE `spos_tenders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_tenders`
--

INSERT INTO `spos_tenders` (`id`, `name`, `store_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 555000, 1, 0, '2018-08-19 14:31:21', '2018-10-09 12:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `spos_users`
--

CREATE TABLE `spos_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('Cashier','Branch Admin','Shop Admin','Super Admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_users`
--

INSERT INTO `spos_users` (`id`, `name`, `email`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fakhrul Islam', 'f.bhuyian@gmail.com', '$2y$10$qc.NTmCeyKGMVR/EprD8GurTE9T6WMuLPVvH8KIO7gN3A.RDoAgwa', 'Branch Admin', 'Le11iUcJPrlBQRgTmKUZNDJhEUeoPds3j0fX1lfz', '2018-08-20 01:08:47', '2018-08-16 15:19:42', NULL),
(2, 'Fakhrul Islam Talukder', 'fakhrul606399@gmail.com', '$2y$10$edrTmMM7wWPLgrnFR8pegeJgcH71F5Iu53mBdt/hf7eaPuZGDPWGi', 'Cashier', 'PVDrQCPjUtII7H499oimUNpGS3PeF0CqZGGWSg1B', '2018-08-20 08:06:59', '2018-08-20 08:06:59', NULL),
(6, 'Fakhrul Islam', 'fakhrul@gmail.com', '$2y$10$qc.NTmCeyKGMVR/EprD8GurTE9T6WMuLPVvH8KIO7gN3A.RDoAgwa', 'Shop Admin', 'Le11iUcJPrlBQRgTmKUZNDJhEUeoPds3j0fX1lfz', '2018-08-20 01:43:28', '2018-08-20 01:43:28', NULL),
(8, 'Fakhrul Islam', 'fkhrl@gmail.com', '$2y$10$MmzOY4Q5898FrJHt/Eg8MeD.NTL1ZJnQXJOAbrTxqbYqI6/AUPNLq', 'Branch Admin', 'Le11iUcJPrlBQRgTmKUZNDJhEUeoPds3j0fX1lfz', '2018-08-20 01:08:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spos_user_menu_permissions`
--

CREATE TABLE `spos_user_menu_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spos_vats`
--

CREATE TABLE `spos_vats` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_amount` float(10,2) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_vats`
--

INSERT INTO `spos_vats` (`id`, `name`, `rate_amount`, `store_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Tax', 5.00, 555000, 1, 0, '2018-08-19 08:31:21', '2018-10-09 12:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `spos_vendors`
--

CREATE TABLE `spos_vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spos_vendors`
--

INSERT INTO `spos_vendors` (`id`, `name`, `contact_person`, `contact_number`, `email`, `address`, `website`, `store_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fakhrul Islam Talukder', 'fakhrul', '01977136045', 'fakhrulislamtalukder@gmail.com', 'sada', 'http://softaidbd.com', 555000, 0, 6, 0, '2018-08-17 17:03:36', '2018-08-17 17:06:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spos_brands`
--
ALTER TABLE `spos_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_brand_models`
--
ALTER TABLE `spos_brand_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_company_infos`
--
ALTER TABLE `spos_company_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_customers`
--
ALTER TABLE `spos_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_discounts`
--
ALTER TABLE `spos_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_discount_types`
--
ALTER TABLE `spos_discount_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_gift_vouchers`
--
ALTER TABLE `spos_gift_vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_gift_voucher_receives`
--
ALTER TABLE `spos_gift_voucher_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_gift_voucher_transfers`
--
ALTER TABLE `spos_gift_voucher_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_invoices`
--
ALTER TABLE `spos_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_id_index` (`id`),
  ADD KEY `invoices_invoice_id_index` (`invoice_id`);

--
-- Indexes for table `spos_invoice_settings`
--
ALTER TABLE `spos_invoice_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_login_activities`
--
ALTER TABLE `spos_login_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_menus`
--
ALTER TABLE `spos_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_migrations`
--
ALTER TABLE `spos_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_password_resets`
--
ALTER TABLE `spos_password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `spos_products`
--
ALTER TABLE `spos_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_index` (`id`),
  ADD KEY `products_name_index` (`name`);

--
-- Indexes for table `spos_retailers`
--
ALTER TABLE `spos_retailers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_sales`
--
ALTER TABLE `spos_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_sales_voids`
--
ALTER TABLE `spos_sales_voids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_shop_infos`
--
ALTER TABLE `spos_shop_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_shop_receivings`
--
ALTER TABLE `spos_shop_receivings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_shop_to_shop_deliveries`
--
ALTER TABLE `spos_shop_to_shop_deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_shop_to_shop_recevings`
--
ALTER TABLE `spos_shop_to_shop_recevings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_shop_to_shop_user_transfers`
--
ALTER TABLE `spos_shop_to_shop_user_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_site_settings`
--
ALTER TABLE `spos_site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_stock_ins`
--
ALTER TABLE `spos_stock_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_stock_in_from_retail_sales`
--
ALTER TABLE `spos_stock_in_from_retail_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_stock_outs`
--
ALTER TABLE `spos_stock_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_stock_out_for_retail_sales`
--
ALTER TABLE `spos_stock_out_for_retail_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_stock_return_to_c_s`
--
ALTER TABLE `spos_stock_return_to_c_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_store_users`
--
ALTER TABLE `spos_store_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_system_settings`
--
ALTER TABLE `spos_system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_tenders`
--
ALTER TABLE `spos_tenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_users`
--
ALTER TABLE `spos_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `spos_user_menu_permissions`
--
ALTER TABLE `spos_user_menu_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_vats`
--
ALTER TABLE `spos_vats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spos_vendors`
--
ALTER TABLE `spos_vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spos_brands`
--
ALTER TABLE `spos_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spos_brand_models`
--
ALTER TABLE `spos_brand_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spos_company_infos`
--
ALTER TABLE `spos_company_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spos_customers`
--
ALTER TABLE `spos_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spos_discounts`
--
ALTER TABLE `spos_discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spos_discount_types`
--
ALTER TABLE `spos_discount_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spos_gift_vouchers`
--
ALTER TABLE `spos_gift_vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spos_gift_voucher_receives`
--
ALTER TABLE `spos_gift_voucher_receives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_gift_voucher_transfers`
--
ALTER TABLE `spos_gift_voucher_transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_invoices`
--
ALTER TABLE `spos_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_invoice_settings`
--
ALTER TABLE `spos_invoice_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_login_activities`
--
ALTER TABLE `spos_login_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `spos_menus`
--
ALTER TABLE `spos_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_migrations`
--
ALTER TABLE `spos_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `spos_products`
--
ALTER TABLE `spos_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `spos_retailers`
--
ALTER TABLE `spos_retailers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spos_sales`
--
ALTER TABLE `spos_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_sales_voids`
--
ALTER TABLE `spos_sales_voids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_shop_infos`
--
ALTER TABLE `spos_shop_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spos_shop_receivings`
--
ALTER TABLE `spos_shop_receivings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spos_shop_to_shop_deliveries`
--
ALTER TABLE `spos_shop_to_shop_deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spos_shop_to_shop_recevings`
--
ALTER TABLE `spos_shop_to_shop_recevings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spos_shop_to_shop_user_transfers`
--
ALTER TABLE `spos_shop_to_shop_user_transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spos_site_settings`
--
ALTER TABLE `spos_site_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_stock_ins`
--
ALTER TABLE `spos_stock_ins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spos_stock_in_from_retail_sales`
--
ALTER TABLE `spos_stock_in_from_retail_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_stock_outs`
--
ALTER TABLE `spos_stock_outs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spos_stock_out_for_retail_sales`
--
ALTER TABLE `spos_stock_out_for_retail_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_stock_return_to_c_s`
--
ALTER TABLE `spos_stock_return_to_c_s`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spos_store_users`
--
ALTER TABLE `spos_store_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `spos_system_settings`
--
ALTER TABLE `spos_system_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_tenders`
--
ALTER TABLE `spos_tenders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spos_users`
--
ALTER TABLE `spos_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spos_user_menu_permissions`
--
ALTER TABLE `spos_user_menu_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spos_vats`
--
ALTER TABLE `spos_vats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spos_vendors`
--
ALTER TABLE `spos_vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
