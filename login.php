<!DOCTYPE html>
<html>

<head>
	<?php include_once('assets/helpers/head.php'); ?>
</head>


<body>

	<nav class= "navbar navbar-default">

	<div class="container">

	<div class= "navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyData">
		<span class="icon-bar"> </span>
		<span class="icon-bar"> </span>
		<span class="icon-bar"> </span>
		</button>
	<a class="navbar-brand" href="Search.php"> MARKET CHECKeR</a>
	</div> <!-- header navbar END -->





	<div class="collapse navbar-collapse" id="MyData">
	<ul class="nav navbar-nav ">
	<li><a href="AboutUs.php">ABOUT US </a> </li>
	<li><a href="ContactUs.php">CONTACT US </a> </li>
	<li><a href="FeedBack.php">FEEDBACK </a> </li>
	</ul>
	</div>

	</div> <!-- container END -->
	</nav> <!-- Main nav END -->

	<div class="jumbotron">
	<div class="container">

	<form role="form" >

	<h2 class="text-center" style="color:white;"> Log-In </h2>
	<div class="form-group" id="frm">
	<input type="text" class="form-control" size="23" style="margin-top:10px; margin-bottom:10px;" placeholder="Email" required>
	<input type="password" class="form-control" size="50" style="margin-bottom:10px;" placeholder="password" required>
	<div class="checkbox">
	          <label style="color:gray;"><input type="checkbox" > Remember me</label>
	</div>
	<a class="btn btn-primary" style="float:right; margin-top:5px;" href="#" > Login </a>
	<a class="btn btn-warning"  style="float:left; margin-top:5px;" href="SignUp.php"> new user ? Sign Up here </a>
	<a class="btn btn-danger" style="float:left; margin-top:5px; margin-left:2px;" href="changePassword.php"> Forgot password ? </a>
	</div>

	</form>


	</div> <!-- container -->
	</div> <!-- jumbotron End -->


</body>


</html>