<?php

/*
**@Author Kristjan Muutnik 1308701

** show correct books depending on which category the user clicked
*/


include('inc/inc.php');

	if(isset($_GET['category'])){
	
	
	
	$i = 1;
	
		//check which category was set and perform correct query
		//using admins table as no other table is created yet, will change once tables are available
		
		if($_GET['category'] == 'Module'){ 
		
		
		
		 echo "<h4>Module books: </h4> <br>";
		 
			$result = $dbh -> query("SELECT username FROM admin"); //that's work in progress
		 
		 foreach($result as $row){
			echo "<a href = display.php?id=" . $row['username'] . ">". $i. "&nbsp &nbsp View <b> " . $row['username'] . "</b> </a>  <br>";
			$i++;
		 }
		
		}elseif($_GET['category'] == 'Course and Year'){ //that's work in progress
		
		 echo "<h4>Course and Year books: </h4> <br>";
		 
		 $result = $dbh -> query("SELECT password FROM admin");
		 
		 foreach($result as $row){
			echo "<a href = display.php?id=" . $row['password'] . ">". $i. "&nbsp &nbsp View <b> " . $row['password'] . "</b> </a>  <br>";
			$i++;
		 }
		 
		
		}if($_GET['category'] == 'Course'){
		
		  echo "<h4>Courses:</h4> <br>";
		  
		  
		  $result = $dbh -> query("SELECT Course_Title, Course_ID FROM courses"); //query the database for course name
		  
		 
		  foreach($result as $row){ //iterates through the result query displaying the courses available
			echo "<a href = '#'>  <b> " . $row['Course_Title'] . "</b> </a>  <br>";
			
			$courseId = $row['Course_ID']; //set current name of the course to a variable
			
			
			
			
			$resultBooks = $dbh -> query				/**query the database with each id of the course
														 **returned in the previous loop
														*/
			("
			SELECT books.Title, books.Book_ID
			FROM books, courses, courses_recommended
			WHERE courses.Course_ID = courses_recommended.courseid			
			AND books.Book_ID = courses_recommended.bookid
			AND courses.Course_ID = '$courseId'
			"); 	
			
			
																							
			if($resultBooks -> rowCount($resultBooks) > 0){ //check if the course has any books recommended
			
				echo "books recommended for this course:<br><br>";
			
				foreach($resultBooks as $booksRow){ //iterate through the books that correspond to each of the courses
	
					echo "<a style='padding-right:100px; padding-left:30px;' href = display.php?id=" . $booksRow['Book_ID'] . ">View <b> " . $booksRow['Title'] . "</b> </a>  <br>"; //display links to each book that corresponds to the course name, links sends a unique id for to the display page
					}
				}else{
						echo "No book recommendations for this course yet"; //if no books found for this course
					}
			echo "<br><br><br>";
			}
		
		}
	
	
	}else{
		echo "Click one of the categories above to browse books!"; // if no category is yet selected
	
	}


//end of Kristjan Muutnik 1308701
?>