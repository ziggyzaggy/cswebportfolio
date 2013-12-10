<?php
require_once "inc/inc.php";
?>
<?php 




include 'header.php'; 
?>
<!--Beginning of code written by Jonathon Reid (1005350)-->

<!--Allows the user to browse all books, based on a given keyword-->

<body>    
    <div class = "container">
        <div class = "well">
    <?php include 'navigation_bar.php';
			require("check.admin.php");
	?>
    
    <h1>Book Index</h1>
    <br>
    <a href=book_create.php?>Create Book</a>
    <br>
    <br>
    
    <?php
    
        try{
    
            $sql = "select Book_ID, Title, First_Author, Second_Author, Publisher, Year, Content_Summary from books";
            $results = $conn->query($sql);
            $count = $results->rowCount();
        }
        catch (PDOException $e) {
                echo "error: ". $e->getMessage();
            }
              
        
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
                echo "<td><a href=\"book_update.php?Book_ID=".$row["Book_ID"]."\">Edit</a> <a href=\"book_delete.php?Book_ID=".$row["Book_ID"]."\">Delete</a></td>";
                echo "</tr>\n";
            }
            print "</table>\n";        
      
            
        } 
        
        
        $conn = null;
    
    ?>
    </div>
    </div>
</body>

<!--End of code written by Jonathon Reid (1005350)-->

<?php include 'footer.php' ?>