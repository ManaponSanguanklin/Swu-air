<link rel="stylesheet" type="text/css" href="../layoutsstyle.css">

<?php
session_start();
require_once"dbconnect.php";

$name=$_SESSION["name"];

$profile_query="select username from admin where username='$name' ";
$result=mysqli_query($con,$profile_query);
$profile=mysqli_fetch_array($result);
$name=$profile[0]


?>

<html>
<head>
	<title>Admin Profile</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
 
    a:hover{
        box-shadow: 0 12px 16px 0 black, 0 17px 50px 0 black;
        background: #da190b;

    }

</style>
<link rel="stylesheet" type="text/css" href="/AirlinesBooking/layoutsstyle.css">


</head>            
    <body>
    <center>
    	<div class="container">
    		<h1>SWU-AIR Database Management Platform</h1>
    		<p>Manage Flights,Airports and Planes </p>
    	</div>
    	<div class="topnav">
    		<a href="adminprofile.php">Profile</a>
    		<a href="adminshome.php">Home</a>
    		<a href="manageflights.php">Manage Flights</a>
            <a href="manageairports.php">Manage Airports</a>
    		<a href="manageplanes.php">Manage Planes</a>
            <a href="managebooking.php">Manage Books</a>
    	</div>
        <center>
            <div class="container">
            <ul>
                <li><?php echo'<p class="header">Admin Name: '.$name.'</p>'; ?></li>      
            </ul>
            <a style="   display:block;
        padding:25px;
        margin:25px;
        border-radius: 25px;
        color:white;
        background-color: #f44336;
        box-sizing: 30%;
        text-decoration: none;"   href="../logout.php">LogOut</a>   
        </div>
    </center>
</body>
</html>

    
