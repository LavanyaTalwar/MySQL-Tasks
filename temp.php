<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="id" id="">
        <input type="number" name="age" id="">
        <input type="text" name="name" id="">
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>


<?php

if(isset($_POST["submit"])) {
    $servername="localhost";
    $username="lavanya";
    $password= "password";
    $dbname= "temp";
    $id=$_POST['id'];
    $age=$_POST['age'];
    $name=$_POST['name'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    echo "Database Connected successfully <br>";

    $sql1 = "INSERT INTO random VALUES('$id','$age','$name')";

    if(mysqli_query($conn, $sql1)){
        echo "Data inserted";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
