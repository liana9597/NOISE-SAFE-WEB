-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2026 at 03:26 PM
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
-- Database: `noise_safe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`) VALUES
(1, 'admin', '$2y$10$zptr0BeBQclicdOjUM7k4OA2WtwV7h5gEQY9ofL74a3lQLzUbS1.u');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `device_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `owner_name` varchar(100) DEFAULT NULL,
  `serial_number` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `garansi` varchar(50) DEFAULT NULL,
  `registered_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`device_id`, `user_id`, `owner_name`, `serial_number`, `status`, `purchase_date`, `garansi`, `registered_at`) VALUES
(1, 1, 'Awa Device', 'NS-001', 'active', '2026-01-01', '2027-01-01', '2026-04-14 12:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `device_location`
--

CREATE TABLE `device_location` (
  `loc_id` bigint(20) NOT NULL,
  `device_id` bigint(20) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(10,8) DEFAULT NULL,
  `recorded_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `noise_logs`
--

CREATE TABLE `noise_logs` (
  `log_id` bigint(20) NOT NULL,
  `device_id` bigint(20) DEFAULT NULL,
  `decibel_level` float DEFAULT NULL,
  `noise_status` varchar(50) DEFAULT NULL,
  `recorded_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noise_logs`
--

INSERT INTO `noise_logs` (`log_id`, `device_id`, `decibel_level`, `noise_status`, `recorded_at`) VALUES
(1, 1, 2017, 'SEDANG', '2026-04-15 11:20:56'),
(2, 1, 2017, 'SEDANG', '2026-04-15 11:21:00'),
(3, 1, 2495, 'SEDANG', '2026-04-15 11:21:02'),
(4, 1, 2913, 'BISING', '2026-04-15 11:21:07'),
(5, 1, 2913, 'BISING', '2026-04-15 11:21:10'),
(6, 1, 2494, 'SEDANG', '2026-04-15 11:21:11'),
(7, 1, 2045, 'SEDANG', '2026-04-15 11:21:14'),
(8, 1, 2861, 'BISING', '2026-04-15 11:21:18'),
(9, 1, 2861, 'BISING', '2026-04-15 11:21:21'),
(10, 1, 2467, 'SEDANG', '2026-04-15 11:21:24'),
(11, 1, 2687, 'BISING', '2026-04-15 11:21:29'),
(12, 1, 2687, 'BISING', '2026-04-15 11:21:32'),
(13, 1, 2214, 'SEDANG', '2026-04-15 11:21:37'),
(14, 1, 959, 'SUNYI', '2026-04-15 11:21:42'),
(15, 1, 2006, 'SEDANG', '2026-04-15 11:21:51'),
(16, 1, 2006, 'SEDANG', '2026-04-15 11:21:54'),
(17, 1, 2032, 'SEDANG', '2026-04-15 11:21:54'),
(18, 1, 2070, 'SEDANG', '2026-04-15 11:21:58'),
(19, 1, 856, 'SUNYI', '2026-04-15 11:22:04'),
(20, 1, 2139, 'SEDANG', '2026-04-15 11:22:09'),
(21, 1, 1168, 'SUNYI', '2026-04-15 11:22:14'),
(22, 1, 2035, 'SEDANG', '2026-04-15 11:22:17'),
(23, 1, 2916, 'BISING', '2026-04-15 11:22:20'),
(24, 1, 1109, 'SUNYI', '2026-04-15 11:22:24'),
(25, 1, 2668, 'BISING', '2026-04-15 11:22:37'),
(26, 1, 2668, 'BISING', '2026-04-15 11:22:40'),
(27, 1, 2351, 'SEDANG', '2026-04-15 11:22:40'),
(28, 1, 2915, 'BISING', '2026-04-15 11:22:44'),
(29, 1, 1706, 'SEDANG', '2026-04-15 11:22:50'),
(30, 1, 2611, 'BISING', '2026-04-15 11:22:54'),
(31, 1, 2046, 'SEDANG', '2026-04-15 11:22:58'),
(32, 1, 2046, 'SEDANG', '2026-04-15 11:23:01'),
(33, 1, 2117, 'SEDANG', '2026-04-15 11:23:03'),
(34, 1, 2319, 'SEDANG', '2026-04-15 11:23:06'),
(35, 1, 2224, 'SEDANG', '2026-04-15 11:23:11'),
(36, 1, 2224, 'SEDANG', '2026-04-15 11:23:14'),
(37, 1, 2033, 'SEDANG', '2026-04-15 11:23:15'),
(38, 1, 1296, 'SUNYI', '2026-04-15 11:23:24'),
(39, 1, 2907, 'BISING', '2026-04-15 11:23:29'),
(40, 1, 2016, 'SEDANG', '2026-04-15 11:23:32'),
(41, 1, 2016, 'SEDANG', '2026-04-15 11:23:35'),
(42, 1, 2909, 'BISING', '2026-04-15 11:23:36'),
(43, 1, 2194, 'SEDANG', '2026-04-15 11:23:42'),
(44, 1, 1454, 'SUNYI', '2026-04-15 11:23:46'),
(45, 1, 2323, 'SEDANG', '2026-04-15 11:23:53'),
(46, 1, 2149, 'SEDANG', '2026-04-15 11:23:56'),
(47, 1, 2149, 'SEDANG', '2026-04-15 11:23:59'),
(48, 1, 2118, 'SEDANG', '2026-04-15 11:23:59'),
(49, 1, 2559, 'BISING', '2026-04-15 11:24:03'),
(50, 1, 2274, 'SEDANG', '2026-04-15 11:24:07'),
(51, 1, 2274, 'SEDANG', '2026-04-15 11:24:10'),
(52, 1, 2915, 'BISING', '2026-04-15 11:24:18'),
(53, 1, 2915, 'BISING', '2026-04-15 11:24:21'),
(54, 1, 2259, 'SEDANG', '2026-04-15 11:24:21'),
(55, 1, 2910, 'BISING', '2026-04-15 11:24:25'),
(56, 1, 1104, 'SUNYI', '2026-04-15 11:24:31'),
(57, 1, 2491, 'SEDANG', '2026-04-15 11:24:38'),
(58, 1, 2061, 'SEDANG', '2026-04-15 11:24:41'),
(59, 1, 2061, 'SEDANG', '2026-04-15 11:24:44'),
(60, 1, 2091, 'SEDANG', '2026-04-15 11:24:47'),
(61, 1, 2905, 'BISING', '2026-04-15 11:24:50'),
(62, 1, 2423, 'SEDANG', '2026-04-15 11:24:54'),
(63, 1, 2423, 'SEDANG', '2026-04-15 11:24:57'),
(64, 1, 2022, 'SEDANG', '2026-04-15 11:24:57'),
(65, 1, 2290, 'SEDANG', '2026-04-15 11:25:02'),
(66, 1, 2502, 'BISING', '2026-04-15 11:25:05'),
(67, 1, 2502, 'BISING', '2026-04-15 11:25:08'),
(68, 1, 2226, 'SEDANG', '2026-04-15 11:25:13'),
(69, 1, 1160, 'SUNYI', '2026-04-15 11:25:19'),
(70, 1, 2240, 'SEDANG', '2026-04-15 11:25:22'),
(71, 1, 85, 'BISING', '2026-04-15 11:25:26'),
(72, 1, 1657, 'SEDANG', '2026-04-15 11:25:30'),
(73, 1, 2293, 'SEDANG', '2026-04-15 11:25:33'),
(74, 1, 771, 'SUNYI', '2026-04-15 11:25:40'),
(75, 1, 2128, 'SEDANG', '2026-04-15 11:25:42'),
(76, 1, 896, 'SUNYI', '2026-04-15 11:25:51'),
(77, 1, 2240, 'SEDANG', '2026-04-15 11:25:51'),
(78, 1, 2210, 'SEDANG', '2026-04-15 11:25:58'),
(79, 1, 2210, 'SEDANG', '2026-04-15 11:26:02'),
(80, 1, 2546, 'BISING', '2026-04-15 11:26:03'),
(81, 1, 2366, 'SEDANG', '2026-04-15 11:26:09'),
(82, 1, 2366, 'SEDANG', '2026-04-15 11:26:12'),
(83, 1, 2918, 'BISING', '2026-04-15 11:26:15'),
(84, 1, 2673, 'BISING', '2026-04-15 11:26:21'),
(85, 1, 2673, 'BISING', '2026-04-15 11:26:24'),
(86, 1, 2210, 'SEDANG', '2026-04-15 11:26:26'),
(87, 1, 2120, 'SEDANG', '2026-04-15 11:26:30'),
(88, 1, 2287, 'SEDANG', '2026-04-15 11:26:33'),
(89, 1, 2287, 'SEDANG', '2026-04-15 11:26:36'),
(90, 1, 2159, 'SEDANG', '2026-04-15 11:26:42'),
(91, 1, 1049, 'SUNYI', '2026-04-15 11:26:46'),
(92, 1, 2081, 'SEDANG', '2026-04-15 11:26:47'),
(93, 1, 2896, 'BISING', '2026-04-15 11:26:50'),
(94, 1, 2294, 'SEDANG', '2026-04-15 11:26:53'),
(95, 1, 2035, 'SEDANG', '2026-04-15 11:26:56'),
(96, 1, 2035, 'SEDANG', '2026-04-15 11:26:59'),
(97, 1, 2237, 'SEDANG', '2026-04-15 11:27:00'),
(98, 1, 2079, 'SEDANG', '2026-04-15 11:27:04'),
(99, 1, 2356, 'SEDANG', '2026-04-15 11:27:09'),
(100, 1, 2356, 'SEDANG', '2026-04-15 11:27:12'),
(101, 1, 2112, 'SEDANG', '2026-04-15 11:27:15'),
(102, 1, 1136, 'SUNYI', '2026-04-15 11:27:22'),
(103, 1, 2069, 'SEDANG', '2026-04-15 11:27:23'),
(104, 1, 2750, 'BISING', '2026-04-15 11:27:27'),
(105, 1, 1109, 'SUNYI', '2026-04-15 11:27:32'),
(106, 1, 2085, 'SEDANG', '2026-04-15 11:27:33'),
(107, 1, 2135, 'SEDANG', '2026-04-15 11:27:40'),
(108, 1, 2135, 'SEDANG', '2026-04-15 11:27:43'),
(109, 1, 2023, 'SEDANG', '2026-04-15 11:27:52'),
(110, 1, 2023, 'SEDANG', '2026-04-15 11:27:55'),
(111, 1, 1278, 'SUNYI', '2026-04-15 11:28:05'),
(112, 1, 2097, 'SEDANG', '2026-04-15 11:28:08'),
(113, 1, 1014, 'SUNYI', '2026-04-15 11:28:16'),
(114, 1, 2029, 'SEDANG', '2026-04-15 11:28:21'),
(115, 1, 1623, 'SEDANG', '2026-04-15 11:28:26'),
(116, 1, 2906, 'BISING', '2026-04-15 11:28:29'),
(117, 1, 2054, 'SEDANG', '2026-04-15 11:28:33'),
(118, 1, 2054, 'SEDANG', '2026-04-15 11:28:36'),
(119, 1, 2201, 'SEDANG', '2026-04-15 11:28:45'),
(120, 1, 2201, 'SEDANG', '2026-04-15 11:28:48'),
(121, 1, 2002, 'SEDANG', '2026-04-15 11:28:51'),
(122, 1, 707, 'SUNYI', '2026-04-15 11:28:59'),
(123, 1, 1712, 'SEDANG', '2026-04-15 11:29:09'),
(124, 1, 1498, 'SUNYI', '2026-04-15 11:29:19'),
(125, 1, 2128, 'SEDANG', '2026-04-15 11:29:22'),
(126, 1, 2115, 'SEDANG', '2026-04-15 11:29:25'),
(127, 1, 1242, 'SUNYI', '2026-04-15 11:29:29'),
(128, 1, 2157, 'SEDANG', '2026-04-15 11:29:31'),
(129, 1, 1673, 'SEDANG', '2026-04-15 11:29:40'),
(130, 1, 2341, 'SEDANG', '2026-04-15 11:29:43'),
(131, 1, 2207, 'SEDANG', '2026-04-15 11:29:50'),
(132, 1, 2207, 'SEDANG', '2026-04-15 11:29:53'),
(133, 1, 2096, 'SEDANG', '2026-04-15 11:29:53'),
(134, 1, 2174, 'SEDANG', '2026-04-15 11:29:57'),
(135, 1, 1438, 'SUNYI', '2026-04-15 11:30:03'),
(136, 1, 2559, 'BISING', '2026-04-15 11:30:05'),
(137, 1, 2012, 'SEDANG', '2026-04-15 11:30:09'),
(138, 1, 1338, 'SUNYI', '2026-04-15 11:30:14'),
(139, 1, 1242, 'SUNYI', '2026-04-15 11:30:24'),
(140, 1, 2319, 'SEDANG', '2026-04-15 11:30:34'),
(141, 1, 2319, 'SEDANG', '2026-04-15 11:30:37'),
(142, 1, 2023, 'SEDANG', '2026-04-15 11:30:39'),
(143, 1, 2003, 'SEDANG', '2026-04-15 11:30:44'),
(144, 1, 2003, 'SEDANG', '2026-04-15 11:30:47'),
(145, 1, 2021, 'SEDANG', '2026-04-15 11:30:57'),
(146, 1, 2021, 'SEDANG', '2026-04-15 11:31:00'),
(147, 1, 2001, 'SEDANG', '2026-04-15 11:31:02'),
(148, 1, 2293, 'SEDANG', '2026-04-15 11:31:07'),
(149, 1, 931, 'SUNYI', '2026-04-15 11:31:10'),
(150, 1, 2062, 'SEDANG', '2026-04-15 11:31:14'),
(151, 1, 1554, 'SEDANG', '2026-04-15 11:31:21'),
(152, 1, 2171, 'SEDANG', '2026-04-15 11:31:24'),
(153, 1, 2909, 'BISING', '2026-04-15 11:31:28'),
(154, 1, 2909, 'BISING', '2026-04-15 11:31:32'),
(155, 1, 2096, 'SEDANG', '2026-04-15 11:31:36'),
(156, 1, 2243, 'SEDANG', '2026-04-15 11:31:40'),
(157, 1, 2243, 'SEDANG', '2026-04-15 11:31:43'),
(158, 1, 2914, 'BISING', '2026-04-15 11:31:45'),
(159, 1, 979, 'SUNYI', '2026-04-15 11:31:54'),
(160, 1, 2077, 'SEDANG', '2026-04-15 11:31:54'),
(161, 1, 2683, 'BISING', '2026-04-15 11:32:00'),
(162, 1, 1104, 'SUNYI', '2026-04-15 11:32:04'),
(163, 1, 2010, 'SEDANG', '2026-04-15 11:32:05'),
(164, 1, 0, 'SUNYI', '2026-04-15 11:32:49'),
(165, 1, 0, 'SUNYI', '2026-04-15 11:32:59'),
(166, 1, 0, 'SUNYI', '2026-04-15 11:33:09'),
(167, 1, 0, 'SUNYI', '2026-04-15 11:33:19'),
(168, 1, 0, 'SUNYI', '2026-04-15 11:33:29'),
(169, 1, 0, 'SUNYI', '2026-04-15 11:33:39'),
(170, 1, 0, 'SUNYI', '2026-04-15 11:33:50'),
(171, 1, 0, 'SUNYI', '2026-04-15 11:34:00'),
(172, 1, 0, 'SUNYI', '2026-04-15 11:34:10'),
(173, 1, 0, 'SUNYI', '2026-04-15 11:34:39'),
(174, 1, 2279, 'SEDANG', '2026-04-15 11:35:50'),
(175, 1, 1621, 'SEDANG', '2026-04-15 11:35:57'),
(176, 1, 2256, 'SEDANG', '2026-04-15 11:36:25'),
(177, 1, 1506, 'SEDANG', '2026-04-15 11:36:33'),
(178, 1, 2198, 'SEDANG', '2026-04-15 11:36:34'),
(179, 1, 2299, 'SEDANG', '2026-04-15 11:36:42'),
(180, 1, 2299, 'SEDANG', '2026-04-15 11:36:45'),
(181, 1, 2871, 'BISING', '2026-04-15 11:36:45'),
(182, 1, 1730, 'SEDANG', '2026-04-15 11:36:55'),
(183, 1, 2070, 'SEDANG', '2026-04-15 11:36:56'),
(184, 1, 1267, 'SUNYI', '2026-04-15 11:37:05'),
(185, 1, 2102, 'SEDANG', '2026-04-15 11:37:06'),
(186, 1, 2172, 'SEDANG', '2026-04-15 11:37:13'),
(187, 1, 2172, 'SEDANG', '2026-04-15 11:37:16'),
(188, 1, 2176, 'SEDANG', '2026-04-15 11:37:18'),
(189, 1, 2277, 'SEDANG', '2026-04-15 11:37:25'),
(190, 1, 2277, 'SEDANG', '2026-04-15 11:37:28'),
(191, 1, 2595, 'BISING', '2026-04-15 11:37:29'),
(192, 1, 2619, 'BISING', '2026-04-15 11:37:36'),
(193, 1, 2619, 'BISING', '2026-04-15 11:37:39'),
(194, 1, 2186, 'SEDANG', '2026-04-15 11:37:41'),
(195, 1, 1459, 'SUNYI', '2026-04-15 11:37:50'),
(196, 1, 2122, 'SEDANG', '2026-04-15 11:37:53'),
(197, 1, 2127, 'SEDANG', '2026-04-15 11:37:58'),
(198, 1, 2127, 'SEDANG', '2026-04-15 11:38:01'),
(199, 1, 2689, 'BISING', '2026-04-15 11:38:01'),
(200, 1, 2128, 'SEDANG', '2026-04-15 11:38:07'),
(201, 1, 994, 'SUNYI', '2026-04-15 11:38:11'),
(202, 1, 2418, 'SEDANG', '2026-04-15 11:38:12'),
(203, 1, 2864, 'BISING', '2026-04-15 11:38:17'),
(204, 1, 2345, 'SEDANG', '2026-04-15 11:38:20'),
(205, 1, 2345, 'SEDANG', '2026-04-15 11:38:23'),
(206, 1, 2022, 'SEDANG', '2026-04-15 11:38:24'),
(207, 1, 2866, 'BISING', '2026-04-15 11:38:28'),
(208, 1, 976, 'SUNYI', '2026-04-15 11:38:34'),
(209, 1, 2158, 'SEDANG', '2026-04-15 11:38:45'),
(210, 1, 2158, 'SEDANG', '2026-04-15 11:38:48'),
(211, 1, 2117, 'SEDANG', '2026-04-15 11:38:56'),
(212, 1, 2117, 'SEDANG', '2026-04-15 11:38:59'),
(213, 1, 2867, 'BISING', '2026-04-15 11:39:00'),
(214, 1, 2005, 'SEDANG', '2026-04-15 11:39:08'),
(215, 1, 2005, 'SEDANG', '2026-04-15 11:39:11'),
(216, 1, 2192, 'SEDANG', '2026-04-15 11:39:15'),
(217, 1, 634, 'SUNYI', '2026-04-15 11:39:21'),
(218, 1, 2012, 'SEDANG', '2026-04-15 11:39:29'),
(219, 1, 2012, 'SEDANG', '2026-04-15 11:39:32'),
(220, 1, 2038, 'SEDANG', '2026-04-15 11:39:36'),
(221, 1, 2384, 'SEDANG', '2026-04-15 11:39:39'),
(222, 1, 2384, 'SEDANG', '2026-04-15 11:39:42'),
(223, 1, 2583, 'BISING', '2026-04-15 11:39:44'),
(224, 1, 2614, 'BISING', '2026-04-15 11:39:52'),
(225, 1, 2614, 'BISING', '2026-04-15 11:39:55'),
(226, 1, 2193, 'SEDANG', '2026-04-15 11:39:57'),
(227, 1, 2371, 'SEDANG', '2026-04-15 11:40:03'),
(228, 1, 2371, 'SEDANG', '2026-04-15 11:40:06'),
(229, 1, 2151, 'SEDANG', '2026-04-15 11:40:11'),
(230, 1, 2865, 'BISING', '2026-04-15 11:40:15'),
(231, 1, 2865, 'BISING', '2026-04-15 11:40:18'),
(232, 1, 2589, 'BISING', '2026-04-15 11:40:18'),
(233, 1, 2223, 'SEDANG', '2026-04-15 11:40:27'),
(234, 1, 1163, 'SUNYI', '2026-04-15 11:40:55'),
(235, 1, 2709, 'BISING', '2026-04-15 11:41:06'),
(236, 1, 2870, 'BISING', '2026-04-15 11:41:09'),
(237, 1, 2870, 'BISING', '2026-04-15 11:41:12'),
(238, 1, 2895, 'BISING', '2026-04-15 11:41:15'),
(239, 1, 2949, 'BISING', '2026-04-15 11:41:19'),
(240, 1, 2227, 'SEDANG', '2026-04-15 11:41:23'),
(241, 1, 2227, 'SEDANG', '2026-04-15 11:41:25'),
(242, 1, 2351, 'SEDANG', '2026-04-15 11:41:32'),
(243, 1, 925, 'SUNYI', '2026-04-15 11:41:36'),
(244, 1, 2506, 'BISING', '2026-04-15 11:41:37'),
(245, 1, 2028, 'SEDANG', '2026-04-15 11:41:54'),
(246, 1, 1051, 'SUNYI', '2026-04-15 11:41:58'),
(247, 1, 2078, 'SEDANG', '2026-04-15 11:42:00'),
(248, 1, 2325, 'SEDANG', '2026-04-15 11:42:04'),
(249, 1, 2382, 'SEDANG', '2026-04-15 11:42:07'),
(250, 1, 2226, 'SEDANG', '2026-04-15 11:42:12'),
(251, 1, 2406, 'SEDANG', '2026-04-15 11:42:18'),
(252, 1, 2406, 'SEDANG', '2026-04-15 11:42:20'),
(253, 1, 2148, 'SEDANG', '2026-04-15 11:42:22'),
(254, 1, 2418, 'SEDANG', '2026-04-15 11:42:28'),
(255, 1, 2418, 'SEDANG', '2026-04-15 11:42:31'),
(256, 1, 2559, 'BISING', '2026-04-15 11:42:33'),
(257, 1, 2446, 'SEDANG', '2026-04-15 11:42:37'),
(258, 1, 2035, 'SEDANG', '2026-04-15 11:42:41'),
(259, 1, 2869, 'BISING', '2026-04-15 11:43:54'),
(260, 1, 1469, 'SUNYI', '2026-04-15 11:43:57'),
(261, 1, 1469, 'SUNYI', '2026-04-15 11:44:03'),
(262, 1, 913, 'SUNYI', '2026-04-15 11:44:03'),
(263, 1, 2282, 'SEDANG', '2026-04-15 11:44:09'),
(264, 1, 1649, 'SEDANG', '2026-04-15 11:44:13'),
(265, 1, 2861, 'BISING', '2026-04-15 11:44:13'),
(266, 1, 2434, 'SEDANG', '2026-04-15 11:44:17'),
(267, 1, 1850, 'SEDANG', '2026-04-15 11:44:23'),
(268, 1, 2131, 'SEDANG', '2026-04-15 11:44:23'),
(269, 1, 2452, 'SEDANG', '2026-04-15 11:44:27'),
(270, 1, 2390, 'SEDANG', '2026-04-15 11:44:32'),
(271, 1, 2390, 'SEDANG', '2026-04-15 11:44:35'),
(272, 1, 2547, 'BISING', '2026-04-15 11:44:36'),
(273, 1, 1366, 'SUNYI', '2026-04-15 11:44:39'),
(274, 1, 1154, 'SUNYI', '2026-04-15 11:44:45'),
(275, 1, 1154, 'SUNYI', '2026-04-15 11:44:50'),
(276, 1, 2469, 'SEDANG', '2026-04-15 11:44:53'),
(277, 1, 2751, 'BISING', '2026-04-15 11:44:56'),
(278, 1, 2448, 'SEDANG', '2026-04-15 11:45:00'),
(279, 1, 2448, 'SEDANG', '2026-04-15 11:45:03'),
(280, 1, 2242, 'SEDANG', '2026-04-15 11:45:12'),
(281, 1, 2242, 'SEDANG', '2026-04-15 11:45:15'),
(282, 1, 2478, 'SEDANG', '2026-04-15 11:45:15'),
(283, 1, 2320, 'SEDANG', '2026-04-15 11:45:19'),
(284, 1, 2661, 'BISING', '2026-04-15 11:45:22'),
(285, 1, 823, 'SUNYI', '2026-04-15 11:45:25'),
(286, 1, 2159, 'SEDANG', '2026-04-15 11:45:26'),
(287, 1, 2865, 'BISING', '2026-04-15 11:45:30'),
(288, 1, 2623, 'BISING', '2026-04-15 11:45:33'),
(289, 1, 2623, 'BISING', '2026-04-15 11:45:36'),
(290, 1, 2707, 'BISING', '2026-04-15 11:45:38'),
(291, 1, 2037, 'SEDANG', '2026-04-15 11:45:41'),
(292, 1, 2192, 'SEDANG', '2026-04-15 11:45:46'),
(293, 1, 2192, 'SEDANG', '2026-04-15 11:45:49'),
(294, 1, 2687, 'BISING', '2026-04-15 11:45:53'),
(295, 1, 2864, 'BISING', '2026-04-15 11:45:57'),
(296, 1, 2864, 'BISING', '2026-04-15 11:46:00'),
(297, 1, 2347, 'SEDANG', '2026-04-15 11:46:01'),
(298, 1, 2869, 'BISING', '2026-04-15 11:46:05'),
(299, 1, 2192, 'SEDANG', '2026-04-15 11:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `device_id` bigint(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `user_id`, `device_id`, `message`, `status`, `created_at`) VALUES
(1, 1, 1, 'Anak anda perlu bantuan, segera datangi ke lokasi', 'unread', '2026-04-15 11:25:26'),
(2, 1, 1, 'Anak anda perlu bantuan, segera datangi ke lokasi', 'unread', '2026-04-15 11:43:57'),
(3, 1, 1, 'Anak anda perlu bantuan, segera datangi ke lokasi', 'unread', '2026-04-15 11:44:03'),
(4, 1, 1, 'Anak anda perlu bantuan, segera datangi ke lokasi', 'unread', '2026-04-15 11:44:39'),
(5, 1, 1, 'Anak anda perlu bantuan, segera datangi ke lokasi', 'unread', '2026-04-15 11:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `user_id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`user_id`, `name`, `email`, `phone`, `password`, `create_at`) VALUES
(1, 'Awa', 'awa@email.com', '081234567890', '123456', '2026-04-14 12:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` bigint(20) NOT NULL,
  `device_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `transaction_status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_log`
--

CREATE TABLE `service_log` (
  `service_id` bigint(20) NOT NULL,
  `device_id` bigint(20) DEFAULT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `is_warranty` tinyint(1) DEFAULT NULL,
  `service_status` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `device_location`
--
ALTER TABLE `device_location`
  ADD PRIMARY KEY (`loc_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `noise_logs`
--
ALTER TABLE `noise_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `device_id` (`device_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `service_log`
--
ALTER TABLE `service_log`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `device_id` (`device_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `device_location`
--
ALTER TABLE `device_location`
  MODIFY `loc_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `noise_logs`
--
ALTER TABLE `noise_logs`
  MODIFY `log_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_log`
--
ALTER TABLE `service_log`
  MODIFY `service_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `parents` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `device_location`
--
ALTER TABLE `device_location`
  ADD CONSTRAINT `device_location_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `devices` (`device_id`) ON DELETE CASCADE;

--
-- Constraints for table `noise_logs`
--
ALTER TABLE `noise_logs`
  ADD CONSTRAINT `noise_logs_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `devices` (`device_id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `parents` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `devices` (`device_id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `devices` (`device_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `parents` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `service_log`
--
ALTER TABLE `service_log`
  ADD CONSTRAINT `service_log_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `devices` (`device_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_log_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
