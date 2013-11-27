<!DOCTYPE html>


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
</html>
