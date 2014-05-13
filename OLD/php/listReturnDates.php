<?php
function getReturnDates($dvid){
	$dates = array();
	$q = "SELECT `dv_id`, `date` FROM `trails_tbl` WHERE `dv_id` = '" . $dvid . "' ORDER BY `date` DESC";
	//$q = "SELECT * FROM `trails_tbl` WHERE `dv_id` = '20140429001'";
	
	$res =  mysql_query($q) or die(mysql_error());
	
	while($row = mysql_fetch_assoc($res)){
		$dates[] = $row['date'];
	}
	
	return $dates;
}

function getReturnDates_html($dvid){
	$dates = getReturnDates($dvid);
	$string = "<select>";
	
	for($c=0; $c< count($dates); $c++){
		$string = $string . "<option>" . $dates[$c] . "</option>";
	}
	
	$string = $string . "</select>";
	
	return $string;
}
/*
$dvid = $_POST['dvid'];
require 'connect.php';
echo getReturnDates_html($dvid);
*/
?>