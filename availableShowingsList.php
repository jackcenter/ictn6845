<?php
//connect to database
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
$statement1->closeCursor();

//get all showings
$query = 'SELECT * FROM showings
					WHERE unitID = :unitID';
$statement2 = $db->prepare($query);
$statement2->bindValue(':unitID', $unitID);
$statement2->execute();
$showings = $statement2->fetchAll();
$statement2->closeCursor();
?>

<!doctype html>
<html>
<head>
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>

<body>
<div class="wrapper">

<nav>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="availableRentals.php">Rentals</a></li>
		<li><a href="tenantServices.php">Tenants</a></li>
		<li><a href="ownerServices.php">Owners</a></li>
		<li><a href="aboutUs.php">About Us</a></li>
	</ul> 
</nav>

<header>
	<div class="hero">

	</div>
</header>

<main>

<h1><?php echo $unit['address'] ?></h1>

	<table>
		<caption>Available Showings</caption>
		<tr>
			<th>Date</th>
			<th>Time</th>
			<th>&nbsp;</th>
		</tr>
		
		<?php foreach ($showings as $showing ) : ?>
			<tr>
				<td class="middle"><?php echo $showing['date'] ?></td>
				<td class="middle"><?php echo $showing['time'] ?></td>
				<td class="right"><form action="signUpShowingForm.php" method="post">
					<input type="hidden" name="showingID"
						value="<?php echo $showing['showingID']; ?>">
					<input type="submit" value="Sign Up">
				</form></td>
			</tr>
		<?php endforeach; ?>
	</table>
	
</main>

<!-- 	<div style="clear: both;"> </div> -->
</main>

<footer>
	<?php include_once('footer.php')?>
</footer>
</div>
</body>
</html>