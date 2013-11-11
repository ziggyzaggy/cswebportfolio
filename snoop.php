<?php

include_once('inc/inc.php');



if(isset($_GET['snoop'])){		//check that the button was clicked
$search = $_GET['searchField'];		//pass the get variable in to a variable

if(!empty($_GET['searchField'])){		//check that the search field wasn't empty
	
	$result = mysql_query				//query the database based on user input
	
				("
	
				SELECT *
				FROM admin
				WHERE username LIKE '%$search%' OR password LIKE '%$search%'
				
				"
				);
				
				
		$rowCounter = mysql_num_rows($result);	//count amount of returned records
				
		if($rowCounter > 0){			//if more than 0 records were returned		
		
				
				
			($rowCounter == 1 ? $humanise = "item" : $humanise = "items"); 	
				
			
				echo"something was found, lemme show you the <b>$rowCounter</b> $humanise i've found: <br> <br>";
		
				
				$i = 1;
				
				while($row = mysql_fetch_assoc($result)){ 		//loops through the results echoing them out
					
					
					echo $i. "&nbsp &nbsp <b>" . $row['username'] . " </b><br>";
					$i++;
					}
		
		
		}else{				//if not records were returned
			echo "Nope, nothing";
		}

}

}	



?>