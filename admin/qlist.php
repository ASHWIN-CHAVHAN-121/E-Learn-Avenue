<?php
session_start();

 include ('../connect.php');

 if(empty($_SESSION['admin']))
 {
 	header('location:index.php');
 }
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reply'])) {
    // Handle form submission
    $reply = $_POST['reply'];
    // Assuming you have variables for qid, qdate, qtype, uid, and uname
    // You need to replace these with your actual variables or fetch them from somewhere
    $qid = $_POST['qid'];
    $qdate = $_POST['qdate'];
    $qtype = $_POST['qtype'];
    $uid = $_POST['uid'];
    $uname = $_POST['uname'];
    $briefquery = $_POST['briefquery'];


    // Insert reply data into the database
    $insert_reply_query = "INSERT INTO qreply (qid, qdate, qtype, uid, uname, briefquery,reply) VALUES ('$qid', '$qdate', '$qtype', '$uid', '$uname','$briefquery','$reply')";
    mysqli_query($con, $insert_reply_query);

    echo "<script> 
       alert ('Replied Successfully.....');
       window.location.href='qresponse.php';
	 </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Query List Page</title>
	<?php
	include ('../bootcdn.php');
	?>
</head>
<body>
	<!-- navbar include -->
	<?php include ('header.php'); ?>

	<div class="container">
		<div class="well well-sm">
			<span class="glyphicon glyphicon-list-alt"></span>
				<b>QUERY LIST</b>
		</div>

		<div class="row">
             <div class="col-sm-3">
                 <h2>Students Querys History:-</h2>
             </div>
             <div class="col-sm-6">

             </div>
             <div class="col-sm-3">
                 <input type="text" id="myInput" class="form-control" placeholder="Filter Here">

                 <script>
                 $(document).ready(function() {
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
                     <tr style=" background-color: deepskyblue; color: white;">
                         <th style="text-align: center;">Query Id</th>
                         <th style="text-align: center;">Query Date</th>
                         <th style="text-align: center;">Student ID</th>
                         <th style="text-align: center;">Student Name</th>
                         <th style="text-align: center;">Query Type</th>
                         <th style="text-align: center;">Query Description</th>
                         <th style="text-align: center;">Action</th>
                         <th style="text-align: center;">Reply</th>
                     </tr>
                 </thead>

                 <tbody id="myTable">
                     <?php
            $sdata = mysqli_query($con,"SELECT * FROM query ORDER BY qid desc LIMIT 10");

            while ($row = mysqli_fetch_assoc($sdata)) {
                ?>
                     <tr>
                         <td style="text-align: center;"><?php echo $row['qid']?></td>
                         <td style="text-align: center;"><?php echo $row['qdate']?></td>
                         <td style="text-align: center;"><?php echo $row['uid']?></td>
                         <td style="text-align: center;"><?php echo $row['uname']?></td>
                         <td style="text-align: center;"><?php echo $row['qtype']?></td>
                         <td style="text-align: center;"><?php echo $row['briefquery']?></td>
                         <td style="text-align: center;">
                             <a href="query.php?id=<?php echo $row['qid']?>"><span
                                     class="glyphicon glyphicon-trash"></span>
                                 Delete
                             </a>
                         </td>
                         <td style="text-align: center;">
                             <div class="well-sm">
                                 <h3 align="center">Reply For Querys</h3>
                                 <hr style="border: 1px solid goldenrod;margin-top: 0;">
                                 <form method="post" action="">
                                     <input type="hidden" name="qid" value="<?php echo $row['qid']?>">
                                     <input type="hidden" name="qdate" value="<?php echo $row['qdate']?>">
                                     <input type="hidden" name="qtype" value="<?php echo $row['qtype']?>">
                                     <input type="hidden" name="uid" value="<?php echo $row['uid']?>">
                                     <input type="hidden" name="uname" value="<?php echo $row['uname']?>">
                                     <input type="hidden" name="briefquery" value="<?php echo $row['briefquery']?>">
                                     <label>Remark for Query</label>
                                     <textarea class="form-control" name="reply"
                                         placeholder="Enter Query Reply"></textarea>
                                     <br>
                                     <br><br>
                                     <button type="submit" class="btn btn-block btn-primary">Send Reply</button>
                                 </form>
                             </div>
                         </td>
                     </tr>
                     <?php
            }
            ?>
                 </tbody>

             </table>
         </div>
	</div>


</body>
</html>