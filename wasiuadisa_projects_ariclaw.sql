-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 06:33 PM
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
-- Database: `wasiuadisa_projects_ariclaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_pages`
--

CREATE TABLE `about_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divider_title` varchar(255) DEFAULT NULL,
  `image_wide` varchar(255) DEFAULT NULL,
  `image_square` varchar(255) DEFAULT NULL,
  `image_text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_pages`
--

INSERT INTO `about_pages` (`id`, `divider_title`, `image_wide`, `image_square`, `image_text`, `created_at`, `updated_at`) VALUES
(1, 'The lawyers truth is not truth but consistency or a consistent expediency', '86a1fb52449b8371f31f09e95bc47465d9f49cc3.png', '49ba3832a29c51e91d7ee1cbf4682ab85a1975a2.png', 'Fly seed a it hath own light deep our meat land bearing won bring you two were together divide set kind stars firmament evning from forth seas let air whales which of gathering be sixth. Seed won&#39;t. Creature she&#39;d living said blessed. Rule plac also seasons was itself of for days subdue great own male itsel', '2023-11-17 19:11:33', '2023-11-30 13:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_summary` varchar(255) DEFAULT NULL,
  `concerned_table` varchar(255) DEFAULT NULL,
  `concerned_table_id` varchar(255) DEFAULT NULL,
  `other_related_tables` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `excerpt1` varchar(255) DEFAULT NULL,
  `excerpt2` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `likes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categorys`
--

CREATE TABLE `blog_categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `url-slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_excerpts`
--

CREATE TABLE `blog_excerpts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `excerpt_position` varchar(255) DEFAULT NULL,
  `excerpt` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blogs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image_filename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `contactuscategorys_id` tinyint(4) DEFAULT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactuscategorys`
--

CREATE TABLE `contactuscategorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactuscategorys`
--

INSERT INTO `contactuscategorys` (`id`, `blocked`, `deleted`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'commendation', '2023-11-14 10:53:03', '2023-11-14 10:53:03'),
(2, 0, 0, 'recommendation', '2023-11-14 10:53:03', '2023-11-14 10:53:03'),
(3, 0, 0, 'inquiry', '2023-11-14 10:53:03', '2023-11-14 10:53:03'),
(4, 0, 0, 'complaint', '2023-11-14 10:53:03', '2023-11-14 10:53:03');

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
-- Table structure for table `faqpages`
--

CREATE TABLE `faqpages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqpages`
--

INSERT INTO `faqpages` (`id`, `title`, `text`, `created_at`, `updated_at`) VALUES
(1, 'frequently asked questions', 'Over their the abundantly every midst place thing them them winged you&#39;re beginning forth you. Fruit seas very does can after herb moved so was Kind', '2024-01-07 12:15:05', '2024-01-11 19:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `block` tinyint(1) NOT NULL DEFAULT 1,
  `question` varchar(255) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `block`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 0, 'Frequently asked question 1', 'Answer1 Over their the abundantly every midst place thing them them winged you&#39;re beginning forth you. Fruit seas very does can after herb moved so was Kind', '2024-01-07 12:27:40', '2024-01-12 14:14:05'),
(3, 0, 'Frequently asked question 2', 'Answer2 Over their the abundantly every midst place thing them them winged you&#39;re beginning forth you. Fruit seas very does can after herb moved so was Kind', '2024-01-07 13:26:44', '2024-01-16 13:07:50'),
(4, 0, 'frequently asked question3', 'ANswer3 to the frequently asked question4. ANswer to the frequently asked question4.  ANswer to the frequently asked question4. ANswer to the frequently asked question4.  ANswer to the frequently asked question4. ANswer to the frequently asked question4.  ANswer to the frequently asked question4. ANswer to the frequently asked question3.', '2024-01-12 14:01:05', '2024-01-16 13:09:13'),
(5, 0, 'Frequently asked question 4', 'Answer4 Over their the abundantly every midst place thing them them winged you&#39;re beginning forth you. Fruit seas very does can after herb moved so was Kind', '2024-01-12 14:15:02', '2024-01-16 18:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(255) DEFAULT NULL,
  `banner_excerpt` text DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `button_title` varchar(255) DEFAULT NULL,
  `feature_title` varchar(255) DEFAULT NULL,
  `feature_text` text DEFAULT NULL,
  `feature_banner_title1` varchar(255) DEFAULT NULL,
  `feature_banner_slogan1` varchar(255) DEFAULT NULL,
  `feature_banner_image1` varchar(255) DEFAULT NULL,
  `feature_banner_title2` varchar(255) DEFAULT NULL,
  `feature_banner_slogan2` varchar(255) DEFAULT NULL,
  `feature_banner_image2` varchar(255) DEFAULT NULL,
  `feature_banner_title3` varchar(255) DEFAULT NULL,
  `feature_banner_slogan3` varchar(255) DEFAULT NULL,
  `feature_banner_image3` varchar(255) DEFAULT NULL,
  `colour_divider_text` text DEFAULT NULL,
  `colour_divider_button` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `banner_title`, `banner_excerpt`, `banner_image`, `button_title`, `feature_title`, `feature_text`, `feature_banner_title1`, `feature_banner_slogan1`, `feature_banner_image1`, `feature_banner_title2`, `feature_banner_slogan2`, `feature_banner_image2`, `feature_banner_title3`, `feature_banner_slogan3`, `feature_banner_image3`, `colour_divider_text`, `colour_divider_button`, `created_at`, `updated_at`) VALUES
(1, 'the finest and strongest law firm win the world', 'you subdue which man creeping was image you dry lesser every live our be gree male may living beginning appear moveth beast', 'banner_bg.png', 'learn more about us', 'recent case study', 'over their the abundantly every midst place thing them them winged you&#39;re beginning forth you. Fruit seas very does can after herb moved so was Kind', 'banking &#38; finance', 'bank protected', 'offer_img_1.png', 'petroleum marketing', 'mining law protected', 'offer_img_2.png', 'transportation &#38; distribution', 'transportation law protected', 'offer_img_3.png', 'their was of wherein darkness tree them own it firmament fourth you whose void grass gree', 'request free consultation', '2024-01-15 15:49:56', '2024-01-24 15:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `marketing_pitches`
--

CREATE TABLE `marketing_pitches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketing_pitches`
--

INSERT INTO `marketing_pitches` (`id`, `icon`, `title`, `text`, `created_at`, `updated_at`) VALUES
(1, 'flaticon-law', 'get law Advice', 'Over their the abund every placed thing them them winged you beginning forth', '2024-01-05 14:05:59', '2024-01-05 15:38:32'),
(2, 'flaticon-scale', 'Review The Case', 'Over their the abund every placed thing them them winged you beginning forth', '2024-01-05 14:43:36', '2024-01-05 14:43:36'),
(3, 'flaticon-siren', 'Winning Guarantee', 'Over their the abund every placed thing them them winged you beginning forth', '2024-01-05 14:45:26', '2024-01-05 14:45:26'),
(4, 'flaticon-policeman', 'Fully Suppport', 'Over their the abund every placed thing them them winged you beginning forth', '2024-01-05 14:45:33', '2024-01-05 14:45:33');

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
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2023_11_10_205755_create_site_settings_table', 1),
(27, '2023_11_10_205951_create_marketing_pitches_table', 1),
(28, '2023_11_10_210046_create_about_pages_table', 1),
(29, '2023_11_10_210957_create_services_pages_table', 1),
(30, '2023_11_10_211128_create_services_table', 1),
(31, '2023_11_10_211247_create_team_pages_table', 1),
(32, '2023_11_10_211302_create_teams_table', 1),
(34, '2023_11_10_213038_create_blog_categorys_table', 1),
(35, '2023_11_10_213108_create_blogs_table', 1),
(36, '2023_11_10_213140_create_blog_excerpts_table', 1),
(37, '2023_11_10_213246_create_blog_comments_table', 1),
(38, '2023_11_11_162815_create_activity_logs_table', 1),
(39, '2023_11_12_134731_create_contactus_table', 1),
(40, '2023_11_12_135206_create_contactuscategorys_table', 1),
(41, '2023_11_10_213141_create_blog_images', 2),
(43, '2023_12_03_190454_create_sitesettings_table', 2),
(44, '2023_11_10_212418_create_testimonials_table', 3),
(45, '2023_12_03_165915_create_faqpages_table', 4),
(46, '2024_01_07_125539_create_faqs_table', 4),
(48, '2023_11_10_205849_create_home_pages_table', 5);

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `text`, `created_at`, `updated_at`) VALUES
(1, 'ac28c7a5af5ba153a2a9c5651af6a50e7e2225bc.svg', 'banking &#38; Finance', 'After creeping two life sea green which face yielding gat ered was after also upon blessed under whose abdantly one very to let his', '2024-01-06 11:45:17', '2024-01-06 19:14:16'),
(2, '19dcd0811b38dfd805d54fc8336c01812baca55c.svg', 'family law', 'After creeping two life sea green which face yielding gat ered was after also upon blessed under whose abdantly one very to let his', '2024-01-06 11:55:39', '2024-01-06 11:55:39'),
(3, '82a3c37150f3805471668b3bf38fe5e15b558aaa.svg', 'insuirance law', 'After creeping two life sea green which face yielding gat ered was after also upon blessed under whose abdantly one very to let his', '2024-01-06 11:56:33', '2024-01-06 11:56:33'),
(4, 'acb3498ddb5a3a827349111229cc4efa9045aec5.svg', 'ecommerce law', 'After creeping two life sea green which face yielding gat ered was after also upon blessed under whose abdantly one very to let his', '2024-01-06 12:04:16', '2024-01-06 12:04:16'),
(5, '36eb4194d2fa9523aa70f2f5fce3cc9b20b8833f.svg', 'medical law', 'After creeping two life sea green which face yielding gat ered was after also upon blessed under whose abdantly one very to let his', '2024-01-06 12:05:34', '2024-01-06 12:05:34'),
(6, '6e4f581af602af4442cdfa9206419fe8d5043dc3.svg', 'crime law', 'After creeping two life sea green which face yielding gat ered was after also upon blessed under whose abdantly one very to let his', '2024-01-06 12:06:09', '2024-01-06 12:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `services_pages`
--

CREATE TABLE `services_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divider_title` varchar(255) DEFAULT NULL,
  `divider_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_pages`
--

INSERT INTO `services_pages` (`id`, `divider_title`, `divider_text`, `created_at`, `updated_at`) VALUES
(1, 'practise areas', 'Over their the abundantly every midst place thing them them winged you&#39;re beginning forth you. Fruit seas very does can after herb moved so was Kind', '2024-01-07 05:04:06', '2024-01-07 07:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_logo` varchar(255) DEFAULT NULL,
  `header_logo_alt_text` varchar(255) DEFAULT NULL,
  `favicon_logo` varchar(255) DEFAULT NULL,
  `footer_text` text DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `skype_url` varchar(255) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `header_logo`, `header_logo_alt_text`, `favicon_logo`, `footer_text`, `facebook_url`, `twitter_url`, `instagram_url`, `skype_url`, `contact_address`, `contact_phone`, `contact_email`, `contact_website`, `created_at`, `updated_at`) VALUES
