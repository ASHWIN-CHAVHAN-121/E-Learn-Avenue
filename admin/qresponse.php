<?php 
session_start();
include('../connect.php');
if(empty($_SESSION['admin'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Query Response</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    include('../bootcdn.php');
    ?>
</head>

<body>
    <?php
    include('header.php');
    ?>

    <div class="container">
        <div class="well well-sm">
            <span class="glyphicon glyphicon-list-alt"></span>
            <b>Query List</b>
        </div>
        <!-- Query List Starts -->

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
                        <th style="text-align: center;">Reply</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody id="myTable">
                    <?php
            $sdata = mysqli_query($con,"SELECT * FROM qreply ORDER BY replyid desc LIMIT 50");

            while ($row = mysqli_fetch_assoc($sdata)) {
                ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $row['qid']?></td>
                        <td style="text-align: center;"><?php echo $row['qdate']?></td>
                        <td style="text-align: center;"><?php echo $row['uid']?></td>
                        <td style="text-align: center;"><?php echo $row['uname']?></td>
                        <td style="text-align: center;"><?php echo $row['qtype']?></td>
                        <td style="text-align: center;"><?php echo $row['briefquery']?></td>
                        <td style="text-align: center;"><?php echo $row['reply']?></td>
                        <td style="text-align: center;">
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

        <!-- table ends -->

        <!-- Query List Ends -->


    </div>
    </div>

</body>

</html>