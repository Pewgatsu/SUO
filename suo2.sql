-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 08:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suo2`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `builds`
--

CREATE TABLE `builds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `build_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `build_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `build_products`
--

CREATE TABLE `build_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `build_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `owned` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` decimal(8,2) DEFAULT NULL,
  `width` decimal(8,2) DEFAULT NULL,
  `height` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `image_path`, `name`, `type`, `manufacturer`, `series`, `model`, `color`, `length`, `width`, `height`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', 'Asus RTX 3060 KO OC V2 LHR', 'Graphics Card', 'ASUS', NULL, NULL, 'Black/Silver', '27.50', '13.50', '5.40', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(2, '2.jpg', 'Asus GeForce GTX 1660 SUPER 6 GB TUF GAMING OC Video Card', 'Graphics Card', 'ASUS', NULL, NULL, 'Black', '20.60', '12.40', '4.60', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(3, '3.jpg', 'Asus GTX 1660 Super Phoenix OC', 'Graphics Card', 'ASUS', NULL, NULL, 'Black/White', '17.40', '12.10', '3.90', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(4, '4.jpg', 'AMD Ryzen 5 3600 3.6 GHz 6-Core Processor', 'Processor', 'AMD', 'AMD Ryzen 5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(5, '5.jpg', 'MSI MPG X570 Gaming Pro Carbon Wifi', 'Motherboard', 'MSI', NULL, NULL, 'Black/Silver', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(6, '6.jpg', 'MSI MAG X570 Tomahawk Wifi', 'Motherboard', 'MSI', NULL, NULL, 'Black', '12.00', '9.00', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(7, '7.jpg', 'Gigabyte X570 Gaming X', 'Motherboard', 'Gigabyte', NULL, NULL, 'Black / Silver', '12.00', '9.00', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(8, '8.jpg', 'Asus PRIME B550M-K Micro ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black / White', '9.61', '9.61', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(9, '9.jpg', 'Gigabyte B550M DS3H AC Micro ATX AM4 Motherboard', 'Motherboard', 'Gigabyte', NULL, NULL, 'Black', '9.61', '9.61', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(10, '10.jpg', 'Asus TUF B450M-PRO GAMING Micro ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '9.61', '9.61', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(11, '11.jpg', 'Asus PRIME A320M-K Micro ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, NULL, '8.90', '8.70', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(12, '12.jpg', 'G.Skill Ripjaws V Series 16 GB (2 x 8 GB) DDR4-3200 CL16 Memory', 'Memory', 'G.Skill', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(13, '13.jpg', 'Asus TUF Gaming 650 W 80+ Bronze Certified ATX Power Supply', 'Power Supply Unit', 'ASUS', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(14, '14.jpg', 'Asus TUF Gaming 550w Bronze', 'Power Supply Unit', 'ASUS', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(15, '15.jpg', 'Intelligent Awake AK600W Bronze', 'Power Supply Unit', 'Intelligent Awake', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(16, '16.jpg', 'Seagate BarraCuda 1 TB 3.5\" 7200RPM Internal Hard Drive', 'Storage', 'Seagate', NULL, NULL, NULL, NULL, '3.50', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(17, '17.jpg', 'Kingston A400 240GB M.2', 'Storage', 'Kingston', NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(18, '18.jpg', 'Team GX1 480 GB 2.5\" Solid State Drive', 'Storage', 'Team GX1', NULL, NULL, NULL, NULL, '2.50', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(19, '19.jpg', 'Team GX1 240 GB 2.5\" Solid State Drive', 'Storage', 'Team GX1', NULL, NULL, NULL, NULL, '2.50', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(20, '20.jpg', 'Asus TUF Gaming GT301 ATX Mid Tower Case', 'Case', 'ASUS', NULL, NULL, 'Black', '16.77', '8.43', '18.98', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(21, '21.jpg', 'Rakk Kisig', 'Case', 'Rakk', NULL, NULL, 'Black', '14.57', '7.28', '14.96', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(22, '22.jpg', 'Rakk Marug', 'Case', 'Rakk', NULL, NULL, 'Black', '14.56', '7.28', '14.96', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(23, '23.jpg', 'AMD Ryzen 5 5600X 3.7 GHz 6-Core Processor', 'Processor', 'AMD', 'AMD Ryzen 5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(24, '24.jpg', 'AMD Ryzen 7 3700X 3.6 GHz 8-Core Processor', 'Processor', 'AMD', 'AMD Ryzen 7', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(25, '25.jpg', 'AMD Ryzen 7 5800X 3.8 GHz 8-Core Processor', 'Processor', 'AMD', 'AMD Ryzen 7', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(26, '26.jpg', 'AMD Ryzen 9 5900X 3.7 GHz 12-Core Processor', 'Processor', 'AMD', 'AMD Ryzen 9', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(27, '27.jpg', 'Intel Core i7-10700K 3.8 GHz 8-Core Processor', 'Processor', 'Intel', 'Intel Core i7', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(28, '28.jpg', 'Intel Core i5-10400F 2.9 GHz 6-Core Processor', 'Processor', 'Intel', 'Intel Core i5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(29, '29.jpg', 'AMD Ryzen 9 5950X 3.4 GHz 16-Core Processor', 'Processor', 'AMD', 'AMD Ryzen 9', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(30, '30.jpg', 'AMD Ryzen 5 5600G 3.9 GHz 6-Core Processor', 'Processor', 'AMD', 'AMD Ryzen 5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(31, '31.jpg', 'AMD Ryzen 5 2600 3.4 GHz 6-Core Processor\r\n', 'Processor', 'AMD', 'AMD Ryzen 5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(32, '32.jpg', 'Intel Core i5-10600K 4.1 GHz 6-Core Processor', 'Processor', 'Intel', 'Intel Core i5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(33, '33.jpg', 'Intel Core i7-11700K 3.6 GHz 8-Core Processor', 'Processor', 'Intel', 'Intel Core i7', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(34, '34.jpg', 'AMD Ryzen 3 3300X 3.8 GHz Quad-Core Processor', 'Processor', 'AMD', 'AMD Ryzen 3', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(35, '35.jpg', 'Intel Core i9-10900K 3.7 GHz 10-Core Processor', 'Processor', 'Intel', 'Intel Core i9', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(36, '36.jpg', 'Intel Core i9-11900K 3.5 GHz 8-Core Processor', 'Processor', 'Intel', 'Intel Core i9', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(37, '37.jpg', 'Intel Core i3-10100F 3.6 GHz Quad-Core Processor', 'Processor', 'Intel', 'Intel Core i3', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(38, '38.jpg', 'Seagate Barracuda Compute 2 TB 3.5\" 7200RPM Internal Hard Drive', 'Storage', 'Seagate', NULL, NULL, NULL, NULL, '3.50', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(39, '39.jpg', 'Samsung 970 Evo Plus 1 TB M.2-2280 NVME Solid State Drive\r\n', 'Storage', 'Samsung', NULL, NULL, NULL, '3.16', '0.09', '0.87', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(40, '40.jpg', 'Western Digital Blue SN550 1 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Western Digital', NULL, NULL, NULL, '3.15', '0.87', '0.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(41, '41.jpg', 'Western Digital Blue 500 GB M.2-2280 Solid State Drive', 'Storage', 'Western Digital', NULL, NULL, NULL, '3.15', '0.87', '0.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(42, '42.jpg', 'Samsung 980 Pro 1 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '3.15', '0.94', '0.87', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(43, '43.jpg', 'Samsung 980 1 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '3.15', '0.87', '0.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(44, '44.jpg', 'Samsung 970 EVO Plus 2 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '3.16', '0.09', '0.87', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(45, '45.jpg', 'Western Digital Caviar Blue 1 TB 3.5\" 7200RPM Internal Hard Driv', 'Storage', 'Western Digital', NULL, NULL, NULL, NULL, '3.50', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(46, '46.jpg', 'Samsung 980 Pro 2 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '3.15', '0.94', '0.87', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(47, '47.jpg', 'Samsung 970 Evo Plus 500 GB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '3.16', '0.09', '0.87', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(48, '48.jpg', 'Samsung 860 Evo 1 TB 2.5\" Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '3.94', '2.76', '0.27', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(49, '49.jpg', 'Angelbird ED381 7.68 TB 2.5\" Solid State Drive', 'Storage', 'Angelbird', NULL, NULL, NULL, '3.94', '2.76', '0.27', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(50, '50.jpg', 'Seagate BarraCuda 1 TB 3.5\" 7200RPM Internal Hard Drive', 'Storage', 'Seagate', NULL, NULL, NULL, NULL, '3.50', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(51, '51.jpg', 'Kingston A400 240 GB 2.5\" Solid State Drive', 'Storage', 'Kingston', NULL, NULL, NULL, '3.94', '2.76', '0.27', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(52, '52.jpg', 'Western Digital SN750 1 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Western Digital', NULL, NULL, NULL, '3.15', '0.95', '0.32', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(53, '53.jpg', 'Western Digital Blue SN550 500 GB M.2-2280 NVME Solid State Driv', 'Storage', 'Western Digital', NULL, NULL, NULL, '3.14', '0.95', '0.32', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(54, '54.jpg', 'Samsung 980 500 GB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '3.15', '0.94', '0.87', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(55, '55.jpg', 'Crucial P2 1 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Crucial', NULL, NULL, NULL, '3.15', '0.94', '0.87', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(56, '56.jpg', 'Crucial P2 500 GB M.2-2280 NVME Solid State Drive', 'Storage', 'Crucial', NULL, NULL, NULL, '3.15', '0.94', '0.87', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(57, '57.jpg', 'Seagate BarraCuda 4 TB 3.5\" 5400RPM Internal Hard Drive', 'Storage', 'Seagate', NULL, NULL, NULL, NULL, '3.50', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(58, '58.jpg', 'Cooler Master Hyper 212 EVO 82.9 CFM Sleeve Bearing CPU Cooler', 'CPU Cooler', 'Cooler Master', NULL, NULL, 'Black', '4.70', '3.10', '6.30', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(59, '59.jpg', 'Cooler Master Hyper 212 RGB Black Edition 57.3 CFM CPU Cooler', 'CPU Cooler', 'Cooler Master', NULL, NULL, 'Black', '4.70', '3.10', '6.30', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(60, '60.jpg', 'Cooler Master MASTERLIQUID ML240L RGB V2 65.59 CFM Liquid CPU Co', 'CPU Cooler', 'Cooler Master', NULL, NULL, 'Black', '10.90', '4.70', '1.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(61, '61.jpg', 'NZXT Kraken X53 73.11 CFM Liquid CPU Cooler', 'CPU Cooler', 'NZXT', NULL, NULL, 'Black', '4.84', '10.83', '1.18', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(62, '62.jpg', 'Corsair iCUE H150i ELITE CAPELLIX 75 CFM Liquid CPU Cooler', 'CPU Cooler', 'Corsair', NULL, NULL, 'Black', '15.63', '4.72', '1.06', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(63, '63.jpg', 'Cooler Master Hyper 212 Black Edition 42 CFM CPU Cooler', 'CPU Cooler', 'Cooler Naster', NULL, NULL, 'Black', '4.70', '3.10', '6.30', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(64, '64.jpg', 'NZXT Kraken Z73 73.11 CFM Liquid CPU Cooler', 'CPU Cooler', 'NZXT', NULL, NULL, 'Black', '4.76', '15.51', '1.06', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(65, '65.jpg', 'Corsair iCUE H100i ELITE CAPELLIX 75 CFM Liquid CPU Cooler\r\n', 'CPU Cooler', 'Corsair', NULL, NULL, 'Black', '10.91', '4.72', '1.06', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(66, '66.jpg', 'Noctua NH-D15 chromax.black 82.52 CFM CPU Cooler', 'CPU Cooler', 'Noctua', NULL, NULL, 'Black', '6.34', '5.91', '6.50', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(67, '67.jpg', 'be quiet! Dark Rock Pro 4 50.5 CFM CPU Cooler', 'CPU Cooler', 'be quiet!', NULL, NULL, 'Black', '5.75', '5.35', '6.42', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(68, '68.jpg', 'NZXT Kraken X63 98.17 CFM Liquid CPU Cooler', 'CPU Cooler', 'NZXT', NULL, NULL, 'Black', '12.40', '5.63', '1.18', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(69, '69.jpg', 'Corsair iCUE H150i ELITE CAPELLIX 75 CFM Liquid CPU Cooler', 'CPU Cooler', 'Corsair', NULL, NULL, 'White', '15.63', '4.72', '1.06', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(70, '70.jpg', 'NZXT Kraken Z63 98.17 CFM Liquid CPU Cooler', 'CPU Cooler', 'NZXT', NULL, NULL, 'Black', '12.40', '5.63', '1.18', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(71, '71.jpg', 'Noctua NH-U12S chromax.black 55 CFM CPU Cooler', 'CPU Cooler', 'Noctua', NULL, NULL, 'Mixed', '2.80', '4.92', '6.22', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(72, '72.jpg', 'Noctua NH-D15 82.5 CFM CPU Cooler', 'CPU Cooler', 'Noctua', NULL, NULL, 'Mixed', '6.34', '5.91', '6.50', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(73, '73.jpg', 'Corsair iCUE H100i RGB PRO XT 75 CFM Liquid CPU Cooler', 'CPU Cooler', 'Corsair', NULL, NULL, 'Black', '10.91', '4.72', '1.06', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(74, '74.jpg', 'Corsair Vengeance LPX 16 GB (2 x 8 GB) DDR4-3200 CL16 Memory\r\n', 'Memory', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(75, '75.jpg', 'Corsair Vengeance RGB Pro 16 GB (2 x 8 GB) DDR4-3200 CL16 Memory', 'Memory', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(76, '76.jpg', 'Crucial Ballistix 16 GB (2 x 8 GB) DDR4-3600 CL16 Memory\r\n', 'Memory', 'Crucial', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(77, '77.jpg', 'G.Skill Ripjaws V Series 32 GB (2 x 16 GB) DDR4-3200 CL16 Memory', 'Memory', 'G.Skill', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(78, '78.jpg', 'G.Skill Trident Z RGB 16 GB (2 x 8 GB) DDR4-3600 CL18 Memory\r\n', 'Memory', 'G.Skill', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(79, '79.jpg', 'Corsair Vengeance RGB Pro 16 GB (2 x 8 GB) DDR4-3200 CL16 Memory', 'Memory', 'Corsair', NULL, NULL, 'White', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(80, '80.jpg', 'Corsair Vengeance RGB Pro 32 GB (2 x 16 GB) DDR4-3600 CL18 Memor', 'Memory', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(81, '81.jpg', 'G.Skill Trident Z Neo 32 GB (2 x 16 GB) DDR4-3600 CL16 Memory', 'Memory', 'G.Skill', NULL, NULL, 'Silver', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(82, '82.jpg', 'Corsair Vengeance LPX 16 GB (2 x 8 GB) DDR4-3600 CL18 Memory\r\n', 'Memory', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(83, '83.jpg', 'Corsair Vengeance LPX 32 GB (2 x 16 GB) DDR4-3600 CL18 Memory', 'Memory', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(84, '84.jpg', 'Team T-FORCE VULCAN Z 16 GB (2 x 8 GB) DDR4-3200 CL16 Memory', 'Memory', 'Team T-Force', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(85, '85.jpg', 'Crucial Ballistix 16 GB (2 x 8 GB) DDR4-3200 CL16 Memory\r\n', 'Memory', 'Crucial', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(86, '86.jpg', 'G.Skill Ripjaws V 16 GB (2 x 8 GB) DDR4-3600 CL16 Memory', 'Memory', 'G.Skill', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(87, '87.jpg', 'Corsair Dominator Platinum 128 GB (8 x 16 GB) DDR4-3200 CL16 Mem', 'Memory', 'Corsair', NULL, NULL, 'Black/Sivler', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(88, '88.jpg', 'Corsair Vengeance RGB Pro 32 GB (2 x 16 GB) DDR4-3200 CL16 Memor', 'Memory', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(89, '89.jpg', 'EVGA BR 500 W 80+ Bronze Certified ATX Power Supply\r\n', 'Power Supply Unit', 'EVGA', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(90, '90.jpg', 'Corsair AXi 1600 W 80+ Titanium Certified Fully Modular ATX Powe', 'Power Supply Unit', 'Corsair', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(91, '91.jpg', 'Gigabyte P GM 750 W 80+ Gold Certified Fully Modular ATX Power S', 'Power Supply Unit', 'Gigabyte', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(92, '92.jpg', 'EVGA BQ 500 W 80+ Bronze Certified Semi-modular ATX Power Supply', 'Power Supply Unit', '\r\nEVGA\r\n', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(93, '93.jpg', 'Corsair HX Platinum 1000 W 80+ Platinum Certified Fully Modular ', 'Power Supply Unit', 'Corsair', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(94, '94.jpg', 'EVGA SuperNOVA GA 850 W 80+ Gold Certified Fully Modular ATX Pow', 'Power Supply Unit', 'EVGA', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(95, '95.jpg', 'Corsair CXM 650 W 80+ Bronze Certified Semi-modular ATX Power Su', 'Power Supply Unit', 'Corsair', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(96, '96.jpg', 'Corsair RM (2019) 750 W 80+ Gold Certified Fully Modular ATX Pow', 'Power Supply Unit', 'Corsair', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(97, '97.jpg', 'EVGA BQ 600 W 80+ Bronze Certified Semi-modular ATX Power Supply', 'Power Supply Unit', 'EVGA\r\n', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(98, '98.jpg', 'Corsair RM (2019) 850 W 80+ Gold Certified Fully Modular ATX Pow', 'Power Supply Unit', '\r\nCorsair', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(99, '99.jpg', 'EVGA SuperNOVA GA 650 W 80+ Gold Certified Fully Modular ATX Pow', 'Power Supply Unit', 'EVGA', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(100, '100.jpg', 'Corsair RM (2019) 650 W 80+ Gold Certified Fully Modular ATX Pow', 'Power Supply Unit', 'Corsair', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(101, '101.jpg', 'Corsair SF 750 W 80+ Platinum Certified Fully Modular SFX Power ', 'Power Supply Unit', 'Corsair', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(102, '102.jpg', 'Corsair RMx (2021) 850 W 80+ Gold Certified Fully Modular ATX Po', 'Power Supply Unit', 'Corsair', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(103, '103.jpg', 'EVGA SuperNOVA GA 750 W 80+ Gold Certified Fully Modular ATX Pow', 'Power Supply Unit', 'EVGA', NULL, NULL, 'Black', '5.91', '5.91', '3.39', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(104, '104.jpg', 'NZXT H510 ATX Mid Tower Case', 'Case', 'NZXT', NULL, NULL, 'Black', '16.85', '8.27', '18.11', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(105, '105.jpg', 'Corsair 4000D Airflow ATX Mid Tower Case', 'Case', 'Corsair', NULL, NULL, 'White', '17.84', '9.06', '18.35', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(106, '106.jpg', 'NZXT H510 ATX Mid Tower Case', 'Case', 'NZXT', NULL, NULL, 'White', '16.85', '8.27', '18.11', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(107, '107.jpg', 'Phanteks Eclipse P300A Mesh ATX Mid Tower Case', 'Case', 'Phanteks', NULL, NULL, 'Black', '15.75', '7.87', '17.91', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(108, '108.jpg', 'Lian Li PC-O11 Dynamic ATX Full Tower Case', 'Case', 'Lian Li', NULL, NULL, 'Black', '17.52', '10.71', '17.56', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(109, '109.jpg', 'Corsair 4000D Airflow ATX Mid Tower Case', 'Case', 'Corsair', NULL, NULL, 'Black', '17.84', '9.06', '18.35', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(110, '110.jpg', 'Phanteks Eclipse P400A Digital ATX Mid Tower Case', 'Case', 'Phanteks', NULL, NULL, 'Black', '18.50', '8.27', '18.31', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(111, '111.jpg', 'Lian Li Lancool II Mesh ATX Mid Tower Case', 'Case', 'Lian Li', NULL, NULL, 'Black', '18.82', '9.02', '19.45', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(112, '112.jpg', 'Lian Li PC-O11 Dynamic ATX Full Tower Case', 'Case', 'Lian Li', NULL, NULL, 'White', '17.52', '10.71', '17.56', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(113, '113.jpg', 'Corsair iCUE 4000X RGB ATX Mid Tower Case', 'Case', 'Corsair', NULL, NULL, 'Black', '17.84', '9.06', '18.35', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(114, '114.jpg', 'Fractal Design Meshify C ATX Mid Tower Case', 'Case', 'Fractal Design', NULL, NULL, 'Black', '16.26', '8.54', '17.84', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(115, '115.jpg', 'Corsair iCUE 4000X RGB ATX Mid Tower Case', 'Case', 'Corsair', NULL, NULL, 'White', '17.84', '9.06', '18.35', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(116, '116.jpg', 'NZXT H510 Elite ATX Mid Tower Case', 'Case', 'NZXT', NULL, NULL, 'White/Black', '16.85', '8.27', '18.11', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(117, '117.jpg', 'Phanteks Eclipse P360A ATX Mid Tower Case', 'Case', 'Phanteks', NULL, NULL, 'White', '17.91', '7.87', '18.31', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(118, '118.jpg', 'Corsair 5000D AIRFLOW ATX Mid Tower Case', 'Case', 'Corsair', NULL, NULL, 'Black', '20.47', '9.65', '20.47', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(119, '119.jpg', 'Asus TUF GAMING X570-PLUS (WI-FI) ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(120, '120.jpg', 'Asus ROG STRIX B550-F GAMING (WI-FI) ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(121, '121.jpg', 'MSI B450 TOMAHAWK MAX ATX AM4 Motherboard', 'Motherboard', 'MSI\r\n', NULL, NULL, 'Black', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(122, '122.jpg', 'ASRock B450M Pro4 Micro ATX AM4 Motherboard', 'Motherboard', 'ASRock', NULL, NULL, 'Black/Silver', '9.60', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(123, '123.jpg', 'Asus ROG Strix X570-E Gaming ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(124, '124.jpg', 'MSI Z490-A PRO ATX LGA1200 Motherboard', 'Motherboard', 'MSI', NULL, NULL, 'Black/Silver', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(125, '125.jpg', 'MSI B550M PRO-VDH WIFI Micro ATX AM4 Motherboard', 'Motherboard', 'MSI', NULL, NULL, 'Black', '9.60', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(126, '126.jpg', 'Asus ROG STRIX B450-F GAMING ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(127, '127.jpg', 'Asus ROG Crosshair VIII Dark Hero ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black/Silver', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(128, '128.jpg', 'Gigabyte B450M DS3H V2 Micro ATX AM4 Motherboard', 'Motherboard', 'Gigabyte', NULL, NULL, 'Black', '9.60', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(129, '129.jpg', 'MSI MPG B550 GAMING EDGE WIFI ATX AM4 Motherboard', 'Motherboard', 'MSI', NULL, NULL, 'Black/Silver', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(130, '130.jpg', 'MSI MPG Z490 GAMING EDGE WIFI ATX LGA1200 Motherboard', 'Motherboard', 'MSI', NULL, NULL, 'Black/Silver', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(131, '131.jpg', 'Asus PRIME B560-PLUS ATX LGA1200 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(132, '132.jpg', 'MSI MPG B550 GAMING PLUS ATX AM4 Motherboard', 'Motherboard', 'MSI', NULL, NULL, 'Black', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(133, '133.jpg', 'Asus ROG STRIX B550-F GAMING ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '12.00', '9.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(134, '134.jpg', 'Gigabyte B450 I AORUS PRO WIFI Mini ITX AM4 Motherboard', 'Motherboard', 'Gigabyte', NULL, NULL, 'Black/Silver', '6.69', '6.69', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(135, '135.jpg', 'EVGA GeForce RTX 3060 12 GB XC GAMING Video Card', 'Graphics Card', 'EVGA', NULL, NULL, 'Black', '7.94', '4.92', '4.33', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(136, '136.jpg', 'MSI GeForce GTX 1050 Ti 4 GB Video Card', 'Graphics Card', '\r\nMSI', NULL, NULL, 'Black', '9.02', '5.16', '1.54', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(137, '137.jpg', 'MSI GeForce RTX 3060 12 GB GAMING X Video Card', 'Graphics Card', 'MSI', NULL, NULL, 'Black/Silver', '10.87', '5.16', '2.01', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(138, '138.jpg', 'NVIDIA GeForce RTX 3060 Ti 8 GB Founders Edition Video Card', 'Graphics Card', '\r\nNVIDIA', NULL, NULL, 'Black/Silver', '9.50', '4.40', '1.38', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(139, '139.jpg', 'Asus GeForce RTX 2060 6 GB DUAL EVO OC Video Card', 'Graphics Card', '\r\nAsus', NULL, NULL, 'Black', '9.53', '5.12', '2.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(140, '140.jpg', 'NVIDIA GeForce RTX 3070 8 GB Founders Edition Video Card', 'Graphics Card', '\r\nNVIDIA', NULL, NULL, 'Black', '9.53', '4.40', '1.38', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(141, '141.jpg', 'NVIDIA GeForce RTX 3080 10 GB Founders Edition Video Card', 'Graphics Card', 'NVIDIA', NULL, NULL, 'Black', '11.20', '4.40', '1.38', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(142, '142.jpg', 'EVGA GeForce RTX 3070 Ti 8 GB FTW3 ULTRA GAMING Video Card', 'Graphics Card', '\r\nEVGA', NULL, NULL, 'Black', '11.81', '2.75', '5.38', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(143, '143.jpg', 'EVGA GeForce RTX 3090 24 GB FTW3 ULTRA GAMING Video Card', 'Graphics Card', 'EVGA', NULL, NULL, 'Black', '11.81', '2.75', '5.38', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(144, '144.jpg', 'MSI GeForce GTX 1660 SUPER 6 GB GAMING X Video Card', 'Graphics Card', 'MSI', NULL, NULL, 'Black', '9.72', '5.00', '1.81', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(145, '145.jpg', 'Asus GeForce GTX 1660 SUPER 6 GB TUF GAMING OC Video Card', 'Graphics Card', 'Asus', NULL, NULL, 'Black', '8.10', '4.90', '1.80', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(146, '146.jpg', 'Asus GeForce RTX 3090 24 GB ROG STRIX WHITE OC Video Card', 'Graphics Card', 'Asus', NULL, NULL, 'White', '12.53', '5.51', '2.27', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(147, '147.jpg', 'MSI GeForce GTX 1650 SUPER 4 GB GAMING X Video Card', 'Graphics Card', '\r\nMSI', NULL, NULL, 'Black', '9.76', '5.00', '1.73', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(148, '148.jpg', 'MSI GeForce RTX 2060 6 GB VENTUS OC Video Card', 'Graphics Card', 'MSI', NULL, NULL, 'Silver/Black', '8.90', '5.04', '1.61', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(149, '149.jpg', 'Gigabyte GeForce GTX 1660 SUPER 6 GB OC Video Card', 'Graphics Card', 'Gigabyte', NULL, NULL, 'Black/Silver', '8.86', '4.80', '1.57', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(150, '150.jpg', 'MSI GeForce GTX 1660 Ti 6 GB VENTUS XS OC Video Card', 'Graphics Card', 'MSI', NULL, NULL, 'Silver/Black', '8.03', '5.04', '1.65', '2021-09-16 16:00:00', '2021-09-16 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `computer_cases`
--

CREATE TABLE `computer_cases` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power_supply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `power_supply_shroud` tinyint(1) NOT NULL,
  `side_panel_window` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `water_cooled_support` tinyint(1) DEFAULT NULL,
  `cooler_clearance` decimal(8,2) DEFAULT NULL,
  `graphics_clearance` decimal(8,2) DEFAULT NULL,
  `psu_clearance` decimal(8,2) DEFAULT NULL,
  `full_height_e_slot` tinyint(4) DEFAULT NULL,
  `half_height_e_slot` tinyint(4) DEFAULT NULL,
  `external_525_bay` tinyint(4) DEFAULT NULL,
  `external_350_bay` tinyint(4) DEFAULT NULL,
  `internal_350_bay` tinyint(4) DEFAULT NULL,
  `internal_250_bay` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `computer_cases`
--

INSERT INTO `computer_cases` (`component_id`, `case_type`, `power_supply`, `power_supply_shroud`, `side_panel_window`, `water_cooled_support`, `cooler_clearance`, `graphics_clearance`, `psu_clearance`, `full_height_e_slot`, `half_height_e_slot`, `external_525_bay`, `external_350_bay`, `internal_350_bay`, `internal_250_bay`, `created_at`, `updated_at`) VALUES
(20, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '8.43', '12.60', '6.30', 7, 0, 0, 0, 2, 4, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(21, 'Micro ATX', '0', 0, 'Acrylic Window', NULL, '6.10', '13.39', NULL, 4, 0, 0, 0, 1, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(22, 'Micro ATX', '0', 0, 'Acrylic Window', NULL, '16.50', '34.00', NULL, 4, 0, 0, 0, 1, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(104, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '6.50', '15.00', NULL, 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(105, 'ATX Mid Tower', '0', 1, 'Tinted Tempered Glass', NULL, '6.69', '14.17', '8.66', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(106, 'ATX Mid Tower', '0', 0, 'Tempered Glass', NULL, '6.50', '15.00', NULL, 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(107, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '6.50', '13.98', '7.87', 7, 0, 0, 0, 2, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(108, 'ATX Full Tower', '0', 1, 'Tempered Glass', 1, '6.10', '16.54', '10.04', 8, 0, 0, 0, 2, 4, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(109, 'ATX Mid Tower', '0', 1, 'Tinted Tempered Glass', NULL, '6.69', '14.17', '8.66', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(110, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '6.30', '16.54', '10.70', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(111, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '6.93', '15.12', '8.27', 7, 0, 0, 0, 3, 6, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(112, 'ATX Full Tower', '0', 1, 'Temepered Glass', 1, '6.10', '16.54', '10.04', 8, 0, 0, 0, 2, 4, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(113, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '6.69', '14.17', '8.66', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(114, 'ATX Mid Tower', '0', 1, 'Tinted Tempered Glass', NULL, '6.69', '12.40', '6.89', 7, 0, 0, 0, 2, 3, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(115, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '6.69', '14.17', '8.66', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(116, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '6.50', '15.00', '8.27', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(117, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '6.30', '15.75', '9.84', 7, 0, 0, 0, 2, 3, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(118, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '6.69', '15.75', '9.84', 7, 0, 0, 0, 2, 4, '2021-09-16 16:00:00', '2021-09-16 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cpus`
--

