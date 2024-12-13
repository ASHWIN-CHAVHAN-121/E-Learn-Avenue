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
	<title>Admin Home Page</title>
	<?php
	include ('../bootcdn.php');
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- navbar include -->
	<?php include ('header.php'); ?>

	<div class="container">
		<div class="well well-sm">
			<span class="glyphicon glyphicon-home"> </span>
				HOME
		</div>
		<!-- summary start -->
		<div class="row">
            <div class="col-sm-4">
                <center>
                    <div class="well">
                        <?php
                          $sdata = mysqli_query($con,"SELECT * FROM students");
                          $result = mysqli_num_rows($sdata);
         				?>
                        <span class="glyphicon glyphicon-user" style="font-size: 40px;"></span>
                        <a href="students.php">
                            <h3>Total Students - <?php echo $result ?></h3>
                        </a>
                    </div>
                </center>
            </div>



            <div class="col-sm-4">
                <center>
                    <div class="well">
                        <?php
                          $sdata = mysqli_query($con,"SELECT * FROM courses");
                          $result = mysqli_num_rows($sdata);
         				?>
                        <span class="glyphicon glyphicon-edit" style="font-size: 40px;"></span>
                        <a href="clist.php">
                            <h3>Active Users - <?php echo $result ?></h3>
                        </a>
                    </div>
                </center>
            </div>

            <div class="col-sm-4">
                <center>
                    <div class="well">
                        <?php
                          $sdata = mysqli_query($con,"SELECT * FROM booking");
                          $result = mysqli_num_rows($sdata);
         				?>
                        <span class="glyphicon glyphicon-list" style="font-size: 40px;"></span>
                        <a href="history.php">
                            <h3>Bookings - <?php echo $result ?></h3>
                        </a>
                    </div>
                </center>
            </div>

            <div class="col-sm-4">
                <center>
                    <div class="well">
                        <?php
                          $sdata = mysqli_query($con,"SELECT * FROM query");
                          $result = mysqli_num_rows($sdata);
         				?>
                        <span class="glyphicon  glyphicon-question-sign" style="font-size: 40px;"></span>
                        <a href="qlist.php">
                            <h3>Querys - <?php echo $result ?></h3>
                        </a>
                    </div>
                </center>
            </div>

            <div class="col-sm-4">
                <center>
                    <div class="well">
                        <?php
                          $sdata = mysqli_query($con,"SELECT * FROM qreply");
                          $result = mysqli_num_rows($sdata);
         				?>
                        <span class="glyphicon glyphicon-share-alt" style="font-size: 40px;"></span>
                        <a href="qresponse.php">
                            <h3>Query Responses - <?php echo $result ?></h3>
                        </a>
                    </div>
                </center>
            </div>

            <div class="col-sm-4">
                <center>
                    <div class="well">
                        <?php
                          $sdata = mysqli_query($con,"SELECT * FROM payment_orders");
                          $result = mysqli_num_rows($sdata);
         				?>
                        <span class="fa fa-rupee" style="font-size: 45px;"></span>
                        <a href="paymenthistory.php">
                            <h3>Total Payments- <?php echo $result ?></h3>
                        </a>
                    </div>
                </center>
            </div>

        </div>
		
	</div>


</body>
</html>