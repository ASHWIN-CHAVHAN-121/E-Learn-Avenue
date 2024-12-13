<?php
session_start();

 include ('../connect.php');

 if(empty($_SESSION['admin']))
 {
 	header('location:index.php');
 }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student List Page</title>
	<?php
	include ('../bootcdn.php');
	?>
</head>
<body>
	<!-- navbar include -->
	<?php include ('header.php'); ?>

	<div class="container">
		<div class="well well-sm">
			<span class="glyphicon glyphicon-user"></span>
				<b>STUDENTS</b>
		</div>

		<!-- student list start -->
		<div class="row">
			<div class="col-sm-3">
				<h3>Students List:</h3>
			</div>
			<div class="col-sm-6">
				
			</div>

			<div class="col-sm-3">
				<input type="text" id="myInput" class="form-control" placeholder="Filter here">
				<!-- logic filter -->
		<script>
		$(document).ready(function(){
		  $("#myInput").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#myTable tr").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });
		});
		</script>
			</div>
		</div>
		<!-- table starts -->
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr style="color:orange;">
						<th>Student Id</th>
						<th>Reg Date</th>
						<th>Student Name</th>
						<th>Contact Number</th>
						<th>Address</th>
						<th>Photo</th>
						<th>Password</th>
					</tr>
				</thead>

				
				<tbody id="myTable">
					<?php 

					$sdata = mysqli_query($con,"SELECT * FROM `students` ORDER BY id desc  "); //LIMIT 1
					while($row=mysqli_fetch_assoc($sdata)) 
					{
						

					?>
					<tr>
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['rdate'] ?></td>
						<td><?php echo $row['sname'] ?></td>
						<td><?php echo $row['contact'] ?></td>
						<td><?php echo $row['address'] ?></td>
						<td><?php echo $row['photo'] ?></td>
						<td><?php echo $row['password'] ?></td>
					</tr>
					<?php 
					}
					?>
				</tbody>
				
				
			</table>
		</div>

		<!-- table end -->

		<!-- student list end -->
	</div>


</body>
</html>