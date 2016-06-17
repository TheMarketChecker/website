<!DOCTYPE html>
<html>

<head>
	<?php include_once('assets/helpers/head.php'); ?>
</head>

<body>

	<?php include_once('assets/helpers/navigation.php'); ?>

	<div class="jumbotron bg-world">

	<div class="conatiner">

	<div class="row">

		<div class="col-lg-12">

			<div class="col-lg-3"></div>
			<div class="col-lg-6 text-center">
				<h2 style="text-decoration:underline;">Send us a message!</h2>
				<div class="run"></div>
				<p style="font-family:'Merriweather',serfi;color:#444;">We will get back to you as soon as possible...</p>
				<div class="run"></div>
				<form method="post" enctype="multipart/form-data" > 
					<div class="row">
				        <div class="col-sm-4 form-group">
				          	<input class="form-control" id="email" name="email" placeholder="Email" type="email" >
				        </div>
						<div class="col-sm-4 form-group">
				        	<input class="form-control" id="name" name="name" placeholder="Name" type="text" >
				   		</div>
						<div class="col-sm-4 form-group">
							<input class="form-control" id="number" name="tel" placeholder="Phone #" >
				       </div>
					   </div>
				       <textarea class="form-control" id="comments" name="comments" placeholder="Type in your concern." rows="5"></textarea>
				       <br />
					   	  <div class="row">
							<div class="col-md-12 form-group">
				       			<button class="btn btn-primary pull-right" type="submit">Send</button>
				    		</div>
						  </div>
	            </form>

			</div>
			<div class="col-lg-3"></div>
		</div>
	</div>


	</div> <!-- container End -->
	</div> <!-- jumbotron End -->
</body>

</html>