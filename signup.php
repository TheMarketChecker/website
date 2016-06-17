<!DOCTYPE html>
<html>

<head>
	<?php include_once('assets/helpers/head.php'); ?>
</head>


<body>

	<?php include_once('assets/helpers/navigation.php'); ?>

	<div class="jumbotron">
	<div class="container">

	<form role="form">	
	<h2 class="text-center" style="color:white;"> Sign Up </h2>
	<div class="form-group" id="frm">
	<input type="text" class="form-control" size="23" style="margin-top:10px; margin-bottom:10px;" placeholder="Email" required>
	<input type="password" class="form-control" size="50" style="margin-bottom:10px;" placeholder="password" required>
	<input type="password" class="form-control" size="50" style="margin-bottom:10px;" placeholder="Repeat-password" required>
	<div class="checkbox">
	          <label style="color:gray;"><input type="checkbox" > Accept our terms and Conditions</label>
	</div>
	<a class="btn btn-primary btn-lg" style="float:right; margin-top:5px;" href="#" > Create </a>
	</div>


	</form>


	</div> <!-- container -->
	</div> <!-- jumbotron End -->


</body>


</html>