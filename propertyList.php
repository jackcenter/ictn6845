<?php
//connect to database
require_once('database.php');

//get all units
$query = 'SELECT * FROM units
                    ORDER BY unitID';
$statement1 = $db->prepare($query);
$statement1->execute();
$units = $statement1->fetchAll();
$statement1->closeCursor(); 
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
	<?php include_once('navigation.php')?>
</nav>

<header>
	<div class="hero">

	</div>
</header>

<main>
	<a href="addPropertyForm.php">Add new</a>
	
	<table id="propertyList">
		<tr>
			<th>&nbsp;</th>
			<th>Available</th>
			<th>Advertised</th>
			<th>Rent</th>
			<th>SqFt</th>
			<th>Beds</th>
			<th>Baths</th>
			<th>&nbsp;</th>
		</tr>
		
		<?php foreach ($units as $unit) : ?>
		<tr>
			<td class="address"><?php echo $unit['address'] ?></td>
			<td class="middle"><?php 
				$date=date_create($unit['dateAvailable']);
				echo date_format($date,"j M y");?>
			</td>
			<td class="middle"><?php echo $unit['advertised'] ?></td>
			<td class="middle"><?php echo $unit['rentAmount'] ?></td>
			<td class="middle"><?php echo $unit['squareFeet'] ?></td>
			<td class="middle"><?php echo $unit['bedrooms'] ?></td>
			<td class="middle"><?php echo $unit['bathrooms'] ?></td>
			
			<td class="right"><form action="editPropertyForm.php" method="post">
				<input type="hidden" name="unitID"
					   value="<?php echo $unit['unitID']; ?>">
				<input type="submit" value="Edit">
            </form></td>
			
			<td><form action="deleteProperty.php" method="post">
				<input type="hidden" name="unitID"
					   value="<?php echo $unit['unitID']; ?>">
				<input type="submit" value="Delete">
            </form></td>
		</tr>
		<?php endforeach; ?>
	</table>
</main>

<footer>
	<?php include_once('footer.php')?>
</footer>
</div>
</body>
</html>