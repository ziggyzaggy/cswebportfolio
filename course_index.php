<!--author: eduard tache (0909007)-->

<?php require_once "inc/inc.php"; ?>

<?php include 'header.php'; ?>

<body>
	<div class = "container">
            <?php include 'navigation_bar.php' ?>
            <?php
            try {
                $sql = "SELECT Course_Id, Course_Title, Year_of_Entry, Course_Duration FROM courses";
                $results = $conn->query($sql);
                if($results->rowcount() == 0){
                    echo "no courses found <br />";
                } else {
                    echo "<h1>Course Index</h1>";
                    echo "<table class=\"table\">";
                    echo "<th>Course Id</th><th>Course Title</th><th>Year of Entry</th><th>Course Duration</th>";
                    foreach ($results as $row){
                        echo "<tr>";
                        echo "<td>".$row["Course_Id"]."</td>";
                        echo "<td>".$row["Course_Title"]."</td>";
                        echo "<td>".$row["Year_of_Entry"]."</td>";
                        echo "<td>".$row["Course_Duration"]."</td>";
                        echo "<td><a href=\"course_update.php?Course_Id=".$row["Course_Id"]."\">Edit</a> <a href=\"course_delete.php?Course_Id=".$row["Course_Id"]."\">Delete</a></td>"; 
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            } catch (PDOException $e) {
                echo "query failed: ". $e->getMessage();
            }
            
            $conn=null;          
            ?>
        </div>
</body>

<?php include 'footer.php' ?>

<!--author: eduard tache (0909007)-->