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
<script type = "text/javascript">
	function validate()
	{
	if (document.Form1.product_category.value =="")
		{
			alert ("Please Select Category!");
			document.Form1.product_category.focus();
			return false;
		}

	return (true);

	}


</script>
<style type="text/css">

	input[type=text],input[type=number], select {
	width: 100%;
	padding: 12px 20px;
	margin: 3px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
	color: black;
	}

	body
	{
		color: black;
	}
	table
	{
		font-size: 20px;
	}

	select
	{
		font-size: 15px;
	}
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
		color: white;
	}
	
	button:hover
	{
		background:#f5d4a9;
		border:1px solid #f5d4a9;
		cursor: pointer;
		color: black;
	}
	.button_save{
		background:#d0a772;
		border:1px solid #d0a772;
		color:#ffffff;
		margin:10px 0px;
		padding:10px;
		width: 14%;
		border-radius: 5px;
		color: whitesmoke;
		font-size:18px;
		color: white;
		font-weight: bold;

	}
		.button_save:hover
	{
		background:#f5d4a9;
		border:1px solid #f5d4a9;
		color: black;
	}
</style>

<?php
		$cid = $_GET['id'];
		// Connection to the server and datbase
		$dbc = mysqli_connect ("localhost","root","","hygr");
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: ".mysqli_connect_error();
		}
			$sqltry = "select * from `customers_orderdetails` where id = '$cid'";
			$result = mysqli_query($dbc,$sqltry);
			// to display the details error
		if (false === $result)
		{
			echo mysql_error();
		}
			$row = mysqli_fetch_assoc($result)
?>
<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a href="index.html">
					<img width="25%" src="images/logoo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="order.php"> Dashboard </a></li>
						<li class="nav-item"><a class="nav-link" href="listMenu.php"> Product List</a></li>
						<li class="nav-item active"><a class="nav-link">Status </a></li>
						
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	<br><br><br><br><br><br>
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2> Update Transaction Status </h2>
					</div>
				</div>
			</div>
					<form name="Form1"  enctype="multipart/form-data" action="updateOrderdetails.php?id=<?php echo $cid;?>" method="POST" onSubmit="return(validate())">
						<center>
						<table width="90%" style="table-layout: fixed;">
							<tr>
								<?php
						$id = $row["id"];
						$sqll = "SELECT P.product_name, C.quantity, R.grand_total FROM product P JOIN order_items C ON (C.product_id = P.id) JOIN orders R ON (C.order_id=R.id) JOIN customers_orderdetails U ON (R.customer_id=U.id) WHERE R.customer_id = $cid;";
						$result2 = mysqli_query($dbc, $sqll);
						$cdetails = "";
						$ctotalprice = 0;
						while($row2 = mysqli_fetch_assoc($result2))
						{
							$cdetails .= $row2["product_name"] . "(" . $row2["quantity"] . ")" .", ";
							$ctotalprice = $row2["grand_total"];
						}
					?>
								<td align="center" width="20%" height="90px"><b>ID</b></td>
								<td width="">
									<div>
										<input type="text" class="form-control" name="order_id" value='<?=$row['id'];?>' placeholder="Order ID" disabled>

									</div>
								</td>
								<td align="center" width="20%"><b>Name</b></td>
								<td>
									<input type="text" placeholder="Full Name" class="form-control" name="order_fullname" value='<?=$row["first_name"]." " .$row["last_name"];?>' disabled>
								</td>
							</tr>

							<tr>
								<td align="center" width="20%" height="90px"><b>Total Payment</b></td>
								<td width="">
									<div>
										<input type="text" class="form-control" name="order_totalpayment" value='<?= $ctotalprice;?>' disabled>

									</div>
								</td>
								<td align="center" width="20%"><b>Address</b></td>
								<td>
									<textarea placeholder="Product Details" class="form-control" name="product_details" style="height:100px" required data-error="Please enter product details" disabled=""> <?php echo $row['address']; ?></textarea>
								</td>
							</tr>

							<tr>
								<td align="center" width="20%" height="90px"><b>Phone Number</b></td>
								<td width="">
									<div>
										<input type="number" class="form-control" name="order_phonenumber" value='<?=$row['phone'];?>' disabled>

									</div>
								</td>
								<td align="center" width="20%"><b>Email</b></td>
								<td>
									<input type="text" placeholder="order_email" class="form-control" name="order_email" value='<?=$row['email'];?>' disabled>
								</td>
							</tr>

							<tr>
								<td align="center" width="20%" height="90px"><b>Order Details</b></td>
								<td width="">
									<div>
										<textarea placeholder="Product Details" class="form-control" name="product_details" style="height:100px" required data-error="Please enter product details" disabled> <?php echo $cdetails; ?></textarea>
									</div>
								</td>
								<td align="center" width="20%"><b>Order Created</b></td>
								<td>
									<input type="text" placeholder="order_notes" class="form-control" name="order_notes" value='<?=$row['created'];?>' disabled>
								</td>
							</tr>

							<tr>
								<td align="center" width="20%"><b>Status</b></td>
								<td><br>
									<input type="radio" name="order_status" value="Processing" <?php if($row['status']== 'Processing'){echo"checked";}?>/>Processing<br>
									<input type="radio" name="order_status" value="Shipped" <?php if($row['status']== 'Shipped'){echo"checked";}?>/>Shipped<br>
								</td>
							</tr>
						</table>
						<br>
						<div class="field-container">
							<button type="submit" name="submit"><b>Update</b></button>
						</div>

						</center>

						<br>

					</form>

	<!-- End Contact -->
	<br>
	
	
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