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
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>


	</div> <!-- container -->
	</div> <!-- jumbotron End -->


</body>


</html>