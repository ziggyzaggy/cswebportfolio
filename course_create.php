<!--author: eduard tache (0909007)-->

<?php require_once "inc/inc.php"; ?>

<?php include 'header.php'; ?>

<body>
    
	<div class = "container">
            <?php include 'navigation_bar.php' ?>
            <h1>Create Course</h1>
            <?php
                if(isset($_POST['create'])){
                    $cname = $_POST['course_name'];
                    $yentry = $_POST['year_of_entry'];
                    $duration = $_POST['duration'];
                    
                    try {
                        $conn->beginTransaction();
                        $sql = "INSERT INTO courses (course_name, year_of_entry, duration) VALUES (\"".$cname."\",".$yentry.",".$duration.")";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $conn->commit();
                        
                        //display succesful message
                        echo "<div class=\"alert alert-success\">
                                <p><strong>Well done!</strong> You successfully created a course</p>
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
                <label>Course Name</label>  
                <input name="course_name" type="text" class="span3">  
                <label>Year of Entry</label>  
                <input name="year_of_entry" type="number" class="span3" min="0" max="5">
                <label>Course Duration</label>  
                <input name="duration" type="number" class="span3" min="0" max="5">
                <br>
                <button name="create" type="submit" class="btn">Submit</button>  
            </form>
            
            
        </div>
	
</body>
<?php include 'footer.php' ?>

<!--author: eduard tache (0909007)-->