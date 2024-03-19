<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add_user.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" pattern="^[a-zA-Z]{3,}$">

        <label for="pass">Password:</label>
        <input type="password" name="pass" pattern="^[a-zA-Z0-9]{8,}$">

        <label for="repass">Re enter password:</label>
        <input type="repassword" name="repass" pattern="^[a-zA-Z0-9]{8,}$">

        <label for="email">Email ID:</label>
        <input type="email" name="email">

        <input type="submit" name="submit">
    </form>

    <p>Already a registered user? <a href="login.php">Login</a></p>
</body>
</html>

