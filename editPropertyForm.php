<?php
//get the unit information
require_once('database.php');

$unitID = filter_input(INPUT_POST, 'unitID', FILTER_VALIDATE_INT);

//get unit information
$queryUnit = 'SELECT * FROM units
                  WHERE unitID = :unitID';
$statement1 = $db->prepare($queryUnit);	
$statement1->bindValue(':unitID', $unitID);
$statement1->execute();
$unit = $statement1->fetch();
$address = $unit['address'];
//$rent = $unit['rentAmount'];
$statement1->closeCursor();
?>

<!doctype html>
<html>
<head>
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

<body>
<div class="wrapper">

<nav> 
	<ul>
		<li><a href="index.php">Home</a></li>
	</ul> 
</nav>

<header>
	<h1><a href="index.php"><?php echo $address; ?></a></h1>
</header>

<main>
	<form action="editProperty.php" method="post">
		
		<label>Address<br>
		<input type="text" name="address" value="<?php echo $unit['address'] ?>"></label><br>
		
		<label>Date Available<br>
		<input type="date" name="dateAvailable" value="<?php echo $unit['dateAvailable'] ?>"></label><br>
		
		<label>Advertise<br>
		<input type="integer" name="advertised" value="<?php echo $unit['advertised'] ?>"></label><br>		
		
		<label>Rent Amount<br>
		<input type="text" name="rentAmount" value="<?php echo $unit['rentAmount'] ?>"></label><br>
		
		<label>Square Feet<br>
		<input type="text" name="squareFeet" value="<?php echo $unit['squareFeet'] ?>"></label><br>
		
		<label>Bedrooms<br>
		<input type="text" name="bedrooms" value="<?php echo $unit['bedrooms'] ?>"></label><br>	

		<label>Bathrooms<br>
		<input type="text" name="bathrooms" value="<?php echo $unit['bathrooms'] ?>"></label><br>

		<input type="hidden" name="unitID" value="<?php echo $unitID; ?>">
		
		<input type="submit" value="Submit">
	</form>
</main>

<footer>

</footer>
</body>
</html>