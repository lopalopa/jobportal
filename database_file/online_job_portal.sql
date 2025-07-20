-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 08:08 AM
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
-- Database: `online_job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `seeker_id` int(11) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL,
  `status` enum('Pending','Reviewed','Selected','Rejected') DEFAULT 'Pending',
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `seeker_id`, `resume`, `cover_letter`, `status`, `applied_at`) VALUES
(1, 1, 3, 'uploads/job_portal.docx', 'xcxcx', 'Pending', '2025-04-29 07:27:19'),
(8, 2, 3, 'uploads/FRONT PAGE.docx', 'sdsdsdsd', 'Pending', '2025-04-30 05:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `industry` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `name`, `company_name`, `email`, `industry`, `logo`, `created_at`) VALUES
(1, 'dsdsdsd', 'abc', 'jyotiranjanparida007@gmail.com', 'bbb', 'uploads/abc/.trashed-1721719169-IMG-20221225-WA0018.jpg', '2025-04-08 06:25:06'),
(2, 'Ankita Priyadarshini Sahoo', 'Google', 'sahooankita4970@gmail.com', 'technology', 'uploads/google/dfd level 2.jpg', '2025-04-29 05:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `job_type` enum('Full-Time','Part-Time','Internship','Remote') DEFAULT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `employer_id`, `title`, `description`, `location`, `salary`, `job_type`, `posted_at`) VALUES
(1, 3, 'Sw developer', 'Sw developer', 'bbsr', '20000', 'Full-Time', '2025-04-29 07:24:57'),
(2, 3, 'Sw developer', 'Sw developer', 'bbsr', '20000', 'Full-Time', '2025-04-29 07:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `job_seekers`
--

CREATE TABLE `job_seekers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `s_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `experience` int(11) NOT NULL,
  `skills` text NOT NULL,
  `resume` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_seekers`
--

INSERT INTO `job_seekers` (`id`, `name`, `s_id`, `email`, `phone`, `gender`, `dob`, `qualification`, `experience`, `skills`, `resume`, `created_at`) VALUES
(1, 'Jyotiranjan', 0, 'jyotiranjanparida007@gmail.com', '07609008340', 'Male', '2004-04-10', ' bca', 2, 'Quick learne,self motivating', '../uploads/jyotis .cv.pdf', '2025-04-10 07:02:01'),
(2, 'dsdsdsd', 0, 'jyotiranjanparida007@gmail.com', '07609008340', 'Male', '2025-04-08', ' bca', 2, 'Quick learne,self motivating', 'uploads/job_portal.docx', '2025-04-10 08:04:29'),
(3, 'dsdsdsd', 0, 'jyotiranjanparida007@gmail.com', '7609008347', 'Female', '2025-04-07', ' bca', 2, 'zxzxzx', 'job_seeker/uploads/job_portal.docx', '2025-04-10 08:06:42'),
(4, 'dsdsdsd', 0, 'jyotiranjanparida007@gmail.com', '7609008347', 'Female', '2025-04-07', ' bca', 2, 'zxzxzx', 'uploads/job_portal.docx', '2025-04-10 08:14:42'),
(5, 'dsdsdsd', 0, 'jyotiranjanparida007@gmail.com', '07609008340', 'Male', '2025-04-07', ' bca', 2, 'Quick learne,self motivating', 'uploads/FRONT PAGE.docx', '2025-04-10 08:21:01'),
(6, 'dsdsdsd', 0, 'jyotiranjanparida007@gmail.com', '07609008340', 'Male', '2025-04-16', ' bca', 2, 'sxdfdsxf', 'uploads/job_portal (1).docx', '2025-04-30 05:53:13'),
(7, 'dsdsdsdsfsfs', 0, 'jyotiranjanparida007@gmail.com', '07609008340', 'Male', '2025-04-07', ' bca', 2, 'zxzxx', 'uploads/FRONT PAGE.docx', '2025-04-30 05:54:38'),
(8, 'dsdsdsdsfsfs', 3, 'jyotiranjanparida007@gmail.com', '07609008340', 'Male', '2025-04-07', ' bca', 2, 'zxzxx', 'uploads/FRONT PAGE.docx', '2025-04-30 05:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `created_at`, `updated_at`) VALUES
(1, '', '', '$2y$10$t1DWqusZJvYzTUEgzYsh4elko6Z9EzOBpSUW9dhaF8ku4j8OD9n4G', '4343242423', '', '2025-03-28 06:41:07', '2025-03-29 05:26:02'),
(2, 'admin', 'admin@gmail.com', '$2y$10$pWxjvj1A2FikUOAVAmWEQukilf0T5xuUhEtBmJu7UQaSKSDcJvNue', '3424242424', 'admin', '2025-03-28 06:45:15', '2025-03-28 06:45:15'),
(3, 'jyotiranjan', 'jyotiranjanparida007@gmail.com', '$2y$10$B8jS12tBwDLeH.ABbxg5legOIL8kgAKrEQNPWAgqYFZFPR1diVYLW', '7609008340', 'user', '2025-04-02 06:44:52', '2025-04-02 06:44:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `seeker_id` (`seeker_id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `job_seekers`
--
ALTER TABLE `job_seekers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_seekers`
--
ALTER TABLE `job_seekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`seeker_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
