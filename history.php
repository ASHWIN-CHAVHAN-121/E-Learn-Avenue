<?php
session_start();

include ('connect.php');

if (empty($_SESSION['id'])) {
	header('location:index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User History Page</title>
	<?php
	include ('bootcdn.php');
	?>
</head>

<!-- History page style -->
<style>
	body {
		background: url(images/profile1.jpg);
		background-position: top;
		background-repeat: no-repeat;
		background-size: cover;
		background-attachment: fixed;
	}

	#table-heading th {
		font-size: 20px;
		font-weight: bold;
		color: black;
		padding: 6px;
		border:2px solid black;
	}

	#myTable td {
		font-size: 18px;
		font-weight: bold;
		padding: 8px;
		border:2px solid black;
	}

	#myTable td:hover {
		background-color: lightcoral;

	}

	.col-sm-3 h3 {
		font-weight: bold;
		font-size: 16px;
		margin-top: 4px;
	}
</style>

<body>
	<!-- navbar include -->
	<?php include ('header1.php'); ?>

	<div class="container" id="history">
		<div style="margin-top: -10px;">
			<h2 class="well well-sm text-center" style="font-weight: bold;color:black;">My<span style="color:orangered">
					History</span></h2>

		</div>
		<!-- booking list start -->
		<div class="row">
			<div class="col-sm-3">
				<h3 class="btn btn-primary" data-toggle="collapse" data-target="#booking">Booking List :</h3>
			</div>
			<div class="col-sm-6">

			</div>

			<div class="col-sm-3">
				<input type="text" id="myInput" class="form-control" placeholder="Filter here">
				<!-- logic filter -->
				<script>
					$(document).ready(function () {
						$("#myInput").on("keyup", function () {
							var value = $(this).val().toLowerCase();
							$("#myTable tr").filter(function () {
								$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
							});
						});
					});
				</script>
			</div>
		</div>
		<br>
		<!-- table starts -->
		<div class="table-responsive collapse in" id="booking">
			<table class="table table-striped table-bordered table-hover table-condensed">
				<thead>
					<tr class="danger" id="table-heading">
						<th>Booking Id</th>
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

					$sdata = mysqli_query($con, "SELECT * FROM `booking` WHERE `uid` = '" . $_SESSION['id'] . "' ORDER BY bid desc "); //LIMIT 1
					while ($row = mysqli_fetch_assoc($sdata)) {

						?>
						<tr>
							<td class="info"><?php echo $row['bid'] ?></td>
							<td class="info"><?php echo $row['bdate'] ?></td>
							<td class="info"><?php echo $row['uid'] ?></td>
							<td class="info"><?php echo $row['uname'] ?></td>
							<td class="info"><?php echo $row['title'] ?></td>
							<td class="info"><?php echo $row['description'] ?></td>
							<td class="warning"><?php echo $row['price'] ?></td>
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