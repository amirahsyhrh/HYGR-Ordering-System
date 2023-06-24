<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check for Login</title>
</head>

<body>
	<?php
	require_once('db-config.php');

		$db = new DBController();
		$conn = $db->connect();
	
	$username = $_POST['email'];
	$password =	$_POST['password'];
	$count = 0;
	$sql_cust= "SELECT * FROM customer";
	$sql_admin = "SELECT * FROM admin";
	$qa_admin = mysqli_query($conn, $sql_admin);
	$qi_cust = mysqli_query($conn, $sql_cust);
	while($row = mysqli_fetch_array($qi_cust))
	{
		if($row['cust_email'] === $username AND $row['cust_password'] === $password)
			$count = 1;
	}
		while($row = mysqli_fetch_array($qa_admin))
	{
		if($row['admin_email'] === $username AND $row['admin_password'] === $password)
			$count = 2;
	}
	
	if($count==1)
	{
		?>
		<script type="text/javascript">alert("Log In Successful");window.location ="../Customer/homepage2.php?id=<?php print $username ?>";</script>
	<?php
	}
		if($count==2)
	{
		?>
		<script type="text/javascript">alert("Log In Successful");window.location ="../Admin/order.php?id=<?php print $username ?>";</script>
	<?php
	}
	else{
		
	?>
	
			<script type="text/javascript">alert("Wrong Username/Password");window.history.go(-1)</script>
		<?php	
	}
	?>
</body>
</html>