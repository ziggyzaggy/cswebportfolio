<!--Created by Greg Morrison(1207569)-->
<?php Require_once "inc/inc.php";?>

<?php Include 'header.php';?>
    
<body>
	<div class = "container">
            <div class = "well">
                <?php include 'navigation_bar.php' ?>
                <h1>Course Index</h1>
                <?php
                try {
                    $SQL = "SELECT Course_ID, Course_Title, Year_of_Entry, Course_Duration FROM Courses";
                    $Results = $conn->query($SQL);
                    if($Results->rowcount() == 0){
                        echo "Sorry no courses have been found. <br />";
                    } else {
                        echo "<h1>Course Index</h1>";
                        echo "<table class=\"table\">";
                        echo "<th>Course Id</th><th>Course Title</th><th>Year of Entry</th><th>Course Duration</th>";
                        foreach ($Results as $Row){
                            echo "<tr>";
                            echo "<td>".$Row["Course_Id"]."</td>";
                            echo "<td><a href=\"course_show.php?Course_Id=".$Row["Course_Id"]."\">".$Row["Course_Title"]."</a></td>";
                            echo "<td>".$Row["Year_of_Entry"]."</td>";
                            echo "<td>".$Row["Course_Duration"]."</td>";
                            echo "<td><a href=\"course_update.php?Course_Id=".$Row["Course_Id"]."\">Edit</a> <a href=\"course_delete.php?Course_Id=".$Row["Course_Id"]."\">Delete</a></td>"; 
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                } catch (PDOException $e) {
                    echo "Sorry your query failed, please try another.". $e->getMessage();
                }

                $conn=null;          
                ?>
        </div>
      </div>
</body>

<?php include 'footer.php' ?>

<!--Created by Greg Morrison-->
