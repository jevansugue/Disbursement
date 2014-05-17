
SET time_zone = "+08:00";

--
-- Database: `disbursement_db`
--

CREATE DATABASE IF NOT EXISTS `disbursement_db`;
USE `disbursement_db`;

-- --------------------------------------------------------

--
-- Table structure for table `disbursement_tbl`
--

CREATE TABLE IF NOT EXISTS `disbursement_tbl` (
  `dv_id` varchar(255) NOT NULL,
  `date_receive` date NOT NULL,
  `date_proc` date DEFAULT NULL,
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
  `status` enum('FOR_PROC','PROCESSING','RETURNED','RELEASE') NOT NULL,

  PRIMARY KEY (`dv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- MULTI VALUE ATTRIBUTES OF `disbursement_tbl`

-- --------------------------------------------------------

--
-- Table structure for table `checks_tbl`
--

CREATE TABLE IF NOT EXISTS `CTA_tbl` (
  `date_credited` date NOT NULL,
  `dv_id` varchar(255) NOT NULL,
  KEY `dv_id` (`dv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Constraints for table `CTA_tbl`

ALTER TABLE `CTA_tbl`
  ADD CONSTRAINT `dv_id_CTA_fk` FOREIGN KEY (`dv_id`) REFERENCES `disbursement_tbl` (`dv_id`); 
  
-- --------------------------------------------------------

--
-- Table structure for table `checks_tbl`
--

CREATE TABLE IF NOT EXISTS `checks_tbl` (
  `check_num` varchar(255) NOT NULL,
  `dv_id` varchar(255) NOT NULL,
  KEY `dv_id` (`dv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Constraints for table `checks_tbl`

ALTER TABLE `checks_tbl`
  ADD CONSTRAINT `dv_id_checks_fk` FOREIGN KEY (`dv_id`) REFERENCES `disbursement_tbl` (`dv_id`);

-- --------------------------------------------------------

--
-- Table structure for table `OR_tbl`
--

CREATE TABLE IF NOT EXISTS `OR_tbl` (
  `OR_num` varchar(255) NOT NULL,
  `dv_id` varchar(255) NOT NULL,
  KEY `dv_id` (`dv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Constraints for table `OR_tbl`

ALTER TABLE `OR_tbl`
  ADD CONSTRAINT `dv_id_OR_fk` FOREIGN KEY (`dv_id`) REFERENCES `disbursement_tbl` (`dv_id`);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `empID` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deptartment` varchar(255) NOT NULL,
  `emp_type` varchar(255) NOT NULL,
  PRIMARY KEY (`empID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--	COMMON USERS
INSERT INTO `users_tbl` (`empID`, `username`, `password`, `deptartment`, `emp_type`) VALUES
('ACCT-person', 'ACCT-person', 'password', 'accounting', 'ACCT-person'),
('ACCT-supervisor', 'ACCT-super', 'password', 'accounting', 'ACCT-super'),
('administrator', 'admin', 'password', 'IT', 'admin');
--	accounting-person, encodes dvs
--	accounting-supervisor approves-dvs
--	admin

--	BUDGET ROLL OUT USERS
INSERT INTO `users_tbl` (`empID`, `username`, `password`, `deptartment`, `emp_type`) VALUES
('BRO-proc1', 'BRO-proc1', 'password', 'accounting', 'BRO-proc'),
('BRO-proc2', 'BRO-proc2', 'password', 'accounting', 'BRO-proc'),
('BRO-proc3', 'BRO-proc3', 'password', 'accounting', 'BRO-proc'),
('BRO-approver1', 'BRO-approver1', 'password', 'accounting', 'BRO-approver'),
('BRO-approver2', 'BRO-approver2', 'password', 'accounting', 'BRO-approver'),
('BRO-approver3', 'BRO-approver3', 'password', 'accounting', 'BRO-approver');
--	BRO-proc uploads the input file of BRO
--	BRO-approver reviews and approves/rejects uploaded BRO


--
-- Table structure for table `trails_tbl`
--

CREATE TABLE IF NOT EXISTS `trails_tbl` (
  `empID` varchar(255) NOT NULL,
  `dv_id` varchar(255) NOT NULL,
  `date_stamp` timestamp NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status` enum('FOR_PROC','PROCESSING','RETURNED','RELEASE') NOT NULL,
  KEY `dv_id` (`dv_id`),
  KEY `empID_fk` (`empID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Constraints for table `trails_tbl`

ALTER TABLE `trails_tbl`
  ADD CONSTRAINT `empID_trails_fk` FOREIGN KEY (`empID`) REFERENCES `users_tbl` (`empID`),
  ADD CONSTRAINT `dv_id_trails_fk` FOREIGN KEY (`dv_id`) REFERENCES `disbursement_tbl` (`dv_id`);

-- --------------------------------------------------------


--
-- Table structure for table `Responsibility_Center_tbl`
--

-- ASSUMPTION  rc_code = branchcode in xls file
-- ASSUMPTION  rc_name = branch name in xls file

CREATE TABLE IF NOT EXISTS `Responsibility_Center_tbl` (
  `rc_code` varchar(255) NOT NULL,
  `rc_name` varchar(255) NOT NULL,
  PRIMARY KEY (`rc_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Responsibility_Center_tbl` (`rc_code`, `rc_name`) VALUES
('1','LEGASPI TOWERS CENTER'),
('2','A. MABINI BRANCH'),
('3','BINONDO BRANCH'),
('4','CALOOCAN BRANCH'),
('6','SAN JUAN BRANCH'),
('7','CUBAO BRANCH'),
('9','DEL MONTE BRANCH'),
('10','MALABON BRANCH'),
('11','BLUMENTRITT BRANCH'),
('13','SUCAT-PARANAQUE BRANCH'),
('14','CLARK BRANCH'),
('16','SAN FERNANDO BRANCH'),
('17','VIGAN BRANCH'),
('18','DAGUPAN BRANCH'),
('21','BINAN BRANCH'),
('22','HAGONOY BRANCH'),
('23','LIPA BRANCH'),
('24','EDSA TAFT BRANCH'),
('25','VILLAMOR BRANCH'),
('26','STA. ROSA BRANCH'),
('27','MEYCAUAYAN BRANCH'),
('29','GUAGUA BRANCH'),
('30','ALAMINOS BRANCH'),
('31','URDANETA BRANCH'),
('32','HERBOSA BRANCH'),
('33','NEWPORT CITY BRANCH'),
('34','ORTIGAS BRANCH'),
('35','OLONGAPO BRANCH'),
('36','LAOAG BRANCH'),
('37','RUFINO BRANCH'),
('38','MAKATI AVENUE BRANCH'),
('39','TOMAS MORATO BRANCH'),
('41','LUCENA  BRANCH'),
('43','BACOLOD BRANCH'),
('44','ILOILO BRANCH'),
('45','CEBU BRANCH'),
('46','ROXAS BRANCH'),
('48','DAVAO BRANCH'),
('51','CAGAYAN DE ORO BRANCH'),
('53','BAGO BRANCH'),
('57','GLOBAL CITY BRANCH'),
('59','BEL-AIR BRANCH'),
('61','ZAMBOANGA BRANCH'),
('62','AYALA ALABANG BRANCH'),
('63','GREENHILLS BRANCH'),
('64','BAGUIO BRANCH'),
('65','CEBU MANDAUE BRANCH'),
('67','VALENZUELA BRANCH'),
('68','LAS PINAS BRANCH'),
('69','MARIKINA BRANCH'),
('70','GLOBAL CITY-SOUTH MARKET BR.'),
('71','MCKINLEY HILL BRANCH'),
('72','GLOBAL CITY - 32nd STREET'),
('73','TARLAC BRANCH'),
('75','DAVAO BUSINESS CENTER'),
('88','MAIN OFFICE BRANCH'),
('949','Office of the President'),
('913','Human Resources'),
('942','Corporate Planning'),
('945','Compliance '),
('914','Legal'),
('943','Office of the Corporate Secretary'),
('947','Corporate Affairs'),
('948','Security'),
('976','Risk Management Group Head'),
('971','Group Credit Management - Wholesale'),
('972','Group Credit Management - Retail'),
('973','Credit Risk Management'),
('974','Non Traded Market Risk '),
('975','Operational Risk Management'),
('937','Retail Business Group Head'),
('918','Consumer Finance Head'),
('961','Auto Finance - Head Office'),
('956','Auto Finance - Clark'),
('957','Auto Finance - Global City'),
('996','Floor Stock Finance'),
('958','Auto Finance - Laoag'),
('960','Auto Finance - Dagupan'),
('962','Auto Finance - Baguio'),
('963','Auto Finance - Cebu'),
('964','Auto Finance - Cagayan de Oro'),
('965','Auto Finance - Davao'),
('966','Auto Finance - Iloilo'),
('967','AFG - San Fernando'),
('968','Auto Finance - Urdaneta'),
('969','Auto Finance - Caloocan '),
('970','Auto Finance - Zamboanga'),
('919','Mortgage'),
('920','Personal & Salary Loan Head'),
('954','Regular Salary Loan'),
('997','Wholesale Salary Loan'),
('998','Motorcycle Channeling Loan'),
('953','Personal Loan'),
('889','Community Distribution Head'),
('926','Region Head - 1'),
('927','Region Head - 2'),
('928','Region Head - 3'),
('929','Region Head - 4'),
('934','Business Enablement'),
('890','Quality Assurance'),
('891','Resource Management'),
('940','Virtual Banking'),
('922','Business Development Head'),
('932','Brand Management & Marketing'),
('887','Central Insurance Unit'),
('894','Cards Head'),
('955','Cards Acquiring'),
('895','Cards Issuing'),
('952','Internal Audit Head'),
('951','Internal Audit'),
('917','Services Group Head'),
('911','Accounting AND Phimay Property Inc'),
('912','Information Systems'),
('915','Property Administration & Purchasing'),
('906','Reconciliation'),
('896','Investment & Asset Management-Head'),
('946','Global Markets'),
('944','Trust'),
('899','Central Operations Group Head'),
('897','Binan Cash Center'),
('898','San Fernando Cash Center'),
('916','Global Market Support'),
('907','Loan Administration Department'),
('903','Remittance & Cable'),
('904','Central Cash & Clearing'),
('905','Business Process Management'),
('921','Trade Finance Operations'),
('936','Cash Management Services - Operations'),
('931','ATM Operations'),
('892','Credit & Remedial Management AND Customer Relationship Management'),
('981','Centralized Collection'),
('982','Loan Management Center'),
('983','Litigation & ROPA Management'),
('885','CI & Appraisal Unit'),
('923','Global Banking Group Head '),
('985','Corporate Banking Head'),
('980','Corporate Banking'),
('950','Commercial Banking Head'),
('987','Commercial Banking 1'),
('988','Commercial Banking 2'),
('977','Regional Business Center - Iloilo'),
('938','Regional Business Center - Cebu'),
('939','Regional Business Center - Davao'),
('886','Transaction Banking'),
('883','Cash Management Services - GWB'),
('979','Trade Finance Marketing'),
('989','Real Estate Finance Head'),
('991','Real Estate Finance Team 1'),
('992','Real Estate Finance Team 2'),
('993','Credit Support Team'),
('994','Marketing Support Team'),
('978','SME Lending');

-- --------------------------------------------------------

--
-- Table structure for table `GL_account_tbl`
--

-- ASSUMPTION  gl_account_code = GL code in xls file
-- ASSUMPTION  gl_account_name = GL name in xls file

CREATE TABLE IF NOT EXISTS `GL_account_tbl` (
  `gl_account_code` varchar(255) NOT NULL,
  `gl_account_name` varchar(255) NOT NULL,
  `total_budget` varchar(255) NOT NULL DEFAULT 0,
  `available_budget` varchar(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`gl_account_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `GL_account_tbl` (`gl_account_code`, `gl_account_name`)
VALUES
('11060000000','DUE FROM BSP'),
('11080204088','BPI SA#000823-0601-49'),
('14200000000','PETTY CASH FUND'),
('14240000000','DOCUMENTARY STAMPS ON HAND'),
('14260000000','POSTAGE STAMPS'),
('14280000000','STATIONERY & SUPPLIES ON HAND'),
('14340400000','ACCOUNTS RECEIVABLE-OTHERS'),
('14340400020','AR-SSS MATERNITY & SICKNESS BENEFITS'),
('14340400040','AR-CASH ADVANCES'),
('14340400050','AR-TELEPHONE CHARGES'),
('14340400100','AR-PPI'),
('14340400200','ACCOUNTS RECEIVABLE - KL'),
('14340400400','AR Issuer'),
('14360000020','AIR Manual (For PPIs payment of interest)'),
('14380400000','PREPAID EXPENSES-OTHERS'),
('14460000000','SUNDRY DEBIT'),
('14520000000','MISCELLANEOUS ASSETS'),
('19999999901','SUSPENSE ACCOUNT ITEMS'),
('19999999902','UNPOSTED ACCOUNTS'),
('23200808000','Accrued Other Expense Payable - Others'),
('23300400000','AP-SSS PUBLIC COLLECTIONS'),
('23300600000','AP-SSS PENSIONER'),
('23301000000','AP-PAG-IBIG LOAN'),
('23301600000','AP-OTHERS'),
('23302500020','AP Merchant'),
('23302600000','AP FIXED ASSETS'),
('23380000080','WITHHOLDING TAX PAYABLE-OTHERS'),
('23400600000','Pag-ibig Contribution Payable'),
('50040000000','BANK COMMISSION'),
('50046000000','BANK COMMISSION-OTHERS'),
('50080000100','F&C Merchant Discount'),
('60060202000','SALARIES AND WAGES-BASIC'),
('60060204000','SALARIES AND WAGES-OVERTIME'),
('60060600000','FRINGE BENEFITS-OFFICERS & EMPLOYEES'),
('60060600100','FRINGE BENEFITS-TRAINING'),
('60060600200','FRINGE BENEFITS-FBT'),
('60060800000','DIRECTORS FEES'),
('60061000000','SSS'),
('60061200000','MEDICAL'),
('60061400000','CONTRIBUTIONS TO RETIREMENT/PROVIDENT'),
('60080000000','MANAGEMENT AND OTHER PROFESSIONAL FEES'),
('60140000000','TAXES AND LICENSES'),
('60150000000','FEES AND COMMISSION EXPENSES'),
('60160200000','INSURANCE-PDIC'),
('60160600000','INSURANCE-OTHERS'),
('60182000000','Amortization Other Intangible Assets'),
('60200000000','LITIGATION/ASSETS ACQUIRED EXPENSES'),
('60260000000','RENT'),
('60280200000','POWER AND LIGHT                          '),
('60280400000','WATER'),
('60300000000','INFORMATION TECHNOLOGY EXPENSES'),
('60320000000','FUEL AND LUBRICANTS'),
('60340000000','TRAVELLING EXPENSES'),
('60360000000','REPAIRS AND MAINTENANCE'),
('60380200000','SECURITY SERVICES'),
('60380400000','CLERICAL & MESSENGERIAL SERVICES'),
('60380600000','JANITORIAL SERVICES'),
('60400200000','POSTAGE'),
('60400400000','TELEPHONE'),
('60400600000','CABLES & TELEGRAMS'),
('60420000000','DOCUMENTARY STAMPS USED'),
('60440000000','STATIONERY AND SUPPLIES USED'),
('60460000000','PERIODICALS AND MAGAZINES'),
('60480000000','DVERTISING AND PUBLICITY'),
('60500000000','REPRESENTATION AND ENTERTAINMENT'),
('60520000000','MEMBERSHIP FEES AND DUES'),
('60540000000','DONATIONS AND CHARITABLE CONTRIBUTIONS'),
('60560000000','FREIGHT EXPENSES'),
('60600400000','MISCELLANEOUS EXPENSES-MEETINGS'),
('60600600000','MISCELLANEOUS EXPENSES-OTHERS'),
('60600800000','MISCELLANEOUS EXPENSE-FFE');

-- --------------------------------------------------------

--
-- Table structure for table `budget_rel`
--

-- EACH RC HAS A BUDGET OF EACH GL
CREATE TABLE IF NOT EXISTS `budget_rel` (
  `gl_account_code` varchar(255) NOT NULL,
  `rc_code` varchar(255) NOT NULL,
  `total_budget` varchar(255) NOT NULL DEFAULT 0,
  `available_budget` varchar(255) NOT NULL DEFAULT 0,
  KEY (`gl_account_code`),
  KEY (`rc_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Constraints for table `budget_rel`

ALTER TABLE `budget_rel`
  ADD CONSTRAINT `gl_account_code_fk` FOREIGN KEY (`gl_account_code`) REFERENCES `GL_account_tbl` (`gl_account_code`),
  ADD CONSTRAINT `rc_code_fk` FOREIGN KEY (`rc_code`) REFERENCES `Responsibility_Center_tbl` (`rc_code`);

-- INSERT STATEMENT IN `budget_rel_insert_sql.sql`