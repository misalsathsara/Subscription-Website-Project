-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 01:38 PM
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
  `duration` varchar(50) DEFAULT NULL,
  `renieve` varchar(255) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_status` enum('pending','paid','failed') DEFAULT 'pending',
  `transaction_id` varchar(255) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `email`, `address`, `duration`, `renieve`, `total_price`, `payment_status`, `transaction_id`, `order_date`) VALUES
(1, 'sanindu', 'asa@gmail.com', 'ese', 'every 6 months', 'start of the month', 96002.00, '', 'PAYPAL-672f99d89d2cb', '2024-11-09 17:19:24'),
(2, 'sanindu', 'asa@gmail.com', 'ssss', 'every week', 'start of the week', 96002.00, '', 'BANKTRANSFER-672f9a600a2ed', '2024-11-09 17:22:32'),
(3, 'qe', 'asa@gmail.com', 'ddd', 'every two weeks', 'middle of the week', 96002.00, '', 'CREDITCARD-672f9aaee8464', '2024-11-09 17:23:41'),
(4, 'ASAD', 'asa@gmail.com', 'qwrq', 'every year', 'end of the week', 96002.00, 'pending', NULL, '2024-11-09 17:29:14'),
(5, 'ASAD', 'asa@gmail.com', 'qwrq', 'every year', 'end of the week', 96002.00, '', 'BANKTRANSFER-672f9db923813', '2024-11-09 17:34:35'),
(6, 'DSsdf', 'asa@gmail.com', 'asf', 'every two weeks', 'start of the week', 96002.00, '', 'PAYPAL-672f9e5a3c078', '2024-11-09 17:38:13'),
(7, 'DSsdf', 'asa@gmail.com', '12e', 'every month', 'end of the week', 96002.00, '', 'PAYPAL-672f9f556aea8', '2024-11-09 17:43:47'),
(8, 'DSsdf', 'asa@gmail.com', 'adf', 'every two weeks', 'middle of the week', 96002.00, '', 'PAYPAL-672fa0f01664b', '2024-11-09 17:50:31'),
(9, 'A', 'asa@gmail.com', '123', 'every week', 'start of the week', 96002.00, '', 'PAYPAL-67334a316787e', '2024-11-12 12:29:04'),
(10, 'ASAD', 'asa@gmail.com', '34123', 'every 5 months', 'start of the week', 96002.00, '', 'BANKTRANSFER-67334b8ea848f', '2024-11-12 12:34:03'),
(11, 'DSsdf', 'asa@gmail.com', 'try', 'every 5 months', 'middle of the week', 96002.00, '', 'BANKTRANSFER-67334bf141a52', '2024-11-12 12:36:23');

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
(3, 22, 13),
(4, 32, 11),
(5, 32, 12),
(6, 32, 13),
(7, 33, 11),
(8, 33, 12),
(9, 33, 13),
(10, 34, 11),
(11, 34, 12),
(12, 34, 13),
(13, 1, 11),
(14, 1, 12),
(15, 1, 13),
(16, 2, 11),
(17, 2, 12),
(18, 2, 13),
(19, 3, 11),
(20, 3, 12),
(21, 3, 13),
(22, 4, 11),
(23, 4, 12),
(24, 4, 13),
(25, 5, 11),
(26, 5, 12),
(27, 5, 13),
(28, 6, 11),
(29, 6, 12),
(30, 6, 13),
(31, 7, 11),
(32, 7, 12),
(33, 7, 13),
(34, 8, 11),
(35, 8, 12),
(36, 8, 13),
(37, 9, 11),
(38, 9, 12),
(39, 9, 13),
(40, 10, 11),
(41, 10, 12),
(42, 10, 13),
(43, 11, 11),
(44, 11, 12),
(45, 11, 13);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
