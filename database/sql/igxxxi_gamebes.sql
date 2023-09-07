-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Sep 2023 pada 14.13
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igxxxi_gamebes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buys`
--

CREATE TABLE `buys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `month` int(11) NOT NULL,
  `demands` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buys`
--

INSERT INTO `buys` (`id`, `item_id`, `supplier_id`, `price`, `month`, `demands`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 47, 1, 50000, NULL, '2023-09-07 12:07:37'),
(2, 2, 1, 45, 1, 50000, NULL, NULL),
(3, 3, 1, 61.18, 1, 50000, NULL, NULL),
(4, 1, 1, 68.6, 2, 50000, NULL, NULL),
(5, 2, 1, 45, 2, 50000, NULL, NULL),
(6, 3, 1, 41, 2, 50000, NULL, NULL),
(7, 1, 1, 47, 3, 50000, NULL, NULL),
(8, 2, 1, 68.6, 3, 50000, NULL, NULL),
(9, 3, 1, 41, 3, 50000, NULL, NULL),
(10, 4, 1, 42, 1, 50000, NULL, NULL),
(11, 5, 1, 63.5, 1, 50000, NULL, NULL),
(12, 6, 1, 48, 1, 50000, NULL, NULL),
(13, 4, 1, 42, 2, 50000, NULL, NULL),
(14, 5, 1, 46, 2, 50000, NULL, NULL),
(15, 6, 1, 62.22, 2, 50000, NULL, NULL),
(16, 4, 1, 58.5, 3, 50000, NULL, NULL),
(17, 5, 1, 46, 3, 50000, NULL, NULL),
(18, 6, 1, 48, 3, 50000, NULL, NULL),
(19, 7, 1, 51, 1, 50000, NULL, NULL),
(20, 8, 1, 60.42, 1, 50000, NULL, NULL),
(21, 9, 1, 50, 1, 50000, NULL, NULL),
(22, 7, 1, 51, 2, 50000, NULL, NULL),
(23, 8, 1, 49, 2, 50000, NULL, NULL),
(24, 9, 1, 61.6, 2, 50000, NULL, NULL),
(25, 7, 1, 63.72, 3, 50000, NULL, NULL),
(26, 8, 1, 49, 3, 50000, NULL, NULL),
(27, 9, 1, 50, 3, 50000, NULL, NULL),
(28, 10, 2, 30, 1, 50000, NULL, NULL),
(29, 11, 2, 32, 1, 50000, NULL, NULL),
(30, 12, 2, 45, 1, 50000, NULL, '2023-09-04 12:44:14'),
(31, 10, 2, 49.6, 2, 50000, NULL, NULL),
(32, 11, 2, 32, 2, 50000, NULL, NULL),
(33, 12, 2, 29, 2, 50000, NULL, NULL),
(34, 10, 2, 30, 3, 50000, NULL, NULL),
(35, 11, 2, 53.55, 3, 50000, NULL, NULL),
(36, 12, 2, 29, 3, 50000, NULL, NULL),
(37, 13, 2, 27, 1, 50000, NULL, NULL),
(38, 14, 2, 24, 1, 50000, NULL, NULL),
(39, 15, 2, 44.28, 1, 50000, NULL, NULL),
(40, 13, 2, 40.6, 2, 50000, NULL, NULL),
(41, 14, 2, 24, 2, 50000, NULL, NULL),
(42, 15, 2, 25, 2, 50000, NULL, NULL),
(43, 13, 2, 27, 3, 50000, NULL, NULL),
(44, 14, 2, 41.25, 3, 50000, NULL, NULL),
(45, 15, 2, 25, 3, 50000, NULL, NULL),
(46, 16, 2, 32, 1, 50000, NULL, NULL),
(47, 17, 2, 57.6, 1, 50000, NULL, NULL),
(48, 18, 2, 25, 1, 50000, NULL, NULL),
(49, 16, 2, 32, 2, 50000, NULL, NULL),
(50, 17, 2, 33, 2, 50000, NULL, NULL),
(51, 18, 2, 41.08, 2, 50000, NULL, NULL),
(52, 16, 2, 55.3, 3, 50000, NULL, NULL),
(53, 17, 2, 33, 3, 50000, NULL, NULL),
(54, 18, 2, 25, 3, 50000, NULL, NULL),
(55, 19, 3, 17, 1, 50000, NULL, NULL),
(56, 20, 3, 14, 1, 50000, NULL, NULL),
(57, 21, 3, 24.44, 1, 50000, NULL, NULL),
(58, 19, 3, 26.64, 2, 50000, NULL, NULL),
(59, 20, 3, 14, 2, 50000, NULL, NULL),
(60, 21, 3, 12, 2, 50000, NULL, NULL),
(61, 19, 3, 17, 3, 50000, NULL, NULL),
(62, 20, 3, 26.25, 3, 50000, NULL, NULL),
(63, 21, 3, 12, 3, 50000, NULL, NULL),
(64, 22, 3, 11, 1, 50000, NULL, NULL),
(65, 23, 3, 28.56, 1, 50000, NULL, NULL),
(66, 24, 3, 17, 1, 50000, NULL, NULL),
(67, 22, 3, 11, 2, 50000, NULL, NULL),
(68, 23, 3, 16, 2, 50000, NULL, NULL),
(69, 24, 3, 32.04, 2, 50000, NULL, NULL),
(70, 22, 3, 23.76, 3, 50000, NULL, NULL),
(71, 23, 3, 16, 3, 50000, NULL, NULL),
(72, 24, 3, 17, 3, 50000, NULL, NULL),
(73, 25, 3, 17, 1, 50000, NULL, NULL),
(74, 26, 3, 19, 1, 50000, NULL, NULL),
(75, 27, 3, 27, 1, 50000, NULL, NULL),
(76, 25, 3, 29.7, 2, 50000, NULL, NULL),
(77, 26, 3, 19, 2, 50000, NULL, NULL),
(78, 27, 3, 17, 2, 50000, NULL, NULL),
(79, 25, 3, 17, 3, 50000, NULL, NULL),
(80, 26, 3, 33.6, 3, 50000, NULL, NULL),
(81, 27, 3, 17, 3, 50000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buy_transactions`
--

