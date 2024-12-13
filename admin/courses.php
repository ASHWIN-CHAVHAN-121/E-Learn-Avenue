<?php
session_start();

 include ('../connect.php');

 if(empty($_SESSION['admin']))
 {
 	header('location:index.php');
 }
 if (isset($_POST['upload'])) 
{
	$cdate = date('Y-m-d');
	$title = $_POST['title'];
	$description = $_POST['description'];
	$price = $_POST['price'];

	mysqli_query($con,"INSERT INTO courses(cdate,title,description,price) VALUES('$cdate','$title','$description','$price')");

	echo "<script>
    alert('Successfully Uploaded New Course!..');
    window.location.href = 'clist.php';
	</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Courses Page</title>
	<?php
	include ('../bootcdn.php');
	?>
</head>
<body>
	<!-- navbar include -->
	<?php include ('header.php'); ?>

	<div class="container">
		<div class="well well-sm">
			<span class="glyphicon glyphicon-edit"></span>
			<b>ADD COURSES</b>
		</div>
		<!-- courses form start --> 

		<div class="row">

			<div class="col-sm-5">
				<form method="post">
					<div class="well">
						<h3>Upload New Course</h3>
						<hr style="border: 1px solid black;
						margin-top: 0;">
						

						<label>Course Title</label>
						<input type="text" name="title" placeholder="Enter Title" class="form-control" required autofocus>
						<br>

						<label>Course Description</label>
						<textarea class="form-control" name="description" placeholder="Description here..."></textarea>
						<br>

						<label>Course Price</label>
						<input type="text" name="price" class="form-control" placeholder="Enter Price" required>
						<br>

						<button type="submit" name="upload" class="btn btn-primary">Upload Course</button>

					</div>
				</form>
			</div>
			
		</div>

		<!-- end of courses-->
	</div>


</body>
</html>