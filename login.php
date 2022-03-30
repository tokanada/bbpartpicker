<!--Group: David Tao, John Xiao, TJ Miller, Nick Ceglio-->

<?php
$user = $_POST['username'];
$pass = $_POST['password'];

include 'secrets.php';

$connection = mysqli_connect(Mydbserver, Mydbid, Mydbpassword, Mydatabase);

$query = "SELECT * FROM Users WHERE username='$user'";

$result = mysqli_query($connection, $query) or die(mysql_error($connection));

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if(password_verify($pass, $row['pass'])){
        if($row['isadmin'] == 1){
            header('Location: /~dtao/Homework4/admin_homepage.html');
        } else {
            header('Location: /~dtao/Homework4/mainshoppage.html');
        }
    } else
        print "The username or password do not match";
        header("refresh: 5; /~dtao/Homework4/login.html");

} else {
    print "The username or password do not match";
    header("refresh: 5; /~dtao/Homework4/login.html");
}

?>