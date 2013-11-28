<?php
	include('header.php');

?>


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
							
							<form style="margin-left:290px; margin-top:30px;" action="reading.php" method="get">
								<input style="margin-left:20px; margin-right:20px; padding:10px;" class="btn btn-primary" type="submit" name="category" value="Module">
								<input style="margin-left:20px; margin-right:20px; padding:10px;" class="btn btn-primary" type="submit" name="category" value="Course and Year">
								<input style="margin-left:20px; margin-right:20px; padding:10px;" class="btn btn-primary" type="submit" name="category" value="Course">
							</form>
							
						
						</div>
					
					
					
					</div>
				
					<div class="well">
						<?php
	
						

							
							include_once('reading.backbone.php');
						


						?>
					<div>
					
				</div>
				
				
					
				
			
			</div>
		
	</div>	
	
</body>
</html>	