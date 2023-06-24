<!DOCTYPE html>
<html lang="en">
<head>
	<title>Staff | Log In</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

	<script type = "text/javascript">

		
		
	</script>
	<style>
	.login100-form-btn {
  font-family: Poppins-Medium;
  font-size: 16px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 100%;
  height: 50px;
  background-color: #18353D;
  border-radius: 25px;

  box-shadow: 0 10px 30px 0px rgba(149, 140, 168);
  -moz-box-shadow: 0 10px 30px 0px rgba(149, 140, 168);
  -webkit-box-shadow: 0 10px 30px 0px rgba(149, 140, 168);
  -o-box-shadow: 0 10px 30px 0px rgba(149, 140, 168);
  -ms-box-shadow: 0 10px 30px 0px rgba(149, 140, 168);

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login100-form-btn:hover  {
  background-color: #333333;
  box-shadow: 0 10px 30px 0px rgb(149, 140, 168);
  -moz-box-shadow: 0 10px 30px 0px rgb(149, 140, 168);
  -webkit-box-shadow: 0 10px 30px 0px rgb(149, 140, 168);
  -o-box-shadow: 0 10px 30px 0px rgb(149, 140, 168);
  -ms-box-shadow: 0 10px 30px 0px rgb(149, 140, 168);
}

	</style>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-15 p-b-2110">
				
				<form name = "myForm" method= POST action= "login_check.php" class="login100-form validate-form " onSubmit="return(validate())">
					<span class="login100-form-title p-b-30">
						LOG IN
					</span>
					<center>
					<div>
						<img width="180px" src="images/Hygr.jpeg"> </img>
					</div>
					</center>
					<div class="wrap-input100 validate-input m-b-30" data-validate="Enter Email">
						<input class="input100" type="text" name="email" placeholder="example@gmail.com">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-30" data-validate="Enter Password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Log In
						</button>
					</div>
					</form>


					<ul class="login-more p-t-20">
						<li>
							<span class="txt1">
								Not Yet Registered?
							</span>

							<a href="../login2/register/index.php" class="txt2">
								Register Here
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>