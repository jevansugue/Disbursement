<?php
	$action = $_POST['action'];
	$tbl_name = "disbursement_tbl";
	
	$dvid = $_POST['dvid'];
	$date_proc = $_POST['dateProc'];
	$net_amt = $_POST['netAmt'];
	$check_num = $_POST['cNum'];
	$date_rec = $_POST['date_rec'];
	$date_ret = $_POST['date_ret'];
	$subCat = $_POST['subCat'];
	$mop = $_POST['mop'];
	$orNum = $_POST['orNum'];
	$tinNum = $_POST['tinNum'];
	$nop = $_POST['nop'];
	$remarks= $_POST['rem'];
	
	$emp_id='1'; //TODO
	

	function encode_red($dvid,$emp_id, $date_proc, $check_num){
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
		
				
			$q = 
		"INSERT INTO `trails_tbl` 
			(`dv_id`,`date`, `remarks`, `empID`, `status`) VALUES
			('" . $dvid . "', '" . $date_proc . "', '" . 'Done Encoding Red' . "','" . $emp_id . "','PROCESSS');";	
		
mysql_query($q) or die(mysql_error());



		mysql_close();	

		//header('Location: ..');
	}
	
	function forRelease($subCat, $mop, $orNum, $tinNum, $nop, $emp_id, $date_proc, $remarks, $dvid){
		
		$q = "UPDATE `" . $GLOBALS['tbl_name'] . "`
			 SET
				`sub_cat` ='" . $subCat ."',
				`mop` ='" . $mop ."',
				`or_num` ='" . $orNum ."',
				`tin_num` ='" . $tinNum ."',
				`nat_of_pay` ='" . $nop ."',
				`status` ='RELEASE'
				
			WHERE `dv_id`=" . $GLOBALS['dvid'];
			echo $q;
		mysql_query($q) or die(mysql_error());
		
		echo $q;
		

			
		$q= "INSERT INTO `trails_tbl` (`empID`, `dv_id`,`date`, `remarks`,`status`)
				 VALUES
			('".$emp_id."','".$dvid."', '".$date_proc."', '".$remarks."','RELEASE');";	
		
		
		
		
				
			
		mysql_query($q) or die(mysql_error());
		
		echo $q;
		//mysql_close();	
				
		
	
	
	
	}
	
	
	if( $action == 'release'){
		require 'connect.php';
		forRelease($subCat, $mop, $orNum, $tinNum, $nop, $emp_id, $date_proc, $remarks, $dvid);
	}
	else if($action == 'Process'){
		require 'connect.php';
		
		encode_red($dvid,$emp_id, $date_proc, $check_num);
		/*
		$remarks = null; //TODO
		$emp_id = 1; //TODO
		
		$changeStatusq = 
		"UPDATE `" . $tbl_name . "` 
			SET 
				`status`='FOR_PROCESS' `date_proc` = ' 
			WHERE `dv_id`='" . $dvid . "';";
			
			echo $changeStatusq;
		$insertDateRetq = 
		"INSERT INTO `trails_tbl` 
			(`dv_id`,`return_date`, `remarks`, `empID`, `status`) VALUES
			('" . $dvid . "', '" . $date_proc . "', '" . $remarks . "','" . $emp_id . "','ACCEPTED');";	
		
		mysql_query($changeStatusq) or die(mysql_error());
		mysql_query($insertDateRetq) or die(mysql_error());
			
		mysql_close();
		*/
		//header('Location: ..');
	}
	else if( $action == 'return dv'){
		require 'returnDates_functions.php';
		require 'connect.php';
		//return_dv(tbl_name, dvid, date_ret, remarks) <-- function call parameter
		$remarks = null; //TODO
		$emp_id = 1; //TODO
		return_dv($tbl_name, $dvid, $date_ret, $remarks, $emp_id);
	}
	else{
		//header('Location: ..');
	}

?>
