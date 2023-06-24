<?php 
// Include the database configuration file  
require_once 'db_connect.php'; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 

        $name = $_POST["product_name"];//step 2
		$price = $_POST["product_price"];
		$details = $_POST["product_details"];
		$category = $_POST["product_category"];

    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $connect->query("INSERT into product (product_name, product_price, product_category, product_details, product_image) VALUES ('$name', '$price', '$category', '$details', '$imgContent')"); 
             
            if($insert){ 
                $status = 'success'; 
                //display message box Record Been Added
				print '<script>alert("Product Has Been Added!");</script>';
				//go to addMenu.php page
				print '<script>window.location.assign("addMenu.php");</script>'; 
            }else{
            	print '<script>alert("File upload failed, please try again."); window.history.go(-1);</script>';
            }  
        }else{
        	print '<script>alert("Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload."); window.history.go(-1);</script>'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>