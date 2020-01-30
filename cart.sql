-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 01:37 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartproducts`
--

CREATE TABLE `cartproducts` (
  `id` int(11) NOT NULL,
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `priceproduct` decimal(10,0) DEFAULT NULL,
  `quantity` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cartproducts`
--

INSERT INTO `cartproducts` (`id`, `cartid`, `userid`, `productid`, `priceproduct`, `quantity`, `created_at`, `updated_at`) VALUES
(117, 46, 4, 1, '200', '3', '2019-11-13 09:31:36', '2019-11-13 09:46:37'),
(125, 51, 8, 2, '150', '2', '2020-01-29 20:23:21', '2020-01-29 20:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `userid`, `created_at`, `updated_at`) VALUES
(46, 4, '2019-11-13 09:31:36', '2019-11-13 09:31:36'),
(47, 5, '2019-12-04 07:34:05', '2019-12-04 07:34:05'),
(51, 8, '2020-01-29 20:23:21', '2020-01-29 20:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'mages'),
(2, 'plants'),
(3, 'food');

-- --------------------------------------------------------

--
-- Table structure for table `orderproducts`
--

CREATE TABLE `orderproducts` (
  `id` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderproducts`
--

INSERT INTO `orderproducts` (`id`, `productid`, `orderid`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(16, 1, 12, 5, '200.00', '2019-11-11 18:11:11', '2019-11-11 18:11:11'),
(17, 3, 12, 1, '125.00', '2019-11-11 18:11:12', '2019-11-11 18:11:12'),
(18, 1, 13, 3, '200.00', '2019-11-11 18:11:51', '2019-11-11 18:11:51'),
(19, 3, 13, 2, '125.00', '2019-11-11 18:11:51', '2019-11-11 18:11:51'),
(20, 6, 14, 3, '111.00', '2019-11-11 18:12:33', '2019-11-11 18:12:33'),
(21, 1, 14, 1, '200.00', '2019-11-11 18:12:33', '2019-11-11 18:12:33'),
(22, 4, 15, 2, '100.00', '2019-11-13 09:16:49', '2019-11-13 09:16:49'),
(23, 3, 16, 2, '125.00', '2019-11-27 20:42:50', '2019-11-27 20:42:50'),
(24, 2, 16, 3, '150.00', '2019-11-27 20:42:50', '2019-11-27 20:42:50'),
(25, 2, 20, 1, '150.00', '2020-01-29 20:16:18', '2020-01-29 20:16:18'),
(26, 3, 20, 1, '125.00', '2020-01-29 20:16:18', '2020-01-29 20:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `totalPrice` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `totalPrice`, `created_at`, `updated_at`) VALUES
(12, 4, '1125.00', '2019-11-11 18:11:11', '2019-11-11 18:11:11'),
(13, 3, '850.00', '2019-11-11 18:11:51', '2019-11-11 18:11:51'),
(14, 3, '533.00', '2019-11-11 18:12:33', '2019-11-11 18:12:33'),
(15, 4, '200.00', '2019-11-13 09:16:49', '2019-11-13 09:16:49'),
(16, 3, '700.00', '2019-11-27 20:42:49', '2019-11-27 20:42:49'),
(17, 3, '0.00', '2019-11-27 20:51:46', '2019-11-27 20:51:46'),
(18, 3, '0.00', '2019-11-27 20:52:31', '2019-11-27 20:52:31'),
(19, 3, '0.00', '2019-11-27 20:53:11', '2019-11-27 20:53:11'),
(20, 7, '275.00', '2020-01-29 20:16:18', '2020-01-29 20:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `id` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `productid`, `image`) VALUES
(1, 1, '1.jpg'),
(2, 1, '2.jpg'),
(3, 2, '2.jpg'),
(4, 3, '3.jpg'),
(5, 4, '4.jpg'),
(6, 5, '5.jpg'),
(7, 6, '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `image`, `price`, `categoryid`, `details`, `created_at`, `updated_at`) VALUES
(1, 'product1', '2020', '1.jpg', '200.00', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non eos inventore aspernatur voluptatibus ratione odit molestias molestiae, illum et impedit veniam modi sunt quas nam mollitia earum perferendis, dolorem. Magni.', '2019-11-05 10:13:26', '2019-11-05 10:13:29'),
(2, 'product2', '2021', '2.jpg', '150.00', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non eos inventore aspernatur voluptatibus ratione odit molestias molestiae, illum et impedit veniam modi sunt quas nam mollitia earum perferendis, dolorem. Magni.', '2019-11-05 10:13:56', '2019-11-05 10:13:59'),
(3, 'product3', '2022', '3.jpg', '125.00', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non eos inventore aspernatur voluptatibus ratione odit molestias molestiae, illum et impedit veniam modi sunt quas nam mollitia earum perferendis, dolorem. Magni.', '2019-11-05 10:14:28', '2019-11-05 10:14:31'),
(4, 'product4', '2023', '4.jpg', '100.00', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non eos inventore aspernatur voluptatibus ratione odit molestias molestiae, illum et impedit veniam modi sunt quas nam mollitia earum perferendis, dolorem. Magni.', '2019-11-05 10:14:56', '2019-11-05 10:14:58'),
(5, 'product5', '2024', '5.jpg', '75.00', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non eos inventore aspernatur voluptatibus ratione odit molestias molestiae, illum et impedit veniam modi sunt quas nam mollitia earum perferendis, dolorem. Magni.', '2019-11-05 10:15:21', '2019-11-05 10:15:26'),
(6, 'product6', '2025', '6.jpg', '110.50', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non eos inventore aspernatur voluptatibus ratione odit molestias molestiae, illum et impedit veniam modi sunt quas nam mollitia earum perferendis, dolorem. Magni.', '2019-11-05 10:15:52', '2019-11-05 10:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `usetimes` int(11) DEFAULT NULL,
  `value` decimal(10,0) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `starttime` date DEFAULT NULL,
  `endtime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `code`, `usetimes`, `value`, `status`, `starttime`, `endtime`) VALUES
(3, 'CS20', 5, '200', '1', '2019-11-07', '2019-11-09'),
(4, 'FG30', 5, '250', '0', '2019-11-04', '2019-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rate` decimal(10,1) DEFAULT NULL,
  `like` int(11) DEFAULT 0,
  `review` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rate`, `like`, `review`) VALUES
(18, 3, 1, '4.5', 1, 'done review after like'),
(22, 3, 2, '2.5', 1, 'kkkk'),
(24, 3, 3, NULL, 1, NULL),
(25, 3, 6, NULL, 1, NULL),
(26, 4, 1, '2.0', 1, 'mmm'),
(28, 4, 4, '2.0', 1, 'mm'),
(29, 3, 4, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usercodes`
--

CREATE TABLE `usercodes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `codeid` int(11) NOT NULL,
  `times` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usercodes`
--

INSERT INTO `usercodes` (`id`, `userid`, `codeid`, `times`) VALUES
(5, 3, 3, 5),
(6, 8, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `address`, `created_at`, `updated_at`) VALUES
(3, 'shrook', 'shrookallam67@gmail.com', '01279848396', '$2y$10$uiRYVvbU0zQ/Vz4tKOkEEuNh43Uvw00Ky0xmgKeGNsuRG6tO7cEbC', '34 Ismail Sery St. - Kasr Elaiainy St. Cairo', '2019-11-05 10:21:11', '2019-11-05 10:21:11'),
(4, 'Mohamed', 'mohamed@yahoo.com', '01245659878', '$2y$10$oAdjq/KHVcEbk6NujAn3AO/gnM4uZa4LU6ozYt1ezkw2q1qTkqv3e', 'haram', '2019-11-06 05:44:56', '2019-11-06 05:44:56'),
(5, 'shrook', 'rana@gmail.com', '01279848378', '$2y$10$OPCkt2GF2pZnV5eUFBuJQe1Vx5ZD6xmN/8LI9U7fS4b6zgMQwWzDa', '34 Ismail Sery St. - Kasr Elaiainy St. Cairo', '2019-12-04 07:33:52', '2019-12-04 07:33:52'),
(6, 'shrook', 's@sd.sd', '01279848355', '$2y$10$pDL4hwH58ZfkoASepzzQAehrJP/rgpWAlKYUMDwr7/AbOppXgQl52', '34 Ismail Sery St. - Kasr Elaiainy St. Cairo', '2019-12-05 13:40:07', '2019-12-05 13:40:07'),
(7, 'InFocuse', 'ibrahim@mv-dmg.com', '01279848378', '$2y$10$zeTNDlh0u5EXbDUXuELmtuB9cr7MSg3T5pO.sioutfGVUx5NwJ4z6', '34 Ismail Sery St. - Kasr Elaiainy St. Cairo', '2020-01-29 20:15:08', '2020-01-29 20:15:08'),
(8, 'Amira', 'm.abouelsaoud@firewall.com', '01222669713', '$2y$10$c5HKnB7Ks0/E57gB41wLsO2M64MxuDne6jd9ORkBm3Q99QCfIrW26', 'Smart village', '2020-01-29 20:17:18', '2020-01-29 20:17:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartproducts`
--
ALTER TABLE `cartproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cartproducts_ibfk_1` (`cartid`,`userid`),
  ADD KEY `productid` (`productid`,`priceproduct`,`quantity`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`userid`),
  ADD KEY `cartuser` (`userid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderid1_fk` (`orderid`),
  ADD KEY `prodect_fk` (`productid`,`price`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderuser` (`userid`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productimage` (`productid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`price`),
  ADD KEY `cagegoryid` (`categoryid`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reviews_ibfk_2` (`product_id`);

--
-- Indexes for table `usercodes`
--
ALTER TABLE `usercodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `codeid` (`codeid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartproducts`
--
ALTER TABLE `cartproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderproducts`
--
ALTER TABLE `orderproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `usercodes`
--
ALTER TABLE `usercodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartproducts`
--
ALTER TABLE `cartproducts`
  ADD CONSTRAINT `cartproducts_ibfk_1` FOREIGN KEY (`cartid`,`userid`) REFERENCES `carts` (`id`, `userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartproducts_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `cartuser` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD CONSTRAINT `orderid1_fk` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orderuser` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `productimages`
--
ALTER TABLE `productimages`
  ADD CONSTRAINT `productimage` FOREIGN KEY (`productid`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usercodes`
--
ALTER TABLE `usercodes`
  ADD CONSTRAINT `usercodes_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usercodes_ibfk_2` FOREIGN KEY (`codeid`) REFERENCES `promocodes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
