<?php

    require 'connect.php';
    
    $dvid = $_POST['dv_id'];
    
    if(empty($_POST['dv_id']))
            $dvid = ''; 
            else 
            $dvid=$_POST['dv_id'];
            
            
     $q = 'SELECT *
           FROM disbursement_tbl
           WHERE dv_id = ' . $dvid;
           
           
     $result=mysql_query($q) OR DIE(mysql_error());
     
     $row=mysql_fetch_array($result);
     
     if($row[0] = NULL)
     {
        echo 'No record';
     
     }
     else
     {
     // output form
     
        echo "<span>" . $dvid . "</span>";
        
     
     
     }



?>