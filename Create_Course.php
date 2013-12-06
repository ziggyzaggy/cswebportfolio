<!--Created by Greg Morrison 1207569-->

<?php require_once "inc/inc.php";?>

<?php include 'header.php';?>

<body>
    
    <div class = "container">
            <?php include 'navigation_bar.php' ?>
            <h1>Create Course</h1>
            <?php
            IF(ISSET($_POST['Create'])){
                $CourseID = $_POST['Course_ID'];
                $CourseName = $_POST['Course_Title'];
                $EntryYear = $_POST['Year_of_Entry'];
                $Course_Duration = $_POST[' Course_duration'];
                
                TRY{
                    $CONN ->BeginTransaction();
                    $SQL = "Insert InTo Courses ((Course_Id, Course_Title, Year_of_Entry, Course_Duration) VALUES (\"".$CourseID."\",\"".$CourseName."\",".$EntryYear.",".$Course_Duration.")";
                    $SQLPREP = $conn->prepare($sql);
                    $SQLPREP ->Execute ();
                    $CONN -> Commit ();
                    
                    //display message showing a new course has been created
                        echo "<div class=\"alert alert-success\">
                                <p><strong>Well done, you have successfully created a new course!</strong></p>
                                <a href=\"course_index.php\" class=\"alert-link\"><button type=\"button\" class=\"btn btn-primary\">Show Courses</button></a>
                              </div>";
                        }
            
            catch(PDOException $e) {
                        $CONN->rollback();
                        exit("Error: The course was not created: ". $e->getMessage());
                    }
                    $CONN=null;
                }
              ?>
              <form class="well" action="" method="POST">
                <label>Course Id</label>  
                <input name="Course_Id" type="text" class="span3">
                <label>Course Name</label>  
                <input name="Course_Title" type="text" class="span3">  
                <label>Year of Entry</label>  
                <input name="Year_of_Entry" type="number" class="span3" min="0" max="5">
                <label>Course Duration</label>  
                <input name="Course_Duration" type="number" class="span3" min="0" max="5">
                <br>
                <button name="create" type="submit" class="btn">Submit</button>  
            </form>
</body>
<?php include 'footer.php'?>

?>
<!--Created by Greg Morrison (1207569)-->