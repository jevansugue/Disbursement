<?php 
	include("../dbconfig.php");
	
	$page = $_GET['page']; //Current page number
	$limit = $_GET['rows']; //numRow from javascript
	$sidx = $_GET['sidx']; //sort selected row index
	$sord = $_GET['sord']; //sorting order
	 
	// default sort index if not exist
	if(!$sidx) 
		$sidx =1; 
	 
	//connect to the MySQL database server 
	$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error()); 
	 
	//select the database 
	mysql_select_db($database) or die("Error connecting to db."); 
	 
	//calculate the number of rows for the query. We need this for paging the result 
	$result = mysql_query("SELECT COUNT(*) AS count FROM invheader"); 
	$row = mysql_fetch_array($result,MYSQL_ASSOC); 
	$count = $row['count']; 
	 
	// calculate the total pages for the query 
	if( $count > 0 && $limit > 0) { 
				  $total_pages = ceil($count/$limit); 
	}
	else { 
				  $total_pages = 0; 
	}
	
	$start = $limit*$page - $limit;	//calculate the starting position of the rows 
	 
	//Error handling pages
	if ($page > $total_pages) 
		$page=$total_pages;
	  
	if($start <0) $start = 0; 
	
	 
	//the actual query for the grid data 
	$SQL = "SELECT invid, invdate, amount, tax,total, note FROM invheader ORDER BY $sidx $sord LIMIT $start , $limit"; 
	$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error()); 
	 
	// we should set the appropriate header information. Do not forget this.
	header("Content-type: text/xml;charset=utf-8");
	 
	$s = "<?xml version='1.0' encoding='utf-8'?>";
	$s .=  "<rows>";
	$s .= "<page>".$page."</page>";
	$s .= "<total>".$total_pages."</total>";
	$s .= "<records>".$count."</records>";
	 
	// be sure to put text data in CDATA
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
		$s .= "<row id='". $row['invid']."'>";            
		$s .= "<cell>". $row['invid']."</cell>";
		$s .= "<cell>". $row['invdate']."</cell>";
		$s .= "<cell>". $row['amount']."</cell>";
		$s .= "<cell>". $row['tax']."</cell>";
		$s .= "<cell>". $row['total']."</cell>";
		$s .= "<cell><![CDATA[". $row['note']."]]></cell>";
		$s .= "<cell>". $row['invid']."</cell>";
		$s .= "<cell>". $row['invdate']."</cell>";
		$s .= "<cell>". $row['amount']."</cell>";
		$s .= "<cell>". $row['tax']."</cell>";
		$s .= "<cell>". $row['total']."</cell>";
		$s .= "<cell><![CDATA[". $row['note']."]]></cell>";
		
		$s .= "</row>";
	}
	$s .= "</rows>"; 
	 
	echo $s;
?>