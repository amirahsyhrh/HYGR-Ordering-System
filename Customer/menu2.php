<?php 
// Include the database connection file 
require_once 'dbConnect.php'; 
 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// Fetch products from the database 
$sqlQ = "SELECT * FROM product"; 
$stmt = $db->prepare($sqlQ); 
$stmt->execute(); 
$result = $stmt->get_result(); 
?>
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
    <!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
	<link href="cart/css/style.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style type="text/css">
	th
	{
		height: 60px;
		color: black;
		font-size: 20px;
	}
	td
	{
		height: 50px;
		color: black;
		font-size: 18px;
	}
	.container
	{
		font-size: 20px;
		width: 2000px;
	}

	.btn-cart
	{
		background-color: #f5d4a9;
		border:1px solid #d0a772;
		width: 100%;
		border-radius: 4px;

	}
	.btn-cart:hover
	{
		background-color: #d0a772;
		border:1px solid #d0a772;
	}

	.input-qty
	{
		width: 50%;
		text-align: center;
	}
	.btn-action
	{
		background-color: #f5d4a9;
		border-radius: 4px;
		border: none;
		text-align: center;
		width: 80%;
		cursor: pointer;


	}

</style>
<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a href="../index.php">
					<img width="50%" src="images/logo_hygr.jpeg" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
						<li class="nav-item active"><a class="nav-link" href="menu2.php">Product</a></li>
						<li class="nav-item"><a class="nav-link" href="../login2/loginStaff.php">Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	
	<!-- Start All Pages -->

	<!-- End All Pages -->
	
	<!-- Start Menu -->
	<br><br> <br><br> <br><br>
	<div class="col-lg-12">
		<div class="heading-title text-center"> <br>
			<h1>Product</h1>
		</div>
	</div>



<div class="container">
	
    <!-- Cart basket -->
    <div class="cart-view" align="right">
        <!--<a href="viewCart.php?id=<?php echo $id ?>" title="View Cart"><i class="fa fa-shopping-cart" style="font-size:36px;color: #d0a772"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':0; ?>)</a>-->
    </div>
    <br><br>
    <!-- Product list -->
    <div class="row col-lg-12">
    <?php 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){ 
            //$proImg = !empty($row["product_image"])?'images/products/'.$row["product_image"]:'images/demo-img.png'; 
    ?>

        <div class="card" style="width: 21rem;">
            <div align="center" style="width: 100%">
                <br>
            <?php echo '<td><img  src="data:image/jpeg;base64,'.base64_encode($row['product_image'] ).'" height="150" width="150"/></td>'; ?>
        </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["product_name"]; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo "RM ".$row["product_price"]; ?></h6>
                <p class="card-text" style="font-size: 14px;" align="justify"><?php echo $row["product_details"]; ?></p>
                <!--<a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]?>&p_id=<?php echo $id;?>" class="btn btn-primary">Add to Cart</a>-->
            </div>

        </div>
        <br>
        
        <p>&emsp;</p>
    <?php } }else{ ?>
        <p>Product(s) not found.....</p>
    <?php } ?>
    </div>
    <br><br>
</div>

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
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>