<?php

/*
**@Author Kristjan Muutnik 1308701

** show correct books depending on which category the user clicked
*/


include('inc/inc.php');

	if(isset($_GET['category'])){
	
	
	
	$i = 1;
	
		//check which category was set and perform correct query
		//using admins table as no other table is created yet, will change once tables are available
		
		if($_GET['category'] == 'Module'){ 
		
		
		
		 echo "<h4>Module books: </h4> <br>";
		 
			$result = $dbh -> query("SELECT username FROM admin");
		 
		 foreach($result as $row){
			echo "<a href = display.php?id=" . $row['username'] . ">". $i. "&nbsp &nbsp View <b> " . $row['username'] . "</b> </a>  <br>";
			$i++;
		 }
		
		}elseif($_GET['category'] == 'Course and Year'){
		
		 echo "<h4>Course and Year books: </h4> <br>";
		 
		 $result = $dbh -> query("SELECT password FROM admin");
		 
		 foreach($result as $row){
			echo "<a href = display.php?id=" . $row['password'] . ">". $i. "&nbsp &nbsp View <b> " . $row['password'] . "</b> </a>  <br>";
			$i++;
		 }
		 
		
		}if($_GET['category'] == 'Course'){
		
		  echo "<h4>Course books:</h4> <br>";
		  
		  
		  $result = $dbh -> query("SELECT username FROM admin");
		 
		  foreach($result as $row){
			echo "<a href = display.php?id=" . $row['username'] . ">". $i. "&nbsp &nbsp View <b> " . $row['username'] . "</b> </a>  <br>";
			$i++;
		 }
		
		}
	
	
	}else{
		echo "Click one of the categories above to browse books!";
	
	}


//end of Kristjan Muutnik 1308701
?>