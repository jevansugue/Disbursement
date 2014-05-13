<?php 

function return_dv($tbl_name, $dvid, $date_ret, $remarks, $empID){
	
	$changeStatusq = 
		"UPDATE `" . $tbl_name . "` 
			SET 
				`status`='RETURNED' 
			WHERE `dv_id`='" . $dvid . "';";
			
	$insertDateRetq = 
		"INSERT INTO `trails_tbl` 
			(`dv_id`,`date`, `remarks`, `empID`, `status`) VALUES
			('" . $dvid . "', '" . $date_ret . "', '" . $remarks . "','" . $empID . "','RETURNED');";
	
	mysql_query($changeStatusq) or die(mysql_error());
	mysql_query($insertDateRetq) or die(mysql_error());
		
	mysql_close();
	header('Location: ..');
}


?>