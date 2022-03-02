<link rel="stylesheet" type="text/css" href="../layoutsstyle.css">

<?php
require_once 'dbconnect.php';
$book_id =$_POST["book_id"];

$query="select * from books where booking_id ='$book_id'";
$result = mysqli_query($con,$query);
$numResults = mysqli_num_rows($result);

if($numResults == 1)
{
	$sql=mysqli_query($con, "delete from books where booking_id ='$book_id'");
	if($sql)echo "<br><br><br><center><h1>".$book_id ." Successfully deleted from the Books Database </h1></center>";
    else echo("Error description: ".mysqli_error($con)); 
}
else
{   
    echo "<br><br><br><center><h1>".$book_id . " is not present in the Books database</h1></center>";
}
require_once "managebooking.php";

?>
