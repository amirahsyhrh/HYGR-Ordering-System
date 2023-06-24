<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check for Login</title>
</head>

<body>
	<?php
	include "db_connect.php";
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$count = 0;
	$sqli= "SELECT * FROM admin";
	$qid = mysqli_query($connect, $sqli);
	while($row = mysqli_fetch_array($qid))
	{
		if($row['admin_email'] === $email AND $row['admin_password'] === $password)
			$count = 1;
	}

	
	if($count==1)
	{
		?>
		<script type="text/javascript">alert("Log in Successful");window.location ="order.php";</script>
	<?php
	}
	else{
		
	?>
			<script type="text/javascript">alert("Wrong Email/Password");window.history.go(-1)</script>
		<?php	
	}
	?>
</body>
</html>