<?php

    require 'php/connect.php';
    
    $dv_id = $_POST['dv_id'];
    
    if(empty($_POST['dv_id']))
            $dv_id = ''; 
            else 
            $dv_id=$_POST['dv_id'];
            
            
     $q = 'SELECT *
           FROM disbursement_tbl
           WHERE dv_id = ' . $dv_id;
           
           
     $result=mysql_query($q) OR DIE(mysql_error());
     
     $row=mysql_fetch_array($result);
     
     if($row[0] = NULL)
     {
        echo 'No record';
     
     }
     else
     {
     // output form
     
        echo "<span>" . $dv_id . "</span>";
        
     
     
     }



?>