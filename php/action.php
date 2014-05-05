<?php
	$action = $_POST['action'];
	
	$dvid = $_POST['dvid'];
	$date_proc = $_POST['dateProc'];
	$net_amt = $_POST['netAmt'];
	$check_num = $_POST['cNum'];
	$date_rec = $_POST['date_rec'];
	
	session_start();
	
	$_SESSION['dvid'] = $dvid;
	$_SESSION['dateProc'] = $date_proc;
	$_SESSION['netAmt'] = $net_amt;
	$_SESSION['cNum'] = $check_num;
	$_SESSION['date_rec'] = $date_rec;
	
	if( $action == 'save'){
		header('Location: encode_red.php');
	}
	else if( $action == 'return dv') {
		header('Location: return_dv.php');
	}
	else{
		session_destroy();
		header('Location: ..');
	}
?>