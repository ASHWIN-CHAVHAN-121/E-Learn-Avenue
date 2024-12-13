<?php 
include('connect.php');
session_start();
date_default_timezone_set("Asia/Calcutta");

$productid = $_POST['product_id'];
$paymentid = $_POST['payment_id'];
$dt = date('Y-m-d h:i:s');
$amount = $_POST['amount'];
$product_title = $_POST['product_title'];
$uid = $_POST['uid'];
$uname =$_POST['uname'];


$sql = "INSERT INTO payment_orders(product_id, payment_id, added_date, amount, title,uid,uname) VALUES ('$productid', '$paymentid', '$dt', '$amount', '$product_title','$uid','$uname')";

$result = mysqli_query($con, $sql);

if ($result) {
    $_SESSION['paymentid'] = $paymentid;
    $_SESSION['amount'] = $amount;
    $_SESSION['title'] = $product_title;

    echo 'done'; // Send 'done' as response if insertion is successful
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
?>