<?php
	include('header.php');


						
						include_once('display.backbone.php');
						
				?>		

<body>






	<div class = "container">
		<?php include ("navigation_bar.php");?>	
			
	
	
	
		
			
			
			<div class="row-fluid">
			
				<div class="span2 ">
					<ul class="nav nav-list well">
						<li class="nav-header">Menu</li>
						<li><a href="reading.php">Browse</a></li>
						<li><a href="search.php">Search</a></li>
						
					
					</ul>
				
				</div>
			
				<div class ="span10 well">
				
					<div class="row fluid">
					
						<div class="span12" style="margin-left:10px;">
							<h3 style="margin-left:30px;">Book</h3>
							<ul class="nav nav-list">
								<li class="divider"></li>
							</ul>
						
						</div>
					
					
					</div>
					
					
					
					
					<div class="well">
					
				
					
				
					<?php
	
						
							 display(); 
							
							 
							 

						?>
					</div>
				</div>
				
				
					
				
			
			</div>
		
	</div>	
	
</body>
</html>	