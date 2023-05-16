<?php
include 'db.php';
// include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        $query = "INSERT INTO login (username,password) values ('$username','$password')";

        mysqli_query($conn, $query);

        header('Location: login.php');
        die();
    } else {
        echo 'Please enter some valid information!';
    }
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

	<div id="box">
	<main class="container p-4">
  <div class="row">
    <div class="col-lg-4">			
		<form method="post">
			<div><h1 style="text-align:center">Signup</h1></div>

			<input id="text" type="text" name="username" class="form-control"><br>
			<input id="text" type="password" name="password" class="form-control"><br>

			<div class="d-grid gap-2 ">
			<input id="button" type="submit" value="Signup" class='btn btn-primary btn-warning' ><br>
			</div>

			<a href="login.php">Click to Login</a>
		</form>
		</div>
</div>

</main>
</div>
</body>
</html>