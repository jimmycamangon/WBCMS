-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 09:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbcms_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `type`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notification`
--

CREATE TABLE `admin_notification` (
  `id` int(255) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `id` int(255) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `sur_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `precint_number` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `request_status` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`id`, `oauth_id`, `sur_name`, `first_name`, `middle_name`, `full_address`, `precint_number`, `purpose`, `request_status`, `created_at`) VALUES
(48, '117026105942842883136', 'Camangon', 'Jimmy', 'Basaran', 'Barangay Caingin Purok 4 City of Sta.Rosa Laguna', '67 A', 'Travel Abroad', 'Pending', '2022-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(255) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `reference_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `oauth_id`, `tracking_number`, `full_name`, `payment_method`, `reference_number`) VALUES
(89, '117026105942842883136', 'NcFjpGrYxE2zxkFj3mjC', 'jimmy basaran camangon', 'Cash on Pick Up', '');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `oauth_id`, `name`, `type`, `description`, `status`, `created_at`) VALUES
(21, '117026105942842883136', 'Jimmy Camangon', 'Clearance', 'Requesting for Clearance', 'unread', '2022-05-28 09:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `title`, `img`, `link`, `created_at`) VALUES
(8, 'Test', 'bg.jpg', 'https://www.facebook.com/permalink.php?story_fbid=1316559818871874&id=100015536054293', '2022-05-15 10:56:59'),
(9, 'Sample2', 'bg4.jpg', 'https://www.facebook.com/permalink.php?story_fbid=1316559818871874&id=100015536054293', '2022-05-15 11:03:07'),
(10, 'Sample 3', 'bg7.jpg', 'https://www.facebook.com/permalink.php?story_fbid=1316559818871874&id=100015536054293', '2022-05-15 11:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(255) NOT NULL,
  `birthday` int(255) NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `relationship_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` int(255) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resident` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_id`, `name`, `first_name`, `middle_name`, `last_name`, `suffix`, `age`, `birthday`, `gender`, `relationship_status`, `full_address`, `email`, `contact`, `user_name`, `password`, `picture`, `resident`, `status`, `created_at`, `modified_at`) VALUES
(184, 'google', '117026105942842883136', 'Camangon,Jimmy Jr B.', 'Camangon,', '', 'Jimmy Jr B.', '', 0, 0, '', '', '', 'jimmycamangon7@gmail.com', 0, '', '', 'https://lh3.googleusercontent.com/a-/AOh14Gj9htl2mMKMTxIiHvBgiPaubdDfRD2slQsT1D0qOA=s96-c', '', 'not_verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `valid_id` varchar(255) NOT NULL,
  `img_upload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notification`
--
ALTER TABLE `admin_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_notification`
--
ALTER TABLE `admin_notification`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
