<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Energy Ring Product List</title>
        <style>
            <?php include 'styles.css'; ?>
        </style>
    </head>

    <body>
    <h1>Energy Rings</h1>
    <table border="2" width="60%">
        <thead>
            <th></th>
            <th>Picture</th>
            <th>Name</th>
            <th>Weight</th>
            <th>Attack</th>
            <th>Defense</th>
            <th>Stamina</th>
            <th>Generation</th>
            <th>Spin Direction</th>
            <th>Price</th>
        </thead>
    <?php


    include 'secrets.php';


    $connection = mysqli_connect(Mydbserver, Mydbid, Mydbpassword, Mydatabase);

    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
    }

    $sql = "SELECT name, weight, attack, defense, stamina, generation, price, spindirection, picture FROM EnergyRing";


    $result = mysqli_query($connection, $sql) or die(mysql_error($connection));
    $partType = "energyring";

    while ($resultArray = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>";
        echo "<a href='add_item_cart.php?id=" . $resultArray['name'] . "&type=" . $partType . "'>Add to Cart</a>";
        echo "</td>";
        echo "<td>";
        echo "<img src=". $resultArray['picture']. ">";
        echo "</td>";
        echo "<td>";
        echo $resultArray['name'];
        echo "</td>";
        echo "<td>";
        echo $resultArray['weight'];
        echo "</td>";
        echo "<td>";
        echo $resultArray['attack'];
        echo "</td>";
        echo "<td>";
        echo $resultArray['defense'];
        echo "</td>";
        echo "<td>";
        echo $resultArray['stamina'];
        echo "</td>";
        echo "<td>";
        echo $resultArray['generation'];
        echo "</td>";
        echo "<td>";
        echo $resultArray['spindirection'];
        echo "</td>";
        echo "<td>";
        echo "$" . $resultArray['price'];
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    mysqli_close($connection);

    ?>
        <button onclick="location.href='mainshoppage.html'">Home</button>

        <button onclick="location.href='Shopping_Cart.php'">View Shopping Cart</button>

</html>