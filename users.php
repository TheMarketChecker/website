<?php
session_start();

include_once('assets/database/db_connect.php');


if(isset($_POST['save-changes-btn'])){
	$email = $_POST['email'];
	$username = $_POST['username'];
	$newPassword = $_POST['new-password'];
	$currentPassword = $_POST['current-password'];
	
	if(mysql_query("UPDATE userinfo set username = '$username' , password = md5('$newPassword') where email like '$email' and password = md5('$currentPassword')"))
	{	header('Refresh: 1; logged_in.php');
	}
	else 
		echo "fail ". $username . " " . $newPassword . " " . $currentPassword;

}



$components = explode('/', $_SERVER['REQUEST_URI']);
$email = $_SESSION['email'];

$query = "SELECT * FROM `userinfo` WHERE `email` = '$email' LIMIT 1";
$result = mysql_query($query);
$count = mysql_num_rows($result);
if($count <= 0) header("Location:login.php");

$row = mysql_fetch_array($result);
$username = $row['username'];
$q_current_password = md5($row['password']);
$products = $row['products'];
$phone = $row['phone'];
$address = $row['address'];


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width , intial-scale=1">
		<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../assets/css/main.css">
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="../../assets/js/phonenumber.fix.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</head>
	<body>
		<?php include_once('assets/helpers/navigation-users.php'); ?>
		<div class="container">
			<div class="run"></div>
		    <h3 style="text-align:center;">Update Profile</h3>
		  	<hr class="style">
			<div class="row">
		      <!-- left column -->
		      <div class="col-md-3">
		      </div>
		      
		      <!-- edit form column -->
		      <div class="col-md-9 personal-info">
		        
		        
		        <form class="form-horizontal" id="personalForm" method="post" id="profileForm" action="users.php">
		          <div class="form-group">
		            <label class="col-lg-3 control-label">Username:</label>
		            <div class="col-lg-4">
		              <input name="username" class="form-control" type="text" placeholder="Change username" value="<?php echo $username; ?>">
		            </div>
		          </div>
		          
		          <div class="form-group">
		            <label class="col-lg-3 control-label">Email:</label>
		            <div class="col-lg-4">
		              <input name="email" class="form-control" type="text" placeholder="yourname@example.com" readonly value="<?php echo $email; ?>">
		            </div>
		          </div>
		          <div class="walk"></div>
		          <div class="form-group">
		            <label class="col-md-3 control-label">New Password:</label>
		            <div class="col-md-4">
		            	<div class="input-group login-input">
							<input type="password" class="form-control" onkeyup="newPassVerify()" size="50" placeholder="New Password" name="new-password" id="new-password" required>
							<span class="input-group-btn">
								<div  class="btn input-sheild" id="checkmarkNewPassword"> <i class="fa fa-check" aria-hidden="true"></i></div>
					 		</span>
						</div>
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-md-3 control-label">Confrim Password:</label>
		            <div class="col-md-4">
		            	<div class="input-group login-input">
							<input type="password" class="form-control" onkeyup="validatePassword()" size="50" placeholder="Confrim Password" name="confirm-password" id="confirm-password" required>
							<span class="input-group-btn">
								<div  class="btn input-sheild" id="checkmarkConfirmPassword"> <i class="fa fa-check" aria-hidden="true"></i></div>
					 		</span>
						</div>
		            </div>
		          </div>
		          <div class="walk"></div>
		          <hr class="style"></hr>
		          <div class="walk"></div>
		          <div class="form-group">
		            <label class="col-md-3 control-label">Current password:</label>
		            <div class="col-md-4">
		              <input required name="current-password" id="current-password" onkeyup="currentPassCheck()" class="form-control" type="password" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-md-3 control-label"></label>
		            <div class="col-md-2">
		              <button class="form-control btn btn-primary" type="submit" name="save-changes-btn">Save Changes</button>
		            </div>
		            <div class="col-md-2">
		            	<button class="form-control btn btn-default pull-right" type="reset">Reset</button>
		            </div>
		          </div>
		        </form>
		      </div>
		  </div>
		</div>
		<div class="run"></div>
		<!--<script src="../../assets/js/phonenumber.fix.js"></script>-->
		<script>
			var currentPassword = '<?php echo $q_current_password; ?>';

			function newPassVerify(){
				var newPass = document.getElementById("new-password");
				var checkmark = document.getElementById("checkmarkNewPassword");
				if(newPass.value){
					checkmark.innerHTML = '<i style="color:#04B404;" class="fa fa-check" aria-hidden="true"></i>';
				}else{
					checkmark.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i>';
				}
			}

			var confirmCheckmark = document.getElementById("checkmarkConfirmPassword");
				
			var newPassword = document.getElementById("new-password");
			var confirmPassword = document.getElementById("confirm-password");

			function validatePassword(){
				if(newPassword.value != confirmPassword.value){
					confirmPassword.setCustomValidity("Passwords don't match!");
					confirmCheckmark.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i>';
				}else{
					confirmPassword.setCustomValidity('');
					confirmCheckmark.innerHTML = '<i style="color:#04B404;" class="fa fa-check" aria-hidden="true"></i>';
				}
			}

			newPassword.onchange = validatePassword;
			confirmPassword.onkeyup = validatePassword;

		</script>
		
	</body>

</html>