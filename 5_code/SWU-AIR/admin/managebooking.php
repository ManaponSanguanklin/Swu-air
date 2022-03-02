<html>
<head>
	<title>Manage Books</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../layoutsstyle.css">
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
			<h1>Delete Existing Books</h1>
		</div>
		<center>
		<form  class="container" action = "managebooksdelete-backend.php" method = "POST">
			<label>Book id:</label>
			<select  id="book_id" name="book_id" required>
				<option  selected="" disabled="" >Select Books</option>
			  <?php require_once"selectbooks.php";
                    foreach ($tuples as $row) {
                    	echo'<option value="'.$row[0].'">'.$row[0].' ('.$row[2].')</option>';

                    }
			     ?>
            </select> <br><br>  			
			<button class="btn danger" type = "submit">Delete Books</button>
			<button class="btn info" type = "reset">ClearEntries</button>
		</form></center>
	</div>
	</center>
</body>
</html>