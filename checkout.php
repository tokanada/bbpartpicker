<!--Group: David Tao, John Xiao, TJ Miller, Nick Ceglio-->

<?php

$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$passconf = $_POST['passwordConfirm'];
$agreement = $_POST['agreement'];
$address = $_POST['address'];
$isadmin = 0;

$password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/i";

include 'secrets.php';

$connection = mysqli_connect(Mydbserver, Mydbid, Mydbpassword, Mydatabase);

if($pass != $passconf){
    echo "<p>Your passwords don't match</p>";
    header("refresh: 5; /~dtao/Homework4/register.html");
} else {
    if (preg_match($password_pattern, $pass)) {
        //check if username already exists in database
        $query = "SELECT * FROM Users WHERE username='$user'";
        $result = mysqli_query($connection, $query) or die(mysql_error($connection));
        $count  = mysqli_num_rows($result);

        if($count == 0){
            //hash password
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
    
            $query = "INSERT INTO Users (username, pass, email, agreement, isadmin, address) VALUES ('{$user}', '{$hashedPass}', '{$email}', '{$agreement}', '{$isadmin}', '{$address}')";
            $result = mysqli_query($connection, $query) or die(mysql_error($connection));
            header('Location: /~dtao/Homework4/login.html');

        } else {
            echo "<script>alert('Username already taken');window.location = '/~dtao/Homework4/register.html';</script>";
        }
    } else {
        echo "<script>alert('Your password doesn't fulfill the requirements');window.location = '/~dtao/Homework4/register.html';</script>";
    }
}

?>