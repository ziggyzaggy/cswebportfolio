<!--author: eduard tache (0909007)-->

<?php require_once "inc/inc.php"; ?>

<?php include 'header.php'; ?>

<body>
    
	<div class = "container">
            <?php include 'navigation_bar.php' ?>
            <h1>Create Course</h1>
            <?php
                if(isset($_POST['create'])){
                    $cid = $_POST['Course_Id'];
                    $cname = $_POST['Course_Title'];
                    $yentry = $_POST['Year_of_Entry'];
                    $Course_Duration = $_POST['Course_Duration'];
                    
                    try {
                        $conn->beginTransaction();
                        $sql = "INSERT INTO courses (Course_Id, Course_Title, Year_of_Entry, Course_Duration) VALUES (\"".$cid."\",\"".$cname."\",".$yentry.",".$Course_Duration.")";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $conn->commit();
                        
                        //display succesful message
                        echo "<div class=\"alert alert-success\">
                                <p><strong>Well done!</strong> You successfully created a course</p>
                                <a href=\"course_index.php\" class=\"alert-link\"><button type=\"button\" class=\"btn btn-primary\">see courses</button></a>
                              </div>";
                        
                    }
                    catch(PDOException $e) {
                        $conn->rollback();
                        exit("unable to create new course: ". $e->getMessage());
                    }
                    $conn=null;
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
            
            
        </div>
	
</body>
<?php include 'footer.php' ?>

<!--author: eduard tache (0909007)-->