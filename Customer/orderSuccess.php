<?php 
if(empty($_REQUEST['id'])){ 
    header("Location: index.php"); 
} 
$order_id = base64_decode($_REQUEST['id']); 
 
// Include the database connection file 
require_once 'dbConnect.php'; 
 
// Fetch order details from the database 
$sqlQ = "SELECT r.*, c.first_name, c.last_name, c.email, c.phone, c.address FROM orders as r LEFT JOIN customers_orderdetails as c ON c.id = r.customer_id WHERE r.id=?"; 
$stmt = $db->prepare($sqlQ); 
$stmt->bind_param("i", $db_id); 
$db_id = $order_id; 
$stmt->execute(); 
$result = $stmt->get_result(); 
 
if($result->num_rows > 0){ 
    $orderInfo = $result->fetch_assoc(); 
}else{ 
    header("Location: index.php"); 
} 
?>
        <?php
            include 'db_connect.php';
            $id=$_GET['p_id'];
            $qry = "SELECT * FROM customer WHERE cust_email = '$id'";
            $qid = mysqli_query($connect,$qry);
            $row = mysqli_fetch_array($qid);
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>HYGR</title>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <br><br>
    <h1 style="font-size: 35px">ORDER STATUS</h1>
    <div class="col-12">
        <?php if(!empty($orderInfo)){ ?>
            <div class="col-md-12">
                <div class="alert alert-success">Your order has been placed successfully.</div>
            </div>
			
            <!-- Order status & shipping info -->
            
                <div class="hdr">Order Info</div>
                <p><b>Reference ID:</b> #<?php echo $orderInfo['id']; ?></p>
                <p><b>Total:</b> <?php echo "RM".$orderInfo['grand_total']; ?></p>
                <p><b>Placed On:</b> <?php echo $orderInfo['created']; ?></p>
                <p><b>Buyer Name:</b> <?php echo $orderInfo['first_name'].' '.$orderInfo['last_name']; ?></p>
                <p><b>Email:</b> <?php echo $orderInfo['email']; ?></p>
                <p><b>Phone:</b> <?php echo $orderInfo['phone']; ?></p>
                <p><b>Address:</b> <?php echo $orderInfo['address']; ?></p>
            
			
            <!-- Order items -->
            <div class="row col-lg-12">
                <table class="table table-hover cart">
                    <thead>
                        <tr>
                            
                            <th width="45%">Product</th>
                            <th width="15%">Price</th>
                            <th width="10%">QTY</th>
                            <th width="20%">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                    // Get order items from the database 
                    $sqlQ = "SELECT i.*, p.product_name, p.product_price FROM order_items as i LEFT JOIN product as p ON p.id = i.product_id WHERE i.order_id=?"; 
                    $stmt = $db->prepare($sqlQ); 
                    $stmt->bind_param("i", $db_id); 
                    $db_id = $order_id; 
                    $stmt->execute(); 
                    $result = $stmt->get_result(); 
                     
                    if($result->num_rows > 0){  
                        while($item = $result->fetch_assoc()){ 
                            $price = $item["product_price"]; 
                            $quantity = $item["quantity"]; 
                            $sub_total = ($price*$quantity); 
                            //$proImg = !empty($item["image"])?'images/products/'.$item["image"]:'images/demo-img.png'; 
                    ?>
                            <tr>
                                
                                <td><?php echo $item["product_name"]; ?></td>
                                <td><?php echo "RM".$price; ?></td>
                                <td><?php echo $quantity; ?></td>
                            <td><?php echo "RM".$sub_total; ?></td>
                        </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="menu.php?id=<?php echo $id ?>" class="btn btn-block btn-primary"><i class="ialeft"></i>Continue Shopping</a>
                    </div>
                </div>
            </div>
            <br><br>
        <?php }else{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Your order submission failed!</div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>