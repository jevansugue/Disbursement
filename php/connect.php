<?php
$host = "localhost";
$username = "sugue";
$password = "123456";
$con = mysql_connect($host,$username,$password);
$my_db = "logbook";
$status = 0;

mysql_select_db($my_db, $con);

if (!$con)
  {
  
  die();
  $status = 1;
  }
//else 
?>