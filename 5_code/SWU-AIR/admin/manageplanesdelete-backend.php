<link rel="stylesheet" type="text/css" href="../layoutsstyle.css">

<?php
require_once 'dbconnect.php';
$dplane_id=$_POST["dplane_id"];

$query="select * from planes where plane_id='$dplane_id'";
$result = mysqli_query($con,$query);
$numResults = mysqli_num_rows($result);

if($numResults == 1)
{
    $sql=mysqli_query($con, "delete from books where plane_id1='$dplane_id'");
    $sql=mysqli_query($con, "delete from planes where plane_id2='$dplane_id'");
    $sql=mysqli_query($con, "delete from has_booked_seats_in_plane where plane_id='$dplane_id'");
    $sql=mysqli_query($con, "delete from taken_by_plane where plane_id='$dplane_id'");
    $sql=mysqli_query($con, "delete from planes where plane_id='$dplane_id'");
    
    if($sql)echo "<br><br><br><center><h1>".$dplane_id." Successfully deleted from the Database </h1></center>";
    else echo("Error description: ".mysqli_error($con)); 
}
else
{   
    echo "<br><br><br><center><h1>".$dplane_id. " is not present in the database</h1></center>";
}
require_once "manageplanes.php";

?>