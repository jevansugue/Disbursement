<html>
<head>
	<link rel='stylesheet' type='text/css' href='css/forms.css' />
    <link rel='stylesheet' type='text/css' href='css/index.css' />
	
	<!-- CUSTOM JS -->
	<script src='js/getAllDV.js'> </script>
	<script src='js/generateLinks.js'> </script>
	
	<!-- JS PLUGINS -->
        
	<script  src='js/jquery-1.11.0.min.js'> </script>
	<script  src='js/jquery-ui-1.10.4.js'> </script>
	<script  src='js/knockout-3.1.0.js'> </script>
	<script src='js/knockout.simpleGrid.3.0.js'> </script>
	<script src='media/js/shCore.js'> </script>
	<script src='media/js/shBrushJscript.js'> </script>
        
	<!-- END OF  JS PLUGINS -->
	
	<!-- CSS PLUGINS -->
         
	<link rel='stylesheet' type='text/css' href='css/maybank/jquery-ui-1.10.4.custom.css' />
       
	<!-- END OF CSS PLUGINS -->

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
	<div id='navBarCon'>
	
		<div id='logoCon'>
		
		
			</div>
		<div id='menuCont'>
		
			<ul id='menu' >
				

				<li class='menuList'>  <a href='#' class='active'>   Home  </a> </li>
				<li class='menuList'>  <a href='#' class='inActive' >  Reports  </a> </li>
				<li class='menuList'>  <a href='#' class='inActive' >  Sign in </a> </li>
				
			</ul>
			
		</div>
	</div>

    <div class='tabContainer'>
		<div id='tabs'>
			<div id='tabs-1' class='tabContainer'>
				<div class=''>
					<form method='POST' action='php/action.php' id='encode'>
						<?php
							if(mysql_num_rows($result) > 0){
								echo "
									<fieldset>
										<legend> Disbursement Voucher : " . $dvid . "</legend>	
										<input type='hidden' value='" . $dvid . "' name='dvid' />
										<input type='hidden' value='" . $row['date_receive'] . "' name='date_rec' />
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
									</fieldset>
									
								";
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
				</div>
			</div>
		</div>
	</div>
<body>
</html>
