-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2024 at 07:19 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `c_id` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `n_id` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `c_id`, `n_id`, `username`) VALUES
(16, 'C004', '2', 'sanindu'),
(17, 'C004', '3', 'sanindu'),
(18, 'C004', '1', 'sanindu'),
(19, 'C004', '4', 'sanindu');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `seen` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `subject`, `message`, `seen`) VALUES
(2, 'ranuga@gmail.com', 'Moda chamodi', 'Moda chamodi', 1),
(12, 'misal.sathsara@ecyber.com', 'test2', '12/17', 1),
(13, 'sanidu.devsith@ecyber.com', 'test', '12/17', 1),
(14, 'ranuga.deepna@ecyber.com', 'test', '12/17', 1),
(15, 'malshika8chamodi@gmail.com', 'test', '12/17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `c_id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `c_name` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `c_email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `c_tel` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `c_address` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `c_uname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `c_pwd` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`c_id`)
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

DROP TABLE IF EXISTS `c_reviews`;
CREATE TABLE IF NOT EXISTS `c_reviews` (
  `c_id` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `n_id` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int DEFAULT NULL,
  `review_description` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`c_id`,`n_id`)
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

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `n_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`n_id`, `name`, `type`, `description`, `price`, `image`) VALUES
(1, 'Grocery Daily Items', 'home appliance', 'The Grocery Item Daily Items section serves as a practical guide for consumers, helping them make informed choices while shopping for their everyday needs. It can be particularly useful for meal planning, budgeting, and ensuring a balanced diet.', '5000.00', 'uploads/68837027_689373823503_0.19650400-1672221458.jpg'),
(2, 'cream', 'beauty', 'uio', '123.00', 'uploads/images.jpg'),
(3, 'cream', 'beauty', '[op[', '90879.00', 'uploads/images.jpg'),
(4, 'Healthy Fruits', 'electronic', 'DSADAD', '324234.00', 'uploads/360_F_65706597_uNm2SwlPIuNUDuMwo6stBd81e25Y8K8s.jpg'),
(5, 'Healthy Fruits', 'beauty', 'DSADADAYTDFYGF', '32423434.00', 'uploads/360_F_65706597_uNm2SwlPIuNUDuMwo6stBd81e25Y8K8s.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `renieve` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_status` enum('pending','paid','failed') COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `transaction_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `email`, `address`, `duration`, `renieve`, `total_price`, `payment_status`, `transaction_id`, `order_date`) VALUES
(22, 'wwqd', 'sdewsithwithanachchi@gmail.com', 'wew', 'every 4 months', 'middle of the week', '5123.00', 'paid', 'PAYPAL-6753321db243f', '2024-12-06 17:15:19'),
(23, 'qe', 'sdewsithwithanachchi@gmail.com', 'dd', 'every 5 months', 'middle of the week', '96002.00', 'pending', NULL, '2024-12-06 17:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `item_id` int NOT NULL,
  `n_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `n_id`) VALUES
(64, 22, 14, 1),
(65, 22, 15, 2),
(66, 23, 16, 2),
(67, 23, 17, 3),
(68, 23, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `c_id` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `n_id` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `c_id`, `n_id`, `username`) VALUES
(11, 'C004', '3', 'sanindu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
