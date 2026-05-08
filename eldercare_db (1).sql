-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2026 at 07:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eldercare_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `user1_id`, `user2_id`) VALUES
(1, 2, 8),
(2, 2, 8),
(3, 2, 8),
(4, 2, 8),
(5, 2, 8),
(6, 2, 8),
(7, 2, 8),
(8, 2, 8),
(9, 2, 8),
(10, 2, 8),
(11, 2, 8),
(12, 2, 8),
(13, 2, 8),
(14, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `senior_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_time` time NOT NULL,
  `meeting_location` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` enum('pending','approved','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `senior_id`, `partner_id`, `meeting_date`, `meeting_time`, `meeting_location`, `notes`, `status`, `created_at`) VALUES
(1, 2, 8, '0000-00-00', '00:00:01', 'main building ', 'gago', 'pending', '2026-05-08 00:37:12'),
(2, 2, 8, '0000-00-00', '00:00:09', 'Main building ', 'gago', 'pending', '2026-05-08 00:47:53'),
(3, 2, 8, '2026-07-20', '10:00:00', 'main building ', 'kingina', 'pending', '2026-05-08 00:51:28'),
(4, 2, 8, '0000-00-00', '00:00:01', '1', '1', 'pending', '2026-05-08 05:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `swipes`
--

CREATE TABLE `swipes` (
  `id` int(11) NOT NULL,
  `swiper_id` int(11) DEFAULT NULL,
  `swiped_id` int(11) DEFAULT NULL,
  `action` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `swipes`
--

INSERT INTO `swipes` (`id`, `swiper_id`, `swiped_id`, `action`) VALUES
(1, 3, 6, 'like'),
(2, 8, 2, 'like'),
(3, 8, 3, 'like'),
(4, 2, 6, 'like'),
(5, 2, 8, 'like'),
(6, 2, 9, 'like'),
(7, 2, 10, 'like'),
(8, 2, 11, 'like'),
(9, 2, 6, 'like'),
(10, 2, 8, 'like'),
(11, 2, 9, 'like'),
(12, 2, 6, 'like'),
(13, 2, 6, 'like'),
(14, 2, 8, 'like'),
(15, 2, 6, 'like'),
(16, 2, 8, 'like'),
(17, 2, 9, 'like'),
(18, 2, 6, 'like'),
(19, 2, 8, 'like'),
(20, 2, 6, 'like'),
(21, 2, 8, 'like'),
(22, 2, 6, 'like'),
(23, 2, 6, 'like'),
(24, 2, 6, 'like'),
(25, 2, 8, 'like'),
(26, 2, 6, 'like'),
(27, 2, 8, 'like'),
(28, 2, 6, 'like'),
(29, 2, 8, 'like'),
(30, 2, 6, 'like'),
(31, 2, 8, 'like'),
(32, 2, 6, 'like'),
(33, 2, 8, 'like'),
(34, 2, 9, 'like'),
(35, 2, 10, 'like'),
(36, 2, 11, 'like'),
(37, 2, 6, 'like'),
(38, 2, 8, 'like'),
(39, 2, 9, 'like'),
(40, 2, 6, 'like'),
(41, 2, 8, 'like'),
(42, 2, 8, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rating` float DEFAULT 5,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `age`, `location`, `bio`, `image`, `rating`, `status`) VALUES
(2, 'shaco', 'shaco@gmail.com', 'shaco', 'Senior', 60, 'San Fernando ', 'shaco', 'http://192.168.0.216/eldercare-api/uploads/1778153592_profile.jpg', 5, 'Approved'),
(3, 'zed', 'zed@gmail.com', 'zed', 'Senior', 67, 'lubao', 'need to talk', 'http://192.168.0.216/eldercare-api/uploads/1778154174_profile.jpg', 5, 'Approved'),
(4, 'zac', 'zac@gmail.com', 'zac', 'Senior', 62, 'makati', 'want to play basketball ', 'http://192.168.0.216/eldercare-api/uploads/1778154259_profile.jpg', 5, 'Approved'),
(5, 'zebra', 'zebra@gmail.com', 'zebra', 'Senior', 64, 'san darating', 'zebra', 'http://192.168.0.216/eldercare-api/uploads/1778154289_profile.jpg', 5, 'Approved'),
(6, 'hello', 'hello@gmail.com', 'hello', 'Caregiver', 20, 'bulakan', 'hello', NULL, 5, 'Approved'),
(8, 'jinx', 'jinx@gmail.com', 'jinx', 'Caregiver', 29, 'batikan', 'jinx', NULL, 5, 'Approved'),
(9, 'pook', 'pook@gmail.com', 'pook', 'Volunteer', 35, 'pook', 'pook', NULL, 5, 'Approved'),
(10, 'skin', 'skin@gmail.com', 'skin', 'Volunteer', 34, 'skin', 'skin', NULL, 5, 'Approved'),
(11, 'kill', 'kill@gmail.com', 'kill', 'Volunteer', 38, 'kill', 'kill', NULL, 5, 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `swipes`
--
ALTER TABLE `swipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `swipes`
--
ALTER TABLE `swipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
