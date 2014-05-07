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
  `mop` varchar(255) NOT NULL,
  `check_num` varchar(255) DEFAULT NULL,
  `or_num` varchar(255) DEFAULT NULL,
  `tax_req` varchar(255) DEFAULT NULL,
  `tin_num` varchar(255) DEFAULT NULL,
  `nat_of_pay` varchar(255) DEFAULT NULL,
  `status` enum('ENCODED','FOR_PROCESS','RETURNED','RELEASE') NOT NULL,
  PRIMARY KEY (`dv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disbursement_tbl`
--

INSERT INTO `disbursement_tbl` (`dv_id`, `date_receive`, `date_proc`, `tat`, `dv_num`, `payee`, `g_amt`, `req_unit`, `req_party`, `category`, `sub_cat`, `n_amt`, `mop`, `check_num`, `or_num`, `tax_req`, `tin_num`, `nat_of_pay`, `status`) VALUES
('20140429001', '2014-04-29', '2014-05-07', '0', 1, 'Julia Valenzuela', 90000, '5', 'Juju', 'PAYMENT', '', 2000000, 'CTA', '2345678', NULL, NULL, NULL, NULL, 'FOR_PROCESS'),
('20140429003', '2014-04-29', '2014-05-07', '0', 3, 'Pangatlo', 3333, '3', 'three', 'PAYMENT', '', 2345680, '', '3456789', NULL, NULL, NULL, NULL, 'FOR_PROCESS'),
('20140429004', '2014-04-29', NULL, NULL, 4, 'pangapat', 4444, '4', 'apat', 'PAYMENT', '', 0, '', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140429005', '2014-04-29', NULL, NULL, 5, 'panglima', 55555, '5', 'lima', 'PAYMENT', '', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140429006', '2014-04-29', NULL, NULL, 6, 'pang anim', 6666, '666', 'six', 'PAYMENT', '', 0, '', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140429007', '2014-04-29', NULL, NULL, 7, 'pang pito', 7777, '7', 'pito', 'PAYMENT', '', 0, '', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140429008', '2014-04-29', NULL, NULL, 8, 'Jevan Strong', 1000000000, 'jevan', 'solo', 'LIQUID', '', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140429009', '2014-04-29', NULL, NULL, 9, 'Ish dominguez', 10000000, '3', '', 'PAYMENT', '', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'RETURNED'),
('20140429010', '2014-04-29', NULL, NULL, 10, 'Barb King', 20000, 'clash', 'Lokko', 'PAYMENT', 'dark elixer', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140429011', '2014-04-29', NULL, NULL, 11, 'John Robert De Leon', 10000, '2', 'John Robert De Leon', 'REIMBURSE', '', 0, 'CTA', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140429012', '2014-04-29', NULL, NULL, 12, 'Aileen Sabellon', 13000, '4', 'Aileen Sabellon', 'LIQUID', '', 0, '', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140429013', '2014-04-29', NULL, NULL, 13, 'Sarah Jane Go', 10, '2', 'Sago', 'OTHER', 'Travel', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140429014', '2014-04-29', NULL, NULL, 14, 'Cath Abdon', 100000, '5', 'Cath Abdon', 'PAYMENT', '', 0, 'CTA', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140430001', '2014-04-30', NULL, NULL, 1, 'America Singer', 20000, '1', 'Maxon', 'LIQUID', '', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140430002', '2014-04-30', NULL, NULL, 2, 'Marlee', 100000, '5', 'Aspen', 'PAYMENT', '', 0, 'CTA', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140430003', '2014-04-30', NULL, NULL, 3, 'Maganda Ako', 100000, 'Char lang', 'Di ba', 'REP_PETT', '', 0, '', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140430004', '2014-04-30', NULL, NULL, 4, 'Joy Ramos', 500000, '2', 'Angel Lavezares', 'PAYMENT', '', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140430005', '2014-04-30', NULL, NULL, 5, 'Jonah Doloiras', 40000, '4', 'Arianne Timosa', 'CASH_ADV', '', 0, 'CTA', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140501001', '2014-05-01', NULL, NULL, 1, 'Seb Luz', 3000000, '3', 'Jor Zablan', 'LIQUID', '', 0, 'CTA', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140501002', '2014-05-01', NULL, NULL, 2, 'Iny De Leon', 7000, '2', 'Albert Aragon', 'PAYMENT', '', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140501003', '2014-05-01', NULL, NULL, 3, 'Jayseon Choi', 63000, '1', 'Marco Mendoza', 'REIMBURSE', '', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140501004', '2014-05-01', NULL, NULL, 4, 'Ariel', 400000, '4', 'Belle', 'REP_PETT', '', 0, 'CTA', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140501005', '2014-05-01', NULL, NULL, 5, 'Rapunzel', 720000, '5', 'Merida', 'REIMBURSE', '', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140502001', '2014-05-02', NULL, NULL, 1, 'Elf Queen', 40000, 'clash', 'Lokko', 'PAYMENT', 'Dark Elixer', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'ENCODED'),
('20140502002', '2014-05-02', NULL, NULL, 2, 'Dragon', 25000, 'clash', 'Lokko', 'PAYMENT', 'Elixer', 0, 'MC', NULL, NULL, NULL, NULL, NULL, 'ENCODED');

-- --------------------------------------------------------

--
-- Table structure for table `trails_tbl`
--

CREATE TABLE IF NOT EXISTS `trails_tbl` (
  `empID` varchar(255) NOT NULL,
  `dv_id` varchar(255) NOT NULL,
  `return_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status` enum('REVIEW','PROCESSING','RETURNED') DEFAULT NULL,
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
('1', 'one', 'one', 'asd');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trails_tbl`
--
ALTER TABLE `trails_tbl`
  ADD CONSTRAINT `empID_fk` FOREIGN KEY (`empID`) REFERENCES `users_tbl` (`empID`),
  ADD CONSTRAINT `dv_id_fk` FOREIGN KEY (`dv_id`) REFERENCES `disbursement_tbl` (`dv_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
