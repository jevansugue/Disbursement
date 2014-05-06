<!DOCTYPE HTML>

<html>

    <head>
    
	<!-- CSS PLUGINS -->
         
	<link rel='stylesheet' type='text/css' href='css/maybank/jquery-ui-1.10.4.custom.css' />
		
		
		<!-- 
         <link rel='stylesheet' type='text/css' href='media/css/shCore.css' />
         <link rel='stylesheet' type='text/css' href='media/css/shThemeDataTables.css' />
		 <link rel='stylesheet' type='text/css' href='css/demo_page.css' />
		 <link rel='stylesheet' type='text/css' href='css/demo_table.css' />
		
		-->
    
	<!-- END OF CSS PLUGINS -->
        
    
	<!-- JS PLUGINS -->
	<script  src='js/jquery-1.11.0.min.js'> </script>
	<script  src='js/jquery-ui-1.10.4.js'> </script>
	<script  src='js/knockout-3.1.0.js'> </script>
	<script src='js/knockout.simpleGrid.3.0.js'> </script>
	<script src='js/jquery.dataTables.js'> </script>
	<script src='media/js/shCore.js'> </script>
	<script src='media/js/shBrushJscript.js'> </script>    
	<!-- END OF  JS PLUGINS -->
        
        
	<!--  CUSTOM CSS -->
	<link rel='stylesheet' type='text/css' href='css/forms.css' />
	<link rel='stylesheet' type='text/css' href='css/index.css' />
	<!-- END OF CUSTOM  CSS-->
        
      
        
	<!-- CUSTOM JS -->
       
	<script>
                            
		$(document).ready(function() {

			$( "#tabs" ).tabs();
			
		} );
        
	</script>
            
            
	<script>
            
		$(function() {
			$( "#menu" ).menu({

			});
		});
        
	</script>
        
	<!-- END OF CUSTOM JS -->
    
	<!-- QUERY FOR FORM -->
	<?php

		require 'php/connect.php';
		
		if(empty($_POST['dv_id']))
			$dvid = ''; 
		else 
			$dvid=$_POST['dv_id'];
				
		$q = 'SELECT *
			   FROM disbursement_tbl
			   WHERE dv_id = ' . $dvid;
			   
	echo $q;
			   
		$result=mysql_query($q) OR DIE(mysql_error());
		 
		$row=mysql_fetch_array($result);
	?>
	
    </head>
    
    <body>
	
	
	<div id='navBarCon'>
	
		
		<div id='menuCont'>
		
			<ul id='menu' >
				
				<div id='logoCon'>
		
					Disbursement System
				
				</div>

				<li class='menuList'>  <a href='#' class='inActive' >  Sign in </a> </li>
				<li class='menuList'>  <a href='#' class='inActive' >  Reports  </a> </li>
				
				<li class='menuList'>  <a href='#' class='active'>   Home  </a> </li>
				
			
			</ul>
			
		</div>
	</div>
	
	
	
    <div class='tabContainer'>
		<div id='tabs'>
			<div id='tabs-1' class='tabContainer'>
				<form method='POST' action='php/action.php' id='encode-red'>
						<?php
							if(mysql_num_rows($result) > 0){
							
								echo "
									
		<div id='labelResWrapper1'>
				<input type='hidden' value='" . $dvid . "' name='dvid' />
				<input type='hidden' value='" . date('Y-m-d') . "' name='date_ret' />
				<div id='labelArea'>
				
					<span class='label' > Disbursement ID</span>
					<br /><br />
					<span class='label'> Payee</span>
					<br /><br />
					<span class='label'> Gross Amount (PHP)</span>
					<br /><br />
					<span class='label'> Net Amount (PHP)</span>
					<br /><br />
					<span class='label'> Date Received</span>
					<br /><br />
					<span class='label'> Date Processed</span>
					<br /><br />
					<span class='label'> Check Number: </span>
					<br /><br />
					<span class='label'> Voucher ID</span>
					<br /><br />
				
				</div>
			
			
		
			
			
				<div id='resArea'>
				
					<span class='res'> " . $dvid."</span>
					<br />
					<br />
					<span class='res'>" . $row['payee'] ."</span>
					<br />
					<br />
					<span class='res'>" . $row['g_amt'] ."</span> <span class='res'> Gross Amount</span>
					<br />
					<br />
					<input type = 'text' name='netAmt' class='res'/> <span class='res'> Net Amount</span>
					<br />
					<br />
					<span class='res'>" . $row['date_receive'] ."</span>
					<br />
					<br />
					<input type = 'date' class='res' name='dateProc' value='" . date('Y-m-d') . "'/>
					<br />
					<br />
					<input type = 'text' name='cNum' class='res'/>
					<br /><br />
					<span class='res'>" . $row['dv_id'] ."</span>
					<br /><br />
				
				</div>
		</div>
		
			<div id='buttonsArea'>
				<input type='submit' name='action' value='save' id='confirm'/>
				<input type='submit' name='action' value='return dv' id='return'/>
				<input type='submit' name='action' value='cancel' id='return'/>
			</div>
		
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
    </body>

</html>
