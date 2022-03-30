<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Energy Ring Product List</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
    <h1>Face Bolts - </h1>
    <table border="2" width="60%">
        <thead>
            <th>Picture</th>
            <th>Name</th>
            <th>Weight</th>
            <th>Attack</th>
            <th>Defense</th>
            <th>Stamina</th>
            <th>Generation</th>
            <th>Price</th>
            <th>Spin Direction</th>
        </thead>
    <?php

    $connection = mysqli_connect(Mydbserver, Mydbid, Mydbpassword, Mydatabase);

    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
    }

    $sql = "SELECT name, weight, attack, defense, stamina, generation, price, spindirection, picture FROM EnergyRing";


    $result = mysqli_query($connection, $sql) or die(mysql_error($connection));



    while ($resultArray = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>";
        echo $resultArray['picture'];
        echo "</td>";
        echo "<td>";
        //change anchor to be purchase
        echo "<a href='book_shopping_3.php?id=". $resultArray['name'] . "'>" . $resultArray['name']  . "</a>";
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
    ?>

</html>