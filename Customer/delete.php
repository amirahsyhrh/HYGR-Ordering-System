<?php
$connect = mysqli_connect ("localhost", "root", "", "hygr");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "DELETE FROM `cart`";
$result = mysqli_query($connect, $sql) or die ($sql);
header ("Location: homepage.php");
?>