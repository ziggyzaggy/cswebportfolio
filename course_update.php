<!--author: eduard tache (0909007)-->

<?php require_once "inc/inc.php"; ?>

<?php include 'header.php'; ?>

<body>
	<div class = "container">
            <?php include 'navigation_bar.php' ?>
            <h1>Update Course</h1>
            
            <?php
            //Normal execution flow: 2.updates the db with the new values provided by the user
            if(isset($_POST['update'])){
                $cname = $_POST['Course_Title'];
                $yentry = $_POST['Year_of_Entry'];
                $Course_Duration = $_POST['Course_Duration'];
                $cid = $_POST['Course_Id'];
                $moduleid = $_POST['Module_ID'];
                
                //echo "the module selected is: ".$moduleid;
                //this will clear the variable and stop the script at step 3.
                $_GET['Course_Id'] = null;

                try {
                    $conn->beginTransaction();
                    $sql = "UPDATE courses SET Course_Title=\"".$cname."\", Year_of_Entry=".$yentry.", Course_Duration=".$Course_Duration." WHERE Course_Id='".$cid."'";
                    $sql2 = "";
                    $stmt = $conn->prepare($sql);                      
                    $stmt->execute();
                    $conn->commit();

                    //display succesful message
                    echo "<div class=\"alert alert-success\">
                            <p><strong>Well done!</strong> You successfully updated a course</p>
                            <a href=\"course_index.php\" class=\"alert-link\"><button type=\"button\" class=\"btn btn-primary\">see courses</button></a>
                          </div>";
                }
                catch(PDOException $e) {
                    $conn->rollback();
                    exit("unable to update the course: ". $e->getMessage());
                }
                $conn=null;
            }
            ?>
            
            <?php
            //Normal execution flow: 3.stops processing the rest of the script
            if(!isset($_GET['Course_Id']) && isset($_POST['update'])){
                exit;
            }    
            
            //Normal execution flow: 1.fetches the course info from db and puts it in the form for editing
            if(isset($_GET['Course_Id'])){
                //fetch the course from the database and update it with the new values on submit
                try {
                    $sql = "SELECT Course_Id, Course_Title, Year_of_Entry, Course_Duration FROM courses WHERE Course_Id = '".$_GET['Course_Id']."'";
                    $query = $conn->query($sql);
                    $course = $query->fetch();
                    
                    echo "<form class=\"well\" action=\"\" method=\"POST\">";
                    echo "<input type=\"hidden\" name=\"Course_Id\" value=\"".$course["Course_Id"]."\">";
                    echo "<label>Course Name</label>";  
                    echo "<input type=\"text\" name=\"Course_Title\" value=\"".$course["Course_Title"]."\" class=\"span3\" placeholder=\"".$course["Course_Title"]."\">";  
                    echo "<label>Year of Entry</label>"; 
                    echo "<input type=\"number\" name=\"Year_of_Entry\" value=\"".$course["Year_of_Entry"]."\" class=\"span3\" min=\"0\" max=\"5\" placeholder=\"".$course["Year_of_Entry"]."\">";
                    echo "<label>Course Duration</label>"; 
                    echo "<input type=\"number\" name=\"Course_Duration\" value=\"".$course["Course_Duration"]."\" class=\"span3\" min=\"0\" max=\"5\" placeholder=\"".$course["Course_Duration"]."\">";
                    
                    // author :Rayyan Alorini 1113195
                    $sql_get_modules = "SELECT Module_ID, Title FROM modules";
                    $get_modules = $conn->query($sql_get_modules);
                    if($get_modules->rowcount() == 0){
                        echo "no modules found";
                    } else {
                        echo "<label>Modules list</label>"; 
                        echo "<select name=\"Module_ID\" class=\"span3\" >";
                            foreach ($get_modules as $row){
                                echo "<option value=\"".$row[Module_ID]."\">".$row[Title]."</option>";
                            }
                        echo "</select>";
                    }
                    // end author :Rayyan Alorini 1113195
                    
                    echo "<br>";
                    echo "<button type=\"submit\" name=\"update\" class=\"btn\">Submit</button>";
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