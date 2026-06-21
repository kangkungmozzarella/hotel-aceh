-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2026 at 06:55 PM
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
-- Database: `hotel_aceh`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `value` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `hotel_id`, `criteria_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 714169, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(2, 1, 2, 7, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(3, 1, 3, 8.3, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(4, 1, 4, 5, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(5, 2, 1, 769091, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(6, 2, 2, 6, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(7, 2, 3, 8.6, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(8, 2, 4, 4, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(9, 3, 1, 444229, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(10, 3, 2, 6, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(11, 3, 3, 8.6, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(12, 3, 4, 3, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(13, 4, 1, 312448, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(14, 4, 2, 6, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(15, 4, 3, 8.7, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(16, 4, 4, 3, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(17, 5, 1, 450450, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(18, 5, 2, 6, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(19, 5, 3, 8.6, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(20, 5, 4, 3, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(21, 6, 1, 239803, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(22, 6, 2, 7, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(23, 6, 3, 8.3, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(24, 6, 4, 3, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(25, 7, 1, 707110, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(26, 7, 2, 7, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(27, 7, 3, 8.5, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(28, 7, 4, 5, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(29, 8, 1, 322314, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(30, 8, 2, 6, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(31, 8, 3, 8, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(32, 8, 4, 3, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(33, 9, 1, 272318, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(34, 9, 2, 4, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(35, 9, 3, 8.6, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(36, 9, 4, 3, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(37, 10, 1, 252476, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(38, 10, 2, 5, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(39, 10, 3, 8.3, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(40, 10, 4, 3, '2026-06-07 15:18:50', '2026-06-07 15:18:50'),
(41, 11, 1, 520000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(42, 11, 2, 7, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(43, 11, 3, 8.6, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(44, 11, 4, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(45, 12, 1, 385000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(46, 12, 2, 6, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(47, 12, 3, 8.4, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(48, 12, 4, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(49, 13, 1, 310000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(50, 13, 2, 5, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(51, 13, 3, 8.1, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(52, 13, 4, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(57, 15, 1, 165000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(58, 15, 2, 4, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(59, 15, 3, 7.2, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(60, 15, 4, 1, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(61, 16, 1, 180000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(62, 16, 2, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(63, 16, 3, 7.3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(64, 16, 4, 1, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(65, 17, 1, 340000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(66, 17, 2, 6, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(67, 17, 3, 8.2, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(68, 17, 4, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(69, 18, 1, 195000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(70, 18, 2, 4, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(71, 18, 3, 7.6, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(72, 18, 4, 2, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(73, 19, 1, 185000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(74, 19, 2, 4, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(75, 19, 3, 7.5, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(76, 19, 4, 1, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(81, 21, 1, 255000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(82, 21, 2, 5, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(83, 21, 3, 7.8, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(84, 21, 4, 2, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(85, 22, 1, 380000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(86, 22, 2, 7, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(87, 22, 3, 8.3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(88, 22, 4, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(89, 23, 1, 210000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(90, 23, 2, 4, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(91, 23, 3, 7.7, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(92, 23, 4, 2, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(93, 24, 1, 220000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(94, 24, 2, 5, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(95, 24, 3, 7.9, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(96, 24, 4, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(97, 25, 1, 450000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(98, 25, 2, 9, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(99, 25, 3, 8.5, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(100, 25, 4, 4, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(101, 26, 1, 275000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(102, 26, 2, 7, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(103, 26, 3, 8.1, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(104, 26, 4, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(105, 27, 1, 320000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(106, 27, 2, 6, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(107, 27, 3, 8.2, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(108, 27, 4, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(109, 28, 1, 295000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(110, 28, 2, 6, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(111, 28, 3, 8, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(112, 28, 4, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(113, 29, 1, 175000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(114, 29, 2, 4, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(115, 29, 3, 7.5, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(116, 29, 4, 2, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(121, 31, 1, 350000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(122, 31, 2, 7, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(123, 31, 3, 8.3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(124, 31, 4, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(125, 32, 1, 195000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(126, 32, 2, 4, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(127, 32, 3, 7.6, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(128, 32, 4, 2, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(129, 33, 1, 160000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(130, 33, 2, 4, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(131, 33, 3, 7.3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(132, 33, 4, 1, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(133, 34, 1, 145000, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(134, 34, 2, 3, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(135, 34, 3, 7.1, '2026-06-16 13:37:26', '2026-06-16 13:37:26'),
(136, 34, 4, 1, '2026-06-16 13:37:26', '2026-06-16 13:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `weight` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `name`, `type`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'Harga', 'cost', 0.3, '2026-06-07 15:04:00', '2026-06-07 15:04:00'),
(2, 'Fasilitas', 'benefit', 0.2, '2026-06-07 15:04:00', '2026-06-07 15:04:00'),
(3, 'Rating', 'benefit', 0.3, '2026-06-07 15:04:00', '2026-06-07 15:04:00'),
(4, 'Bintang', 'benefit', 0.2, '2026-06-07 15:04:00', '2026-06-07 15:04:00');

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
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_per_night` decimal(12,2) NOT NULL,
  `star` int(11) NOT NULL,
  `rating` double NOT NULL,
  `facilities` text NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `price_per_night`, `star`, `rating`, `facilities`, `address`, `latitude`, `longitude`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hermes Palace Hotel Banda Aceh', 714169.00, 5, 8.3, 'AC, Restoran, Kolam Renang, Resepsionis 24 Jam, Parkir, Lift, WiFi', 'Banda Aceh', 5.5559868, 95.3436362, NULL, '2026-06-07 13:47:12', '2026-06-15 21:38:00'),
