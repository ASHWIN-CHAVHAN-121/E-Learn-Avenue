<?php
session_start();
include ('connect.php');
if (!empty($_SESSION['id'])) {
	header('location:home.php');
}

// login code starts 
if (isset($_POST['login'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$sql = mysqli_query($con, "SELECT * FROM `students` WHERE `contact`='" . $user . "' && `password`= '" . $pass . "'  ");

	// if login success
	while ($row = mysqli_fetch_assoc($sql)) {
		$_SESSION['id'] = $row['id'];
		$_SESSION['sname'] = $row['sname'];
	}

	$result = mysqli_num_rows($sql);

	if ($result > 0) {
		header('location:home.php');
	} else {
		echo "<script> 
 			alert('Invalid User..!');
 			</script>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student login Page</title>
	<?php
	include ('bootcdn.php');
	?>
	<style type="text/css">
		body {
			background-image: url('images/login.webp');
			background-size: cover;
			background-attachment: fixed;
			font-family: system-ui;
		}

		.col-sm-4 .well {
			background-color: rgba(0, 0, 0, 0.9);


		}

		.col-sm-4 .well h2,
		label {
			color: orange;
			font-weight: bold;
		}
	</style>
</head>

<body>

	<div class="container">
		<br><br><br><br><br><br>
		<div class="row">
			<div class="col-sm-4">

			</div>

			<div class="col-sm-4">
				<!-- login form start -->

				<div class="well">
					<h2>Student Login</h2>
					<hr style="margin-top: 0;">
					<form method="post">
						<label>UserName:</label>
						<input type="text" name="user" class="form-control" placeholder="UserName" required autofocus>
						<br>
						<label>Password:</label>
						<input type="password" name="pass" class="form-control" placeholder="Password" required>
						<br>
						<button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
						<br>
						<p style="color:white; font-weight:bold; font-size:18px;">
							Not Registered
							<a href="register.php">
								<strong style="color:lime;"> Sign-Up </strong>
							</a>
						</p>
						<hr style="margin-top: 0px;">
						<p style="color:white; margin-top:-10px;">
							Go to <a style="color: lime;" href="admin/"> Admin Panel </a>
						</p>

					</form>
				</div>




				<!-- login form end -->
			</div>
		</div>
	</div>
</body>
</html>