<!DOCTYPE html>
<html>
	<head>
		<title>PLANT INVENTORY SAVED | PLANT DATABASE</title>
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

				$quantity = $_POST["quantity"];
				$id = $_POST["plant_id"];
				

				//things we want to check in validation
				//quantity is not empty, is numeric and greater than 0
				if (empty($quantity)){
					echo "Quantity must be entered</br>";
					$datavalid = false;
				}
				if (! is_numeric($quantity)){
					echo "Quantity must be a number</br>";
					$datavalid = false;
				}
				else if ($quantity<1){
					echo "Quantity must be greater than 0</br>";
					$datavalid = false;
				}
				
				
				if ($datavalid){
					include("includes/db-conn.php");
					$sql = "INSERT INTO my_plants (plant_id, quantity) VALUES (:id,:quantity);";
					//prepare and execute the sql query
					$cmd = $db->prepare($sql);
					$cmd->bindParam(':quantity', $quantity, PDO::PARAM_INT);
					$cmd->bindParam(':id', $id , PDO::PARAM_INT);
					$cmd->execute();
					//disconnect
					$db = null;
					//show the info that was entered
					echo "Inventory entry saved";
				}
			?>
		</main>
		<footer>
			
		</footer>
	</body>
</html>