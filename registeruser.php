<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title>E-TUTOR PORTAL </title>


<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>


	
<div>
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="checkregisteruser.php" method="POST">
			
					<span class="login100-form-title p-b-26">
						E-Tutor Portal
					</span>
					
					<div class="wrap-input100">
						<input class="input100" type="text" name="name" required >
						<span class="focus-input100" data-placeholder="Name"></span>
					</div>
				
					<div class="wrap-input100 validate-input" data-validate = "xxx@xxx.xxx">
						<input class="input100" type="text" name="email" required>
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" required>
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password2" required>
						<span class="focus-input100" data-placeholder="Confirm Password"></span>
					</div>
					
					<div class="wrap-input100">
						<select class="inputform" name="gender" id="gender">
							<option value="0">Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>

						</select>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="text" name="age" required>
						<span class="focus-input100" data-placeholder="Age:"></span>
					</div>
					
					<div class="wrap-input100">
						<input class="input100" type="text" name="mobile" required>
						<span class="focus-input100" data-placeholder="Mobile No:"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Register
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Already Registered?
						</span>

						<a class="txt2" href="login.php">
							Login here
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>

	<script src="js/main.js"></script>



</body>
</html>