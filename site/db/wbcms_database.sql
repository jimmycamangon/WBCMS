-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 08:00 PM
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
-- Table structure for table `oauth_users`
--

CREATE TABLE `oauth_users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(50) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `modified_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oauth_users`
--

INSERT INTO `oauth_users` (`id`, `oauth_provider`, `oauth_id`, `name`, `first_name`, `last_name`, `email`, `picture`, `status`, `created_at`, `modified_at`) VALUES
(194, 'google', '117026105942842883136', '', 'Camangon,', '', '', '', 'not_verified', '', '2022-03-31 11:36:54'),
(195, 'google', '109041773047886311393', '', 'jimmy', '', '', '', 'not_verified', '', '2022-03-31 11:54:52'),
(196, 'facebook', '7178740185532065', 'Jimmy B. Camangon', 'Jimmy', 'Camangon', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=7178740185532065&height=50&width=50&ext=1651291991&hash=AeR8CPAqfECfLDHDltE', 'not_verified', '2022-03-31 06:13:12', '2022-03-31 12:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `title`, `img`, `link`, `created_at`) VALUES
(1, ' Covid 19 vaccination', 'bg.jpg', 'https://facebook.com/2800557906756413', '2022-03-14'),
(2, 'St.Ignatious Academy Office Requirements', 'bg4.jpg', 'https://facebook.com/2800413293437541', '2022-03-14'),
(3, 'Disaster Brigade ', 'bg7.jpg', 'https://facebook.com/2798570293621841', '2022-03-14'),
(4, 'Valentines', 'nature1.jpg', 'https://facebook.com/663318651670973', '2022-03-14'),
(5, 'Chinese New Year', 'nature2.jpg', 'https://facebook.com/663318651670973', '2022-03-14'),
(6, 'April Fools Day', 'nature3.jpg', 'https://facebook.com/663318651670973', '2022-03-14'),
(7, 'asda', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'asd', '2022-03-14');

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
  `full_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` int(255) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `repeat_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verify_status` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_id`, `name`, `first_name`, `middle_name`, `last_name`, `suffix`, `age`, `birthday`, `full_address`, `email`, `contact`, `password`, `repeat_password`, `gender`, `picture`, `verify_status`, `created_at`, `modified_at`) VALUES
(111, 'facebook', '7178740185532065', 'Jimmy B. Camangon', 'Jimmy', '', 'Camangon', '', 0, 0, '', '', 0, '', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=7178740185532065&height=50&width=50&ext=1652118838&hash=AeTvWqoHpB5s2jelgI8', 'processing', '2022-04-09 18:39:25', '0000-00-00 00:00:00'),
(112, 'google', '109041773047886311393', 'jimmycamangon', 'jimmy', '', 'camangon', '', 0, 0, '', 'jimmycamangon30@gmail.com', 0, '', '', '', 'https://lh3.googleusercontent.com/a/AATXAJw7jNeJDguE9N8dVftZxDzqIJIa_iZSaWsYRdXD=s96-c', 'not_verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'google', '117026105942842883136', 'Camangon,Jimmy Jr B.', 'Camangon,', '', 'Jimmy Jr B.', '', 0, 0, '', 'jimmycamangon7@gmail.com', 0, '', '', '', 'https://lh3.googleusercontent.com/a-/AOh14Gj9htl2mMKMTxIiHvBgiPaubdDfRD2slQsT1D0qOA=s96-c', 'verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oauth_users`
--
ALTER TABLE `oauth_users`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oauth_users`
--
ALTER TABLE `oauth_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
