<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title> HYGR </title>  
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
			$sql = "select * from product where id = '$cid'";
			$result = mysqli_query($dbc,$sql);
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
				<a href="order.php">
					<img width="50%" src="images/logo_hygr.jpeg" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="order.php"> Dashboard </a></li>
						<li class="nav-item"><a class="nav-link" href="listMenu.php"> Product List</a></li>
						<li class="nav-item active"><a class="nav-link"> Update Product </a></li>
						
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
						<h2> Update Product </h2>
					</div>
				</div>
			</div>
					<form name="Form1"  enctype="multipart/form-data" action="updateMenudetails.php?id=<?php echo $cid;?>" method="POST" onSubmit="return(validate())">
						<center>
						<table width="90%" style="table-layout: fixed;">
							<tr>
								<td align="center" width="20%" height="90px"><b> Product Name</b></td>
								<td width="">
									<div>
										<input type="text" class="form-control" name="product_name" value='<?=$row['product_name'];?>' placeholder="Menu Name" required data-error="Please enter menu name">

									</div>
								</td>
								<td align="center" width="20%"><b>Product Price</b></td>
								<td>
									<input type="number" placeholder="Product Price" class="form-control" name="product_price" value='<?=$row['product_price'];?>' required data-error="Please enter menu price">
								</td>
							</tr>

							<tr>
								<td align="center" width="20%" height="90px"><b>Category</b></td>
								<td>
									<div>
										<select name="product_category">
											<option disabled selected value=""> Category </option>
											<option value="Lips">Lips</option>
											<option value="Deodorant">Deodorant</option>
											<option value="Face">Face</option>
											<option value="Hair">Hair</option>
										</select>
									</div> 
								</td>
								<td align="center"><b> Product Details </b></td>
								<td>
									<textarea placeholder="Product Details" class="form-control" name="product_details" style="height:100px" required data-error="Please enter product details"> <?php echo $row['product_details']; ?></textarea>
								</td>
							</tr>
							<tr>
								<td align = "center" height = "90px"> <b> Product Image </b> </td>
								<td>
									<input type="file" name="image" required data-error= "Please enter product image" accept="image/*">
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