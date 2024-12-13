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
	<title>Admin History Page</title>
	<?php
	include ('../bootcdn.php');
	?>
</head>
<body>
	<!-- navbar include -->
	<?php include ('header.php'); ?>

	<div class="container">
		<div class="well well-sm">
			<span class="glyphicon glyphicon-picture"></span>
				<b>HISTORY</b>
			
		</div>
		<!-- booking list start -->
		<div class="row">
			<div class="col-sm-3">
				<h3>Booking List:</h3>
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
						<th>Bookig Id</th>
						<th>Booking Date</th>
						<th>Student Id</th>
						<th>Student Name</th>
						<th>Title</th>
						<th>Description</th>
						<th>Price</th>
					</tr>
				</thead>

				
				<tbody id="myTable">
					<?php 

					$sdata = mysqli_query($con,"SELECT * FROM `booking` ORDER BY bid desc "); //LIMIT 1
					while($row=mysqli_fetch_assoc($sdata)) 
					{
						
					?>
					<tr>
						<td><?php echo $row['bid'] ?></td>
						<td><?php echo $row['bdate'] ?></td>
						<td><?php echo $row['uid'] ?></td>
						<td><?php echo $row['uname'] ?></td>
						<td><?php echo $row['title'] ?></td>
						<td><?php echo $row['description'] ?></td>
						<td><?php echo $row['price'] ?></td>
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