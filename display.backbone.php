<?php

/**
**@author Kristjan Muutnik 1308701
**The backbone for displaying a chosen book with all of it's details
**/




		
		
	
			
			function display(){ //function to display all the information needed
				include("inc/inc.php");
			
			
				if(isset($_GET['id'])){
				
				$bookID = $_GET['id']; //store id in the variable
				$books = $conn -> query("SELECT * FROM books WHERE Book_ID = '$bookID' "); //query database with the stored id

			
				foreach($books as $row){ //populate variables with database data
					$bookTitle = $row['Title'];
					$id = $row['Book_ID'];
					$keyword = $row['Content_Summary'];
					$author = $row['First_Author'];
					$secondAuthor = $row['Second_Author'];
					$publisher = $row['Publisher'];
					$year = $row['Year'];
					
				}

					echo "
					
					
					
					
					<div class='row-fluid'><b>
				
						<div class='span2'>Title</div>
						<div class='span1'>ID</div>
						<div class='span2'>First Author</div>
						<div class='span2'>Second Author</div>
						<div class='span2'>Publisher</div>
						<div class='span1'>Year</div>
						<div class='span2'>Description</div>
						</b>
						
					</div>";
					echo "
					<div class='row-fluid'>
					
						<div class='span2'>" . $bookTitle . "</div>
						<div class='span1'>". $id ."</div>
						<div class='span2'>". $author ."</div>
						<div class='span2'>". $secondAuthor ."</div>
						<div class='span2'>". $publisher ."</div>
						<div class='span1'>". $year ."</div>
						<div class='span2'>" . $keyword  . "</div>
						
					</div>";
					$conn = null; //close connection
					
					}else{	//if no book was chosen (in case some smart people will try input the url manually)
					
					$noBookSelected = "No book was selected, please use <a href='search.php'>search</a> or <a href='reading.php'>browse</a> to select one";
					echo $noBookSelected;
					$bookTitle = "";
					
					}
			}
			
			
			
		
	


//end of Kristjan Muutnik 1308701
?>