CREATE TABLE `buy_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expedition_id` bigint(20) UNSIGNED NOT NULL,
  `buy_id` bigint(20) UNSIGNED NOT NULL,
  `inv_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `demand_fulfilled` int(11) NOT NULL,
  `cap_left` double NOT NULL,
  `sent_at` datetime NOT NULL,
  `arrived_at` datetime NOT NULL,
  `status` enum('sending','arrived','sold') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `expeditions`
--

CREATE TABLE `expeditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dest_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` enum('Darat','Laut') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Kereta','Truck Kontainer','Kapal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `time_taken` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `ratingSpeed` int(11) NOT NULL,
  `ratingQuality` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `expeditions`
--

INSERT INTO `expeditions` (`id`, `dest_id`, `name`, `route`, `type`, `capacity`, `time_taken`, `cost`, `ratingSpeed`, `ratingQuality`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cargo', 'Darat', 'Kereta', 50, 400, 410, 3, 5, NULL, NULL),
(2, 2, 'Cargo', 'Darat', 'Kereta', 50, 225, 410, 3, 5, NULL, NULL),
(3, 3, 'Cargo', 'Darat', 'Kereta', 50, 75, 410, 3, 5, NULL, NULL),
(4, 1, 'Si Fast', 'Darat', 'Truck Kontainer', 25, 436, 350, 2, 2, NULL, NULL),
(5, 2, 'Si Fast', 'Darat', 'Truck Kontainer', 25, 245, 350, 2, 2, NULL, NULL),
(6, 3, 'Si Fast', 'Darat', 'Truck Kontainer', 25, 82, 350, 2, 2, NULL, NULL),
(7, 1, 'Si Fast', 'Laut', 'Kapal', 100, 533, 825, 2, 2, NULL, NULL),
(8, 2, 'Si Fast', 'Laut', 'Kapal', 100, 300, 825, 2, 2, NULL, NULL),
(9, 3, 'Si Fast', 'Laut', 'Kapal', 100, 100, 825, 2, 2, NULL, NULL),
(10, 1, 'Jalur Kurir', 'Darat', 'Truck Kontainer', 25, 480, 285, 5, 3, NULL, NULL),
(11, 2, 'Jalur Kurir', 'Darat', 'Truck Kontainer', 25, 270, 285, 5, 3, NULL, NULL),
(12, 3, 'Jalur Kurir', 'Darat', 'Truck Kontainer', 25, 90, 285, 5, 3, NULL, NULL),
(13, 1, 'Jalur Kurir', 'Laut', 'Kapal', 100, 1125, 140, 5, 3, NULL, NULL),
(14, 2, 'Jalur', 'Laut', 'Kapal', 100, 713, 140, 5, 3, NULL, NULL),
(15, 3, 'Jalur Kurir', 'Laut', 'Kapal', 100, 338, 140, 5, 3, NULL, NULL),
(16, 1, 'JNA', 'Darat', 'Truck Kontainer', 25, 533, 215, 4, 4, NULL, NULL),
(17, 2, 'JNA', 'Darat', 'Truck Kontainer', 25, 300, 215, 4, 4, NULL, NULL),
(18, 3, 'JNA', 'Darat', 'Truck Kontainer', 25, 100, 215, 4, 4, NULL, NULL),
(19, 1, 'JNA', 'Laut', 'Kapal', 100, 1286, 65, 4, 4, NULL, NULL),
(20, 2, 'JNA', 'Laut', 'Kapal', 100, 814, 65, 4, 4, NULL, NULL),
(21, 3, 'JNA', 'Laut', 'Kapal', 100, 386, 65, 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Buah','Sayur','Biji') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `name`, `type`, `created_at`, `updated_at`, `city`) VALUES
(1, 'Mangga', 'Buah', NULL, NULL, 'Surabaya'),
(2, 'Nanas', 'Buah', NULL, NULL, 'Surabaya'),
(3, 'Pisang', 'Buah', NULL, NULL, 'Surabaya'),
(4, 'Seledri', 'Sayur', NULL, NULL, 'Surabaya'),
(5, 'Brokoli', 'Sayur', NULL, NULL, 'Surabaya'),
(6, 'Pakcoy', 'Sayur', NULL, NULL, 'Surabaya'),
(7, 'Beras', 'Biji', NULL, NULL, 'Surabaya'),
(8, 'Jagung', 'Biji', NULL, NULL, 'Surabaya'),
(9, 'Gandum', 'Biji', NULL, NULL, 'Surabaya'),
(10, 'Raspberry', 'Buah', NULL, NULL, 'Semarang'),
(11, 'Blueberry', 'Buah', NULL, NULL, 'Semarang'),
(12, 'Strawberry', 'Buah', NULL, NULL, 'Semarang'),
(13, 'Cabai', 'Sayur', NULL, NULL, 'Semarang'),
(14, 'Kembang Kol', 'Sayur', NULL, NULL, 'Semarang'),
(15, 'Tomat', 'Sayur', NULL, NULL, 'Semarang'),
(16, 'Kacang Tanah', 'Biji', NULL, NULL, 'Semarang'),
(17, 'Kacang Merah', 'Biji', NULL, NULL, 'Semarang'),
(18, 'Kacang Hijau', 'Biji', NULL, NULL, 'Semarang'),
(19, 'Jeruk Bali', 'Buah', NULL, NULL, 'Bandung'),
(20, 'Jeruk Lemon', 'Buah', NULL, NULL, 'Bandung'),
(21, 'Jeruk Nipis', 'Buah', NULL, NULL, 'Bandung'),
(22, 'Bayam', 'Sayur', NULL, NULL, 'Bandung'),
(23, 'Kubis', 'Sayur', NULL, NULL, 'Bandung'),
(24, 'Selada', 'Sayur', NULL, NULL, 'Bandung'),
(25, 'Oatmeal', 'Biji', NULL, NULL, 'Bandung'),
(26, 'Biji Chia', 'Biji', NULL, NULL, 'Bandung'),
(27, 'Quinoa', 'Biji', NULL, NULL, 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_08_14_034515_create_teams_table', 1),
(5, '2023_08_14_034516_create_items_table', 1),
(6, '2023_08_14_034914_create_inventories_table', 1),
(7, '2023_08_14_053723_create_suppliers_table', 1),
(8, '2023_08_14_053951_create_sells_table', 1),
(9, '2023_08_14_054157_create_buys_table', 1),
(10, '2023_08_14_054325_create_sessions_table', 1),
(11, '2023_08_14_054413_create_expeditions_table', 1),
(12, '2023_08_14_060821_create_sell_transactions_table', 1),
(13, '2023_08_14_061027_create_buy_transactions_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sells`
--

