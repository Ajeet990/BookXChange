-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 12:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookxchange1`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `edition` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'active',
  `rating` float NOT NULL,
  `owner_id` int(11) NOT NULL,
  `lattitude` varchar(17) NOT NULL,
  `longitude` varchar(17) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `image`, `genre`, `author`, `edition`, `description`, `status`, `rating`, `owner_id`, `lattitude`, `longitude`, `upload_date`) VALUES
(2, 'Django', 'Django image', 'beginner', 'Mr. Dev', 4, 'python framework', 'blocked', 4.8, 6, '', '', '2022-04-05 18:15:00'),
(8, 'PHP book', 'PHP image', 'Beginners for php', 'KIM jong', 2, 'best php book ever', 'active', 4.3, 6, '', '', '2022-04-05 18:15:00'),
(18, 'Python', 'python image', 'beginner', 'Python young', 5, 'best python book ever', 'active', 2.5, 1, '', '', '2022-04-05 18:15:00'),
(23, 'C-Sharp', 'c sharp image', 'programming', 'jhong', 4, 'Good', 'active', 4.3, 8, '', '', '2022-04-05 18:15:00'),
(24, 'Loksewa', 'loksewa image', 'Government job', 'Aditya nath', 4, 'government job', 'active', 4.3, 9, '', '', '2022-04-05 18:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `commenter_name` int(11) NOT NULL,
  `feedback` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bood_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_table` int(11) NOT NULL,
  `book_table` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `settings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `user_type`, `user_table`, `book_table`, `request`, `settings`) VALUES
(1, 2, 1, 0, 1, 1),
(2, 3, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_name` varchar(11) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lattitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_type` int(11) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `image`, `user_name`, `mobile_no`, `address`, `email`, `lattitude`, `longitude`, `password`, `rating`, `status`, `user_type`, `join_date`) VALUES
(1, 'img/Screenshot (7).png', 'Bhima', '9811457681', 'Ptharahiya-4, barghat', 'bhima1@gmail.com', '42342534', '23423534', '$2y$10$tvWO1SNL84XNIkTXULLHlOH1Fw39wleJtQ0e/8KDiMo7T8mK1oyuW', 4.9, 'active', 0, '2022-04-05 18:15:00'),
(2, 'img/Screenshot (7).png', 'Ajeet', '9811505195', 'pratappur-9, pratappur', 'aj@gmail.com', '346498', '65498765', '$2y$10$F9Bw7ZFTX5lYIYxVS6Vf0uGR0N//UEY.IMxkXYhiEUyAnjaFW5FJO', 3.1, 'active', 0, '2022-04-05 18:15:00'),
(6, 'img/Screenshot (12).png', 'Sumit subed', '4576387511', 'Birauta-4, Pokhara', 'vanje.sumi1t@gmail.com', '098765789', '980075567', '$2y$10$N0MscdEWEJxHPlp/4CERfuM0G//fDpjN6LFrp0T2RGmrhGrFEEBcO', 3.9, 'active', 0, '2022-04-05 18:15:00'),
(8, 'user image', 'Gaurav', '8765456098', 'Gaidahwa - 4, barghat', 'gauri@gmail.com', '', '', '$2y$10$IXRvoLJcNAcmZ2jaXHxngOU4j0xR9zWEsuDx32Ck0dh4zF.NunzD2', 4.3, 'active', 0, '2022-04-05 18:15:00'),
(9, 'milan image', 'Milan', '5647098324', 'Gadauri-1, Gobarahiya', 'milan@gmail.com', '', '', '$2y$10$iLKFdydS6/HD5SkQgeV94eI8PDeEdXQbUvy918UThEz8Fa3wd2pcu', 4.3, 'active', 0, '2022-04-05 18:15:00'),
(10, 'superAdmin image', 'superadmin', '1234567890', 'superAdmin', 'superadmin@ideaFoundation.in', '', '', '$2y$10$7Xn6K1pGZmfUw7qb3X7bNebi/bYy/jO14Fd/AA1m4ubWyn0ewzCUy', 0, 'active', 1, '2022-04-05 18:15:00'),
(11, 'book manager image', 'bookManager', '5678460098', 'bookManager at ideafoundation', 'bookmanager@ideafoundation.in', '', '', '$2y$10$p2xXNP9AyXxHS.FL6KiV3eK.Ecmfqc6oIdERkK.z8wWDHqnXclHhi', 0, 'active', 3, '2022-04-05 18:15:00'),
(12, 'User manager image', 'userManager', '2345680969', 'user manager at idea Foundation', 'usermanger@ideaFoundation.in', '', '', '$2y$10$ZQdw.Li4JqYCaA76bMo2.OPrOFaMJ0/i8HswM2V09vPcILLZLn6QG', 0, 'active', 2, '2022-04-05 18:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `rqst_date` date NOT NULL,
  `issued_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `requester_id`, `owner_id`, `book_id`, `status`, `reason`, `rqst_date`, `issued_date`, `return_date`) VALUES
(1, 2, 1, 18, 'pending', 'Want to study python', '2022-03-16', '0000-00-00', '0000-00-00'),
(2, 6, 9, 24, 'borrowed', 'Goverment job', '2022-03-15', '2022-03-16', '0000-00-00'),
(3, 8, 9, 24, 'returned', 'Want to be government employee', '2022-03-01', '2022-03-02', '2022-03-14'),
(4, 8, 1, 18, 'borrowed', 'Want to be pythoneer', '2022-03-05', '2022-03-06', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `value`) VALUES
(1, 'site_title', 'bookXchange'),
(2, 'logo', '../img/logo4.jpg'),
(3, 'mail_from', 'ideaFoundation@gmail.com'),
(4, 'welcome_text', 'Admin portal');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `value`) VALUES
(1, 'superadmin', 1),
(2, 'admin', 2),
(3, 'bookManager', 3),
(4, 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_ibfk_1` (`owner_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_ibfk_1` (`bood_id`),
  ADD KEY `feedback_ibfk_2` (`user_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_ibfk_1` (`requester_id`),
  ADD KEY `request_ibfk_2` (`owner_id`),
  ADD KEY `request_ibfk_3` (`book_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `register` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`bood_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`requester_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
