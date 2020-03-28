-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 01:28 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `columbia_assosiation`
--

-- --------------------------------------------------------

--
-- Table structure for table `board_members`
--

CREATE TABLE `board_members` (
  `id` bigint(20) NOT NULL,
  `ref_board_members_category_id` bigint(20) NOT NULL,
  `board_members_first_name` varchar(100) NOT NULL,
  `board_members_last_name` varchar(100) NOT NULL,
  `board_members_image_location` varchar(500) DEFAULT NULL,
  `board_member_designation` varchar(200) DEFAULT NULL,
  `board_members_email_address` varchar(250) DEFAULT NULL,
  `board_members_position` int(11) DEFAULT '0',
  `board_members_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board_members`
--

INSERT INTO `board_members` (`id`, `ref_board_members_category_id`, `board_members_first_name`, `board_members_last_name`, `board_members_image_location`, `board_member_designation`, `board_members_email_address`, `board_members_position`, `board_members_active`) VALUES
(3, 3, 'vvv', 'vvv', '90721394.jpg', 'vvv', 'aaa@aaa.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `board_members_categories`
--

CREATE TABLE `board_members_categories` (
  `id` bigint(20) NOT NULL,
  `board_members_category_name` varchar(200) NOT NULL,
  `board_members_category_position` int(11) DEFAULT '0',
  `board_members_category_active` tinyint(4) DEFAULT '1' COMMENT '1 means active and 0 means not active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board_members_categories`
--

INSERT INTO `board_members_categories` (`id`, `board_members_category_name`, `board_members_category_position`, `board_members_category_active`) VALUES
(1, 'ddd', 0, 1),
(2, 'bbb', 1, 1),
(3, 'ccc', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) NOT NULL,
  `ref_membership_id` bigint(20) NOT NULL,
  `contact_us_subject` text,
  `contact_us_details` text,
  `contact_us_seen` tinyint(4) DEFAULT '0',
  `contact_us_created_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customusers`
--

CREATE TABLE `customusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passcode` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) NOT NULL,
  `event_title` text,
  `event_details` text,
  `event_venue` text,
  `event_flyer_location` varchar(500) NOT NULL,
  `event_flyer_type` enum('image','pdf','doc') NOT NULL,
  `event_starting_date` date NOT NULL,
  `event_starting_time` time DEFAULT NULL,
  `event_ending_date` date NOT NULL,
  `event_ending_time` time DEFAULT NULL,
  `event_ticket_price` varchar(10) DEFAULT NULL COMMENT 'null means free',
  `event_total_seat` varchar(10) DEFAULT NULL,
  `event_active` tinyint(4) DEFAULT '1' COMMENT '1 means active and 0 means not active',
  `event_created_datetime` datetime NOT NULL,
  `event_edited_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_details`, `event_venue`, `event_flyer_location`, `event_flyer_type`, `event_starting_date`, `event_starting_time`, `event_ending_date`, `event_ending_time`, `event_ticket_price`, `event_total_seat`, `event_active`, `event_created_datetime`, `event_edited_datetime`) VALUES
(1, 'Eid Special', 'Eid Special Details', 'Dhaka', 'Dhaka', 'image', '2020-11-11', '00:30:00', '2020-11-14', '01:30:00', '555', '4', 1, '2020-03-24 00:00:00', '2020-03-24 14:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `event_ticket_buyers`
--

CREATE TABLE `event_ticket_buyers` (
  `id` bigint(20) NOT NULL,
  `ref_event_id` bigint(20) NOT NULL,
  `ref_membership_id` bigint(20) NOT NULL,
  `buyer_first_name` varchar(100) DEFAULT NULL,
  `buyer_last_name` varchar(100) DEFAULT NULL,
  `payment_type` enum('cash','online payment','others') DEFAULT NULL,
  `total_tickets` int(11) DEFAULT '0',
  `total_price` varchar(10) DEFAULT NULL,
  `event_ticket_buyer_stored_datetime` datetime NOT NULL,
  `event_ticket_buyer_edited_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_ticket_payments`
--

CREATE TABLE `event_ticket_payments` (
  `id` bigint(20) NOT NULL,
  `ref_event_id` bigint(20) NOT NULL,
  `event_ticket_payment_by` enum('PAYPAL','DEBIT_CREDIT_MASTER_CARD','OTHERS') DEFAULT NULL,
  `event_ticket_payment_details` text COMMENT 'it is not defined.it could be the last 4 digit of card number and other information',
  `event_ticket_payment_datetime` datetime NOT NULL,
  `event_ticket_payment_amount` varchar(10) NOT NULL,
  `event_ticket_payment_creating_datetime` datetime NOT NULL,
  `event_ticket_payment_editing_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `username`, `password`, `email`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'sajed4', 'sajed123454w', '$2y$10$Ao65PaqZKaKfBvuCVp5YbeKI4B9sr0k5H7fkCspjfAnuk5ZoiGhzm', 'aaa@aaa.com47lrw', 0, NULL, '2020-03-27 13:45:25', '2020-03-27 13:45:25'),
(17, 'sajed4', 'sajed123454ws', '$2y$10$WwRS6OFHy0RpSWAt2wU2eegVLey.Zlpo1c9gas3vjJpoWl8vEnHb6', 'aaa@aaa.com47lrwds', 0, NULL, '2020-03-27 13:47:00', '2020-03-27 13:47:00'),
(18, 'sajed', 'sajed123', '$2y$10$jw/rnkgX.Pc/drwP.ezLgOHMKAOTkndmBo8RozqFrjsQSPXWntOcS', 'sajedaiub@gmail.com', 0, NULL, '2020-03-27 14:03:09', '2020-03-27 14:03:09'),
(19, 'sajed', 'sajed1231', '$2y$10$bv1D/xIBPtc8woumvNv64.3301u5uyPnBQ0pGghx3W426omn8TnNm', 'sajedaiub@gmail.com1', 0, NULL, '2020-03-27 14:24:12', '2020-03-27 14:24:12'),
(20, 'sajed', 'sajed1234', '$2y$10$Lii4rbNmS/FH8VUEBQDgROWKBStD8Ub77K68jFKIv7hw7/XJDlLG6', 'sajedaiub22@gmail.com', 0, NULL, '2020-03-27 14:49:14', '2020-03-27 14:49:14'),
(21, 'sajed', 'sajed12345', 'sajed12345', 'ccc@ccc.com', 0, NULL, '2020-03-27 14:55:03', '2020-03-27 14:55:03'),
(22, 'sajed', 'sajed123457', '$2y$10$1LnWp9N2W8XFUm5yuaLe3O6YetRlLGetWbdNTGWLSeV4.4HmWvS7C', 'ccc@ccc.com7', 0, '8aHefh68fxENdWUfvamy0hSXglWAKk6mBLnHmQhfT85Vc6EiX2zgH6rFvfIh', '2020-03-27 17:18:45', '2020-03-27 17:18:45'),
(23, 'vvvvvv', 'vvvvvv', '$2y$10$kDDxy/CIhfNORCU2meP4WOIKJyZf3nlB4ytts9.5Z6f4bzvuYwIjm', 'vvv@vvv.com', 1, NULL, '2020-03-27 17:39:45', '2020-03-27 17:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `memberships_old`
--

CREATE TABLE `memberships_old` (
  `id` bigint(20) NOT NULL,
  `membership_username` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` enum('0','1','2','3') NOT NULL COMMENT '0 => waiting for approval,1=> approved but waiting for membership fee, 3=>blocked by admin',
  `membership_expired_date` date DEFAULT NULL,
  `membership_creating_datetime` datetime NOT NULL,
  `membership_editing_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberships_old`
--

INSERT INTO `memberships_old` (`id`, `membership_username`, `username`, `password`, `membership_expired_date`, `membership_creating_datetime`, `membership_editing_datetime`) VALUES
(2, 'Khan', '123456', '1', '2020-12-12', '2020-03-24 00:00:00', '2020-03-24 13:15:43'),
(3, 'sajed ahmed11', 'sdfa', '1', '2020-11-11', '2020-03-24 00:00:00', '2020-03-24 13:18:43'),
(4, 'aaa', 'aaa', '1', '2020-03-12', '2020-03-24 00:00:00', '2020-03-24 14:40:15'),
(6, 'sss', 'aaa', '1', '2020-03-09', '2020-03-26 00:00:00', '2020-03-26 13:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `membership_payments`
--

CREATE TABLE `membership_payments` (
  `id` bigint(20) NOT NULL,
  `ref_membership_id` bigint(20) NOT NULL,
  `membership_payment_ess` tinyint(4) DEFAULT '0' COMMENT '0 means no,1 means yes',
  `membership_payment_by` enum('PAYPAL','DEBIT_CREDIT_MASTER_CARD','OTHERS') DEFAULT NULL,
  `membership_payment_details` text COMMENT 'it is not defined.it could be the last 4 digit of card number and other information',
  `membership_payment_datetime` datetime NOT NULL,
  `membership_payment_amount` varchar(10) NOT NULL,
  `membership_next_renewal_date` date DEFAULT NULL,
  `membership_payment_creating_datetime` datetime NOT NULL,
  `membership_payment_editing_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_devices`
--

CREATE TABLE `member_devices` (
  `id` bigint(20) NOT NULL,
  `ref_member_device_membership_id` bigint(20) NOT NULL,
  `member_device_os_type` enum('android','ios','windows','others','not defined') NOT NULL,
  `member_device_token_id` varchar(200) NOT NULL,
  `member_device_unique_id` varchar(200) DEFAULT NULL,
  `member_device_storing_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_job_infos`
--

CREATE TABLE `member_job_infos` (
  `id` bigint(20) NOT NULL,
  `ref_member_job_info_membership_id` bigint(20) NOT NULL,
  `member_command_code` varchar(50) DEFAULT NULL,
  `member_command_name` varchar(100) DEFAULT NULL,
  `member_rank` varchar(100) DEFAULT NULL,
  `member_shield` varchar(100) DEFAULT NULL,
  `member_appointment_date` date DEFAULT NULL,
  `member_promoted_date` date DEFAULT NULL,
  `member_boro` varchar(200) DEFAULT NULL,
  `member_benificiary` varchar(200) DEFAULT NULL,
  `member_reference_no` varchar(100) DEFAULT NULL,
  `member_retired` varchar(100) DEFAULT NULL,
  `member_job_info_creating_datetime` datetime NOT NULL,
  `member_job_info_editing_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_personal_infos`
--

CREATE TABLE `member_personal_infos` (
  `id` bigint(20) NOT NULL,
  `ref_member_personal_info_membership_id` bigint(20) NOT NULL,
  `member_first_name` varchar(200) NOT NULL,
  `member_last_name` varchar(200) NOT NULL,
  `member_birth_date` date NOT NULL,
  `member_gender` enum('0','1','2','3') NOT NULL COMMENT '0 means not selected,1 means Male,2 means female,3 means others',
  `member_address` text,
  `member_zip_code` varchar(10) NOT NULL,
  `member_email_address` varchar(500) NOT NULL,
  `member_tax_reg_no` varchar(30) NOT NULL,
  `member_personal_info_creating_datetime` datetime NOT NULL,
  `member_personal_info_editing_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memories`
--

CREATE TABLE `memories` (
  `id` bigint(20) NOT NULL,
  `memories_name` text,
  `memories_details` text,
  `memories_created_date_time` datetime NOT NULL,
  `memories_editing_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memories_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memories`
--

INSERT INTO `memories` (`id`, `memories_name`, `memories_details`, `memories_created_date_time`, `memories_editing_datetime`, `memories_active`) VALUES
(1, 'test', 'sdf asasf sadf asd asdf', '2020-03-24 00:00:00', '2020-03-24 15:01:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `memories_photos`
--

CREATE TABLE `memories_photos` (
  `id` bigint(20) NOT NULL,
  `ref_memories_id` bigint(20) NOT NULL,
  `memories_photo_location` varchar(500) NOT NULL,
  `memories_photo_uploaded_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memories_photo_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `message_details` text,
  `message_active` tinyint(4) DEFAULT '1' COMMENT '1 means active and 0 means not active',
  `message_created_datetime` datetime NOT NULL,
  `message_edited_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2020_03_26_112254_create_customusers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0cc26aea30f13022670368766ae51bd40eac1f6a77885fd684ec89a0754f765c5cb4b0a4fa229b1e', 17, 3, 'MyApp', '[]', 0, '2020-03-27 13:47:00', '2020-03-27 13:47:00', '2021-03-27 19:47:00'),
('4006b1ff24632b3be7e50e90830fb5f95ce195a166ec6b03fbf437e570a01e97b3e7a1cc01baf00a', 18, 3, 'MyApp', '[]', 0, '2020-03-27 14:03:09', '2020-03-27 14:03:09', '2021-03-27 20:03:09'),
('4125a12dd763a0d6abfdb000969b97fece7bf52895e06cc1ce68872326e32f064ea0259ceaee52df', 15, 3, 'TutsForWeb', '[]', 0, '2020-03-27 13:41:24', '2020-03-27 13:41:24', '2021-03-27 19:41:24'),
('4e5837fb51b40dd155b44386d4e3d32474e011033a470258dc8a4433d97f7e85fced35d59d9053c4', 22, 3, 'MyApp', '[]', 0, '2020-03-27 17:19:48', '2020-03-27 17:19:48', '2021-03-27 23:19:48'),
('5e17c0becc75d335fb4f44c4219237bc6d08f53f236b1a7e646e2bb12478c617e9f44bbc4a7a4ce1', 14, 3, 'TutsForWeb', '[]', 0, '2020-03-27 13:41:08', '2020-03-27 13:41:08', '2021-03-27 19:41:08'),
('5f1cbaa7a748f3d068095c14d81faabc6288d2443ec00c0c265dc863a773b8b4ba02ce3ec6e66d79', 10, 3, 'TutsForWeb', '[]', 0, '2020-03-27 13:11:23', '2020-03-27 13:11:23', '2021-03-27 19:11:23'),
('69fcd2678c173a530b1029de2e890089a2570dc2abfdc349c460c8aacae60c097fae5a6aaf210b95', 22, 3, 'MyApp', '[]', 0, '2020-03-27 18:24:04', '2020-03-27 18:24:04', '2021-03-28 00:24:04'),
('79129c752d3bd7076fc27e5733b7157301e0a59970aa274176195a94ab8a86739bc0bc3af2f572da', 20, 3, 'MyApp', '[]', 0, '2020-03-27 14:49:14', '2020-03-27 14:49:14', '2021-03-27 20:49:14'),
('7ea6113c006aa2fa4ad290990c10327cb24d71110e701c6c9fdbe937fccbf814bce20e6fa49b28e2', 21, 3, 'MyApp', '[]', 0, '2020-03-27 14:55:03', '2020-03-27 14:55:03', '2021-03-27 20:55:03'),
('97d30ad29f2dbf6b3e690b0d2093e259c7f9136d3dcbcd6f85c8b9cc81384fc548aa67eb0df6fb64', 11, 3, 'TutsForWeb', '[]', 0, '2020-03-27 13:36:56', '2020-03-27 13:36:56', '2021-03-27 19:36:56'),
('a12ef8806d240f7bfc4f298c3444a8bdbb4c98d7173a788ac42b743c005482a35ea43d4f4fa8dc74', 22, 3, 'MyApp', '[]', 0, '2020-03-27 17:18:47', '2020-03-27 17:18:47', '2021-03-27 23:18:47'),
('d0d0b3280751b84a4924e50ac499b76bdd39ca3c1ac4160f635c838a4e1a74fcc828e3c30dafed97', 19, 3, 'MyApp', '[]', 0, '2020-03-27 14:24:14', '2020-03-27 14:24:14', '2021-03-27 20:24:14'),
('f279b800807692e7185365c5d16d995723fa65e01d4e35cbba022f8e1c90270608928678f02bb849', 12, 3, 'TutsForWeb', '[]', 0, '2020-03-27 13:37:18', '2020-03-27 13:37:18', '2021-03-27 19:37:18'),
('f917b7721c6ec39989653a4009935192fbd9646fd2d20f0e149d52c18bfa0e045b68b341c6a816c8', 16, 3, 'MyApp', '[]', 0, '2020-03-27 13:45:25', '2020-03-27 13:45:25', '2021-03-27 19:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'columbia_assosiation Personal Access Client', 'SZmQYXUNlfPDQuDQ1Sd38SHDCjf51Eow5bf2m7R2', 'http://localhost', 1, 0, 0, '2020-03-27 12:45:27', '2020-03-27 12:45:27'),
(2, NULL, 'columbia_assosiation Password Grant Client', 'Ihso2LnauXpcTlvFPEXpf6WQSqADJW0xSy5lFqhi', 'http://localhost', 0, 1, 0, '2020-03-27 12:45:27', '2020-03-27 12:45:27'),
(3, NULL, 'columbia_assosiation Personal Access Client', 'vvey9eViPit2nsxpla1kHzL0DSRZJQlIIRYJEePx', 'http://localhost', 1, 0, 0, '2020-03-27 12:45:55', '2020-03-27 12:45:55'),
(4, NULL, 'columbia_assosiation Password Grant Client', 'WtnmVbknMnRiGQUNeKTaS4cJ9iEkOIhhgTmctIPf', 'http://localhost', 0, 1, 0, '2020-03-27 12:45:55', '2020-03-27 12:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-03-27 12:45:27', '2020-03-27 12:45:27'),
(2, 3, '2020-03-27 12:45:55', '2020-03-27 12:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organize_infos`
--

CREATE TABLE `organize_infos` (
  `organize_address` text,
  `organize_telephone` text,
  `organize_email` varchar(300) DEFAULT NULL,
  `organize_facebook` varchar(300) DEFAULT NULL,
  `organize_instagram` varchar(300) DEFAULT NULL,
  `organize_linkedin` varchar(300) DEFAULT NULL,
  `organize_twitter` varchar(300) DEFAULT NULL,
  `organize_info_created_edited_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) NOT NULL,
  `sponsor_name` varchar(300) NOT NULL,
  `sponsor_details` text,
  `sponsor_address` text,
  `sponsor_email` varchar(300) DEFAULT NULL,
  `sponsor_website` varchar(300) DEFAULT NULL,
  `sponsor_logo_photo` varchar(300) DEFAULT NULL,
  `sponsor_position` int(11) DEFAULT '0',
  `sponsor_created_datetime` datetime NOT NULL,
  `sponsor_edited_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board_members`
--
ALTER TABLE `board_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_board_members_category_id` (`ref_board_members_category_id`);

--
-- Indexes for table `board_members_categories`
--
ALTER TABLE `board_members_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_membership_id` (`ref_membership_id`);

--
-- Indexes for table `customusers`
--
ALTER TABLE `customusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_ticket_buyers`
--
ALTER TABLE `event_ticket_buyers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_event_id` (`ref_event_id`),
  ADD KEY `ref_membership_id` (`ref_membership_id`);

--
-- Indexes for table `event_ticket_payments`
--
ALTER TABLE `event_ticket_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_event_id` (`ref_event_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `memberships_old`
--
ALTER TABLE `memberships_old`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `membership_username` (`membership_username`);

--
-- Indexes for table `membership_payments`
--
ALTER TABLE `membership_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_membership_id` (`ref_membership_id`);

--
-- Indexes for table `member_devices`
--
ALTER TABLE `member_devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_member_device_membership_id` (`ref_member_device_membership_id`);

--
-- Indexes for table `member_job_infos`
--
ALTER TABLE `member_job_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_member_job_info_membership_id` (`ref_member_job_info_membership_id`);

--
-- Indexes for table `member_personal_infos`
--
ALTER TABLE `member_personal_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_email_address` (`member_email_address`),
  ADD KEY `ref_member_personal_info_membership_id` (`ref_member_personal_info_membership_id`);

--
-- Indexes for table `memories`
--
ALTER TABLE `memories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memories_photos`
--
ALTER TABLE `memories_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_memories_id` (`ref_memories_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board_members`
--
ALTER TABLE `board_members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `board_members_categories`
--
ALTER TABLE `board_members_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customusers`
--
ALTER TABLE `customusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_ticket_buyers`
--
ALTER TABLE `event_ticket_buyers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_ticket_payments`
--
ALTER TABLE `event_ticket_payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `memberships_old`
--
ALTER TABLE `memberships_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `membership_payments`
--
ALTER TABLE `membership_payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_devices`
--
ALTER TABLE `member_devices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_job_infos`
--
ALTER TABLE `member_job_infos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_personal_infos`
--
ALTER TABLE `member_personal_infos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memories`
--
ALTER TABLE `memories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `memories_photos`
--
ALTER TABLE `memories_photos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `board_members`
--
ALTER TABLE `board_members`
  ADD CONSTRAINT `board_members_ibfk_1` FOREIGN KEY (`ref_board_members_category_id`) REFERENCES `board_members_categories` (`id`);

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`ref_membership_id`) REFERENCES `memberships_old` (`id`);

--
-- Constraints for table `event_ticket_buyers`
--
ALTER TABLE `event_ticket_buyers`
  ADD CONSTRAINT `event_ticket_buyers_ibfk_1` FOREIGN KEY (`ref_event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `event_ticket_buyers_ibfk_2` FOREIGN KEY (`ref_membership_id`) REFERENCES `memberships_old` (`id`);

--
-- Constraints for table `event_ticket_payments`
--
ALTER TABLE `event_ticket_payments`
  ADD CONSTRAINT `event_ticket_payments_ibfk_1` FOREIGN KEY (`ref_event_id`) REFERENCES `event_ticket_buyers` (`id`);

--
-- Constraints for table `membership_payments`
--
ALTER TABLE `membership_payments`
  ADD CONSTRAINT `membership_payments_ibfk_1` FOREIGN KEY (`ref_membership_id`) REFERENCES `memberships_old` (`id`);

--
-- Constraints for table `member_devices`
--
ALTER TABLE `member_devices`
  ADD CONSTRAINT `member_devices_ibfk_1` FOREIGN KEY (`ref_member_device_membership_id`) REFERENCES `memberships_old` (`id`);

--
-- Constraints for table `member_job_infos`
--
ALTER TABLE `member_job_infos`
  ADD CONSTRAINT `member_job_infos_ibfk_1` FOREIGN KEY (`ref_member_job_info_membership_id`) REFERENCES `memberships_old` (`id`);

--
-- Constraints for table `member_personal_infos`
--
ALTER TABLE `member_personal_infos`
  ADD CONSTRAINT `member_personal_infos_ibfk_1` FOREIGN KEY (`ref_member_personal_info_membership_id`) REFERENCES `memberships_old` (`id`);

--
-- Constraints for table `memories_photos`
--
ALTER TABLE `memories_photos`
  ADD CONSTRAINT `memories_photos_ibfk_1` FOREIGN KEY (`ref_memories_id`) REFERENCES `memories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
