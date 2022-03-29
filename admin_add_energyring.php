<?php

$name = $_POST['name'];
$weight = $_POST['weight'];
$attack = $_POST['attack'];
$defense = $_POST['defense'];
$stamina = $_POST['stamina'];
$generation = $_POST['generation'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$clone = $_POST['yesNo'];
$spin_direction = $_POST['spinDirection'];
$image = $_FILES["itemPicture"]["name"];

include 'secrets.php';

// echo "<h1>";
// echo $name;
// echo "<br />";
// echo $weight;
// echo "<br />";
// echo $attack;
// echo "<br />";
// echo $defense;
// echo "<br />";
// echo $stamina;
// echo "<br />";
// echo $generation;
// echo "<br />";
// echo $price;
// echo "<br />";
// echo $quantity;
// echo "<br />";
// echo $clone;
// echo "<br />";
// echo $spin_direction;
// echo "<br />";
// echo $image;
// echo "<br />";
// echo '</h1>';
$image_location = 'upload/'.$image;

echo "imagelocation set";
$connection = mysqli_connect(Mydbserver, Mydbid, Mydbpassword, Mydatabase); 

echo $connection;
echo "<br />";

$sql = "INSERT INTO EnergyRing (name, weight, attack, defense, stamina, quantity, generation, clone, spindirection, price, picture) VALUES ('" . $name . "','" . $weight . "','" . $attack ."','" . $defense . "','" . $stamina . "'," . strval($quantity) . "'," . $generation . "'," . $clone . "'," . $spin_direction . "'," . strval($price) . "'," . $image_location . ")" ;

echo $sql;

$result = mysqli_query($connection, $sql) or die(mysql_error($connection));  




mysqli_close($connection);



?>

<?php

//echo "<br /><br /> For image: <br />";
if ((($_FILES["imagefile"]["type"] == "image/png"))
&& ($_FILES["imagefile"]["size"] < 2000000))
  {
  if ($_FILES["imagefile"]["error"] > 0)
    {
    //echo "Return Code: " . $_FILES["imagefile"]["error"] . "<br />";
    }
  else
    {
    //echo "Upload: " . $_FILES["imagefile"]["name"] . "<br />";
    //echo "Type: " . $_FILES["imagefile"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["imagefile"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["imagefile"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["imagefile"]["name"]))
      {
      //echo $_FILES["imagefile"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["imagefile"]["tmp_name"],
      "upload/" . $_FILES["imagefile"]["name"]);
      //echo "Stored in: " . "upload/" . $_FILES["imagefile"]["name"];
      }
    }
  }
else
  {
  //echo "Invalid image file";
  }
?>

<?php
  echo "<h1><a href='retrieve_books_2.php'>See available books.</a></h1>";
echo "<h1><a href='insert_new_book.html'>Insert more books?</a> </h1>";
?>