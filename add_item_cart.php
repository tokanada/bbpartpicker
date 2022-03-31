<?php

session_start();

$id = $_GET['id'];
$itemtype = strtolower($_GET['type']);
$cookie = $_COOKIE['username'];

include 'secrets.php';

$connection = mysqli_connect(Mydbserver, Mydbid, Mydbpassword, Mydatabase);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$query = "SELECT * FROM ShoppingList WHERE username='{$cookie}'";

$result = mysqli_query($connection, $query) or die(mysql_error($connection));

$count = mysqli_num_rows($result);

if($count == 1){
    ## Code here for if shopping list is found
    echo "Adding to existing shopping list";
    $query = "UPDATE ShoppingList SET {$itemtype} = '{$id}' WHERE username = '{$cookie}'";
    echo $query;
    $result = mysqli_query($connection, $query) or die(mysql_error($connection));
} else {
    # Code here needs to create a new shopping list for the user
    $query = "INSERT INTO ShoppingList (username, {$itemtype}) VALUES ('{$cookie}', '{$id}')";
    $result = mysqli_query($connection, $query) or die(mysql_error($connection));
}

mysqli_close($connection);
## REDIRECT TO SHOPPING CART
header("Location: Shopping_Cart.php");
?>