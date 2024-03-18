<?php

session_start();
$servername = "localhost";
$username = "lavanya";
$password = "password";
$uname=$_POST['username'];
$pass=$_POST['pass'];
$dbname='php_sql';

$hashedpass=(password_hash($pass,PASSWORD_DEFAULT));

$array=array($uname,$pass);
echo $hashedpass;
echo '<br>'. $pass;

$conn = mysqli_connect($servername, $username, $password,$dbname);
if (mysqli_connect_error()) {
    die('Database connection failed '. mysqli_connect_error());
}
    $sql = "SELECT uname,pass FROM credentials WHERE uname='$uname'";

    $res=$conn->query($sql);
    $row = mysqli_fetch_assoc($res);
    if ($row && password_verify($pass,$row['pass'])) 
   { 

    $_SESSION['loggedin'] = true;
    
    $que = $_SESSION["q"];
    header("Location: /?q=$que");
    exit;
}
else{
    $_SESSION["loggedin"] = false;
    echo "<script>alert('Incorrect Password !!')</script>";
    header('Location: login.php');
    exit;
}
?>
