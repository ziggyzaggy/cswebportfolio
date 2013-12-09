<?php

include_once('header.php');
?>


<body>






	<div class = "container">

		<?php include ("navigation_bar.php");?>
			
	
	
	
		
			
			
			<div class="row-fluid">
			
				<div class="span2 ">
					<ul class="nav nav-list well">
						<li class="nav-header">Menu</li>
						<li><a href="reading.php">Browse</a></li>
						<li class="active"><a href="search.php">Search</a></li>
						
					
					</ul>
				
				</div>
			
				<div class ="span10 well">
				
					<div class="row fluid">
					
						<div class="span12" style="margin-left:10px;">
							<h3 style="margin-left:30px;">Search</h3>
							<ul class="nav nav-list">
								<li class="divider"></li>
							</ul>
						
						</div>
					
					
					</div>
					
					
					<div>
						Search Box:
						<br>
						<form action="search.php" method="get">
						
							<input type="text" name="searchField" placeholder="input search here"><br>
							<input class="btn btn-primary" type="submit" name="snoop" value="Search">
						
						
						</form>
						
					
					</div>
					
					
				
					<?php
	
						

						
						include_once('snoop.php');
						


						?>
					
				</div>
				
				
					
				
			
			</div>
		
	</div>	
	
</body>
</html>	