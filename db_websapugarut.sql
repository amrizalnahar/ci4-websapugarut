-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 05:42 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_websapugarut`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '12c9cbed9398f53dfcceb446124c7aad', '2021-05-17 22:22:14'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '46af8cc6836570d8bcf1cf9c089d4faa', '2021-05-29 10:27:54'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '7c4ec19de72d8ba9f6f0f01f54a2325a', '2021-06-02 00:49:42'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'a98f1464a12fbd2aeada2463e6735754', '2021-06-23 09:03:20'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'ae14d03a9db36fa47477f53d2238b8fd', '2021-06-25 22:37:15'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'a7f6ca46c02f0bb6f7b289abf01ddadd', '2021-06-28 09:44:58'),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '3e10df11443824f02086de88f42a9de5', '2021-06-28 09:59:08'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '110f75f15ecbbdbd3420882eb3815984', '2021-06-28 10:07:02'),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '8a1ef2879e8d0f92732db54e15d8f8bd', '2021-06-30 01:45:53'),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '8a1ef2879e8d0f92732db54e15d8f8bd', '2021-06-30 01:46:01'),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '92b43caa14124e4132fdda21dd37b9fe', '2021-06-30 01:49:06'),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '92b43caa14124e4132fdda21dd37b9fe', '2021-06-30 01:49:13'),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '30bdb7f0479c2630432234af4b224a93', '2021-06-30 01:55:19'),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '30bdb7f0479c2630432234af4b224a93', '2021-06-30 01:55:35'),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '9e5c53b39d06ac14357bcd7d222cd9a0', '2021-06-30 08:45:53'),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '788e4cd2ea147f5784135a1da0e5b49b', '2021-06-30 14:10:41'),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '28e0a32eb454543062140ceebef0fdda', '2021-06-30 14:13:07'),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '28e0a32eb454543062140ceebef0fdda', '2021-06-30 14:13:14'),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'dabd18de1a9a497432f7bdd2aafc436c', '2021-06-30 14:37:03'),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'dabd18de1a9a497432f7bdd2aafc436c', '2021-06-30 14:37:10'),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'd91df095d3f499d355b3b68008cee52b', '2021-06-30 14:39:07'),
(22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'e4d890fae3a02edb3e7a0c3bea78b777', '2021-06-30 14:40:17'),
(23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '308b6f0b0c3c0741476af33a03beacac', '2021-06-30 15:50:58'),
(24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '1d4af9b048477702d0dad228f1e22ed5', '2021-07-09 10:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 26),
(1, 27),
(2, 29),
(2, 30),
(2, 31);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'naharamrizal', NULL, '2021-05-17 21:40:19', 0),
(2, '::1', 'naharamrizal', NULL, '2021-05-17 21:40:34', 0),
(3, '::1', 'naharamrizal', NULL, '2021-05-17 21:41:00', 0),
(4, '::1', '18103019@ittelkom-pwt.ac.id', 2, '2021-05-17 21:41:52', 1),
(5, '::1', 'zalamri26@gmail.com', 3, '2021-05-17 22:22:29', 1),
(6, '::1', 'zalamri26@gmail.com', 3, '2021-05-17 22:22:29', 1),
(7, '::1', 'zalamri26@gmail.com', 3, '2021-05-17 22:53:23', 1),
(8, '::1', 'zalamri26@gmail.com', 3, '2021-05-17 22:58:03', 1),
(9, '::1', 'zalamri26@gmail.com', NULL, '2021-05-17 22:58:16', 0),
(10, '::1', 'zalamri26@gmail.com', 3, '2021-05-17 22:58:28', 1),
(11, '::1', 'zalamri26@gmail.com', 5, '2021-05-18 13:30:51', 1),
(12, '::1', 'zalamri26@gmail.com', 5, '2021-05-18 13:37:43', 1),
(13, '::1', 'zalamri26@gmail.com', 5, '2021-05-18 13:41:55', 1),
(14, '::1', 'zalamri26@gmail.com', 5, '2021-05-18 13:58:59', 1),
(15, '::1', 'zalamri26@gmail.com', 5, '2021-05-18 14:14:25', 1),
(16, '::1', 'zalamri26@gmail.com', 5, '2021-05-18 14:22:04', 1),
(17, '::1', 'zalamri26@gmail.com', 5, '2021-05-18 14:28:03', 1),
(18, '::1', 'zalamri26@gmail.com', 5, '2021-05-18 14:28:58', 1),
(19, '::1', 'zalamri26@gmail.com', 5, '2021-05-18 14:29:22', 1),
(20, '::1', 'zalamri26@gmail.com', 5, '2021-05-19 09:20:10', 1),
(21, '::1', 'zalamri26@gmail.com', 5, '2021-05-26 11:44:06', 1),
(22, '::1', 'zalamri26@gmail.com', 5, '2021-05-27 22:58:13', 1),
(23, '::1', 'zalamri26@gmail.com', 5, '2021-05-27 22:58:45', 1),
(24, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 01:01:08', 1),
(25, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 01:20:26', 1),
(26, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 02:15:31', 1),
(27, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 02:18:53', 1),
(28, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 02:19:43', 1),
(29, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 05:10:26', 1),
(30, '::1', 'zalamri26@gmail.com', NULL, '2021-05-29 06:52:24', 0),
(31, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 06:52:33', 1),
(32, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 06:52:51', 1),
(33, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 09:41:34', 1),
(34, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 10:10:36', 1),
(35, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 10:18:59', 1),
(36, '::1', '18103019@ittelkom-pwt.ac.id', 6, '2021-05-29 10:28:06', 1),
(37, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 10:42:56', 1),
(38, '::1', '18103019@ittelkom-pwt.ac.id', 6, '2021-05-29 10:43:35', 1),
(39, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 10:47:13', 1),
(40, '::1', '18103019@ittelkom-pwt.ac.id', 6, '2021-05-29 10:51:54', 1),
(41, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 10:56:01', 1),
(42, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 10:59:26', 1),
(43, '::1', '18103019@ittelkom-pwt.ac.id', 6, '2021-05-29 11:00:10', 1),
(44, '::1', '18103019@ittelkom-pwt.ac.id', 6, '2021-05-29 11:03:02', 1),
(45, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 11:05:25', 1),
(46, '::1', '18103019@ittelkom-pwt.ac.id', 6, '2021-05-29 11:05:51', 1),
(47, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 11:46:03', 1),
(48, '::1', 'zalamri26@gmail.com', 5, '2021-05-29 21:15:05', 1),
(49, '::1', '18103019@ittelkom-pwt.ac.id', 6, '2021-05-29 21:58:42', 1),
(50, '::1', 'zalamri26@gmail.com', 5, '2021-05-30 01:39:00', 1),
(51, '::1', 'zalamri26@gmail.com', 5, '2021-05-30 02:40:06', 1),
(52, '::1', 'zalamri26@gmail.com', 5, '2021-05-30 09:11:54', 1),
(53, '::1', 'zalamri26@gmail.com', 5, '2021-05-30 11:31:46', 1),
(54, '::1', 'zalamri26@gmail.com', 5, '2021-05-31 01:40:22', 1),
(55, '::1', 'zalamri26@gmail.com', NULL, '2021-05-31 02:15:48', 0),
(56, '::1', 'zalamri26@gmail.com', 5, '2021-05-31 02:15:57', 1),
(57, '::1', 'zalamri26@gmail.com', 5, '2021-05-31 06:44:00', 1),
(58, '::1', 'zalamri26@gmail.com', 5, '2021-05-31 06:44:49', 1),
(59, '::1', 'zalamri26@gmail.com', 5, '2021-06-01 03:09:49', 1),
(60, '::1', 'zalamri26@gmail.com', 5, '2021-06-01 22:23:19', 1),
(61, '::1', 'zalamri26@gmail.com', 5, '2021-06-01 22:53:45', 1),
(62, '::1', 'zalamri26@gmail.com', 5, '2021-06-01 22:58:23', 1),
(63, '::1', 'zalamri26@gmail.com', 5, '2021-06-02 00:07:50', 1),
(64, '::1', 'zalamri26@gmail.com', 5, '2021-06-02 00:09:35', 1),
(65, '::1', 'muhamadamrizalnahar197@gmail.com', 7, '2021-06-02 00:51:21', 1),
(66, '::1', 'zalamri26@gmail.com', 5, '2021-06-02 01:10:25', 1),
(67, '::1', 'muhamadamrizalnahar197@gmail.com', 7, '2021-06-02 01:28:04', 1),
(68, '::1', 'zalamri26@gmail.com', 5, '2021-06-02 07:07:28', 1),
(69, '::1', 'zalamri26@gmail.com', 5, '2021-06-02 23:39:28', 1),
(70, '::1', 'zalamri26@gmail.com', 5, '2021-06-04 05:12:33', 1),
(71, '::1', '18103019@ittelkom-pwt.ac.id', NULL, '2021-06-04 05:56:19', 0),
(72, '::1', '18103019@ittelkom-pwt.ac.id', 6, '2021-06-04 06:11:22', 1),
(73, '::1', 'zalamri26@gmail.com', 5, '2021-06-05 05:17:33', 1),
(74, '::1', 'zalamri26@gmail.com', NULL, '2021-06-05 07:47:11', 0),
(75, '::1', 'zalamri26@gmail.com', 5, '2021-06-05 07:47:18', 1),
(76, '::1', 'zalamri26@gmail.com', 5, '2021-06-05 09:21:46', 1),
(77, '::1', 'zalamri26@gmail.com', 5, '2021-06-05 11:19:20', 1),
(78, '::1', 'zalamri26@gmail.com', 5, '2021-06-05 11:37:35', 1),
(79, '::1', 'zalamri26@gmail.com', 5, '2021-06-05 20:32:07', 1),
(80, '::1', 'zalamri26@gmail.com', 5, '2021-06-05 21:06:32', 1),
(81, '::1', 'zalamri26@gmail.com', 5, '2021-06-05 23:34:34', 1),
(82, '::1', 'zalamri26@gmail.com', 5, '2021-06-05 23:43:35', 1),
(83, '::1', 'zalamri26@gmail.com', 5, '2021-06-06 21:07:31', 1),
(84, '::1', 'zalamri26@gmail.com', 5, '2021-06-07 02:17:48', 1),
(85, '::1', 'zalamri26@gmail.com', 5, '2021-06-07 05:24:14', 1),
(86, '::1', 'zalamri26@gmail.com', 5, '2021-06-07 08:26:49', 1),
(87, '::1', 'zalamri26@gmail.com', 5, '2021-06-07 19:34:45', 1),
(88, '::1', 'zalamri26@gmail.com', 5, '2021-06-08 10:13:25', 1),
(89, '::1', 'zalamri26@gmail.com', NULL, '2021-06-08 22:07:42', 0),
(90, '::1', 'zalamri26@gmail.com', 5, '2021-06-08 22:07:52', 1),
(91, '::1', 'zalamri26@gmail.com', NULL, '2021-06-09 05:35:56', 0),
(92, '::1', 'zalamri26@gmail.com', NULL, '2021-06-09 05:36:01', 0),
(93, '::1', 'zalamri26@gmail.com', 5, '2021-06-09 05:36:12', 1),
(94, '::1', '18103019@ittelkom-pwt.ac.id', 6, '2021-06-09 09:51:01', 1),
(95, '::1', 'zalamri26@gmail.com', 5, '2021-06-11 07:57:43', 1),
(96, '::1', 'zalamri26@gmail.com', 5, '2021-06-12 00:11:40', 1),
(97, '::1', '18103019@ittelkom-pwt.ac.id', 6, '2021-06-12 02:46:58', 1),
(98, '::1', 'zalamri26@gmail.com', 5, '2021-06-12 02:48:20', 1),
(99, '::1', 'zalamri26@gmail.com', 5, '2021-06-12 08:17:34', 1),
(100, '::1', 'zalamri26@gmail.com', NULL, '2021-06-12 08:19:48', 0),
(101, '::1', 'zalamri26@gmail.com', 5, '2021-06-12 08:19:58', 1),
(102, '::1', '18103019@ittelkom-pwt.ac.id', 6, '2021-06-12 10:38:52', 1),
(103, '::1', 'zalamri26@gmail.com', 5, '2021-06-12 11:39:28', 1),
(104, '::1', 'zalamri26@gmail.com', 5, '2021-06-12 20:46:27', 1),
(105, '::1', 'zalamri26@gmail.com', 5, '2021-06-14 06:14:16', 1),
(106, '::1', 'zalamri26@gmail.com', 5, '2021-06-17 01:33:21', 1),
(107, '::1', 'zalamri26@gmail.com', 5, '2021-06-17 01:37:08', 1),
(108, '::1', 'zalamri26@gmail.com', 5, '2021-06-23 05:21:52', 1),
(109, '::1', 'zalamri26@gmail.com', 5, '2021-06-23 07:39:09', 1),
(110, '::1', 'zalamri26@gmail.com', 5, '2021-06-23 08:14:08', 1),
(111, '::1', 'naharamrizal1', NULL, '2021-06-23 09:03:40', 0),
(112, '::1', 'zalamri26@gmail.com', NULL, '2021-06-23 09:28:06', 0),
(113, '::1', 'naharamrizal11@gmail.com', 15, '2021-06-23 09:29:17', 1),
(114, '::1', 'zalamri26@gmail.com', 5, '2021-06-23 09:29:48', 1),
(115, '::1', 'zalamri26@gmail.com', 5, '2021-06-23 20:58:55', 1),
(116, '::1', 'zalamri26@gmail.com', 5, '2021-06-25 03:31:21', 1),
(117, '::1', 'zalamri26@gmail.com', 5, '2021-06-25 06:50:55', 1),
(118, '::1', 'zalamri26@gmail.com', 5, '2021-06-25 20:41:04', 1),
(119, '::1', 'zalamri26@gmail.com', 5, '2021-06-25 22:38:59', 1),
(120, '::1', 'zalamri26@gmail.com', 5, '2021-06-26 05:35:53', 1),
(121, '::1', 'zalamri26@gmail.com', 5, '2021-06-26 20:04:47', 1),
(122, '::1', 'zalamri26@gmail.com', 5, '2021-06-28 07:18:53', 1),
(123, '::1', 'zalamri26@gmail.com', 5, '2021-06-28 09:25:39', 1),
(124, '::1', 'zalamri26@gmail.com', 5, '2021-06-28 09:27:14', 1),
(125, '::1', 'zalamri26@gmail.com', 5, '2021-06-28 09:30:50', 1),
(126, '::1', 'kelurahansapugarutbuaran@gmail.com', 17, '2021-06-28 09:45:16', 1),
(127, '::1', 'kelurahansapugarutbuaran@gmail.com', 17, '2021-06-28 09:47:44', 1),
(128, '::1', 'kelurahansapugarutbuaran@gmail.com', 17, '2021-06-28 09:56:07', 1),
(129, '::1', 'Admin', NULL, '2021-06-28 09:56:35', 0),
(130, '::1', 'Admin', 18, '2021-06-28 09:58:06', 0),
(131, '::1', 'kelurahansapugarutbuaran@gmail.com', 18, '2021-06-28 09:59:18', 1),
(132, '::1', 'zalamri26@gmail.com', 5, '2021-06-28 10:04:51', 1),
(133, '::1', 'kelurahansapugarutbuaran@gmail.com', 19, '2021-06-28 10:07:10', 1),
(134, '::1', 'zalamri26@gmail.com', 5, '2021-06-28 10:07:34', 1),
(135, '::1', 'kelurahansapugarutbuaran@gmail.com', 19, '2021-06-28 10:10:15', 1),
(136, '::1', 'kelurahansapugarutbuaran@gmail.com', NULL, '2021-06-28 10:17:21', 0),
(137, '::1', 'kelurahansapugarutbuaran@gmail.com', 5, '2021-06-28 10:18:26', 1),
(138, '::1', 'kelurahansapugarutbuaran@gmail.com', 5, '2021-06-28 10:19:48', 1),
(139, '::1', 'kelurahansapugarutbuaran@gmail.com', 5, '2021-06-28 21:20:35', 1),
(140, '::1', 'zalamri26@gmail.com', NULL, '2021-06-29 04:26:07', 0),
(141, '::1', 'kelurahansapugarutbuaran@gmail.com', 5, '2021-06-29 04:26:44', 1),
(142, '::1', 'kelurahansapugarutbuaran@gmail.com', 5, '2021-06-30 00:55:51', 1),
(143, '::1', 'kelurahansapugarutbuaran@gmail.com', 5, '2021-06-30 00:56:56', 1),
(144, '::1', 'kelurahansapugarutbuaran@gmail.com', 5, '2021-06-30 01:09:22', 1),
(145, '::1', 'zalamriITTP', 12, '2021-06-30 01:44:55', 0),
(146, '::1', '18103019@ittelkom-pwt.ac.id', 12, '2021-06-30 01:46:01', 1),
(147, '::1', '18103019@ittelkom-pwt.ac.id', 12, '2021-06-30 01:46:48', 1),
(148, '::1', 'zalamri26@gmail.com', 21, '2021-06-30 01:49:13', 1),
(149, '::1', 'kelurahansapugarutbuaran@gmail.com', 5, '2021-06-30 01:50:01', 1),
(150, '::1', 'zalamri26@gmail.com', 21, '2021-06-30 01:52:46', 1),
(151, '::1', 'naharamrizal11@gmail.com', 22, '2021-06-30 01:55:35', 1),
(152, '::1', 'naharamrizal11@gmail.com', 22, '2021-06-30 01:56:36', 1),
(153, '::1', 'naharamrizal', NULL, '2021-06-30 01:59:24', 0),
(154, '::1', 'kelurahansapugarutbuaran@gmail.com', 5, '2021-06-30 01:59:31', 1),
(155, '::1', 'kelurahansapugarutbuaran@gmail.com', 5, '2021-06-30 08:43:48', 1),
(156, '::1', 'zalamri26@gmail.com', 23, '2021-06-30 08:46:02', 1),
(157, '::1', 'zalamri26@gmail.com', 23, '2021-06-30 08:46:44', 1),
(158, '::1', 'zalamri26@gmail.com', 23, '2021-06-30 08:51:31', 1),
(159, '::1', 'zalamri26@gmail.com', 5, '2021-06-30 14:07:34', 1),
(160, '::1', 'muhamadamrizalnahar197@gmail.com', 24, '2021-06-30 14:10:56', 1),
(161, '::1', 'zalamri26@gmail.com', 5, '2021-06-30 14:12:01', 1),
(162, '::1', 'muhamadamrizalnahar197@gmail.com', 25, '2021-06-30 14:13:14', 1),
(163, '::1', 'muhamadamrizalnahar197@gmail.com', 25, '2021-06-30 14:14:11', 1),
(164, '::1', 'kelurahansapugarutbuaran@gmail.com', 26, '2021-06-30 14:37:09', 1),
(165, '::1', 'zalamri26@gmail.com', 27, '2021-06-30 14:39:19', 1),
(166, '::1', 'muhamadamrizalnahar197@gmail.com', 28, '2021-06-30 14:40:29', 1),
(167, '::1', 'muhamadamrizalnahar197@gmail.com', 28, '2021-06-30 14:56:01', 1),
(168, '::1', 'zalamri26@gmail.com', 27, '2021-06-30 15:01:20', 1),
(169, '::1', 'muhamadamrizalnahar197@gmail.com', 28, '2021-06-30 15:02:19', 1),
(170, '::1', 'kelurahansapugarutbuaran@gmail.com', 26, '2021-06-30 15:12:29', 1),
(171, '::1', 'kelurahansapugarutbuaran@gmail.com', 26, '2021-06-30 15:14:41', 1),
(172, '::1', 'muhamadamrizalnahar197@gmail.com', 28, '2021-06-30 15:15:13', 1),
(173, '::1', 'kelurahansapugarutbuaran@gmail.com', 26, '2021-06-30 15:15:48', 1),
(174, '::1', 'kelurahansapugarutbuaran@gmail.com', 26, '2021-06-30 15:22:47', 1),
(175, '::1', 'muhamadamrizalnahar197@gmail.com', 28, '2021-06-30 15:23:31', 1),
(176, '::1', 'muhamadamrizalnahar197@gmail.com', 28, '2021-06-30 15:25:51', 1),
(177, '::1', 'zalamri26@gmail.com', 27, '2021-06-30 15:42:07', 1),
(178, '::1', 'muhamadamrizalnahar197@gmail.com', 28, '2021-06-30 15:47:09', 1),
(179, '::1', 'kelurahansapugarutbuaran@gmail.com', 26, '2021-06-30 15:49:11', 1),
(180, '::1', '18103019@ittelkom-pwt.ac.id', 29, '2021-06-30 15:51:06', 1),
(181, '::1', 'zalamri26@gmail.com', 27, '2021-06-30 15:59:05', 1),
(182, '::1', 'muhamadamrizalnahar197@gmail.com', 28, '2021-06-30 16:25:24', 1),
(183, '::1', 'zalamri26@gmail.com', NULL, '2021-06-30 16:26:14', 0),
(184, '::1', 'zalamri26@gmail.com', 27, '2021-06-30 16:26:20', 1),
(185, '::1', 'zalamri26e@gmail.com', NULL, '2021-06-30 16:26:41', 0),
(186, '::1', 'zalamri26@gmail.com', 27, '2021-06-30 16:36:21', 1),
(187, '::1', 'zalamri26@gmail.com', NULL, '2021-07-01 21:19:05', 0),
(188, '::1', 'zalamri26@gmail.com', 27, '2021-07-01 21:19:10', 1),
(189, '::1', 'zalamri26@gmail.com', 27, '2021-07-09 10:10:18', 1),
(190, '::1', 'zalamri26@gmail.com', 27, '2021-07-09 10:15:48', 1),
(191, '::1', 'muhamadamrizalnahar197@gmail.com', 28, '2021-07-09 10:16:21', 1),
(192, '::1', 'zalamri26@gmail.com', 27, '2021-07-09 10:17:03', 1),
(193, '::1', 'naharamrizal11@gmail.com', 31, '2021-07-09 10:23:26', 1),
(194, '::1', 'admin', NULL, '2021-07-09 10:24:03', 0),
(195, '::1', 'admin', NULL, '2021-07-09 10:24:12', 0),
(196, '::1', 'zalamri26@gmail.com', NULL, '2021-07-09 10:24:37', 0),
(197, '::1', 'zalamri26@gmail.com', 27, '2021-07-09 10:24:45', 1),
(198, '::1', 'admin', NULL, '2021-07-21 17:36:21', 0),
(199, '::1', 'zalamri26@gmail.com', 27, '2021-07-21 17:36:27', 1),
(200, '::1', 'zalamri26@gmail.com', NULL, '2021-07-22 11:25:24', 0),
(201, '::1', 'zalamri26@gmail.com', 27, '2021-07-22 11:25:29', 1),
(202, '::1', 'zalamri26@gmail.com', 27, '2021-07-22 16:07:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All Users'),
(2, 'manage-profile', 'Manage user\'s profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'zalamri26@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'c43472e30fb89f591deedcebad946b87', '2021-05-29 10:10:26'),
(2, 'zalamri26@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'd0879dda98e9320c2a24e7e3e83c7c3b', '2021-06-01 22:53:26'),
(3, 'zalamri26@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '5d012d475149abc901050911bab527a4', '2021-06-02 00:05:11'),
(4, 'zalamri26@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '5d012d475149abc901050911bab527a4', '2021-06-02 00:06:17'),
(5, 'zalamri26@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'b611c74994f8394c124830dca5d528f5', '2021-06-02 00:07:34'),
(6, 'muhamadamrizalnahar197@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '8f67bf6bf476450614a98758e2bc2b76', '2021-06-02 01:08:36'),
(7, 'muhamadamrizalnahar197@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '6460f815d47b77a171f70eb04bf07ab3', '2021-06-02 01:27:18'),
(8, 'naharamrizal11@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'f7422737057a83a0cf3c567c4949ccd5', '2021-06-23 08:42:29'),
(9, 'naharamrizal11@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'd3b53c4f3f6fb47142c5719522a1ea99', '2021-06-23 09:28:52'),
(10, 'kelurahansapugarutbuaran@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'cfe82788f782a4bda4019d11cc372ebe', '2021-06-28 10:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1621304103, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `foto_berita` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_berita` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul_berita`, `slug_berita`, `isi_berita`, `foto_berita`, `created_at`, `updated_at`, `tanggal_berita`) VALUES
(54, 'Vaksinasi Covid 19 2021', 'vaksinasi-covid-19-2021', '<p>Ini contoh</p>', '1626944974_3e1b50feb9a42a16d71d.jpeg', '2021-07-22 16:08:54', '2021-07-22 16:09:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_domisiliusaha`
--

