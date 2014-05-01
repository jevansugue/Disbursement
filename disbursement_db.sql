-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2014 at 02:59 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `disbursement_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `disbursement_tbl`
--

CREATE TABLE IF NOT EXISTS `disbursement_tbl` (
  `dv_id` varchar(255) NOT NULL DEFAULT '',
  `date_receive` date DEFAULT NULL,
  `date_proc` varchar(255) DEFAULT NULL,
  `tat` varchar(255) DEFAULT NULL,
  `div_num` int(4) NOT NULL,
  `payee` varchar(255) NOT NULL,
  `g_amt` float NOT NULL,
  `req_unit` varchar(255) NOT NULL,
  `req_party` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sub_cat` varchar(255) DEFAULT NULL,
  `n_amt` float NOT NULL,
  `mop` varchar(255) NOT NULL,
  `check_num` varchar(255) DEFAULT NULL,
  `or_num` varchar(255) DEFAULT NULL,
  `tax_req` varchar(255) DEFAULT NULL,
  `tin_num` varchar(255) DEFAULT NULL,
  `nat_of_pay` varchar(255) DEFAULT NULL,
  `status` enum('RETURNED','PROCESSED') DEFAULT NULL,
  PRIMARY KEY (`dv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trails_tbl`
--

CREATE TABLE IF NOT EXISTS `trails_tbl` (
  `dv_id` varchar(255) NOT NULL,
  `return_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status` enum('REVIEW','PROCESSING','RETURNED') DEFAULT NULL,
  KEY `dv_id` (`dv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trails_tbl`
--
ALTER TABLE `trails_tbl`
  ADD CONSTRAINT `dv_id_fk` FOREIGN KEY (`dv_id`) REFERENCES `disbursement_tbl` (`dv_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
