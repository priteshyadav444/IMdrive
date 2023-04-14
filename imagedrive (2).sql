-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 07:09 PM
-- Server version: 10.4.27-MariaDB-log
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imagedrive`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_status`
--

CREATE TABLE `account_status` (
  `account_status_id` tinyint(3) UNSIGNED NOT NULL,
  `account_status_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_status`
--

INSERT INTO `account_status` (`account_status_id`, `account_status_type_name`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allowed_emails`
--

CREATE TABLE `allowed_emails` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `domain_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by_user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliverables`
--

CREATE TABLE `deliverables` (
  `deliverable_id` int(10) UNSIGNED NOT NULL,
  `deliverable_name` varchar(60) NOT NULL,
  `created_by_admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliverable_members`
--

CREATE TABLE `deliverable_members` (
  `deliverable_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_file_assigned_type_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(10) UNSIGNED NOT NULL,
  `deliverable_id` int(10) UNSIGNED NOT NULL,
  `uploaded_by_user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(10) UNSIGNED NOT NULL,
  `deliverable_id` int(10) UNSIGNED NOT NULL,
  `path` varchar(100) NOT NULL,
  `folder_name` varchar(60) NOT NULL,
  `created_by_user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_varients`
--

CREATE TABLE `image_varients` (
  `file_id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `name` varchar(60) NOT NULL,
  `size` varchar(30) NOT NULL,
  `width` varchar(20) NOT NULL,
  `height` varchar(20) NOT NULL,
  `thumbnail_url` varchar(100) NOT NULL,
  `folder_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `name`, `created_on`) VALUES
(39, 'view_user', '2023-04-13 15:18:49'),
(40, 'create_user', '2023-04-13 15:18:49'),
(41, 'update_user', '2023-04-13 15:18:49'),
(42, 'view_project', '2023-04-13 15:18:49'),
(43, 'create_project', '2023-04-13 15:18:49'),
(44, 'update_project', '2023-04-13 15:18:49'),
(45, 'view_drive', '2023-04-13 15:18:49'),
(46, 'create_drive', '2023-04-13 15:18:49'),
(47, 'update_drive', '2023-04-13 15:18:49'),
(48, 'view_task_log', '2023-04-13 15:18:49'),
(49, 'view_roles_permission', '2023-04-13 15:18:49'),
(50, 'create_roles_permission', '2023-04-13 15:18:49'),
(51, 'update_roles_permission', '2023-04-13 15:18:49'),
(52, 'view_ticket', '2023-04-13 15:18:49'),
(53, 'create_ticket', '2023-04-13 15:18:49'),
(54, 'update_ticket', '2023-04-13 15:18:49'),
(55, 'view_ticket_managment', '2023-04-13 15:18:49'),
(56, 'create_ticket_managment', '2023-04-13 15:18:49'),
(57, 'update_ticket_managment', '2023-04-13 15:18:49'),
(58, 'view_setting', '2023-04-13 15:18:49'),
(59, 'create_setting', '2023-04-13 15:18:49'),
(60, 'update_setting', '2023-04-13 15:18:49'),
(61, 'view_dashboard', '2023-04-14 15:48:37'),
(62, 'view_master', '2023-04-14 16:02:33'),
(63, 'create_master', '2023-04-14 16:02:33'),
(64, 'update_master', '2023-04-14 16:02:50'),
(65, 'create_task', '2023-04-14 16:07:03'),
(66, 'update_task', '2023-04-14 16:07:03'),
(67, 'view_task', '2023-04-14 16:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_by_admin_id` int(10) UNSIGNED NOT NULL,
  `logo_url` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `project_status_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_deliverables`
--

CREATE TABLE `project_deliverables` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `deliverable_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_file_assigned_types`
--

CREATE TABLE `project_file_assigned_types` (
  `project_file_assigned_type_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_file_assigned_type_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_member_files`
--

CREATE TABLE `project_member_files` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_status`
--

CREATE TABLE `project_status` (
  `project_status_id` tinyint(3) UNSIGNED NOT NULL,
  `project_status_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` smallint(5) UNSIGNED NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `created_on`) VALUES
(1, '2023-04-14 10:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `role_id` smallint(5) UNSIGNED NOT NULL,
  `permission_id` smallint(5) UNSIGNED NOT NULL,
  `permission_value` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`role_id`, `permission_id`, `permission_value`) VALUES
(1, 39, 1),
(1, 40, 1),
(1, 41, 1),
(1, 42, 1),
(1, 43, 1),
(1, 44, 1),
(1, 45, 1),
(1, 46, 1),
(1, 47, 1),
(1, 48, 1),
(1, 49, 1),
(1, 50, 1),
(1, 51, 1),
(1, 52, 1),
(1, 53, 1),
(1, 54, 1),
(1, 55, 1),
(1, 56, 1),
(1, 57, 1),
(1, 58, 1),
(1, 59, 1),
(1, 60, 1),
(1, 61, 1),
(1, 62, 1),
(1, 63, 1),
(1, 64, 1),
(1, 65, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(10) UNSIGNED NOT NULL,
  `created_by_admin_id` int(10) UNSIGNED NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `team_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `created_by_user_id` int(10) UNSIGNED NOT NULL,
  `reason_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ticket_status_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_reasons`
--

CREATE TABLE `ticket_reasons` (
  `reason_id` tinyint(3) UNSIGNED NOT NULL,
  `content` varchar(60) NOT NULL,
  `created_by_user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status`
--

CREATE TABLE `ticket_status` (
  `ticket_status_id` tinyint(3) UNSIGNED NOT NULL,
  `ticket_status_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `account_status_id` tinyint(3) UNSIGNED NOT NULL,
  `user_role_id` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `description`, `account_status_id`, `user_role_id`, `created_at`, `updated_at`) VALUES
(1, 'Pritesh', 'Y', 'pritesh@mail.com', 'Pritesh4@', 'i am admin.', 1, 1, '2023-04-14 05:24:42', '2023-04-14 05:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_images`
--

CREATE TABLE `user_profile_images` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `profile_image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` smallint(6) NOT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `role_id` smallint(5) UNSIGNED DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_type`, `role_id`, `created_on`) VALUES
(1, 'admin', 1, '2023-04-14 05:22:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_status`
--
ALTER TABLE `account_status`
  ADD PRIMARY KEY (`account_status_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `allowed_emails`
--
ALTER TABLE `allowed_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_user_id` (`created_by_user_id`);

--
-- Indexes for table `deliverables`
--
ALTER TABLE `deliverables`
  ADD PRIMARY KEY (`deliverable_id`),
  ADD KEY `created_by_admin_id` (`created_by_admin_id`);

--
-- Indexes for table `deliverable_members`
--
ALTER TABLE `deliverable_members`
  ADD KEY `deliverable_id` (`deliverable_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_file_assigned_type_id` (`project_file_assigned_type_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `deliverable_id` (`deliverable_id`),
  ADD KEY `uploaded_by_user_id` (`uploaded_by_user_id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliverable_id` (`deliverable_id`),
  ADD KEY `created_by_user_id` (`created_by_user_id`);

--
-- Indexes for table `image_varients`
--
ALTER TABLE `image_varients`
  ADD KEY `file_id` (`file_id`),
  ADD KEY `folder_id` (`folder_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `project_status_id` (`project_status_id`),
  ADD KEY `created_by_admin_id` (`created_by_admin_id`);

--
-- Indexes for table `project_deliverables`
--
ALTER TABLE `project_deliverables`
  ADD KEY `project_id` (`project_id`),
  ADD KEY `deliverable_id` (`deliverable_id`);

--
-- Indexes for table `project_file_assigned_types`
--
ALTER TABLE `project_file_assigned_types`
  ADD PRIMARY KEY (`project_file_assigned_type_id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_file_assigned_type_id` (`project_file_assigned_type_id`);

--
-- Indexes for table `project_member_files`
--
ALTER TABLE `project_member_files`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `project_status`
--
ALTER TABLE `project_status`
  ADD PRIMARY KEY (`project_status_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD UNIQUE KEY `role_id` (`role_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `created_by_admin_id` (`created_by_admin_id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD KEY `team_id` (`team_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `created_by_user_id` (`created_by_user_id`),
  ADD KEY `reason_id` (`reason_id`),
  ADD KEY `ticket_status_id` (`ticket_status_id`);

--
-- Indexes for table `ticket_reasons`
--
ALTER TABLE `ticket_reasons`
  ADD PRIMARY KEY (`reason_id`),
  ADD KEY `created_by_user_id` (`created_by_user_id`);

--
-- Indexes for table `ticket_status`
--
ALTER TABLE `ticket_status`
  ADD PRIMARY KEY (`ticket_status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `account_status_id` (`account_status_id`),
  ADD KEY `user_role_id` (`user_role_id`);

--
-- Indexes for table `user_profile_images`
--
ALTER TABLE `user_profile_images`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_type` (`user_type`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_status`
--
ALTER TABLE `account_status`
  MODIFY `account_status_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allowed_emails`
--
ALTER TABLE `allowed_emails`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliverables`
--
ALTER TABLE `deliverables`
  MODIFY `deliverable_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_file_assigned_types`
--
ALTER TABLE `project_file_assigned_types`
  MODIFY `project_file_assigned_type_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_status`
--
ALTER TABLE `project_status`
  MODIFY `project_status_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_reasons`
--
ALTER TABLE `ticket_reasons`
  MODIFY `reason_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `ticket_status_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allowed_emails`
--
ALTER TABLE `allowed_emails`
  ADD CONSTRAINT `allowed_emails_ibfk_1` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `deliverables`
--
ALTER TABLE `deliverables`
  ADD CONSTRAINT `deliverables_ibfk_1` FOREIGN KEY (`created_by_admin_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `deliverable_members`
--
ALTER TABLE `deliverable_members`
  ADD CONSTRAINT `deliverable_members_ibfk_1` FOREIGN KEY (`deliverable_id`) REFERENCES `deliverables` (`deliverable_id`),
  ADD CONSTRAINT `deliverable_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `deliverable_members_ibfk_3` FOREIGN KEY (`project_file_assigned_type_id`) REFERENCES `project_file_assigned_types` (`project_file_assigned_type_id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`deliverable_id`) REFERENCES `deliverables` (`deliverable_id`),
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`uploaded_by_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_ibfk_1` FOREIGN KEY (`deliverable_id`) REFERENCES `deliverables` (`deliverable_id`),
  ADD CONSTRAINT `folders_ibfk_2` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `image_varients`
--
ALTER TABLE `image_varients`
  ADD CONSTRAINT `image_varients_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`),
  ADD CONSTRAINT `image_varients_ibfk_2` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`project_status_id`) REFERENCES `project_status` (`project_status_id`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`created_by_admin_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `project_deliverables`
--
ALTER TABLE `project_deliverables`
  ADD CONSTRAINT `project_deliverables_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
  ADD CONSTRAINT `project_deliverables_ibfk_2` FOREIGN KEY (`deliverable_id`) REFERENCES `deliverables` (`deliverable_id`);

--
-- Constraints for table `project_members`
--
ALTER TABLE `project_members`
  ADD CONSTRAINT `project_members_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`),
  ADD CONSTRAINT `project_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `project_members_ibfk_3` FOREIGN KEY (`project_file_assigned_type_id`) REFERENCES `project_file_assigned_types` (`project_file_assigned_type_id`);

--
-- Constraints for table `project_member_files`
--
ALTER TABLE `project_member_files`
  ADD CONSTRAINT `project_member_files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `project_member_files_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`);

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `role_permission_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_3` FOREIGN KEY (`created_by_admin_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `teams_ibfk_4` FOREIGN KEY (`created_by_admin_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`),
  ADD CONSTRAINT `team_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`reason_id`) REFERENCES `ticket_reasons` (`reason_id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`ticket_status_id`) REFERENCES `ticket_status` (`ticket_status_id`);

--
-- Constraints for table `ticket_reasons`
--
ALTER TABLE `ticket_reasons`
  ADD CONSTRAINT `ticket_reasons_ibfk_1` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_5` FOREIGN KEY (`account_status_id`) REFERENCES `account_status` (`account_status_id`),
  ADD CONSTRAINT `users_ibfk_6` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`),
  ADD CONSTRAINT `users_ibfk_7` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_profile_images`
--
ALTER TABLE `user_profile_images`
  ADD CONSTRAINT `user_profile_images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
