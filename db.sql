CREATE DATABASE IF NOT EXISTS disbursement_db;



CREATE TABLE IF NOT EXISTS `disbursement_tbl`
(
    `dv_id`           varchar(255),
    `date_receive`    date,
    `date_proc`       varchar(255),
    `tat`             varchar(255),
    `div_num`         int(4) NOT NULL,
    `payee`           varchar(255) NOT NULL,
    `g_amt`           float NOT NULL,
    `req_unit`        varchar(255) NOT NULL,
    `req_party`       varchar(255) NOT NULL,
    `category`        varchar(255),
    `sub_cat`         varchar(255),
    `n_amt`           float NOT NULL,
    `mop`             varchar(255) NOT NULL,
    `check_num`       varchar(255),
    `or_num`         varchar(255),
    `tax_req`         varchar(255),
    `tin_num`         varchar(255),
    `nat_of_pay`      varchar(255),
    `status`		enum('RETURNED','PROCESSED'),

    PRIMARY KEY (`dv_id`)

);

--
-- Dumping data for table `disbursement_tbl`
--

INSERT INTO `disbursement_tbl` (`dv_id`, `date_receive`, `date_proc`, `tat`, `dv_num`, `payee`, `g_amt`, `req_unit`, `req_party`, `category`, `sub_cat`, `n_amt`, `mop`, `check_num`, `or_num`, `tax_req`, `tin_num`, `nat_of_pay`, `status`) VALUES
('20140429001', '2014-04-29', NULL, NULL, '001', 'Julia Valenzuela', 90000, '5', 'Juju', 'PAYMENT', '', NULL, 'CTA', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429003', '2014-04-29', NULL, NULL, '003', 'Pangatlo', 3333, '3', 'three', 'PAYMENT', '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429004', '2014-04-29', NULL, NULL, '004', 'pangapat', 4444, '4', 'apat', 'PAYMENT', '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429005', '2014-04-29', NULL, NULL, '005', 'panglima', 55555, '5', 'lima', 'PAYMENT', '', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429006', '2014-04-29', NULL, NULL, '006', 'pang anim', 6666, '666', 'six', 'PAYMENT', '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429007', '2014-04-29', NULL, NULL, '007', 'pang pito', 7777, '7', 'pito', 'PAYMENT', '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429008', '2014-04-29', NULL, NULL, '008', 'Jevan Strong', 1000000000, 'jevan', 'solo', 'LIQUID', '', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429009', '2014-04-29', NULL, NULL, '009', 'Ish dominguez', 10000000, '3', '', 'PAYMENT', '', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429010', '2014-04-29', NULL, NULL, '010', 'Barb King', 20000, 'clash', 'Lokko', 'PAYMENT', 'dark elixer', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429011', '2014-04-29', NULL, NULL, '011', 'John Robert De Leon', 10000, '2', 'John Robert De Leon', 'REIMBURSE', '', NULL, 'CTA', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429012', '2014-04-29', NULL, NULL, '012', 'Aileen Sabellon', 13000, '4', 'Aileen Sabellon', 'LIQUID', '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429013', '2014-04-29', NULL, NULL, '013', 'Sarah Jane Go', 10, '2', 'Sago', 'OTHER', 'Travel', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140429014', '2014-04-29', NULL, NULL, '014', 'Cath Abdon', 100000, '5', 'Cath Abdon', 'PAYMENT', '', NULL, 'CTA', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140430001', '2014-04-30', NULL, NULL, '001', 'America Singer', 20000, '1', 'Maxon', 'LIQUID', '', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140430002', '2014-04-30', NULL, NULL, '002', 'Marlee', 100000, '5', 'Aspen', 'PAYMENT', '', NULL, 'CTA', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140430003', '2014-04-30', NULL, NULL, '003', 'Maganda Ako', 100000, 'Char lang', 'Di ba', 'REP_PETT', '', NULL, '', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140430004', '2014-04-30', NULL, NULL, '004', 'Joy Ramos', 500000, '2', 'Angel Lavezares', 'PAYMENT', '', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140430005', '2014-04-30', NULL, NULL, '005', 'Jonah Doloiras', 40000, '4', 'Arianne Timosa', 'CASH_ADV', '', NULL, 'CTA', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140501001', '2014-05-01', NULL, NULL, '001', 'Seb Luz', 3000000, '3', 'Jor Zablan', 'LIQUID', '', NULL, 'CTA', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140501002', '2014-05-01', NULL, NULL, '002', 'Iny De Leon', 7000, '2', 'Albert Aragon', 'PAYMENT', '', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140501003', '2014-05-01', NULL, NULL, '003', 'Jayseon Choi', 63000, '1', 'Marco Mendoza', 'REIMBURSE', '', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140501004', '2014-05-01', NULL, NULL, '004', 'Ariel', 400000, '4', 'Belle', 'REP_PETT', '', NULL, 'CTA', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140501005', '2014-05-01', NULL, NULL, '005', 'Rapunzel', 720000, '5', 'Merida', 'REIMBURSE', '', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140502001', '2014-05-02', NULL, NULL, '001', 'Elf Queen', 40000, 'clash', 'Lokko', 'PAYMENT', 'Dark Elixer', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW'),
('20140502002', '2014-05-02', NULL, NULL, '002', 'Dragon', 25000, 'clash', 'Lokko', 'PAYMENT', 'Elixer', NULL, 'MC', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW');


CREATE TABLE IF NOT EXISTS `trails_tbl`
(
    `dv_id`               varchar(255) NOT NULL,
    `return_date`         date,
    `remarks`             varchar(255),
    `status`              enum('REVIEW' , 'PROCESSING' , 'RETURNED'),

    KEY (`dv_id`)

);

ALTER TABLE `trails_tbl`
	ADD CONSTRAINT  `dv_id_fk` FOREIGN KEY (`dv_id`) REFERENCES `disbursement_tbl` (`dv_id`)
