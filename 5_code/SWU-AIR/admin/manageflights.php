<html><html>
<head>
	<title>Manage Flights</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../layoutsstyle.css">
<style type="text/css">
	form{
		max-width: 1000px !important;
		opacity: 1.5 !important;

	}
	form:hover{
		
		opacity: 1;
	}
</style>
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
			<h1>New Flights</h1>
		</div>
		<form action = "manageflightsinsert-backend.php" method = "POST" class="container" style="max-width: 500px!important;">
		<select  id="source" name="source" required>
				<option  selected="" disabled="">Select Source Airport</option>
			  <?php require_once"selectairports.php";
                    foreach ($tuples as $row) {
                    	echo'<option value="'.$row[0].'">'.$row[2].' ('.$row[1].')</option>';
                    }
			     ?>
            </select> <br><br>  
		
			<select  id="destination" name="destination" required>
				<option selected="" disabled="">Select Destination Airport</option>
			  <?php require_once"selectairports.php";
                    foreach ($tuples as $row) {
                    	echo'<option value="'.$row[0].'">'.$row[2].' ('.$row[1].')</option>';
                    }
			     ?>
            </select> <br><br> 
			<label>Stops:</label>
			<input type="number" name="stops" min="0" max="1" required><br><br>
			<button class="btn success" type = "submit">Proceed to Plane Details</button>
			<button class="btn danger" type = "reset">ClearEntries</button>
		</form>
		<div class="container">
			<h1>Delete Existing Flights</h1>
		</div>
		<form action = "manageflightsdelete-backend.php" method = "POST" class="container">
			<label>PlaneID:</label>
			<input name = "plane_id" placeholder="Registration Number" required type="text"><br><br>
			
			<select  id="source" name="source" required>
				<option  selected="" disabled="">Select Source Airport</option>
			  <?php require_once"selectairports.php";
                    foreach ($tuples as $row) {
                    	echo'<option value="'.$row[0].'">'.$row[2].' ('.$row[1].')</option>';
                    }
			     ?>
            </select> <br><br>  
		
			<select  id="destination" name="destination" required>
				<option selected="" disabled="">Select Destination Airport</option>
			  <?php require_once"selectairports.php";
                    foreach ($tuples as $row) {
                    	echo'<option value="'.$row[0].'">'.$row[2].' ('.$row[1].')</option>';
                    }
			     ?>
            </select> <br><br> 
			<label>Date and Time of Departure:</label>
			<input type="date" name="date" required type="date">
			<input type="time" name="time" required type="time"><br><br>
			<button class="btn danger"   type = "submit">Delete</button>
			<button class="btn info"   type = "reset">ClearEntries</button>
		</form>
		<div class="container">
			<h1>Update fare</h1>
		</div>
		<form action = "manageflightsupdate-backend.php" method = "POST" class="container">
			<label>PlaneID:</label>
			<input name = "plane_id" type="text" placeholder="Registration Number" required><br><br>
			<select  id="source" name="source" required>
				<option  selected="" disabled="">Select Source Airport</option>
			  <?php require_once"selectairports.php";
                    foreach ($tuples as $row) {
                    	echo'<option value="'.$row[0].'">'.$row[2].' ('.$row[1].')</option>';
                    }
			     ?>
            </select> <br><br>  
		
			<select  id="destination" name="destination" required>
				<option selected="" disabled="">Select Destination Airport</option>
			  <?php require_once"selectairports.php";
                    foreach ($tuples as $row) {
                    	echo'<option value="'.$row[0].'">'.$row[2].' ('.$row[1].')</option>';
                    }
			     ?>
            </select> <br><br> 
			<label>Date and Time of Departure:</label>
			<input type="date" name="date" required type="date">
			<input type="time" name="time" required type="time"><br><br>
			<label>Increased or Decreased by Price &#36;</label>
			<input type="number" name="economy_fare" placeholder="Economy class"required><br><br>
			<label>Increased or Decreased by Price &#36;</label>
			<input type="number" name="business_fare"placeholder="Business class" required><br><br>
			<label>Increased or Decreased by Price &#36;</label>
			<input type="number" name="first_fare"placeholder="First Class" required><br><br>
			<button class="btn success" type = "submit">Update Fare</button>
			<button class="btn info" type = "reset">ClearEntries</button>
		</form>
        
       
    </center>
	
</body>
</html>