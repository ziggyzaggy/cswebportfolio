<!--author: eduard tache (0909007)-->

<?php require_once "inc/inc.php"; ?>

<?php
require("check.admin.php");


 include 'header.php'; ?>

<body>
	<div class = "container">
            <?php include 'navigation_bar.php' ?>
            <h1>Course Delete</h1>
            
            <?php
            //Normal execution flow: 2.deletes the course indicated by the user
            if(isset($_POST['delete'])){
                $cid = $_POST['Course_Id'];
                $_GET['Course_Id'] = null;
            
                try {
                    $conn->beginTransaction();
                    $sql = "DELETE from courses WHERE Course_Id='".$cid."'";                        
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
            if(!isset($_GET['Course_Id']) && isset($_POST['delete'])){
                exit;
            }    
            
            //Normal execution flow: 1.fetches the course info from db and puts it in the form for editing
            if(isset($_GET['Course_Id'])){
                //fetch the course from the database and update it with the new values on submit
                try {
                    $sql = "SELECT Course_Id, Course_Title, Year_of_Entry, Course_Duration from COURSES where Course_Id = '".$_GET['Course_Id']."'";
                    $query = $conn->query($sql);
                    $course = $query->fetch();
                    
                    echo "<form class=\"well\" action=\"\" method=\"POST\">";
                    echo "<input type=\"hidden\" name=\"Course_Id\" value=\"".$course["Course_Id"]."\" readonly>";
                    echo "<label>Course Name</label>";  
                    echo "<input type=\"text\" name=\"Course_Title\" value=\"".$course["Course_Title"]."\" class=\"span3\" placeholder=\"".$course["Course_Title"]."\" readonly>";  
                    echo "<label>Year of Entry</label>"; 
                    echo "<input type=\"number\" name=\"Year_of_Entry\" value=\"".$course["Year_of_Entry"]."\" class=\"span3\" min=\"0\" max=\"5\" placeholder=\"".$course["Year_of_Entry"]."\" readonly>";
                    echo "<label>Course Duration</label>"; 
                    echo "<input type=\"number\" name=\"Course_Duration\" value=\"".$course["Course_Duration"]."\" class=\"span3\" min=\"0\" max=\"5\" placeholder=\"".$course["Course_Duration"]."\" readonly>";
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

<!--author: eduard tache (0909007)-->