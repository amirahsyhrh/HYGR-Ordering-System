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
<html lang="en">
<head>
<title>PHP Shopping Cart</title>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
    div.card{
        border-color: gray;
        opacity: 100%;
    }
</style>
<body>
<div class="container">
    <h1>PRODUCTS</h1>
	
    <!-- Cart basket -->
    <div class="cart-view" align="right">
        <a href="viewCart.php" title="View Cart"><i class="fa fa-shopping-cart" style="font-size:36px;color: #d0a772"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':0; ?>)</a>
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
                <p class="card-text"><?php echo $row["product_details"]; ?></p>
                <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="btn btn-primary">Add to Cart</a>
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
</body>
</html>