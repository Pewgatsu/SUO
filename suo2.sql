-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2021 at 10:46 PM
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
(1, '1.jpg', 'Asus RTX 3060 KO OC V2 LHR', 'Graphics Card', 'ASUS', NULL, NULL, 'Black/Silver', '698.50', '342.90', '137.16', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(2, '2.jpg', 'Asus GeForce GTX 1660 SUPER 6 GB TUF GAMING OC Video Card', 'Graphics Card', 'ASUS', NULL, NULL, 'Black', '523.24', '314.96', '116.84', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(3, '3.jpg', 'Asus GTX 1660 Super Phoenix OC', 'Graphics Card', 'ASUS', NULL, NULL, 'Black/White', '441.96', '307.34', '99.06', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(4, '4.jpg', 'AMD Ryzen 5 3600 3.6 GHz 6-Core CPU', 'CPU', 'AMD', 'AMD Ryzen 5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(5, '5.jpg', 'MSI MPG X570 Gaming Pro Carbon Wifi', 'Motherboard', 'MSI', NULL, NULL, 'Black/Silver', '304.80', '228.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(6, '6.jpg', 'MSI MAG X570 Tomahawk Wifi', 'Motherboard', 'MSI', NULL, NULL, 'Black', '304.80', '228.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(7, '7.jpg', 'Gigabyte X570 Gaming X', 'Motherboard', 'Gigabyte', NULL, NULL, 'Black / Silver', '304.80', '228.60', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(8, '8.jpg', 'Asus PRIME B550M-K Micro ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black / White', '244.09', '244.09', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(9, '9.jpg', 'Gigabyte B550M DS3H AC Micro ATX AM4 Motherboard', 'Motherboard', 'Gigabyte', NULL, NULL, 'Black', '244.09', '244.09', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(10, '10.jpg', 'Asus TUF B450M-PRO GAMING Micro ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '244.09', '244.09', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(11, '11.jpg', 'Asus PRIME A320M-K Micro ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, NULL, '226.06', '220.98', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(12, '12.jpg', 'G.Skill Ripjaws V Series 16 GB (2 x 8 GB) DDR4-3200 CL16 RAM', 'RAM', 'G.Skill', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(13, '13.jpg', 'Asus TUF Gaming 650 W 80+ Bronze Certified ATX Power Supply', 'PSU', 'ASUS', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(14, '14.jpg', 'Asus TUF Gaming 550w Bronze', 'PSU', 'ASUS', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(15, '15.jpg', 'Intelligent Awake AK600W Bronze', 'PSU', 'Intelligent Awake', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(16, '16.jpg', 'Seagate BarraCuda 1 TB 3.5\" 7200RPM Internal Hard Drive', 'Storage', 'Seagate', NULL, NULL, NULL, NULL, '88.90', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(17, '17.jpg', 'Kingston A400 240GB M.2', 'Storage', 'Kingston', NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(18, '18.jpg', 'Team GX1 480 GB 2.5\" Solid State Drive', 'Storage', 'Team GX1', NULL, NULL, NULL, NULL, '63.50', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(19, '19.jpg', 'Team GX1 240 GB 2.5\" Solid State Drive', 'Storage', 'Team GX1', NULL, NULL, NULL, NULL, '63.50', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(20, '20.jpg', 'Asus TUF Gaming GT301 ATX Mid Tower Computer Case', 'Computer Case', 'ASUS', NULL, NULL, 'Black', '425.96', '214.12', '482.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(21, '21.jpg', 'Rakk Kisig', 'Computer Case', 'Rakk', NULL, NULL, 'Black', '370.07', '184.91', '379.98', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(22, '22.jpg', 'Rakk Marug', 'Computer Case', 'Rakk', NULL, NULL, 'Black', '370.07', '184.91', '379.98', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(23, '23.jpg', 'AMD Ryzen 5 5600X 3.7 GHz 6-Core CPU', 'CPU', 'AMD', 'AMD Ryzen 5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(24, '24.jpg', 'AMD Ryzen 7 3700X 3.6 GHz 8-Core CPU', 'CPU', 'AMD', 'AMD Ryzen 7', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(25, '25.jpg', 'AMD Ryzen 7 5800X 3.8 GHz 8-Core CPU', 'CPU', 'AMD', 'AMD Ryzen 7', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(26, '26.jpg', 'AMD Ryzen 9 5900X 3.7 GHz 12-Core CPU', 'CPU', 'AMD', 'AMD Ryzen 9', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(27, '27.jpg', 'Intel Core i7-10700K 3.8 GHz 8-Core CPU', 'CPU', 'Intel', 'Intel Core i7', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(28, '28.jpg', 'Intel Core i5-10400F 2.9 GHz 6-Core CPU', 'CPU', 'Intel', 'Intel Core i5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(29, '29.jpg', 'AMD Ryzen 9 5950X 3.4 GHz 16-Core CPU', 'CPU', 'AMD', 'AMD Ryzen 9', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(30, '30.jpg', 'AMD Ryzen 5 5600G 3.9 GHz 6-Core CPU', 'CPU', 'AMD', 'AMD Ryzen 5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(31, '31.jpg', 'AMD Ryzen 5 2600 3.4 GHz 6-Core CPU\r\n', 'CPU', 'AMD', 'AMD Ryzen 5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(32, '32.jpg', 'Intel Core i5-10600K 4.1 GHz 6-Core CPU', 'CPU', 'Intel', 'Intel Core i5', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(33, '33.jpg', 'Intel Core i7-11700K 3.6 GHz 8-Core CPU', 'CPU', 'Intel', 'Intel Core i7', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(34, '34.jpg', 'AMD Ryzen 3 3300X 3.8 GHz Quad-Core CPU', 'CPU', 'AMD', 'AMD Ryzen 3', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(35, '35.jpg', 'Intel Core i9-10900K 3.7 GHz 10-Core CPU', 'CPU', 'Intel', 'Intel Core i9', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(36, '36.jpg', 'Intel Core i9-11900K 3.5 GHz 8-Core CPU', 'CPU', 'Intel', 'Intel Core i9', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(37, '37.jpg', 'Intel Core i3-10100F 3.6 GHz Quad-Core CPU', 'CPU', 'Intel', 'Intel Core i3', NULL, NULL, NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(38, '38.jpg', 'Seagate Barracuda Compute 2 TB 3.5\" 7200RPM Internal Hard Drive', 'Storage', 'Seagate', NULL, NULL, NULL, NULL, '88.90', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(39, '39.jpg', 'Samsung 970 Evo Plus 1 TB M.2-2280 NVME Solid State Drive\r\n', 'Storage', 'Samsung', NULL, NULL, NULL, '80.26', '22.86', '22.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(40, '40.jpg', 'Western Digital Blue SN550 1 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Western Digital', NULL, NULL, NULL, '80.01', '22.09', '2.28', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(41, '41.jpg', 'Western Digital Blue 500 GB M.2-2280 Solid State Drive', 'Storage', 'Western Digital', NULL, NULL, NULL, '80.01', '22.09', '2.28', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(42, '42.jpg', 'Samsung 980 Pro 1 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '80.01', '23.87', '22.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(43, '43.jpg', 'Samsung 980 1 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '80.01', '22.09', '2.28', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(44, '44.jpg', 'Samsung 970 EVO Plus 2 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '80.26', '2.28', '22.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(45, '45.jpg', 'Western Digital Caviar Blue 1 TB 3.5\" 7200RPM Internal Hard Driv', 'Storage', 'Western Digital', NULL, NULL, NULL, NULL, '88.90', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(46, '46.jpg', 'Samsung 980 Pro 2 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '80.01', '23.87', '22.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(47, '47.jpg', 'Samsung 970 Evo Plus 500 GB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '80.26', '57.91', '22.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(48, '48.jpg', 'Samsung 860 Evo 1 TB 2.5\" Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '100.07', '70.10', '6.85', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(49, '49.jpg', 'Angelbird ED381 7.68 TB 2.5\" Solid State Drive', 'Storage', 'Angelbird', NULL, NULL, NULL, '100.07', '70.10', '6.85', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(50, '50.jpg', 'Seagate BarraCuda 1 TB 3.5\" 7200RPM Internal Hard Drive', 'Storage', 'Seagate', NULL, NULL, NULL, NULL, '88.90', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(51, '51.jpg', 'Kingston A400 240 GB 2.5\" Solid State Drive', 'Storage', 'Kingston', NULL, NULL, NULL, '100.07', '70.10', '6.85', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(52, '52.jpg', 'Western Digital SN750 1 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Western Digital', NULL, NULL, NULL, '80.01', '24.13', '8.12', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(53, '53.jpg', 'Western Digital Blue SN550 500 GB M.2-2280 NVME Solid State Driv', 'Storage', 'Western Digital', NULL, NULL, NULL, '80.01', '24.13', '8.12', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(54, '54.jpg', 'Samsung 980 500 GB M.2-2280 NVME Solid State Drive', 'Storage', 'Samsung', NULL, NULL, NULL, '80.01', '24.13', '22.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(55, '55.jpg', 'Crucial P2 1 TB M.2-2280 NVME Solid State Drive', 'Storage', 'Crucial', NULL, NULL, NULL, '80.01', '24.13', '22.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(56, '56.jpg', 'Crucial P2 500 GB M.2-2280 NVME Solid State Drive', 'Storage', 'Crucial', NULL, NULL, NULL, '80.01', '24.13', '22.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(57, '57.jpg', 'Seagate BarraCuda 4 TB 3.5\" 5400RPM Internal Hard Drive', 'Storage', 'Seagate', NULL, NULL, NULL, NULL, '88.90', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(58, '58.jpg', 'Cooler Master Hyper 212 EVO 82.9 CFM Sleeve Bearing CPU Cooler', 'CPU Cooler', 'Cooler Master', NULL, NULL, 'Black', '119.38', '78.74', '160.02', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(59, '59.jpg', 'Cooler Master Hyper 212 RGB Black Edition 57.3 CFM CPU Cooler', 'CPU Cooler', 'Cooler Master', NULL, NULL, 'Black', '119.38', '78.74', '160.02', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(60, '60.jpg', 'Cooler Master MASTERLIQUID ML240L RGB V2 65.59 CFM Liquid CPU Co', 'CPU Cooler', 'Cooler Master', NULL, NULL, 'Black', '276.86', '119.38', '27.94', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(61, '61.jpg', 'NZXT Kraken X53 73.11 CFM Liquid CPU Cooler', 'CPU Cooler', 'NZXT', NULL, NULL, 'Black', '122.93', '275.08', '29.97', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(62, '62.jpg', 'Corsair iCUE H150i ELITE CAPELLIX 75 CFM Liquid CPU Cooler', 'CPU Cooler', 'Corsair', NULL, NULL, 'Black', '397.00', '119.88', '26.92', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(63, '63.jpg', 'Cooler Master Hyper 212 Black Edition 42 CFM CPU Cooler', 'CPU Cooler', 'Cooler Naster', NULL, NULL, 'Black', '119.38', '78.74', '160.02', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(64, '64.jpg', 'NZXT Kraken Z73 73.11 CFM Liquid CPU Cooler', 'CPU Cooler', 'NZXT', NULL, NULL, 'Black', '120.90', '393.95', '26.92', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(65, '65.jpg', 'Corsair iCUE H100i ELITE CAPELLIX 75 CFM Liquid CPU Cooler\r\n', 'CPU Cooler', 'Corsair', NULL, NULL, 'Black', '277.11', '119.88', '26.92', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(66, '66.jpg', 'Noctua NH-D15 chromax.black 82.52 CFM CPU Cooler', 'CPU Cooler', 'Noctua', NULL, NULL, 'Black', '161.03', '150.11', '165.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(67, '67.jpg', 'be quiet! Dark Rock Pro 4 50.5 CFM CPU Cooler', 'CPU Cooler', 'be quiet!', NULL, NULL, 'Black', '146.05', '135.89', '163.06', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(68, '68.jpg', 'NZXT Kraken X63 98.17 CFM Liquid CPU Cooler', 'CPU Cooler', 'NZXT', NULL, NULL, 'Black', '314.96', '143.00', '29.97', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(69, '69.jpg', 'Corsair iCUE H150i ELITE CAPELLIX 75 CFM Liquid CPU Cooler', 'CPU Cooler', 'Corsair', NULL, NULL, 'White', '397.00', '119.88', '26.92', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(70, '70.jpg', 'NZXT Kraken Z63 98.17 CFM Liquid CPU Cooler', 'CPU Cooler', 'NZXT', NULL, NULL, 'Black', '314.96', '143.00', '29.97', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(71, '71.jpg', 'Noctua NH-U12S chromax.black 55 CFM CPU Cooler', 'CPU Cooler', 'Noctua', NULL, NULL, 'Mixed', '71.12', '124.96', '157.98', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(72, '72.jpg', 'Noctua NH-D15 82.5 CFM CPU Cooler', 'CPU Cooler', 'Noctua', NULL, NULL, 'Mixed', '161.03', '150.11', '165.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(73, '73.jpg', 'Corsair iCUE H100i RGB PRO XT 75 CFM Liquid CPU Cooler', 'CPU Cooler', 'Corsair', NULL, NULL, 'Black', '277.11', '119.88', '26.92', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(74, '74.jpg', 'Corsair Vengeance LPX 16 GB (2 x 8 GB) DDR4-3200 CL16 RAM\r\n', 'RAM', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(75, '75.jpg', 'Corsair Vengeance RGB Pro 16 GB (2 x 8 GB) DDR4-3200 CL16 RAM', 'RAM', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(76, '76.jpg', 'Crucial Ballistix 16 GB (2 x 8 GB) DDR4-3600 CL16 RAM\r\n', 'RAM', 'Crucial', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(77, '77.jpg', 'G.Skill Ripjaws V Series 32 GB (2 x 16 GB) DDR4-3200 CL16 RAM', 'RAM', 'G.Skill', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(78, '78.jpg', 'G.Skill Trident Z RGB 16 GB (2 x 8 GB) DDR4-3600 CL18 RAM\r\n', 'RAM', 'G.Skill', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(79, '79.jpg', 'Corsair Vengeance RGB Pro 16 GB (2 x 8 GB) DDR4-3200 CL16 RAM', 'RAM', 'Corsair', NULL, NULL, 'White', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(80, '80.jpg', 'Corsair Vengeance RGB Pro 32 GB (2 x 16 GB) DDR4-3600 CL18 Memor', 'RAM', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(81, '81.jpg', 'G.Skill Trident Z Neo 32 GB (2 x 16 GB) DDR4-3600 CL16 RAM', 'RAM', 'G.Skill', NULL, NULL, 'Silver', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(82, '82.jpg', 'Corsair Vengeance LPX 16 GB (2 x 8 GB) DDR4-3600 CL18 RAM\r\n', 'RAM', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(83, '83.jpg', 'Corsair Vengeance LPX 32 GB (2 x 16 GB) DDR4-3600 CL18 RAM', 'RAM', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(84, '84.jpg', 'Team T-FORCE VULCAN Z 16 GB (2 x 8 GB) DDR4-3200 CL16 RAM', 'RAM', 'Team T-Force', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(85, '85.jpg', 'Crucial Ballistix 16 GB (2 x 8 GB) DDR4-3200 CL16 RAM\r\n', 'RAM', 'Crucial', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(86, '86.jpg', 'G.Skill Ripjaws V 16 GB (2 x 8 GB) DDR4-3600 CL16 RAM', 'RAM', 'G.Skill', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(87, '87.jpg', 'Corsair Dominator Platinum 128 GB (8 x 16 GB) DDR4-3200 CL16 Mem', 'RAM', 'Corsair', NULL, NULL, 'Black/Sivler', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(88, '88.jpg', 'Corsair Vengeance RGB Pro 32 GB (2 x 16 GB) DDR4-3200 CL16 Memor', 'RAM', 'Corsair', NULL, NULL, 'Black', NULL, NULL, NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(89, '89.jpg', 'EVGA BR 500 W 80+ Bronze Certified ATX Power Supply\r\n', 'PSU', 'EVGA', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(90, '90.jpg', 'Corsair AXi 1600 W 80+ Titanium Certified Fully Modular ATX Powe', 'PSU', 'Corsair', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(91, '91.jpg', 'Gigabyte P GM 750 W 80+ Gold Certified Fully Modular ATX Power S', 'PSU', 'Gigabyte', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(92, '92.jpg', 'EVGA BQ 500 W 80+ Bronze Certified Semi-modular ATX Power Supply', 'PSU', '\r\nEVGA\r\n', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(93, '93.jpg', 'Corsair HX Platinum 1000 W 80+ Platinum Certified Fully Modular ', 'PSU', 'Corsair', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(94, '94.jpg', 'EVGA SuperNOVA GA 850 W 80+ Gold Certified Fully Modular ATX Pow', 'PSU', 'EVGA', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(95, '95.jpg', 'Corsair CXM 650 W 80+ Bronze Certified Semi-modular ATX Power Su', 'PSU', 'Corsair', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(96, '96.jpg', 'Corsair RM (2019) 750 W 80+ Gold Certified Fully Modular ATX Pow', 'PSU', 'Corsair', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(97, '97.jpg', 'EVGA BQ 600 W 80+ Bronze Certified Semi-modular ATX Power Supply', 'PSU', 'EVGA\r\n', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(98, '98.jpg', 'Corsair RM (2019) 850 W 80+ Gold Certified Fully Modular ATX Pow', 'PSU', '\r\nCorsair', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(99, '99.jpg', 'EVGA SuperNOVA GA 650 W 80+ Gold Certified Fully Modular ATX Pow', 'PSU', 'EVGA', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(100, '100.jpg', 'Corsair RM (2019) 650 W 80+ Gold Certified Fully Modular ATX Pow', 'PSU', 'Corsair', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(101, '101.jpg', 'Corsair SF 750 W 80+ Platinum Certified Fully Modular SFX Power ', 'PSU', 'Corsair', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(102, '102.jpg', 'Corsair RMx (2021) 850 W 80+ Gold Certified Fully Modular ATX Po', 'PSU', 'Corsair', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(103, '103.jpg', 'EVGA SuperNOVA GA 750 W 80+ Gold Certified Fully Modular ATX Pow', 'PSU', 'EVGA', NULL, NULL, 'Black', '150.11', '150.11', '86.10', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(104, '104.jpg', 'NZXT H510 ATX Mid Tower Computer Case', 'Computer Case', 'NZXT', NULL, NULL, 'Black', '427.99', '210.05', '459.99', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(105, '105.jpg', 'Corsair 4000D Airflow ATX Mid Tower Computer Case', 'Computer Case', 'Corsair', NULL, NULL, 'White', '453.13', '230.12', '466.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(106, '106.jpg', 'NZXT H510 ATX Mid Tower Computer Case', 'Computer Case', 'NZXT', NULL, NULL, 'White', '427.99', '210.05', '459.99', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(107, '107.jpg', 'Phanteks Eclipse P300A Mesh ATX Mid Tower Computer Case', 'Computer Case', 'Phanteks', NULL, NULL, 'Black', '400.05', '199.89', '454.91', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(108, '108.jpg', 'Lian Li PC-O11 Dynamic ATX Full Tower Computer Case', 'Computer Case', 'Lian Li', NULL, NULL, 'Black', '445.00', '272.03', '446.02', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(109, '109.jpg', 'Corsair 4000D Airflow ATX Mid Tower Computer Case', 'Computer Case', 'Corsair', NULL, NULL, 'Black', '453.13', '230.12', '466.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(110, '110.jpg', 'Phanteks Eclipse P400A Digital ATX Mid Tower Computer Case', 'Computer Case', 'Phanteks', NULL, NULL, 'Black', '469.90', '210.05', '465.07', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(111, '111.jpg', 'Lian Li Lancool II Mesh ATX Mid Tower Computer Case', 'Computer Case', 'Lian Li', NULL, NULL, 'Black', '478.02', '229.10', '494.03', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(112, '112.jpg', 'Lian Li PC-O11 Dynamic ATX Full Tower Computer Case', 'Computer Case', 'Lian Li', NULL, NULL, 'White', '445.00', '272.03', '446.02', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(113, '113.jpg', 'Corsair iCUE 4000X RGB ATX Mid Tower Computer Case', 'Computer Case', 'Corsair', NULL, NULL, 'Black', '453.13', '230.12', '18.35', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(114, '114.jpg', 'Fractal Design Meshify C ATX Mid Tower Computer Case', 'Computer Case', 'Fractal Design', NULL, NULL, 'Black', '413.00', '216.91', '453.13', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(115, '115.jpg', 'Corsair iCUE 4000X RGB ATX Mid Tower Computer Case', 'Computer Case', 'Corsair', NULL, NULL, 'White', '453.13', '230.12', '466.09', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(116, '116.jpg', 'NZXT H510 Elite ATX Mid Tower Computer Case', 'Computer Case', 'NZXT', NULL, NULL, 'White/Black', '427.99', '210.05', '459.99', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(117, '117.jpg', 'Phanteks Eclipse P360A ATX Mid Tower Computer Case', 'Computer Case', 'Phanteks', NULL, NULL, 'White', '454.91', '199.89', '465.07', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(118, '118.jpg', 'Corsair 5000D AIRFLOW ATX Mid Tower Computer Case', 'Computer Case', 'Corsair', NULL, NULL, 'Black', '519.93', '245.11', '519.93', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(119, '119.jpg', 'Asus TUF GAMING X570-PLUS (WI-FI) ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(120, '120.jpg', 'Asus ROG STRIX B550-F GAMING (WI-FI) ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(121, '121.jpg', 'MSI B450 TOMAHAWK MAX ATX AM4 Motherboard', 'Motherboard', 'MSI\r\n', NULL, NULL, 'Black', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(122, '122.jpg', 'ASRock B450M Pro4 Micro ATX AM4 Motherboard', 'Motherboard', 'ASRock', NULL, NULL, 'Black/Silver', '243.84', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(123, '123.jpg', 'Asus ROG Strix X570-E Gaming ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(124, '124.jpg', 'MSI Z490-A PRO ATX LGA1200 Motherboard', 'Motherboard', 'MSI', NULL, NULL, 'Black/Silver', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(125, '125.jpg', 'MSI B550M PRO-VDH WIFI Micro ATX AM4 Motherboard', 'Motherboard', 'MSI', NULL, NULL, 'Black', '243.84', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(126, '126.jpg', 'Asus ROG STRIX B450-F GAMING ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(127, '127.jpg', 'Asus ROG Crosshair VIII Dark Hero ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black/Silver', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(128, '128.jpg', 'Gigabyte B450M DS3H V2 Micro ATX AM4 Motherboard', 'Motherboard', 'Gigabyte', NULL, NULL, 'Black', '243.84', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(129, '129.jpg', 'MSI MPG B550 GAMING EDGE WIFI ATX AM4 Motherboard', 'Motherboard', 'MSI', NULL, NULL, 'Black/Silver', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(130, '130.jpg', 'MSI MPG Z490 GAMING EDGE WIFI ATX LGA1200 Motherboard', 'Motherboard', 'MSI', NULL, NULL, 'Black/Silver', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(131, '131.jpg', 'Asus PRIME B560-PLUS ATX LGA1200 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(132, '132.jpg', 'MSI MPG B550 GAMING PLUS ATX AM4 Motherboard', 'Motherboard', 'MSI', NULL, NULL, 'Black', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(133, '133.jpg', 'Asus ROG STRIX B550-F GAMING ATX AM4 Motherboard', 'Motherboard', 'Asus', NULL, NULL, 'Black', '304.80', '243.84', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(134, '134.jpg', 'Gigabyte B450 I AORUS PRO WIFI Mini ITX AM4 Motherboard', 'Motherboard', 'Gigabyte', NULL, NULL, 'Black/Silver', '169.92', '169.92', NULL, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(135, '135.jpg', 'EVGA GeForce RTX 3060 12 GB XC GAMING Video Card', 'Graphics Card', 'EVGA', NULL, NULL, 'Black', '201.67', '124.96', '109.98', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(136, '136.jpg', 'MSI GeForce GTX 1050 Ti 4 GB Video Card', 'Graphics Card', '\r\nMSI', NULL, NULL, 'Black', '229.10', '131.06', '39.11', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(137, '137.jpg', 'MSI GeForce RTX 3060 12 GB GAMING X Video Card', 'Graphics Card', 'MSI', NULL, NULL, 'Black/Silver', '276.09', '131.06', '51.05', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(138, '138.jpg', 'NVIDIA GeForce RTX 3060 Ti 8 GB Founders Edition Video Card', 'Graphics Card', '\r\nNVIDIA', NULL, NULL, 'Black/Silver', '241.30', '111.76', '35.05', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(139, '139.jpg', 'Asus GeForce RTX 2060 6 GB DUAL EVO OC Video Card', 'Graphics Card', '\r\nAsus', NULL, NULL, 'Black', '242.06', '130.04', '53.08', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(140, '140.jpg', 'NVIDIA GeForce RTX 3070 8 GB Founders Edition Video Card', 'Graphics Card', '\r\nNVIDIA', NULL, NULL, 'Black', '242.06', '111.76', '35.05', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(141, '141.jpg', 'NVIDIA GeForce RTX 3080 10 GB Founders Edition Video Card', 'Graphics Card', 'NVIDIA', NULL, NULL, 'Black', '284.48', '111.76', '35.05', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(142, '142.jpg', 'EVGA GeForce RTX 3070 Ti 8 GB FTW3 ULTRA GAMING Video Card', 'Graphics Card', '\r\nEVGA', NULL, NULL, 'Black', '299.97', '69.85', '136.65', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(143, '143.jpg', 'EVGA GeForce RTX 3090 24 GB FTW3 ULTRA GAMING Video Card', 'Graphics Card', 'EVGA', NULL, NULL, 'Black', '299.97', '69.85', '136.65', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(144, '144.jpg', 'MSI GeForce GTX 1660 SUPER 6 GB GAMING X Video Card', 'Graphics Card', 'MSI', NULL, NULL, 'Black', '246.88', '127.00', '45.97', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(145, '145.jpg', 'Asus GeForce GTX 1660 SUPER 6 GB TUF GAMING OC Video Card', 'Graphics Card', 'Asus', NULL, NULL, 'Black', '205.74', '124.46', '45.72', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(146, '146.jpg', 'Asus GeForce RTX 3090 24 GB ROG STRIX WHITE OC Video Card', 'Graphics Card', 'Asus', NULL, NULL, 'White', '318.26', '139.95', '57.65', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(147, '147.jpg', 'MSI GeForce GTX 1650 SUPER 4 GB GAMING X Video Card', 'Graphics Card', '\r\nMSI', NULL, NULL, 'Black', '247.90', '127.00', '43.94', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(148, '148.jpg', 'MSI GeForce RTX 2060 6 GB VENTUS OC Video Card', 'Graphics Card', 'MSI', NULL, NULL, 'Silver/Black', '226.06', '128.01', '40.89', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(149, '149.jpg', 'Gigabyte GeForce GTX 1660 SUPER 6 GB OC Video Card', 'Graphics Card', 'Gigabyte', NULL, NULL, 'Black/Silver', '225.04', '121.92', '39.87', '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(150, '150.jpg', 'MSI GeForce GTX 1660 Ti 6 GB VENTUS XS OC Video Card', 'Graphics Card', 'MSI', NULL, NULL, 'Silver/Black', '203.96', '128.01', '41.91', '2021-09-16 16:00:00', '2021-09-16 16:00:00');

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
(20, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '214.12', '320.04', '160.02', 7, 0, 0, 0, 2, 4, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(21, 'Micro ATX', '0', 0, 'Acrylic Window', NULL, '154.94', '340.10', NULL, 4, 0, 0, 0, 1, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(22, 'Micro ATX', '0', 0, 'Acrylic Window', NULL, '16.50', '863.60', NULL, 4, 0, 0, 0, 1, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(104, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '165.10', '381.00', NULL, 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(105, 'ATX Mid Tower', '0', 1, 'Tinted Tempered Glass', NULL, '169.92', '359.91', '219.96', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(106, 'ATX Mid Tower', '0', 0, 'Tempered Glass', NULL, '165.10', '381.00', NULL, 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(107, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '165.10', '355.09', '199.89', 7, 0, 0, 0, 2, 1, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(108, 'ATX Full Tower', '0', 1, 'Tempered Glass', 1, '154.94', '420.11', '255.01', 8, 0, 0, 0, 2, 4, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(109, 'ATX Mid Tower', '0', 1, 'Tinted Tempered Glass', NULL, '169.92', '359.91', '219.96', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(110, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '160.02', '420.11', '271.70', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(111, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '176.02', '384.04', '210.05', 7, 0, 0, 0, 3, 6, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(112, 'ATX Full Tower', '0', 1, 'Temepered Glass', 1, '154.94', '420.11', '255.01', 8, 0, 0, 0, 2, 4, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(113, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '169.92', '359.91', '219.96', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(114, 'ATX Mid Tower', '0', 1, 'Tinted Tempered Glass', NULL, '169.92', '314.96', '175.00', 7, 0, 0, 0, 2, 3, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(115, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '169.92', '359.91', '219.96', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(116, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '165.10', '381.00', '210.05', 7, 0, 0, 0, 2, 2, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(117, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '160.02', '400.05', '249.93', 7, 0, 0, 0, 2, 3, '2021-09-16 16:00:00', '2021-09-16 16:00:00'),
(118, 'ATX Mid Tower', '0', 1, 'Tempered Glass', NULL, '169.92', '400.05', '249.93', 7, 0, 0, 0, 2, 4, '2021-09-16 16:00:00', '2021-09-16 16:00:00');

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

--
-- Dumping data for table `cpu_sockets`
--

INSERT INTO `cpu_sockets` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AM1', NULL, NULL),
(2, 'AM2', NULL, NULL),
(3, 'AM2+', NULL, NULL),
(4, 'AM3', NULL, NULL),
(5, 'AM3+', NULL, NULL),
(6, 'AM4', NULL, NULL),
(7, 'C32', NULL, NULL),
(8, 'FM1', NULL, NULL),
(9, 'FM2', NULL, NULL),
(10, 'FM2+', NULL, NULL),
(11, 'G34', NULL, NULL),
(12, 'LGA1150', NULL, NULL),
(13, 'LGA1151', NULL, NULL),
(14, 'LGA1155', NULL, NULL),
(15, 'LGA1156', NULL, NULL),
(16, 'LGA1200', NULL, NULL),
(17, 'LGA1356', NULL, NULL),
(18, 'LGA1366', NULL, NULL),
(19, 'LGA2011', NULL, NULL),
(20, 'LGA2011-3', NULL, NULL),
(21, 'LGA2011-3 Narrow', NULL, NULL),
(22, 'LGA2066', NULL, NULL),
(23, 'LGA3647', NULL, NULL),
(24, 'LGA771', NULL, NULL),
(25, 'LGA775', NULL, NULL),
(26, 'sTR4', NULL, NULL),
(27, 'sTRX4', NULL, NULL);

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

--
-- Dumping data for table `memory_speeds`
--

INSERT INTO `memory_speeds` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DDR4-1866', NULL, NULL),
(2, 'DDR4-2133', NULL, NULL),
(3, 'DDR4-2400', NULL, NULL),
(4, 'DDR4-2666', NULL, NULL),
(5, 'DDR4-2800', NULL, NULL),
(6, 'DDR4-2933', NULL, NULL),
(7, 'DDR4-3000', NULL, NULL),
(8, 'DDR4-3200', NULL, NULL),
(9, 'DDR4-3300', NULL, NULL),
(10, 'DDR4-3333', NULL, NULL),
(11, 'DDR4-3400', NULL, NULL),
(12, 'DDR4-3466', NULL, NULL),
(13, 'DDR4-3600', NULL, NULL),
(14, 'DDR4-3733', NULL, NULL),
(15, 'DDR4-3800', NULL, NULL),
(16, 'DDR4-3866', NULL, NULL),
(17, 'DDR4-4000', NULL, NULL),
(18, 'DDR4-4133', NULL, NULL),
(19, 'DDR4-4200', NULL, NULL),
(20, 'DDR4-4266', NULL, NULL),
(21, 'DDR4-4300', NULL, NULL),
(22, 'DDR4-4400', NULL, NULL),
(23, 'DDR4-4533', NULL, NULL),
(24, 'DDR4-4600', NULL, NULL),
(25, 'DDR4-4666', NULL, NULL),
(26, 'DDR4-4733', NULL, NULL),
(27, 'DDR4-4800', NULL, NULL),
(28, 'DDR4-4866', NULL, NULL),
(29, 'DDR4-5000', NULL, NULL);

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
(11, '2021_08_24_192601_create_computer_Computer Cases_table', 1),
(12, '2021_08_26_054535_create_accounts_table', 1),
(13, '2021_09_04_150038_create_stores_table', 1),
(14, '2021_09_05_160728_create_builds_table', 1),
(15, '2021_09_19_110500_create_cpu_sockets_table', 1),
(16, '2021_09_19_111502_create_socket_coolers_table', 1),
(17, '2021_09_22_121841_create_mobo_form_factors_table', 1),
(18, '2021_09_22_122619_create_mobo_Computer Cases_table', 1),
(19, '2021_09_22_134737_create_RAM_speeds_table', 1),
(20, '2021_09_22_135436_create_mobo_RAM_speeds_table', 1),
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

--
-- Dumping data for table `mobo_cases`
--

INSERT INTO `mobo_cases` (`component_id`, `mobo_form_factor_id`, `created_at`, `updated_at`) VALUES
(104, 2, NULL, NULL),
(104, 6, NULL, NULL),
(104, 7, NULL, NULL),
(105, 2, NULL, NULL),
(105, 6, NULL, NULL),
(105, 7, NULL, NULL),
(106, 2, NULL, NULL),
(106, 6, NULL, NULL),
(106, 7, NULL, NULL),
(107, 2, NULL, NULL),
(107, 6, NULL, NULL),
(107, 7, NULL, NULL),
(108, 2, NULL, NULL),
(108, 3, NULL, NULL),
(108, 6, NULL, NULL),
(108, 7, NULL, NULL),
(109, 2, NULL, NULL),
(109, 6, NULL, NULL),
(109, 7, NULL, NULL),
(110, 2, NULL, NULL),
(110, 3, NULL, NULL),
(110, 6, NULL, NULL),
(110, 7, NULL, NULL),
(111, 2, NULL, NULL),
(111, 3, NULL, NULL),
(111, 6, NULL, NULL),
(111, 7, NULL, NULL),
(112, 2, NULL, NULL),
(112, 3, NULL, NULL),
(112, 6, NULL, NULL),
(112, 7, NULL, NULL),
(113, 2, NULL, NULL),
(113, 6, NULL, NULL),
(113, 7, NULL, NULL),
(114, 2, NULL, NULL),
(114, 6, NULL, NULL),
(114, 7, NULL, NULL),
(115, 2, NULL, NULL),
(115, 6, NULL, NULL),
(115, 7, NULL, NULL),
(116, 2, NULL, NULL),
(116, 6, NULL, NULL),
(116, 7, NULL, NULL),
(117, 2, NULL, NULL),
(117, 3, NULL, NULL),
(117, 6, NULL, NULL),
(117, 7, NULL, NULL),
(118, 2, NULL, NULL),
(118, 6, NULL, NULL),
(118, 7, NULL, NULL);

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

--
-- Dumping data for table `mobo_form_factors`
--

INSERT INTO `mobo_form_factors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AT', NULL, NULL),
(2, 'ATX', NULL, NULL),
(3, 'EATX', NULL, NULL),
(4, 'Flex ATX', NULL, NULL),
(5, 'HPTX', NULL, NULL),
(6, 'Micro ATX', NULL, NULL),
(7, 'Mini ITX', NULL, NULL),
(8, 'Thin Mini DTX', NULL, NULL),
(9, 'SSI CEB', NULL, NULL),
(10, 'SSI EEB', NULL, NULL),
(11, 'XL ATX', NULL, NULL);

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

--
-- Dumping data for table `mobo_memory_speeds`
--

INSERT INTO `mobo_memory_speeds` (`component_id`, `memory_speed_id`, `created_at`, `updated_at`) VALUES
(5, 1, NULL, NULL),
(5, 2, NULL, NULL),
(5, 3, NULL, NULL),
(5, 4, NULL, NULL),
(5, 5, NULL, NULL),
(5, 6, NULL, NULL),
(5, 7, NULL, NULL),
(5, 8, NULL, NULL),
(5, 12, NULL, NULL),
(5, 14, NULL, NULL),
(5, 16, NULL, NULL),
(5, 17, NULL, NULL),
(5, 18, NULL, NULL),
(5, 20, NULL, NULL),
(5, 22, NULL, NULL),
(6, 1, NULL, NULL),
(6, 2, NULL, NULL),
(6, 3, NULL, NULL),
(6, 4, NULL, NULL),
(6, 5, NULL, NULL),
(6, 7, NULL, NULL),
(6, 8, NULL, NULL),
(6, 12, NULL, NULL),
(6, 13, NULL, NULL),
(6, 14, NULL, NULL),
(6, 16, NULL, NULL),
(6, 17, NULL, NULL),
(6, 18, NULL, NULL),
(6, 20, NULL, NULL),
(6, 22, NULL, NULL),
(6, 23, NULL, NULL),
(6, 24, NULL, NULL),
(7, 2, NULL, NULL),
(7, 3, NULL, NULL),
(7, 4, NULL, NULL),
(7, 6, NULL, NULL),
(7, 8, NULL, NULL),
(7, 9, NULL, NULL),
(7, 10, NULL, NULL),
(7, 11, NULL, NULL),
(7, 12, NULL, NULL),
(7, 14, NULL, NULL),
(7, 15, NULL, NULL),
(7, 16, NULL, NULL),
(7, 17, NULL, NULL),
(8, 2, NULL, NULL),
(8, 3, NULL, NULL),
(8, 4, NULL, NULL),
(8, 5, NULL, NULL),
(8, 7, NULL, NULL),
(8, 8, NULL, NULL),
(8, 10, NULL, NULL),
(8, 12, NULL, NULL),
(8, 13, NULL, NULL),
(8, 14, NULL, NULL),
(8, 16, NULL, NULL),
(8, 17, NULL, NULL),
(8, 18, NULL, NULL),
(8, 20, NULL, NULL),
(8, 22, NULL, NULL),
(8, 24, NULL, NULL),
(9, 2, NULL, NULL),
(9, 3, NULL, NULL),
(9, 4, NULL, NULL),
(9, 6, NULL, NULL),
(9, 8, NULL, NULL),
(9, 9, NULL, NULL),
(9, 11, NULL, NULL),
(9, 13, NULL, NULL),
(9, 15, NULL, NULL),
(9, 16, NULL, NULL),
(9, 17, NULL, NULL),
(9, 22, NULL, NULL),
(9, 24, NULL, NULL),
(9, 27, NULL, NULL),
(10, 2, NULL, NULL),
(10, 3, NULL, NULL),
(10, 4, NULL, NULL),
(10, 5, NULL, NULL),
(10, 7, NULL, NULL),
(10, 8, NULL, NULL),
(10, 12, NULL, NULL),
(11, 2, NULL, NULL),
(11, 3, NULL, NULL),
(11, 4, NULL, NULL),
(11, 6, NULL, NULL),
(11, 8, NULL, NULL),
(119, 2, NULL, NULL),
(119, 3, NULL, NULL),
(119, 4, NULL, NULL),
(119, 5, NULL, NULL),
(119, 7, NULL, NULL),
(119, 8, NULL, NULL),
(119, 9, NULL, NULL),
(119, 11, NULL, NULL),
(119, 12, NULL, NULL),
(119, 13, NULL, NULL),
(120, 2, NULL, NULL),
(120, 3, NULL, NULL),
(120, 4, NULL, NULL),
(120, 5, NULL, NULL),
(120, 7, NULL, NULL),
(120, 8, NULL, NULL),
(120, 12, NULL, NULL),
(120, 13, NULL, NULL),
(120, 16, NULL, NULL),
(120, 17, NULL, NULL),
(120, 18, NULL, NULL),
(120, 22, NULL, NULL),
(121, 1, NULL, NULL),
(121, 2, NULL, NULL),
(121, 3, NULL, NULL),
(121, 4, NULL, NULL),
(121, 5, NULL, NULL),
(121, 6, NULL, NULL),
(121, 7, NULL, NULL),
(121, 8, NULL, NULL),
(121, 12, NULL, NULL),
(121, 13, NULL, NULL),
(121, 14, NULL, NULL),
(121, 16, NULL, NULL),
(121, 17, NULL, NULL),
(121, 18, NULL, NULL),
(122, 2, NULL, NULL),
(122, 3, NULL, NULL),
(122, 4, NULL, NULL),
(122, 6, NULL, NULL),
(122, 8, NULL, NULL),
(123, 2, NULL, NULL),
(123, 3, NULL, NULL),
(123, 4, NULL, NULL),
(123, 5, NULL, NULL),
(123, 6, NULL, NULL),
(123, 7, NULL, NULL),
(123, 8, NULL, NULL),
(123, 9, NULL, NULL),
(123, 11, NULL, NULL),
(123, 12, NULL, NULL),
(123, 13, NULL, NULL),
(123, 14, NULL, NULL),
(123, 16, NULL, NULL),
(123, 17, NULL, NULL),
(123, 18, NULL, NULL),
(123, 20, NULL, NULL),
(123, 22, NULL, NULL),
(124, 2, NULL, NULL),
(124, 3, NULL, NULL),
(124, 4, NULL, NULL),
(124, 7, NULL, NULL),
(124, 8, NULL, NULL),
(124, 9, NULL, NULL),
(124, 10, NULL, NULL),
(124, 11, NULL, NULL),
(124, 12, NULL, NULL),
(124, 13, NULL, NULL),
(124, 14, NULL, NULL),
(124, 16, NULL, NULL),
(124, 17, NULL, NULL),
(124, 18, NULL, NULL),
(124, 19, NULL, NULL),
(124, 20, NULL, NULL),
(124, 21, NULL, NULL),
(124, 23, NULL, NULL),
(124, 24, NULL, NULL),
(124, 27, NULL, NULL),
(125, 1, NULL, NULL),
(125, 2, NULL, NULL),
(125, 3, NULL, NULL),
(125, 4, NULL, NULL),
(125, 5, NULL, NULL),
(125, 6, NULL, NULL),
(125, 7, NULL, NULL),
(125, 8, NULL, NULL),
(125, 12, NULL, NULL),
(125, 13, NULL, NULL),
(125, 14, NULL, NULL),
(125, 16, NULL, NULL),
(125, 17, NULL, NULL),
(125, 18, NULL, NULL),
(125, 20, NULL, NULL),
(125, 22, NULL, NULL),
(126, 2, NULL, NULL),
(126, 3, NULL, NULL),
(126, 4, NULL, NULL),
(126, 5, NULL, NULL),
(126, 7, NULL, NULL),
(126, 8, NULL, NULL),
(127, 2, NULL, NULL),
(127, 3, NULL, NULL),
(127, 4, NULL, NULL),
(127, 5, NULL, NULL),
(127, 6, NULL, NULL),
(127, 7, NULL, NULL),
(127, 8, NULL, NULL),
(127, 11, NULL, NULL),
(127, 12, NULL, NULL),
(127, 13, NULL, NULL),
(127, 15, NULL, NULL),
(127, 16, NULL, NULL),
(127, 17, NULL, NULL),
(127, 18, NULL, NULL),
(127, 20, NULL, NULL),
(127, 22, NULL, NULL),
(127, 24, NULL, NULL),
(127, 25, NULL, NULL),
(127, 27, NULL, NULL),
(127, 28, NULL, NULL),
(128, 2, NULL, NULL),
(128, 3, NULL, NULL),
(128, 4, NULL, NULL),
(128, 6, NULL, NULL),
(128, 8, NULL, NULL),
(128, 12, NULL, NULL),
(128, 13, NULL, NULL),
(129, 1, NULL, NULL),
(129, 2, NULL, NULL),
(129, 3, NULL, NULL),
(129, 4, NULL, NULL),
(129, 5, NULL, NULL),
(129, 6, NULL, NULL),
(129, 7, NULL, NULL),
(129, 8, NULL, NULL),
(129, 12, NULL, NULL),
(129, 13, NULL, NULL),
(129, 14, NULL, NULL),
(129, 16, NULL, NULL),
(129, 17, NULL, NULL),
(129, 18, NULL, NULL),
(129, 20, NULL, NULL),
(129, 22, NULL, NULL),
(129, 23, NULL, NULL),
(129, 24, NULL, NULL),
(129, 28, NULL, NULL),
(129, 29, NULL, NULL),
(130, 2, NULL, NULL),
(130, 3, NULL, NULL),
(130, 4, NULL, NULL),
(130, 6, NULL, NULL),
(130, 7, NULL, NULL),
(130, 8, NULL, NULL),
(130, 9, NULL, NULL),
(130, 10, NULL, NULL),
(130, 11, NULL, NULL),
(130, 12, NULL, NULL),
(130, 13, NULL, NULL),
(130, 14, NULL, NULL),
(130, 16, NULL, NULL),
(130, 17, NULL, NULL),
(130, 18, NULL, NULL),
(130, 19, NULL, NULL),
(130, 20, NULL, NULL),
(130, 21, NULL, NULL),
(130, 22, NULL, NULL),
(130, 23, NULL, NULL),
(130, 24, NULL, NULL),
(130, 27, NULL, NULL),
(131, 2, NULL, NULL),
(131, 3, NULL, NULL),
(131, 4, NULL, NULL),
(131, 5, NULL, NULL),
(131, 6, NULL, NULL),
(131, 8, NULL, NULL),
(131, 10, NULL, NULL),
(131, 12, NULL, NULL),
(131, 13, NULL, NULL),
(131, 14, NULL, NULL),
(131, 17, NULL, NULL),
(131, 20, NULL, NULL),
(131, 22, NULL, NULL),
(131, 24, NULL, NULL),
(132, 1, NULL, NULL),
(132, 2, NULL, NULL),
(132, 4, NULL, NULL),
(132, 3, NULL, NULL),
(132, 5, NULL, NULL),
(132, 6, NULL, NULL),
(132, 7, NULL, NULL),
(132, 8, NULL, NULL),
(132, 12, NULL, NULL),
(132, 13, NULL, NULL),
(132, 14, NULL, NULL),
(132, 17, NULL, NULL),
(132, 18, NULL, NULL),
(132, 20, NULL, NULL),
(132, 22, NULL, NULL),
(133, 2, NULL, NULL),
(133, 3, NULL, NULL),
(133, 4, NULL, NULL),
(133, 5, NULL, NULL),
(133, 7, NULL, NULL),
(133, 8, NULL, NULL),
(133, 12, NULL, NULL),
(133, 13, NULL, NULL),
(133, 16, NULL, NULL),
(133, 17, NULL, NULL),
(133, 18, NULL, NULL),
(133, 22, NULL, NULL),
(133, 24, NULL, NULL),
(133, 27, NULL, NULL),
(133, 29, NULL, NULL),
(134, 2, NULL, NULL),
(134, 3, NULL, NULL),
(134, 4, NULL, NULL),
(134, 8, NULL, NULL);

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

--
-- Dumping data for table `socket_coolers`
--

INSERT INTO `socket_coolers` (`component_id`, `cpu_socket_id`, `created_at`, `updated_at`) VALUES
(58, 2, NULL, NULL),
(58, 3, NULL, NULL),
(58, 4, NULL, NULL),
(58, 5, NULL, NULL),
(58, 6, NULL, NULL),
(58, 8, NULL, NULL),
(58, 9, NULL, NULL),
(58, 10, NULL, NULL),
(58, 12, NULL, NULL),
(58, 13, NULL, NULL),
(58, 14, NULL, NULL),
(58, 15, NULL, NULL),
(58, 16, NULL, NULL),
(58, 18, NULL, NULL),
(58, 19, NULL, NULL),
(58, 22, NULL, NULL),
(58, 25, NULL, NULL),
(59, 2, NULL, NULL),
(59, 3, NULL, NULL),
(59, 4, NULL, NULL),
(59, 5, NULL, NULL),
(59, 6, NULL, NULL),
(59, 8, NULL, NULL),
(59, 9, NULL, NULL),
(59, 10, NULL, NULL),
(59, 12, NULL, NULL),
(59, 13, NULL, NULL),
(59, 14, NULL, NULL),
(59, 15, NULL, NULL),
(59, 16, NULL, NULL),
(59, 18, NULL, NULL),
(59, 19, NULL, NULL),
(59, 20, NULL, NULL),
(59, 22, NULL, NULL),
(60, 2, NULL, NULL),
(60, 3, NULL, NULL),
(60, 4, NULL, NULL),
(60, 5, NULL, NULL),
(60, 6, NULL, NULL),
(60, 8, NULL, NULL),
(60, 9, NULL, NULL),
(60, 10, NULL, NULL),
(60, 12, NULL, NULL),
(60, 13, NULL, NULL),
(60, 14, NULL, NULL),
(60, 15, NULL, NULL),
(60, 16, NULL, NULL),
(60, 18, NULL, NULL),
(60, 19, NULL, NULL),
(60, 20, NULL, NULL),
(60, 22, NULL, NULL),
(61, 6, NULL, NULL),
(61, 12, NULL, NULL),
(61, 13, NULL, NULL),
(61, 14, NULL, NULL),
(61, 15, NULL, NULL),
(61, 16, NULL, NULL),
(61, 18, NULL, NULL),
(61, 19, NULL, NULL),
(61, 20, NULL, NULL),
(61, 22, NULL, NULL),
(61, 26, NULL, NULL),
(61, 27, NULL, NULL),
(62, 2, NULL, NULL),
(62, 3, NULL, NULL),
(62, 4, NULL, NULL),
(62, 5, NULL, NULL),
(62, 6, NULL, NULL),
(62, 8, NULL, NULL),
(62, 9, NULL, NULL),
(62, 10, NULL, NULL),
(62, 12, NULL, NULL),
(62, 13, NULL, NULL),
(62, 14, NULL, NULL),
(62, 15, NULL, NULL),
(62, 16, NULL, NULL),
(62, 18, NULL, NULL),
(62, 19, NULL, NULL),
(62, 20, NULL, NULL),
(62, 22, NULL, NULL),
(62, 26, NULL, NULL),
(62, 27, NULL, NULL),
(63, 2, NULL, NULL),
(63, 3, NULL, NULL),
(63, 4, NULL, NULL),
(63, 5, NULL, NULL),
(63, 6, NULL, NULL),
(63, 8, NULL, NULL),
(63, 9, NULL, NULL),
(63, 10, NULL, NULL),
(63, 12, NULL, NULL),
(63, 13, NULL, NULL),
(63, 14, NULL, NULL),
(63, 15, NULL, NULL),
(63, 16, NULL, NULL),
(63, 18, NULL, NULL),
(63, 19, NULL, NULL),
(63, 20, NULL, NULL),
(63, 22, NULL, NULL),
(64, 6, NULL, NULL),
(64, 12, NULL, NULL),
(64, 13, NULL, NULL),
(64, 14, NULL, NULL),
(64, 15, NULL, NULL),
(64, 16, NULL, NULL),
(64, 18, NULL, NULL),
(64, 19, NULL, NULL),
(64, 20, NULL, NULL),
(64, 22, NULL, NULL),
(64, 26, NULL, NULL),
(64, 27, NULL, NULL),
(65, 2, NULL, NULL),
(65, 3, NULL, NULL),
(65, 4, NULL, NULL),
(65, 5, NULL, NULL),
(65, 6, NULL, NULL),
(65, 8, NULL, NULL),
(65, 9, NULL, NULL),
(65, 10, NULL, NULL),
(65, 12, NULL, NULL),
(65, 13, NULL, NULL),
(65, 14, NULL, NULL),
(65, 15, NULL, NULL),
(65, 16, NULL, NULL),
(65, 18, NULL, NULL),
(65, 19, NULL, NULL),
(65, 20, NULL, NULL),
(65, 22, NULL, NULL),
(65, 26, NULL, NULL),
(65, 27, NULL, NULL),
(66, 2, NULL, NULL),
(66, 3, NULL, NULL),
(66, 4, NULL, NULL),
(66, 5, NULL, NULL),
(66, 6, NULL, NULL),
(66, 8, NULL, NULL),
(66, 9, NULL, NULL),
(66, 10, NULL, NULL),
(66, 12, NULL, NULL),
(66, 13, NULL, NULL),
(66, 14, NULL, NULL),
(66, 15, NULL, NULL),
(66, 16, NULL, NULL),
(66, 19, NULL, NULL),
(66, 20, NULL, NULL),
(66, 22, NULL, NULL),
(67, 2, NULL, NULL),
(67, 3, NULL, NULL),
(67, 4, NULL, NULL),
(67, 5, NULL, NULL),
(67, 6, NULL, NULL),
(67, 8, NULL, NULL),
(67, 9, NULL, NULL),
(67, 10, NULL, NULL),
(67, 12, NULL, NULL),
(67, 13, NULL, NULL),
(67, 14, NULL, NULL),
(67, 15, NULL, NULL),
(67, 16, NULL, NULL),
(67, 18, NULL, NULL),
(67, 19, NULL, NULL),
(67, 20, NULL, NULL),
(67, 22, NULL, NULL),
(68, 6, NULL, NULL),
(68, 12, NULL, NULL),
(68, 13, NULL, NULL),
(68, 14, NULL, NULL),
(68, 15, NULL, NULL),
(68, 16, NULL, NULL),
(68, 18, NULL, NULL),
(68, 19, NULL, NULL),
(68, 20, NULL, NULL),
(68, 22, NULL, NULL),
(68, 26, NULL, NULL),
(68, 27, NULL, NULL),
(69, 2, NULL, NULL),
(69, 3, NULL, NULL),
(69, 4, NULL, NULL),
(69, 5, NULL, NULL),
(69, 6, NULL, NULL),
(69, 8, NULL, NULL),
(69, 9, NULL, NULL),
(69, 10, NULL, NULL),
(69, 12, NULL, NULL),
(69, 13, NULL, NULL),
(69, 14, NULL, NULL),
(69, 15, NULL, NULL),
(69, 16, NULL, NULL),
(69, 18, NULL, NULL),
(69, 19, NULL, NULL),
(69, 20, NULL, NULL),
(69, 22, NULL, NULL),
(69, 26, NULL, NULL),
(69, 27, NULL, NULL),
(70, 6, NULL, NULL),
(70, 12, NULL, NULL),
(70, 13, NULL, NULL),
(70, 14, NULL, NULL),
(70, 15, NULL, NULL),
(70, 16, NULL, NULL),
(70, 18, NULL, NULL),
(70, 19, NULL, NULL),
(70, 20, NULL, NULL),
(70, 22, NULL, NULL),
(70, 26, NULL, NULL),
(70, 27, NULL, NULL),
(71, 2, NULL, NULL),
(71, 3, NULL, NULL),
(71, 4, NULL, NULL),
(71, 5, NULL, NULL),
(71, 6, NULL, NULL),
(71, 8, NULL, NULL),
(71, 9, NULL, NULL),
(71, 10, NULL, NULL),
(71, 12, NULL, NULL),
(71, 13, NULL, NULL),
(71, 14, NULL, NULL),
(71, 15, NULL, NULL),
(71, 16, NULL, NULL),
(71, 19, NULL, NULL),
(71, 20, NULL, NULL),
(71, 22, NULL, NULL),
(72, 2, NULL, NULL),
(72, 3, NULL, NULL),
(72, 4, NULL, NULL),
(72, 5, NULL, NULL),
(72, 6, NULL, NULL),
(72, 8, NULL, NULL),
(72, 9, NULL, NULL),
(72, 10, NULL, NULL),
(72, 12, NULL, NULL),
(72, 13, NULL, NULL),
(72, 14, NULL, NULL),
(72, 15, NULL, NULL),
(72, 16, NULL, NULL),
(72, 19, NULL, NULL),
(72, 20, NULL, NULL),
(72, 22, NULL, NULL),
(73, 2, NULL, NULL),
(73, 3, NULL, NULL),
(73, 4, NULL, NULL),
(73, 5, NULL, NULL),
(73, 6, NULL, NULL),
(73, 8, NULL, NULL),
(73, 9, NULL, NULL),
(73, 10, NULL, NULL),
(73, 12, NULL, NULL),
(73, 13, NULL, NULL),
(73, 14, NULL, NULL),
(73, 15, NULL, NULL),
(73, 16, NULL, NULL),
(73, 19, NULL, NULL),
(73, 20, NULL, NULL),
(73, 22, NULL, NULL),
(73, 26, NULL, NULL),
(73, 27, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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