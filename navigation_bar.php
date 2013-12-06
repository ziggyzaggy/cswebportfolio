<div class = "navbar navbar-static-top" style ="margin-bottom:20px;">
    <div class ="navbar-inner">
        <a href="index.php" class="brand">LOGO</a>
        <ul class = "nav">
            <li> <a href="index.php">Home</a></li>
            <li> <a href="reading.php">Reading List</a></li>
            
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Courses <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo "course_index.php" ?>">Show All Courses</a></li> 
                    <li><a href="<?php echo "course_create.php" ?>">Create a Course</a></li>  
                </ul>
                
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Books <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo "book_index.php" ?>">Show All Books</a></li> 
                    <li><a href="<?php echo "book_create.php" ?>">Create a Book</a></li>  
                </ul>
                
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Modules <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo "module_index.php" ?>">Show All Modules</a></li> 
                    <li><a href="<?php echo "module_create.php" ?>">Create a Module</a></li>  
                </ul>
                
            </li>
        </ul>
        <ul class = "nav pull-right">
            <li> <a href="admin.php">Admin</a></li>
        </ul>
    </div>	
</div>
