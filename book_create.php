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

        <h1>Create Book</h1>

        <form class="well" action="" method="post">   
            <label for="book_id">Book ID</label>
            <input type="text" name="Book_ID" id="Book_ID" value="" />  
            <label for="title">Title</label>
            <input type="text" name="Title" id="Title" value="" />  
            <label for="first_author">First Author</label>
            <input type="text" name="First_Author" id="First_Author" value="" />      
            <label for="second_author">Second Author</label>
            <input type="text" name="Second_Author" id="Second_Author" value="" />      
            <label for="publisher_name">Publisher Name</label>
            <input type="text" name="Publisher" id="Publisher" value="" />     
            <label for="year_published">Year Published</label>
            <input type="text" name="Year" id="Year" value="" />    
            <label for="subject">Subject</label>
            <input type="text" name="Content_Summary" id="Content_Summary" value="" />     
            <br>
            <br>
            <input type="submit" name="submitButton" id="submitButton" value="Create Book" />
        </form> 

        <?php
        if (isset($_POST['submitButton'])) {

            $Book_ID = $_POST["Book_ID"];
            $Title = $_POST["Title"];
            $First_Author = $_POST["First_Author"];
            $Second_Author = $_POST["Second_Author"];
            $Publisher = $_POST["Publisher"];
            $Year = $_POST["Year"];
            $Content_Summary = $_POST["Content_Summary"];
            try {
                $sql = "insert into books values ('" . $Book_ID . "', '" . $Title . "', '" . $First_Author . "', '" . $Second_Author . "', '" . $Publisher . "', '" . $Year . "', '" . $Content_Summary . "')";
                $conn->query($sql);
            } catch (PDOException $e) {
                echo "error: " . $e->getMessage();
            }

            $url = "book_index.php?";
            header("Location: $url");
        }
        ?>
        </div>
    </body>

        <!--End of code written by Jonathon Reid (1005350)-->

    <?php include 'footer.php' ?>