<?php
require_once "inc/inc.php";
?>
<?php 
require("check.admin.php");

include 'header.php'; 
?>
<!--Beginning of code written by Jonathon Reid (1005350)-->

<!--Allows the user to browse all books, based on a given keyword-->

<body>    
    <div class = "container">
        <div class = "well">
    <?php include 'navigation_bar.php' ?>
    <h1>Module Index</h1>
    <br>
    <br>
    <br>
    <?php
        try{
            $sql = "select Module_ID, Title, Description from modules";
            $results = $conn->query($sql);
            $count = $results->rowCount();
        }
        catch (PDOException $e) {
                echo "error: ". $e->getMessage();
            }  
        if ($count > 0) {
            echo "<table class=\"table\">";
            echo "<th>Module ID</th><th>Title</th><th>Description</th> ";
            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>" . $row["Module_ID"] . "</td>";
                echo "<td>" . $row["Title"] . "</td>";
                echo "<td>" . $row["Description"] . "</td>";
                echo "<td><a href=\"module_update.php?Module_ID=".$row["Module_ID"]."\">Edit</a> <a href=\"module_delete.php?Module_ID=".$row["Module_ID"]."\">Delete</a></td>";
                echo "</tr>\n";
            }
            print "</table>\n";
        } 
        $conn = null;
    ?>
    </div>
    </div>
</body>
<!--End of code written by Jonathon Reid (1005350)-->
<?php include 'footer.php' ?>