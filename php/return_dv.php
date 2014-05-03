<?php
	require 'connect.php';
	session_start();	
	
	$tbl_name = "disbursement_tbl";
	$dvid = $_SESSION['dvid'];
	$date_ret = $_SESSION['dateProc'];
	
	$changeStatusq = 
		"UPDATE `" . $tbl_name . "` 
			SET 
				`status`='RETURNED' 
			WHERE `dv_id`='" . $dvid . "';";
			
	$insertDateRetq = 
		"INSERT INTO `trails_tbl` 
			(`dv_id`,`return_date`) VALUES
			('" . $dvid . "', '" . $date_ret . "');
			";
	
	mysql_query($changeStatusq);
	mysql_query($insertDateRetq);
		
	mysql_close();
	
	session_destroy();
	header('Location: ..');
?>