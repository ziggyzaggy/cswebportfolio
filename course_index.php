<!--author: eduard tache (0909007)-->

<?php require_once "inc/inc.php"; ?>

<?php include 'header.php'; ?>

<body>
	<div class = "container">
            <?php include 'navigation_bar.php' ?>
            <?php
            try {
                $sql = "select id, course_name, year_of_entry, duration from COURSES";
                $results = $conn->query($sql);
                if($results->rowcount() == 0){
                    echo "no courses found <br />";
                } else {
                    echo "<h1>Course Index</h1>";
                    echo "<table class=\"table\">";
                    echo "<th>Course Name</th><th>Year of Entry</th><th>Course Duration</th>";
                    foreach ($results as $row){
                        echo "<tr>";
                        echo "<td>".$row["course_name"]."</td>";
                        echo "<td>".$row["year_of_entry"]."</td>";
                        echo "<td>".$row["duration"]."</td>";
                        echo "<td><a href=\"#\">Edit</a> <a href=\"#\">Delete</a></td>"; 
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