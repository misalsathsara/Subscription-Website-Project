-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 04:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subscribuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `c_id` varchar(11) DEFAULT NULL,
  `n_id` varchar(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `c_id`, `n_id`, `username`) VALUES
(11, 'C004', '1', 'sanindu'),
(12, 'C004', '2', 'sanindu'),
(13, 'C004', '3', 'sanindu');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `subject`, `message`) VALUES
(1, 'ranuga@gmail.com', 'sd', 'sdsdsdsd'),
(2, 'ranuga@gmail.com', 'Moda chamodi', 'Moda chamodi'),
(3, 'ravi.singh@example.com', 'ds', 'as'),
(4, 'ranuga@gmail.com', 'test local', 'sdsds'),
(5, 'ranuga@gmail.com', 'ds', 'sdds'),
(6, 'ranuga@gmail.com', 'sdsd', 'dsdsd'),
(7, 'ranuga@gmail.com', 'test local', 'dsasd'),
(8, 'ranuga@gmail.com', 'test local', 'nnnnm'),
(9, 'ranuga@gmail.com', 'test local', 'sxsd');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` varchar(20) NOT NULL,
  `c_name` varchar(500) NOT NULL,
  `c_email` varchar(200) NOT NULL,
  `c_tel` varchar(12) NOT NULL,
  `c_address` varchar(300) NOT NULL,
  `c_uname` varchar(100) NOT NULL,
  `c_pwd` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_email`, `c_tel`, `c_address`, `c_uname`, `c_pwd`) VALUES
('C004', 'sanindu', 'ranuga@gmail.com', '28848842', 'ssasa', 'sanindu', '$2y$10$ewduKpdkjeSHaVGc1BeN9.8LlKVjo9C.kkfemx0aSqN.22Q794HV6'),
('C005', 'Misal Sathsara', 'misal.sathsara@ecyber.com', '0775285042', 'Baddegama', 'misal', '$2y$10$EHHiZGksr3fB328SgwHzzen4P.U1jRUIlPui32/jGlwUniJ3TRvp2');

-- --------------------------------------------------------

--
-- Table structure for table `c_reviews`
--

