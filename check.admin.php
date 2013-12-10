<?php
//Author Kristjan Muutnik 1308701
//Check That admin is logged in, otherwise redirect to login page
session_start();

if(!isset($_SESSION['admin'])){
header("location:admin.php");
}

//End of Kristjan Muutnik 1308701

?>