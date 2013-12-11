<!--author: eduard tache (0909007)-->

<?php require_once "inc/inc.php"; ?>

<?php



 include 'header.php'; ?>

<body>
	<div class = "container">
            <?php include 'navigation_bar.php';
				require("check.admin.php");
			?>
            <h1>Show Course</h1>
            
            <?php
            
            //Normal execution flow: 1.fetches the course info from db and puts it in the form for editing
            // TO DO : USE PREPARE STATEMENTS
            if(isset($_GET['Course_ID'])){
                //fetch the course from the database and update it with the new values on submit
                try {
                    $sql = "SELECT Course_ID, Course_Title, Year_of_Entry, Course_Duration FROM courses WHERE Course_ID = '".$_GET['Course_ID']."'";
                    $query = $conn->query($sql);
                    $course = $query->fetch();
                    
                    echo "<table class=\"table\">";
                    echo "<th>Course Id</th><th>Course Title</th><th>Year of Entry</th><th>Course Duration</th>";
                    echo "<tr>";
                        echo "<td>".$course["Course_ID"]."</td>";
                        echo "<td>".$course["Course_Title"]."</td>";
                        echo "<td>".$course["Year_of_Entry"]."</td>";
                        echo "<td>".$course["Course_Duration"]."</td>";
                    echo "</tr>";
                    echo "</table>";
                    
                    // TO DO : USE PREPARE STATEMENTS
                    // author :Rayyan Alorini 1113195
                    $sql_get_modules_attached ="SELECT Module_ID, Title FROM modules WHERE Module_ID IN (SELECT Module_ID FROM course_modules WHERE Course_ID = '".$_GET['Course_ID']."' )";
                    $query_modules_attached = $conn->query($sql_get_modules_attached);
                    
                    if($query_modules_attached->rowcount() == 0){
                        echo "no Modules attached to this course were found <br />";
                    } else {
                        echo "<h1>Modules attached to this course</h1>";
                        echo "<table class=\"table\">";
                        echo "<th>Module Id</th><th>Module Title</th>";
                        foreach ($query_modules_attached as $row){
                            echo "<tr>";
                            echo "<td>".$row["Module_ID"]."</td>";
                            echo "<td>".$row["Title"]."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    // end author :Rayyan Alorini 1113195
                    
                }
                catch (PDOException $e) {
                    echo "query failed: ". $e->getMessage();
                }
            }
            else {
                //in case of url browsing you get an error message
                echo "<div class=\"alert alert-warning\">
                        <p><strong>Oh snap!</strong> You need to select a course in order to edit it!</p>
                      </div>";
            }
            
            
            ?>
            
        </div>
	
</body>
<?php include 'footer.php' ?>

<!--author: eduard tache (0909007)-->