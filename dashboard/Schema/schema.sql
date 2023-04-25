-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 08:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
-- Table structure for table `allowed_emails`
--

CREATE TABLE `allowed_emails` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `domain_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by_user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allowed_emails`
--

INSERT INTO `allowed_emails` (`id`, `domain_name`, `status`, `created_by_user_id`) VALUES
(1, 'gmail.com', 1, 1);

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

--
-- Dumping data for table `deliverables`
--

INSERT INTO `deliverables` (`deliverable_id`, `deliverable_name`, `created_by_admin_id`, `created_at`) VALUES
(1, 'Customer Website', 1, '2023-04-17 12:12:13'),
(2, 'Vendor  Web ', 1, '2023-04-17 12:12:34'),
(3, 'Mobile App - Mobile', 1, '2023-04-18 04:40:45'),
(4, 'Lending Page - Website', 1, '2023-04-18 04:41:47'),
(12, 'Vendor - Mobile', 1, '2023-04-18 11:42:39'),
(13, 'Customer Mobile', 1, '2023-04-19 11:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `deliverable_members`
--

CREATE TABLE `deliverable_members` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_deliverable_id` int(10) UNSIGNED DEFAULT NULL,
  `project_file_assigned_type_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliverable_members`
--

INSERT INTO `deliverable_members` (`user_id`, `project_deliverable_id`, `project_file_assigned_type_id`, `created_at`) VALUES
(8, 6, 1, '2023-04-21 12:34:02'),
(9, 16, 1, '2023-04-22 07:59:37'),
(10, 17, 1, '2023-04-22 07:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `deliverable_member_files`
--

CREATE TABLE `deliverable_member_files` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL,
  `project_deliverable_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(10) UNSIGNED NOT NULL,
  `project_deliverable_id` int(10) UNSIGNED DEFAULT NULL,
  `file_type` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'filetype for main file or varient',
  `uploaded_by_user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `project_deliverable_id`, `file_type`, `uploaded_by_user_id`) VALUES
(13, 6, 1, 1),
(14, 6, 1, 1),
(15, 6, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `files_varient`
--

CREATE TABLE `files_varient` (
  `main_file_id` int(10) UNSIGNED NOT NULL,
  `varient_file_id` int(10) UNSIGNED NOT NULL,
  `project_deliverable_id` int(10) UNSIGNED DEFAULT NULL
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
  `folder_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_varients`
--

INSERT INTO `image_varients` (`file_id`, `image_url`, `name`, `size`, `width`, `height`, `thumbnail_url`, `folder_id`, `created_at`) VALUES
(13, '/project-logo/7e72a9cc-fcd0-4acb-9f14-baeda0fe9dcc.png', 'asd', '0.56789779663086', '5974', '3208', '/project-logo/7e72a9cc-fcd0-4acb-9f14-baeda0fe9dcc.png', NULL, '2023-04-21 11:53:44'),
(14, '/project-logo/02d6c1c1-ebc5-436c-a92e-5f03c079f511.png', 'asd', '0.27659797668457', '933', '1927', '/project-logo/02d6c1c1-ebc5-436c-a92e-5f03c079f511.png', NULL, '2023-04-21 12:04:59'),
(15, '/project-logo/83c77d22-0d57-405f-97a4-35314fb44f96.jpg', 'Avatar', '0.017688751220703', '640', '640', '/project-logo/83c77d22-0d57-405f-97a4-35314fb44f96.jpg', NULL, '2023-04-21 12:29:46');

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
(67, 'view_task', '2023-04-14 16:07:14'),
(68, 'view_deliverable', '2023-04-17 11:14:57'),
(69, 'create_deliverable', '2023-04-17 11:14:57'),
(70, 'update_deliverable', '2023-04-17 11:14:57'),
(71, 'view_team', '2023-04-17 11:14:57'),
(72, 'create_team', '2023-04-17 11:14:57'),
(73, 'update_team', '2023-04-17 11:14:57'),
(74, 'view_ticket_reason', '2023-04-17 11:14:57'),
(75, 'create_ticket_reason', '2023-04-17 11:14:57'),
(76, 'update_ticket_reason', '2023-04-17 11:14:57'),
(77, 'view_files', '2023-04-17 11:14:57'),
(78, 'create_files', '2023-04-17 11:14:57'),
(79, 'update_files', '2023-04-17 11:14:57'),
(80, 'view_profile', '2023-04-17 11:14:57'),
(81, 'create_profile', '2023-04-17 11:14:57'),
(82, 'update_profile', '2023-04-17 11:14:57');

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
  `is_archive` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `created_by_admin_id`, `logo_url`, `name`, `description`, `project_status_id`, `is_archive`, `created_at`, `updated_at`) VALUES
(58, 1, '/project-logo/cfef9147-d0d5-4188-aa56-3aac85cc0f4b.png', 'Courtney Merritt', 'Excepturi iste dolor', 1, 0, '2023-04-21 11:06:18', '2023-04-21 11:06:18'),
(59, 1, '/project-logo/cc14a9a5-c3b9-4881-be35-cd64b955f2aa.png', 'Ulla Jimenez', 'Enim expedita offici', 1, 0, '2023-04-21 11:35:12', '2023-04-21 11:35:12'),
(60, 1, '/project-logo/15fa1dc2-f083-40f2-a8a5-2df623d58c93.png', 'Ivor Mcpherson', 'Aperiam magni exerci', 1, 0, '2023-04-21 12:32:15', '2023-04-21 12:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `project_deliverables`
--

CREATE TABLE `project_deliverables` (
  `project_deliverable_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `deliverable_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_deliverables`
--

INSERT INTO `project_deliverables` (`project_deliverable_id`, `project_id`, `deliverable_id`) VALUES
(6, 58, 12),
(7, 58, 13),
(8, 59, 1),
(9, 59, 2),
(10, 59, 3),
(11, 59, 4),
(12, 59, 12),
(13, 59, 13),
(14, 60, 1),
(15, 60, 2),
(16, 60, 3),
(17, 60, 4),
(18, 60, 12),
(19, 60, 13);

-- --------------------------------------------------------

--
-- Table structure for table `project_file_assigned_types`
--

CREATE TABLE `project_file_assigned_types` (
  `project_file_assigned_type_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_file_assigned_types`
--

INSERT INTO `project_file_assigned_types` (`project_file_assigned_type_id`, `name`) VALUES
(1, 'ALL'),
(2, 'CUSTOM');

-- --------------------------------------------------------

--
-- Table structure for table `project_status`
--

CREATE TABLE `project_status` (
  `project_status_id` tinyint(3) UNSIGNED NOT NULL,
  `project_status_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_status`
--

INSERT INTO `project_status` (`project_status_id`, `project_status_type_name`) VALUES
(1, 'active'),
(2, 'inactive');

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
(1, '2023-04-14 10:44:18'),
(7, '2023-04-20 17:30:53'),
(8, '2023-04-20 17:31:30'),
(9, '2023-04-20 17:32:21'),
(10, '2023-04-20 17:32:26'),
(11, '2023-04-20 17:33:16'),
(12, '2023-04-20 17:33:19'),
(19, '2023-04-20 17:45:37'),
(25, '2023-04-20 17:49:01'),
(31, '2023-04-20 17:54:47'),
(33, '2023-04-21 12:52:17');

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
(1, 65, 1),
(1, 66, 1),
(1, 67, 1),
(1, 68, 1),
(1, 69, 1),
(1, 70, 1),
(1, 71, 1),
(1, 72, 1),
(1, 73, 1),
(1, 74, 1),
(1, 75, 1),
(1, 76, 1),
(1, 77, 1),
(1, 78, 1),
(1, 79, 1),
(1, 80, 1),
(1, 81, 1),
(1, 82, 1),
(19, 40, 0),
(19, 41, 0),
(19, 43, 0),
(19, 44, 0),
(19, 48, 0),
(19, 49, 0),
(19, 50, 0),
(19, 51, 0),
(19, 52, 0),
(19, 53, 0),
(19, 54, 0),
(19, 58, 0),
(19, 59, 0),
(19, 60, 0),
(19, 71, 0),
(19, 72, 0),
(19, 73, 0),
(25, 40, 0),
(25, 41, 0),
(25, 43, 0),
(25, 44, 0),
(25, 48, 0),
(25, 49, 0),
(25, 50, 0),
(25, 51, 0),
(25, 52, 0),
(25, 53, 0),
(25, 54, 0),
(25, 58, 0),
(25, 59, 0),
(25, 60, 0),
(25, 71, 0),
(25, 72, 0),
(25, 73, 0),
(31, 40, 0),
(31, 41, 0),
(31, 43, 0),
(31, 44, 0),
(31, 48, 0),
(31, 49, 0),
(31, 50, 0),
(31, 51, 0),
(31, 52, 0),
(31, 53, 0),
(31, 54, 0),
(31, 58, 0),
(31, 59, 0),
(31, 60, 0),
(31, 71, 0),
(31, 72, 0),
(31, 73, 0),
(33, 39, 0),
(33, 40, 0),
(33, 41, 0),
(33, 42, 1),
(33, 43, 1),
(33, 44, 1),
(33, 45, 0),
(33, 46, 0),
(33, 47, 0),
(33, 48, 1),
(33, 49, 1),
(33, 50, 1),
(33, 51, 1),
(33, 52, 1),
(33, 53, 1),
(33, 54, 1),
(33, 55, 0),
(33, 56, 0),
(33, 57, 0),
(33, 58, 1),
(33, 59, 0),
(33, 60, 1),
(33, 61, 1),
(33, 62, 0),
(33, 63, 0),
(33, 64, 0),
(33, 65, 0),
(33, 66, 0),
(33, 67, 1),
(33, 68, 1),
(33, 69, 1),
(33, 70, 1),
(33, 71, 1),
(33, 72, 1),
(33, 73, 1),
(33, 74, 0),
(33, 75, 0),
(33, 76, 0),
(33, 77, 0),
(33, 78, 0),
(33, 79, 0),
(33, 80, 0),
(33, 81, 0),
(33, 82, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_types`
--

CREATE TABLE `task_types` (
  `task_type_id` smallint(5) UNSIGNED NOT NULL,
  `task_type_name` varchar(30) NOT NULL,
  `created_by_user_id` int(10) UNSIGNED NOT NULL,
  `task_type_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_types`
--

INSERT INTO `task_types` (`task_type_id`, `task_type_name`, `created_by_user_id`, `task_type_status`) VALUES
(1, 'test1', 1, 0),
(2, 'Unable to Upload Image', 1, 1),
(3, 'Backend - Task', 1, 1);

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

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `created_by_admin_id`, `team_name`, `created_at`) VALUES
(4, 1, 'Marketing', '2023-04-18 05:27:41'),
(5, 1, 'Flutter', '2023-04-18 05:35:02'),
(6, 1, 'FrontEnd 2', '2023-04-18 11:26:47'),
(7, 1, 'Ui/Ux', '2023-04-18 11:28:09'),
(8, 1, 'PHP', '2023-04-18 11:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `team_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`team_id`, `user_id`) VALUES
(7, 8),
(8, 9),
(8, 10);

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
  `created_by_user_id` int(10) UNSIGNED NOT NULL,
  `reason_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_reasons`
--

INSERT INTO `ticket_reasons` (`reason_id`, `content`, `created_by_user_id`, `reason_status`) VALUES
(1, 'Unable To Upload', 1, 0),
(2, 'Check Test', 1, 1),
(3, 'asd', 1, 1);

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
(1, 'Pritesh', 'Y', 'pritesh@mail.com', 'Pritesh4@', 'i am admin.', 1, 1, '2023-04-14 05:24:42', '2023-04-14 05:24:42'),
(8, 'Maite', 'Joseph', 'xytil@gmail.com', 'Pa$$w0rd!', 'Omnis laboris nihil', 1, 11, '2023-04-21 06:46:43', '2023-04-21 06:46:43'),
(9, 'Aadrash', 'halder', 'abc123@gmail.com', 'Pritesh4@', 'i am php developer', 1, 25, '2023-04-21 07:16:47', '2023-04-21 07:16:47'),
(10, 'Autumn', 'Parker', 'admin@gmail.com', 'Pritesh4@', 'Mollitia quam distin', 1, 1, '2023-04-21 12:29:07', '2023-04-21 12:29:07');

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
  `user_type` varchar(50) NOT NULL,
  `role_id` smallint(5) UNSIGNED DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_type`, `role_id`, `created_on`) VALUES
(1, 'admin', 1, '2023-04-14 05:22:24'),
(11, 'user', 19, '2023-04-20 12:15:37'),
(17, 'asd', 25, '2023-04-20 12:19:01'),
(23, 'asdasd', 31, '2023-04-20 12:24:47'),
(25, 'uploader', 33, '2023-04-21 07:22:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_status`
--
ALTER TABLE `account_status`
  ADD PRIMARY KEY (`account_status_id`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_file_assigned_type_id` (`project_file_assigned_type_id`),
  ADD KEY `project_deliverable_id` (`project_deliverable_id`);

--
-- Indexes for table `deliverable_member_files`
--
ALTER TABLE `deliverable_member_files`
  ADD KEY `deliverable_member_files_ibfk_1` (`user_id`),
  ADD KEY `deliverable_member_files_ibfk_2` (`file_id`),
  ADD KEY `project_deliverable_id` (`project_deliverable_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `uploaded_by_user_id` (`uploaded_by_user_id`),
  ADD KEY `project_deliverable_id` (`project_deliverable_id`);

--
-- Indexes for table `files_varient`
--
ALTER TABLE `files_varient`
  ADD UNIQUE KEY `main_file_id` (`main_file_id`,`varient_file_id`),
  ADD KEY `files_varient_files_ibfk_2` (`varient_file_id`),
  ADD KEY `project_deliverable_id` (`project_deliverable_id`);

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
  ADD PRIMARY KEY (`project_deliverable_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `deliverable_id` (`deliverable_id`);

--
-- Indexes for table `project_file_assigned_types`
--
ALTER TABLE `project_file_assigned_types`
  ADD PRIMARY KEY (`project_file_assigned_type_id`);

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
-- Indexes for table `task_types`
--
ALTER TABLE `task_types`
  ADD PRIMARY KEY (`task_type_id`),
  ADD KEY `created_by_user_id` (`created_by_user_id`);

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
  ADD UNIQUE KEY `created_on` (`created_on`),
  ADD UNIQUE KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_status`
--
ALTER TABLE `account_status`
  MODIFY `account_status_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `allowed_emails`
--
ALTER TABLE `allowed_emails`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deliverables`
--
ALTER TABLE `deliverables`
  MODIFY `deliverable_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `project_deliverables`
--
ALTER TABLE `project_deliverables`
  MODIFY `project_deliverable_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `project_file_assigned_types`
--
ALTER TABLE `project_file_assigned_types`
  MODIFY `project_file_assigned_type_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_status`
--
ALTER TABLE `project_status`
  MODIFY `project_status_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `task_types`
--
ALTER TABLE `task_types`
  MODIFY `task_type_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_reasons`
--
ALTER TABLE `ticket_reasons`
  MODIFY `reason_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `ticket_status_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  ADD CONSTRAINT `deliverable_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `deliverable_members_ibfk_3` FOREIGN KEY (`project_file_assigned_type_id`) REFERENCES `project_file_assigned_types` (`project_file_assigned_type_id`),
  ADD CONSTRAINT `deliverable_members_ibfk_4` FOREIGN KEY (`project_deliverable_id`) REFERENCES `project_deliverables` (`project_deliverable_id`);

--
-- Constraints for table `deliverable_member_files`
--
ALTER TABLE `deliverable_member_files`
  ADD CONSTRAINT `deliverable_member_files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `deliverable_member_files_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`),
  ADD CONSTRAINT `deliverable_member_files_ibfk_3` FOREIGN KEY (`project_deliverable_id`) REFERENCES `project_deliverables` (`project_deliverable_id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`uploaded_by_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `files_ibfk_3` FOREIGN KEY (`project_deliverable_id`) REFERENCES `project_deliverables` (`project_deliverable_id`);

--
-- Constraints for table `files_varient`
--
ALTER TABLE `files_varient`
  ADD CONSTRAINT `files_varient_files_ibfk_1` FOREIGN KEY (`main_file_id`) REFERENCES `files` (`file_id`),
  ADD CONSTRAINT `files_varient_files_ibfk_2` FOREIGN KEY (`varient_file_id`) REFERENCES `files` (`file_id`),
  ADD CONSTRAINT `files_varient_ibfk_1` FOREIGN KEY (`project_deliverable_id`) REFERENCES `project_deliverables` (`project_deliverable_id`);

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
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `role_permission_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`);

--
-- Constraints for table `task_types`
--
ALTER TABLE `task_types`
  ADD CONSTRAINT `task_types_ibfk_1` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`user_id`);

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
