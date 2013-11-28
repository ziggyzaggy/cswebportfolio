<?php

/**
*Author Kristjan Muutnik 1308701 Start
*
*
*/
	session_start();
	include_once("inc/inc.php");
	
	
	
	
	
	if(!isset($_SESSION['admin'])){ //checks if admin is not logged in
		echo "
		
			<h4>Welcome user</h4>
					<p>This is a restricted area,<br> Please sign in with your Administrator credentials to continue.
					</p>
		
		<form action='admin.php' method='post'>
		Username:
		<br>
		<input type='text' name='user'>
		<br>
		Password:
		<br>
		<input type='password' name='password'>
		<br>
		<input type='submit' class='btn btn-primary' name='submit' value='Submit'>
		
		";
	
	}else{ //if admin IS logged in display the controls:
	
		echo"
			Welcome admin<br>
			
			[ admin controls will be somewhere around here... meanwhile <a class='btn btn-primary' href='http://www.youtube.com/watch?v=dQw4w9WgXcQ' target='_blank'>Click!</a> ]
			<br>
			<br>
			<br>
			<form action='admin.php' method='post'>
			<input type='submit' class='btn btn-primary' value='log out' name='logout'>
			</form>
		
		";
	
	}

	
	if(isset($_POST['submit'])){ //checks if the submit button was clicked
		$u = $_POST['user'];
		$p = $_POST['password'];
		
		$result = $dbh->query("SELECT * FROM admin WHERE username = '$u' AND password='$p'");//queries the database for entered username and pw
		
			
		
		$count = $result->rowCount(); //counts the number of rows returned in the $result query
		
		if($count > 0){ 						// if more than one record is returned....
			
			$_SESSION['admin'] = $u; 				//set the admin session
			header("location:admin.php");
			
		}else{
			echo "<br><p class='invalid'>Invalid Username or Password</p>";
		
		}
		
	
	}
	
	if(isset($_POST['logout'])){ //if the logout button was clicked:
	
		session_destroy();  	//destroy the session(log the user out)
		
		header("location:index.php"); //redirect user to the home page
	
	
	}
	
/*end of Kristjan Muutnik 1308701*/
?>