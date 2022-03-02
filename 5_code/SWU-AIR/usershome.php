<?php
if (!session_id()) session_start();
require_once"dbconnect.php";

$email=$_SESSION["email"];

$profile_query="select name from users where email='$email' ";
$result=mysqli_query($con,$profile_query);
$profile=mysqli_fetch_array($result);
$name=$profile[0];


?>
<html>
<head>
	<title>SWU-AIRBookingSystem</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="layoutsstyle.css">
</head>
  
    <body>
	<center>
    	<div class="container">
    		<h1>SWU-AIR Booking Platform</h1>
    		<p>Book Flight tickets and Keep track of your Booking History</p>
    	</div>
    	<div class="topnav">
    		<a href="profile.php">Profile</a>
    		<a href="usershome.php">Home</a>
    		<a href="booktickets.php">Book Flight Ticktets</a>
    		<a href="bookinghistory.php">Your Booking History</a>

    	</div>
  <div class="container">
  	<center>
  	<a href="https://www.swu.ac.th/" target = "_blank"><img src="image/swu_logo_v3.png" width="500" height="300"></a>
	<h1><?php echo'<p class="header">Hello '.$name.' !!</p>'; ?></h1>

  </div>
    </body>
 </html>