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
<script type = "text/javascript">
	function validate()
	{
	if (document.Form1.menu_category.value =="")
		{
			alert ("Please Select Category!");
			document.Form1.menu_category.focus();
			return false;
		}

	return (true);

	}


</script>
<style type = "text/css">

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
	table, th, td
	{
		font-size: 20px;
		table-layout: fixed;
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
	button[disabled]
	{
		background:#f5d4a9;
		border:1px solid #f5d4a9;
		cursor: pointer;
		color: white;
	}
	button[disabled]:hover
	{
		background:#f5d4a9;
		border:1px solid #f5d4a9;
		cursor: default;
		color: white;
	}

</style>

<body>
	<?php
			include 'db_connect.php';
			$id=$_GET['id'];
			$qry = "SELECT P.product_name, P.product_price, C.quantity, C.id FROM product P JOIN order_items C ON (C.product_id = P.id) JOIN orders R ON (C.order_id=R.id) JOIN customers_orderdetails U ON (R.customer_id=U.id) AND U.email = '$id';";
			$qid = mysqli_query($connect,$qry);
			$row = mysqli_fetch_array($qid);
	?>
	<!-- Start header -->
	<header class = "top-navbar">
		<nav class = "navbar navbar-expand-lg navbar-light bg-light">
			<div class = "container">
				<a href="homepage2.php?id=<?php echo $id ?>">
					<img width="50%" src="images/logo_hygr.jpeg" alt="" />
				</a>
				<button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbars-rs-food" aria-controls = "navbars-rs-food" aria-expanded = "false" aria-label = "Toggle navigation">
				  <span class = "navbar-toggler-icon"> </span>
				</button>

				<div class = "collapse navbar-collapse" id="navbars-rs-food">
					<ul class = "navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="homepage2.php?id=<?php echo $id ?>">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="menu.php?id=<?php echo $id ?>">Product</a></li>
						<li class="nav-item active"><a class="nav-link" href="review.php?id=<?php echo $id ?>"> Order </a></li>
						<li class="nav-item"><a class="nav-link" href="../index.php">Logout</a></li>
						
					</ul>
				</div>

			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<br><br><br><br><br><br>
			<div class = "row">
				<div class = "col-lg-12">
					<div class = "heading-title text-center">
						<h2> Order History </h2>
					</div>
				</div>
			</div>
					<?php
				
				foreach($qid as $row)
				{
				?>
					<form name = "Form1" action = "review.php?id=<?php echo $id;?>&p_id=<?php echo $row['id'];?>" method = "post" enctype="multipart/form-data" onSubmit="return(validate())">
						<center>
						<table width="70%">
							<tr>
								<td align = "center" height = "90px"> <b> Product Name </b> </td>
								<td >
									<textarea placeholder="Product Details" class="form-control" name="product_details" style="height:70px" required data-error="Please enter product details"> <?php echo $row['product_name']; ?></textarea>
								</td>
								<td align = "center" > <b> Product Price </b> </td>
								<td >
									<input name="product_price" class="form-control" required="required" type="text" value="RM <?php echo $row['product_price'];?>"disabled/>
								</td>
							</tr>

							<tr> 
								<td align = "center" height = "90px"> <b> Quantity </b> </td>
								<td>
									<input name="product_quantity" class="form-control" required="required" type="text" value="<?php echo $row['quantity'];?>"disabled/>
								</td>
								<?php
								$count= 0;
								$sql_cust= "SELECT * FROM review";
								$qa_admin = mysqli_query($connect, $sql_cust);
								while($row2 = mysqli_fetch_array($qa_admin))
								{
									if($row2['cart_id'] === $row['id'])
										$count = 1;
								}

								if($count==1)
								{//cust_page
									?>
									<td colspan="2">
										<div class="field-container" align="right">
											<button name="review" type="submit" style="width: 40%" disabled> <b> Reviewed </b> </button>
										</td>
								<?php
								}
								else
								{//admin page
									?>
									<td colspan="2">
										<div class="field-container" align="right">
											<button name="review" type="submit" style="width: 40%"> <b> Review Now! </b> </button>
									</td>
								<?php
								}
								?>
							</tr>
						</table>

						<br>
							
						</center>

					</form>
<hr style="height:2px;border-width:0;color:gray;background-color:#d0a772; width:80%">
<br>
				<?php } ?>
					

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
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"> &uarr; </a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"> </script>
	<script src="js/popper.min.js"> </script>
	<script src="js/bootstrap.min.js"> </script>

    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"> </script>
	<script src="js/images-loded.min.js"> </script>
	<script src="js/isotope.min.js"> </script>
	<script src="js/baguetteBox.min.js"> </script>
	<script src="js/jquery.mapify.js"> </script>
	<script src="js/form-validator.min.js"> </script>
    <script src="js/contact-form-script.js"> </script>
    <script src="js/custom.js"> </script>
	
</body>

</html>