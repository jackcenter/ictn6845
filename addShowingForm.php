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
	<?php include_once('navigation.php')?>
</nav>

<header>
	<h1>Add a New Showing</h1>
</header>

<main>
	<h1><?php echo $address; ?></h1>
	
	<form action="addShowing.php" method="post">
		<table>
			<tr>
				<td>Date</td>
				<td><input type="date" name="date"></td>
			</tr>
			
			<tr>
				<td>Time</td>
				<td><input type="time" name="time"></td>
			</tr>
		</table>
		<input type="hidden" name="unitID" value="<?php echo $unitID; ?>">
		<input type="submit" value="Add Showing">
	</form>
</main>

<footer>
	<?php include_once('footer.php')?>
</footer>
</body>
</html>