<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$host = "localhost";
$username = "sugue";
$password = "123456789";
$con = mysql_connect($host,$username,$password);
$my_db = "disbursement_db";
$status = 0;

mysql_select_db($my_db, $con);

if (!$con)
  {
  
  die();
  $status = 1;
  }
//else 




?>
