-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 20, 2024 at 08:44 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Super Admin') DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'ranuga', 'assa', 'sa', 'Admin'),
(2, 'Ranuga  Deepna', 'sa@gmail.com', '$2y$10$KESOyLBy7FDkiSDKj3.33O84JXOa7BiqbFlqjeraJt.U7PnNa5Vre', 'Admin'),
(3, 'Nirani upuli deepika', 'mmmma@gmail.com', '$2y$10$B4.8KQNBLBOdddeZGJ3JN.ntVdKjotjtx.KCPXTBN6Qi.NJelHqAe', 'Admin'),
(0, 'dewsith', 'asa@gmail.com', '$2y$10$fqBV0VtSxAV1ztumPjJybemI.zMX5SJwkV3CAJQwpL1fNd93LNlCO', 'Admin');

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

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL,
  `seen` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `subject`, `message`, `seen`) VALUES
(2, 'ranuga@gmail.com', 'Moda chamodi', 'Moda chamodi', 1),
(13, 'sanidu.devsith@ecyber.com', 'test', '12/17', 1),
(14, 'ranuga.deepna@ecyber.com', 'test', '12/17', 1),
(15, 'malshika8chamodi@gmail.com', 'test', '12/17', 1);

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
  `c_pwd` varchar(500) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_email`, `c_tel`, `c_address`, `c_uname`, `c_pwd`, `active_status`) VALUES
('C004', 'sanindu', 'ranuga@gmail.com', '28848842', 'ssasa', 'sanindu', '$2y$10$ewduKpdkjeSHaVGc1BeN9.8LlKVjo9C.kkfemx0aSqN.22Q794HV6', 1),
('C005', 'Misal Sathsara', 'misal.sathsara@ecyber.com', '0775285042', 'Baddegama', 'misal', '$2y$10$EHHiZGksr3fB328SgwHzzen4P.U1jRUIlPui32/jGlwUniJ3TRvp2', 0),
('C006', 'dewsith', 'sdewsithwithanachchi@gmail.com', '0778694566', 'galle', 'dewsith', '$2y$10$W.5tI/xw6kYb.sU.8iEMx.sHZHrVFEogX4mcXDFLj1XpdA0IQyGjW', 1);

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
  `c_id` varchar(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `renieve` varchar(255) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_status` enum('pending','paid','failed') DEFAULT 'pending',
  `transaction_id` varchar(255) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(20) DEFAULT 'toPay'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `c_id`, `fullname`, `email`, `address`, `duration`, `renieve`, `total_price`, `payment_status`, `transaction_id`, `order_date`, `order_status`) VALUES
