<?php

    require 'php/connect.php';
    
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
     
        echo "<span> Disbursement Voucher : " . $dvid . "</span>";
        echo "
                <form method='POST' action='php/action.php'>
					
					<input type='hidden' value='" . $dvid . "' name='dvid' />
                    <br />
                    <span> Date Process </span>
                    <input type = 'date' name='dateProc' value='" . date('Y-m-d') . "'/>
                    
                    
                    <br />
                    <span> Net Amount </span>
                    <input type = 'text' name='netAmt' />
                    
                    <br />
                    <span> Check number </span>
                    <input type = 'text' name='cNum' />
                   
                    <br />
                    <input type='submit' name='action' value='confirm' />
                    <input type='submit' name='action' value='return' />
                </form>
        
        
        
        
        ";
        
     
     
     }

	mysql_close();

?>