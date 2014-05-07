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
        
        
            
        
        <!-- END OF CUSTOM JS -->
    
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
			<li id='encoded-li'><a href="#tabs-1">TAT</a></li>
			<li id='forproc-li'><a href="#tabs-2">Requesting unit</a></li>
			<li id='return-li'><a href="#tabs-3">categories</a></li>
			<li id='release-li'><a href="#tabs-4">Dv count</a></li>
			
		</ul>
		
			<div id='tabs-1' class='tabContainer'>
			
				<div class=''>
                    <form method='POST' action='getDVids.php'>
                       <table cellpadding="0" cellspacing="0" border="0" class="display" id="encoded">
                            <thead>
                                <tr>
                                    <th class='cHeader' >Voucher id</th>
                                    <th class='cHeader'>Date Recieved</th>
                                    <th class='cHeader'>Payee</th>
                                    <th class='cHeader'>DV number</th>
                                    <th class='cHeader'>gross amount</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="dataTables_empty">Loading data from server</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="25%">Voucher id</th>
                                    <th width="20%">Date Recieved</th>
                                    <th width="25%">Payee</th>
                                    <th width="15%">DV number</th>
                                    <th width="15%">gross amount</th>
                                    
                                </tr>
                            </tfoot>
                    </table>
                </form>

				</div>
					
			</div>
			
			
			<div id='tabs-2' class='tabContainer'>
			
				<div class=''>
                    <form method='POST' action='procDVs.php'>
                       <table cellpadding="0" cellspacing="0" border="0" class="display" id="forproc">
                            <thead>
                                <tr>
                                    <th >Voucher id</th>
                                    <th >Date Recieved</th>
                                    <th >Payee</th>
                                    <th >DV number</th>
                                    <th >gross amount</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="dataTables_empty">Loading data from server</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="25%">Voucher id</th>
                                    <th width="20%">Date Recieved</th>
                                    <th width="25%">Payee</th>
                                    <th width="15%">DV number</th>
                                    <th width="15%">gross amount</th>
                                    
                                </tr>
                            </tfoot>
						</table>
					</form>

				</div>
			</div>
			
			<div id='tabs-3' class='tabContainer'>
			
				<div class=''>
					<form method='POST' action='#returned'>
                       <table cellpadding="0" cellspacing="0" border="0" class="display" id="returned">
                            <thead>
                                <tr>
                                    <th >Voucher id</th>
                                    <th >Date Recieved</th>
                                    <th >Payee</th>
                                    <th >Returned Dates</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="dataTables_empty">Loading data from server</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th >Voucher id</th>
                                    <th >Date Recieved</th>
                                    <th >Payee</th>
                                    <th >Returned Dates</th>
                                    
                                </tr>
                            </tfoot>
						</table>
					</form>
				</div>
			</div>
			
			 <div id='tabs-4' class='tabContainer'>
			
				<div class=''>
					<form method='POST' action='#released'>
                       <table cellpadding="0" cellspacing="0" border="0" class="display" id="release">
                            <thead>
                                <tr>
                                    <th >Voucher id</th>
                                    <th >Date Recieved</th>
                                    <th >Payee</th>
                                    <th >DV number</th>
                                    <th >gross amount</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="dataTables_empty">Loading data from server</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="25%">Voucher id</th>
                                    <th width="20%">Date Recieved</th>
                                    <th width="25%">Payee</th>
                                    <th width="15%">DV number</th>
                                    <th width="15%">gross amount</th>
                                    
                                </tr>
                            </tfoot>
						</table>
					</form>
				</div>
			
			</div>
		
		</div>
		
    </div>
    </body>

</html>
