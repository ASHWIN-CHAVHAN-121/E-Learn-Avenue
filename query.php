<?php
session_start();
include('connect.php');
if (empty($_SESSION['id'])) {
    header('location:index.php');
}
if (isset($_POST['upload'])) {
    $qdate = date('Y-m-d');
    $uid = $_POST['uid'];
    $uname = $_POST['uname'];
    $qtype = $_POST['type'];
    $briefquery = $_POST['description'];

    mysqli_query($con, "INSERT INTO query(qdate,uid,uname,qtype,briefquery) VALUES('$qdate','$uid','$uname','$qtype','$briefquery')");

    echo "<script>
       alert ('Successfully Sent Query.....');
       window.location.href='query.php';
	</script>";
}
error_reporting(0);
$id = $_GET['id'];
mysqli_query($con, "DELETE FROM  query WHERE qid = '" . $id . "' ")

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Query Page</title>
    <?php
    include('bootcdn.php');
    ?>
</head>
<style>
    body {
        background: url(images/profile1.jpg);
        background-position: top;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    #query th {
        font-size: 16px;
        font-weight: bold;
        color: black;
        padding: 6px;
    }

    #query td {
        font-size: 12px;
        font-weight: 600;
        padding: 4px;
    }

    #query td:hover {
        background-color: lightcoral;

    }

    .col-sm-7 h3 {
        font-weight: bold;
        font-size: 16px;
        margin-top: 4px;
    }

    .col-sm-5 h3 {
        font-weight: 700;
        color: orangered;
    }

    #query-form label,
    option {
        font-weight: bold;
        font-size: 16px;

    }
</style>

<body>

    <?php
    include('header1.php');
    ?>
    <div class="container">

        <div style="margin-top: -10px;">
            <h2 class="well well-sm text-center" style="font-weight: bold;color:black;">Contact<span style="color:orangered"> us </span> </h2>
            <h4 class="text-center" style="margin-top: 0px;font-weight:bold; color:white">Share your Query below and our
                support team will respond to your Query promptly!</h4>
            <hr style="margin-top: 0; border: 1px solid orangered; ">
        </div>

        <!-- Query Form Starts -->

        <div class="row">

            <div class="col-sm-5">
                <form method="post">
                    <div class="well">
                        <center>
                            <span class="glyphicon glyphicon-question-sign" style="font-size:50px; display: block; margin: 0px auto;"></span>
                        </center>
                        <h3 class="text-center">Have a Query ? Send us now !</h3>
                        <hr style="border: 1px solid goldenrod;margin-top: 0;">

                        <input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">
                        <input type="hidden" name="uname" value="<?php echo $_SESSION['sname'] ?>">

                        <div id="query-form">
                            <label>Type of Query <span style="color:red">*</span></label>

                            <select class="form-control" name="type">
                                <option selected disabled>Select Type of Query</option>
                                <option>Query Regarding Courses</option>
                                <option>Query Regarding Price of Course</option>
                                <option>Query Regarding New Courses</option>
                                <option>Query Regarding Free Sessions </option>
                                <option>Query Regarding our Website </option>
                            </select>
                            <br>
                            <label>Enter Brief Query</label>
                            <textarea class="form-control" name="description" placeholder="Enter Query"></textarea>
                            <br>
                        </div>
                        <!-- <div class="well-sm">
                            <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
                            <div class="elfsight-app-328c2e1f-ecb1-4cac-8e17-541bce876d27" data-elfsight-app-lazy></div>
                        </div>
 -->

                        <button type="submit" name="upload" class="btn btn-block btn-primary">Send Query</button>

                    </div>
                </form>
            </div>
            <div class="col-sm-7">
                <h3 class="btn btn-success" data-toggle="collapse" data-target="#query">View History</h3>

                <!-- table starts -->
                <br> <br>
                <div class="table-responsive collapse" id="query">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="danger" id="table-heading ">
                                <th style="text-align:center;">Query Id</th>
                                <th style="text-align:center;">Query Date</th>
                                <th style="text-align:center;">Student ID</th>
                                <th style="text-align:center;">Student Name</th>
                                <th style="text-align:center;">Query Type</th>
                                <th style="text-align:center;">Query Description</th>
                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>

                        <tbody id="myTable">
                            <?php
                            $sdata = mysqli_query($con, "SELECT * FROM query WHERE uid = '" . $_SESSION['id'] . "' ORDER BY qid desc LIMIT 10");

                            while ($row = mysqli_fetch_assoc($sdata)) {

                            ?>
                                <tr>
                                    <td class="info" style="text-align:center;"><?php echo $row['qid'] ?></td>
                                    <td class="info" style="text-align:center;"><?php echo $row['qdate'] ?></td>
                                    <td class="info" style="text-align:center;"><?php echo $row['uid'] ?></td>
                                    <td class="info" style="text-align:center;"><?php echo $row['uname'] ?></td>
                                    <td class="info" style="text-align:center;"><?php echo $row['qtype'] ?></td>
                                    <td class="info" style="text-align:center;"><?php echo $row['briefquery'] ?></td>
                                    <td class="info">
                                        <a href="query.php?id=<?php echo $row['qid'] ?>"><span class="glyphicon glyphicon-trash"></span>
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



            <!-- Query Form Ends -->

            <!-- Query List Starts -->

            <div class="row">
                <div class="col-sm-3">
                </div>

                <div class="col-sm-6">


                </div>
                <!-- <div class="col-sm-3">
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
            </div> -->
            </div>


        </div>


        <!-- Query List Ends -->


    </div>


    </div>


    </div>


</body>

</html>