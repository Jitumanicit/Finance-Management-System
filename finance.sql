-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 06:32 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `username` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `image` varchar(111) DEFAULT NULL,
  `thumb_image` varchar(111) DEFAULT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `phone`, `username`, `email`, `password`, `image`, `thumb_image`, `role`) VALUES
(1, 'User', 'Nalbari', '0000000000', 'staff', 'staff@gmail.com', 'newstaff', 'profile_pic/1460103224.jpg', 'profile_pic/thumb_1460103224.jpg', 'staff'),
(2, 'Admin', 'Nalbari', '8876072223', 'admin', 'admin@gmail.com', 'newadmin', 'profile_pic/1460775607.jpg', 'profile_pic/thumb_1460775607.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `city` varchar(111) DEFAULT NULL,
  `image` varchar(111) DEFAULT NULL,
  `thumb_image` varchar(200) DEFAULT NULL,
  `pin_code` varchar(22) DEFAULT NULL,
  `country` varchar(111) DEFAULT NULL,
  `dob` varchar(11) DEFAULT NULL,
  `time` varchar(22) DEFAULT NULL,
  `registration` varchar(11) DEFAULT NULL,
  `insurance` varchar(11) DEFAULT NULL,
  `on_road_price` varchar(11) DEFAULT NULL,
  `down_payment` varchar(11) DEFAULT NULL,
  `vehicle_price` varchar(11) DEFAULT NULL,
  `finance_amount` varchar(11) DEFAULT NULL,
  `documentation` varchar(11) DEFAULT NULL,
  `finance_commission` varchar(11) DEFAULT NULL,
  `interest` varchar(11) DEFAULT NULL,
  `scheme` varchar(11) DEFAULT NULL,
  `insurancefor` int(11) DEFAULT NULL,
  `net_finance` varchar(11) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `finance_type` varchar(11) DEFAULT NULL,
  `vehicle_type` varchar(11) DEFAULT NULL,
  `vehicle_description` varchar(500) DEFAULT NULL,
  `gname` varchar(50) DEFAULT NULL,
  `gemail` varchar(50) DEFAULT NULL,
  `gphone` varchar(11) DEFAULT NULL,
  `gpin_code` varchar(11) DEFAULT NULL,
  `gaddress` varchar(300) DEFAULT NULL,
  `gcity` varchar(111) DEFAULT NULL,
  `gcountry` varchar(111) DEFAULT NULL,
  `gdob` varchar(11) DEFAULT NULL,
  `ggender` varchar(11) DEFAULT NULL,
  `gdate` date DEFAULT NULL,
  `token_id` varchar(111) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `phone`, `email`, `address`, `city`, `image`, `thumb_image`, `pin_code`, `country`, `dob`, `time`, `registration`, `insurance`, `on_road_price`, `down_payment`, `vehicle_price`, `finance_amount`, `documentation`, `finance_commission`, `interest`, `scheme`, `insurancefor`, `net_finance`, `gender`, `finance_type`, `vehicle_type`, `vehicle_description`, `gname`, `gemail`, `gphone`, `gpin_code`, `gaddress`, `gcity`, `gcountry`, `gdob`, `ggender`, `gdate`, `token_id`) VALUES
(6, 'test', '8888888888', NULL, 'ufhwiufhiwef', 'test', NULL, NULL, '781310', 'IN', '2016-04-07', '1460778929', '1000', '2000', NULL, '100000', '200000', '103000', '2000', '5', '8.5', '11', 2, '119623.25', 'Male', '2', '3', 'two wheeler', 'test', NULL, '8888888888', '781310', 'test', 'test', 'IN', '2016-04-26', 'Male', NULL, '0e55ba7e26b4963f43797d85286f174d');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `amount` int(15) NOT NULL,
  `vehicle_no` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Collection Account' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `name`, `date`, `amount`, `vehicle_no`, `client_name`, `token_id`) VALUES
(1, 'ppp', '2015-08-23', 7890, '7890', 'manoj', '881f71c197901f6840df03c6eab53a70');

-- --------------------------------------------------------

--
-- Table structure for table `collection1`
--

CREATE TABLE IF NOT EXISTS `collection1` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `amount` int(15) NOT NULL,
  `vehicle_no` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Collection Boy Recived Account' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `dealer_payment`
--

