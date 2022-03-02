<?php
require_once "dbconnect.php";

$query="select * from books order by booking_id";
$result=mysqli_query($con,$query);
$tuples=mysqli_fetch_all($result);

?>
