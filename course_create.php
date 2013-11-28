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
                    echo "Course name: ".$cname;
                    echo "year of entry: ".$yentry;
                    echo "duration: ".$duration;
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
