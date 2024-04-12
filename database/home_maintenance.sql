-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 07:19 PM
-- Server version: 8.0.35
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_maintenance`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int NOT NULL,
  `answer` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `answer`) VALUES
(1, 'gladys'),
(2, 'gladys'),
(3, 'AWING'),
(4, 'achimmota'),
(5, 'Blessing'),
(6, 'Yaounde'),
(7, 'etougebe'),
(8, 'gladys'),
(9, 'bamenda'),
(10, 'achimota'),
(11, 'gladys'),
(12, 'bamenda'),
(13, 'achimota'),
(14, 'gladys'),
(15, 'bamenda'),
(16, 'achimota'),
(17, 'gladys'),
(18, 'bamenda'),
(19, 'achimota'),
(20, 'gladys'),
(21, 'bamenda'),
(22, 'achimota'),
(23, 'gladys'),
(24, 'bamenda'),
(25, 'achimota'),
(26, 'gladys'),
(27, 'bamenda'),
(28, 'achimota'),
(29, 'gladys'),
(30, 'bamenda'),
(31, 'achimota'),
(32, 'gladys'),
(33, 'bamenda'),
(34, 'achimota'),
(35, 'gladys'),
(36, 'bamenda'),
(37, 'achimota'),
(38, 'gladys'),
(39, 'bamenda'),
(40, 'achimota'),
(41, 'gladys'),
(42, 'bamenda'),
(43, 'achimota'),
(44, 'Ethel'),
(45, 'Yaounde'),
(46, 'PEUPLET'),
(47, 'divine'),
(48, 'kribi'),
(49, 'peace home'),
(50, 'divine'),
(51, 'kribi'),
(52, 'peace home'),
(53, 'felicia '),
(54, 'AWING'),
(55, 'trinity'),
(56, 'Gladys'),
(57, 'yaounde'),
(58, 'zwalolete');

-- --------------------------------------------------------

--
-- Table structure for table `frequency`
--

CREATE TABLE `frequency` (
  `id` int NOT NULL,
  `frequency_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `frequency`
--

INSERT INTO `frequency` (`id`, `frequency_name`) VALUES
(1, 'yearly'),
(2, 'Monthly'),
(3, 'Quarterly');

-- --------------------------------------------------------

--
-- Table structure for table `homemaintenanceplans`
--

CREATE TABLE `homemaintenanceplans` (
  `plan_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `frequency` int DEFAULT NULL,
  `Details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `cid` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pending',
  `status_changed_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homemaintenanceplans`
--

INSERT INTO `homemaintenanceplans` (`plan_id`, `user_id`, `pid`, `start_date`, `end_date`, `frequency`, `Details`, `cid`, `status`, `status_changed_by`) VALUES
(2, 5, 1, '2024-04-06', '2024-08-27', 1, 'clear the sinks', 3, 'Pending', NULL),
(3, 5, 2, '2024-04-06', '2024-08-27', 1, 'no', 3, 'Pending', NULL),
(7, 5, 2, '2024-05-01', '2040-10-12', 2, 'yes be very punctual', 2, 'Accepted', 17);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `notification_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `notification_date` date DEFAULT NULL,
  `message` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int NOT NULL,
  `planName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `planName`) VALUES
(1, 'Basic Plan'),
(2, 'Standard Plan'),
(3, 'Premium Plan');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionId` int NOT NULL,
  `questionText` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionId`, `questionText`) VALUES
(1, 'What is your mother\'s maiden name?'),
(2, 'In what city were you born?'),
(3, 'What is the name of your first elementary school?');

-- --------------------------------------------------------

--
-- Table structure for table `q_arelation`
--

