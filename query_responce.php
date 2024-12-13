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
        #q-response th
		{
			font-size: 14px;
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

	<div class="container">
        <!-- Query List Starts -->

        <div class="row">
        <div style="margin-top: -10px;">
			<h2 class="well well-sm text-center" style="font-weight: bold;color:black;">Query<span
					style="color:orangered"> Responses</span></h2>	
	    </div>
        <hr style="border: solid goldenrod 2px;">
<div class="col-sm-3"> 
<h3 class="btn btn-primary" data-toggle="collapse" data-target="#q-response" style="font-weight: bold;" >Your Query Responses</h3>

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
        <div class="table-responsive collapse in" id="q-response">
            <table class="table table-striped table-bordered table-hover table-condensed" id="myTable">
                <thead>
                    <tr class="danger" id="responce-heading ">
                        <th>Query Id</th>
                        <th >Query Date</th>
                        <th >Student ID</th>
                        <th >student Name</th>
                        <th >Query Type</th>
                        <th >Query Description</th>
                        <th >Reply</th>
                        <th >Action</th>
                       
                    </tr>
                </thead>

                <tbody id="myTables">
                    <?php
          $sdata = mysqli_query($con,"SELECT * FROM qreply WHERE uid = '".$_SESSION['id']."' ORDER BY qid desc LIMIT 50");

         while ($row = mysqli_fetch_assoc($sdata))
         {
         
		?>
                    <tr>
                        <td class="info"><?php echo $row['qid']?></td>
                        <td class="info"><?php echo $row['qdate']?></td>
                        <td class="info"><?php echo $row['uid']?></td>
                        <td class="info"><?php echo $row['uname']?></td>
                        <td class="info"><?php echo $row['qtype']?></td>
                        <td class="info"><?php echo $row['briefquery']?></td>
                        <td class="info"><?php echo $row['reply']?></td>
                        <td class="info">
                            <a href="query.php?id=<?php echo $row['qid']?>"><span
                                    class="glyphicon glyphicon-trash"></span>
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
        </div>
        <!-- table ends -->
        <!-- Query List Ends -->
</div>
    <div class="container">
                    <a href="query.php" class="btn btn-danger" role="button" style="margin-left:500px; font-weight:bold">Have a Query ?</a> 
                </div>

</body>
</html>