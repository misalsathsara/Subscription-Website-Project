-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 11, 2024 at 05:32 AM
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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('1', '', '0', '0', '', '', ''),
('10', '', '0', '0', '', '', ''),
('11', '', '0', '0', '', '', ''),
('12', '', '0', '0', '', '', ''),
('2', '', '0', '0', '', '', ''),
('3', '', '0', '0', '', '', ''),
('4', '', '0', '0', '', '', ''),
('5', '', '0', '0', '', '', ''),
('6', '', '0', '0', '', '', ''),
('7', '', '0', '0', '', '', ''),
('8', '', '0', '0', '', '', ''),
('9', '', '0', '0', '', '', ''),
('C001', '', '0', '0', '', '', ''),
('C002', '', '0', '0', '', '', ''),
('C100', '', '0', '0', '', '', ''),
('C101', '', '0', '0', '', '', ''),
('C102', '', '0', '0', '', '', ''),
('C103', 'sf', '0', '0', 'fdfad', '', ''),
('C104', 'sf', 'ranugadeepna2002@gmail.com', '++9423144444', 'fdfad', '', ''),
('C105', 'sf', 'ranugadeepna2002@gmail.com', '++9423144444', 'hi hi', 'ranuga', '$2y$10$xC1n5EgbEh7lRLnDtjx0uO7GZUI4.i/JsNjMPiw1T.GTPGEqBaWxO');

-- --------------------------------------------------------

--
-- Table structure for table `c_reviews`
--

CREATE TABLE `c_reviews` (
  `c_id` varchar(11) NOT NULL,
  `n_id` varchar(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
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
('c009', 'AC001', 2, 'khadvbjcabhkcna skcbas\r\nasd\r\nasdas\r\nda\r\nsdas\r\nda\r\n\r\na\r\nfa\r\nf\r\na\r\nfa\r\ndfa\r\nddfaf\r\nasfa\r\nsfa\r\nsfa\r\nsfa\r\nsfas\r\nfas\r\nfasdfasf');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `n_id` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`n_id`, `name`, `type`, `description`, `price`, `image`) VALUES
('001', 'Healthy Food', 'beauty', 'msdkmkd', 5000.00, 'uploads/healthy food pack.jpg'),
('AC001', 'phone', 'electronic', 'iwuediu', 120000.00, 'uploads/gauge-temperature-icon-free-vector.jpg'),
('AC003', 'phone', 'electronic', 'iwuediu', 120000.00, 'uploads/gauge-temperature-icon-free-vector.jpg'),
('AC004', 'item 2', 'electronic', 'hello', 12000.00, 'uploads/wallpaperflare.com_wallpaper.jpg'),
('AC005', 'item 2', 'electronic', 'hello', 12000.00, 'uploads/PXL_20240930_055809146.jpg'),
('AC007', 'item 2', 'electronic', 'hello', 12000.00, 'uploads/PXL_20240930_055809146.jpg');

--
-- Indexes for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