CREATE TABLE `sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `stocks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sells`
--

INSERT INTO `sells` (`id`, `item_id`, `supplier_id`, `price`, `stocks`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 49, 135000, NULL, '2023-09-06 07:11:32'),
(2, 2, 1, 47, 135000, NULL, NULL),
(3, 3, 1, 46, 135000, NULL, NULL),
(4, 4, 1, 45, 135000, NULL, NULL),
(5, 5, 1, 50, 135000, NULL, NULL),
(6, 6, 1, 51, 135000, NULL, NULL),
(7, 7, 1, 54, 135000, NULL, NULL),
(8, 8, 1, 53, 135000, NULL, NULL),
(9, 9, 1, 55, 135000, NULL, NULL),
(10, 10, 2, 32, 135000, NULL, NULL),
(11, 11, 2, 35, 135000, NULL, '2023-09-04 04:25:55'),
(12, 12, 2, 30, 135000, NULL, '2023-09-04 05:42:20'),
(13, 13, 2, 28, 135000, NULL, NULL),
(14, 14, 2, 25, 135000, NULL, NULL),
(15, 15, 2, 27, 135000, NULL, NULL),
(16, 16, 2, 35, 135000, NULL, NULL),
(17, 17, 2, 36, 135000, NULL, NULL),
(18, 18, 2, 26, 135000, NULL, NULL),
(19, 19, 3, 18, 135000, NULL, NULL),
(20, 20, 3, 15, 135000, NULL, NULL),
(21, 21, 3, 13, 135000, NULL, NULL),
(22, 22, 3, 12, 135000, NULL, NULL),
(23, 23, 3, 17, 135000, NULL, NULL),
(24, 24, 3, 18, 135000, NULL, NULL),
(25, 25, 3, 18, 135000, NULL, NULL),
(26, 26, 3, 20, 135000, NULL, NULL),
(27, 27, 3, 18, 135000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sell_transactions`
--

