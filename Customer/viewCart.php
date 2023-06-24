<?php 
// Include the configuration file 
require_once 'dbConnect.php'; 
 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
?>
        <?php
            include 'db_connect.php';
            $id=$_GET['id'];
            $qry = "SELECT * FROM customer WHERE cust_email = '$id'";
            $qid = mysqli_query($connect,$qry);
            $row = mysqli_fetch_array($qid);
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>HYGR</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>

<script>
function updateCartItem(obj,id){
    $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
        if(data == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>
</head>
<style type="text/css">
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
</style>
<body>
<div class="container">
    <br><br><br>
    <h1 style="font-size: 35px">SHOPPING CART</h1>
    <div class="row">
        <div class="cart">
            <div class="col-12">
                <div>
                    <center>
                    <table class="styled-table" width="130%">
                        <thead>
                            <tr>
                                <th width="25%"> <center>Image</center></th>
                                <th width="20%">Product</th>
                                <th width="20%">Price</th>
                                <th width="15%">Quantity</th>
                                <th width="20%">Total</th>
                                <th width="10%"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if($cart->total_items() > 0){ 
                            // Get cart items from session 
                            $cartItems = $cart->contents(); 
                            foreach($cartItems as $item){ 
                                //$proImg = !empty($item["image"])?'images/products/'.$item["image"]:'images/demo-img.png'; 
                        ?>
                            <tr align="center">
                                <?php echo '<td><img  src="data:image/jpeg;base64,'.base64_encode($item['image'] ).'" height="100" width="100"/></td>'; ?>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo "RM".$item["price"]; ?></td>
                                <td><input class="form-control" type="number" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')" disabled/></td>
                                <td><?php echo "RM".$item["subtotal"]; ?></td>
                                <td><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to remove cart item?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>&p_id=<?php echo $id;?>':false;" title="Remove Item"><i class="fa fa-close"></i> </button> </td>
                            </tr>
                        <?php } }else{ ?>
                            <tr><td colspan="6"><p>Your cart is empty.....</p></td>
                        <?php } ?>
                        <?php if($cart->total_items() > 0){ ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="center"><strong>Cart Total</strong></td>
                                <td align="center"><strong><?php echo "RM".$cart->total(); ?></strong></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    </center>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="menu.php?id=<?php echo $id ?>" class="btn btn-block btn-secondary"><i class="ialeft"></i>Continue Shopping</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php if($cart->total_items() > 0){ ?>
                        <a href="checkout.php?id=<?php echo $id ?>" class="btn btn-block btn-primary">Proceed to Checkout<i class="iaright"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>