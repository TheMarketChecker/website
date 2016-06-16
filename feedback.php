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


	<ul class="nav navbar-nav navbar-right">
	      <li ><a class="btn btn-default" href="LogMeIn.php"><span class="glyphicon glyphicon-thumbs-up"></span> JOIN US</a></li>
	</ul>


	<div class="collapse navbar-collapse" id="MyData">
	<ul class="nav navbar-nav ">
	<li><a href="AboutUs.php">ABOUT US </a> </li>
	<li><a href="ContactUs.php">CONTACT US </a> </li>
	<li><a href="FeedBack.php"  style="color: #1abc9c !important;">FEEDBACK </a> </li>
	</ul>
	</div>

	</div> <!-- container END -->
	</nav> <!-- Main nav END -->

	<div class="jumbotron ">

	<div class="conatiner">

	<div class="row">

	    <div class="col-md-4 text-center">
			<br><br>
	      <p>Send us a Feedback</p>
	      <p>we want to know how was your experience to our website!!</p>
	      </div>

	    <div class="col-md-8">
		<form method="post" enctype="multipart/form-data" > 
		<div class="row">
	        <div class="col-sm-4 form-group">
	          <input class="form-control" style="display:none;" id="email" name="email" placeholder="Email" type="email" >
	        </div>
		<div class="col-sm-4 form-group">
	          <input class="form-control"  id="email" name="email" placeholder="Email" type="email" >
	        </div>
			<div class="col-sm-4 form-group">
			<input class="form-control" id="number" style="display:none;" name="number" placeholder="Enter you contact number" >
	       </div>
		   </div>
	      <textarea class="form-control" id="comments" name="comments" placeholder="Type your message here" rows="5"></textarea>
	      <br>
		<div class="row">
		<div class="col-md-12 form-group">
	          <button class="btn btn-danger pull-right" type="submit">Send</button>
	        </div>
		</div> <!-- row -->
	      </form>	
	</div>
	</div>


	</div> <!-- container End -->
	</div> <!-- jumbotron End -->



</body>

</html>