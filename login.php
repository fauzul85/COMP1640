<?php
session_start();

//display message when user registration successfull
if(isset($_SESSION['user'])){
	echo "<script type='text/javascript'>alert('Registration Successfull. Kindly Login!');</script>";
	unset($_SESSION['user']);
}

if(isset($_SESSION['fail'])){
    echo "<script type='text/javascript'>alert('Login unsuccessful. Kindly check email or password!');</script>";
	unset($_SESSION['fail']);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Tutor Portal</title>

	<!-- these are external css library for form animation, layour design such as bootstrap -->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<!-- these are internal css library-->
	<link rel="stylesheet" type="text/css" href="css/main.css">


</head>

<body>


<div>
		<div class="container-login100">

			<div class="wrap-login100">
			<!--Login for student-->
				<form class="login100-form validate-form" action="checkloginuser.php" method="POST">

					<span class="login100-form-title p-b-26">
					STUDENT
					</span>


					<div class="wrap-input100" >
						<input class="input100" type="text" name="email" >
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 " >
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>



					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Register New Account?
						</span>

						<a class="txt2" href="registeruser.php">
							Register here
						</a>
					</div>
				</form>
			</div>

			<div class="wrap-login100" style="margin-left: 20px;">
			<!--Login for staff-->
				<form class="login100-form validate-form" action="checklogintutor.php" method="POST">

					<span class="login100-form-title p-b-26">
					TUTOR
					</span>


					<div class="wrap-input100" >
						<input class="input100" type="text" name="email" >
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 " >
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>



					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Register New Account?
						</span>

						<a class="txt2" href="registertutor.php">
							Register here
						</a>
					</div>
				</form>
			</div>

			<div class="wrap-login100" style="margin-left: 20px;">
			<!--Login for Admin-->
				<form class="login100-form validate-form" action="checkloginadmin.php" method="POST">

					<span class="login100-form-title p-b-26">
					ADMIN
					</span>


					<div class="wrap-input100 " >
						<input class="input100" type="text" name="email" >
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 " >
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>



					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Register New Account?
						</span>

						<a class="txt2" href="registeradmin.php">
							Register here
						</a>
					</div>
				</form>
			</div>

		</div>
</div>

	<!--jquery files used together for decoration of layouts and forms-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>

	<script src="js/main.js"></script>

</body>
</html>