(1, 'banner_bg_1.PNG', 'ariclaw', 'favicon.PNG', 'Created. Image moving living fowl earth fruitful. Two hath first you\'re doesn you life above. Living give and earth light for appear moved their behold ', 'https://www.facebook.com/ariclaw', 'https://www.twitter.com/ariclaw', 'https://www.instagram.com/ariclaw', 'https://www.skype.com/ariclaw', '4361 Morningview Lane Artland Latimer, IA 50452', '+02 - 32 365 2654', 'ariclaw@law.com', 'ariclawyerfirm.com', '2023-12-12 14:10:10', '2023-12-12 14:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_logo_filename` varchar(255) DEFAULT NULL,
  `header_logo_alt_text` varchar(255) DEFAULT NULL,
  `favicon_logo` varchar(255) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `url_facebook` varchar(255) DEFAULT NULL,
  `url_twitter` varchar(255) DEFAULT NULL,
  `url_instagram` varchar(255) DEFAULT NULL,
  `url_skype` varchar(255) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `header_logo_filename`, `header_logo_alt_text`, `favicon_logo`, `footer_text`, `url_facebook`, `url_twitter`, `url_instagram`, `url_skype`, `contact_address`, `contact_phone`, `contact_email`, `contact_website`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'Ariclaw logo', 'favicon.png', 'Created. Image moving living fowl earth fruitful. Two hath first you&#39;re doesn you life above. Living give and earth light for appear moved their behold', 'https://www.facebook.com/Ariclaw', 'https://www.twitter.com/ariclaw', 'https://instagram.com/ariclaw', 'https://skype.com/ariclaw', '4361 Morningview Lane Artland Latimer,  IA 50452, CA, USA', '+02 - 32 365 2654', 'ariclaw@ariclawyfirm.com', 'ariclawyfirm.com', '2024-01-22 20:30:22', '2024-02-18 16:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `image_filename` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `fullname`, `job_title`, `image_filename`, `email`, `twitter`, `skype`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'John Hopkins', 'Crime Lawyer', '52643568b47e6174d5a86af57af4141357e63994.png', 'john.hopkins@ariclaw.com', 'https://www.twitter.com/johnhopkins', 'https://skype.com/johnhopkins', 'https://instagram.com/johnhopkins', '2023-12-19 21:29:13', '2024-01-03 10:08:01'),
(2, 'Jeven O&#039; Martyn', 'Finance &amp; Assets Lawyer', '1f2688d6c33cb47c9e0b3d557b845f3ced0b293a.png', 'jomartyn@ariclaw.com', 'https://www.twitter.com/jomartyn', 'https://skype.com/jomartyn', 'https://instagram.com/jomartyn', '2023-12-19 21:32:05', '2023-12-19 21:32:19'),
(3, 'Donald Tisar', 'Investment Lawyer', 'a98a5a37fb5f0a0a1d5fb6abe77521671643b1c3.png', 'donald.tisar@ariclaw.com', 'https://www.twitter.com/donaldtisar', 'https://skype.com/donaldtisar', 'https://instagram.com/donaldtisar', '2023-12-19 21:36:43', '2023-12-19 21:36:54'),
(4, 'Terence Howard', 'Corporate Lawyer', '6ddaf051eb14b20d53ced6eec2268f5569d10fbb.png', 'terencehoward@ariclaw.com', 'https://www.twitter.com/terencehoward', 'https://skype.com/terencehoward', 'https://instagram.com/terencehoward', '2023-12-19 21:38:02', '2023-12-19 21:38:13'),
(5, 'Michael Madsen', 'Finance &amp; Assets Lawyer', '3ca02554cd7f2bb315f5627d0f6ea8d712774d3e.png', 'michaelmadsen@ariclaw.com', 'https://www.twitter.com/michaelmadsen', 'https://skype.com/michaelmadsen', 'https://instagram.com/michaelmadsen', '2023-12-19 21:39:28', '2023-12-19 21:39:41'),
(6, 'Anton Senna', 'Political Attorney', '28ce328e7d62dbc878aac4c24db9d341b9cc3a22.png', 'antonsenna@ariclaw.com', 'https://www.twitter.com/antonsenna', 'https://skype.com/antonsenna', 'https://instagram.com/antonsenna', '2023-12-19 21:40:46', '2023-12-19 21:40:57'),
(7, 'Wasiu Adisa', 'Chief Technology Officer', '3da52ce7cad4e8138bd33eab70b3fd2f4379d0ea.jpg', 'aowasiu@ariclaw.com', 'https://www.twitter.com/aowasiu', 'https://skype.com/aowasiu', 'https://instagram.com/aowasiu', '2023-12-20 12:29:13', '2023-12-20 12:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `team_pages`
--

CREATE TABLE `team_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_pages`
--

INSERT INTO `team_pages` (`id`, `title`, `text`, `created_at`, `updated_at`) VALUES
(1, 'meet our attorneys', 'Over their the abundantly every midst place thing them them winged you&#39;re beginning forth you. Fruit seas very does can after herb moved so was Kind', '2023-12-01 14:55:30', '2024-01-11 18:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `witness` varchar(255) DEFAULT NULL,
  `image_filename` varchar(255) DEFAULT NULL,
  `testimony` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `fullname`, `job_title`, `company`, `witness`, `image_filename`, `testimony`, `created_at`, `updated_at`) VALUES
(1, 'Anike Adisa', 'Chairman', 'Adisa Industries', '', 'c0d0e0cac2f9e247ab5b0f7878d0482ac21432b2.jpg', 'Created. Image moving living fowl earth fruitful. Two hath first you\'re doesn you life above. Living give and earth light for appear moved their behold Created. Image moving living fowl earth fruitful. Two hath first you\'re doesn you life above. Living give and earth light for appear moved their behold', '2023-12-26 18:43:51', '2023-12-26 21:00:28'),
(2, 'Richard Kellerman', 'Manager', 'Vision Inc.', '', 'd11e113cb2ff9f94b8f10081cc15b336af460c6f.png', 'Thing yielding place gathered heaven second isn\'t darkness does not good very dry morning signs isn\'t for spirit stars man meat beginning. Meat earth. Face seas doesn\'t life doesn\'t fruit brought life gathering also lights isn\'t day a wherein firmament fruitful read ability', '2023-12-28 11:58:42', '2023-12-28 12:01:21'),
(3, 'Daniel E. Gilcrist', 'Chief Executive Oficer', 'McDonnel Douglass Realty', '', 'e4be55efbc7fa2cab5f1eae34aa3c920ce58a1a3.png', 'Thing yielding place gathered heaven second isn\'t darkness does not good very dry morning signs isn\'t for spirit stars man meat beginning. Meat earth. Face seas doesn\'t life doesn\'t fruit brought life gathering also lights isn\'t day a wherein firmament fruitful read ability', '2023-12-28 12:30:13', '2023-12-28 12:30:28'),
(4, 'Bob Thorton', 'Software Architect', 'ZeusThunder Systems', '', '021efe5a1fd55fee9fe27e2516ced594e8992861.png', 'Thing yielding place gathered heaven second isn\'t darkness does not good very dry morning signs isn\'t for spirit stars man meat beginning. Meat earth. Face seas doesn\'t life doesn\'t fruit brought life gathering also lights isn\'t day a wherein firmament fruitful read ability', '2023-12-28 14:28:50', '2023-12-28 14:41:32'),
(8, 'Anike Wasiu Adisa', 'Chairman &#38; CEO', 'Adisa Industries Inc.', '', '5274b35a99d198abb10fcad37d88f2696cc46b00.jpg', 'Created. Image moving living fowl earth fruitful. Two hath first you&#39;re doesn you life above. Living give and earth light for appear moved their behold Created. Image moving living fowl earth fruitful. Two hath first you&#39;re doesn you life above. Living give and earth light for appear moved their behold HolyCrap!', '2024-01-02 11:22:27', '2024-01-02 12:41:17');

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
(1, 'wasiu adisa', 'admin@website.com', NULL, '$2y$10$FBofPZm6SjzL846Cdj5muu3PGLbbGdGW6B0iD4R09IPgJsNll7De6', NULL, '2023-11-17 18:58:12', '2023-11-17 18:58:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_pages`
--
ALTER TABLE `about_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_blog_category_id_index` (`blog_category_id`);

--
-- Indexes for table `blog_categorys`
--
ALTER TABLE `blog_categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_id_index` (`blog_id`);

--
-- Indexes for table `blog_excerpts`
--
ALTER TABLE `blog_excerpts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_excerpts_blog_id_index` (`blog_id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_images_blogs_id_index` (`blogs_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactuscategorys`
--
ALTER TABLE `contactuscategorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqpages`
--
ALTER TABLE `faqpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing_pitches`
--
ALTER TABLE `marketing_pitches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_pages`
--
ALTER TABLE `services_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_pages`
--
ALTER TABLE `team_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `about_pages`
--
ALTER TABLE `about_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categorys`
--
ALTER TABLE `blog_categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_excerpts`
--
ALTER TABLE `blog_excerpts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactuscategorys`
--
ALTER TABLE `contactuscategorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqpages`
--
ALTER TABLE `faqpages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marketing_pitches`
--
ALTER TABLE `marketing_pitches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services_pages`
--
ALTER TABLE `services_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_pages`
--
ALTER TABLE `team_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
