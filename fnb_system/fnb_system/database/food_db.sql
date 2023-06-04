-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 04, 2023 at 12:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` varchar(15) NOT NULL,
  `adm_name` varchar(50) NOT NULL,
  `adm_username` varchar(20) NOT NULL,
  `adm_password` varchar(20) NOT NULL,
  `adm_email` varchar(20) NOT NULL,
  `adm_phonenum` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_name`, `adm_username`, `adm_password`, `adm_email`, `adm_phonenum`) VALUES
('AD94525', 'alif', 'ba', '123', 'alif@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` varchar(15) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_username` varchar(20) NOT NULL,
  `cust_password` varchar(20) NOT NULL,
  `cust_email` varchar(20) NOT NULL,
  `cust_phonenum` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_username`, `cust_password`, `cust_email`, `cust_phonenum`) VALUES
('CU63118', 'imran', 'mustafa', 'imran123', 'imran@gmail.com', '123'),
('CU67636', 'imran', 'mustafa', 'imran123', 'imran@gmail.com', '123'),
('CU18624', 'din', 'dol', 'din123', 'din@gmail.com', '1234'),
('CU41839', 'im', 'ta', '1232', 'sss@yahoo.com', '12121212'),
('CU95015', 'alif', 'ba', '123', 'alif@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `address`, `latitude`, `longitude`) VALUES
(1, 'RESTORAN AL - MASHA (MAKANAN ISLAM)', 'A63, Jln IM 7/1, Bandar Indera Mahkota, 25200 Kuantan, Pahang', 3.834847, 103.301163),
(2, 'RESTORAN AL - MASHA (MAKANAN ISLAM)', 'A63, Jln IM 7/1, Bandar Indera Mahkota, 25200 Kuantan, Pahang', 3.834867, 103.301170),
(3, 'Alkawthar Restaurant Kuantan Im 7', 'a37, Jln IM 7/1, Bandar Indera Mahkota, 25200 Kuantan, Pahang', 3.834934, 103.301941);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `shop_id` varchar(15) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_description` text NOT NULL,
  `menu_price` decimal(10,2) NOT NULL,
  `menu_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`shop_id`, `menu_name`, `menu_description`, `menu_price`, `menu_image`) VALUES
('SH172', 'Chicken Mandi', 'rice with chicken', '20.00', '2022-01-02.jpg'),
('SH172', 'Shawarma Chicken', 'chicken slices wrapped with roti', '7.00', '2021-11-19.jpg'),
('SH124', 'Nasi Goreng', 'Fried rice with different styles available', '7.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `own_id` varchar(15) NOT NULL,
  `own_name` varchar(50) NOT NULL,
  `own_username` varchar(20) NOT NULL,
  `own_password` varchar(20) NOT NULL,
  `own_email` varchar(20) NOT NULL,
  `own_phonenum` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`own_id`, `own_name`, `own_username`, `own_password`, `own_email`, `own_phonenum`) VALUES
('OW65943', 'alif', 'ba', '123', 'alif@gmail.com', '1234345678');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `own_id` varchar(15) DEFAULT NULL,
  `shop_id` varchar(15) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_type` varchar(20) NOT NULL,
  `shop_phonenum` varchar(12) NOT NULL,
  `shop_email` varchar(50) NOT NULL,
  `shop_address` varchar(200) NOT NULL,
  `shop_operationhour` varchar(20) NOT NULL,
  `shop_latitude` decimal(10,8) DEFAULT NULL,
  `shop_longitude` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`own_id`, `shop_id`, `shop_name`, `shop_type`, `shop_phonenum`, `shop_email`, `shop_address`, `shop_operationhour`, `shop_latitude`, `shop_longitude`) VALUES
(NULL, 'SH172', 'Alkawthar Restaurant Kuantan Im 7', 'restaurant', '01119884080', 'alkawthar@gmail.com', 'a37, Jln IM 7/1, Bandar Indera Mahkota, 25200 Kuantan, Pahang', '10am - 8pm', '3.83491000', '103.30195000'),
(NULL, 'SH124', 'Feed Zone ABC', 'Restaurant', '0139986996', 'abc@gmail.com', 'Jln IM 7/1, Bandar Indera Mahkota, 25200 Kuantan, Pahang', '10.45am - 10.45pm', '3.83481000', '103.30131000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
