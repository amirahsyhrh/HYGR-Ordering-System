<?php
$mid = $_GET['id'];
$dbc = mysqli_connect ("localhost", "root", "", "hygr");
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$sql = "DELETE FROM cart where cart_id='$mid'";
$result = mysqli_query($dbc, $sql);
if($result)
{
 mysqli_commit($dbc);
 Print '<script>alert("Item Successfuly Deleted.");</script>';
 Print '<script>window.location.assign("checkout.php");</script>';
}
else
{
 mysqli_rollback($dbc);
 Print '<script>alert("Item failed to be Deleted.");</script>';
 Print '<script>window.location.assign("checkout.php");</script>';
}
?>