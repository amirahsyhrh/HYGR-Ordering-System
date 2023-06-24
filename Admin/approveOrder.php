<?php
$mid = $_GET['id'];
$dbc = mysqli_connect ("localhost", "root", "", "hygr");
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$sql = "UPDATE `order` SET `order_status` = 'Approved' WHERE order_id='$mid'";
$result = mysqli_query($dbc, $sql);
if($result)
{
 mysqli_commit($dbc);
 Print '<script>alert("Order approved.");</script>';
 Print '<script>window.location.assign("order.php");</script>';
}
else
{
 mysqli_rollback($dbc);
 Print '<script>alert("Order failed to approve.");</script>';
 Print '<script>window.location.assign("order.php");</script>';
}
?>