-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 02:47 AM
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
-- Database: `sistem_rekomendasi`
--

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_17_024949_create_table_bahan', 1),
(6, '2023_04_17_025248_create_table_service', 1),
(7, '2023_04_17_025340_create_table_ukuran', 1),
(8, '2023_04_17_025431_create_table_daftar_service', 1),
(9, '2023_04_17_025606_create_table_tempat_printing', 1),
(10, '2023_04_19_025848_create_table_tempat_printing', 2),
(11, '2023_04_19_030634_create_table_tempat_printing', 3),
(12, '2023_04_26_054809_create_table_tempat_printing', 4),
(13, '2023_05_07_105118_create_table_daftar_service', 5),
(14, '2023_05_11_074544_create_table_filter_bahan', 6),
(15, '2023_05_11_081651_create_table_filter_ukuran', 7),
(16, '2023_05_14_073147_create_table_filter_harga', 8);

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
-- Table structure for table `tbl_daftar_service`
--

CREATE TABLE `tbl_daftar_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tempat_printing` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `id_ukuran` bigint(20) UNSIGNED NOT NULL,
  `id_bahan` bigint(20) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_daftar_service`
--

INSERT INTO `tbl_daftar_service` (`id`, `id_tempat_printing`, `id_service`, `id_ukuran`, `id_bahan`, `harga`) VALUES
(1, 14, 25, 12144, 100, 5000),
(2, 14, 25, 12144, 85, 1500),
(3, 14, 26, 12144, 85, 500),
(4, 14, 26, 12143, 85, 1000),
(5, 14, 25, 12143, 85, 3500),
(6, 14, 30, 12143, 70, 8000),
(7, 14, 30, 12143, 107, 12000),
(8, 14, 30, 12143, 111, 13000),
(9, 14, 21, 12126, 79, 18000),
(10, 14, 21, 12126, 81, 40000),
(11, 14, 33, 12131, 79, 50000),
(12, 14, 33, 12131, 81, 80000),
(13, 14, 33, 12131, 61, 90000),
(14, 15, 25, 12139, 85, 60000),
(15, 15, 26, 12139, 85, 15000),
(16, 15, 25, 12140, 85, 35000),
(17, 15, 26, 12140, 85, 10000),
(18, 15, 25, 12141, 85, 15000),
(19, 15, 26, 12141, 85, 8000),
(20, 15, 25, 12143, 85, 5000),
(21, 15, 26, 12143, 85, 2000),
(22, 15, 25, 12144, 85, 3000),
(23, 15, 26, 12144, 85, 1000),
(24, 15, 25, 12142, 100, 11000),
(25, 15, 25, 12143, 69, 16000),
(26, 15, 25, 12143, 91, 16000),
(27, 15, 25, 12142, 62, 8000),
(28, 15, 25, 12142, 65, 7000),
(29, 15, 25, 12139, 61, 150000),
(30, 15, 25, 12140, 61, 75000),
(31, 15, 25, 12141, 61, 50000),
(32, 15, 30, 12142, 90, 20000),
(33, 15, 30, 12142, 107, 20000),
(34, 15, 30, 12142, 70, 15000),
(35, 15, 30, 12142, 85, 15000),
(36, 15, 30, 12142, 83, 25000),
(37, 15, 30, 12142, 104, 25000),
(38, 15, 30, 12142, 109, 35000),
(39, 16, 30, 12143, 70, 9000),
(40, 16, 30, 12143, 107, 10000),
(41, 16, 30, 12143, 111, 10000),
(42, 16, 30, 12143, 109, 13000),
(43, 16, 25, 12143, 85, 2000),
(44, 16, 26, 12143, 85, 5500),
(45, 16, 25, 12143, 62, 6500),
(46, 16, 25, 12143, 95, 6000),
(47, 16, 25, 12143, 67, 7000),
(48, 16, 25, 12143, 71, 8000),
(49, 16, 25, 12143, 67, 15000),
(50, 16, 25, 12143, 92, 9000),
(51, 16, 25, 12143, 93, 9000),
(52, 16, 25, 12143, 100, 10000),
(53, 16, 25, 12143, 91, 14000),
(54, 16, 25, 12141, 100, 70000),
(55, 16, 25, 12140, 100, 130000),
(56, 16, 25, 12139, 100, 200000),
(57, 16, 25, 12140, 88, 35000),
(58, 16, 25, 12139, 88, 60000),
(59, 17, 33, 12131, 61, 90000),
(60, 17, 33, 12131, 94, 100000),
(61, 17, 33, 12131, 76, 110000),
(62, 17, 33, 12131, 81, 90000),
(63, 17, 34, 12131, 61, 100000),
(64, 17, 34, 12131, 94, 110000),
(65, 17, 34, 12131, 76, 120000),
(66, 17, 34, 12131, 81, 100000),
(67, 17, 28, 12131, 61, 230000),
(68, 17, 28, 12131, 94, 240000),
(69, 17, 28, 12131, 76, 250000),
(70, 17, 28, 12131, 81, 230000),
(71, 17, 28, 12138, 61, 280000),
(72, 17, 28, 12138, 94, 290000),
(73, 17, 28, 12138, 76, 300000),
(74, 17, 28, 12138, 81, 280000),
(75, 17, 25, 12142, 85, 2000),
(76, 17, 25, 12142, 65, 2500),
(77, 17, 25, 12142, 95, 2500),
(78, 17, 25, 12142, 62, 3500),
(79, 17, 25, 12142, 67, 6000),
(80, 17, 25, 12142, 91, 6000),
(81, 17, 30, 12142, 70, 6000),
(82, 17, 30, 12142, 67, 6000),
(83, 17, 30, 12142, 91, 6000),
(84, 17, 30, 12142, 107, 12000),
(85, 17, 30, 12142, 111, 15000),
(86, 17, 24, 12128, 62, 30000),
(87, 17, 24, 12128, 61, 35000),
(88, 18, 33, 12131, 79, 140000),
(89, 18, 33, 12131, 81, 185000),
(90, 18, 33, 12131, 61, 170000),
(91, 18, 33, 12131, 94, 175000),
(92, 18, 33, 12131, 99, 210000),
(93, 18, 33, 12131, 76, 215000),
(94, 18, 33, 12131, 80, 165000),
(95, 18, 33, 12136, 79, 225000),
(96, 18, 33, 12136, 81, 310000),
(97, 18, 33, 12136, 61, 285000),
(98, 18, 33, 12136, 94, 295000),
(99, 18, 33, 12136, 99, 365000),
(100, 18, 33, 12136, 76, 380000),
(101, 18, 33, 12136, 80, 265000),
(102, 18, 28, 12131, 79, 300000),
(103, 18, 28, 12131, 81, 345000),
(104, 18, 28, 12131, 61, 330000),
(105, 18, 28, 12131, 94, 335000),
(106, 18, 28, 12131, 99, 370000),
(107, 18, 28, 12131, 76, 380000),
(108, 18, 28, 12131, 80, 325000),
(109, 18, 28, 12138, 79, 400000),
(110, 18, 28, 12138, 81, 485000),
(111, 18, 28, 12138, 61, 455000),
(112, 18, 28, 12138, 94, 465000),
(113, 18, 28, 12138, 99, 540000),
(114, 18, 28, 12138, 76, 555000),
(115, 18, 28, 12138, 80, 440000),
(116, 18, 24, 12128, 62, 41000),
(117, 18, 25, 12143, 61, 14500),
(118, 18, 25, 12143, 94, 15000),
(119, 18, 25, 12143, 100, 20000),
(120, 18, 25, 12143, 99, 20000),
(121, 18, 25, 12143, 69, 40000),
(122, 18, 25, 12143, 106, 15000),
(123, 18, 25, 12143, 105, 16500),
(124, 18, 25, 12141, 61, 27000),
(125, 18, 25, 12141, 94, 28500),
(126, 18, 25, 12141, 100, 37000),
(127, 18, 25, 12141, 99, 37000),
(128, 18, 25, 12141, 69, 77000),
(129, 18, 25, 12141, 106, 28500),
(130, 18, 25, 12141, 105, 31000),
(131, 18, 25, 12140, 61, 52000),
(132, 18, 25, 12140, 94, 55000),
(133, 18, 25, 12140, 100, 72000),
(134, 18, 25, 12140, 99, 72000),
(135, 18, 25, 12140, 69, 152000),
(136, 18, 25, 12140, 106, 55000),
(137, 18, 25, 12140, 105, 60000),
(138, 18, 25, 12139, 61, 10000),
(139, 18, 25, 12139, 94, 105000),
(140, 18, 25, 12139, 100, 140000),
(141, 18, 25, 12139, 99, 140000),
(142, 18, 25, 12139, 69, 300000),
(143, 18, 25, 12139, 106, 105000),
(144, 18, 25, 12139, 105, 115000),
(145, 18, 22, 12126, 79, 40000),
(146, 18, 22, 12126, 80, 60000),
(147, 18, 22, 12126, 112, 75000),
(148, 18, 22, 12126, 78, 90000),
(149, 18, 21, 12126, 79, 65000),
(150, 18, 21, 12126, 80, 85000),
(151, 18, 21, 12126, 112, 115000),
(152, 18, 21, 12126, 78, 105000),
(153, 18, 21, 12126, 72, 90000),
(154, 18, 21, 12126, 107, 90000),
(155, 18, 21, 12126, 111, 90000),
(156, 18, 21, 12126, 113, 125000),
(157, 18, 21, 12126, 113, 125000),
(158, 18, 21, 12126, 111, 165000),
(159, 18, 21, 12126, 61, 100000),
(160, 18, 21, 12126, 94, 105000),
(161, 18, 21, 12126, 100, 140000),
(162, 18, 21, 12126, 76, 155000),
(163, 18, 21, 12126, 106, 90000),
(164, 18, 21, 12126, 105, 100000),
(165, 18, 21, 12126, 99, 140000),
(166, 18, 21, 12126, 69, 300000),
(167, 18, 21, 12126, 65, 75000),
(168, 18, 21, 12126, 62, 85000),
(169, 19, 25, 12143, 85, 4500),
(170, 19, 26, 12143, 85, 2000),
(171, 19, 25, 12144, 85, 2250),
(172, 19, 26, 12144, 85, 350),
(173, 19, 30, 12143, 111, 16500),
(174, 19, 30, 12143, 108, 16500),
(175, 19, 30, 12143, 110, 16500),
(176, 19, 28, 12131, 79, 300000),
(177, 19, 28, 12131, 111, 300000),
(178, 19, 28, 12131, 80, 300000),
(179, 19, 28, 12131, 61, 300000),
(180, 19, 28, 12131, 94, 300000),
(181, 19, 28, 12131, 99, 300000),
(182, 19, 28, 12138, 79, 400000),
(183, 19, 28, 12138, 112, 400000),
(184, 19, 28, 12138, 80, 400000),
(185, 19, 28, 12138, 61, 400000),
(186, 19, 28, 12138, 94, 400000),
(187, 19, 28, 12138, 99, 400000),
(188, 19, 33, 12131, 79, 140000),
(189, 19, 33, 12131, 112, 140000),
(190, 19, 33, 12131, 80, 140000),
(191, 19, 33, 12131, 61, 140000),
(192, 19, 33, 12131, 94, 140000),
(193, 19, 33, 12131, 99, 140000),
(194, 19, 33, 12136, 79, 225000),
(195, 19, 33, 12136, 112, 225000),
(196, 19, 33, 12136, 80, 225000),
(197, 19, 33, 12136, 61, 225000),
(198, 19, 33, 12136, 94, 225000),
(199, 19, 33, 12136, 99, 225000),
(200, 19, 25, 12141, 62, 20750),
(201, 19, 25, 12141, 65, 20750),
(202, 19, 25, 12141, 99, 20750),
(203, 19, 25, 12141, 94, 20750),
(204, 19, 25, 12141, 100, 20750),
(205, 19, 25, 12141, 62, 20750),
(206, 19, 25, 12140, 65, 39500),
(207, 19, 25, 12140, 61, 39500),
(208, 19, 25, 12140, 94, 39500),
(209, 19, 25, 12140, 100, 39500),
(210, 19, 25, 12139, 62, 75000),
(211, 19, 25, 12139, 65, 75000),
(212, 19, 25, 12139, 61, 75000),
(213, 19, 25, 12139, 94, 75000),
(214, 19, 25, 12139, 100, 75000),
(215, 19, 27, 12141, 85, 8500),
(216, 19, 27, 12140, 85, 8500),
(217, 19, 27, 12139, 85, 8500),
(218, 19, 27, 12141, 88, 11000),
(219, 19, 27, 12140, 88, 11000),
(220, 19, 27, 12139, 88, 11000),
(221, 19, 27, 12141, 66, 8500),
(222, 19, 27, 12140, 66, 8500),
(223, 19, 27, 12139, 66, 8500),
(224, 20, 25, 12143, 85, 5000),
(225, 20, 25, 12143, 65, 5000),
(226, 20, 25, 12143, 95, 5000),
(227, 20, 25, 12143, 62, 6500),
(228, 20, 25, 12143, 75, 6000),
(229, 20, 25, 12143, 87, 6500),
(230, 20, 25, 12143, 67, 6000),
(231, 20, 25, 12143, 90, 6500),
(232, 20, 25, 12143, 96, 13500),
(233, 20, 25, 12143, 91, 6500),
(234, 20, 25, 12139, 85, 82500),
(235, 20, 25, 12140, 85, 42500),
(236, 20, 25, 12141, 85, 22500),
(237, 20, 25, 12139, 65, 65000),
(238, 20, 25, 12140, 65, 43500),
(239, 20, 25, 12141, 65, 23500),
(240, 20, 25, 12139, 62, 95000),
(241, 20, 25, 12140, 62, 50000),
(242, 20, 25, 12141, 62, 30000),
(243, 20, 25, 12139, 61, 100000),
(244, 20, 25, 12140, 61, 55000),
(245, 20, 25, 12141, 61, 30000),
(246, 20, 25, 12139, 94, 100000),
(247, 20, 25, 12140, 94, 55000),
(248, 20, 25, 12141, 94, 30000),
(249, 20, 25, 12139, 100, 100000),
(250, 20, 25, 12140, 100, 55000),
(251, 20, 25, 12141, 100, 30000),
(252, 20, 25, 12139, 69, 250000),
(253, 20, 25, 12140, 69, 150000),
(254, 20, 25, 12141, 69, 100000),
(255, 20, 26, 12143, 85, 5000),
(256, 20, 26, 12143, 65, 5000),
(257, 20, 26, 12143, 95, 5000),
(258, 20, 26, 12143, 62, 6300),
(259, 20, 26, 12143, 67, 6500),
(260, 20, 26, 12143, 91, 6500),
(261, 20, 30, 12143, 70, 6500),
(262, 20, 30, 12143, 85, 6500),
(263, 20, 30, 12143, 90, 6500),
(264, 20, 30, 12143, 107, 14000),
(265, 20, 30, 12143, 107, 14000),
(266, 20, 30, 12143, 111, 14000),
(267, 20, 30, 12143, 83, 16000),
(268, 20, 30, 12143, 104, 16000),
(269, 20, 30, 12143, 109, 18000),
(270, 20, 28, 12131, 61, 220000),
(271, 20, 28, 12131, 79, 170000),
(272, 20, 28, 12131, 81, 190000),
(273, 20, 28, 12131, 94, 220000),
(274, 20, 28, 12138, 61, 285000),
(275, 20, 28, 12138, 79, 220000),
(276, 20, 28, 12138, 81, 250000),
(277, 20, 28, 12138, 94, 285000),
(278, 20, 34, 12131, 61, 110000),
(279, 20, 34, 12131, 77, 70000),
(280, 20, 34, 12131, 79, 55000),
(281, 20, 34, 12131, 81, 85000),
(282, 20, 34, 12131, 94, 110000),
(283, 20, 24, 12128, 61, 40000),
(284, 20, 24, 12128, 79, 20000),
(285, 20, 24, 12128, 81, 35000),
(286, 20, 24, 12128, 62, 25000),
(287, 21, 25, 12143, 62, 20000),
(288, 21, 25, 12143, 64, 26000),
(289, 21, 25, 12143, 63, 26000),
(290, 21, 25, 12144, 62, 10000),
(291, 21, 25, 12144, 64, 16000),
(292, 21, 25, 12144, 63, 16000),
(293, 21, 25, 12141, 61, 40000),
(294, 21, 25, 12140, 61, 60000),
(295, 21, 25, 12139, 61, 120000),
(296, 21, 25, 12141, 62, 40000),
(297, 21, 25, 12140, 62, 60000),
(298, 21, 25, 12139, 62, 120000),
(299, 21, 30, 12143, 70, 30000),
(300, 21, 30, 12143, 107, 30000),
(301, 21, 30, 12143, 111, 30000),
(302, 21, 28, 12131, 61, 330000),
(303, 21, 28, 12138, 61, 400000),
(304, 22, 26, 12144, 85, 200),
(305, 22, 26, 12145, 85, 250),
(306, 22, 26, 12143, 85, 500),
(307, 22, 26, 12141, 85, 10000),
(308, 22, 26, 12140, 85, 15000),
(309, 22, 26, 12139, 85, 25000),
(310, 22, 25, 12144, 85, 1500),
(311, 22, 25, 12145, 85, 3000),
(312, 22, 25, 12143, 85, 3000),
(313, 22, 25, 12141, 85, 40000),
(314, 22, 25, 12140, 85, 60000),
(315, 22, 25, 12139, 85, 120000),
(316, 22, 26, 12141, 66, 10000),
(317, 22, 26, 12140, 66, 15000),
(318, 22, 26, 12139, 66, 25000),
(319, 22, 25, 12141, 66, 40000),
(320, 22, 25, 12140, 66, 60000),
(321, 22, 25, 12139, 66, 120000),
(322, 22, 26, 12141, 88, 10000),
(323, 22, 26, 12140, 88, 15000),
(324, 22, 26, 12139, 88, 25000),
(325, 22, 25, 12141, 88, 40000),
(326, 22, 25, 12140, 88, 60000),
(327, 22, 25, 12139, 88, 120000),
(328, 22, 25, 12142, 62, 4000),
(329, 22, 25, 12142, 67, 5000),
(330, 22, 25, 12142, 65, 3500),
(331, 22, 30, 12142, 107, 6500),
(332, 22, 30, 12142, 104, 15000),
(333, 22, 30, 12142, 83, 15000),
(334, 22, 30, 12142, 70, 6000),
(335, 22, 30, 12142, 107, 12000),
(336, 22, 30, 12142, 113, 65000),
(337, 22, 30, 12142, 97, 70000),
(338, 22, 22, 12126, 79, 22000),
(339, 22, 22, 12126, 81, 40000),
(340, 22, 22, 12126, 78, 60000),
(341, 22, 33, 12131, 79, 60000),
(342, 22, 33, 12131, 81, 100000),
(343, 22, 33, 12131, 61, 100000),
(344, 22, 28, 12131, 79, 200000),
(345, 22, 28, 12131, 81, 250000),
(346, 22, 28, 12131, 61, 250000),
(347, 22, 28, 12138, 79, 250000),
(348, 22, 28, 12138, 81, 300000),
(349, 22, 28, 12138, 61, 300000),
(350, 22, 21, 12126, 79, 38000),
(351, 22, 21, 12126, 81, 50000),
(352, 22, 21, 12126, 78, 70000),
(353, 23, 33, 12131, 61, 110000),
(354, 23, 33, 12131, 112, 130000),
(355, 23, 33, 12131, 81, 100000),
(356, 23, 33, 12131, 101, 120000),
(357, 23, 33, 12131, 77, 85000),
(358, 23, 24, 12128, 61, 45000),
(359, 23, 23, 12131, 81, 235000),
(360, 23, 23, 12131, 112, 275000),
(361, 23, 23, 12131, 77, 180000),
(362, 23, 23, 12131, 61, 250000),
(363, 23, 31, 12133, 89, 217000),
(364, 23, 31, 12130, 89, 176000),
(365, 23, 31, 12133, 86, 240000),
(366, 23, 31, 12134, 89, 300000),
(367, 23, 31, 12133, 98, 228000),
(368, 23, 31, 12132, 89, 192000),
(369, 23, 28, 12131, 61, 250000),
(370, 23, 28, 12131, 77, 155000),
(371, 23, 28, 12131, 112, 275000),
(372, 23, 28, 12131, 81, 235000),
(373, 23, 28, 12138, 61, 330000),
(374, 23, 28, 12138, 101, 340000),
(375, 23, 28, 12131, 101, 260000),
(376, 23, 28, 12137, 101, 310000),
(377, 23, 28, 12138, 77, 250000),
(378, 23, 28, 12137, 77, 240000),
(379, 23, 28, 12137, 61, 300000),
(380, 23, 28, 12137, 112, 330000),
(381, 23, 28, 12137, 81, 285000),
(382, 23, 28, 12138, 112, 350000),
(383, 23, 28, 12138, 81, 300000),
(384, 23, 28, 12124, 112, 600000),
(385, 23, 28, 12124, 81, 500000),
(386, 23, 28, 12125, 61, 650000),
(387, 23, 25, 12139, 107, 80000),
(388, 23, 25, 12139, 61, 90000),
(389, 23, 25, 12139, 100, 100000),
(390, 23, 25, 12140, 100, 60000),
(391, 23, 25, 12140, 107, 60000),
(392, 23, 25, 12140, 61, 60000),
(393, 23, 25, 12141, 107, 30000),
(394, 23, 25, 12141, 100, 30000),
(395, 23, 25, 12141, 61, 30000),
(396, 23, 25, 12143, 65, 5000),
(397, 23, 25, 12143, 85, 4500),
(398, 23, 25, 12143, 62, 8500),
(399, 23, 30, 12143, 85, 13000),
(400, 23, 30, 12143, 107, 27000),
(401, 23, 29, 12129, 82, 250000),
(402, 23, 29, 12133, 82, 220000),
(403, 23, 29, 12135, 82, 60000),
(404, 24, 25, 12140, 85, 30000),
(405, 24, 25, 12140, 88, 35000),
(406, 24, 25, 12140, 67, 35000),
(407, 24, 25, 12140, 100, 120000),
(408, 24, 25, 12140, 61, 60000),
(409, 24, 25, 12141, 85, 20000),
(410, 24, 25, 12141, 88, 25000),
(411, 24, 25, 12141, 67, 25000),
(412, 24, 25, 12141, 100, 70000),
(413, 24, 25, 12141, 61, 35000),
(414, 24, 25, 12143, 85, 5000),
(415, 24, 25, 12143, 88, 20000),
(416, 24, 25, 12143, 67, 12000),
(417, 24, 25, 12143, 100, 40000),
(418, 24, 25, 12143, 65, 6000),
(419, 24, 25, 12143, 62, 6000),
(420, 24, 25, 12144, 85, 3000),
(421, 24, 25, 12144, 88, 10000),
(422, 24, 25, 12144, 67, 5000),
(423, 24, 25, 12144, 100, 20000),
(424, 24, 25, 12144, 73, 5000),
(425, 24, 25, 12144, 65, 3000),
(426, 24, 25, 12144, 62, 3000),
(427, 24, 26, 12140, 85, 20000),
(428, 24, 26, 12140, 88, 25000),
(429, 24, 26, 12140, 67, 25000),
(430, 24, 26, 12141, 85, 15000),
(431, 24, 26, 12141, 88, 20000),
(432, 24, 26, 12141, 67, 20000),
(433, 24, 26, 12143, 85, 3000),
(434, 24, 26, 12143, 88, 15000),
(435, 24, 26, 12143, 67, 5000),
(436, 24, 26, 12144, 85, 1000),
(437, 24, 26, 12144, 88, 7000),
(438, 24, 26, 12144, 67, 3000),
(439, 24, 30, 12143, 70, 6000),
(440, 24, 30, 12143, 107, 10000),
(441, 24, 30, 12143, 111, 10000),
(442, 25, 26, 12145, 85, 1000),
(443, 25, 26, 12144, 85, 1000),
(444, 25, 26, 12143, 85, 2000),
(445, 25, 26, 12141, 85, 5000),
(446, 25, 26, 12140, 85, 10000),
(447, 25, 26, 12139, 85, 20000),
(448, 25, 25, 12145, 85, 2000),
(449, 25, 25, 12144, 85, 2000),
(450, 25, 25, 12143, 85, 4000),
(451, 25, 25, 12141, 85, 15000),
(452, 25, 25, 12140, 85, 20000),
(453, 25, 25, 12139, 85, 60000),
(454, 25, 25, 12144, 65, 4000),
(455, 25, 25, 12144, 95, 4000),
(456, 25, 25, 12144, 62, 4500),
(457, 25, 27, 12139, 88, 50000),
(458, 25, 27, 12139, 100, 180000),
(459, 25, 27, 12139, 107, 150000),
(460, 25, 27, 12139, 61, 120000),
(461, 25, 27, 12140, 88, 25000),
(462, 25, 27, 12140, 100, 90000),
(463, 25, 27, 12140, 107, 80000),
(464, 25, 27, 12140, 61, 60000),
(465, 25, 27, 12141, 88, 20000),
(466, 25, 27, 12141, 100, 50000),
(467, 25, 27, 12141, 107, 40000),
(468, 25, 27, 12141, 61, 30000),
(469, 25, 21, 12126, 79, 30000),
(470, 25, 21, 12126, 61, 90000),
(471, 25, 22, 12126, 79, 25000),
(472, 25, 22, 12126, 81, 50000),
(473, 25, 33, 12131, 79, 75000),
(474, 25, 33, 12131, 81, 95000),
(475, 25, 33, 12131, 61, 110000),
(476, 25, 33, 12136, 79, 155000),
(477, 25, 33, 12136, 81, 165000),
(478, 25, 33, 12136, 61, 175000),
(479, 25, 28, 12131, 79, 175000),
(480, 25, 28, 12131, 81, 190000),
(481, 25, 28, 12131, 61, 235000),
(482, 25, 28, 12137, 79, 210000),
(483, 25, 28, 12137, 81, 240000),
(484, 25, 28, 12137, 61, 315000),
(485, 25, 28, 12138, 79, 215000),
(486, 25, 28, 12138, 81, 245000),
(487, 25, 28, 12138, 61, 325000),
(488, 25, 28, 12124, 79, 245000),
(489, 25, 28, 12124, 81, 285000),
(490, 25, 28, 12124, 61, 395000),
(491, 25, 30, 12143, 107, 10000),
(492, 25, 30, 12143, 111, 10000),
(493, 25, 30, 12143, 70, 8500),
(494, 25, 31, 12133, 89, 250000),
(495, 25, 31, 12133, 86, 20000),
(496, 26, 30, 12142, 85, 8000),
(497, 26, 30, 12142, 70, 8000),
(498, 26, 30, 12142, 111, 12000),
(499, 26, 30, 12142, 107, 12222),
(500, 26, 32, 12139, 85, 70000),
(501, 26, 32, 12139, 65, 80000),
(502, 26, 32, 12139, 62, 90000),
(503, 26, 32, 12140, 85, 58000),
(504, 26, 32, 12140, 65, 60000),
(505, 26, 32, 12140, 62, 65000),
(506, 26, 32, 12141, 85, 55000),
(507, 26, 32, 12141, 65, 55000),
(508, 26, 32, 12141, 62, 60000),
(509, 26, 25, 12142, 85, 6500),
(510, 26, 25, 12142, 65, 6500),
(511, 26, 25, 12142, 95, 6500),
(512, 26, 25, 12142, 62, 7000),
(513, 26, 25, 12142, 67, 6500),
(514, 26, 25, 12142, 73, 6500),
(515, 26, 25, 12142, 91, 6500),
(516, 26, 25, 12142, 74, 10500),
(517, 26, 25, 12142, 69, 11000),
(518, 26, 25, 12142, 102, 11000),
(519, 26, 24, 12128, 61, 50000),
(520, 26, 24, 12128, 79, 25000),
(521, 26, 24, 12128, 81, 45000),
(522, 26, 24, 12128, 112, 75000),
(523, 26, 33, 12131, 61, 120000),
(524, 26, 33, 12131, 79, 80000),
(525, 26, 33, 12131, 81, 150000),
(526, 26, 33, 12131, 112, 175000),
(527, 26, 33, 12136, 61, 180000),
(528, 26, 33, 12136, 79, 150000),
(529, 26, 33, 12136, 81, 220000),
(530, 26, 33, 12136, 112, 250000),
(531, 26, 34, 12131, 61, 140000),
(532, 26, 34, 12131, 79, 90000),
(533, 26, 34, 12131, 81, 160000),
(534, 26, 34, 12131, 112, 175000),
(535, 26, 34, 12136, 61, 250000),
(536, 26, 34, 12136, 79, 225000),
(537, 26, 34, 12136, 81, 250000),
(538, 26, 34, 12136, 112, 250000),
(539, 26, 28, 12138, 61, 375000),
(540, 26, 28, 12138, 79, 350000),
(541, 26, 28, 12138, 81, 380000),
(542, 26, 28, 12138, 112, 375000),
(543, 26, 28, 12124, 61, 600000),
(544, 26, 28, 12124, 79, 60000),
(545, 26, 28, 12124, 81, 650000),
(546, 26, 28, 12124, 112, 700000),
(547, 26, 31, 12131, 89, 550000),
(548, 26, 31, 12139, 89, 470000),
(549, 26, 31, 12140, 89, 330000),
(550, 26, 31, 12141, 89, 290000),
(551, 27, 25, 12142, 65, 8000),
(552, 27, 25, 12142, 62, 8500),
(553, 27, 30, 12142, 70, 9000),
(554, 27, 30, 12142, 107, 16000),
(555, 27, 26, 12144, 85, 800),
(556, 27, 26, 12145, 85, 800),
(557, 27, 26, 12143, 85, 1500),
(558, 27, 33, 12131, 79, 95000),
(559, 27, 33, 12131, 81, 120000),
(560, 27, 33, 12131, 61, 245000),
(561, 27, 28, 12131, 81, 280000),
(562, 27, 28, 12137, 81, 345000),
(563, 27, 28, 12131, 61, 415000),
(564, 27, 28, 12137, 61, 560000),
(565, 27, 22, 12126, 79, 30000),
(566, 27, 22, 12126, 81, 70000),
(567, 27, 22, 12126, 112, 550000),
(568, 28, 22, 12126, 79, 20000),
(569, 28, 22, 12126, 81, 55000),
(570, 28, 22, 12126, 112, 75000),
(571, 28, 21, 12126, 79, 45000),
(572, 28, 21, 12126, 81, 75000),
(573, 28, 21, 12126, 112, 80000),
(574, 28, 25, 12143, 67, 6000),
(575, 28, 25, 12143, 62, 5000),
(576, 28, 25, 12143, 95, 6500),
(577, 28, 25, 12143, 65, 5000),
(578, 28, 25, 12143, 88, 3000),
(579, 28, 25, 12143, 85, 5000),
(580, 28, 25, 12143, 90, 5000),
(581, 28, 25, 12141, 62, 40000),
(582, 28, 25, 12141, 65, 38000),
(583, 28, 26, 12143, 85, 600),
(584, 29, 25, 12142, 77, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_filter_bahan`
--

