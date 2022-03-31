<!--Group: David Tao, John Xiao, TJ Miller, Nick Ceglio-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | BBPartPicker</title>
    <style>
		<?php include 'styles.css'; ?>
	</style>
</head>
<body>

<h1>Payment successfully processed</h1>
    
<table borders="2" width="60%">
	<thead>
		<th>Picture</th>
		<th>Name</th>
		<th>Type</th>
		<th>Price</th>
	</thead>

<?php

$user = $_COOKIE["username"];
$address = $_POST['address'];

include 'secrets.php';

$connection = mysqli_connect(Mydbserver, Mydbid, Mydbpassword, Mydatabase);

$sql = "SELECT * FROM ShoppingList WHERE username='{$user}'";

$result = mysqli_query($connection, $sql) or die(mysql_error($connection));

$resultArray = mysqli_fetch_array($result);

$total = 0;

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

echo "</table>";

echo "<br />";
echo "<h1>The current total charge is $" . $total . ".</h1>";
echo "<h1>Delivering to: " . $address . ".</h1>";

$sql = "UPDATE ShoppingList SET ischeckedout='1', address='{$address}' WHERE username='{$user}'";

$result = mysqli_query($connection, $sql) or die(mysql_error($connection));


mysqli_close($connection);
?>

</body>
</html>