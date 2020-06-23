-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 01:49 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `attachment_name` text NOT NULL,
  `file_ext` text NOT NULL,
  `mime_type` text NOT NULL,
  `message_date_time` text NOT NULL,
  `ip_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `attachment_name`, `file_ext`, `mime_type`, `message_date_time`, `ip_address`) VALUES
(71, 2, 1, 'Hey', '', '', '', '2020-04-08 00:07:12', '::1'),
(72, 1, 2, 'Hi', '', '', '', '2020-04-08 00:07:19', '::1'),
(73, 2, 1, 'Finally able to do it', '', '', '', '2020-04-08 00:07:41', '::1'),
(74, 1, 2, 'Glory to God', '', '', '', '2020-04-08 00:07:50', '::1'),
(75, 1, 2, 'Holla', '', '', '', '2020-04-08 13:06:43', '::1'),
(76, 1, 2, 'Hye', '', '', '', '2020-04-08 13:07:37', '::1'),
(77, 1, 2, 'H', '', '', '', '2020-04-08 13:08:01', '::1'),
(78, 1, 2, 'I did it', '', '', '', '2020-04-08 13:08:33', '::1'),
(79, 1, 2, 'Hey', '', '', '', '2020-04-08 13:42:50', '::1'),
(80, 1, 2, 'Yo', '', '', '', '2020-04-08 13:44:05', '::1'),
(81, 1, 2, 'No', '', '', '', '2020-04-08 13:44:22', '::1'),
(82, 1, 2, 'Hey', '', '', '', '2020-04-08 13:45:56', '::1'),
(83, 1, 2, 'U', '', '', '', '2020-04-08 13:46:04', '::1'),
(84, 1, 2, 'Hey', '', '', '', '2020-04-08 13:47:37', '::1'),
(85, 1, 2, 'Hey#', '', '', '', '2020-04-08 13:47:58', '::1'),
(86, 1, 2, 'Hey', '', '', '', '2020-04-08 13:49:05', '::1'),
(87, 2, 1, 'Hey', '', '', '', '2020-04-08 13:49:30', '::1'),
(88, 1, 2, 'Hey', '', '', '', '2020-04-30 15:31:24', '::1'),
(89, 2, 1, 'Hey', '', '', '', '2020-04-30 15:31:49', '::1'),
(90, 1, 2, 'What\'s up?', '', '', '', '2020-04-30 15:32:11', '::1'),
(91, 2, 1, 'Hey', '', '', '', '2020-04-30 15:35:22', '::1'),
(92, 2, 1, 'I can\'t tell you what that means', '', '', '', '2020-04-30 15:36:34', '::1'),
(93, 2, 1, 'Hey', '', '', '', '2020-04-30 15:36:52', '::1'),
(94, 2, 1, 'hey', '', '', '', '2020-04-30 15:49:46', '::1'),
(95, 2, 1, 'Hey', '', '', '', '2020-04-30 15:53:38', '::1'),
(96, 1, 2, 'I know', '', '', '', '2020-04-30 15:54:03', '::1'),
(97, 1, 2, 'Yo', '', '', '', '2020-04-30 16:07:04', '::1'),
(98, 1, 2, 'SUp', '', '', '', '2020-04-30 16:08:27', '::1'),
(99, 1, 2, 'Sup', '', '', '', '2020-04-30 16:08:30', '::1'),
(100, 1, 2, 'no', '', '', '', '2020-04-30 16:08:49', '::1'),
(101, 1, 2, 'NULL', '14CK016983.jpg', '.jpg', 'image/jpeg', '2020-05-03 02:47:43', '::1'),
(102, 1, 2, 'NULL', '20191011_123101.jpg', '.jpg', 'image/jpeg', '2020-05-03 02:48:00', '::1'),
(103, 1, 2, 'Hi', '', '', '', '2020-05-21 15:47:43', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `email`) VALUES
(4, 'brother', 'danielpregbaha@yahoo.com'),
(7, 'Student1204348', 'danielpregbaha@yahoo.com'),
(8, 'My name is', 'slimshady@gmail.com'),
(11, 'Oga at the top', 'olivia.ezebube@stu.cu.edu.ng'),
(12, 'Student1204348', 'gvb19203@uni.strath.ac.uk'),
(13, 'Ebube', 'jpregbaha@gmail.com'),
(14, 'jpregbaha@gmail.com', 'olivia.ezebube@stu.cu.edu.ng'),
(17, 'JP', 'jpregbaha@gmail.com'),
(18, 'Student1204348', 'joshua.pregbaha@uni.strath.ac.uk');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `recipient_id`, `message`, `read`, `date`) VALUES
(55, 1, 2, 'fff', 0, '2020-03-25 11:20:46'),
(56, 1, 2, 'fff', 0, '2020-03-25 11:30:10'),
(57, 1, 2, 'fff', 0, '2020-03-25 11:30:55'),
(58, 1, 2, 'fff', 0, '2020-03-25 11:31:22'),
(59, 1, 2, 'fff', 0, '2020-03-25 11:32:41'),
(60, 1, 2, 'w', 0, '2020-03-25 11:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `address`, `mobile_no`) VALUES
(1, 'Joshua', 'Pregbaha', 'male', 'xx@xx.com', 'something', '1-4 Parsonage Row', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_log` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `last_log`, `status`) VALUES
(1, 'Joshua', 'd1133275ee2118be63a577af759fc052', '2020-06-22 16:38:59', 1),
(2, 'Daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e', '2020-04-30 15:31:43', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