CREATE TABLE `cpus` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `cpu_socket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `microarchitecture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_count` tinyint(4) NOT NULL,
  `thread_count` tinyint(4) NOT NULL,
  `base_clock` decimal(8,2) NOT NULL,
  `boost_clock` decimal(8,2) DEFAULT NULL,
  `max_mem_support` int(11) DEFAULT NULL,
  `tdp` smallint(6) NOT NULL,
  `smt_support` tinyint(1) NOT NULL,
  `ecc_support` tinyint(1) NOT NULL,
  `integrated_graphics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpus`
--

INSERT INTO `cpus` (`component_id`, `cpu_socket`, `microarchitecture`, `core_count`, `thread_count`, `base_clock`, `boost_clock`, `max_mem_support`, `tdp`, `smt_support`, `ecc_support`, `integrated_graphics`, `created_at`, `updated_at`) VALUES
(4, 'AM4', 'Zen 2', 6, 12, '3.60', '4.20', 128, 65, 1, 0, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(23, 'AM4', 'Zen3', 6, 12, '3.70', '4.60', 128, 65, 1, 0, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(24, 'AM4', 'Zen2 ', 8, 16, '3.60', '4.40', 128, 65, 1, 0, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(25, 'AM4', 'Zen 3', 8, 16, '3.80', '4.70', 128, 105, 1, 0, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(26, 'AM4', 'Zen 3', 12, 24, '3.70', '4.80', 128, 105, 1, 0, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(27, 'LGA1200', 'Comet Lake', 8, 16, '3.80', '5.10', 128, 125, 1, 0, 'Intel UHD Graphics 630', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(28, 'LGA1200', 'Comet Lake', 6, 12, '2.90', '4.30', 128, 65, 1, 0, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(29, 'AM4', 'Zen 3', 16, 32, '3.40', '4.90', 128, 105, 1, 0, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(30, 'AM4', 'Zen 3', 6, 12, '3.90', '4.40', 128, 65, 1, 0, 'Radeon Vega 7', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(31, 'AM4', 'Zen +', 6, 12, '3.40', '3.90', 64, 65, 1, 0, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(32, 'LGA1200', 'Comet Lake', 6, 12, '4.10', '4.80', 128, 125, 1, 0, 'Intel UHD Graphics 630', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(33, 'LGA1200', 'Rocket Lake', 8, 16, '3.60', '5.00', 128, 125, 1, 0, 'Intel UHD Graphics 750', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(34, 'AM4', 'Zen 2', 4, 8, '3.80', '4.30', 128, 65, 1, 0, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(35, 'LGA1200', 'Comet Lake', 10, 16, '3.70', '5.30', 128, 125, 1, 0, 'Intel UHD Graphics 630', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(36, 'LGA1200', 'Rocket Lake', 8, 16, '3.50', '5.30', 128, 125, 1, 0, 'Intel UHD Graphics 750', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(37, 'LGA1200', 'Comet Lake', 4, 8, '3.60', '4.30', 128, 65, 1, 0, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cpu_coolers`
--

