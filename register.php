	<?php
	require'config/config.php';
	require'includes/form_handlers/register_handler.php';
	require'includes/form_handlers/login_handler.php';
	//Declaring Variable to prevent errors
	?>
	 <html>
	 <head>
	 	<title>
	 		This is a social media website
	 	</title>
	 	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="assets/js/register.js"></script>
	 </head>

	 <body>
	 	


	 	<?php

	 		if(isset($_POST['register_button'])){

	 			echo'
	 			<script>

	 			$(document).ready(function(){
	 				$(".first").hide();
	 				$(".second").show();



	 				});
	 			

	 			</script>';

	 		}
	 		
	 		?>


	<div class="wrapper">

		<div class="login_box">
					<div class="login_header">
			<h1> Infinity Feed</h1>
			Login or Join with us
		</div>

		<div class="first">
			
					 	<form action="register.php" method="POST">
		 		<input type="email" name="log_email" placeholder="Email Address" value="<?php
		 		 if(isset($_SESSION['log_email'])){
		 		 	echo $_SESSION['log_email']; }?>"><br>
		 		<input type="password" name="log_password" placeholder="password"><br>
		 		<?php if(in_array("Email or Password was incorrect", $error_array)){echo "Email or Password was incorrect"; } ?><br>
		 		<input type="submit" name="login_button" value="Login"><br>
		 		<a href="#" id="signup" class="signup"> Need an Account ? Register here !</a>

	 		

	 	</form>

		</div>

	<div class="second">
	 	<form action="register.php" method="POST">

	 		<input type="text" name="reg_fname" placeholder="First Name" value="<?php
	 		 if(isset($_SESSION['reg_fname'])){
	 		 	echo $_SESSION['reg_fname']; }?>" required ><br>

	 		 	<?php if(in_array("first name must between 2 and 25 characters", $error_array)) echo"first name must between 2 and 25 characters<br>";?>

	 		<input type="text" name="reg_lname" placeholder="last Name" value="<?php
	 		 if(isset($_SESSION['reg_lname'])){
	 		 	echo $_SESSION['reg_lname']; }?>" required ><br>

	 		 	 		 	<?php if(in_array("last name must between 2 and 25 characters", $error_array)) echo"last name must between 2 and 25 characters<br>";?>


	 		<input type="email" name="reg_email" placeholder="First email" value="<?php
	 		 if(isset($_SESSION['reg_email'])){
	 		 	echo $_SESSION['reg_email']; }?>" required ><br>
	 		 	 		 	<?php if(in_array("Email is already in use", $error_array)) echo"Email is already in use<br>";?>

	 		<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
	 		 if(isset($_SESSION['reg_email2'])){
	 		 	echo $_SESSION['reg_email2']; }?>" required ><br>

	 		 	 		 	<?php if(in_array("Email is already in use", $error_array)) echo"Email is already in use<br>";?>
	 		 	 		 	<?php if(in_array("invalid Email format", $error_array)) echo"invalid Email format<br>";?>
	 						<?php if(in_array("invalid Email format", $error_array)) echo"invalid Email format<br>";?>
							<?php if(in_array("mails don't match", $error_array)) echo"mails don't match<br>";?>
	 					
	 		<input type="password" name="reg_password" placeholder="password" value="<?php
	 		 if(isset($_SESSION[' reg_password'])){
	 		 	echo $_SESSION['reg_password']; }?>" required ><br>

	 		 	 		 	 		 	<?php if(in_array("You password can only contain english characters or numbers", $error_array)) echo"You password can only contain english characters or numbers<br>";?>


	 		<input type="password" name="reg_password2" placeholder="Confirm password" value="<?php
	 		 if(isset($_SESSION['reg_password2'])){
	 		 	echo $_SESSION['reg_password2']; }?>" required ><br>

	 		 	 		 	 		 	 <?php if(in_array("passwords do not match", $error_array)) echo"passwords do not match<br>";?>
	 		 	 		 	 		 	  <?php if(in_array("you password must be between 5 and 30 characters", $error_array)) echo"you password must be between 5 and 30 characters<br>";?>
	 		<input type="submit" name="register_button" value="register">

	 		<?php if(in_array("<span style='color:#14C800'>You're all set to go</span></br>", $error_array)) echo"<span style='color:#14C800'>You're all set to go</span></br>";?><br>
	 		<a href="#" id="signin" class="signup"> Already Have an Account? Sign in here !</a>


	 	
	 	</form>
	 </div>
	 </div>
	 </div>
	 	<a href="register.php"> register</a>
	 </body>
	 </html>


