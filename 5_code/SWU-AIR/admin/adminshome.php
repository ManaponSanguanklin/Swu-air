<link rel="stylesheet" type="text/css" href="../layoutsstyle.css">
<?php
require_once 'dbconnect.php';

echo'<html>
<head>
	<title>Admins Home</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
  
    <body>
	<center>
    	<div class="container">
    		<h1>SWU-AIR Database Management Platform</h1>
    		<p>Manage Flights,Airports and Planes</p>
    	</div>
    	<div class="topnav">
    		<a href="adminprofile.php">Profile</a>
    		<a href="adminshome.php">Home</a>
    		<a href="manageflights.php">Manage Flights</a>
    		<a href="manageairports.php">Manage Airports</a>
    		<a href="manageplanes.php">Manage Planes</a>
			<a href="managebooking.php">Manage Books</a>
    	</div>';

		echo'<center>
		<div class="container">
		<h1>Flights list</h1>
		</div></center>
		';
		echo'<div class="column">';
		$sql = "SELECT flights.flight_id ,taken_by_plane.plane_id , flights.source , flights.destination,taken_by_plane.path,taken_by_plane.path_desc, taken_by_plane.date_of_depart , taken_by_plane.time_of_depart,
		taken_by_plane.date_of_arrival , taken_by_plane.time_of_arrival , taken_by_plane.economy_fare , taken_by_plane.business_fare,
		taken_by_plane.first_fare
		FROM flights
		JOIN taken_by_plane ON  taken_by_plane.flight_id=flights.flight_id";
		$result = $con->query($sql);
		
		if ($result->num_rows > 0) {
			echo "<table><tr><th>Flight ID</th><th>plane_id</th><th>Source</th><th>Destination</th><th>Path</th><th>Path Desc</th><th>Date of Depart</th><th>Time of Depart</th>
			<th>Date of Arrival</th><th>Time of Arrival</th><th>Economy Fare</th><th>Business Fare</th><th>First Fare</th></tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["flight_id"]. "</td><td>" . $row["plane_id"]."</td><td>" . $row["source"]. "</td><td>" . $row["destination"].
				"</td><td>" . $row["path"]."</td><td>" . $row["path_desc"]."</td><td>" . $row["date_of_depart"]. "</td><td>" . $row["time_of_depart"]. "</td><td>" . $row["date_of_arrival"].
				"</td><td>" . $row["time_of_arrival"]. "</td><td>" . $row["economy_fare"]. "</td><td>" . $row["business_fare"].
				"</td><td>" . $row["first_fare"]."</td></tr>";
			}
			echo "</table>";
		} 

		echo'<center><div class="container">
		<h1>Planes list</h1>
		</div></center>';
		echo'<div class="column">';
		$sql = "SELECT plane_id, airlines, total_economy_seats,total_business_seats,total_first_seats FROM planes";
		$result = $con->query($sql);
		
		if ($result->num_rows > 0) {
			echo "<table><tr><th>Plane ID</th><th>Airlines</th><th>Economy seats</th><th>Business_seats</th><th>First_seats</th></tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["plane_id"]. "</td><td>" . $row["airlines"]. "</td><td>" . $row["total_economy_seats"].
				"</td><td>" . $row["total_business_seats"]. "</td><td>" . $row["total_first_seats"]. "</td></tr>";
			}
			echo "</table>";
		} 

		echo'<center>
		<div class="container">
		<h1>Airports list</h1>
		</div></center>
		';
		echo'<div class="column">';
		$sql = "SELECT stn_code, airport_name, city FROM airports";
		$result = $con->query($sql);
		
		if ($result->num_rows > 0) {
			echo "<table><tr><th>Station Code</th><th>Airport Name</th><th>city</th></tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["stn_code"]. "</td><td>" . $row["airport_name"]. "</td><td>" . $row["city"]. "</td></tr>";
			}
			echo "</table>";
		} 
		
echo'</div>';
echo'</body></html>';	
?>



