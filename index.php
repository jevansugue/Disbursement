<!DOCTYPE HTML>

<html>

    <head>
    
     <link rel='stylesheet' type='text/css' href='css/index.css' />
    
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
        
    
    
      <link rel='stylesheet' type='text/css' href='css/index.css' />
            
        
        <!-- END OF CUSTOM  CSS-->
        
      
        
        <!-- CUSTOM JS -->
          <script src='js/getAllDV.js'> </script>
		    <script src='js/generateLinks.js'> </script>
        
        
            <script>
            
                
   $(document).ready(function() {
   
   
                      
    
                   var oTable = $('#example').dataTable( {
				   
				   
				   
                        
                        "bProcessing": true,
                        "bServerSide": true,
                        "sAjaxSource": "php/getDVs.php",
                    
                     
                       
                                    
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
					
						"fnCreatedRow": function( nRow, aData, iDataIndex ) {
							$('td:eq(0)', nRow).html("<input type='submit' value='" + aData[0] +"' name='dv_id' class='submitDvId'>");
						}
    
                    }); //data tables
                    
                    
  
    
					
                    
  
  
         

					
					
		
 
	
                    
                  

       
  

        $( "#tabs" ).tabs();
} );




            
                
            
            </script>
            
            
            <script>
            
                
            
            
            
            </script>
        
        
            
        
        <!-- END OF CUSTOM JS -->
    
    </head>
    
    <body>
    <div class='tabContainer'>
		<div id='tabs'>
		
		<ul>
			<li><a href="#tabs-1">Disbursement Vouchers</a></li>
			<li><a href="#tabs-2">Processing</a></li>
			<li><a href="#tabs-3">Returned</a></li>
			<li><a href="#tabs-4">Released</a></li>
			<li><a href="#tabs-5">Encode New Disbursement</a></li>
			
		</ul>
		
			<div id='tabs-1' class='tabContainer'>
			
				<div class=''>
                    <form method='POST' action='php/getDVids.php'>
                       <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
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
			
			
			<div id='tabs-2' class='tabContainer'>
			
				VIEW ALL PROCESSING VOUCHERS
				
			</div>
			
			<div id='tabs-3' class='tabContainer'>
			
			   VIEW ALL RETURNED VOUCHERS
			
			</div>
			
			 <div id='tabs-4' class='tabContainer'>
			
				VIEW ALL RELEASED VOUCHERS
			
			</div>
			
			<div id='tabs-5' class='tabContainer'>
			
					<form  name="new_dv_form" method="POST" action="php/encode_yellow.php" >
					<table>
						<tr>
							<td class='right'> <span class='label' > Date recieved </span></td>
							<td class='left'><input type='date' name="date_recieved" class='field' value="<?php echo date('Y-m-d'); ?>" /></td>
						</tr>
						<tr>
							<td class='right'> <span class='label' > Payee </span></td>
							<td class='left'><input type='text' name="payee" class='field'  /></td>
						</tr>
						<tr>
							<td class='right'> <span class='label'> Category </span></td>
							<td class='left'>
								<select name='Category' class='field'>
									<option selected = "true" value=""> Choose... </option>
									<option value="PAYMENT">Payment</option>
									<option value="REIMBURSE">Reimbursment</option>
									<option value="LIQUID">Liquidation</option>
									<option value="REP_PETT">Replenishment of Petty Cash Fund</option>
									<option value="CASH_ADV">Cash Advance</option>
									<option value="OTHER">Other</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class='right'> <span class='label' > subcategory </span></td>
							<td class='left'><input type='text' name="subcat" class='field'  /></td>
						</tr>
						<tr>
							<td class='right'> <span class='label'> Gross amount </span></td>
							<td class='left'> <input type='text' name="GrossAmount" class='field' /></td>
						</tr>
						<tr>
							<td class='right'> <span class='label'> Mode </span></td>
							<td class='left'>
								<select name='mode' class='field'>
									<option selected="true"></option>
									<option value="CTA">Credit to Account</option>
									<option value="MC">Master's check</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="right"> <span class='label'>Requesting party</span></td>
							<td class='left'><input type='text' name="req_party" class='field' /></td>
						</tr>
						
						<tr>
							<td class="right"> <span class='label'>Requesting unit</span></td>
							<td class='left'><input type='text' name="req_unit" class='field' /></td>
						</tr>
						
						
					</table>
					<input type="submit">
				</form>
		
			</div>
		
		</div>
		
    </div>
    </body>

</html>
