<link rel="stylesheet" type="text/css" href="../layoutsstyle.css">

<?php
require_once 'dbconnect.php';
$stn_code = $_POST["stn_code"];
$airport_name = $_POST["airport_name"];
$city=$_POST["city"];
$query="select * from airports where stn_code='$stn_code'";
$result = mysqli_query($con,$query);
$numResults = mysqli_num_rows($result);

if($numResults == 1)
{
	echo "<br><br><br><center><h1>Station Code is already Taken</h1></center>";
}
else
{   
	$sql=mysqli_query($con, "insert into airports (stn_code,airport_name,city) values ('$stn_code', '$airport_name','$city')");
	if($sql)echo "<br><br><br><center><h1>".$airport_name." Airport is Successfully added to Database </h1></center>";
    else echo("Error description: ".mysqli_error($con)); 
	require_once "manageairports.php";
}

?>