(2, 'Kyriad Hotel Muraya Aceh', 769091.00, 4, 8.6, 'AC, Restoran, Resepsionis 24 Jam, Parkir, Lift, WiFi', 'Banda Aceh', 5.5567596, 95.3223587, NULL, '2026-06-07 13:47:12', '2026-06-15 21:49:08'),
(3, 'Portola Grand Arabia Hotel', 444229.00, 3, 8.6, 'AC, Restoran, Resepsionis 24 Jam, Parkir, Lift, WiFi', 'Banda Aceh', 5.5517261, 95.3133917, NULL, '2026-06-07 13:47:12', '2026-06-15 21:55:22'),
(4, 'Hip Hope Hotel', 312448.00, 3, 8.7, 'AC, Restoran, Resepsionis 24 Jam, Parkir, Lift, WiFi', 'Banda Aceh', 5.5530807, 95.3145327, NULL, '2026-06-07 13:47:12', '2026-06-15 21:51:32'),
(5, 'Ayani Hotel Banda Aceh', 450450.00, 3, 8.6, 'AC, Restoran, Resepsionis 24 Jam, Parkir, Lift, WiFi', 'Banda Aceh', 5.5572795, 95.3193680, NULL, '2026-06-07 13:47:12', '2026-06-15 22:10:31'),
(6, 'Hotel Grand Permata Hati Syariah', 239803.00, 3, 8.3, 'AC, Restoran, Kolam Renang, Resepsionis 24 Jam, Parkir, Lift, WiFi', 'Banda Aceh', 5.5527192, 95.2980280, NULL, '2026-06-07 13:47:12', '2026-06-15 22:11:01'),
(7, 'The Pade Hotel', 707110.00, 5, 8.5, 'AC, Restoran, Kolam Renang, Resepsionis 24 Jam, Parkir, Lift, WiFi', 'Banda Aceh', 5.5168490, 95.3166210, NULL, '2026-06-07 13:47:12', '2026-06-15 22:11:23'),
(8, 'Portola Arabia Hotel', 322314.00, 3, 8, 'AC, Restoran, Resepsionis 24 Jam, Parkir, Lift, WiFi', 'Banda Aceh', 5.5579806, 95.3200852, NULL, '2026-06-07 13:47:12', '2026-06-15 22:12:12'),
(9, 'Plum Hotel Lading Banda Aceh', 272318.00, 3, 8.6, 'AC, Restoran, Resepsionis 24 Jam, Parkir', 'Banda Aceh', 5.5560008, 95.3173997, NULL, '2026-06-07 13:47:12', '2026-06-15 22:12:51'),
(10, 'Grand Aceh Hotel', 252476.00, 3, 8.3, 'AC, Restoran, Resepsionis 24 Jam, Parkir, WiFi', 'Banda Aceh', 5.5316867, 95.3385204, NULL, '2026-06-07 13:47:12', '2026-06-15 22:13:36'),
(11, 'Grand Nanggroe Hotel', 520000.00, 3, 8.6, 'AC, Restoran, Kolam Renang, Pusat Kebugaran, WiFi, Laundry, Parkir', 'Jl. Tgk. Imuem Lueng Bata, Cot Mesjid, Banda Aceh', 5.5371695, 95.3414052, NULL, '2026-06-16 13:35:53', '2026-06-16 06:39:43'),
(12, 'Oasis Atjeh Hotel', 385000.00, 3, 8.4, 'AC, Restoran, Ruang Rapat, WiFi, Laundry, Parkir', 'Jl. Tgk. Imuem Lueng Bata No. 115, Banda Aceh', 5.5405547, 95.3391575, NULL, '2026-06-16 13:35:53', '2026-06-16 06:42:44'),
(13, 'Hotel Mekkah Banda Aceh', 310000.00, 3, 8.1, 'AC, Restoran, Kolam Renang, WiFi, Antar-Jemput Bandara', 'Jl. Tgk. M. Daud Beureueh No. 190, Banda Aceh', 5.5665034, 95.3378701, NULL, '2026-06-16 13:35:53', '2026-06-16 06:43:06'),
(15, 'Hotel Medan Banda Aceh', 165000.00, 1, 7.2, 'AC, Restoran, Ruang Rapat, WiFi', 'Jl. Jendral Ahmad Yani No. 17, Peunayong, Banda Aceh', 5.5573612, 95.3186713, NULL, '2026-06-16 13:35:53', '2026-06-16 06:46:48'),
(16, 'SEVENTEEN17 HOTEL', 180000.00, 1, 7.3, 'AC, WiFi, Parkir', 'Jl. Teuku Umar No. 350, Seutui, Banda Aceh', 5.5398912, 95.3090167, NULL, '2026-06-16 13:35:53', '2026-06-16 06:59:15'),
(17, 'Hotel Kuala Radja', 340000.00, 3, 8.2, 'AC, Restoran, Ruang Rapat, WiFi, Laundry, Parkir', 'Jl. Cut Nyak Dhien, Kuta Raja, Banda Aceh', 5.5660408, 95.3370686, NULL, '2026-06-16 13:35:53', '2026-06-16 06:59:59'),
(18, 'Urbanview Poma Hotel', 195000.00, 2, 7.6, 'AC, Restoran, WiFi, Parkir', 'Jl. Tgk. Daud Beureueh No. 173, Lampriet, Banda Aceh', 5.5646682, 95.3357623, NULL, '2026-06-16 13:35:53', '2026-06-16 07:03:59'),
(19, 'Hotel 61 Banda Aceh', 185000.00, 1, 7.5, 'AC, WiFi, Parkir, Restoran', 'Jl. Panglima Polem No. 28-34, Peunayong, Banda Aceh', 5.5569837, 95.3218412, NULL, '2026-06-16 13:35:53', '2026-06-16 07:04:34'),
(21, 'Garuda Hotel By Calandra', 255000.00, 2, 7.8, 'AC, Restoran, WiFi, Parkir, Resepsionis 24 Jam', 'Jl. T. Panglima Nyak Makam, Ulee Kareng, Banda Aceh', 5.5529003, 95.3153111, NULL, '2026-06-16 13:35:53', '2026-06-16 07:09:23'),
(22, 'Sultan Hotel Banda Aceh', 380000.00, 3, 8.3, 'AC, Restoran, Ruang Rapat, WiFi, Parkir, Resepsionis 24 Jam, Laundry', 'Jl. Tgk. H. Ahmad Dahlan, Kuta Alam, Banda Aceh', 5.5574687, 95.3210120, NULL, '2026-06-16 13:35:53', '2026-06-16 07:10:05'),
(23, 'Hotel O Banda Aceh', 210000.00, 2, 7.7, 'AC, WiFi, Parkir, Resepsionis 24 Jam', 'Jl. Tgk. Daud Beureueh, Baiturrahman, Banda Aceh', 5.5407140, 95.3065608, NULL, '2026-06-16 13:35:53', '2026-06-16 07:10:48'),
(24, 'Collection O Peunayong', 220000.00, 3, 7.9, 'AC, Restoran, WiFi, Parkir, Resepsionis 24 Jam', 'Jl. Ahmad Yani, Peunayong, Kuta Alam, Banda Aceh', 5.5586883, 95.3205324, NULL, '2026-06-16 13:35:53', '2026-06-16 07:11:23'),
(25, 'Muraya Hotel Aceh', 450000.00, 4, 8.5, 'AC, Restoran, Kolam Renang, Pusat Kebugaran, WiFi, Parkir, Spa, Laundry, Resepsionis 24 Jam', 'Jl. Soekarno Hatta No. 1, Daroy Kamue, Banda Aceh', 5.5568076, 95.3223802, NULL, '2026-06-16 13:35:53', '2026-06-16 09:46:03'),
(26, 'Permatahati Hotel and Convention Center', 275000.00, 3, 8.1, 'AC, Restoran, Aula, WiFi, Parkir, Laundry, Resepsionis 24 Jam', 'Jl. T. Nyak Arief, Jaya Baru, Banda Aceh', 5.5323863, 95.3526187, NULL, '2026-06-16 13:35:53', '2026-06-16 09:47:27'),
(27, 'Alhambra Hotel Banda Aceh', 320000.00, 3, 8.2, 'AC, Restoran, WiFi, Parkir, Laundry, Resepsionis 24 Jam', 'Jl. Teuku Hamzah Bendahara, Kuta Alam, Banda Aceh', 5.5557614, 95.3218934, NULL, '2026-06-16 13:35:53', '2026-06-16 09:48:30'),
(28, 'Jeumpa Hotel Banda Aceh', 295000.00, 3, 8, 'AC, Restoran, WiFi, Parkir, Laundry, Resepsionis 24 Jam', 'Jl. Cut Mutia, Baiturrahman, Banda Aceh', 5.5693961, 95.3411398, NULL, '2026-06-16 13:35:53', '2026-06-16 09:49:36'),
(29, 'OYO Syariah Ring Road', 175000.00, 2, 7.5, 'AC, WiFi, Parkir, Resepsionis 24 Jam', 'Jl. Soekarno Hatta, Lampeuneurut, Banda Aceh', 5.5306569, 95.3305330, NULL, '2026-06-16 13:35:53', '2026-06-16 09:50:30'),
(31, 'Hadrah Hotel Banda Aceh', 350000.00, 3, 8.3, 'AC, Restoran, WiFi, Parkir, Ruang Rapat, Resepsionis 24 Jam, Laundry', 'Jl. Tgk. Daud Beureueh, Kuta Alam, Banda Aceh', 5.5554284, 95.3441309, NULL, '2026-06-16 13:35:53', '2026-06-16 09:52:09'),
(32, 'Collection O Darussalam', 195000.00, 2, 7.6, 'AC, WiFi, Parkir, Resepsionis 24 Jam', 'Jl. T. Nyak Arief, Darussalam, Banda Aceh', 5.5747524, 95.3536713, NULL, '2026-06-16 13:35:53', '2026-06-16 09:52:52'),
(33, 'OYO 854 Ub Caisar Hotel', 160000.00, 1, 7.3, 'AC, WiFi, Parkir, TV', 'Jl. Dataran Aceh, Banda Aceh', 5.5757429, 95.3471464, NULL, '2026-06-16 13:35:53', '2026-06-16 09:53:26'),
(34, 'OYO Lamnyong Syariah', 145000.00, 1, 7.1, 'AC, WiFi, Parkir', 'Jl. Lamnyong, Darussalam, Banda Aceh', 5.5779015, 95.3549143, NULL, '2026-06-16 13:35:53', '2026-06-16 09:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_criteria_values`
--

CREATE TABLE `hotel_criteria_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `value` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_06_144107_create_permission_tables', 1),
(5, '2026_06_06_144147_create_hotel_tables', 1),
(6, '2026_06_06_144205_create_criterias_table', 1),
(7, '2026_06_06_144228_create_hotel_criteria_values', 1),
(8, '2026_06_07_150551_create_alternatives_table', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('5klqV4pnMFSkWkkSgd13VERSGVrFahtqqsEvkSrg', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieVNiZHpWVzN2NjN1V0FwV1NjU21QYmhzcUhlRTlFcVZndXNqQ0cweCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvaG90ZWxzIjtzOjU6InJvdXRlIjtzOjEyOiJob3RlbHMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc4MTYyODE4MDt9fQ==', 1781628890);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, '$2y$12$C5zc4tQee9mMVPcuMOZCbOib.fptzUpeEsx2nU0iyXVWq6sgdfjHq', 'z8TCdGm6UseIP8NkaJQwKtYIwheyZq2h12fFs4CEm79jRCx1y0ozDBjx3kI3', '2026-06-06 08:10:56', '2026-06-06 08:10:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatives_hotel_id_foreign` (`hotel_id`),
  ADD KEY `alternatives_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_criteria_values`
--
ALTER TABLE `hotel_criteria_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_criteria_values_hotel_id_foreign` (`hotel_id`),
  ADD KEY `hotel_criteria_values_criteria_id_foreign` (`criteria_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `hotel_criteria_values`
--
ALTER TABLE `hotel_criteria_values`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `alternatives_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatives_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel_criteria_values`
--
ALTER TABLE `hotel_criteria_values`
  ADD CONSTRAINT `hotel_criteria_values_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_criteria_values_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
