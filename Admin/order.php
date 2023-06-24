<!DOCTYPE html>

<html lang = "en">
<!-- Basic -->

<head>

	<meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title> HYGR </title>  
    <meta name = "keywords" content = "">
    <meta name = "description" content = "">
    <meta name = "author" content = "">

    <!-- Site Icons -->
    <link rel = "shortcut icon" href = "images/favicon.ico" type = "image/x-icon">
    <link rel = "apple-touch-icon" href = "images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel = "stylesheet" href = "css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel = "stylesheet" href = "css/style.css">    
    <!-- Responsive CSS -->
    <link rel = "stylesheet" href = "css/responsive.css">
    <!-- Custom CSS -->
    <link rel = "stylesheet" href = "css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style type="text/css">
	.btn {
  background-color: #84b0a1;
  border: none;
  color: black;
  padding: 5px 10px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn{
	background-color: #f5d4a9;
}

.btn:hover {
  background-color: #d0a772;
	color:#0A3C53;
}
#footer {
	padding: 0px 10px 0px 0px; 
	bottom: 0; 
	width: 102%; 
	/* Height of the footer*/   
		} 

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #d0a772;
    color: #ffffff;
    text-align: center;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #336862;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
/*{
	font-size: 18px;
}
td
{
	font-size: 17px;
}*/
</style>
<body>
	<!-- Start header -->
<?php
if(isset($_POST['approved']))
{
	$status="Approved";
	$id=$_POST['order_id'];
	
	 $query="UPDATE `order_status` set `status`='$status' where `order_id`='$id'";
	
	$res=mysqli_query($conn,$query);
	
	if($res){
		$_SESSION['success']="Row Updated successfully!";
		
	}else{
		echo "Data not Updated, please try again!";
	}

}
if(isset($_POST['rejected']))
{
	$status= "Rejected";
	$id=$_POST['order_id'];
	
	$query="UPDATE `order_status` set `status`='$status' where `admin_id`='$id'";
	
	$res=mysqli_query($conn,$query);
	
	if($res){
		$_SESSION['success']="Row Updated successfully!";
		
	}else{
		echo "Data not Updated, please try again!";
	}
}

?>
	<header class = "top-navbar">
		<nav class = "navbar navbar-expand-lg navbar-light bg-light">
			<div class = "container">
				<a href="order.php">
					<img width="50%" src="images/logo_hygr.jpeg" alt="" />
				</a>
				<button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class = "navbar-toggler-icon"> </span>
				</button>
				<div class = "collapse navbar-collapse" id = "navbars-rs-food">
					<ul class = "navbar-nav ml-auto">
						<li class = "nav-item active"\> <a class = "nav-link" href = "homepage.php"> Dashboard </a> </li>
						<li class = "nav-item"><a class ="nav-link" href = "listMenu.php"> Product List </a> </li>
						<li class="nav-item"><a class="nav-link" href="../index.php"> Logout </a></li>
						
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<br><br><br>
	<!-- Start Contact -->
	<div class = "contact-box">
		<div class = "container">
			<div class = "row">
				<div class = "col-lg-12">
					<div class = "heading-title text-center">
						<h2> Track Order </h2>
					</div>
				</div>
			</div>
		</div>
		<center>
		<table class="styled-table" width="95%">
			<thead>
				<tr>
					<th width="10%">ID </th>
					<th width = "20%"> Order Details (quantity) </th>
					<th width = "15%"> Total Payment</th>
					<th width = "20%"> Full Name </th>
					<th width="15%">Email</th>
					<th width="10">Status </th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
					<?php
					// Connection to the server and datbase
					$dbc = mysqli_connect ("localhost","root","","hygr");
					if (mysqli_connect_errno())
					{
						echo "Failed to connect to MySQL: ".mysqli_connect_error();
					}
						$sql = "select * from `customers_orderdetails` ORDER BY id DESC";
						$result = mysqli_query($dbc, $sql);
						while($row = mysqli_fetch_assoc($result))
							
					{
						?>
				<tr align="center">
					<?php
						$id = $row["id"];
						$sqll = "SELECT P.product_name, C.quantity, R.grand_total FROM product P JOIN order_items C ON (C.product_id = P.id) JOIN orders R ON (C.order_id=R.id) JOIN customers_orderdetails U ON (R.customer_id=U.id) WHERE R.customer_id = $id;";
						$result2 = mysqli_query($dbc, $sqll);
						$cdetails = "";
						$ctotalprice = 0;
						while($row2 = mysqli_fetch_assoc($result2))
						{
							$cdetails .= $row2["product_name"] . "(" . $row2["quantity"] . ")" . '<br>';
							$ctotalprice = $row2["grand_total"];
						}
					?>
					<td><?php echo $row["id"]; ?></td>
					<td><?php echo $cdetails?></td>
					<td>RM <?php echo $ctotalprice?></td>
					<td><?php echo $row["first_name"]." " .$row["last_name"];  ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["status"]; ?></td>
					<td>
						<a  href="updateOrder.php?id=<?php print($row['id']);?>"><button title="Edit" class="btn"><i class="fa fa-edit"></i></button></a>
					</td>
				</tr>

						<?php
					}
			?>
		</tbody>
	</table>
</center>
	</div>

	<!-- End Contact -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<a class="lightbox" href="https://www.instagram.com/hygr.my/">
						<i class="fa fa-instagram"></i>
						<div class="overflow-hidden">
							<h4>Instagram</h4>
							<p class="lead">
								www.instagram.com/hygr.my/
							</p>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a class="lightbox" href="https://www.tiktok.com/@hygr.my">
						<i class="fa fa-music"></i>
						<div class="overflow-hidden">
							<h4>Tiktok</h4>
							<p class="lead">
								www.tiktok.com/@hygr.my
							</p>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a class="lightbox" href="https://www.facebook.com/groups/hygrinternational">
						<i class="fa fa-facebook"></i>
						<div class="overflow-hidden">
							<h4>Facebook</h4>
							<p class="lead">
								www.facebook.com/groups/hygr
							</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/jquery.mapify.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>