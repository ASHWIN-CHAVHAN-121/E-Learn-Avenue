<?php
session_start();

 include ('connect.php');

 if(empty($_SESSION['id']))
 {
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
<body>
<style>
	body {
			background: url(images/profile1.jpg);
			background-position:top;
			background-repeat: no-repeat;
			background-size:cover;
			background-attachment: fixed;
		}
        #payment-heading th
		{
			font-size: 20px;
			font-weight: bold;
			color:black;
			padding: 4px;
		}
		#myTable td
		{
			font-size: 16px;
			font-weight: bold;
			padding: 8px;
		}
		#myTable td:hover
		{
			background-color:lightcoral;

		}
		.col-sm-3 h3{
			font-weight: bold;
			font-size: 16px;
			margin-top: 4px;
            margin-left: 20px;
		}
        .col-sm-3 :placeholder-shown
        {
            font-weight: bold;
        
        }


</style>
	<!-- navbar include -->
	<?php include ('header1.php'); ?>

	<div class="row">
    <div style="margin-top: -10px;">
			<h2 class="well well-sm text-center" style="font-weight: bold;color:black;">Payment<span
					style="color:orangered"> History</span></h2>
			
	</div>
            <div class="col-sm-3">
				<h3 class="btn btn-primary" data-toggle="collapse" data-target="#payment">View History</h3>
			</div>
            <div class="col-sm-6">

            </div>
			
            <div class="col-sm-3">
                <input type="text" id="myInputs" class="form-control" placeholder="Filter Here">

                <script>
                $(document).ready(function() {
                    $("#myInputs").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTables tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
                </script>
            </div>
        </div>
<br>
        <!-- table starts -->
<div class="col-sm-12"> 
    <div class="table-responsive collapse in"  id="payment">
            <table class="table table-striped table-bordered table-hover table-condensed" id="myTable">
                <thead>
                    <tr class="danger" id="payment-heading">
                        <th>Id</th>
                        <th>Product Id</th>
                        <th>Student ID</th>
                        <th >Student Name</th>
                        <th>Title</th>
                        <th >Payment Id</th>
                        <th >Purchase Date</th>
                        <th >Amount</th>
                    </tr>
                </thead>

                <tbody id="myTables">
                    <?php
         $sdata = mysqli_query($con,"SELECT * FROM payment_orders WHERE uid = '".$_SESSION['id']."' ORDER BY id desc LIMIT 20");

         while ($row = mysqli_fetch_assoc($sdata))
         {
         
		?>
                    <tr>
                        <td class="info"><?php echo $row['id']?></td>
                        <td class="info"><?php echo $row['product_id']?></td>
                        <td class="info"><?php echo $row['uid']?></td>
                        <td class="info"><?php echo $row['uname']?></td>
                        <td class="info"><?php echo $row['title']?></td>
                        <td class="info"><?php echo $row['payment_id']?></td>
                        <td class="info"><?php echo $row['added_date']?></td>
                        <td class="info"><?php echo $row['amount']?></td>
                    </tr>
                    <?php
		}
		?>
                </tbody>

            </table>          
         </div>
</div>
                <div class="container">
                    <a href="courses.php" class="btn btn-danger" role="button" style="margin-left:500px; font-weight:bold"> Buy More Courses</a> 
                </div>


</body>
</html>