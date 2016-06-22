<?php
include_once("assets/helpers/php_functions.php");
include_once("assets/database/db_connect.php");

$strPassCheck = "";
	
session_start();

if(isset($_POST['change-pass'])){ 

	$currentPass = test_input($_POST['curr-pass']);
	$password1 = test_input($_POST['new-pass']);
	$password2 = test_input($_POST['re-pass']);
	$email = test_input($_POST['email']);
	
	
	if($password1 && $password2 == null)
		$strPassCheck = "Please fill the fields";
	else if($password1 == $password2){
		$strPassCheck = "Password match";
	}else if($password1 != $password2){
		$strPassCheck = "Password doesn't match";
	}

	if($password1 == $password2){
	$query = "UPDATE userinfo set password = md5('$password1') where password = md5('$currentPass') and email like '$email' ";
	mysql_query($query);
	header('Refresh: 1; login.php');
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
			<div class="well">
				<h3 style="color:#CCC">Change Password<h3>
				<form method="post" action="change_password.php">
				<div class="input-group login-input">
					<input type="email" class="form-control" size="50" placeholder="Enter email" name="email" required>
					
				</div>
				<div class="walk"></div>
				<div class="input-group login-input">
					<input type="password" class="form-control" size="50" placeholder="New Password" name="new-pass" required>
					<span class="input-group-btn">
						<div  class="btn input-sheild" > <i style="color:#777;" class="fa fa-check" aria-hidden="true"></i></div>
				 	</span>
				</div>
				<div class="walk"></div>
				<div class="input-group login-input">
					<input type="password" class="form-control" size="50" placeholder="Re-enter Password" name="re-pass" required>
						<span class="input-group-btn">
							<div  class="btn input-sheild"> <i style="color:#04B404;" class="fa fa-check" aria-hidden="true"></i></div>
					 	</span>
				</div>
				<div class="walk"></div>
				<div class="input-group login-input">
					<input type="password" class="form-control" size="50" placeholder="Current Password" name="curr-pass" required>
						<span class="input-group-btn">
							<div  class="btn input-sheild"> <i style="color:#777;" class="fa fa-lock" aria-hidden="true"></i></div>
					 	</span>
				</div>
				<div class="walk"></div>
				<button class="form-control btn btn-success" name="change-pass">Change Password</button><br /><br />
				</form>
				<span class="tiny"> <?php echo $strPassCheck; ?></span>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>


	</div> <!-- container -->
	</div> <!-- jumbotron End -->


</body>


</html>