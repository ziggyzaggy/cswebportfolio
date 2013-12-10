<?php
require_once "inc/inc.php";
?>
<?php

require("check.admin.php");


include 'header.php';
?>

<!--Beginning of code written by Jonathon Reid (1005350)-->

<!--Allows the user to create a new book entry in the database-->

<body>       
    <div class = "container">
    <?php include 'navigation_bar.php' ?>

    <h1>Delete Module</h1>

    <form class="well" action="" method="post">      
        <label for="module_message">Are you sure you wish to delete this Module?</label>
        <input type="submit" name="submitButton" id="submitButton" value="Delete Module" />
    </form>

    <?php
    if (isset($_POST['submitButton'])) {

        try {
            $module = $_REQUEST['Module_ID'];
            $sql = "delete from modules where Module_ID='" . $module . "'";
            $results = $conn->query($sql);
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
        
        $url = "module_index.php?";
        header("Location: $url");
    }
    ?>
    </div>
</body>