(22, '0', 'wwqd', 'sdewsithwithanachchi@gmail.com', 'wew', 'every 4 months', 'middle of the week', 5123.00, 'paid', 'PAYPAL-6753321db243f', '2024-12-06 17:15:19', 'delivered'),
(23, '0', 'qe', 'sdewsithwithanachchi@gmail.com', 'dd', 'every 5 months', 'middle of the week', 96002.00, 'pending', NULL, '2024-12-06 17:20:57', 'processing'),
(24, '0', 'aasas', 'asa@gmail.com', 'fsdfsd', 'every 3 months', 'middle of the week', 420236.00, 'paid', 'PAYPAL-67618967b04d8', '2024-12-17 14:00:56', 'processing'),
(25, '0', 'aasas', 'asa@gmail.com', 'dwdw', 'every 5 months', 'end of the week', 96002.00, 'paid', 'PAYPAL-6761c254737f7', '2024-12-17 18:26:22', 'processing'),
(26, '0', 'ASAD', 'sdewsithwithanachchi@gmail.com', 'af', 'every 5 months', 'middle of the month', 5000.00, 'paid', 'BANKTRANSFER-6761c3da297f1', '2024-12-17 18:31:57', 'processing'),
(27, 'C004', 'ASAD', 'asa@gmail.com', 'asfas', 'every 4 months', 'middle of the week', 5000.00, 'paid', 'PAYPAL-67641becc7416', '2024-12-19 13:12:09', 'pending'),
(28, 'C006', 'dewsith', 'sdewsithwithanachchi@gmail.com', 'edfqef', 'every 4 months', 'start of the month', 123.00, 'paid', 'PAYPAL-67641df77de1c', '2024-12-19 13:21:54', 'pending'),
(29, 'C006', 'DSsdf', 'sdewsithwithanachchi@gmail.com', 'wf', 'every 5 months', 'end of the week', 90879.00, 'paid', 'PAYPAL-67641f3910dfc', '2024-12-19 13:27:19', 'pending'),
(30, 'C006', 'DSsdf', 'asa@gmail.com', 'wer', 'every 6 months', 'start of the week', 123.00, 'paid', 'PAYPAL-67641fd6d1f73', '2024-12-19 13:29:56', 'pending'),
(31, 'C006', 'DSsdf', 'asa@gmail.com', 'hghg', 'every 4 months', 'middle of the week', 123.00, 'paid', 'PAYPAL-6764223e73cfc', '2024-12-19 13:39:34', 'pending'),
(32, 'C006', 'ef', 'asa@gmail.com', 'er', 'every 5 months', 'middle of the week', 324234.00, 'paid', 'PAYPAL-676428dbe4103', '2024-12-19 14:08:19', 'pending'),
(33, 'C006', 'DSsdf', 'asa@gmail.com', 'qwe', 'every 5 months', 'end of the week', 324234.00, 'paid', 'PAYPAL-676429928e0ab', '2024-12-19 14:11:27', 'pending'),
(34, 'C004', 'wefw', 'asa@gmail.com', 'we', 'every year', 'middle of the month', 324234.00, 'paid', 'PAYPAL-67642ce9a1b70', '2024-12-19 14:25:43', 'recived'),
(35, 'C004', 'ASAD', 'asa@gmail.com', 'S', 'every 6 months', 'middle of the month', 324234.00, 'paid', 'PAYPAL-67642db19eb2e', '2024-12-19 14:29:04', 'pending'),
(36, 'C006', 'dewsith', 'sdewsithwithanachchi@gmail.com', 'ad', 'every 6 months', 'start of the week', 90879.00, 'paid', 'PAYPAL-67642df86d9b1', '2024-12-19 14:30:14', 'pending'),
(37, 'C004', 'aasas', 'asa@gmail.com', 'sdfdf', 'every 4 months', 'middle of the week', 324234.00, 'paid', 'PAYPAL-67642eb466a78', '2024-12-19 14:33:22', 'pending'),
(38, 'C004', 'asd', 'sdewsithwithanachchi@gmail.com', 'asd', 'every 4 months', 'middle of the week', 123.00, 'paid', 'PAYPAL-67642f27dff94', '2024-12-19 14:35:18', 'pending'),
(39, 'C004', 'aasas', 'asa@gmail.com', 'qwe', 'every 6 months', 'end of the month', 324234.00, 'paid', 'PAYPAL-67642fbbe318c', '2024-12-19 14:36:52', 'pending'),
(40, 'C004', 'aasas', 'sdewsithwithanachchi@gmail.com', 'ad', 'every 6 months', 'start of the week', 324234.00, 'paid', 'PAYPAL-6764323209c3c', '2024-12-19 14:47:43', 'pending'),
(41, 'C004', 'ASAD', 'asa@gmail.com', 'eqe', 'every week', 'start of the week', 90879.00, 'paid', 'PAYPAL-6764327a26bc3', '2024-12-19 14:49:28', 'pending'),
(42, 'C004', 'DSsdf', 'asa@gmail.com', 'as', 'every 6 months', 'middle of the month', 90879.00, 'paid', 'PAYPAL-676432fcafd3b', '2024-12-19 14:51:39', 'pending'),
(43, 'C004', 'dewsith', 'asa@gmail.com', 'wer', 'every 4 months', 'middle of the week', 96002.00, 'paid', 'PAYPAL-6764528963a43', '2024-12-19 17:06:15', 'pending'),
(44, 'C004', 'adf', 'sahanamugodage@gmail.com', 'aesf', 'every two weeks', 'start of the week', 5000.00, 'paid', 'PAYPAL-6764ea4f5609d', '2024-12-20 03:53:47', 'pending'),
(45, 'C004', 'adf', 'sahanamugodage@gmail.com', 'zdf', 'every 4 months', 'middle of the week', 123.00, 'paid', 'PAYPAL-6764eb0c796ca', '2024-12-20 03:56:56', 'pending'),
(46, 'C004', 'adf', 'sahanamugodage@gmail.com', 'sa', 'every 5 months', 'end of the week', 5000.00, 'paid', 'PAYPAL-6764eca134ce4', '2024-12-20 04:03:42', 'pending'),
(47, 'C004', 'ssds', 'sahanamugodage@gmail.com', 'sdsd', 'every 2 months', 'middle of the week', 5000.00, 'paid', 'PAYPAL-6764ed372ba0b', '2024-12-20 04:06:10', 'pending'),
(48, 'C004', 'ssds', 'sahanamugodage@gmail.com', 'xzczc', 'every 5 months', 'middle of the week', 123.00, 'paid', 'PAYPAL-6764edd2e69d6', '2024-12-20 04:08:48', 'pending'),
(49, 'C004', 'sd', 'sdewsithwithanachchi@gmail.com', 'ds', 'every 3 months', 'middle of the week', 5000.00, 'paid', 'PAYPAL-6764ee6333585', '2024-12-20 04:10:30', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `n_id`) VALUES
(64, 22, 14, 1),
(65, 22, 15, 2),
(66, 23, 16, 2),
(67, 23, 17, 3),
(68, 23, 18, 1),
(69, 24, 16, 2),
(70, 24, 17, 3),
(71, 24, 18, 1),
(72, 24, 19, 4),
(73, 25, 20, 2),
(74, 25, 21, 1),
(75, 25, 22, 3),
(76, 26, 23, 1),
(77, 27, 29, 1),
(78, 28, 30, 2),
(79, 29, 31, 3),
(80, 30, 32, 2),
(81, 31, 32, 2),
(82, 32, 33, 4),
(83, 33, 34, 4),
(84, 34, 35, 4),
(85, 35, 36, 4),
(86, 36, 37, 3),
(87, 37, 38, 4),
(88, 38, 39, 2),
(89, 39, 40, 4),
(90, 40, 41, 4),
(91, 41, 42, 3),
(92, 42, 43, 3),
(93, 43, 44, 2),
(94, 43, 45, 1),
(95, 43, 46, 3),
(96, 44, 47, 1),
(97, 45, 48, 2),
(98, 46, 49, 1),
(99, 47, 50, 1),
(100, 48, 51, 2),
(101, 49, 52, 1);

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

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `username`, `bank_name`, `account_number`, `payment_amount`, `payment_date`) VALUES
(1, 1001, 'john_doe', 'Bank of America', '1234567890', 150.75, '2024-12-01 05:00:00'),
(2, 1002, 'jane_smith', 'Chase Bank', '9876543210', 200.50, '2024-12-02 09:15:00'),
(3, 1003, 'robert_brown', 'Wells Fargo', '1122334455', 120.00, '2024-12-03 03:30:00'),
(4, 1004, 'linda_white', 'Citibank', '6677889900', 300.25, '2024-12-04 05:45:00'),
(5, 1005, 'michael_green', 'HSBC', '5566778899', 450.00, '2024-12-05 10:50:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
