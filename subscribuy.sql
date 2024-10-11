-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 11, 2024 at 05:08 AM
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
('AC001', 'phone', 'electronic', 'iwuediu', 120000.00, 'uploads/gauge-temperature-icon-free-vector.jpg'),
('AC003', 'phone', 'electronic', 'iwuediu', 120000.00, 'uploads/gauge-temperature-icon-free-vector.jpg'),
('AC004', 'item 2', 'electronic', 'hello', 12000.00, 'uploads/wallpaperflare.com_wallpaper.jpg'),
('AC005', 'item 2', 'electronic', 'hello', 12000.00, 'uploads/PXL_20240930_055809146.jpg'),
('AC007', 'item 2', 'electronic', 'hello', 12000.00, 'uploads/PXL_20240930_055809146.jpg');

--
-- Indexes for dumped tables
--

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
