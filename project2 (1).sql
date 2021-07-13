-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 09:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `createdat`) VALUES
(1, 'Aman', 'aman@gmail.com', 'HEllo', '2021-03-20 01:11:46'),
(2, 'Aman', 'aman@gmail.com', 'hello', '2021-05-03 20:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `createdat`) VALUES
(1, 'Aman', 'dejdjdjd', '2021-05-08 09:34:05'),
(2, 'Sir13', 'idhvi', '2021-05-08 11:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `jackets`
--

CREATE TABLE `jackets` (
  `id` int(5) NOT NULL,
  `product` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` int(5) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jackets`
--

INSERT INTO `jackets` (`id`, `product`, `image`, `price`, `createdat`) VALUES
(1, 'Black Ultra Varsity Bomber Jacket', 'https://images.bewakoof.com/t540/black-utra-varsity-bomber-jacket-men-s-plain-without-hoodie-bomber-jacket-275909-1606114783.jpg', 799, '2021-04-29 01:01:40'),
(2, 'Denim Jacket With Checkered Flanel Sleeves', 'https://images.bewakoof.com/t540/fugazee-denim-jacket-with-checkered-flanel-sleeves-fugazee-men-s-jacket-with-flanel-sleeves-340518-1615811776.jpg', 1399, '2021-04-29 01:01:40'),
(3, 'Women Blue Solid Denim Jacket', 'https://images.bewakoof.com/t540/style-quotient-women-blue-solid-denim-jacket-style-quotient-women-s-jacket-has-spread-collar-341316-1615535396.jpg', 1099, '2021-04-29 01:04:27'),
(4, 'Avengers Badge Varsity Bomber Jacket', 'https://images.bewakoof.com/t540/avengers-hero-badge-varsity-bomber-jacket-men-s-badge-varsity-bomber-jacket-295932-1606206095.jpg', 999, '2021-04-29 01:13:43'),
(5, 'Women Navy Blue Checked Tailored Jacket', 'https://images.bewakoof.com/t540/style-quotient-women-navy-blue-checked-tailored-jacket-style-quotient-women-s-jacket-in-checks-341320-1615535650.jpg', 799, '2021-04-29 01:15:46'),
(6, 'Jacket', 'https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/2458630/2018/2/7/11517984222174-Hangup-printed-waist-coat-paty-wear-size44-1531517984222063-4.jpg', 899, '2021-05-08 09:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `men`
--

CREATE TABLE `men` (
  `id` int(5) NOT NULL,
  `product` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` int(5) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `men`
--

INSERT INTO `men` (`id`, `product`, `image`, `price`, `createdat`) VALUES
(1, 'Beach Blue Full Sleeve T-Shirt', 'https://images.bewakoof.com/t540/aqua-sky-full-sleeve-t-shirts-men-s-plain-full-sleeve-t-shirts-329408-1614350160.jpg', 299, '2021-05-05 10:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `ordername` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `ordername`, `quantity`, `price`, `total`, `createdat`) VALUES
(1, 'Aman', 'Black Ultra Varsity Bomber Jacket', 1, 799, 799, '2021-04-28 20:39:26'),
(2, 'Aman', 'Black Ultra Varsity Bomber Jacket', 1, 799, 799, '2021-04-28 20:43:11'),
(3, 'Aman', 'Black Ultra Varsity Bomber Jacket', 1, 799, 799, '2021-04-28 20:43:54'),
(4, 'Aman', 'Chilling Business Half Sleeve T-Shirt', 1, 299, 299, '2021-05-03 15:12:06'),
(5, 'Aman', 'Peace out Jet Black Half-Sleeve T-Shirt', 1, 349, 349, '2021-05-03 15:12:06'),
(6, 'Aman', 'Beach Blue Half Sleeve T-Shirt', 1, 349, 349, '2021-05-03 15:12:06'),
(7, 'Aman', 'Chilling Business Half Sleeve T-Shirt', 1, 299, 299, '2021-05-05 04:48:15'),
(8, 'Sir', 'Beach Blue Full Sleeve T-Shirt', 1, 299, 299, '2021-05-08 03:59:04'),
(9, 'Sir', 'Chilling Business Half Sleeve T-Shirt', 1, 299, 299, '2021-05-08 04:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `tshirt`
--

CREATE TABLE `tshirt` (
  `id` int(5) NOT NULL,
  `product` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` int(5) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tshirt`
--

INSERT INTO `tshirt` (`id`, `product`, `image`, `price`, `createdat`) VALUES
(1, 'Atlantic Deep Full Sleeve T-Shirt', 'https://images.bewakoof.com/t540/atlantic-deep-full-sleeve-t-shirt-men-s-plain-full-sleeve-t-shirts-314407-1618949369.jpg', 399, '2021-04-27 01:16:36'),
(2, 'Beach Blue Full Sleeve T-Shirt', 'https://images.bewakoof.com/t540/aqua-sky-full-sleeve-t-shirts-men-s-plain-full-sleeve-t-shirts-329408-1614350160.jpg', 349, '2021-04-27 01:16:36'),
(3, 'Live Love T-Shirts Bold Red', 'https://images.bewakoof.com/t540/live-love-strip-boyfriend-t-shirts-bold-red-women-s-printed-boyfriend-t-shirts-327506-1611915306.jpg', 279, '2021-04-29 01:33:22'),
(4, 'Chilling Business Half Sleeve T-Shirt', 'https://images.bewakoof.com/t540/chilling-business-half-sleeve-t-shirt-pineapple-yellow-men-s-printed-t-shirts-351745-1618906792.jpg', 299, '2021-05-05 10:18:00'),
(5, 'Whatever Women\'s Half Sleeve T-Shirt', 'https://images.bewakoof.com/t540/just-chillin-nibbles-boyfriend-t-shirt-white-women-s-printed-boyfriend-t-shirts-352958-1619420030.jpg', 299, '2021-05-05 10:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `contact` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `dob`, `contact`, `address`, `gender`, `createdat`) VALUES
(1, 'Aman', 'aman@gmail.com', '$2y$10$mcwEP5mx6RbBYDRDrayQrembuiP/xADp8T0YjJITepRG6Lu/38uiq', '15-01-1999', 1234567890, 'Chembur', 'Male', '2021-04-01 01:05:21'),
(2, 'Sir', 'IR@gmail.com', '$2y$10$8wzWgssnDmQ7kzgNk/VA6unywuFUjiQN3BufILK7ePPAt1xsvR3D6', '12-12-2021', 1234567809, 'chembur, mumbai', 'Male', '2021-05-08 09:23:28'),
(3, 'SIr12', 'SIR@gmail.com', '$2y$10$NzSVjcuaSOfRVt594orn/e6GlzyvyhliiW9eSvLJicRDUp.a/Ya3K', '8-4-2021', 45, 'egegrehreh', 'Male', '2021-05-08 11:33:52'),
(4, 'Sir13', 'Sir13@gmail.com', '$2y$10$i/DBlE9YUoUxqsF9oTWcVeGtjTQX7YwCZbOIFbBJDZkvzc4J8/yOu', '12-12-2020', 2147483647, 'hdjfhsf', 'Male', '2021-05-08 11:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `wfh`
--

CREATE TABLE `wfh` (
  `id` int(5) NOT NULL,
  `product` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` int(5) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wfh`
--

INSERT INTO `wfh` (`id`, `product`, `image`, `price`, `createdat`) VALUES
(1, 'Chilling Business Half Sleeve T-Shirt', 'https://images.bewakoof.com/t540/chilling-business-half-sleeve-t-shirt-pineapple-yellow-men-s-printed-t-shirts-351745-1618906792.jpg', 299, '2021-04-23 01:43:31'),
(2, 'Whatever Women\'s Half Sleeve T-Shirt', 'https://images.bewakoof.com/t540/just-chillin-nibbles-boyfriend-t-shirt-white-women-s-printed-boyfriend-t-shirts-352958-1619420030.jpg', 299, '2021-04-23 01:45:25'),
(3, 'Peace out Jet Black Half-Sleeve T-Shirt', 'https://images.bewakoof.com/t540/peace-out-astronaut-half-sleeve-t-shirt-black-men-s-printed-t-shirts-302574-1605933419.jpg', 349, '2021-04-23 01:47:59'),
(4, 'Beach Blue Half Sleeve T-Shirt', 'https://images.bewakoof.com/t540/aqua-sky-half-sleeves-t-shirts-men-s-plain-t-shirts-329407-1614350125.jpg', 349, '2021-04-23 01:49:51'),
(5, 'Minion Men\'s Yellow T-Shirt', 'https://images.bewakoof.com/t540/guess-what-half-sleeve-t-shirt-men-s-printed-t-shirts-344098-1617800134.jpg', 349, '2021-04-27 00:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `women`
--

CREATE TABLE `women` (
  `id` int(5) NOT NULL,
  `product` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` int(5) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `women`
--

INSERT INTO `women` (`id`, `product`, `image`, `price`, `createdat`) VALUES
(1, 'Donut Worry Women\'s Half Sleeve T-Shirt White', 'https://images.bewakoof.com/t540/nakhre-always-on-women-s-half-sleeve-printed-t-shirt-344048-1617389064.jpg', 299, '2021-04-27 02:01:47'),
(2, 'Jet Black Women\'s Half Sleeve T-shirt', 'https://images.bewakoof.com/t540/jet-black-half-sleeve-t-shirt-women-s-half-sleeve-plain-t-shirt-232388-1592888004.jpg', 299, '2021-04-27 02:07:32'),
(3, 'Baby Pink Women\'s Half Sleeve T-Shirt', 'https://images.bewakoof.com/t540/baby-pink-half-sleeve-t-shirt-women-s-half-sleeve-plain-t-shirt-235448-1574164041.jpg', 349, '2021-04-27 02:11:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jackets`
--
ALTER TABLE `jackets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `men`
--
ALTER TABLE `men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tshirt`
--
ALTER TABLE `tshirt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wfh`
--
ALTER TABLE `wfh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `women`
--
ALTER TABLE `women`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jackets`
--
ALTER TABLE `jackets`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `men`
--
ALTER TABLE `men`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tshirt`
--
ALTER TABLE `tshirt`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wfh`
--
ALTER TABLE `wfh`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `women`
--
ALTER TABLE `women`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
