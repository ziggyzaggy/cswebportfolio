<?php
	$noBookSelected = "";

	include_once("inc/inc.php");
		
		
		if(isset($_GET['id'])){
			
			$bookTitle = $_GET['id'];
			
		
		}else{
			
			$noBookSelected = "No book was selected, please use search or browse to select one";
			$bookTitle = "";
		}



?>