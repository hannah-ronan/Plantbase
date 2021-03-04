<!DOCTYPE html>
<html>
	<head>
		<title>PLANT INFO | PLANT DATABASE</title>
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
			<h2>All Plant Info</h2>
			<?php
				include("includes/db-conn.php");
				//define the query that will be sent to the database and then prepare and execute it
				$sql = "SELECT plant_name, ph_max, ph_min, temp_max, temp_min, light, growth_rate, placement FROM plant_info ORDER BY plant_name";
				$cmd = $db->prepare($sql);
				$cmd->execute();
				//store the result in the plants variable
				$plants = $cmd->fetchAll();

				echo "<table><thead><th>Plant Name</th><th>PH</th><th>Temperature (F)</th><th>Lighting</th><th>Growth Rate</th><th>Placement</th></thead><tbody>";
				//iterate through the results and generate a table row for each plant in the database
				foreach ($plants as $plant){
					//concat max/min ph and temp into a single column each so that the table is easier to read
					$ph = strval($plant["ph_min"]). " - ".strval($plant["ph_max"]);
					$temp = strval($plant["temp_min"]). " - ".strval($plant["temp_max"]);
					$name = $plant["plant_name"];
					$light = $plant["light"];
					$placement = $plant["placement"];
					$growthrate = $plant["growth_rate"];

					echo "<tr>";
					echo "<td>$name</td>
						<td>$ph</td>
						<td>$temp</td>
						<td>$light</td>
						<td>$growthrate</td>
						<td>$placement</td>";
					echo "</tr>";
				}
				echo "</tbody></table>";
				//disconnect from the db
				$db = null;

			?>
		</main>
		<footer>
			
		</footer>
	</body>
</html>