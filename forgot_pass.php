<?php
include_once("assets/helpers/php_functions.php");
include_once("assets/database/db_connect.php");

$strPassCheck = "";

$get_username = "";
	
session_start();

if(isset($_POST['change-pass'])){ 

	$email = test_input($_POST['email']);
	$password1 = test_input($_POST['password1']);
	$password2 = test_input($_POST['password2']);
	
	
	if($password1 && $password2 == null)
		$strPassCheck = "Please fill the fields";
	else if($password1 == $password2){
		$strPassCheck = "Password match";
	}else if($password1 != $password2){
		$strPassCheck = "Password doesn't match";
	}

	if($password1 == $password2){

		$passLen = strlen($password1);
		
		$passLast = $password1[$passLen-1];
		
		$censoredPass = $password1[0];
		for($i = 1; $i < $passLen - 1; $i++){
			$censoredPass .= '*';
		}
		$censoredPass .= $password1[strlen($password1)-1];
		


		$get_query = "SELECT `username` FROM `userinfo` WHERE `email` = '$email' LIMIT 1";
		$result = mysql_query($get_query);
		$count = mysql_num_fields($result);
		if($count == 1){
			$get_username = mysqli_fetch_array($result)['username'];
		}

	$query = "UPDATE userinfo set password = md5('$password1') where email like '$email' ";
	mysql_query($query);
	/* Sending Mail to User */
		$to = $email; 
		$subject = 'MarketChecker - Password Update';
		$message = '
			Hello $get_username,

			You\'ve recently changed your account credentials:

			---------
			Password: $censoredPass
			---------

			Thank you!

		';
		$headers = 'From:noreply@marketchecker.tk';
		mail($to, $subject,$message,$headers);

	/* End Sending Mail to User */
	header('Refresh: 1; ,login.php');
}
	
	
			
	/*$count = mysql_num_rows($result);
	if($count == 1){
		$_SESSION['email'] = $email;
		session_write_close();
    	header('Refresh: 1; logged_in.php');
		$successMessage = "You've successfully logged in";
	}
	else{
		$errorMessage = "The username or password is incorrect";
	}*/
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
				<h3 style="color:#CCC">Change Password<h3>
				<form method="post" action="forgot_pass.php">
					<div class="input-group login-input">
						<input type="text" class="form-control" size="50" placeholder="Email" name="email" required>
							<span class="input-group-btn">
								<div  class="btn input-sheild" > <i style="color:#777;" class="fa fa-user" aria-hidden="true"></i></div>
						 	</span>
					</div>
					<div class="walk"></div>
					<div class="input-group login-input">
						<input type="password" class="form-control p1" size="50" placeholder="Password" name="password1" required>
							<span class="input-group-btn">
								<div  class="btn input-sheild"> <i style="color:#777;" class="fa fa-lock" aria-hidden="true"></i></div>
						 	</span>
					</div>
					<div class="walk"></div>
					<div class="input-group login-input">
						<input type="password" class="form-control p2" size="50" placeholder="Repeat Password" name="password2" required>
							<span class="input-group-btn">
								<div  class="btn input-sheild"> <i style="color:#777;" class="fa fa-lock" aria-hidden="true"></i></div>
						 	</span>
					</div>
					<div class="walk"></div>
					<button class="form-control btn btn-success" type="submit" name="change-pass">Change</button><br /><br />
				</form>
				<span class="tiny"> <?php echo $strPassCheck; ?></span>
			</div>
			<div class="col-lg-12">
				<div class="col-lg-3"></div>
				<div class="col-lg-4">
					<div class="g-signin2" data-onsuccess="onSignIn"></div>
				</div>
				<div class="col-lg-2"></div>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>


	</div> <!-- container -->
	</div> <!-- jumbotron End -->


</body>


</html>