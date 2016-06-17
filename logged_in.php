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
			if($i!=0)
			echo "file didn't upload";
		
		}else {
			if(@copy($_FILES['image']['tmp_name'][$i], "assets/img/user_uploads/".$_FILES['image']['name'][$i])){
				
				$pathArray[$i] = "assets/img/user_uploads/".$_FILES['image']['name'][$i];

				/*$path = "path/".$_FILES['image']['name'][$i];
				"insert into shopkeeper($nameArray[$i]) values ('".$path ."')";
				$sql = " ";
				if(mysql_query($sql) === true){
					echo "successfully done";*/
			}else{
				echo "can't upload #1";
			}
			}
			
				
		}
		
	}else 
			{
				echo "can't upload #2";
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

	<?php include_once('assets/helpers/navigation.php'); ?>

	<div class="jumbotron ">
	<div class="conatiner">

	 <div class="row">

	 	<div class="col-lg-12">
	 		<div class="col-lg-2"></div>
	 		<div class="col-lg-8">
	 			<h2>Upload your product!</h2>
	 			<form method="post" action="logged_in.php" enctype="multipart/form-data" name="uploadProduct"> 
					<div class="col-lg-12">
				        <div class="col-lg-6 form-group">
				          <input class="form-control" id="name" name="name" placeholder="Product Name" type="text" required>
				        </div>
						<div class="col-lg-6 form-group">
							<input class="form-control" id="name" name="shopname" placeholder="Name of the shop" type="text" required>
				        </div>
				        <div class="col-lg-3 form-group">
				        	<input class="form-control" id="name" name="price" placeholder="Price" type="text" required>
				       
				        </div>
						<div class="col-lg-3 form-group">
				        	<input class="form-control" id="name" name="cityname" placeholder="City" type="text" required>
				        </div>
				        <div class="col-lg-6">
				        	<input class="form-control" id="number" name="contactno" placeholder="Contact #"  required>
				        </div>
				        <div class="col-lg-12">
				        	<input class="form-control" type="text" id="comments" name="comments" placeholder="Address Line 1" required>
				        </div>
				        <div class="col-lg-6">
				        	<div class="walk"></div>
				        	<label for="file" class="input-label"><span id="label_span">Select files to upload</span></label><input id="file" type="file" multiple name="image[]" >
				        </div>
				        <div class="col-lg-6">
				        	<div class="walk"></div>
				        	<button class="btn btn-primary pull-right" name="upload-product">Submit</button>
				        </div>
				      </div>
				      <br>
					<div class="row">
					
					<div class="col-md-4">
					
					</div>
					
					<div class="col-md-2 form-group">
				          
				    </div>
					</div> <!-- row -->
	      </form>


	 		</div>
	 		<div class="col-lg-2"></div>

	 	</div>

		
		
	    <div class="col-md-8">
		<	
	</div>
	</div>


	</div> <!-- container End -->
	</div> <!-- jumbotron End -->



</body>

</html>