<!DOCTYPE html>


<html>

<head>
<title></title>
<meta charset=?tf-8?
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/style.css">
	
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>

		

	
	

</head>


<body>






	<div class = "container">
		<div class = "navbar navbar-static-top" style ="margin-bottom:20px;">
			<div class ="navbar-inner">
				
					<a href="index.php" class="brand">LOGO</a>
				
					<ul class = "nav">
					<li> <a href="index.php">Home</a></li>
					<li class="active"> <a href="reading.php">Reading List</a></li> 
					</ul>
					
					<ul class = "nav pull-right">
					<li> <a href="admin.php">Admin</a></li>
					
					</ul>
					
				
			</div>	
		</div>		
			
	
	
	
		
			
			
			<div class="row-fluid">
			
				<div class="span2 ">
					<ul class="nav nav-list well">
						<li class="nav-header">Menu</li>
						<li class="active"><a href="reading.php">Browse</a></li>
						<li><a href="search.php">Search</a></li>
						
					
					</ul>
				
				</div>
			
				<div class ="span10 well">
				
					<div class="row fluid">
					
						<div class="span12" style="margin-left:10px;">
							<h3 style="margin-left:30px;">Browse</h3>
							<ul class="nav nav-list">
								<li class="divider"></li>
							</ul>
						
						</div>
					
					
					
					</div>
				
				
					<?php
	
						

						include_once('inc/inc.php');
						


						?>
					
				</div>
				
				
					
				
			
			</div>
		
	</div>	
	
</body>
</html>	