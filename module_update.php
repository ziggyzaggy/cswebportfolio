<?php
require_once "inc/inc.php";
?>
<?php



include 'header.php';
?>

<!--Beginning of code written by Jonathon Reid (1005350)-->

<!--Allows the user to create a new book entry in the database-->

<body>       
    <div class = "container">
        <div class = "well">

            <?php include 'navigation_bar.php';
				require("check.admin.php");
			?>

            <h1>Update Module</h1>
            <form <?php echo $_SERVER["PHP_SELF"]; ?>  method="post">    
                <label for="title">Title</label>
                <input type="text" name="Title" id="Title" value="" />  
                <label for="Description">Description</label>
                <input type="text" name="Description" id="Description" value="" />         
                <br>
                <br>
                <input type="submit" name="submitButton" id="submitButton" value="Update Module" />
            </form> 

            <?php
            if (isset($_POST['submitButton'])) {

                $Title = $_POST["Title"];
                $Description = $_POST["Description"];

                try {
                    $module = $_REQUEST['Module_ID'];
                    $sql = "update modules set Title='" . $Title . "', Description='" . $Description . "'  where Module_ID='" . $module . "'";
                    $conn->query($sql);
                } catch (PDOException $e) {
                    echo "error: " . $e->getMessage();
                }
                $url = "module_index.php?";
                header("Location: $url");
            }
            ?>

        </div>
    </div>
</body>