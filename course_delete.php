<!--author: eduard tache (0909007)-->

<?php require_once "inc/inc.php"; ?>

<?php include 'header.php'; ?>

<body>
	<div class = "container">
            <?php include 'navigation_bar.php' ?>
            <h1>Course Delete</h1>
            
            <?php
            //Normal execution flow: 2.deletes the course indicated by the user
            if(isset($_POST['delete'])){
                $cid = $_POST['id'];
                $_GET['id'] = null;
            
                try {
                    $conn->beginTransaction();
                    $sql = "delete from COURSES where id=".$cid;                        
                    $stmt = $conn->prepare($sql);                      
                    $stmt->execute();
                    $conn->commit();

                    //display succesful message
                    echo "<div class=\"alert alert-success\">
                            <p><strong>Well done!</strong> You successfully deleted a course</p>
                            <a href=\"course_index.php\" class=\"alert-link\"><button type=\"button\" class=\"btn btn-primary\">see courses</button></a>
                         </div>";

                }
                catch(PDOException $e) {
                    $conn->rollback();
                    exit("unable to delete the course: ". $e->getMessage());
                }
                $conn=null;
            }
            ?>
            
            
            
            
            
            <?php
            //Normal execution flow: 3.stops processing the rest of the script
            if(!isset($_GET['id']) && isset($_POST['delete'])){
                exit;
            }    
            
            //Normal execution flow: 1.fetches the course info from db and puts it in the form for editing
            if(isset($_GET['id'])){
                //fetch the course from the database and update it with the new values on submit
                try {
                    $sql = "select id, course_name, year_of_entry, duration from COURSES where id = ".$_GET['id'];
                    $query = $conn->query($sql);
                    $course = $query->fetch();
                    
                    echo "<form class=\"well\" action=\"\" method=\"POST\">";
                    echo "<input type=\"hidden\" name=\"id\" value=\"".$course["id"]."\" readonly>";
                    echo "<label>Course Name</label>";  
                    echo "<input type=\"text\" name=\"course_name\" value=\"".$course["course_name"]."\" class=\"span3\" placeholder=\"".$course["course_name"]."\" readonly>";  
                    echo "<label>Year of Entry</label>"; 
                    echo "<input type=\"number\" name=\"year_of_entry\" value=\"".$course["year_of_entry"]."\" class=\"span3\" min=\"0\" max=\"5\" placeholder=\"".$course["year_of_entry"]."\" readonly>";
                    echo "<label>Course Duration</label>"; 
                    echo "<input type=\"number\" name=\"duration\" value=\"".$course["duration"]."\" class=\"span3\" min=\"0\" max=\"5\" placeholder=\"".$course["duration"]."\" readonly>";
                    echo "<br>";
                    echo "<button type=\"submit\" name=\"delete\" class=\"btn\">Delete</button>";
                    echo "</form>";
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