CREATE TABLE `c_reviews` (
  `c_id` varchar(11) NOT NULL,
  `n_id` varchar(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_reviews`
--

INSERT INTO `c_reviews` (`c_id`, `n_id`, `rating`, `review_description`) VALUES
('c001', 'AC001', 4, 'qerewr'),
('c002', 'AC003', 3, 'qweqwe'),
('c003', 'AC001', 5, 'kaejfkje'),
('c004', 'AC001', 3, 'kajdaod'),
('c005', 'AC001', 5, 'ladnlaknc'),
('c007', 'AC001', 4, 'akjdkcjakdnfak'),
('c009', 'AC001', 2, 'hsdjhsd shbdjsd sbdshdb jbnsdj');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `n_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`n_id`, `name`, `type`, `description`, `price`, `image`) VALUES
(1, 'Grocery Daily Items', 'home appliance', 'The Grocery Item Daily Items section serves as a practical guide for consumers, helping them make informed choices while shopping for their everyday needs. It can be particularly useful for meal planning, budgeting, and ensuring a balanced diet.', 5000.00, 'uploads/68837027_689373823503_0.19650400-1672221458.jpg'),
(2, 'cream', 'beauty', 'uio', 123.00, 'uploads/images.jpg'),
(3, 'cream', 'beauty', '[op[', 90879.00, 'uploads/images.jpg'),
(4, 'Healthy Fruits', 'electronic', 'DSADAD', 324234.00, 'uploads/360_F_65706597_uNm2SwlPIuNUDuMwo6stBd81e25Y8K8s.jpg'),
(5, 'Healthy Fruits', 'beauty', 'DSADADAYTDFYGF', 32423434.00, 'uploads/360_F_65706597_uNm2SwlPIuNUDuMwo6stBd81e25Y8K8s.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `duration` varchar(100) NOT NULL,
  `renieve` varchar(100) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `email`, `address`, `duration`, `renieve`, `total_price`, `created_at`) VALUES
(1, 'A', 'asa@gmail.com', 's', '', '', 5000.00, '2024-10-29 06:40:15'),
(2, 'A', 'asa@gmail.com', 's', '', '', 5000.00, '2024-10-29 06:44:23'),
(3, 'A', 'asa@gmail.com', 's', '', '', 5000.00, '2024-10-29 06:45:14'),
(4, 'aasas', 'asa@gmail.com', 'qwrqerq', '', '', 96002.00, '2024-10-29 08:53:08'),
(5, 'aasas', 'asa@gmail.com', 'weqw', 'every week', 'start of the week', 96002.00, '2024-10-29 14:00:53'),
(6, 'aasas', 'asa@gmail.com', 'weqw', 'every week', 'start of the week', 96002.00, '2024-10-29 14:06:29'),
(7, 'aasas', 'asa@gmail.com', 'weqw', 'every week', 'start of the week', 96002.00, '2024-10-29 14:12:39'),
(8, 'ASAD', 'asa@gmail.com', 'dafsdf', 'every month', 'middle of the month', 96002.00, '2024-10-29 14:19:09'),
(9, 'ASAD', 'asa@gmail.com', 'dafsdf', 'every month', 'middle of the month', 96002.00, '2024-10-29 14:19:09'),
(10, 'ASAD', 'asa@gmail.com', 'dafsdf', 'every month', 'middle of the month', 96002.00, '2024-10-29 14:19:09'),
(11, 'ASAD', 'asa@gmail.com', 'dafsdf', 'every month', 'middle of the month', 96002.00, '2024-10-29 14:33:11'),
(12, 'A', 'asa@gmail.com', 'sdfsdf', 'every year', 'middle of the week', 96002.00, '2024-10-29 14:37:36'),
(13, 'aasas', 'asa@gmail.com', 'erfer', 'every 5 months', 'start of the week', 96002.00, '2024-10-29 14:40:28'),
(14, 'aasas', 'asa@gmail.com', 'erfer', 'every 5 months', 'start of the week', 96002.00, '2024-10-29 14:43:38'),
(15, 'DSsdf', 'asa@gmail.com', 'sdfg', 'every 6 months', 'middle of the month', 96002.00, '2024-10-29 14:44:05'),
(16, 'DSsdf', 'asa@gmail.com', 'sdfg', 'every 6 months', 'middle of the month', 96002.00, '2024-10-29 14:49:04'),
(17, 'DSsdf', 'asa@gmail.com', 'sdfg', 'every 6 months', 'middle of the month', 96002.00, '2024-10-29 14:52:45'),
(18, 'DSsdf', 'asa@gmail.com', 'sdfg', 'every 6 months', 'middle of the month', 96002.00, '2024-10-29 14:53:11'),
(19, 'DSsdf', 'asa@gmail.com', 'yt', 'every week', 'middle of the week', 96002.00, '2024-10-29 14:54:59'),
(20, 'aasas', 'asa@gmail.com', 'wr', 'every 6 months', 'end of the month', 96002.00, '2024-10-29 15:03:08'),
(21, 'aasas', 'asa@gmail.com', 'wr', 'every 6 months', 'end of the month', 96002.00, '2024-10-29 15:07:37'),
(22, 'sanindu', 'asa@gmail.com', 'afsfaf', 'every 6 months', 'start of the month', 96002.00, '2024-10-29 15:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`) VALUES
(1, 22, 11),
(2, 22, 12),
(3, 22, 13);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `c_id` varchar(11) DEFAULT NULL,
  `n_id` varchar(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `c_reviews`
--
ALTER TABLE `c_reviews`
  ADD PRIMARY KEY (`c_id`,`n_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
