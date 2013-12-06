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

    <h1>Delete Book</h1>

    <form class="well" action="" method="post">      
        <label for="book_id">Are you sure you wish to delete this book?</label>
        <input type="submit" name="submitButton" id="submitButton" value="Delete Book" />
    </form>

    <?php
    if (isset($_POST['submitButton'])) {

        try {
            $book = $_REQUEST['Book_ID'];
            $sql = "delete from books where Book_ID='" . $book . "'";
            $results = $conn->query($sql);
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
        
        $url = "book_index.php?";
        header("Location: $url");
    }
    ?>
    </div>
</body>