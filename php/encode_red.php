<?php
	require 'connect.php';
	session_start();
	
	$tbl_name = "disbursement_tbl";
	
	$dvid = $_SESSION['dvid'];
	$date_proc = $_SESSION['dateProc'];
	$net_amt = $_SESSION['netAmt'];
	$check_num = $_SESSION['cNum'];
	$date_rec = $_SESSION['date_rec'];
	$tat = floor((strtotime($date_proc) - strtotime($date_rec))/86400); //WALA PA HOLIDAYS
	
	$q = "UPDATE `" . $tbl_name . "` 
			SET 
				`date_proc`='" . $date_proc . "', 
				`n_amt`='" . $net_amt . "', 
				`check_num`='" . $check_num . "',
				`status`='FOR_PROCESS',
				`tat`='" . $tat . "'
			WHERE `dv_id`='" . $dvid . "';";

	mysql_query($q) or die(mysql_error());
	echo $q;
	mysql_close();	
	session_destroy();
	header('Location: ..');
?>