<!DOCTYPE HTML>

<html>

    <head>
    
     <link rel='stylesheet' type='text/css' href='css/index.css' />
	 <link rel='stylesheet' type='text/css' href='css/forms.css' />
    
        <!-- CSS PLUGINS -->
         
        <link rel='stylesheet' type='text/css' href='css/maybank/jquery-ui-1.10.4.custom.css' />
		<link rel='stylesheet' type='text/css' href='css/colorbox.css' />
		
		
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
	   <script src='media/js/jquery.colorbox.js'> </script>
        
            
        
        <!-- END OF  JS PLUGINS -->
        
        
        <!--  CUSTOM CSS -->
        
    
    
      <link rel='stylesheet' type='text/css' href='css/index.css' />
            
        
        <!-- END OF CUSTOM  CSS-->
        
      
        
        <!-- CUSTOM JS -->
          <script src='js/getAllDV.js'> </script>
		    <script src='js/generateLinks.js'> </script>
        
            
            
	<script>
            
		$(function() {
					 
			$( "#menu" ).menu();
				
			$('#tabs ul').show({
					
			});
			
			$( "#tabs" ).tabs({
				"show": function(event, ui, readyTable) {
						
				},
			});
		
		});
            
	</script>
        
        
		<script type="text/javascript">

		function showDvCount(){
			var myselect = document.getElementById("date_chosen");
			var val = myselect.options[myselect.selectedIndex].value;
			
			var number = $.ajax({
							  url:"php/numberofdvperday.php",
							  type:"POST",
							  async:false,
							  data:{
									date:val
								},
							  success:function(d){
								document.getElementById("count").innerHTML = d;
							  }
							});
		}
            
        </script>
        <!-- END OF CUSTOM JS -->
    
	<!-- PHP LIBS -->
	<?php require 'php/connect.php'; ?>
	
	<!-- END OF PHP LIBS -->
    </head>
    
    <body>
	
	
	<div id='navBarCon'>
	
		
		<div id='menuCont'>
		
			<ul id='menu' >
				
				<div id='logoCon'>
		
					Disbursement System
				
				</div>

				<li class='menuList'>  <a href='#' class='inActive' >  Sign in </a> </li>
				<li class='menuList'>  <a href='reports.php' class='inActive' >  Reports  </a> </li>
				
				<li class='menuList'>  <a href='index.php' class='active'>   Home  </a> </li>
				
			
			</ul>
			
		</div>
	</div>
	
	
	
    <div class='tabContainer'>
		<div id='tabs'>
		
		<ul>
			<li id='encoded-li'><a href="#tabs-1">TAT and Dv count</a></li>
			<li id='forproc-li'><a href="#tabs-2">Requesting unit</a></li>
			<li id='return-li'><a href="#tabs-3">categories</a></li>
			
		</ul>
		
			<div id='tabs-1' class='tabContainer'>
			
				<div class=''>
                    <div id='labelArea'>					
						<span class='label' > Total Average turn around time :</span>
						<br />
						<span class='label' > Monthly Average turn around time :</span>
						<br />
						<span class='label' > weekly Average turn around time :</span>
						<br />
						<span class='label'> Monthly Average recieved dv :</span>
						<br />
						<span class='label'> Weekly Average recieved dv :</span>
						<br />
						<span class='label'> 
							number of dv received on 
							<select name='date_chosen' id='date_chosen' onChange="showDvCount()"> 
								<option value="" disabled selected style="display:none;"></option>
								<?php
									$q = "SELECT DISTINCT  `date_receive` FROM  `disbursement_tbl`";
									
									$res = mysql_query($q);
									
									while( $row = mysql_fetch_assoc($res) ){
										echo "<option value='" . $row['date_receive'] . "'>" . $row['date_receive'] . "</option>";
									}
									
								?>
							</select>
						</span>
						<br />
					</div>
					
					
				
					
					
					<div id='resArea'>
						<span class='res'> 
							0
						</span>
						<br />
						<span class='res'> 
						<?php
							$q = "SELECT AVG(a.totalTat/a.count) as avg
								FROM (SELECT COUNT( * ) AS count, MONTH( date_receive ) AS mnth, SUM( tat ) AS totalTat
									FROM disbursement_tbl
									GROUP BY mnth
								) AS a";
							$res = mysql_fetch_array(mysql_query($q));
							echo $res['avg'];
						?>
							

						</span>
						<br />
					
						<span class='res'> 
							0
						</span>
						<br />
						<span class='res'> 
						<?php
								$q = "SELECT AVG(a.count) AS avg 
									FROM ( SELECT count(*) AS count, MONTH(date_receive) as mnth
										   FROM disbursement_tbl
										   GROUP BY mnth) AS a";
								$res = mysql_fetch_array(mysql_query($q));
								echo $res['avg'];
						?>
						</span>
						<br />
						<span class='res'> 0</span> 
						<br />
						<span class='res' id="count"> 0</span> 
						<br />
						
					</div>
				</div>
					
			</div>
			
			
			<div id='tabs-2' class='tabContainer'>
			
				<div class=''>
                    <span class='label'> 
							reports on :
							<select name='date_chosen' id='date_chosen' onChange="showDvCount()"> 
								<option value="" disabled selected style="display:none;"></option>
								<?php
									
									$q = "SELECT DISTINCT  `req_unit` FROM  `disbursement_tbl`"; //REQ UNIT BA OR PARTY?
									
									$res = mysql_query($q) or die(mysql_error());
									
									while( $row = mysql_fetch_assoc($res) ){
										echo "<option value='" . $row['req_unit'] . "'>" . $row['req_unit'] . "</option>";
									}
									
								?>
							</select>
						</span>

				</div>
			</div>
			
			<div id='tabs-3' class='tabContainer'>
			
				<div class=''>
					
				</div>
			</div>
			
		
		</div>
		
    </div>
    </body>

</html>
