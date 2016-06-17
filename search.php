<?php 

// Database Connection
include_once('assets/database/db_connect.php');
include_once('assets/helpers/php_functions.php'); 


$count = 0;
if(isset($_POST['search-pressed'])){
	$product_name = test_input($_POST['product_name']);
	$cityname = test_input($_POST['cityname']);
	$result = mysqli_query($db_connect,"Select * from shopkeeper where ItemName like '$product_name' and CityName like '$cityname' ") or die("Fail" . mysql_error());
	$count = mysqli_num_rows($result);
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
					<div class="col-lg-2"></div>
				</div>

			</form>

		</div> <!-- row End -->
	</div> <!-- jumbotron End -->


	<?php if(isset($_POST['search-pressed'])) { if($count >= 1){?>	
	<div class="container">
	 <table class="table table-bordered table-hover">
	    <thead style="background-color:white; color:#000000;">
	      <tr>
		  <th> Photos </th>
		  <th>City Name </th>
	        <th>Shop Name</th>
	        <th>Item Name</th>
			<th> Contact No </th>
		<th>Price</th>
	        <th>Shop Address</th>
	      </tr>
	    </thead>
	    <tbody>
		
	<?php

	$row = null;

	while($row = mysqli_fetch_array($result)){

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
		
	echo "<tr class='success'>";
		if($checker == 0){
			echo "<td> no images </td>";
		}else if($checker == 1){
			echo "<td> <a href='allImages.php'> $checker image is Avilable  </a></td>";
		}else {
				echo "<td> <a href='allImages.php'> $checker images are Avilable  </a></td>";
		}
	echo "<td> $cityname </td>
		<td> $ShopName </td>
		<td> $ItemName </td>
		<td> $contactNo </td>
		<td> $Price </td>
		<td> $ShopAddress </td>
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
