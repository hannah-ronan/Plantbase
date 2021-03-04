<!DOCTYPE html>
<html>
	<head>
		<title>PLANT INFO SAVED | PLANT DATABASE</title>
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
			<?php
				$datavalid = true;

				$ph_max = $_POST["ph_max"];
				$ph_min = $_POST["ph_min"];
				$temp_max = $_POST["temp_max"];
				$temp_min = $_POST["temp_min"];
				$name = $_POST["plant_name"];
				$light = $_POST["light"];
				$placement = $_POST["placement"];
				$growthrate = $_POST["growth_rate"];

				//what we want to check in validation:
				//name is not empty
				if (empty($name)){
					echo "Name is required<br />";
					$datavalid = false;
				}
				//ph min is smaller than ph max and neither are empty and both are numbers
				if (empty($ph_min) or empty($ph_max)){
					echo "Please enter minimum and maximum PH values<br />";
					$datavalid = false;
				}
				elseif (!is_numeric($ph_min) or !is_numeric($ph_max)){
					echo "PH values must be numeric<br />";
					$datavalid = false;
				}
				elseif ($ph_min>=$ph_max){
					echo "Minimum PH must be less than maxmimum PH<br />";
					$datavalid = false;
				}
				
				//temp min is smaller than temp max and neither are empty and both are numbers
				if (empty($temp_min) or empty($temp_max)){
					echo "Please enter minimum and maximum temperature values<br />";
					$datavalid = false;
				}
				elseif (!is_numeric($temp_min) or !is_numeric($temp_max)){
					echo "Temperature values must be numeric<br />";
					$datavalid = false;
				}
				elseif ($temp_min>=$temp_max){
					echo "Minimum temperature must be less than maxmimum temperature<br />";
					$datavalid = false;
				}


				//light is high medium or low
				if ($light != "high" and $light != "medium" and $light != "low"){
					echo "Light requirement must be high, medium or low<br />";
					$datavalid = false;
				}
				//growth rate is high medium or low
				if ($growthrate != "high" and $growthrate != "medium" and $growthrate != "low"){
					echo "Growth rate must be high, medium or low<br />";
					$datavalid = false;
				}
				//placement is background, midground, forground, or carpet
				if ($placement != "background" and $placement != "midground" and $placement != "forground" and $placement != "carpet") {
					echo "Placement must be background, midground, forground, or carpet<br />";
					$datavalid = false;
				}

				if ($datavalid){
					

					//connect to the database
					include("includes/db-conn.php");
					$sql = "INSERT INTO plant_info (plant_name, ph_min, ph_max, temp_min, temp_max, light, growth_rate, placement) VALUES (:name, :ph_min, :ph_max, :temp_min, :temp_max, :light, :growth_rate, :placement);";
					
					//prepare and execute the sql query
					$cmd = $db->prepare($sql);
					$cmd->bindParam(':name', $name, PDO::PARAM_STR, 100);
					$cmd->bindParam(':ph_min', strval($ph_min), PDO::PARAM_STR);
					$cmd->bindParam(':ph_max', strval($ph_max), PDO::PARAM_STR);
					$cmd->bindParam(':temp_min', $temp_min, PDO::PARAM_INT);
					$cmd->bindParam(':temp_max', $temp_max, PDO::PARAM_INT);
					$cmd->bindParam(':light', $light, PDO::PARAM_STR);
					$cmd->bindParam(':growth_rate', $growthrate, PDO::PARAM_STR);
					$cmd->bindParam(':placement', $placement, PDO::PARAM_STR);
					$cmd->execute();
					$db = null;
					echo  "<h2>The following plant entry was saved to the database: </h2>";
					//show the user the data that they just entered
					$ph = strval($ph_min). " - ".strval($ph_max);
					$temp = strval($temp_min). " - ".strval($temp_max);
					echo "<table><thead><th>Plant Name</th><th>PH</th><th>Temperature (F)</th><th>Lighting</th><th>Growth Rate</th><th>Placement</th></thead><tbody><tr><td>$name</td>
						<td>$ph</td>
						<td>$temp</td>
						<td>$light</td>
						<td>$growthrate</td>
						<td>$placement</td></tr></tbody></table>";
				}
			?>

		</main>
		<footer>
			
		</footer>
	</body>
</html>