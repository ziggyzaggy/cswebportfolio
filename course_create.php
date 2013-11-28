<!--author: eduard tache (0909007)-->

<?php require_once "inc/inc.php"; ?>

<?php include 'header.php'; ?>

<body>
	<div class = "container">
            <?php include 'navigation_bar.php' ?>
            <h1>Create Course</h1>
                <form class="well">  
                    <label>Course Name</label>  
                    <input type="text" class="span3">  
                    <label>Year of Entry</label>  
                    <input type="number" class="span3" min="0" max="5">
                    <label>Course Duration</label>  
                    <input type="number" class="span3" min="0" max="5">
                    <br>
                    <button type="submit" class="btn">Submit</button>  
                </form>
        </div>
	
</body>
<?php include 'footer.php' ?>
