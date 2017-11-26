<?php
//get the unit information
require_once('database.php');

//pull unitID from the URL
$unitID = $_GET["unitID"];

//get unit information
$queryUnit = 'SELECT * FROM units
                  WHERE unitID = :unitID';
$statement1 = $db->prepare($queryUnit);	
$statement1->bindValue(':unitID', $unitID);
$statement1->execute();
$unit = $statement1->fetch();
$address = $unit['address'];
$dateAvailable = $unit['dateAvailable'];
$rentAmount = $unit['rentAmount'];
$squareFeet = $unit['squareFeet'];
$bedrooms = $unit['bedrooms'];
$bathrooms = $unit['bathrooms'];
$statement1->closeCursor();
?>

<!doctype html>
<html>
<head>
    <title>Title</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
</head>

<body>
<div class="wrapper">

<nav> 
	<?php include_once('navigation.php')?>
</nav>

<header>
	<div class="hero">

	</div>	
	<h1><?php echo $address; ?></h1>
</header>

<main>


<div class="propertyData">
	<?php echo '$'.$rentAmount.' / '.$squareFeet.' sqft / '.$bedrooms.' beds / '.$bathrooms.' baths'; ?>
</div>

	<div class="gallery">
		<a href="">
		<h2 class="pictureLabels" >Virtual Tour</h2>
		</a>
	</div>
		
	<div class="gallery">
		<a href="availableShowingsList.php.?unitID=<?php echo $unitID; ?>">
		<h2 class="pictureLabels" >Showings</h2>
		</a>
	</div>
	
	<div class="gallery">
		<a href="tenantPreScreening.php.?unitID=<?php echo $unitID; ?>">
			<h2 class="pictureLabels" >Apply</h2>
		</a>
	</div>
	
	<div class="gallery">
		<a href="contactUs.php">
		<h2 class="pictureLabels" >Contact Us</h2>
		</a>	
	</div>
</main>

<footer>
	<?php include_once('footer.php')?>
</footer>
</body>
</html>