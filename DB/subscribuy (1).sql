-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 05:57 PM
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
(15, 'malshika8chamodi@gmail.com', 'test', '12/17', 0);

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
('C004', '6', 4, 'good'),
('C004', '6', 3, 'hello'),
('C004', '6', 4, 'dd'),
('C004', '6', 4, 'ff'),
('C004', '6', 4, 'ee'),
('C004', '7', 4, 'er'),
('C004', '7', 2, 'gg'),
('C004', '7', 1, 'dd'),
('C004', '7', 4, 'hri'),
('C004', '6', 3, 'hri nathoo'),
('C004', '8', 4, 'good');

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
(6, 'westen food package', 'food-and-beverages', 'pizza\r\nburger', 2450.00, 'uploads/pizza-western-food-italian-food-catering-materials-food-map-pizza-food-cuisine-cuisine-cuisine-cuisine-background-celebrity-chef-312227390.webp'),
(7, 'fresh vegi package', 'fruits-and-vegetables', 'Carrots\r\nleeks\r\nOnions', 2399.00, 'uploads/360_F_908958251_uWGohK7sEPuNnCXGrzm6XXK9xkOZbq1x.jpg'),
(8, 'burger package', 'food-and-beverages', 'burger', 999.00, 'uploads/596235_sld.jpg'),
(9, 'Strawberry Cake', 'bakery-items', 'Cake', 1250.00, 'uploads/images (3).jpg');

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
  `order_status` varchar(20) DEFAULT 'toPay',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `tracking_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `c_id`, `fullname`, `email`, `address`, `duration`, `renieve`, `total_price`, `payment_status`, `transaction_id`, `order_date`, `order_status`, `start_date`, `end_date`, `tracking_id`) VALUES
(45, 'C004', 'sanindu', 'sdewsithwithanachchi@gmail.com', 'galle', 'every 4 months', 'start of the month', 2450.00, 'paid', 'PAYPAL-6765ba7cc220e', '2024-12-20 18:41:20', 'reviewed', '0000-00-00', '0000-00-00', ''),
(47, 'C004', 'dewsith', 'sdewsithwithanachchi@gmail.com', 'galle', 'every two weeks', 'middle of the week', 2399.00, 'paid', 'PAYPAL-6765c46112769', '2024-12-20 19:24:15', 'DeliveredConfirmed', '0000-00-00', '0000-00-00', ''),
(48, 'C004', 'nushadi', 'asa@gmail.com', 'kandy', 'every 6 months', 'start of the month', 999.00, 'paid', 'PAYPAL-6765c4c9b888b', '2024-12-20 19:26:00', 'reviewed', '0000-00-00', '0000-00-00', ''),
(49, 'C004', 'Deepani', 'asa@gmail.com', 'galle', 'every 4 months', 'middle of the month', 1250.00, 'paid', 'PAYPAL-6765c9fa2a462', '2024-12-20 19:48:07', 'DeliveredConfirmed', '0000-00-00', '0000-00-00', ''),
(50, 'C004', 'aasas', 'asa@gmail.com', 'asda', 'every 6 months', 'middle of the week', 2450.00, 'paid', 'PAYPAL-67698730a0488', '2024-12-23 15:49:53', 'delivered', '2025-01-01', '2025-01-01', '1OB4LT8HPD');

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
(97, 45, 48, 6),
(98, 46, 49, 7),
(99, 47, 50, 7),
(100, 48, 51, 8),
(101, 49, 52, 9),
(102, 50, 53, 6);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