CREATE TABLE `cpu_coolers` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `fan_speed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noise_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `water_cooled_support` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpu_coolers`
--

INSERT INTO `cpu_coolers` (`component_id`, `fan_speed`, `noise_level`, `water_cooled_support`, `created_at`, `updated_at`) VALUES
(58, '2000', '36', 'No', NULL, NULL),
(59, '2000', '30', 'No', NULL, NULL),
(60, '1800', '27', 'Yes', NULL, NULL),
(61, '2000', '36', 'Yes', NULL, NULL),
(62, '2400', '37', 'Yes', NULL, NULL),
(63, '2000', '26', 'No', NULL, NULL),
(64, '1800', '36', 'Yes', NULL, NULL),
(65, '2400', '37', 'Yes', NULL, NULL),
(66, '1500', '24.6', 'No', NULL, NULL),
(67, '1500', '24.3', 'No', NULL, NULL),
(68, '2000', '38', 'Yes', NULL, NULL),
(69, '2400', '37', 'Yes', NULL, NULL),
(70, '1800', '38', 'Yes', NULL, NULL),
(71, '1500', '22.4', 'No', NULL, NULL),
(72, '1500', '24.6', 'No', NULL, NULL),
(73, '2400', '37', 'Yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cpu_sockets`
--

CREATE TABLE `cpu_sockets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `graphics_cards`
--

CREATE TABLE `graphics_cards` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `gpu_chipset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpu_memory` decimal(8,2) NOT NULL,
  `gpu_memory_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_clock` decimal(8,2) NOT NULL,
  `boost_clock` decimal(8,2) DEFAULT NULL,
  `interface` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tdp` smallint(6) NOT NULL,
  `multigraphics_support` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frame_sync` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dvi_port` tinyint(4) DEFAULT NULL,
  `hdmi_port` tinyint(4) DEFAULT NULL,
  `mini_hdmi_port` tinyint(4) DEFAULT NULL,
  `displayport_port` tinyint(4) DEFAULT NULL,
  `mini_displayport_port` tinyint(4) DEFAULT NULL,
  `e_slot_width` tinyint(4) DEFAULT NULL,
  `external_power` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cooling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `graphics_cards`
--

INSERT INTO `graphics_cards` (`component_id`, `gpu_chipset`, `gpu_memory`, `gpu_memory_type`, `base_clock`, `boost_clock`, `interface`, `tdp`, `multigraphics_support`, `frame_sync`, `dvi_port`, `hdmi_port`, `mini_hdmi_port`, `displayport_port`, `mini_displayport_port`, `e_slot_width`, `external_power`, `cooling`, `created_at`, `updated_at`) VALUES
(1, ' NVIDIA® GeForce RTX™ 3060', '12.00', 'GDDR6', '1.32', '1.85', 'PCIe x16', 170, '4', 'G-Sync', 0, 2, 0, 3, 0, 3, '1 PCIe 8-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(2, ' NVIDIA® GeForce GTX 1660 SUPER', '6.00', 'GDDR6', '1.53', '1.85', 'PCIe x16', 125, '3', 'G-Sync', 1, 1, 0, 1, 0, 2, '1 PCIe 8-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(3, ' NVIDIA® GeForce GTX 1660 SUPER', '6.00', 'GDDR6', '1.53', '1.83', 'PCIe x16', 125, '3', 'G-Sync', 1, 1, 0, 1, 0, 2, '1 PCIe 8-pin', '1 Fan', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(135, ' NVIDIA® GeForce RTX™ 3060', '12.00', 'GDDR6', '1.32', '1.88', 'PCIe x16', 170, NULL, 'G-Sync', 0, 1, 0, 3, 0, 2, '1 PCIe 8-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(136, ' NVIDIA® GeForce GTX™ 1050TI', '4.00', 'GDDR5', '1.34', '1.46', 'PCIe x16', 75, '3', 'G-Sync', 1, 1, 0, 1, 0, 2, NULL, '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(137, ' NVIDIA® GeForce RTX™ 3060', '12.00', 'GDDR6', '1.32', '1.84', 'PCIe x16', 170, '4', 'G-Sync', 0, 1, 0, 3, 0, 2, '1 PCIe 8-pin + 1 PCIe 6-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(138, ' NVIDIA® GeForce RTX™ 3060TI', '8.00', 'GDDR6', '1.41', '1.67', 'PCIe x16', 200, '4', 'G-Sync', 0, 1, 0, 3, 0, 2, '1 PCIe 12-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(139, ' NVIDIA® GeForce RTX™ 2060', '6.00', 'GDDR6', '1.37', '1.79', 'PCIe x16', 160, '4', 'G-Sync', 1, 2, 0, 1, 0, 2, '1 PCIe 8-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(140, ' NVIDIA® GeForce RTX™ 3070', '8.00', 'GDDR6', '1.50', '1.73', 'PCIe x16', 220, '4', 'G-Sync', 0, 1, 0, 3, 0, 2, '1 PCIe 12-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(141, ' NVIDIA® GeForce RTX™ 3080', '10.00', 'GDDR6', '1.44', '1.71', 'PCIe x16', 320, '4', 'G-Sync', 0, 1, 0, 3, 0, 2, '1 PCIe 12-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(142, ' NVIDIA® GeForce RTX™ 3070TI', '8.00', 'GDDR6', '1.58', '1.86', 'PCIe x16', 290, '4', 'G-Sync', 0, 1, 0, 3, 0, 2, '2 PCIe 8-pin', '3 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(143, ' NVIDIA® GeForce RTX™ 3070TI', '24.00', 'GDDR6', '1.40', '1.80', 'PCIe x16', 350, '4', 'G-Sync', 0, 1, 0, 3, 0, 2, '3 PCIe 8-pin', '3 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(144, ' NVIDIA® GeForce GTX™ 1660', '6.00', 'GDDR6', '1.53', '1.83', 'PCIe x16', 125, '4', 'G-Sync', 0, 1, 0, 3, 0, 2, '1 PCIe 8-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(145, ' NVIDIA® GeForce GTX™ 1660', '6.00', 'GDDR6', '1.53', '1.85', 'PCIe x16', 125, '3', 'G-Sync', 1, 1, 0, 1, 0, 2, '1 PCIe 8-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(146, ' NVIDIA® GeForce RTX™ 3090', '24.00', 'GDDR6', '1.40', '1.89', 'PCIe x16', 350, '4', 'G-Sync', 0, 2, 0, 3, 0, 2, '3 PCIe 8-pin', '3 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(147, ' NVIDIA® GeForce GTX™ 1650', '4.00', 'GDDR6', '1.53', '1.76', 'PCIe x16', 100, '4', 'G-Sync', 0, 1, 0, 3, 0, 2, '1 PCIe 6-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(148, ' NVIDIA® GeForce RTX™ 2060', '6.00', 'GDDR6', '1.37', '1.71', 'PCIe x16', 160, '4', 'G-Sync', 0, 1, 0, 3, 0, 2, '1 PCIe 8-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(149, ' NVIDIA® GeForce GTX™ 1660', '6.00', 'GDDR6', '1.53', '1.83', 'PCIe x16', 125, '4', 'G-Sync', 0, 1, 0, 3, 0, 2, '1 PCIe 8-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(150, ' NVIDIA® GeForce GTX™ 1660TI', '6.00', 'GDDR6', '1.50', '1.83', 'PCIe x16', 120, '4', 'G-Sync', 0, 1, 0, 3, 0, 2, '1 PCIe 8-pin', '2 Fans', '2021-09-16 16:00:00', '2021-09-16 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `memory_speeds`
--

CREATE TABLE `memory_speeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_08_24_191215_create_components_table', 1),
(4, '2021_08_24_192021_create_motherboards_table', 1),
(5, '2021_08_24_192226_create_cpus_table', 1),
(6, '2021_08_24_192454_create_cpu_coolers_table', 1),
(7, '2021_08_24_192513_create_graphics_cards_table', 1),
(8, '2021_08_24_192526_create_rams_table', 1),
(9, '2021_08_24_192535_create_storages_table', 1),
(10, '2021_08_24_192549_create_psus_table', 1),
(11, '2021_08_24_192601_create_computer_cases_table', 1),
(12, '2021_08_26_054535_create_accounts_table', 1),
(13, '2021_09_04_150038_create_stores_table', 1),
(14, '2021_09_05_160728_create_builds_table', 1),
(15, '2021_09_19_110500_create_cpu_sockets_table', 1),
(16, '2021_09_19_111502_create_socket_coolers_table', 1),
(17, '2021_09_22_121841_create_mobo_form_factors_table', 1),
(18, '2021_09_22_122619_create_mobo_cases_table', 1),
(19, '2021_09_22_134737_create_memory_speeds_table', 1),
(20, '2021_09_22_135436_create_mobo_memory_speeds_table', 1),
(21, '2021_09_26_090657_create_products_table', 1),
(22, '2021_09_26_091908_create_build_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobo_cases`
--

CREATE TABLE `mobo_cases` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `mobo_form_factor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobo_form_factors`
--

CREATE TABLE `mobo_form_factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobo_memory_speeds`
--

CREATE TABLE `mobo_memory_speeds` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `memory_speed_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `motherboards`
--

CREATE TABLE `motherboards` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `cpu_socket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobo_form_factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobo_chipset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memory_slot` tinyint(4) NOT NULL,
  `memory_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_mem_support` int(11) DEFAULT NULL,
  `pcie_x16_slot` tinyint(4) DEFAULT NULL,
  `pcie_x8_slot` tinyint(4) DEFAULT NULL,
  `pcie_x4_slot` tinyint(4) DEFAULT NULL,
  `pcie_x1_slot` tinyint(4) DEFAULT NULL,
  `pci_slot` tinyint(4) DEFAULT NULL,
  `m2_slot` tinyint(4) DEFAULT NULL,
  `sata_6gb_slot` tinyint(4) DEFAULT NULL,
  `sata_3gb_slot` tinyint(4) DEFAULT NULL,
  `multigraphics_support` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ecc_support` tinyint(1) NOT NULL,
  `raid_support` tinyint(1) NOT NULL,
  `wireless_support` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motherboards`
--

INSERT INTO `motherboards` (`component_id`, `cpu_socket`, `mobo_form_factor`, `mobo_chipset`, `memory_slot`, `memory_type`, `max_mem_support`, `pcie_x16_slot`, `pcie_x8_slot`, `pcie_x4_slot`, `pcie_x1_slot`, `pci_slot`, `m2_slot`, `sata_6gb_slot`, `sata_3gb_slot`, `multigraphics_support`, `ecc_support`, `raid_support`, `wireless_support`, `created_at`, `updated_at`) VALUES
(5, 'AM4', 'ATX', 'AMD® X570 Chipset', 4, 'DDR4', 128, 2, 0, 0, 2, 0, 2, 3, 0, '0', 0, 1, 'Wi-Fi 6', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(6, 'AM4', 'ATX', 'AMD® X570 Chipset', 4, 'DDR4', 128, 2, 0, 0, 2, 0, 2, 6, 0, '0', 0, 1, 'Wi-Fi 6', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(7, 'AM4', 'ATX', 'AMD® X570 Chipset', 4, 'DDR4', 128, 2, 0, 0, 3, 0, 2, 0, 0, '0', 0, 1, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(8, 'AM4', 'Micro ATX', ' AMD B550', 4, 'DDR4', 128, 1, 0, 0, 2, 0, 0, 4, 0, '0', 0, 1, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(9, 'AM4', 'Micro ATX', ' AMD B550', 4, 'DDR4', 128, 2, 0, 0, 1, 0, 2, 4, 0, '0', 0, 1, 'Wi-Fi 5', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(10, 'AM4', 'Micro ATX', ' AMD B550', 4, 'DDR4', 64, 2, 0, 0, 1, 0, 2, 6, 0, '0', 0, 1, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(11, 'AM4', 'Micro ATX', 'AMD A320', 2, 'DDR4', 32, 1, 0, 0, 2, 0, 1, 4, 0, '0', 0, 1, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(119, 'AM4', 'ATX', 'AMD® X570 Chipset', 4, 'DDR4', 128, 2, 0, 0, 1, 0, 2, 8, 0, '0', 0, 1, 'Wi-Fi 5', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(120, 'AM4', 'ATX', 'AMD® B550 Chipset', 4, 'DDR4', 128, 2, 0, 0, 1, 0, 2, 6, 0, '0', 0, 1, 'Wi-Fi 6', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(121, 'AM4', 'ATX', 'AMD® B450 Chipset', 4, 'DDR4', 64, 2, 0, 0, 3, 0, 1, 6, 0, '0', 0, 1, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(122, 'AM4', 'Micro ATX', 'AMD® B450M Chipset', 4, 'DDR4', 64, 2, 0, 0, 1, 0, 2, 4, 0, '0', 0, 1, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(123, 'AM4', 'ATX', 'AMD® X570 Chipset', 4, 'DDR4', 128, 3, 0, 0, 2, 0, 2, 8, 0, '0', 0, 1, 'Wi-Fi 6', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(124, 'LGA1200', 'ATX', 'Intel Z490 Chipset', 4, 'DDR4', 128, 2, 0, 0, 3, 0, 3, 6, 0, '0', 0, 1, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(125, 'AM4', 'Micro ATX', 'AMD B550 Chipset', 4, 'DDR4', 128, 1, 0, 0, 2, 0, 2, 4, 0, '0', 0, 1, 'Wi-Fi 5', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(126, 'AM4', 'Micro ATX', 'AMD B450 Chipset', 4, 'DDR4', 64, 3, 0, 0, 3, 0, 2, 6, 0, '0', 0, 1, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(127, 'AM4', 'ATX', 'AMD X570 Chipset', 4, 'DDR4', 128, 3, 0, 0, 1, 0, 2, 8, 0, '0', 0, 1, 'Wi-Fi 6', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(128, 'AM4', 'Micro ATX', 'AMD B450 Chipset', 4, 'DDR4', 128, 2, 0, 0, 1, 0, 1, 4, 0, '0', 0, 1, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(129, 'AM4', 'ATX', 'AMD B550 Chipset', 4, 'DDR4', 128, 2, 0, 0, 2, 0, 3, 6, 0, '0', 0, 1, 'Wi-Fi 6', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(130, 'LGA1200', 'ATX', 'Intel Z490 Chipset', 4, 'DDR4', 128, 2, 0, 0, 2, 0, 3, 6, 0, '0', 0, 1, 'Wi-Fi 6', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(131, 'LGA1200', 'ATX', 'Intel B560 Chipset', 4, 'DDR4', 128, 2, 0, 0, 2, 0, 3, 6, 0, '0', 0, 1, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(132, 'AM4', 'ATX', 'AMD B550 Chipset', 4, 'DDR4', 128, 2, 0, 0, 2, 0, 2, 6, 0, '0', 0, 1, '0', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(133, 'AM4', 'ATX', 'AMD B550 Chipset', 4, 'DDR4', 128, 2, 0, 0, 3, 0, 2, 6, 0, '0', 0, 1, 'Wi-Fi 6', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(134, 'AM4', 'Mini ITX', 'AMD B450 Chipset', 2, 'DDR4', 64, 1, 0, 0, 0, 0, 2, 4, 0, '0', 0, 1, 'Wi-Fi 5', '2021-09-16 16:00:00', '2021-09-16 16:00:00');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `psus`
--

CREATE TABLE `psus` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `psu_form_factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wattage` int(11) NOT NULL,
  `efficiency_rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atx_connector` tinyint(4) DEFAULT NULL,
  `eps_connector` tinyint(4) DEFAULT NULL,
  `sata_connector` tinyint(4) DEFAULT NULL,
  `molex_4pin_connector` tinyint(4) DEFAULT NULL,
  `pcie_8pin_connector` tinyint(4) DEFAULT NULL,
  `pcie_6+2pin_connector` tinyint(4) DEFAULT NULL,
  `pcie_6pin_connector` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `psus`
--

INSERT INTO `psus` (`component_id`, `psu_form_factor`, `wattage`, `efficiency_rating`, `modular`, `atx_connector`, `eps_connector`, `sata_connector`, `molex_4pin_connector`, `pcie_8pin_connector`, `pcie_6+2pin_connector`, `pcie_6pin_connector`, `created_at`, `updated_at`) VALUES
(13, 'ATX', 650, '80+ Bronze', 'No', 0, 2, 5, 4, 0, 4, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(14, 'ATX', 550, '80+ Bronze', 'No', 0, 0, 5, 0, 0, 2, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(15, '', 600, '80+ Bronze', 'No', 0, 0, 0, 0, 0, 0, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(89, 'ATX', 500, '80+ Bronze', 'No', 0, 2, 6, 3, 0, 2, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(90, 'ATX', 1600, '80+ Titanium', 'Yes', 0, 2, 5, 3, 0, 8, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(91, 'ATX', 750, '80+ Gold', 'Yes', 0, 2, 8, 3, 0, 4, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(92, 'ATX', 500, '80+ Bronze', 'No', 0, 1, 6, 3, 0, 0, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(93, 'ATX', 1000, '80+ Platinum', 'Yes', 0, 2, 16, 8, 0, 0, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(94, 'ATX', 850, '80+ Gold', 'Yes', 0, 2, 9, 4, 0, 6, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(95, 'ATX', 650, '80+ Bronze', 'No', 0, 1, 6, 4, 0, 2, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(96, 'ATX', 750, '80+ Gold', 'Yes', 0, 2, 10, 4, 0, 6, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(97, 'ATX', 600, '80+ Bronze', 'No', 0, 1, 6, 3, 0, 2, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(98, 'ATX', 850, '80+ Gold', 'Yes', 0, 2, 12, 4, 0, 6, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(99, 'ATX', 650, '80+ Gold', 'Yes', 0, 1, 9, 4, 0, 6, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(100, 'ATX', 650, '80+ Gold', 'Yes', 0, 2, 6, 4, 0, 4, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(101, 'ATX', 750, '80+ Platinum', 'Yes', 0, 2, 8, 3, 0, 4, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(102, 'ATX', 850, '80+ Gold', 'Yes', 0, 3, 14, 4, 0, 4, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(103, 'ATX', 750, '80+ Gold', 'Yes', 0, 2, 6, 4, 0, 3, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rams`
--

CREATE TABLE `rams` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `memory_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memory_speed` int(11) NOT NULL,
  `memory_capacity` int(11) NOT NULL,
  `memory_form_factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modules` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memory_voltage` decimal(8,2) DEFAULT NULL,
  `memory_timings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ecc` tinyint(1) NOT NULL,
  `registered` tinyint(1) NOT NULL,
  `heat_spreader` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rams`
--

INSERT INTO `rams` (`component_id`, `memory_type`, `memory_speed`, `memory_capacity`, `memory_form_factor`, `modules`, `memory_voltage`, `memory_timings`, `ecc`, `registered`, `heat_spreader`, `created_at`, `updated_at`) VALUES
(12, 'DDR4', 3200, 16, '288-pin DIMM', '2', '1.35', NULL, 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(74, 'DDR4', 3200, 16, '288-pin DIMM', '2', '1.35', '16-18-18-36', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(75, 'DDR4', 3200, 16, '288-pin DIMM', '2', '1.35', '16-18-18-36', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(76, 'DDR4', 3600, 16, '288-pin DIMM', '2', '1.35', '16-18-18-38', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(77, 'DDR4', 3200, 16, '288-pin DIMM', '2', '1.35', NULL, 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(78, 'DDR4', 3600, 16, '288-pin DIMM', '2', '1.35', '18-22-22-42', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(79, 'DDR4', 3200, 16, '288-pin DIMM', '2', '1.35', '16-18-18-36', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(80, 'DDR4', 3600, 32, '288-pin DIMM', '2', '1.35', '18-22-22-42', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(81, 'DDR4', 3600, 32, '288-pin DIMM', '2', '1.35', '16-19-19-39', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(82, 'DDR4', 3600, 16, '288-pin DIMM', '2', '1.35', '18-22-22-42', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(83, 'DDR4', 3600, 32, '288-pin DIMM', '2', '1.35', '18-22-22-42', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(84, 'DDR4', 3200, 16, '288-pin DIMM', '2', '1.35', '16-18-18-38', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(85, 'DDR4', 3200, 16, '288-pin DIMM', '2', '1.35', NULL, 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(86, 'DDR4', 3600, 16, '288-pin DIMM', '2', '1.35', '16-19-19-39', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(87, 'DDR4', 3200, 128, '288-pin DIMM', '8', '1.35', '16-18-18-36', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(88, 'DDR4', 3200, 32, '288-pin DIMM', '2', '1.35', '16-18-18-36', 0, 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `socket_coolers`
--

CREATE TABLE `socket_coolers` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `cpu_socket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storages`
--

CREATE TABLE `storages` (
  `component_id` bigint(20) UNSIGNED NOT NULL,
  `storage_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_capacity` int(11) NOT NULL,
  `interface` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_form_factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_cache` int(11) DEFAULT NULL,
  `nvme` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storages`
--

INSERT INTO `storages` (`component_id`, `storage_type`, `storage_capacity`, `interface`, `storage_form_factor`, `storage_cache`, `nvme`, `created_at`, `updated_at`) VALUES
(16, 'HDD', 1024, 'SATA 6 Gb/s', '3.5', 64, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(17, 'M.2', 240, 'M.2 ', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(18, 'SSD', 480, 'SATA 6 Gb/s', '2.5', 0, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(19, 'SSD', 240, 'SATA 6 Gb/s', '2.5', 0, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(38, 'HDD', 2048, 'SATA 6GBS', '2.5', 256, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(39, 'M.2', 1024, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(40, 'M.2', 1024, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(41, 'M.2', 500, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(42, 'M.2', 1024, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(43, 'M.2', 1024, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(44, 'M.2', 2048, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(45, 'HDD', 1024, 'SATA 6GBS', '2.5', 64, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(46, 'M.2', 2048, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(47, 'M.2', 500, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(48, 'SSD', 1024, 'SATA 6GBS', '2.5', 1024, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(49, 'SSD', 7680, 'SATA 6GBS', '2.5', 0, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(50, 'HDD', 1024, 'SATA 6GBS', '3.5', 64, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(51, 'SSD', 240, 'SATA 6GBS', '2.5', 0, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(52, 'M.2', 1024, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(53, 'M.2', 500, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(54, 'M.2', 500, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(55, 'M.2', 1024, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(56, 'M.2', 500, 'M.2', 'M.2', 0, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(57, 'HDD', 4000, 'SATA 6GBS', '3.5', 256, 0, '2021-09-16 16:00:00', '2021-09-16 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_motherboards` bigint(20) DEFAULT NULL,
  `featured_cpus` bigint(20) DEFAULT NULL,
  `featured_cpu_coolers` bigint(20) DEFAULT NULL,
  `featured_graphics_cards` bigint(20) DEFAULT NULL,
  `featured_rams` bigint(20) DEFAULT NULL,
  `featured_storages` bigint(20) DEFAULT NULL,
  `featured_psus` bigint(20) DEFAULT NULL,
  `featured_computer_cases` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `builds`
--
ALTER TABLE `builds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `builds_account_id_foreign` (`account_id`);

--
-- Indexes for table `build_products`
--
ALTER TABLE `build_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `build_products_build_id_foreign` (`build_id`),
  ADD KEY `build_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `computer_cases`
--
ALTER TABLE `computer_cases`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `cpus`
--
ALTER TABLE `cpus`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `cpu_coolers`
--
ALTER TABLE `cpu_coolers`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `cpu_sockets`
--
ALTER TABLE `cpu_sockets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graphics_cards`
--
ALTER TABLE `graphics_cards`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `memory_speeds`
--
ALTER TABLE `memory_speeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobo_cases`
--
ALTER TABLE `mobo_cases`
  ADD PRIMARY KEY (`component_id`,`mobo_form_factor_id`),
  ADD KEY `mobo_cases_mobo_form_factor_id_foreign` (`mobo_form_factor_id`);

--
-- Indexes for table `mobo_form_factors`
--
ALTER TABLE `mobo_form_factors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobo_memory_speeds`
--
ALTER TABLE `mobo_memory_speeds`
  ADD PRIMARY KEY (`component_id`,`memory_speed_id`),
  ADD KEY `mobo_memory_speeds_memory_speed_id_foreign` (`memory_speed_id`);

--
-- Indexes for table `motherboards`
--
ALTER TABLE `motherboards`
  ADD PRIMARY KEY (`component_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_store_id_foreign` (`store_id`),
  ADD KEY `products_component_id_foreign` (`component_id`);

--
-- Indexes for table `psus`
--
ALTER TABLE `psus`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `rams`
--
ALTER TABLE `rams`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `socket_coolers`
--
ALTER TABLE `socket_coolers`
  ADD PRIMARY KEY (`component_id`,`cpu_socket_id`),
  ADD KEY `socket_coolers_cpu_socket_id_foreign` (`cpu_socket_id`);

--
-- Indexes for table `storages`
--
ALTER TABLE `storages`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stores_account_id_foreign` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `builds`
--
ALTER TABLE `builds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `build_products`
--
ALTER TABLE `build_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `cpu_sockets`
--
ALTER TABLE `cpu_sockets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memory_speeds`
--
ALTER TABLE `memory_speeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mobo_form_factors`
--
ALTER TABLE `mobo_form_factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `builds`
--
ALTER TABLE `builds`
  ADD CONSTRAINT `builds_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `build_products`
--
ALTER TABLE `build_products`
  ADD CONSTRAINT `build_products_build_id_foreign` FOREIGN KEY (`build_id`) REFERENCES `builds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `build_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `computer_cases`
--
ALTER TABLE `computer_cases`
  ADD CONSTRAINT `computer_cases_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cpus`
--
ALTER TABLE `cpus`
  ADD CONSTRAINT `cpus_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cpu_coolers`
--
ALTER TABLE `cpu_coolers`
  ADD CONSTRAINT `cpu_coolers_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `graphics_cards`
--
ALTER TABLE `graphics_cards`
  ADD CONSTRAINT `graphics_cards_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobo_cases`
--
ALTER TABLE `mobo_cases`
  ADD CONSTRAINT `mobo_cases_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mobo_cases_mobo_form_factor_id_foreign` FOREIGN KEY (`mobo_form_factor_id`) REFERENCES `mobo_form_factors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobo_memory_speeds`
--
ALTER TABLE `mobo_memory_speeds`
  ADD CONSTRAINT `mobo_memory_speeds_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mobo_memory_speeds_memory_speed_id_foreign` FOREIGN KEY (`memory_speed_id`) REFERENCES `memory_speeds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `motherboards`
--
ALTER TABLE `motherboards`
  ADD CONSTRAINT `motherboards_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `psus`
--
ALTER TABLE `psus`
  ADD CONSTRAINT `psus_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rams`
--
ALTER TABLE `rams`
  ADD CONSTRAINT `rams_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `socket_coolers`
--
ALTER TABLE `socket_coolers`
  ADD CONSTRAINT `socket_coolers_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `socket_coolers_cpu_socket_id_foreign` FOREIGN KEY (`cpu_socket_id`) REFERENCES `cpu_sockets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `storages`
--
ALTER TABLE `storages`
  ADD CONSTRAINT `storages_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
