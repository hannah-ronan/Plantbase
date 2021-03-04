<!DOCTYPE html>
<html>
	<head>
		<title>ADD TO MY INVENTORY  |  PLANT DATABASE</title>
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
			<h2>Record my plant inventory</h2>
			<h3>A plant must have its info in the <a href="add-plant.php" title="click here to add a plant to the database">general database</a> before it can be added to inventory</h3>
			<form action="plant-inventory-saved.php" method="POST">
				<label for="plant_id">Plant Name</label>
				<select name="plant_id" id="plant_id">
					<?php
						include ("includes/db-conn.php");
						$sql = "SELECT plant_id, plant_name FROM plant_info ORDER BY plant_name";
						$cmd = $db->prepare($sql);
						$cmd->execute();
						//store the result in the plants variable
						$plants = $cmd->fetchAll();
						foreach ($plants as $plant){
							echo "<option value='". $plant['plant_id'] ."'>" . $plant['plant_name'] . "</option>";
						}
					?>
				</select required>
				<label for="quantity">Plant Quantity</label>
				<input type="number" name="quantity" id="quantity" required>
				<button type="submit">SUBMIT</button>
				<button type="reset">RESET</button>
			</form>
		</main>
		<footer>
			
		</footer>
	</body>
</html>