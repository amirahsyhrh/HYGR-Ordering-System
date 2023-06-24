<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
</head>
			<script type = "text/javascript">
		function validate()
		{
			if (document.myForm.password_2.value == "")
				{
					alert ("Enter the Confirmation Password!");
					document.myForm.password_2.focus();
					return false;
				}
			
			if (document.myForm.password_1.value != document.myForm.password_2.value)
				{
					alert ("Password and Confirmation Password are not same!");
					document.myForm.password_1.focus();
					document.myForm.password_2.focus();
					return false;
				}

			   
			return (true);

		}
		
		
	</script>
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<style>
	
body{
	font-family:Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;
	background-image: url('images/footer-bg.jpg');
	font-size: 14px;
	min-height: 90vh;
	background-position: center;
  	background-repeat: no-repeat;
  	background-size: cover;
}
 
.container{
	border-radius: 15px;
	width:50%;
	margin:4% auto;
	border:5px solid #B9742D;
	background:#FFFFFF;
}
 
.container-dashboard{
	width:90%;
	border:5px solid #B9742D;
	background:#FFFFFF;
	padding:10px;
	margin: 20px;
}
 
.field-container{
	margin:10px;
	width:400px;
}
	
h1{
	text-align:center;
	line-height:30px;
	font-size:24px;
	color:#000000;
}
 
label{
	display:block;
	padding-bottom:5px;
	color:black;
	font-weight:500;
	
}
 
input[type=text],input[type=password]{
	border:1px solid #eeeeee;
	width:100%;
	height:30px;
	padding-left:4px;	
}
 
button{
	font-weight: bold;
	background:#B9742D;
	border:4px solid #B9742D;
	color:#ffffff;
	margin:10px 0px;
	padding:5px;
	width: 70px;
	border-radius: 10px;
	color: whitesmoke;
}
 
button:hover{
	background:#333333;
	border:1px solid #333333;
}
 
 
.error-msg{
	border:1px solid #ee0000;
	background:#ee0000;
	color:#ffffff;
	padding:2px;
	font-size:13px;
}
 
.success-msg{
	border:1px solid #0ebc6f;
	background:#0ebc6f;
	color:#ffffff;
	font-size:13px;
	padding:2px;
}
 
 
.user-name{
	color:#ee0000;
}
 
.logout-link{
	margin-top:10px;
	display:block;
	background:#061e5a;
	border:1px solid #061e5a;
	color:#ffffff;
	width:48px;
	padding:5px;
	text-decoration:none;
	font-size:13px;
}
	.txt1 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #999999;
  line-height: 1.5;
}

.txt2 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #061e5a;
  line-height: 1.5;
}
	input[type=text] {
  width: 110%;
  padding: 12px 20px;
  margin: 3px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
	input[type=password], input[type=email] {
  width: 110%;
  padding: 12px 20px;
  margin: 3px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}	
	</style>
	

<body>
<div class="container" >
		<h1 style="font-size: 20px">Registration</h1>
		<form name= "myForm" action="register_check.php" method="post" onSubmit="return(validate())">
		<div>
			<center>
					<div>
						<img width="50%" src="images/logoo.png"> </img>
					</div>
			</center>
			
		  <div class="field-container">
		  	<div class="contentcontainer med left" style="margin-left: 70px;">
		  		<label>Full name</label>
		  		<input type="text" name="name" required placeholder="Full name">
			 </div>
		  </div>

		  <div class="field-container">
		  	<div class="contentcontainer med left" style="margin-left: 70px;">
		  		<label>Email</label>
		  		<input type="Email" name="email" required placeholder="Email (example@gmail.com)">
			 </div>
		  </div>

		  <div class="field-container">
			<div class="contentcontainer med left" style="margin-left: 70px;">
				<label>Password</label>
				<input type="password" name="password_1" required placeholder="Password">
			</div>
				
		  </div>

		  <div class="field-container">
		  	<div class="contentcontainer med left" style="margin-left: 70px;">
		  		<label>Confirmation Password</label>
		  		<input type="password" name="password_2" required placeholder="Confirmation Password">
			</div>	
		  </div>

		  <div class="field-container" style="margin-left: 80px;">
		  	<button type="submit" name="submit">Register</button>
			<button type="reset" name="submit">Cancel</button>
			</div>
			
			
		</form>
				<ul >
				<li class="m-b-8">
					<span class="txt1">
								Already Have An Account?
					</span>

					<a href="loginCustomer.php" class="txt2">
						Log In!
					</a>
				</li>

					</ul>
	</div>
</body>
</html>