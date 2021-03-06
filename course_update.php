<!--author: eduard tache (0909007)-->

<?php require_once "inc/inc.php"; ?>

<?php



 include 'header.php'; ?>

<body>
	<div class = "container">
            <?php include 'navigation_bar.php';
					require("check.admin.php");
			?>
            <h1>Update Course</h1>
            
            <?php
            //Normal execution flow: 2.updates the db with the new values provided by the user
            if(isset($_POST['update'])){
                
                //basic info about a course
                $cid = $_POST['Course_ID'];
                $cname = $_POST['Course_Title'];
                $yentry = $_POST['Year_of_Entry'];
                $Course_Duration = $_POST['Course_Duration'];
                
                //counters for no of attached and detached modules 
                $attach_count = (isset($_POST['attach_count'])) ? $_POST['attach_count'] : 0;
                $detach_count = (isset($_POST['detach_count'])) ? $_POST['detach_count'] : 0;
                
                //update the course basic info
                try{
                    $conn->beginTransaction();
                    $sql = "UPDATE courses SET `Course_Title`=\"".$cname."\", `Year_of_Entry`=".$yentry.", `Course_duration`=".$Course_Duration." WHERE `Course_ID`= \"".$cid."\"";                        
                    $stmt = $conn->prepare($sql);                      
                    $stmt->execute();
                    $conn->commit();
                }
                catch(PDOException $e) {
                    $conn->rollback();
                    exit("unable to update the course: ". $e->getMessage());
                }
                
    


                //going through all the attached modules and printing their values
                for ($i=0;$i<$attach_count;$i++)
                {
                    //if the checkbox_detache is checked then detach it from db
                    if(isset($_POST[$i."_checkbox_detache"])){
                        //create the connection 
                        try {
                            $dsn = "mysql:host=".$hostname.";dbname=".$database;
                            $conn = new PDO($dsn, $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $e) {
                            echo "Connection failed: ".$e->getMessage();
                        }
                        
                        try {
                            $conn->beginTransaction();
                            $sql = "DELETE FROM `course_modules` WHERE `Course_ID` = '".$cid."' AND `Module_ID` = '".$_POST[$i."_attached_moduleId"]."'";
                            $stmt = $conn->prepare($sql);   
                            $stmt->execute();
                            $conn->commit();
                            //echo "detached";
                        }
                        catch(PDOException $e) {
                            $conn->rollback();
                            exit("unable to detach the module: ". $e->getMessage());
                        }
                        //delete the connection
                        $conn=null;
                    }
                }
                
                
                echo "<br>";
                
                // author :Rayyan Alorini 1113195
                //going through all the detached modules and printing their values
                for ($i=0;$i<$detach_count;$i++)
                {
                    //if the checkbox_attach is checked then attach it to db
                    if(isset($_POST[$i."_checkbox_attach"])){
                        //create the connection 
                        try {
                            $dsn = "mysql:host=".$hostname.";dbname=".$database;
                            $conn = new PDO($dsn, $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $e) {
                            echo "Connection failed: ".$e->getMessage();
                        }
                        
                        try {
                            $conn->beginTransaction();
                            $sql = "INSERT INTO `course_modules` (`Course_ID`, `Module_ID`, `Year_of_Teaching`) VALUES ('".$cid."', '".$_POST[$i."_detached_moduleId"]."', '".$_POST[$i."_Year_of_Teaching"]."')";
                            $stmt = $conn->prepare($sql);   
                            $stmt->execute();
                            $conn->commit();
                            //echo "detached";
                        }
                        catch(PDOException $e) {
                            $conn->rollback();
                            exit("unable to detach the module: ". $e->getMessage());
                        }
                        //delete the connection
                        $conn=null;
                    }
                }
                // end author :Rayyan Alorini 1113195

                
                echo "<div class=\"alert alert-success\">
                        <p>Well done, you have successfully updated the <strong>".$cid." ".$cname."</strong> course!</p>
                        <a href=\"course_index.php\" class=\"alert-link\"><button type=\"button\" class=\"btn btn-primary\">Show Courses</button></a>
                      </div>";
                        
                //this will clear the variable and stop the script at step 3.
                $_GET['Course_ID'] = null;
            }
            ?>
            
            <?php
            //Normal execution flow: 3.stops processing the rest of the script
            if(!isset($_GET['Course_ID']) && isset($_POST['update'])){
                exit;
            }    
            
            //Normal execution flow: 1.fetches the course info from db and puts it in the form for editing
            if(isset($_GET['Course_ID'])){
                //fetch the course from the database and update it with the new values on submit
                try {
                    $sql = "SELECT Course_ID, Course_Title, Year_of_Entry, Course_Duration FROM courses WHERE Course_ID = '".$_GET['Course_ID']."'";
                    $query = $conn->query($sql);
                    $course = $query->fetch();
                    
                    echo "<form class=\"well\" action=\"\" method=\"POST\">";
                    echo "<input type=\"hidden\" name=\"Course_ID\" value=\"".$course["Course_ID"]."\">";
                    echo "<label>Course Name</label>";  
                    echo "<input type=\"text\" name=\"Course_Title\" value=\"".$course["Course_Title"]."\" class=\"span3\" placeholder=\"".$course["Course_Title"]."\">";  
                    echo "<label>Year of Entry</label>"; 
                    echo "<input type=\"text\" name=\"Year_of_Entry\" value=\"".$course["Year_of_Entry"]."\" class=\"span3\" placeholder=\"".$course["Year_of_Entry"]."\"><span><i> can only be 1st or 3rd year</i></span>";
                    
                    echo "<label>Course Duration</label>"; 
                    echo "<input type=\"text\" name=\"Course_Duration\" value=\"".$course["Course_Duration"]."\" class=\"span3\" placeholder=\"".$course["Course_Duration"]."\"><span><i> can only be 1, 2 or 4 years long</i></span>";
                    $course_duration = $course["Course_Duration"];
                    
                    
                    
                    // Get all the modules that are already attached to this course
                    $sql_get_attached_modules = "SELECT Module_ID, Title FROM modules WHERE Module_ID IN (SELECT Module_ID FROM course_modules WHERE Course_ID = '".$_GET['Course_ID']."' )";
                    $attached_modules = $conn->query($sql_get_attached_modules);
                    if($attached_modules->rowcount() == 0){
                        echo "no attached modules found";
                    } else {
                        echo "<label>Attached Modules</label>";
                        echo "<table class=\"table\">";
                        echo "<th>Module Id</th><th>Module Title</th><th>Year of teaching</th>";
                        $attach_count = 0;
                        foreach ($attached_modules as $row){
                            echo "<tr>";
                            echo "<td>".$row["Module_ID"]."</td>";
                            echo "<td>".$row["Title"]."</td>";
                            echo "<td><input type=\"number\" name=\"".$attach_count."_Year_of_Teaching\" value=\"".$course["Year_of_Entry"]."\" min=\"0\" max=\"5\"></td>";
                            echo "<td><input type=\"checkbox\" name=\"".$attach_count."_checkbox_detache\" value=\"detach\"> detach</td>";
                            echo "<input type=\"hidden\" name=\"".$attach_count."_attached_moduleId\" value=\"".$row["Module_ID"]."\">";
                            echo "</tr>";
                            $attach_count++;
                        }
                        echo "</table>";
                        echo "<input type=\"hidden\" name=\"attach_count\" value=\"".$attach_count."\">";
                    }
                    
                    //Get all the modules which are not yet attached to this course
                    $sql_get_detached_modules = "SELECT Module_ID, Title FROM modules WHERE Module_ID NOT IN (SELECT Module_ID FROM course_modules WHERE Course_ID = '".$_GET['Course_ID']."' )";
                    $detached_modules = $conn->query($sql_get_detached_modules);
                    if($detached_modules->rowcount() == 0){
                        echo "no detached modules found";
                    } else {
                        echo "<label>Detached Modules</label>";
                        echo "<table class=\"table\">";
                        echo "<th>Module Id</th><th>Module Title</th><th>Year of teaching</th>";
                        $detached_count = 0;
                        foreach ($detached_modules as $row){
                            echo "<tr>";
                            echo "<td>".$row["Module_ID"]."</td>";
                            echo "<td>".$row["Title"]."</td>";
                            echo "<td><input type=\"number\" name=\"".$detached_count."_Year_of_Teaching\" value=\"".$course["Year_of_Entry"]."\" min=\"0\" max=\"5\"></td>";
                            echo "<td><input type=\"checkbox\" name=\"".$detached_count."_checkbox_attach\" value=\"attach\"> attach</td>";
                            echo "<input type=\"hidden\" name=\"".$detached_count."_detached_moduleId\" value=\"".$row["Module_ID"]."\">";
                            echo "</tr>";
                            $detached_count++;
                        }
                        echo "</table>";
                        echo "<input type=\"hidden\" name=\"detach_count\" value=\"".$detached_count."\">";
                    }
                   
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