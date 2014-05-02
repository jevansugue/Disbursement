<?php

require 'connect.php';

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
	$lnk = connect();
	$date = $date_rec;
	
	$query = "SELECT `date_receive`, `dv_num`
		FROM `disbursement_tbl`
		WHERE `date_receive` = '" . $date . "'
		ORDER BY `dv_num` DESC LIMIT 0, 1"; 
		
	$res = mysql_query($query, $lnk) or die(mysql_error());
	
	$row = mysql_fetch_array($res);
	
	
	$prev_dv = $row[1];
	
	$dv = $prev_dv + 1;

	if( strlen($dv) == 1 ){
		$dv = "00" . $dv;
	}
	else if( strlen($dv) == 2 ){
		$dv = "0" . $dv;
	}
	
	mysql_close($lnk);
	return $dv;
}


//INSERT START

	$date_rec = $_POST['date_recieved'];
	$payee = $_POST['payee'];
	$cat = $_POST['Category'];
	
	$g_amt = $_POST['GrossAmount'];
	$req_party = $_POST['req_party'];
	$req_unit = $_POST['req_unit'];;
	$status = "ENCODED";
	
	$DVNUM = getNextDv($date_rec);
	
	$dv_id = myTrim($date_rec, "-") . $DVNUM;
	
		
	if( isset($_POST['mode']) && isset($_POST['subcat']) ){
		$mode = $_POST['mode'];
		$subcat = $_POST['subcat'];
		$q = "INSERT INTO `disbursement_tbl`" .
		"(`dv_id`, `dv_num`,`date_receive`, `payee`, `category`, `g_amt`, `req_unit`, `req_party`, `status`, `mop`, `sub_cat`) VALUES (" . 
		"'" . $dv_id . "', " . 
		"'" . $DVNUM . "', " . 
		"'" . $date_rec . "', " . 
		"'" . $payee . "', " . 
		"'" . $cat . "', " . 
		"'" . $g_amt . "', " . 
		"'" . $req_unit . "', " . 
		"'" . $req_party . "', " . 
		"'" . $status . "', "	.
		"'" . $mode . "', " .
		"'" . $subcat . "'"	
		. ");";
	}
	else if( isset($_POST['mode']) ){
		$mode = $_POST['mode'];
		$q = "INSERT INTO `disbursement_tbl`" .
		"(`dv_id`, `dv_num`,`date_receive`, `payee`, `category`, `g_amt`, `req_unit`, `req_party`, `status`,`mop`) VALUES (" . 
		"'" . $dv_id . "', " . 
		"'" . $DVNUM . "', " . 
		"'" .  $date_rec . "', " . 
		"'" . $payee . "', " . 
		"'" . $cat . "', " . 
		"'" . $g_amt . "', " . 
		"'" . $req_unit . "', " . 
		"'" . $req_party . "', " . 
		"'" . $status . "', "	.
		"'" . $mode . "'"	
		. ");";
	}
	else if( isset($_POST['subcat']) ){
		$subcat = $_POST['subcat'];
		$q = "INSERT INTO `disbursement_tbl`" .
		$q = "INSERT INTO `disbursement_tbl`" .
		"(`dv_id`, `dv_num`,`date_receive`, `payee`, `category`, `g_amt`, `req_unit`, `req_party`, `status`, `sub_cat`) VALUES (" . 
		"'" . $dv_id . "', " . 
		"'" . $DVNUM . "', " . 
		"'" . $date_rec . "', " . 
		"'" . $payee . "', " . 
		"'" . $cat . "', " . 
		"'" . $g_amt . "', " . 
		"'" . $req_unit . "', " . 
		"'" . $req_party . "', " . 
		"'" . $status . "', "	.
		"'" . $subcat . "'"	
		. ");";
	}
	else{
		$q = "INSERT INTO `disbursement_tbl`" .
		"(`dv_id`, `dv_num`,`date_receive`, `payee`, `category`, `g_amt`, `req_unit`, `req_party`, `status`) VALUES (" . 
		"'" . $dv_id . "', " . 
		"'" . $DVNUM . "', " . 
		"'" . $date_rec . "', " . 
		"'" . $payee . "', " . 
		"'" . $cat . "', " . 
		"'" . $g_amt . "', " . 
		"'" . $req_unit . "', " . 
		"'" . $req_party . "', " . 
		"'" . $status . "'"	
		. ");";
	}
	
	$link = connect();
	
	mysql_query($q) or die(mysql_error());
	
	mysql_close($link);
	
	header('Location: ..');
?>
