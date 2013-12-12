<?php
//Author Kristjan Muutnik 1308701
//Page used to attach and detach a book from a specified module
require_once "inc/inc.php";

include 'header.php'; 


?>


<body>    
    <div class = "container">
        
    <?php include 'navigation_bar.php';
		require("check.admin.php");
	?>
    
    <h1>Attach Books</h1>
    <br>
	<div class = "well">
    <a href=book_create.php?>Create Book</a>

    <br>
    <br>
    
    <?php
    ob_start(); //turning on the output buffering
        try{
    
            $sql = "SELECT * from books WHERE Book_ID NOT IN (SELECT Book_ID FROM reading_list)"; //select books that are not yet attached to any modules
            $results = $conn->query($sql);
            $count = $results->rowCount();
        }
        catch (PDOException $e) {
                echo "error: ". $e->getMessage();
            }
              
        echo "<h4>Books not attached to modules</h4>";
        if ($count > 0) {	//check that more than 0 books have been found
		
		
		
		
            
			
            echo "<table class=\"table\">";
            echo "<th>Book ID</th><th>Title</th><th>First Author</th><th>Second Author</th><th>Publisher Name</th><th>Year Published</th><th>Subject</th> ";
            foreach ($results as $row) {
			
				$modules = $conn -> query ("SELECT Title, Module_ID FROM modules"); //select modules from the database to display them for attachment
				
                echo "<tr>";
                echo "<td>" . $row["Book_ID"] . "</td>";
                echo "<td>" . $row["Title"] . "</td>";
                echo "<td>" . $row["First_Author"] . "</td>";
                echo "<td>" . $row["Second_Author"] . "</td>";
                echo "<td>" . $row["Publisher"] . "</td>";
                echo "<td>" . $row["Year"] . "</td>";
                echo "<td>" . $row["Content_Summary"] . "</td>";
				
				echo "<td> Attach to: <form action = 'attach_books.php' method = 'get'>
				<select style='max-width:150px;' name='module'>";
					foreach($modules as $module){
						echo "<option value =".$module['Module_ID'].">".$module['Title']."</option>"; //display the modules available in an option list
					}
				//pass the id of the book with the button to be attached to selected a module
				echo "</select>
				
				<button type='submit' name ='attach' value ='".$row['Book_ID']."'>Attach</button> 
				</form>";
					
				
				
				
                echo "</tr>\n";
            }
            print "</table>\n";        
      
            
        }else{
			echo "All books are attached "; //if number of books was 0
		}

	if(isset($_GET['attach'])){	//when attach button is clicked
		$attachBook = $_GET['attach'];
		$attachModule = $_GET['module'];
		
		
		try {
                    $conn->beginTransaction();
                    $sql = "INSERT INTO reading_list(Module_ID, Book_ID) VALUES('$attachModule', '$attachBook')"; //insert id of the book and module id in to the reading list
                    $stmt = $conn->prepare($sql);                      
                    $stmt->execute();
                    $conn->commit();
					
                    
                   
					header("location:attach_books.php"); //refresh the page to display changes
					
                }
                catch(PDOException $e) {
                    $conn->rollback();
                    exit("unable to update the course: ". $e->getMessage());
                }
	
	}



		 try{
    
            $sql = "SELECT * from books WHERE Book_ID IN (SELECT Book_ID FROM reading_list)"; //display attached books
            $results = $conn->query($sql);
            $count = $results->rowCount();
        }
        catch (PDOException $e) {
                echo "error: ". $e->getMessage();
            }
              
        echo "<h4>Books attached to modules</h4>";
        if ($count > 0) {
		
		
		
		
            
			
            echo "<table class=\"table\">";
            echo "<th>Book ID</th><th>Title</th><th>First Author</th><th>Second Author</th><th>Publisher Name</th><th>Year Published</th><th>Subject</th> ";
            foreach ($results as $row) {
			
				
				
                echo "<tr>";
                echo "<td>" . $row["Book_ID"] . "</td>";
                echo "<td>" . $row["Title"] . "</td>";
                echo "<td>" . $row["First_Author"] . "</td>";
                echo "<td>" . $row["Second_Author"] . "</td>";
                echo "<td>" . $row["Publisher"] . "</td>";
                echo "<td>" . $row["Year"] . "</td>";
                echo "<td>" . $row["Content_Summary"] . "</td>";
				
				//the button passes the id of the book to be detached
				echo "<td> <form action = 'attach_books.php' method = 'get'>
				<button type='submit' name ='deattach' value ='".$row['Book_ID']."'>Detach</button> 
				</form>";
					
				
				
				
                echo "</tr>\n";
            }
            print "</table>\n";        
      
            
        }else{
			echo "No available books are attached to any modules, yet";
		}

	if(isset($_GET['deattach'])){
		$deattachBook = $_GET['deattach'];
		
		
		
		try {
		
                    $conn->beginTransaction();
                    $sql = "DELETE FROM reading_list WHERE Book_ID = '$deattachBook'"; //delete the row in the reading list with the specified book id
                    $stmt = $conn->prepare($sql);                      
                    $stmt->execute();
                    $conn->commit();
					
                    
                   
						
					header("location:attach_books.php");  //refresh page
					
					
                }
                catch(PDOException $e) {
                    $conn->rollback();
                    exit("unable to update the course: ". $e->getMessage());
                }
	
	}
        
        
        $conn = null; //close connection
    
    ?>
    </div>
    </div>
</body>



<?php include 'footer.php'

//End of Kristjan Muutnik 1308701
 ?>