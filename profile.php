<?php
session_start();

 include ('connect.php');

 if(empty($_SESSION['id']))
 {
 	header('location:index.php');
 }
 $udata = mysqli_query($con,"SELECT * FROM `students` WHERE `id` ='".$_SESSION['id']."' ");
 $result =mysqli_fetch_array($udata);

 // update data code starts
if(isset($_POST['update']))
{
	$sname = $_POST['sname'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$pass = $_POST['pass'];

// column name = var name
	mysqli_query($con,"UPDATE `students` SET `sname`='$sname', `contact` = '$contact' , `address` = '$address', `password`='$pass' WHERE `id`= '".$_SESSION['id']."'  	  ");
	echo "<script>  
			alert('Profile Update Successfully');
			window.location.href='profile.php';
	      </script>";
}

 // end of update code
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Profile Page</title>
	<?php
	include ('bootcdn.php');
	?>
</head>
<!-- profile page style -->
<style>
	body {
			background: url(images/profile1.jpg);
			background-position:top;
			background-repeat: no-repeat;
			background-size:cover;
			background-attachment: fixed;
		}

</style>
<body>
	<!-- navbar include -->
	<?php include ('header1.php'); ?>

	<div class="container">
	<div style="margin-top: -10px;">
			<h2 class="well well-sm text-center" style="font-weight: bold;color:black;">My<span
					style="color:orangered"> Profile</span></h2>
			<h4 class="text-center" style="margin-top: 0px;font-weight:bold; color:white">Update Your Profile Now !</h4>
			<hr style="margin-top: 0; border: 1px solid orangered; ">
	</div>
		<!-- profile update section start -->
		<div class="row">
		<div class="col-sm-3">
			
			<!--blank div  -->
		</div>
		<div class="col-sm-6">
			<!-- login form start -->

			 <div class="well">
				<h2 style="color:orange;"> Student Profile Update</h2>
				<hr style="margin-top: 0; color: black;">
				<form method="post" enctype="multipart/form-data">
					<label>Student Name:</label>
					<input type="text" name="sname" class="form-control" value="<?php echo $result['sname'] ?>">
					<br>

					<label>Contact No:</label>
					<input type="number" name="contact" class="form-control" value="<?php echo $result['contact'] ?>">
					<br>

					<label>Student Address:</label>
					<textarea class="form-control" name="address"> <?php echo $result['address'] ?></textarea>
					<br>

					<!-- <label>Upload Photo:</label>
					<input type="file" name="photo" class="form-control" required>
					<br> -->

					<label>Set Password:</label>
					<input type="text" name="pass" class="form-control" value="<?php echo $result['password'] ?>">

					<br>
				    <button class="btn btn-primary btn-block" type="submit" name="update">UPDATE</button>
				    <br>
				   
					
				</form>
			</div>
			<!-- login form end -->
		</div>
	</div>
		<!--  profile update section end  -->
	</div>


</body>
</html>