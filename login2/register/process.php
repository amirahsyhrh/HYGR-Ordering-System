<?php
			
		require_once('db-config.php');

		$db = new DBController();
		$conn = $db->connect();


		// check if email is already taken
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email_check']) && $_POST['email_check'] == 1) {

			// validate email

			$cust_email = mysqli_real_escape_string($conn, $_POST['cust_email']);

			$sqlcheck = "SELECT cust_email FROM customer WHERE cust_email = '$cust_email' ";

			$checkResult = $conn->query($sqlcheck);

			// check if email already taken
			if($checkResult->num_rows > 0) {
				echo "Sorry! email has already taken. Please try another.";
			}
		}


		// save records into the database
		elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save']) && $_POST['save'] == 1) {

			$cust_name 		    = 	$_POST['cust_name'];
			$cust_email 		= 	$_POST['cust_email'];
			$cust_password      = 	$_POST['cust_password'];
			$save 		        = 	$_POST['save'];

			// insert into table

			$sql = "INSERT INTO customer (cust_name, cust_email, cust_password) VALUES ('$cust_name', '$cust_email', '$cust_password') ";

			$result = $conn->query($sql);
			
			if($result) {
				?>
				<script type="text/javascript">alert("Registration Successful");;window.location ="../loginStaff.php";</script>
	<?php
			}

			else {
				?>
				<script type="text/javascript">alert("Whoops! some error encountered. Please try again.");</script>
	<?php
			}
		}	

?>