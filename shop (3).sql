-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 10:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `a`
--

CREATE TABLE `a` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(70) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a`
--

INSERT INTO `a` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'noroz', 'noroz@gmail.com', 'about mic detail', 'hello world');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`) VALUES
(4, 'microphones');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `parent_id`) VALUES
(7, 'Microphones', 0),
(8, 'Microphones', 7);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `order_id` varchar(200) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_des` text DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `product_img` text DEFAULT NULL,
  `product_status` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `order_id`, `product_name`, `product_des`, `product_price`, `product_qty`, `product_img`, `product_status`, `cat_id`, `brand_id`) VALUES
(3, '1', 'Dynamic microphones', 'Dynamic microphones that are great for all your audio needs | - Times of India', 37, 1, '1.webp', 1, 7, 4),
(5, '2', 'NT1', 'Vocal Legend With its exceptionally smooth frequency response, ultra-low self-noise and tight cardioid polar pattern, NT1 is the go-to microphone for a wide range of vocalists. Offering the sought-after sound of classic studio microphones.', 159, 1, 'RØDE_NT1_SM6_KIT_3-QUARTER_LEFT_FRONT_1080x1080.png', 1, 8, 4),
(6, '3', 'A dynamic microphone', 'A dynamic microphone is a passive mic that utilizes a conductive coil attached to its diaphragm and a permanent magnetic field to produce its mic signal', 67, 1, '2.jpg', 1, 8, 4),
(7, '4', 'Audio-Technica AT2005USB', 'Audio-Technica ATR2100x-USB Cardioid Dynamic Microphone (ATR Series)USB and XLR Outputs', 41, 1, '5.jpg', 1, 8, 4),
(8, '5', 'Zoom Dynamic Microphone', 'Zoom Dynamic Microphone for Podcasts, Voice-Overs, Interviews, Vocals, and More, High SPL Capability, Sturdy Metal Body, and Large Diaphragm', 0, 1, '6.jpg', 1, 7, 4),
(10, '8', 'Universal Audio SD-1 Standard Dynamic Microphone', 'Universal Audio SD-1 Standard Dynamic Microphone, White  Visit the Universal Audio Store 4.7 4.7 out of 5 stars    29 ratings | 3 answered questions $299.00 $162.36 Shipping & Import Fees Deposit to Pakistan Details  Style: Microphone', 299, 1, '8.jpg', 1, 7, 4),
(11, '9', 'Audio-Technica AT2005USB ', 'udio-Technica AT2005USB Cardioid Dynamic USB/XLR Microphone,Black Visit the Audio-Technica Store 4.6 4.6 out of 5 stars.', 61, 1, '9.webp', 1, 7, 4),
(14, '13', 'Professional Dynamic Vocal Mic', 'Professional Dynamic Vocal Microphone with On and Off Switch,Cardioid Dynamic Handheld Metal XLR Mic Compatible with AMP/Speaker.', 14.76, 1, '12.jpg', 1, 8, 4),
(15, '14', 'Pyle 3 Piece Professional', 'Pyle 3 Piece Professional Dynamic Microphone Kit Cardioid Unidirectional Vocal Handheld MIC with Hard Carry Case & Bag.', 85.98, 1, '14.jpg', 1, 7, 4),
(17, '17', 'Samson Technologies Q9U', 'Samson Technologies Q9U Dynamic Broadcast Microphone, XLR/USB, Black Visit the Samson Store', 54, 1, '16.jpg', 1, 7, 4),
(18, '19', 'UA Volt 276 Studio Pack ', 'UA Volt 276 Studio Pack for recording, podcasting, and streaming with USB Interface, Mic, Headphones.', 311, 1, '17.webp', 1, 7, 4),
(19, '20', 'Pyle, UHF Wireless System ', 'Pyle, UHF Wireless System Kit-Portable Professional Battery Operated Handheld Dynamic Unidirectional Cordless Microphone ', 211, 1, '18.webp', 1, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `cid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `pprice` float DEFAULT NULL,
  `ipaddress` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`cid`, `pid`, `pprice`, `ipaddress`) VALUES
(7, 3, 0, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pwd` text DEFAULT NULL,
  `status` text DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`id`, `name`, `email`, `pwd`, `status`) VALUES
(1, 'noroz', 'noroz@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a`
--
ALTER TABLE `a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CatPrd` (`cat_id`),
  ADD KEY `FK_BrandPrd` (`brand_id`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a`
--
ALTER TABLE `a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_BrandPrd` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_CatPrd` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
