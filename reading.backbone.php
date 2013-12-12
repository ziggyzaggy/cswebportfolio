<?php

/*
**@Author Kristjan Muutnik 1308701

** show correct books depending on which category the user clicked
*/


include('inc/inc.php');

	if(isset($_GET['category'])){
	
	
	
	$i = 1;
	
		//check which category was set and perform correct query
		
		
		if($_GET['category'] == 'Module'){ 
		
		
		
		 header("location:books_for_module.php");
		
		}elseif($_GET['category'] == 'Course and Year'){ 
		
		 echo "<h2>Course and Year books: </h2> <br>";
		 
		 $result = $conn -> query("SELECT Course_Title, Course_ID FROM courses"); //query the database for course name
		  
		 
			  foreach($result as $row){ //iterates through the result query displaying the courses available
				echo "<h3> " . $row['Course_Title'] . "</h3>  <br>";
				
				$courseId = $row['Course_ID']; //set current name of the course to a variable
				
				
				$years = $conn -> query ("
				SELECT Year_of_Teaching
				FROM course_modules, courses, modules
				WHERE course_modules.Course_ID = courses.Course_ID
				AND course_modules.Module_ID = modules.Module_ID
				AND course_modules.Course_ID = '$courseId'

				"); //iterates through the recommended years of a course
				foreach($years as $year){
				
					echo  " Books recommended for Year " . $year['Year_of_Teaching'] .":  <br><br>";
					$currentYear = $year['Year_of_Teaching'];
				
				$resultModule = $conn -> query("
			
			SELECT * FROM
			courses, modules, course_modules
			WHERE course_modules.Course_ID = courses.Course_ID 
			AND course_modules.Module_ID = modules.Module_ID 
			AND course_modules.Course_ID = '$courseId'
			");
			
			foreach($resultModule as $moduleRow){
			echo "module:<b> ". $moduleRow['Title']. " </b><br>";
			$moduleId = $moduleRow['Module_ID'];
				
				
				$resultBooks = $conn -> query				/**query the database with each id of the course
															 **returned in the previous loop
															*/
				("
				SELECT books.Title, books.Book_ID, course_modules.Year_of_Teaching
				FROM books, course_modules, reading_list
				WHERE  books.Book_ID = reading_list.Book_ID	
				AND reading_list.Module_ID = course_modules.Module_ID
				AND course_modules.Module_ID = '$moduleId'
				AND course_modules.Year_of_Teaching = '$currentYear'
				GROUP BY books.Book_ID
				"); 	
				
				
																								
				if($resultBooks -> rowCount($resultBooks) > 0){ //check if the module has any books recommended
				
					
				
					foreach($resultBooks as $booksRow){ //iterate through the books that correspond to each of the modules
		
						echo "<a style='padding-right:100px; padding-left:30px;' href = display.php?id=" . $booksRow['Book_ID'] . ">Recommended for year ".$booksRow['Year_of_Teaching'] .": View <b> " . $booksRow['Title'] . "</b> </a>  <br>"; //display links to each book that corresponds to the course name, links sends a unique id for to the display page
						}
					}else{
							echo "No book recommendations for this year yet<br>"; //if no books found for this module
						}
						
				echo "<br>";
				
				
				}
				
				
				
				}
			 echo "<br><hr style='border-bottom: 1px solid #BAC5EB;'>";
		}
		 
		
		}elseif($_GET['category'] == 'Course'){
		
		  echo "<h2>Courses:</h2> <br>";
		  
		  
		  $result = $conn -> query("SELECT Course_Title, Course_ID FROM courses"); //query the database for course name
		  
		 
		  foreach($result as $row){ //iterates through the result query displaying the courses available
			echo " <h3> " . $row['Course_Title'] . "</h3>  <br>";
			
			$courseId = $row['Course_ID']; //set current name of the course to a variable
			
			$resultModule = $conn -> query("
			
			SELECT * FROM
			courses, modules, course_modules
			WHERE course_modules.Course_ID = courses.Course_ID 
			AND course_modules.Module_ID = modules.Module_ID 
			AND course_modules.Course_ID = '$courseId'
			");
			
			foreach($resultModule as $moduleRow){
			echo "<br>module:<b> ". $moduleRow['Title']. " </b>";
			$moduleId = $moduleRow['Module_ID'];
			
			
					
					$resultBooks = $conn -> query				/**query the database with each id of the module
																 **returned in the previous loop
																*/
					("
					SELECT books.Title, books.Book_ID
					FROM books, modules, reading_list
					WHERE modules.Module_ID = reading_list.Module_ID		
					AND books.Book_ID = reading_list.Book_ID
					AND reading_list.Module_ID = '$moduleId'
					
					
					"); 	
					
					
																									
					if($resultBooks -> rowCount($resultBooks) > 0){ //check if the module has any books recommended
					
						echo " > books recommended for this Module: <br><br>";
					
						foreach($resultBooks as $booksRow){ //iterate through the books that correspond to each of the modules
			
							echo "<a style='padding-right:100px; padding-left:30px;' href = display.php?id=" . $booksRow['Book_ID'] . ">View <b> " . $booksRow['Title'] . "</b> </a>  <br>"; //display links to each book that corresponds to the course name, links sends a unique id for to the display page
							}
						}else{
								echo "No book recommendations for this course yet<br>"; //if no books found for this module
							}
					
					}
				echo "<br><hr style='border-bottom: 1px solid #BAC5EB;'>";
				}
			}
			
	
	}else{
		echo "Click one of the categories above to browse books!"; // if no category is yet selected
	
	}


//end of Kristjan Muutnik 1308701
?>