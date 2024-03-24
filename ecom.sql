-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 08:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `proname` varchar(255) NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `proname` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `datetime` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `proname`, `price`, `img`, `datetime`, `qty`, `category`) VALUES
(1, 'HEMP SPEED', 250, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg', '16-08-2023 01:00', 12, 'all'),
(2, 'SHOES', 2598, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg', '16-08-2023 01:00', 17, 'shoes'),
(3, 'BASKET', 456, 'https://hometown.gumlet.io/media/product/33/5763/53748/1.jpg', '16-08-2023 01:00', 5, 'all'),
(4, 'HOMEDECO', 1800, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg', '16-08-2023 01:00', 10, 'all'),
(5, 'WATCH', 4505, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg', '16-08-2023 01:00', 12, 'watch'),
(6, 'BAG', 1566, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg', '16-08-2023 01:00', 11, 'bags'),
(7, 'FACEWASH', 234, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg', '16-08-2023 01:00', 15, 'all'),
(8, 'LAMP', 567, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg', '16-08-2023 01:00', 10, 'electronics'),
(9, 'T2NIK', 67, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg', '16-08-2023 01:00', 12, 'all'),
(10, 'GAME REMOTE', 1538, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg', '16-08-2023 01:00', 13, 'gaming'),
(11, 'BLACK BAG', 1234, 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg', '16-08-2023 01:00', 12, 'bags'),
(13, 'BAG', 2300, 'https://topodesigns.com/cdn/shop/products/S22-SquareBag-PondBlue-931098476001-Front-1_1@2x.jpg?v=1689349320', 'current_timestamp()', 2, 'bags');

-- --------------------------------------------------------

--
-- Table structure for table `userlogindetails`
--

CREATE TABLE `userlogindetails` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 for online, 1 for offline',
  `acdate` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogindetails`
--
ALTER TABLE `userlogindetails`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `userlogindetails`
--
ALTER TABLE `userlogindetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
