<?php 

function return_dv($tbl_name, $dvid, $date_rec, $remarks){
	
	$changeStatusq = 
		"UPDATE `" . $tbl_name . "` 
			SET 
				`status`='RETURNED' 
			WHERE `dv_id`='" . $dvid . "';";
			
	$insertDateRetq = 
		"INSERT INTO `trails_tbl` 
			(`dv_id`,`return_date`, `remarks`) VALUES
			('" . $dvid . "', '" . $date_rec . "', '" . $remarks . "');";
	
	mysql_query($changeStatusq) or die(mysql_error());
	mysql_query($insertDateRetq) or die(mysql_error());
		
	mysql_close();
	header('Location: ..');
}


?>