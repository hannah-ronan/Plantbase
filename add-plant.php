<!DOCTYPE html>
<html>
	<head>
		<title>ADD PLANT INFO | PLANT DATABASE</title>
		<meta charset="utf-8">
		<meta name="author" content="Hannah Ronan">
		<meta name="description" content="This is a webiste for accessing a database where usrs can store and retrieve info on various plant types">
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	</head>
	<body>
		<header>
			<?php
				include("includes/global-nav.php");
			?>
		</header>
		<main>
			<h2>Add to the plant database</h2>
			<form action="plant-info-saved.php" method="post">
				<label for="plant_name">Plant Name</label>
				<input type="text" name="plant_name" id="plant_name" required>

				<fieldset>
					<legend>PH</legend>
					<label for="ph_min">Minimum PH</label>
					<input type="text" name="ph_min" id="ph_min" required>
					<label for="ph_max">Maximum PH</label>
					<input type="text" name="ph_max" id="ph_max" required>
				</fieldset>
				
				<fieldset>
					<legend>Temperature</legend>
					<label for="temp_min">Minimum Temperature (F)</label>
					<input type="number" name="temp_min" id="temp_min" required>
					<label for="temp_max">Maximum Temperature (F)</label>
					<input type="number" name="temp_max" id="temp_max" required>
				</fieldset>


				<label for="light">Light Required</label>
				<select name="light" id="light">
					<option value="low">Low</option>
					<option value="medium">Medium</option>
					<option value="high">High</option>
				</select>

				<label for="growth_rate">Growth Rate</label>
				<select name="growth_rate" id="growth_rate">
					<option value="low">Low</option>
					<option value="medium">Medium</option>
					<option value="high">High</option>
				</select>

				<label for="placement">Placement</label>
				<select name="placement" id="placement">
					<option value="background">Background</option>
					<option value="midground">Midground</option>
					<option value="foreground">Foreground</option>
					<option value="carpet">Carpet</option>
				</select>

				<button type="submit">SUBMIT</button>
				<button type="reset">RESET</button>
			</form>
		</main>
		<footer>
			
		</footer>
	</body>
</html>