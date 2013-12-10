<!--Created by Greg Morrison(1207569)-->
<?php Require_once "inc/inc.php";?> 

<?php Include 'header.php';?> 
    
<body>
	<div class = "container">
            <div class = "well">
                <?php include 'navigation_bar.php' ?>  

                <?php
                 try {
                    $SQL = "SELECT Course_ID, Course_Title, Year_of_Entry, Course_Duration FROM Courses"; //Select columns from Course Table
                    $Results = $conn->query($SQL); 
                    if($Results->rowcount() == 0){
                        echo "Sorry no courses have been found. <br />"; //If no results are found this message will be displayed
                    } else {
                        echo "<h1>Course Index</h1>"; 
                        echo "<table class=\"table\">"; 
                        echo "<th>Course ID</th><th>Course Title</th><th>Year of Entry</th><th>Course Duration</th>"; //Table Headers
                        foreach ($Results as $Row){ //Selecting the relevant information for the table
                            echo "<tr>";
                            echo "<td>".$Row["Course_ID"]."</td>";
                            echo "<td><a href=\"course_show.php?Course_ID=".$Row["Course_ID"]."\">".$Row["Course_Title"]."</a></td>";
                            echo "<td>".$Row["Year_of_Entry"]."</td>";
                            echo "<td>".$Row["Course_Duration"]."</td>";
                            echo "<td><a href=\"course_update.php?Course_ID=".$Row["Course_ID"]."\">Edit</a> <a href=\"course_delete.php?Course_ID=".$Row["Course_Id"]."\">Delete</a></td>"; 
                            echo "</tr>";
                        }
                        echo "</table>"; 
                    }
                } catch (PDOException $e) {
                    echo "Sorry your query failed, please try another.". $e->getMessage(); //message you will recieve if the query fails
                }

                $conn=null;           
                ?>
        </div>
      </div>
</body>

<?php include 'footer.php' ?> 

<!--Created by Greg Morrison-->