CREATE TABLE `tbl_filter_bahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `id_bahan` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_filter_bahan`
--

INSERT INTO `tbl_filter_bahan` (`id`, `id_service`, `id_bahan`) VALUES
(1, 21, 61),
(2, 21, 62),
(3, 21, 65),
(4, 21, 69),
(5, 21, 72),
(6, 21, 76),
(7, 21, 78),
(8, 21, 79),
(9, 21, 80),
(10, 21, 81),
(11, 21, 94),
(12, 21, 99),
(13, 21, 100),
(14, 21, 105),
(15, 21, 106),
(16, 21, 107),
(17, 21, 111),
(18, 21, 112),
(19, 21, 113),
(20, 22, 79),
(21, 22, 80),
(22, 22, 112),
(23, 22, 78),
(24, 22, 81),
(25, 23, 81),
(26, 23, 112),
(27, 23, 77),
(28, 23, 61),
(29, 24, 62),
(30, 24, 61),
(31, 24, 79),
(32, 24, 81),
(33, 24, 112),
(34, 25, 100),
(35, 25, 85),
(36, 25, 69),
(37, 25, 91),
(38, 25, 62),
(39, 25, 65),
(40, 25, 61),
(41, 25, 95),
(42, 25, 67),
(43, 25, 71),
(44, 25, 92),
(45, 25, 93),
(46, 25, 88),
(47, 25, 94),
(48, 25, 99),
(49, 25, 106),
(50, 25, 105),
(51, 25, 75),
(52, 25, 87),
(53, 25, 90),
(54, 25, 96),
(55, 25, 64),
(56, 25, 63),
(57, 25, 66),
(58, 25, 107),
(59, 25, 73),
(60, 25, 74),
(61, 25, 102),
(62, 26, 85),
(63, 26, 65),
(64, 26, 95),
(65, 26, 62),
(66, 26, 67),
(67, 26, 91),
(68, 26, 66),
(69, 26, 88),
(70, 27, 85),
(71, 27, 88),
(72, 27, 66),
(73, 27, 100),
(74, 27, 107),
(75, 27, 61),
(76, 28, 61),
(77, 28, 94),
(78, 28, 76),
(79, 28, 81),
(80, 28, 79),
(81, 28, 99),
(82, 28, 80),
(83, 28, 111),
(84, 28, 112),
(85, 28, 77),
(86, 28, 101),
(87, 29, 82),
(88, 30, 70),
(89, 30, 107),
(90, 30, 111),
(91, 30, 90),
(92, 30, 85),
(93, 30, 83),
(94, 30, 104),
(95, 30, 109),
(96, 30, 67),
(97, 30, 91),
(98, 30, 108),
(99, 30, 110),
(100, 30, 113),
(101, 30, 97),
(102, 31, 89),
(103, 31, 86),
(104, 31, 98),
(105, 32, 65),
(106, 32, 62),
(107, 32, 85),
(108, 33, 61),
(109, 33, 76),
(110, 33, 77),
(111, 33, 79),
(112, 33, 80),
(113, 33, 81),
(114, 33, 94),
(115, 33, 99),
(116, 33, 101),
(117, 33, 112),
(118, 34, 61),
(119, 34, 94),
(120, 34, 76),
(121, 34, 81),
(122, 34, 77),
(123, 34, 79),
(124, 34, 112);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_filter_harga`
--

CREATE TABLE `tbl_filter_harga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_filter_harga`
--

INSERT INTO `tbl_filter_harga` (`id`, `id_service`, `harga`) VALUES
(1, 21, 300000),
(2, 22, 550000),
(3, 23, 275000),
(4, 24, 75000),
(5, 25, 300000),
(6, 26, 25000),
(7, 27, 180000),
(8, 28, 700000),
(9, 29, 250000),
(10, 30, 70000),
(11, 31, 550000),
(12, 32, 90000),
(13, 33, 380000),
(14, 34, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_filter_ukuran`
--

