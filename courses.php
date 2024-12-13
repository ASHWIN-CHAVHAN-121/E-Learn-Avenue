<?php
session_start();
include ('connect.php');

if (empty($_SESSION['id'])) {
	header('location:index.php');
}

if (isset($_POST['btn_book'])) {
	$bdate = $_POST['bdate'];
	$uid = $_POST['uid'];
	$uname = $_POST['uname'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$price = $_POST['price'];

	mysqli_query($con, "INSERT INTO booking(bdate,uid,uname,title,description,price) VALUES('$bdate','$uid','$uname','$title','$description','$price') ");

	echo "<script>
    alert ('Successfully booked you new course.');
    window.location.href='history.php';
    </script>";
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Courses Page</title>
	<?php include ('bootcdn.php'); ?>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
		.panel-default .panel-heading {
			color: white;
		}

		body {
			background: url(images/courses.jpg);
			background-repeat: no-repeat;
			background-size: cover;
		}

		.panel:hover {
			background-color: lightcoral;
		}
	</style>
</head>

<body>

	<?php include ('header1.php'); ?>

	<div class="container">

		<div style="margin-top: -10px;">
			<h2 class="well well-sm text-center" style="font-weight: bold;color:black;">Our<span
					style="color:orangered"> Courses</span></h2>
			<h4 class="text-center" style="margin-top: 0px;font-weight:bold;">Learn the latest technology with
				interactive, hands-on courses. Start learning Now !</h4>
			<hr style="margin-top: 0; border: 1px solid orangered; ">

		</div>


		<!-- Courses list start -->

		<div class="row">

			<?php
			$clist = mysqli_query($con, "SELECT * FROM courses ");
			while ($row = mysqli_fetch_assoc($clist)) {
				?>

				<div class="col-sm-4">
					<div class="panel panel-default" style="height:450px;">


						<div class="panel-heading">
							<img src="images/courses1.jpg" height="200px;" width="100%;">
						</div>

						<div class="panel-body">

							<h4 style="color:orangered;font-weight:bold;font-size: 20px;"><?php echo $row['title'] ?></h4>

							<i><b style="color:cornflowerblue;">Upload Date:-</b><?php echo $row['cdate'] ?></i>

							<br>
							<h4 style="font-weight: bolder;">Description:-
								<?php echo $row['description'] ?>
							</h4>

							<span class="label label-primary">Price-</span>
							<a href="#">
								<span class="badge"><?php echo $row['price'] ?></span>
							</a>

						</div>

						<div class="panel-footer">
							<!-- payment code -->
							<form method="post">
								<input type="hidden" name="bdate" value="<?php echo date('Y-m-d') ?>">
								<input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">
								<input type="hidden" name="uname" value="<?php echo $_SESSION['sname'] ?>">
								<input type="hidden" name="title" value="<?php echo $row['title'] ?>">
								<input type="hidden" name="description" value="<?php echo $row['description'] ?>">
								<input type="hidden" name="price" value="<?php echo $row['price'] ?>">

								<a href="#" class="btn btn-success buynow" data-productid="<?php echo $row['cid']; ?>"
									data-productdate="<?php echo $row['cdate']; ?>"
									data-productname="<?php echo $row['title']; ?>"
									data-productdescription="<?php echo $row['description']; ?>"
									data-amount="<?php echo $row['price']; ?>">Buy Now </a>
							</form>

							<!-- <form method="post">

								<input type="hidden" name="bdate" value="<?php echo date('Y-m-d') ?>">

								<input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">

								<input type="hidden" name="uname" value="<?php echo $_SESSION['sname'] ?>">

								<input type="hidden" name="title" value="<?php echo $row['title'] ?>">

								<input type="hidden" name="description" value="<?php echo $row['description'] ?>">

								<input type="hidden" name="price" value="<?php echo $row['price'] ?>">


								<button type="submit" name="btn_book" class="btn btn-success">Buy Now</button>
							</form> -->
						</div>

					</div>
				</div>
				<?php
			}
			?>
		</div>
		<!-- Courses list end -->
	</div>

	<!-- Redirect code of razor api starts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

	<script>
		$(".buynow").click(function (e) {
			var amount = $(this).attr('data-amount');
			var productid = $(this).attr('data-productid');
			var productname = $(this).attr('data-productname'); // Added line
			var uname = '<?php echo $_SESSION['sname']; ?>';
			var uid = '<?php echo $_SESSION['id']; ?>';

			var options = {
				"key": "rzp_test_npXJkqj5ZMO5k",
				"amount": amount * 100,
				"currency": "INR",
				"name": "E-Learn Avenue",
				"description": productname,
				"image": "images/logo1.jpg",
				"handler": function (response) {
					var paymentid = response.razorpay_payment_id;
					$.ajax({
						url: "payment-process.php",
						type: "POST",
						data: {
							product_id: productid,
							payment_id: paymentid,
							amount: amount,
							product_title: productname,
							uname: uname,
							uid: uid
						}, // Added product_title
						success: function (finalresponse) {
							if (finalresponse == 'done') {
								window.location.href =
									"http://localhost/college_project/success.php";
							} else {
								alert('Please check console.log to find error');
								console.log(finalresponse);
							}
						}
					})
				},
				"theme": {
					"color": "#3399cc"
				}
			};
			var rzp1 = new Razorpay(options);
			rzp1.open();
			e.preventDefault();
		});
	</script>
	<!-- Redirect code of razor api ends -->

	<!-- footer include -->
	<?php include ('footer.php'); ?>


</body>

</html>
