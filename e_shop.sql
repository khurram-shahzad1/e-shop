-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 06:49 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(8) NOT NULL,
  `title` varchar(256) NOT NULL,
  `address` varchar(512) NOT NULL,
  `city` varchar(256) NOT NULL,
  `state` varchar(256) NOT NULL,
  `country` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `title`, `address`, `city`, `state`, `country`, `timestamp`) VALUES
(1, 1, 'home', '192-b', 'sahiwal', 'punjab', 'pakistan', '2021-04-08 19:46:07'),
(2, 1, 'work ', 'super market', 'sahiwal', 'punjab ', 'pakistan', '2021-04-08 19:46:59'),
(3, 2, 'AZZ', 'swl', 'sahiwal', 'sdfsd', 'pakistan', '2021-04-14 20:42:46'),
(4, 2, 'itjimmidd', 'WAHIL', 'sahiwal', 'sdfsd', 'pakistan', '2021-04-15 17:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(56) NOT NULL,
  `password` varchar(56) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `timestamp`) VALUES
(1, 'admin@admin.com', '1234', '2021-04-12 18:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `timestamp`) VALUES
(16, 'Shirts', '2021-04-01 19:22:10'),
(17, 'Pents', '2021-04-01 18:57:12'),
(18, 'Shoes', '2021-04-01 19:22:03'),
(19, 'Shiner', '2021-04-01 19:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(8) NOT NULL,
  `address_id` int(8) NOT NULL,
  `order_no` varchar(32) NOT NULL,
  `order` varchar(512) NOT NULL,
  `qty` int(8) NOT NULL,
  `price` varchar(8) NOT NULL,
  `discount` varchar(8) NOT NULL,
  `total` varchar(8) NOT NULL,
  `paid` varchar(8) NOT NULL,
  `comments` varchar(1024) NOT NULL,
  `status` int(1) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `complete_time` timestamp NULL DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `order_no`, `order`, `qty`, `price`, `discount`, `total`, `paid`, `comments`, `status`, `order_time`, `complete_time`, `timestamp`) VALUES
(1, 1, 2, 'KFxPO1xO5ijn', '23', 1, '1279', '0', '1279', '1279', '', 2, '2021-04-08 20:54:32', NULL, '2021-04-16 11:56:37'),
(2, 1, 2, 'KFxPO1xO5ijn', '24', 2, '10690', '0', '11969', '10690', '', 4, '2021-04-08 20:54:32', NULL, '2021-04-16 12:02:17'),
(3, 1, 2, 'KFxPO1xO5ijn', '25', 4, '21828', '0', '33797', '21828', '', 0, '2021-04-08 20:54:32', NULL, '2021-04-16 11:53:48'),
(4, 1, 2, 'KFxPO1xO5ijn', '26', 5, '12270', '0', '46067', '12270', '', 0, '2021-04-08 20:54:32', NULL, '2021-04-16 11:53:52'),
(5, 1, 1, 'atjphqCjL7dm', '26', 1, '2454', '0', '2454', '2454', '', 0, '2021-04-08 20:57:35', NULL, '2021-04-16 11:53:56'),
(6, 1, 2, 'PldyipT6Y9ER', '26', 1, '2454', '0', '2454', '2454', '', 0, '2021-04-14 19:47:35', NULL, '2021-04-14 19:47:35'),
(7, 1, 2, 'PldyipT6Y9ER', '23', 10, '12790', '0', '15244', '12790', '', 0, '2021-04-14 19:47:35', NULL, '2021-04-14 19:47:35'),
(8, 2, 3, 'UnWCEWvi5uqs', '25', 80, '436560', '0', '436560', '436560', '', 0, '2021-04-14 20:43:03', NULL, '2021-04-15 19:13:47'),
(9, 2, 3, 'UnWCEWvi5uqs', '26', 4, '9816', '0', '446376', '9816', '', 3, '2021-04-14 20:43:03', NULL, '2021-04-16 12:01:58'),
(10, 2, 3, 'wXLxkYU8I5UE', '23', 1, '1279', '0', '1279', '1279', '', 2, '2021-04-15 17:38:22', NULL, '2021-04-16 12:00:46'),
(11, 2, 3, 'wXLxkYU8I5UE', '28', 1, '2323', '0', '3602', '2323', '', 2, '2021-04-15 17:38:22', NULL, '2021-04-16 12:00:41'),
(12, 2, 3, 'CuUptwXniUCa', '29', 1, '4343', '0', '4343', '4343', '', 2, '2021-04-15 18:06:23', NULL, '2021-04-16 11:58:39'),
(13, 2, 3, 'CuUptwXniUCa', '30', 1, '5353', '0', '9696', '5353', '', 3, '2021-04-15 18:06:23', NULL, '2021-04-16 11:57:50'),
(14, 2, 3, 'CuUptwXniUCa', '28', 23, '53429', '0', '63125', '53429', '', 2, '2021-04-15 18:06:24', NULL, '2021-04-16 12:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(8) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `price` varchar(8) NOT NULL,
  `image` varchar(256) NOT NULL,
  `inventory` int(4) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `price`, `image`, `inventory`, `timestamp`) VALUES
(28, 19, 'Machine', 'Lorem ipsum may be used as a placeholder before final copy is available.', '2323', 'product2.jpg', 0, '2021-04-16 09:58:03'),
(29, 19, 'Machine', 'Latest Machine for gym.', '4343', 'product4.jpg', 43, '2021-04-16 09:58:37'),
(30, 19, 'Machine', 'Lorem ipsum may be used as a placeholder before final copy is available.', '5353', 'product5.jpg', 34, '2021-04-15 18:07:30'),
(31, 19, 'Machine', 'Lorem ipsum may be used as a placeholder before final copy is available.', '6543', 'product6.jpg', 97, '2021-04-15 18:07:39'),
(32, 19, 'Machine', 'Lorem ipsum may be used as a placeholder before final copy is available.', '2453345', 'product7.jpg', 1110, '2021-04-15 18:07:51'),
(33, 19, 'Machine', 'Lorem ipsum may be used as a placeholder before final copy is available.', '5432', 'product8.jpg', 22, '2021-04-15 18:07:54'),
(34, 19, 'Machine', 'Lorem ipsum may be used as a placeholder before final copy is available.', '543', 'product12.jpg', 2432, '2021-04-15 18:07:57'),
(35, 19, 'Machine', 'Lorem ipsum may be used as a placeholder before final copy is available.', '34543', 'product11.jpg', 765, '2021-04-15 18:08:07'),
(36, 19, 'Machine', 'Lorem ipsum may be used as a placeholder before final copy is available.', '3434', 'product13.jpg', 7654, '2021-04-15 18:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(121) NOT NULL,
  `last_name` varchar(121) NOT NULL,
  `email` varchar(786) NOT NULL,
  `password` varchar(784) NOT NULL,
  `phone` varchar(786) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `timestamp`) VALUES
(1, 'Fazal', 'Khan', 'fazal@gmail.com', '121', '03129206532', '2021-04-01 14:50:44'),
(2, 'Ali', 'Nawaz', 'ali@gmail.com', '1122', '03051718043', '2021-04-01 17:14:23'),
(3, 'jimmi', 'ch', 'gm@gmail.com', '222', '93939393993', '2021-04-16 11:40:39'),
(4, 'jimmi', 'ch', 'gm@gmail.com', '222', '93939393993', '2021-04-16 11:40:55'),
(5, 'jimmi', 'ch', 'gm@gmail.com', '222', '93939393993', '2021-04-16 11:40:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
