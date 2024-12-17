-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 06:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `edition` text NOT NULL,
  `number_pages` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Books Table';

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `description`, `publisher`, `edition`, `number_pages`, `price`, `image`, `created_at`, `updated_at`, `subcategory_id`) VALUES
(1, 'Data Structures Using C++', 'Very Good Book', 'O&#39;railly', '2020', 200, 150, '1591437268.jpg', '2020-05-27 16:53:26', '2020-06-06 07:54:28', 2),
(3, 'Web Development Using PHP', 'Very Nice Book', 'IT Books', '2018', 180, 120, '1591437430.jpg', '2020-05-27 16:55:35', '2020-06-06 07:57:10', 1),
(4, 'Bach Scripting', 'Very Useful Book', 'eBooks', '2017', 220, 120, '1591437464.jpg', '2020-05-28 12:35:50', '2020-06-06 07:57:44', 5),
(6, 'SQL Query Language', 'So Helpful Book', 'O&#39;railly', '2019', 250, 125, '1591437485.jpg', '2020-06-03 19:00:56', '2020-06-06 07:58:05', 3),
(28, 'C++ Data Structures & Algorithms', 'C++ Programming & Related Aspects', 'Packt', '2015', 250, 120, '1591481702.jpg', '2020-06-06 20:15:03', '2020-06-06 20:15:03', 2),
(29, 'PHP Development', 'PHP Programming & Related Aspects', 'Packt', '2017', 300, 180, '1591481878.jpg', '2020-06-06 20:17:58', '2020-06-06 20:17:58', 1),
(30, 'Bach Scripting Commands', 'Bach Scripting Basics', 'Aprees', '2016', 150, 100, '1591481992.jpg', '2020-06-06 20:19:52', '2020-06-06 20:19:52', 5),
(31, 'Introduction to Computer Networks & Cybersecurity', 'Computer Networks & Related Aspects', 'Aprees', '2015', 160, 200, '1591482189.jpg', '2020-06-06 20:23:09', '2020-06-06 20:23:09', 8),
(32, 'Computer Networking - The Complete Guide', 'Computer Networks & Related Aspects', 'Packt', '2019', 190, 185, '1591482290.jpg', '2020-06-06 20:24:50', '2020-06-06 20:24:50', 8),
(33, 'Guide to Computer Network Security', 'Computer Networks Security & Related Aspects', 'O&#39;railly', '2014', 250, 200, '1591482408.jpg', '2020-06-06 20:26:48', '2020-06-06 20:26:48', 7),
(34, 'Network Security - The Complete Reference', 'Computer Networks Security & Related Aspects', 'O&#39;railely', '2015', 260, 180, '1591482585.jpg', '2020-06-06 20:29:45', '2020-06-06 20:29:45', 7),
(35, 'Professional NoSQL', 'NoSQL Databases & Related Aspects', 'Packt', '2018', 250, 200, '1591482666.jpg', '2020-06-06 20:31:06', '2020-06-06 20:31:06', 4);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Carts Table';

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Categories Table';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`) VALUES
(1, 'Operating Systems', 'Various Operating Systems & Related Aspects', '1591330040.jpg'),
(2, 'Programming', 'Programming Languages & Related Aspects', '1591305427.jpeg'),
(3, 'Databases', 'Relational & Distributed Databases', '1591305564.jpg'),
(4, 'Networking', 'Routing, Switching & Troubleshooting', '1591305741.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Details Table';

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `address`, `postal_code`, `city`, `state`, `street`, `phone`, `user_id`) VALUES
(2, 'Mostafa Ramzy', 'Beni Suef, Egypt', 62511, 'Beni Suef', 'Beni Suef', 'Salah Salem ST', 1254826, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Questions Table';

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `email`, `question`, `user_id`) VALUES
(3, 'mostafa@yahoo.com', 'Is \"Programming With C\" Book Still Available', 1),
(4, 'mostafa@yahoo.com', 'I Was Looking For \"PHP Design Pasterns\" Book', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Sub Categories Table';

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `description`, `category_id`, `image`) VALUES
(1, 'PHP Programming', 'PHP Programming & Related Aspects', 2, '1591401021.jpg'),
(2, 'C++ Programming', 'C++ Programming & Related Aspects', 2, '1591401616.jpg'),
(3, 'MySQL', 'MySQL Database & Related Aspects', 3, '1591401197.jpg'),
(4, 'NoSQL Databases', 'NoSQL Databases & Related Aspects', 3, '1591401533.jpg'),
(5, 'Linux', 'Linux Bach Scripting, Administration & Related Aspects', 1, '1591401394.jpg'),
(7, 'Networks Security', 'Networks Security & Related Aspects', 4, '1591400274.jpg'),
(8, 'Networks Management', 'Networks Routing, Switching & Trobleshooting', 4, '1591400455.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `group_id` tinyint(1) NOT NULL COMMENT '0: User, 1: Admin',
  `registration_status` tinyint(1) NOT NULL COMMENT '0: Pending, 1: Activated',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Users Table';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `full_name`, `username`, `email`, `password`, `group_id`, `registration_status`, `created_at`, `updated_at`) VALUES
(1, 'Mostafa', 'Ramzy', 'Mostafa Ramzy', 'Mostafa', 'mostafa@yahoo.com', '123', 1, 1, '2020-05-28 14:01:52', '2020-05-28 14:01:52'),
(26, 'Mohamed', 'Ramzy', 'Mohamed Ramzy', 'Mohamed', 'mohamed@yahoo.com', '12', 0, 1, '2020-06-05 16:17:15', '2020-06-05 16:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_book`
--

CREATE TABLE `user_book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Pivot Table';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_book`
--
ALTER TABLE `user_book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_book`
--
ALTER TABLE `user_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
