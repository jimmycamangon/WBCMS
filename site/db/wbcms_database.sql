-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 03:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
(162, 'Form Registration', '1084427132', 'jimmy camangon basaran', 'jimmy', 'basaran', 'camangon', 'Jr', 21, 2022, 'Male', 'Single', 'SOUTHVILLE-4 PH1 BLK 10 LOT 09 BRGY.CAINGIN SANTA ROSA LAGUNA', 'jimmy_camangon@yahoo.com', 2147483647, 'Kaido', '21232f297a57a5a743894a0e4a801fc3', '', 'Employed', 'not_verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'Form Registration', '198054852', '', 'jimmy', 'basaran', 'camangon', 'Jr', 21, 2022, 'Male', 'Single', 'SOUTHVILLE-4 PH1 BLK 10 LOT 09 BRGY.CAINGIN SANTA ROSA LAGUNA', 'jimmy_camangon@yahoo.com', 2147483647, 'jims', '827ccb0eea8a706c4c34a16891f84e7b', '', '', 'not_verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'Form Registration', '1215967819', '', 'jimmy', 'basaran', 'camangon', 'None', 21, 2022, 'Male', 'Single', 'SOUTHVILLE-4 PH1 BLK 10 LOT 09 BRGY.CAINGIN SANTA ROSA LAGUNA', 'jimmy_camangon@yahoo.com', 2147483647, 'peyt', '827ccb0eea8a706c4c34a16891f84e7b', '', '', 'not_verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'google', '104019995535113861480', 'CabangananEdward', 'Cabanganan', '', 'Edward', '', 0, 0, '', '', '', 'edwardcabanganan@gmail.com', 0, '', '', 'https://lh3.googleusercontent.com/a-/AOh14GhuweREol-tbAhSDfptf6C_RVCwiGr4jTQBI52G2Q=s96-c', '', 'not_verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'Form Registration', '927183224', '', 'Kaido', 'Bermas', 'Cross', 'None', 11, 2022, 'Male', 'Single', 'Shfajgiwbkgog', 'edwardcabanganan@yahoo.com', 2147483647, 'Kaido000', '21232f297a57a5a743894a0e4a801fc3', '', '', 'not_verified', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
