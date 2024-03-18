<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

session_start();
$name = $_SESSION['get_name'];
$email = $_SESSION['get_email'];
$token = $_SESSION['token'];

$resetEmail = $_SESSION['email'];
$password = "leui sbny zdsr txhi";
$email = new PHPMailer();
$email->IsSMTP();
$email->SMTPAuth = true;

$email->Host = "smtp.gmail.com";
$email->Username = "talwarlavanya2002@gmail.com";
$email->Password = $password;



$email->SMTPSecure = 'ssl';
$email->Port = 465;
$email->isHTML(true);

$email->SetFrom("talwarlavanya2002@gmail.com", $name);

$email->AddAddress("$resetEmail");
$email->Subject = "Reset Password Email";
$email->Body = "Here's your email reset link:<br><a href='sqltasks.com/pass_change.php?token=$token&email=$resetEmail'>CLICK HERE...</a>";
if (!$email->Send()) {
  echo "Error: " . $email->ErrorInfo;
} else {
  echo 'Email sent!';
}
