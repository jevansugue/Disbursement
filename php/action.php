<?php
	$action = $_POST['action'];
	$tbl_name = "disbursement_tbl";
	
	$dvid = $_POST['dvid'];
	$date_proc = $_POST['dateProc'];
	$net_amt = $_POST['netAmt'];
	$check_num = $_POST['cNum'];
	$date_rec = $_POST['date_rec'];
	

	function encode_red(){
		$tat = floor((strtotime($_GLOBALS['date_proc']) - strtotime($_GLOBALS['date_rec']))/86400); //WALA PA HOLIDAYS	
		
		$q = "UPDATE `" . $GLOBALS['tbl_name'] . "` 
			SET 
				`date_proc`='" . $GLOBALS['date_proc'] . "', 
				`n_amt`='" . $GLOBALS['net_amt'] . "', 
				`check_num`='" . $GLOBALS['check_num'] . "',
				`status`='FOR_PROCESS',
				`tat`='" . $tat . "'
			WHERE `dv_id`='" . $GLOBALS['dvid'] . "';";
		
		mysql_query($q) or die(mysql_error());
		mysql_close();	

		header('Location: ..');
	}
	
	function return_dv(){
		$changeStatusq = 
			"UPDATE `" . $GLOBALS['tbl_name'] . "` 
				SET 
					`status`='RETURNED' 
				WHERE `dv_id`='" . $GLOBALS['dvid'] . "';";
				
		$insertDateRetq = 
			"INSERT INTO `trails_tbl` 
				(`dv_id`,`return_date`) VALUES
				('" . $GLOBALS['dvid'] . "', '" . $GLOBALS['date_rec'] . "');
				";
		
		mysql_query($changeStatusq);
		mysql_query($insertDateRetq);
			
		mysql_close();
		header('Location: ..');
	}
	
	if( $action == 'save'){
		require 'connect.php';
		encode_red();
	}
	else if( $action == 'return dv'){
		require 'connect.php';
		return_dv();
	}
	else{
		header('Location: ..');
	}

?>