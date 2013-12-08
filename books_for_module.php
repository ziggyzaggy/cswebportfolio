
<!--  The task is to return information of the  recommend books for a given Module_ID
 Author Rayyan Alorini, 1113195 -->

<?php

include_once('header.php');
?>
   

<!DOCTYPE html>

<html>
    
    	<!-- 	 
-->
    <body>
        <div class = "container">
   

    	    <?php include 'navigation_bar.php' ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> search </title>
        <?php 
      
       include "inc/inc.php";
  
        ?>
               <h2>Show Reading List</h2>
        
        <form action='books_for_module.php' method='POST'>
            module code:<input type="text" name='Module_ID' />
            <input type='submit' name='search' value='search'/>
        </form>
        <?php 


            if(isset($_POST['search'])){
            //assigning 
            $Module_ID = $_POST['Module_ID'];
            if(isset($Module_ID)){
                
        }else{            echo 'Write a Module Id';
        }
       }
       
       $sql = 'select * from books where Book_Id in (select Book_Id from reading_list where Module_Id = :Module_ID)';
       
       $books = $conn->prepare($sql);
       $books->bindparam(':Module_ID', $Module_ID);
   try{ $books->execute();
   
 }catch (PDOException $e) {
 echo "Fail".$e->getMessage();
exit(); 
      }
          if($books->rowcount()==0){echo "No books found";
                                     exit();                 
                  }else{ 
                    echo "<table class=\"table\">";
               
                echo "<tr>\n";
                echo "<th>Book_ID</th><th>Title</th><th>First_Author</th><th>Second_Author</th><th>Publisher</th><th>Year</th><th>Content_Summary</th>\n";
                echo "</tr>\n";
                foreach ($books as $row) {
                    echo "<tr>";

                   
                    echo "<td>".$row["Book_ID"]."</td>";
                    echo "<td>".$row["Title"]."</td>";
                    echo "<td>".$row["First_Author"]."</td>";
                    echo "<td>".$row["Second_Author"]."</td>";
                    echo "<td>".$row["Publisher"]."</td>";
                    echo "<td>".$row["Year"]."</td>";
                    echo "<td>".$row["Content_Summary"]."</td>";

                    echo "</tr>\n";
                }

                print "</table>\n";
                       
                  }     
               
        ?> 
        </div>
    </body>
<?php include 'footer.php' ?>

</html>
<!-- End of Author Rayyan Alorini.--> 