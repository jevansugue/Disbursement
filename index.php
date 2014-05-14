<!DOCTYPE HTML>
<html>


	<head>
	
		
		
		<!-- CSS Plugins -->
			<link rel='stylesheet' type='text/css' href='css/maybank/jquery-ui-custom.css' />
			<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		
		<!-- end of CSS Plugins -->
		
		
		<!-- JS Plugins -->
		
			<script  src='js/jquery.js' > </script>
			<script  src='js/jquery-ui.js' > </script>
			<script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
			<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
		
		<!-- end of JS Plugins -->
		
		
		<!-- CUSTOM CSS -->
		
			<link rel='stylesheet' type='text/css' href='css/main.css' />
		
		<!-- end of custom CSS -->
		
		
		<!-- CUSTOM JS -->
		
			<script>
				$(function() {
					$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
					$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
					
					$(".nav").menu();

				});
			</script>
		
		<!-- end of CUSTOM JS -->
		
		
		<!-- JQGRID CUSTOM JS -->
		
			<script type="text/javascript" src="js/tables.js"></script>
		
		<!-- end of JQGRUD CUSTOM JS -->
	
	
	</head>
	
	
	<div id='header'>
		
		<div id='hWrapper'>
		
			
		
			<div id='imgCon'>
				
				
			
			</div>
			
			
			
			<div id='navBar'>
				
				<ul id="menu" class='nav'>
					
					<li><a href="#"><span class=""></span>Sign In</a></li>
					<li><a href="#"><span class=""></span>Reports</a></li>
					<li ><a href="#" class='active'><span class=""></span>Home</a></li>
					
				
	 
				</ul>
			
			</div>
			
			
		</div>
		
	
	</div>
	
	<body>
	
		<div id='container'>
		
			<div id="tabs">
				  <ul>
					<li><a href="#tabs-1">Encode New Disbursement Voucher</a></li>
					<li><a href="#tabs-2">For Processing Vouchers</a></li>
					<li><a href="#tabs-3">Processing Vouchers</a></li>
					<li><a href="#tabs-4">Returned Vouchers</a></li>
					<li><a href="#tabs-5">View Released Vouchers</a></li>
					
				  </ul>
				  <div id="tabs-1">
						<div class='tblWrapper'>
						
						</div>
					</div>
				  <div id="tabs-2">
					<table id="forproc-vouchers"></table> 
					<div id="forproc-vouchers-pager"></div> 
				  </div>
				  <div id="tabs-3">
					<div class='tblWrapper'>
					
						<table id="processing-vouchers"></table> 
						<div id="processing-vouchers-pager"></div>
					
					</div>
				  </div>
				  
				   <div id="tabs-4">
					<table id="returned-vouchers"></table> 
					<div id="returned-vouchers-pager"></div> 
				  </div>
				  <div id="tabs-5">
					<table id="released-vouchers"></table> 
					<div id="released-vouchers-pager"></div> 
				  </div>
			</div>
			
		
		
		</div>
	
	
	</body>
	
	<div id='footer'>
		 &copy; 2014 MPI Interns. All Rights Reserved.
	</div>



</html>