CREATE TABLE `tbl_filter_ukuran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `id_ukuran` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_filter_ukuran`
--

INSERT INTO `tbl_filter_ukuran` (`id`, `id_service`, `id_ukuran`) VALUES
(1, 21, 12126),
(2, 22, 12126),
(3, 23, 12131),
(4, 24, 12128),
(5, 25, 12144),
(6, 25, 12143),
(7, 25, 12139),
(8, 25, 12140),
(9, 25, 12141),
(10, 25, 12142),
(11, 25, 12145),
(12, 26, 12144),
(13, 26, 12143),
(14, 26, 12139),
(15, 26, 12140),
(16, 26, 12141),
(17, 26, 12145),
(18, 27, 12141),
(19, 27, 12140),
(20, 27, 12139),
(21, 28, 12131),
(22, 28, 12138),
(23, 28, 12137),
(24, 28, 12124),
(25, 28, 12125),
(26, 29, 12129),
(27, 29, 12133),
(28, 29, 12135),
(29, 30, 12143),
(30, 30, 12142),
(31, 31, 12133),
(32, 31, 12130),
(33, 31, 12134),
(34, 31, 12132),
(35, 31, 12131),
(36, 31, 12139),
(37, 31, 12140),
(38, 31, 12141),
(39, 32, 12139),
(40, 32, 12140),
(41, 32, 12141),
(42, 33, 12131),
(43, 33, 12136),
(44, 34, 12131),
(45, 34, 12136);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nama_bahan`
--

CREATE TABLE `tbl_nama_bahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_nama_bahan`
--

INSERT INTO `tbl_nama_bahan` (`id`, `nama_bahan`) VALUES
(61, 'ALBATROS'),
(62, 'ART CARTON'),
(63, 'ART CARTON DOFF'),
(64, 'ART CARTON GLOSSY'),
(65, 'ART PAPER'),
(66, 'BLUE PRINT'),
(67, 'BLUISH WHITE'),
(69, 'CANVAS COTTON'),
(70, 'CHROMO'),
(71, 'CHROMO COATED'),
(72, 'CLOTH'),
(73, 'CONCORDE'),
(74, 'CONQUEROR'),
(75, 'DUPLEX'),
(76, 'EASY BANNER'),
(77, 'FLEXI'),
(78, 'FLEXI BACKLIGHT'),
(79, 'FLEXI CINA'),
(80, 'FLEXI KORCIN'),
(81, 'FLEXI KOREA'),
(82, 'FOAM BOARD'),
(83, 'GOLD PAPER'),
(85, 'HVS'),
(86, 'INFRA BOARD'),
(87, 'JASMINE'),
(88, 'KALKIR'),
(89, 'KD BOARD'),
(90, 'KRAFT'),
(91, 'LINEN'),
(92, 'LORENZO BLUE'),
(93, 'LORENZO PINK'),
(94, 'LUSTER'),
(95, 'MATTE PAPER'),
(96, 'NOVAJET'),
(97, 'ONE WAY VISION'),
(98, 'PAPER BOARD'),
(99, 'PET BANNER MATTE'),
(100, 'PHOTO PAPER'),
(101, 'PVC'),
(102, 'PYRAMID'),
(104, 'SILVER PAPER'),
(105, 'TRISOLV TEBAL'),
(106, 'TRISOLV TIPIS'),
(107, 'VINYL'),
(108, 'VINYL GLOSSY'),
(109, 'VINYL HOLOGRAM'),
(110, 'VINYL MATTE'),
(111, 'VINYL TRANSPARANT'),
(112, 'FLEXI JERMAN'),
(113, 'VINYL RITRAMA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nama_service`
--

