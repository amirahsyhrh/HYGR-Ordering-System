<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title> Pasar Mini Muzhar </title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style type="text/css">
button
{
	background:#d0a772;
	border:1px solid #d0a772;
	color:#ffffff;
	margin:10px 0px;
	padding:10px;
	width: 14%;
	border-radius: 5px;
	color: whitesmoke;
	font-size:18px;
	color: black;
}
 
button:hover
{
	background:#f5d4a9;
	border:1px solid #f5d4a9;
}
.new-container
{
	 border: 1px solid black;
	 width: 50%;
}

textarea
{
  width: 100%;
  padding: 12px;
}
</style>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a href="homepage.php">
					<img width="25%" src="images/pasar/1.jpg" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="homepage.php"> Home </a></li>
						<li class="nav-item"><a class="nav-link" href="menu.php"> Product </a></li>
						<li><a class="nav-link" href="about.php"> About </a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1> Checkout </h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Contact -->
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2> Checkout </h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">

					<form name="form1" action="checkoutDetails.php" method="POST">
						<center>
						<table width="90%">
							<tr>
								<td align="center" width="20%" height="90px"><b> Full Name </b></td>
								<td width="">
									<div>
										<input type="text" class="form-control" name="cust_name" placeholder="Full Name" required>
									</div>
								</td>
								<td align="center" width="20%"><b> Address </b></td>

								<td>
									<textarea name="cust_address" placeholder="Address" class="form-control" style="height:100px"></textarea></td>
							</tr>

							<tr>
								<td align="center" width="20%" height="90px"><b> Phone Number </b></td>
								<td>
 									<input type="text" placeholder="Phone Number" class="form-control" name="cust_phoneno" required>
								</td>
								<td align="center"><b> Email Address </b></td>
								<td>
									<input type="email" placeholder="Email(example@gmail.com)" class="form-control" name="cust_email" required>
								</td>
							</tr>

							<tr >
								<td align="center" width="20%" height="90px"><b>Notes</b></td>
								<td>
									<textarea style="height:70px" placeholder="Notes" class="form-control" name="cust_notes" ></textarea>
								</td>
							</tr>
						</table>
						<br>

						<div class="">
							<br>
							<h1>Order Details</h1>
							<table border="1" width="60%" align="center">
								<tr align="center">
									<th>Action</th>
									<th>Menu</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Total Price</th>
								</tr>

								<?php
								include "db_connect.php";
								$ck = "";
								$total = 0;
								$sql = "select * from cart";
								$result = mysqli_query($connect, $sql);
								while($row = mysqli_fetch_assoc($result))
								{
									echo '<tr align= "center">';
									echo "<td> <a href='deletecart.php?id="     .$row["cart_id"].   "'>Delete</a> </td>";
									echo "<td>" . $row["cart_mname"]. "</td>";
									echo "<td>" . $row["cart_quantity"]. "</td>";
									echo "<td>" . $row["cart_mprice"]. "</td>";
									echo "<td>" . $row["cart_totalprice"]. "</td>";
									$total += $row["cart_totalprice"];
									echo "</tr>";
									

								}
								echo '<tr align= "center">';
								echo '<td colspan = "3">'. "Total". "</td>" ;
								echo "<td>" . $total. "</td>" ;
								echo "</tr>";

								?>

							</table>
							<br>
						</div>
						<div class="field-container">
							<button type="submit" name="submit"><b> Place Order </b></button>
							<button type="reset" name="submit"><b> Cancel </b></button>
						</div>

						</center>

						<br>           
					</form>

				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->

	<div>

		<table border="1">
		<?php
      		include "db_connect.php";
      		$query = "SELECT *FROM cart ORDER BY cart_id ASC";
      		$result = mysqli_query($connect, $query);
			$ck = "";
			if (mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result))
				{

				}
			}
		echo "</table>";
		?>
	</div>
	<br><br>
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							017-686-3973
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							MulutCafe@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							28, Jalan Bangi Avenue 6/4, Taman Bangi Avenue, 43000 Kajang, Selangor
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>We at Mulut Cafe are a team of passionate people willing to do whatever it takes to put pure, high quality food on the table of our fellow customers. With multiple cuisine from different cultures, it is bound to excite you. <a style="font-size: 15px;" href="../members.php"><u>The team</u></a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span>Closed</p>
					<p><span class="text-color">Tue-Wed :</span> 12PM - 10PM</p>
					<p><span class="text-color">Thu-Fri :</span> 12PM - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 12AM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">28, Jalan Bangi Avenue 6/4, Taman Bangi Avenue, 43000 Kajang, Selangor</p>
					<p class="lead"><a href="#">017-686-3973</a></p>
					<p><a href="#"> MulutCafe@gmail.com</a></p>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
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