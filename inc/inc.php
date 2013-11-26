
<?php



$hostname = "localhost";
$username = "root";
$password = "";
$db = "csdm";

try{
	$dbh = new PDO("mysql:host=$hostname; dbname=$db", $username, $password);
	
}
	catch(PDOException $exc)
{
	echo $exc -> getMessage();
}

//mysql_select_db("csdm");

?>