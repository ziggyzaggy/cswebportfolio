<?php

/**
**@author Kristjan Muutnik 1308701
**The backbone for displaying a chosen book with all of it's details
**/

	$noBookSelected = "";

	include_once("inc/inc.php");
		
		
		if(isset($_GET['id'])){ //checks that the id of the book was set
			
			$bookTitle = $_GET['id'];
			
		
		}else{ //if no book was chosen (in case some smart people will try input the url manually)
			
			$noBookSelected = "No book was selected, please use search or browse to select one";
			$bookTitle = "";
		}


//end of Kristjan Muutnik 1308701
?>