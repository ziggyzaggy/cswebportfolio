<!--author: eduard tache (0909007)-->

<!DOCTYPE html>

<?php 
    require_once "inc/inc.php";
?>
<html>

<head>
<title></title>
<meta charset=?tf-8?
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/style.css">
	
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
</head>

<body>
	<div class = "container">
		<div class = "navbar navbar-static-top" style ="margin-bottom:20px;">
			<div class ="navbar-inner">
                                <a href="index.php" class="brand">LOGO</a>
                                <ul class = "nav">
                                    <li> <a href="index.php">Home</a></li>
                                    <li> <a href="reading.php">Reading List</a></li> 
                                </ul>
                                <ul class = "nav pull-right">
                                    <li> <a href="admin.php">Admin</a></li>
                                </ul>
			</div>	
		</div>
            <?php
            
            
            
            try {
                $sql = "select id, course_name, year_of_entry, duration from COURSES";
                $results = $conn->query($sql);
                if($results->rowcount() == 0){
                    echo "no courses found <br />";
                } else {
                    echo "<h1>Course Index</h1>";
                    echo "<table class=\"table\">";
                    echo "<th>Course Name</th><th>Year of Entry</th><th>Course Duration</th>";
                    foreach ($results as $row){
                        echo "<tr>";
                        echo "<td>".$row["course_name"]."</td>";
                        echo "<td>".$row["year_of_entry"]."</td>";
                        echo "<td>".$row["duration"]."</td>";
                        echo "<td><a href=\"#\">Edit</a> <a href=\"#\">Delete</a></td>"; 
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            } catch (PDOException $e) {
                echo "query failed: ". $e->getMessage();
            }
            
            $conn=null;          
            ?>
        </div>
	
</body>
</html>
