<?php
session_start();
 include ('../connect.php');
// admin login code starts

if(isset($_POST['login']))
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	if($user=='Admin' && $pass=='admin123')
	{
		$_SESSION['admin'] = $user;
		header('location:home.php');
	}
	else
	{
		echo "<script>
		     alert('Invalid Username and Password,Try again!');
		     </script>";
	}
}


// end of login code
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin login Page</title>
	<?php
	include('../bootcdn.php');
	?>
<style type="text/css">
	body
	{
		background-image:url('../images/admin.jpg');
		background-size: cover;
		background-attachment: fixed;
		font-family: system-ui;
	}
	.col-sm-4 .well
	{
		background-color: rgba(0, 0, 0, 0.8);

	}
	.col-sm-4 .well h2,label
	{
		color:orange;
		font-weight: bold;
	}
</style>
</head>
<body>

<div class="container">
	<br><br><br><br><br><br><br><br>
	<div class="row">
		<div class="col-sm-4">
			
		</div>
		<div class="col-sm-4">
			<!-- login form start -->

			<div class="well">
				<h2>Admin Login</h2>
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
				    
				    <p style="color:white;">
				    	Go to <a style="color: lime;" href="../"> User Panel </a>
				    </p>
					
				</form>
			</div>




			<!-- login form end -->
		</div>



	</div>



</div>



</body>
</html>