CREATE TABLE `q_arelation` (
  `UserId` int DEFAULT NULL,
  `q_aid` int NOT NULL,
  `q_id` int DEFAULT NULL,
  `ansid` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `q_arelation`
--

INSERT INTO `q_arelation` (`UserId`, `q_aid`, `q_id`, `ansid`) VALUES
(4, 2, 2, 3),
(5, 5, 2, 6),
(17, 42, 3, 43),
(18, 43, 1, 44),
(20, 51, 3, 52),
(21, 54, 3, 55);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `provider_id` int DEFAULT NULL,
  `review_text` text COLLATE utf8mb4_general_ci,
  `review_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `provider_id`, `review_text`, `review_date`) VALUES
(1, 5, 17, 'very respectful', '2024-04-08 20:14:40'),
(2, 5, 17, 'very nice', '2024-04-08 20:15:51'),
(3, 5, 17, 'very disrespectful and rude!', '2024-04-08 20:38:20'),
(4, 5, 17, 'very disrepectful', '2024-04-08 20:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `role_name`) VALUES
(2, 'Housekeeper'),
(3, 'Service Provider');

-- --------------------------------------------------------

--
-- Table structure for table `servicecategories`
--

CREATE TABLE `servicecategories` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicecategories`
--

INSERT INTO `servicecategories` (`category_id`, `category_name`, `description`) VALUES
(1, 'plumbering', 'Includes services related to plumbing such as repairs, installations, and maintenance of pipes, fixtures, and fittings.'),
(2, 'Electrical', 'Includes services related to electrical systems such as wiring, installations, repairs, and maintenance of electrical components.'),
(3, 'appliance repair', 'Includes services related to appliance repair such as fixing appliances like washing machines, refrigerators, and ovens.'),
(4, 'carpentary', 'Includes services related to carpentry such as woodworking, cabinetry, furniture repair, and installation of wooden structures.'),
(5, 'security systems', 'Includes services related to security systems such as installation and maintenance of security cameras and alarms.'),
(6, 'Home renovation', 'Includes services related to home renovation such as remodeling and upgrading existing homes.');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequests`
--

CREATE TABLE `servicerequests` (
  `request_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `preferred_timing` int DEFAULT NULL,
  `special_instructions` text COLLATE utf8mb4_general_ci,
  `emergency` int DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pending',
  `status_changed_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicerequests`
--

INSERT INTO `servicerequests` (`request_id`, `user_id`, `category_id`, `request_date`, `preferred_timing`, `special_instructions`, `emergency`, `address`, `phone_number`, `status`, `status_changed_by`) VALUES
(9, 5, 2, '2024-04-13', 2, 'install Led bulbs', 0, '1', '+233549059192', 'Pending', NULL),
(10, 5, 2, '2024-04-18', 1, 'house wiring', 1, '1', '+233549059192', 'Accepted', 17),
(11, 5, 2, '2024-04-13', 1, 'change house switches', 1, '1', '+233549059192', 'Accepted', 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `roleId` int DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `phone_number`, `address`, `roleId`, `fname`, `lname`, `gender`, `category_id`) VALUES
(4, 'florenceforchu379@gmail.com', '$2y$10$27syrVC8tSUY28w8lDQzdeXlQ8EBIETOUmD8YsKqHSQHwGGQFklnW', '+233549059192', 'Government Technical School Widikum – Bamenda,Cameroon', 2, 'Public', 'service', 'Male', NULL),
(5, 'hannahpohmah@gmail.com', '$2y$10$6cVpz9Z0NAgCP/qbcKb5TO6DFlpk3azUHIAWN2m8MC1/PWA4ZUdAi', '+233549059192', '1 University Avenue, Berekuso', 2, 'Pohmah', 'Hannah', 'Male', NULL),
(17, 'Haniaworks@gmail.com', '$2y$10$Llvk087iaGEACDP2JE4L2OJZNVXs55YDZIDkE7riYr9CNLrOC2s2.', '0549059192', 'etougebe', 3, 'blessing', 'eileen', 'Male', 2),
(18, 'luciekonlack@gmail.com', '$2y$10$HXAXHZIzTfNXjG2g5TFKUebKDisr8eTucso2zVjwIEiyevnJFVEEK', '0549059192', 'etougebe', 3, 'Leslie', 'noamie', 'Male', 5),
(20, 'joelMbafor@gmail.com', '$2y$10$pW0Gav3657qmz7/Zdttmwup8X8mOmqgHUuLzhKydrgQwqPJghyt.m', '+237675753794', 'Douala', 3, 'Joelo', 'Mbafor', '', 4),
(21, 'joshua@gmail.com', '$2y$10$NRZeiHLMlhLq2DTwMCg6yuPNMB7BCJSF0tuNHh2GQW31n0p5iASXy', '+237674275397', 'Accra Ghana', 3, 'Joshua', 'Etange', '', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `frequency`
--
ALTER TABLE `frequency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homemaintenanceplans`
--
ALTER TABLE `homemaintenanceplans`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_frequency` (`frequency`),
  ADD KEY `fk_pid` (`pid`),
  ADD KEY `fk_cid` (`cid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionId`);

--
-- Indexes for table `q_arelation`
--
ALTER TABLE `q_arelation`
  ADD PRIMARY KEY (`q_aid`),
  ADD KEY `q_id` (`q_id`),
  ADD KEY `fk_answer_id` (`ansid`),
  ADD KEY `q_arelation_ibfk_1` (`UserId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `servicecategories`
--
ALTER TABLE `servicecategories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `servicerequests`
--
ALTER TABLE `servicerequests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_roleId` (`roleId`),
  ADD KEY `fk_users_categories` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `frequency`
--
ALTER TABLE `frequency`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `homemaintenanceplans`
--
ALTER TABLE `homemaintenanceplans`
  MODIFY `plan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `q_arelation`
--
ALTER TABLE `q_arelation`
  MODIFY `q_aid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `servicecategories`
--
ALTER TABLE `servicecategories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `servicerequests`
--
ALTER TABLE `servicerequests`
  MODIFY `request_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `homemaintenanceplans`
--
ALTER TABLE `homemaintenanceplans`
  ADD CONSTRAINT `fk_cid` FOREIGN KEY (`cid`) REFERENCES `servicecategories` (`category_id`),
  ADD CONSTRAINT `fk_frequency` FOREIGN KEY (`frequency`) REFERENCES `frequency` (`id`),
  ADD CONSTRAINT `fk_pid` FOREIGN KEY (`pid`) REFERENCES `plan` (`id`),
  ADD CONSTRAINT `homemaintenanceplans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `q_arelation`
--
ALTER TABLE `q_arelation`
  ADD CONSTRAINT `fk_answer_id` FOREIGN KEY (`ansid`) REFERENCES `answers` (`ans_id`),
  ADD CONSTRAINT `q_arelation_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `q_arelation_ibfk_3` FOREIGN KEY (`q_id`) REFERENCES `questions` (`questionId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `servicerequests`
--
ALTER TABLE `servicerequests`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `servicerequests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `servicerequests_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `servicecategories` (`category_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_roleId` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`),
  ADD CONSTRAINT `fk_users_categories` FOREIGN KEY (`category_id`) REFERENCES `servicecategories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
