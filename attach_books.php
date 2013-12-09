<?php
//Author Kristjan Muutnik 1308701
//Page used to attach books to a specified module
require_once "inc/inc.php";

include 'header.php'; 
?>


<body>    
    <div class = "container">
        
    <?php include 'navigation_bar.php' ?>
    
    <h1>Attach Books</h1>
    <br>
	<div class = "well">
    <a href=book_create.php?>Create Book</a>

    <br>
    <br>
    
    <?php
    
        try{
    
            $sql = "SELECT * from books WHERE Book_ID NOT IN (SELECT Book_ID FROM reading_list)";
            $results = $conn->query($sql);
            $count = $results->rowCount();
        }
        catch (PDOException $e) {
                echo "error: ". $e->getMessage();
            }
              
        echo "<h4>Books not attached to modules</h4>";
        if ($count > 0) {
		
		
		
		
            
			
            echo "<table class=\"table\">";
            echo "<th>Book ID</th><th>Title</th><th>First Author</th><th>Second Author</th><th>Publisher Name</th><th>Year Published</th><th>Subject</th> ";
            foreach ($results as $row) {
			
				$modules = $conn -> query ("SELECT Title, Module_ID FROM modules");
				
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
						echo "<option value =".$module['Module_ID'].">".$module['Title']."</option>";
					}
				
				echo "</select>
				
				<button type='submit' name ='attach' value ='".$row['Book_ID']."'>Attach</button>
				</form>";
					
				
				
				
                echo "</tr>\n";
            }
            print "</table>\n";        
      
            
        }

	if(isset($_GET['attach'])){
		$attachBook = $_GET['attach'];
		$attachModule = $_GET['module'];
		
		
		try {
                    $conn->beginTransaction();
                    $sql = "INSERT INTO reading_list(Module_ID, Book_ID) VALUES('$attachModule', '$attachBook')";
                    $stmt = $conn->prepare($sql);                      
                    $stmt->execute();
                    $conn->commit();
					
                    
                    echo "<div class = 'alert alert-success'>
						Success! Book <strong>".$attachBook."</strong> will be attached to <strong>".$attachModule."</strong> in 3 seconds
						</div>	";
						
					header("refresh:5; url=attach_books.php");
					
                }
                catch(PDOException $e) {
                    $conn->rollback();
                    exit("unable to update the course: ". $e->getMessage());
                }
	
	}
        
        
        $conn = null;
    
    ?>
    </div>
    </div>
</body>



<?php include 'footer.php'

//End of Kristjan Muutnik 1308701
 ?>