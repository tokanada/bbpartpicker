<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Shopping Cart | BBPartPicker</title>
    <style>
		<?php include 'styles.css'; ?>
	</style>

</head>

<table borders="2" width="60%">
	<thead>
		<th>Change</th>
		<th>Picture</th>
		<th>Name</th>
		<th>Type</th>
		<th>Price</th>
	</thead>

<?php

## The shoppinglist table only contains the names of the item, not the values
# PHP is going to have to grab each name for each part
# It has to then do a search in each corresponding part table for other values to display
# Calculate price as well

### SQL SERVER CONNECTION STUFF
include 'secrets.php';
$cookie = $_COOKIE["username"];
$connection = mysqli_connect(Mydbserver, Mydbid, Mydbpassword, Mydatabase);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

## RETRIEVE USER'S SHOPPING LIST
$sql = "SELECT * FROM ShoppingList WHERE username='{$cookie}'";

echo "<br />";
$result = mysqli_query($connection, $sql) or die(mysql_error($connection));

$count = mysqli_num_rows($result);

$total = 0;
	
if($count == 1){
	# User's Shopping List
	$resultArray = mysqli_fetch_array($result);
	$part_names = array($resultArray["facebolt"],$resultArray["energyring"],$resultArray["fusionwheel"],$resultArray["spintrack"],$resultArray["performancetip"]);
	$part_types = array("FaceBolt","EnergyRing", "FusionWheel", "SpinTrack", "PerformanceTip");

	for ($i = 0; $i < count($part_names); $i++) {
		$query = "SELECT price, picture FROM {$part_types[$i]} WHERE name='{$part_names[$i]}'";
		$result = mysqli_query($connection, $query) or die(mysql_error($connection));
		$resultArray = mysqli_fetch_array($result);
		$price = $resultArray["price"];
		$picture = $resultArray["picture"];

		echo "<tr>";
		echo "<td>";
        echo "<a href='".strtolower($part_types[$i])."_list.php'>Change</a>";
		echo "</td>";
		echo "<td>";
        echo "<img src=". $picture. ">";
		echo "</td>";
		echo "<td>";
		echo $part_names[$i];
		echo "</td>";
		echo "<td>";
		echo $part_types[$i];
		echo "</td>";
		echo "<td>";
		echo "$" . $price;
		echo "</td>";
		echo "</tr>";
		$total = $total + $price;
	}

}
echo "</table>";

echo "<br />";
echo "<h1>The current total charge is  $" . $total . ".</h1>";

echo "<a href='/~dtao/Homework4/mainshoppage.html'><button>Home</button></a>";

echo "<a href='/~dtao/Homework4/checkout.html'><button>Checkout</button></a>";
mysqli_close($connection);

?>