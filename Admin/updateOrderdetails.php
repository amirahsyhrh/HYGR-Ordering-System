<?php
$oid = $_GET['id'];
$ostatus = $_POST['order_status'];
$dbc = mysqli_connect ("localhost", "root", "","hygr");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "update `customers_orderdetails` set `status` = '$ostatus' where `id`='$oid'";
$result = mysqli_query($dbc, $sql);
if($result)
{
mysqli_commit($dbc);
Print '<script>alert("Order is successfully updated.");</script>';
Print '<script>window.location.assign("Order.php");</script>';
}
else
{
mysqli_rollback($dbc);
Print '<script>alert("Order is failed to update.");</script>';
Print '<script>window.location.assign("updateOrder.php");</script>';
}
?>