CREATE TABLE `tb_domisiliusaha` (
  `id_domisiliusaha` int(12) NOT NULL,
  `judul_domisiliusaha` varchar(255) DEFAULT NULL,
  `slug_domisiliusaha` varchar(255) DEFAULT NULL,
  `isi_domisiliusaha` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_domisiliusaha`
--

INSERT INTO `tb_domisiliusaha` (`id_domisiliusaha`, `judul_domisiliusaha`, `slug_domisiliusaha`, `isi_domisiliusaha`, `created_at`, `updated_at`) VALUES
(2, 'ewewe edit', 'ewewe-edit', 'ewewe', '2021-06-12 09:54:56', '2021-06-12 10:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hargatanah`
--

CREATE TABLE `tb_hargatanah` (
  `id_hargatanah` int(12) NOT NULL,
  `judul_hargatanah` varchar(255) DEFAULT NULL,
  `slug_hargatanah` varchar(255) DEFAULT NULL,
  `isi_hargatanah` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hargatanah`
--

INSERT INTO `tb_hargatanah` (`id_hargatanah`, `judul_hargatanah`, `slug_hargatanah`, `isi_hargatanah`, `created_at`, `updated_at`) VALUES
(1, 'Informasi Harga Tanah Hari Ini', 'informasi-harga-tanah-hari-ini', '<p>Iya ini adalah informasi harga tanah di kelurahan sapugarut</p>', '2021-06-12 09:39:38', '2021-06-30 15:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id_informasi` int(11) NOT NULL,
  `judul_informasi` varchar(255) NOT NULL,
  `slug_informasi` varchar(255) DEFAULT NULL,
  `isi_informasi` text NOT NULL,
  `foto_informasi` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `tanggal_informasi` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jaminanpersalinan`
--

CREATE TABLE `tb_jaminanpersalinan` (
  `id_jaminanpersalinan` int(12) NOT NULL,
  `judul_jaminanpersalinan` varchar(255) DEFAULT NULL,
  `slug_jaminanpersalinan` varchar(255) DEFAULT NULL,
  `isi_jaminanpersalinan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jaminanpersalinan`
--

INSERT INTO `tb_jaminanpersalinan` (`id_jaminanpersalinan`, `judul_jaminanpersalinan`, `slug_jaminanpersalinan`, `isi_jaminanpersalinan`, `created_at`, `updated_at`) VALUES
(1, 'rererwerw121 edit', 'rererwerw121-edit', '34rwrq23r2', '2021-06-12 09:33:37', '2021-06-12 10:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelahiran`
--

CREATE TABLE `tb_kelahiran` (
  `id_kelahiran` int(12) NOT NULL,
  `judul_kelahiran` varchar(255) DEFAULT NULL,
  `slug_kelahiran` varchar(255) DEFAULT NULL,
  `isi_kelahiran` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelahiran`
--

INSERT INTO `tb_kelahiran` (`id_kelahiran`, `judul_kelahiran`, `slug_kelahiran`, `isi_kelahiran`, `created_at`, `updated_at`) VALUES
(1, 'ini judul kelahiran', 'ini-judul-kelahiran', 'ini isi kelahiran', '2021-06-12 08:55:49', '2021-06-12 08:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kematian`
--

CREATE TABLE `tb_kematian` (
  `id_kematian` int(12) NOT NULL,
  `judul_kematian` varchar(255) DEFAULT NULL,
  `slug_kematian` varchar(255) DEFAULT NULL,
  `isi_kematian` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kematian`
--

INSERT INTO `tb_kematian` (`id_kematian`, `judul_kematian`, `slug_kematian`, `isi_kematian`, `created_at`, `updated_at`) VALUES
(2, 'dsdsdsd edit', 'dsdsdsd-edit', 'sdsdsd', '2021-06-12 09:54:04', '2021-06-12 10:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komoditiunggulan`
--

CREATE TABLE `tb_komoditiunggulan` (
  `id_komoditi` int(11) NOT NULL,
  `judul_komoditi` varchar(255) NOT NULL,
  `slug_komoditi` varchar(255) NOT NULL,
  `isi_komoditi` text NOT NULL,
  `foto_komoditi` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_komoditi` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komoditiunggulan`
--

INSERT INTO `tb_komoditiunggulan` (`id_komoditi`, `judul_komoditi`, `slug_komoditi`, `isi_komoditi`, `foto_komoditi`, `created_at`, `updated_at`, `tanggal_komoditi`) VALUES
(6, 'judul satu', 'judul-satu', '<p>jvpsjvsjvpsjvspvjsp</p>', '1626869826_63e36b59d35dd382adb3.jpg', '2021-07-09 10:10:52', '2021-07-21 19:17:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ktp`
--

CREATE TABLE `tb_ktp` (
  `id_ktp` int(11) NOT NULL,
  `judul_ktp` varchar(255) NOT NULL,
  `slug_ktp` varchar(255) NOT NULL,
  `isi_ktp` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ktp`
--

INSERT INTO `tb_ktp` (`id_ktp`, `judul_ktp`, `slug_ktp`, `isi_ktp`, `created_at`, `updated_at`) VALUES
(5, 'Persyaratan Membuat KTP', 'persyaratan-membuat-ktp', '<blockquote><p>Why do we use it?</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br>&nbsp;</p></blockquote>', '2021-06-25 22:33:24', '2021-06-29 00:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perkawinan`
--

CREATE TABLE `tb_perkawinan` (
  `id_perkawinan` int(12) NOT NULL,
  `judul_perkawinan` varchar(255) NOT NULL,
  `slug_perkawinan` varchar(255) NOT NULL,
  `isi_perkawinan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perkawinan`
--

INSERT INTO `tb_perkawinan` (`id_perkawinan`, `judul_perkawinan`, `slug_perkawinan`, `isi_perkawinan`, `created_at`, `updated_at`) VALUES
(1, 'Persyaratan Permohonan Perkawinan', 'persyaratan-permohonan-perkawinan', '<p>ededed</p>', '2021-06-12 09:53:23', '2021-06-29 04:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pindahpenduduk`
--

CREATE TABLE `tb_pindahpenduduk` (
  `id_pindahpenduduk` int(12) NOT NULL,
  `judul_pindahpenduduk` varchar(255) DEFAULT NULL,
  `slug_pindahpenduduk` varchar(255) DEFAULT NULL,
  `isi_pindahpenduduk` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pindahpenduduk`
--

INSERT INTO `tb_pindahpenduduk` (`id_pindahpenduduk`, `judul_pindahpenduduk`, `slug_pindahpenduduk`, `isi_pindahpenduduk`, `created_at`, `updated_at`) VALUES
(1, 'rer edit', 'rer-edit', 'rerer', '2021-06-12 09:30:36', '2021-06-12 10:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produkunggulan`
--

CREATE TABLE `tb_produkunggulan` (
  `id_produk` int(11) NOT NULL,
  `judul_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `isi_produk` text NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_produk` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produkunggulan`
--

INSERT INTO `tb_produkunggulan` (`id_produk`, `judul_produk`, `slug_produk`, `isi_produk`, `foto_produk`, `created_at`, `updated_at`, `tanggal_produk`) VALUES
(4, 'Produksi Jahe', 'produksi-jahe', '<p>Produksi jahe di sapugarut</p>', '1626864154_b5d3daf241fc09ff97c6.jpg', '2021-07-09 10:13:08', '2021-07-21 17:42:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sktm`
--

CREATE TABLE `tb_sktm` (
  `id_sktm` int(12) NOT NULL,
  `judul_sktm` varchar(255) DEFAULT NULL,
  `slug_sktm` varchar(255) DEFAULT NULL,
  `isi_sktm` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sktm`
--

INSERT INTO `tb_sktm` (`id_sktm`, `judul_sktm`, `slug_sktm`, `isi_sktm`, `created_at`, `updated_at`) VALUES
(2, 'dd edit', 'dd-edit', 'ddd', '2021-06-12 09:52:10', '2021-06-12 10:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_waris`
--

CREATE TABLE `tb_waris` (
  `id_waris` int(12) NOT NULL,
  `judul_waris` varchar(255) DEFAULT NULL,
  `slug_waris` varchar(255) DEFAULT NULL,
  `isi_waris` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_waris`
--

INSERT INTO `tb_waris` (`id_waris`, `judul_waris`, `slug_waris`, `isi_waris`, `created_at`, `updated_at`) VALUES
(1, 'iandiand edit', 'iandiand-edit', 'idna dia ', '2021-06-12 09:35:14', '2021-06-12 10:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 'kelurahansapugarutbuaran@gmail.com', 'admin', NULL, 'default.svg', '$2y$10$o2gnK7TZ4IhbnODZoX8ar.vKS0jRhWT0cN3OD3psYFzzRM3OHJI2a', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-30 14:36:16', '2021-06-30 14:37:03', NULL),
(27, 'zalamri26@gmail.com', 'amrizalnahar', NULL, 'default.svg', '$2y$10$tT.FnF59ilFNfT8aA5FmC.6/KmR90ezS/WewbInJXBv0aKzQ3vmAy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-30 14:37:50', '2021-06-30 14:39:07', NULL),
(29, '18103019@ittelkom-pwt.ac.id', '18103019', NULL, 'default.svg', '$2y$10$gwpin1lqjo6ca1saa6XgQeSsL8G0B8OIBRAcczY/YuFgwbIcoRQxq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-30 15:50:32', '2021-06-30 15:50:58', NULL),
(30, 'muhamadamrizalnahar197@gmail.com', 'naharamrizal11', NULL, 'default.svg', '$2y$10$LJYfwFaLGfaUHhOXo15un.KafaXJIC1pgeyf4p0D1tm4SfuYqYKIC', NULL, NULL, NULL, '458747c836949d9ecec85349150ea8fe', NULL, NULL, 0, 0, '2021-07-09 10:19:22', '2021-07-09 10:19:22', NULL),
(31, 'naharamrizal11@gmail.com', 'amrizal', NULL, 'default.svg', '$2y$10$Xk2o0XN8.Wrrt76E8GmNveniAp8oudrhZ9bYr1.VfJoamI1UO12vq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-07-09 10:22:38', '2021-07-09 10:23:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_domisiliusaha`
--
ALTER TABLE `tb_domisiliusaha`
  ADD PRIMARY KEY (`id_domisiliusaha`);

--
-- Indexes for table `tb_hargatanah`
--
ALTER TABLE `tb_hargatanah`
  ADD PRIMARY KEY (`id_hargatanah`);

--
-- Indexes for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `tb_jaminanpersalinan`
--
ALTER TABLE `tb_jaminanpersalinan`
  ADD PRIMARY KEY (`id_jaminanpersalinan`);

--
-- Indexes for table `tb_kelahiran`
--
ALTER TABLE `tb_kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`);

--
-- Indexes for table `tb_kematian`
--
ALTER TABLE `tb_kematian`
  ADD PRIMARY KEY (`id_kematian`);

--
-- Indexes for table `tb_komoditiunggulan`
--
ALTER TABLE `tb_komoditiunggulan`
  ADD PRIMARY KEY (`id_komoditi`);

--
-- Indexes for table `tb_ktp`
--
ALTER TABLE `tb_ktp`
  ADD PRIMARY KEY (`id_ktp`);

--
-- Indexes for table `tb_perkawinan`
--
ALTER TABLE `tb_perkawinan`
  ADD PRIMARY KEY (`id_perkawinan`);

--
-- Indexes for table `tb_pindahpenduduk`
--
ALTER TABLE `tb_pindahpenduduk`
  ADD PRIMARY KEY (`id_pindahpenduduk`);

--
-- Indexes for table `tb_produkunggulan`
--
ALTER TABLE `tb_produkunggulan`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_sktm`
--
ALTER TABLE `tb_sktm`
  ADD PRIMARY KEY (`id_sktm`);

--
-- Indexes for table `tb_waris`
--
ALTER TABLE `tb_waris`
  ADD PRIMARY KEY (`id_waris`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_domisiliusaha`
--
ALTER TABLE `tb_domisiliusaha`
  MODIFY `id_domisiliusaha` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_hargatanah`
--
ALTER TABLE `tb_hargatanah`
  MODIFY `id_hargatanah` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jaminanpersalinan`
--
ALTER TABLE `tb_jaminanpersalinan`
  MODIFY `id_jaminanpersalinan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kelahiran`
--
ALTER TABLE `tb_kelahiran`
  MODIFY `id_kelahiran` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kematian`
--
ALTER TABLE `tb_kematian`
  MODIFY `id_kematian` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_komoditiunggulan`
--
ALTER TABLE `tb_komoditiunggulan`
  MODIFY `id_komoditi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_ktp`
--
ALTER TABLE `tb_ktp`
  MODIFY `id_ktp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_perkawinan`
--
ALTER TABLE `tb_perkawinan`
  MODIFY `id_perkawinan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pindahpenduduk`
--
ALTER TABLE `tb_pindahpenduduk`
  MODIFY `id_pindahpenduduk` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_produkunggulan`
--
ALTER TABLE `tb_produkunggulan`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sktm`
--
ALTER TABLE `tb_sktm`
  MODIFY `id_sktm` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_waris`
--
ALTER TABLE `tb_waris`
  MODIFY `id_waris` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
