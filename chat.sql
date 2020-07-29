-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 05:47 PM
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
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `business_name` varchar(300) NOT NULL,
  `address` text NOT NULL,
  `product` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `business_name`, `address`, `product`) VALUES
(1, 'Fog Harbor Fish House', 'Fisherman\'s Wharf, North Beach/Telegraph Hill\r\nPier 39\r\nSan Francisco, CA 94133\r\nPhone number (415) 421-2442', 'Seafood, Bars'),
(2, 'The House', 'North Beach/Telegraph Hill\r\n1230 Grant Ave\r\nSan Francisco, CA 94133\r\nPhone number (415) 986-8612', 'Asian Fusion'),
(3, 'Barnzu', 'Tenderloin\r\n711 Geary St\r\nSan Francisco, CA 94109\r\nPhone number (415) 525-4985', 'Korean, Tapas Bars'),
(4, 'Brenda French Soul Food', 'Tenderloin\r\n652 Polk St\r\nSan Francisco, CA 94102\r\nPhone number (415) 345-8100', 'Breakfast & Brunch, French, Soul Food'),
(5, 'The Salzburg', 'Russian Hill, North Beach/Telegraph Hill\r\n663 Union St\r\nSan Francisco, CA 94133', 'Austrian'),
(6, 'Marufuku Ramen', 'Lower Pacific Heights, Japantown\r\n1581 Webster St\r\nSan Francisco, CA 94115\r\nPhone number (415) 872-9786', 'Seafood, Seafood Markets, Live/Raw Food');

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
(73, 2, 1, 'Finally able to do it', '', '', '', '2020-04-08 00:07:41', '::1'),
(74, 1, 2, 'Glory to God', '', '', '', '2020-04-08 00:07:50', '::1'),
(78, 1, 2, 'I did it', '', '', '', '2020-04-08 13:08:33', '::1'),
(90, 1, 2, 'What\'s up?', '', '', '', '2020-04-30 15:32:11', '::1'),
(91, 2, 1, 'Hey', '', '', '', '2020-04-30 15:35:22', '::1'),
(92, 2, 1, 'I can\'t tell you what that means', '', '', '', '2020-04-30 15:36:34', '::1'),
(96, 1, 2, 'I know', '', '', '', '2020-04-30 15:54:03', '::1'),
(97, 1, 2, 'Yo', '', '', '', '2020-04-30 16:07:04', '::1'),
(98, 1, 2, 'SUp', '', '', '', '2020-04-30 16:08:27', '::1'),
(99, 1, 2, 'Sup', '', '', '', '2020-04-30 16:08:30', '::1'),
(101, 1, 2, 'NULL', '14CK016983.jpg', '.jpg', 'image/jpeg', '2020-05-03 02:47:43', '::1'),
(102, 1, 2, 'NULL', '20191011_123101.jpg', '.jpg', 'image/jpeg', '2020-05-03 02:48:00', '::1'),
(112, 2, 1, 'Still not perfect', '', '', '', '2020-06-25 02:41:19', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `city_name`) VALUES
(1, 1, 'New York city'),
(2, 1, 'Buffalo'),
(3, 1, 'Albany'),
(4, 2, 'Birmingham'),
(5, 2, 'Montgomery'),
(6, 2, 'Huntsville'),
(7, 3, 'Los Angeles'),
(8, 3, 'San Francisco'),
(9, 3, 'San Diego'),
(10, 4, 'Toronto'),
(11, 4, 'Ottawa'),
(12, 5, 'Vancouver'),
(13, 5, 'Victoria'),
(14, 6, 'Sydney'),
(15, 6, 'Newcastle'),
(16, 7, 'City of Brisbane'),
(17, 7, 'Gold Coast'),
(18, 8, 'Bangalore'),
(19, 8, 'Mangalore'),
(20, 9, 'Hydrabad'),
(21, 9, 'Warangal');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`) VALUES
(1, 'USA'),
(2, 'Canada'),
(3, 'Australia'),
(4, 'India');

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
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `business_id`, `rating`) VALUES
(1, 6, 3),
(2, 6, 5),
(3, 6, 3),
(4, 5, 3),
(5, 5, 2),
(6, 5, 5),
(7, 5, 5),
(8, 5, 5),
(9, 5, 1),
(10, 3, 5),
(11, 4, 3),
(12, 4, 5),
(13, 4, 3),
(14, 4, 5),
(15, 1, 3),
(16, 1, 1),
(17, 1, 2),
(18, 1, 5),
(19, 1, 5),
(20, 2, 4),
(21, 6, 3),
(22, 6, 4),
(23, 6, 4),
(24, 6, 5),
(25, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `state_name`) VALUES
(1, 1, 'New York'),
(2, 1, 'Alabama'),
(3, 1, 'California'),
(4, 2, 'Ontario'),
(5, 2, 'British Columbia'),
(6, 3, 'New South Wales'),
(7, 3, 'Queensland'),
(8, 4, 'Karnataka'),
(9, 4, 'Telangana');

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
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(150) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_unit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`id`, `order_id`, `item_name`, `item_quantity`, `item_unit`) VALUES
(1, '5ef63caf3be31', 'Ready to go', 4, 'Gallon'),
(2, '5ef63caf3be31', 'No', 5, 'Feet'),
(3, '5ef63caf3be31', 'Yes', 7, 'Box'),
(4, '5ef63cf29252f', 'You', 4, 'Gallon'),
(5, '5ef63cf29252f', 'Btr', 3, 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `post_title` text,
  `post_description` text,
  `author` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `post_image` varchar(150) DEFAULT NULL,
  `post_url` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `post_title`, `post_description`, `author`, `datetime`, `post_image`, `post_url`) VALUES
(1, 'Lorem ipsum', 'Random text', 'Joshua Pregbaha', '2020-07-22 07:30:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id`, `unit_name`) VALUES
(1, 'Bags'),
(2, 'Bottles'),
(3, 'Box'),
(4, 'Dozens'),
(5, 'Feet'),
(6, 'Gallon'),
(7, 'Grams'),
(8, 'Inch'),
(9, 'Kg'),
(10, 'Liters'),
(11, 'Meter'),
(12, 'Nos'),
(13, 'Packet'),
(14, 'Rolls');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `video_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `video_title`) VALUES
(1, 'How to generate simple random password in php?\r\n'),
(2, 'Create Simple Image using PHP\r\n'),
(3, 'How to check Username availability in php and MySQL using Ajax Jquery\r\n'),
(4, 'How to Insert Watermark on to Image using PHP GD Library\r\n'),
(5, 'Make SEO Friendly / Clean Url in PHP using .htaccess\r\n'),
(6, 'Live Table Add Edit Delete using Ajax Jquery in PHP Mysql\r\n'),
(7, 'How to Export MySQL data to Excel in PHP - PHP Tutorial\r\n'),
(8, 'How to Load More Data using Ajax Jquery\r\n'),
(9, 'Dynamically Add / Remove input fields in PHP with Jquery Ajax\r\n'),
(10, 'Read Excel Data and Insert into Mysql Database using PHP\r\n'),
(11, 'How to Convert Currency using Google Finance in PHP\r\n'),
(12, 'Dynamically generate a select list with jQuery, AJAX & PHP\r\n'),
(13, 'How to get Multiple Checkbox values in php\r\n'),
(14, 'Ajax Live Data Search using Jquery PHP MySql\r\n'),
(15, 'Auto Save Data using Ajax, Jquery, PHP and Mysql\r\n'),
(16, 'How to Use Ajax with PHP for login with shake effect\r\n'),
(17, 'Facebook style time ago function using PHP\r\n'),
(18, 'Upload Resize Image using Ajax Jquery PHP without Page Refresh\r\n\r\n'),
(19, 'How to Search for Exact word match FROM String using RLIKE\r\n'),
(20, 'How To Create A Show Hide Password Button using Jquery\r\n');

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
(1, 'Joshua', 'd1133275ee2118be63a577af759fc052', '2020-06-25 02:26:14', 0),
(2, 'Daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e', '2020-06-25 02:41:08', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
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
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
