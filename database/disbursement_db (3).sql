-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2014 at 08:16 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `dv_num` int(4) NOT NULL,
  `payee` varchar(255) NOT NULL,
  `g_amt` float NOT NULL,
  `req_unit` varchar(255) NOT NULL,
  `req_party` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sub_cat` varchar(255) DEFAULT NULL,
  `n_amt` float NOT NULL,
  `mop` enum('MC', 'CTA') NOT NULL,
  `tax_req` varchar(255) DEFAULT NULL,
  `tin_num` varchar(255) DEFAULT NULL,
  `nat_of_pay` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `trails_tbl`
--

CREATE TABLE IF NOT EXISTS `trails_tbl` (
  `empID` varchar(255) NOT NULL,
  `dv_id` varchar(255) NOT NULL,
  `return_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status` enum('REVIEW','PROCESSING','RETURNED','RELEASE') DEFAULT NULL,
  KEY `dv_id` (`dv_id`),
  KEY `empID_fk` (`empID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `empID` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deptartment` varchar(255) NOT NULL,
  PRIMARY KEY (`empID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users_tbl` (`empID`, `username`, `password`, `deptartment`) VALUES
('accounting-person', 'acct-person', 'password', 'accounting'),
('accounting-supervisor', 'acct-super', 'password', 'accounting'),
('administrator', 'admin', 'password', 'IT');


--
-- Table structure for table `checks_tbl`
--

CREATE TABLE IF NOT EXISTS `checks_tbl` (
  `check_num` varchar(255) NOT NULL,
  `dv_id` varchar(255) NOT NULL,
  KEY `dv_id` (`dv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `OR_tbl`
--

CREATE TABLE IF NOT EXISTS `OR_tbl` (
  `OR_num` varchar(255) NOT NULL,
  `dv_id` varchar(255) NOT NULL,
  KEY `dv_id` (`dv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trails_tbl`
--
ALTER TABLE `trails_tbl`
  ADD CONSTRAINT `empID_trails_fk` FOREIGN KEY (`empID`) REFERENCES `users_tbl` (`empID`),
  ADD CONSTRAINT `dv_id_trails_fk` FOREIGN KEY (`dv_id`) REFERENCES `disbursement_tbl` (`dv_id`);
  
--
-- Constraints for table `OR_tbl`
--
ALTER TABLE `OR_tbl`
  ADD CONSTRAINT `dv_id_OR_fk` FOREIGN KEY (`dv_id`) REFERENCES `disbursement_tbl` (`dv_id`);
  
--
-- Constraints for table `checks_tbl`
--
ALTER TABLE `checks_tbl`
  ADD CONSTRAINT `dv_id_checks_fk` FOREIGN KEY (`dv_id`) REFERENCES `disbursement_tbl` (`dv_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
