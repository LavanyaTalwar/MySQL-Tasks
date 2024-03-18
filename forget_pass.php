<?php
session_start();

$servername = 'localhost';
$username = 'lavanya';
$password = 'password';
$dbname = 'php_sql';
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (isset($_POST["submit"])) {
    if (mysqli_connect_errno()) {
        echo 'Database connection error' . mysqli_connect_error();
        exit();
    }

    $token = md5(rand());
    $email = $_POST["email"];
    $sql = "SELECT uname, email from credentials where email='$email' LIMIT 1";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);

        $get_name = $row["uname"];
        $get_email = $row["email"];

        $update_token = "UPDATE credentials SET token='$token' where email='$email' LIMIT 1";
        $tok_run = mysqli_query($conn, $update_token);

        if ($tok_run) {
            $_SESSION['get_name'] = $get_name;
            $_SESSION['get_email'] = $get_email;
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;
            header("Location: reset_pass.php");
        } else {
            echo "Something went wrong: " . mysqli_error($conn);
        }
    } else {
        die("Email ID Not found!!");
    }

}

if (isset($_POST["pass_upd"])) {
    $email = $_POST["email"];
    $newpass = $_POST["newpass"];
    $confpass = $_POST["confpass"];
    $hashedpass=(password_hash($newpass, PASSWORD_DEFAULT));
    $token = $_POST["pass_token"];


    if (!empty($token)) {

        if (!empty($email) && !empty($newpass) && !empty($confpass)) {

            $check_token = "SELECT token FROM credentials WHERE token='$token' LIMIT 1";
            $res = mysqli_query($conn, $check_token);
            if (mysqli_num_rows($res) > 0) {
                if ($newpass == $confpass) {
                    $update_pass = "UPDATE credentials SET pass='$hashedpass' WHERE token='$token' LIMIT 1";
                    $update_pass_run = mysqli_query($conn, $update_pass);
                    if ($update_pass_run) {
                        echo "Password updated successfully!";
                    } else {
                        echo "Cant't update password, Something went wrong!!!";
                    }
                } else {
                    echo "Password and confirm password doesn't match";
                }

            } else {
                echo "Invalid Token!";
            }

        } else {
            echo "All fields are mandatory";
        }
    } else {
        echo "Token not found!";
    }
}
?>