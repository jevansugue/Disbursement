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
				
				<li class='menuList'>  <a href='index.php' class='active'>   Home  </a> </li>
				
			
			</ul>
			
		</div>
	</div>
	
	
	
    <div class='tabContainer'>
		<div id='tabs'>
			<div id='tabs-1' class='tabContainer'>
				<form method='POST' action='php/action.php' id='encode-red' name='forProcDVs'>
<?php

	require "php/connect.php";
	
	$lnk= connect();
	
	
	
	
	if( isset($_POST['dv_id']))
	{
		$dv_id = $_POST['dv_id'];
		
		
		$q = "SELECT *
			 FROM disbursement_tbl
			 WHERE dv_id =" .$dv_id;
			 
		$result=mysql_query($q, $lnk) OR DIE(mysql_error());
		
		if($result != NULL)
			while ($row= mysql_fetch_array($result))
			{
			
			
				$dateRec = strtotime($row['date_receive']);
				$dateProc = strtotime($row['date_proc']);
				$TAT =$dateProc - $dateRec;
				$TAT =floor($TAT / (60*60*24));
				
				if($TAT == 0)
					$TAT = 1;
					
					
				echo "
					
				
			<div id='labelResWrapper1'>
		
			<div id='labelArea'>
				<input type='hidden' value='" . $dv_id . "' name='dvid' />
				<input type='hidden' value='" . date('Y-m-d') . "' name='date_ret' />
			
				<span class='label' > Disbursement ID</span>
				<br />
				<span class='label'> Payee</span>
				<br />
				<span class='label'> Gross Amount (PHP)</span>
				<br />
				<span class='label'> Net Amount (PHP)</span>
				<br />
				<span class='label'> Date Received</span>
				<br />
				<span class='label'> Date Processed</span>
				<br />
				<span class='label'> T.A.T</span>
				<br />
				<span class='label'> Voucher ID</span>
				<br />
				<span class='label'> Requesting Unit</span>
				<br />
				<span class='label'> Requesting Party</span>
				<br />
				<span class='label'> Category</span>
			
			</div>
			
			
		
			
			
			<div id='resArea'>
			
				<span class='res'> " . $row['dv_id'] ."</span>
				<input type='hidden' value=" . $row['dv_id'] ." name='dvid' />
				<br />
				<span class='res'>" . $row['payee'] ."</span>
				<br />
				<span class='res'>" . $row['g_amt'] ."</span> <span class='res'> Gross Amount</span>
				<br />
				<span class='res'>" . $row['n_amt'] ."</span> <span class='res'> Net Amount</span>
				<br />
				<span class='res'>" . $row['date_receive'] ."</span>
				<br />
				<span class='res'>" . $row['date_proc'] ."</span>
				<input type='hidden' value=" . $row['date_proc'] ." name='dateProc' />
				<br />
				<span class='res'>" . $TAT ."</span>
				<br />
				<span class='res'>" . $row['dv_id'] ."</span>
				<br />
				<span class='res'>" . $row['req_unit'] ."</span>
				<br />
				<span class='res'>" . $row['req_party'] ."</span>
				<br />
				<span class='res'>" . $row['category'] ."</span>
			
			</div>
		</div>
		
		<div id='labelResWrapper2'>
		
			<div id='labelArea2'>
			
				<span class='label' > Sub Category</span>
				<br /><br />
				<span class='label' > Mode of Payment</span>
				<br /><br />
				
				<span class='label'> O.R. Number</span>
				<br /><br />
				<span class='label'> TIN Number</span>
				<br /><br />
				
				<span class='label'> Nature of Payment</span>
				<br />
				<br />
				
				<span class='label'> Remarks </span>
				<br /> 
		
			</div>
			
			
			<div id='resArea2'>
			

				
				<input type='text' class='res' name='subCat' />
				<br /><br />
				<input type='text' class='res'name='mop' />
				<br /><br />
				<input type='text' class='res' name='orNum' />
				<br /><br />
				<input type='text' class='res' name='tinNum'/>
				<br /><br />
				<input type='text' class='res' name='nop'/>
				<br /><br />
				
				<textarea style='position: absolute' name='rem' form='encode-red'> </textarea>
				<br />
				
				
				
				
				
			
			
			</div>
			
			
		
		</div>
			<div id='buttonsArea' style='margin-top: 3.5em' >
				<input type='submit' name='action' value='release' id='confirm'/>
				<input type='submit' name='action' value='return dv' id='return'/>
				<input type='submit' name='action' value='cancel' id='return'/>
			</div>
								"; 
			
			
						}
						else 
							echo 'NO RESULT!';
		
	
	
	}


?>


					</form>
			</div>
		
		</div>
		
    </div>
    </body>

</html>


		
