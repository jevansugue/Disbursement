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
            
                
	   $(document).ready(function() {
			var returnTable;
			var releaseTable;
			var forprocTable;
			var encodedTable;
			
			//PRE LOADED TABLE
			encodedTable = $('#encoded').dataTable( {					   
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "php/getEncodedDVs.php",
					"sPaginationType": "full_numbers",
					"bJQueryUI": true,
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": false,
					"bAutoWidth": true,
					"bSortClasses": false,
					"sScrollY": "200",							
					"bScrollCollapse": true,						
			}); 
			
			//DEBUG
			 forprocTable = $('#forproc').dataTable( {					   
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "php/getForProcDVs.php",
					"sPaginationType": "full_numbers",
					"bJQueryUI": true,
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": false,
					"bAutoWidth": true,
					"bSortClasses": false,
					"sScrollY": "200",							
					"bScrollCollapse": true,						
				});

				returnTable = $('#return').dataTable( {					   
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "php/getReturnedDVs.php",
					"sPaginationType": "full_numbers",
					"bJQueryUI": true,
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": false,
					"bAutoWidth": true,
					"bSortClasses": false,
					"sScrollY": "200",							
					"bScrollCollapse": true,						
				});    
				
				releaseTable = $('#release').dataTable( {					   
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "php/getReleaseDVs.php",
					"sPaginationType": "full_numbers",
					"bJQueryUI": true,
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": false,
					"bAutoWidth": true,
					"bSortClasses": false,
					"sScrollY": "200",							
					"bScrollCollapse": true,						
				});    
			//END PRELOAD
			
			
			$('#encoded-li').on('click', function(){
				if(encodedTable != 'undefined'){
					encodedTable.dataTable().fnDestroy();
				}
				 encodedTable = $('#encoded').dataTable( {					   
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "php/getEncodedDVs.php",
					"sPaginationType": "full_numbers",
					"bJQueryUI": true,
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": false,
					"bAutoWidth": true,
					"bSortClasses": false,
					"sScrollY": "200",							
					"bScrollCollapse": true,						
				});    
				
			});
			
			$('#forproc-li').on('click', function(){
				if(forprocTable != 'undefined'){
					forprocTable.dataTable().fnClearTable().fnDestroy();
				}
				
				 forprocTable = $('#forproc').dataTable( {					   
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "php/getForProcDVs.php",
					"sPaginationType": "full_numbers",
					"bJQueryUI": true,
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": false,
					"bAutoWidth": true,
					"bSortClasses": false,
					"sScrollY": "200",							
					"bScrollCollapse": true,						
				});    
			});
			
			$('#return-li').on('click', function(){
				if(returnTable != 'undefined'){
					returnTable.dataTable().fnDestroy();
				}
				
				 returnTable = $('#return').dataTable( {					   
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "php/getReturnedDVs.php",
					"sPaginationType": "full_numbers",
					"bJQueryUI": true,
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": false,
					"bAutoWidth": true,
					"bSortClasses": false,
					"sScrollY": "200",							
					"bScrollCollapse": true,						
				});    
			});
			
			$('#release-li').on('click', function(){
				if(releaseTable != 'undefined'){
					releaseTable.dataTable().fnDestroy();
				}
				 releaseTable = $('#release').dataTable( {					   
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "php/getReleaseDVs.php",
					"sPaginationType": "full_numbers",
					"bJQueryUI": true,
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": false,
					"bAutoWidth": true,
					"bSortClasses": false,
					"sScrollY": "200",							
					"bScrollCollapse": true,						
				});    
			});
						
	} );

       
	</script>
            
            
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
				<li class='menuList'>  <a href='#' class='inActive' >  Reports  </a> </li>
				
				<li class='menuList'>  <a href='#' class='active'>   Home  </a> </li>
				
			
			</ul>
			
		</div>
	</div>
	
	
	
    <div class='tabContainer'>
		<div id='tabs'>
		
		<ul>
			<li id='encoded-li'><a href="#tabs-1">Encoded</a></li>
			<li id='forproc-li'><a href="#tabs-2">Processing</a></li>
			<li id='return-li'><a href="#tabs-3">Returned</a></li>
			<li id='release-li'><a href="#tabs-4">Released</a></li>
			
			<li ><a href="#tabs-5">Encode New Disbursement</a></li>
			
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
                    <form method='POST' action='#process'>
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
                       <table cellpadding="0" cellspacing="0" border="0" class="display" id="return">
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
			
			<div id='tabs-5' class='tabContainer'>
			
				<form  name="new_dv_form" method="POST" action="php/encode_yellow.php" id="encode-yellow">
					<fieldset>
						<br />
						
						<label><span class='form' > Date recieved </span></label>
						<input type='date' name="date_recieved" class='field' value="<?php echo date('Y-m-d'); ?>" />
						<br />
						
						<span class='form' > Payee </span>
						<input type='text' name="payee" class='field'  />
						<br />					
								
						<label><span class='form'> Category </span></label>
						<select name='Category' class='field'>
							<option selected = "true" value=""> Choose... </option>
							<option value="PAYMENT">Payment</option>
							<option value="REIMBURSE">Reimbursment</option>
							<option value="LIQUID">Liquidation</option>
							<option value="REP_PETT">Replenishment of Petty Cash Fund</option>
							<option value="CASH_ADV">Cash Advance</option>
							<option value="OTHER">Other</option>
						</select>
						<br />		
							
						<label><span class='form' > subcategory </span></label>
						<input type='text' name="subcat" class='field'  />
						<br />
						
						<label><span class='form'> Gross amount </span></label>
						<input type='text' name="GrossAmount" class='field' />
						<br />
							
						<label><span class='form'> Mode </span><label>
						<select name='mode' class='field'>
							<option selected = "true" value=""> Choose... </option>
							<option value="CTA">Credit to Account</option>
							<option value="MC">Master's check</option>
						</select>
						<br />		
							
						<label><span class='form'>Requesting party</span><label>
						<input type='text' name="req_party" class='field' />
						<br />
							
						<label><span class='form'>Requesting unit</span></label>
						<select name='req_unit' class='field'>
							<option selected = "true" value=""> Choose... </option>
							<option value="DEPT1">Department1</option>
							<option value="DEPT2">Department2</option>
							<option value="DEPT3">Department3</option>
							<option value="DEPT4">Department4</option>
							<option value="DEPT5">Department5</option>
							<option value="DEPT6">Department6</option>
						</select>
						<br />
						
						<input type="submit" id="submit">
					</fieldset>
				</form>
		
			</div>
		
		</div>
		
    </div>
    </body>

</html>
