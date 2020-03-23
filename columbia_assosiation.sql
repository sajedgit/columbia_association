-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2020 at 10:06 PM
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
(2, 1, 'ss', 'ss', 'ss', 'ss', NULL, 0, 1);

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
(1, 'ddd', 0, 1);

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
  `id` bigint(20) NOT NULL,
  `membership_username` varchar(500) NOT NULL,
  `membership_password_value` varchar(500) NOT NULL,
  `membership_status` enum('0','1','2','3') NOT NULL COMMENT '0 => waiting for approval,1=> approved but waiting for membership fee, 3=>blocked by admin',
  `membership_expired_date` date DEFAULT NULL,
  `membership_creating_datetime` datetime NOT NULL,
  `membership_editing_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `membership_username`, `membership_password_value`, `membership_status`, `membership_expired_date`, `membership_creating_datetime`, `membership_editing_datetime`) VALUES
(1, 'lll', 'aaa', '', NULL, '0000-00-00 00:00:00', '2020-03-21 20:10:38');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `board_members_categories`
--
ALTER TABLE `board_members_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`ref_membership_id`) REFERENCES `memberships` (`id`);

--
-- Constraints for table `event_ticket_buyers`
--
ALTER TABLE `event_ticket_buyers`
  ADD CONSTRAINT `event_ticket_buyers_ibfk_1` FOREIGN KEY (`ref_event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `event_ticket_buyers_ibfk_2` FOREIGN KEY (`ref_membership_id`) REFERENCES `memberships` (`id`);

--
-- Constraints for table `event_ticket_payments`
--
ALTER TABLE `event_ticket_payments`
  ADD CONSTRAINT `event_ticket_payments_ibfk_1` FOREIGN KEY (`ref_event_id`) REFERENCES `event_ticket_buyers` (`id`);

--
-- Constraints for table `membership_payments`
--
ALTER TABLE `membership_payments`
  ADD CONSTRAINT `membership_payments_ibfk_1` FOREIGN KEY (`ref_membership_id`) REFERENCES `memberships` (`id`);

--
-- Constraints for table `member_devices`
--
ALTER TABLE `member_devices`
  ADD CONSTRAINT `member_devices_ibfk_1` FOREIGN KEY (`ref_member_device_membership_id`) REFERENCES `memberships` (`id`);

--
-- Constraints for table `member_job_infos`
--
ALTER TABLE `member_job_infos`
  ADD CONSTRAINT `member_job_infos_ibfk_1` FOREIGN KEY (`ref_member_job_info_membership_id`) REFERENCES `memberships` (`id`);

--
-- Constraints for table `member_personal_infos`
--
ALTER TABLE `member_personal_infos`
  ADD CONSTRAINT `member_personal_infos_ibfk_1` FOREIGN KEY (`ref_member_personal_info_membership_id`) REFERENCES `memberships` (`id`);

--
-- Constraints for table `memories_photos`
--
ALTER TABLE `memories_photos`
  ADD CONSTRAINT `memories_photos_ibfk_1` FOREIGN KEY (`ref_memories_id`) REFERENCES `memories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
