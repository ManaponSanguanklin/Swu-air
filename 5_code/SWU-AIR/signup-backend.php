<?php

require_once 'dbconnect.php';

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$password = md5($password);


$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($con, $query);
$numResults = mysqli_num_rows($result);

if($numResults == 1)
{
	echo "<br><br><br><center><h1>Your Email is Already registered!</h1></center>";
}
else
{   
	echo'<center><h2 style="color:white;background-color:#333;">Successfully Registered</h2></center>';
	$sql=mysqli_query($con, "insert into users (name, email, password) values ('$name', '$email', '$password')");
	if($sql)require_once"index.php";
    else echo("Error description: ".mysqli_error($con)); 
}

?>
