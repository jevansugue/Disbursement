<?php

$host = "localhost";
$user = "sugue";
$pass = "123456789";
$db = "disbursement_db";
$status = 0;

function connect(){
	$lnk = mysql_connect( getHost(), getUser(), getPass() );
	mysql_select_db(getDatabaseName());

	if(!$lnk){
		die();
		$status = 1;
	}
	
	return $lnk;
}

function getDatabaseName(){
	return $GLOBALS['db'];
}

function getHost(){
	return $GLOBALS['host'];
}

function getUser(){
	return $GLOBALS['user'];
}

function getPass(){
	return $GLOBALS['pass'];
}

	connect();
?>
