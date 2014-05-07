<?php
	require 'connect.php';

	$date = $_POST['date'];;
	$q = "SELECT COUNT(  `dv_num` ) 
		FROM `disbursement_tbl`
		WHERE `date_receive` = '" . $date . "'";
	
	$fin = mysql_fetch_array(mysql_query($q));
	
	
	echo $fin[0];
?>