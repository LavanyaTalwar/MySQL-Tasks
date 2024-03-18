<?php

$servername='localhost';
$username= 'lavanya';
$password= 'password';
$dbname= 'php_sql';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Erroer: '. $conn->connect_error);
}
$sql = 'SELECT* FROM credentials WHERE email=';
?>