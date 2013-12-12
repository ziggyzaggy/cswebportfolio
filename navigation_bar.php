
<?php 

session_start();
// check what page is the user currently on to put an active class to appropriate <li> (navigation bar)

//****NOTE!****
//All the files must be contained within the /cswebportfolio/ directory,
// or another path must be specified in the else if statements, (pro tip: use ctrl+f to replace the paths)
// otherwise the function will not work and the active classes won't be set!
//***************

//author Kristjan Muutnik 1308701

//set variables to empty string.
$coursesActive= "";
$booksActive ="";
$modulesActive ="";
$readingActive="";
$indexActive="";
$adminActive="";

//check what page the user is on and set active classes accordingly
if($_SERVER['REQUEST_URI'] === '/phpcw/course_index.php' || $_SERVER['REQUEST_URI'] === '/phpcw/course_create.php'){
	$coursesActive = "active";
}elseif($_SERVER['REQUEST_URI'] === '/phpcw/book_index.php' || $_SERVER['REQUEST_URI'] === '/phpcw/book_create.php'){
	$booksActive = "active";
}elseif($_SERVER['REQUEST_URI'] === '/phpcw/module_index.php' || $_SERVER['REQUEST_URI'] === '/phpcw/module_create.php'){
	$readingActive = "active";
}elseif($_SERVER['REQUEST_URI'] === '/phpcw/reading.php'){
	$readingActive = "class = 'active'";
}elseif($_SERVER['REQUEST_URI'] === '/phpcw/search.php'){
	$readingActive = "class = 'active'";
}elseif($_SERVER['REQUEST_URI'] === '/phpcw/index.php'){
	$indexActive = "class = 'active'";
}elseif($_SERVER['REQUEST_URI'] === '/phpcw/admin.php'){
	$adminActive = "class = 'active'";
	}

//end of Kristjan Muutnik 1308701
?>

<div class = "navbar navbar-static-top" style ="margin-bottom:20px;">
    <div class ="navbar-inner">
        <a href="index.php" class="brand">LOGO</a>
        <ul class = "nav">
            <li <?php echo $indexActive; ?> > <a href="index.php">Home</a></li>
            <li <?php echo $readingActive; ?> > <a href="reading.php">Reading List</a></li>
            
			
			<?php
			
			if(isset($_SESSION['admin'])){ //only shows admin controls if admin is authenticated
			
			
			?>
			
            <li class="dropdown <?php echo $coursesActive; ?>">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Courses <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo "course_index.php" ?>">Show All Courses</a></li> 
                    <li><a href="<?php echo "course_create.php" ?>">Create a Course</a></li>  
                </ul>
                
            </li>
            <li class="dropdown <?php echo $booksActive; ?>">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Books <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo "book_index.php" ?>">Show All Books</a></li> 
                    <li><a href="<?php echo "book_create.php" ?>">Create a Book</a></li>  
                </ul>
                
            </li>
            <li class="dropdown <?php echo $modulesActive; ?>">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Modules <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo "module_index.php" ?>">Show All Modules</a></li> 
                    <li><a href="<?php echo "module_create.php" ?>">Create a Module</a></li>  
                </ul>
                
            </li>
       
		
		
		<ul class="nav">
		<li><a href ="attach_books.php">Attach Book</a></li>
		
		
		
		
		<?php }?>
		</ul>
		 </ul>
        <ul class = "nav pull-right">
            <li <?php echo $adminActive; ?> > <a href="admin.php">Admin</a></li>
        </ul>
    </div>	
</div>
