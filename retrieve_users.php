<head>
<style>
	table, th ,td{
    	border: 1px solid black;
    	margin: auto;
		background-color: white;
		
	}

	p{
    	text-align: center;
    	font-size: 30px;
		background-color: white;
	}

	h2{
		margin: auto;
		margin-bottom: 30px;
		margin-top: 30px;
		width: 300px;
		text-align: center;
		border: 2px solid black;
		border-radius: 20px;
		padding: 2px;
		background-color: white;
	}

	#header{
    	background-color: red;
    	color: white;
	}
	
	body{
		
		background-color: #00bfff;
	}
</style>

<body>
	<h2>Current registered users</h2>
	<table border="2" width="60%">
		<thead>
			<th>Username </th>
			<th>Email</th>
			<th>Is Admin</th>
		</thead>
</body>
</head>

<?php

$id = $_POST['id'];
$password = $_POST['password'];


//echo $id;
//echo '<br />';
//echo $password;
//echo '<br />';

include 'secrets.php';


$connection = mysqli_connect(Mydbserver, Mydbid, Mydbpassword, Mydatabase);


$sql = "SELECT username, email FROM Users" ;
//echo $sql;


$result = mysqli_query($connection, $sql) or die(mysql_error($connection));



while ($resultArray = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>";
	echo			$resultArray['username'];
	echo "</td>";
	echo "<td>";
	echo			$resultArray['email'];
	echo "</td>";
	echo "<td>";
	echo			$resultArray['isadmin'];
	echo "</td>";
	echo "</tr>";
}

echo "</table>";



?>