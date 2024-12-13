<?php
 include ('connect.php');
 // insertion code start

if(isset($_POST['register']))
{
	$rdate = date('Y-m-d');
	$sname = $_POST['sname'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$photo = $_FILES['photo']['name'];
	$pass = $_POST['pass'];

	mysqli_query($con,"INSERT INTO `students`(`rdate`,`sname`,`contact`,`address`,`photo`,`password`) VALUES ('$rdate','$sname','$contact','$address','$photo','$pass') ");

	$dir = "photos/";
	$photo = $_FILES['photo']['name'];
	$tmp_photo = $_FILES['photo']['tmp_name'];
	move_uploaded_file($tmp_photo, $dir.$photo);
	echo "<script>	
			alert('Registration Success..');
			window.location.href ='index.php';
	       </script>";

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Sign-up Page</title>
	<?php
	include('bootcdn.php');
	?>
<style type="text/css">
	body
	{
		background-image:url('images/loginpage.jpg');
		background-size: cover;
		background-attachment: fixed;
		font-family: system-ui;
	}
	.col-sm-6 .well
	{
		background-color: rgba(0, 0, 0, 0.9);

	}
	.col-sm-6 .well h2,label
	{
		color:orange;
		font-weight: bold;
	}
</style>
</head>
<body>

<div class="container">
	<br><br>
	
	<div class="row">
		<div class="col-sm-3">
			
		</div>
		<div class="col-sm-3">
			
		</div>
		
		<div class="col-sm-6">
			<!-- login form start -->

			<div class="well">
				<h2>Student Registration</h2>
				<hr style="margin-top: 0;">
				<form method="post" enctype="multipart/form-data">
					<label>Student Name:</label>
					<input type="text" name="sname" class="form-control" placeholder="Enter Student Name..." required autofocus>
					<br>

					<label>Contact No:</label>
					<input type="number" name="contact" class="form-control" placeholder="Enter Contact No..." required>
					<br>

					<label>Student Address:</label>
					<textarea class="form-control" name="address" placeholder="Enter Address..."></textarea required>
					<br>

					<label>Upload Photo:</label>
					<input type="file" name="photo" class="form-control" required>
					<br>

					<label>Set Password:</label>
					<input type="text" name="pass" class="form-control" placeholder="Set Password" required>

					<br>
				    <button class="btn btn-primary btn-block" type="submit" name="register">REGISTER</button>
				    <br>
				    <p style="color: white;">
				    	Go-to
				    	<a style="color: lime;" href="index.php" >Login</a>
					</p>
			
				    <p style="color:white;">
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