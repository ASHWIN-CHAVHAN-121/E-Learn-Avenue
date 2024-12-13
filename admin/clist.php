<?php
session_start();

 include ('../connect.php');

 if(empty($_SESSION['admin']))
 {
 	header('location:index.php');
 }

 error_reporting(0);
 $id = $_GET['id'];
 mysqli_query($con,"DELETE FROM `courses` WHERE `cid`='".$id."' ")
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Courses List Page</title>
	<?php
	include ('../bootcdn.php');
	?>
</head>
<body>
	<!-- navbar include -->
	<?php include ('header.php'); ?>

	<div class="container">
		<div class="well well-sm">
			<span class="glyphicon glyphicon-list"></span>
				<b>COURSES LIST</b>
		</div>
<!-- student list start -->
		<div class="row">
			<div class="col-sm-3">
				<h3 style="color: red;">Courses List:-</h3>
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
					<tr style="color:black;">
						<th>Course Id</th>
						<th>Upload Date</th>
						<th>Course Title</th>
						<th>Description</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
				</thead>

				
				<tbody id="myTable">
					<?php 

					$sdata = mysqli_query($con,"SELECT * FROM courses ORDER BY cid asc  "); //LIMIT 1
					while($row=mysqli_fetch_assoc($sdata)) 
					{
						

					?>
					<tr style="color:black;">
						<td><?php echo $row['cid'] ?></td>
						<td><?php echo $row['cdate'] ?></td>
						<td><?php echo $row['title'] ?></td>
						<td><?php echo $row['description'] ?></td>
						<td><?php echo $row['price'] ?></td>
						<td>
							<a href="clist.php? id=<?php echo $row['cid'] ?>">
								<span class="glyphicon glyphicon-trash"></span>
								Delete
							</a>
						</td>
					</tr>
					<?php 
					}
					?>
				</tbody>
				
				
			</table>
		</div>

		<!-- table end -->

		<!-- end of student list -->
	</div>


</body>
</html>