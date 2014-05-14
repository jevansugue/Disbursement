<?php
	$dbuser = "root";
	$dbpassword = "";
	$database = "disbursement_db";
	$dbhost = "localhost";
	$NUMBER_OF_INSERTS = 100;

	mysql_connect($dbhost, $dbuser, $dbpassword) or die(mysql_error());
	mysql_select_db($database);
	
	for($c=0 ; $c < $NUMBER_OF_INSERTS; $c++){
		$payee = "payee " . $c;
		$status = "FOR_PROC";
		$reqparty = $payee . " as reqparty";
		$requnit = "Department" . rand(1,5);
		$daterec = "2014-05-23";
		//date_default_timezone_set('Asia/Hong_Kong'); //TIMEZONE SETTING
		//$timestamp = new DateTime();
		//$timestamp_str = $timestamp->format('Y-m-d H:i:s');
		$timestamp_str = "2014-05-23 10:27:49";
		
		//$category
		switch(rand(1,6)){
			case 1:	$category = "PAYMENT";
					break;
			case 2:	$category = "REIMBURSE";
					break;
			case 3:	$category = "LIQUIDATION";
					break;
			case 4:	$category = "REPLENISHMENT_OF_PETTY";
					break;
			case 5:	$category = "CASH_ADV";
					break;
			case 6:	$category = "OTHER";
					break;
			default: break;
		}
		
		$g_amt = rand(1000,1000000);
		$dvnum = getNextDv($daterec);
		$dvid = myTrim($daterec, "-") . $dvnum;
		
		
		$main_sql = "INSERT INTO `disbursement_tbl` (`dv_id`, `date_receive`, `dv_num`, `payee`, `g_amt`, `req_unit`, `req_party`, `category`, `status`) VALUES 
		('$dvid', '$daterec', '$dvnum', '$payee', '$g_amt', '$requnit', '$reqparty', '$category', '$status');";
		
		mysql_query($main_sql) or die("cannot insert into disbursement_tbl : " . mysql_error());
		
		$trails_sql = "INSERT INTO `trails_tbl` (`empID`, `dv_id`, `date_stamp`, `status`) VALUES
		('accounting-person', '$dvid', '$timestamp_str', '$status');";
		
		mysql_query($trails_sql) or die("cannot insert into disbursement_tbl : " . mysql_error());
		
	}

	
function myTrim($str, $splitter){ //single characters only
	$len = strlen($str);
	$arr_str = array();
	$new_str = null;
	
	for($c=0, $c2=0; $c<$len; $c++){
		if( $str[$c] != "-"){
			$arr_str[$c2] = $str[$c];
			$c2++;
		}
	}
	
	for($i=0; $i<count($arr_str); $i++){
		$new_str = $new_str . $arr_str[$i];
	}

	return $new_str;
}

function getNextDv($date_rec){
	$date = $date_rec;
	$query = "SELECT `date_receive`, `dv_num`
		FROM `disbursement_tbl`
		WHERE `date_receive` = '" . $date . "'
		ORDER BY `dv_num` DESC LIMIT 0, 1"; 
		
	$res = mysql_query($query) or die(mysql_error());
	if($res != false){
		$row = mysql_fetch_array($res);
		
		
		$prev_dv = $row[1];
		
		$dv = $prev_dv + 1;

		if( strlen($dv) == 1 ){
			$dv = "00" . $dv;
		}
		else if( strlen($dv) == 2 ){
			$dv = "0" . $dv;
		}
	}
	else{
		$dv = "001";
	}
	return $dv;
}
?>