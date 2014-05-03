<?php
	require 'connect.php';
	
	$tbl_name = "disbursement_tbl";
	$dvid = $_POST['dvid'];
	
	$date_proc = $_POST['dateProc'];
	$net_amt = $_POST['netAmt'];
	$check_num = $_POST['cNum'];

	$q = "UPDATE `" . $tbl_name . "` 
			SET 
				`date_proc`='" . $date_proc . "', 
				`n_amt`='" . $net_amt . "', 
				`check_num`='" . $check_num . "',
				`status`='FOR_PROCESS' 
			WHERE `dv_id`='" . $dvid . "';";

	mysql_query($q) or die(mysql_error());
	mysql_close();
?>