<?php
	include('header.php');

?>


<body>



	<div class = "container">
		<?php include ("navigation_bar.php");?>	
			
	
	
	
		<div class = "well">
			
			
			<div class="row-fluid">
				<div class ="span6 well">
					<h4>I am a normal User</h4>
				
					<p>and i want to see the book recommendations now!
					</p>
					
					<a class="btn btn-primary" href="reading.php">Take me to the reading list</a>
					
				</div>
				
				<div class="span6 well">
					<h4>I am the website administrator</h4>
					<p>Let me log in so i can update the content</p>
					<a class="btn btn-primary" href="admin.php">Log in</a>
				</div>		
			
			</div>
		</div>
	</div>	
	
</body>
</html>