<?php

// Database Connection
include_once('assets/database/db_connect.php');

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['upload-product'])){

	$comment = test_input($_POST["comments"]);
	$Itemname = test_input($_POST["name"]);
	$price = test_input($_POST["price"]);
	$shopname = test_input($_POST["shopname"]);
	$cityname = test_input($_POST["cityname"]);
	$contactNo = test_input($_POST["contactno"]);
	


 $pathArray = array(null,null,null,null,null);

if(isset($_FILES['image']['tmp_name'])) {
	$num_files = count($_FILES['image']['tmp_name']);
	
	for($i=0; $i<$num_files; $i++) {
		
		if(!is_uploaded_file($_FILES['image']['tmp_name'][$i]))
		{
			echo "file didn't upload";
		}else {
			if(@copy($_FILES['image']['tmp_name'][$i], "path/".$_FILES['image']['name'][$i])){
				
				$pathArray[$i] = "path/".$_FILES['image']['name'][$i];

				/*$path = "path/".$_FILES['image']['name'][$i];
				"insert into shopkeeper($nameArray[$i]) values ('".$path ."')";
				$sql = " ";
				if(mysql_query($sql) === true){
					echo "successfully done";*/
			}else{
				echo "can't upload";
			}
			}
			
				
		}
		
	}else 
			{
				echo "can't upload";
			}
	
	
	
	

if(mysql_query("INSERT INTO shopkeeper(ItemName, Price, ShopName,ContactNo, ShopAddress,CityName,img1,img2,img3,img4,img5) VALUES ('$Itemname',$price,'$shopname','$contactNo','$comment','$cityname','$pathArray[0]','$pathArray[1]','$pathArray[2]','$pathArray[3]','$pathArray[4]')") == true){
	echo "Successful name and price :)";
} else {  
		echo "not successful :(";
}
}



?>
<!DOCTYPE html>
<html>

<head>
	<?php include_once('assets/helpers/head.php'); ?>
	<script src="assets/js/filesUpload.js"></script>
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
	      <li ><a class="btn btn-default" href="LogMeIn.php"><span class="glyphicon glyphicon-Log-out"></span> Logout</a></li>
	</ul>


	<div class="collapse navbar-collapse" id="MyData">
	<ul class="nav navbar-nav ">
	</ul>
	</div>

	</div> <!-- container END -->
	</nav> <!-- Main nav END -->

	<div class="jumbotron ">
	<div class="conatiner">

	 <div class="row">

		<div class="col-md-4 text-center">
		<br>
		<p>Share your ad </p>
		<p>To the people, let them know </p>
		<p>How you are helping them to save their money.</p>
		</div>
		
	    <div class="col-md-8">
		<form method="post" action="logged_in.php" enctype="multipart/form-data" name="uploadProduct"> 
		<div class="row">
	        <div class="col-sm-3 form-group">
	          <input class="form-control" id="name" name="name" placeholder="Item name" type="text" required>
	        </div>
		<div class="col-sm-3 form-group">
	          <input class="form-control" id="name" name="price" placeholder="Price" type="text" required>
	        </div>
	        <div class="col-sm-3 form-group">
	          <input class="form-control" id="name" name="shopname" placeholder="Shop name" type="text" required>
	        </div>
		<div class="col-sm-3 form-group">
	          <input class="form-control" id="name" name="cityname" placeholder="City name" type="text" required>
	        </div>
	      </div>
	      <textarea class="form-control" id="comments" name="comments" placeholder="Shop address" rows="5" required></textarea>
	      <br>
		<div class="row">
		<div class="col-md-6">
		<div class="form-div">
				<label for="file" class="input-label"><span id="label_span">Select files to upload</span></label><input id="file" type="file" multiple name="image[]" >
			
		</div>
		</div>
		
		<div class="col-md-4">
		<input class="form-control" id="number" name="contactno" placeholder="Contact no"  required>
		</div>
		
		<div class="col-md-2 form-group">
	          <button class="btn btn-primary pull-right" name="upload-product">Submit</button>
	    </div>
		</div> <!-- row -->
	      </form>	
	</div>
	</div>


	</div> <!-- container End -->
	</div> <!-- jumbotron End -->



</body>

</html>