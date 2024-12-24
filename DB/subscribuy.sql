-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 24, 2024 at 07:21 AM
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
(0, 'dewsith', 'asa@gmail.com', '$2y$10$fqBV0VtSxAV1ztumPjJybemI.zMX5SJwkV3CAJQwpL1fNd93LNlCO', 'Admin'),
(0, 'Admin', 'admin@gmail.com', '$2y$10$nGlRR//whEnfsLe7JMa1BOCf4mvFalMffwdWiNP9iYNc2lMXZF0ba', 'Admin');

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
(15, 'malshika8chamodi@gmail.com', 'test', '12/17', 0),
(16, 'ranuga@gmail.com', 'subject1', 'test', 1);

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
('C006', 'dewsith', 'sdewsithwithanachchi@gmail.com', '0778694566', 'galle', 'dewsith', '$2y$10$W.5tI/xw6kYb.sU.8iEMx.sHZHrVFEogX4mcXDFLj1XpdA0IQyGjW', 1),
('C007', 'Sanindu Dewsith', 'misal@gmail.com', '0725996510', 'galle', 'sathsara', '$2y$10$7R6tlma..0edpEE.Ar88ce4wZhO87fYRDd0W2cxrrmBQpuyvFkoeG', 0);

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
('C004', '8', 4, 'good'),
('C007', '9', 3, 'good');

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
(9, 'Strawberry Cake', 'bakery-items', 'Cake', 1250.00, 'uploads/images (3).jpg'),
(10, 'Spices', 'groceries', 'This package includes \r\n1) salt 200g pack\r\n2)chili powder 200g pack\r\n3)turmeric powder 100g\r\n', 750.00, 'uploads/grocery-and-pulses-packaging.jpg'),
(11, 'Fruit Package', 'fruits-and-vegetables', 'This package includes\r\n1) banana 1kg\r\n2)apple 400g\r\n3)grapes 200g', 1250.00, 'uploads/593f5f5c3011f7f70aa30af3bddb3910.jpg'),
(12, 'Grocery Items ', 'groceries', 'This package include \r\n1)Keeri samba rice 2kg\r\n2)Noodles 300g 2 packs\r\n3)sugar 400g packs\r\n4)Soya meat 150g 2 packs\r\n', 1450.00, 'uploads/68837027_689373823503_0.19650400-1672221458.jpg'),
(13, 'Grocery Items ', 'groceries', 'This package includes \r\n1)noodles\r\n2)vegies', 700.00, 'uploads/5556bd86629619d24464a3163ed8962c.png_960x960q80.png_.webp');

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
(45, 'C004', 'sanindu', 'sdewsithwithanachchi@gmail.com', 'galle', 'every 4 months', 'start of the month', 245550.00, 'paid', 'PAYPAL-6765ba7cc220e', '2024-12-20 18:41:20', 'reviewed', '0000-00-00', '0000-00-00', ''),
(47, 'C004', 'dewsith', 'sdewsithwithanachchi@gmail.com', 'galle', 'every two weeks', 'middle of the week', 2399.00, 'paid', 'PAYPAL-6765c46112769', '2024-11-20 19:24:15', 'DeliveredConfirmed', '0000-00-00', '0000-00-00', ''),
(48, 'C004', 'nushadi', 'asa@gmail.com', 'kandy', 'every 6 months', 'start of the month', 999.00, 'paid', 'PAYPAL-6765c4c9b888b', '2024-10-20 19:26:00', 'reviewed', '0000-00-00', '0000-00-00', ''),
(49, 'C004', 'Deepani', 'asa@gmail.com', 'galle', 'every 4 months', 'middle of the month', 1250.00, 'paid', 'PAYPAL-6765c9fa2a462', '2024-09-20 19:48:07', 'DeliveredConfirmed', '0000-00-00', '0000-00-00', ''),
(50, 'C004', 'aasas', 'asa@gmail.com', 'asda', 'every 6 months', 'middle of the week', 2450.00, 'paid', 'PAYPAL-67698730a0488', '2024-12-23 15:49:53', 'delivered', '2025-01-01', '2025-01-01', '1OB4LT8HPD'),
(51, 'C001', 'Nuwan Perera', 'nuwan.perera@example.com', '123 Main Street, Colombo', '1 week', 'Extra Care', 12500.00, 'paid', 'TXN001', '2024-11-28 05:00:00', 'toPay', '2024-11-28', '2024-12-05', 'TRK123456789'),
(52, 'C002', 'Sanduni Silva', 'sanduni.silva@example.com', '456 Beach Road, Galle', '2 weeks', 'Standard', 24000.00, 'pending', 'TXN002', '2024-11-29 08:45:00', 'processing', '2024-11-29', '2024-12-13', 'TRK123456790'),
(53, 'C003', 'Ruwan Jayasinghe', 'ruwan.jayasinghe@example.com', '789 Temple Road, Kandy', '1 month', NULL, 50000.00, 'paid', 'TXN003', '2024-11-30 04:15:00', 'shipped', '2024-11-30', '2024-12-30', 'TRK123456791'),
(54, 'C004', 'Dilini Fernando', 'dilini.fernando@example.com', '321 Garden Avenue, Matara', '3 days', 'Express', 3000.00, 'failed', 'TXN004', '2024-11-30 11:50:00', 'toPay', '2024-11-30', '2024-12-02', 'TRK123456792'),
(55, 'C005', 'Kavindu De Silva', 'kavindu.desilva@example.com', '654 Forest Lane, Kurunegala', '2 weeks', 'Premium', 18000.00, 'paid', 'TXN005', '2024-11-27 05:30:00', 'delivered', '2024-11-27', '2024-12-11', 'TRK123456793'),
(56, 'C006', 'Tharindu Weerasinghe', 'tharindu.weerasinghe@example.com', '10 Lake View Road, Colombo', '1 week', 'Standard', 15000.00, 'paid', 'TXN006', '2024-12-17 04:45:00', 'shipped', '2024-12-17', '2024-12-24', 'TRK123456794'),
(57, 'C007', 'Amali Wijesinghe', 'amali.wijesinghe@example.com', '22 Palm Drive, Negombo', '5 days', 'Express', 8000.00, 'pending', 'TXN007', '2024-12-18 09:15:00', 'processing', '2024-12-18', '2024-12-23', 'TRK123456795'),
(58, 'C008', 'Sahan Perera', 'sahan.perera@example.com', '37 Temple Lane, Galle', '3 days', NULL, 4500.00, 'paid', 'TXN008', '2024-12-19 04:00:00', 'delivered', '2024-12-19', '2024-12-22', 'TRK123456796'),
(59, 'C009', 'Nadeesha Dissanayake', 'nadeesha.dissanayake@example.com', '54 Station Road, Kandy', '2 weeks', 'Premium', 28000.00, 'failed', 'TXN009', '2024-12-20 05:40:00', 'toPay', '2024-12-20', '2024-12-27', 'TRK123456797'),
(60, 'C010', 'Rashmi Fernando', 'rashmi.fernando@example.com', '89 River View, Matara', '1 week', 'Standard', 17000.00, 'paid', 'TXN010', '2024-12-21 10:30:00', 'shipped', '2024-12-21', '2024-12-28', 'TRK123456798'),
(61, 'C011', 'Kasun Ratnayake', 'kasun.ratnayake@example.com', '12 High Street, Kurunegala', '10 days', 'Express', 22000.00, 'pending', 'TXN011', '2024-12-22 02:50:00', 'processing', '2024-12-22', '2024-12-30', 'TRK123456799'),
(62, 'C012', 'Chathurika Jayasuriya', 'chathurika.jayasuriya@example.com', '45 Mountain Drive, Nuwara Eliya', '2 weeks', 'Premium', 32000.00, 'paid', 'TXN012', '2024-12-23 07:20:00', 'delivered', '2024-12-23', '2024-12-30', 'TRK123456800'),
(63, 'C013', 'Lakshan Karunaratne', 'lakshan.karunaratne@example.com', '15 Green Path, Colombo', '1 week', 'Standard', 20000.00, 'paid', 'TXN013', '2024-12-23 05:00:00', 'processing', '2024-12-23', '2024-12-30', 'TRK123456801'),
(64, 'C014', 'Ishani Rodrigo', 'ishani.rodrigo@example.com', '75 Sunset Boulevard, Negombo', '5 days', 'Express', 12000.00, 'pending', 'TXN014', '2024-12-23 09:15:00', 'shipped', '2024-12-23', '2024-12-28', 'TRK123456802'),
(65, 'C015', 'Nimal Perera', 'nimal.perera@example.com', '8 Ocean Drive, Galle', '2 weeks', 'Premium', 45000.00, 'paid', 'TXN015', '2024-12-24 03:30:00', 'toPay', '2024-12-24', '2024-12-31', 'TRK123456803'),
(66, 'C016', 'Ruvini Jayawardena', 'ruvini.jayawardena@example.com', '42 Hill Road, Kandy', '1 month', NULL, 75000.00, 'failed', 'TXN016', '2024-12-24 05:45:00', 'delivered', '2024-12-24', '2025-01-24', 'TRK123456804'),
(67, 'C007', 'Misal sthsara', 'Misal@gmail.com', 'Galle', 'every week', 'start of the week', 4648.00, 'paid', 'PAYPAL-676a4115d6fe3', '2024-12-24 05:04:57', 'DeliveredConfirmed', '2024-12-24', '2025-01-24', '2KXACMOBPU'),
(68, 'C007', 'Misal sthsara', 'misal.sathsara@ecyber.com', 'galle', 'every two weeks', 'start of the week', 1250.00, 'paid', 'PAYPAL-676a42e687ac1', '2024-12-24 05:13:07', 'shipped', '2024-12-24', '2025-02-24', '1TIHYBF6R9');

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
(102, 50, 53, 6),
(103, 67, 54, 7),
(104, 67, 55, 8),
(105, 67, 56, 9),
(106, 68, 57, 11);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
