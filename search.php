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
	<li><a href="FeedBack.php">FEEDBACK </a> </li>
	</ul>
	</div>

	</div> <!-- container END -->
	</nav> <!-- Main nav END -->

	<div class="jumbotron text-center">

	<div class="row">
	<form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

	<div class="col-sm-5">

	<h2> select a city:</h2>

	<input type="text" class="form-control" size="20" placeholder="cityname" name="cityname" required>

	</div>

	<div class="col-sm-7">

	<h2 style="margin-right:90px;"> save money!! do search </h2>
	<input type="text" class="form-control" size="50" placeholder="Search any product you want" name="ring" required>
	<button type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-search"></span> Search </button>

	</div>

	</form>

	</div> <!-- row End -->
	</div> <!-- jumbotron End -->


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

	mysql_connect("localhost","root","");
	mysql_select_db("fazal");

	$row = null;







	if($_SERVER["REQUEST_METHOD"] == "POST")
	{$rock = test_input($_POST["ring"]);
	 $cityname = test_input($_POST["cityname"]);
	$result = mysql_query("Select * from shopkeeper where ItemName like '$rock' and CityName like '$cityname' ") or die("Fail" . mysql_error());

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

	} // if ends here




	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}




	?>
	    </tbody>
	  </table>


	</div> <!-- container -->



</body>


</html>
