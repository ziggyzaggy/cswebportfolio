
<?php
/*mysql_connect("localhost","root","") or die("failed to connect to database");
*/

if(class_exists('PDO'))
$hostname = "localhost";
$username = "root";
$password = "";
$db = "csdm";

try{
	$dbh = new PDO("mysql:host=$hostname; dbname=$db", $username, $password);
	echo "connected to database";
}
	catch(PDOException $exc)
{
	echo $exc -> getMessage();
}

//mysql_select_db("csdm");

?>