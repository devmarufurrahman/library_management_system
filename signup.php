<?php
require "config/db.php";
if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password == $confirm_password) {
        $query = "INSERT INTO users(name, username, password) VALUES ('$name', '$username', '$password')";

        $execute = mysqli_query($dbConn, $query);

        if (mysqli_error($dbConn)) {
            print_r(mysqli_error($dbConn));
            exit(0);
        }
        header("location: login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Sign Up</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
			crossorigin="anonymous" />
		<link rel="stylesheet" href="public/css/style.css" />
	</head>
	<body>
		<div class="d-flex justify-content-center align-items-center login-wrapper">
			<form method="post" action="signup.php">
				<h2 class="text-center">LMS</h2>
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Name</label>
					<input
						type="text"
						class="form-control"
						id="exampleInputEmail1"
						name="name"
						aria-describedby="emailHelp" />
				</div>
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Username</label>
					<input
						type="text"
						class="form-control"
						id="exampleInputEmail1"
						name="username"
						aria-describedby="emailHelp" />
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Password</label>
					<input
						name="password"
						type="password"
						class="form-control"
						id="exampleInputPassword1" />
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label"
						>Confirm Password</label
					>
					<input
						type="password"
						name="confirm_password"
						class="form-control"
						id="exampleInputPassword1" />
				</div>

				<button type="submit" class="btn btn-primary">SignUp</button>
				<a href="login.php" class="btn btn-primary">Login</a>
			</form>
		</div>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
			crossorigin="anonymous"></script>
	</body>
</html>
