-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 10:06 AM
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
-- Database: `tracerstudy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$2JY7r5coOOSXGXKQbO6wtOfFr6ixsyty7dYTMgN9TjIUwGKOPEK9K', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alumnis`
--

CREATE TABLE `alumnis` (
  `id` int(11) NOT NULL,
  `profile_picture` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `kos` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnis`
--

INSERT INTO `alumnis` (`id`, `profile_picture`, `name`, `kos`, `email`, `status`, `job`, `phone`, `address`, `image`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'profile_pictures/Ex3VXjjQGxOWiyaSLVX6UHPoEAxLPietgrMsncbT.jpg', 'Nur Farihah', 'Teknologi Komputeran', 'nurfarihah@gmail.com', 'Bekerja', NULL, NULL, NULL, NULL, 'farihah', '$2y$10$fVIciOqX3gB3ju2NkSwHAuL58ZJvEekWx4ND7/73rrc/To2WkXF2e', '2025-02-23 20:13:48', '2025-02-27 18:04:39'),
(2, 'profile_pictures/YQMl5nAeTWlMeFMDh9e3n1Ht69uLIz4jBUS4XH3o.jpg', 'Aiman Haikal bin Abdullah', 'Teknologi Automotif', 'aimanikhalz@gmail.com', 'Bekerja', NULL, NULL, NULL, NULL, 'aiman', '$2y$10$g4rqPHVE3p/HnzKYYi4ErOyiXhupQY9h8A2qKqUeUOKY4cXzojsjW', '2025-02-23 20:32:45', '2025-03-18 18:51:58'),
(3, '', 'Shakir Yusuf bin Mohd Hisyam', 'Teknologi Penyejukan dan Penyamanan Udara', NULL, '', NULL, NULL, NULL, NULL, 'shakir', '$2y$10$G/tLS89WNZvBiAfkmv0Yteyk..Q72F3qyaR8Obv8rEmB2OWTEC40K', '2025-02-23 20:33:31', '2025-02-23 20:33:31'),
(4, NULL, 'Amir Shazwan bin Latiff', 'Seni Kulinari', NULL, NULL, NULL, NULL, NULL, NULL, 'amir', '$2y$10$vzBOwap6Bc7Xk4BlNftwH.61.wYNVuURnpWcXH/g/nZXBoZAJdx2m', '2025-03-18 17:41:45', '2025-03-18 17:41:45'),
(5, NULL, 'Issya Athirah binti Zulkifli', 'Seni Reka Fesyen', NULL, NULL, NULL, NULL, NULL, NULL, 'issya', '$2y$10$bwDSn1yT9D1Ghl.OkZ6MveX33j1HVh1qyQ0tPXDfbEbrsiGeeotCS', '2025-03-18 18:49:11', '2025-03-18 18:49:11'),
(6, NULL, 'Mohd Rafiq bin Mohd Tajjuddin', 'Teknologi Maklumat', NULL, NULL, NULL, NULL, NULL, NULL, 'rafiq', '$2y$10$PX2ajsfyNO0p3WACSar/DOW8Xyn9/gicgDfFMEs8Xg0dOBxGq/L4q', '2025-03-18 18:50:25', '2025-03-18 18:50:25'),
(7, 'profile_pictures/u7kptHsKHBQt1kKOUoPMsqaDiABCgm5xOD0VIFj5.jpg', 'Muhammad Farhan bin Syahbuddin', 'Teknologi Komputeran', 'farhan@gmail.com', 'Belajar', NULL, NULL, NULL, NULL, 'farhan', '$2y$10$CsN2rLHya1eRHVY71RojEeOcWhk6YD1tA0srs5cNgqULo9PZ9mmja', '2025-03-18 19:09:21', '2025-03-18 19:20:55'),
(8, NULL, 'Putra Danial bin Mohd Danish', 'Teknologi Komputeran', NULL, NULL, NULL, NULL, NULL, NULL, 'putra', '$2y$10$vzDR38zs/kZHO0f8rqrA8Oh7YxHXJxAuF4/6pFte.jbKLwIUW.Dr2', '2025-03-18 19:10:23', '2025-03-18 19:10:23'),
(9, NULL, 'Aidil Putra bin Amin', 'Perakaunan', NULL, NULL, NULL, NULL, NULL, NULL, 'aidil', '$2y$10$xzRIljSu40bGKA73946V9eqj4ACoNXoDcHAnOlX1tZRI3XQePP1p6', '2025-03-19 21:48:38', '2025-03-19 21:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `cadangan_kerjayas`
--

CREATE TABLE `cadangan_kerjayas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cadangan_kerjayas`
--

INSERT INTO `cadangan_kerjayas` (`id`, `course_id`, `job`, `phone`, `address`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi Komputeran', 'Software Engineer', '0109167371', 'RDS, Cyberjaya', 'career_images/4nxmDppvP5XAVjrsgwKJPaRs4J59AJ9K42vhidIz.png', '2025-02-23 20:24:36', '2025-03-13 17:29:10'),
(3, 'Perakaunan', 'Business Development (Open Position)', '0192745389', 'AirAsia, Sepang', 'career_images/KDLA6MdLDbJbki2jX620GWLFVIk7E3DyKT2Gt0aU.png', '2025-03-18 17:44:00', '2025-03-18 17:44:00'),
(4, 'Teknologi Komputeran', 'Senior Software Engineer', '0387443505', 'Sourceo, Petaling Jaya', 'career_images/BwbG2TreGilLMl7hJGwN1eQMwZ3UsiCjRhs0zA0d.jpg', '2025-03-18 18:48:11', '2025-03-18 18:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kos` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `name`, `email`, `kos`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi Komputeran', 'dka@gmail.com', 'Teknologi Komputeran', '$2y$10$bBax.CT5DkW7Xl9bnFZr1.VIpRt7cMuNgQ8D6U699giZ8qJN5WzR2', '2025-02-24 04:07:42', '2025-02-28 01:52:22'),
(2, 'Teknologi Automotif', 'dmd@gmail.com', 'Teknologi Automotif', '$2y$10$3GRICb8yd52GhfUzp2S9QuQF52XwsJtxoz45FUOf8Clh7XV.w0Fem', '2025-03-19 03:12:31', '2025-03-19 03:12:31'),
(3, 'Perakaunan', 'dbe@gmail.com', 'Perakaunan', '$2y$10$7ebUDJECTBX0DNHRw5RIquz9gAKjJX.mVFJVXD/3hy1S.uK.ifhB6', '2025-03-19 03:13:55', '2025-03-19 03:13:55'),
(4, 'Teknologi Maklumat', 'dkb@gmail.com', 'Teknologi Maklumat', '$2y$10$oVK9JnjUtJTN43hoGWDXqeHkmR5pKyx6JYayF3/RKrSLRlYLdSDtG', '2025-03-19 03:15:15', '2025-03-19 03:17:21'),
(5, 'Teknologi Penyejukan dan Penyamanan Udara', 'dmc@gmail.com', 'Teknologi Penyejukan dan Penyamanan Udara', '$2y$10$9qJP73JijxylHgjjku2BpOPq9fQNJN/5eUix35P6YcOYUjqP40aXa', '2025-03-19 03:16:25', '2025-03-19 03:16:25'),
(6, 'Seni Reka Fesyen', 'ddc@gmail.com', 'Seni Reka Fesyen', '$2y$10$2LPX.0UnIqvbxPpaCHRL3.LFaXO9R7W0SPuRuWU.ju0AK8MhgpEoq', '2025-03-19 03:17:29', '2025-03-19 03:18:23'),
(7, 'Seni Kulinari', 'dha@gmail.com', 'Seni Kulinari', '$2y$10$TYLnQo6WufdaK4Rbjni6r.ooj00smFou8N1/fTCCX8VoAQSeqCG/.', '2025-03-19 03:18:27', '2025-03-19 03:18:27');

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
(5, '2024_12_02_012028_create_admins_table', 1),
(6, '2024_12_13_012847_create_cadangan_kerjayas_table', 1),
(7, '2024_12_13_030356_create_questions_table', 1);

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `year` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`, `year`, `created_at`, `updated_at`) VALUES
(1, 'Adakah anda bekerja di dalam bidang yang anda pelajari di KV?', '2016', '2025-02-23 20:16:24', '2025-02-27 17:55:06'),
(2, 'Adakah anda mempunyai pengalaman dalam mana-mana aktiviti ini? (cth: menulis laporan/pembentangan/menjadi panel/penceramah untuk forum/komunikasi melalui e-mel)', '2016', '2025-02-27 17:56:36', '2025-02-27 17:56:36'),
(3, 'Adakah anda pernah bekerja secara berkumpulan di tempat kerja anda?', '2016', '2025-02-27 17:57:06', '2025-02-27 17:57:06'),
(4, 'Adakah anda pernah memimpin kumpulan kerja di tempat kerja anda?', '2016', '2025-02-27 17:57:35', '2025-02-27 17:57:35'),
(5, 'Adakah anda merupakan ahli bagi mana-mana badan profesional atau badan regulatori berkaitan bidang yang anda pelajari?', '2016', '2025-02-27 17:58:54', '2025-02-27 17:58:54'),
(6, 'Adakah anda mengamalkan keselamatan dan kesihatan pekerjaan di tempat kerja anda?', '2016', '2025-02-27 17:59:50', '2025-02-27 17:59:50'),
(7, 'Adakah anda pernah terlibat dalam aktiviti kemasyarakatan?', '2016', '2025-02-27 18:00:35', '2025-02-27 18:00:35'),
(8, 'Adakah anda pernah menghadiri mana-mana kursus berkaitan bidang yang diiktiraf dengan pensijilan profesional di dalam industri ?', '2016', '2025-02-27 18:00:58', '2025-02-27 18:00:58'),
(9, 'Pernahkah anda terlibat dengan aktiviti keusahawanan?', '2016', '2025-02-27 18:01:20', '2025-02-27 18:01:20'),
(10, 'Adakah anda bekerja di dalam bidang yang anda pelajari di KV?', '2017', '2025-03-18 16:54:49', '2025-03-18 16:54:49'),
(11, 'Adakah anda mempunyai pengalaman dalam mana-mana aktiviti ini? (cth: menulis laporan/pembentangan/menjadi panel/penceramah untuk forum/komunikasi melalui e-mel)', '2017', '2025-03-18 16:55:20', '2025-03-18 16:55:20'),
(12, 'Adakah anda pernah bekerja secara berkumpulan di tempat kerja anda?', '2017', '2025-03-18 16:55:33', '2025-03-18 16:55:33'),
(13, 'Adakah anda pernah memimpin kumpulan kerja di tempat kerja anda?', '2017', '2025-03-18 16:56:25', '2025-03-18 16:56:25'),
(14, 'Adakah anda merupakan ahli bagi mana-mana badan profesional atau badan regulatori berkaitan bidang yang anda pelajari?', '2017', '2025-03-18 16:56:38', '2025-03-18 16:56:38'),
(15, 'Adakah anda mengamalkan keselamatan dan kesihatan pekerjaan di tempat kerja anda?', '2017', '2025-03-18 16:56:53', '2025-03-18 16:56:53'),
(16, 'Adakah anda pernah terlibat dalam aktiviti kemasyarakatan?', '2017', '2025-03-18 16:57:05', '2025-03-18 16:57:05'),
(17, 'Adakah anda pernah menghadiri mana-mana kursus berkaitan bidang yang diiktiraf dengan pensijilan profesional di dalam industri ?', '2017', '2025-03-18 16:57:25', '2025-03-18 16:57:25'),
(18, 'Pernahkah anda terlibat dengan aktiviti keusahawanan?', '2017', '2025-03-18 16:57:40', '2025-03-18 16:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `survey_records`
--

CREATE TABLE `survey_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alumni_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` varchar(500) NOT NULL,
  `answer` text NOT NULL,
  `year` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey_records`
--

INSERT INTO `survey_records` (`id`, `alumni_id`, `question_id`, `answer`, `year`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'yes', '2016', '2025-02-23 20:17:23', '2025-02-23 20:17:23'),
(2, 1, '2', 'no', '2016', '2025-02-27 18:04:17', '2025-02-27 18:04:17'),
(3, 1, '3', 'no', '2016', '2025-02-27 18:04:17', '2025-04-06 22:38:00'),
(4, 1, '4', 'no', '2016', '2025-02-27 18:04:17', '2025-02-27 18:04:17'),
(5, 1, '5', 'no', '2016', '2025-02-27 18:04:17', '2025-02-27 18:04:17'),
(6, 1, '6', 'yes', '2016', '2025-02-27 18:04:17', '2025-02-27 18:04:17'),
(7, 1, '7', 'yes', '2016', '2025-02-27 18:04:17', '2025-02-27 18:04:17'),
(8, 1, '8', 'yes', '2016', '2025-02-27 18:04:17', '2025-02-27 18:04:17'),
(9, 1, '9', 'yes', '2016', '2025-02-27 18:04:17', '2025-02-27 18:04:17'),
(10, 2, '1', 'yes', '2016', '2025-03-18 18:52:41', '2025-03-18 18:52:41'),
(11, 2, '2', 'yes', '2016', '2025-03-18 18:52:41', '2025-03-18 18:52:41'),
(12, 2, '3', 'yes', '2016', '2025-03-18 18:52:41', '2025-03-18 18:52:41'),
(13, 2, '4', 'yes', '2016', '2025-03-18 18:52:41', '2025-03-18 18:52:41'),
(14, 2, '5', 'no', '2016', '2025-03-18 18:52:41', '2025-03-18 18:52:41'),
(15, 2, '6', 'yes', '2016', '2025-03-18 18:52:41', '2025-03-18 18:52:41'),
(16, 2, '7', 'yes', '2016', '2025-03-18 18:52:41', '2025-03-18 18:52:41'),
(17, 2, '8', 'no', '2016', '2025-03-18 18:52:41', '2025-03-18 18:52:41'),
(18, 2, '9', 'yes', '2016', '2025-03-18 18:52:41', '2025-03-18 18:52:41'),
(19, 7, '1', 'yes', '2016', '2025-03-18 19:22:01', '2025-03-18 19:22:01'),
(20, 7, '2', 'yes', '2016', '2025-03-18 19:22:01', '2025-03-18 19:22:01'),
(21, 7, '3', 'yes', '2016', '2025-03-18 19:22:01', '2025-03-18 19:22:01'),
(22, 7, '4', 'yes', '2016', '2025-03-18 19:22:01', '2025-03-18 19:22:01'),
(23, 7, '5', 'no', '2016', '2025-03-18 19:22:01', '2025-03-18 19:22:01'),
(24, 7, '6', 'yes', '2016', '2025-03-18 19:22:01', '2025-03-18 19:22:01'),
(25, 7, '7', 'yes', '2016', '2025-03-18 19:22:01', '2025-03-18 19:22:01'),
(26, 7, '8', 'no', '2016', '2025-03-18 19:22:01', '2025-03-18 19:22:01'),
(27, 7, '9', 'yes', '2016', '2025-03-18 19:22:01', '2025-03-18 19:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `ts`
--
-- Error reading structure for table tracerstudy.ts: #1932 - Table &#039;tracerstudy.ts&#039; doesn&#039;t exist in engine
-- Error reading data for table tracerstudy.ts: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `tracerstudy`.`ts`&#039; at line 1

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `alumnis`
--
ALTER TABLE `alumnis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cadangan_kerjayas`
--
ALTER TABLE `cadangan_kerjayas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_records`
--
ALTER TABLE `survey_records`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cadangan_kerjayas`
--
ALTER TABLE `cadangan_kerjayas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `survey_records`
--
ALTER TABLE `survey_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
