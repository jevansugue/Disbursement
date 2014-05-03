<html>
<head>
	<link rel='stylesheet' type='text/css' href='css/forms.css' />
<?php

    require 'php/connect.php';
    
    if(empty($_POST['dv_id']))
		$dvid = ''; 
	else 
		$dvid=$_POST['dv_id'];
            
    $q = 'SELECT *
           FROM disbursement_tbl
           WHERE dv_id = ' . $dvid;
           
           
    $result=mysql_query($q) OR DIE(mysql_error());
     
    $row=mysql_fetch_array($result);
	?>
</head>
<body>
	<!-- LAGYAN NG DIV DITO-->
	<form method='POST' action='php/action.php' id='encode'>
		<?php
			if(mysql_num_rows($result) > 0){
				echo "<fieldset>
					<legend> Disbursement Voucher : " . $dvid . "</legend>	
						<input type='hidden' value='" . $dvid . "' name='dvid' />
						<br />
						
						<label><span class='form'> Date Process </span></label>
						<input type = 'date' class='field' name='dateProc' value='" . date('Y-m-d') . "'/>
						<br />
						
						<label><span class='form'> Net Amount </span></label>
						<input type = 'text' name='netAmt' class='field'/>
						<br />

						<label><span class='form'> Check number </span></label>
						<input type = 'text' name='cNum' class='field'/>
						<br />
						
						<input type='submit' name='action' value='confirm' id='confirm'/>
						<input type='submit' name='action' value='return' id='return'/>
					</fieldset>";
			}
			else{
				echo "<script type='text/javascript'>";
				echo "alert('No records Found');";
				echo "document.location.href = 'index.php';";
				echo "</script>";
				
			}
			mysql_close();
		?>
	</form>
<body>
</html>