CREATE TABLE IF NOT EXISTS `dealer_payment` (
`id` int(11) NOT NULL,
  `dealer_name` varchar(100) NOT NULL DEFAULT '0',
  `client_name` varchar(50) NOT NULL DEFAULT '0',
  `vehicle type` enum('two','three','four') NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `price` int(15) NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Dealer Payment Account' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dealer_payment`
--

INSERT INTO `dealer_payment` (`id`, `dealer_name`, `client_name`, `vehicle type`, `brand`, `model`, `price`, `purchase_date`) VALUES
(1, 'honda', 'tapan', 'two', 'honda', 'cbr', 80000, '2015-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `emi_table`
--

CREATE TABLE IF NOT EXISTS `emi_table` (
`id` int(11) NOT NULL,
  `client_id` varchar(11) DEFAULT NULL,
  `registration` varchar(11) DEFAULT NULL,
  `insurance` varchar(11) DEFAULT NULL,
  `documentation` varchar(11) DEFAULT NULL,
  `emi_date` varchar(50) DEFAULT NULL,
  `finance` varchar(11) DEFAULT NULL,
  `finance_commission` varchar(11) DEFAULT NULL,
  `interest` varchar(11) DEFAULT NULL,
  `net_finance` varchar(11) DEFAULT NULL,
  `penalty` varchar(111) DEFAULT '0',
  `payment_receiver` varchar(111) DEFAULT NULL,
  `payment_date` varchar(111) DEFAULT NULL,
  `status` varchar(11) DEFAULT '0',
  `token_id` varchar(50) DEFAULT NULL,
  `update_time` varchar(50) DEFAULT NULL,
  `penalty_rate` varchar(50) DEFAULT NULL,
  `discount` varchar(10) DEFAULT NULL,
  `settlement` varchar(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `emi_table`
--

INSERT INTO `emi_table` (`id`, `client_id`, `registration`, `insurance`, `documentation`, `emi_date`, `finance`, `finance_commission`, `interest`, `net_finance`, `penalty`, `payment_receiver`, `payment_date`, `status`, `token_id`, `update_time`, `penalty_rate`, `discount`, `settlement`) VALUES
(1, '1', '91', '64', '182', '1429904780', '4818', '250', '446', '6075.2', '13', NULL, NULL, '0', NULL, '1463904629', '', NULL, NULL),
(2, '1', '91', '64', '182', '1432496780', '4818', '250', '446', '6347.2', '13', NULL, NULL, '0', NULL, '1463904629', '', NULL, NULL),
(3, '1', '91', '64', '182', '1435088780', '4818', '250', '446', '4619.2', '13', NULL, NULL, '0', NULL, '1463904629', '', NULL, NULL),
(4, '1', '91', '64', '182', '1437680780', '4818', '250', '446', '1948.8', '0', 'Tapan Karmakar', '1427702699', '1', '6fed8ae0f25313674793fcf01a5334fb', '1440920797', '', '48.8', '38'),
(5, '1', '91', '64', '182', '1440272780', '4818', '250', '446', '0', '0', 'Tapan Karmakar', '1427880303', '1', 'f9f56e1093fb5af741e495d97416817a', '1440920797', '', '0', '0'),
(6, '1', '91', '64', '182', '1442864780', '4818', '250', '446', '1760', '0', 'Tapan Karmakar', '1427880350', '1', 'd8df491b89fb5dbf089fca0922b6b7a1', NULL, '', '0', '0'),
(7, '1', '91', '64', '182', '1445456780', '4818', '250', '446', '1760', '3748.8', NULL, NULL, '0', 'dc038822b48a4aa989bcab111d04c420', '1463904629', '17.6', NULL, NULL),
(8, '1', '91', '64', '182', '1448052380', '4818', '250', '446', '5760', '10540.8', NULL, NULL, '0', NULL, '1463904629', '57.6', NULL, NULL),
(9, '1', '91', '64', '182', '1450644380', '4818', '250', '446', '5760', '8812.8', NULL, NULL, '0', NULL, '1463904629', '57.6', NULL, NULL),
(10, '1', '91', '64', '182', '1453236380', '4818', '250', '446', '5760', '7084.8', NULL, NULL, '0', NULL, '1463904629', '57.6', NULL, NULL),
(11, '1', '91', '64', '182', '1455828380', '4818', '250', '446', '5760', '5356.8', NULL, NULL, '0', NULL, '1463904629', '57.6', NULL, NULL),
(12, '2', '727', '213', '182', '1429944068', '3636', '191', '341', '4563', '0', 'Tapan Karmakar', '1427355757', '1', '0c30b160728643b491c19a5e968f66f9', NULL, NULL, '0', '0'),
(13, '2', '727', '213', '182', '1432536068', '3636', '191', '341', '4563', '4426.11', 'Tapan Karmakar', '1440921401', '1', '7c9509658a3f760da8179134583de3a1', '1440920797', '45.63', '8000', '0'),
(14, '2', '727', '213', '182', '1435128068', '3636', '191', '341', '4563', '3057.21', 'Tapan Karmakar', '1440921401', '1', '7c9509658a3f760da8179134583de3a1', '1440920797', '45.63', '8000', '0'),
(15, '2', '727', '213', '182', '1437720068', '3636', '191', '341', '4563', '1688.31', 'Tapan Karmakar', '1440923298', '1', 'cb5e96ea252c1e4a340a115dccf4d963', '1440920797', '45.63', '3000', '0'),
(16, '2', '727', '213', '182', '1440312068', '3636', '191', '341', '882.41', '0', 'Tapan Karmakar', '1427702984', '1', '7a0cbb2181720a0e3239afd1006f9695', '1440920797', '', '0', '0'),
(17, '2', '727', '213', '182', '1442904068', '3636', '191', '341', '563', '1362.46', NULL, NULL, '0', 'd56d2452a42c4daab42439f3cd267c56', '1463904629', '5.63', NULL, NULL),
(18, '2', '727', '213', '182', '1445496068', '3636', '191', '341', '4563', '9673.56', NULL, NULL, '0', NULL, '1463904629', '45.63', NULL, NULL),
(19, '2', '727', '213', '182', '1448091668', '3636', '191', '341', '4563', '8304.66', NULL, NULL, '0', NULL, '1463904629', '45.63', NULL, NULL),
(20, '2', '727', '213', '182', '1450683668', '3636', '191', '341', '4563', '6935.76', NULL, NULL, '0', NULL, '1463904629', '45.63', NULL, NULL),
(21, '2', '727', '213', '182', '1453275668', '3636', '191', '341', '4563', '5566.86', NULL, NULL, '0', NULL, '1463904629', '45.63', NULL, NULL),
(22, '2', '727', '213', '182', '1455867668', '3636', '191', '341', '4563', '4197.96', NULL, NULL, '0', NULL, '1463904629', '45.63', NULL, NULL),
(23, '3', '182', '0', '182', '1430473135', '3984', '208', '372', '4746', '18319.56', NULL, NULL, '0', NULL, '1463904630', '47.46', NULL, NULL),
(24, '3', '182', '0', '182', '1433065135', '3984', '208', '372', '4746', '16895.76', NULL, NULL, '0', NULL, '1463904630', '47.46', NULL, NULL),
(25, '3', '182', '0', '182', '1435657135', '3984', '208', '372', '4746', '15471.96', NULL, NULL, '0', NULL, '1463904630', '47.46', NULL, NULL),
(26, '3', '182', '0', '182', '1438249135', '3984', '208', '372', '4746', '14048.16', NULL, NULL, '0', NULL, '1463904630', '47.46', NULL, NULL),
(27, '3', '182', '0', '182', '1440841135', '3984', '208', '372', '4746', '12624.36', NULL, NULL, '0', NULL, '1463904630', '47.46', NULL, NULL),
(28, '3', '182', '0', '182', '1443433135', '3984', '208', '372', '4746', '11200.56', NULL, NULL, '0', NULL, '1463904630', '47.46', NULL, NULL),
(29, '3', '182', '0', '182', '1446028735', '3984', '208', '372', '4746', '9776.76', NULL, NULL, '0', NULL, '1463904630', '47.46', NULL, NULL),
(30, '3', '182', '0', '182', '1448620735', '3984', '208', '372', '4746', '8352.96', NULL, NULL, '0', NULL, '1463904630', '47.46', NULL, NULL),
(31, '3', '182', '0', '182', '1451212735', '3984', '208', '372', '4746', '6929.16', NULL, NULL, '0', NULL, '1463904630', '47.46', NULL, NULL),
(32, '3', '182', '0', '182', '1453804735', '3984', '208', '372', '4746', '5505.36', NULL, NULL, '0', NULL, '1463904630', '47.46', NULL, NULL),
(33, '3', '182', '0', '182', '1456396735', '3984', '208', '372', '4746', '4081.56', NULL, NULL, '0', NULL, '1463904630', '47.46', NULL, NULL),
(34, '4', '71', '0', '71', '1430473471', '1565', '82', '380', '2098', '8098.28', NULL, NULL, '0', NULL, '1463904630', '20.98', NULL, NULL),
(35, '4', '71', '0', '71', '1433065471', '1565', '82', '380', '2098', '7468.88', NULL, NULL, '0', NULL, '1463904630', '20.98', NULL, NULL),
(36, '4', '71', '0', '71', '1435657471', '1565', '82', '380', '2098', '6839.48', NULL, NULL, '0', NULL, '1463904630', '20.98', NULL, NULL),
(37, '4', '71', '0', '71', '1438249471', '1565', '82', '380', '2098', '6210.08', NULL, NULL, '0', NULL, '1463904631', '20.98', NULL, NULL),
(38, '4', '71', '0', '71', '1440841471', '1565', '82', '380', '2098', '5580.68', NULL, NULL, '0', NULL, '1463904631', '20.98', NULL, NULL),
(39, '4', '71', '0', '71', '1443433471', '1565', '82', '380', '2098', '4951.28', NULL, NULL, '0', NULL, '1463904631', '20.98', NULL, NULL),
(40, '4', '71', '0', '71', '1446029071', '1565', '82', '380', '2098', '4321.88', NULL, NULL, '0', NULL, '1463904631', '20.98', NULL, NULL),
(41, '4', '71', '0', '71', '1448621071', '1565', '82', '380', '2098', '3692.48', NULL, NULL, '0', NULL, '1463904631', '20.98', NULL, NULL),
(42, '4', '71', '0', '71', '1451213071', '1565', '82', '380', '2098', '3063.08', NULL, NULL, '0', NULL, '1463904631', '20.98', NULL, NULL),
(43, '4', '71', '0', '71', '1453805071', '1565', '82', '380', '2098', '2433.68', NULL, NULL, '0', NULL, '1463904631', '20.98', NULL, NULL),
(44, '4', '71', '0', '71', '1456397071', '1565', '82', '380', '2098', '1804.28', NULL, NULL, '0', NULL, '1463904631', '20.98', NULL, NULL),
(45, '4', '71', '0', '71', '1458989071', '1565', '82', '380', '2098', '1195.86', NULL, NULL, '0', NULL, '1463904631', '20.98', NULL, NULL),
(46, '4', '71', '0', '71', '1461577471', '1565', '82', '380', '2098', '566.46', NULL, NULL, '0', NULL, '1463904631', '20.98', NULL, NULL),
(47, '4', '71', '0', '71', '1464169471', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(48, '4', '71', '0', '71', '1466761471', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(49, '4', '71', '0', '71', '1469353471', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(50, '4', '71', '0', '71', '1471945471', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(51, '4', '71', '0', '71', '1474537471', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(52, '4', '71', '0', '71', '1477129471', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(53, '4', '71', '0', '71', '1479725071', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(54, '4', '71', '0', '71', '1482317071', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(55, '4', '71', '0', '71', '1484909071', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(56, '4', '71', '0', '71', '1487501071', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(57, '4', '71', '0', '71', '1490093071', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(58, '4', '71', '0', '71', '1492681471', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(59, '4', '71', '0', '71', '1495273471', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(60, '4', '71', '0', '71', '1497865471', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(61, '4', '71', '0', '71', '1500457471', '1565', '82', '380', '2098', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(62, '5', '182', '0', '182', '1463366874', '9438', '481', '859', '10960', '0', 'I am a Administrator', '1460775302', '1', 'ab35b1b7689a06b110f11b13a6a16ac8', NULL, '', '100', '0'),
(63, '5', '182', '0', '182', '1465958874', '9438', '481', '859', '10960', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(64, '5', '182', '0', '182', '1468550874', '9438', '481', '859', '10960', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(65, '5', '182', '0', '182', '1471142874', '9438', '481', '859', '10960', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(66, '5', '182', '0', '182', '1473734874', '9438', '481', '859', '10960', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(67, '5', '182', '0', '182', '1476326874', '9438', '481', '859', '10960', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(68, '5', '182', '0', '182', '1478922474', '9438', '481', '859', '10960', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(69, '5', '182', '0', '182', '1481514474', '9438', '481', '859', '10960', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(70, '5', '182', '0', '182', '1484106474', '9438', '481', '859', '10960', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(71, '5', '182', '0', '182', '1486698474', '9438', '481', '859', '10960', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(72, '5', '182', '0', '182', '1489290474', '9438', '481', '859', '10960', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(73, '6', '91', '0', '182', '1463370930', '9364', '477', '852', '10875', '0', 'Admin', '1460778972', '1', '4a2f9b1f7fb952fde04179d7d1c4dbbb', NULL, NULL, '100', '538.75'),
(74, '6', '91', '0', '182', '1465962930', '9364', '477', '852', '10875', '0', 'Admin', '1461669272', '1', 'cd73d27899184065e0e5a2a7ae8752a5', NULL, NULL, '100', '538.75'),
(75, '6', '91', '0', '182', '1468554930', '9364', '477', '852', '10875', '0', 'Admin', '1462794005', '1', '6fe72843ebc689fcb81e991ca8f7a385', NULL, NULL, '0', '0'),
(76, '6', '91', '0', '182', '1471146930', '9364', '477', '852', '10875', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(77, '6', '91', '0', '182', '1473738930', '9364', '477', '852', '10875', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(78, '6', '91', '0', '182', '1476330930', '9364', '477', '852', '10875', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(79, '6', '91', '0', '182', '1478926530', '9364', '477', '852', '10875', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(80, '6', '91', '0', '182', '1481518530', '9364', '477', '852', '10875', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(81, '6', '91', '0', '182', '1484110530', '9364', '477', '852', '10875', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(82, '6', '91', '0', '182', '1486702530', '9364', '477', '852', '10875', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(83, '6', '91', '0', '182', '1489294530', '9364', '477', '852', '10875', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE IF NOT EXISTS `insurance` (
`id` int(11) NOT NULL,
  `insurance_company` varchar(50) NOT NULL DEFAULT '0',
  `agent` varchar(50) NOT NULL DEFAULT '0',
  `client_name` varchar(50) NOT NULL DEFAULT '0',
  `vehicle_type` varchar(50) NOT NULL DEFAULT '0',
  `vehicle_brand` varchar(50) NOT NULL DEFAULT '0',
  `vehicle_model` varchar(50) NOT NULL DEFAULT '0',
  `reg_no` varchar(50) NOT NULL DEFAULT '0',
  `chasis_no` varchar(50) NOT NULL DEFAULT '0',
  `premium_year` varchar(20) NOT NULL DEFAULT '0',
  `amount_paid` int(15) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Insurance Payment Account' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`id`, `insurance_company`, `agent`, `client_name`, `vehicle_type`, `vehicle_brand`, `vehicle_model`, `reg_no`, `chasis_no`, `premium_year`, `amount_paid`, `date`) VALUES
(1, 'ind', ',mman', 'aa', 'type', 'brand', 'vespa', '6734', '233456788', '2014-15', 5000, '2015-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `interest_payment`
--

CREATE TABLE IF NOT EXISTS `interest_payment` (
`id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `month` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `token_id` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `interest_payment`
--

INSERT INTO `interest_payment` (`id`, `amount`, `month`, `date`, `token_id`) VALUES
(1, 50000, 'jan', '2015-01-22', '287f2539fb6be6aad64755446e33b945');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE IF NOT EXISTS `office` (
`id` int(11) NOT NULL,
  `item` varchar(50) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Office Expenses' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `item`, `amount`, `date`, `token_id`) VALUES
(3, 'test', 200, '2016-04-16', '481b2e278c1a8a4cb22215ef1ba7f09e');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
`id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL DEFAULT '0',
  `vehicle_type` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `chasis_no` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Registration Payment Account' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `client_name`, `vehicle_type`, `model`, `chasis_no`, `amount`, `date`) VALUES
(2, 'test', 'two wheelar', 'Bajaj', '7865', 5000, '2016-04-13'),
(3, 'Kajal', 'Sujuki', 'alto', 'hrggo', 5000, '2016-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `remuneration`
--

CREATE TABLE IF NOT EXISTS `remuneration` (
  `partner_name` varchar(50) NOT NULL DEFAULT '0',
  `salary` varchar(15) NOT NULL DEFAULT '0',
  `date` varchar(111) NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Remuneration Account';

-- --------------------------------------------------------

--
-- Table structure for table `remunerationn`
--

CREATE TABLE IF NOT EXISTS `remunerationn` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(111) NOT NULL,
  `salary` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `remunerationn`
--

INSERT INTO `remunerationn` (`id`, `name`, `email`, `phone`, `address`, `salary`) VALUES
(2, 'test', 'test@gmail.com', 2147483647, 'test', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
`id` int(11) NOT NULL,
  `amount` int(111) NOT NULL DEFAULT '0',
  `month` varchar(15) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Rent Account' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `amount`, `month`, `date`, `token_id`) VALUES
(4, 500, 'january', '2016-05-07', '5a03895759cb8bea2dc015ef6ed4d637'),
(3, 6000, 'januay', '2016-04-05', '9044ed1b744bb71a508bae0df0cddc89');

-- --------------------------------------------------------

--
-- Table structure for table `reprocess1`
--

CREATE TABLE IF NOT EXISTS `reprocess1` (
`id` int(11) NOT NULL,
  `date` date DEFAULT '0000-00-00',
  `name` varchar(50) DEFAULT NULL,
  `amount` int(20) DEFAULT NULL,
  `vehicle_no` varchar(50) DEFAULT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Reprocess Charge Recived' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reprocess1`
--

INSERT INTO `reprocess1` (`id`, `date`, `name`, `amount`, `vehicle_no`, `client_name`, `token_id`) VALUES
(1, '2015-08-09', 'leon', 45000, 'as 01 2345', 'dd bora', '8a91ef2dc02d62d9934dfbc44827cf61');

-- --------------------------------------------------------

--
-- Table structure for table `reprocess2`
--

CREATE TABLE IF NOT EXISTS `reprocess2` (
`id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT '0',
  `vehicle_no` varchar(50) NOT NULL DEFAULT '0',
  `client_name` varchar(50) NOT NULL DEFAULT '0',
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Reprocess Payment Account' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE IF NOT EXISTS `revenue` (
`id` int(11) NOT NULL,
  `particulars` varchar(111) DEFAULT NULL,
  `debit` varchar(111) DEFAULT NULL,
  `credit` varchar(111) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `revenue`
--

INSERT INTO `revenue` (`id`, `particulars`, `debit`, `credit`, `time`, `token_id`) VALUES
(1, 'Finance', '53000', NULL, '2015-03-25', '3da9aa8d9e00c76ef32a439e46490945'),
(13, 'Finance', '40000', NULL, '2015-03-26', 'ca7a642e3054b9b5a7ef7c8c33ccf96a'),
(24, 'Emi', NULL, '4563', '2015-03-26', '0c30b160728643b491c19a5e968f66f9'),
(25, 'Salary', '50000', NULL, '2015-08-30', '35fd243a415119f72e378c5ec8f060ef'),
(27, 'Interest_Payment', '50000', NULL, '2015-01-22', '287f2539fb6be6aad64755446e33b945'),
(29, 'Emi', NULL, '8609.32', '2015-08-30', '7c9509658a3f760da8179134583de3a1'),
(31, 'Reprocess_charge_recieved', NULL, '45000', '2015-08-09', '8a91ef2dc02d62d9934dfbc44827cf61'),
(32, 'Emi', NULL, '3251.3100000000004', '2015-08-30', 'cb5e96ea252c1e4a340a115dccf4d963'),
(34, 'Collection_Charge_Received', NULL, '7890', '2015-08-23', '881f71c197901f6840df03c6eab53a70'),
(36, 'Emi', NULL, '', '2015-08-30', '7520ec93bc3c0a5a8706eefebc5edd58'),
(43, 'Emi', NULL, '6000', '2015-03-30', 'd402cd1f3ade6cef5ad1c6aeb5eb2550'),
(44, 'Emi', NULL, '1862', '2015-03-30', '6fed8ae0f25313674793fcf01a5334fb'),
(45, 'Emi', NULL, '4000', '2015-03-30', 'd56d2452a42c4daab42439f3cd267c56'),
(46, 'Emi', NULL, '882.41', '2015-03-30', '7a0cbb2181720a0e3239afd1006f9695'),
(47, 'Emi', NULL, '6000', '2015-04-01', '1fc3699e395580e33d2f94649f138eec'),
(48, 'Emi', NULL, '220.8', '2015-04-01', '77120a2dd97cd1f28cc76c30e091a14d'),
(49, 'Emi', NULL, '0', '2015-04-01', 'f9f56e1093fb5af741e495d97416817a'),
(50, 'Emi', NULL, '4000', '2015-04-01', '1ee112f0eb79d8a7266c2d76e556a8a1'),
(51, 'Emi', NULL, '1760', '2015-04-01', 'd8df491b89fb5dbf089fca0922b6b7a1'),
(52, 'Emi', NULL, '2000', '2015-04-01', '7f41c5518297de4b781cf4e3f071269c'),
(53, 'Emi', NULL, '2000', '2015-04-01', 'dc038822b48a4aa989bcab111d04c420'),
(54, 'Finance', '43820', NULL, '2015-04-01', '414b48f9f1617087fb096fdc8b076c87'),
(65, 'Finance', '43820', NULL, '2015-04-01', 'dc72dc866e34b174ba6b25c5864a435b'),
(66, 'Finance', '103820', NULL, '2016-04-16', '3a9728567796144a5c16d3c753586bda'),
(77, 'Emi', NULL, '0', '2016-04-16', '9cc318b6df9d221ea058f845b804c730'),
(78, 'Emi', NULL, '10960', '2016-04-16', 'e84117677751259219c7e4f179a9e82c'),
(79, 'Emi', NULL, '0', '2016-04-16', '72d613a2026d4d030c53f5ab45179eaf'),
(80, 'Emi', NULL, '0', '2016-04-16', '353a5b92ec7cf6372d4112e1cdf16012'),
(81, 'Emi', NULL, '10860', '2016-04-16', 'ab35b1b7689a06b110f11b13a6a16ac8'),
(82, 'Salary', '14000', NULL, '2016-04-13', '5de05bc29598c9b8d7ef308920ba9411'),
(83, 'Salary', '14000', NULL, '2016-04-07', 'c4ee10d82a30f439e7b3e82a2904f40b'),
(84, 'office_expenses', '200', NULL, '2016-04-16', '481b2e278c1a8a4cb22215ef1ba7f09e'),
(85, 'Rent', '6000', NULL, '2016-04-05', '9044ed1b744bb71a508bae0df0cddc89'),
(86, 'Remuneration', '2000', NULL, '2016-04-14', '190decfd6c3992954dc0f9e5636af6bd'),
(87, 'Finance', '103000', NULL, '2016-04-16', '0e55ba7e26b4963f43797d85286f174d'),
(98, 'Emi', NULL, '10236.25', '2016-04-16', '4a2f9b1f7fb952fde04179d7d1c4dbbb'),
(99, 'Remuneration', '2500', NULL, '2016-04-22', '34ccd82e937781cdd1ff5d13df91d190'),
(100, 'Emi', NULL, '', '2016-04-26', 'b3ba83e817a07c252d1621d6e2afafa0'),
(101, 'Emi', NULL, '10236.25', '2016-04-26', 'cd73d27899184065e0e5a2a7ae8752a5'),
(102, 'Salary', '7000', NULL, '2016-04-28', '2f3278007e1390cf57f980f4e7a0fede'),
(103, 'Rent', '500', NULL, '2016-05-07', '5a03895759cb8bea2dc015ef6ed4d637'),
(104, 'Emi', NULL, '10875', '2016-05-09', '6fe72843ebc689fcb81e991ca8f7a385');

-- --------------------------------------------------------

--
-- Table structure for table `rm1`
--

CREATE TABLE IF NOT EXISTS `rm1` (
`sl` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `withdraw` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rm2`
--

CREATE TABLE IF NOT EXISTS `rm2` (
`sl` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `withdraw` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rm2`
--

INSERT INTO `rm2` (`sl`, `name`, `role`, `withdraw`, `deposit`, `date`, `token_id`) VALUES
(1, 'test', 'admin', 2000, 0, '2016-04-14', '190decfd6c3992954dc0f9e5636af6bd'),
(2, 'test2', 'admin', 2500, 0, '2016-04-22', '34ccd82e937781cdd1ff5d13df91d190');

-- --------------------------------------------------------

--
-- Table structure for table `rm3`
--

CREATE TABLE IF NOT EXISTS `rm3` (
`sl` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `withdraw` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rm4`
--

CREATE TABLE IF NOT EXISTS `rm4` (
`sl` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `withdraw` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rm5`
--

CREATE TABLE IF NOT EXISTS `rm5` (
`sl` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `withdraw` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rm6`
--

CREATE TABLE IF NOT EXISTS `rm6` (
`sl` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `withdraw` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Salary Account' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `doj` varchar(111) NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `salary` int(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `doj`, `gender`, `address`, `phone`, `role`, `salary`, `token_id`) VALUES
(1, 'Code Testinggg', 'code@gmail.com', '1999-12-12', 'Male', 'testing', '8888888888', 'cashier', 12000, '0121a6a5987160b163f2c1de5c9e6e1d'),
(2, 'test1', 'test1@gmail.com', '2016-04-06', 'Male', 'test', '8888888888', 'accounts', 10000, 'da0b3242781589827cabc048598c9dca');

-- --------------------------------------------------------

--
-- Table structure for table `staff1`
--

CREATE TABLE IF NOT EXISTS `staff1` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(11) DEFAULT NULL,
  `advance` varchar(20) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `staff1`
--

INSERT INTO `staff1` (`id`, `name`, `role`, `salary`, `advance`, `date`, `token_id`) VALUES
(2, 'Code Testinggg', 'no', '12000', '2000', '2016-04-13', '5de05bc29598c9b8d7ef308920ba9411'),
(3, 'Code Testinggg', 'Cashear', '12000', '2000', '2016-04-07', 'c4ee10d82a30f439e7b3e82a2904f40b');

-- --------------------------------------------------------

--
-- Table structure for table `staff2`
--

CREATE TABLE IF NOT EXISTS `staff2` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `staff2`
--

INSERT INTO `staff2` (`id`, `name`, `role`, `salary`, `advance`, `date`, `token_id`) VALUES
(1, 'vddbojvo', 'admn', '5000', '2000', '2016-04-28', '2f3278007e1390cf57f980f4e7a0fede');

-- --------------------------------------------------------

--
-- Table structure for table `staff3`
--

CREATE TABLE IF NOT EXISTS `staff3` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff4`
--

CREATE TABLE IF NOT EXISTS `staff4` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff5`
--

CREATE TABLE IF NOT EXISTS `staff5` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff6`
--

CREATE TABLE IF NOT EXISTS `staff6` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff7`
--

CREATE TABLE IF NOT EXISTS `staff7` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff8`
--

CREATE TABLE IF NOT EXISTS `staff8` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff9`
--

CREATE TABLE IF NOT EXISTS `staff9` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff10`
--

CREATE TABLE IF NOT EXISTS `staff10` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff11`
--

CREATE TABLE IF NOT EXISTS `staff11` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff12`
--

CREATE TABLE IF NOT EXISTS `staff12` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff13`
--

CREATE TABLE IF NOT EXISTS `staff13` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff14`
--

CREATE TABLE IF NOT EXISTS `staff14` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff15`
--

CREATE TABLE IF NOT EXISTS `staff15` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff16`
--

CREATE TABLE IF NOT EXISTS `staff16` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `token_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE IF NOT EXISTS `story` (
`id` int(11) NOT NULL,
  `image_tittle` varchar(111) NOT NULL,
  `image` varchar(10000) NOT NULL,
  `description` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection1`
--
ALTER TABLE `collection1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealer_payment`
--
ALTER TABLE `dealer_payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emi_table`
--
ALTER TABLE `emi_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest_payment`
--
ALTER TABLE `interest_payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remunerationn`
--
ALTER TABLE `remunerationn`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reprocess1`
--
ALTER TABLE `reprocess1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reprocess2`
--
ALTER TABLE `reprocess2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `token_id` (`token_id`);

--
-- Indexes for table `rm1`
--
ALTER TABLE `rm1`
 ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `rm2`
--
ALTER TABLE `rm2`
 ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `rm3`
--
ALTER TABLE `rm3`
 ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `rm4`
--
ALTER TABLE `rm4`
 ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `rm5`
--
ALTER TABLE `rm5`
 ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `rm6`
--
ALTER TABLE `rm6`
 ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff1`
--
ALTER TABLE `staff1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff2`
--
ALTER TABLE `staff2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff3`
--
ALTER TABLE `staff3`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff4`
--
ALTER TABLE `staff4`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff5`
--
ALTER TABLE `staff5`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff6`
--
ALTER TABLE `staff6`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff7`
--
ALTER TABLE `staff7`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff8`
--
ALTER TABLE `staff8`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff9`
--
ALTER TABLE `staff9`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff10`
--
ALTER TABLE `staff10`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff11`
--
ALTER TABLE `staff11`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff12`
--
ALTER TABLE `staff12`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff13`
--
ALTER TABLE `staff13`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff14`
--
ALTER TABLE `staff14`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff15`
--
ALTER TABLE `staff15`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff16`
--
ALTER TABLE `staff16`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `collection1`
--
ALTER TABLE `collection1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dealer_payment`
--
ALTER TABLE `dealer_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `emi_table`
--
ALTER TABLE `emi_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `interest_payment`
--
ALTER TABLE `interest_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `remunerationn`
--
ALTER TABLE `remunerationn`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reprocess1`
--
ALTER TABLE `reprocess1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reprocess2`
--
ALTER TABLE `reprocess2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `revenue`
--
ALTER TABLE `revenue`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `rm1`
--
ALTER TABLE `rm1`
MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rm2`
--
ALTER TABLE `rm2`
MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rm3`
--
ALTER TABLE `rm3`
MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rm4`
--
ALTER TABLE `rm4`
MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rm5`
--
ALTER TABLE `rm5`
MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rm6`
--
ALTER TABLE `rm6`
MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff1`
--
ALTER TABLE `staff1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `staff2`
--
ALTER TABLE `staff2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff3`
--
ALTER TABLE `staff3`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff4`
--
ALTER TABLE `staff4`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff5`
--
ALTER TABLE `staff5`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff6`
--
ALTER TABLE `staff6`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff7`
--
ALTER TABLE `staff7`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff8`
--
ALTER TABLE `staff8`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff9`
--
ALTER TABLE `staff9`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff10`
--
ALTER TABLE `staff10`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff11`
--
ALTER TABLE `staff11`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff12`
--
ALTER TABLE `staff12`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff13`
--
ALTER TABLE `staff13`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff14`
--
ALTER TABLE `staff14`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff15`
--
ALTER TABLE `staff15`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff16`
--
ALTER TABLE `staff16`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
