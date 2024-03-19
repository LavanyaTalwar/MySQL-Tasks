
<?php
    session_start();

    if($_SESSION["loggedin"] !== true) {
        $_SESSION["q"] = 2;
        header('Location: login.php');
        exit;
    }

?>
<html>
    <head>
        <title>Task2</title>
    </head>
    <body>
        
        <form action="form2.php" method="post" enctype="multipart/form-data">
            <label for="fname">First Name</label>
            <input required type="text" name="fname" pattern="[A-Za-z]+" id="fname">
            <br><br>
            <label for="lname">Last Name</label>
            <input required type="text" name="lname" pattern="[A-Za-z]+" id="lname"> 
            <br> <br>
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" id="fullname"> <br> <br>
            <label for="uploadfile">Choose an image:</label>
            <input type="file" id="uploadfile" name="uploadfile"><br><br>
            <a href="logout.php">Logout</a><br><br>
            <input type="submit" name="submit">
            

        </form>

        <script src="script.js"></script>
        
    </body>
</html>