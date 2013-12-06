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
    <?php include 'navigation_bar.php' ?>

    <h1>Create Module</h1>

    <form class="well" action="" method="post">   
        <label for="module_ID">Module ID</label>
        <input type="text" name="module_ID" id="module_ID" value="" />  
        <label for="title">Title</label>
        <input type="text" name="Title" id="Title" value="" />  
        <label for="first_author">Description</label>
        <input type="text" name="Description" id="Description" value="" />      
        <br>
        <br>
        <input type="submit" name="submitButton" id="submitButton" value="Create Module" />
    </form> 

    <?php
    if (isset($_POST['submitButton'])) {

        $Module_ID = $_POST["module_ID"];
        $Title = $_POST["Title"];
        $Description = $_POST["Description"];
        try {
            $sql = "insert into modules values ('" . $Module_ID . "', '" . $Title . "', '" . $Description . "')";
            $conn->query($sql);
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }

        $url = "module_index.php?";
        header("Location: $url");
    }
    ?>
    </div>
</body>

    <!--End of code written by Jonathon Reid (1005350)-->

<?php include 'footer.php' ?>