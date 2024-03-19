<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="forget_pass.php" method="post">

    <input type="hidden" name="pass_token" value="<?php
    if(isset($_GET['token'])){
        echo $_GET['token'];
    }
    ?>">

        <label for="email">Email ID:</label>
        <input type="text" name="email" value="<?php 
        if(isset($_GET['email'])){
            echo $_GET['email'];
        }
        ?>">

        <label for="newpass">NEW PASS:</label>
        <input type="text" name="newpass" pattern="^[a-zA-Z0-9]{8,}$">

        <label for="confpass">Confirm Password:</label>
        <input type="text" name="confpass" pattern="^[a-zA-Z0-9]{8,}$">

        <input type="submit" name="pass_upd">
    </form>
</body>

</html>