CREATE TABLE IF NOT EXISTS `users_tbl`(
	
	`empID` varchar(255) NOT NULL,
	`username` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`deptartment` varchar(255) NOT NULL,
	
	PRIMARY KEY (`empID`)
)

ALTER TABLE `trails_tbl`
  ADD CONSTRAINT `empID_fk` FOREIGN KEY (`empID`) REFERENCES `users_tbl` (`empID`);
