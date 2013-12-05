<?php

include_once('inc/inc.php');

/**
**
** @ Author Kristjan Muutnik 1308701
**	The backbone of search returns the results that match a keyword
*/

if(isset($_GET['snoop'])){		//check that the button was clicked

$search = $_GET['searchField'];		//pass the get variable in to a variable

if(!empty($_GET['searchField'])){		//check that the search field wasn't empty
	
	$result = $dbh->query				//query the database based on user input
	
				("
	
				SELECT *
				FROM books
				WHERE Content_Summary LIKE '%$search%'
				
				"
				);
				
				
		$rowCounter = $result->rowCount($result);	//count amount of returned records
				
		if($rowCounter > 0){			//if more than 0 records were returned		
			echo"<div class='well'>";
				
				
			($rowCounter == 1 ? $humanise = "item" : $humanise = "items"); 	
				
			
				echo"
				 <b>$rowCounter</b> $humanise found: <br> <br>";
		
				
				$i = 1;
				
				foreach($result as $row){ 		//loops through the results echoing them out
					
					
					echo "<a href = display.php?id=" . $row['Book_ID'] . ">". $i. "&nbsp &nbsp View <b> " . $row['Title'] . "</b> </a>  <br>";
					$i++;
					}

		
		}else{				//if no records were returned
			echo "Nope, nothing";
		}

}
echo "</div>";
}	

// end of Kristjan Muutnik 1308701

?>