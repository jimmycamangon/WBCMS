-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 10:56 AM
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
  `status` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`id`, `oauth_id`, `sur_name`, `first_name`, `middle_name`, `full_address`, `precint_number`, `purpose`, `status`, `created_at`) VALUES
(40, '117026105942842883136', 'Camangon', 'Jimmy', 'Basaran', 'Barangay Caingin Purok 4 City of Sta.Rosa Laguna', '67 A', 'License Renewal', 'Processing', '2022-05-16'),
(41, '1489140982', 'Camangon', 'Jimmy', 'Basaran', 'Barangay Caingin Purok 4 City of Sta.Rosa Laguna', '67 A', 'License Renewal', 'Pending', '2022-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(50) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `oauth_id`, `subject`, `description`, `status`, `created_at`) VALUES
(2, '117026105942842883136', 'Clearance', 'Your Clearance Request is now in process.', 'read', '2022-05-16 02:33:15'),
(4, '117026105942842883136', 'Barangay ID', 'Your Barangay ID is now in Process', 'read', '2022-05-16 02:48:15');

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
(80, '117026105942842883136', 'xDPQbGsshGeXSpnu4VGV', 'jimmy basaran camangon', 'Cash on Pick Up', ''),
(81, '1489140982', 'xjsQEJT6RhMtMBdjOk4h', 'jimmy basaran camangon', 'Cash on Pick Up', '');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `oauth_id`, `type`) VALUES
(13, '117026105942842883136', 'Clearance'),
(14, '1489140982', 'Clearance');

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
(165, 'google', '104019995535113861480', 'CabangananEdward', 'Cabanganan', '', 'Edward', '', 0, 0, '', '', '', 'edwardcabanganan@gmail.com', 0, '', '', 'https://lh3.googleusercontent.com/a-/AOh14GhuweREol-tbAhSDfptf6C_RVCwiGr4jTQBI52G2Q=s96-c', '', 'not_verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'Form Registration', '1489140982', 'jimmy basaran camangon', 'jimmy', 'basaran', 'camangon', 'Jr', 21, 2022, 'Male', 'Single', 'SOUTHVILLE-4 PH1 BLK 10 LOT 09 BRGY.CAINGIN SANTA ROSA LAGUNA', 'jimmy_camangon@yahoo.com', 2147483647, 'jims', '827ccb0eea8a706c4c34a16891f84e7b', '', '', 'not_verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'Form Registration', '1553861643', '', 'edward', 'bermas', 'cabanganan', 'None', 21, 2022, 'Male', 'Single', 'SOUTHVILLE-4 PH1 BLK 10 LOT 09 BRGY.CAINGIN SANTA ROSA LAGUNA', 'edwardcabanganan@yahoo.com', 2147483647, 'Kaido', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Student', 'not_verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'google', '117026105942842883136', 'Camangon,Jimmy Jr B.', 'Camangon,', '', 'Jimmy Jr B.', '', 0, 0, '', '', '', 'jimmycamangon7@gmail.com', 0, '', '', 'https://lh3.googleusercontent.com/a-/AOh14Gj9htl2mMKMTxIiHvBgiPaubdDfRD2slQsT1D0qOA=s96-c', '', 'processing', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'google', '109041773047886311393', 'jimmycamangon', 'jimmy', '', 'camangon', '', 0, 0, '', '', '', 'jimmycamangon30@gmail.com', 0, '', '', 'https://lh3.googleusercontent.com/a/AATXAJw7jNeJDguE9N8dVftZxDzqIJIa_iZSaWsYRdXD=s96-c', '', 'not_verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'facebook', '7178740185532065', 'Jimmy B. Camangon', 'Jimmy', '', 'Camangon', '', 0, 0, '', '', '', '', 0, '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=7178740185532065&height=50&width=50&ext=1655257420&hash=AeTqazHy81iOU4egDiU', '', 'not_verified', '2022-05-14 13:37:29', '0000-00-00 00:00:00');

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
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `oauth_id`, `valid_id`, `img_upload`) VALUES
(3, '1553861643', 'Student ID', 'ID PICTURE.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