CREATE TABLE `sell_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sell_id` bigint(20) UNSIGNED NOT NULL,
  `inv_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `month`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Surabaya', NULL, NULL),
(2, 'Semarang', NULL, NULL),
(3, 'Bandung', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulfill_demands` int(11) NOT NULL,
  `debt` int(11) NOT NULL,
  `indebted` tinyint(1) NOT NULL DEFAULT 0,
  `currency` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teams`
--

INSERT INTO `teams` (`id`, `name`, `fulfill_demands`, `debt`, `indebted`, `currency`, `created_at`, `updated_at`) VALUES
(8, 'Affandra', 0, 0, 0, 30000, NULL, NULL),
(9, 'Spill The Three', 0, 0, 0, 30000, NULL, NULL),
(10, 'Beauty and Brain', 0, 0, 0, 30000, NULL, NULL),
(11, 'Tim AJA', 0, 0, 0, 30000, NULL, NULL),
(12, 'Tim Pehh', 0, 0, 0, 30000, NULL, NULL),
(13, 'Tim Cheese', 0, 0, 0, 30000, NULL, NULL),
(14, 'Tim Edu', 0, 0, 0, 30000, NULL, NULL),
(15, 'Vander', 0, 0, 0, 30000, NULL, NULL),
(16, 'Twinkle Triad', 0, 0, 0, 30000, NULL, NULL),
(17, 'Paseo', 0, 0, 0, 30000, NULL, NULL),
(18, 'Telor Sakti', 0, 0, 0, 30000, NULL, NULL),
(19, 'Telor Dadar', 0, 0, 0, 30000, NULL, NULL),
(20, 'Business Proposal 3.0', 0, 0, 0, 30000, NULL, NULL),
(21, 'Anak DKV nyasar', 0, 0, 0, 30000, NULL, NULL),
(22, 'Sinlucky', 0, 0, 0, 30000, NULL, NULL),
(23, 'CHEERS', 0, 0, 0, 30000, NULL, NULL),
(24, 'KARUNGGONI', 0, 0, 0, 30000, NULL, NULL),
(25, 'HOKAY', 0, 0, 0, 30000, NULL, NULL),
(26, 'Klein and Friends', 0, 0, 0, 30000, NULL, NULL),
(27, 'Free Willy', 0, 0, 0, 30000, NULL, NULL),
(28, 'JCA Glory', 0, 0, 0, 30000, NULL, NULL),
(29, 'SMH', 0, 0, 0, 30000, NULL, NULL),
(30, 'Clavenfore', 0, 0, 0, 30000, NULL, NULL),
(31, 'Smala', 0, 0, 0, 30000, NULL, NULL),
(32, 'Macgyver', 0, 0, 0, 30000, NULL, NULL),
(33, 'All in Charizz', 0, 0, 0, 30000, NULL, NULL),
(34, 'CLAVE', 0, 0, 0, 30000, NULL, NULL),
(35, 'DURIAN MUSANGKING', 0, 0, 0, 30000, NULL, NULL),
(36, 'Multiverse', 0, 0, 0, 30000, NULL, NULL),
(37, 'CLAVOTEAM', 0, 0, 0, 30000, NULL, NULL),
(38, 'Snorlax', 0, 0, 0, 30000, NULL, NULL),
(39, 'CLAVERS', 0, 0, 0, 30000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Penpos Pembelian', 'pembelian', '$2a$10$3.Rf2zlOsIqokNIyeIWaeeQaIBmeODslGFTGF.NomhAWCxveeg0AK', 1, NULL, NULL),
(2, 'Penpos Penjualan', 'penjualan', '$2a$10$3.Rf2zlOsIqokNIyeIWaeeQaIBmeODslGFTGF.NomhAWCxveeg0AK', 4, NULL, NULL),
(3, 'Penpos Distribusi', 'distribusi', '$2a$10$3.Rf2zlOsIqokNIyeIWaeeQaIBmeODslGFTGF.NomhAWCxveeg0AK', 2, NULL, NULL),
(4, 'Penpos Hutang', 'hutang', '$2a$10$3.Rf2zlOsIqokNIyeIWaeeQaIBmeODslGFTGF.NomhAWCxveeg0AK', 3, NULL, NULL),
(7, 'Admin', 'admin', '$2a$10$3.Rf2zlOsIqokNIyeIWaeeQaIBmeODslGFTGF.NomhAWCxveeg0AK', 0, NULL, NULL),
(8, 'RefreshAdmin', 'refresh', '$2a$10$3.Rf2zlOsIqokNIyeIWaeeQaIBmeODslGFTGF.NomhAWCxveeg0AK', 0, NULL, NULL),
(9, 'Affandra', 'affandra', '$2a$12$3hZT4Dmp1E8582bz3wuVXOQp3gX6xiiJknGrY5.raUSrp9HdpEtH.', 5, NULL, NULL),
(10, 'Spill The Three', 'spillthethree', '$2a$12$okBdCmLa766PYUS8arR4g.nDszBGDQ6ncDXgLsBTrUwFa4YMxEUDm', 5, NULL, NULL),
(11, 'Beauty and Brain', 'beautyandbrain', '$2a$12$xHSyfNIQd6XuN2ujppXKjelzVdVtgx56vFeSovzuGcs3N7j1EDOJO', 5, NULL, NULL),
(12, 'Tim AJA', 'timaja', '$2a$12$lfTp//5Edu2dz8y.jSfglOaVgM9j0zWcM8vnjr7PxBBR0Ej24mpQK', 5, NULL, NULL),
(13, 'Tim Cheese', 'timcheese', '$2a$12$aQl9iTmOud7f0NcmIFRlmev//kyF3nZGnotNm.D94At8c2h7QLck2', 5, NULL, NULL),
(14, 'Tim Edu', 'timedu', '$2a$10$28W3mG9ScUyroV7kHi1BeON9Y.xfl7Q4IlFBEDTzQkV9gn93S8YMi', 5, NULL, NULL),
(15, 'Vander', 'vander', '$2a$10$EfB6WGFxv4qQKyZmembVOON29hkkeIfUoXTVGUWJKZf98qfq.Pcnq', 5, NULL, NULL),
(16, 'Twinkle Triad', 'twinkletriad', '$2a$10$6iNQdUwPa8Fb4PNF13ddSe/MRS/QBMscQb8.XL9MKVb4MIcEWi6Di', 5, NULL, NULL),
(17, 'Paseo', 'paseo', '$2a$10$WJ3Z5LZZrGVZHRMzP06l3.oe.tGssKnH7QpLXy9kczWkyMeclRrde', 5, NULL, NULL),
(18, 'Telor Sakti', 'telorsakti', '$2a$10$ELPYUsGWlrFQXwcHZYKJjeKdhSQRKUlaIPd5q/7UX3CQz9js4kpMG', 5, NULL, NULL),
(19, 'Telor Dadar', 'telordadar', '$2a$10$vhSDywyXhNCXMb/x3hkP1uaGNegT5EtHcUKpVktuVImfL/ymFtWPi', 5, NULL, NULL),
(20, 'Business Proprosal 3.0', 'businessproposal', '$2a$10$.YqUZ8PwoZHJmmfFeTg2cOdcqXINjwkXh0Ie0DGRftrlkdndFqori', 5, NULL, NULL),
(21, 'Anak DKV nyasar', 'anakdkvnyasar', '$2a$10$jRfF.kC940bhvvQY5eln0uwismG9RW55dIcuiLJ09NPoQ0fV8mw9C', 5, NULL, NULL),
(22, 'Sinlucky', 'sinlucky', '$2a$10$7I21LWgmC7O63uA23cXjx.9.ofmjAy2ir.CcwGU5X0kiG6XDzbkMC', 5, NULL, NULL),
(23, 'CHEERS', 'cheers', '$2a$10$r5kVZdsw7d2dPrPLSyXyZu5TAR1V9a85U0/GWRZJbxogIhK9yT9tO', 5, NULL, NULL),
(24, 'KARUNGGONI', 'karunggoni', '$2a$10$xGJq7H9UJpT4fszVAttabOGhzDZunCdftgHmFRJWxXm95Hdhe/sDu', 5, NULL, NULL),
(25, 'HOKAY', 'hokay', '$2a$10$4gqyfgo8TW7UzrXVWmsk...meEYQOZxOvMwZXrJ2vaFqo0uigyQGm', 5, NULL, NULL),
(26, 'Klein and Friends', 'kleinandfriends', '$2a$10$fC8Kzeeij7DT0O/vy94Ys.4jBwqi6K1FSiSqoVaxGk7hmf4EG0JSq', 5, NULL, NULL),
(27, 'Free Willy', 'freewilly', '$2a$10$BatduePqRjpvHgEsIu.icex7hANmOt4Zypgb4ENilFTC7s8VJqy.q', 5, NULL, NULL),
(28, 'JCA Glory', 'jcaglory', '$2a$10$gzg9v8yfDR3Ht/p3qpK9lOvNNqtY1x6WLrQSeFb02N8sJPIBrTFyi', 5, NULL, NULL),
(29, 'SMH', 'smh', '$2a$10$gvRk7LkCXKe3brpy9edzZePa5F4.iowOP5/c2/4wGZFLZCqnD5cPy', 5, NULL, NULL),
(30, 'Clavenfore', 'clavenfore', '$2a$10$uwCl05Bl1u4AzMIfVY/V0..NXflPrp2iK5CB7VZgbnIgsifqniMk.', 5, NULL, NULL),
(31, 'Smala', 'smala', '$2a$10$7WilUIUpHCUKP9wVIiFPyuQx271chxER3kQf2isW5.hzzXySMKsH6', 5, NULL, NULL),
(32, 'Macgyver', 'macgyver', '$2a$10$XrDFwVtE4HycWKKNRQ77au8ot1rP4R5j0CI3w2EjULecZUu7P5VS2', 5, NULL, NULL),
(33, 'All in Charizz', 'allincharizz', '$2a$10$PREEhKDK4waXxileTOSyTelMPRa1ccIELxm5n6dJeiocd9NuSMUB.', 5, NULL, NULL),
(34, 'CLAVE', 'clave', '$2a$10$we1j1HWKaC89Tn.qK7StueYpdp2LcddA59krXidgQe2Ortg1RKQYu', 5, NULL, NULL),
(35, 'DURIAN MUSANGKING', 'durianmusangking', '$2a$10$CDmQToVgguN9WD193vMA7uDfwk8inPNL3XaHqful.WVmXA.JYhARO', 5, NULL, NULL),
(36, 'Multiverse', 'multiverse', '$2a$10$Kq3z198Qy.onxp2nreIJ1.Jr9qeNFpZln5LX/I9RHUiyZhxxxj2L2', 5, NULL, NULL),
(37, 'CLAVOTEAM', 'clavoteam', '$2a$10$qy5H9duX7Yq1jUeLeor.1e.lm70XI0UTbRMs/YFRhYAfYQaqisTmG', 5, NULL, NULL),
(38, 'Snorlax', 'snorlax', '$2a$10$XAoJU3R2eHO.5y/Q5L2qxOiBdubz/b4CX5cOxoype9I1aP1SK5WsK', 5, NULL, NULL),
(39, 'CLAVERS', 'clavers', '$2a$10$mliSJfVprptVFqxvhb0MUugllYYWGKnd3FuzIBBirDeE8qmR774Z2', 5, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buys`
--
ALTER TABLE `buys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buys_item_id_foreign` (`item_id`),
  ADD KEY `buys_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `buy_transactions`
--
ALTER TABLE `buy_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buy_transactions_expedition_id_foreign` (`expedition_id`),
  ADD KEY `buy_transactions_buy_id_foreign` (`buy_id`),
  ADD KEY `buy_transactions_inv_id_foreign` (`inv_id`);

--
-- Indeks untuk tabel `expeditions`
--
ALTER TABLE `expeditions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expeditions_dest_id_foreign` (`dest_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_team_id_foreign` (`team_id`),
  ADD KEY `inventories_item_id_foreign` (`item_id`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sells_item_id_foreign` (`item_id`),
  ADD KEY `sells_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `sell_transactions`
--
ALTER TABLE `sell_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sell_transactions_sell_id_foreign` (`sell_id`),
  ADD KEY `sell_transactions_inv_id_foreign` (`inv_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buys`
--
ALTER TABLE `buys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `buy_transactions`
--
ALTER TABLE `buy_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `expeditions`
--
ALTER TABLE `expeditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `sells`
--
ALTER TABLE `sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `sell_transactions`
--
ALTER TABLE `sell_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buys`
--
ALTER TABLE `buys`
  ADD CONSTRAINT `buys_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buys_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `buy_transactions`
--
ALTER TABLE `buy_transactions`
  ADD CONSTRAINT `buy_transactions_buy_id_foreign` FOREIGN KEY (`buy_id`) REFERENCES `buys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buy_transactions_expedition_id_foreign` FOREIGN KEY (`expedition_id`) REFERENCES `expeditions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buy_transactions_inv_id_foreign` FOREIGN KEY (`inv_id`) REFERENCES `inventories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `expeditions`
--
ALTER TABLE `expeditions`
  ADD CONSTRAINT `expeditions_dest_id_foreign` FOREIGN KEY (`dest_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventories_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sells`
--
ALTER TABLE `sells`
  ADD CONSTRAINT `sells_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sells_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sell_transactions`
--
ALTER TABLE `sell_transactions`
  ADD CONSTRAINT `sell_transactions_inv_id_foreign` FOREIGN KEY (`inv_id`) REFERENCES `inventories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sell_transactions_sell_id_foreign` FOREIGN KEY (`sell_id`) REFERENCES `sells` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
