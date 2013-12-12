<!--Created by Greg Morrison 1207569-->

<?php require_once "inc/inc.php";?> 

<?php




 include 'header.php';?> 

<body>
    
    <div class = "container">
            <?php include 'navigation_bar.php';
					require("check.admin.php");
			?> 
            <h1>Create Course</h1> 
            <?php
            IF(ISSET($_POST['Create'])){ 
                $CourseID = $_POST['Course_ID'];
                $CourseName = $_POST['Course_Title'];
                $EntryYear = $_POST['Year_of_Entry'];
                $Course_Duration = $_POST['Course_Duration'];
                
                TRY{
                    $conn ->BeginTransaction();
                    $SQL = "Insert Into Courses (Course_ID, Course_Title, Year_of_Entry, Course_Duration) VALUES (\"".$CourseID."\",\"".$CourseName."\",".$EntryYear.",".$Course_Duration.")";
                    $SQLPREP = $conn->prepare($SQL);
                    $SQLPREP ->Execute ();
                    $conn -> Commit ();
                    
                    //display message showing a new course has been created
                        echo "<div class=\"alert alert-success\">
                                <p><strong>Well done, you have successfully created a new course!</strong></p>
                                <a href=\"course_index.php\" class=\"alert-link\"><button type=\"button\" class=\"btn btn-primary\">Show Courses</button></a>
                              </div>";
                        }
            //Message to be displayed if the course was not created successfully
            catch(PDOException $e) {
                        $conn->rollback();
                        exit("Error: The course was not created: ". $e->getMessage());  
                    }
                    $conn=null; 
                }
              ?>
              <form class="well" action="" method="POST"> <!--Starts the form that data can be entered in to to create a new course--> 
                <label>Course Id</label>  
                <input name="Course_ID" type="text" class="span3">
                <label>Course Name</label>  
                <input name="Course_Title" type="text" class="span3">  
                <label>Year of Entry</label>  
                <input name="Year_of_Entry" type="number" class="span3" min="0" max="5">
                <label>Course Duration</label>  
                <input name="Course_Duration" type="number" class="span3" min="0" max="5">
                <br>
                <button name="Create" type="submit" class="btn">Submit</button>  
            </form>
</body>
<?php include 'footer.php'?>


<!--Created by Greg Morrison (1207569)-->