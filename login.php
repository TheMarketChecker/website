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
				<h3 style="color:#CCC">Login<h3>
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
				<button class="form-control btn btn-success" name="login">Login</button><br /><br />
				<span class="tiny"><a>Forgot password?</a></span>
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