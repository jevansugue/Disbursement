<?php
	$action = $_POST['action'];
	
	$dvid = $_POST['dvid'];
	$date_proc = $_POST['dateProc'];
	$net_amt = $_POST['netAmt'];
	$check_num = $_POST['cNum'];
	
	session_start();
	
	$_SESSION['dvid'] = $dvid;
	$_SESSION['dateProc'] = $date_proc;
	$_SESSION['netAmt'] = $net_amt;
	$_SESSION['cNum'] = $check_num;
	
	if( $action == 'confirm'){
		header('Location: encode_red.php');
	}
	else{
		header('Location: return_dv.php');
	}

?>