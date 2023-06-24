<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>

	<!-- bootstrap cdn -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
body{
	font-family:Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;
	background-image: url('images/HYGR-2.jpg');
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
	border:5px solid #699083;
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
</style>
<body>

	<div class="container mt-5 pt-4">
		<form method="post" id="regForm">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
				<h1><strong style="text-align: center; font-size: 20px">Registration</strong></h1>
				<center>
					<div>
						<img width="35%" src="images/Hygr.jpeg"> </img>
					</div>
			</center>
					<div class="form-group">
						<label for="name"> Name <small class="text-danger">*</small></label>
							<input type="text" name="cust_name" id="cust_name" class="form-control" placeholder="Enter your name" required>

					</div>

					<div class="form-group">
						<label for="email"> Email <small class="text-danger">*</small></label>
							<input type="email" name="cust_email" id="cust_email" class="form-control" placeholder="Email (example@gmail.com)"  required>
					</div>

					<div class="form-group">
						<label for="password"> Password <small class="text-danger">*</small></label>
							<input type="password" name="cust_password" id="cust_password" class="form-control" placeholder="Enter your password" required>
					</div>

					<div class="form-group">
						<label for="c_password"> Confirm Password <small class="text-danger">*</small></label>
							<input type="password" name="c_password" id="c_password" class="form-control" placeholder="Re-enter your password" required>
					</div>

					<div class="form-group">
						<input type="submit" style="background-color:#18353D; border-color:#699083; color:white" type="button" id="savebtn" class="btn btn-success btn-md">
						<button style="background-color:#18353D; border-color:#699083; color:white" id="cncbtn" class="btn btn-success btn-md" type="reset">Reset</button>
					</div>

					<div id="result"> </div>

				</div>
			</div>
		</form>
		<ul >
				<li class="m-b-8">
					<span class="txt1">
								Already Have An Account?
					</span>

					<a href="../loginStaff.php" class="txt2">
						Log In!
					</a>
				</li>

					</ul>
	</div>


<!-- Bootstrap JS -->

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"> </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<!-- custom script js -->

<script type="text/javascript" src="./script.js"></script>

</body>
</html>