<?php 

// Database Connection
include_once('assets/database/db_connect.php');
include_once('assets/helpers/php_functions.php'); 


$count = 0;

if(isset($_POST['search-pressed'])){
	$product_name = test_input($_POST['product_name']);
	$cityname = test_input($_POST['cityname']);
	$result = mysql_query("Select * from shopkeeper where ItemName like '%$product_name%' and CityName like '%$cityname%' ") or die("Fail" . mysql_error());
	$count = mysql_num_rows($result);
}



?>
<!DOCTYPE html>
<html>

<head>
	<title>Search a product - MarketChecker</title>
	<?php include_once('assets/helpers/head.php'); ?>
</head>

<body>

	<?php include_once('assets/helpers/navigation.php'); ?>

	<div class="jumbotron text-center">
		<div class="row">
		<div class="col-lg-10"> </div>
			<div class="col-lg-2"> <a href="login.php" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-thumbs-up"> </span> Join us </a> </div>
		</div>
		<div class="row">
			<form class="form-inline" method="post" action="search.php" >
				<?php if(!isset($_POST['search-pressed']) && !$count >= 1) { ?><div class="run"></div><?php } ?>
				<div class="col-lg-12">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
						<h3>Let's search for your product!</h3>
						<br />
						<input type="text" class="form-control" size="20" placeholder="City" name="cityname" required>
						<div class="walk"></div>
						<div class="input-group">
							<input type="text" class="form-control" size="50" placeholder="What are you looking for?" name="product_name" required>
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary" name="search-pressed"> <span class="glyphicon glyphicon-search"></span></button>
							</span>
						</div>
						<div class="walk"></div>
						<?php if(isset($_POST['search-pressed']) && $count >= 1) { ?><hr class="style"><?php } ?>
					</div>
					<div class="col-lg-2"> </div>
				</div>

			</form>

		</div> <!-- row End -->
	</div> <!-- jumbotron End -->


	<?php if(isset($_POST['search-pressed'])) { if($count >= 1){?>	
	<div class="container">
	 <table class="table table-hover">
	 	<thead style="background-color: #FFF;">
	 	<tr>
	 		<th>Image</th>
	 		<th>Description</th>
	 		<th>Phone</th>
	 		<th>Price</th>
	 	</tr>
	 	</thead>
	    <tbody>
		
	<?php

	$row = null;

	while($row = mysql_fetch_array($result)){

	$checker = 5;

	$ShopName = $row["ShopName"];
	$ItemName = $row["ItemName"];
	$ShopAddress = $row["ShopAddress"];
	$Price = $row["Price"];
	$cityname = $row["CityName"];
	$contactNo = $row["ContactNo"];

	$imgArray = array("img1","img2","img3","img4","img5");
	$str = array(null,null,null,null,null);

	for($i=0; $i<5; $i++){
		$str[$i] = $row[$imgArray[$i]];
		//echo $row[$imgArray[$i]];
		
		if(empty($row[$imgArray[$i]])){
			$checker -= 1;
			// echo here 
		}
		
		
	}

	$originalImage = 'assets/img/user_uploads/' . $imgArray[0];
	$alertnameImage = 'assets/img/user_uploads/image-not-found.jpg';
		
	echo "<tr class='success'><td>";
		if($checker == 0){
			echo "<img src='" . $alertnameImage . "' width='250' height='200'>";
		}else if($checker >= 1){
			if(file_exists($originalImage)) echo '<img src="' . $originalImage . '" width="250" height="200">';
			else echo '<img src="' . $alertnameImage . '" width="250" height="200">';
		}
	echo "</td>";
	echo "<td> 
			<b>$ItemName</b>
			<br />
			<u>$ShopName</u>
			<br />
			$ShopAddress
		</td>
		<td> $contactNo </td>
		<td> $Price PKR </td>
	      </tr>";


	}





	

	?>
	    </tbody>
	  </table>


	</div> <!-- container -->
	<?php }else{ ?>
	<div class="col-lg-12">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<div class="alert alert-danger text-center"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;&nbsp;<b>Unfrotunately, your search didn't yeild any results</b></div>
		</div>
		<div class="col-lg-4"></div>
	</div>
	<?php }} ?>



</body>


</html>
