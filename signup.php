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