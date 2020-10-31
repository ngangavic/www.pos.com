-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2020 at 10:26 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--
CREATE DATABASE IF NOT EXISTS `pos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pos`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cancel`
--

CREATE TABLE `tbl_cancel` (
  `id` int(11) NOT NULL,
  `productCode` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `transactionNo` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `salesValue` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `employeeId` varchar(100) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cancel`
--

INSERT INTO `tbl_cancel` (`id`, `productCode`, `description`, `transactionNo`, `quantity`, `cost`, `salesValue`, `discount`, `year`, `month`, `day`, `employeeId`, `time`) VALUES
(1, '3263677548', 'FOOD ', '1029', '1', '56', '56', '0', '2018', '03', '18', '5533', '2018-03-18 11:09:23'),
(2, '9776534445', 'Eraser Big', '1029', '1', '35', '35', '0', '2018', '03', '18', '5533', '2018-03-18 11:11:23'),
(3, '3263677548', 'FOOD ', '1029', '1', '56', '56', '0', '2018', '03', '18', '5533', '2018-03-18 11:13:08'),
(4, '9776534445', 'Eraser Big', '1029', '1', '35', '35', '0', '2018', '03', '18', '5533', '2018-03-18 11:13:08'),
(5, '255355677', 'HB pencil ', '1029', '1', '20', '20', '0', '2018', '03', '18', '5533', '2018-03-18 11:13:08'),
(6, '3263677548', 'FOOD ', '1030', '1', '56', '56', '0', '2018', '03', '18', '5533', '2018-03-18 11:14:48'),
(7, '255355677', 'HB pencil ', '1030', '10', '20', '200', '0', '2018', '03', '18', '5533', '2018-03-18 11:15:46'),
(8, '3263677548', 'FOOD ', '1030', '5', '56', '280', '0', '2018', '03', '18', '5533', '2018-03-18 11:15:46'),
(9, '9776534445', 'Eraser Big', '1030', '5', '35', '175', '0', '2018', '03', '18', '5533', '2018-03-18 11:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `customerCode` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postalCode` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dateadded` datetime NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `customerCode`, `name`, `company`, `address`, `city`, `state`, `postalCode`, `phone`, `email`, `dateadded`, `active`) VALUES
(1, '45332367', 'Edith', '', '567', 'KIBAONI', 'KILIFI', '009000', '020312222', 'google@gmail.com', '2018-01-08 18:28:58', 'no'),
(2, '45332368', 'Blabla', '', '567', 'KIBAONI', 'KILIFI', '009000', '020312222', 'google@gmail.com', '2018-01-08 18:29:26', 'no'),
(5, '45332361', 'GOOGLE', '', '567', 'KIBAONI', 'KILIFI', '009000', '020312222', 'google@gmail.com', '2018-01-08 18:29:59', 'no'),
(6, '545846', 'Mary', '', '543', 'Nairobi', 'Nairobi', '00100', '0988765', 'mary@gmail.com', '2018-01-20 15:20:17', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_transaction`
--

CREATE TABLE `tbl_customer_transaction` (
  `id` int(11) NOT NULL,
  `customerCode` varchar(100) NOT NULL,
  `transactionNo` varchar(100) NOT NULL,
  `transactionDate` datetime NOT NULL,
  `productCode` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `name`, `dateAdded`) VALUES
(1, 'CLOTHES', '2018-01-09 18:36:19'),
(2, 'STATIONARY', '2018-03-06 20:44:37'),
(3, 'SHOES', '2018-03-06 20:44:46'),
(4, 'FOOD', '2018-03-06 20:44:55'),
(5, 'FURNITURE', '2018-04-10 13:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_details`
--

CREATE TABLE `tbl_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `footer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_details`
--

INSERT INTO `tbl_details` (`id`, `name`, `address`, `code`, `city`, `phone`, `footer`) VALUES
(1, 'BUSINESS NAME', '432112', '00200', 'NRB', '09887653322', 'Thank for shopping with us.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `percentage` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`id`, `department`, `product`, `percentage`, `date_added`) VALUES
(1, 'FOOD', 'FOOD ', '16', '2019-08-15 21:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `id` int(11) NOT NULL,
  `empId` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idNo` varchar(100) NOT NULL,
  `category` varchar(10) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`id`, `empId`, `name`, `password`, `phone`, `email`, `idNo`, `category`, `dateAdded`) VALUES
(2, '5534', 'Nganga Victor', '0000', '0700352822', 'ngangavictor10@gmail.com', '564113247', '', '2018-01-08 21:28:30'),
(3, '5533', 'Nganga Victor', '0000', '0700352822', 'ngangavictor10@gmail.com', '564113247', '', '2018-01-08 21:28:41'),
(4, '4350', 'Vic', '81dc9bdb52d04dc20036dbd8313ed055', '0700352821', 'nae@gmail.com', '35667329', '', '2019-08-15 19:28:13'),
(7, '5535', 'Vic', '$2y$10$AjAn.9U1hM3LAiRAQkUCbOez19RlZ36W/y.CJ4sNRslVRwkle9FIu', 'Nga', 'nga@gmail.com', '45469', 'admin', '2020-10-31 12:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logins`
--

CREATE TABLE `tbl_logins` (
  `id` int(11) NOT NULL,
  `empId` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logins`
--

INSERT INTO `tbl_logins` (`id`, `empId`, `date`) VALUES
(1, 4350, '2020-10-31 12:21:30'),
(2, 4350, '2020-10-31 12:21:52'),
(3, 4350, '2020-10-31 12:21:58'),
(4, 5535, '2020-10-31 12:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paidout`
--

CREATE TABLE `tbl_paidout` (
  `id` int(11) NOT NULL,
  `transactionDate` date NOT NULL,
  `transactionTime` time NOT NULL,
  `amount` varchar(100) NOT NULL,
  `explanation` text NOT NULL,
  `employeeId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `productCode` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  `sellingPrice` varchar(100) NOT NULL,
  `buyingPrice` varchar(100) NOT NULL,
  `taxcode` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `dateadded` datetime NOT NULL,
  `image` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `productCode`, `description`, `quantity`, `sellingPrice`, `buyingPrice`, `taxcode`, `department`, `dateadded`, `image`, `action`) VALUES
(1, '3263677548', 'FOOD ', 73, '56', '45', 'B', '4', '2018-01-07 14:08:25', 'not available', 'present'),
(2, '489676434', 'Book A4 Pelican', 152, '70', '50', 'A', '2', '2018-01-07 14:11:51', 'not available', 'present'),
(3, '255355677', 'HB pencil ', 199, '20', '15', 'A', '2', '2018-01-07 14:12:33', 'not available', 'present'),
(4, '9776534445', 'Eraser Big', 246, '35', '20', 'A', '2', '2018-01-07 14:13:12', 'not available', 'present'),
(5, '46987754', 'school bag', 50, '1000', '700', 'A', '1', '2018-01-07 14:13:43', 'not available', 'present'),
(6, '577853333', 'Shoes', 30, '400', '350', 'A', '3', '2018-01-07 17:48:11', 'not available', 'present'),
(7, '77677845', 'A4 book', 67, '80', '70', 'A', '2', '2018-01-17 22:09:46', 'not available', 'present');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products_his`
--

CREATE TABLE `tbl_products_his` (
  `id` int(11) NOT NULL,
  `productCode` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `taxcode` varchar(100) NOT NULL,
  `transactionNo` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `salesValue` varchar(100) NOT NULL,
  `paid` varchar(100) NOT NULL,
  `bal` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `employeeId` varchar(100) NOT NULL,
  `customerCode` varchar(100) NOT NULL,
  `buyingPrice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_his`
--

CREATE TABLE `tbl_product_his` (
  `id` int(11) NOT NULL,
  `productCode` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `taxcode` varchar(100) NOT NULL,
  `transactionNo` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `salesValue` varchar(100) NOT NULL,
  `paid` varchar(100) NOT NULL,
  `bal` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `transactionDate` date NOT NULL DEFAULT current_timestamp(),
  `transactionTime` time NOT NULL DEFAULT current_timestamp(),
  `employeeId` varchar(100) NOT NULL,
  `customerCode` varchar(100) NOT NULL,
  `year` year(4) NOT NULL DEFAULT 2019,
  `month` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `buyingPrice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_his`
--

INSERT INTO `tbl_product_his` (`id`, `productCode`, `description`, `taxcode`, `transactionNo`, `quantity`, `cost`, `salesValue`, `paid`, `bal`, `discount`, `transactionDate`, `transactionTime`, `employeeId`, `customerCode`, `year`, `month`, `day`, `buyingPrice`) VALUES
(2, '577853333', 'Shoes', 'A', '1000', '1', '400', '400', '500', '44', '', '2018-03-02', '16:47:17', '1', '1', 2018, '03', '02', '350'),
(15, '577853333', 'Shoes', 'A', '1009', '1', '400', '392', '500', '2', '', '2018-03-05', '15:13:22', '1', '1', 2018, '03', '05', '350'),
(16, '46987754', 'school bag', 'A', '1010', '2', '1000', '1,960', '2500', '2324', '', '2018-03-06', '11:02:49', '1', '1', 2018, '03', '06', '700'),
(17, '9776534445', 'Eraser Big', 'A', '1010', '5', '35', '175', '2500', '2324', '', '2018-03-06', '11:02:49', '1', '1', 2018, '03', '06', '20'),
(18, '46987754', 'school bag', 'A', '1011', '2', '1000', '1,960', '2500', '2324', '', '2018-03-06', '11:06:35', '1', '1', 2018, '03', '06', '700'),
(19, '9776534445', 'Eraser Big', 'A', '1011', '5', '35', '175', '2500', '2324', '', '2018-03-06', '11:06:35', '1', '1', 2018, '03', '06', '20'),
(20, '46987754', 'school bag', 'A', '1012', '2', '1000', '1,960', '2500', '2324', '', '2018-03-06', '11:14:33', '1', '1', 2018, '03', '06', '700'),
(21, '9776534445', 'Eraser Big', 'A', '1012', '5', '35', '175', '2500', '2324', '', '2018-03-06', '11:14:33', '1', '1', 2018, '03', '06', '20'),
(22, '46987754', 'school bag', 'A', '1013', '2', '1000', '1,960', '2500', '2,324', '', '2018-03-06', '11:16:39', '1', '1', 2018, '03', '06', '700'),
(23, '9776534445', 'Eraser Big', 'A', '1013', '5', '35', '175', '2500', '2,324', '', '2018-03-06', '11:16:40', '1', '1', 2018, '03', '06', '20'),
(24, '46987754', 'school bag', 'A', '1014', '2', '1000', '1,960', '2500', '365', '', '2018-03-06', '11:17:38', '1', '1', 2018, '03', '06', '700'),
(25, '9776534445', 'Eraser Big', 'A', '1014', '5', '35', '175', '2500', '365', '', '2018-03-06', '11:17:38', '1', '1', 2018, '03', '06', '20'),
(26, '46987754', 'school bag', 'A', '1015', '2', '1000', '1960', '2500', '365', '', '2018-03-06', '11:18:42', '1', '1', 2018, '03', '06', '700'),
(27, '9776534445', 'Eraser Big', 'A', '1015', '5', '35', '175', '2500', '365', '', '2018-03-06', '11:18:42', '1', '1', 2018, '03', '06', '20'),
(30, '9776534445', 'Eraser Big', 'A', '1016', '1', '35', '35', '50', '15', '0', '2018-03-06', '19:49:48', '1', '1', 2018, '03', '06', '20'),
(31, '9776534445', 'Eraser Big', 'A', '1017', '1', '35', '35', '50', '15', '0', '2018-03-06', '19:52:18', '1', '1', 2018, '03', '06', '20'),
(37, '3263677548', 'FOOD ', 'B', '1018', '1', '56', '56', '100', '44', '0', '2018-03-14', '14:08:31', '1', '1', 2018, '03', '14', '45'),
(38, '3263677548', 'FOOD ', 'B', '1019', '1', '56', '56', '100', '44', '0', '2018-03-14', '14:09:01', '1', '1', 2018, '03', '14', '45'),
(39, '3263677548', 'FOOD ', 'B', '1020', '1', '56', '56', '100', '44', '0', '2018-03-14', '14:09:37', '1', '1', 2018, '03', '14', '45'),
(40, '3263677548', 'FOOD ', 'B', '1021', '1', '56', '56', '100', '44', '0', '2018-03-14', '14:09:51', '1', '1', 2018, '03', '14', '45'),
(41, '3263677548', 'FOOD ', 'B', '1022', '1', '56', '56', '100', '44', '0', '2018-03-14', '14:12:02', '1', '1', 2018, '03', '14', '45'),
(42, '3263677548', 'FOOD ', 'B', '1023', '5', '56', '280', '300', '20', '0', '2018-03-14', '14:13:15', '1', '1', 2018, '03', '14', '45'),
(43, '3263677548', 'FOOD ', 'B', '1024', '5', '56', '280', '300', '20', '0', '2018-03-14', '14:13:59', '1', '1', 2018, '03', '14', '45'),
(44, '3263677548', 'FOOD ', 'B', '1025', '5', '56', '280', '300', '20', '0', '2018-03-14', '14:17:55', '1', '1', 2018, '03', '14', '45'),
(45, '3263677548', 'FOOD ', 'B', '1026', '1', '56', '56', '60', '4', '0', '2018-03-16', '13:52:18', '1', '1', 2018, '03', '16', '45'),
(46, '9776534445', 'Eraser Big', 'A', '1027', '10', '35', '350', '500', '150', '0', '2018-03-16', '13:58:45', '1', '1', 2018, '03', '16', '20'),
(47, '3263677548', 'FOOD ', 'B', '1028', '1', '56', '56', '60', '4', '0', '2018-03-18', '10:53:25', '5533', '1', 2018, '03', '18', '45'),
(55, '3263677548', 'FOOD ', 'B', '1029', '1', '56', '56', '150', '39', '0', '2018-03-18', '11:13:52', '5533', '1', 2018, '03', '18', '45'),
(56, '255355677', 'HB pencil ', 'A', '1029', '1', '20', '20', '150', '39', '0', '2018-03-18', '11:13:52', '5533', '1', 2018, '03', '18', '15'),
(57, '3263677548', 'FOOD ', 'B', '1030', '3', '47', '141', '400', '49', '54', '2019-08-17', '10:55:28', '5533', '1', 2019, '08', '17', '45'),
(58, '489676434', 'Book A4 Pelican', 'A', '1030', '2', '70', '140', '400', '49', '54', '2019-08-17', '10:55:28', '5533', '1', 2019, '08', '17', '50'),
(59, '9776534445', 'Eraser Big', 'A', '1030', '2', '35', '70', '400', '49', '54', '2019-08-17', '10:55:28', '5533', '1', 2019, '08', '17', '20'),
(60, '3263677548', 'FOOD ', 'B', '1031', '1', '47', '47', '50', '3', '18', '2019-08-17', '10:57:46', '5533', '1', 2019, '08', '17', '45'),
(61, '489676434', 'Book A4 Pelican', 'A', '1032', '2', '70', '140', '200', '25', '0', '2019-08-17', '11:03:12', '5533', '1', 2019, '08', '17', '50'),
(62, '9776534445', 'Eraser Big', 'A', '1032', '1', '35', '35', '200', '25', '0', '2019-08-17', '11:03:13', '5533', '1', 2019, '08', '17', '20'),
(63, '489676434', 'Book A4 Pelican', 'A', '1033', '2', '70', '140', '200', '25', '0', '2019-08-17', '11:10:11', '5533', '1', 2019, '08', '17', '50'),
(64, '9776534445', 'Eraser Big', 'A', '1033', '1', '35', '35', '200', '25', '0', '2019-08-17', '11:10:11', '5533', '1', 2019, '08', '17', '20'),
(65, '9776534445', 'Eraser Big', 'A', '1034', '1', '35', '35', '50', '15', '0', '2019-08-17', '17:13:28', '5533', '1', 2019, '08', '17', '20'),
(66, '489676434', 'Book A4 Pelican', 'A', '1035', '1', '70', '70', '100', '30', '0', '2019-08-17', '17:33:01', '5533', '1', 2019, '08', '17', '50'),
(67, '3263677548', 'FOOD ', 'B', '1036', '1', '47', '47', '150', '33', '18', '2019-08-17', '20:15:27', '5533', '1', 2019, '08', '17', '45'),
(68, '489676434', 'Book A4 Pelican', 'A', '1036', '1', '70', '70', '150', '33', '18', '2019-08-17', '20:15:27', '5533', '1', 2019, '08', '17', '50'),
(69, '3263677548', 'FOOD ', 'B', '1037', '1', '47', '47', '150', '33', '18', '2019-08-17', '23:35:45', '5533', '1', 2019, '08', '17', '45'),
(70, '489676434', 'Book A4 Pelican', 'A', '1037', '1', '70', '70', '150', '33', '18', '2019-08-17', '23:35:45', '5533', '1', 2019, '08', '17', '50'),
(71, '3263677548', 'FOOD ', 'B', '1038', '1', '47', '47', '50', '3', '18', '2019-08-17', '23:36:40', '5533', '1', 2019, '08', '17', '45'),
(72, '9776534445', 'Eraser Big', 'A', '1039', '1', '35', '35', '200', '48', '9', '2019-08-17', '23:42:00', '5533', '1', 2019, '08', '17', '20'),
(73, '3263677548', 'FOOD ', 'B', '1039', '1', '47', '47', '200', '48', '18', '2019-08-17', '23:42:00', '5533', '1', 2019, '08', '17', '45'),
(74, '489676434', 'Book A4 Pelican', 'A', '1039', '1', '70', '70', '200', '48', '18', '2019-08-17', '23:42:00', '5533', '1', 2019, '08', '17', '50'),
(75, '3263677548', 'FOOD ', 'B', '1040', '1', '47', '47', '50', '3', '18', '2019-08-17', '23:43:28', '5533', '1', 2019, '08', '17', '45'),
(76, '3263677548', 'FOOD ', 'B', '1041', '1', '47', '47', '100', '18', '18', '2019-08-17', '23:43:52', '5533', '1', 2019, '08', '17', '45'),
(77, '9776534445', 'Eraser Big', 'A', '1041', '1', '35', '35', '100', '18', '18', '2019-08-17', '23:43:52', '5533', '1', 2019, '08', '17', '20'),
(78, '3263677548', 'FOOD ', 'B', '1042', '1', '47', '47', '50', '3', '18', '2019-08-17', '23:44:48', '5533', '1', 2019, '08', '17', '45'),
(79, '3263677548', 'FOOD ', 'B', '1043', '1', '47', '47', '50', '3', '18', '2019-08-17', '23:46:24', '5533', '1', 2019, '08', '17', '45'),
(80, '3263677548', 'FOOD ', 'B', '1044', '10', '47', '470', '500', '30', '180', '2019-08-17', '23:47:37', '4350', '1', 2019, '08', '17', '45'),
(81, '3263677548', 'FOOD ', 'B', '1045', '1', '47', '47', '50', '3', '18', '2019-08-17', '23:51:21', '4350', '1', 2019, '08', '17', '45'),
(82, '3263677548', 'FOOD ', 'B', '1046', '2', '47', '94', '100', '6', '36', '2019-08-17', '23:53:15', '4350', '1', 2019, '08', '17', '45'),
(83, '3263677548', 'FOOD ', 'B', '1047', '1', '47', '47', '50', '3', '18', '2019-08-17', '23:57:05', '4350', '1', 2019, '08', '17', '45'),
(84, '3263677548', 'FOOD ', 'B', '1048', '1', '47', '47', '50', '3', '18', '2019-08-17', '23:57:32', '5533', '1', 2019, '08', '17', '45'),
(85, '489676434', 'Book A4 Pelican', 'A', '1049', '1', '70', '70', '100', '30', '0', '2019-08-17', '23:58:59', '5533', '1', 2019, '08', '17', '50'),
(86, '489676434', 'Book A4 Pelican', 'A', '1050', '1', '70', '70', '100', '30', '0', '2019-08-18', '00:00:04', '5533', '1', 2019, '08', '17', '50'),
(87, '3263677548', 'FOOD ', 'B', '1051', '1', '47', '47', '50', '3', '18', '2019-08-18', '00:00:42', '4350', '1', 2019, '08', '17', '45'),
(88, '3263677548', 'FOOD ', 'B', '1052', '2', '47', '94', '100', '6', '36', '2020-10-31', '12:25:04', '5535', '1', 2019, '10', '31', '45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return`
--

CREATE TABLE `tbl_return` (
  `id` int(11) NOT NULL,
  `productCode` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `transactionNo` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `salesValue` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `transactionDate` date NOT NULL,
  `transactionTime` time NOT NULL,
  `customerCode` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `month` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_return`
--

INSERT INTO `tbl_return` (`id`, `productCode`, `description`, `transactionNo`, `quantity`, `cost`, `salesValue`, `discount`, `transactionDate`, `transactionTime`, `customerCode`, `year`, `month`, `day`) VALUES
(1, '9776534445', 'Eraser Big', '1018', '1', '35', '35', '3', '2018-03-07', '16:41:19', '1', 2018, '03', '07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `id` int(11) NOT NULL,
  `month` varchar(100) NOT NULL,
  `totalSales` varchar(100) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taxcode`
--

CREATE TABLE `tbl_taxcode` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `taxCode` varchar(100) NOT NULL,
  `percentage` varchar(100) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_taxcode`
--

INSERT INTO `tbl_taxcode` (`id`, `name`, `taxCode`, `percentage`, `dateAdded`) VALUES
(2, 'Non-taxable', 'B', '00', '0000-00-00 00:00:00'),
(3, 'V.A.T', 'A', '16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `transactionNo` varchar(100) NOT NULL,
  `year` year(4) NOT NULL DEFAULT 2019,
  `month` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `total` varchar(100) NOT NULL,
  `productSales` varchar(100) NOT NULL,
  `taxExempt` varchar(100) DEFAULT NULL,
  `tax` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `paymentType` varchar(100) NOT NULL,
  `customerCode` varchar(100) NOT NULL,
  `employeeId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `transactionNo`, `year`, `month`, `day`, `time`, `total`, `productSales`, `taxExempt`, `tax`, `discount`, `paymentType`, `customerCode`, `employeeId`) VALUES
(1, '1000', 2018, '03', '02', '16:47:19', '456', '400', '56', '64', '', 'cash', '1', '1'),
(2, '1001', 2018, '03', '04', '10:31:03', '56', '0', '56', '0', '', 'cash', '1', '1'),
(3, '1001', 2018, '03', '04', '10:33:02', '56', '0', '56', '0', '', 'cash', '1', '1'),
(4, '1002', 2018, '03', '04', '10:33:45', '112', '0', '112', '0', '', 'cash', '1', '1'),
(5, '1004', 2018, '03', '05', '14:08:09', '53', '-3', '56', '-0.48', '', 'cash', '1', '1'),
(6, '1005', 2018, '03', '05', '14:19:55', '106', '-6', '112', '-0.96', '', 'cash', '1', '1'),
(7, '1006', 2018, '03', '05', '14:33:15', '53', '-3', '56', '-0.48', '', 'cash', '1', '1'),
(8, '1007', 2018, '03', '05', '14:39:08', '53', '-0.2', '53.2', '-0.032', '', 'cash', '1', '1'),
(9, '1008', 2018, '03', '05', '14:41:12', '53', '0', '53', '0', '', 'cash', '1', '1'),
(10, '1009', 2018, '03', '05', '15:13:29', '498', '392', '106', '62.72', '', 'cash', '1', '1'),
(11, '1018', 2018, '03', '06', '20:04:43', '88', '34.8', '53.2', '5.568', '6', 'cash', '1', '1'),
(12, '1019', 2018, '03', '06', '20:11:39', '53', '-0.2', '53.2', '-0.032', '6', 'cash', '1', '1'),
(13, '1020', 2018, '03', '06', '20:14:51', '160', '0', '160', '0', '16', 'cash', '1', '1'),
(14, '1021', 2018, '03', '06', '20:23:19', '40', '40', '', '6.4', '0', 'cash', '1', '1'),
(15, '1018', 2018, '03', '14', '14:08:34', '56', '0', '56', '0', '0', 'cash', '1', '1'),
(16, '1019', 2018, '03', '14', '14:09:03', '56', '0', '56', '0', '0', 'cash', '1', '1'),
(17, '1020', 2018, '03', '14', '14:09:39', '56', '0', '56', '0', '0', 'cash', '1', '1'),
(18, '1021', 2018, '03', '14', '14:09:54', '56', '0', '56', '0', '0', 'cash', '1', '1'),
(19, '1022', 2018, '03', '14', '14:12:04', '56', '0', '56', '0', '0', 'cash', '1', '1'),
(20, '1023', 2018, '03', '14', '14:13:18', '280', '0', '280', '0', '0', 'cash', '1', '1'),
(21, '1025', 2018, '03', '14', '14:17:58', '280', '0', '280', '0', '0', 'cash', '1', '1'),
(22, '1026', 2018, '03', '16', '13:55:48', '56', '0', '56', '0', '0', 'cash', '1', ''),
(23, '1027', 2018, '03', '16', '14:07:24', '350', '350', '', '56', '0', 'cash', '1', '5533'),
(24, '1028', 2018, '03', '18', '10:53:51', '56', '0', '56', '0', '0', 'cash', '1', '5533'),
(25, '1029', 2018, '03', '18', '11:13:54', '111', '55', '56', '8.8', '0', 'cash', '1', '5533'),
(26, '1033', 2019, '08', '17', '11:14:11', '175', '175', NULL, '28', '0', 'cash', '1', '5533'),
(27, '1033', 2019, '08', '17', '11:14:40', '175', '175', NULL, '28', '0', 'cash', '1', '5533'),
(28, '1034', 2019, '08', '17', '17:13:29', '35', '35', NULL, '5.6', '0', 'cash', '1', '5533'),
(29, '1035', 2019, '08', '17', '17:33:03', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(30, '1035', 2019, '08', '17', '17:34:18', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(31, '1035', 2019, '08', '17', '17:34:40', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(32, '1035', 2019, '08', '17', '17:35:42', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(33, '1035', 2019, '08', '17', '17:36:20', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(34, '1035', 2019, '08', '17', '17:36:40', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(35, '1035', 2019, '08', '17', '17:36:41', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(36, '1035', 2019, '08', '17', '17:36:54', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(37, '1035', 2019, '08', '17', '17:38:06', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(38, '1035', 2019, '08', '17', '17:41:28', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(39, '1035', 2019, '08', '17', '17:41:39', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(40, '1035', 2019, '08', '17', '17:42:48', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(41, '1035', 2019, '08', '17', '17:43:01', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(42, '1035', 2019, '08', '17', '17:43:17', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(43, '1035', 2019, '08', '17', '17:43:41', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(44, '1035', 2019, '08', '17', '17:44:14', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(45, '1035', 2019, '08', '17', '17:44:30', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(46, '1035', 2019, '08', '17', '17:44:45', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(47, '1035', 2019, '08', '17', '17:44:55', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(48, '1035', 2019, '08', '17', '17:45:05', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(49, '1035', 2019, '08', '17', '17:45:15', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(50, '1035', 2019, '08', '17', '17:45:29', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(51, '1035', 2019, '08', '17', '17:45:38', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(52, '1035', 2019, '08', '17', '17:45:48', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(53, '1035', 2019, '08', '17', '17:45:55', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(54, '1035', 2019, '08', '17', '17:46:05', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(55, '1035', 2019, '08', '17', '17:46:15', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(56, '1035', 2019, '08', '17', '17:46:23', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(57, '1035', 2019, '08', '17', '17:46:31', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(58, '1035', 2019, '08', '17', '17:46:42', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(59, '1035', 2019, '08', '17', '17:47:07', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(60, '1035', 2019, '08', '17', '17:48:11', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(61, '1035', 2019, '08', '17', '17:49:03', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(62, '1035', 2019, '08', '17', '17:49:15', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(63, '1035', 2019, '08', '17', '17:49:23', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(64, '1035', 2019, '08', '17', '17:49:29', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(65, '1035', 2019, '08', '17', '17:49:47', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(66, '1035', 2019, '08', '17', '17:49:57', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(67, '1035', 2019, '08', '17', '17:50:08', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(68, '1035', 2019, '08', '17', '17:50:14', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(69, '1035', 2019, '08', '17', '17:50:57', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(70, '1035', 2019, '08', '17', '17:51:07', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(71, '1035', 2019, '08', '17', '17:51:20', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(72, '1035', 2019, '08', '17', '17:51:44', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(73, '1035', 2019, '08', '17', '17:51:55', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(74, '1036', 2019, '08', '17', '20:15:28', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(75, '1036', 2019, '08', '17', '20:16:31', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(76, '1036', 2019, '08', '17', '20:16:42', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(77, '1036', 2019, '08', '17', '20:16:47', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(78, '1036', 2019, '08', '17', '20:17:29', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(79, '1036', 2019, '08', '17', '20:17:42', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(80, '1036', 2019, '08', '17', '20:18:46', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(81, '1036', 2019, '08', '17', '20:18:54', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(82, '1036', 2019, '08', '17', '20:19:32', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(83, '1036', 2019, '08', '17', '20:19:43', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(84, '1036', 2019, '08', '17', '20:19:54', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(85, '1036', 2019, '08', '17', '20:23:00', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(86, '1036', 2019, '08', '17', '20:23:11', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(87, '1036', 2019, '08', '17', '20:23:24', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(88, '1036', 2019, '08', '17', '20:23:34', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(89, '1036', 2019, '08', '17', '20:23:51', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(90, '1036', 2019, '08', '17', '20:24:04', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(91, '1036', 2019, '08', '17', '20:24:31', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(92, '1036', 2019, '08', '17', '20:24:45', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(93, '1036', 2019, '08', '17', '20:24:53', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(94, '1036', 2019, '08', '17', '20:25:02', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(95, '1036', 2019, '08', '17', '20:25:26', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(96, '1036', 2019, '08', '17', '20:25:35', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(97, '1036', 2019, '08', '17', '20:25:43', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(98, '1036', 2019, '08', '17', '20:25:56', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(99, '1036', 2019, '08', '17', '20:26:06', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(100, '1036', 2019, '08', '17', '20:26:30', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(101, '1036', 2019, '08', '17', '20:30:24', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(102, '1036', 2019, '08', '17', '20:30:33', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(103, '1036', 2019, '08', '17', '20:31:14', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(104, '1036', 2019, '08', '17', '20:31:22', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(105, '1036', 2019, '08', '17', '20:31:28', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(106, '1036', 2019, '08', '17', '20:31:48', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(107, '1036', 2019, '08', '17', '20:32:05', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(108, '1036', 2019, '08', '17', '20:32:14', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(109, '1036', 2019, '08', '17', '20:45:01', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(110, '1036', 2019, '08', '17', '20:47:04', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(111, '1036', 2019, '08', '17', '20:47:27', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(112, '1036', 2019, '08', '17', '21:13:51', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(113, '1036', 2019, '08', '17', '21:14:02', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(114, '1036', 2019, '08', '17', '21:17:16', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(115, '1036', 2019, '08', '17', '21:22:49', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(116, '1036', 2019, '08', '17', '21:23:33', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(117, '1036', 2019, '08', '17', '23:26:35', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(118, '1037', 2019, '08', '17', '23:35:46', '117', '70', '47', '11.2', '18', 'cash', '1', '5533'),
(119, '1038', 2019, '08', '17', '23:36:42', '47', '0', '47', '0', '18', 'cash', '1', '5533'),
(120, '1039', 2019, '08', '17', '23:42:02', '152', '105', '47', '16.8', '18', 'cash', '1', '5533'),
(121, '1039', 2019, '08', '17', '23:43:13', '152', '105', '47', '16.8', '18', 'cash', '1', '5533'),
(122, '1040', 2019, '08', '17', '23:43:30', '47', '0', '47', '0', '18', 'cash', '1', '5533'),
(123, '1041', 2019, '08', '17', '23:43:54', '82', '35', '47', '5.6', '18', 'cash', '1', '5533'),
(124, '1042', 2019, '08', '17', '23:44:49', '47', '0', '47', '0', '18', 'cash', '1', '5533'),
(125, '1043', 2019, '08', '17', '23:46:26', '47', '0', '47', '0', '18', 'cash', '1', '5533'),
(126, '1043', 2019, '08', '17', '23:46:26', '47', '0', '47', '0', '18', 'cash', '1', '5533'),
(127, '1044', 2019, '08', '17', '23:47:39', '470', '0', '470', '0', '180', 'cash', '1', '4350'),
(128, '1046', 2019, '08', '17', '23:53:18', '94', '0', '94', '0', '36', 'cash', '1', '4350'),
(129, '1047', 2019, '08', '17', '23:57:06', '47', '0', '47', '0', '18', 'cash', '1', '4350'),
(130, '1043', 2019, '08', '17', '23:57:20', '47', '0', '47', '0', '18', 'cash', '1', '5533'),
(131, '1043', 2019, '08', '17', '23:57:20', '47', '0', '47', '0', '18', 'cash', '1', '5533'),
(132, '1048', 2019, '08', '17', '23:57:34', '47', '0', '47', '0', '18', 'cash', '1', '5533'),
(133, '1048', 2019, '08', '17', '23:57:34', '47', '0', '47', '0', '18', 'cash', '1', '5533'),
(134, '1049', 2019, '08', '17', '23:59:01', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(135, '1049', 2019, '08', '17', '23:59:02', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(136, '1050', 2019, '08', '17', '00:00:08', '70', '70', NULL, '11.2', '0', 'cash', '1', '5533'),
(137, '1051', 2019, '08', '17', '00:00:43', '47', '0', '47', '0', '18', 'cash', '1', '4350'),
(138, '1052', 2019, '10', '31', '12:25:07', '94', '0', '94', '0', '36', 'cash', '1', '5535');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cancel`
--
ALTER TABLE `tbl_cancel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_transaction`
--
ALTER TABLE `tbl_customer_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_details`
--
ALTER TABLE `tbl_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logins`
--
ALTER TABLE `tbl_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paidout`
--
ALTER TABLE `tbl_paidout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products_his`
--
ALTER TABLE `tbl_products_his`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_his`
--
ALTER TABLE `tbl_product_his`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_return`
--
ALTER TABLE `tbl_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_taxcode`
--
ALTER TABLE `tbl_taxcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cancel`
--
ALTER TABLE `tbl_cancel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_customer_transaction`
--
ALTER TABLE `tbl_customer_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_details`
--
ALTER TABLE `tbl_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_logins`
--
ALTER TABLE `tbl_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_paidout`
--
ALTER TABLE `tbl_paidout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_products_his`
--
ALTER TABLE `tbl_products_his`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_his`
--
ALTER TABLE `tbl_product_his`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_return`
--
ALTER TABLE `tbl_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_taxcode`
--
ALTER TABLE `tbl_taxcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
