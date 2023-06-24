<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer | Simpan Maklumat Register</title>
</head>

<body>
	<?php
	include "db_connect.php";
	
	$name= $_POST["name"];
	$email = $_POST["email"];
	$password= $_POST["password_1"];
	$count = 0;

	$sqli= "SELECT * FROM customer";
	$qid = mysqli_query($connect, $sqli);
	while($row = mysqli_fetch_array($qid))
	{
		if($row['cust_email'] === $email)
		$count = 1;
	}

	if ($count==1)
	{
		?>
		<script type="text/javascript">alert("Email Already Exists");window.history.go(-1);</script>
		<?php
		}
		else
		{
			
			$sql= "INSERT INTO customer (cust_name, cust_email, cust_password) VALUES ('$name', '$email', '$password')";
			$sendsql= mysqli_query($connect, $sql); ?>
			<html><script type="text/javascript">alert("Registration Successful!");window.location="loginCustomer.php";</script></html>
		<?php
	}
	
	
	?>
</body>
</html>