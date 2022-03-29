<!--Group: David Tao, John Xiao, TJ Miller, Nick Ceglio-->

<?php

echo "<p>hello world</p>";
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];
$passconf = $_POST['passwordConfirm'];
$agreement = $_POST['agreement'];
$isadmin = 0;

$password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/i";

include 'secrets.php';

$connection = mysqli_connect(Mydbserver, Mydbid, Mydbpassword, Mydatabase);

echo "<p>Connection established</p>";

if($pass != $passconf){
    echo "<script>alert('Passwords do not match');window.location = '/~dtao/Homework3/register.html';</script>";
} else {
    if (preg_match($password_pattern, $pass)) {
        //check if username already exists in database
        $query = "SELECT * FROM Users WHERE username='$user'";
        $result = mysqli_query($connection, $query) or die(mysql_error($connection));
        $count  = mysqli_num_rows($result);

        print "retrieving user count";

        if($count == 0){
            //hash password
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
    
            $query ="INSERT INTO Users (username, pass, email, agreement, isadmin) VALUES ('{$user}', '{$hashedPass}', '{$email}', '{$agreement}', '{$isadmin}')";
            $result = mysqli_query($connection, $query) or die(mysql_error($connection));
            header('Location: /~dtao/Homework3/login.html');

        } else {
            echo "<script>alert('username taken');window.location = '/~dtao/Homework3/register.html';</script>";
        }
    } else {
        echo "<script>alert('password doesn't fulfill requirements');window.location = '/~dtao/Homework3/register.html';</script>";
    }
}

?>