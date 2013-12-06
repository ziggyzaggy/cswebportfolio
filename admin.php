<?php
include('header.php');
?>


<body>






    <div class = "container">
        <div class = "navbar navbar-static-top" style ="margin-bottom:20px;">
            <div class ="navbar-inner">

                <a href="index.php" class="brand">LOGO</a>

                <ul class = "nav">
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="reading.php">Reading List</a></li> 
                </ul>

                <ul class = "nav pull-right">
                    <li class="active"> <a href="admin.php">Admin</a></li>

                </ul>


            </div>	
        </div>		




        <div class = "well">


            <div class="row-fluid">
                <div class ="span12 text-center">




                    <?php
                    include_once("login.php");
                    ?>

                </div>





            </div>
        </div>
    </div>	

</body>
</html>	