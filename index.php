<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu</title>
</head>

<body>
	<?php
	session_start();

	if (isset($_GET['q'])) {

		$ques = $_GET['q'];

		if ($ques >= 1 && $ques <= 6) {
			$quesno = "Task$ques.php";
			include($quesno);
		} else if($ques<1 || $ques> 6) {
			// echo "<script>alert('Incorrect Task Number !!')</script>";
			echo "<script>window.location.href='/'</script>";
		}
		else{
            header("Location:/");
		}
	} 
	else {
		echo "<a href='?q=1'>Task 1</a><br><br>";
		echo "<a href='?q=2'>Task 2</a><br><br>";
		echo "<a href='?q=3'>Task 3</a><br><br>";
		echo "<a href='?q=4'>Task 4</a><br><br>";
		echo "<a href='?q=5'>Task 5</a><br><br>";
		echo "<a href='?q=6'>Task 6</a><br><br><br>";


		if ($_SESSION['loggedin'] == true) {
			echo "<a href='logout.php'>Logout</a>";
		} else {
			$_SESSION['loggedin'] = false;
			echo "<a href='login.php'>Login</a>";
			echo "<br><a href='signup.php'>Sign up</a>";
			echo "<br><a href='googlesignin.php'>Sign in with Google</a>";
		}
	}
	?>

</body>

</html>