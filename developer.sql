-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2022 at 08:52 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developer`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `file_ID` int(11) NOT NULL AUTO_INCREMENT,
  `file_Name` varchar(255) NOT NULL,
  `file_Type` varchar(255) NOT NULL,
  `file_Size` int(11) NOT NULL,
  PRIMARY KEY (`file_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_ID`, `file_Name`, `file_Type`, `file_Size`) VALUES
(1, 'Doc1.docx', 'docx', 1506312),
(2, 'qa_plan.docx', 'docx', 89122),
(3, 'FYP_Activity_Diagram-Floodpreparation_Activitydiagram.jpg', 'jpg', 34277);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `USERID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `AGE` int(11) NOT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`USERID`, `NAME`, `ADDRESS`, `AGE`) VALUES
(1, 'Adam', '12, JALAN ABC', 25),
(2, 'Jane', 'D-12-6 WISMA ABC', 40),
(3, 'Dylan', '12A, SOLOK ABC', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

DROP TABLE IF EXISTS `tbl_orders`;
CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `USERID` int(11) NOT NULL,
  `ORDERID` int(11) NOT NULL,
  KEY `USERID` (`USERID`),
  KEY `ORDERID` (`ORDERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`USERID`, `ORDERID`) VALUES
(1, 1001),
(2, 1003),
(1, 1004),
(2, 1002),
(1, 1005);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

DROP TABLE IF EXISTS `tbl_transactions`;
CREATE TABLE IF NOT EXISTS `tbl_transactions` (
  `ORDERID` int(11) NOT NULL,
  `TRANSACTION_DATE` datetime NOT NULL,
  `ITEM` varchar(255) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `UNIT_PRICE` float NOT NULL,
  PRIMARY KEY (`ORDERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`ORDERID`, `TRANSACTION_DATE`, `ITEM`, `QUANTITY`, `UNIT_PRICE`) VALUES
(1001, '2016-11-25 02:00:00', 'Apple', 5, 2.45),
(1002, '2016-11-26 16:30:00', 'Orange', 12, 0.5),
(1003, '2016-11-26 12:32:00', 'Pineapple', 2, 12),
(1004, '2016-11-27 07:45:00', 'Peach', 2, 6),
(1005, '2016-11-28 23:05:00', 'Durian', 1, 23.7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `User_id` int(11) NOT NULL AUTO_INCREMENT,
  `User_name` varchar(255) NOT NULL,
  `User_email` varchar(255) NOT NULL,
  `User_password` varchar(255) NOT NULL,
  `User_role` varchar(255) NOT NULL,
  PRIMARY KEY (`User_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `User_name`, `User_email`, `User_password`, `User_role`) VALUES
(1, 'Pei Xuan Ling', 'lingpeixuan@gmail.com', 'lingpeixuan', 'member'),
(2, 'Pei Xin Ling', 'lingpeixin@gmail.com', 'lingpeixin', 'nonmember');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `tbl_customers` (`USERID`),
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`ORDERID`) REFERENCES `tbl_transactions` (`ORDERID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
