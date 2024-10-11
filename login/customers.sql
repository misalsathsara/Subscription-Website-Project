-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 06:19 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
