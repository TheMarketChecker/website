<?php
include_once("assets/helpers/php_functions.php");
include_once("assets/database/db_connect.php");
session_start();
if(isset($_SESSION['email'])){	
	header("Location:logged_in.php");
}
if(isset($_POST['login-submit'])){
	$email = test_input($_POST['email']);
	$password = test_input($_POST['password']);

	$query = "SELECT * FROM `userinfo` WHERE `email` = '$email' AND `password` = md5('$password') LIMIT 1";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	if($count == 1){
		$_SESSION['email'] = $email;
		session_write_close();
    	header('Refresh: 1; logged_in.php');
		$successMessage = "You've successfully logged in";
	}
	else{
		$errorMessage = "The email or password is incorrect";
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<?php include_once('assets/helpers/head.php'); ?>
</head>


<body>

	<?php include_once('assets/helpers/navigation.php'); ?>

	<div class="jumbotron">
	<div class="container">

	<div class="col-lg-12">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<?php if(isset($successMessage)){ ?>
			<div class="alert alert-success"><i class="fa fa-checkmark"></i>&nbsp;&nbsp;<?php echo $successMessage; ?></div>
			<?php }else if(isset($errorMessage)) { ?>
			<div class="alert alert-danger"><i class="fa fa-exclamation"></i>&nbsp;&nbsp;<?php echo $errorMessage; ?></div>
			<?php } ?>
			<div class="well">
				<h3 style="color:#CCC">Login<h3>
				<form method="post" action="login.php">
					<div class="input-group login-input">
						<input type="text" class="form-control" size="50" placeholder="Email" name="email" required>
							<span class="input-group-btn">
								<div  class="btn input-sheild" > <i style="color:#777;" class="fa fa-user" aria-hidden="true"></i></div>
						 	</span>
					</div>
					<div class="walk"></div>
					<div class="input-group login-input">
						<input type="password" class="form-control" size="50" placeholder="Password" name="password" required>
							<span class="input-group-btn">
								<div  class="btn input-sheild"> <i style="color:#777;" class="fa fa-lock" aria-hidden="true"></i></div>
						 	</span>
					</div>
					<div class="walk"></div>
					<button class="form-control btn btn-success" type="submit" name="login-submit">Login</button><br /><br />
				</form>
				<a href="forgot_pass.php"><span class="tiny">Forgot password?</span></a>
			</div>
			<div class="col-lg-12">
				<div class="col-lg-3"></div>
				<div class="col-lg-4">
					<div class="g-signin2" data-onsuccess="onSignIn"></div>
				</div>
				<div class="col-lg-2"></div>
			</div>
		</div>
		<div class="col-lg-4"></div>
	</div>


	</div> <!-- container -->
	</div> <!-- jumbotron End -->


</body>


</html>