CREATE TABLE `tbl_nama_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_nama_service`
--

INSERT INTO `tbl_nama_service` (`id`, `nama_service`) VALUES
(21, 'BANNER INDOOR'),
(22, 'BANNER OUTDOOR'),
(23, 'DOOR FRAME'),
(24, 'MINI BANNER'),
(25, 'PRINT KERTAS BERWARNA'),
(26, 'PRINT KERTAS BNW'),
(27, 'PRINT PLOTTER'),
(28, 'ROLL-UP BANNER'),
(29, 'STANDING HUMAN'),
(30, 'STIKER'),
(31, 'TRIPOD POSTER'),
(32, 'UV PRINT'),
(33, 'X-BANNER'),
(34, 'Y-BANNER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tempat_printing`
--

CREATE TABLE `tbl_tempat_printing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `picture` blob NOT NULL,
  `bobot_jenis_layanan` int(11) NOT NULL,
  `bobot_bahan` int(11) NOT NULL,
  `bobot_harga` int(11) NOT NULL,
  `bobot_respon` int(11) NOT NULL,
  `bobot_ukuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tempat_printing`
--

INSERT INTO `tbl_tempat_printing` (`id`, `nama`, `alamat`, `no_hp`, `longitude`, `latitude`, `picture`, `bobot_jenis_layanan`, `bobot_bahan`, `bobot_harga`, `bobot_respon`, `bobot_ukuran`) VALUES
(14, 'Unii Media Digital Printing', 'Ruko Alloggio Timur Jl. Alloggio Raya No.11, Medang, Kec. Pagedangan, Kabupaten Tangerang, Banten 15334', '+62 851-6157-8388', '106.6058723200616', '-6.266715293410029', 0x756e696d656469612e706e67, 4, 5, 5, 2, 5),
(15, 'Gravtor Laser Cutting & Printing', 'Ruko Little No. 818 Jl. Permata sari Karawaci, Binong, Kec. Curug, Kabupaten Tangerang, Banten 15810', '+62 823-5930-0800', '106.58896918328392', '-6.224041337821031', 0x67726176746f722e706e67, 2, 5, 4, 2, 5),
(16, 'Pigma Digital Printing', 'Newton Timur 5, Scientia Garden Summarecon Serpong, Curug Sangereng, Tangerang Regency, Banten 15810', '+62 812-1212-0906', '106.61617807773304', '-6.255118699644273', 0x7069676d612e706e67, 2, 5, 5, 2, 3),
(17, 'Central Media Gading Serpong', 'Building B, Ruko Bolsena Blok No 22 Gading serpong, Klp. Dua, Tangerang, Kabupaten Tangerang, Banten 15810', '+62 819-0848-1848', '106.6205352531378', '-6.258919712146757', 0x63656e7472616c2e706e67, 5, 5, 4, 3, 4),
(18, 'PrintSmart @BSD 24 Jam', 'Jl. Anggrek Ungu No.15, Rw. Buntu, Kec. Serpong, BSD, Banten 15310', '+62 811-8800-154', '106.67310435575962', '-6.3035832062222905', 0x7072696e74736d6172742e706e67, 5, 5, 4, 3, 4),
(19, 'REVO Print Shop BSD Sektor 4', 'BSD Sektor 4, Jl. Pahlawan Seribu Blok RG No.16, RT.006/RW.001, Lengkong Wetan, Kec. Serpong, Banten 15310', '+62 817-4808-735', '106.66401715629912', '-6.280591882723221', 0x7265766f2e706e67, 5, 5, 5, 5, 5),
(20, 'JOSS PRINT Digital Printing', 'Jl. MH. Thamrin No.888 b, Panunggangan, Kec. Pinang, Kota Tangerang, Banten 15143', '085956685009', '106.64007278698487', '-6.227721076492458', 0x6a6f73732e706e67, 5, 5, 5, 4, 5),
(21, 'SNAPY digital printing Gading Serpong', 'Ruko Odessa, Blok AA2 Jl. Gading Serpong Boulevard No.48, Pakulonan Bar., Kec. Klp. Dua, Kabupaten Tangerang, Banten 15810', '+62 811-1783-939', '106.63312896609058', '-6.232101119739239', 0x73616e7070792e706e67, 3, 4, 4, 3, 5),
(22, 'Labagus Fotocopy And Printing', 'Jl. Beringin Raya No.22, RT.005/RW.001, Nusa Jaya, Kec. Karawaci, Kota Tangerang, Banten 15116', '+62 8111817071', '106.61710446614364', '-6.207799336241404', 0x6c7562616775732e706e67, 5, 5, 3, 3, 4),
(23, 'Ruang Print Gading Serpong', 'Jl. Klp. Lilin Utara II No.8, Curug Sangereng, Kec. Klp. Dua, Kabupaten Tangerang, Banten 15810', '+62 856-1112-119', '106.62466009608836', '-6.244467625823303', 0x7275616e677072696e742e706e67, 5, 5, 4, 5, 5),
(24, 'Pelangi Indah Digital Print & Cut - Serpong', 'Jl. Kelapa Gading Selatan Ruko Sektor 1A Blok AJ10 No 9, Pakulonan Bar., Kec. Klp. Dua, Kabupaten Tangerang, Banten 15810', '088293705161', '106.62844929307597', '-6.236521217635042', 0x70656c616e67692e706e67, 3, 5, 4, 3, 2),
(25, 'Sprint Digital Printing Pasmod', 'Ruko Pasar Modern Paramoung, Kabupaten Tangerang, Banten 15810', '0817300014', '106.6227542919322', '-6.247955167655508', 0x737072696e742e706e67, 5, 5, 5, 3, 5),
(26, 'Multi Kreasi Printing Gading Serpong', 'Gading Serpong Blok AJ 10 no 23, Jl. Klp. Gading Sel. No.Raya, West Pakulonan, Kelapa Dua, Tangerang Regency, Banten 15810', '0215468642', '106.627913448897', '-6.236313156192379', 0x6d6b7072696e742e706e67, 5, 5, 5, 4, 5),
(27, 'DOS Printing', 'Jl. Serpong Raya No.8, Pd. Jagung, Kec. Serpong Utara, Kota Tangerang Selatan, Banten 15326', '+62 821-2335-5668', '106.65097902430202', '-6.255191584294864', 0x646f732e706e67, 5, 4, 5, 2, 4),
(28, 'Instaprint Gading Serpong', 'Ruko CBD Paramount 7Cs blok DF3 no. 9 Curug Sangereng Kelapa Dua, Summarecon, Serpong, Kabupaten Tangerang, Banten 15810', '+62 813-5675-9990', '106.62400233540447', '-6.245549095166446', 0x696e7374617072696e742e706e67, 3, 3, 5, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ukuran`
--

CREATE TABLE `tbl_ukuran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_ukuran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_ukuran`
--

INSERT INTO `tbl_ukuran` (`id`, `jenis_ukuran`) VALUES
(12124, '120 x 200'),
(12125, '150 x 200'),
(12126, '1M2'),
(12128, '29 x 41'),
(12129, '50 x 110'),
(12130, '50 x 70'),
(12131, '60 x 160'),
(12132, '60 x 60'),
(12133, '60 x 80'),
(12134, '80 x 100'),
(12135, '80 x 170'),
(12136, '80 x 180'),
(12137, '80 x 200'),
(12138, '85 x 200'),
(12139, 'A0'),
(12140, 'A1'),
(12141, 'A2'),
(12142, 'A3+'),
(12143, 'A3'),
(12144, 'A4'),
(12145, 'F4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'budakserdamumn', '123@gmail.com', '$2y$10$k8jHXigb73IFpYYN0WhtEevRmIv4udteeiQ9r2932LiONTjdWP.0u', '2023-04-16 20:28:18', '2023-04-16 20:28:18'),
(2, 'Ryan', 'huhuhaha@gmail.com', '$2y$10$FJ3h9UNA8moF/A/stmWICOhrGe4VBZS9D/eQNc5fRhcqXqbO2npXS', '2023-04-23 23:39:18', '2023-04-23 23:39:18');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_daftar_service`
--
ALTER TABLE `tbl_daftar_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_filter_bahan`
--
ALTER TABLE `tbl_filter_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_filter_harga`
--
ALTER TABLE `tbl_filter_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_filter_ukuran`
--
ALTER TABLE `tbl_filter_ukuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nama_bahan`
--
ALTER TABLE `tbl_nama_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nama_service`
--
ALTER TABLE `tbl_nama_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tempat_printing`
--
ALTER TABLE `tbl_tempat_printing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_daftar_service`
--
ALTER TABLE `tbl_daftar_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=585;

--
-- AUTO_INCREMENT for table `tbl_filter_bahan`
--
ALTER TABLE `tbl_filter_bahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tbl_filter_harga`
--
ALTER TABLE `tbl_filter_harga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_filter_ukuran`
--
ALTER TABLE `tbl_filter_ukuran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_nama_bahan`
--
ALTER TABLE `tbl_nama_bahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `tbl_nama_service`
--
ALTER TABLE `tbl_nama_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_tempat_printing`
--
ALTER TABLE `tbl_tempat_printing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12146;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;