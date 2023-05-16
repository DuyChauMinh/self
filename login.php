<?php
include_once 'db.php';
// include '../index.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        $query = "SELECT * FROM login WHERE username = '$username' limit 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {
                    $_SESSION['id'] = $user_data['id'];
                    header('Location:index.php');
                    die();
                }
            }
        }
    } else {
        echo '<h1>invalid data</h1>';
    }
}

// echo 'wrong username or password!';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
<div id="box">
<main class="container p-4">
  <div class="row">
    <div class="col-lg-4">		
		<form method="post">
			<div><h1 style="text-align:center">Login</h1></div><br>
			<input id="text" type="text" name="username" class="form-control" ><br>
			<input id="text" type="password" name="password" class="form-control"><br>
		<div class="d-grid gap-2 ">
			<input id="button" type="submit" value="Login" class='btn btn-primary' ><br><br>
			</div>
			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</div>
</body>
</html>