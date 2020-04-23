-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 08:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

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
  `board_members_position` int(11) DEFAULT 0,
  `board_members_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board_members`
--

INSERT INTO `board_members` (`id`, `ref_board_members_category_id`, `board_members_first_name`, `board_members_last_name`, `board_members_image_location`, `board_member_designation`, `board_members_email_address`, `board_members_position`, `board_members_active`) VALUES
(3, 3, 'vvv', 'vvv', '90721394.jpg', 'vvv', 'aaa@aaa.com', 0, 1),
(4, 1, 'aaa', 'bbb', NULL, 'DD', 'DD@dd.com', 2, 1),
(6, 3, 'fff', 'fff', 'fff', 'fff', 'fff', 2, 1),
(7, 2, 'ddd', 'dd', 'dddd', 'dd', 'dd', 1, 1),
(8, 2, 'aa', 'aaa', '655513265.jpg', 'aaa', 'aa@saa.com', 0, 1),
(9, 4, 'tt', 'ttt', '331390234.jpg', 'ttt', 'tt@ttt.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `board_members_categories`
--

CREATE TABLE `board_members_categories` (
  `id` bigint(20) NOT NULL,
  `board_members_category_name` varchar(200) NOT NULL,
  `board_members_category_position` int(11) DEFAULT 0,
  `board_members_category_active` tinyint(4) DEFAULT 1 COMMENT '1 means active and 0 means not active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board_members_categories`
--

INSERT INTO `board_members_categories` (`id`, `board_members_category_name`, `board_members_category_position`, `board_members_category_active`) VALUES
(1, 'aaa', 0, 1),
(2, 'bbb', 1, 1),
(3, 'ccc', 2, 1),
(4, 'ddd', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) NOT NULL,
  `ref_membership_id` int(11) NOT NULL,
  `contact_us_subject` text DEFAULT NULL,
  `contact_us_details` text DEFAULT NULL,
  `contact_us_seen` tinyint(4) DEFAULT 0,
  `contact_us_created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `event_title` text DEFAULT NULL,
  `event_details` text DEFAULT NULL,
  `event_venue` text DEFAULT NULL,
  `event_flyer_location` varchar(500) NOT NULL,
  `event_flyer_type` enum('image','pdf','doc') NOT NULL,
  `event_starting_date` date NOT NULL,
  `event_starting_time` time DEFAULT NULL,
  `event_ending_date` date NOT NULL,
  `event_ending_time` time DEFAULT NULL,
  `event_ticket_price` varchar(10) DEFAULT NULL COMMENT 'null means free',
  `event_total_seat` varchar(10) DEFAULT NULL,
  `event_active` tinyint(4) DEFAULT 1 COMMENT '1 means active and 0 means not active',
  `event_created_datetime` datetime NOT NULL,
  `event_edited_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_details`, `event_venue`, `event_flyer_location`, `event_flyer_type`, `event_starting_date`, `event_starting_time`, `event_ending_date`, `event_ending_time`, `event_ticket_price`, `event_total_seat`, `event_active`, `event_created_datetime`, `event_edited_datetime`) VALUES
(1, 'Eid Special', 'Eid Special Details', 'Dhaka', 'Dhaka', 'image', '2020-11-11', '00:30:00', '2020-11-14', '01:30:00', '555', '4', 1, '2020-03-24 00:00:00', '2020-03-24 14:38:20'),
(3, 'my first event', 'details of event', 'Dhaka', 'asfa', 'image', '2012-12-12', NULL, '2012-12-12', NULL, '500', '5', 1, '2020-04-12 00:00:00', '2020-04-12 16:31:16'),
(4, 'test event', 'dsfasd asdfa sdf as', 'Sylet', '1849365559.jpg', 'image', '2020-11-11', '22:22:17', '2020-11-11', NULL, '22', '12', 1, '2020-04-22 00:00:00', '2020-04-22 16:37:13'),
(5, 'ttt12', 'ttt12', 'tt12', '1587318795.jpg', 'image', '2020-04-23', '00:00:00', '2020-04-23', '01:30:00', '5512', '5512', 1, '2020-04-22 00:00:00', '2020-04-22 15:25:39'),
(6, 'dfg', 'fdsgs', 'dfg', '2100351927.jpg', 'image', '2020-04-15', '01:00:00', '2020-04-15', '01:30:00', '1', '1', 1, '2020-04-22 00:00:00', '2020-04-22 17:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `event_ticket_buyers`
--

CREATE TABLE `event_ticket_buyers` (
  `id` bigint(20) NOT NULL,
  `ref_event_id` int(11) NOT NULL,
  `ref_membership_id` int(11) NOT NULL,
  `buyer_first_name` varchar(100) DEFAULT NULL,
  `buyer_last_name` varchar(100) DEFAULT NULL,
  `payment_type` enum('cash','online payment','others') DEFAULT NULL,
  `total_tickets` int(11) DEFAULT 0,
  `total_price` varchar(10) DEFAULT NULL,
  `event_ticket_buyer_stored_datetime` datetime NOT NULL,
  `event_ticket_buyer_edited_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_ticket_payments`
--

CREATE TABLE `event_ticket_payments` (
  `id` bigint(20) NOT NULL,
  `ref_event_id` bigint(20) NOT NULL,
  `event_ticket_payment_by` enum('PAYPAL','DEBIT_CREDIT_MASTER_CARD','OTHERS') DEFAULT NULL,
  `event_ticket_payment_details` text DEFAULT NULL COMMENT 'it is not defined.it could be the last 4 digit of card number and other information',
  `event_ticket_payment_datetime` datetime NOT NULL,
  `event_ticket_payment_amount` varchar(10) NOT NULL,
  `event_ticket_payment_creating_datetime` datetime NOT NULL,
  `event_ticket_payment_editing_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(10) NOT NULL,
  `user_type_id` int(11) NOT NULL,
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

INSERT INTO `memberships` (`id`, `user_type_id`, `name`, `username`, `password`, `email`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 1, 'sajed4', 'sajed123454w', '$2y$10$Ao65PaqZKaKfBvuCVp5YbeKI4B9sr0k5H7fkCspjfAnuk5ZoiGhzm', 'aaa@aaa.com47lrw', 0, NULL, '2020-03-27 07:45:25', '2020-03-27 07:45:25'),
(30, 2, 'Sajed Ahmed', 'sajedaiub', '$2y$10$fCZ0Uhs8wYzbPVA1xV2wIu8PGkDtr9CRfzPAwVXTdRGCV9xKaaKD2', 'sajedaiub@gmail.com', 1, NULL, '2020-04-22 04:28:28', '2020-04-22 04:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `membership_payments`
--

CREATE TABLE `membership_payments` (
  `id` bigint(20) NOT NULL,
  `ref_membership_id` int(11) NOT NULL,
  `membership_payment_ess` tinyint(4) DEFAULT 0 COMMENT '0 means no,1 means yes',
  `membership_payment_by` enum('PAYPAL','DEBIT_CREDIT_MASTER_CARD','OTHERS') DEFAULT NULL,
  `membership_payment_details` text DEFAULT NULL COMMENT 'it is not defined.it could be the last 4 digit of card number and other information',
  `membership_payment_datetime` datetime NOT NULL,
  `membership_payment_amount` varchar(10) NOT NULL,
  `membership_next_renewal_date` date DEFAULT NULL,
  `membership_payment_creating_datetime` datetime NOT NULL,
  `membership_payment_editing_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_payments`
--

INSERT INTO `membership_payments` (`id`, `ref_membership_id`, `membership_payment_ess`, `membership_payment_by`, `membership_payment_details`, `membership_payment_datetime`, `membership_payment_amount`, `membership_next_renewal_date`, `membership_payment_creating_datetime`, `membership_payment_editing_datetime`) VALUES
(1, 30, 2, 'PAYPAL', 'dsffa sf asdf', '2020-04-21 23:11:07', '150', '2020-04-23', '2020-04-22 23:11:07', '2020-04-22 17:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `member_devices`
--

CREATE TABLE `member_devices` (
  `id` bigint(20) NOT NULL,
  `ref_member_device_membership_id` int(11) NOT NULL,
  `member_device_os_type` enum('android','ios','windows','others','not defined') NOT NULL,
  `member_device_token_id` text NOT NULL,
  `member_device_unique_id` varchar(200) DEFAULT NULL,
  `member_device_storing_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_job_infos`
--

CREATE TABLE `member_job_infos` (
  `id` bigint(20) NOT NULL,
  `ref_member_job_info_membership_id` int(11) NOT NULL,
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
  `member_job_info_editing_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_personal_infos`
--

CREATE TABLE `member_personal_infos` (
  `id` bigint(20) NOT NULL,
  `ref_member_personal_info_membership_id` int(11) NOT NULL,
  `member_first_name` varchar(200) NOT NULL,
  `member_last_name` varchar(200) NOT NULL,
  `member_birth_date` date NOT NULL,
  `member_gender` enum('0','1','2','3') NOT NULL COMMENT '0 means not selected,1 means Male,2 means female,3 means others',
  `member_address` text DEFAULT NULL,
  `member_zip_code` varchar(10) NOT NULL,
  `member_email_address` varchar(500) NOT NULL,
  `member_tax_reg_no` varchar(30) NOT NULL,
  `member_personal_info_creating_datetime` datetime NOT NULL,
  `member_personal_info_editing_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memories`
--

CREATE TABLE `memories` (
  `id` bigint(20) NOT NULL,
  `memories_name` text DEFAULT NULL,
  `memories_details` text DEFAULT NULL,
  `memories_thumb` varchar(100) NOT NULL,
  `memories_created_date_time` datetime NOT NULL,
  `memories_editing_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `memories_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memories`
--

INSERT INTO `memories` (`id`, `memories_name`, `memories_details`, `memories_thumb`, `memories_created_date_time`, `memories_editing_datetime`, `memories_active`) VALUES
(1, 'test22', 'sdf asasf sadf asd asdf', '1884000263.jpg', '2020-04-22 00:00:00', '2020-04-22 18:50:12', 1),
(2, 'test memo2', 'dsfasd fasdfasd22', '268455199.jpg', '2020-04-22 00:00:00', '2020-04-22 18:49:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `memories_photos`
--

CREATE TABLE `memories_photos` (
  `id` bigint(20) NOT NULL,
  `ref_memories_id` bigint(20) NOT NULL,
  `memories_photo_location` varchar(500) NOT NULL,
  `memories_photo_uploaded_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `memories_photo_active` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memories_photos`
--

INSERT INTO `memories_photos` (`id`, `ref_memories_id`, `memories_photo_location`, `memories_photo_uploaded_date_time`, `memories_photo_active`) VALUES
(1, 1, '665372488.jpg', '2020-04-21 18:00:00', 1),
(2, 1, '101512858.png', '2020-04-21 18:00:00', 1),
(3, 1, '1469919530.jpg', '2020-04-21 18:00:00', 1),
(4, 2, '543915611.jpg', '2020-04-21 18:00:00', 1),
(5, 2, '1884056350.png', '2020-04-21 18:00:00', 1),
(6, 2, '610824703.jpg', '2020-04-21 18:00:00', 1),
(7, 2, '1862736882.jpg', '2020-04-21 18:00:00', 1),
(8, 2, '1336090756.png', '2020-04-21 18:00:00', 1),
(9, 2, '479976372.jpg', '2020-04-21 18:00:00', 1),
(10, 2, '9959655.jpg', '2020-04-21 18:00:00', 1),
(11, 1, '907103073.svg', '2020-04-21 18:00:00', 1),
(12, 1, '1017854895.svg', '2020-04-21 18:00:00', 1),
(13, 1, '238165459.jpg', '2020-04-21 18:00:00', 1),
(14, 1, '285726350.ico', '2020-04-21 18:00:00', 1),
(15, 1, '2078712624.jpg', '2020-04-21 18:00:00', 1),
(16, 1, '1062057873.jpg', '2020-04-21 18:00:00', 1),
(17, 1, '1346216627.png', '2020-04-21 18:00:00', 1),
(18, 1, '1772824666.png', '2020-04-21 18:00:00', 1),
(19, 1, '1516610939.png', '2020-04-21 18:00:00', 1),
(20, 1, '484753722.png', '2020-04-21 18:00:00', 1),
(21, 1, '193859432.png', '2020-04-21 18:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `message_details` text DEFAULT NULL,
  `message_active` tinyint(4) DEFAULT 1 COMMENT '1 means active and 0 means not active',
  `message_created_datetime` datetime NOT NULL,
  `message_edited_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('03284a9cb805f814783c3a8a985fdf627bd7daec7683c185ed8dec1627116fe0b1a6c9d9ad4793aa', 22, 3, 'MyApp', '[]', 0, '2020-04-03 15:51:55', '2020-04-03 15:51:55', '2021-04-03 21:51:55'),
('0cc26aea30f13022670368766ae51bd40eac1f6a77885fd684ec89a0754f765c5cb4b0a4fa229b1e', 17, 3, 'MyApp', '[]', 0, '2020-03-27 13:47:00', '2020-03-27 13:47:00', '2021-03-27 19:47:00'),
('14d52f60b404116bb61906e5bef11179ac754761dc09c333c959a9a053c8b681f7b17a9b812ff3bc', 22, 3, 'MyApp', '[]', 0, '2020-04-03 16:28:58', '2020-04-03 16:28:58', '2021-04-03 22:28:58'),
('21721c31e2303db813f4b00b51d6bfab126c36b0f1198011fdd44e5b4374198409a328177b8954bd', 22, 3, 'MyApp', '[]', 0, '2020-04-03 15:21:51', '2020-04-03 15:21:51', '2021-04-03 21:21:51'),
('34e34f2e9c92220e73c5e3b00bbbe69e61941957f581592e5de1f62a9fbf89f23d768a5ff3a3f339', 24, 3, 'MyApp', '[]', 0, '2020-04-03 14:46:55', '2020-04-03 14:46:55', '2021-04-03 20:46:55'),
('4006b1ff24632b3be7e50e90830fb5f95ce195a166ec6b03fbf437e570a01e97b3e7a1cc01baf00a', 18, 3, 'MyApp', '[]', 0, '2020-03-27 14:03:09', '2020-03-27 14:03:09', '2021-03-27 20:03:09'),
('4125a12dd763a0d6abfdb000969b97fece7bf52895e06cc1ce68872326e32f064ea0259ceaee52df', 15, 3, 'TutsForWeb', '[]', 0, '2020-03-27 13:41:24', '2020-03-27 13:41:24', '2021-03-27 19:41:24'),
('4e5837fb51b40dd155b44386d4e3d32474e011033a470258dc8a4433d97f7e85fced35d59d9053c4', 22, 3, 'MyApp', '[]', 0, '2020-03-27 17:19:48', '2020-03-27 17:19:48', '2021-03-27 23:19:48'),
('522416faaa65bdb30cecf0a933e08d474e1b048a5bdc4a455324ea54df2413c6bfffa5240ad37a73', 24, 3, 'MyApp', '[]', 0, '2020-04-04 01:53:28', '2020-04-04 01:53:28', '2021-04-04 07:53:28'),
('5a4591c88667c4fb80967cc7e0f50ba8741961ced7259e18eb7818d3a06257f68da302f155f07193', 24, 3, 'MyApp', '[]', 0, '2020-04-04 01:54:26', '2020-04-04 01:54:26', '2021-04-04 07:54:26'),
('5e17c0becc75d335fb4f44c4219237bc6d08f53f236b1a7e646e2bb12478c617e9f44bbc4a7a4ce1', 14, 3, 'TutsForWeb', '[]', 0, '2020-03-27 13:41:08', '2020-03-27 13:41:08', '2021-03-27 19:41:08'),
('5f1cbaa7a748f3d068095c14d81faabc6288d2443ec00c0c265dc863a773b8b4ba02ce3ec6e66d79', 10, 3, 'TutsForWeb', '[]', 0, '2020-03-27 13:11:23', '2020-03-27 13:11:23', '2021-03-27 19:11:23'),
('69fcd2678c173a530b1029de2e890089a2570dc2abfdc349c460c8aacae60c097fae5a6aaf210b95', 22, 3, 'MyApp', '[]', 0, '2020-03-27 18:24:04', '2020-03-27 18:24:04', '2021-03-28 00:24:04'),
('754ccf1156f299f1c11c0924c9541a99187acdb37095cc96faf768f5ecc4d701feb08e064c3d7457', 22, 3, 'MyApp', '[]', 0, '2020-04-04 00:50:38', '2020-04-04 00:50:38', '2021-04-04 06:50:38'),
('75c67d6d202c0f4cfd55315c6452c87807748758bdbf8dbfb9ff812135df057f292fe5812099b469', 22, 3, 'MyApp', '[]', 0, '2020-04-03 15:19:15', '2020-04-03 15:19:15', '2021-04-03 21:19:15'),
('79129c752d3bd7076fc27e5733b7157301e0a59970aa274176195a94ab8a86739bc0bc3af2f572da', 20, 3, 'MyApp', '[]', 0, '2020-03-27 14:49:14', '2020-03-27 14:49:14', '2021-03-27 20:49:14'),
('7ea6113c006aa2fa4ad290990c10327cb24d71110e701c6c9fdbe937fccbf814bce20e6fa49b28e2', 21, 3, 'MyApp', '[]', 0, '2020-03-27 14:55:03', '2020-03-27 14:55:03', '2021-03-27 20:55:03'),
('97d30ad29f2dbf6b3e690b0d2093e259c7f9136d3dcbcd6f85c8b9cc81384fc548aa67eb0df6fb64', 11, 3, 'TutsForWeb', '[]', 0, '2020-03-27 13:36:56', '2020-03-27 13:36:56', '2021-03-27 19:36:56'),
('9b45acc027d6107267780992952e2c88c01e22242f713c842b3b9326e4fd490acaeb5661e1da4d22', 24, 3, 'MyApp', '[]', 0, '2020-04-04 01:58:28', '2020-04-04 01:58:28', '2021-04-04 07:58:28'),
('a12ef8806d240f7bfc4f298c3444a8bdbb4c98d7173a788ac42b743c005482a35ea43d4f4fa8dc74', 22, 3, 'MyApp', '[]', 0, '2020-03-27 17:18:47', '2020-03-27 17:18:47', '2021-03-27 23:18:47'),
('a9723070afc9f9358b3989d8f98793bcb965125f84a293d407171735665c5b338f5d1d01b8d6bc37', 24, 3, 'MyApp', '[]', 0, '2020-04-11 12:07:29', '2020-04-11 12:07:29', '2021-04-11 18:07:29'),
('b2c54242c374bee89fbec075ebb44c6f8b96506501d4af3eb9dfc0bff9175f6588cadf123698a5f7', 22, 3, 'MyApp', '[]', 0, '2020-04-03 15:21:48', '2020-04-03 15:21:48', '2021-04-03 21:21:48'),
('be564e711bbde41307f4c561bfef51b21ef46349dc6d724a7ce5c1edf1aac135ebc0931b7981d621', 24, 3, 'MyApp', '[]', 0, '2020-04-04 01:57:37', '2020-04-04 01:57:37', '2021-04-04 07:57:37'),
('d0d0b3280751b84a4924e50ac499b76bdd39ca3c1ac4160f635c838a4e1a74fcc828e3c30dafed97', 19, 3, 'MyApp', '[]', 0, '2020-03-27 14:24:14', '2020-03-27 14:24:14', '2021-03-27 20:24:14'),
('d8ebcf54d181e8ea929bc106fdb0ec7d53b0ab209420cbbf855c20ee4141044ba662db3f55e158a4', 22, 3, 'MyApp', '[]', 0, '2020-04-03 15:21:49', '2020-04-03 15:21:49', '2021-04-03 21:21:49'),
('dcbc79c65612d7be1feb33ef4a40d550b2fdae47d066caa910ef93a2150324bb76bb6dfb3b3890be', 24, 3, 'MyApp', '[]', 0, '2020-04-11 12:07:28', '2020-04-11 12:07:28', '2021-04-11 18:07:28'),
('f279b800807692e7185365c5d16d995723fa65e01d4e35cbba022f8e1c90270608928678f02bb849', 12, 3, 'TutsForWeb', '[]', 0, '2020-03-27 13:37:18', '2020-03-27 13:37:18', '2021-03-27 19:37:18'),
('f917b7721c6ec39989653a4009935192fbd9646fd2d20f0e149d52c18bfa0e045b68b341c6a816c8', 16, 3, 'MyApp', '[]', 0, '2020-03-27 13:45:25', '2020-03-27 13:45:25', '2021-03-27 19:45:25'),
('f9ea3e4ee4a092ad9a01b5705c256c45db2d35a675ea914612c4a795eaed14b786851e45ace265aa', 24, 3, 'MyApp', '[]', 0, '2020-04-04 01:58:28', '2020-04-04 01:58:28', '2021-04-04 07:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `organize_address` text DEFAULT NULL,
  `organize_telephone` text DEFAULT NULL,
  `organize_email` varchar(300) DEFAULT NULL,
  `organize_facebook` varchar(300) DEFAULT NULL,
  `organize_instagram` varchar(300) DEFAULT NULL,
  `organize_linkedin` varchar(300) DEFAULT NULL,
  `organize_twitter` varchar(300) DEFAULT NULL,
  `organize_info_created_edited_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `sponsor_details` text DEFAULT NULL,
  `sponsor_address` text DEFAULT NULL,
  `sponsor_email` varchar(300) DEFAULT NULL,
  `sponsor_website` varchar(300) DEFAULT NULL,
  `sponsor_logo_photo` varchar(300) DEFAULT NULL,
  `sponsor_position` int(11) DEFAULT 0,
  `sponsor_created_datetime` datetime NOT NULL,
  `sponsor_edited_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type_name` varchar(50) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type_name`, `active`) VALUES
(1, 'Admin', 1),
(2, 'Member', 1);

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
  ADD KEY `ref_membership_id_2` (`ref_membership_id`);

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
  ADD KEY `ref_membership_id` (`ref_membership_id`),
  ADD KEY `ref_event_id` (`ref_event_id`);

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
  ADD KEY `user_type_id` (`user_type_id`);

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
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board_members`
--
ALTER TABLE `board_members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `board_members_categories`
--
ALTER TABLE `board_members_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `membership_payments`
--
ALTER TABLE `membership_payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_devices`
--
ALTER TABLE `member_devices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `memories_photos`
--
ALTER TABLE `memories_photos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `contact_us_cons` FOREIGN KEY (`ref_membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_ticket_buyers`
--
ALTER TABLE `event_ticket_buyers`
  ADD CONSTRAINT `event_ticket_buyers_ibfk_1` FOREIGN KEY (`ref_event_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_ticket_buyers_ibfk_2` FOREIGN KEY (`ref_membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_ticket_payments`
--
ALTER TABLE `event_ticket_payments`
  ADD CONSTRAINT `event_ticket_payments_ibfk_11` FOREIGN KEY (`ref_event_id`) REFERENCES `event_ticket_buyers` (`id`);

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `user_type_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `membership_payments`
--
ALTER TABLE `membership_payments`
  ADD CONSTRAINT `membership_payments_ibfk_1` FOREIGN KEY (`ref_membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_devices`
--
ALTER TABLE `member_devices`
  ADD CONSTRAINT `member_device_cons` FOREIGN KEY (`ref_member_device_membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_job_infos`
--
ALTER TABLE `member_job_infos`
  ADD CONSTRAINT `member_job_infos_ibfk_1` FOREIGN KEY (`ref_member_job_info_membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_personal_infos`
--
ALTER TABLE `member_personal_infos`
  ADD CONSTRAINT `member_personal_infos_ibfk_1` FOREIGN KEY (`ref_member_personal_info_membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
