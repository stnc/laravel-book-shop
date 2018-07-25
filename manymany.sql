-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 11:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manymany`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(39, 'ishak selman cat', '2018-07-24 12:40:07', '2018-07-24 12:40:07'),
(40, 'ishak selman cat', '2018-07-24 18:30:21', '2018-07-24 18:30:21'),
(41, 'ishak selman cat', '2018-07-24 18:31:06', '2018-07-24 18:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `category_todolist`
--

CREATE TABLE `category_todolist` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `todolist_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_todolist`
--

INSERT INTO `category_todolist` (`id`, `category_id`, `todolist_id`, `created_at`, `updated_at`) VALUES
(6, 39, 29, '2018-07-24 12:40:07', '2018-07-24 12:40:07'),
(7, 40, 30, '2018-07-24 18:30:21', '2018-07-24 18:30:21'),
(8, 41, 31, '2018-07-24 18:31:06', '2018-07-24 18:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_23_210705_create_categories_table', 1),
(4, '2018_07_23_210747_create_todolists_table', 1),
(5, '2018_07_23_210904_create_category_todolist_table', 1),
(6, '2018_07_23_210904_create_tag_relations_table', 2),
(7, '2018_07_24_132929_create_tags_table', 3),
(9, '2018_07_21_195727_create_postComments_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `CommentId` int(10) UNSIGNED NOT NULL,
  `todolist_id` int(10) UNSIGNED DEFAULT NULL,
  `comment_author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_author_email` text COLLATE utf8_unicode_ci,
  `comment_author_url` text COLLATE utf8_unicode_ci,
  `comment_content` text COLLATE utf8_unicode_ci,
  `comment_approved` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`CommentId`, `todolist_id`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_content`, `comment_approved`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 31, NULL, NULL, NULL, 'yeni yorumum', NULL, NULL, '2018-07-24 18:31:06', '2018-07-24 18:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(14, 'ishak new tag', '2018-07-24 12:40:07', '2018-07-24 12:40:07'),
(15, 'ishak new tag', '2018-07-24 18:31:06', '2018-07-24 18:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `tag_relations`
--

CREATE TABLE `tag_relations` (
  `tag_id` int(10) UNSIGNED DEFAULT NULL,
  `todolist_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tag_relations`
--

INSERT INTO `tag_relations` (`tag_id`, `todolist_id`, `created_at`, `updated_at`) VALUES
(14, 29, '2018-07-24 12:40:07', '2018-07-24 12:40:07'),
(15, 31, '2018-07-24 18:31:06', '2018-07-24 18:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `todolists`
--

CREATE TABLE `todolists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `todolists`
--

INSERT INTO `todolists` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(29, 'ishak Walk the dog', 'ishak Walk Barky the Mutt', '2018-07-24 12:40:07', '2018-07-24 12:40:07'),
(30, 'ishak Walk the dog', 'ishak Walk Barky the Mutt', '2018-07-24 18:30:21', '2018-07-24 18:30:21'),
(31, 'ishak Walk the dog', 'ishak Walk Barky the Mutt', '2018-07-24 18:31:06', '2018-07-24 18:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_todolist`
--
ALTER TABLE `category_todolist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_todolist_category_id_foreign` (`category_id`),
  ADD KEY `category_todolist_todolist_id_foreign` (`todolist_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD UNIQUE KEY `password_resets_email(191)_unique` (`email`(191));

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`CommentId`),
  ADD KEY `post_comments_todolist_id_foreign` (`todolist_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_relations`
--
ALTER TABLE `tag_relations`
  ADD KEY `tag_relations_tag_id_foreign` (`tag_id`),
  ADD KEY `tag_relations_todolist_id_foreign` (`todolist_id`);

--
-- Indexes for table `todolists`
--
ALTER TABLE `todolists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_email(191)_unique` (`email`(191));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `category_todolist`
--
ALTER TABLE `category_todolist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `CommentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `todolists`
--
ALTER TABLE `todolists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_todolist`
--
ALTER TABLE `category_todolist`
  ADD CONSTRAINT `category_todolist_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_todolist_todolist_id_foreign` FOREIGN KEY (`todolist_id`) REFERENCES `todolists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_todolist_id_foreign` FOREIGN KEY (`todolist_id`) REFERENCES `todolists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_relations`
--
ALTER TABLE `tag_relations`
  ADD CONSTRAINT `tag_relations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_relations_todolist_id_foreign` FOREIGN KEY (`todolist_id`) REFERENCES `todolists` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
