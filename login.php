
<?php
session_start();
require "config/db.php";
if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $loginInfo = mysqli_fetch_assoc(mysqli_query($dbConn, $query));
    if ($loginInfo) {
        if ($loginInfo["password"] == $password) {
            $_SESSION["user"] = array(
                "username" => $loginInfo["username"],
                "name" => $loginInfo["name"],
            );
            header("location:/crud/");
        } else {
            echo "Your credentials are not correct";

        }
    } else {
        echo "Your credentials are not correct";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Login</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
			crossorigin="anonymous" />
      <link rel="stylesheet" href="public/css/style.css">
	</head>
	<body>
		<div class="d-flex justify-content-center align-items-center login-wrapper">
      <form action="login.php" method="post">
        <h2 class="text-center">LMS</h2>
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
					type="password"
					name="password"
					class="form-control"
					id="exampleInputPassword1" />
			</div>

			<button type="submit" class="btn btn-primary">Login</button>
			<a href="signup.php" class="btn btn-primary">SignUp</a>
		</form>
    </div>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
			crossorigin="anonymous"></script>
	</body>
</html>
