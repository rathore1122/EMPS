-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 06, 2020 at 12:13 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newosms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `admin_id` int(60) NOT NULL,
  `admin_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `admin_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `admin_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `assets_tb`
--

CREATE TABLE `assets_tb` (
  `p_id` int(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_dop` date NOT NULL,
  `p_available` int(255) NOT NULL,
  `p_total` int(255) NOT NULL,
  `p_original_cost` int(255) NOT NULL,
  `p_selling_cost` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets_tb`
--

INSERT INTO `assets_tb` (`p_id`, `p_name`, `p_dop`, `p_available`, `p_total`, `p_original_cost`, `p_selling_cost`) VALUES
(13, 'Keyboard', '2020-06-07', 10, 10, 500, 550);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `assign_tech` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`) VALUES
(24, 3, '', 'Display is not working', 'Rishabh Rathore', 'House no.123', 'bhopal', 'bhopal', 'MP', 464221, 'Sourabhrathoresr2@gmail.com', 9039583928, 'raj', '2020-06-29'),
(25, 4, '', 'Remote is not working', 'Rishabh Rathore', '123', 'eeee', 'ww', 'ee', 46421, 'www', 99696, 'aaa', '2020-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `custumer_bill`
--

CREATE TABLE `custumer_bill` (
  `cus_id` int(255) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_p_name` varchar(255) NOT NULL,
  `cus_add` varchar(255) NOT NULL,
  `cus_product_quantity` int(255) NOT NULL,
  `cus_product_each` int(255) NOT NULL,
  `cus_product_total` int(255) NOT NULL,
  `cus_product_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custumer_bill`
--

INSERT INTO `custumer_bill` (`cus_id`, `cus_name`, `cus_p_name`, `cus_add`, `cus_product_quantity`, `cus_product_each`, `cus_product_total`, `cus_product_date`) VALUES
(1, 'Raj', '', '141 bareth road', 1, 500, 500, '2020-07-03'),
(9, 'Sourabh Kumar', '', 'bhopal', 1, 500, 500, '2020-06-27'),
(10, 'Sourabh Kumar Rathore', '', 'bhopal', 10, 500, 5000, '2020-06-27'),
(11, 'Sourabh Kumar', '', 'bhopal', 5, 500, 2500, '2020-06-18'),
(12, 'Sourabh Kumar', '', 'bhopal', 5, 500, 2500, '2020-06-18'),
(13, 'Rishabh', '', 'GanjBasoda', 6, 500, 3000, '2020-06-27'),
(14, 'Rishabh', '', 'GanjBasoda', 6, 500, 3000, '2020-06-27'),
(15, 'Sourabh Kumar', '', 'bhopal', 2, 500, 1000, '2020-06-26'),
(16, 'Sourabh Kumar', '', 'bhopal', 2, 500, 1000, '2020-06-26'),
(17, 'jai', '', 'bhopal', 36, 500, 18000, '2020-06-26'),
(18, 'jai', '', 'bhopal', 36, 500, 18000, '2020-06-26'),
(19, 'jai', '', 'bhopal', 36, 500, 18000, '2020-06-26'),
(20, 'jai', '', 'bhopal', 36, 500, 18000, '2020-06-26'),
(21, 'jai', '', 'bhopal', 36, 500, 18000, '2020-06-26'),
(22, 'Sourabh Kumar', 'Ketboard', 'bhopal', 10, 500, 5000, '2020-06-20'),
(23, 'Sourabh Kumar', 'Ketboard', 'bhopal', 10, 500, 5000, '2020-06-26'),
(24, 'pinky', 'Ketboard', 'bhoap', 66, 500, 33000, '2020-06-18'),
(25, 'Raj', 'Ketboard', '141 bareth road', 1, 500, 500, '2020-07-02'),
(26, 'Sourabh Kumar', 'Moniter', 'bhopal', 1, 600, 600, '2020-07-03'),
(27, 'Sourabh Kumar', 'Moniter', 'bhopal', 2, 600, 1200, '2020-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_tb`
--

CREATE TABLE `requesterlogin_tb` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requesterlogin_tb`
--

INSERT INTO `requesterlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(25, 'Sourabh Rathore', 'Sourabhrathoresr2@gmail.com', '123456'),
(26, 'Rishabh Rathore', 'Rishabh@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `request_id` int(20) UNSIGNED NOT NULL,
  `request_info` varchar(60) COLLATE utf8_bin NOT NULL,
  `request_desc` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` varchar(100) COLLATE utf8_bin NOT NULL,
  `requester_add2` varchar(100) COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(10) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `request_date`) VALUES
(3, 'Tv Rapair', 'Display is not working', 'Rishabh Rathore', 'House no.123', 'bhopal', 'bhopal', 'MP', 464221, 'Sourabhrathoresr2@gmail.com', 9039583928, '2020-06-06'),
(4, 'Tv Rapair', 'Remote is not working', 'Rishabh Rathore', '123', 'eeee', 'ww', 'ee', 46421, 'www', 99696, '2020-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `technisian`
--

CREATE TABLE `technisian` (
  `t_id` int(255) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_city` varchar(255) NOT NULL,
  `t_mobile` int(255) NOT NULL,
  `t_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technisian`
--

INSERT INTO `technisian` (`t_id`, `t_name`, `t_city`, `t_mobile`, `t_email`) VALUES
(5, 'Jai', 'Basoda', 2147483647, 'Raj@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assets_tb`
--
ALTER TABLE `assets_tb`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `custumer_bill`
--
ALTER TABLE `custumer_bill`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`request_id`),
  ADD UNIQUE KEY `request_id` (`request_id`);

--
-- Indexes for table `technisian`
--
ALTER TABLE `technisian`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `admin_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets_tb`
--
ALTER TABLE `assets_tb`
  MODIFY `p_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `custumer_bill`
--
ALTER TABLE `custumer_bill`
  MODIFY `cus_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `request_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `technisian`
--
ALTER TABLE `technisian`
  MODIFY `t_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
