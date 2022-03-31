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
$image = $_FILES["itemPicture"]["name"];
$image_location = 'upload/'.$image;

include 'secrets.php';


$connection = mysqli_connect(Mydbserver, Mydbid, Mydbpassword, Mydatabase);


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "INSERT INTO SpinTrack (name, weight, attack, defense, stamina, quantity, generation, clone, price, picture) VALUES ('{$name}', '{$weight}', '{$attack}', '{$defense}', '{$stamina}', '{$quantity}', '{$generation}', '{$clone}', '{$price}', '{$image_location}')";

// Perform a query, check for error
if (!mysqli_query($connection,$sql)) {
  echo("Error description: " . mysqli_error($connection));
}

mysqli_close($connection);
?>

<?php

if ($_FILES["itemPicture"]["type"] == "image/png" || $_FILES["itemPicture"]["type"] == "image/jpg" || $_FILES["itemPicture"]["type"] == "image/jpeg")
  {
  if ($_FILES["itemPicture"]["error"] > 0)
    {
    }
  else
    {

    if (file_exists("upload/" . $_FILES["itemPicture"]["name"]))
      {
      echo $_FILES["itemPicture"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["itemPicture"]["tmp_name"],
      "upload/" . $_FILES["itemPicture"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["itemPicture"]["name"];
      }
    }
  }
else
  {
  }
?>

<?php
header("Location:admin_homepage.html");
?>