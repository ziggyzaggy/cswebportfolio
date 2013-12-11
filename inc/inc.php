<?php
    $hostname = "csdm-mysql";
    $username = "0909007";
    $password = "fdformat";
    $database = "db0909007_cm3028";

    try {
        $dsn = "mysql:host=".$hostname.";dbname=".$database;
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: ".$e->getMessage();
    }
?>