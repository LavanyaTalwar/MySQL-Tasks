<?php

$servername = "localhost";
$username = "lavanya";
$password = "password";
$dbname = "php_sql";

session_start();


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!isset($_SESSION['token'])) {
  header('Location: googlesignin.php');
  exit;
}
require('config.php');

$client->setAccessToken($_SESSION['token']);

if ($client->isAccessTokenExpired()) {
  header('Location: logout.php');
  exit;
}

$google_oauth = new Google_Service_Oauth2($client);
$user_info = $google_oauth->userinfo->get();
$email = $user_info['email'];
$exploded = explode("@", $email);
$uname = $exploded[0];


$check_login = "SELECT email FROM credentials WHERE email= '$email'";
$check_login_run = mysqli_query($conn, $check_login);
// echo $check_login_run;
if (mysqli_num_rows($check_login_run) == 0) {

  $gmail_write = "INSERT INTO credentials (uname,email) VALUES ('$uname','$email')";
  // $gmail_write_run=$conn->query($gmail_write);

  try {
    // $res = $conn->query($gmail_write);
    $res = mysqli_query($conn, $gmail_write);
    var_dump($res);
    if ($res) {
      $_SESSION['loggedin'] = true;
      header("location:/");
      exit;
    } else {
      $_SESSION['loggedin'] = false;
      die('Error in adding data');
    }
  } catch (mysqli_sql_exception $e) {

    $error = "Error: " . $e->getMessage();
    echo "<script>alert(" . json_encode($error) . ");
      window.location.href='/signup.php'</script>";

  }
} else {

  if ($check_login_run) {
    // echo "if hi";
    $_SESSION["loggedin"] = true;
    echo "<script>alert('Login successful!!');</script>";
    echo "<script>window.location.href='/'</script>";
  } else {
    // echo "elsee hii";
    $_SESSION["loggedin"] = false;
    echo "<script>alert(" . json_encode($error) . ");window.location.href='/'</script>";
  }
}