<!DOCTYPE html>
<html>
	<head>
		<title>MY PLANT INVENTORY | PLANT DATABASE</title>
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
			<h2>My Plant Inventory</h2>
			<?php
				include("includes/db-conn.php");
				//define the query that will be sent to the database and then prepare and execute it
				$sql = "SELECT mp.quantity, p.plant_name
				FROM my_plants as mp
				JOIN plant_info as p
				ON p.plant_id = mp.plant_id;";
				$cmd = $db->prepare($sql);
				$cmd->execute();
				//store the result in the plants variable
				$plants = $cmd->fetchAll();

				echo "<table><thead><th>Plant Name</th><th>Quantity</th></thead><tbody>";
				//iterate through the results and generate a table row for each plant in the database
				foreach ($plants as $plant){
					$name = $plant["plant_name"];
					$quantity = $plant["quantity"];

					echo "<tr>";
					echo "<td>$name</td>
						<td>$quantity</td>";
					echo "</tr>";
				}
				echo "<tbody><table>";
				//disconnect from the db
				$db = null;
			?>
		</main>
		<footer>
			
		</footer>
	</body>
</html>