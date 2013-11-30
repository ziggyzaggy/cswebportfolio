<?php

/**
**@author Kristjan Muutnik 1308701
**The backbone for displaying a chosen book with all of it's details
**/




		
		
	
			
			function display(){ //function to display all the information needed
				include("inc/inc.php");
			
			
				if(isset($_GET['id'])){
				
				$bookID = $_GET['id']; //store id in the variable
				$books = $dbh -> query("SELECT title, bookid, author, keyword FROM books WHERE bookid = '$bookID' "); //query database with the stored id

			
				foreach($books as $row){ //populate variables with database data
					$bookTitle = $row['title'];
					$id = $row['bookid'];
					$keyword = $row['keyword'];
					$author = $row['author'];
				}

					echo "
					<div class='row-fluid'><b>
					<div class='span3'>Title</div>
					<div class='span3'>ID</div>
					<div class='span3'>Author</div
					><div class='span3'>Keyword</div>
					</b>
					</div>";
					echo "
					<div class='row-fluid'>
					<div class='span3'>" . $bookTitle . "</div>
					<div class='span3'>". $id ."</div>
					<div class='span3'>". $author ."</div>
					<div class='span3'>" . $keyword  . "</div>
					</div>";
					$dbh = null; //close connection
					
					}else{	//if no book was chosen (in case some smart people will try input the url manually)
					$noBookSelected = "No book was selected, please use <a href='search.php'>search</a> or <a href='reading.php'>browse</a> to select one";
					echo $noBookSelected;
					$bookTitle = "";
					
					}
			}
			
			
			
		
	


//end of Kristjan Muutnik 1308701
?>